<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'user_id','required' => '1','label'=>__('booking_application.user_id')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('user_id',$modelBookingApplication->user_id,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'account_holder_id','required' => '1','label'=>__('booking_application.account_holder_id')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('account_holder_id',$modelBookingApplication->account_holder_id,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'origin','required' => '1','label'=>__('booking_application.origin')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('origin',$modelBookingApplication->origin,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'destination','required' => '1','label'=>__('booking_application.destination')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('destination',$modelBookingApplication->destination,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'distance','required' => '1','label'=>__('booking_application.distance')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('distance',$modelBookingApplication->distance,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'durationHrs','required' => '1','label'=>__('booking_application.durationHrs')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('durationHrs',$modelBookingApplication->durationHrs,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'durationMins','required' => '1','label'=>__('booking_application.durationMins')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('durationMins',$modelBookingApplication->durationMins,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'quantity','required' => '1','label'=>__('booking_application.quantity')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('quantity',$modelBookingApplication->quantity,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'weight','required' => '1','label'=>__('booking_application.weight')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('weight',$modelBookingApplication->weight,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'length','required' => '1','label'=>__('booking_application.length')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('length',$modelBookingApplication->length,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'width','required' => '1','label'=>__('booking_application.width')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('width',$modelBookingApplication->width,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'height','required' => '1','label'=>__('booking_application.height')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('height',$modelBookingApplication->height,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'area','required' => '1','label'=>__('booking_application.area')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('area',$modelBookingApplication->area,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'volume','required' => '1','label'=>__('booking_application.volume')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('volume',$modelBookingApplication->volume,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'numVehicles','required' => '1','label'=>__('booking_application.numVehicles')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('numVehicles',$modelBookingApplication->numVehicles,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'costRateVehicles','required' => '1','label'=>__('booking_application.costRateVehicles')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('costRateVehicles',$modelBookingApplication->costRateVehicles,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'overallCostByType','required' => '1','label'=>__('booking_application.overallCostByType')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('overallCostByType',$modelBookingApplication->overallCostByType,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'overallCost','required' => '1','label'=>__('booking_application.overallCost')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('overallCost',$modelBookingApplication->overallCost,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'isConfirmed','required' => '1','label'=>__('booking_application.isConfirmed')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('isConfirmed',$modelBookingApplication->isConfirmed,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'confirmed_at','required' => '1','label'=>__('booking_application.confirmed_at')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('confirmed_at',$modelBookingApplication->confirmed_at,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'confirmed_id','required' => '1','label'=>__('booking_application.confirmed_id')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('confirmed_id',$modelBookingApplication->confirmed_id,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>

<?php /**PATH C:\wamp64\www\factohub\resources\views/booking_application/show_form.blade.php ENDPATH**/ ?>