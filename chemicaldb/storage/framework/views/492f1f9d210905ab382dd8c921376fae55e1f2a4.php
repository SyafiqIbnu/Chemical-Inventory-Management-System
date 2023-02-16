<?php $__env->startSection('page_title'); ?>
<?php echo e(__('general.create')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_description'); ?>
<?php echo e(__('general.create')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
	<li class="breadcrumb-item"><a href="#"><?php echo e(__('general.home')); ?></a></li>
    <li class="breadcrumb-item active"><?php echo e(__('general.create')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
	<?php $__env->startComponent('layouts.components.crud_card'); ?>
		<?php $__env->slot('cardTitle'); ?> PESANAN <?php $__env->endSlot(); ?>
		<?php $__env->slot('cardColor'); ?> card-success <?php $__env->endSlot(); ?>
		
		<?php $__env->slot('cardBody'); ?>
    			<?php echo $__env->make('order.create_form_readonly', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<?php $__env->endSlot(); ?>

		<?php $__env->slot('cardFooter'); ?>
			
		<?php $__env->endSlot(); ?>
	<?php echo $__env->renderComponent(); ?>

    <?php $__env->startComponent('layouts.components.crud_card'); ?>
		<?php $__env->slot('cardTitle'); ?> PILIH MENU -
		<?php $__currentLoopData = $product_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<a class="btn btn-success" href="#<?php echo e($category->name); ?>"><?php echo e($category->name); ?></a>
			
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<?php $__env->endSlot(); ?>

		<?php $__env->slot('cardColor'); ?> card-success <?php $__env->endSlot(); ?>
		
		<?php $__env->slot('cardBody'); ?>
		
        		<?php echo $__env->make('order.create_form_products', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		
		<?php $__env->endSlot(); ?>

		<?php $__env->slot('cardFooter'); ?>
			
		<?php $__env->endSlot(); ?>
	<?php echo $__env->renderComponent(); ?>
	

	<?php $__env->startComponent('layouts.components.crud_card'); ?>
		<?php $__env->slot('cardTitle'); ?> ORDER SUMMARY <?php $__env->endSlot(); ?>
		<?php $__env->slot('cardColor'); ?> card-success <?php $__env->endSlot(); ?>
		
		<?php $__env->slot('cardBody'); ?>
        	<?php echo $__env->make('order.product_summary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<?php $__env->endSlot(); ?>

		<?php $__env->slot('cardFooter'); ?>
		<?php if($countOrderProduct>0): ?>
			<?php echo Form::model($modelOrder, ['route' => ['order.proceed', $modelOrder->id],'method'=>'GET','id'=>'orderForm']); ?>

			<!--<a type="button" class="btn btn-danger"	onClick="location.href='<?php echo e(url('order')); ?>'"><i class="fa fa-close"></i> <?php echo e(__('general.cancel')); ?></a>
			<?php echo Form::button('<i class="fa fa-refresh"></i> '.__('general.reset').'',['class'=>'btn btn-warning','type'=>'reset']); ?> -->
			<?php echo Form::button('<i class="fa fa-floppy-o"></i> '.__('general.proceed').'',['class'=>'btn btn-success pull-right','type'=>'submit','id'=>'submitButton']); ?>

			<?php echo Form::close(); ?>

		<?php endif; ?>
		<?php $__env->endSlot(); ?>
	<?php echo $__env->renderComponent(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('order.menu_active', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\bizmillaagent\resources\views/order/create_products.blade.php ENDPATH**/ ?>