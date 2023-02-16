@component('layouts.components.edit_modal_one_column',['for' => 'booking_application_id','required' => '1','label'=>__('booking.booking_application_id')]) 
	@slot('field')
		{!! Form::text('booking_application_id',$modelBooking->booking_application_id,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'numVehicles','required' => '1','label'=>__('booking.numVehicles')]) 
	@slot('field')
		{!! Form::text('numVehicles',$modelBooking->numVehicles,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'costRateVehicles','required' => '1','label'=>__('booking.costRateVehicles')]) 
	@slot('field')
		{!! Form::text('costRateVehicles',$modelBooking->costRateVehicles,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'overallCostByType','required' => '1','label'=>__('booking.overallCostByType')]) 
	@slot('field')
		{!! Form::text('overallCostByType',$modelBooking->overallCostByType,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'overallCost','required' => '1','label'=>__('booking.overallCost')]) 
	@slot('field')
		{!! Form::text('overallCost',$modelBooking->overallCost,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent

