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
	@component('layouts.components.crud_card')
		@slot('cardTitle') {{__('general.booking_cargo')}} @endslot
		@slot('cardColor') card-success @endslot
		
		@slot('cardBody')
			{!! Form::open(['route'=>'booking_cargo.store','id'=>'myAppForm']) !!}
				@include('booking_cargo.create_form')
		@endslot

		@slot('cardFooter')
			<a type="button" class="btn btn-danger"	onClick="location.href='{{url('booking_application')}}/{{$booking_application_id}}/edit'"><i class="fa fa-close"></i> {{__('general.cancel')}}</a>
			
			{!! Form::button('<i class="fa fa-refresh"></i> '.__('general.reset').'',['class'=>'btn btn-warning','type'=>'reset']) !!} 
			{!! Form::button('<i class="fa fa-floppy-o"></i> '.__('general.save').'',['class'=>'btn btn-success pull-right','type'=>'submit','id'=>'submitButton']) !!}
			{!! Form::close() !!}
		@endslot
	@endcomponent

@endsection

@include('booking_cargo.menu_active')