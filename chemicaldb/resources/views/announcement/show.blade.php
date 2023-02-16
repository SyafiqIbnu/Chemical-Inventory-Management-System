@extends('layouts.app')

@section('page_title')
{{__('general.show')}}
@endsection

@section('page_description')
{{__('general.show')}}
@endsection

@section('breadcrumb')
	<li class="breadcrumb-item"><a href="#">{{__('general.home')}}</a></li>
    <li class="breadcrumb-item active">{{__('general.show')}}</li>
@endsection

@section('main-content')
@include('layouts.components.session_message')

<div class="col-md-12">
	<div class="card card-primary">
	  <div class="card-header">
		<h3 class="card-title">{{__('general.announcement')}}</h3>
	  </div>
		
	<div class="card-body">
{!! Form::open(['route'=>'announcement.store','id'=>'myAppForm']) !!}
@include('announcement.show_form')
	</div>
<div class="card-footer">
	<a type="button" class="btn btn-danger"	onClick="location.href='{{url('announcement')}}'"><i class="fa fa-close"></i> {{__('general.cancel')}}</a>
</div>
{!! Form::close() !!}
	</div>
</div>
@endsection

@include('announcement.menu_active')