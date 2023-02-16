<?php echo Form::hidden('booking_application_id',$booking_application_id); ?>


<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'weight','required' => '1','label'=>__('booking_cargo.weight')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('weight',null,['onkeypress'=>'return isDoubleRound(event,this,2)', 'class'=>'form-control','required','placeholder'=>__('booking_cargo.weight_placeholder')]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'height','required' => '1','label'=>__('booking_cargo.height')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('height',null,['onkeypress'=>'return isDoubleRound(event,this,2)', 'class'=>'form-control','required','placeholder'=>__('booking_cargo.height_placeholder')]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<!-- pilih cubic/cylinder -->

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'cargo_type','required' => '1','label'=>__('Cargo Type')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::select('cargo_type',$cargo_type_list,null,[ 'class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'cargo_type','name'=>'cargo_type']); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<!-- cube -->

<div id='width'>
<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'width','required' => '0','label'=>__('booking_cargo.width')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('width',null,['onkeypress'=>'return isDoubleRound(event,this,2)', 'class'=>'form-control','placeholder'=>__('booking_cargo.width_placeholder'),'id'=>'width']); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>
</div>

<div id='length'>
<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'length','required' => '0','label'=>__('booking_cargo.length')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('length',null,['onkeypress'=>'return isDoubleRound(event,this,2)', 'class'=>'form-control','placeholder'=>__('booking_cargo.length_placeholder'),'id'=>'length']); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>
</div>

<!-- cylinder -->

<div id='diameter'>
<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'diameter','required' => '0','label'=>__('booking_cargo.diameter')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('diameter',null,['onkeypress'=>'return isDoubleRound(event,this,2)', 'class'=>'form-control','placeholder'=>__('booking_cargo.diameter_placeholder'),'id'=>'diameter']); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>
</div>

<div id='radius'>
<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'radius','required' => '0','label'=>__('booking_cargo.radius')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('radius',null,['onkeypress'=>'return isDoubleRound(event,this,2)', 'class'=>'form-control','placeholder'=>__('booking_cargo.radius_placeholder'),'id'=>'radius']); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>
</div>



<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'unit','required' => '1','label'=>__('booking_cargo.unit')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('unit',null,['onkeypress'=>'return isInteger(event,this)', 'class'=>'form-control','required','placeholder'=>__('booking_cargo.unit')]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startPush('scriptsDocumentReady'); ?> 

$("#cargo_type").on("change", function () {
		//alert( $("#cargo_type").val());
        var cargo_type=$("#cargo_type").val();
		var width = document.getElementById('width');
		var length = document.getElementById('length');
		var radius = document.getElementById('radius');
		var diameter = document.getElementById('diameter');

		if(cargo_type==1){
			radius.style.display = 'none';
			diameter.style.display = 'none';
			width.style.display = 'block';
			length.style.display = 'block';
		}else{
			width.style.display = 'none';
			length.style.display = 'none';
			radius.style.display = 'block';
			diameter.style.display = 'block';
		}
		        
    });

$("#diameter").on("change", function () {
	var diameter = $("#diameter").val();
	var radius = diameter/2;
	document.getElementById('radius').Value = radius;

});

<?php $__env->stopPush(); ?><?php /**PATH D:\xampp\htdocs\zonkargo\resources\views/booking_cargo/create_form.blade.php ENDPATH**/ ?>