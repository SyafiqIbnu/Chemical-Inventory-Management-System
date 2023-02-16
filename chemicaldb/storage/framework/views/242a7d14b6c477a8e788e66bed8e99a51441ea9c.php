

<?php echo Form::hidden('user_type_id',null); ?>

<?php echo Form::hidden('account_holder_id',null); ?>


<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'phone','required' => '1','label'=>__('user.user_type_id')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo e($modelUser->userType->name); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'phone','required' => '1','label'=>__('user.account_holder_id')]); ?> 
<?php $__env->slot('field'); ?>
	<?php if(isset($modelUser->account_holder)): ?>
		<?php echo e($modelUser->account_holder->name); ?>

	<?php endif; ?>
<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?><?php /**PATH C:\wamp64\www\bizmillaagent\resources\views/user/create_form_user_types_account_holder.blade.php ENDPATH**/ ?>