<div class="box-body">

    <div class="row m-t-sm">
        <div class="col-lg-10 col-lg-offset-2">
            @include('backend.partials.errors')
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">名称</label>

        <div class="col-lg-10">
            <input type="text" placeholder="名称" class="form-control" name="name"
                   value="{{$ad->name or old('name')}}">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">描述</label>

        <div class="col-lg-10">
            <textarea placeholder="描述" class="form-control" name="description"
                      rows="4">{{$ad->description or old('description')}}</textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">所属广告位</label>

        <div class="col-lg-10">
            <select class="form-control" name="position_id">
                <option value="">选择广告位</option>
                @foreach($ad_positions as $item)
                    <option value="{{$item->id}}"
                            @if($ad->position_id == $item->id || $position_id == $item->id) selected @endif>{{$item->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">广告图片</label>

        <div class="col-lg-2">
            <div class="input-group">
                <input type="text" disabled class="form-control" placeholder="请先上传"
                       value="{{$ad->image or old('image')}}">
                <input type="hidden" class="form-control" name="image"
                       value="{{$ad->image or old('image')}}">
              <span class="input-group-btn">
                <label class="btn btn-primary upload-btn">上传图片
                    <input type="file" name="file" accept="image/*" id="upload-file"
                           data-url="{{route('backend.upload')}}" data-dir="ad">
                </label>
              </span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">链接</label>

        <div class="col-lg-10">
            <input type="text" placeholder="链接" class="form-control" name="url"
                   value="{{$ad->url or old('url')}}">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">排序</label>

        <div class="col-lg-10">
            <input type="number" placeholder="排序" class="form-control" name="sort"
                   value="{{$ad->sort or (old('sort')?old('sort'):255)}}">
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