<li class="nav-item dropdown d-sm-inline-block">
        <a title="<?php echo e(__('general.profile')); ?>" 
        class="nav-link" data-toggle="dropdown" href="#">
		<i class="fas fa-user-circle fa-2x"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-item">
            <div class="col-md-16">
            <!-- Profile Image -->
            <div class="card card-info card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <i class="fas fa-user-circle fa-5x"></i>
                  <!--<img class="profile-user-img img-fluid img-circle" src="dist/img/user1-128x128.jpg" alt="User profile picture">-->
                </div>
                <p class="text-center"> <?php if(Auth::check()): ?> <?php echo e(Auth::user()->name); ?> <?php else: ?> Guest <?php endif; ?></p>
                <p class="text-muted text-center"><?php echo e(Auth::user()->email); ?></p>
				<br>
				<div class="row">
					<div class="col-md-12">
						<a href="<?php echo e(url('/profile/changepwd')); ?>" class="btn btn-info btn-block"><b><?php echo e(__('general.change_password')); ?></b></a>
						<a href="<?php echo e(url('/logout')); ?>" class="btn btn-danger btn-block"><b>Logout</b></a>
					</div>
				</div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          </div>         
        </div>
      </li><?php /**PATH C:\wamp64\www\factohub\resources\views/layouts/profile.blade.php ENDPATH**/ ?>