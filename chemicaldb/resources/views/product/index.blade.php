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
        @if(\App\Helpers\PermissionHelper::hasProductDelete(false))
            @include('layouts.components.modal_delete')
        @endif
    @endpush

	
    <div class="col-md-12 table-responsive" style="border: none;">
        @component('layouts.components.table_ajax', ['route'=>'product','tname' => 'product_table_ajax','bgColor'=>'bg-red']) 

		@slot('url')
            {{ route('product.indexAjax')}}
        @endslot 

         

		@slot('thead')
            <th style='width: 30px;'>{{__('general.number')}}</th>
                        <th>{{__('product.product_type')}}</th>
                        <th>{{__('product.product_category')}}</th>
                        <th>{{__('product.name')}}</th>
                        <th>{{__('product.price')}}</th>
                        <th>{{__('product.description')}}</th>
                        <th>{{__('product.image')}}</th>
                        <th>{{__('product.image_path')}}</th>
                        <th>{{__('product.pax_no')}}</th>
                        <th>{{__('product.active')}}</th>
                        <th style="width:80px;">{{__('general.action')}}</th>
        @endslot 

		@slot('tbody')
            @include('layouts.components.datatable_data_card_render_number',['table_name'=>'product_table_ajax']),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'product_table_ajax','name'=>'product_type','title'=>__('product.product_type')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'product_table_ajax','name'=>'product_category','title'=>__('product.product_category')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'product_table_ajax','name'=>'name','title'=>__('product.name')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'product_table_ajax','name'=>'price','title'=>__('product.price')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'product_table_ajax','name'=>'description','title'=>__('product.description')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'product_table_ajax','name'=>'image','title'=>__('product.image')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'product_table_ajax','name'=>'image_path','title'=>__('product.image_path')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'product_table_ajax','name'=>'pax_no','title'=>__('product.pax_no')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'product_table_ajax','name'=>'active','title'=>__('product.active')]),
                        @include('layouts.components.datatable_data_card_render_action'),
        @endslot 

		@slot('filter_parameter')
            //dt.f_start_date = $('input[name=f_start_date]').val();
            //dt.f_end_date = $('input[name=f_end_date]').val();
        @endslot 

		@slot('firstScript')
            @if(Auth::user()->can('product_create'))
                @include('layouts.components.datatable_button_export_create_modal')
            @else
                @include('layouts.components.datatable_button_export')
            @endif
        @endslot 

		@slot('secondScript')
        @endslot 
	@endcomponent
    </div>
	
    @include('product.menu_active')
@endsection