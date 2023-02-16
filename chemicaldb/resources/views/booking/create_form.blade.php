

@component('layouts.components.edit_modal_one_column',['for' => 'cargo_quantity','required' => '1','label'=>__('booking_cargo.total_unit')]) 
@slot('field')
	{!! Form::text('cargo_quantity',$cargo_quantity,['readonly' =>'true', 'class'=>'form-control','required','placeholder'=>__('booking_cargo.total_unit')])  !!}
@endslot 
@endcomponent

@component('layouts.components.edit_modal_one_column',['for' => 'updated_date','required' => '1','label'=>__('booking.created_at')]) 
@slot('field')
	{!! Form::text('updated_date',$modelBooking->updated_at,['readonly' =>'true', 'class'=>'form-control','required','placeholder'=>__('booking.created_at')])  !!}
@endslot 
@endcomponent

@component('layouts.components.edit_modal_one_column',['for' => 'vehicle_type_id','required' => '1','label'=>__('booking.vehicle_type_id')]) 
@slot('field')
	{!! Form::text('vehicle_type_id',$modelBooking->vehicleType->name,['readonly' =>'true', 'class'=>'form-control','required','placeholder'=>__('booking.vehicle_type_id')])  !!}
@endslot 
@endcomponent

@component('layouts.components.edit_modal_one_column',['for' => 'numVehicles','required' => '1','label'=>__('booking.numVehicles')]) 
@slot('field')
	{!! Form::text('numVehicles',$modelBooking->numVehicles,['readonly' =>'true','class'=>'form-control','required','placeholder'=>__('booking.numVehicles')])  !!}
@endslot 
@endcomponent

@component('layouts.components.edit_modal_one_column',['for' => 'costRateVehicles','required' => '1','label'=>__('booking.costRateVehicles')]) 
@slot('field')
	{!! Form::text('costRateVehicles',$modelBooking->costRateVehicles,['readonly' =>'true','class'=>'form-control','required','placeholder'=>__('booking.costRateVehicles')])  !!}
@endslot 
@endcomponent

@component('layouts.components.edit_modal_one_column',['for' => 'delivery_date','required' => '1','label'=>__('booking.delivery_date')]) 
@slot('field')
		{!! Form::text('delivery_date',$modelBooking->delivery_date,['class'=>'form-control datetimepicker-input date-field','data-toggle'=>'datetimepicker','id'=>'delivery_date','data-target'=>'#delivery_date','required','placeholder'=>strtoupper(__('booking.delivery_date'))])  !!}
@endslot 
@endcomponent



