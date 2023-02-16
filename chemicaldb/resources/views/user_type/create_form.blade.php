@component('layouts.components.edit_modal_one_column',['for' => 'name','required' => '1','label'=>__('user_type.name')]) 
@slot('field')
	{!! Form::text('name',null,['class'=>'form-control','required','placeholder'=>__('user_type.name_placeholder'),'maxlength'=>255])  !!}
@endslot 
@endcomponent

@component('layouts.components.edit_modal_one_column',['for' => 'active','required' => '1','label'=>__('user_type.active')]) 
@slot('field')
    {!! Form::select('active',['1'=>__('general.active'),'2'=>__('general.inactive')],null,['class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'active','name'=>'active']) !!}
@endslot 
@endcomponent



