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
        {{-- @if(\App\Helpers\PermissionHelper::hasChemicalDelete(false)) --}}
            @include('layouts.components.modal_delete')
        {{-- @endif --}}
    @endpush

	
    <div class="col-md-12 table-responsive" style="border: none;">
        @component('layouts.components.table_ajax', ['route'=>'chemical','tname' => 'chemical_table_ajax','bgColor'=>'bg-red']) 

		@slot('url')
            {{ route('chemicalgeneral.indexAjax')}}
        @endslot 

         

		@slot('thead')
            <th style='width: 30px;'>{{__('general.number')}}</th>
                        <th>{{__('chemical.laboratory_id')}}</th>
                        <th>{{__('chemical.item_name')}}</th>
                        <th>{{__('chemical.item_brand')}}</th>
                        <th>{{__('chemical.item_cas')}}</th>
                        <th>{{__('chemical.item_catalog')}}</th>
                        <th>{{__('chemical.item_location')}}</th>
                        <th>{{__('chemical.item_price')}}</th>
                        <th>{{__('chemical.item_quantity')}}</th>
                        <th>{{__('chemical.item_amount')}}</th>
                        <th>{{__('chemical.item_supplier')}}</th>
                        <th>{{__('chemical.date_opened')}}</th>
                        <th>{{__('chemical.expiration_date')}}</th>
                        <th>{{__('chemical.staff_id')}}</th>
                        <th>{{__('chemical.item_sheet')}}</th>
                        <th style="width:80px;">{{__('general.action')}}</th>
        @endslot 

		@slot('tbody')
            @include('layouts.components.datatable_data_card_render_number',['table_name'=>'chemical_table_ajax']),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'chemical_table_ajax','name'=>'laboratory_id','title'=>__('chemical.laboratory_id')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'chemical_table_ajax','name'=>'item_name','title'=>__('chemical.item_name')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'chemical_table_ajax','name'=>'item_brand','title'=>__('chemical.item_brand')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'chemical_table_ajax','name'=>'item_cas','title'=>__('chemical.item_cas')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'chemical_table_ajax','name'=>'item_catalog','title'=>__('chemical.item_catalog')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'chemical_table_ajax','name'=>'item_location','title'=>__('chemical.item_location')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'chemical_table_ajax','name'=>'item_price','title'=>__('chemical.item_price')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'chemical_table_ajax','name'=>'item_quantity','title'=>__('chemical.item_quantity')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'chemical_table_ajax','name'=>'item_amount','title'=>__('chemical.item_amount')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'chemical_table_ajax','name'=>'item_supplier','title'=>__('chemical.item_supplier')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'chemical_table_ajax','name'=>'date_opened','title'=>__('chemical.date_opened')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'chemical_table_ajax','name'=>'expiration_date','title'=>__('chemical.expiration_date')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'chemical_table_ajax','name'=>'staff_id','title'=>__('chemical.staff_id')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'chemical_table_ajax','name'=>'item_sheet','title'=>__('chemical.item_sheet')]),
                        @include('layouts.components.datatable_data_card_render_action'),
        @endslot 

		@slot('filter_parameter')
            //dt.f_start_date = $('input[name=f_start_date]').val();
            //dt.f_end_date = $('input[name=f_end_date]').val();
        @endslot 

		@slot('firstScript')
            {{-- @if(Auth::user()->can('chemical_create')) --}}
                @include('layouts.components.datatable_button_export_create_modal')
            {{-- @else
                @include('layouts.components.datatable_button_export')
            @endif --}}
        @endslot 

		@slot('secondScript')
        @endslot 
	@endcomponent
    </div>
	
    @include('chemical.menu_active')
@endsection