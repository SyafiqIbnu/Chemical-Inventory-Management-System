<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'booking_application_id','required' => '1','label'=>__('booking.booking_application_id')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('booking_application_id',$modelBooking->booking_application_id,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'numVehicles','required' => '1','label'=>__('booking.numVehicles')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('numVehicles',$modelBooking->numVehicles,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'costRateVehicles','required' => '1','label'=>__('booking.costRateVehicles')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('costRateVehicles',$modelBooking->costRateVehicles,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'overallCostByType','required' => '1','label'=>__('booking.overallCostByType')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('overallCostByType',$modelBooking->overallCostByType,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'overallCost','required' => '1','label'=>__('booking.overallCost')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('overallCost',$modelBooking->overallCost,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>

<?php /**PATH C:\wamp64\www\factohub\resources\views/booking/show_form.blade.php ENDPATH**/ ?>