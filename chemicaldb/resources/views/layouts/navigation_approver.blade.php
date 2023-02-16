@component('layouts.components.nav_li_parent',['permission'=>['permit_application_approval_*'],'title'=>__('general.approver'),'id'=>'menu-approver','icon'=>'fas fa-users']) 
	@slot('content')

	{{--company_list--}}
		@component('layouts.components.nav_li',
		['permission'=>'permit_*',
		'title'=>__('general.company_list'),'id'=>'menu-approver-company_list',
		'icon'=>'fas fa-house-user','color'=>'primary']) 
			@slot('url')
			  {{url('/company_list')}}
			@endslot 
		@endcomponent


		{{--permit_search--}}
		@component('layouts.components.nav_li',
		['permission'=>'permit_*',
		'title'=>__('general.permit_search'),'id'=>'menu-approver-permit_search',
		'icon'=>'fab fa-waze','color'=>'primary']) 
			@slot('url')
			  {{url('/permit_search')}}
			@endslot 
		@endcomponent

		{{--permit_application_approval--}}
		@component('layouts.components.nav_li',
		['permission'=>'permit_*',
		'title'=>__('general.permit_application_approval'),'id'=>'menu-approver-permit_application_approval',
		'icon'=>'fab fa-waze','color'=>'primary']) 
			@slot('url')
			  {{url('/permit_application_approval')}}
			@endslot 
		@endcomponent
		
    @endslot
@endcomponent