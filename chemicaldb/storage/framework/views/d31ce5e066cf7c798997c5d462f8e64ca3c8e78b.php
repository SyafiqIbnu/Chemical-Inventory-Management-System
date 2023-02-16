<?php $__currentLoopData = $filteredColumns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $col): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	@#component('layouts.components.edit_modal_one_column',['for' => '<?php echo e($col->COLUMN_NAME); ?>','required' => '1','label'=>__('<?php echo e($name); ?>.<?php echo $col->COLUMN_NAME; ?>')]) 
	@#slot('field')
		/{#!! Form::text('<?php echo e($col->COLUMN_NAME); ?>',$model<?php echo e($modelName); ?>-><?php echo e($col->COLUMN_NAME); ?>,['class'=>'form-control','required','readonly'=>'readonly'])  !!/}
	@#endslot 
	@#endcomponent
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php /**PATH C:\wamp64\www\bizmillaagent\resources\views/generator/show_form.blade.php ENDPATH**/ ?>