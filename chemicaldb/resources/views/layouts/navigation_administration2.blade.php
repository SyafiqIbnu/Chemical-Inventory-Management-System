@component('layouts.components.nav_li_parent',['permission'=>['user_*','role_*','announcement_*','application_*'],'title'=>__('general.system_administration'),'id'=>'menu-administration','icon'=>'fas fa-cogs']) 
	@slot('content')

		{{--Book Categories--}}
		@component('layouts.components.nav_li',
		['permission'=>['book_category_*'],
		'title'=>__('general.book_category'),'id'=>'menu-administration-book_category',
		'icon'=>'fas fa-user-secret','color'=>'primary']) 
			@slot('url')
			  {{url('/book_category')}}
			@endslot 
		@endcomponent


		{{--User--}}
		@component('layouts.components.nav_li',['permission'=>'user_*',
		'title'=>__('general.user'),'id'=>'menu-administration-user',
		'icon'=>'fa fa-users','color'=>'primary']) 
			@slot('url')
			  {{url('/user')}}
			@endslot 
		@endcomponent

		{{--User Admin--}}
		@component('layouts.components.nav_li',
		['permission'=>['user_create','user_edit'],
		'title'=>__('general.user_admin'),'id'=>'menu-administration-admin',
		'icon'=>'fas fa-user-secret','color'=>'primary']) 
			@slot('url')
			  {{url('/user/admin')}}
			@endslot 
		@endcomponent

		{{--Role--}}
		@component('layouts.components.nav_li',
		['permission'=>'role_*',
		'title'=>__('general.role'),'id'=>'menu-administration-role',
		'icon'=>'fa fa-user-shield','color'=>'primary']) 
			@slot('url')
			  {{url('/role')}}
			@endslot 
		@endcomponent


		{{--branches--}}
		@component('layouts.components.nav_li',
		['permission'=>'branch_*',
		'title'=>__('general.branch'),'id'=>'menu-administration-branch',
		'icon'=>'fas fa-bullhorn','color'=>'primary']) 
			@slot('url')
			  {{url('/branch')}}
			@endslot 
		@endcomponent
		
		{{--Annoucement--}}
		@component('layouts.components.nav_li',
		['permission'=>'announcement_*',
		'title'=>__('general.announcement'),'id'=>'menu-administration-announcement',
		'icon'=>'fas fa-bullhorn','color'=>'primary']) 
			@slot('url')
			  {{url('/announcement')}}
			@endslot 
		@endcomponent

		{{--district--}}
		@component('layouts.components.nav_li',
		['permission'=>'district_*',
		'title'=>__('general.district'),'id'=>'menu-administration-district',
		'icon'=>'fas fa-bullhorn','color'=>'primary']) 
			@slot('url')
			  {{url('/district')}}
			@endslot 
		@endcomponent


		{{--actitivy_types--}}
		@component('layouts.components.nav_li',
		['permission'=>'actitivy_type_*',
		'title'=>__('general.actitivy_type'),'id'=>'menu-administration-actitivy_type',
		'icon'=>'fas fa-bullhorn','color'=>'primary']) 
			@slot('url')
			  {{url('/actitivy_type')}}
			@endslot 
		@endcomponent

		{{--applicant_categories--}}
		@component('layouts.components.nav_li',
		['permission'=>'actitivy_type_*',
		'title'=>__('general.applicant_categorie'),'id'=>'menu-administration-applicant_categorie',
		'icon'=>'fas fa-bullhorn','color'=>'primary']) 
			@slot('url')
			  {{url('/applicant_categorie')}}
			@endslot 
		@endcomponent

		{{--states--}}
		@component('layouts.components.nav_li',
		['permission'=>'state_*',
		'title'=>__('general.state'),'id'=>'menu-administration-state',
		'icon'=>'fas fa-bullhorn','color'=>'primary']) 
			@slot('url')
			  {{url('/state')}}
			@endslot 
		@endcomponent

		{{--districts--}}
		@component('layouts.components.nav_li',
		['permission'=>'district_*',
		'title'=>__('general.district'),'id'=>'menu-administration-district',
		'icon'=>'fas fa-bullhorn','color'=>'primary']) 
			@slot('url')
			  {{url('/district')}}
			@endslot 
		@endcomponent

		{{--cities--}}
		@component('layouts.components.nav_li',
		['permission'=>'citie_*',
		'title'=>__('general.citie'),'id'=>'menu-administration-citie',
		'icon'=>'fas fa-bullhorn','color'=>'primary']) 
			@slot('url')
			  {{url('/citie')}}
			@endslot 
		@endcomponent
		

		{{--controlled_goods_type--}}
		@component('layouts.components.nav_li',
		['permission'=>'citie_*',
		'title'=>__('general.controlled_goods_type'),'id'=>'menu-administration-controlled_goods_type',
		'icon'=>'fas fa-bullhorn','color'=>'primary']) 
			@slot('url')
			  {{url('/controlled_goods_type')}}
			@endslot 
		@endcomponent
		

		{{--designation--}}
		@component('layouts.components.nav_li',
		['permission'=>'designation_*',
		'title'=>__('general.designation'),'id'=>'menu-administration-designation',
		'icon'=>'fas fa-bullhorn','color'=>'primary']) 
			@slot('url')
			  {{url('/designation')}}
			@endslot 
		@endcomponent


		{{--document_type--}}
		@component('layouts.components.nav_li',
		['permission'=>'document_type_*',
		'title'=>__('general.document_type'),'id'=>'menu-administration-document_type',
		'icon'=>'fas fa-bullhorn','color'=>'primary']) 
			@slot('url')
			  {{url('/document_type')}}
			@endslot 
		@endcomponent
		

		{{--equipment--}}
		@component('layouts.components.nav_li',
		['permission'=>'equipment_*',
		'title'=>__('general.equipment'),'id'=>'menu-administration-equipment',
		'icon'=>'fas fa-bullhorn','color'=>'primary']) 
			@slot('url')
			  {{url('/equipment')}}
			@endslot 
		@endcomponent
		

		{{--fuel_station--}}
		@component('layouts.components.nav_li',
		['permission'=>'equipment_*',
		'title'=>__('general.fuel_station'),'id'=>'menu-administration-fuel_station',
		'icon'=>'fas fa-bullhorn','color'=>'primary']) 
			@slot('url')
			  {{url('/fuel_station')}}
			@endslot 
		@endcomponent

		{{--oilco--}}
		@component('layouts.components.nav_li',
		['permission'=>'oilco_*',
		'title'=>__('general.oilco'),'id'=>'menu-administration-oilco',
		'icon'=>'fas fa-bullhorn','color'=>'primary']) 
			@slot('url')
			  {{url('/oilco')}}
			@endslot 
		@endcomponent


		{{--permit_application_type--}}
		@component('layouts.components.nav_li',
		['permission'=>'permit_application_type_*',
		'title'=>__('general.permit_application_type'),'id'=>'menu-administration-permit_application_type',
		'icon'=>'fas fa-bullhorn','color'=>'primary']) 
			@slot('url')
			  {{url('/permit_application_type')}}
			@endslot 
		@endcomponent


		{{--permit_application_statu--}}
		@component('layouts.components.nav_li',
		['permission'=>'permit_application_statu_*',
		'title'=>__('general.permit_application_statu'),'id'=>'menu-administration-permit_application_statu',
		'icon'=>'fas fa-bullhorn','color'=>'primary']) 
			@slot('url')
			  {{url('/permit_application_statu')}}
			@endslot 
		@endcomponent



		{{--purchase_type--}}
		@component('layouts.components.nav_li',
		['permission'=>'purchase_type_*',
		'title'=>__('general.purchase_type'),'id'=>'menu-administration-purchase_type',
		'icon'=>'fas fa-bullhorn','color'=>'primary']) 
			@slot('url')
			  {{url('/purchase_type')}}
			@endslot 
		@endcomponent
		

		{{--agency_types--}}
		@component('layouts.components.nav_li',
		['permission'=>'purchase_type_*',
		'title'=>__('general.purchase_type'),'id'=>'menu-administration-purchase_type',
		'icon'=>'fas fa-bullhorn','color'=>'primary']) 
			@slot('url')
			  {{url('/purchase_type')}}
			@endslot 
		@endcomponent
		
		

	@endslot
  @endcomponent