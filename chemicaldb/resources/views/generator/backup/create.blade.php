@#extends('layouts.app')

@#section('htmlheader_title')
/{/{__('{{$name}}.title_create')/}/}
@#endsection

@#section('contentheader_title')
/{/{__('{{$name}}.title_create')/}/}
@#endsection

@#section('main-content')
@#include('{{$name}}.header')

/{!! Form::open(['route'=>'{{$name}}.store','id'=>'myAppForm']) !!/}
@#include('{{$name}}._form')
/{!! Form::close() !!/}

@#endsection