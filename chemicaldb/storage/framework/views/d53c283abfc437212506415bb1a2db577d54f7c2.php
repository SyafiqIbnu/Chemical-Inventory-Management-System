<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'name','required' => '1','label'=>__('faculty.name')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('name',$modelFaculty->name,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>

<?php /**PATH D:\xampp\htdocs\chemicaldb\resources\views/faculty/show_form.blade.php ENDPATH**/ ?>