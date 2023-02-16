<?php $__env->startSection('page_title'); ?>
<?php echo e(__('general.show')); ?> Pesanan #<?php echo e($modelOrder->id); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_description'); ?>
<?php echo e(__('general.show')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
	<li class="breadcrumb-item"><a href="#"><?php echo e(__('general.home')); ?></a></li>
    <li class="breadcrumb-item active"><?php echo e(__('general.show')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<div class="row">
	<?php $__env->startComponent('layouts.components.crud_card_col2'); ?>
		<?php $__env->slot('cardTitle'); ?> PESANAN <?php $__env->endSlot(); ?>
		<?php $__env->slot('cardColor'); ?> card-success <?php $__env->endSlot(); ?>
		
		<?php $__env->slot('cardBody'); ?>
        
				<?php echo $__env->make('order.create_form_readonly', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				<table class="table table-bordered">
					<tbody>
					<tr>
						<th colspan="4">ORDER SUMMARY</th>
						
					</tr>
					
					</tbody>
                </table>
				<?php echo $__env->make('order.product_summary_readonly', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></br>
				<a target="_blank" href="<?php echo asset('../bizmillaagent/storage/app/'.$order_documents->path); ?>" class="btn btn-primary " role="button" aria-pressed="true">RESIT BAYARAN</a> 
		<?php $__env->endSlot(); ?>

		<?php $__env->slot('cardFooter'); ?>
			
		<?php $__env->endSlot(); ?>
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.crud_card_col2'); ?>
		<?php $__env->slot('cardTitle'); ?> REPORT KITCHEN <?php $__env->endSlot(); ?>
		<?php $__env->slot('cardColor'); ?> card-success <?php $__env->endSlot(); ?>
		
		<?php $__env->slot('cardBody'); ?>
				<?php echo $__env->make('order.kitchen_summary_individual', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<?php $__env->endSlot(); ?>

		<?php $__env->slot('cardFooter'); ?>
			<a type="button" class="btn btn-primary"	onClick="location.href='<?php echo e(url('orderreceiver')); ?>'"><i class="fa fa-arrow-left"></i>BACK</a>
		<?php $__env->endSlot(); ?>
	<?php echo $__env->renderComponent(); ?>
</div>

	

<?php $__env->stopSection(); ?>

<?php echo $__env->make('order.menu_active', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\bizmillaagent\resources\views/order/order_receive.blade.php ENDPATH**/ ?>