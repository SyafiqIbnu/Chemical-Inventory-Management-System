<?php $__env->startSection('main-content'); ?>

	<?php $__env->startComponent('layouts.components.crud_card'); ?>
		<?php $__env->slot('cardTitle'); ?> <?php echo e(__('Maklumat Syarikat')); ?> <?php $__env->endSlot(); ?>
		<?php $__env->slot('cardColor'); ?> card-success <?php $__env->endSlot(); ?>
		
		<?php $__env->slot('cardBody'); ?>
			<?php echo Form::open(['route'=>'account_application.store','id'=>'myAppForm']); ?>

				<?php echo $__env->make('account_application.create_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<?php $__env->endSlot(); ?>

		<?php $__env->slot('cardFooter'); ?>
			
		<?php $__env->endSlot(); ?>
	<?php echo $__env->renderComponent(); ?>

	<?php $__env->startComponent('layouts.components.crud_card'); ?>
		<?php $__env->slot('cardTitle'); ?> <?php echo e(__('Maklumat Pemohon')); ?> <?php $__env->endSlot(); ?>
		<?php $__env->slot('cardColor'); ?> card-success <?php $__env->endSlot(); ?>
		
		<?php $__env->slot('cardBody'); ?>
			
				<?php echo $__env->make('account_application.create_form_pemohon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<?php $__env->endSlot(); ?>

		<?php $__env->slot('cardFooter'); ?>
			<a type="button" class="btn btn-danger"	onClick="location.href='<?php echo e(url('home')); ?>'"><i class="fa fa-close"></i> <?php echo e(__('general.cancel')); ?></a>
			<?php echo Form::button('<i class="fa fa-refresh"></i> '.__('general.reset').'',['class'=>'btn btn-warning','type'=>'reset']); ?> 
			<?php echo Form::button('<i class="fa fa-floppy-o"></i> '.__('general.submit').'',['class'=>'btn btn-success pull-right','type'=>'submit','id'=>'submitButton']); ?>

			<?php echo Form::close(); ?>

		<?php $__env->endSlot(); ?>
	<?php echo $__env->renderComponent(); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app_register', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\permitkhas\resources\views/account_application/create.blade.php ENDPATH**/ ?>