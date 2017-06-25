@extends('layout')

@section('title')@if($post_catalog)-{{$post_catalog->name}}@endif @endsection

@section('content')

    @include('partials.path', ['top_path'=>'新闻中心','current_path'=>$post_catalog?$post_catalog->name:'新闻中心'])

    <div class="container">
        <div class="content left">

            <ul class="post-list">
                @foreach($posts as $post)
                    <li>
                        <a href="{{route('post',['id'=>$post->id])}}" class="post-title">{{$post->title}}</a>
                        <ul class="post-meta">
                            <li>
                                <i class="fa fa-user-o"></i> 管理员
                            </li>
                            {{--<li>--}}
                            {{--<i class="fa fa-folder-open-o"></i> <a--}}
                            {{--href="{{route('posts',['id'=>$post->catalog->id])}}">{{$post->catalog->name}}</a>--}}
                            {{--</li>--}}
                            <li>
                                <i class="fa fa-clock-o"></i> {{$post->created_at}}
                            </li>
                            <li>
                                <i class="fa fa-eye"></i> {{$post->hits}}
                            </li>
                        </ul>
                        <div class="post-content">
                            @if($post->description)
                                {{$post->description}}
                            @else
                                {!!str_limit(strip_tags($post->content),300)!!}
                            @endif
                        </div>
                        <a href="{{route('post',['id'=>$post->id])}}" class="post-detail-btn">查看详情</a>
                    </li>
                @endforeach
            </ul>

            {{$posts->render()}}

        </div>
        <div class="sidebar right">
            <div class="sidebar-inner">
                <ul class="sidebar-nav">
                    @foreach($catalogs as $item)
                        <li>
                            <a href="{{route('posts', ['id'=>$item->id])}}"
                               class="@if($post_catalog && $item->id == $post_catalog->id) active @endif">{{$item->name}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
@endsection