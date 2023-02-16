<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

  <title>CARGO OPTIMIZER SYSTEM</title>
  
  
  <!-- Font Awesome Icons 
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
-->
  <script src="https://kit.fontawesome.com/c931342d26.js" crossorigin="anonymous"></script>
  <style>
  
	.red {
		color: 	#8B0000;
	}

	@media    screen and (min-width: 800px) {
		.dataTables_filter {
			float: left !important;
		}
	}

	div.dataTables_paginate {text-align: center}  !important;


	@media    screen and (max-width: 800px) {
		.dataTables_filter {
			float: center !important;
		}
	}
  </style>

  <!-- Bootstrap Color Picker -->
   <link rel="stylesheet" href="<?php echo e(url('plugins/fontawesome-free/css/all.min.css')); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo e(url('plugins/daterangepicker/daterangepicker.css')); ?>">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo e(url('plugins/icheck-bootstrap/icheck-bootstrap.min.css')); ?>">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?php echo e(url('plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')); ?>">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo e(url('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')); ?>">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo e(url('plugins/select2/css/select2.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(url('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')); ?>">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="<?php echo e(url('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(url('dist/css/adminlte.min.css')); ?>">

  <!-- Datatables
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/af-2.3.4/b-1.6.1/b-colvis-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.css"/>
  <link rel="stylesheet" href="<?php echo e(url('css/datatable-cards.css')); ?>">
  -->
  <link rel="stylesheet" href="<?php echo e(url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>"> 
  <link rel="stylesheet" href="<?php echo e(mix('css/app.css')); ?>">

  

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div id="app">
</div>

<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">	
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li> 
    </ul>
	
		<span style="font-size:15px"><b>Welcome to CARGO OPTIMIZER SYSTEM, <?php echo e(Auth::user()->name); ?> !</b></span>
	
	<!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
		<?php echo $__env->make('layouts.profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </ul>
  </nav>
  <!-- /.navbar -->

  <?php echo $__env->make('layouts.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	<?php echo $__env->yieldPushContent('modals'); ?>
    <!-- Content Header (Page header) -->
	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $__env->yieldContent('page_title'); ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <?php echo $__env->yieldContent('breadcrumb'); ?>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
	<?php if(View::hasSection('main-content')): ?>
    <div class="content">
		<!-- Default box -->
		<div class="box">
			<div class="box-body">
				<?php echo $__env->yieldContent('main-content'); ?>
			</div>
			<!-- /.box-footer-->
		</div>
		<!-- /.box -->
    </div>
	<?php endif; ?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <example-component></example-component>
  <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<?php echo survivor(); ?>

<?php echo $__env->make('layouts.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\wamp64\www\factohub\resources\views/layouts/app_auth.blade.php ENDPATH**/ ?>