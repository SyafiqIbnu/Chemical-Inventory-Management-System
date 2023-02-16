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
        @if(\App\Helpers\PermissionHelper::hasEmailDelete(false))
            @include('layouts.components.modal_delete')
        @endif
        {{--PROCEED MODAL--}}
        @if(\App\Helpers\PermissionHelper::hasEmailCreate(false))
            @component('layouts.components.modal_create',['id'=>'modal_create','title'=>'Tambah','route'=>route('mail_message.store')]) @slot('content')
                @include('mail_message.create_form')
            @endslot @endcomponent
        @endif
    @endpush

    <div class="col-md-12 table-responsive" style="border: none;">
        @component('layouts.components.table_ajax', ['route'=>'mail_message','tname' => 'mail_message_table_ajax']) @slot('url')
            {{ route('mail_message.indexAjax')}}
        @endslot 

        @slot('thead')
            <th style='width: 30px;'>{{__('general.number')}}</th>
            <th>{{__('mail_message.model_type')}}</th>
            <th>{{__('mail_message.mail_subject')}}</th>
            <th>{{__('mail_message.description')}}</th>
            <th style="width:80px;">{{__('general.action')}}</th>
        @endslot 

        @slot('tbody')
            @include('layouts.components.datatable_data_card_render_number',['table_name'=>'mail_message_table_ajax']),
            @include('layouts.components.datatable_data_card_render', ['table_name'=>'mail_message_table_ajax','name'=>'module','title'=>__('mail_message.model_type')]),
            @include('layouts.components.datatable_data_card_render', ['table_name'=>'mail_message_table_ajax','name'=>'mail_subject','title'=>__('mail_message.mail_subject')]),
            @include('layouts.components.datatable_data_card_render', ['table_name'=>'mail_message_table_ajax','name'=>'mail_text','title'=>__('mail_message.description')]),
            @include('layouts.components.datatable_data_card_render_action'),
        @endslot 

        @slot('filter_parameter')

        @endslot 

        @slot('firstScript')
            @if(Auth::user()->can('email_create'))
                @include('layouts.components.datatable_button_export_create_modal')
            @else
                @include('layouts.components.datatable_button_export')
            @endif
        @endslot 

        @slot('secondScript')
        @endslot 
    @endcomponent
    </div>

    @include('mail_message.menu_active')
@endsection