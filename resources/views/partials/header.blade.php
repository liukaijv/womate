<div class="top">
    <div class="container">

        <ul class="list-inline left">
            <li>
                <i class="fa fa-phone color-active"></i>
                <span>{{$settings['mobile']}}</span>
            </li>
            <li>
                <i class="fa fa-envelope color-active"></i>
                <span>{{$settings['email']}}</span>
            </li>
        </ul>

        <div class="top-links right">
            <a href="/"><i class="fa fa-tablet"></i></a>
            @if($settings['tencent_weibo'])
                <a href="{{$settings['tencent_weibo']}}"><i class="fa fa-tencent-weibo"></i></a>
            @endif
            @if($settings['sina_weibo'])
                <a href="{{$settings['sina_weibo']}}"><i class="fa fa-weibo"></i></a>
            @endif
        </div>

    </div>
</div>
<div class="header">
    <div class="container">
        <a href="/" class="logo left">
            <img src="{{asset('images/logo.png')}}" width="120">
        </a>
        <?php $segment = request()->segment(1);?>
        <?php $segment2 = request()->segment(2);?>
        <ul class="nav right">
            <li>
                <a href="/" class="@if($segment=='') active @endif">首页</a>
            </li>
            <li>
                <a href="{{route('about')}}" class="@if($segment=='about' && $segment2!=4) active @endif">关于我们</a>
            </li>
            <li>
                <a href="{{route('posts')}}" class="@if(str_contains($segment, 'post')) active @endif">新闻中心</a>
            </li>
            <li>
                <a href="{{route('products')}}" class="@if(str_contains($segment, 'product')) active @endif">产品中心</a>
            </li>
            <li>
                <a href="{{route('recruit')}}" class="@if(str_contains($segment, 'recruit')) active @endif">人才招聘</a>
            </li>
            <li>
                <a href="{{route('about',['id'=>4])}}"
                   class="@if($segment=='about' && $segment2==4) active @endif">联系我们</a>
            </li>

        </ul>
    </div>
</div>