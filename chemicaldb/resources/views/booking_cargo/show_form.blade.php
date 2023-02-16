@component('layouts.components.edit_modal_one_column',['for' => 'booking_application_id','required' => '1','label'=>__('booking_cargo.booking_application_id')]) 
	@slot('field')
		{!! Form::text('booking_application_id',$modelBookingCargo->booking_application_id,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'weight','required' => '1','label'=>__('booking_cargo.weight')]) 
	@slot('field')
		{!! Form::text('weight',$modelBookingCargo->weight,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'length','required' => '1','label'=>__('booking_cargo.length')]) 
	@slot('field')
		{!! Form::text('length',$modelBookingCargo->length,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'width','required' => '1','label'=>__('booking_cargo.width')]) 
	@slot('field')
		{!! Form::text('width',$modelBookingCargo->width,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'height','required' => '1','label'=>__('booking_cargo.height')]) 
	@slot('field')
		{!! Form::text('height',$modelBookingCargo->height,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'radius','required' => '1','label'=>__('booking_cargo.radius')]) 
	@slot('field')
		{!! Form::text('radius',$modelBookingCargo->radius,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'diameter','required' => '1','label'=>__('booking_cargo.diameter')]) 
	@slot('field')
		{!! Form::text('diameter',$modelBookingCargo->diameter,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent

