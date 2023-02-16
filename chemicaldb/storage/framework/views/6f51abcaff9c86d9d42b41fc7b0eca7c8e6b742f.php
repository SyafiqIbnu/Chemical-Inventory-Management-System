@#component('layouts.components.edit_modal_one_column',['for' => '<?php echo e($col->COLUMN_NAME); ?>','required' => '1','label'=>__('<?php echo e($name); ?>.<?php echo $col->COLUMN_NAME; ?>')]) 
<?php
	//dd($data);
	if($col->CHARACTER_MAXIMUM_LENGTH==null){
		$field_maxlength='';
	}else{
		$field_maxlength=",'maxlength'=>".$col->CHARACTER_MAXIMUM_LENGTH;
		//$field_maxlength='';
	}

	$selectName=$col->COLUMN_NAME;
	$selectPlaceHolderAttr="placeholder";
	$selectMultipleAttr="";
	$t=$col->COLUMN_NAME.'_selection_type';
	if($data[$t]==2){
		$selectMultipleAttr="'multiple'=>'multiple',";
		$selectPlaceHolderAttr="data-placeholder";
		$selectName=$col->COLUMN_NAME."[]";
	}
?>
@#slot('field')
    /{#!! Form::select('<?php echo $selectName; ?>',$<?php echo e($col->COLUMN_NAME); ?>_list,null,[<?php echo $selectMultipleAttr; ?> 'class'=>'form-control select2','required','<?php echo $selectPlaceHolderAttr; ?>'=>__('general.please_select'),'id'=>'<?php echo e($col->COLUMN_NAME); ?>','name'=>'<?php echo e($col->COLUMN_NAME); ?>']) !!/}
@#endslot 
@#endcomponent



<?php /**PATH D:\xampp\htdocs\chemicaldb\resources\views/generator/ui_ComboBoxTable.blade.php ENDPATH**/ ?>