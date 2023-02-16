@extends('layouts.app')

@section('page_title')
{{__('general.create')}}
@endsection

@section('page_description')
{{__('general.create')}}
@endsection

@section('breadcrumb')
	<li class="breadcrumb-item"><a href="#">{{__('general.home')}}</a></li>
    <li class="breadcrumb-item active">{{__('general.create')}}</li>
@endsection

@section('main-content')
	@component('layouts.components.crud_card')
		@slot('cardTitle') PESANAN @endslot
		@slot('cardColor') card-success @endslot
		
		@slot('cardBody')
    			@include('order.create_form_readonly')
		@endslot

		@slot('cardFooter')
			
		@endslot
	@endcomponent

    @component('layouts.components.crud_card')
		@slot('cardTitle') PILIH MENU -
		@foreach($product_categories as $category)
			<a class="btn btn-success" href="#{{$category->name}}">{{$category->name}}</a>
			
		@endforeach
		@endslot

		@slot('cardColor') card-success @endslot
		
		@slot('cardBody')
		
        		@include('order.create_form_products')
		
		@endslot

		@slot('cardFooter')
			
		@endslot
	@endcomponent
	

	@component('layouts.components.crud_card')
		@slot('cardTitle') ORDER SUMMARY @endslot
		@slot('cardColor') card-success @endslot
		
		@slot('cardBody')
        	@include('order.product_summary')
		@endslot

		@slot('cardFooter')
		@if($countOrderProduct>0)
			{!! Form::model($modelOrder, ['route' => ['order.proceed', $modelOrder->id],'method'=>'GET','id'=>'orderForm']) !!}
			<!--<a type="button" class="btn btn-danger"	onClick="location.href='{{url('order')}}'"><i class="fa fa-close"></i> {{__('general.cancel')}}</a>
			{!! Form::button('<i class="fa fa-refresh"></i> '.__('general.reset').'',['class'=>'btn btn-warning','type'=>'reset']) !!} -->
			{!! Form::button('<i class="fa fa-floppy-o"></i> '.__('general.proceed').'',['class'=>'btn btn-success pull-right','type'=>'submit','id'=>'submitButton']) !!}
			{!! Form::close() !!}
		@endif
		@endslot
	@endcomponent

@endsection

@include('order.menu_active')