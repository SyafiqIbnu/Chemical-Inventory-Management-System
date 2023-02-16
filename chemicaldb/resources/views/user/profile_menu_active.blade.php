@php
	if(!isset($menu_active_id)){
		$menu_active_id="menu-profile-user";
	}
@endphp
@push('scriptsDocumentReady')
	setMenuActive('{{$menu_active_id}}');
@endpush