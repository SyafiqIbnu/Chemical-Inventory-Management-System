@component('layouts.components.edit_modal_one_column',['for' => 'name','required' => '1','label'=>__('laboratory.name')]) 
	@slot('field')
		{!! Form::text('name',$modelLaboratory->name,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'location','required' => '1','label'=>__('laboratory.location')]) 
	@slot('field')
		{!! Form::text('location',$modelLaboratory->location,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'code','required' => '1','label'=>__('laboratory.code')]) 
	@slot('field')
		{!! Form::text('code',$modelLaboratory->code,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'faculty','required' => '1','label'=>__('laboratory.faculty')]) 
	@slot('field')
		{!! Form::text('faculty',$modelLaboratory->faculty,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'type','required' => '1','label'=>__('laboratory.type')]) 
	@slot('field')
		{!! Form::text('type',$modelLaboratory->type,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent

