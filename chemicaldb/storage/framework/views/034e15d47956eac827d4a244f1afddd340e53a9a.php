
<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'user_type_id','required' => '1','label'=>__('user.user_type_id')]); ?> 
<?php $__env->slot('field'); ?>
    <?php echo Form::select('user_type_id',$user_type_list,null,[ 'class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'user_type_id','name'=>'user_type_id']); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'location_id','required' => '0','label'=>__('user.location_id'),'id'=>'location_id_div']); ?> 
<?php $__env->slot('field'); ?>
    <?php echo Form::select('location_id',$location_list,null,[ 'class'=>'form-control select2','placeholder'=>__('general.please_select'),'id'=>'location_id','name'=>'location_id']); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'kitchen_id','required' => '0','label'=>__('user.kitchen_id'),'id'=>'kitchen_id_div']); ?> 
<?php $__env->slot('field'); ?>
    <?php echo Form::select('kitchen_id',$kitchen_list,null,[ 'class'=>'form-control select2','placeholder'=>__('general.please_select'),'id'=>'kitchen_id','name'=>'kitchen_id']); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>


<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'upline_id','required' => '1','label'=>__('user.upline_name')]); ?> 
<?php $__env->slot('field'); ?>
    <?php echo Form::select('upline_id',$upline_list,null,[ 'class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'upline_id','name'=>'upline_id']); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\wamp64\www\bizmillaagent\resources\views/user/create_form_user_types_selection.blade.php ENDPATH**/ ?>