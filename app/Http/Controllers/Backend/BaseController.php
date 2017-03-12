<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Validator;

class BaseController extends Controller
{

    /**
     * @var null
     */
    protected $model = null;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        view()->share([
            'site_title' => config('backend.site_title')
        ]);
    }


    /**
     * @param null $view
     * @param array $data
     * @param array $mergeData
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function  render($view = null, $data = [], $mergeData = [])
    {
        if (!str_contains($view, 'backend.')) {
            $view = 'backend.' . $view;
        }
        return view($view, $data, $mergeData);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajaxEdit(Request $request)
    {

        if (!$request->ajax() || $this->model == null) {
            abort('404');
        }

        $field = $request->get('field');
        $value = $request->get('value');
        $validate = $request->get('validate');

        $validator = Validator::make($request->all(), [
            'value' => $validate,
        ], [
            'value.required' => '输入值不能为空',
            'value.numeric' => '输入值只能为数字',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'msg' => '验证未通过',
                'errors' => $validator->errors()->all()
            ]);
        }

        $model = $this->model->find($request->get('id'));
        if (!$model) {
            return response()->json([
                'success' => false,
                'msg' => '访问的对象不存在'
            ]);
        }

        if ($field) {
            if ($model->update([
                $field => $value,
            ])
            ) {
                return response()->json([
                    'success' => true,
                    'msg' => '修改成功'
                ]);
            }
        }
        return response()->json([
            'success' => false,
            'msg' => '修改失败'
        ]);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function actionBulk(Request $request)
    {
        $action = $request->get('action', '');
        $id = $request->get('checked_id', '');
        if ($action && $id) {
            switch ($action) {
                case 'delete':
                    $this->bulkDelete($id);
                    break;
                default:
                    break;
            }
            return back()->with('success', '批量操作成功');
        }
        return back()->with('error', '参数不正确');
    }

    /**
     * @param $id
     */
    protected function bulkDelete($id)
    {
        if ($id) {
            if (strpos($id, ',') === false) {
                $model = $this->model->find($id);
                if ($model) {
                    $model->delete();
                }
            } else {
                $ids = explode(',', $id);
                foreach ($ids as $id) {
                    $model = $this->model->find($id);
                    if ($model) {
                        $model->delete();
                    }
                }
            }
        }
    }

}
