@component('layouts.components.edit_modal_one_column',['for' => 'product_type','required' => '1','label'=>__('product.product_type')]) 
	@slot('field')
		{!! Form::text('product_type',$modelProduct->product_type,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'product_category','required' => '1','label'=>__('product.product_category')]) 
	@slot('field')
		{!! Form::text('product_category',$modelProduct->product_category,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'name','required' => '1','label'=>__('product.name')]) 
	@slot('field')
		{!! Form::text('name',$modelProduct->name,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'price','required' => '1','label'=>__('product.price')]) 
	@slot('field')
		{!! Form::text('price',$modelProduct->price,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'description','required' => '1','label'=>__('product.description')]) 
	@slot('field')
		{!! Form::text('description',$modelProduct->description,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'image','required' => '1','label'=>__('product.image')]) 
	@slot('field')
		{!! Form::text('image',$modelProduct->image,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'image_path','required' => '1','label'=>__('product.image_path')]) 
	@slot('field')
		{!! Form::text('image_path',$modelProduct->image_path,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'pax_no','required' => '1','label'=>__('product.pax_no')]) 
	@slot('field')
		{!! Form::text('pax_no',$modelProduct->pax_no,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'active','required' => '1','label'=>__('product.active')]) 
	@slot('field')
		{!! Form::text('active',$modelProduct->active,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent

