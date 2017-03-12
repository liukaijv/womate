@extends('layout')

@section('title')-人才招聘@endsection

@section('content')

    @include('partials.path', ['top_path'=>'人才招聘','current_path'=>'人才招聘'])

    <div class="container page-content">

        <ul class="recruit-list">
            @foreach($recruits as $item)
                <li>
                    <div class="recruit-header">
                        <span>{{$item->name}}</span>
                        <span>{{$item->updated_at}}</span>
                        <a class="toggle-recruit"><i class="fa fa-chevron-up"></i> </a>
                    </div>
                    <div class="recruit-detail">
                        <div>招聘人数：{{$item->number}}</div>
                        <div class="mt10">招聘部门：{{$item->department}}</div>
                        <div class="mt10">工作地点：{{$item->address}}</div>
                        <div class="mt10">职位介绍：</div>
                        <div class="mt10">
                            {{$item->content}}
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>

        {{$recruits->render()}}
    </div>
@endsection

@section('footer')
<script>
    $(function () {
        $('.recruit-header').on('click', function () {
            var me = $(this);
            me.next('.recruit-detail').slideToggle();
            me.find('.toggle-recruit i').toggleClass('fa-chevron-down')
        })
    });
</script>
@endsection