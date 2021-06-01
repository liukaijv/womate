@extends('backend.layouts.main')
@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-8">
            <h2></h2>
            <ol class="breadcrumb">
                <li>
                    <strong>位置：站点设置</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class=" wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">

                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="ibox-title-info">
                                    <h3>站点设置</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-content">

                        {!! Form::open(['method'=>'POST','url'=>route('backend.setting'),'enctype'=>'multipart/form-data','class'=>'form-horizontal']) !!}

                        <div class="box-body">

                            <div class="row m-t-sm">
                                <div class="col-lg-10 col-lg-offset-2">
                                    @include('backend.partials.errors')
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">站点标题</label>

                                <div class="col-lg-10">
                                    <input type="text" placeholder="站点标题" class="form-control" name="site_title"
                                           value="{{$settings['site_title'] or old('site_title')}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">站点关键词</label>

                                <div class="col-lg-10">
                                    <textarea placeholder="站点关键词" class="form-control"
                                              name="site_keywords">{{$settings['site_keywords'] or old('site_keywords')}}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">站点描述</label>

                                <div class="col-lg-10">
                                    <textarea placeholder="站点描述" class="form-control"
                                              name="site_description">{{$settings['site_description'] or old('site_description')}}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">联系电话</label>

                                <div class="col-lg-10">
                                    <input type="text" placeholder="联系电话" class="form-control" name="mobile"
                                           value="{{$settings['mobile'] or old('mobile')}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">邮箱</label>

                                <div class="col-lg-10">
                                    <input type="text" placeholder="邮箱" class="form-control" name="email"
                                           value="{{$settings['email'] or old('email')}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">地址</label>

                                <div class="col-lg-10">
                                    <input type="text" placeholder="地址" class="form-control" name="address"
                                           value="{{$settings['address'] or old('address')}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">QQ</label>

                                <div class="col-lg-10">
                                    <input type="text" placeholder="QQ" class="form-control" name="qq"
                                           value="{{$settings['qq'] or old('qq')}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">腾讯微博</label>

                                <div class="col-lg-10">
                                    <input type="text" placeholder="腾讯微博" class="form-control" name="tencent_weibo"
                                           value="{{$settings['tencent_weibo'] or old('tencent_weibo')}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">新浪微博</label>

                                <div class="col-lg-10">
                                    <input type="text" placeholder="新浪微博" class="form-control" name="sina_weibo"
                                           value="{{$settings['sina_weibo'] or old('sina_weibo')}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">公司简介</label>

                                <div class="col-lg-10">
                                    <textarea placeholder="公司简介" class="form-control" name="company_intro"
                                              maxlength="50">{{$settings['company_intro'] or old('company_intro')}}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">底部信息</label>

                                <div class="col-lg-10">
                                    <textarea placeholder="底部信息" class="form-control" name="footer_info"
                                              maxlength="300">{{$settings['footer_info'] or old('footer_info')}}</textarea>
                                </div>
                            </div>

                        </div>
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-lg-10 col-lg-offset-2">
                                    <button class="btn btn-primary" type="submit">提交</button>
                                </div>
                            </div>
                        </div>

                        {!! Form::close() !!}


                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection