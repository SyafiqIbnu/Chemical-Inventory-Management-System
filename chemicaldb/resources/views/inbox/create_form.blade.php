{!! Form::hidden('user_id',null)  !!}

@component('layouts.components.edit_modal_one_column',['for' => 'from','required' => '1','label'=>__('inbox.from')]) 
@slot('field')
	{!! Form::text('from',null,['class'=>'form-control','required','placeholder'=>__('inbox.from_placeholder'),'maxlength'=>255])  !!}
@endslot 
@endcomponent

@component('layouts.components.edit_modal_one_column',['for' => 'message','required' => '1','label'=>__('inbox.message')]) 
@slot('field')
	{!! Form::text('message',null,['class'=>'form-control','required','placeholder'=>__('inbox.message_placeholder'),'maxlength'=>255])  !!}
@endslot 
@endcomponent

@component('layouts.components.edit_modal_one_column',['for' => 'read','required' => '1','label'=>__('inbox.read')]) 
@slot('field')
	{!! Form::hidden('read',null)  !!}
	{!! Form::checkbox('read',1)  !!}
@endslot 
@endcomponent

