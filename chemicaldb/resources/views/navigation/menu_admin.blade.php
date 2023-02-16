@component('layouts.components.nav_li_parent_plain',['title'=>__('menu.administration_nav'),'permission'=>['*functional_user'],'modelPermissions'=>$modelPermissions,'id'=>'system_nav','icon'=>'fa fa-envelope-o']) @slot('content')
    
    {{-- USER --}}
    @component('layouts.components.nav_li_plain',['title'=>__('menu.system_user'),'permission'=>['*functional_user'],'modelPermissions'=>$modelPermissions,'id'=>'system_user','icon'=>'fa fa-gears']) @slot('url')
        {{route('user.index')}}
    @endslot @endcomponent
    
    {{-- STAFF --}}
    @component('layouts.components.nav_li_plain',['title'=>__('menu.administration_staff'),'permission'=>['*functional_staff'],'modelPermissions'=>$modelPermissions,'id'=>'administration_staff','icon'=>'fa fa-gears']) @slot('url')
        {{route('staff.index')}}
    @endslot @endcomponent
    
    {{-- CODE
    @component('layouts.components.nav_li_plain',['title'=>__('menu.system_code'),'permission'=>['*functional_code'],'modelPermissions'=>$modelPermissions,'id'=>'system_code','icon'=>'fa fa-gears blue']) @slot('url')
        {{route('code.index')}}
    @endslot @endcomponent
    --}}
    
    {{-- ROLE --}}
    @component('layouts.components.nav_li_plain',['title'=>__('menu.system_role'),'permission'=>['*functional_role'],'modelPermissions'=>$modelPermissions,'id'=>'system_role','icon'=>'fa fa-gears']) @slot('url')
        {{route('role.index')}}
    @endslot @endcomponent
    
    {{-- NOTIFICATION
    @component('layouts.components.nav_li_plain',['title'=>__('menu.notification'),'permission'=>['*functional_notification'],'modelPermissions'=>$modelPermissions,'id'=>'notification','icon'=>'fa fa-gears']) @slot('url')
        {{route('notification.index')}}
    @endslot @endcomponent
    --}}
    
    {{-- ZONE --}}
    @component('layouts.components.nav_li_plain',['title'=>__('menu.zone'),'permission'=>['*functional_zone'],'modelPermissions'=>$modelPermissions,'id'=>'zone','icon'=>'fa fa-gears']) @slot('url')
        {{route('zone.index')}}
    @endslot @endcomponent
    
    {{-- BRANCH --}}    
    @component('layouts.components.nav_li_plain',['title'=>__('menu.branche'),'permission'=>['*functional_branch'],'modelPermissions'=>$modelPermissions,'id'=>'branche','icon'=>'fa fa-gears']) @slot('url')
        {{route('branche.index')}}
    @endslot @endcomponent
  
  	{{-- BRANCH DISTANCE --}}
    @component('layouts.components.nav_li_plain',['title'=>__('menu.branch_distance'),'permission'=>['*functional_branch_distance'],'modelPermissions'=>$modelPermissions,'id'=>'branch_distance','icon'=>'fa fa-gears']) @slot('url')
        {{route('branch_distance.index')}}
    @endslot @endcomponent
    
    
    @component('layouts.components.nav_li_plain',['title'=>__('menu.vehicle_licen'),'permission'=>['*functional_licen'],'modelPermissions'=>$modelPermissions,'id'=>'vehicle_licen','icon'=>'fa fa-gears']) @slot('url')
        {{route('licen.index')}}
    @endslot @endcomponent
    
    @component('layouts.components.nav_li_plain',['title'=>__('menu.administration_summons'),'permission'=>['*functional_summon'],'modelPermissions'=>$modelPermissions,'id'=>'administration_summons','icon'=>'fa fa-gears']) @slot('url')
        {{route('summon.index')}}
    @endslot @endcomponent
    
    @component('layouts.components.nav_li_plain',['title'=>__('menu.system_permission_group'),'permission'=>['*functional_permission_group'],'modelPermissions'=>$modelPermissions,'id'=>'system_permission_group','icon'=>'fa fa-gears']) @slot('url')
        {{route('permission_group.index')}}
    @endslot @endcomponent
    
    @component('layouts.components.nav_li_plain',['title'=>__('menu.system_mail'),'permission'=>['*functional_mail_message'],'modelPermissions'=>$modelPermissions,'id'=>'system_mail','icon'=>'fa fa-gears']) @slot('url')
        {{route('mail_message.index')}}
    @endslot @endcomponent
    
    {{-- PERMISSION --}}
    @component('layouts.components.nav_li_plain',['title'=>__('menu.system_setting'),'permission'=>['*functional_setting'],'modelPermissions'=>$modelPermissions,'id'=>'system_setting','icon'=>'fa fa-gears']) @slot('url')
        {{route('setting.index')}}
    @endslot @endcomponent
    
    @component('layouts.components.nav_li_plain',['title'=>__('menu.system_trail'),'permission'=>['*functional_trail'],'modelPermissions'=>$modelPermissions,'id'=>'system_trail','icon'=>'fa fa-gears']) @slot('url')
        {{route('trail.index')}}
    @endslot @endcomponent
    
    @component('layouts.components.nav_li_plain',['title'=>__('menu.migration'),'permission'=>['*functional_migration'],'modelPermissions'=>$modelPermissions,'id'=>'migration','icon'=>'fa fa-gears']) @slot('url')
        {{route('migration.index')}}
    @endslot @endcomponent
@endslot @endcomponent