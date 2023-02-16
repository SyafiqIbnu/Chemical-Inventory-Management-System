@component('layouts.components.edit_modal_one_column',['for' => 'name','required' => '1','label'=>__('location.name')]) 
	@slot('field')
		{!! Form::text('name',$modelLocation->name,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'code','required' => '1','label'=>__('location.code')]) 
	@slot('field')
		{!! Form::text('code',$modelLocation->code,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'address','required' => '1','label'=>__('location.address')]) 
	@slot('field')
		{!! Form::text('address',$modelLocation->address,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'kitchen_id','required' => '1','label'=>__('location.kitchen_id')]) 
	@slot('field')
		{!! Form::text('kitchen_id',$modelLocation->kitchen_id,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'state_id','required' => '1','label'=>__('location.state_id')]) 
	@slot('field')
		{!! Form::text('state_id',$modelLocation->state_id,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'active','required' => '1','label'=>__('location.active')]) 
	@slot('field')
		{!! Form::text('active',$modelLocation->active,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent

