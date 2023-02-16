
<div class="row">
@php $categoryid=''; $totalayam=0; $totalkambing=0; $totalcondiments=0; $totalnasi=0;  @endphp
@foreach($product_categories as $category)
    @component('layouts.components.crud_card')
        @slot('cardTitle') <b> JENIS {{$category->name}}</b></br> @endslot
        @slot('cardColor') card-primary @endslot

        @slot('cardBody')
        @foreach($order_products as $product)
            
            @if($product->product->product_category!=$categoryid)
                @php $categoryid=$product->product->product_category @endphp
                @php if($product->product->food_group==1){
                        $totalayam+=$product->bil_pax;
                        $totalnasi+=$product->bil_pax;
                    }
                    if($product->product->food_group==2){
                        $totalkambing+=$product->bil_pax;
                        $totalnasi+=$product->bil_pax;
                    }
                    if($product->product->food_group==3){
                        $totalayam+=$product->bil_pax;
                        $totalkambing+=$product->bil_pax;
                        $totalnasi+=$product->bil_pax;
                    }
                    if($product->product->food_group==4){
                        $totalnasi+=$product->quantity;
                    }
                    if($product->product->has_condiments==1){
                        $totalcondiments=$product->bil_pax;
                    }
                @endphp
                <table class="table table-bordered">
                <tbody>
                <tr>
                    <th>Menu</th>
                    <th>Qty</th>
                </tr>
                <tr>
                    <td>{{$product->product->name}} ({{$product->product->pax_no}})</td>
                    <td>{{$product->quantity}} </td>
                </tr>
                </tbody>
                </table>
                
                </div><div class="row">
            @else  @endif

        @endforeach
        @endslot

        @slot('cardFooter')
            
        @endslot

    @endcomponent
@endforeach
</div>
@component('layouts.components.crud_card')
        @slot('cardTitle') <b> SUMMARY </b></br> @endslot
        @slot('cardColor') card-warning @endslot

        @slot('cardBody')
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <th>TOTAL AYAM</th>
                    <th>{{$totalayam}}</th>
                </tr>
                <tr>
                    <th>TOTAL KAMBING</th>
                    <th>{{$totalkambing}}</th>
                </tr>
                <tr>
                    <th>TOTAL PAX (NASI)</th>
                    <th>{{$totalnasi}}</th>
                </tr>
                <tr>
                    <th>TOTAL CONDIMENTS (DALCA,SALAD,SAMBAL)</th>
                    <th>{{$totalcondiments}}</th>
                </tr>
                </tbody>
                </table>
        @endslot

        @slot('cardFooter')
            
        @endslot

@endcomponent
