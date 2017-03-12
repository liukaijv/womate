<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Page;
use App\PostCatalog;
use App\Post;
use App\ProductCatalog;
use App\Product;
use App\Ad;
use App\Recruit;
use App\Setting;
use App\Feedback;

class HomeController extends Controller
{
    /**
     * HomeController constructor.
     */
    public function __construct()
    {
        $settings = Setting::getSettings(true);
        $page_banner = Ad::where('position_id', 2)->first();
        $latest_posts = Post::where('catalog_id', 1)->orderBy('created_at', 'desc')->take(5)->get();
        $help_posts = Post::where('catalog_id', 3)->orderBy('created_at', 'desc')->take(5)->get();
        view()->share('latest_posts', $latest_posts);
        view()->share('help_posts', $help_posts);
        view()->share('page_banner', $page_banner);
        view()->share('settings', $settings);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        if (Product::recommend()->count() > 0) {
            $recommend_products = Product::recommend()->orderBy('created_at', 'desc')->get();
        } else {
            $recommend_products = Product::take(3)->orderBy('created_at', 'desc')->get();
        }
        $banners = Ad::where('position_id', 1)->get();
        $all_product_catalog = ProductCatalog::all();
        return view('home', compact('all_product_catalog', 'banners', 'recommend_products'));
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function about($id = 1)
    {
        $page = Page::find($id);
        if (!$page) {
            abort(404);
        }
        $all_pages = Page::where('in_sidebar', true)->get();
        return view('page', compact('page', 'all_pages'));
    }

    /**
     * @param string $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function posts($id = '')
    {
        $post_catalog = PostCatalog::find($id);
        if (!$post_catalog && $id != '') {
            abort(404);
        }
        $catalogs = PostCatalog::news()->get();
        $query = Post::with('catalog')->news()->orderBy('sort', 'asc')->orderBy('created_at', 'desc');
        if ($post_catalog) {
            $posts = $query->where('catalog_id', $post_catalog->id)->paginate(config('frontend.list_size'));
        } else {
            $posts = $query->paginate(config('frontend.list_size'));
        }
        return view('posts.index', compact('posts', 'post_catalog', 'catalogs'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function post($id)
    {
        $post = Post::find($id);
        if (!$post) {
            abort(404);
        }
        $post->hits = $post->hits + 1;
        $post->save();
        $catalogs = PostCatalog::news()->get();
        return view('posts.show', compact('post', 'catalogs'));
    }

    /**
     * @param string $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function products($id = '')
    {
        $product_catalog = ProductCatalog::find($id);
        if (!$product_catalog && $id != '') {
            abort(404);
        }
        $catalogs = ProductCatalog::all();
        if ($product_catalog) {
            $products = Product::with('catalog')->where('catalog_id', $product_catalog->id)->paginate(config('frontend.list_size'));
        } else {
            $products = Product::with('catalog')->paginate(config('frontend.list_size'));
        }

        return view('products.index', compact('products', 'product_catalog', 'catalogs'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function product($id)
    {
        $product = Product::with('catalog')->find($id);
        if (!$product) {
            abort(404);
        }
        return view('products.show', compact('product'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function recruit()
    {
        $recruits = Recruit::paginate(config('frontend.list_size'));
        return view('recruits.index', compact('recruits'));
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function feedback(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mobile' => ['required','regex:/^13\d{9}$|^14\d{9}$|^15\d{9}$|^17\d{9}$|^18\d{9}$/'],

        ], [
            'name.required' => '姓名还没有填写',
            'mobile.required' => '手机号码还没有填写',
            'mobile.regex' => '手机号码格式不正确',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'msg' => $validator->errors()->all()
            ]);
        }

        Feedback::create($request->all());
        return response()->json([
            'success' => true,
            'msg' => '信息已提交，我们会尽快联系您！'
        ]);
    }
}
