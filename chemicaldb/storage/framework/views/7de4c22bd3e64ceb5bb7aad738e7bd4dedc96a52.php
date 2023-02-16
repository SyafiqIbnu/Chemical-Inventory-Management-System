<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'name','required' => '1','label'=>__('location.name')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('name',null,['class'=>'form-control','required','placeholder'=>__('location.name_placeholder'),'maxlength'=>254]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'kitchen_id','required' => '1','label'=>__('location.kitchen_id')]); ?> 
<?php $__env->slot('field'); ?>
    <?php echo Form::select('kitchen_id',$kitchen_id_list,null,[ 'class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'kitchen_id','name'=>'kitchen_id']); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>



<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'state_id','required' => '1','label'=>__('location.state_id')]); ?> 
<?php $__env->slot('field'); ?>
    <?php echo Form::select('state_id',$state_id_list,null,[ 'class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'state_id','name'=>'state_id']); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>



<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'active','required' => '1','label'=>__('location.active')]); ?> 
<?php $__env->slot('field'); ?>
    <?php echo Form::select('active',['1'=>__('general.yes'),'2'=>__('general.no')],null,['class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'active','name'=>'active']); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>



<?php /**PATH C:\wamp64\www\bizmillaagent\resources\views/location/create_form.blade.php ENDPATH**/ ?>