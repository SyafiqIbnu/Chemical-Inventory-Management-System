@extends('portal.register')


@section('page_title')
{{__('general.create')}}
@endsection

@section('page_description')
{{__('general.create')}}
@endsection

@section('breadcrumb')
	<li class="breadcrumb-item"><a href="#">{{__('general.home')}}</a></li>
    <li class="breadcrumb-item active">{{__('general.create')}}</li>
@endsection

@section('main-content')
@include('layouts.components.session_message')

<div class="col-md-12">
	<div class="card card-primary">
	  <div class="card-header">
		<h3 class="card-title">By registering our service, you are able to utilize our service n accordance to our terms and services.</h3>
	  </div>
		
	<div class="card-body">
        {!! Form::open(['route'=>'user.store_customer','id'=>'myAppForm']) !!}
        @include('user.create_form_customer')
	</div>
    <div class="card-footer">
	{!! Form::label('Your email will be used as unique ID as well as authentications.')  !!}
	{!! Form::label('We take user privacy seriously. No email address will be sold to third parties.')  !!}
        {!! Form::button('<i class="fa fa-refresh"></i> '.__('general.reset').'',['class'=>'btn btn-warning','type'=>'reset']) !!} 
        {!! Form::button('<i class="fa fa-floppy-o"></i> '.__('general.register'),['class'=>'btn btn-success pull-right','type'=>'submit','id'=>'submitButton']) !!}
    </div>
{!! Form::close() !!}
	</div>
</div>
@endsection

@include('user.menu_active')