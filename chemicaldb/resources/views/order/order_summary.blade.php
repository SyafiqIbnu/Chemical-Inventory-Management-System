
@extends('layouts.app')

@section('page_title')
{{__('general.show')}} Pesanan #{{$modelOrder->id}}
@endsection

@section('page_description')
{{__('general.show')}}
@endsection

@section('breadcrumb')
	<li class="breadcrumb-item"><a href="#">{{__('general.home')}}</a></li>
    <li class="breadcrumb-item active">{{__('general.show')}}</li>
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
		    @include('order.product_summary_readonly')
		@endslot

		@slot('cardFooter')
			
		@endslot
	@endcomponent
	

	@component('layouts.components.crud_card')
		@slot('cardTitle') RESIT BAYARAN @endslot
		@slot('cardColor') card-success @endslot
		
		@slot('cardBody')
            <a target="_blank" href="{!! asset('../bizmillaagent/storage/app/'.$order_documents->path) !!}" class="btn btn-primary " role="button" aria-pressed="true">Lihat Lampiran</a> 
		@endslot

		@slot('cardFooter')
		<a type="button" class="btn btn-primary"	onClick="location.href='{{url('order')}}'"><i class="fa fa-back"></i> OK</a>
		@endslot
	@endcomponent

   

@endsection

@include('order.menu_active')