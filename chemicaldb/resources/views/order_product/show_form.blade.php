@component('layouts.components.edit_modal_one_column',['for' => 'order_id','required' => '1','label'=>__('order_product.order_id')]) 
	@slot('field')
		{!! Form::text('order_id',$modelOrderProduct->order_id,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'product_id','required' => '1','label'=>__('order_product.product_id')]) 
	@slot('field')
		{!! Form::text('product_id',$modelOrderProduct->product_id,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'quantity','required' => '1','label'=>__('order_product.quantity')]) 
	@slot('field')
		{!! Form::text('quantity',$modelOrderProduct->quantity,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'price','required' => '1','label'=>__('order_product.price')]) 
	@slot('field')
		{!! Form::text('price',$modelOrderProduct->price,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'amount','required' => '1','label'=>__('order_product.amount')]) 
	@slot('field')
		{!! Form::text('amount',$modelOrderProduct->amount,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent

