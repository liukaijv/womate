@extends('backend.layouts.auth')
@section('title')
    用户登录
@endsection
@section('content')
    {!! Form::open(['route'=>'backend.login','method'=>'POST','class'=>'m-t']) !!}
    <div class="form-group">
        <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="账户"
               required="" autofocus>
    </div>
    <div class="form-group">
        <input type="password" name="password" class="form-control" placeholder="密码" required="">
    </div>
    <button type="submit" class="btn btn-primary block full-width m-b">登录</button>
    <p class="text-muted text-center">
        <small>没有账号？</small>
    </p>
    <a class="btn btn-sm btn-white btn-block" href="{{route('backend.register')}}">去注册</a>
    {!! Form::close() !!}
@endsection