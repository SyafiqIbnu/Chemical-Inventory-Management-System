@component('layouts.components.edit_modal_one_column',['for' => 'name','required' => '1','label'=>__('account_type.name')]) 
@slot('field')
	{!! Form::text('name',null,['class'=>'form-control','required','placeholder'=>__('account_type.name_placeholder'),'maxlength'=>255])  !!}
@endslot 
@endcomponent

