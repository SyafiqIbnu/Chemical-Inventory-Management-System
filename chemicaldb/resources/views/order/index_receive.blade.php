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
	
	{{-- 
    @push('modals')
        @if(\App\Helpers\PermissionHelper::hasOrderDelete(false))
            @include('layouts.components.modal_delete')
        @endif
    @endpush
    --}}

	
    <div class="col-md-12 table-responsive" style="border: none;">
        @component('layouts.components.table_ajax', ['route'=>'order','tname' => 'order_table_ajax','bgColor'=>'bg-red']) 

		@slot('url')
            {{ route('order.indexAjaxReceive')}}
        @endslot 

         

		@slot('thead')
            <th style='width: 30px;'>{{__('general.number')}}</th>
                        <th>{{__('order.pickup_date')}}</th>
                        <th>{{__('order.linked_user')}}</th>
                        <th>{{__('order.created_by')}}</th>
                        <th>{{__('order.status')}}</th>
                        <th>{{__('order.totalamount')}}</th>
                        <th>{{__('order.bil_pax')}}</th>
                        
                        <th style="width:80px;">{{__('Lihat')}}</th>
        @endslot 

		@slot('tbody')
            @include('layouts.components.datatable_data_card_render_number',['table_name'=>'order_table_ajax']),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'order_table_ajax','name'=>'pickup_date','title'=>__('order.pickup_date')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'order_table_ajax','name'=>'linked_user','title'=>__('order.linked_user')]),
                                    @include('layouts.components.datatable_data_card_render', ['table_name'=>'order_table_ajax','name'=>'created_by','title'=>__('order.created_by')]),
            			            
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'order_table_ajax','name'=>'status','title'=>__('order.status')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'order_table_ajax','name'=>'totalamount','title'=>__('order.totalamount')]),
                                    @include('layouts.components.datatable_data_card_render', ['table_name'=>'order_table_ajax','name'=>'bil_pax','title'=>__('order.bil_pax')]),
            			            
                        @include('layouts.components.datatable_data_card_render_action'),
        @endslot 

		@slot('filter_parameter')
            //dt.f_start_date = $('input[name=f_start_date]').val();
            //dt.f_end_date = $('input[name=f_end_date]').val();
        @endslot 

		@slot('firstScript')
        @include('layouts.components.datatable_button_export')
        @endslot 

		@slot('secondScript')
        @endslot 
	@endcomponent
    </br>
    @component('layouts.components.crud_card')
        @slot('cardTitle') <b> MASTER CALCULATION ({{$todaydate}}) </b></br> @endslot
        @slot('cardColor') card-warning @endslot

        @slot('cardBody')
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <th>TOTAL</th>
                    <th>ACTUAL</th>
                    <th>BUFFER</th>
                    <th>RAW</th>
                </tr>
                <tr>
                    <td>AYAM</td>
                    <td>{{$totalayamactual}}</td>
                    <td>{{$totalayambuffer}}</td>
                    <td>{{$totalayamraw}}</td>
                </tr>
                <tr>
                    <td>KAMBING</td>
                    <td>{{$totalkambingactual}}</td>
                    <td>{{$totalkambingbuffer}}</td>
                    <td>{{$totalkambingraw}}</td>
                </tr>
                <tr>
                    <td>PAX(NASI)</td>
                    <td>{{$totalpaxactual}}</td>
                    <td>{{$totalpaxbuffer}}</td>
                    <td></td>
                </tr>
                <tr>
                    <td>SIDE CONDIMENT</td>
                    <td>{{$sidecondimentactual}}</td>
                    <td>{{$sidecondimentbuffer}}</td>
                    <td></td>
                </tr>
                </tbody>
                </table>
        @endslot

        @slot('cardFooter')
            
        @endslot

    @endcomponent
    </div>
	
    @include('order.menu_active')
@endsection