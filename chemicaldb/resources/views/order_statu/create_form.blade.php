@component('layouts.components.edit_modal_one_column',['for' => 'id','required' => '1','label'=>__('order_statu.id')]) 
@slot('field')
	{!! Form::text('id',null,['class'=>'form-control','required','placeholder'=>__('order_statu.id_placeholder')])  !!}
@endslot 
@endcomponent

@component('layouts.components.edit_modal_one_column',['for' => 'name','required' => '1','label'=>__('order_statu.name')]) 
@slot('field')
	{!! Form::text('name',null,['class'=>'form-control','required','placeholder'=>__('order_statu.name_placeholder'),'maxlength'=>30])  !!}
@endslot 
@endcomponent

