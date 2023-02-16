@#extends('layouts.app')

@#section('page_title')
/{/{$title/}/}
@#endsection

@#section('page_description')
/{/{$title/}/}
@#endsection

@#section('breadcrumb')
    <li><a href="/{/{ url('/')/}/}"><i class="fa fa-gears"></i>/{/{__('general.home')/}/}</a></li>
    <li><a href="#">/{/{$title/}/}</a></li>
@#endsection

@#section('main-content')
    @#include('layouts.components.session_message')
    @#include('{{$name}}.show_form')
@#endsection
