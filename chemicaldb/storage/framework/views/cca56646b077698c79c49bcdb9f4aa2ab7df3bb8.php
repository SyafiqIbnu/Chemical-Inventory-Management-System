
<?php $__env->startComponent('layouts.components.crud_card'); ?>
<?php $__env->slot('cardTitle'); ?> <?php echo e(__('general.applicant_info')); ?> <?php $__env->endSlot(); ?>
        <?php $__env->slot('cardColor'); ?> card-info <?php $__env->endSlot(); ?>
        <?php $__env->slot('collapsible'); ?> true <?php $__env->endSlot(); ?>
        <?php $__env->slot('borderColor'); ?> border-primary <?php $__env->endSlot(); ?>
		
		<?php $__env->slot('cardBody'); ?>
			<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'type','required' => '0','label'=>__('permit_application.permit_application_type')]); ?> 
            <?php $__env->slot('field'); ?>
                <?php echo Form::text('type',$modelPermitApplication->permitApplicationType->name,[ 'class'=>'form-control select2','readonly'=>true]); ?>

            <?php $__env->endSlot(); ?> <?php echo $__env->renderComponent(); ?>
            <?php echo $__env->make('permit_application_reviewer.maklumat_pemohon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<?php $__env->endSlot(); ?>

		<?php $__env->slot('cardFooter'); ?>
		<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<?php $__env->startComponent('layouts.components.crud_card'); ?>
<?php $__env->slot('cardTitle'); ?> <?php echo e(__('general.permit_info')); ?> <?php $__env->endSlot(); ?>
        <?php $__env->slot('cardColor'); ?> card-info <?php $__env->endSlot(); ?>
        <?php $__env->slot('collapsible'); ?> true <?php $__env->endSlot(); ?>
        <?php $__env->slot('borderColor'); ?> border-primary <?php $__env->endSlot(); ?>
		
		<?php $__env->slot('cardBody'); ?>
            <?php echo $__env->make('permit_application_reviewer.maklumat_permit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<?php $__env->endSlot(); ?>

		<?php $__env->slot('cardFooter'); ?>
		<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<?php $__env->startComponent('layouts.components.crud_card'); ?>
<?php $__env->slot('cardTitle'); ?> <?php echo e(__('general.permit_activity_place')); ?> <?php $__env->endSlot(); ?>
        <?php $__env->slot('cardColor'); ?> card-info <?php $__env->endSlot(); ?>
        <?php $__env->slot('collapsible'); ?> true <?php $__env->endSlot(); ?>
        <?php $__env->slot('borderColor'); ?> border-primary <?php $__env->endSlot(); ?>
		
		<?php $__env->slot('cardBody'); ?>
            <?php echo $__env->make('permit_application_reviewer.maklumat_aktiviti', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<?php $__env->endSlot(); ?>

		<?php $__env->slot('cardFooter'); ?>
		<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.crud_card'); ?>
<?php $__env->slot('cardTitle'); ?> <?php echo e(__('general.permit_application_document')); ?> <?php $__env->endSlot(); ?>
        <?php $__env->slot('cardColor'); ?> card-info <?php $__env->endSlot(); ?>
        <?php $__env->slot('collapsible'); ?> true <?php $__env->endSlot(); ?>
        <?php $__env->slot('borderColor'); ?> border-primary <?php $__env->endSlot(); ?>
		
		<?php $__env->slot('cardBody'); ?>
            <?php echo $__env->make('permit_application_reviewer.maklumat_dokumen', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<?php $__env->endSlot(); ?>

		<?php $__env->slot('cardFooter'); ?>
		<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<?php $__env->startComponent('layouts.components.crud_card'); ?>
<?php $__env->slot('cardTitle'); ?> <?php echo e(__('general.permit_fuelstation')); ?> <?php $__env->endSlot(); ?>
        <?php $__env->slot('cardColor'); ?> card-info <?php $__env->endSlot(); ?>
        <?php $__env->slot('collapsible'); ?> true <?php $__env->endSlot(); ?>
        <?php $__env->slot('borderColor'); ?> border-primary <?php $__env->endSlot(); ?>
		
		<?php $__env->slot('cardBody'); ?>
            <?php echo $__env->make('permit_application_reviewer.maklumat_stesen', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<?php $__env->endSlot(); ?>

		<?php $__env->slot('cardFooter'); ?>
		<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<?php $__env->startComponent('layouts.components.crud_card'); ?>
<?php $__env->slot('cardTitle'); ?> <?php echo e(__('general.confirmation_details')); ?> <?php $__env->endSlot(); ?>
        <?php $__env->slot('cardColor'); ?> card-info <?php $__env->endSlot(); ?>
        <?php $__env->slot('collapsible'); ?> true <?php $__env->endSlot(); ?>
        <?php $__env->slot('borderColor'); ?> border-primary <?php $__env->endSlot(); ?>
		
		<?php $__env->slot('cardBody'); ?>
            <?php echo $__env->make('permit_application_reviewer.maklumat_pengesahan', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<?php $__env->endSlot(); ?>

		<?php $__env->slot('cardFooter'); ?>
		<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.crud_card'); ?>
<?php $__env->slot('cardTitle'); ?> <?php echo e(__('general.permit_application_reviewform')); ?> <?php $__env->endSlot(); ?>
        <?php $__env->slot('cardColor'); ?> card-info <?php $__env->endSlot(); ?>
        <?php $__env->slot('collapsible'); ?> true <?php $__env->endSlot(); ?>
        <?php $__env->slot('borderColor'); ?> border-primary <?php $__env->endSlot(); ?>
		
		<?php $__env->slot('cardBody'); ?>
		<?php echo Form::model($modelPermitApplication, ['route' => ['permit_application_review.submit', $permit_application_id],'method'=>'PUT','id'=>'permit_application_activityForm']); ?>

			<?php echo $__env->make('permit_application_approver.status_semakan', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<?php echo Form::close(); ?>

		<?php $__env->endSlot(); ?>

		<?php $__env->slot('cardFooter'); ?>
        	
					
				
		<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.crud_card'); ?>
<?php $__env->slot('cardTitle'); ?> <?php echo e(__('general.permit_application_approveform')); ?> <?php $__env->endSlot(); ?>
        <?php $__env->slot('cardColor'); ?> card-info <?php $__env->endSlot(); ?>
        <?php $__env->slot('collapsible'); ?> true <?php $__env->endSlot(); ?>
        <?php $__env->slot('borderColor'); ?> border-primary <?php $__env->endSlot(); ?>
		
		<?php $__env->slot('cardBody'); ?>
		<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'reviewer_name','required' => '1','label'=>__('general.officer_name')]); ?> 
            <?php $__env->slot('field'); ?>
            <?php echo Form::text('reviewer_name',Auth::user()->name,['class'=>'form-control','readonly'=>true ]); ?>

		<?php $__env->endSlot(); ?> <?php echo $__env->renderComponent(); ?>
		<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'purchases','required' => '1','label'=>__('permit_application_purchase.recommended_quantity')]); ?> 
            <?php $__env->slot('field'); ?>
                <?php echo $__env->make('permit_application_approver.maklumat_belian', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php $__env->endSlot(); ?> 
		<?php echo $__env->renderComponent(); ?>
		<?php echo Form::model($modelPermitApplication, ['route' => ['permit_application_approval.submit', $permit_application_id],'method'=>'PUT','id'=>'permit_application_activityForm']); ?>

			<?php echo $__env->make('permit_application_approver.status_kelulusan', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		
		<?php $__env->endSlot(); ?>

		<?php $__env->slot('cardFooter'); ?>
        	
		<a type="button" class="btn btn-danger"	onClick="location.href='<?php echo e(url('permit_application_approval')); ?>'"><i class="fa fa-close"></i> <?php echo e(__('general.cancel')); ?></a>
					
					<?php echo Form::button('<i class="fa fa-check"></i> '.__('general.review').'',['class'=>'btn btn-primary pull-right','type'=>'submit','id'=>'submitButton']); ?>

					<?php echo Form::close(); ?>

				
		<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\wamp64\www\permitkhas\resources\views/permit_application_approver/approver_form.blade.php ENDPATH**/ ?>