@component('layouts.components.edit_modal_one_column',['for' => 'name','required' => '1','label'=>__('role.name')]) 
	@slot('field')
		{!! Form::text('name',$modelRole->name,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent

