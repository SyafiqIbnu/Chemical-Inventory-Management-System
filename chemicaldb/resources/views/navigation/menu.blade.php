@component('layouts.components.nav_li',['title'=>__('menu.home'),'id'=>'home','icon'=>'fa fa-home']) @slot('url')
    {{url('/')}}
@endslot @endcomponent

@include('layouts.menu_admin')

@component('layouts.components.nav_li_parent',['title'=>__('menu.vehicle_nav'),'permission'=>'view_menu_vehicle_nav','modelPermissions'=>$modelPermissions,'id'=>'vehicle_nav','icon'=>'fa fa-envelope-o']) @slot('content')
    @component('layouts.components.nav_li',['title'=>__('menu.vehicle'),'permission'=>'view_menu_vehicle','modelPermissions'=>$modelPermissions,'id'=>'vehicle','icon'=>'fa fa-gears']) @slot('url')
        {{route('vehicle.index')}}
    @endslot @endcomponent
    @component('layouts.components.nav_li',['title'=>__('menu.vehicle_model'),'permission'=>'view_menu_vehicle_model','modelPermissions'=>$modelPermissions,'id'=>'vehicle_model','icon'=>'fa fa-gears']) @slot('url')
        {{route('vehicle_model.index')}}
    @endslot @endcomponent
    @component('layouts.components.nav_li',['title'=>__('menu.vehicle_summon'),'permission'=>'view_menu_vehicle_summon','modelPermissions'=>$modelPermissions,'id'=>'vehicle_summon','icon'=>'fa fa-gears']) @slot('url')
        {{route('summon.index')}}
    @endslot @endcomponent
    
@endslot @endcomponent



{{--BRANCH MANAGEMENT--}}
@component('layouts.components.nav_li_parent_plain',['title'=>__('menu.branch_management'),'permission'=>['view_function_branch_staff',
'view_function_branch_driver',
'view_function_branch_vehicle',
'view_function_branch_vehicle_summon',
'view_function_branch_booking_request',
'view_function_branch_booking_accepted',
'view_function_branch_booking_rejected',
'view_function_branch_booking_today',
'view_function_branch_booking_live',
'view_function_branch_driver_empty_slots',
'view_function_branch_vehicle_empty_slots',
'view_function_branch_vehicle_shedule',
'view_function_branch_driver_schedule',],'modelPermissions'=>$modelPermissions,'id'=>'branch_management_nav','icon'=>'fa fa-envelope-o']) @slot('content')
	{{-- Staff--}}
    @component('layouts.components.nav_li_plain',['title'=>__('menu.branch_staff'),'permission'=>['view_function_branch_staff'],'modelPermissions'=>$modelPermissions,'id'=>'branch_staff','icon'=>'fa fa-gears']) @slot('url')
        {{route('staff.staff_branch')}}
    @endslot @endcomponent
    
    {{-- Driver List--}}
    @component('layouts.components.nav_li_plain',['title'=>__('menu.branch_driver'),'permission'=>['view_function_branch_driver'],'modelPermissions'=>$modelPermissions,'id'=>'branch_driver','icon'=>'fa fa-gears']) @slot('url')
        {{route('staff.staff_branch_driver')}}
    @endslot @endcomponent
		
	{{-- Kenderaan--}}
    @component('layouts.components.nav_li_plain',['title'=>__('menu.branch_vehicle'),'permission'=>['view_function_branch_vehicle'],'modelPermissions'=>$modelPermissions,'id'=>'branch_vehicle','icon'=>'fa fa-gears']) @slot('url')
        {{route('vehicle.vehicle_branch')}}
    @endslot @endcomponent

    {{-- Saman Kenderaan--}}
    @component('layouts.components.nav_li_plain',['title'=>__('menu.branch_vehicle_summon'),'permission'=>['view_function_branch_vehicle_summon'],'modelPermissions'=>$modelPermissions,'id'=>'branch_vehicle_summon','icon'=>'fa fa-gears']) @slot('url')
        {{route('summon.summon_branch')}}
    @endslot @endcomponent
    
    {{-- Booking Request--}}
    @component('layouts.components.nav_li_plain',['title'=>__('menu.branch_booking_request'),'permission'=>['view_function_branch_booking_request'],'modelPermissions'=>$modelPermissions,'id'=>'branch_booking_request','icon'=>'fa fa-gears']) @slot('url')
        {{route('summon.index')}}
    @endslot @endcomponent
    
    {{-- Booking Accepted--}}
    @component('layouts.components.nav_li_plain',['title'=>__('menu.branch_booking_accepted'),'permission'=>['view_function_branch_booking_accepted'],'modelPermissions'=>$modelPermissions,'id'=>'branch_booking_accepted','icon'=>'fa fa-gears']) @slot('url')
        {{route('summon.index')}}
    @endslot @endcomponent
    
    {{-- Booking Rejected--}}
    @component('layouts.components.nav_li_plain',['title'=>__('menu.branch_booking_rejected'),'permission'=>['view_function_branch_booking_rejected'],'modelPermissions'=>$modelPermissions,'id'=>'branch_booking_rejected','icon'=>'fa fa-gears']) @slot('url')
        {{route('summon.index')}}
    @endslot @endcomponent
    
    {{-- Booking Today--}}
    @component('layouts.components.nav_li_plain',['title'=>__('menu.branch_booking_today'),'permission'=>['view_function_branch_booking_today'],'modelPermissions'=>$modelPermissions,'id'=>'branch_booking_today','icon'=>'fa fa-gears']) @slot('url')
        {{route('summon.index')}}
    @endslot @endcomponent
    
    {{-- Booking Live--}}
    @component('layouts.components.nav_li_plain',['title'=>__('menu.branch_booking_live'),'permission'=>['view_function_branch_booking_live'],'modelPermissions'=>$modelPermissions,'id'=>'branch_booking_live','icon'=>'fa fa-gears']) @slot('url')
        {{route('summon.index')}}
    @endslot @endcomponent
    
    
     {{-- Driver Empty Slot--}}
    @component('layouts.components.nav_li_plain',['title'=>__('menu.branch_driver_empty_slots'),'permission'=>['view_function_branch_driver_empty_slots'],'modelPermissions'=>$modelPermissions,'id'=>'branch_driver_empty_slots','icon'=>'fa fa-gears']) @slot('url')
        {{route('summon.index')}}
    @endslot @endcomponent

     {{-- Vehicle Empty Slot--}}
    @component('layouts.components.nav_li_plain',['title'=>__('menu.branch_vehicle_empty_slots'),'permission'=>['view_function_branch_vehicle_empty_slots'],'modelPermissions'=>$modelPermissions,'id'=>'branch_vehicle_empty_slots','icon'=>'fa fa-gears']) @slot('url')
        {{route('summon.index')}}
    @endslot @endcomponent
    
     {{-- Vehicle Schedule--}}
    @component('layouts.components.nav_li_plain',['title'=>__('menu.branch_vehicle_schedule'),'permission'=>['view_function_branch_vehicle_shedule'],'modelPermissions'=>$modelPermissions,'id'=>'branch_vehicle_schedule','icon'=>'fa fa-gears']) @slot('url')
        {{route('summon.index')}}
    @endslot @endcomponent

     {{-- Driver Schedule--}}
    @component('layouts.components.nav_li_plain',['title'=>__('menu.branch_driver_schedule'),'permission'=>['view_function_branch_driver_schedule'],'modelPermissions'=>$modelPermissions,'id'=>'branch_driver_schedule','icon'=>'fa fa-gears']) @slot('url')
        {{route('summon.index')}}
    @endslot @endcomponent
    
@endslot @endcomponent


@component('layouts.components.nav_li',['title'=>__('menu.report'),'permission'=>'view_menu_report','modelPermissions'=>$modelPermissions,'id'=>'report','icon'=>'fa fa-envelope-o']) @slot('url')
    {{route('report.index')}}
@endslot @endcomponent