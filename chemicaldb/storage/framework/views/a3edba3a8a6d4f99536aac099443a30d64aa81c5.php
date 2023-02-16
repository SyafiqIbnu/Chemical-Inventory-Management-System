

<?php $__env->startPush('scriptsDocumentReady'); ?>
	<?php
		$name = Route::currentRouteName();
		$menuActives=[];
		if($name=="order.index"){
			$menuActives[]="menu-order-all";	
		}elseif($name=="order.reviewer"){
			$menuActives[]="menu-order-review";	
		}elseif($name=="order.approver"){
			$menuActives[]="menu-order-approve";	
		}elseif($name=="order.receiver"){
			$menuActives[]="menu-order-receive";	
		}
		
		if($menuActives==""){
			$menuActives[]="menu-order-all";
		}		

	?>
	
	<?php $__currentLoopData = $menuActives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menuActive): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    	setMenuActive('<?php echo e($menuActive); ?>');
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	

<?php $__env->stopPush(); ?><?php /**PATH C:\wamp64\www\bizmillaagent\resources\views/order/menu_active.blade.php ENDPATH**/ ?>