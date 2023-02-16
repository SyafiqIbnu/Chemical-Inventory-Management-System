
    @component('layouts.components.edit_modal_one_column',['for' => 'origin','required' => '1','label'=>__('booking_application.origin')]) @slot('field')
        {!! Form::text('origin',$modelBookingApplication->origin,['readonly'=>true, 'class'=>'form-control','required','placeholder'=>__('booking_application.origin_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_modal_one_column',['for' => 'destination','required' => '1','label'=>__('booking_application.destination')]) @slot('field')
        {!! Form::text('destination',$modelBookingApplication->destination,['readonly'=>true,'class'=>'form-control','required','placeholder'=>__('booking_application.destination_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_modal_one_column',['for' => 'distance','required' => '1','label'=>__('booking_application.distance')]) @slot('field')
        {!! Form::text('distance',$modelBookingApplication->distance,['readonly'=>true,'class'=>'form-control','required','placeholder'=>__('booking_application.distance_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    