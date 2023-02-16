<?php echo Form::hidden('user_id',null); ?>


<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'from','required' => '1','label'=>__('inbox.from')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('from',null,['class'=>'form-control','required','placeholder'=>__('inbox.from_placeholder'),'maxlength'=>255]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'message','required' => '1','label'=>__('inbox.message')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('message',null,['class'=>'form-control','required','placeholder'=>__('inbox.message_placeholder'),'maxlength'=>255]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'read','required' => '1','label'=>__('inbox.read')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::hidden('read',null); ?>

	<?php echo Form::checkbox('read',1); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php /**PATH C:\wamp64\www\permitkhas\resources\views/inbox/create_form.blade.php ENDPATH**/ ?>