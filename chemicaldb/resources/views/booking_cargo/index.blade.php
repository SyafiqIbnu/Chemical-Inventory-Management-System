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
        @if(\App\Helpers\PermissionHelper::hasBookingCargoDelete(false))
            @include('layouts.components.modal_delete')
        @endif
    @endpush

	
    <div class="col-md-12 table-responsive" style="border: none;">
        @component('layouts.components.table_ajax', ['route'=>'booking_cargo','tname' => 'booking_cargo_table_ajax','bgColor'=>'bg-red']) 

		@slot('url')
            {{ route('booking_cargo.indexAjax')}}
        @endslot 

         

		@slot('thead')
            <th style='width: 30px;'>{{__('general.number')}}</th>
                        <th>{{__('booking_cargo.booking_application_id')}}</th>
                        <th>{{__('booking_cargo.weight')}}</th>
                        <th>{{__('booking_cargo.length')}}</th>
                        <th>{{__('booking_cargo.width')}}</th>
                        <th>{{__('booking_cargo.height')}}</th>
                        <th>{{__('booking_cargo.radius')}}</th>
                        <th>{{__('booking_cargo.diameter')}}</th>
                        <th style="width:80px;">{{__('general.action')}}</th>
        @endslot 

		@slot('tbody')
            @include('layouts.components.datatable_data_card_render_number',['table_name'=>'booking_cargo_table_ajax']),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'booking_cargo_table_ajax','name'=>'booking_application_id','title'=>__('booking_cargo.booking_application_id')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'booking_cargo_table_ajax','name'=>'weight','title'=>__('booking_cargo.weight')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'booking_cargo_table_ajax','name'=>'length','title'=>__('booking_cargo.length')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'booking_cargo_table_ajax','name'=>'width','title'=>__('booking_cargo.width')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'booking_cargo_table_ajax','name'=>'height','title'=>__('booking_cargo.height')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'booking_cargo_table_ajax','name'=>'radius','title'=>__('booking_cargo.radius')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'booking_cargo_table_ajax','name'=>'diameter','title'=>__('booking_cargo.diameter')]),
                        @include('layouts.components.datatable_data_card_render_action'),
        @endslot 

		@slot('filter_parameter')
            //dt.f_start_date = $('input[name=f_start_date]').val();
            //dt.f_end_date = $('input[name=f_end_date]').val();
        @endslot 

		@slot('firstScript')
            @if(Auth::user()->can('booking_cargo_create'))
                @include('layouts.components.datatable_button_export_create_modal')
            @else
                @include('layouts.components.datatable_button_export')
            @endif
        @endslot 

		@slot('secondScript')
        @endslot 
	@endcomponent
    </div>
	
    @include('booking_cargo.menu_active')
@endsection