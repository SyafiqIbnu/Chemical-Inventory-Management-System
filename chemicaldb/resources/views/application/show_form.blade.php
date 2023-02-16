@component('layouts.components.edit_modal_one_column',['for' => 'name','required' => '1','label'=>__('application.name')]) 
	@slot('field')
		{!! Form::text('name',$modelApplication->name,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'code','required' => '1','label'=>__('application.code')]) 
	@slot('field')
		{!! Form::text('code',$modelApplication->code,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'icon','required' => '1','label'=>__('application.icon')]) 
	@slot('field')
		{!! Form::text('icon',$modelApplication->icon,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'key','required' => '1','label'=>__('application.key')]) 
	@slot('field')
		{!! Form::text('key',$modelApplication->key,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'target_url','required' => '1','label'=>__('application.target_url')]) 
	@slot('field')
		{!! Form::text('target_url',$modelApplication->target_url,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'active','required' => '1','label'=>__('application.active')]) 
	@slot('field')
		{!! Form::text('active',$modelApplication->active,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent

