@component('layouts.components.edit_modal_one_column',['for' => 'name','required' => '1','label'=>__('staff.name')]) 
	@slot('field')
		{!! Form::text('name',$modelStaff->name,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'staff_no','required' => '1','label'=>__('staff.staff_no')]) 
	@slot('field')
		{!! Form::text('staff_no',$modelStaff->staff_no,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent

