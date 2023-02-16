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
        <?php if(\App\Helpers\PermissionHelper::hasDistrictDelete(false)): ?>
            <?php echo $__env->make('layouts.components.modal_delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    <?php $__env->stopPush(); ?>

	
    <div class="col-md-12 table-responsive" style="border: none;">
        <?php $__env->startComponent('layouts.components.table_ajax', ['route'=>'district','tname' => 'district_table_ajax','bgColor'=>'bg-red']); ?> 

		<?php $__env->slot('url'); ?>
            <?php echo e(route('district.indexAjax')); ?>

        <?php $__env->endSlot(); ?> 

         

		<?php $__env->slot('thead'); ?>
            <th style='width: 30px;'><?php echo e(__('general.number')); ?></th>
                        <th><?php echo e(__('district.name')); ?></th>
                        <th><?php echo e(__('district.state_id')); ?></th>
                        <th><?php echo e(__('district.isactive')); ?></th>
                        <th style="width:80px;"><?php echo e(__('general.action')); ?></th>
        <?php $__env->endSlot(); ?> 

		<?php $__env->slot('tbody'); ?>
            <?php echo $__env->make('layouts.components.datatable_data_card_render_number',['table_name'=>'district_table_ajax'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
            			            <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'district_table_ajax','name'=>'name','title'=>__('district.name')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
            			            <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'district_table_ajax','name'=>'state_id','title'=>__('district.state_id')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
            			            <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'district_table_ajax','name'=>'isactive','title'=>__('district.isactive')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
                        <?php echo $__env->make('layouts.components.datatable_data_card_render_action', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
        <?php $__env->endSlot(); ?> 

		<?php $__env->slot('filter_parameter'); ?>
            //dt.f_start_date = $('input[name=f_start_date]').val();
            //dt.f_end_date = $('input[name=f_end_date]').val();
        <?php $__env->endSlot(); ?> 

		<?php $__env->slot('firstScript'); ?>
            <?php if(Auth::user()->can('district_create')): ?>
                <?php echo $__env->make('layouts.components.datatable_button_export_create_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php else: ?>
                <?php echo $__env->make('layouts.components.datatable_button_export', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        <?php $__env->endSlot(); ?> 

		<?php $__env->slot('secondScript'); ?>
        <?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
    </div>
	
    <?php echo $__env->make('district.menu_active', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\permitkhas\resources\views/district/index.blade.php ENDPATH**/ ?>