<?php
	$menuHasTreeview ="";
	$bFound=false;
	if(\App\Helpers\PermissionHelper::checkPermission($permission)){
		$bFound=true;
	}
    
	if($bFound){
		$menuHasTreeview='class="nav-item has-treeview"';
	}
?>

<?php if($bFound): ?>
<li <?php echo $menuHasTreeview; ?> >
    <a href="#" class="nav-link" id="<?php echo e($id); ?>">
        <i class="nav-icon <?php echo e($icon); ?>"></i>
        <p><?php echo e($title); ?><i class="right fas fa-angle-left"></i></p>
    </a>
    
    <ul class="nav nav-treeview">  
        <?php echo e($content); ?>

    </ul>
</li>
<?php endif; ?>
<?php /**PATH C:\wamp64\www\factohub\resources\views/layouts/components/nav_li_parent.blade.php ENDPATH**/ ?>