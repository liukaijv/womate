<?php

namespace App\Http\Controllers\Backend;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\ProductCatalog;

class ProductCatalogController extends BaseController
{

    /**
     * ProductCatalogController constructor.
     * @param ProductCatalog $model
     */
    public function __construct(ProductCatalog $model)
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
        $query = $this->model->orderBy('created_at', 'desc')->select();
        if ($criteria['keyword']) {
            $query->where('name', 'like', '%' . $criteria['keyword'] . '%');
        }
        $catalogs = $query->paginate(config('backend.list_size'));
        return $this->render('product_catalogs.index', compact('catalogs', 'criteria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catalog = new ProductCatalog();
        return $this->render('product_catalogs.create', compact('catalog'));
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
            'name' => 'required|unique:product_catalogs',
        ], [
            'name.required' => '分类名称不能为空',
            'name.unique' => '分类名称已存在',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if (ProductCatalog::create($request->all())) {
            return redirect()->route('product_catalog.index')->with('success', '添加成功');
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
        $catalog = ProductCatalog::find($id);
        if (!$catalog) {
            abort(404);
        }
        return $this->render('product_catalogs.edit', compact('catalog'));
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
        $catalog = ProductCatalog::find($id);
        if (!$catalog) {
            abort(404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:product_catalogs',
        ], [
            'name.required' => '分类名称不能为空',
            'name.unique' => '分类名称已存在',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if ($catalog->update($request->all())) {
            return redirect()->route('product_catalog.index')->with('success', '更新成功');
        }

        return back()->with('error', '更新失败');
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

        $count_related = Product::where('catalog_id', $model->id)->count();
        if ($count_related > 0) {
            return redirect()->back()->with('error', '删除失败，该分类下还有产品');
        }

        if ($model->delete()) {
            return redirect()->back()->with('success', '删除成功');
        }

        return redirect()->back()->with('error', '删除失败');
    }
}
