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
        @if(\App\Helpers\PermissionHelper::hasAnnouncementDelete(false))
            @include('layouts.components.modal_delete')
        @endif        
    @endpush

	
    <div class="col-md-12 table-responsive" style="border: none;">
        @component('layouts.components.table_ajax', ['route'=>'announcement','tname' => 'announcement_table_ajax']) 

		@slot('url')
            {{ route('announcement.indexAjax')}}
        @endslot 

		@slot('thead')
            <th style='width: 30px;'>{{__('general.number')}}</th>
                        <th>{{__('announcement.title')}}</th>
                        <th>{{__('announcement.content')}}</th>
                        <th>{{__('announcement.active')}}</th>
                        <th>{{__('general.updated_at')}}</th>
                        <th style="width:66px;">{{__('general.action')}}</th>
        @endslot 

		@slot('tbody')
            @include('layouts.components.datatable_data_card_render_number',['table_name'=>'announcement_table_ajax']),
            @include('layouts.components.datatable_data_card_render', ['table_name'=>'announcement_table_ajax','name'=>'title','title'=>__('announcement.title')]),
            @include('layouts.components.datatable_data_card_render', ['table_name'=>'announcement_table_ajax','name'=>'content','title'=>__('announcement.content'),'isHtml'=>true]),
            @include('layouts.components.datatable_data_card_render', ['table_name'=>'announcement_table_ajax','name'=>'active','title'=>__('announcement.active')]),
            @include('layouts.components.datatable_data_card_render', ['table_name'=>'announcement_table_ajax','name'=>'updated_at','title'=>__('general.updated_at')]),
            @include('layouts.components.datatable_data_card_render_action'),
        @endslot 

		@slot('filter_parameter')
            //dt.f_start_date = $('input[name=f_start_date]').val();
            //dt.f_end_date = $('input[name=f_end_date]').val();
        @endslot 

        @slot('options')
            columnDefs: [ {
                    "targets": 2,
                    "render": function ( data, type, row ,meta ) {
                        //return $("<div/>").html(data).text(); 
                        data = data.replace(/(?:\r\n|\r|\n)/g, '<br>');
                        return data;
                    }
            } ],
            "order": [[ 4, "desc" ]],              	
        @endslot

		@slot('firstScript')
            @if(Auth::user()->can('announcement_create'))
                @include('layouts.components.datatable_button_export_create_modal')
            @else
                @include('layouts.components.datatable_button_export')
            @endif
        @endslot 

		@slot('secondScript')
        @endslot 
	@endcomponent
    </div>
	
    @include('announcement.menu_active')
@endsection