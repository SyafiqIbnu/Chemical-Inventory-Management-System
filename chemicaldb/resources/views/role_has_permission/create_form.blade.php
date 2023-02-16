@component('layouts.components.edit_modal_one_column',['for' => 'permission_id','required' => '1','label'=>__('role_has_permission.permission_id')]) @slot('field')
        {!! Form::text('permission_id',null,['class'=>'form-control','required','placeholder'=>__('role_has_permission.permission_id_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_modal_one_column',['for' => 'role_id','required' => '1','label'=>__('role_has_permission.role_id')]) @slot('field')
        {!! Form::text('role_id',null,['class'=>'form-control','required','placeholder'=>__('role_has_permission.role_id_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
