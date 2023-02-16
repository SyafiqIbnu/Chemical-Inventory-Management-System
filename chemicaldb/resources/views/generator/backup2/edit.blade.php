@#extends('layouts.app')

@#section('htmlheader_title')
/{/{__('{{$name}}.title_edit')/}/}/{/{__('{{$name}}.title')/}/}
@#endsection

@#section('contentheader_title')
/{/{__('{{$name}}.title_edit')/}/}/{/{__('{{$name}}.title')/}/}
@#endsection

@#section('main-content')
@#include('{{$name}}.header')
@#include('msg.session_message')

/{!! Form::model($model{{$modelName}}, ['route' => ['{{$name}}.update', $model{{$modelName}}->id],'method'=>'PUT','id'=>'myAppForm']) !!/}
@#include('{{$name}}.edit_form')
<div class="box-footer">
	<a type="button" class="btn btn-danger"	onClick="location.href='/{/{url('{{$name}}')/}/}'"><i class="fa fa-close"></i> /{/{__('general.cancel')/}/}</a>
	/{!! Form::button('<i class="fa fa-refresh"></i> '.__('general.reset').'',['class'=>'btn btn-success','type'=>'reset']) !!/} 
	/{!! Form::button('<i class="fa fa-floppy-o"></i> '.__('general.save').'',['class'=>'btn btn-success pull-right','type'=>'submit','id'=>'submitButton']) !!/}
</div>
/{!! Form::close() !!/}
						
@#endsection
