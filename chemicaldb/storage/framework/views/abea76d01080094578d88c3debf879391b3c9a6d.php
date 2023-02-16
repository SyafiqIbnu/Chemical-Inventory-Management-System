<?php
	$bFound=false;	   
	if(isset($permission)){
        
        if(\App\Helpers\PermissionHelper::checkPermission($permission)){
    		$bFound=true;
    	}
	}

?>

<?php if($bFound): ?>

<li class="nav-item">
    <a href="<?php echo $url; ?>" class="nav-link" id="<?php echo e($id ?? null); ?>">
        <i class="<?php echo e($icon ?? null); ?> nav-icon"></i>
        <p><?php echo e($title ?? null); ?></p>
        <?php if(isset($counter)): ?>
            <span class="pull-right-container"><span class="<?php echo e($id ?? null); ?> label label-<?php echo e($color ?? null); ?> pull-right">
                <i class="fa fa-spinner"></i>
            </span></span>
        <?php endif; ?>
    </a>
</li>
<?php endif; ?>
<?php /**PATH D:\xampp\htdocs\chemicaldb\resources\views/layouts/components/nav_li.blade.php ENDPATH**/ ?>