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
        
        <?php if(\App\Helpers\PermissionHelper::hasUserDelete(false)): ?>
            <?php echo $__env->make('layouts.components.modal_delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        
        <?php if(\App\Helpers\PermissionHelper::hasUserCreate(false)): ?>
            <?php $__env->startComponent('layouts.components.modal_proceed',['id'=>'modal-setadmin']); ?> 
            <?php echo $__env->renderComponent(); ?>
        <?php endif; ?>
    <?php $__env->stopPush(); ?>
	
    <div class="col-md-12 table-responsive" style="border: none;">
        <?php $__env->startComponent('layouts.components.table_ajax', ['route'=>'user','tname' => 'user_table_ajax']); ?> 
		<?php $__env->slot('url'); ?>
            <?php echo e($ajaxUrl); ?>

        <?php $__env->endSlot(); ?> 

		<?php $__env->slot('thead'); ?>
            <th style='width: 30px;'><?php echo e(__('general.number')); ?></th>
                        <th><?php echo e(__('user.name')); ?></th>
                        <th><?php echo e(__('user.uid')); ?></th>
                        <th><?php echo e(__('user.email')); ?></th>
                        <th><?php echo e(__('user.mykad')); ?></th>
                        <th><?php echo e(__('user.phone')); ?></th>
                        <th><?php echo e(__('user.verified')); ?></th>
                        <th style="width:66px;"><?php echo e(__('general.action')); ?></th>
        <?php $__env->endSlot(); ?> 

		<?php $__env->slot('tbody'); ?>
            <?php echo $__env->make('layouts.components.datatable_data_card_render_number',['table_name'=>'user_table_ajax'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
            <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'user_table_ajax','name'=>'name','title'=>__('user.name')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
            <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'user_table_ajax','name'=>'uid','title'=>__('user.uid')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
            <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'user_table_ajax','name'=>'email','title'=>__('user.email')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
            <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'user_table_ajax','name'=>'mykad','title'=>__('user.mykad')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
            <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'user_table_ajax','name'=>'phone','title'=>__('user.phone')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
            <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'user_table_ajax','name'=>'verified','title'=>__('user.verified')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
            <?php echo $__env->make('layouts.components.datatable_data_card_render_action', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
        <?php $__env->endSlot(); ?> 

		<?php $__env->slot('filter_parameter'); ?>
            
        <?php $__env->endSlot(); ?> 

		<?php $__env->slot('firstScript'); ?>
            <?php if(Auth::user()->can('user_create') && Auth::user()->is_admin==1): ?>
                <?php echo $__env->make('layouts.components.datatable_button_export_create_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php else: ?>
                <?php echo $__env->make('layouts.components.datatable_button_export', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        <?php $__env->endSlot(); ?> 

		<?php $__env->slot('secondScript'); ?>
        <?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
    </div>
	
    <?php echo $__env->make('user.menu_active', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\permitkhas\resources\views/user/index.blade.php ENDPATH**/ ?>