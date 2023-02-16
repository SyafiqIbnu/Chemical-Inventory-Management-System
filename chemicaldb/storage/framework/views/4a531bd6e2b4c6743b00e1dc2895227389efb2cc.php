<!-- <div class="d-flex justify-content-center links">
	<a href="<?php echo e(url('/')); ?>"><i class="fas fa-home" style="font-size: 12px;"></i> Home</a>
</div> -->


<?php if(Route::has('password.request')): ?>
<div class="d-flex justify-content-center links">
<?php echo e(__('Forgot Your Password?')); ?><a href="<?php echo e(route('password.request')); ?>">Reset</a>
</div>
<?php endif; ?> 

<?php /**PATH D:\xampp\htdocs\chemicaldb\resources\views/auth/password_footer.blade.php ENDPATH**/ ?>