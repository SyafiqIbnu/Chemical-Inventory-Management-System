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
		<div class='col-md-6'>/{!!
			Form::text('{{$col->COLUMN_NAME}}',null,['class'=>'form-control','placeholder'=>__('{{$name}}.{{$col->COLUMN_NAME}}'),'maxlength'=>254]) !!/}
		</div>
	</div>
</div>
@endforeach

<div class="box-footer">
	<a type="button" class="btn btn-danger"	onClick="location.href='/{/{url('{{$newpath}}')/}/}'"><i class="fa fa-close"></i>/{/{__('general.cancel')/}/}</a>
	/{!! Form::button('<i class="fa fa-refresh"></i>
	'.__('general.reset').'',['class'=>'btn btn-success','type'=>'reset'])
	!!/} 
	/{!! Form::button('<i class="fa fa-floppy-o"></i>
	'.__('general.save').'',['class'=>'btn btn-success
	pull-right','type'=>'submit','id'=>'submitButton']) !!/}
</div>
