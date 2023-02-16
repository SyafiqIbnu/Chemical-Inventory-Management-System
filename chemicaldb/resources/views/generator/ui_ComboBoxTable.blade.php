@#component('layouts.components.edit_modal_one_column',['for' => '{{$col->COLUMN_NAME}}','required' => '1','label'=>__('{{$name}}.{!!$col->COLUMN_NAME!!}')]) 
@php
	//dd($data);
	if($col->CHARACTER_MAXIMUM_LENGTH==null){
		$field_maxlength='';
	}else{
		$field_maxlength=",'maxlength'=>".$col->CHARACTER_MAXIMUM_LENGTH;
		//$field_maxlength='';
	}

	$selectName=$col->COLUMN_NAME;
	$selectPlaceHolderAttr="placeholder";
	$selectMultipleAttr="";
	$t=$col->COLUMN_NAME.'_selection_type';
	if($data[$t]==2){
		$selectMultipleAttr="'multiple'=>'multiple',";
		$selectPlaceHolderAttr="data-placeholder";
		$selectName=$col->COLUMN_NAME."[]";
	}
@endphp
@#slot('field')
    /{#!! Form::select('{!!$selectName!!}',${{$col->COLUMN_NAME}}_list,null,[{!!$selectMultipleAttr!!} 'class'=>'form-control select2','required','{!!$selectPlaceHolderAttr!!}'=>__('general.please_select'),'id'=>'{{$col->COLUMN_NAME}}','name'=>'{{$col->COLUMN_NAME}}']) !!/}
@#endslot 
@#endcomponent



