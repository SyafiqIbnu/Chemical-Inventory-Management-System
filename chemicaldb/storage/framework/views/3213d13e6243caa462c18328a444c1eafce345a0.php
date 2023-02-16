<?php $__env->startSection('main-content'); ?>
    <div class="card-header">
        <div class="row">
            <div class="col-sm-12">
                <div class="d-flex justify-content-center links"><center><h5>New Registration</h5><center></div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <?php echo $__env->make('layouts.components.session_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <form method="POST" action="<?php echo e(route('register')); ?>" style="display: block;" autocomplete="off">
            <?php echo csrf_field(); ?>

			<div class="input-group form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
				<input autocomplete="off" id="name" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" name="name" value="<?php echo e(old('name')); ?>" required autofocus="autofocus" placeholder="<?php echo e(__('general.name')); ?>">
                <?php if($errors->has('name')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('name')); ?></strong>
                </span>
                <?php endif; ?>
            </div>

            <div class="input-group form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                </div>
				<input autocomplete="off" id="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required autofocus="autofocus" placeholder="<?php echo e(__('general.email')); ?>">
                <?php if($errors->has('my_kad')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('my_kad')); ?></strong>
                </span>
                <?php endif; ?>
            </div>
            <div class="input-group form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                </div>
                <input id="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required autofocus="autofocus" placeholder="<?php echo e(__('general.password')); ?>">
                <?php if($errors->has('password')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('password')); ?></strong>
                </span>
                <?php endif; ?>				
            </div>

			<div class="input-group form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                </div>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" autofocus="autofocus" placeholder="<?php echo e(__('general.password_confirmation')); ?>">
				<?php if($errors->has('password-confirm')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('password-confirm')); ?></strong>
                </span>
                <?php endif; ?>				
            </div>

			<div class="input-group form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                </div>
                <input id="mykad" type="text" class="form-control<?php echo e($errors->has('mykad') ? ' is-invalid' : ''); ?>" maxlength="15" name="mykad" required autofocus="autofocus" placeholder="MyKad">
                <?php if($errors->has('mykad')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('mykad')); ?></strong>
                </span>
                <?php endif; ?>				
            </div>

			<div class="input-group form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                </div>
                <input id="phone" type="text" class="form-control<?php echo e($errors->has('phone') ? ' is-invalid' : ''); ?>" maxlength="15" name="phone" required autofocus="autofocus" placeholder="<?php echo e(__('general.phone')); ?>">
                <?php if($errors->has('phone')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('phone')); ?></strong>
                </span>
                <?php endif; ?>				
            </div>

            <div class="form-group">       
				<button type="submit" class="btn btn-block btn-info"><?php echo e(__('Register')); ?></button>        
            </div>
        </form>

        <form method="POST" action="<?php echo e(route('password.email')); ?>" id="register-form" style="display: none;">
            <?php echo csrf_field(); ?>
            <div class="input-group form-group">
                <input id="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required placeholder="<?php echo e(__('E-Mail Address')); ?>">
                <?php if($errors->has('email')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('email')); ?></strong>
                </span>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    <?php echo e(__('Send Password Reset Link')); ?>

                </button>
            </div>
        </form>
    </div>
    <div class="card-footer">
         <?php echo $__env->make('auth.password_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <?php $__env->startPush('scripts'); ?>
        
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app_login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\permitkhas\resources\views/auth/register.blade.php ENDPATH**/ ?>