@component('layouts.components.show_two_column',['label'=>__('role_has_permission.permission_id')]) @slot('field')
        {{$modelRoleHasPermission->permission_id}}
    @endslot @endcomponent
    @component('layouts.components.show_two_column',['label'=>__('role_has_permission.role_id')]) @slot('field')
        {{$modelRoleHasPermission->role_id}}
    @endslot @endcomponent
