<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo e(url('/home')); ?>" class="brand-link text-center">
    <img src="<?php echo e(url('images/logo.png')); ?>" width="70%">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2 nav-compact">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" 
        data-widget="treeview" role="menu" data-accordion="false">
	      <li class="nav-item has-treeview menu-open">
          <!-- Add icons to the links using the .nav-icon class
			   with font-awesome or any other icon font library -->
			   
			<li class="nav-item has-treeview">
            <a href="<?php echo e(url('/home')); ?>" class="nav-link" id="menu-home">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
                <i class="right"></i>
              </p>
            </a>
			</li>
			<?php echo $__env->make('layouts.navigation_profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>   
              
			
			<?php echo $__env->make('layouts.navigation_administration', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>      
      <?php echo $__env->make('layouts.navigation_orders', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>      
       
      
      

      </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside><?php /**PATH D:\xampp\htdocs\zonkargo\resources\views/layouts/navigation.blade.php ENDPATH**/ ?>