<?php $__env->startSection('page_description'); ?>
<?php echo e(__('general.edit')); ?>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('main-content'); ?>

	<?php $__env->startComponent('layouts.components.crud_card'); ?>
				<?php $__env->slot('cardTitle'); ?> <?php echo e(__('general.permit_application_reviewer')); ?> #<?php echo e($modelPermitApplication->id); ?><?php $__env->endSlot(); ?>
				<?php $__env->slot('cardColor'); ?> card-success <?php $__env->endSlot(); ?>
				
				<?php $__env->slot('cardBody'); ?>
                    
					<?php echo $__env->make('permit_application_approver.approver_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php $__env->endSlot(); ?>

				<?php $__env->slot('cardFooter'); ?>
				
				<?php $__env->endSlot(); ?>
	<?php echo $__env->renderComponent(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('permit_application.menu_active', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\permitkhas\resources\views/permit_application_approver/reportapprove.blade.php ENDPATH**/ ?>