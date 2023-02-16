



<?php $__env->startComponent('layouts.components.crud_card'); ?>
<?php $__env->slot('cardTitle'); ?> <?php echo e(__('general.applicant_info')); ?> <a  title='Edit' type='button' class='btn btn-xs btn-error' href="<?php echo url('permit_application/'.$permit_application_id.'/edit'); ?>"><i class='fa fa-edit'></i></a><?php $__env->endSlot(); ?>
        <?php $__env->slot('cardColor'); ?> card-info <?php $__env->endSlot(); ?>
        <?php $__env->slot('collapsible'); ?> true <?php $__env->endSlot(); ?>
        <?php $__env->slot('borderColor'); ?> border-primary <?php $__env->endSlot(); ?>
		
		<?php $__env->slot('cardBody'); ?>
			<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'type','required' => '0','label'=>__('permit_application.permit_application_type')]); ?> 
            <?php $__env->slot('field'); ?>
                <?php echo Form::text('type',$modelPermitApplication->permitApplicationType->name,[ 'class'=>'form-control select2','readonly'=>true]); ?>

            <?php $__env->endSlot(); ?> <?php echo $__env->renderComponent(); ?>
            <?php echo $__env->make('permit_application.maklumat_pemohon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
            <?php echo $__env->make('permit_application.maklumat_permit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<?php $__env->endSlot(); ?>

		<?php $__env->slot('cardFooter'); ?>
		<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<?php $__env->startComponent('layouts.components.crud_card'); ?>
<?php $__env->slot('cardTitle'); ?> <?php echo e(__('general.permit_activity_place')); ?> <a  title='Edit' type='button' class='btn btn-xs btn-error' href="<?php echo url('permit_application_activity/'.$permit_application_id.'/edit'); ?>"><i class='fa fa-edit'></i></a> <?php $__env->endSlot(); ?>
        <?php $__env->slot('cardColor'); ?> card-info <?php $__env->endSlot(); ?>
        <?php $__env->slot('collapsible'); ?> true <?php $__env->endSlot(); ?>
        <?php $__env->slot('borderColor'); ?> border-primary <?php $__env->endSlot(); ?>
		
		<?php $__env->slot('cardBody'); ?>
            <?php echo $__env->make('permit_application.maklumat_aktiviti', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<?php $__env->endSlot(); ?>

		<?php $__env->slot('cardFooter'); ?>
		<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.crud_card'); ?>
<?php $__env->slot('cardTitle'); ?> <?php echo e(__('general.permit_application_document')); ?> <a  title='Edit' type='button' class='btn btn-xs btn-error' href="<?php echo url('permit_application_document/'.$permit_application_id.'/index'); ?>"><i class='fa fa-edit'></i></a> <?php $__env->endSlot(); ?>
        <?php $__env->slot('cardColor'); ?> card-info <?php $__env->endSlot(); ?>
        <?php $__env->slot('collapsible'); ?> true <?php $__env->endSlot(); ?>
        <?php $__env->slot('borderColor'); ?> border-primary <?php $__env->endSlot(); ?>
		
		<?php $__env->slot('cardBody'); ?>
            <?php echo $__env->make('permit_application.maklumat_dokumen', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<?php $__env->endSlot(); ?>

		<?php $__env->slot('cardFooter'); ?>
		<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<?php $__env->startComponent('layouts.components.crud_card'); ?>
<?php $__env->slot('cardTitle'); ?> <?php echo e(__('general.permit_fuelstation')); ?> <a  title='Edit' type='button' class='btn btn-xs btn-error' href="<?php echo url('permit_application_activity/'.$permit_application_id.'/edit'); ?>"><i class='fa fa-edit'></i></a>  <?php $__env->endSlot(); ?>
        <?php $__env->slot('cardColor'); ?> card-info <?php $__env->endSlot(); ?>
        <?php $__env->slot('collapsible'); ?> true <?php $__env->endSlot(); ?>
        <?php $__env->slot('borderColor'); ?> border-primary <?php $__env->endSlot(); ?>
		
		<?php $__env->slot('cardBody'); ?>
            <?php echo $__env->make('permit_application.maklumat_stesen', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
            <?php echo $__env->make('permit_application.maklumat_pengesahan', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<?php $__env->endSlot(); ?>

		<?php $__env->slot('cardFooter'); ?>
		<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?><?php /**PATH C:\wamp64\www\permitkhas\resources\views/permit_application/reportsubmit_form.blade.php ENDPATH**/ ?>