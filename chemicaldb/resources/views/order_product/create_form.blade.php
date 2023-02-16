@component('layouts.components.edit_modal_one_column',['for' => 'product_id','required' => '1','label'=>__('order_product.product_id')]) 
@slot('field')
	{!! Form::text('product_id',null,['class'=>'form-control','required','placeholder'=>__('order_product.product_id_placeholder')])  !!}
@endslot 
@endcomponent

@component('layouts.components.edit_modal_one_column',['for' => 'quantity','required' => '1','label'=>__('order_product.quantity')]) 
@slot('field')
	{!! Form::text('quantity',null,['class'=>'form-control','required','placeholder'=>__('order_product.quantity_placeholder')])  !!}
@endslot 
@endcomponent

@component('layouts.components.edit_modal_one_column',['for' => 'price','required' => '1','label'=>__('order_product.price')]) 
@slot('field')
	{!! Form::text('price',null,['class'=>'form-control','required','placeholder'=>__('order_product.price_placeholder')])  !!}
@endslot 
@endcomponent

@component('layouts.components.edit_modal_one_column',['for' => 'amount','required' => '1','label'=>__('order_product.amount')]) 
@slot('field')
	{!! Form::text('amount',null,['class'=>'form-control','required','placeholder'=>__('order_product.amount_placeholder')])  !!}
@endslot 
@endcomponent

