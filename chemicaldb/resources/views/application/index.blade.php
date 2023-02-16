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
        @if(Auth::user()->can('delete_application'))
            @include('layouts.components.modal_delete')
        @endif
        @if(Auth::user()->can('create_application'))
            @component('layouts.components.modal_create',['id'=>'modal_create','title'=>'Create','route'=>route('application.store')]) @slot('content')
                @include('application.create_form')
            @endslot @endcomponent
        @endif
    @endpush

	
    <div class="col-md-12 table-responsive" style="border: none;">
        @component('layouts.components.table_ajax', ['route'=>'application','tname' => 'application_table_ajax']) 

		@slot('url')
            {{ route('application.indexAjax')}}
        @endslot 

		@slot('thead')
            <th style='width: 30px;'>{{__('general.number')}}</th>
            <th>{{__('application.name')}}</th>
            <th>{{__('application.code')}}</th>
            <th>{{__('application.active')}}</th>
            <th style="width:66px;">{{__('general.action')}}</th>
        @endslot 

		@slot('tbody')
            @include('layouts.components.datatable_data_card_render_number',['table_name'=>'application_table_ajax']),
            @include('layouts.components.datatable_data_card_render', ['table_name'=>'application_table_ajax','name'=>'name','title'=>__('application.name')]),
            @include('layouts.components.datatable_data_card_render', ['table_name'=>'application_table_ajax','name'=>'code','title'=>__('application.code')]),
            @include('layouts.components.datatable_data_card_render', ['table_name'=>'application_table_ajax','name'=>'activeLabel','title'=>__('application.active')]),
            @include('layouts.components.datatable_data_card_render_action'),
        @endslot 

		@slot('filter_parameter')
            //dt.f_start_date = $('input[name=f_start_date]').val();
            //dt.f_end_date = $('input[name=f_end_date]').val();
        @endslot 

		@slot('firstScript')
            @if(Auth::user()->can('create_application'))
                @include('layouts.components.datatable_button_export_create_modal')
            @else
                @include('layouts.components.datatable_button_export')
            @endif
        @endslot 

		@slot('secondScript')
        @endslot 
	@endcomponent
    </div>
	
    @include('application.menu_active')
@endsection