@extends('layout')

@section('title')-{{$product->name}}@endsection

@section('content')

    @include('partials.path', ['top_path'=>'产品中心','current_path'=>$product->catalog->name])

    <div class="container product-detail">

        <div class="content left">
            <div class="product-image">
                <img class="lazy" data-original="{{$product->cover_image}}">
            </div>
            <div class="section-title">
                <h2>服务详情</h2>
            </div>
            <div class="post-content">
                {!!$product->content!!}
            </div>
        </div>


        <div class="sidebar right">
            <div class="sidebar-inner">

                <h3 class="title-product-detail">{{$product->name}}</h3>
                <div class="product-description">
                    {{$product->description}}
                </div>
                <div class="price-panel">
                    <p>价格： {{$product->price_display?$product->price_display:$product->price}}</p>
                    <p>预约金： <span class="pirce1">&yen;{{$product->subscription}}/人</span></p>
                </div>
                <ul class="product-options">
                    @foreach($product->options as $key=>$value)
                        <li>
                            {{$key}}： {{$value}}
                        </li>
                    @endforeach
                </ul>
                <div class="">
                    <button type="button" class="btn order-btn">立即预定</button>
                </div>
            </div>
        </div>


    </div>

@endsection