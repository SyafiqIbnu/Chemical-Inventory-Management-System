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
    
    <?php $__env->stopPush(); ?>

	
    <div class="col-md-12 table-responsive" style="border: none;">
        <?php $__env->startComponent('layouts.components.table_ajax', ['route'=>'nasiarab','tname' => 'nasiarab_table_ajax','bgColor'=>'bg-red']); ?> 

		<?php $__env->slot('url'); ?>
            <?php echo e(route('nasiarab.indexAjax')); ?>

        <?php $__env->endSlot(); ?> 

         

		<?php $__env->slot('thead'); ?>
            <th style='width: 30px;'><?php echo e(__('general.number')); ?></th>
            <th><?php echo e(__('nasiarab.image')); ?></th>
                        <th><?php echo e(__('nasiarab.name')); ?></th>
                        <th><?php echo e(__('nasiarab.price')); ?></th>
                        <th><?php echo e(__('nasiarab.description')); ?></th>
                        <th><?php echo e(__('nasiarab.product_category')); ?></th>
                        <th><?php echo e(__('product.food_group')); ?></th>
                        <th><?php echo e(__('nasiarab.pax_no')); ?></th>
                        <th style="width:80px;"><?php echo e(__('general.action')); ?></th>
        <?php $__env->endSlot(); ?> 

		<?php $__env->slot('tbody'); ?>
            <?php echo $__env->make('layouts.components.datatable_data_card_render_number',['table_name'=>'nasiarab_table_ajax'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
                <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'nasiarab_table_ajax','name'=>'image_path','title'=>__('nasiarab.image')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
            			            <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'nasiarab_table_ajax','name'=>'name','title'=>__('nasiarab.name')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
            			            <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'nasiarab_table_ajax','name'=>'price','title'=>__('nasiarab.price')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
            			            <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'nasiarab_table_ajax','name'=>'description','title'=>__('nasiarab.description')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
            			            <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'nasiarab_table_ajax','name'=>'product_category','title'=>__('nasiarab.product_category')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
                                    <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'nasiarab_table_ajax','name'=>'food_group','title'=>__('product.food_group')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
                                    <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'nasiarab_table_ajax','name'=>'pax_no','title'=>__('nasiarab.pax_no')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
                        <?php echo $__env->make('layouts.components.datatable_data_card_render_action', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
        <?php $__env->endSlot(); ?> 

		<?php $__env->slot('filter_parameter'); ?>
            //dt.f_start_date = $('input[name=f_start_date]').val();
            //dt.f_end_date = $('input[name=f_end_date]').val();
        <?php $__env->endSlot(); ?> 

		<?php $__env->slot('firstScript'); ?>
            <?php if(Auth::user()->can('nasiarab_create')): ?>
                <?php echo $__env->make('layouts.components.datatable_button_export_create_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php else: ?>
                <?php echo $__env->make('layouts.components.datatable_button_export', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        <?php $__env->endSlot(); ?> 

		<?php $__env->slot('secondScript'); ?>
        <?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
    </div>
	
    <?php echo $__env->make('nasiarab.menu_active', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\bizmillaagent\resources\views/nasiarab/index.blade.php ENDPATH**/ ?>