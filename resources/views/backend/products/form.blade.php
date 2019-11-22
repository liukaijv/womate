<div class="box-body">

    <div class="row m-t-sm">
        <div class="col-lg-10 col-lg-offset-2">
            @include('backend.partials.errors')
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">产品名称</label>

        <div class="col-lg-10">
            <input type="text" placeholder="产品名称" class="form-control" name="name"
                   value="{{$product->name or old('name')}}">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">产品分类</label>

        <div class="col-lg-10">
            <select class="form-control" name="catalog_id">
                <option value="">选择分类</option>
                @foreach($catalogs as $item)
                    <option value="{{$item->id}}"
                            @if($product->catalog_id==$item->id) selected @endif>{{$item->name}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">真实价格（元）</label>

        <div class="col-lg-10">
            <input type="number" placeholder="产品价格" class="form-control" name="price"
                   value="{{$product->price or old('price')}}">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">显示价格</label>

        <div class="col-lg-10">
            <input type="text" placeholder="显示价格" class="form-control" name="price_display"
                   value="{{$product->price_display or old('price_display')}}">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">预订金（元）</label>

        <div class="col-lg-10">
            <input type="number" placeholder="预订金" class="form-control" name="subscription"
                   value="{{$product->subscription or (old('subscription')?old('subscription'):'0')}}">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">封面图片</label>

        <div class="col-lg-2">
            <div class="input-group">
                <input type="text" disabled class="form-control" placeholder="请先上传，比例380x280"
                       value="{{$product->cover_image or old('cover_image')}}">
                <input type="hidden" class="form-control" name="cover_image"
                       value="{{$product->cover_image or old('cover_image')}}">
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
        <label class="col-lg-2 control-label">产品选项</label>

        <div class="col-lg-10">
            <div class="row">
                <div class="col-lg-8 border-right" id="option-container">
                    @if($product->options)
                        @foreach($product->options as $key=>$value)
                            <div class="row option-item">
                                <div class="col-lg-5">
                                    <div class="input-group">
                                        <span class="input-group-addon">名称</span>
                                        <input placeholder="名称" class="form-control" name="option_name[]" type="text"
                                               value="{{$key}}">
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="input-group">
                                        <span class="input-group-addon">值</span>
                                        <input placeholder="值" class="form-control" name="option_value[]" type="text"
                                               value="{{$value}}">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <button class="btn btn-danger delete-option" type="button">删除</button>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="row option-item">
                            <div class="col-lg-5">
                                <div class="input-group">
                                    <span class="input-group-addon">名称</span>
                                    <input placeholder="名称" class="form-control" name="option_name[]" type="text"
                                           value="">
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="input-group">
                                    <span class="input-group-addon">值</span>
                                    <input placeholder="值" class="form-control" name="option_value[]" type="text"
                                           value="">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <button class="btn btn-danger delete-option" type="button">删除</button>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-lg-4">
                    <button class="btn btn-primary" type="button" id="add-option">添加选项</button>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">产品描述</label>

        <div class="col-lg-10">
            <textarea placeholder="描述" class="form-control" name="description"
                      rows="4">{{$product->description or old('description')}}</textarea>
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">产品介绍</label>

        <div class="col-lg-10">
            <script id="container" name="content"
                    type="text/plain">{!! $product->content or old('content')  !!}</script>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">是否下架</label>

        <div class="col-lg-10">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="disabled" @if($product->disabled==true) checked @endif value="1"> 是
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">首页推荐</label>

        <div class="col-lg-10">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="is_recommend" @if($product->is_recommend==true) checked @endif value="1"> 是
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
            initialFrameHeight: 400
        });

        ue.ready(function () {
            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');
        });

        $(function () {
            $('#add-option').on('click', function () {
                var html = '<div class="row option-item">' +
                        '<div class="col-lg-5">' +
                        '<div class="input-group">' +
                        '<span class="input-group-addon">名称</span>' +
                        '<input placeholder="名称" class="form-control" name="option_name[]" type="text">' +
                        '</div>' +
                        '</div>' +
                        '<div class="col-lg-5">' +
                        '<div class="input-group">' +
                        '<span class="input-group-addon">值</span>' +
                        '<input placeholder="值" class="form-control" name="option_value[]" type="text">' +
                        '</div>' +
                        '</div>' +
                        '<div class="col-lg-2">' +
                        '<button class="btn btn-danger delete-option" type="button">删除</button>' +
                        '</div>' +
                        '</div>';

                $('#option-container').append(html);
            });
            $('#option-container').on('click', '.delete-option', function () {
                // if ($('.option-item').length <= 1) {
                //     $.alert('不能再删除了');
                //     return;
                // }
                $(this).closest('.row').remove();
            });
        });


    </script>
@endsection
