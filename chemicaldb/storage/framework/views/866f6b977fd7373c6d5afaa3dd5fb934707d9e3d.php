<?php $__env->startSection('main-content'); ?>
    <div class="card-header">
        <div class="row">
            <div class="col-sm-12">
                <div class="d-flex justify-content-center links"><center><h5><?php echo e(__('Reset Password')); ?></h5><center></div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <?php echo $__env->make('layouts.components.session_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <form method="POST" action="<?php echo e(route('password.email')); ?>" id="login-form" style="display: block;">
            <?php echo csrf_field(); ?>
            <div class="input-group form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                </div>
				<input id="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required autofocus="autofocus" placeholder="<?php echo e(__('E-Mail Address')); ?>">
                <?php if($errors->has('email')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('email')); ?></strong>
                </span>
                <?php endif; ?>
            </div>
            
            <div class="form-group">       
				<button type="submit" class="btn btn-block btn-info"><?php echo e(__('Submit')); ?></button>        
            </div>
        </form>
    </div>
    <div class="card-footer">
         <?php echo $__env->make('auth.password_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <?php $__env->startPush('scripts'); ?>
        
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app_login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\bizmillaagent\resources\views/auth/passwords/email.blade.php ENDPATH**/ ?>