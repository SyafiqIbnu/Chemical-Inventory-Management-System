@component('layouts.components.nav_li_parent',
['permission'=>'*',
'title'=>__('general.system_administration'),'id'=>'menu-administration','icon'=>'fas fa-cogs']) 
	@slot('content')

		{{--User--}}
		@component('layouts.components.nav_li',['permission'=>'*',
		'title'=>__('general.user'),'id'=>'menu-administration-user',
		'icon'=>'fa fa-users','color'=>'primary']) 
			@slot('url')
			  {{url('user')}}
			@endslot 
		@endcomponent

		
		{{--Role--}}
		@component('layouts.components.nav_li',
		['permission'=>'*',
		'title'=>__('general.role'),'id'=>'menu-administration-role',
		'icon'=>'fa fa-user-shield','color'=>'primary']) 
			@slot('url')
			  {{url('/role')}}
			@endslot 
		@endcomponent


	

	@endslot
  @endcomponent