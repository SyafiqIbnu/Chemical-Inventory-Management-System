<!DOCTYPE html>
<html>
    <head>
        <title><?php echo e($title); ?></title>
    </head>
    <style>
        body{
            font-size: 10px;
            font-family: sans-serif;

        }
    </style>
    <body>
        <?php echo $__env->make('layouts.components.export_pdf_banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php if(isset($company)): ?>
        <?php echo $__env->make('exportlist.company_info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <h4><?php echo e($title); ?></h4>
        <table id="user_table" class="table table-bordered table-hover" width="100%">
            <thead>
                <tr bgcolor="#DFE4ED" style="font-weight: bold;">
                    <td>Bil.</td>
                    <?php $__currentLoopData = $headings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $h): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <td><?php echo e($h); ?></td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ex): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($i++); ?></td>
                    <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <td><?php echo e($ex->getOriginal($f)); ?></td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <br>
        <br><b><?php echo e(__('general.generated_by')); ?> : </b> <?php if(Auth::check()): ?> <?php echo e(Auth::user()->user_fullname); ?> <?php endif; ?>
        <br><b><?php echo e(__('general.generated_date')); ?> : </b> <?php echo date('d/m/Y H:i'); ?>
    </body>
</html><?php /**PATH C:\wamp64\www\permitkhas\resources\views/layouts/components/export_pdf.blade.php ENDPATH**/ ?>