@component('layouts.components.edit_two_column',['for' => 'name','required' => '1','label'=>__('user_type.name')]) @slot('field')
        {!! Form::text('name',null,['class'=>'form-control','required','placeholder'=>__('user_type.name_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'active','required' => '1','label'=>__('user_type.active')]) @slot('field')
        {!! Form::text('active',null,['class'=>'form-control','required','placeholder'=>__('user_type.active_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
