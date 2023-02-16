<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'name','required' => '1','label'=>__('laboratory.name')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('name',$modelLaboratory->name,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'location','required' => '1','label'=>__('laboratory.location')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('location',$modelLaboratory->location,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'code','required' => '1','label'=>__('laboratory.code')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('code',$modelLaboratory->code,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'faculty','required' => '1','label'=>__('laboratory.faculty')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('faculty',$modelLaboratory->faculty,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'type','required' => '1','label'=>__('laboratory.type')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('type',$modelLaboratory->type,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>

<?php /**PATH D:\xampp\htdocs\chemicaldb\resources\views/laboratory/show_form.blade.php ENDPATH**/ ?>