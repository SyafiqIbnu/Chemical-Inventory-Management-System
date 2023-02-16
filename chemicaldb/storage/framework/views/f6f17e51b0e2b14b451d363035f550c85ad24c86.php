<!-- jQuery -->
<script src="<?php echo e(url('plugins/jquery/jquery.min.js')); ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo e(url('plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
  <!-- DataTables -->
<link rel="stylesheet" href="<?php echo e(url('plugins/datatables/jquery.datatables.min.js')); ?>">
<link rel="stylesheet" href="<?php echo e(url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')); ?>"> 
<link rel="stylesheet" href="<?php echo e(url('plugins/datatables-responsive/js/dataTables.responsive.min.js')); ?>"> 
<link rel="stylesheet" href="<?php echo e(url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')); ?>"> 

<!-- AdminLTE App -->
<script src="<?php echo e(url('dist/js/adminlte.min.js')); ?>"></script>






<script type="text/javascript" src="<?php echo e(url('plugins/viewerjs/viewer.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('plugins/select2/js/select2.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('plugins/moment/moment.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')); ?>"></script>


<script src="<?php echo e(url('js/app-general.js')); ?>"></script>
<script src="<?php echo e(url('js/appmenu.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('js/datatables.min.js')); ?>"></script>

<script>
	
    <?php echo $__env->yieldPushContent('scriptsTop'); ?>
    
    $(document).ready(function () {
        
		<?php echo $__env->yieldPushContent('scriptsDocumentReadyTop'); ?>
        <?php echo $__env->yieldPushContent('scriptsDocumentReady'); ?>
        <?php echo $__env->yieldPushContent('scriptsDocumentReadyBottom'); ?>
		
	});
</script>

<?php /**PATH C:\wamp64\www\bizmillaagent\resources\views/layouts/scripts.blade.php ENDPATH**/ ?>