<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'name','required' => '1','label'=>__('district.name')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('name',$modelDistrict->name,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'state_id','required' => '1','label'=>__('district.state_id')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('state_id',$modelDistrict->state->name,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	

<?php /**PATH C:\wamp64\www\permitkhas\resources\views/district/show_form.blade.php ENDPATH**/ ?>