@component('layouts.components.edit_modal_one_column',['for' => 'name','required' => '1','label'=>__('laboratory.name')]) 
@slot('field')
	{!! Form::text('name',null,['class'=>'form-control','required','placeholder'=>__('laboratory.name_placeholder'),'maxlength'=>254])  !!}
@endslot 
@endcomponent

@component('layouts.components.edit_modal_one_column',['for' => 'location','required' => '1','label'=>__('laboratory.location')]) 
@slot('field')
	{!! Form::text('location',null,['class'=>'form-control','required','placeholder'=>__('laboratory.location_placeholder'),'maxlength'=>254])  !!}
@endslot 
@endcomponent

@component('layouts.components.edit_modal_one_column',['for' => 'code','required' => '1','label'=>__('laboratory.code')]) 
@slot('field')
	{!! Form::text('code',null,['class'=>'form-control','required','placeholder'=>__('laboratory.code_placeholder'),'maxlength'=>254])  !!}
@endslot 
@endcomponent

@component('layouts.components.edit_modal_one_column',['for' => 'faculty','required' => '1','label'=>__('laboratory.faculty')]) 
@slot('field')
    {!! Form::select('faculty',$faculty_list,null,[ 'class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'faculty','name'=>'faculty']) !!}
@endslot 
@endcomponent



@component('layouts.components.edit_modal_one_column',['for' => 'type','required' => '1','label'=>__('laboratory.type')]) 
@slot('field')
    {!! Form::select('type',$type_list,null,[ 'class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'type','name'=>'type']) !!}
@endslot 
@endcomponent



