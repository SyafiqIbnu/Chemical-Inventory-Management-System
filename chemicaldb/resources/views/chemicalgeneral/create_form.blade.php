{{-- {{ Form::hidden('laboratory_id', $laboratoryid) }} --}}
@component('layouts.components.edit_modal_one_column',['for' => 'laboratory_id','required' => '1','label'=>__('chemical.laboratory_id')]) 
@slot('field')
    {!! Form::select('faculty',$laboratory_list,null,[ 'class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'laboratory_id','name'=>'laboratory_id']) !!}
@endslot 
@endcomponent

@component('layouts.components.edit_modal_one_column',['for' => 'item_name','required' => '1','label'=>__('chemical.item_name')]) 
@slot('field')
	{!! Form::text('item_name',null,['class'=>'form-control','required','placeholder'=>__('chemical.item_name_placeholder'),'maxlength'=>64])  !!}
@endslot 
@endcomponent

@component('layouts.components.edit_modal_one_column',['for' => 'item_brand','required' => '1','label'=>__('chemical.item_brand')]) 
@slot('field')
	{!! Form::text('item_brand',null,['class'=>'form-control','required','placeholder'=>__('chemical.item_brand_placeholder'),'maxlength'=>64])  !!}
@endslot 
@endcomponent

@component('layouts.components.edit_modal_one_column',['for' => 'item_cas','required' => '1','label'=>__('chemical.item_cas')]) 
@slot('field')
	{!! Form::text('item_cas',null,['class'=>'form-control','required','placeholder'=>__('chemical.item_cas_placeholder'),'maxlength'=>64])  !!}
@endslot 
@endcomponent

@component('layouts.components.edit_modal_one_column',['for' => 'item_catalog','required' => '1','label'=>__('chemical.item_catalog')]) 
@slot('field')
	{!! Form::text('item_catalog',null,['class'=>'form-control','required','placeholder'=>__('chemical.item_catalog_placeholder'),'maxlength'=>64])  !!}
@endslot 
@endcomponent

@component('layouts.components.edit_modal_one_column',['for' => 'item_location','required' => '1','label'=>__('chemical.item_location')]) 
@slot('field')
	{!! Form::text('item_location',null,['class'=>'form-control','required','placeholder'=>__('chemical.item_location_placeholder'),'maxlength'=>254])  !!}
@endslot 
@endcomponent

@component('layouts.components.edit_modal_one_column',['for' => 'item_price','required' => '1','label'=>__('chemical.item_price')]) 
@slot('field')
	{!! Form::text('item_price',null,['class'=>'form-control','required','placeholder'=>__('chemical.item_price_placeholder')])  !!}
@endslot 
@endcomponent

@component('layouts.components.edit_modal_one_column',['for' => 'item_quantity','required' => '1','label'=>__('chemical.item_quantity')]) 
@slot('field')
	{!! Form::text('item_quantity',null,['class'=>'form-control','required','placeholder'=>__('chemical.item_quantity_placeholder')])  !!}
@endslot 
@endcomponent

@component('layouts.components.edit_modal_one_column',['for' => 'item_amount','required' => '1','label'=>__('chemical.item_amount')]) 
@slot('field')
	{!! Form::text('item_amount',null,['class'=>'form-control','required','placeholder'=>__('chemical.item_amount_placeholder')])  !!}
@endslot 
@endcomponent

@component('layouts.components.edit_modal_one_column',['for' => 'item_supplier','required' => '1','label'=>__('chemical.item_supplier')]) 
@slot('field')
	{!! Form::text('item_supplier',null,['class'=>'form-control','required','placeholder'=>__('chemical.item_supplier_placeholder'),'maxlength'=>254])  !!}
@endslot 
@endcomponent

@component('layouts.components.edit_modal_one_column',['for' => 'date_opened','required' => '1','label'=>__('chemical.date_opened')]) 
@slot('field')
		{!! Form::text('date_opened',null,['class'=>'form-control datetimepicker-input date-field','data-toggle'=>'datetimepicker','id'=>'date_opened','data-target'=>'#date_opened','required','placeholder'=>__('chemical.date_opened_placeholder')])  !!}
@endslot 
@endcomponent

@component('layouts.components.edit_modal_one_column',['for' => 'expiration_date','required' => '1','label'=>__('chemical.expiration_date')]) 
@slot('field')
		{!! Form::text('expiration_date',null,['class'=>'form-control datetimepicker-input date-field','data-toggle'=>'datetimepicker','id'=>'expiration_date','data-target'=>'#expiration_date','required','placeholder'=>__('chemical.expiration_date_placeholder')])  !!}
@endslot 
@endcomponent

{{-- @component('layouts.components.edit_modal_one_column',['for' => 'staff_id','required' => '1','label'=>__('chemical.staff_id')]) 
@slot('field')
	{!! Form::text('staff_id',null,['class'=>'form-control','required','placeholder'=>__('chemical.staff_id_placeholder')])  !!}
@endslot 
@endcomponent --}}
@component('layouts.components.edit_modal_one_column',['for' => 'staff_id','required' => '1','label'=>__('chemical.staff_id')]) 
@slot('field')
    {!! Form::select('faculty',$staff_list,null,[ 'class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'staff_id','name'=>'staff_id']) !!}
@endslot 
@endcomponent