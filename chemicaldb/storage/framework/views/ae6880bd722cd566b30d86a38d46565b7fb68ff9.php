<?php $__env->startSection('page_title'); ?>
<?php echo e(__('general.show')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_description'); ?>
<?php echo e(__('general.show')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
	<li class="breadcrumb-item"><a href="#"><?php echo e(__('general.home')); ?></a></li>
    <li class="breadcrumb-item active"><?php echo e(__('general.show')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<?php echo $__env->make('layouts.components.session_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="col-md-12">
	<div class="card card-primary">
	  <div class="card-header">
		<h3 class="card-title"><?php echo e(__('role.title')); ?></h3>
	  </div>
		
	<div class="card-body">
<?php echo Form::open(['route'=>'role.store','id'=>'myAppForm']); ?>

<?php echo $__env->make('role.show_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</div>
<div class="card-footer">
	<a type="button" class="btn btn-danger"	onClick="location.href='<?php echo e(url('role')); ?>'"><i class="fa fa-close"></i> <?php echo e(__('general.cancel')); ?></a>
</div>
<?php echo Form::close(); ?>

	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('role.menu_active', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\bizmillaagent\resources\views/role/show.blade.php ENDPATH**/ ?>