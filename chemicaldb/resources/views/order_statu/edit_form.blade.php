@component('layouts.components.edit_two_column',['for' => 'name','required' => '1','label'=>__('order_statu.name')]) @slot('field')
        {!! Form::text('name',null,['class'=>'form-control','required','placeholder'=>__('order_statu.name_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
