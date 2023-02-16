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
<?php echo $__env->make('layouts.components.session_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="col-md-12">
	<div class="card card-primary">
	  <div class="card-header">
		<h3 class="card-title">By registering our service, you are able to utilize our service n accordance to our terms and services.</h3>
	  </div>
		
	<div class="card-body">
        <?php echo Form::open(['route'=>'user.store_customer','id'=>'myAppForm']); ?>

        <?php echo $__env->make('user.create_form_customer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</div>
    <div class="card-footer">
	<?php echo Form::label('Your email will be used as unique ID as well as authentications.'); ?>

	<?php echo Form::label('We take user privacy seriously. No email address will be sold to third parties.'); ?>

        <?php echo Form::button('<i class="fa fa-refresh"></i> '.__('general.reset').'',['class'=>'btn btn-warning','type'=>'reset']); ?> 
        <?php echo Form::button('<i class="fa fa-floppy-o"></i> '.__('general.register'),['class'=>'btn btn-success pull-right','type'=>'submit','id'=>'submitButton']); ?>

    </div>
<?php echo Form::close(); ?>

	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.menu_active', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('portal.register', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\factohub\resources\views/user/create_customer.blade.php ENDPATH**/ ?>