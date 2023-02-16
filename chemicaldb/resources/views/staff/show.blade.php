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
		@slot('cardTitle') {{__('general.staff')}} @endslot
		@slot('cardColor') card-success @endslot
		
		@slot('cardBody')
			{!! Form::model($modelStaff, ['route' => ['staff.update', $modelStaff->id],'method'=>'PUT','id'=>'staffForm']) !!}
				@include('staff.show_form')
		@endslot

		@slot('cardFooter')
			<a type="button" class="btn btn-danger"	onClick="location.href='{{url('staff')}}'"><i class="fa fa-close"></i> {{__('general.cancel')}}</a>
			{!! Form::close() !!}
		@endslot
	@endcomponent
@endsection

@include('staff.menu_active')