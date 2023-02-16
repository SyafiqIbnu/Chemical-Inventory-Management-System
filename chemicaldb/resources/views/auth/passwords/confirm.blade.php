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

@component('shared.staff_tabs_shared',['staffid'=>$staffid])
    @slot('selectedTab')
        staffleave
    @endslot
    @slot('content')
	
    @push('modals')
        @if(\App\Helpers\PermissionHelper::hasLeaveDelete())
            @include('layouts.components.modal_delete')
        @endif        
    @endpush

    @php
        $table_ajax_readonly=false;
        $route=\App\Helpers\AppHelper::getCurrentBaseRoute();
        if($route=="profile"){
            $table_ajax_readonly=true;
        }
    @endphp   
	
    



    
    
@endslot 
@endcomponent

   
@endsection

@if($route=="profile")
    @include('shared.profile_menu_active')
@else
    @include('leave.menu_active')
@endif