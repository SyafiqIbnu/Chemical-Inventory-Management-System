@component('layouts.components.edit_modal_one_column',['for' => 'name','required' => '1','label'=>__('staff.name')]) 
@slot('field')
	{!! Form::text('name',null,['class'=>'form-control','required','placeholder'=>__('staff.name_placeholder'),'maxlength'=>45])  !!}
@endslot 
@endcomponent

@component('layouts.components.edit_modal_one_column',['for' => 'staff_no','required' => '1','label'=>__('staff.staff_no')]) 
@slot('field')
	{!! Form::text('staff_no',null,['class'=>'form-control','required','placeholder'=>__('staff.staff_no_placeholder')])  !!}
@endslot 
@endcomponent

