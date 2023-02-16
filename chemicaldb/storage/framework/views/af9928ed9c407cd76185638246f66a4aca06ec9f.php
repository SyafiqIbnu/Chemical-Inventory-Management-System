<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'name','required' => '1','label'=>__('purchase_type.name')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('name',$modelPurchaseType->name,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	

<?php /**PATH C:\wamp64\www\permitkhas\resources\views/purchase_type/show_form.blade.php ENDPATH**/ ?>