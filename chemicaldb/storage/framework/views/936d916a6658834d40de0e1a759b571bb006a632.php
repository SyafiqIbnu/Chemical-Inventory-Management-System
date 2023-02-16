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
        <?php if(\App\Helpers\PermissionHelper::hasAccountHolderDelete(false)): ?>
            <?php echo $__env->make('layouts.components.modal_delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    <?php $__env->stopPush(); ?>

	
    <div class="col-md-12 table-responsive" style="border: none;">
        <?php $__env->startComponent('layouts.components.table_ajax', ['route'=>'account_holder','tname' => 'account_holder_table_ajax','bgColor'=>'bg-red']); ?> 

		<?php $__env->slot('url'); ?>
            <?php echo e(route('account_holder.indexAjax')); ?>

        <?php $__env->endSlot(); ?> 

         

		<?php $__env->slot('thead'); ?>
            <th style='width: 30px;'><?php echo e(__('general.number')); ?></th>
                        <th><?php echo e(__('account_holder.name')); ?></th>
                        <th><?php echo e(__('account_holder.is_company')); ?></th>
                        <th><?php echo e(__('account_holder.account_type_id')); ?></th>
                        <th><?php echo e(__('account_holder.registration_no')); ?></th>
                        <th><?php echo e(__('account_holder.phone_no')); ?></th>
                        <th><?php echo e(__('account_holder.mobile_no')); ?></th>
                        <th><?php echo e(__('account_holder.fax_no')); ?></th>
                        <th><?php echo e(__('account_holder.email')); ?></th>
                        <th><?php echo e(__('account_holder.subsidy_no')); ?></th>
                        <th><?php echo e(__('account_holder.address1')); ?></th>
                        <th><?php echo e(__('account_holder.address2')); ?></th>
                        <th><?php echo e(__('account_holder.postcode')); ?></th>
                        <th><?php echo e(__('account_holder.city_id')); ?></th>
                        <th><?php echo e(__('account_holder.state_id')); ?></th>
                        <th><?php echo e(__('account_holder.active')); ?></th>
                        <th><?php echo e(__('account_holder.remark')); ?></th>
                        <th><?php echo e(__('account_holder.block_flag')); ?></th>
                        <th><?php echo e(__('account_holder.fc_quota_basic')); ?></th>
                        <th><?php echo e(__('account_holder.fc_quota_additional')); ?></th>
                        <th><?php echo e(__('account_holder.notes')); ?></th>
                        <th style="width:80px;"><?php echo e(__('general.action')); ?></th>
        <?php $__env->endSlot(); ?> 

		<?php $__env->slot('tbody'); ?>
            <?php echo $__env->make('layouts.components.datatable_data_card_render_number',['table_name'=>'account_holder_table_ajax'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
            			            <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'account_holder_table_ajax','name'=>'name','title'=>__('account_holder.name')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
            			            <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'account_holder_table_ajax','name'=>'is_company','title'=>__('account_holder.is_company')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
            			            <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'account_holder_table_ajax','name'=>'account_type_id','title'=>__('account_holder.account_type_id')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
            			            <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'account_holder_table_ajax','name'=>'registration_no','title'=>__('account_holder.registration_no')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
            			            <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'account_holder_table_ajax','name'=>'phone_no','title'=>__('account_holder.phone_no')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
            			            <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'account_holder_table_ajax','name'=>'mobile_no','title'=>__('account_holder.mobile_no')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
            			            <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'account_holder_table_ajax','name'=>'fax_no','title'=>__('account_holder.fax_no')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
            			            <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'account_holder_table_ajax','name'=>'email','title'=>__('account_holder.email')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
            			            <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'account_holder_table_ajax','name'=>'subsidy_no','title'=>__('account_holder.subsidy_no')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
            			            <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'account_holder_table_ajax','name'=>'address1','title'=>__('account_holder.address1')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
            			            <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'account_holder_table_ajax','name'=>'address2','title'=>__('account_holder.address2')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
            			            <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'account_holder_table_ajax','name'=>'postcode','title'=>__('account_holder.postcode')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
            			            <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'account_holder_table_ajax','name'=>'city_id','title'=>__('account_holder.city_id')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
            			            <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'account_holder_table_ajax','name'=>'state_id','title'=>__('account_holder.state_id')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
            			            <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'account_holder_table_ajax','name'=>'active','title'=>__('account_holder.active')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
            			            <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'account_holder_table_ajax','name'=>'remark','title'=>__('account_holder.remark')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
            			            <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'account_holder_table_ajax','name'=>'block_flag','title'=>__('account_holder.block_flag')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
            			            <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'account_holder_table_ajax','name'=>'fc_quota_basic','title'=>__('account_holder.fc_quota_basic')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
            			            <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'account_holder_table_ajax','name'=>'fc_quota_additional','title'=>__('account_holder.fc_quota_additional')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
            			            <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'account_holder_table_ajax','name'=>'notes','title'=>__('account_holder.notes')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
                        <?php echo $__env->make('layouts.components.datatable_data_card_render_action', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
        <?php $__env->endSlot(); ?> 

		<?php $__env->slot('filter_parameter'); ?>
            //dt.f_start_date = $('input[name=f_start_date]').val();
            //dt.f_end_date = $('input[name=f_end_date]').val();
        <?php $__env->endSlot(); ?> 

		<?php $__env->slot('firstScript'); ?>
            <?php if(Auth::user()->can('account_holder_create')): ?>
                <?php echo $__env->make('layouts.components.datatable_button_export_create_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php else: ?>
                <?php echo $__env->make('layouts.components.datatable_button_export', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        <?php $__env->endSlot(); ?> 

		<?php $__env->slot('secondScript'); ?>
        <?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
    </div>
	
    <?php echo $__env->make('account_holder.menu_active', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\permitkhas\resources\views/account_holder/index.blade.php ENDPATH**/ ?>