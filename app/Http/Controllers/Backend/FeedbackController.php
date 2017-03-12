<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Feedback;

class FeedbackController extends BaseController
{

    /**
     * FeedbackController constructor.
     * @param Feedback $model
     */
    public function __construct(Feedback $model)
    {
        parent::__construct();
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $criteria = $request->only('keyword');
        $query = $this->model->orderBy('created_at', 'desc')->select();
        if ($criteria['keyword']) {
            $query->where('name', 'like', '%' . $criteria['keyword'] . '%');
        }
        $feedback = $query->paginate(config('backend.list_size'));
        return $this->render('feedback.index', compact('feedback', 'criteria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $feedback = $this->model->with('service')->find($id);
        if (!$feedback) {
            abort(404);
        }
        return $this->render('feedback.show', compact('feedback'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
