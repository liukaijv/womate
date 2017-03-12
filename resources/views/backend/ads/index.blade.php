@extends('backend.layouts.main')

@section('title')
    广告列表
@endsection('title')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-8">
            <h2></h2>
            <ol class="breadcrumb">
                <li>
                    <strong>位置：广告管理</strong>
                </li>
                <li>
                    广告列表
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
                                    <h3>广告列表</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row m-t-sm">
                            <div class="col-lg-2">
                                {!! Form::open(['url'=>route('ad.index'), 'method'=>'GET']) !!}
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="关键字" name="keyword">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-primary" type="button">搜索</button>
                                    </span>
                                </div>
                                {!! Form::close() !!}
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <a class="btn btn-white"
                                       href="{{route('ad.create',['position_id'=>isset($criteria['position_id'])?$criteria['position_id']:''])}}">新增广告</a>
                                </div>
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
                                <td>名称</td>
                                <td>广告位</td>
                                <td>图片</td>
                                <td>创建时间</td>
                                <td>操作</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ads as $item)
                                <tr>
                                    <td>
                                        <input type="checkbox"
                                               name="ids[]"
                                               class="checkbox-item"
                                               value="{{$item->id}}">
                                    </td>
                                    <td>
                                        {{$item->name?str_limit($item->name, 30):'无'}}
                                    </td>
                                    <td>
                                        {{$item->position->name or '无'}}
                                    </td>
                                    <td>
                                        @if($item->image)
                                            <a href="javascript:;"
                                               onclick="TINY.box.show({image:'{{str_contains($item->image,'http')?'':'/'}}{{$item->image}}',boxid:'frameless'})"><i
                                                        class="fa fa-image"></i></a>
                                        @else
                                            无
                                        @endif
                                    </td>
                                    <td>
                                        {{$item->created_at}}
                                    </td>
                                    <td>
                                        <a data-modal="form"
                                           href="{{route('ad.edit',$item)}}"
                                           class="btn btn-primary btn-xs">编辑</a>
                                        {!! Form::open(['url'=>route('ad.destroy',[$item]),'method'=>'DELETE', 'style'=>'display: inline-block;']) !!}
                                        <button class="btn btn-danger btn-xs" data-role="confirm" type="button">
                                            删除
                                        </button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <div class="row">
                            <div class="col-lg-2">
                                @include('backend.partials.bulk', ['bulkActionUrl'=>route('ad.bulk')])
                            </div>
                            <div class="col-lg-10">
                                <div class="pull-right">
                                    {{$ads->appends($criteria)->links()}}
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection('content')