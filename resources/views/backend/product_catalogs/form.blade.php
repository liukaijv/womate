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
</div>
<div class="box-footer">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-2">
            <button class="btn btn-primary" type="submit">提交</button>
        </div>
    </div>
</div>