<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'code','required' => '1','label'=>__('agency_type.code')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('code',$modelAgencyType->code,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'name','required' => '1','label'=>__('agency_type.name')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('name',$modelAgencyType->name,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	

<?php /**PATH C:\wamp64\www\permitkhas\resources\views/agency_type/show_form.blade.php ENDPATH**/ ?>