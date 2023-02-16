<div>
	@#if($errors->any())
	<div class="alert alert-danger">
		@#foreach($errors->all() as $error)
		<p>/{/{ $error /}/}</p>
		@#endforeach
	</div>
	@#endif
</div>

@foreach($filteredColumns as $col)
<div class='row'>
	<div class='col-md-12 form-group row'>
            <label for="{{$col->COLUMN_NAME}}" class='col-md-2'>/{/{__('{{$name}}.{{$col->COLUMN_NAME}}')/}/}</label>
            <div class='col-md-6'>
                <div class="box box-body box-solid box-default no-margin">/{/{$model->{{$col->COLUMN_NAME}}/}/}</div>
            </div>
        </div>
</div>
@endforeach

<div class="box-footer">
	<a type="button" class="btn btn-danger"	onClick="location.href='/{/{url('{{$newpath}}')/}/}'"><i class="fa fa-close"></i>/{/{__('general.back')/}/}</a>
</div>
