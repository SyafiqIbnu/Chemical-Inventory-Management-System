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
        {{-- @if(\App\Helpers\PermissionHelper::hasLaboratoryDelete(false)) --}}
            @include('layouts.components.modal_delete')
        {{-- @endif --}}
    @endpush

	
    <div class="col-md-12 table-responsive" style="border: none;">
        @component('layouts.components.table_ajax', ['route'=>'laboratory','tname' => 'laboratory_table_ajax','bgColor'=>'bg-red']) 

		@slot('url')
            {{ route('laboratory.indexAjax')}}
        @endslot 

         

		@slot('thead')
            <th style='width: 30px;'>{{__('general.number')}}</th>
                        <th>{{__('laboratory.name')}}</th>
                        <th>{{__('laboratory.location')}}</th>
                        <th>{{__('laboratory.code')}}</th>
                        <th>{{__('laboratory.faculty')}}</th>
                        <th>{{__('laboratory.type')}}</th>
                        <th>{{__('laboratory.created_at')}}</th>
                        <th style="width:80px;">{{__('general.action')}}</th>
        @endslot 

		@slot('tbody')
            @include('layouts.components.datatable_data_card_render_number',['table_name'=>'laboratory_table_ajax']),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'laboratory_table_ajax','name'=>'name','title'=>__('laboratory.name')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'laboratory_table_ajax','name'=>'location','title'=>__('laboratory.location')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'laboratory_table_ajax','name'=>'code','title'=>__('laboratory.code')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'laboratory_table_ajax','name'=>'faculty','title'=>__('laboratory.faculty')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'laboratory_table_ajax','name'=>'type','title'=>__('laboratory.type')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'laboratory_table_ajax','name'=>'created_at','title'=>__('laboratory.created_at')]),
                        @include('layouts.components.datatable_data_card_render_action'),
        @endslot 

		@slot('filter_parameter')
            //dt.f_start_date = $('input[name=f_start_date]').val();
            //dt.f_end_date = $('input[name=f_end_date]').val();
        @endslot 

		@slot('firstScript')
            {{-- @if(Auth::user()->can('laboratory_create')) --}}
                @include('layouts.components.datatable_button_export_create_modal')
            {{-- @else
                @include('layouts.components.datatable_button_export')
            @endif --}}
        @endslot 

		@slot('secondScript')
        @endslot 
	@endcomponent
    </div>
	
    @include('laboratory.menu_active')
@endsection