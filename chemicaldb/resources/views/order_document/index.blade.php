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
        @if(\App\Helpers\PermissionHelper::hasOrderDocumentDelete(false))
            @include('layouts.components.modal_delete')
        @endif
    @endpush

	
    <div class="col-md-12 table-responsive" style="border: none;">
        @component('layouts.components.table_ajax', ['route'=>'order_document','tname' => 'order_document_table_ajax','bgColor'=>'bg-red']) 

		@slot('url')
            {{ route('order_document.indexAjax')}}
        @endslot 

         

		@slot('thead')
            <th style='width: 30px;'>{{__('general.number')}}</th>
                        <th>{{__('order_document.order_id')}}</th>
                        <th>{{__('order_document.name')}}</th>
                        <th>{{__('order_document.document_types_id')}}</th>
                        <th>{{__('order_document.path')}}</th>
                        <th>{{__('order_document.original_name')}}</th>
                        <th>{{__('order_document.active')}}</th>
                        <th style="width:80px;">{{__('general.action')}}</th>
        @endslot 

		@slot('tbody')
            @include('layouts.components.datatable_data_card_render_number',['table_name'=>'order_document_table_ajax']),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'order_document_table_ajax','name'=>'order_id','title'=>__('order_document.order_id')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'order_document_table_ajax','name'=>'name','title'=>__('order_document.name')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'order_document_table_ajax','name'=>'document_types_id','title'=>__('order_document.document_types_id')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'order_document_table_ajax','name'=>'path','title'=>__('order_document.path')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'order_document_table_ajax','name'=>'original_name','title'=>__('order_document.original_name')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'order_document_table_ajax','name'=>'active','title'=>__('order_document.active')]),
                        @include('layouts.components.datatable_data_card_render_action'),
        @endslot 

		@slot('filter_parameter')
            //dt.f_start_date = $('input[name=f_start_date]').val();
            //dt.f_end_date = $('input[name=f_end_date]').val();
        @endslot 

		@slot('firstScript')
            @if(Auth::user()->can('order_document_create'))
                @include('layouts.components.datatable_button_export_create_modal')
            @else
                @include('layouts.components.datatable_button_export')
            @endif
        @endslot 

		@slot('secondScript')
        @endslot 
	@endcomponent
    </div>
	
    @include('order_document.menu_active')
@endsection