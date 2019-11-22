@extends('backend.layouts.main')

@section('title')
    产品管理
@endsection('title')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-8">
            <h2></h2>
            <ol class="breadcrumb">
                <li>
                    <strong>位置：产品管理</strong>
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
                                    <h3>产品列表</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="row m-t-sm">
                            <div class="col-lg-2">
                                {!! Form::open(['url'=>route('product.index'), 'method'=>'GET']) !!}
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
                                    <a class="btn btn-white" href="{{route('product.create')}}">新增产品</a>
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
                                <td>产品名称</td>
                                <td>产品分类</td>
                                <td>封面图</td>
                                <td>状态</td>
                                <td>首页推荐</td>
                                <td>创建时间</td>
                                <td>操作</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $item)
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
                                        {{$item->catalog->name}}
                                    </td>
                                    <td>
                                        @if($item->cover_image)
                                            <a href="javascript:;"
                                               onclick="TINY.box.show({image:'{{str_contains($item->cover_image,'http')?'':'/'}}{{$item->cover_image}}',boxid:'frameless'})"><i
                                                        class="fa fa-image"></i></a>
                                        @else
                                            无
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge badge-info">{{$item->disabled?'已下架':'正常'}}</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-info">{{$item->is_recommend?'是':'否'}}</span>
                                    </td>
                                    <td>
                                        {{$item->created_at}}
                                    </td>
                                    <td>
                                        <a data-modal="form"
                                           href="{{route('product.edit',$item)}}"
                                           class="btn btn-primary btn-xs">编辑</a>
                                        {!! Form::open(['url'=>route('product.destroy',[$item]),'method'=>'DELETE', 'style'=>'display: inline-block;']) !!}
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
                                @include('backend.partials.bulk', ['bulkActionUrl'=>route('product.bulk')])
                            </div>
                            <div class="col-lg-10">
                                <div class="pull-right">
                                    {{$products->appends($criteria)->links()}}
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection('content')