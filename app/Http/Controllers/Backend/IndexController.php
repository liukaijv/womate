<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Post;
use App\Product;
use App\Ad;
use App\Recruit;

class IndexController extends BaseController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $post_count = Post::count();
        $product_count = Product::count();
        $ad_count = Ad::count();
        $recruit_count = Recruit::count();
        return $this->render('index', compact('post_count', 'product_count', 'ad_count', 'recruit_count'));
    }
}
