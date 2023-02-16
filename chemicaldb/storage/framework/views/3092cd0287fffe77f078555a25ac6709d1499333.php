
<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'name','required' => '1','label'=>__('user.name')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('name',null,['class'=>'form-control','required','placeholder'=>__('user.name_placeholder'),'maxlength'=>255]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>


<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'email','required' => '1','label'=>__('user.email')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('email',null,['class'=>'form-control','required','placeholder'=>__('user.email_placeholder'),'maxlength'=>255]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'phone','required' => '1','label'=>__('user.phone')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('phone',null,['class'=>'form-control','required','placeholder'=>__('user.phone_placeholder'),'maxlength'=>255]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>



<?php if(Route::currentRouteName()=='user.create_customer'): ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'password','required' => '1','label'=>__('user.password')]); ?> 
	<?php $__env->slot('field'); ?>
		<input id="password" type="password" class="form-control" name="password" required autofocus="autofocus" placeholder="<?php echo e(__('user.password_placeholder')); ?>" maxlength="16">
	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>


	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'password_confirm','required' => '1','label'=>__('user.password_confirm')]); ?> 
	<?php $__env->slot('field'); ?>
	<input id="password_confirm" type="password" class="form-control" name="password_confirm" required autofocus="autofocus" placeholder="<?php echo e(__('user.password_confirm_placeholder')); ?>" maxlength="16">
	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
<?php endif; ?>





<?php /**PATH C:\wamp64\www\bizmillaagent\resources\views/user/create_form_customer.blade.php ENDPATH**/ ?>