@#extends('layouts.app')

@#section('page_title')
/{/{$title/}/}
@#endsection

@#section('page_description')
/{/{$title/}/}
@#endsection

@#section('breadcrumb')
    <li><a href="/{/{ url('/')/}/}"><i class="fa fa-gears"></i>/{/{__('general.home')/}/}</a></li>
    <li><a href="#">/{/{$title/}/}</a></li>
@#endsection

@#section('main-content')
    @#include('layouts.components.session_message')
    @#push('modals')
        @#if(Auth::user()->can('delete_functional_{{$name}}'))
            @#include('layouts.components.modal_delete')
        @#endif
        @#if(Auth::user()->can('add_functional_{{$name}}'))
            @#component('layouts.components.modal_create',['id'=>'modal_create','title'=>'Create','route'=>route('{{$name}}.store')]) @#slot('content')
                @#include('{{$name}}.create_form')
            @#endslot @#endcomponent
        @#endif
    @#endpush
    <div class="col-md-12 table-responsive" style="border: none;">
        @#component('layouts.components.table_ajax', ['tname' => '{{$name}}_table_ajax']) @#slot('url')
            /{/{ route('{{$name}}.index')/}/}
        @#endslot @#slot('thead')
            <th style='width: 30px;'>/{/{__('general.number')/}/}</th>
            @foreach($filteredColumns as $col)
            <th>/{/{__('{{$name}}.{{$col->COLUMN_NAME}}')/}/}</th>
            @endforeach
            <th style="width:66px;">/{/{__('general.action')/}/}</th>
        @#endslot @#slot('tbody')
            { data: 'DT_RowIndex', orderable: false, searchable: false },
            @foreach($filteredColumns as $col)
            { data: '{{$col->COLUMN_NAME}}', name: '{{$col->COLUMN_NAME}}' },
            @endforeach
            { data: 'action', name: 'action' },
        @#endslot @#slot('filter_parameter')
            dt.f_start_date = $('input[name=f_start_date]').val();
            dt.f_end_date = $('input[name=f_end_date]').val();
        @#endslot @#slot('firstScript')
            @#if(Auth::user()->can('add_functional_{{$name}}'))
                @#include('layouts.components.datatable_button_export_create_modal')
            @#else
                @#include('layouts.components.datatable_button_export')
            @#endif
        @#endslot @#slot('secondScript')
        @#endslot @#endcomponent
    </div>
	
    @#push('scripts')
    <script>
        $(document).ready(function() /{
            //dpMenuSetActive('menu_companytype');
        /} );
    </script>
    @#endpush
@#endsection