<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'code','required' => '1','label'=>__('city.code')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('code',$modelCity->code,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'name','required' => '1','label'=>__('city.name')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('name',$modelCity->name,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'state_id','required' => '1','label'=>__('city.state_id')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('state_id',$modelCity->state->name,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	

<?php /**PATH C:\wamp64\www\permitkhas\resources\views/city/show_form.blade.php ENDPATH**/ ?>