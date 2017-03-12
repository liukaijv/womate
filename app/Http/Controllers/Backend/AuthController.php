<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Auth;
use Validator;
use App\Admin;

class AuthController extends BaseController
{

    protected $loginRoute = 'backend.login';
    protected $redirectRoute = 'backend.index';

    /**
     * @return mixed
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        if ($request->method() == 'POST') {
            $credentials = $request->only('name', 'password');
            if (str_contains($credentials['name'], '@')) {
                $credentials['email'] = $credentials['name'];
                unset($credentials['name']);
            }

            if ($this->guard()->attempt($credentials)) {
                return redirect()->route($this->redirectRoute)->with('success', '登录成功');;
            }
            return redirect()->back()->withInput($request->only('name'))->withErrors([
                'name' => '账号或者密码错误'
            ]);
        }

        return $this->render('auth.login');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout()
    {

        $this->guard()->logout();
        return redirect()->route($this->loginRoute)->with('success', '退出成功');

    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function register(Request $request)
    {
        if ($request->method() == 'POST') {

            $validator = Validator::make($request->all(), [
                'name' => 'required|max:64|unique:admins',
                'email' => 'required|email|max:128|unique:admins',
                'password' => 'required|min:6|confirmed',
                'agree' => 'required',
            ], [
                'name.required' => '用户名不能为空',
                'name.unique' => '用户名已存在',
                'email.required' => '邮箱不能为空',
                'email.email' => '邮箱格式不正确',
                'email.unique' => '邮箱已存在',
                'password.password' => '密码不能为空',
                'password.min' => '密码最少为6位',
                'password.confirmed' => '两次密码不一致',
                'agree.required' => '没有同意注册协议',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            Admin::create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => bcrypt($request->get('password')),
            ]);

            return redirect()->route($this->loginRoute)->with('success', '注册成功');

        }
        return $this->render('auth.register');
    }
}
