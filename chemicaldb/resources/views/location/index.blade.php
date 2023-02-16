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
        @if(\App\Helpers\PermissionHelper::hasLocationDelete(false))
            @include('layouts.components.modal_delete')
        @endif
    @endpush --}}

	
    <div class="col-md-12 table-responsive" style="border: none;">
        @component('layouts.components.table_ajax', ['route'=>'location','tname' => 'location_table_ajax','bgColor'=>'bg-red']) 

		@slot('url')
            {{ route('location.indexAjax')}}
        @endslot 

         

		@slot('thead')
            <th style='width: 30px;'>{{__('general.number')}}</th>
                        <th>{{__('location.name')}}</th>
                        <th>{{__('location.kitchen_id')}}</th>
                        <th>{{__('location.state_id')}}</th>
                        <th>{{__('location.active')}}</th>
                        <th style="width:80px;">{{__('general.action')}}</th>
        @endslot 

		@slot('tbody')
            @include('layouts.components.datatable_data_card_render_number',['table_name'=>'location_table_ajax']),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'location_table_ajax','name'=>'name','title'=>__('location.name')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'location_table_ajax','name'=>'kitchen_id','title'=>__('location.kitchen_id')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'location_table_ajax','name'=>'state_id','title'=>__('location.state_id')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'location_table_ajax','name'=>'active','title'=>__('location.active')]),
                        @include('layouts.components.datatable_data_card_render_action'),
        @endslot 

		@slot('filter_parameter')
            //dt.f_start_date = $('input[name=f_start_date]').val();
            //dt.f_end_date = $('input[name=f_end_date]').val();
        @endslot 

		@slot('firstScript')
            @if(Auth::user()->can('location_create'))
                @include('layouts.components.datatable_button_export_create_modal')
            @else
                @include('layouts.components.datatable_button_export')
            @endif
        @endslot 

		@slot('secondScript')
        @endslot 
	@endcomponent
    </div>
	
    @include('location.menu_active')
@endsection