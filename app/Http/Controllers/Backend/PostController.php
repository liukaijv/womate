<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Post;
use App\PostCatalog;

class PostController extends BaseController
{
    /**
     * PostController constructor.
     * @param Page $model
     */
    public function __construct(Post $model)
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
        $query = $this->model->with('catalog')->orderBy('created_at', 'desc')->select();
        if ($criteria['keyword']) {
            $query->where('title', 'like', '%' . $criteria['keyword'] . '%');
        }
        $posts = $query->paginate(config('backend.list_size'));
        return $this->render('posts.index', compact('posts', 'criteria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        $catalogs = PostCatalog::all();
        return $this->render('posts.create', compact('post', 'catalogs'));
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
            'title' => 'required|unique:posts',
            'catalog_id' => 'required',
//            'cover_image' => 'required',
            'content' => 'required',
        ], [
            'title.required' => '标题必填',
            'title.unique' => '标题已存在',
            'catalog_id.required' => '分类必选',
//            'cover_image.required' => '封面图片没有上传',
            'content.required' => '内容必填'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if (Post::create($request->all())) {
            return redirect()->route('post.index')->with('success', '添加成功');
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
        $post = Post::find($id);
        if (!$post) {
            abort(404);
        }
        $catalogs = PostCatalog::all();
        return $this->render('posts.edit', compact('post', 'catalogs'));

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
        $post = Post::find($id);
        if (!$post) {
            abort(404);
        }
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'catalog_id' => 'required',
//            'cover_image' => 'required',
            'content' => 'required',
        ], [
            'title.required' => '标题必填',
            'catalog_id.required' => '分类必选',
//            'cover_image.required' => '封面图片没有上传',
            'content.required' => '内容必填'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $request['visible'] = $request->visible ? 1 : 0;
        if ($post->update($request->all())) {
            return redirect()->route('post.index')->with('success', '修改成功');
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
            return redirect()->back()->with('success', '删除成功');
        }

        return redirect()->back()->with('error', '删除失败');
    }
}
