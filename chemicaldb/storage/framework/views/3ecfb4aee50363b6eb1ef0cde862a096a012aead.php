<?php if($errors->any()): ?>
<div class="alert alert-danger">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <p><?php echo e($error); ?></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php endif; ?>
<?php if(Session::has('success')): ?>
    <p id="successMessage" class="alert <?php echo e(Session::get('alert-class', 'alert-success')); ?>"><?php echo e(Session::get('success')); ?></p>
	<script>
	$(".alert").fadeTo(5000, 500).slideUp(500, function(){
		$(".alert").slideUp(500);
	});
	</script>
<?php endif; ?>
<?php if(Session::has('warning')): ?>
    <p id="successMessage" class="alert <?php echo e(Session::get('alert-class', 'alert-warning')); ?>"><?php echo e(Session::get('warning')); ?></p>
<?php endif; ?>
<?php if(Session::has('error')): ?>
    <p id="successMessage" class="alert <?php echo e(Session::get('alert-class', 'alert-danger')); ?>"><?php echo Session::get('error'); ?></p>
<?php endif; ?>
<?php if(Session::has('validator-error')): ?>
    <p id="successMessage" class="alert <?php echo e(Session::get('alert-class', 'alert-danger')); ?>">
        <?php $__currentLoopData = Session::get('validator-error')->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $error; ?><br>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </p>
<?php endif; ?><?php /**PATH C:\wamp64\www\permitkhas\resources\views/layouts/components/session_message.blade.php ENDPATH**/ ?>