<style>
    table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

    td, th {
  border: 1px solid #101010;
  text-align: left;
  padding: 8px;
}

    td:nth-child(even) {
  background-color: #e8e4e4;
}
</style>
<table>
   
    <thead>
    <th style="padding: 10px">No</th>
    <th style="padding: 10px">Laboratory</th>
    <th style="padding: 10px">Item Name</th>
    <th style="padding: 10px">Item Brand</th>
    <th style="padding: 10px">Item Cas</th>
    <th style="padding: 10px">Item Catalog</th>
    <th style="padding: 10px">Item Location</th>
    <th style="padding: 10px">Item Price</th>
    <th style="padding: 10px">Item Quantity</th>
    <th style="padding: 10px">Item Amount</th>
    <th style="padding: 10px">Item Supplier</th>
    <th style="padding: 10px">Date Opened</th>
    <th style="padding: 10px">Expiration Date</th>
    <th style="padding: 10px">Staff</th>
  </thead>
    @php
    $i = 1; 
    @endphp
    @foreach ($chemicals as $item)
    <tbody>  
    <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $item->getLaboratory->name}}</td>
            <td>{{ $item->item_name}}</td>
            <td>{{ $item->item_brand}}</td>
            <td>{{ $item->item_cas}}</td>    
            <td>{{ $item->item_catalog}}</td>    
            <td>{{ $item->item_location}}</td>    
            <td>{{ $item->item_price}}</td>    
            <td>{{ $item->item_quantity}}</td>                  
            <td>{{ $item->item_amount}}</td>    
            <td>{{ $item->item_supplier}}</td>    
            <td>{{ $item->date_opened}}</td>    
            <td>{{ $item->expiration_date}}</td>    
            <td>{{ $item->getStaff->name}}</td>    
    </tr>
    </tbody>
    @endforeach
</table>
<script>
  console.log(locaStorage.setValue("sel"))
</script>