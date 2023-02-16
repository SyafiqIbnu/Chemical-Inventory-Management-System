@component('layouts.components.nav_li_parent',
['permission'=>[''],
'title'=>__('general.product'),'id'=>'menu-reference','icon'=>'fas fa-cogs']) 
	@slot('content')


		{{--states--}}
		@component('layouts.components.nav_li',
		['permission'=>'',
		'title'=>__('general.faculty'),'id'=>'menu-reference-faculty',
		'icon'=>'fa fa-cutlery','color'=>'primary']) 
			@slot('url')
			  {{url('/faculty')}}
			@endslot 
		@endcomponent
		
	

	@endslot
  @endcomponent