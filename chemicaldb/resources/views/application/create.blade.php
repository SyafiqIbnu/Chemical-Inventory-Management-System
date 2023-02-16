@extends('layouts.app')

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
		<h3 class="card-title">{{__('application.title')}}</h3>
	  </div>
		
	<div class="card-body">
{!! Form::open(['route'=>'application.store','id'=>'myAppForm']) !!}
@include('application.create_form')
	</div>
<div class="card-footer">
	<a type="button" class="btn btn-danger"	onClick="location.href='{{url('application')}}'"><i class="fa fa-close"></i> {{__('general.cancel')}}</a>
	{!! Form::button('<i class="fa fa-refresh"></i> '.__('general.reset').'',['class'=>'btn btn-warning','type'=>'reset']) !!} 
	{!! Form::button('<i class="fa fa-floppy-o"></i> '.__('general.save').'',['class'=>'btn btn-success pull-right','type'=>'submit','id'=>'submitButton']) !!}
</div>
{!! Form::close() !!}
	</div>
</div>
@endsection

@include('application.menu_active')