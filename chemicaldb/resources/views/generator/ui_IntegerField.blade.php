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
	/{#!! Form::text('{{$col->COLUMN_NAME}}',null,['onkeypress'=>'return isInteger(event)', 'class'=>'form-control','required','placeholder'=>__('{{$name}}.{{$col->COLUMN_NAME}}_placeholder'){!!$field_maxlength!!}])  !!/}
@#endslot 
@#endcomponent

