{{--TFA--}}
@component('layouts.components.nav_li',['permission'=>'*',
'title'=>__('general.tfa'),'id'=>'menu-tfa',
'icon'=>'fa fa-key','color'=>'primary']) 
	@slot('url')
		{{url('/tfa')}}
	@endslot 
@endcomponent
