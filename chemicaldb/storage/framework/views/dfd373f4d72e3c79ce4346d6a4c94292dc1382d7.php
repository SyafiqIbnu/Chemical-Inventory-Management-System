<?php echo Form::hidden('permit_application_id',$permit_application_id); ?>


<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'controlled_goods_type_id','required' => '1','label'=>__('permit_application_usage.controlled_goods_type_id')]); ?> 
<?php $__env->slot('field'); ?>
    <?php echo Form::select('controlled_goods_type_id',$controlled_goods_type_id_list,null,[ 'class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'controlled_goods_type_id','name'=>'controlled_goods_type_id']); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'equipment_id','required' => '1','label'=>__('permit_application_usage.equipment_id')]); ?> 
<?php $__env->slot('field'); ?>
    <?php echo Form::select('equipment_id',$equipment_id_list,null,[ 'class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'equipment_id','name'=>'equipment_id']); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'horse_power','required' => '1','label'=>__('permit_application_usage.horse_power')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('horse_power',null,['onkeypress'=>'return isInteger(event)', 'class'=>'form-control','required','placeholder'=>__('permit_application_usage.horse_power_placeholder')]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'daily_usage','required' => '1','label'=>__('permit_application_usage.daily_usage')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('daily_usage',null,['onkeypress'=>'return isInteger(event)', 'class'=>'form-control','required','placeholder'=>__('permit_application_usage.daily_usage_placeholder')]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'quantity','required' => '1','label'=>__('permit_application_usage.quantity')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('quantity',null,['onkeypress'=>'return isInteger(event)', 'class'=>'form-control','required','placeholder'=>__('permit_application_usage.quantity_placeholder')]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<!--
<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'active','required' => '1','label'=>__('permit_application_usage.active')]); ?> 
<?php $__env->slot('field'); ?>
    <?php echo Form::select('active',['1'=>__('general.active'),'2'=>__('general.inactive')],null,['class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'active','name'=>'active']); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>
-->


<?php echo Form::hidden('path',null); ?>


<?php echo Form::hidden('original_name',null); ?>


<?php echo Form::hidden('fileuploaded',null); ?>


<?php /**PATH C:\wamp64\www\permitkhas\resources\views/permit_application_usage/create_form.blade.php ENDPATH**/ ?>