<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo e(url('/home')); ?>" class="brand-link text-center">
      
    <img src="<?php echo e(url('images/chem1.png')); ?>" width="70%">
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
            <a href="<?php echo e(url('/faculty')); ?>" class="nav-link" id="menu-reference-faculty">
              <i class="nav-icon fas fa-landmark"></i>
              <p>
                Faculty
                <i class="right"></i>
              </p>
            </a>
            <a href="<?php echo e(url('/laboratory')); ?>" class="nav-link" id="menu-administration-laboratory">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Laboratory
                <i class="right"></i>
              </p>
            </a>
            <a href="<?php echo e(url('/report')); ?>" class="nav-link" id="menu-laboratory-report">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Laboratory Report 
                <i class="right"></i>
              </p>
            </a>
            <a href="<?php echo e(url('/chemical')); ?>" class="nav-link" id="menu-administration-chemical">
              <i class="nav-icon fas fa-flask"></i>
              <p>
                Chemical
                <i class="right"></i>
              </p>
            </a>
            <a href="<?php echo e(url('/reportchemical')); ?>" class="nav-link" id="menu-chemical-report">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Chemical Report
                <i class="right"></i>
              </p>
            </a>
            
			</li>
			<?php echo $__env->make('layouts.navigation_profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>   
      <?php echo $__env->make('layouts.navigation_reference', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  
              
			
			<?php echo $__env->make('layouts.navigation_administration', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>      
      
       
      
      

      </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside><?php /**PATH D:\xampp\htdocs\chemicaldb\resources\views/layouts/navigation.blade.php ENDPATH**/ ?>