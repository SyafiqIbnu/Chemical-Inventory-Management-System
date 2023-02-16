<?php $__env->startSection('page_description'); ?>
<?php echo e(__('general.edit')); ?>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('main-content'); ?>

	<?php $__env->startComponent('layouts.components.crud_card'); ?>
				<?php $__env->slot('cardTitle'); ?> <?php echo e(__('general.permit')); ?> #<?php echo e($permit->permit_no); ?><?php $__env->endSlot(); ?>
				<?php $__env->slot('cardColor'); ?> card-success <?php $__env->endSlot(); ?>
				
				<?php $__env->slot('cardBody'); ?>
                    
					<?php echo $__env->make('permit_search.show_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php $__env->endSlot(); ?>

				<?php $__env->slot('cardFooter'); ?>
				<a type="button" class="btn btn-warning"	onClick="location.href='<?php echo e(url('permit_search')); ?>'"><i class="fa fa-close"></i> <?php echo e(__('general.back')); ?></a>
				<?php $__env->endSlot(); ?>
	<?php echo $__env->renderComponent(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('permit_search.menu_active', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\permitkhas\resources\views/permit_search/show.blade.php ENDPATH**/ ?>