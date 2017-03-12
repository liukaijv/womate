<header class="main-header">

    <a href="/backend" class="logo">
        <span class="logo-mini">管理</span>
        <span class="logo-lg"><b>管理中心</b></span>
    </a>

    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{auth()->guard('admin')->user()->image}}" class="user-image" alt="{{auth()->guard('admin')->user()->name}}">
                        <span class="hidden-xs">{{auth()->guard('admin')->user()->name}}</span>
                    </a>
                    <ul class="dropdown-menu">

                        <li class="user-header">
                            <img src="{{auth()->guard('admin')->user()->image}}" class="img-circle" alt="User Image">

                            <p>
                                {{auth()->guard('admin')->user()->name}}
                                - {{auth()->guard('admin')->user()->is_super == true ? '超级':'普通' }}管理员
                                <small>
                                    创建时间 {{date('Y-m-d',strtotime(auth()->guard('admin')->user()->created_at))}}</small>
                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href=""
                                   class="btn btn-default btn-flat">个人资料</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{action('Backend\AuthController@logout')}}"
                                   class="btn btn-default btn-flat">退出</a>
                            </div>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="#"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>