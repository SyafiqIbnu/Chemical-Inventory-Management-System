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
    <button type="button" class="btn btn-danger pull-left" onClick="location.href ='javascript:history.back()'"><i class="fa fa-undo"></i> {{__('general.back')}}</button>
@endsection

@section('main-content')
    @include('layouts.components.session_message')
    @push('modals')
        @component('layouts.components.modal_edit',['id'=>'modal_edit','title'=>'Edit']) @slot('route')
            {{ Form::model($modelRoleHasPermission, ['route' => ['role_has_permission.update', $modelRoleHasPermission->id],'method'=>'PUT','enctype' => 'multipart/form-data']) }}
        @endslot @slot('content')
            @include('role_has_permission.edit_form')
        @endslot @endcomponent
    @endpush
    
    
    @component('layouts.components.tab') @slot('nav')
        @component('layouts.components.tab_nav',['id'=>'detail','class'=>'active','title'=>'Details']) @endcomponent
    @endslot @slot('content')
        @component('layouts.components.tab_content',['id'=>'detail','class'=>'active']) @slot('content')
            <div class='box-body'>
                @include('role_has_permission.show_form')
            </div>
            <div class='box-footer'>
                @yield('buttonBack')
                <div class='pull-right'>
                    <a data-toggle="modal" data-target="#modal_edit" type="button" class="btn btn-primary"><i class="fa fa-pencil"></i>&nbsp;{{__('general.edit')}}</a>
                </div>
            </div>
        @endslot @endcomponent
    @endslot @endcomponent
@endsection