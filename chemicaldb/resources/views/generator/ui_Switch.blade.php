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
	
	<div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
		/{#!! Form::hidden('{{$col->COLUMN_NAME}}',null)  !!/}
		<input type="checkbox" class="custom-control-input" name="{{$col->COLUMN_NAME}}" id="{{$col->COLUMN_NAME}}" value="1"
			@#php 
				if(Form::getValueAttribute('read',null)==1){
					echo "checked";
				}; 
			@#endphp
		>
		<label class="custom-control-label" for="{{$col->COLUMN_NAME}}">
			{{$col->COLUMN_NAME}}
		</label>
	</div>
@#endslot 
@#endcomponent

