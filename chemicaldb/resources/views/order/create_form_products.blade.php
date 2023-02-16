
<div class="row">
@php $category='';   @endphp
@foreach($products as $product)

@if($product->product_category!=$category)@php $category=$product->product_category @endphp </div><div class="row" id="{{$product->productcategory->name}}">@else  @endif
    @component('layouts.components.crud_card_col4')
            @slot('cardTitle') <b>{{$product->name}}</b></br> @endslot
            @slot('cardColor') card-primary @endslot
            
            @slot('cardBody')
            {!! Form::model($modelOrder, ['route' => ['order.store_products', $modelOrder->id],'method'=>'PUT','id'=>'orderForm']) !!}
                <img width=100px height=100px src="{{ asset('images/'.$product->image_path) }}"></img> </br>
                {{$product->description}}</br>
                RM {{$product->price}}</br>
                {!! Form::hidden('product_id',$product->id) !!}
                {!! Form::label('Kuantiti:') !!}
                {!! Form::select('quantity',[0,1,2,3,4,5,6,7,8,9,10],null,['class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'quantity','name'=>'quantity']) !!}
            @endslot

            @slot('cardFooter')
            {!! Form::button('<i class="fa fa-floppy-o"></i> '.__('general.save').'',['class'=>'btn btn-success pull-right','type'=>'submit','id'=>'submitButton']) !!}
			{!! Form::close() !!}
            
            @endslot
    @endcomponent
@endforeach

	


