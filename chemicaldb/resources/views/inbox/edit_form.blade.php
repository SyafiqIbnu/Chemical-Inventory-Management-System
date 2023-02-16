@component('layouts.components.edit_two_column',['for' => 'user_id','required' => '1','label'=>__('inbox.user_id')]) @slot('field')
        {!! Form::text('user_id',null,['class'=>'form-control','required','placeholder'=>__('inbox.user_id_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'from','required' => '1','label'=>__('inbox.from')]) @slot('field')
        {!! Form::text('from',null,['class'=>'form-control','required','placeholder'=>__('inbox.from_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'message','required' => '1','label'=>__('inbox.message')]) @slot('field')
        {!! Form::text('message',null,['class'=>'form-control','required','placeholder'=>__('inbox.message_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
    @component('layouts.components.edit_two_column',['for' => 'read','required' => '1','label'=>__('inbox.read')]) @slot('field')
        {!! Form::text('read',null,['class'=>'form-control','required','placeholder'=>__('inbox.read_placeholder'),'maxlength'=>254]) !!}
    @endslot @endcomponent
