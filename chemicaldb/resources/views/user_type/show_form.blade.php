@component('layouts.components.edit_modal_one_column',['for' => 'name','required' => '1','label'=>__('user_type.name')]) 
	@slot('field')
		{!! Form::text('name',$modelUserType->name,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'active','required' => '1','label'=>__('user_type.active')]) 
	@slot('field')
		{!! Form::text('active',$modelUserType->active,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent

