<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Page;

class PageController extends BaseController
{

    /**
     * PageController constructor.
     * @param Page $model
     */
    public function __construct(Page $model)
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
            $query->where('title', 'like', '%' . $criteria['keyword'] . '%');
        }
        $pages = $query->paginate(config('backend.list_size'));
        return $this->render('pages.index', compact('pages', 'criteria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = new Page();
        return $this->render('pages.create', compact('page'));
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
            'title' => 'required|unique:pages',
            'content' => 'required',
        ], [
            'title.required' => '标题必填',
            'title.unique' => '标题已存在',
            'content.required' => '内容必填'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $request['in_sidebar'] = $request->in_sidebar ? 1 : 0;
        if (Page::create($request->all())) {
            return redirect()->route('page.index')->with('success', '添加成功');
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
        $page = $this->model->find($id);
        if (!$page) {
            abort(404);
        }
        return $this->render('pages.edit', compact('page'));
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
        $page = Page::find($id);
        if (!$page) {
            abort(404);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
        ], [
            'title.required' => '标题必填',
            'content.required' => '内容必填'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $request['in_sidebar'] = $request->in_sidebar ? 1 : 0;
        if ($page->update($request->all())) {
            return redirect()->route('page.index')->with('success', '修改成功');
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

        if ($model->system_default == 1) {
            return redirect()->back()->with('error', '系统内置不能删除');
        }

        if ($model->delete()) {
            return redirect()->back()->with('success', '删除成功');
        }

        return redirect()->back()->with('error', '删除失败');
    }
}
