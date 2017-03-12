<div class="row border-bottom">
    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-minimalize minimalize-styl-2 btn btn-primary" data-role="toggle-navbar">
                <i class="fa fa-bars"></i>
            </button>
        </div>
        {{--<form role="search" class="navbar-form-custom" action="search_results.html">--}}
            {{--<div class="form-group">--}}
                {{--<input placeholder="Search for something..." class="form-control" name="top-search"--}}
                       {{--id="top-search" type="text">--}}
            {{--</div>--}}
        {{--</form>--}}
        <ul class="nav navbar-top-links navbar-right">
            <li>
                <span class="m-r-sm text-muted welcome-message">
                    欢迎您 {{auth()->guard('admin')->user()->name}} ！
                </span>
            </li>
            <li>
                <a href="/" target="_blank">
                    <i class="fa fa-home"></i> 站点首页
                </a>
            </li>
            <li>
                <a data-role="confirm" href="{{route('backend.logout')}}">
                    <i class="fa fa-sign-out"></i> 退出
                </a>
            </li>
        </ul>
    </nav>
</div>