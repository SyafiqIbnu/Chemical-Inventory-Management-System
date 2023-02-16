@#extends('layouts.app')

@#section('htmlheader_title')
/{/{__('{{$name}}.title')/}/}
@#endsection

@#section('contentheader_title')
/{/{__('{{$name}}.title')/}/}
@#endsection

@#section('main-content')
@#include('{{$name}}.header')
	@#if($errors->any())
	<div class="alert alert-danger">
		@#foreach($errors->all() as $error)
		<p>/{/{ $error /}/}</p>
		@#endforeach
	</div>
	@#endif

            <table id="user_table" class="table table-hover" width="100%">
                <thead>
                    <tr class='blue'>
                        <th>/{/{__('general.number')/}/}</th>
						@foreach($filteredColumns as $col)
                        <th>/{/{__('{{$name}}.{{$col->COLUMN_NAME}}')/}/}</th>
						@endforeach
                        <th>/{/{__('general.action')/}/}</th>
                    </tr>
                </thead>
                
                <tbody>
                   @#foreach($models as $model)
                    <tr>                        
                        <td> </td>
						@foreach($filteredColumns as $col)
                        <td>/{/{$model->{{$col->COLUMN_NAME}}/}/}</td>
						@endforeach
                    	<td>
							<div class="pull-left">
                                                        <a data-pjax="pjax-modal-container" type="button" class="btn btn-xs btn-info" href="/{/{url('{{$newpath}}/'.$model->id)/}/}"><i class="fa fa-eye"></i></a>
							<a data-pjax="pjax-modal-container" type="button" class="btn btn-xs btn-primary" href="/{/{url('{{$newpath}}/'.$model->id.'/edit')/}/}"><i class="fa fa-pencil"></i></a>
							<a data-pjax="pjax-modal-container" data-id="/{/{$model->id/}/}" type="button" class="btn btn-xs btn-danger confirm-delete"><i class="fa fa-eraser"></i></a>
							
							</div>
						</td>
					</tr>
				  @#endforeach
                </tbody>
            </table>
          <!--   <a class="btn btn-success" data-pjax="pjax-modal-container" href="/{/{url('companytype/create')/}/}"><i class="fa fa-plus"></i>/{/{__('general.add')/}/}</a><br><br>        -->    
<script>
    $(document).ready(function() /{
		//dpMenuSetActive('menu_companytype');
        var t=$('#user_table').DataTable(/{
        @#include('exportlist.datatable_export_button_dom_js_with_create')        
        columnDefs: [/{bSortable: false, targets: [0,4]/}],
        "scrollX": true,
    /} );
	
	t.on( 'order.dt search.dt', function () /{
		t.column(0, /{search:'applied', order:'applied'/}).nodes().each( function (cell, i) /{
			cell.innerHTML = i+1;
		/} );
	/} ).draw();
/} );

$('#btnYes').click(function() {
    // handle deletion here
  	var id = $('#modal-default').data('id');
  	//$('[data-id='+id+']').remove();
  	$('#myModal').modal('hide');
});

function deleteData(){
	var id = $('#modal-default').data('id');
  	//$('[data-id='+id+']').remove();
  	$('#modal-default').modal('hide');
	location.href="{{url('/')}}/{{$newpath}}/" + id + "/destroy";
}


$('.confirm-delete').on('click', function(e) {
    e.preventDefault();
    var id = $(this).data('id');
	$('#deleteForm').attr('action', "{{url('/')}}/{{$newpath}}/"+ id );
    $('#modal-default').data('id', id).modal('show');
});


</script>

@#include('{{$name}}.delete_modal')
@#endsection