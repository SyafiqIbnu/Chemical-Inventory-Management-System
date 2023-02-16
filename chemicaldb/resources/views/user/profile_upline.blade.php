@extends('layouts.app')

@section('page_title')
{{__('general.profile_upline')}}
@endsection

@section('page_description')
{{__('general.profile_upline')}}
@endsection

@section('breadcrumb')
	<li class="breadcrumb-item"><a href="#">{{__('general.profile_upline')}}</a></li>
    <li class="breadcrumb-item active">{{__('general.profile_upline')}}</li>
@endsection

@section('main-content')
@include('layouts.components.session_message')

<div class="col-md-12">
	<div class="card card-primary">
	  <div class="card-header">
		<h3 class="card-title">{{__('general.profile_upline')}}</h3>
	  </div>
		
	<div class="card-body">
	{!! Form::open(['route'=>'user.store','id'=>'myAppForm']) !!}
	@include('user.show_form')
		</div>
	<div class="card-footer">
		
	</div>
	{!! Form::close() !!}
		</div>
	</div>
@endsection

@include('user.profile_upline_menu_active')