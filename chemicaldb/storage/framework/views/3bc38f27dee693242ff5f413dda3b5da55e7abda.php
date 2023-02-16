<?php $__env->startSection('page_description'); ?>
<?php echo e(__('general.edit')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
	<li class="breadcrumb-item"><a href="#"><?php echo e(__('general.permit')); ?></a></li>
    <li class="breadcrumb-item active">Permohonan Pembatalan</li>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>

	<?php $__env->startComponent('layouts.components.crud_card'); ?>
				<?php $__env->slot('cardTitle'); ?> <?php echo e(__('general.permit')); ?> #<?php echo e($permit->permit_no); ?><?php $__env->endSlot(); ?>
				<?php $__env->slot('cardColor'); ?> card-success <?php $__env->endSlot(); ?>
				
				<?php $__env->slot('cardBody'); ?>
                <?php echo Form::model($permit, ['route' => ['permit.cancel', $permit->id],'method'=>'PUT','id'=>'permitForm']); ?>

					<?php echo $__env->make('permit.show_cancel_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php $__env->endSlot(); ?>

				<?php $__env->slot('cardFooter'); ?>
				<a type="button" class="btn btn-warning"	onClick="location.href='<?php echo e(url('permit_search')); ?>'"><i class="fa fa-close"></i> <?php echo e(__('general.back')); ?></a>
					<?php echo Form::button('<i class="fa fa-check"></i> '.__('general.cancel_proceed').'',['class'=>'btn btn-danger pull-right','type'=>'submit','id'=>'submitButton']); ?>

					<?php echo Form::close(); ?>

				<?php $__env->endSlot(); ?>
	<?php echo $__env->renderComponent(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('permit_search.menu_active', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\permitkhas\resources\views/permit/show_cancel.blade.php ENDPATH**/ ?>