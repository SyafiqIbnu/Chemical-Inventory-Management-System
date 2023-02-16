@component('layouts.components.nav_li_parent',['permission'=>['user_*','role_*','announcement_*','application_*'],'title'=>__('general.staff'),'id'=>'menu-staff','icon'=>'fas fa-users']) 
	@slot('content')

		{{--staff--}}
		@component('layouts.components.nav_li',
		['permission'=>'staff_*',
		'title'=>__('general.staff'),'id'=>'menu-staff-staff',
		'icon'=>'fas fa-house-user','color'=>'primary']) 
			@slot('url')
			  {{url('/staff')}}
			@endslot 
		@endcomponent


		{{--staff--}}
		@component('layouts.components.nav_li',
		['permission'=>'staff_*',
		'title'=>__('general.driver'),'id'=>'menu-staff-driver',
		'icon'=>'fab fa-waze','color'=>'primary']) 
			@slot('url')
			  {{url('/driver')}}
			@endslot 
		@endcomponent
		
    @endslot
@endcomponent