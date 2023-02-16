@component('layouts.components.edit_modal_one_column',['for' => 'order_id','required' => '1','label'=>__('order_document.order_id')]) 
	@slot('field')
		{!! Form::text('order_id',$modelOrderDocument->order_id,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'name','required' => '1','label'=>__('order_document.name')]) 
	@slot('field')
		{!! Form::text('name',$modelOrderDocument->name,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'document_types_id','required' => '1','label'=>__('order_document.document_types_id')]) 
	@slot('field')
		{!! Form::text('document_types_id',$modelOrderDocument->document_types_id,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'path','required' => '1','label'=>__('order_document.path')]) 
	@slot('field')
		{!! Form::text('path',$modelOrderDocument->path,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'original_name','required' => '1','label'=>__('order_document.original_name')]) 
	@slot('field')
		{!! Form::text('original_name',$modelOrderDocument->original_name,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'active','required' => '1','label'=>__('order_document.active')]) 
	@slot('field')
		{!! Form::text('active',$modelOrderDocument->active,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent

