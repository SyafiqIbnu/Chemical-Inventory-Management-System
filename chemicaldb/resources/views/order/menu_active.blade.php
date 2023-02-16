

@push('scriptsDocumentReady')
	@php
		$name = Route::currentRouteName();
		$menuActives=[];
		if($name=="order.index"){
			$menuActives[]="menu-order-all";	
		}elseif($name=="order.reviewer"){
			$menuActives[]="menu-order-review";	
		}elseif($name=="order.approver"){
			$menuActives[]="menu-order-approve";	
		}elseif($name=="order.receiver"){
			$menuActives[]="menu-order-receive";	
		}
		
		if($menuActives==""){
			$menuActives[]="menu-order-all";
		}		

	@endphp
	
	@foreach ($menuActives as $menuActive)
    	setMenuActive('{{ $menuActive }}');
	@endforeach
	

@endpush