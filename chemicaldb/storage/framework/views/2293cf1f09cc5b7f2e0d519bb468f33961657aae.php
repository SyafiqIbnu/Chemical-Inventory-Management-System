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
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'phone','required' => '1','label'=>__('user.phone')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('phone',$modelUser->phone,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'role_id','required' => '1','label'=>__('user.role_id')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('role_id',$modelUser->role_id,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'verified','required' => '1','label'=>__('user.verified')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('verified',$modelUser->verified,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'email_verified_at','required' => '1','label'=>__('user.email_verified_at')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('email_verified_at',$modelUser->email_verified_at,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'password','required' => '1','label'=>__('user.password')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('password',$modelUser->password,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'remember_token','required' => '1','label'=>__('user.remember_token')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('remember_token',$modelUser->remember_token,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'active','required' => '1','label'=>__('user.active')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('active',$modelUser->active,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'passwordmd5','required' => '1','label'=>__('user.passwordmd5')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('passwordmd5',$modelUser->passwordmd5,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'is_admin','required' => '1','label'=>__('user.is_admin')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('is_admin',$modelUser->is_admin,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'user_group_id','required' => '1','label'=>__('user.user_group_id')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('user_group_id',$modelUser->user_group_id,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'password_change_at','required' => '1','label'=>__('user.password_change_at')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('password_change_at',$modelUser->password_change_at,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'user_type_id','required' => '1','label'=>__('user.user_type_id')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('user_type_id',$modelUser->user_type_id,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'google2fa_secret','required' => '1','label'=>__('user.google2fa_secret')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('google2fa_secret',$modelUser->google2fa_secret,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'use2fa','required' => '1','label'=>__('user.use2fa')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('use2fa',$modelUser->use2fa,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'xsessionid','required' => '1','label'=>__('user.xsessionid')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('xsessionid',$modelUser->xsessionid,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'xexpires','required' => '1','label'=>__('user.xexpires')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('xexpires',$modelUser->xexpires,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>

<?php /**PATH D:\xampp\htdocs\chemicaldb\resources\views/user/show_form.blade.php ENDPATH**/ ?>