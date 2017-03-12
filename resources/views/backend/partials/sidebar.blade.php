<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img src="{{asset('backend/img/avatar_large.jpg')}}" class="img-circle" width="60">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="clear">
                                <span class="block m-t-xs"><strong
                                            class="font-bold">{{auth()->guard('admin')->user()->name}}</strong></span>
                                <span class="text-muted text-xs block">账号资料 <b class="caret"></b></span>
                            </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="{{route('backend.setting')}}">站点设置</a></li>
                        <li class="divider"></li>
                        <li><a data-role="confirm" href="{{route('backend.logout')}}">退出</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    Wo
                </div>
            </li>
        </ul>
        <?php $segment = request()->segment(2);?>
        <ul class="nav" id="menu">
            <li class="@if($segment=='') active @endif">
                <a href="{{route('backend.index')}}">
                    <i class="fa fa-dashboard"></i>
                    <span class="nav-label">管理首页</span>
                </a>
            </li>
            <li>
                <a>
                    <i class="fa fa-file"></i>
                    <span class="nav-label">单页管理</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li class="@if($segment=='page') active @endif"><a href="{{route('page.index')}}">单页列表</a></li>
                </ul>
            </li>
            <li>
                <a>
                    <i class="fa fa-book"></i>
                    <span class="nav-label">文章管理</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li class="@if($segment=='post_catalog') active @endif"><a href="{{route('post_catalog.index')}}">文章分类</a>
                    </li>
                    <li class="@if($segment=='post') active @endif"><a href="{{route('post.index')}}">文章列表</a></li>
                </ul>
            </li>
            <li>
                <a>
                    <i class="fa fa-cubes"></i>
                    <span class="nav-label">产品管理</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li class="@if($segment=='product_catalog') active @endif"><a
                                href="{{route('product_catalog.index')}}">产品分类</a></li>
                    <li class="@if($segment=='product') active @endif"><a href="{{route('product.index')}}">产品列表</a>
                </ul>
            </li>
            <li>
                <a>
                    <i class="fa fa-group"></i>
                    <span class="nav-label">招聘管理</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li class="@if($segment=='recruit') active @endif"><a href="{{route('recruit.index')}}">招聘列表</a>
                    </li>
                </ul>
            </li>
            <li>
                <a>
                    <i class="fa fa-comment"></i>
                    <span class="nav-label">预约留言</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li class="@if($segment=='feedback') active @endif"><a href="{{route('feedback.index')}}">预约列表</a>
                    </li>
                </ul>
            </li>
            {{--<li>--}}
                {{--<a>--}}
                    {{--<i class="fa fa-book"></i>--}}
                    {{--<span class="nav-label">订单管理</span>--}}
                    {{--<span class="fa arrow"></span>--}}
                {{--</a>--}}
            {{--</li>--}}
            <li>
                <a>
                    <i class="fa fa-picture-o"></i>
                    <span class="nav-label">广告管理</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li class="@if($segment=='ad_position') active @endif"><a href="{{route('ad_position.index')}}">广告位管理</a>
                    </li>
                    <li class="@if($segment=='ad') active @endif"><a href="{{route('ad.index')}}">广告列表</a></li>
                </ul>
            </li>
            <li class="@if($segment=='setting') active @endif">
                <a href="{{route('backend.setting')}}">
                    <i class="fa fa-cog"></i>
                    <span class="nav-label">站点设置</span>
                </a>
            </li>
        </ul>

    </div>
</nav>