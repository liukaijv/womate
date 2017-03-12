@extends('layout')

@section('title')-{{$page->title}}@endsection

@section('content')

    @include('partials.path', ['top_path'=>'关于我们','current_path'=>$page->title])

    <div class="container">

        <div class="content left">
            <div class="post-content">
                {!! $page->content !!}
            </div>
        </div>


        <div class="sidebar right">
            <div class="sidebar-inner">
                <ul class="sidebar-nav">
                    @foreach($all_pages as $item)
                        <li>
                            <a href="{{route('about', ['id'=>$item->id])}}"
                               class="@if($item->id == $page->id) active @endif">{{$item->title}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>


    </div>

@endsection