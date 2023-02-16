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
	
	

	
    <div class="col-md-12 table-responsive" style="border: none;">
        <?php $__env->startComponent('layouts.components.table_ajax', ['route'=>'order','tname' => 'order_table_ajax','bgColor'=>'bg-red']); ?> 

		<?php $__env->slot('url'); ?>
            <?php echo e(route('order.indexAjaxReview')); ?>

        <?php $__env->endSlot(); ?> 

         

		<?php $__env->slot('thead'); ?>
            <th style='width: 30px;'><?php echo e(__('general.number')); ?></th>
                        <th><?php echo e(__('order.pickup_date')); ?></th>
                        <th><?php echo e(__('order.linked_user')); ?></th>
                        <th><?php echo e(__('order.created_by')); ?></th>
                        <th><?php echo e(__('order.status')); ?></th>
                        <th><?php echo e(__('order.totalamount')); ?></th>
                        
                        <th style="width:80px;"><?php echo e(__('general.action')); ?></th>
        <?php $__env->endSlot(); ?> 

		<?php $__env->slot('tbody'); ?>
            <?php echo $__env->make('layouts.components.datatable_data_card_render_number',['table_name'=>'order_table_ajax'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
            			            <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'order_table_ajax','name'=>'pickup_date','title'=>__('order.pickup_date')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
            			            <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'order_table_ajax','name'=>'linked_user','title'=>__('order.linked_user')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
                                    <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'order_table_ajax','name'=>'created_by','title'=>__('order.created_by')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
            			            
            			            <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'order_table_ajax','name'=>'status','title'=>__('order.status')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
            			            <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'order_table_ajax','name'=>'totalamount','title'=>__('order.totalamount')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
            			            
                        <?php echo $__env->make('layouts.components.datatable_data_card_render_action', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
        <?php $__env->endSlot(); ?> 

		<?php $__env->slot('filter_parameter'); ?>
            //dt.f_start_date = $('input[name=f_start_date]').val();
            //dt.f_end_date = $('input[name=f_end_date]').val();
        <?php $__env->endSlot(); ?> 

		<?php $__env->slot('firstScript'); ?>
        <?php echo $__env->make('layouts.components.datatable_button_export', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php $__env->endSlot(); ?> 

		<?php $__env->slot('secondScript'); ?>
        <?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
    </div>
	
    <?php echo $__env->make('order.menu_active', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\bizmillaagent\resources\views/order/index_review.blade.php ENDPATH**/ ?>