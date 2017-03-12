@if(count($errors))
    <div class="alert alert-danger alert-dismissable text-left">
        <button data-dismiss="alert" class="close" type="button">×</button>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif