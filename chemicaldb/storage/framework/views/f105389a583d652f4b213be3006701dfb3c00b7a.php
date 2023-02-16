<?php $__env->startSection('page_title'); ?>
<?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_description'); ?>
<?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
	<li class="breadcrumb-item"><a href="#"><?php echo e(__('general.home')); ?></a></li>
    <li class="breadcrumb-item active"><?php echo e($title); ?></li>
	
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>

    <?php echo $__env->make('layouts.components.session_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	
	
    <?php $__env->startPush('modals'); ?>
    <?php echo $__env->make('layouts.components.modal_delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->stopPush(); ?>

	
    <div class="col-md-12 table-responsive" style="border: none;">
        <?php $__env->startComponent('layouts.components.table_ajax', ['route'=>'booking','tname' => 'booking_table_ajax','bgColor'=>'bg-red']); ?> 

		<?php $__env->slot('url'); ?>
            <?php echo e(route('booking.indexAjax')); ?>

        <?php $__env->endSlot(); ?> 

         

		<?php $__env->slot('thead'); ?>
            <th style='width: 30px;'><?php echo e(__('general.number')); ?></th>
            <th><?php echo e(__('booking.created_at')); ?></th>
            <th><?php echo e(__('booking_application.origin')); ?></th>
            <th><?php echo e(__('booking_application.destination')); ?></th>
            <th><?php echo e(__('booking.vehicle_type_id')); ?></th>
                        <th><?php echo e(__('booking.numVehicles')); ?></th>
                        <th><?php echo e(__('booking.costRateVehicles')); ?></th>
                        <th><?php echo e(__('booking.delivery_date')); ?></th>
                        
                        <th style="width:80px;"><?php echo e(__('general.action')); ?></th>
        <?php $__env->endSlot(); ?> 

		<?php $__env->slot('tbody'); ?>
            <?php echo $__env->make('layouts.components.datatable_data_card_render_number',['table_name'=>'booking_table_ajax'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
            <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'booking_table_ajax','name'=>'created_at','title'=>__('booking.created_at')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
            <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'booking_table_ajax','name'=>'origin','title'=>__('booking_application.origin')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
            <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'booking_table_ajax','name'=>'destination','title'=>__('booking_application.destination')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
            <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'booking_table_ajax','name'=>'vehicle_type_id','title'=>__('booking.vehicle_type_id')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
                                    <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'booking_table_ajax','name'=>'numVehicles','title'=>__('booking.numVehicles')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
            			            <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'booking_table_ajax','name'=>'costRateVehicles','title'=>__('booking.costRateVehicles')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
            			            <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'booking_table_ajax','name'=>'delivery_date','title'=>__('booking.delivery_date')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
            			            
                        <?php echo $__env->make('layouts.components.datatable_data_card_render_action', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
        <?php $__env->endSlot(); ?> 

		<?php $__env->slot('filter_parameter'); ?>
            //dt.f_start_date = $('input[name=f_start_date]').val();
            //dt.f_end_date = $('input[name=f_end_date]').val();
        <?php $__env->endSlot(); ?> 

		<?php $__env->slot('firstScript'); ?>
            <?php if(Auth::user()->can('booking_create')): ?>
                <?php echo $__env->make('layouts.components.datatable_button_export_create_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php else: ?>
                <?php echo $__env->make('layouts.components.datatable_button_export', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        <?php $__env->endSlot(); ?> 

		<?php $__env->slot('secondScript'); ?>
        <?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
    </div>
	
    <?php echo $__env->make('booking.menu_active', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\zonkargo\resources\views/booking/index.blade.php ENDPATH**/ ?>