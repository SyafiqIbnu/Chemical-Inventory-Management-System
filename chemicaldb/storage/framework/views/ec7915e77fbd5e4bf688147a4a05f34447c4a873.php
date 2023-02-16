@#component('layouts.components.edit_modal_one_column',['for' => '<?php echo e($col->COLUMN_NAME); ?>','required' => '1','label'=>__('<?php echo e($name); ?>.<?php echo $col->COLUMN_NAME; ?>')]) 
<?php
	if($col->CHARACTER_MAXIMUM_LENGTH==null){
		$field_maxlength='';
	}else{
		$field_maxlength=",'maxlength'=>".$col->CHARACTER_MAXIMUM_LENGTH;
		//$field_maxlength='';
	}
?>
@#slot('field')
	/{#!! Form::text('<?php echo e($col->COLUMN_NAME); ?>',null,['class'=>'form-control','required','placeholder'=>__('<?php echo e($name); ?>.<?php echo e($col->COLUMN_NAME); ?>_placeholder')<?php echo $field_maxlength; ?>])  !!/}
@#endslot 
@#endcomponent

<?php /**PATH C:\wamp64\www\permitkhas\resources\views/generator/ui_TextField.blade.php ENDPATH**/ ?>