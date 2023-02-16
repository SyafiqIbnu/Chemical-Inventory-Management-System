@component('layouts.components.edit_modal_one_column',['for' => 'name','required' => '1','label'=>__('state.name')]) 
@slot('field')
	{!! Form::text('name',null,['class'=>'form-control','required','placeholder'=>__('state.name_placeholder'),'maxlength'=>255])  !!}
@endslot 
@endcomponent

