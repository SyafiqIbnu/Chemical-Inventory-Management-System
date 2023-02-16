@component('layouts.components.edit_modal_one_column',['for' => 'name','required' => '1','label'=>__('order_statu.name')]) 
	@slot('field')
		{!! Form::text('name',$modelOrderStatu->name,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent

