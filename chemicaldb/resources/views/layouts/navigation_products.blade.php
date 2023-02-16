@component('layouts.components.nav_li_parent',
['permission'=>['user_*'],
'title'=>__('general.product'),'id'=>'menu-product','icon'=>'fas fa-cogs']) 
	@slot('content')


		{{--states--}}
		@component('layouts.components.nav_li',
		['permission'=>'nasiarab_*',
		'title'=>__('general.nasiarab'),'id'=>'menu-product-nasiarab',
		'icon'=>'fa fa-cutlery','color'=>'primary']) 
			@slot('url')
			  {{url('/nasiarab')}}
			@endslot 
		@endcomponent

	

	@endslot
  @endcomponent