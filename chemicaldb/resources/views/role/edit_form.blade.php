@component('layouts.components.edit_two_column',['for' => 'name','required' => '1','label'=>__('role.name')]) @slot('field')
        {!! Form::text('name',null,['class'=>'form-control','required','placeholder'=>__('role.name_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
