@extends('layouts.app')

@section('page_title')
{{__('general.profile')}}
@endsection

@section('page_description')
{{__('general.profile')}}
@endsection

@section('breadcrumb')
	<li class="breadcrumb-item"><a href="#">{{__('general.profile')}}</a></li>
    <li class="breadcrumb-item active">{{__('general.profile')}}</li>
@endsection

@section('main-content')
@include('layouts.components.session_message')

<div class="col-md-12">
	<div class="card card-primary">
	  <div class="card-header">
		<h3 class="card-title">{{__('general.profile')}}</h3>
	  </div>
		
	<div class="card-body">

	{!! Form::open(['route'=>'user.store','id'=>'myAppForm']) !!}
	@include('user.show_form')
		</div>
	<div class="card-footer">
		
	</div>
	{!! Form::close() !!}
		</div>
	</div>
@endsection

@include('user.profile_menu_active')

@push('scriptsDocumentReadyBottom')

function copyToClipboard(elementId) {

// Create a "hidden" input
var aux = document.createElement("input");

// Assign it the value of the specified element
aux.setAttribute("value", document.getElementById(elementId).innerHTML);

// Append it to the body
document.body.appendChild(aux);

// Highlight its content
aux.select();

// Copy the highlighted text
document.execCommand("copy");

// Remove it from the body
document.body.removeChild(aux);

}
@endpush