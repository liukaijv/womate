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
                   value="{{$catalog->name or old('name')}}">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">上级分类</label>

        <div class="col-lg-10">
            <select class="form-control" name="parent_id">
                <option value="0">上级分类</option>
                @foreach($catalogs as $item)
                    <option value="{{$item->id}}"
                            @if($catalog->parent_id == $item->id ) selected @endif>{{$item->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">描述</label>

        <div class="col-lg-10">
            <textarea placeholder="描述" class="form-control" name="description"
                      rows="4">{{$catalog->description or old('description')}}</textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">排序</label>

        <div class="col-lg-10">
            <input type="number" placeholder="排序" class="form-control" name="sort"
                   value="{{$catalog->sort or old('sort')}}">
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