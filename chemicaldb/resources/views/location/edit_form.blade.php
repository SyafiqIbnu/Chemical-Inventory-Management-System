@component('layouts.components.edit_two_column',['for' => 'name','required' => '1','label'=>__('location.name')]) @slot('field')
        {!! Form::text('name',null,['class'=>'form-control','required','placeholder'=>__('location.name_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'code','required' => '1','label'=>__('location.code')]) @slot('field')
        {!! Form::text('code',null,['class'=>'form-control','required','placeholder'=>__('location.code_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'address','required' => '1','label'=>__('location.address')]) @slot('field')
        {!! Form::text('address',null,['class'=>'form-control','required','placeholder'=>__('location.address_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'kitchen_id','required' => '1','label'=>__('location.kitchen_id')]) @slot('field')
        {!! Form::text('kitchen_id',null,['class'=>'form-control','required','placeholder'=>__('location.kitchen_id_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'state_id','required' => '1','label'=>__('location.state_id')]) @slot('field')
        {!! Form::text('state_id',null,['class'=>'form-control','required','placeholder'=>__('location.state_id_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'active','required' => '1','label'=>__('location.active')]) @slot('field')
        {!! Form::text('active',null,['class'=>'form-control','required','placeholder'=>__('location.active_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
