
<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'name','required' => '1','label'=>__('Nama Wakil Syarikat')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('name',null,['class'=>'form-control','required','placeholder'=>__('Nama Wakil Syarikat'),'maxlength'=>255]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'mobile_no','required' => '1','label'=>__('No Telefon (H/P)')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('mobile_no',null,['class'=>'form-control','required','placeholder'=>__('No Telefon (H/P)'),'maxlength'=>12]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>



	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'password','required' => '1','label'=>__('user.password')]); ?> 
	<?php $__env->slot('field'); ?>
		<input id="password" type="password" class="form-control" name="password" required  placeholder="<?php echo e(__('user.password_placeholder')); ?>" maxlength="16">
	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>


	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'password_confirm','required' => '1','label'=>__('user.password_confirm')]); ?> 
	<?php $__env->slot('field'); ?>
	<input id="password_confirm" type="password" class="form-control" name="password_confirm" required  placeholder="<?php echo e(__('user.password_confirm_placeholder')); ?>" maxlength="16">
	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>


<?php /**PATH C:\wamp64\www\permitkhas\resources\views/account_application/create_form_pemohon.blade.php ENDPATH**/ ?>