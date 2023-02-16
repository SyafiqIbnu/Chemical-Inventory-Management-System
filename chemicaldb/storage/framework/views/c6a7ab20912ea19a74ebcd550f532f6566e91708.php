dom: '<"row "<"col-md-4" f ><"col-md-4" l ><"col-md-4"<"pull-right dom-button"<B>>>>rtip',
language: {"url": "<?php echo e(url('asset/lang/')); ?>/<?php echo e(app()->getLocale()); ?>/datatable.json"},
buttons: [
	{
            className: 'btn-sm btn-info',
            text: '<i class="fa fa-plus"></i> <?php echo e(__('general.add')); ?>',
            action: function ( e, dt, node, config ) {
                $('#<?php echo e(isset($id) ? $id : 'modal_create'); ?>').modal('show');
                var d=$('#<?php echo e(isset($id) ? $id : 'modal_create'); ?> div.modal-content form');
                if(d.length > 0){
                	d[0].reset();                	
                }
                
                var dselect=$('#<?php echo e(isset($id) ? $id : 'modal_create'); ?> div.modal-content select');
                for (i = 0; i < dselect.length; ++i) {
                	var t="[name="+ dselect[i].name + "]";
                	$(t).val(null).trigger('change');
                }
            }
	}, 'reset'
],<?php /**PATH C:\wamp64\www\factohub\resources\views/layouts/components/datatable_button_create_modal.blade.php ENDPATH**/ ?>