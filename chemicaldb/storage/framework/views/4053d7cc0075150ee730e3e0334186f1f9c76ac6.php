<div class='col-md-6 form-group'>
    <div class="row">
        <div class='col-md-3'>
            <label for="<?php if(isset($for)): ?><?php echo e($for); ?><?php endif; ?>"><?php if(isset($label)): ?><?php echo e($label); ?><?php endif; ?> <?php if($required == 1): ?><span class="required"></span><?php endif; ?></label>
        </div>
        <div class='col-md-9'>
            <?php if(isset($field)): ?><?php echo e($field); ?><?php endif; ?>
        </div>
    </div>
</div><?php /**PATH C:\wamp64\www\permitkhas\resources\views/layouts/components/edit_two_column.blade.php ENDPATH**/ ?>