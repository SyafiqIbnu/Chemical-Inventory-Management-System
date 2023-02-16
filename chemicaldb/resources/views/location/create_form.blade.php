@component('layouts.components.edit_modal_one_column',['for' => 'name','required' => '1','label'=>__('location.name')]) 
@slot('field')
	{!! Form::text('name',null,['class'=>'form-control','required','placeholder'=>__('location.name_placeholder'),'maxlength'=>254])  !!}
@endslot 
@endcomponent

@component('layouts.components.edit_modal_one_column',['for' => 'kitchen_id','required' => '1','label'=>__('location.kitchen_id')]) 
@slot('field')
    {!! Form::select('kitchen_id',$kitchen_id_list,null,[ 'class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'kitchen_id','name'=>'kitchen_id']) !!}
@endslot 
@endcomponent



@component('layouts.components.edit_modal_one_column',['for' => 'state_id','required' => '1','label'=>__('location.state_id')]) 
@slot('field')
    {!! Form::select('state_id',$state_id_list,null,[ 'class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'state_id','name'=>'state_id']) !!}
@endslot 
@endcomponent



@component('layouts.components.edit_modal_one_column',['for' => 'active','required' => '1','label'=>__('location.active')]) 
@slot('field')
    {!! Form::select('active',['1'=>__('general.yes'),'2'=>__('general.no')],null,['class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'active','name'=>'active']) !!}
@endslot 
@endcomponent



