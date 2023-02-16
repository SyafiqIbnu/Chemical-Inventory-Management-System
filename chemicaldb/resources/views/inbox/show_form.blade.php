@component('layouts.components.edit_modal_one_column',['for' => 'user_id','required' => '1','label'=>__('inbox.user_id')]) 
	@slot('field')
		{!! Form::text('user_id',$modelInbox->user_id,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'from','required' => '1','label'=>__('inbox.from')]) 
	@slot('field')
		{!! Form::text('from',$modelInbox->from,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'message','required' => '1','label'=>__('inbox.message')]) 
	@slot('field')
		{!! Form::text('message',$modelInbox->message,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'read','required' => '1','label'=>__('inbox.read')]) 
	@slot('field')
		{!! Form::text('read',$modelInbox->read,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent

