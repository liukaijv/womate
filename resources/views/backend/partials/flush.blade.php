@if(session('success'))
    <div class="alert alert-success alert-dismissable" style="margin-top: 20px;">
        <button data-dismiss="alert" class="close" type="button">×</button>
        {{session('success')}}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissable" style="margin-top: 20px;">
        <button data-dismiss="alert" class="close" type="button">×</button>
        {{session('error')}}
    </div>
@endif