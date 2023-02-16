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
        @if(\App\Helpers\PermissionHelper::hasSettingDelete(false))
            @include('layouts.components.modal_delete')
        @endif
    @endpush

	
    <div class="col-md-12 table-responsive" style="border: none;">
        @component('layouts.components.table_ajax', ['route'=>'setting','tname' => 'setting_table_ajax','bgColor'=>'bg-red']) 

		@slot('url')
            {{ route('setting.indexAjax')}}
        @endslot 

         

		@slot('thead')
            <th style='width: 30px;'>{{__('general.number')}}</th>
                        <th>{{__('setting.name')}}</th>
                        <th>{{__('setting.label')}}</th>
                        <th>{{__('setting.value')}}</th>
                        <th>{{__('setting.uitype')}}</th>
                        <th style="width:80px;">{{__('general.action')}}</th>
        @endslot 

		@slot('tbody')
            @include('layouts.components.datatable_data_card_render_number',['table_name'=>'setting_table_ajax']),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'setting_table_ajax','name'=>'name','title'=>__('setting.name')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'setting_table_ajax','name'=>'label','title'=>__('setting.label')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'setting_table_ajax','name'=>'value','title'=>__('setting.value')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'setting_table_ajax','name'=>'uitype','title'=>__('setting.uitype')]),
                        @include('layouts.components.datatable_data_card_render_action'),
        @endslot 

		@slot('filter_parameter')
            //dt.f_start_date = $('input[name=f_start_date]').val();
            //dt.f_end_date = $('input[name=f_end_date]').val();
        @endslot 

		@slot('firstScript')
            @if(Auth::user()->can('setting_create'))
                @include('layouts.components.datatable_button_export_create_modal')
            @else
                @include('layouts.components.datatable_button_export')
            @endif
        @endslot 

		@slot('secondScript')
        @endslot 
	@endcomponent
    </div>
	
    @include('setting.menu_active')
@endsection