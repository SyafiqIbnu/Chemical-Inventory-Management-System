

<table class="table table-bordered">
                <tbody>
                <tr>
                    <th>Bil</th>
                    <th>Menu</th>
                    <th>Kuantiti</th>
                    <th>Jumlah (RM)</th>
                    <th>Buang</th>
                </tr>
               
                @php $bil=0; $totalamount=0; $bilpax=0; @endphp
                    @foreach($order_products as $product)
                        @php $bil++; $totalamount+=$product->amount; $bilpax+=$product->bil_pax; @endphp
                        <tr>
                            <td>{{$bil}}</td>
                            <td>{{$product->product->name}}</td>
                            <td>{{$product->quantity}} </td>
                            <td> {{$product->amount}}</td>
                            
                            <td>
                            {!! Form::open(['route' => ['order_product.destroy', $product->id], 'method' => 'delete']) !!}
                            {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger']) !!}</div>
                            {!! Form::close() !!}
                            </td>
                        </tr>
                       
                @endforeach
                <tr>
                <th colspan="4">JUMLAH PAX</th>
                <th>{{number_format($bilpax)}}</th>
                </tr>
                <tr>
                <th colspan="4">JUMLAH KESELURUHAN</th>
                <th>RM {{number_format($totalamount,2)}}</th>
                </tr>
                
                </tbody>
            </table>