@#extends('layouts.app')

@#section('page_title')
/{/{$title/}/}
@#endsection

@#section('page_description')
/{/{$title/}/}
@#endsection

@#section('breadcrumb')
	<li class="breadcrumb-item"><a href="#">/{/{__('general.home')/}/}</a></li>
    <li class="breadcrumb-item active">/{/{$title/}/}</li>
	{{--<li class="breadcrumb-item">a href="/{/{ url('/')/}/}">><i class="fa fa-gears">Home</a></li>
    <li class="breadcrumb-item active">/{/{$title/}/}</li> --}}
@#endsection

@#section('main-content')

    @#include('layouts.components.session_message')
	
	{{-- MODAL --}}
    @#push('modals')
        @#if(\App\Helpers\PermissionHelper::has{{$modelName}}Delete(false))
            @#include('layouts.components.modal_delete')
        @#endif
    @#endpush

	{{-- DATATABLE --}}
    <div class="col-md-12 table-responsive" style="border: none;">
        @#component('layouts.components.table_ajax', ['route'=>'{{$name}}','tname' => '{{$name}}_table_ajax','bgColor'=>'bg-red']) 

		@#slot('url')
            /{/{ route('{{$name}}.indexAjax')/}/}
        @#endslot 

        @slot('options')   
            "order": [[ 1, "asc" ]],
        @endslot 

		@#slot('thead')
            <th style='width: 30px;'>/{/{__('general.number')/}/}</th>
            @foreach($filteredColumns as $col)
            <th>/{/{__('{{$name}}.{{$col->COLUMN_NAME}}')/}/}</th>
            @endforeach
            <th style="width:80px;">/{/{__('general.action')/}/}</th>
        @#endslot 

		@#slot('tbody')
            @#include('layouts.components.datatable_data_card_render_number',['table_name'=>'{{$name}}_table_ajax']),
            @foreach($filteredColumns as $col)
			@php
				$colName=$col->COLUMN_NAME;
			@endphp
            @#include('layouts.components.datatable_data_card_render', ['table_name'=>'{{$name}}_table_ajax','name'=>'{{$colName}}','title'=>__('{{$name}}.{{$colName}}')]),
            @endforeach
            @#include('layouts.components.datatable_data_card_render_action'),
        @#endslot 

		@#slot('filter_parameter')
            //dt.f_start_date = $('input[name=f_start_date]').val();
            //dt.f_end_date = $('input[name=f_end_date]').val();
        @#endslot 

		@#slot('firstScript')
            @#if(Auth::user()->can('{{$name}}_create'))
                @#include('layouts.components.datatable_button_export_create_modal')
            @#else
                @#include('layouts.components.datatable_button_export')
            @#endif
        @#endslot 

		@#slot('secondScript')
        @#endslot 
	@#endcomponent
    </div>
	
    @#include('{{$name}}.menu_active')
@#endsection