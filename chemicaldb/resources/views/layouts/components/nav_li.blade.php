@php
	$bFound=false;	   
	if(isset($permission)){
        
        if(\App\Helpers\PermissionHelper::checkPermission($permission)){
    		$bFound=true;
    	}
	}

@endphp

@if($bFound)

<li class="nav-item">
    <a href="{!! $url !!}" class="nav-link" id="{{ $id ?? null}}">
        <i class="{{ $icon ?? null}} nav-icon"></i>
        <p>{{ $title ?? null}}</p>
        @if(isset($counter))
            <span class="pull-right-container"><span class="{{ $id ?? null}} label label-{{$color ?? null}} pull-right">
                <i class="fa fa-spinner"></i>
            </span></span>
        @endif
    </a>
</li>
@endif
