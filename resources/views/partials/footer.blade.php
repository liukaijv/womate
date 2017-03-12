<div class="mail-chimp">
    <div class="container">
        <div class="text left" style="width: 65%;">
            <h2>需要更多的服务？</h2>
            <p>
                我们有专业的团队真诚为您提供各种清洁服务，可以根据您的需求筛选最优服务。
            </p>
        </div>
        <div class="right" style="width: 30%;">
            <a href="{{route('products')}}" class="btn btn-reverse">去挑选优质服务</a>
        </div>
    </div>
</div>

<div class="footer">
    <div class="container">
        <div class="left wp25">
            <div class="widget ">
                <h4 class="widget-title">关于我们</h4>
                <p class="contact-intro">
                    {{$settings['company_intro']}}
                </p>
                <ul class="contact-info">
                    <li>
                        <i class="fa fa-map-marker"></i>
                        {{$settings['address']}}
                    </li>
                    <li>
                        <i class="fa fa-phone"></i>
                        {{$settings['mobile']}}
                    </li>
                    <li>
                        <i class="fa fa-envelope"></i>
                        {{$settings['email']}}
                    </li>
                </ul>
            </div>
        </div>
        <div class="left wp25">
            <div class="widget ">
                <h4 class="widget-title">公司动态</h4>
                <ul class="post-list">
                    @foreach($latest_posts as $item)
                        <li>
                            <a href="{{route('post',['id'=>$item->id])}}">{{$item->title}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="left wp25">
            <div class="widget ">
                <h4 class="widget-title">帮助中心</h4>
                <ul class="post-list">
                    @foreach($help_posts as $item)
                        <li>
                            <a href="{{route('post',['id'=>$item->id])}}">{{$item->title}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="bottom">
    <div class="container">
       {!! $settings['footer_info'] !!}
    </div>
</div>