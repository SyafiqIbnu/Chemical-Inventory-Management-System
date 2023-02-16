@component('layouts.components.edit_two_column',['for' => 'model_type','required' => '1','label'=>__('mail_message.model_type')]) @slot('field')
    {!! Form::text('model_type',null,['class'=>'form-control','required','placeholder'=>__('mail_message.model_type_placeholder'),'maxlength'=>254]) !!}
@endslot @endcomponent
@component('layouts.components.edit_two_column',['for' => 'type','required' => '1','label'=>__('mail_message.type')]) @slot('field')
    {!! Form::text('type',null,['class'=>'form-control','required','placeholder'=>__('mail_message.type_placeholder'),'maxlength'=>254]) !!}
@endslot @endcomponent
@component('layouts.components.edit_two_column',['for' => 'mail_subject','required' => '1','label'=>__('mail_message.mail_subject')]) @slot('field')
    {!! Form::text('mail_subject',null,['class'=>'form-control','required','placeholder'=>__('mail_message.mail_subject_placeholder'),'maxlength'=>254]) !!}
@endslot @endcomponent
@component('layouts.components.edit_two_column',['for' => 'description','required' => '0','label'=>__('mail_message.description')]) @slot('field')
    {!! Form::text('description',null,['class'=>'form-control','placeholder'=>__('mail_message.description_placeholder'),'maxlength'=>254]) !!}
@endslot @endcomponent
@component('layouts.components.edit_two_column',['for' => 'mail_variable','required' => '0','label'=>__('mail_message.mail_variable')]) @slot('field')
    {!! Form::text('mail_variable',null,['class'=>'form-control','placeholder'=>__('mail_message.mail_variable_placeholder'),'maxlength'=>254]) !!}
@endslot @endcomponent
@component('layouts.components.edit_no_column',['for' => 'mail_text','required' => '1','label'=>__('mail_message.mail_text')]) @slot('field')
    {!! Form::textarea('mail_text',null,['rows'=>5,'class'=>'form-control','required','placeholder'=>__('mail_message.mail_text_placeholder')]) !!}
@endslot @endcomponent
