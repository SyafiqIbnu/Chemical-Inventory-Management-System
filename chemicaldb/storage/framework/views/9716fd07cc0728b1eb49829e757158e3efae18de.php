<?php
	$bCollapsible=false;
	if(isset($collapsible)){
		$bCollapsible=filter_var($collapsible, FILTER_VALIDATE_BOOLEAN);
	}else{
		$collapsible=false;
	}

	if(!isset($cardColor)){
		//$cardColor="card-primary";
		$cardColor="";
	}

	if(!isset($borderColor)){
		$borderColor="";
	}

	$bShowMessage=true;
	if(isset($showMessage)){
		$bShowMessage=filter_var($showMessage, FILTER_VALIDATE_BOOLEAN);
	}

?>

<?php if($bShowMessage): ?>
	<?php echo $__env->make('layouts.components.session_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<div class="col-md-12"  >
	<div class="card <?php echo $cardColor; ?> <?php echo $borderColor; ?>  "  >

		<div class="card-header <?php echo $borderColor; ?>">
			<h3 class="card-title"><?php echo e($cardTitle); ?></h3>
			
			<?php if($bCollapsible): ?>
			<div class="card-tools">
				<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
				</button>
			</div>
			<?php endif; ?>

		</div>	
	
		<div class="card-body <?php echo $borderColor; ?>">
			<?php echo $cardBody; ?>

		</div>

		<div class="card-footer <?php echo $borderColor; ?>">
			<?php echo $cardFooter; ?>

		</div>		

	</div>	

</div><?php /**PATH C:\wamp64\www\permitkhas\resources\views/layouts/components/crud_card.blade.php ENDPATH**/ ?>