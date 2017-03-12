{!! Form::open(['url'=>$bulkActionUrl, 'method'=>"POST"]) !!}
<div class="input-group">
    <select class="form-control" name="action">
        <option value="">选择操作</option>
        <option value="delete">批量删除</option>
    </select>
    <input type="hidden" id="checked_id" name="checked_id">
    <span class="input-group-btn">
        <button type="button" class="btn btn-primary" type="button" id="confirm_action">批量操作</button>
    </span>
</div>
{{ Form::close() }}