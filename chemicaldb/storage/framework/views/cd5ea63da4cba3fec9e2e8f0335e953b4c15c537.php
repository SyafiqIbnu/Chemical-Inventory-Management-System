<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'name','required' => '1','label'=>__('nasiarab.name')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('name',null,['class'=>'form-control','required','placeholder'=>__('nasiarab.name_placeholder'),'maxlength'=>254]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'price','required' => '1','label'=>__('nasiarab.price')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('price',null,['onkeypress'=>'return isDoubleRound(event,this,2)', 'class'=>'form-control','required','placeholder'=>__('nasiarab.price_placeholder')]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'description','required' => '1','label'=>__('nasiarab.description')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::textArea('description',null,['rows'=>'5','class'=>'form-control','required','placeholder'=>__('nasiarab.description_placeholder'),'maxlength'=>65535]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'product_category','required' => '1','label'=>__('nasiarab.product_category')]); ?> 
<?php $__env->slot('field'); ?>
    <?php echo Form::select('product_category',$product_categories,null,['class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'product_category','name'=>'product_category']); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'pax_no','required' => '1','label'=>__('nasiarab.pax_no')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('pax_no',null,['onkeypress'=>'return isDoubleRound(event,this,2)', 'class'=>'form-control','required','placeholder'=>__('nasiarab.pax_no')]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'has_condiments','required' => '1','label'=>__('product.has_condiments')]); ?> 
<?php $__env->slot('field'); ?>
    <?php echo Form::select('has_condiments',['1'=>__('general.yes'),'0'=>__('general.no')],null,['class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'has_condiments','name'=>'has_condiments']); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'food_group','required' => '1','label'=>__('product.food_group')]); ?> 
<?php $__env->slot('field'); ?>
    <?php echo Form::select('food_group',$food_group_list,null,['class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'food_group','name'=>'food_group']); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>


<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'name','required' => '1','label'=>__('Pilih Fail Imej')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::file('Pilih Fail', ['class' => 'btn btn-primary','name'=>'filepath','accept'=>'.png , .jpg , .JPEG']); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>



<?php /**PATH C:\wamp64\www\bizmillaagent\resources\views/nasiarab/create_form.blade.php ENDPATH**/ ?>