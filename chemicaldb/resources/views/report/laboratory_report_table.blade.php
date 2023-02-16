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
    <th style="padding: 10px"> No</th>
    <th style="padding: 10px">Faculty</th>
    <th style="padding: 10px">Laboratory Name</th>
    <th style="padding: 10px">Laboratory Type</th>
    <th style="padding: 10px">Location</th>
    </thead>
    @php
    $i = 1; 
    @endphp
    @foreach ($laboratories as $item)
    <tbody>  
    <tr>
            <td>{{ $i++ }}</td>
            <td id="faculty">{{ $item->getFaculty->name}}</td>
            <td>{{ $item->name }}</td>
            <td id="type">{{ $item->getType->name }}</td>
            <td id="location">{{ $item->location }}</td>    
    </tr>
    </tbody>
    @endforeach
</table>
<script>
  console.log(locaStorage.setValue("sel"))
</script>