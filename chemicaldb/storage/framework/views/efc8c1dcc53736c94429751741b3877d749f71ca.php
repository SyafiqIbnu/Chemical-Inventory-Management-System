<?php $__currentLoopData = $announcements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $announcement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="card card-widget">
  <div class="card-header" style="background-color: #DFDFDF">
	<div class="user-block">
      <img class="img-circle" src="<?php echo e(url('img/announcement.png')); ?>">
      <span class="username"><?php echo e($announcement->title); ?></span>
	  <span class="description"><?php echo e(\Carbon\Carbon::parse($announcement->updated_at)->isoFormat('Do MMMM YYYY, h:mm:ss a')); ?></span>
	</div>
	<!-- /.user-block -->
  </div>

  <!-- /.card-header -->
  <div class="card-body">
  <!-- post text -->
  <?php
        $anc_content=str_ireplace("\n","<br>",$announcement->content);
        $anc_content=str_ireplace("\r\n","<br>",$anc_content);
  ?>
	<?php echo $anc_content; ?>

    </div>           
  <!-- /.card-body -->
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\wamp64\www\bizmillaagent\resources\views/home/index_announcement.blade.php ENDPATH**/ ?>