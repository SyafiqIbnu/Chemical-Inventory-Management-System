<?php $id='modal-proceed'; ?>
<div id="<?php echo e($id); ?>" class="modal fade" style="display: none;z-index: 1101;">
    <div class="modal-dialog">
        <div class="modal-content">
            
            <?php echo Form::open(['url' => '','method' => 'POST']); ?>

            <div class="modal-header bg-yellow">                                
                <h4 class="modal-title"><?php echo e(__('general.confirmation')); ?></h4>
                <button aria-label="Close" data-dismiss="modal" class="close" type="button">     
                <span aria-hidden="true"> x </span></button>
            </div>
            <div class="modal-body">
                <p><span class="modal-message"><br><?php echo e(__('general.confirm_submit')); ?></p></span>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-danger pull-left" type="button"><?php echo e(__('general.cancel')); ?></button>
                <?php echo Form::hidden('urlReturn',''); ?>

                <?php echo Form::button('<i class="fa fa-send"></i> '.__('general.submit').'',['class'=>'btn btn-success','type'=>'submit','id'=>'submitButton']); ?>

            </div>
            <?php echo Form::close(); ?>

        </div>
    </div>
</div>
<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).on("click", "a[data-<?php echo e($id); ?>]", function(e){
            e.preventDefault();
            var route = $(this).data("route");
            $("#<?php echo e($id); ?> form").attr("action", route); //id hash, div/form/p tag
            var urlReturn = $(this).data("urlreturn");
            $("#<?php echo e($id); ?> form input[name='urlReturn']").attr("value", urlReturn); //id hash, div/form/p tag
            
            var message = $(this).data("message");
            if(message !=null){
                var modalMessage = $("#<?php echo e($id); ?>").find(".modal-message");
                modalMessage.html(message);
            }

            var title = $(this).data("title");
            if(title !=null){
                var modalTitle = $("#<?php echo e($id); ?>").find(".modal-title");
                modalTitle.html(title);
            }

        });  
    </script>
<?php $__env->stopPush(); ?><?php /**PATH C:\wamp64\www\permitkhas\resources\views/layouts/components/modal_proceed.blade.php ENDPATH**/ ?>