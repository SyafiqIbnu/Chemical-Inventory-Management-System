<?php echo e(Form::hidden('laboratory_id', $laboratoryid)); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'item_name','required' => '1','label'=>__('chemical.item_name')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('item_name',null,['class'=>'form-control','required','placeholder'=>__('chemical.item_name_placeholder'),'maxlength'=>64]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'item_hazard','required' => '1','label'=>__('chemical.item_hazard')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('item_hazard',null,['class'=>'form-control','required','placeholder'=>__('chemical.item_hazard_placeholder'),'maxlength'=>64]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'item_brand','required' => '1','label'=>__('chemical.item_brand')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('item_brand',null,['class'=>'form-control','required','placeholder'=>__('chemical.item_brand_placeholder'),'maxlength'=>64]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'item_cas','required' => '1','label'=>__('chemical.item_cas')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('item_cas',null,['class'=>'form-control','required','placeholder'=>__('chemical.item_cas_placeholder'),'maxlength'=>64]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'item_catalog','required' => '1','label'=>__('chemical.item_catalog')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('item_catalog',null,['class'=>'form-control','required','placeholder'=>__('chemical.item_catalog_placeholder'),'maxlength'=>64]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'item_location','required' => '1','label'=>__('chemical.item_location')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('item_location',null,['class'=>'form-control','required','placeholder'=>__('chemical.item_location_placeholder'),'maxlength'=>254]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'item_price','required' => '1','label'=>__('chemical.item_price')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('item_price',null,['class'=>'form-control','required','placeholder'=>__('chemical.item_price_placeholder')]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'item_quantity','required' => '1','label'=>__('chemical.item_quantity')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('item_quantity',null,['class'=>'form-control','required','placeholder'=>__('chemical.item_quantity_placeholder')]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'item_amount','required' => '1','label'=>__('chemical.item_amount')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('item_amount',null,['class'=>'form-control','required','placeholder'=>__('chemical.item_amount_placeholder')]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'item_supplier','required' => '1','label'=>__('chemical.item_supplier')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('item_supplier',null,['class'=>'form-control','required','placeholder'=>__('chemical.item_supplier_placeholder'),'maxlength'=>254]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'date_opened','required' => '1','label'=>__('chemical.date_opened')]); ?> 
<?php $__env->slot('field'); ?>
		<?php echo Form::text('date_opened',null,['class'=>'form-control datetimepicker-input date-field','data-toggle'=>'datetimepicker','id'=>'date_opened','data-target'=>'#date_opened','required','placeholder'=>__('chemical.date_opened_placeholder')]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'expiration_date','required' => '1','label'=>__('chemical.expiration_date')]); ?> 
<?php $__env->slot('field'); ?>
		<?php echo Form::text('expiration_date',null,['class'=>'form-control datetimepicker-input date-field','data-toggle'=>'datetimepicker','id'=>'expiration_date','data-target'=>'#expiration_date','required','placeholder'=>__('chemical.expiration_date_placeholder')]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>


<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'staff_id','required' => '1','label'=>__('chemical.staff_id')]); ?> 
<?php $__env->slot('field'); ?>
    <?php echo Form::select('faculty',$staff_list,null,[ 'class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'staff_id','name'=>'staff_id']); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?><?php /**PATH D:\xampp\htdocs\chemicaldb\resources\views/chemical/create_form.blade.php ENDPATH**/ ?>