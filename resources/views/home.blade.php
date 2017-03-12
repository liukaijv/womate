@extends('layout')

@section('content')

    <div class="banner-wrapper">
        <div class="banner">
            <ul>
                @foreach($banners as $item)
                    <li data-transition="random-static" data-slotamount="7" data-masterspeed="1000"
                        data-saveperformance="on">
                        <img src="{{$item->image}}">
                        @if($item->description)
                            <div class="tp-caption title-slide" data-x="40" data-y="100" data-speed="1000"
                                 data-start="1000"
                                 data-easing="Power3.easeInOut">
                                {{$item->name}}
                            </div>
                        @endif
                        @if($item->description)
                            <div class="tp-caption desc-slide" data-x="40" data-y="240" data-speed="1000"
                                 data-start="1500"
                                 data-easing="Power3.easeInOut">
                                {{$item->description}}
                            </div>
                        @endif
                        @if($item->url)
                            <div class="tp-caption flat-button-slider bg-button-slider-32bfc0" data-x="40" data-y="370"
                                 data-speed="1000" data-start="2000" data-easing="Power3.easeInOut">
                                <a href="{{$item->url}}">查看更多</a>&nbsp;<i class="fa fa-chevron-right"></i>
                            </div>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    @if(count($recommend_products))
        <div class="section">
            <div class="container">
                <ul class="items-wrapper">
                    @foreach($recommend_products as $item)
                        <li>
                            <img class="lazy" data-original="{{$item->cover_image}}">
                            <div class="box-mask"></div>
                            <div class="box-content">
                                <div class="box-title">{{$item->name}}</div>
                                <div class="box-description">
                                    {{$item->description}}
                                </div>
                                <a class="box-redmore" href="{{route('product',['id'=>$item->id])}}">查看详情</a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <div class="section">
        <div class="container">
            <div class="section-title">
                <h2>我们的服务</h2>
            </div>
            <ul class="siverce-wrapper">
                <li>
                    <div class="icon-rounded">
                        <i class="fa fa-bolt"></i>
                    </div>
                    <div class="box">
                        <div class="box-title">
                            <a href="#">实名认证</a>
                        </div>
                        <div class="box-content">
                            使用公安部专用扫描仪器验证
                            每一位阿姨的身份证件，确保
                            身份真实。
                        </div>
                    </div>
                </li>
                <li>
                    <div class="icon-rounded">
                        <i class="fa fa-pencil-square-o"></i>
                    </div>
                    <div class="box">
                        <div class="box-title">
                            <a href="#">诚信体系</a>
                        </div>
                        <div class="box-content">
                            根据阿姨的行为数据打造独家
                            诚信体系，不断突显出安全优
                            秀的阿姨供雇主挑选。
                        </div>
                    </div>
                </li>
                <li>
                    <div class="icon-rounded">
                        <i class="fa fa-bullhorn"></i>
                    </div>
                    <div class="box">
                        <div class="box-title">
                            <a href="#">家政保险</a>
                        </div>
                        <div class="box-content">
                            与保险公司联手打造专项家政
                            保险，为雇主与阿姨双方提供
                            全方位保护。
                        </div>
                    </div>
                </li>
                <li>
                    <div class="icon-rounded">
                        <i class="fa fa-bolt"></i>
                    </div>
                    <div class="box">
                        <div class="box-title">
                            <a href="#">CREATIVE DESIGN</a>
                        </div>
                        <div class="box-content">
                            Nullam ultricies urna id ornare interdum. Maecenas ut suscipit mauris, non sodales metus.
                        </div>
                    </div>
                </li>
                <li>
                    <div class="icon-rounded">
                        <i class="fa fa-bolt"></i>
                    </div>
                    <div class="box">
                        <div class="box-title">
                            <a href="#">CREATIVE DESIGN</a>
                        </div>
                        <div class="box-content">
                            Nullam ultricies urna id ornare interdum. Maecenas ut suscipit mauris, non sodales metus.
                        </div>
                    </div>
                </li>
                <li>
                    <div class="icon-rounded">
                        <i class="fa fa-bolt"></i>
                    </div>
                    <div class="box">
                        <div class="box-title">
                            <a href="#">CREATIVE DESIGN</a>
                        </div>
                        <div class="box-content">
                            Nullam ultricies urna id ornare interdum. Maecenas ut suscipit mauris, non sodales metus.
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="section feedback">
        <div class="container">
            <div class="left" style="width: 38%;">
                <div class="section-title">
                    <h2>在线预约</h2>
                    <div class="description">
                        您可以在线预约您的服务需求，收到信息后客服会尽快和您联系。
                    </div>
                </div>
            </div>
            <div class="right" style="width: 60%">
                {!! Form::open(['method'=>'POST','url'=>route('feedback'), 'id'=>'feedback-form']) !!}
                <div class="clearfix">
                    <div class="input-group left" style="width: 48%;">
                        <label>选择服务</label>
                        <select class="input" name="service_id">
                            <option value="0">选择您的服务</option>
                            @foreach($all_product_catalog as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group right" style="width: 48%;">
                        <label>姓名</label>
                        <input type="text" placeholder="输入您的姓名" class="input" name="name">
                    </div>
                </div>
                <div class="clearfix">
                    <div class="input-group left" style="width: 48%;">
                        <label>联系电话</label>
                        <input type="text" placeholder="输入联系电话" class="input" name="mobile">
                    </div>
                    <div class="input-group right" style="width: 48%;">
                        <label>备注说明</label>
                        <input type="text" placeholder="输入备注说明" class="input" name="remark">
                    </div>
                </div>
                <div class="clearfix">
                    <button type="submit" class="btn" id="submit-order">立即预约</button>
                    <span class="feedback-tip">fafafa</span>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <div class="section-title style2">
                <h2>您的认可是我们前进的动力，已积累满意客户1000+ </h2>
            </div>
            <ul class="testimonials">
                <li>
                    <div class="avatar">
                        <img class="lazy" data-original="images/avatar.jpg">
                    </div>
                    <div class="message">
                        <div class="name">
                            雇主对卓阿姨说
                        </div>
                        <div class="whisper">
                            你真诚、专业的服务感染着我们全家人，让我们能够安心地工作，不为家事分心。卓阿姨你是一个不可多得的好阿姨。
                        </div>
                    </div>
                </li>
                <li>
                    <div class="avatar">
                        <img class="lazy" data-original="images/avatar.jpg">
                    </div>
                    <div class="message">
                        <div class="name">
                            雇主对杨阿姨说
                        </div>
                        <div class="whisper">
                            从来没有遇到过把老人当做自己的亲人，这么用心、上心、好心地对待老人的阿姨。
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

@endsection

@section('footer')
    <script>
        $(function () {
            $('#feedback-form').submit(function () {
                var form = $(this);
                form.ajaxSubmit(function (result) {
                    if (typeof result.msg != 'string') {
                        result.msg = result.msg[0];
                    }
                    $('.feedback-tip').show().html(result.msg).delay(3000).fadeOut();
                    if(result.success == true){
                        form.resetForm();
                    }
                });
                return false;
            });
        });
    </script>
@endsection