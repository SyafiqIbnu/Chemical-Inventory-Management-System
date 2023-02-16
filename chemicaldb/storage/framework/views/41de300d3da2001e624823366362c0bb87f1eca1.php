<div id="modal-delete" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php echo Form::open(['url' => '','method' => 'delete']); ?>

				<div class="modal-header bg-red">
				  <h4 class="modal-title"><?php echo e(__('general.confirmation')); ?></h4>
				  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				  </button>
				</div>
                <div class="modal-body">
                    <p><?php echo e(__('general.confirm_delete')); ?></p>
                    <?php
                    	//dd($urlReturn);
                    ?>
	
                    <?php if(isset($urlReturn)): ?>
                    	<?php echo Form::hidden('urlReturn',$urlReturn); ?>

                    <?php else: ?>
                    	<?php echo Form::hidden('urlReturn',''); ?>

                    <?php endif; ?>
                </div>
                <div class="modal-footer justify-content-between">
                    <button data-dismiss="modal" class="btn btn-danger pull-left" type="button"><?php echo e(__('general.close')); ?></button>
                    <button class="btn btn-success" type="submit"><?php echo e(__('general.proceed')); ?></button>
                </div>
            <?php echo Form::close(); ?>

        </div>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).on("click", "a[data-modal]", function(e){
            e.preventDefault();
            var route = $(this).data("route");
            $("#modal-delete form").attr("action", route); //id hash, div/form/p tag
            var urlReturn = $(this).data("urlreturn");
            $("#modal-delete form input[name='urlReturn']").attr("value", urlReturn); //id hash, div/form/p tag
        });  
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH D:\xampp\htdocs\chemicaldb\resources\views/layouts/components/modal_delete.blade.php ENDPATH**/ ?>