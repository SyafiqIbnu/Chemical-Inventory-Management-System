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
		@slot('cardTitle') {{__('general.booking_application')}} @endslot
		@slot('cardColor') card-success @endslot
		
		@slot('cardBody')
			{!! Form::model($modelBookingApplication, ['route' => ['booking_application.update', $modelBookingApplication->id],'method'=>'PUT','id'=>'booking_applicationForm']) !!}
				@include('booking_application.create_form')
		@endslot

		@slot('cardFooter')
			{!! Form::close() !!}
		@endslot
	@endcomponent

	@component('layouts.components.crud_card')

			@slot('cardTitle') {{__('general.booking_cargo')}} @endslot
			@slot('cardColor') card-success @endslot
			@slot('cardBody')

				<div class="col-md-12 table-responsive" style="border: none;">
					@component('layouts.components.table_ajax', ['route'=>'booking_cargo','tname' => 'booking_cargo_table_ajax','bgColor'=>'bg-red']) 

					@slot('url')
						{{ route('booking_cargo.indexAjax',$booking_application_id)}}
					@endslot 

					
					@slot('thead')
						<th style='width: 30px;'>{{__('general.number')}}</th>
						<th>{{__('booking_cargo.cargo_type')}}</th>
									<th>{{__('booking_cargo.weight')}}</th>
									<th>{{__('booking_cargo.height')}}</th>
									<th>{{__('booking_cargo.length')}}</th>
									<th>{{__('booking_cargo.width')}}</th>
									
									<th>{{__('booking_cargo.radius')}}</th>
									<th>{{__('booking_cargo.diameter')}}</th>
									<th>{{__('booking_cargo.unit')}}</th>
									<th style="width:80px;">{{__('general.action')}}</th>
					@endslot 

					@slot('tbody')
						@include('layouts.components.datatable_data_card_render_number',['table_name'=>'booking_cargo_table_ajax']),
						@include('layouts.components.datatable_data_card_render', ['table_name'=>'booking_cargo_table_ajax','name'=>'cargo_type','title'=>__('booking_cargo.cargo_type')]),
												@include('layouts.components.datatable_data_card_render', ['table_name'=>'booking_cargo_table_ajax','name'=>'weight','title'=>__('booking_cargo.weight')]),
												@include('layouts.components.datatable_data_card_render', ['table_name'=>'booking_cargo_table_ajax','name'=>'height','title'=>__('booking_cargo.height')]),
												@include('layouts.components.datatable_data_card_render', ['table_name'=>'booking_cargo_table_ajax','name'=>'length','title'=>__('booking_cargo.length')]),
												@include('layouts.components.datatable_data_card_render', ['table_name'=>'booking_cargo_table_ajax','name'=>'width','title'=>__('booking_cargo.width')]),
												
												@include('layouts.components.datatable_data_card_render', ['table_name'=>'booking_cargo_table_ajax','name'=>'radius','title'=>__('booking_cargo.radius')]),
												@include('layouts.components.datatable_data_card_render', ['table_name'=>'booking_cargo_table_ajax','name'=>'diameter','title'=>__('booking_cargo.diameter')]),
												@include('layouts.components.datatable_data_card_render', ['table_name'=>'booking_cargo_table_ajax','name'=>'unit','title'=>__('booking_cargo.unit')]),
									@include('layouts.components.datatable_data_card_render_action'),
					@endslot 

					@slot('filter_parameter')
						//dt.f_start_date = $('input[name=f_start_date]').val();
						//dt.f_end_date = $('input[name=f_end_date]').val();
					@endslot 

					@slot('firstScript')
						@include('layouts.components.datatable_button_export_create_modal',
						['createUrl'=>url('booking_cargo')."/create/".$booking_application_id])
					@endslot 

					@slot('secondScript')
					@endslot 
				@endcomponent
				</div>

			@endslot
			@slot('cardFooter')
				
			{!! Form::model($modelBookingApplication, ['route' => ['booking_application.calculateOptimizer', $booking_application_id],'method'=>'POST','id'=>'booking_applicationForm']) !!}
			{!! Form::hidden('optimizer_result',null) !!}
			{!! Form::hidden('sessionid',null) !!}
			{!! Form::hidden('expires',null) !!}
			<a type="button" class="btn btn-danger"	onClick="location.href='{{url('booking_application')}}'"><i class="fa fa-close"></i> {{__('general.cancel')}}</a>
			{!! Form::button('<i class="fa fa-refresh"></i> '.__('general.reset').'',['class'=>'btn btn-warning','type'=>'reset']) !!} 
			{!! Form::button('<i class="fa fa-floppy-o"></i> '.__('general.calculate').'',['class'=>'btn btn-success pull-right','type'=>'submit','id'=>'loginBtn']) !!}
			<!--<button type="button" id="loginBtn" class="btn btn-success">Calculate</button>-->
			{!! Form::close() !!}

			@endslot

@endcomponent





	@component('layouts.components.crud_card')
		@slot('cardTitle') Recommendation @endslot
		@slot('cardColor') card-success @endslot
		
		@slot('cardBody')
			@include('booking_application.create_form_output')
		@endslot

		@slot('cardFooter')
			
		@endslot
	@endcomponent
@endsection

@include('booking_application.menu_active')


