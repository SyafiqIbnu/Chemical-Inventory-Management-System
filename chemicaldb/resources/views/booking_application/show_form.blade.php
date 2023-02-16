@component('layouts.components.edit_modal_one_column',['for' => 'user_id','required' => '1','label'=>__('booking_application.user_id')]) 
	@slot('field')
		{!! Form::text('user_id',$modelBookingApplication->user_id,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'account_holder_id','required' => '1','label'=>__('booking_application.account_holder_id')]) 
	@slot('field')
		{!! Form::text('account_holder_id',$modelBookingApplication->account_holder_id,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'origin','required' => '1','label'=>__('booking_application.origin')]) 
	@slot('field')
		{!! Form::text('origin',$modelBookingApplication->origin,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'destination','required' => '1','label'=>__('booking_application.destination')]) 
	@slot('field')
		{!! Form::text('destination',$modelBookingApplication->destination,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'distance','required' => '1','label'=>__('booking_application.distance')]) 
	@slot('field')
		{!! Form::text('distance',$modelBookingApplication->distance,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'durationHrs','required' => '1','label'=>__('booking_application.durationHrs')]) 
	@slot('field')
		{!! Form::text('durationHrs',$modelBookingApplication->durationHrs,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'durationMins','required' => '1','label'=>__('booking_application.durationMins')]) 
	@slot('field')
		{!! Form::text('durationMins',$modelBookingApplication->durationMins,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'quantity','required' => '1','label'=>__('booking_application.quantity')]) 
	@slot('field')
		{!! Form::text('quantity',$modelBookingApplication->quantity,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'weight','required' => '1','label'=>__('booking_application.weight')]) 
	@slot('field')
		{!! Form::text('weight',$modelBookingApplication->weight,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'length','required' => '1','label'=>__('booking_application.length')]) 
	@slot('field')
		{!! Form::text('length',$modelBookingApplication->length,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'width','required' => '1','label'=>__('booking_application.width')]) 
	@slot('field')
		{!! Form::text('width',$modelBookingApplication->width,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'height','required' => '1','label'=>__('booking_application.height')]) 
	@slot('field')
		{!! Form::text('height',$modelBookingApplication->height,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'area','required' => '1','label'=>__('booking_application.area')]) 
	@slot('field')
		{!! Form::text('area',$modelBookingApplication->area,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'volume','required' => '1','label'=>__('booking_application.volume')]) 
	@slot('field')
		{!! Form::text('volume',$modelBookingApplication->volume,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'numVehicles','required' => '1','label'=>__('booking_application.numVehicles')]) 
	@slot('field')
		{!! Form::text('numVehicles',$modelBookingApplication->numVehicles,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'costRateVehicles','required' => '1','label'=>__('booking_application.costRateVehicles')]) 
	@slot('field')
		{!! Form::text('costRateVehicles',$modelBookingApplication->costRateVehicles,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'overallCostByType','required' => '1','label'=>__('booking_application.overallCostByType')]) 
	@slot('field')
		{!! Form::text('overallCostByType',$modelBookingApplication->overallCostByType,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'overallCost','required' => '1','label'=>__('booking_application.overallCost')]) 
	@slot('field')
		{!! Form::text('overallCost',$modelBookingApplication->overallCost,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'isConfirmed','required' => '1','label'=>__('booking_application.isConfirmed')]) 
	@slot('field')
		{!! Form::text('isConfirmed',$modelBookingApplication->isConfirmed,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'confirmed_at','required' => '1','label'=>__('booking_application.confirmed_at')]) 
	@slot('field')
		{!! Form::text('confirmed_at',$modelBookingApplication->confirmed_at,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'confirmed_id','required' => '1','label'=>__('booking_application.confirmed_id')]) 
	@slot('field')
		{!! Form::text('confirmed_id',$modelBookingApplication->confirmed_id,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent

