@#extends('layouts.app')

@#section('htmlheader_title')
/{/{__('{{$name}}.title_edit')/}/}
@#endsection

@#section('contentheader_title')
/{/{__('{{$name}}.title_edit')/}/}
@#endsection

@#section('main-content')
@#include('{{$name}}.header')

/{!! Form::model($model, ['route' => ['{{$name}}.update', $model->id],'method'=>'PUT','id'=>'myAppForm']) !!/}
@#include('{{$name}}._form')
/{!! Form::close() !!/}
						
@#endsection
