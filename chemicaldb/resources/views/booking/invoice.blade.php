
@extends('layouts.app')

@section('htmlheader_title')
Invoice
@endsection

@section('contentheader_title')
Invoice: #{{$booking->id}}
@endsection


@section('main-content')

<a class="btn btn-success" onClick="printreceipt('receipt');" id="btn2" href="#">Print</a>
<a class="btn btn-warning" onClick="history.back();" id="btn2" href="#">Back</a>
</br></br>
<div id="receipt">
<table class="table table-bordered" class="table">
    <thead>
        <tr>
            <th colspan="4"><h3>Invoice for Booking # {{$bookingApplication->id}}</h3></th>
            
        </tr>
        <tr>
            <th style="background-color:#CAEEF9;" colspan="4">Booking Information</th>
            
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Customer's Name</td>
            <td>{{Auth::user()->name}}</td>
            
        </tr>
        
        
        <tr>
            <td>Origin</td>
            <td>{{$bookingApplication->origin}}</td>
            <td>Destination</td>
            <td>{{$bookingApplication->destination}}</td>
        </tr>
        <tr>
            <td>Delivery Date</td>
            <td>{{date_format(new DateTime($booking->delivery_date),'d-m-Y')}}</td>
            <td>Distance</td>
            <td>{{$bookingApplication->distance}}</td>
            
        </tr>
    </tbody>
</table>

<table class="table table-bordered" class="table">
    <thead>
        
        <tr>
            <th style="background-color:#CAEEF9;" colspan="9">Cargo Information</th>
            
        </tr>
        <tr>
            <th>No.</th>
            <th>Cargo Type</th>
            <th>Weight(kg)</th>
            <th>Height(m)</th>
            <th>Length(m)</th>
            <th>Width(m)</th>
            <th>Radius(m)</th>
            <th>Diameter(m)</th>
            <th>Quantity</th>
            
        </tr>
    </thead>
    @php $bil=1;  @endphp
    <tbody>
        @foreach($bookingCargos as $bookingCargo)
            <tr>
                <td>{{$bil++}}</td>
                <td>{{$bookingCargo->cargoType->name}}</td>
                <td>{{$bookingCargo->weight}}</td>
                <td>{{$bookingCargo->height}}</td>
                <td>{{$bookingCargo->length}}</td>
                <td>{{$bookingCargo->width}}</td>
                <td>{{$bookingCargo->radius}}</td>
                <td>{{$bookingCargo->diameter}}</td>
                <td>{{$bookingCargo->unit}}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<table class="table table-bordered" class="table">
    <thead>
        
        <tr>
            <th style="background-color:#CAEEF9;" colspan="9">Confirmed Vehicle Information</th>
            
        </tr>
        
    </thead>
    
    <tbody>
        <tr>
            <td>Cargo Quantity</td>
            <td>{{$cargo_quantity}}</td>
            <td>Booking Date</td>
            <td>{{$booking->updated_at}}</td>
            
        </tr>
        <tr>
            <td>Vehicle Type</td>
            <td>{{$booking->vehicleType->name}}</td>
            <td>No. of Vehicles</td>
            <td>{{$booking->numVehicles}}</td>
            
        </tr>
        <tr>
            <td>Cost Rate (RM)</td>
            <td>{{$booking->costRateVehicles}}</td>
            <td>Delivery Date</td>
            <td>{{$booking->delivery_date}}</td>
            
        </tr>
    </tbody>
</table>



</br></br>
<table class="table">
    <tbody>
    <tr>
        <td width="33%">Prepare By:</br></br></br>..................................................</br>Date:{{date_format(new DateTime($printdate),'d/m/Y')}}</br></td>
        <td width="33%">Received By:</br></br></br>..................................................</br></td>
        
    </tr>
    </tbody>
</table>
</br></br>
</div>

@include('booking.menu_active')
@endsection


<script language="javascript">
    function printreceipt(printpage)
    {
        var headstr = "<html><head><title></title></head><body>";
        var footstr = "</body>";
		var newstr = document.all.item(printpage).innerHTML;
        var oldstr = document.body.innerHTML;
        document.body.innerHTML = headstr+newstr+footstr;
        window.print();
        document.body.innerHTML = oldstr;
        return false;
    }

</script>




