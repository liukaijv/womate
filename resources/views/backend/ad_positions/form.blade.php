<div class="box-body">

    <div class="row m-t-sm">
        <div class="col-lg-10 col-lg-offset-2">
            @include('backend.partials.errors')
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">广告位名称</label>

        <div class="col-lg-10">
            <input type="text" placeholder="名称" class="form-control" name="name"
                   value="{{$ad_position->name or old('name')}}">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">展示宽度</label>

        <div class="col-lg-10">
            <input type="number" placeholder="宽度" class="form-control" name="width"
                   value="{{$ad_position->width or (old('width')?old('width'): '0')}}" min="0">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">展示高度</label>

        <div class="col-lg-10">
            <input type="number" placeholder="高度" class="form-control" name="height"
                   value="{{$ad_position->height or (old('height')?old('height'): '0')}}" min="0">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">新页面打开</label>

        <div class="col-lg-10">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="is_blank" @if($ad_position->is_blank==1) checked @endif value="1"> 是
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