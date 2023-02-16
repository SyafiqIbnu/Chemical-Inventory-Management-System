@component('layouts.components.edit_two_column',['for' => 'booking_id','required' => '1','label'=>__('booking_vehicle.booking_id')]) @slot('field')
        {!! Form::text('booking_id',null,['class'=>'form-control','required','placeholder'=>__('booking_vehicle.booking_id_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'vehicle_type_id','required' => '1','label'=>__('booking_vehicle.vehicle_type_id')]) @slot('field')
        {!! Form::text('vehicle_type_id',null,['class'=>'form-control','required','placeholder'=>__('booking_vehicle.vehicle_type_id_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'cost','required' => '1','label'=>__('booking_vehicle.cost')]) @slot('field')
        {!! Form::text('cost',null,['class'=>'form-control','required','placeholder'=>__('booking_vehicle.cost_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
