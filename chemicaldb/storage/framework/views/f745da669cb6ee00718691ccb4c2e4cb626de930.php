<?php
    if(!isset($canEdit)){
        $canEdit=false;
    }

	if(!isset($cardColor)){
		$cardColor="card-primary";
	}

    $basicInfoActive="";
    $usageInfoActive="";
    $purchaseInfoActive="";
    $documentInfoActive="";
    $activitiesInfoActive="";
    $reportSubmitInfoActive="";
    
    if($selectedTab=='basicinfo'){
        $basicInfoActive='active';
    }else if($selectedTab=='usage'){
        $usageInfoActive='active';
    }else if($selectedTab=='purchase'){
        $purchaseInfoActive="active";
    }else if($selectedTab=='document'){
        $documentInfoActive="active";
    }else if($selectedTab=='activities'){
        $activitiesInfoActive="active";
    }else if($selectedTab=='reportsubmit'){
        $reportSubmitInfoActive="active";
    }

    $basicInfoVisible="view";
    $usageInfoVisible="view";
    $purchaseInfoVisible="view";
    $documentInfoVisible="view";
    $activitiesInfoVisible="view";
    $reportSubmitInfoVisible="view";
    
    $basicInfoViewURL=url('permit_application'.'/'.$permit_application_id);
    $basicInfoEditURL=url('permit_application'.'/'.$permit_application_id."/edit");

    $activitiesInfoViewURL=url('permit_application_activity'.'/'.$permit_application_id);
    $activitiesInfoEditURL=url('permit_application_activity'.'/'.$permit_application_id."/edit");

    if($canEdit){
        $basicInfoVisible="edit";
        $activitiesInfoVisible="edit";
    }

?>    



<div class="col-md-12">
    <div class="card card-primary card-outline card-outline-tabs">
        <div class="card-header p-0 border-bottom-0">
        <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">

            <?php if($basicInfoVisible !="none"): ?>
                <li class="nav-item">
                <a class="nav-link <?php echo e($basicInfoActive); ?>" id="custom-tabs-three-basicinfo" data-toggle="pill" href="#" 
                <?php if($basicInfoVisible =="view"): ?>
                    onclick="location.href='<?php echo $basicInfoViewURL; ?>'" 
                <?php elseif($basicInfoVisible =="edit"): ?>
                    onclick="location.href='<?php echo $basicInfoEditURL; ?>'" 
                <?php endif; ?>
                role="tab" aria-controls="custom-tabs-three-basicinfo" >Maklumat Am</a>
                </li>
            <?php endif; ?>

            <?php if($usageInfoVisible !="none"): ?>
                <li class="nav-item">
                <a class="nav-link <?php echo e($usageInfoActive); ?>" id="custom-tabs-three-usage" data-toggle="pill" href="#" onclick="location.href='<?php echo e(url('permit_application_usage')); ?>/<?php echo e($permit_application_id); ?>/index';" role="tab" aria-controls="custom-tabs-three-usage"><?php echo e(__('general.permit_application_usage')); ?></a>
                </li>
            <?php endif; ?>

            <?php if($purchaseInfoVisible !="none"): ?>
                <li class="nav-item">
                <a class="nav-link <?php echo e($purchaseInfoActive); ?>" id="custom-tabs-three-purchase" data-toggle="pill" href="#" onclick="location.href='<?php echo e(url('permit_application_purchase')); ?>/<?php echo e($permit_application_id); ?>/index';" role="tab" aria-controls="custom-tabs-three-purchase"><?php echo e(__('general.permit_application_purchase')); ?></a>
                </li>
            <?php endif; ?>

            <?php if($documentInfoVisible !="none"): ?>
                <li class="nav-item">
                <a class="nav-link <?php echo e($documentInfoActive); ?>" id="custom-tabs-three-document" data-toggle="pill" href="#" onclick="location.href='<?php echo e(url('permit_application_document')); ?>/<?php echo e($permit_application_id); ?>/index';" role="tab" aria-controls="custom-tabs-three-document"><?php echo e(__('general.permit_application_document')); ?></a>
                </li>
            <?php endif; ?>

            <?php if($activitiesInfoVisible !="none"): ?>
                <li class="nav-item">
                <a class="nav-link <?php echo e($activitiesInfoActive); ?>" id="custom-tabs-three-activities" data-toggle="pill" 
                <?php if($activitiesInfoVisible =="view"): ?>
                        onclick="location.href='<?php echo $activitiesInfoViewURL; ?>'" 
                <?php elseif($activitiesInfoVisible =="edit"): ?>
                    onclick="location.href='<?php echo $activitiesInfoEditURL; ?>'" 
                <?php endif; ?>
                href="#" onclick="location.href='<?php echo e(url('permit_application_activity')); ?>/<?php echo e($permit_application_id); ?>';" 
                role="tab" aria-controls="custom-tabs-three-activities"><?php echo e(__('general.permit_application_activity_approval')); ?></a>
                </li>
            <?php endif; ?>

            <li class="nav-item">
                <a class="nav-link <?php echo e($reportSubmitInfoActive); ?>" id="custom-tabs-three-reportsubmit" data-toggle="pill" href="#" onclick="location.href='<?php echo e(url('permit_application')); ?>/<?php echo e($permit_application_id); ?>/reportsubmit';" role="tab" aria-controls="custom-tabs-three-reportsubmit"><?php echo e(__('general.permit_application_submit')); ?></a>
            </li>
        </ul>
        </div>

        <div class="card-body">
        <div class="tab-content" id="custom-tabs-three-tabContent">
            <div class="tab-pane fade active show" id="custom-tabs-three-" role="tabpanel" aria-labelledby="custom-tabs-three-">
            <?php echo e($content); ?>

            </div>
        </div>
        </div>
        <!-- /.card -->
    </div>
</div>

<?php /**PATH C:\wamp64\www\permitkhas\resources\views/shared/permit_application_tabs.blade.php ENDPATH**/ ?>