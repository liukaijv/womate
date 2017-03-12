@extends('backend.layouts.main')
@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-8">
            <h2></h2>
            <ol class="breadcrumb">
                <li>
                    <strong>位置：留言管理</strong>
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
                                    <h3>留言查看</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="box-body form-horizontal">

                            <div class="row m-t-sm">
                                <div class="col-lg-10 col-lg-offset-2">
                                    @include('backend.partials.errors')
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">服务类别</label>

                                <div class="col-lg-10">
                                    <input type="text" placeholder="服务类别" class="form-control" name="name" disabled
                                           value="{{$feedback->service?$feedback->service->name:'无'}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">姓名</label>

                                <div class="col-lg-10">
                                    <input type="text" placeholder="姓名" class="form-control" name="name" disabled
                                           value="{{$feedback->name or old('name')}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">电话</label>

                                <div class="col-lg-10">
                                    <input type="text" placeholder="电话" class="form-control" name="mobile" disabled
                                           value="{{$feedback->mobile or old('mobile')}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">备注</label>

                                <div class="col-lg-10">
                                    <textarea type="text" placeholder="备注" class="form-control" name="remark"
                                              disabled>{{$feedback->remark or old('remark')}}</textarea>
                                </div>
                            </div>

                        </div>
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-lg-10 col-lg-offset-2">
                                    <a class="btn btn-primary" href="{{route('feedback.index')}}">返回列表</a>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
