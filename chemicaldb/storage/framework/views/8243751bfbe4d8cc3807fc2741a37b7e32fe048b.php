<?php $__env->startSection('page_title'); ?>
<?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_description'); ?>
<?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>

	<li class="breadcrumb-item"><a href="#"><?php echo e(__('general.home')); ?></a></li>
    <li class="breadcrumb-item active">Permohonan Permit #<?php echo e($permit_application_id); ?></li>
    <li class="breadcrumb-item active"><?php echo e($title); ?></li>
	
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>

<?php $__env->startComponent('shared.permit_application_tabs',['permit_application_id'=>$permit_application_id,
'modelPermitApplication'=>$modelPermitApplication,'canEdit'=>$canEdit]); ?>
		<?php $__env->slot('selectedTab'); ?>
			usage
		<?php $__env->endSlot(); ?>

		<?php $__env->slot('content'); ?>

        
        
        <?php $__env->startPush('modals'); ?>
            <?php if(\App\Helpers\PermissionHelper::hasPermitApplicationUsageDelete(false)): ?>
                <?php echo $__env->make('layouts.components.modal_delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        <?php $__env->stopPush(); ?>

        
        <div class="col-md-12 table-responsive" style="border: none;">
            <?php $__env->startComponent('layouts.components.table_ajax', ['route'=>'permit_application_usage','tname' => 'permit_application_usage_table_ajax','bgColor'=>'bg-red']); ?> 

            <?php $__env->slot('url'); ?>
                <?php echo e(route('permit_application_usage.indexAjax',$permit_application_id)); ?>

            <?php $__env->endSlot(); ?> 

            

            <?php $__env->slot('thead'); ?>
                <th style='width: 30px;'><?php echo e(__('general.number')); ?></th>
                            
                            <th><?php echo e(__('permit_application_usage.controlled_goods_type_id')); ?></th>
                            <th><?php echo e(__('permit_application_usage.horse_power')); ?></th>
                            <th><?php echo e(__('permit_application_usage.daily_usage')); ?></th>
                            <th><?php echo e(__('permit_application_usage.quantity')); ?></th>
                            <th><?php echo e(__('permit_application_usage.equipment_id')); ?></th>
                            
                            <th style="width:80px;"><?php echo e(__('general.action')); ?></th>
            <?php $__env->endSlot(); ?> 

            <?php $__env->slot('tbody'); ?>
                <?php echo $__env->make('layouts.components.datatable_data_card_render_number',['table_name'=>'permit_application_usage_table_ajax'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
                
                <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'permit_application_usage_table_ajax','name'=>'controlled_goods_type_id','title'=>__('permit_application_usage.controlled_goods_type_id')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
                <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'permit_application_usage_table_ajax','name'=>'horse_power','title'=>__('permit_application_usage.horse_power')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
                <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'permit_application_usage_table_ajax','name'=>'daily_usage','title'=>__('permit_application_usage.daily_usage')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
                <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'permit_application_usage_table_ajax','name'=>'quantity','title'=>__('permit_application_usage.quantity')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
                <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'permit_application_usage_table_ajax','name'=>'equipment_id','title'=>__('permit_application_usage.equipment_id')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
                
                
                <?php echo $__env->make('layouts.components.datatable_data_card_render_action', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
            <?php $__env->endSlot(); ?> 

         

            <?php $__env->slot('filter_parameter'); ?>
                //dt.f_start_date = $('input[name=f_start_date]').val();
                //dt.f_end_date = $('input[name=f_end_date]').val();
            <?php $__env->endSlot(); ?> 

            <?php $__env->slot('firstScript'); ?>
                <?php if(Auth::user()->can('permit_application_usage_create')): ?>
                    <?php echo $__env->make('layouts.components.datatable_button_export_create_modal',['createUrl'=>url('permit_application_usage')."/create/".$permit_application_id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php else: ?>
                    <?php echo $__env->make('layouts.components.datatable_button_export', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            <?php $__env->endSlot(); ?> 

            <?php $__env->slot('secondScript'); ?>
            <?php $__env->endSlot(); ?> 
            
        <?php echo $__env->renderComponent(); ?>
        </div>
        
        
        <?php echo $__env->make('permit_application.menu_active', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php $__env->endSlot(); ?> 
        
    <?php echo $__env->renderComponent(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\permitkhas\resources\views/permit_application_usage/index.blade.php ENDPATH**/ ?>