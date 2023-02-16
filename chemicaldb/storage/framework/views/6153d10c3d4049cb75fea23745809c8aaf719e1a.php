<?php echo Form::hidden('account_holder_id', $account_holder_id); ?>


<?php echo $__env->make('permit_application.create_form_applicant_info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('permit_application.create_form_permit_info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php /**PATH C:\wamp64\www\permitkhas\resources\views/permit_application/create_form.blade.php ENDPATH**/ ?>