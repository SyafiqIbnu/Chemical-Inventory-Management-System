@component('layouts.components.nav_li_parent',['permission'=>['user_*','role_*','announcement_*','application_*'],'title'=>__('general.registration'),'id'=>'menu-registration','icon'=>'fas fa-user-plus']) 
	@slot('content')

		
		{{--AccountApplicationCompany--}}
		@component('layouts.components.nav_li',['permission'=>'user_*',
		'title'=>__('general.account_application'),'id'=>'menu-registration-account_application',
		'icon'=>'fa fa-user-plus','color'=>'primary']) 
			@slot('url')
			  {{url('/account_application/create')}}
			@endslot 
		@endcomponent

		{{--AccountApplicationAgency--}}
		@component('layouts.components.nav_li',['permission'=>'user_*',
		'title'=>__('general.account_application_agency'),'id'=>'menu-registration-account_application_agency',
		'icon'=>'fa fa-user-plus','color'=>'primary']) 
			@slot('url')
			  {{url('/account_application_agency/create')}}
			@endslot 
		@endcomponent

		{{--AccountApplicationIndividu--}}
		@component('layouts.components.nav_li',['permission'=>'user_*',
		'title'=>__('general.account_application_individu'),'id'=>'menu-registration-account_individu',
		'icon'=>'fa fa-user-plus','color'=>'primary']) 
			@slot('url')
			  {{url('/account_application_individu/create')}}
			@endslot 
		@endcomponent

		


	@endslot
  @endcomponent