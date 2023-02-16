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
        {{--DELETE MODAL--}}
        @if(\App\Helpers\PermissionHelper::hasUserDelete(false))
            @include('layouts.components.modal_delete')
        @endif

        {{--PROCEED MODAL--}}
        @if(\App\Helpers\PermissionHelper::hasUserCreate(false))
            @component('layouts.components.modal_proceed',['id'=>'modal-setadmin']) 
            @endcomponent
        @endif
    @endpush
	
    <div class="col-md-12 table-responsive" style="border: none;">
        @component('layouts.components.table_ajax', ['route'=>'user','tname' => 'user_table_ajax']) 
		@slot('url')
            {{ $ajaxUrl }}
        @endslot 

		@slot('thead')
            <th style='width: 30px;'>{{__('general.number')}}</th>
                        <th>{{__('user.name')}}</th>
                        <th>{{__('user.user_type_id')}}</th>
                        <th>{{__('user.uid')}}</th>
                        <th>{{__('user.email')}}</th>
                        <th>{{__('user.mykad')}}</th>
                        <th>{{__('user.active')}}</th>
                        <th style="width:66px;">{{__('general.action')}}</th>
        @endslot 

		@slot('tbody')
            @include('layouts.components.datatable_data_card_render_number',['table_name'=>'user_table_ajax']),
            @include('layouts.components.datatable_data_card_render', ['table_name'=>'user_table_ajax','name'=>'name','title'=>__('user.name')]),
            @include('layouts.components.datatable_data_card_render', ['table_name'=>'user_table_ajax','name'=>'user_type_id','title'=>__('user.user_type_id')]),
            @include('layouts.components.datatable_data_card_render', ['table_name'=>'user_table_ajax','name'=>'uid','title'=>__('user.uid')]),
            @include('layouts.components.datatable_data_card_render', ['table_name'=>'user_table_ajax','name'=>'email','title'=>__('user.email')]),
            @include('layouts.components.datatable_data_card_render', ['table_name'=>'user_table_ajax','name'=>'mykad','title'=>__('user.mykad')]),
            @include('layouts.components.datatable_data_card_render', ['table_name'=>'user_table_ajax','name'=>'active','title'=>__('user.active')]),
            @include('layouts.components.datatable_data_card_render_action'),
        @endslot 

		@slot('filter_parameter')
            
        @endslot 

		@slot('firstScript')
            @if(Auth::user()->can('user_create') && Auth::user()->is_admin==1)
                @include('layouts.components.datatable_button_export_create_modal')
            @else
                @include('layouts.components.datatable_button_export')
            @endif
        @endslot 

		@slot('secondScript')
        @endslot 
	@endcomponent
    </div>
	
    @include('user.menu_active')
@endsection