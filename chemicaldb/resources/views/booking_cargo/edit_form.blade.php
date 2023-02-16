@component('layouts.components.edit_two_column',['for' => 'booking_application_id','required' => '1','label'=>__('booking_cargo.booking_application_id')]) @slot('field')
        {!! Form::text('booking_application_id',null,['class'=>'form-control','required','placeholder'=>__('booking_cargo.booking_application_id_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent

    @component('layouts.components.edit_two_column',['for' => 'height','required' => '1','label'=>__('booking_cargo.height')]) @slot('field')
        {!! Form::text('height',null,['class'=>'form-control','required','placeholder'=>__('booking_cargo.height_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent

    
    @component('layouts.components.edit_two_column',['for' => 'weight','required' => '1','label'=>__('booking_cargo.weight')]) @slot('field')
        {!! Form::text('weight',null,['class'=>'form-control','required','placeholder'=>__('booking_cargo.weight_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'length','required' => '1','label'=>__('booking_cargo.length')]) @slot('field')
        {!! Form::text('length',null,['class'=>'form-control','required','placeholder'=>__('booking_cargo.length_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'width','required' => '1','label'=>__('booking_cargo.width')]) @slot('field')
        {!! Form::text('width',null,['class'=>'form-control','required','placeholder'=>__('booking_cargo.width_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    
    @component('layouts.components.edit_two_column',['for' => 'radius','required' => '1','label'=>__('booking_cargo.radius')]) @slot('field')
        {!! Form::text('radius',null,['class'=>'form-control','required','placeholder'=>__('booking_cargo.radius_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'diameter','required' => '1','label'=>__('booking_cargo.diameter')]) @slot('field')
        {!! Form::text('diameter',null,['class'=>'form-control','required','placeholder'=>__('booking_cargo.diameter_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
