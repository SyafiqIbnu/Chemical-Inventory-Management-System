<?php $__env->startPush('scriptsDocumentReady'); ?>
	<?php
		$name = Route::currentRouteName();
		$menuActives=[];
		if($name=="permit_application.index"){
			$menuActives[]="menu-account_holder-permit_application";	
		}elseif($name=="permit_application.cancelled"){
			$menuActives[]="menu-account_holder-permit_cancelled";	
		}else{
			
		}

		if(isset($modelPermitApplication)){
			if($modelPermitApplication->permit_application_status_id==\App\Enums\PermitApplicationStatusEnums::getStatusDraft()){
				$menuActives[]="menu-account_holder-permit_application";
			}elseif($modelPermitApplication->permit_application_status_id==\App\Enums\PermitApplicationStatusEnums::getStatusOnReview()){
				$menuActives[]="menu-reviewer-permit_application_review";
			}elseif($modelPermitApplication->permit_application_status_id==\App\Enums\PermitApplicationStatusEnums::getStatusOnApproval()){
				$menuActives[]="menu-approver-permit_application_approval";
				
			}elseif($modelPermitApplication->permit_application_status_id==\App\Enums\PermitApplicationStatusEnums::getStatusApproved()){
			}elseif($modelPermitApplication->permit_application_status_id==\App\Enums\PermitApplicationStatusEnums::getStatusCancelled()){
				$menuActives[]="menu-account_holder-permit_cancelled";
			}
		}

		if($menuActives==""){
			$menuActives[]="menu-account_holder-permit_application";
		}		

	?>
	
	<?php $__currentLoopData = $menuActives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menuActive): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    	setMenuActive('<?php echo e($menuActive); ?>');
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	

<?php $__env->stopPush(); ?><?php /**PATH C:\wamp64\www\permitkhas\resources\views/permit_application/menu_active.blade.php ENDPATH**/ ?>