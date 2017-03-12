<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\PostCatalog;

class PostCatalogController extends BaseController
{
    /**
     * PostCatalogController constructor.
     * @param Page $model
     */
    public function __construct(PostCatalog $model)
    {
        parent::__construct();
        $this->model = $model;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $criteria = $request->only('keyword');
        $query = $this->model->orderBy('created_at', 'desc')->select();
        if ($criteria['keyword']) {
            $query->where('name', 'like', '%' . $criteria['keyword'] . '%');
        }
        $catalogs = $query->with('catalog')->paginate(config('backend.list_size'));
        return $this->render('post_catalogs.index', compact('catalogs', 'criteria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catalog = new PostCatalog();
        $catalogs = PostCatalog::where('parent_id', 0)->get();
        return $this->render('post_catalogs.create', compact('catalogs', 'catalog'));
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
            'name' => 'required|unique:post_catalogs',
            'sort' => 'required|numeric',
        ], [
            'name.required' => '分类名称不能为空',
            'name.unique' => '分类名称已存在',
            'sort.required' => '排序不能为空，默认为0',
            'sort.numeric' => '排序只能为数字',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if (PostCatalog::create($request->all())) {
            return redirect()->route('post_catalogs.index')->with('success', '添加成功');
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
        $catalog = PostCatalog::find($id);
        if (!$catalog) {
            abort(404);
        }
        $catalogs = PostCatalog::where('parent_id', 0)->get();
        return $this->render('post_catalogs.edit', compact('catalogs', 'catalog'));
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
        $catalog = PostCatalog::find($id);
        if (!$catalog) {
            abort(404);
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'sort' => 'required|numeric',
        ], [
            'name.required' => '分类名称不能为空',
            'sort.required' => '排序不能为空，默认为0',
            'sort.numeric' => '排序只能为数字',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if ($catalog->update($request->all())) {
            return redirect()->route('post_catalog.index')->with('success', '更新成功');
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

        if ($model->system_default == 1) {
            return redirect()->back()->with('error', '系统内置不能删除');
        }

        $count_related = Post::where('catalog_id', $model->id)->count();
        if ($count_related > 0) {
            return redirect()->back()->with('error', '删除失败，该分类下还有文章');
        }

        if ($model->delete()) {
            return redirect()->back()->with('success', '删除成功');
        }

        return redirect()->back()->with('error', '删除失败');
    }
}
