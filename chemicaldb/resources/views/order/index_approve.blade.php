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
            {{ route('order.indexAjaxApprove')}}
        @endslot 

         

		@slot('thead')
            <th style='width: 30px;'>{{__('general.number')}}</th>
                        <th>{{__('order.pickup_date')}}</th>
                        <th>{{__('order.linked_user')}}</th>
                        <th>{{__('order.created_by')}}</th>
                        <th>{{__('order.status')}}</th>
                        <th>{{__('order.totalamount')}}</th>
                        
                        <th style="width:80px;">{{__('general.action')}}</th>
        @endslot 

		@slot('tbody')
            @include('layouts.components.datatable_data_card_render_number',['table_name'=>'order_table_ajax']),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'order_table_ajax','name'=>'pickup_date','title'=>__('order.pickup_date')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'order_table_ajax','name'=>'linked_user','title'=>__('order.linked_user')]),
                                    @include('layouts.components.datatable_data_card_render', ['table_name'=>'order_table_ajax','name'=>'created_by','title'=>__('order.created_by')]),
            			            
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'order_table_ajax','name'=>'status','title'=>__('order.status')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'order_table_ajax','name'=>'totalamount','title'=>__('order.totalamount')]),
            			            
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
    </div>
	
    @include('order.menu_active')
@endsection