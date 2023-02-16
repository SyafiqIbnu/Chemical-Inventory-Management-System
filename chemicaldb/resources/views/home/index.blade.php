@extends('layouts.app_auth')

@section('page_title')
{{$title}}
@endsection

@section('page_description')
{{$title}}
@endsection

@section('breadcrumb')
	<li class="breadcrumb-item"><a href="#">{{__('general.home')}}</a></li>
    <li class="breadcrumb-item active">{{$title}}</li>	
@endsection

@section('main-content')
    @include('dashboard')

   
    @include('home.menu_active')

@endsection