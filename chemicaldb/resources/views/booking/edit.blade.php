@extends('layouts.app')

@section('page_title')
Booking Confirmation #{{$modelBooking->id}}
@endsection

@section('page_description')
{{__('general.edit')}}
@endsection

@include('layouts.breadcrumb_edit')

@section('main-content')
	@component('layouts.components.crud_card')
		@slot('cardTitle') {{__('general.booking')}} Information  @endslot
		@slot('cardColor') card-success @endslot
		@slot('collapsible') true @endslot
		
		
		@slot('cardBody')
		
				@include('booking_application.edit_form')
				
		@endslot

		@slot('cardFooter')
			
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
									
					@endslot 

					@slot('filter_parameter')
						//dt.f_start_date = $('input[name=f_start_date]').val();
						//dt.f_end_date = $('input[name=f_end_date]').val();
					@endslot 

					@slot('firstScript')
					
					@endslot 

					@slot('secondScript')
					@endslot 
				@endcomponent
				</div>

			@endslot
			@slot('cardFooter')
				
			

			@endslot

	@endcomponent
	
	@component('layouts.components.crud_card')
		@slot('cardTitle') {{__('general.vehicle')}} Confirmation @endslot
		@slot('cardColor') card-success @endslot
		
		@slot('cardBody')
			{!! Form::model($modelBooking, ['route' => ['booking.update', $modelBooking->id],'method'=>'PUT','id'=>'bookingForm']) !!}
				@include('booking.create_form')
		@endslot

		@slot('cardFooter')
			<a type="button" class="btn btn-danger"	onClick="location.href='{{url('booking')}}'"><i class="fa fa-close"></i> {{__('general.cancel')}}</a>
			{!! Form::button('<i class="fa fa-refresh"></i> '.__('general.reset').'',['class'=>'btn btn-warning','type'=>'reset']) !!} 
			{!! Form::button('<i class="fa fa-floppy-o"></i> '.__('general.save').'',['class'=>'btn btn-success pull-right','type'=>'submit','id'=>'submitButton']) !!}
			{!! Form::close() !!}
		@endslot
	@endcomponent


	


@endsection

@include('booking.menu_active')