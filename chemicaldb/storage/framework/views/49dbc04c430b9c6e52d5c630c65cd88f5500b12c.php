
<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'user_type_id','required' => '1','label'=>__('user.user_type_id')]); ?> 
<?php $__env->slot('field'); ?>
    <?php echo Form::select('user_type_id',$user_type_list,null,[ 'class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'user_type_id','name'=>'user_type_id']); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>


<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'branch_id','required' => '0','label'=>__('staff.branch_id'),'id'=>'branch_id_div']); ?> 
<?php $__env->slot('field'); ?>
    <?php echo Form::select('branch_id',$branch_id_list,null,[ 'class'=>'form-control select2','placeholder'=>__('general.please_select'),'id'=>'branch_id','name'=>'branch_id']); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>



<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'oilco_id','required' => '0','label'=>__('user.oilco_id'),'id'=>'oilco_id_div']); ?> 
<?php $__env->slot('field'); ?>
    <?php echo Form::select('oilco_id',$oilco_list,null,[ 'class'=>'form-control select2','placeholder'=>__('general.please_select'),'id'=>'oilco_id','name'=>'oilco_id']); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>


<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'agency_id','required' => '0','label'=>__('user.agency_id'),'id'=>'agency_id_div']); ?> 
<?php $__env->slot('field'); ?>
    <?php echo Form::select('agency_id',$agency_list,null,[ 'class'=>'form-control select2','placeholder'=>__('general.please_select'),'id'=>'agency_id','name'=>'agency_id']); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?><?php /**PATH C:\wamp64\www\permitkhas\resources\views/user/create_form_user_types_selection.blade.php ENDPATH**/ ?>