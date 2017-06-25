@extends('layout')

@section('title')-{{$post->title}}@endsection

@section('content')

    @include('partials.path', ['top_path'=>'新闻中心','current_path'=>$post->catalog->name])

    <div class="container">
        <div class="content left">

            <h2 class="post-title">{{$post->title}}</h2>
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
                {!! $post->content !!}

            </div>

        </div>
        <div class="sidebar right">
            <div class="sidebar-inner">
                <ul class="sidebar-nav">
                    @foreach($catalogs as $item)
                        <li>
                            <a href="{{route('posts', ['id'=>$item->id])}}"
                               class="@if($item->id == $post->catalog_id    ) active @endif">{{$item->name}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
@endsection