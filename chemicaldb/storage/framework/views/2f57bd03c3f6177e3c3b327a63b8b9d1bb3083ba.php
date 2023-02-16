<?php $__env->startSection('page_title'); ?>
Aktiviti dan Pengesahan
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_description'); ?>
<?php echo e(__('general.edit')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
	<li class="breadcrumb-item"><a href="#"><?php echo e(__('general.home')); ?></a></li>
    <li class="breadcrumb-item active">Permohonan Permit #<?php echo e($permit_application_id); ?></li>
    <li class="breadcrumb-item active">Aktiviti dan Pengesahan</li>
	
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>

	<?php $__env->startComponent('shared.permit_application_tabs',['permit_application_id'=>$permit_application_id,
		'modelPermitApplication'=>$modelPermitApplication,'canEdit'=>$canEdit]); ?>
			<?php $__env->slot('selectedTab'); ?>
				activities
			<?php $__env->endSlot(); ?>

			<?php $__env->slot('content'); ?>

				<?php $__env->startComponent('layouts.components.crud_card'); ?>
					<?php $__env->slot('cardTitle'); ?> <?php echo e(__('general.permit_application_activity_approval')); ?> <?php $__env->endSlot(); ?>
					<?php $__env->slot('cardColor'); ?> card-success <?php $__env->endSlot(); ?>
					
					<?php $__env->slot('cardBody'); ?>
						<?php echo Form::model($modelPermitApplicationActivity, ['route' => ['permit_application_activity.update', $permit_application_id],'method'=>'PUT','id'=>'permit_application_activityForm']); ?>

							<?php echo $__env->make('permit_application_activity.create_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					<?php $__env->endSlot(); ?>

					<?php $__env->slot('cardFooter'); ?>
						<a type="button" class="btn btn-danger"	onClick="location.href='<?php echo e(url('permit_application')); ?>'"><i class="fa fa-close"></i> <?php echo e(__('general.cancel')); ?></a>
						<?php echo Form::button('<i class="fa fa-refresh"></i> '.__('general.reset').'',['class'=>'btn btn-warning','type'=>'reset']); ?> 
						<?php echo Form::button('<i class="fa fa-floppy-o"></i> '.__('general.save').'',['class'=>'btn btn-success pull-right','type'=>'submit','id'=>'submitButton']); ?>

						<?php echo Form::close(); ?>

						
					<?php $__env->endSlot(); ?>
				<?php echo $__env->renderComponent(); ?>

			<?php $__env->endSlot(); ?>
	<?php echo $__env->renderComponent(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('permit_application.menu_active', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\permitkhas\resources\views/permit_application_activity/edit.blade.php ENDPATH**/ ?>