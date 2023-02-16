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
	@component('layouts.components.crud_card')
		@slot('cardTitle') {{__('general.booking_application')}} @endslot
		@slot('cardColor') card-success @endslot
		
		@slot('cardBody')
			{!! Form::model($modelBookingApplication, ['route' => ['booking_application.update', $modelBookingApplication->id],'method'=>'PUT','id'=>'booking_applicationForm']) !!}
				@include('booking_application.show_form')
		@endslot

		@slot('cardFooter')
			<a type="button" class="btn btn-danger"	onClick="location.href='{{url('booking_application')}}'"><i class="fa fa-close"></i> {{__('general.cancel')}}</a>
			{!! Form::close() !!}
		@endslot
	@endcomponent
@endsection

@include('booking_application.menu_active')