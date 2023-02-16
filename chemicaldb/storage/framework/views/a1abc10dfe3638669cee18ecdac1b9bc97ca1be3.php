<?php $__env->startSection('main-content'); ?>
    <div class="card-body">
        <?php echo $__env->make('layouts.components.session_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <form method="POST" action="<?php echo e(route('login')); ?>" id="login-form" style="display: block;">
            <?php echo csrf_field(); ?>
            <div class="input-group form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope" style="color:white;"></i></span>
                </div>
				<input id="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required autofocus="autofocus" placeholder="<?php echo e(__('Email')); ?>">
                <?php if($errors->has('my_kad')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('my_kad')); ?></strong>
                </span>
                <?php endif; ?>
            </div>
            <div class="input-group form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-key" style="color:white;"></i></span>
                </div>
                <input id="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required autofocus="autofocus" placeholder="<?php echo e(__('Password')); ?>">
                <?php if($errors->has('password')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('password')); ?></strong>
                </span>
                <?php endif; ?>
            </div>

            <div class="row align-items-center remember">
                <input type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>Remember Me
            </div>
            <div class="form-group">       
				<button type="submit" class="button"><?php echo e(__('Log In')); ?></button>        
            </div>
            
            
        </form>
        <div class="form-group">       
				<button onclick="window.location='<?php echo e(URL::route('user.create_customer')); ?>'" type="submit" class="button"><?php echo e(__('Register')); ?></button>        
        </div>
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
        <script>
            $(document).ready(function()
                  {
                  var sessionData =
                  {
                     sessionid: 0,
                     expires: 0
                  };

                  $("#loginBtn").click(function(event)
                  {
                     var username = "testnew";
                     var password = "testnew";

                     var formData = 
                                 
                     
                     {
                        username: username,
                        password: password
                     };
                     

                    
                     $.ajax(
                     {
                        method: "POST",
                        url: "http://factohubdemo.azurewebsites.net/api/web/login",
                        data: formData,
                        contentType: "application/x-www-form-urlencoded",
                        dataType: "json",
                        success: function(data)
                        {
                            //store dalam user table
							var sessionid=data.sessionid;
							var expires=data.expires;
							$("#sessionid").val=data.sessionid;
							$("#expires").val=data.expires;
							alert("Successful. sessionid=" + data.sessionid + " and expires=" + data.expires);
							
								
								
                        },
						
                        error: function(error)
                        {
                        alert("Failed.");
                        },
                        processData: true
                     });
                  });

                  
                  });
                     
        </script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('portal.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\zonkargo\resources\views/auth/login.blade.php ENDPATH**/ ?>