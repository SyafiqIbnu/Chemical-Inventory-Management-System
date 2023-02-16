<div class='col-md-12 form-group'>
    <div class="row">
        <div class='col-md-2'>
            <label for="<?php if(isset($for)): ?><?php echo e($for); ?><?php endif; ?>"><?php if(isset($label)): ?><?php echo e($label); ?><?php endif; ?> <?php if($required == 1): ?><span class="required"></span><?php endif; ?></label>
        </div>
        <div class='col-md-10'>
            <?php if(isset($field)): ?><?php echo e($field); ?><?php endif; ?>
        </div>
    </div>
</div><?php /**PATH C:\wamp64\www\bizmillaagent\resources\views/layouts/components/edit_one_column.blade.php ENDPATH**/ ?>