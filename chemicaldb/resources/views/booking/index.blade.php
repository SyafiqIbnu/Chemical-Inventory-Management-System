@extends('layouts.app')

@section('page_title')
{{$title}}
@endsection

@section('page_description')
{{$title}}
@endsection

@section('breadcrumb')
	<li class="breadcrumb-item"><a href="#">{{__('general.home')}}</a></li>
    <li class="breadcrumb-item active">{{$title}}</li>
	
@endsection

@section('main-content')

    @include('layouts.components.session_message')
	
	
    @push('modals')
    @include('layouts.components.modal_delete')
    @endpush

	
    <div class="col-md-12 table-responsive" style="border: none;">
        @component('layouts.components.table_ajax', ['route'=>'booking','tname' => 'booking_table_ajax','bgColor'=>'bg-red']) 

		@slot('url')
            {{ route('booking.indexAjax')}}
        @endslot 

         

		@slot('thead')
            <th style='width: 30px;'>{{__('general.number')}}</th>
            <th>{{__('booking.created_at')}}</th>
            <th>{{__('booking_application.origin')}}</th>
            <th>{{__('booking_application.destination')}}</th>
            <th>{{__('booking.vehicle_type_id')}}</th>
                        <th>{{__('booking.numVehicles')}}</th>
                        <th>{{__('booking.costRateVehicles')}}</th>
                        <th>{{__('booking.delivery_date')}}</th>
                        
                        <th style="width:80px;">{{__('general.action')}}</th>
        @endslot 

		@slot('tbody')
            @include('layouts.components.datatable_data_card_render_number',['table_name'=>'booking_table_ajax']),
            @include('layouts.components.datatable_data_card_render', ['table_name'=>'booking_table_ajax','name'=>'created_at','title'=>__('booking.created_at')]),
            @include('layouts.components.datatable_data_card_render', ['table_name'=>'booking_table_ajax','name'=>'origin','title'=>__('booking_application.origin')]),
            @include('layouts.components.datatable_data_card_render', ['table_name'=>'booking_table_ajax','name'=>'destination','title'=>__('booking_application.destination')]),
            @include('layouts.components.datatable_data_card_render', ['table_name'=>'booking_table_ajax','name'=>'vehicle_type_id','title'=>__('booking.vehicle_type_id')]),
                                    @include('layouts.components.datatable_data_card_render', ['table_name'=>'booking_table_ajax','name'=>'numVehicles','title'=>__('booking.numVehicles')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'booking_table_ajax','name'=>'costRateVehicles','title'=>__('booking.costRateVehicles')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'booking_table_ajax','name'=>'delivery_date','title'=>__('booking.delivery_date')]),
            			            
                        @include('layouts.components.datatable_data_card_render_action'),
        @endslot 

		@slot('filter_parameter')
            //dt.f_start_date = $('input[name=f_start_date]').val();
            //dt.f_end_date = $('input[name=f_end_date]').val();
        @endslot 

		@slot('firstScript')
            @if(Auth::user()->can('booking_create'))
                @include('layouts.components.datatable_button_export_create_modal')
            @else
                @include('layouts.components.datatable_button_export')
            @endif
        @endslot 

		@slot('secondScript')
        @endslot 
	@endcomponent
    </div>
	
    @include('booking.menu_active')
@endsection