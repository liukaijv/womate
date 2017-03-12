@extends('layout')

@section('title')@if($product_catalog)-{{$product_catalog->name}}@endif @endsection

@section('content')

    @include('partials.path', ['top_path'=>'产品中心','current_path'=>$product_catalog?$product_catalog->name:'产品中心'])


    <div class="container page-content">

        <ul class="product-catalog">
            <li>
                <a href="{{route('products')}}"
                   class="btn @if(!$product_catalog ) active @endif">全部</a>
            </li>
            @foreach($catalogs as $item)
                <li>
                    <a href="{{route('products',['id'=>$item->id])}}"
                       class="btn @if($product_catalog && $product_catalog->id==$item->id) active @endif">{{$item->name}}</a>
                </li>
            @endforeach
        </ul>

        <ul class="items-wrapper">
            @foreach($products as $product)
                <li>
                    <img class="lazy" data-original="{{$product->cover_image}}">
                    <div class="box-mask"></div>
                    <div class="box-content">
                        <div class="box-title">{{$product->name}}</div>
                        <div class="box-description">
                            {{$product->description}}
                        </div>
                        <a class="box-redmore" href="{{route('product', ['id'=>$product->id])}}">查看详情</a>
                    </div>
                </li>
            @endforeach
        </ul>

        {{$products->render()}}


    </div>
@endsection