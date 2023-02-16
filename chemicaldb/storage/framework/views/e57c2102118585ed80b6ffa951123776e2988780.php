<?php $__env->startSection('page_title'); ?>
<?php echo e(__('general.profile')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_description'); ?>
<?php echo e(__('general.profile')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
	<li class="breadcrumb-item"><a href="#"><?php echo e(__('general.profile')); ?></a></li>
    <li class="breadcrumb-item active"><?php echo e(__('general.profile')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<?php echo $__env->make('layouts.components.session_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="col-md-12">
	<div class="card card-primary">
	  <div class="card-header">
		<h3 class="card-title"><?php echo e(__('general.profile')); ?></h3>
	  </div>
		
	<div class="card-body">

	<?php echo Form::open(['route'=>'user.store','id'=>'myAppForm']); ?>

	<?php echo $__env->make('user.show_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		</div>
	<div class="card-footer">
		
	</div>
	<?php echo Form::close(); ?>

		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.profile_menu_active', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startPush('scriptsDocumentReadyBottom'); ?>

function copyToClipboard(elementId) {

// Create a "hidden" input
var aux = document.createElement("input");

// Assign it the value of the specified element
aux.setAttribute("value", document.getElementById(elementId).innerHTML);

// Append it to the body
document.body.appendChild(aux);

// Highlight its content
aux.select();

// Copy the highlighted text
document.execCommand("copy");

// Remove it from the body
document.body.removeChild(aux);

}
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\bizmillaagent\resources\views/user/profile.blade.php ENDPATH**/ ?>