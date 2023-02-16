<script src="{{url('/js/jquery-3.1.1.min.js')}}"></script>
{!! Form::open(['route'=>'generator.index',$table,'id'=>'myAppForm']) !!}
Table :{{$cboTable}} <input type="button" value="Submit" name="B1" onClick="showTables()">
{!! Form::close() !!}

	{{$table}}

{!! Form::open(['route'=>['generator.generate',$table],'id'=>'myAppForm','method'=>'POST']) !!}
@include('generator.generator_form')

 <input type="Submit" value="Submit" name="B1"">
{!! Form::close() !!}

<script>
	function showTables(){
		var table=$('#table_list option:selected').val() ;
		var path="{{url('/generator')}}/" + table;
		//alert(path);
		location.href=path;
	}
	
	function uiTypeChanged(colName){
		var uiTypeName=colName + "_UITypes" ;
		var selection=$("#" + uiTypeName).val();
		//alert(selection);
		if(selection=="ComboBoxTable"){
			
			$.ajax({
			  method: "GET",
			  url: "{{url('/generator/getDropdownOptions/')}}/"+ colName,
			})
			  .done(function( msg ) {
				  var n="#"+colName + "_details";
				  var o=$(n);
				  o.html(msg);
				  //alert( "Data Saved: " + msg );
			  });
		}else{
			var n="#"+colName+"_details";
			var o=$(n);
			if(o){
				o.html("");
			}
		}
	}
	
	
	function getDropdownTableOptions (colName){
		var uiTypeName="#"+colName + "_dropdown" ;
		var o=$(uiTypeName);
		//alert(o.val());
		$.ajax({
		  method: "GET",
		  url: "{{url('/generator/getDropdownTableOptions/')}}/"+ o.val() +"/" + colName,
		})
		  .done(function( msg ) {
			  var n="#"+colName + "_dropdown_table_option_div";
			  var o=$(n);
			  if(o){
				o.html(msg);
			  }
			  //alert( "Data Saved: " + msg );
		});
	}
</script>

