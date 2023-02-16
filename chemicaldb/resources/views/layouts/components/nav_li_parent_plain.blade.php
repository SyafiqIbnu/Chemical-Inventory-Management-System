@php
	$bShow=App\Helpers\PermissionHelper::checkMenuPermission($permission);
@endphp

@if($bShow)
@if(Request()->session()->get('platform') == 'mobile')
 <li class="nav-item has-treeview" id="{{ $id }}">
    <a href="#" class="nav-link" id="{{ $id.'_color' }}">
        <i class="nav-icon {{ $icon }}"></i>
        <p>
            {{ $title }}
            <i class="right fa fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        {{ $content }}
    </ul>
</li>
@else
<li class="treeview" id="{{ $id }}">
    <a href="#"><span style="display:inline-table;"><i class="{{ $icon }}"></i><span style="padding-left:10px;padding-right:25px;white-space:normal;display:table-cell;">{{ $title }}</span></span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
    <ul class="treeview-menu">
        {{ $content }}
    </ul>
</li>
@endif
@endif