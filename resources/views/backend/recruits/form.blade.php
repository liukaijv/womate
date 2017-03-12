<div class="box-body">

    <div class="row m-t-sm">
        <div class="col-lg-10 col-lg-offset-2">
            @include('backend.partials.errors')
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">招聘职位</label>

        <div class="col-lg-10">
            <input type="text" placeholder="职位" class="form-control" name="name"
                   value="{{$recruit->name or old('name')}}">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">所属部门</label>

        <div class="col-lg-10">
            <input type="text" placeholder="部门" class="form-control" name="department"
                   value="{{$recruit->department or old('department')}}">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">招聘人数</label>

        <div class="col-lg-10">
            <input type="number" placeholder="人数" class="form-control" name="number" min="1"
                   value="{{$recruit->number or (old('number')?old('number'): '1')}}">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">工作地址</label>

        <div class="col-lg-10">
            <input type="text" placeholder="地址" class="form-control" name="address"
                   value="{{$recruit->address or old('address')}}">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">职位介绍</label>

        <div class="col-lg-10">
            <script id="container" name="content"
                    type="text/plain">{!! $recruit->content or old('content')  !!}</script>
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
