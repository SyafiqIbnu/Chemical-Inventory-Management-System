
<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'pickup_date','required' => '1','label'=>__('order.pickup_date')]); ?> 
<?php $__env->slot('field'); ?>
<?php echo Form::text('pickup_date',date_format(new DateTime($modelOrder->pickup_date),'d - M - Y'),['class'=>'form-control','required','readonly'=>true,'placeholder'=>__('order.pickup_date')]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'user_id','required' => '1','label'=>__('order.linked_user')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('user_id',$modelOrder->linkeduser->name,['class'=>'form-control','required','readonly'=>true,'placeholder'=>__('order.linked_user_placeholder')]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'location_id','required' => '1','label'=>__('order.location_id')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('location_id',$modelOrder->linkeduser->location->name,['class'=>'form-control','required','readonly'=>true,'placeholder'=>__('order.linked_user_placeholder')]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php if($modelOrder->status!=0): ?>
<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'status','required' => '1','label'=>__('order.status')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('status',$modelOrder->orderstatus->name.' (Tarikh & Masa : '. date_format(new DateTime($modelOrder->updated_at),'d - M - Y & G:i:s') .')',['class'=>'form-control','required','readonly'=>true,'placeholder'=>__('order.status')]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>
<?php else: ?>
<?php endif; ?>

<?php /**PATH C:\wamp64\www\bizmillaagent\resources\views/order/create_form_readonly.blade.php ENDPATH**/ ?>