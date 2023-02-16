@component('layouts.components.edit_modal_one_column',['for' => 'title','required' => '1','label'=>__('announcement.title')]) 
	@slot('field')
		{!! Form::text('title',$modelAnnouncement->title,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'content','required' => '1','label'=>__('announcement.content')]) 
	@slot('field')
		{!! Form::textArea('content',$modelAnnouncement->content,['rows'=>'5','class'=>'form-control','required','placeholder'=>__('announcement.content_placeholder'),'maxlength'=>500,'readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent

	@component('layouts.components.edit_modal_one_column',['for' => 'active','required' => '1','label'=>__('announcement.active')]) 
	@slot('field')
		{!! Form::text('active',$modelAnnouncement->active,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent

	@component('layouts.components.edit_modal_one_column',['for' => 'active','required' => '1','label'=>__('general.updated_at')]) 
	@slot('field')
		{!! Form::text('updated_at',$modelAnnouncement->updated_at,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent