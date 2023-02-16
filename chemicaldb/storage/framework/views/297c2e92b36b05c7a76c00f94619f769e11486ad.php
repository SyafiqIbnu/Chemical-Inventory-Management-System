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

	<?php if($modelUser->verified == 1): ?>
		<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'verified','required' => '1','label'=>__('user.verified')]); ?> 
		<?php $__env->slot('field'); ?>
			<?php echo Form::text('verified','YA',['class'=>'form-control','required','readonly'=>'readonly']); ?>

		<?php $__env->endSlot(); ?> 
		<?php echo $__env->renderComponent(); ?>
	<?php else: ?>
		<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'verified','required' => '1','label'=>__('user.verified')]); ?> 
		<?php $__env->slot('field'); ?>
			<?php echo Form::text('verified','TIDAK',['class'=>'form-control','required','readonly'=>'readonly']); ?>

		<?php $__env->endSlot(); ?> 
		<?php echo $__env->renderComponent(); ?>
	<?php endif; ?>

	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'actual_link_agent','required' => '0','label'=>__('Link Pendaftaran Referral Agent')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('actual_link_agent',$actual_link_agent,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>

	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'actual_link_dropship','required' => '0','label'=>__('Link Pendaftaran Referral Dropship')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('actual_link_dropship',$actual_link_dropship,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>

	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'actual_link_order','required' => '0','label'=>__('Link Pendaftaran Referral Pesanan')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('actual_link_order',$actual_link_order,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>

	<?php /**PATH C:\wamp64\www\bizmillaagent\resources\views/user/show_form.blade.php ENDPATH**/ ?>