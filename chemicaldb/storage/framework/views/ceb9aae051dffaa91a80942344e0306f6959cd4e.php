<?php $__currentLoopData = $filteredColumns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $col): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    @#component('layouts.components.edit_two_column',['for' => '<?php echo e($col->COLUMN_NAME); ?>','required' => '1','label'=>__('<?php echo e($name); ?>.<?php echo e($col->COLUMN_NAME); ?>')]) @#slot('field')
        /{!! Form::text('<?php echo e($col->COLUMN_NAME); ?>',null,['class'=>'form-control','required','placeholder'=>__('<?php echo e($name); ?>.<?php echo e($col->COLUMN_NAME); ?>_placeholder'),'maxlength'=>254]) !!/}
    @#endslot @#endcomponent
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH D:\xampp\htdocs\chemicaldb\resources\views/generator/edit_form.blade.php ENDPATH**/ ?>