<div class='form-group col-md-12' <?php echo e(isset($id) ? 'id='.$id : null); ?> <?php echo e(isset($style) ? 'style='.$style : null); ?>>
    <div class="row">
        <div class='col-md-3'>
            <label for="<?php echo e($for); ?>"><?php echo e($label); ?> <?php if($required == 1): ?><span class="required"></span><?php endif; ?></label>
        </div>
        <div class='col-md-9'>
            <?php echo e($field); ?>

        </div>
    </div>
</div><?php /**PATH C:\wamp64\www\permitkhas\resources\views/layouts/components/edit_modal_one_column.blade.php ENDPATH**/ ?>