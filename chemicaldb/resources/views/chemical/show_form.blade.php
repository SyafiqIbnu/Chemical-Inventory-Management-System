@component('layouts.components.edit_modal_one_column',['for' => 'laboratory_id','required' => '1','label'=>__('chemical.laboratory_id')]) 
	@slot('field')
		{!! Form::text('laboratory_id',$modelChemical->laboratory_id,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'item_name','required' => '1','label'=>__('chemical.item_name')]) 
	@slot('field')
		{!! Form::text('item_name',$modelChemical->item_name,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'item_brand','required' => '1','label'=>__('chemical.item_brand')]) 
	@slot('field')
		{!! Form::text('item_brand',$modelChemical->item_brand,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'item_cas','required' => '1','label'=>__('chemical.item_cas')]) 
	@slot('field')
		{!! Form::text('item_cas',$modelChemical->item_cas,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'item_catalog','required' => '1','label'=>__('chemical.item_catalog')]) 
	@slot('field')
		{!! Form::text('item_catalog',$modelChemical->item_catalog,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'item_location','required' => '1','label'=>__('chemical.item_location')]) 
	@slot('field')
		{!! Form::text('item_location',$modelChemical->item_location,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'item_price','required' => '1','label'=>__('chemical.item_price')]) 
	@slot('field')
		{!! Form::text('item_price',$modelChemical->item_price,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'item_quantity','required' => '1','label'=>__('chemical.item_quantity')]) 
	@slot('field')
		{!! Form::text('item_quantity',$modelChemical->item_quantity,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'item_amount','required' => '1','label'=>__('chemical.item_amount')]) 
	@slot('field')
		{!! Form::text('item_amount',$modelChemical->item_amount,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'item_supplier','required' => '1','label'=>__('chemical.item_supplier')]) 
	@slot('field')
		{!! Form::text('item_supplier',$modelChemical->item_supplier,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'date_opened','required' => '1','label'=>__('chemical.date_opened')]) 
	@slot('field')
		{!! Form::text('date_opened',$modelChemical->date_opened,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'expiration_date','required' => '1','label'=>__('chemical.expiration_date')]) 
	@slot('field')
		{!! Form::text('expiration_date',$modelChemical->expiration_date,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'staff_id','required' => '1','label'=>__('chemical.staff_id')]) 
	@slot('field')
		{!! Form::text('staff_id',$modelChemical->staff_id,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'item_sheet','required' => '1','label'=>__('chemical.item_sheet')]) 
	@slot('field')
		{!! Form::text('item_sheet',$modelChemical->item_sheet,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent

