@component('layouts.components.edit_two_column',['for' => 'booking_application_id','required' => '1','label'=>__('booking.booking_application_id')]) @slot('field')
        {!! Form::text('booking_application_id',null,['class'=>'form-control','required','placeholder'=>__('booking.booking_application_id_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'numVehicles','required' => '1','label'=>__('booking.numVehicles')]) @slot('field')
        {!! Form::text('numVehicles',null,['class'=>'form-control','required','placeholder'=>__('booking.numVehicles_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'costRateVehicles','required' => '1','label'=>__('booking.costRateVehicles')]) @slot('field')
        {!! Form::text('costRateVehicles',null,['class'=>'form-control','required','placeholder'=>__('booking.costRateVehicles_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'overallCostByType','required' => '1','label'=>__('booking.overallCostByType')]) @slot('field')
        {!! Form::text('overallCostByType',null,['class'=>'form-control','required','placeholder'=>__('booking.overallCostByType_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'overallCost','required' => '1','label'=>__('booking.overallCost')]) @slot('field')
        {!! Form::text('overallCost',null,['class'=>'form-control','required','placeholder'=>__('booking.overallCost_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
