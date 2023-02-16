

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'cargo_quantity','required' => '1','label'=>__('booking_cargo.total_unit')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('cargo_quantity',$cargo_quantity,['readonly' =>'true', 'class'=>'form-control','required','placeholder'=>__('booking_cargo.total_unit')]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'updated_date','required' => '1','label'=>__('booking.created_at')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('updated_date',$modelBooking->updated_at,['readonly' =>'true', 'class'=>'form-control','required','placeholder'=>__('booking.created_at')]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'vehicle_type_id','required' => '1','label'=>__('booking.vehicle_type_id')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('vehicle_type_id',$modelBooking->vehicleType->name,['readonly' =>'true', 'class'=>'form-control','required','placeholder'=>__('booking.vehicle_type_id')]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'numVehicles','required' => '1','label'=>__('booking.numVehicles')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('numVehicles',$modelBooking->numVehicles,['readonly' =>'true','class'=>'form-control','required','placeholder'=>__('booking.numVehicles')]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'costRateVehicles','required' => '1','label'=>__('booking.costRateVehicles')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('costRateVehicles',$modelBooking->costRateVehicles,['readonly' =>'true','class'=>'form-control','required','placeholder'=>__('booking.costRateVehicles')]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'delivery_date','required' => '1','label'=>__('booking.delivery_date')]); ?> 
<?php $__env->slot('field'); ?>
		<?php echo Form::text('delivery_date',$modelBooking->delivery_date,['class'=>'form-control datetimepicker-input date-field','data-toggle'=>'datetimepicker','id'=>'delivery_date','data-target'=>'#delivery_date','required','placeholder'=>strtoupper(__('booking.delivery_date'))]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>



<?php /**PATH D:\xampp\htdocs\zonkargo\resources\views/booking/create_form.blade.php ENDPATH**/ ?>