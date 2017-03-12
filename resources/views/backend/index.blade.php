@extends('backend.layouts.main')

@section('content')

    <div class=" wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>文章</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins"><a href="{{route('post.index')}}">{{$post_count}}</a></h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>产品</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins"><a href="{{route('product.index')}}">{{$product_count}}</a></h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>招聘</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins"><a href="{{route('recruit.index')}}">{{$recruit_count}}</a></h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>广告</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins"><a href="{{route('ad.index')}}">{{$ad_count}}</a></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection