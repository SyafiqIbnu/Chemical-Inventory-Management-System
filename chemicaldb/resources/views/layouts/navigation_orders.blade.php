
@component('layouts.components.nav_li_parent',
['permission'=>['booking_application_*'],
'title'=>__('general.booking'),'id'=>'menu-booking','icon'=>'fas fa-cogs']) 
	@slot('content')


		{{--booking history--}}
		@component('layouts.components.nav_li',
		['permission'=>'booking_application_*',
		'title'=>__('general.booking_application'),'id'=>'menu-booking-all',
		'icon'=>'fa fa-list','color'=>'primary']) 
			@slot('url')
			  {{url('/booking_application')}}
			@endslot 
		@endcomponent

		{{--new booking--}}
		@component('layouts.components.nav_li',
		['permission'=>'booking_application_*',
		'title'=>__('general.new').' '.__('general.booking'),'id'=>'menu-booking-create',
		'icon'=>'fa fa-plus-circle','color'=>'primary']) 
			@slot('url')
			  {{url('/booking_application/create')}}
			@endslot 
		@endcomponent

		{{--new booking--}}
		@component('layouts.components.nav_li',
		['permission'=>'booking_*',
		'title'=>__('general.confirm').' '.__('general.booking'),'id'=>'menu-booking-confirm',
		'icon'=>'fa fa-check-square-o','color'=>'primary']) 
			@slot('url')
			  {{url('/booking')}}
			@endslot 
		@endcomponent

		
	

	@endslot
  @endcomponent