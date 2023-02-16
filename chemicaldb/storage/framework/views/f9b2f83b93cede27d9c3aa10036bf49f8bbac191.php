<?php $__env->startSection('htmlheader_title'); ?>Report <?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>Report <?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<section class="content-header">
    <h1>
        <?php echo $__env->yieldContent('contentheader_title', ''); ?>
        <small><?php echo $__env->yieldContent('contentheader_description'); ?></small>
    </h1>
</section>

<div class="clearfix"></div>
<?php $__env->startComponent('layouts.components.crud_card'); ?>
		<?php $__env->slot('cardTitle'); ?> Filter Box <?php $__env->endSlot(); ?>
		<?php $__env->slot('cardColor'); ?> card-success <?php $__env->endSlot(); ?>
		<?php $__env->slot('cardBody'); ?> 
        <?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'faculty','required' => '1','label'=>__('laboratory.faculty')]); ?> 
        <?php $__env->slot('field'); ?>
            <?php echo Form::select('faculty',$faculty_list,null,[ 'class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'faculty','name'=>'faculty']); ?>

        <?php $__env->endSlot(); ?> 
        <?php echo $__env->renderComponent(); ?>
        
        <?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'type','required' => '1','label'=>__('laboratory.type')]); ?> 
        <?php $__env->slot('field'); ?>
            <?php echo Form::select('type',$type_list,null,[ 'class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'type','name'=>'type']); ?>

        <?php $__env->endSlot(); ?> 
        <?php echo $__env->renderComponent(); ?>
        <?php $__env->endSlot(); ?>
		<?php $__env->slot('cardFooter'); ?>
			<a class="btn btn-info" onclick="datesearch()" id="btn2" href="#">Generate Report</a>
            <a class="btn btn-info" onClick="printreceipt('receipt');" id="btn2" href="#">Cetak Report</a>
            <a class="btn btn-info" onClick="downloadcsv()" id="btn3" href="#">Download CSV</a>
            <?php echo Form::close(); ?>

		<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div id="receipt">
<?php $__env->startComponent('layouts.components.crud_card'); ?>
        <?php $__env->slot('cardTitle'); ?> 
            
        <?php $__env->endSlot(); ?>
		<?php $__env->slot('cardColor'); ?> card-success <?php $__env->endSlot(); ?>
        <?php $__env->slot('cardBody'); ?>
            <?php echo $__env->make('report.laboratory_report_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php $__env->endSlot(); ?> 
        <?php $__env->slot('cardFooter'); ?>
        <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startPush('scriptsDocumentReady'); ?>
	setMenuActive('menu-laboratory-report'); 
<?php $__env->stopPush(); ?>


<script language="javascript">
    function printreceipt(printpage)
    {
        var headstr = "<html><head><title></title></head><body>";
        var footstr = "</body>";
		var newstr = document.all.item(printpage).innerHTML;
        var oldstr = document.body.innerHTML;
        document.body.innerHTML = headstr+newstr+footstr;
        window.print();
        document.body.innerHTML = oldstr;
        return false;
    }


    function datesearch() {
        var faculty_id = $('#faculty').val();
        var type_id = $('#type').val();
        // var date1 = document.getElementById("date1").value;
        // var date2 = document.getElementById("date2").value;
        // window.location.href = "?date1=" + date1+ "&date2=" + date2;
        window.location.href = "?faculty_id=" + faculty_id+ "&type_id=" + type_id;
    }

    function downloadcsv(){
        var date1 = document.getElementById("date1").value;
        var date2 = document.getElementById("date2").value;
        window.location.href = "?date1=" + date1+ "&date2=" + date2+ "&option=downloadcsv";
    }
    
</script>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\chemicaldb\resources\views/report/laboratory_report.blade.php ENDPATH**/ ?>