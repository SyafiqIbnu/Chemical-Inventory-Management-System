
<?php $__env->startComponent('layouts.components.crud_card'); ?>
<?php $__env->slot('cardTitle'); ?> <?php echo e(__('general.applicant_info')); ?> <?php $__env->endSlot(); ?>
        <?php $__env->slot('cardColor'); ?> card-info <?php $__env->endSlot(); ?>
        <?php $__env->slot('collapsible'); ?> true <?php $__env->endSlot(); ?>
        <?php $__env->slot('borderColor'); ?> border-primary <?php $__env->endSlot(); ?>
		
		<?php $__env->slot('cardBody'); ?>
            <?php echo $__env->make('permit_search.maklumat_pemohon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
            <?php echo $__env->make('permit_search.maklumat_permit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
            <?php echo $__env->make('permit_search.maklumat_aktiviti', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
            <?php echo $__env->make('permit_search.maklumat_dokumen', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
            <?php echo $__env->make('permit_search.maklumat_stesen', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<?php $__env->endSlot(); ?>

		<?php $__env->slot('cardFooter'); ?>
		<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>


<?php /**PATH C:\wamp64\www\permitkhas\resources\views/permit_search/show_form.blade.php ENDPATH**/ ?>