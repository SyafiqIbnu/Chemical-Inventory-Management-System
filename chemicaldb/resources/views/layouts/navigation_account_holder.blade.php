@if(\App\Helpers\UserModelDataHelper::getUserIsAccountHolder())
	@component('layouts.components.nav_li_parent',['permission'=>['permit_*','permit_application_*'],'title'=>__('general.account_holder'),'id'=>'menu-account_holder','icon'=>'fas fa-users']) 
		@slot('content')

			{{--Permits--}}
			@component('layouts.components.nav_li',
			['permission'=>'permit_*',
			'title'=>__('general.permit_list'),'id'=>'menu-account_holder-permit',
			'icon'=>'fas fa-house-user','color'=>'primary']) 
				@slot('url')
				{{url('/permit')}}
				@endslot 
			@endcomponent


			{{--Permit Application--}}
			@component('layouts.components.nav_li',
			['permission'=>'permit_application_*',
			'title'=>__('general.permit_application_list'),'id'=>'menu-account_holder-permit_application',
			'icon'=>'fas fa-house-user','color'=>'primary']) 
				@slot('url')
				{{url('/permit_application')}}
				@endslot 
			@endcomponent


			{{--Permit Application Cancelled--}}
			@component('layouts.components.nav_li',
			['permission'=>'permit_application_*',
			'title'=>__('general.permit_cancelled'),'id'=>'menu-account_holder-permit_cancelled',
			'icon'=>'fas fa-house-user','color'=>'primary']) 
				@slot('url')
				{{url('/permit_application/cancelled')}}
				@endslot 
			@endcomponent
			
		@endslot
	@endcomponent
@endif