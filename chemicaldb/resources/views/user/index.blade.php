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
        @if(\App\Helpers\PermissionHelper::hasUserDelete(false))
            @include('layouts.components.modal_delete')
        @endif
    @endpush

	
    <div class="col-md-12 table-responsive" style="border: none;">
        @component('layouts.components.table_ajax', ['route'=>'user','tname' => 'user_table_ajax','bgColor'=>'bg-red']) 

		@slot('url')
            {{ route('user.indexAjax')}}
        @endslot 

         

		@slot('thead')
            <th style='width: 30px;'>{{__('general.number')}}</th>
                        <th>{{__('user.name')}}</th>
                        <th>{{__('user.uid')}}</th>
                        <th>{{__('user.email')}}</th>
                        <th>{{__('user.phone')}}</th>
                        <th>{{__('user.role_id')}}</th>
                        <th>{{__('user.verified')}}</th>
                        <th>{{__('user.email_verified_at')}}</th>
                        <th>{{__('user.password')}}</th>
                        <th>{{__('user.remember_token')}}</th>
                        <th>{{__('user.active')}}</th>
                        <th>{{__('user.passwordmd5')}}</th>
                        <th>{{__('user.is_admin')}}</th>
                        <th>{{__('user.user_group_id')}}</th>
                        <th>{{__('user.password_change_at')}}</th>
                        <th>{{__('user.user_type_id')}}</th>
                        <th>{{__('user.google2fa_secret')}}</th>
                        <th>{{__('user.use2fa')}}</th>
                        <th>{{__('user.xsessionid')}}</th>
                        <th>{{__('user.xexpires')}}</th>
                        <th style="width:80px;">{{__('general.action')}}</th>
        @endslot 

		@slot('tbody')
            @include('layouts.components.datatable_data_card_render_number',['table_name'=>'user_table_ajax']),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'user_table_ajax','name'=>'name','title'=>__('user.name')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'user_table_ajax','name'=>'uid','title'=>__('user.uid')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'user_table_ajax','name'=>'email','title'=>__('user.email')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'user_table_ajax','name'=>'phone','title'=>__('user.phone')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'user_table_ajax','name'=>'role_id','title'=>__('user.role_id')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'user_table_ajax','name'=>'verified','title'=>__('user.verified')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'user_table_ajax','name'=>'email_verified_at','title'=>__('user.email_verified_at')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'user_table_ajax','name'=>'password','title'=>__('user.password')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'user_table_ajax','name'=>'remember_token','title'=>__('user.remember_token')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'user_table_ajax','name'=>'active','title'=>__('user.active')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'user_table_ajax','name'=>'passwordmd5','title'=>__('user.passwordmd5')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'user_table_ajax','name'=>'is_admin','title'=>__('user.is_admin')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'user_table_ajax','name'=>'user_group_id','title'=>__('user.user_group_id')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'user_table_ajax','name'=>'password_change_at','title'=>__('user.password_change_at')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'user_table_ajax','name'=>'user_type_id','title'=>__('user.user_type_id')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'user_table_ajax','name'=>'google2fa_secret','title'=>__('user.google2fa_secret')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'user_table_ajax','name'=>'use2fa','title'=>__('user.use2fa')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'user_table_ajax','name'=>'xsessionid','title'=>__('user.xsessionid')]),
            			            @include('layouts.components.datatable_data_card_render', ['table_name'=>'user_table_ajax','name'=>'xexpires','title'=>__('user.xexpires')]),
                        @include('layouts.components.datatable_data_card_render_action'),
        @endslot 

		@slot('filter_parameter')
            //dt.f_start_date = $('input[name=f_start_date]').val();
            //dt.f_end_date = $('input[name=f_end_date]').val();
        @endslot 

		@slot('firstScript')
            @if(Auth::user()->can('user_create'))
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