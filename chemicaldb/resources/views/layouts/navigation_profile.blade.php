@component('layouts.components.nav_li_parent',
['permission'=>['order_*'],
'title'=>__('general.profile'),'id'=>'menu-profile','icon'=>'fas fa-cogs']) 
	@slot('content')
		
		
		{{-- Profile --}}

		@component('layouts.components.nav_li',
		['permission'=>'order_*',
		'title'=>__('general.profile'),'id'=>'menu-profile-user',
		'icon'=>'fas fa-user','color'=>'primary']) 
			@slot('url')
			  {{url('/profile')}}
			@endslot 
		@endcomponent

		{{-- Profile --}}

		@component('layouts.components.nav_li',
		['permission'=>'order_*',
		'title'=>__('general.profile_upline'),'id'=>'menu-profile-upline',
		'icon'=>'fas fa-user-secret','color'=>'primary']) 
			@slot('url')
			  {{url('/profile_upline')}}
			@endslot 
		@endcomponent

		@component('layouts.components.nav_li',
		['permission'=>'user_bankaccount_*',
		'title'=>__('general.user_bankaccount'),'id'=>'menu-profile-bankaccount',
		'icon'=>'fa fa-money','color'=>'primary']) 
			@slot('url')
			  {{url('/user_bankaccount')}}
			@endslot 
		@endcomponent


		@endslot
  @endcomponent
