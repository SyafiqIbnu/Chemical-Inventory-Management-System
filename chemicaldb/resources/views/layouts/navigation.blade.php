<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/home')}}" class="brand-link text-center">
      {{-- Logo --}}
    <img src="{{url('images/chem1.png')}}" width="70%">
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
            <a href="{{url('/home')}}" class="nav-link" id="menu-home">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
                <i class="right"></i>
              </p>
            </a>
            <a href="{{url('/faculty')}}" class="nav-link" id="menu-reference-faculty">
              <i class="nav-icon fas fa-landmark"></i>
              <p>
                Faculty
                <i class="right"></i>
              </p>
            </a>
            <a href="{{url('/laboratory')}}" class="nav-link" id="menu-administration-laboratory">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Laboratory
                <i class="right"></i>
              </p>
            </a>
            <a href="{{url('/report')}}" class="nav-link" id="menu-laboratory-report">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Laboratory Report 
                <i class="right"></i>
              </p>
            </a>
            <a href="{{url('/chemical')}}" class="nav-link" id="menu-administration-chemical">
              <i class="nav-icon fas fa-flask"></i>
              <p>
                Chemical
                <i class="right"></i>
              </p>
            </a>
            <a href="{{url('/reportchemical')}}" class="nav-link" id="menu-chemical-report">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Chemical Report
                <i class="right"></i>
              </p>
            </a>
            
			</li>
			@include('layouts.navigation_profile')   
      @include('layouts.navigation_reference')  
      {{-- @include('layouts.navigation_inbox')  --}}        
			{{-- @include('layouts.navigation_tfa')    --}}
			@include('layouts.navigation_administration')      
      {{-- @include('layouts.navigation_orders')       --}}
      {{-- @include('layouts.navigation_report') --}} 
      
      {{-- @include('layouts.navigation_registration')   --}}

      </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>