@php
	if(!isset($menu_active_id)){
		$menu_active_id="menu-profile-upline";
	}
@endphp
@push('scriptsDocumentReady')
	setMenuActive('{{$menu_active_id}}');
@endpush