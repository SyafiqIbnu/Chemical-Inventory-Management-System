{{--TFA--}}
@component('layouts.components.nav_li',['permission'=>'inbox_*',
'title'=>__('general.inbox'),'id'=>'menu-inbox',
'icon'=>'fa fa-envelope','color'=>'primary']) 
	@slot('url')
		{{url('/inbox')}}
	@endslot 
@endcomponent
