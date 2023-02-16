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
		@slot('cardTitle') {{__('general.account_type')}} @endslot
		@slot('cardColor') card-success @endslot
		
		@slot('cardBody')
			{!! Form::model($modelAccountType, ['route' => ['account_type.update', $modelAccountType->id],'method'=>'PUT','id'=>'account_typeForm']) !!}
				@include('account_type.show_form')
		@endslot

		@slot('cardFooter')
			<a type="button" class="btn btn-danger"	onClick="location.href='{{url('account_type')}}'"><i class="fa fa-close"></i> {{__('general.cancel')}}</a>
			{!! Form::close() !!}
		@endslot
	@endcomponent
@endsection

@include('account_type.menu_active')