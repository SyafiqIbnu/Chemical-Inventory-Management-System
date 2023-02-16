<?php echo Form::hidden('permit_application_id',$permit_application_id); ?>


<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'jenis','required' => '1','label'=>__('permit_application_purchase.controlled_goods_type_id')]); ?> 
<?php $__env->slot('field'); ?>
    <?php echo Form::text('jenis',$modelPermitApplicationPurchase->usageControlledGoodsType->name,[ 'class'=>'form-control','readonly'=>true,'required','placeholder'=>__('general.please_select')]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>



<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'type','required' => '1','label'=>__('permit_application_purchase.purchase_type_id')]); ?> 
<?php $__env->slot('field'); ?>
    <?php echo Form::text('type',$modelPermitApplicationPurchase->usagePurchaseType->name,[ 'class'=>'form-control','required','readonly'=>true,'placeholder'=>__('general.please_select')]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>



<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'Kuantiti','required' => '1','label'=>__('permit_application_purchase.quantity')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('Kuantiti',$modelPermitApplicationPurchase->quantity,['onkeypress'=>'return isInteger(event)', 'class'=>'form-control','required','readonly'=>true,'placeholder'=>__('permit_application_purchase.quantity_placeholder')]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'recommended_quantity','required' => '1','label'=>__('permit_application_purchase.recommended_quantity')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('recommended_quantity',null,['onkeypress'=>'return isInteger(event)', 'class'=>'form-control','required','placeholder'=>__('permit_application_purchase.recommended_quantity')]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'active','required' => '1','label'=>__('permit_application_usage.active')]); ?> 
<?php $__env->slot('field'); ?>
    <?php echo Form::select('active',['1'=>__('general.active'),'2'=>__('general.inactive')],null,['class'=>'form-control select2','required','readonly'=>true,'placeholder'=>__('general.please_select'),'name'=>'active']); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php /**PATH C:\wamp64\www\permitkhas\resources\views/permit_application_purchase/create_form_reviewer.blade.php ENDPATH**/ ?>