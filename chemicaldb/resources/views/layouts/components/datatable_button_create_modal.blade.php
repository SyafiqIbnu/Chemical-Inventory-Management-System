dom: '<"row "<"col-md-4" f ><"col-md-4" l ><"col-md-4"<"pull-right dom-button"<B>>>>rtip',
language: {"url": "{{url('asset/lang/')}}/{{app()->getLocale()}}/datatable.json"},
buttons: [
	{
            className: 'btn-sm btn-info',
            text: '<i class="fa fa-plus"></i> {{__('general.add')}}',
            action: function ( e, dt, node, config ) {
                $('#{{ isset($id) ? $id : 'modal_create'}}').modal('show');
                var d=$('#{{ isset($id) ? $id : 'modal_create'}} div.modal-content form');
                if(d.length > 0){
                	d[0].reset();                	
                }
                
                var dselect=$('#{{ isset($id) ? $id : 'modal_create'}} div.modal-content select');
                for (i = 0; i < dselect.length; ++i) {
                	var t="[name="+ dselect[i].name + "]";
                	$(t).val(null).trigger('change');
                }
            }
	}, 'reset'
],