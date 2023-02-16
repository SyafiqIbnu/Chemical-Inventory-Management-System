@component('layouts.components.edit_modal_one_column',['for' => 'name','required' => '1','label'=>__('setting.name')]) 
@slot('field')
	{!! Form::text('name',null,['class'=>'form-control','required','readonly','placeholder'=>__('setting.name_placeholder'),'maxlength'=>50])  !!}
@endslot 
@endcomponent

@component('layouts.components.edit_modal_one_column',['for' => 'label','required' => '1','label'=>__('setting.label')]) 
@slot('field')
	{!! Form::text('label',null,['class'=>'form-control','required','readonly','placeholder'=>__('setting.label_placeholder'),'maxlength'=>50])  !!}
@endslot 
@endcomponent

@component('layouts.components.edit_modal_one_column',['for' => 'uitype','required' => '1','label'=>__('setting.uitype')]) 
@slot('field')
	{!! Form::text('uitype',null,['class'=>'form-control','required','readonly','placeholder'=>__('setting.uitype_placeholder'),'maxlength'=>255])  !!}
@endslot 
@endcomponent

@if($modelSetting->uitype=='int')
	@component('layouts.components.edit_modal_one_column',['for' => 'value','required' => '1','label'=>__('setting.value')]) 
	@slot('field')
		{!! Form::text('value',null,['onkeypress'=>'return isInteger(event)','class'=>'form-control','required','placeholder'=>__('setting.value_placeholder'),'maxlength'=>254])  !!}
	@endslot 
	@endcomponent
@elseif($modelSetting->uitype=='year')
	@component('layouts.components.edit_modal_one_column',['for' => 'value','required' => '1','label'=>__('setting.value')]) 
	@slot('field')
		{!! Form::text('value',null,['class'=>'form-control','required','placeholder'=>__('setting.value_placeholder'),'maxlength'=>4])  !!}
	@endslot 
	@endcomponent
@endif
