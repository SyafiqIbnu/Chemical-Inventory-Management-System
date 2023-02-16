<li class="{{$class}}">
    <p style="margin:0px;display: flex;">
        <a style="padding: 8px 15px;" href="#{{$id}}" data-target=".{{$id}}" data-toggle="tab"><span class='text'>{{$title}}</span></a>
        @if(isset($idEdit) && isset($permission) && Auth::user()->can($permission))
            <span data-toggle="customTab" data-target=".{{$idEdit}}" class="text btn btn-primary" style="border-radius: 0px;margin-bottom: 3px;"><i class="fa fa-pencil"></i></span>
        @endif
    </p>
</li>