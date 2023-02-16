
<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'name','required' => '1','label'=>__('permit_application.name')]); ?> <?php $__env->slot('field'); ?>
<?php if($modelPermitApplication->accountHolder->isPbt==1): ?>
    <?php echo Form::text('name',$modelPermitApplication->pbt_no,['class'=>'form-control','readonly'=>true ]); ?>

<?php else: ?>
    <?php echo Form::text('name',$modelPermitApplication->registration_no,['class'=>'form-control','readonly'=>true ]); ?>

<?php endif; ?>
<?php $__env->endSlot(); ?> <?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'reviewer_name','required' => '1','label'=>__('general.officer_name')]); ?> 
            <?php $__env->slot('field'); ?>
            <?php echo Form::text('reviewer_name',Auth::user()->name,['class'=>'form-control','readonly'=>true ]); ?>

<?php $__env->endSlot(); ?> <?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'file_no','required' => '1','label'=>__('permit_application.file_no')]); ?> <?php $__env->slot('field'); ?>
    <?php echo Form::text('file_no',null,['class'=>'form-control','readonly'=>true,'placeholder'=>__('permit_application.file_no')]); ?>

<?php $__env->endSlot(); ?> <?php echo $__env->renderComponent(); ?>


<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'recommend_approve','required' => '1','label'=>__('general.permit_application_recommend_approve')]); ?> 
            <?php $__env->slot('field'); ?>
            <?php if($modelPermitApplication->recommend_approve==1): ?>
                <?php echo Form::text('recommend_approve','Syor Lulus',[ 'class'=>'form-control','readonly'=>true]); ?>

            <?php else: ?>
                <?php echo Form::text('recommend_approve','Tidak Syor Lulus',[ 'class'=>'form-control','readonly'=>true]); ?>

            <?php endif; ?>
<?php $__env->endSlot(); ?> <?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column_three_fields',['for' => 'approved_start_date','required' => '1','label'=>__('general.permit_application_approve_duration')]); ?> 
            <?php $__env->slot('field1'); ?><?php echo Form::date('approved_start_date',null,[ 'class'=>'form-control','readonly'=>true,'required','placeholder'=>__('general.please_select')]); ?><?php $__env->endSlot(); ?> 
            <?php $__env->slot('field2'); ?> hingga <?php $__env->endSlot(); ?> 
            <?php $__env->slot('field3'); ?><?php echo Form::date('approved_end_date',null,[ 'class'=>'form-control','readonly'=>true,'required','placeholder'=>__('general.please_select')]); ?><?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'purchases','required' => '1','label'=>__('permit_application_purchase.recommended_quantity')]); ?> 
            <?php $__env->slot('field'); ?>
                <?php echo $__env->make('permit_application_approver.maklumat_belian_review', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'reviewed_date','required' => '1','label'=>__('permit_application.reviewed_at')]); ?> <?php $__env->slot('field'); ?>
    <?php echo Form::text('reviewed_date',$datenow,['class'=>'form-control','readonly'=>true ,'placeholder'=>__('permit_application.reviewed_at')]); ?>

<?php $__env->endSlot(); ?> <?php echo $__env->renderComponent(); ?>
<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'review_remarks','required' => '1','label'=>__('general.notes')]); ?> <?php $__env->slot('field'); ?>
    <?php echo Form::textarea('review_remarks',null,['class'=>'form-control','readonly'=>true,'required','placeholder'=>__('general.notes')]); ?>

<?php $__env->endSlot(); ?> <?php echo $__env->renderComponent(); ?><?php /**PATH C:\wamp64\www\permitkhas\resources\views/permit_application_approver/status_semakan.blade.php ENDPATH**/ ?>