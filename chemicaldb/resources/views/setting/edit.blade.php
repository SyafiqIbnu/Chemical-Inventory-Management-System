@extends('layouts.app')

@section('page_title')
{{__('general.edit')}}
@endsection

@section('page_description')
{{__('general.edit')}}
@endsection

@include('layouts.breadcrumb_edit')

@section('main-content')
	@component('layouts.components.crud_card')
		@slot('cardTitle') {{__('general.setting')}} @endslot
		@slot('cardColor') card-success @endslot
		
		@slot('cardBody')
			{!! Form::model($modelSetting, ['route' => ['setting.update', $modelSetting->id],'method'=>'PUT','id'=>'settingForm']) !!}
				@include('setting.create_form')
		@endslot

		@slot('cardFooter')
			<a type="button" class="btn btn-danger"	onClick="location.href='{{url('setting')}}'"><i class="fa fa-close"></i> {{__('general.cancel')}}</a>
			{!! Form::button('<i class="fa fa-refresh"></i> '.__('general.reset').'',['class'=>'btn btn-warning','type'=>'reset']) !!} 
			{!! Form::button('<i class="fa fa-floppy-o"></i> '.__('general.save').'',['class'=>'btn btn-success pull-right','type'=>'submit','id'=>'submitButton']) !!}
			{!! Form::close() !!}
		@endslot
	@endcomponent
@endsection

@include('setting.menu_active')