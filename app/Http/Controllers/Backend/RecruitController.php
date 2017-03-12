<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Recruit;

class RecruitController extends BaseController
{

    /**
     * RecruitController constructor.
     * @param Recruit $model
     */
    public function __construct(Recruit $model)
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
        $recruits = $query->paginate(config('backend.list_size'));
        return $this->render('recruits.index', compact('recruits', 'criteria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $recruit = new Recruit();
        return $this->render('recruits.create', compact('recruit'));
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
            'name' => 'required|unique:recruits',
            'address' => 'required',
            'content' => 'required',
            'number' => 'required',
        ], [
            'name.required' => '招聘职位必填',
            'name.unique' => '招聘职位已存在',
            'address.required' => '工作地点必填',
            'content.required' => '内容必填',
            'number.required' => '招聘人数必填',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if (Recruit::create($request->all())) {
            return redirect()->route('recruit.index')->with('success', '添加成功');
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
        $recruit = $this->model->find($id);
        if (!$recruit) {
            abort(404);
        }
        return $this->render('recruits.edit', compact('recruit'));
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
        $recruit = $this->model->find($id);
        if (!$recruit) {
            abort(404);
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required',
            'content' => 'required',
            'number' => 'required',
        ], [
            'name.required' => '招聘职位必填',
            'address.required' => '工作地点必填',
            'content.required' => '内容必填',
            'number.required' => '招聘人数必填',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if ($recruit->update($request->all())) {
            return redirect()->route('recruit.index')->with('success', '修改成功');
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
