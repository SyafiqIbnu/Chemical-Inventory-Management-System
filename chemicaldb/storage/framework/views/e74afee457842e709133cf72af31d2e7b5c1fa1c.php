
    <?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'origin','required' => '1','label'=>__('booking_application.origin')]); ?> <?php $__env->slot('field'); ?>
        <?php echo Form::text('origin',$modelBookingApplication->origin,['readonly'=>true, 'class'=>'form-control','required','placeholder'=>__('booking_application.origin_placeholder'),'maxlength'=>254]); ?>

    <?php $__env->endSlot(); ?> <?php echo $__env->renderComponent(); ?>
    <?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'destination','required' => '1','label'=>__('booking_application.destination')]); ?> <?php $__env->slot('field'); ?>
        <?php echo Form::text('destination',$modelBookingApplication->destination,['readonly'=>true,'class'=>'form-control','required','placeholder'=>__('booking_application.destination_placeholder'),'maxlength'=>254]); ?>

    <?php $__env->endSlot(); ?> <?php echo $__env->renderComponent(); ?>
    <?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'distance','required' => '1','label'=>__('booking_application.distance')]); ?> <?php $__env->slot('field'); ?>
        <?php echo Form::text('distance',$modelBookingApplication->distance,['readonly'=>true,'class'=>'form-control','required','placeholder'=>__('booking_application.distance_placeholder'),'maxlength'=>254]); ?>

    <?php $__env->endSlot(); ?> <?php echo $__env->renderComponent(); ?>
    <?php /**PATH D:\xampp\htdocs\zonkargo\resources\views/booking_application/edit_form.blade.php ENDPATH**/ ?>