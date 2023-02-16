@component('layouts.components.edit_modal_one_column',['for' => 'title','required' => '1','label'=>__('announcement.title')]) 
@slot('field')
	{!! Form::text('title',null,['class'=>'form-control','required','placeholder'=>__('announcement.title_placeholder'),'maxlength'=>255])  !!}
@endslot 
@endcomponent

@component('layouts.components.edit_modal_one_column',['for' => 'content','required' => '1','label'=>__('announcement.content')]) 
@slot('field')
	{!! Form::textArea('content',null,['rows'=>'5','class'=>'form-control','required','placeholder'=>__('announcement.content_placeholder'),'maxlength'=>500])  !!}
@endslot 
@endcomponent

@component('layouts.components.edit_modal_one_column',['for' => 'active','required' => '1','label'=>__('announcement.active')]) 
@slot('field')
    {!! Form::select('active',['1'=>__('general.active'),'2'=>__('general.inactive')],null,['class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'active','name'=>'active']) !!}
@endslot 
@endcomponent



