<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Product;
use App\ProductCatalog;

class ProductController extends BaseController
{

    /**
     * ProductController constructor.
     * @param Product $model
     */
    public function __construct(Product $model)
    {
        parent::__construct();
        $this->model = $model;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $criteria = $request->only('keyword');
        $query = $this->model->with('catalog')->orderBy('created_at', 'desc')->select();
        if ($criteria['keyword']) {
            $query->where('name', 'like', '%' . $criteria['keyword'] . '%');
        }
        $products = $query->paginate(config('backend.list_size'));
        return $this->render('products.index', compact('products', 'criteria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product();
        $catalogs = ProductCatalog::all();
        return $this->render('products.create', compact('product', 'catalogs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:products',
            'catalog_id' => 'required',
            'price' => 'required|numeric',
            'cover_image' => 'required',
            'content' => 'required',
            'subscription' => 'numeric',
        ], [
            'name.required' => '名称必填',
            'name.unique' => '名称已存在',
            'catalog_id.required' => '分类必选',
            'cover_image.required' => '封面图片没有上传',
            'content.required' => '内容必填',
            'price.required' => '价格必填',
            'price.numeric' => '价格为数值',
            'subscription.numeric' => '订金为数值',
        ]);


        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $option_names = $request->get('option_name');
        $option_values = $request->get('option_value');
        $options = [];
        if (is_array($option_names)) {
            foreach ($option_names as $k => $v) {
                if (!empty($v)) {
                    $options[$v] = $option_values[$k];
                }
            }
        }
        $request['options'] = json_encode($options);

        if (Product::create($request->all())) {
            return redirect()->route('product.index')->with('success', '添加成功');
        }

        return back()->with('error', '添加失败');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        if (!$product) {
            abort(404);
        }
        $catalogs = ProductCatalog::all();
        return $this->render('products.edit', compact('product', 'catalogs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            abort(404);
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'catalog_id' => 'required',
            'price' => 'required|numeric',
            'cover_image' => 'required',
            'content' => 'required',
            'subscription' => 'numeric',
        ], [
            'name.required' => '名称必填',
            'catalog_id.required' => '分类必选',
            'cover_image.required' => '封面图片没有上传',
            'content.required' => '内容必填',
            'price.required' => '价格必填',
            'price.numeric' => '价格为数值',
            'subscription.numeric' => '订金为数值',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $option_names = $request->get('option_name');
        $option_values = $request->get('option_value');
        $options = [];
        if (is_array($option_names)) {
            foreach ($option_names as $k => $v) {
                if (!empty($v)) {
                    $options[$v] = $option_values[$k];
                }
            }
        }
        $request['options'] = $options;
        $request['disabled'] = $request->disabled ? 1 : 0;
        $request['is_recommend'] = $request->is_recommend ? 1 : 0;
        if ($product->update($request->all())) {
            return redirect()->route('product.index')->with('success', '修改成功');
        }

        return back()->with('error', '修改失败');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = $this->model->find($id);
        if (!$model) {
            return redirect()->back()->with('error', '删除的对象不存在');
        }

        if ($model->delete()) {
            if (file_exists(public_path($model->cover_image))) {
                @unlink(public_path($model->cover_image));
            }
            return redirect()->back()->with('success', '删除成功');
        }

        return redirect()->back()->with('error', '删除失败');
    }
}
