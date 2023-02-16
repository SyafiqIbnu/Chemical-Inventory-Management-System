@#component('layouts.components.edit_modal_one_column',['for' => '{{$col->COLUMN_NAME}}','required' => '1','label'=>__('{{$name}}.{!!$col->COLUMN_NAME!!}')]) 
@php
	if($col->CHARACTER_MAXIMUM_LENGTH==null){
		$field_maxlength='';
	}else{
		$field_maxlength=",'maxlength'=>".$col->CHARACTER_MAXIMUM_LENGTH;
		//$field_maxlength='';
	}
@endphp
@#slot('field')
    /{#!! Form::select('{{$col->COLUMN_NAME}}',['1'=>__('general.true'),'2'=>__('general.false')],null,['class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'{{$col->COLUMN_NAME}}','name'=>'{{$col->COLUMN_NAME}}']) !!/}
@#endslot 
@#endcomponent



