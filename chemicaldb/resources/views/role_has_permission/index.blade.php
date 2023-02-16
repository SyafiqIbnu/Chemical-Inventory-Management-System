@extends('layouts.app')

@section('page_title')
{{$title}}
@endsection

@section('page_description')
{{$title}}
@endsection

@section('breadcrumb')
    <li><a href="{{ url('/')}}"><i class="fa fa-gears"></i>{{__('general.home')}}</a></li>
    <li><a href="#">{{$title}}</a></li>
@endsection

@section('buttonBack')
    <div class='pull-left'>
        <button type="button" class="btn btn-danger" onClick="location.href ='javascript:history.back()'"><i class="fa fa-undo"></i> {{__('general.back')}}</button>
    </div>
@endsection

@section('main-content')
    @include('layouts.components.session_message')
    @push('modals')
        @include('layouts.components.modal_delete')
        @component('layouts.components.modal_create',['id'=>'modal_create','title'=>'Create','route'=>route('role_has_permission.store')]) @slot('content')
            @include('role_has_permission.create_form')
        @endslot @endcomponent
    @endpush
    <div class="col-md-12 table-responsive" style="border: none;">   
        @component('layouts.components.table_ajax', ['tname' => 'role_has_permission_table_ajax']) @slot('url')
            {{ route('role_has_permission.index')}}
        @endslot @slot('thead')
            <th style='width: 30px;'>{{__('general.number')}}</th>
			<th>{{__('role_has_permission.permission_id')}}</th>
			<th>{{__('role_has_permission.role_id')}}</th>
			<th style="width:66px;">{{__('general.action')}}</th>
			<th class="hide"></th>
		@endslot @slot('mthead')
		@endslot @slot('tbody')
            { data: 'id' },
			{ data: 'permission_id', name: 'permission_id' },
			{ data: 'role_id', name: 'role_id' },
			{ data: 'action', name: 'action' },
			{ data: 'mobile-responsive', name: 'mobile-responsive', class: 'mobile-responsive hide', searchable: false},
        @endslot @slot('filter_parameter')
            dt.f_start_date = $('input[name=f_start_date]').val();
            dt.f_end_date = $('input[name=f_end_date]').val();
        @endslot @slot('firstScript')
            @include('layouts.components.datatable_button_export_create_modal')
        @endslot @slot('secondScript')
        @endslot @endcomponent
    </div>
	
	<div class='box-footer'>
		yield('buttonBack')
	</div>

    @push('scripts')
    <script>
        $(document).ready(function() {
            //dpMenuSetActive('menu_companytype');
        } );
    </script>
    @endpush
@endsection