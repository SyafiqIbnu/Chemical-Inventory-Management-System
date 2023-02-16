

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'recommend_approve','required' => '1','label'=>__('general.permit_application_recommend_approve')]); ?> 
            <?php $__env->slot('field'); ?>
                <?php echo Form::select('recommend_approve',['1'=> 'Syor Lulus', '0'=>'Syor Tidak Lulus'],null,[ 'class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'recommend_approve','name'=>'recommend_approve']); ?>

<?php $__env->endSlot(); ?> <?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'file_no','required' => '1','label'=>__('permit_application.file_no')]); ?> <?php $__env->slot('field'); ?>
    <?php echo Form::text('file_no',null,['class'=>'form-control','placeholder'=>__('permit_application.file_no')]); ?>

<?php $__env->endSlot(); ?> <?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column_three_fields',['for' => 'approved_start_date','required' => '1','label'=>__('general.permit_application_approve_duration')]); ?> 
            <?php $__env->slot('field1'); ?><?php echo Form::date('approved_start_date',null,[ 'class'=>'form-control','required','placeholder'=>__('general.please_select')]); ?><?php $__env->endSlot(); ?> 
            <?php $__env->slot('field2'); ?> hingga <?php $__env->endSlot(); ?> 
            <?php $__env->slot('field3'); ?><?php echo Form::date('approved_end_date',null,[ 'class'=>'form-control','required','placeholder'=>__('general.please_select')]); ?><?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>



<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'reviewed_date','required' => '1','label'=>__('permit_application.reviewed_at')]); ?> <?php $__env->slot('field'); ?>
    <?php echo Form::text('reviewed_date',$datenow,['class'=>'form-control','readonly'=>true ,'placeholder'=>__('permit_application.reviewed_at')]); ?>

<?php $__env->endSlot(); ?> <?php echo $__env->renderComponent(); ?>
<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'review_remarks','required' => '1','label'=>__('general.notes')]); ?> <?php $__env->slot('field'); ?>
    <?php echo Form::textarea('review_remarks',null,['class'=>'form-control','required','placeholder'=>__('general.notes')]); ?>

<?php $__env->endSlot(); ?> <?php echo $__env->renderComponent(); ?><?php /**PATH C:\wamp64\www\permitkhas\resources\views/permit_application_reviewer/status_semakan.blade.php ENDPATH**/ ?>