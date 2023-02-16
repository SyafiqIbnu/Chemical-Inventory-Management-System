




<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'permit_application_status_id','required' => '1','label'=>__('general.reservation_status')]); ?> 
            <?php $__env->slot('field'); ?>
                <?php echo Form::select('permit_application_status_id',['4'=> 'Lulus', '5'=>'Tidak Lulus'],null,[ 'class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'permit_application_status_id','name'=>'permit_application_status_id']); ?>

<?php $__env->endSlot(); ?> <?php echo $__env->renderComponent(); ?>


<?php $__env->startComponent('layouts.components.edit_modal_one_column_three_fields',['for' => 'approved_start_date','required' => '1','label'=>__('general.permit_application_approve_duration')]); ?> 
            <?php $__env->slot('field1'); ?><?php echo Form::date('approved_start_date',null,[ 'class'=>'form-control','required','placeholder'=>__('general.please_select')]); ?><?php $__env->endSlot(); ?> 
            <?php $__env->slot('field2'); ?> hingga <?php $__env->endSlot(); ?> 
            <?php $__env->slot('field3'); ?><?php echo Form::date('approved_end_date',null,[ 'class'=>'form-control','required','placeholder'=>__('general.please_select')]); ?><?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>



<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'approved_date','required' => '1','label'=>__('permit_application.reviewed_at')]); ?> <?php $__env->slot('field'); ?>
    <?php echo Form::text('approved_date',$datenow,['class'=>'form-control','readonly'=>true ,'placeholder'=>__('permit_application.reviewed_at')]); ?>

<?php $__env->endSlot(); ?> <?php echo $__env->renderComponent(); ?>
<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'approval_remarks','required' => '1','label'=>__('general.notes')]); ?> <?php $__env->slot('field'); ?>
    <?php echo Form::textarea('approval_remarks',null,['class'=>'form-control','required','placeholder'=>__('general.notes')]); ?>

<?php $__env->endSlot(); ?> <?php echo $__env->renderComponent(); ?><?php /**PATH C:\wamp64\www\permitkhas\resources\views/permit_application_approver/status_kelulusan.blade.php ENDPATH**/ ?>