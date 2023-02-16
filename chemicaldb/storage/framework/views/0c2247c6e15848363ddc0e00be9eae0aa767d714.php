<div class='form-group col-md-12' <?php echo e(isset($id) ? 'id='.$id : null); ?> <?php echo e(isset($style) ? 'style='.$style : null); ?>>
    <div class="row">
        <div class='col-md-3'>
            <label for="<?php echo e($for); ?>"><?php echo e($label); ?> <?php if($required == 1): ?><span class="required"></span><?php endif; ?></label>
        </div>
        <div class='col-md-3'>
            <?php echo e($field1); ?>

        </div>
        <div class='col-md-3'>
            <?php echo e($field2); ?>

        </div>
        <div class='col-md-3'>
            <?php echo e($field3); ?>

        </div>
    </div>
</div><?php /**PATH C:\wamp64\www\permitkhas\resources\views/layouts/components/edit_modal_one_column_three_fields.blade.php ENDPATH**/ ?>