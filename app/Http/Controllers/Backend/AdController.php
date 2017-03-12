<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Ad;
use App\AdPosition;

class AdController extends BaseController
{

    /**
     * AdController constructor.
     * @param Ad $model
     */
    public function __construct(Ad $model)
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
        $criteria = $request->only('keyword', 'position_id');
        $query = $this->model->with('position')->orderBy('created_at', 'desc')->select();
        if ($criteria['keyword']) {
            $query->where('name', 'like', '%' . $criteria['keyword'] . '%');
        }
        if ($criteria['position_id']) {
            $query->where('position_id', $criteria['position_id']);
        }
        $ads = $query->paginate(config('backend.list_size'));
        return $this->render('ads.index', compact('ads', 'criteria'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        $position_id = $request->get('position_id', '');
        $ad_positions = AdPosition::all();
        $ad = new Ad();
        return $this->render('ads.create', compact('ad', 'position_id', 'ad_positions'));
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
            'position_id' => 'required',
            'image' => 'required',
        ], [
            'position_id.required' => '广告位必选',
            'image.required' => '图片没有上传',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if (Ad::create($request->all())) {
            return redirect()->route('ad.index')->with('success', '添加成功');
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
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request, $id)
    {
        $ad = $this->model->find($id);
        if (!$ad) {
            abort(404);
        }
        $position_id = $request->get('position_id', '');
        $ad_positions = AdPosition::all();
        return $this->render('ads.edit', compact('ad', 'position_id', 'ad_positions'));
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
        $ad = $this->model->find($id);
        if (!$ad) {
            abort(404);
        }
        $validator = Validator::make($request->all(), [
            'position_id' => 'required',
            'image' => 'required',
        ], [
            'position_id.required' => '广告位必选',
            'image.required' => '图片没有上传',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if ($ad->update($request->all())) {
            return redirect()->route('ad.index')->with('success', '修改成功');
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
