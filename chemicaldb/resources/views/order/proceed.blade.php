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
		@slot('cardTitle') ORDER SUMMARY @endslot
		@slot('cardColor') card-success @endslot
		
		@slot('cardBody')
		    @include('order.product_summary')
		@endslot

		@slot('cardFooter')
			
		@endslot
	@endcomponent
	

	@component('layouts.components.crud_card')
		@slot('cardTitle') UPLOAD PAYMENT @endslot
		@slot('cardColor') card-success @endslot
		
		@slot('cardBody')
        <h5>PEMBAYARAN KE AKAUN: {{$bankaccount->account_name}}  {{$bankaccount->account_no}}  {{$bankaccount->bank_name}}</h5>
            @component('layouts.components.edit_modal_one_column',['for' => 'name','required' => '1','label'=>__('Muatnaik Resit Pembayaran')]) 
            @slot('field')
            {!! Form::model($modelOrder, ['route' => ['orderlinked.submit', $modelOrder->id],'method'=>'PUT','id'=>'orderForm','enctype'=>'multipart/form-data']) !!}
                {!! Form::file('Pilih Fail', ['class' => 'btn btn-primary','name'=>'filepath']) !!}
            @endslot 
            @endcomponent
		@endslot

		@slot('cardFooter')
		
			<!--<a type="button" class="btn btn-danger"	onClick="location.href='{{url('order')}}'"><i class="fa fa-close"></i> {{__('general.cancel')}}</a>
			{!! Form::button('<i class="fa fa-refresh"></i> '.__('general.reset').'',['class'=>'btn btn-warning','type'=>'reset']) !!} -->
			{!! Form::button('<i class="fa fa-floppy-o"></i> '.__('Hantar Pesanan').'',['class'=>'btn btn-success pull-right','type'=>'submit','id'=>'submitButton']) !!}
			{!! Form::close() !!}
		@endslot
	@endcomponent

@endsection

@include('order.menu_active')