
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
<div class="row">
	@component('layouts.components.crud_card_col2')
		@slot('cardTitle') PESANAN @endslot
		@slot('cardColor') card-success @endslot
		
		@slot('cardBody')
        
				@include('order.create_form_readonly')
				<table class="table table-bordered">
					<tbody>
					<tr>
						<th colspan="4">ORDER SUMMARY</th>
						
					</tr>
					
					</tbody>
                </table>
				@include('order.product_summary_readonly')</br>
				<a target="_blank" href="{!! asset('../bizmillaagent/storage/app/'.$order_documents->path) !!}" class="btn btn-primary " role="button" aria-pressed="true">RESIT BAYARAN</a> 
		@endslot

		@slot('cardFooter')
			
		@endslot
	@endcomponent
	@component('layouts.components.crud_card_col2')
		@slot('cardTitle') REPORT KITCHEN @endslot
		@slot('cardColor') card-success @endslot
		
		@slot('cardBody')
				@include('order.kitchen_summary_individual')
		@endslot

		@slot('cardFooter')
			<a type="button" class="btn btn-primary"	onClick="location.href='{{url('orderreceiver')}}'"><i class="fa fa-arrow-left"></i>BACK</a>
		@endslot
	@endcomponent
</div>

	

@endsection

@include('order.menu_active')