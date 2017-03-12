<?php

namespace App\Http\Controllers\Backend;

use Hamcrest\Core\Set;
use Illuminate\Http\Request;
use App\Setting;

class CommonController extends BaseController
{
    /**
     * CommonController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function upload(Request $request)
    {
        $file = $request->file('file');

        if (!$request->hasFile('file')) {
            return response()->json(['success' => false, 'msg' => '文件为空']);
        }

        if (!$file->isValid()) {
            return response()->json(['success' => false, 'msg' => '文件上传出错']);
        }

        $path = config('backend.upload_dir');
        $dir = $request->get('dir', '');
        if (!empty($dir)) {
            $path .= substr($dir, 0, 1) != '/' ? '/' . $dir : $dir;
        }

        $new_filename = date('YmdHis') . uniqid() . '.' . $file->getClientOriginalExtension();
        $savePath = public_path($path);
        if (!file_exists($savePath)) {
            mkdir($savePath, 0755, true);
        }

        $file->move($savePath, $new_filename);
        return response()->json(['success' => true, 'msg' => '文件上传成功', 'file' => $path . '/' . $new_filename]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function setting(Request $request)
    {
        if ($request->method() == 'POST') {
            $data = $request->all();
            foreach ($data as $key => $value) {
                Setting::where('name', $key)->update(['value' => $value]);
            }
        }
        $settings = Setting::getSettings(false);
        return $this->render('setting', compact('settings'));
    }
}
