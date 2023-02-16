@component('layouts.components.edit_modal_one_column',['for' => 'name','required' => '1','label'=>__('product_type.name')]) 
	@slot('field')
		{!! Form::text('name',$modelProductType->name,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent

