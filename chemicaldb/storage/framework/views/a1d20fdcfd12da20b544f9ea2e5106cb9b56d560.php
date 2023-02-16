<?php $__env->startSection('page_title'); ?>
<?php echo e(__('general.edit')); ?> Permohonan Permit #<?php echo e($permit_application_id); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_description'); ?>
<?php echo e(__('general.edit')); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.breadcrumb_edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('main-content'); ?>

	<?php $__env->startComponent('layouts.components.crud_card'); ?>
				<?php $__env->slot('cardTitle'); ?> <?php echo e(__('general.permit_application_report')); ?> <?php $__env->endSlot(); ?>
				<?php $__env->slot('cardColor'); ?> card-success <?php $__env->endSlot(); ?>
				
				<?php $__env->slot('cardBody'); ?>
                    <?php echo $__env->make('permit_application.reportsubmit_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php $__env->endSlot(); ?>

				<?php $__env->slot('cardFooter'); ?>
				
				<?php echo Form::model($modelPermitApplication, ['route' => ['permit_application_approval.submit', $permit_application_id],'method'=>'PUT','id'=>'permit_application_activityForm']); ?>

					<a type="button" class="btn btn-danger"	onClick="location.href='<?php echo e(url('permit_application_approval')); ?>'"><i class="fa fa-close"></i> <?php echo e(__('general.cancel')); ?></a>
					<?php if(!$notCompleted): ?>
						<?php echo Form::button('<i class="fa fa-check"></i> '.__('general.approve').'',['class'=>'btn btn-primary pull-right','type'=>'submit','id'=>'submitButton']); ?>

						<?php echo Form::close(); ?>

					<?php endif; ?>
				
				<?php $__env->endSlot(); ?>
	<?php echo $__env->renderComponent(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('permit_application.menu_active', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\permitkhas\resources\views/permit_application/reportapprove.blade.php ENDPATH**/ ?>