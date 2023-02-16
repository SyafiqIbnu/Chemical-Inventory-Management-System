<div class="box-body table-responsive no-padding" style="border: none;">
    <table id="<?php echo e($tname); ?>" class="table display table-hover" width="100%">
        <thead>
            <tr class='bg-blue'>
                <?php echo e($thead); ?>

            </tr>
        </thead>
        <tbody>
            <?php echo e($tbody); ?>

        </tbody>
    </table>
</div>
<?php $__env->startPush('scriptsDocumentReady'); ?>
    var <?php echo e($tname); ?> = $('#<?php echo e($tname); ?>').DataTable({
        <?php if(isset($firstScript)): ?>
        <?php echo e($firstScript); ?>

        <?php endif; ?>

        <?php if(isset($options)): ?>
        <?php echo e($options); ?>

        <?php endif; ?>
    });
    <?php echo e($tname); ?>.on('order.dt search.dt', function () {
        <?php echo e($tname); ?>.column(0, {search:'applied', order:'applied'}).nodes().each(function (cell, <?php echo e($tname); ?>) {
            cell.innerHTML = <?php echo e($tname); ?> + 1;
        });
    }).draw();
    <?php if(isset($secondScript)): ?>
    <?php echo e($secondScript); ?>

    <?php endif; ?>
<?php $__env->stopPush(); ?><?php /**PATH C:\wamp64\www\bizmillaagent\resources\views/layouts/components/table.blade.php ENDPATH**/ ?>