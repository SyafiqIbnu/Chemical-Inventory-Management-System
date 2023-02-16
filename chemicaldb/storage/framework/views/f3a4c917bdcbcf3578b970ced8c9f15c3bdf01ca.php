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
    /{#!! Form::select('<?php echo e($col->COLUMN_NAME); ?>',['1'=>__('general.yes'),'2'=>__('general.no')],null,['class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'<?php echo e($col->COLUMN_NAME); ?>','name'=>'<?php echo e($col->COLUMN_NAME); ?>']) !!/}
@#endslot 
@#endcomponent



<?php /**PATH C:\wamp64\www\bizmillaagent\resources\views/generator/ui_ComboBoxYesNo.blade.php ENDPATH**/ ?>