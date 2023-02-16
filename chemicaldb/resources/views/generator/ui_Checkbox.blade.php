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
	/{#!! Form::hidden('{{$col->COLUMN_NAME}}',null)  !!/}
	/{#!! Form::checkbox('{{$col->COLUMN_NAME}}',1)  !!/}
@#endslot 
@#endcomponent

