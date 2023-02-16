<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'user_id','required' => '1','label'=>__('inbox.user_id')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('user_id',$modelInbox->user_id,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'from','required' => '1','label'=>__('inbox.from')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('from',$modelInbox->from,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'message','required' => '1','label'=>__('inbox.message')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('message',$modelInbox->message,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'read','required' => '1','label'=>__('inbox.read')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('read',$modelInbox->read,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>

<?php /**PATH C:\wamp64\www\permitkhas\resources\views/inbox/show_form.blade.php ENDPATH**/ ?>