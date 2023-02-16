@foreach($filteredColumns as $col)
	@#component('layouts.components.edit_modal_one_column',['for' => '{{$col->COLUMN_NAME}}','required' => '1','label'=>__('{{$name}}.{!!$col->COLUMN_NAME!!}')]) 
	@#slot('field')
		/{#!! Form::text('{{$col->COLUMN_NAME}}',$model{{$modelName}}->{{$col->COLUMN_NAME}},['class'=>'form-control','required','readonly'=>'readonly'])  !!/}
	@#endslot 
	@#endcomponent
@endforeach

