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
        @if(\App\Helpers\PermissionHelper::hasInboxDelete(false))
            @include('layouts.components.modal_delete')
        @endif
    @endpush

	
    <div class="col-md-12 table-responsive" style="border: none;">
        @component('layouts.components.table_ajax', ['route'=>'inbox','tname' => 'inbox_table_ajax','bgColor'=>'bg-red']) 

		@slot('url')
            {{ route('inbox.indexAjax')}}
        @endslot 

         

		@slot('thead')
            <th style='width: 30px;'>{{__('general.number')}}</th>
                        <th>{{__('inbox.from')}}</th>
                        <th>{{__('inbox.message')}}</th>
                        <th>{{__('inbox.read')}}</th>
                        <th style="width:80px;">{{__('general.action')}}</th>
        @endslot 

		@slot('tbody')
            @include('layouts.components.datatable_data_card_render_number',['table_name'=>'inbox_table_ajax']),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'inbox_table_ajax','name'=>'from','title'=>__('inbox.from')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'inbox_table_ajax','name'=>'message','title'=>__('inbox.message')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'inbox_table_ajax','name'=>'read','title'=>__('inbox.read')]),
                        @include('layouts.components.datatable_data_card_render_action'),
        @endslot 

		@slot('filter_parameter')
            //dt.f_start_date = $('input[name=f_start_date]').val();
            //dt.f_end_date = $('input[name=f_end_date]').val();
        @endslot 

		@slot('firstScript')
            @if(Auth::user()->can('inbox_create'))
                @include('layouts.components.datatable_button_export_create_modal')
            @else
                @include('layouts.components.datatable_button_export')
            @endif
        @endslot 

		@slot('secondScript')
        @endslot 
	@endcomponent
    </div>
	
    @include('inbox.menu_active')
@endsection