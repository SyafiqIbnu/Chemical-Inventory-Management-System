
@component('layouts.components.nav_li_parent',
	['permission'=>['permit_application_review_*'],
	'title'=>__('general.reviewer'),
	'id'=>'menu-reviewer',
	'icon'=>'fas fa-users'])

	@slot('content')
	
		{{--company_list--}}
		@component('layouts.components.nav_li',
			[
				'permission'=>'permit_*',
				'title'=>__('general.company_list'),
				'id'=>'menu-reviewer-company_list',
				'icon'=>'fas fa-house-user',
				'color'=>'primary'
			]
			)

			@slot('url')
			  {{url('/company_list')}}
			@endslot

		@endcomponent

		{{--permit_search--}}
		@component('layouts.components.nav_li',
		['permission'=>'permit_*',
		'title'=>__('general.permit_search'),'id'=>'menu-reviewer-permit_search',
		'icon'=>'fab fa-waze','color'=>'primary'])
			@slot('url')
			{{url('/permit_search')}}
			@endslot
		@endcomponent

		{{--permit_application_review--}}
		@component('layouts.components.nav_li',
		['permission'=>'permit_*',
		'title'=>__('general.permit_application_review'),'id'=>'menu-reviewer-permit_application_review',
		'icon'=>'fab fa-waze','color'=>'primary'])
			@slot('url')
			  {{url('/permit_application_review')}}
			@endslot
		@endcomponent

    @endslot
@endcomponent
