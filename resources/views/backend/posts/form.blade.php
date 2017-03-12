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
                   value="{{$post->title or old('title')}}">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">上级分类</label>

        <div class="col-lg-10">
            <select class="form-control" name="catalog_id">
                <option value="">选择分类</option>
                @foreach($catalogs as $item)
                    <option value="{{$item->id}}"
                            @if($post->catalog_id==$item->id) selected @endif>{{$item->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">封面图片</label>

        <div class="col-lg-2">
            <div class="input-group">
                <input type="text" disabled class="form-control" placeholder="请先上传"
                       value="{{$post->cover_image or old('cover_image')}}">
                <input type="hidden" class="form-control" name="cover_image"
                       value="{{$post->cover_image or old('cover_image')}}">
              <span class="input-group-btn">
                <label class="btn btn-primary upload-btn">上传封面
                    <input type="file" name="file" accept="image/*" id="upload-file"
                           data-url="{{route('backend.upload')}}" data-dir="post">
                </label>
              </span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">描述</label>

        <div class="col-lg-10">
            <textarea placeholder="描述" class="form-control" name="description"
                      rows="4">{{$post->description or old('description')}}</textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">内容</label>

        <div class="col-lg-10">
            <script id="container" name="content" type="text/plain">{!! $post->content or old('content')  !!}</script>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">前台显示</label>

        <div class="col-lg-10">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="visible" @if($post->visible==true || !isset($post->visible)) checked
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
