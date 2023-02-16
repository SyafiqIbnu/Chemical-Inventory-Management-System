<table border="1" style="border-collapse: collapse">
	<tr>
		<td>Column</td>
		<td>Types</td>
		<td></td>
	</tr>
	@foreach($columns as $col)
	<tr id="{{$col->COLUMN_NAME}}_row">
		<td>{{$col->COLUMN_NAME}}</td>
		<td>{{ $col->uitype}}</td>		
		<td class="{{$col->COLUMN_NAME}}">
			<div id="{{$col->COLUMN_NAME}}_details">			
			</div>
		</td>
	</tr>
	@endforeach
</table>