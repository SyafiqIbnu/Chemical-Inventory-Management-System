@extends('layouts.app')

@section('page_title')
{{__('general.password')}}
@endsection

@section('page_description')
{{__('general.create')}}
@endsection

@section('breadcrumb')
	<li class="breadcrumb-item"><a href="#">{{__('general.home')}}</a></li>
    <li class="breadcrumb-item active">{{__('general.create')}}</li>
@endsection

@php
    $table_ajax_readonly=false;
    $route=\App\Helpers\AppHelper::getCurrentBaseRoute();
    if($route=="profile"){
        $table_ajax_readonly=true;
    }
@endphp

@section('main-content')
	
	@include('layouts.components.session_message')

	@component('layouts.components.crud_card',['showMessage'=>FALSE])
		@slot('cardTitle') {{__('general.password')}} @endslot
      
		@slot('cardColor') card-success @endslot
		
		@slot('cardBody')
			{!! Form::open(['route'=>'profile.updatepwd','id'=>'myAppForm']) !!}

            @component('layouts.components.edit_modal_one_column',['for' => 'password','required' => '1','label'=>__('user.password')]) 
            @slot('field')
                <input id="password" type="password" class="form-control" name="password" required autofocus="autofocus" placeholder="{{__('user.password_placeholder')}}" maxlength="16">
            @endslot 
            @endcomponent


            @component('layouts.components.edit_modal_one_column',['for' => 'password_confirm','required' => '1','label'=>__('user.password_confirm')]) 
            @slot('field')
            <input id="password_confirm" type="password" class="form-control" name="password_confirm" required autofocus="autofocus" placeholder="{{__('user.password_confirm_placeholder')}}" maxlength="16">
            @endslot 
            @endcomponent

		@endslot

		@slot('cardFooter')
			{!! Form::button('<i class="fa fa-refresh"></i> '.__('general.reset').'',['class'=>'btn btn-warning','type'=>'reset']) !!} 
			{!! Form::button('<i class="fa fa-floppy-o"></i> '.__('general.save').'',['class'=>'btn btn-success pull-right','type'=>'submit','id'=>'submitButton']) !!}
			{!! Form::close() !!}
		@endslot
	@endcomponent

@endsection

@include('shared.profile_menu_active')