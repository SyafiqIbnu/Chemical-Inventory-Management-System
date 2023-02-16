<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'name','required' => '1','label'=>__('equipment.name')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('name',$modelEquipment->name,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	

<?php /**PATH C:\wamp64\www\permitkhas\resources\views/equipment/show_form.blade.php ENDPATH**/ ?>