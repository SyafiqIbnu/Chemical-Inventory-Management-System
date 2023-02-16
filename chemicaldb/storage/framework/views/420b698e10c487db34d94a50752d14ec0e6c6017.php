	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'name','required' => '1','label'=>__('user.name')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('name',$modelUser->name,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 

	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'uid','required' => '1','label'=>__('user.uid')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('uid',$modelUser->uid,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'email','required' => '1','label'=>__('user.email')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('email',$modelUser->email,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'mykad','required' => '1','label'=>__('user.mykad')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('mykad',$modelUser->mykad,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'phone','required' => '1','label'=>__('user.phone')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('phone',$modelUser->phone,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'verified','required' => '1','label'=>__('user.verified')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('verified',$modelUser->verified,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>

	<?php /**PATH C:\wamp64\www\permitkhas\resources\views/user/show_form.blade.php ENDPATH**/ ?>