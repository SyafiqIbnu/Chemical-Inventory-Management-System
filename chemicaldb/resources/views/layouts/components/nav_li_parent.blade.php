@php
	$menuHasTreeview ="";
	$bFound=false;
	if(\App\Helpers\PermissionHelper::checkPermission($permission)){
		$bFound=true;
	}
    
	if($bFound){
		$menuHasTreeview='class="nav-item has-treeview"';
	}
@endphp

@if($bFound)
<li {!! $menuHasTreeview !!} >
    <a href="#" class="nav-link" id="{{ $id }}">
        <i class="nav-icon {{ $icon }}"></i>
        <p>{{ $title }}<i class="right fas fa-angle-left"></i></p>
    </a>
    
    <ul class="nav nav-treeview">  
        {{ $content }}
    </ul>
</li>
@endif
