@component('layouts.components.edit_modal_one_column',['for' => 'name','required' => '1','label'=>__('setting.name')]) 
	@slot('field')
		{!! Form::text('name',$modelSetting->name,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'label','required' => '1','label'=>__('setting.label')]) 
	@slot('field')
		{!! Form::text('label',$modelSetting->label,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'value','required' => '1','label'=>__('setting.value')]) 
	@slot('field')
		{!! Form::text('value',$modelSetting->value,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'uitype','required' => '1','label'=>__('setting.uitype')]) 
	@slot('field')
		{!! Form::text('uitype',$modelSetting->uitype,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent

