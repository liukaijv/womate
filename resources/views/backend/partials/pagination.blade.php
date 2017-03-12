<div class="row">
    <div class="col-lg-2">
        <form id="action_form" action="{{$action_url}}" method="POST">
            <div class="input-group" style="margin: 20px 0;">
                {{csrf_field()}}
                <input type="hidden" id="checked_id" name="checked_id">
                <select class="form-control" name="action">
                    <option value="">请选择</option>
                    <option value="delete">删除</option>
                </select>
                <div class="input-group-btn">
                    <button class="btn btn-primary" type="submit" id="confirm_action">批量操作</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-lg-10">
        <div class="pull-right">
            {{$paginate->links()}}
        </div>
    </div>
</div>
