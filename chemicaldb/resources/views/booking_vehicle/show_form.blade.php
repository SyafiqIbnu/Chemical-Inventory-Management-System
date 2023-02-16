@component('layouts.components.edit_modal_one_column',['for' => 'booking_id','required' => '1','label'=>__('booking_vehicle.booking_id')]) 
	@slot('field')
		{!! Form::text('booking_id',$modelBookingVehicle->booking_id,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'vehicle_type_id','required' => '1','label'=>__('booking_vehicle.vehicle_type_id')]) 
	@slot('field')
		{!! Form::text('vehicle_type_id',$modelBookingVehicle->vehicle_type_id,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'cost','required' => '1','label'=>__('booking_vehicle.cost')]) 
	@slot('field')
		{!! Form::text('cost',$modelBookingVehicle->cost,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent

