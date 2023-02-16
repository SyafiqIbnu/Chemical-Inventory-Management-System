<?php echo Form::hidden('permit_application_id',$permit_application_id); ?>


<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'controlled_goods_type_id','required' => '1','label'=>__('permit_application_purchase.controlled_goods_type_id')]); ?> 
<?php $__env->slot('field'); ?>
    <?php echo Form::select('controlled_goods_type_id',$controlled_goods_type_id_list,null,[ 'class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'controlled_goods_type_id','name'=>'controlled_goods_type_id']); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>



<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'purchase_type_id','required' => '1','label'=>__('permit_application_purchase.purchase_type_id')]); ?> 
<?php $__env->slot('field'); ?>
    <?php echo Form::select('purchase_type_id',$purchase_type_id_list,null,[ 'class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'purchase_type_id','name'=>'purchase_type_id']); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>



<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'quantity','required' => '1','label'=>__('permit_application_purchase.quantity')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('quantity',null,['onkeypress'=>'return isInteger(event)', 'class'=>'form-control','required','placeholder'=>__('permit_application_purchase.quantity_placeholder')]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<!--
<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'active','required' => '1','label'=>__('permit_application_usage.active')]); ?> 
<?php $__env->slot('field'); ?>
    <?php echo Form::select('active',['1'=>__('general.active'),'2'=>__('general.inactive')],null,['class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'active','name'=>'active']); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>
-->

<?php /**PATH C:\wamp64\www\permitkhas\resources\views/permit_application_purchase/create_form.blade.php ENDPATH**/ ?>