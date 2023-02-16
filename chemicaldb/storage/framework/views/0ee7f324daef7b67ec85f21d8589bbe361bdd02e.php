
<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'pickup_date','required' => '1','label'=>__('order.pickup_date')]); ?> 
<?php $__env->slot('field'); ?>
		<?php echo Form::date('pickup_date',null,['class'=>'form-control datetimepicker-input date-field','data-toggle'=>'datetimepicker','id'=>'pickup_date','data-target'=>'#pickup_date','required','placeholder'=>__('order.pickup_date_placeholder')]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'user_id','required' => '1','label'=>__('order.linked_user')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('user_id',$linked_user->name,['class'=>'form-control','required','readonly'=>true,'placeholder'=>__('order.linked_user_placeholder')]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'location_id','required' => '1','label'=>__('order.location_id')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('location_id',$linked_user->location->name,['class'=>'form-control','required','readonly'=>true,'placeholder'=>__('order.linked_user_placeholder')]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php echo Form::hidden('linked_user',$linked_user->id); ?>




<?php /**PATH C:\wamp64\www\bizmillaagent\resources\views/order/create_form.blade.php ENDPATH**/ ?>