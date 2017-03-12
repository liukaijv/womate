@extends('backend.layouts.main')

@section('title')
    单页管理
@endsection('title')

@section('content')

    <div class="row wrapper border-bottom white-bg feedback-heading">
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
                                    <h3>留言列表</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="row m-t-sm">
                            <div class="col-lg-2">
                                {!! Form::open(['url'=>route('feedback.index'), 'method'=>'GET']) !!}
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="关键字" name="keyword">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-primary" type="button">搜索</button>
                                    </span>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>

                        <table class="table">
                            <thead>
                            <tr>
                                <td>
                                    <input type="checkbox"
                                           name="check_all"
                                           data-classname="checkbox-item"
                                           data-target="#checked_id"
                                           data-role="check-all">
                                </td>
                                <td>姓名</td>
                                <td>电话</td>
                                <td>创建时间</td>
                                <td>操作</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($feedback as $item)
                                <tr>
                                    <td>
                                        <input type="checkbox"
                                               name="ids[]"
                                               class="checkbox-item"
                                               value="{{$item->id}}">
                                    </td>
                                    <td>
                                        {{str_limit($item->name, 30)}}
                                    </td>
                                    <td>
                                        {{$item->mobile}}
                                    </td>
                                    <td>
                                        {{$item->created_at}}
                                    </td>
                                    <td>
                                        <a data-modal="form"
                                           href="{{route('feedback.show',$item)}}"
                                           class="btn btn-primary btn-xs">查看</a>
                                        @if($item->system_default==0)
                                            {!! Form::open(['url'=>route('feedback.destroy',[$item]),'method'=>'DELETE', 'style'=>'display: inline-block;']) !!}
                                            <button class="btn btn-danger btn-xs" data-role="confirm" type="button">
                                                删除
                                            </button>
                                            {!! Form::close() !!}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <div class="row">
                            <div class="col-lg-2">
                                @include('backend.partials.bulk', ['bulkActionUrl'=>route('feedback.bulk')])
                            </div>
                            <div class="col-lg-10">
                                <div class="pull-right">
                                    {{$feedback->appends($criteria)->links()}}
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection('content')