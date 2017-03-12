@extends('backend.layouts.auth')
@section('title')
    用户注册
@endsection
@section('content')

    {!! Form::open(['route'=>'backend.register','method'=>'POST','class'=>'m-t']) !!}
    <div class="form-group">
        <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="账户"
               required="" autofocus>
    </div>
    <div class="form-group">
        <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="邮箱"
               required="">
    </div>
    <div class="form-group">
        <input type="password" name="password" class="form-control" placeholder="密码" required="">
    </div>
    <div class="form-group">
        <input type="password" name="password_confirmation" class="form-control" placeholder="密码确认"
               required="">
    </div>
    <div class="form-group">
        <label class="checkbox">
            <label>
                <input type="checkbox" name="agree" checked>同意注册协议
            </label>
        </label>
    </div>
    <button type="submit" class="btn btn-primary block full-width m-b">注册</button>
    <p class="text-muted text-center">
        <small>已经有账号了？</small>
    </p>
    <a class="btn btn-sm btn-white btn-block" href="{{route('backend.login')}}">去登录</a>
    {!! Form::close() !!}

@endsection