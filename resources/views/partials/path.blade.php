<div class="page-title parallax"
     @if($page_banner) style="background: url('{{asset($page_banner->image)}}') fixed" @endif>
    <div class="overlay"></div>
    <div class="container">
        <div class="page-title-heading">{{isset($top_path)?$top_path:$current_path}}</div>
        <div class="breadcrumbs">
            <ul>
                <li>
                    当前位置：
                </li>
                <li>
                    <a href="/"><span>首页</span></a>
                    <span class="divider">/</span>
                </li>
                <li class="active">
                    <span>{{$current_path}}</span>
                </li>
            </ul>
        </div>
    </div>
</div>