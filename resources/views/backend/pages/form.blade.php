<div class="box-body">

    <div class="row m-t-sm">
        <div class="col-lg-10 col-lg-offset-2">
            @include('backend.partials.errors')
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">标题</label>

        <div class="col-lg-10">
            <input type="text" placeholder="标题" class="form-control" name="title"
                   value="{{$page->title or old('title')}}">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">内容</label>

        <div class="col-lg-10">
            <script id="container" name="content" type="text/plain">{!! $page->content or old('content')  !!}</script>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">侧边栏显示</label>

        <div class="col-lg-10">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="in_sidebar" @if($page->in_sidebar==true || !isset($page->in_sidebar)) checked
                           @endif value="1"> 是
                </label>
            </div>
        </div>
    </div>
</div>
<div class="box-footer">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-2">
            <button class="btn btn-primary" type="submit">提交</button>
        </div>
    </div>
</div>

@section('footer')
    @include('UEditor::head')
    <script>
        var ue = UE.getEditor('container', {
            initialFrameHeight: 300
        });
        ue.ready(function () {
            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');
        });
    </script>
@endsection
