@component('layouts.components.edit_modal_one_column',['for' => 'name','required' => '1','label'=>__('state.name')]) 
	@slot('field')
		{!! Form::text('name',$modelState->name,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent

