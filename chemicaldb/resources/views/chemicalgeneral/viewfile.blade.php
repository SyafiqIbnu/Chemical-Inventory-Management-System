@extends('layouts.app')

@section('page_title')
View Document
@endsection

@section('page_description')
View Document

@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">{{__('general.home')}}</a></li>
    <li class="breadcrumb-item active">Upload Item Sheet</li>
@endsection

@section('main-content')
    @component('layouts.components.crud_card')
        @slot('cardTitle') {{__('general.chemical')}} @endslot
        @slot('cardColor') card-success @endslot
        
        @slot('cardBody')
        <div class="row">
          
            <div class="col-md-6">
                {{-- code here --}}
                <iframe height="600" width="1550" src="uploads/itemsheet/{{ $data->file }}"></iframe>
            </div>   
        </div>
        @endslot

        @slot('cardFooter')
            <a type="button" class="btn btn-danger"	onClick="location.href='{{url('chemical')}}'"><i class="fa fa-close"></i> {{__('general.cancel')}}</a>
            {!! Form::button('<i class="fa fa-refresh"></i> '.__('general.reset').'',['class'=>'btn btn-warning','type'=>'reset']) !!} 
            {!! Form::button('<i class="fa fa-floppy-o"></i> '.__('general.save').'',['class'=>'btn btn-success pull-right','type'=>'submit','id'=>'submitButton']) !!}
            {!! Form::close() !!}
        @endslot
    @endcomponent

@endsection

@include('chemical.menu_active')