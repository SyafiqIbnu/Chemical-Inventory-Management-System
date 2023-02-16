

<div class="col-md-12 table-responsive" style="border: none;">
        @component('layouts.components.table_ajax', ['route'=>'booking_vehicle','tname' => 'booking_vehicle_table_ajax','bgColor'=>'bg-red']) 

		@slot('url')
            {{ route('booking_vehicle.indexAjax',$booking_application_id)}}
        @endslot 

         

		@slot('thead')
            <th style='width: 30px;'>{{__('general.number')}}</th>
                        <th>{{__('booking_vehicle.vehicle_type_id')}}</th>
						<th>{{__('booking_vehicle.quantity')}}</th>
                        <th>{{__('booking_vehicle.cost')}}</th>
                        <th style="width:80px;">{{__('general.action')}}</th>
        @endslot 

		@slot('tbody')
            @include('layouts.components.datatable_data_card_render_number',['table_name'=>'booking_vehicle_table_ajax']),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'booking_vehicle_table_ajax','name'=>'vehicle_type_id','title'=>__('booking_vehicle.vehicle_type_id')]),
									@include('layouts.components.datatable_data_card_render', ['table_name'=>'booking_vehicle_table_ajax','name'=>'quantity','title'=>__('booking_vehicle.quantity')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'booking_vehicle_table_ajax','name'=>'cost','title'=>__('booking_vehicle.cost')]),
                        @include('layouts.components.datatable_data_card_render_action'),
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