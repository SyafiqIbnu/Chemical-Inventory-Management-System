@component('layouts.components.edit_modal_one_column',['for' => 'model_type','required' => '1','label'=>__('mail_message.model_type')]) @slot('field')
    {!! Form::text('module',null,['class'=>'form-control','required','placeholder'=>__('mail_message.model_type_placeholder'),'maxlength'=>254]) !!}
@endslot @endcomponent
@component('layouts.components.edit_modal_one_column',['for' => 'mail_subject','required' => '1','label'=>__('mail_message.mail_subject')]) @slot('field')
    {!! Form::text('mail_subject',null,['class'=>'form-control','required','placeholder'=>__('mail_message.mail_subject_placeholder'),'maxlength'=>254]) !!}
@endslot @endcomponent
@component('layouts.components.edit_modal_one_column',['for' => 'description','required' => '0','label'=>__('mail_message.description')]) @slot('field')
    {!! Form::textarea('mail_text',null,['class'=>'form-control','placeholder'=>__('mail_message.description_placeholder'),'maxlength'=>254]) !!}
@endslot @endcomponent
