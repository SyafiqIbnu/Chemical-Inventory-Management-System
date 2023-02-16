@component('layouts.components.edit_two_column',['for' => 'name','required' => '1','label'=>__('vehicle_type.name')]) @slot('field')
        {!! Form::text('name',null,['class'=>'form-control','required','placeholder'=>__('vehicle_type.name_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
