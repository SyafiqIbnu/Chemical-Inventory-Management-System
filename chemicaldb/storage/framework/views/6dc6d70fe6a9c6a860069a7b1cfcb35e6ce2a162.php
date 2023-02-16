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
        <?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'expiration_date','required' => '1','label'=>__('chemical.expiration_date')]); ?> 
        <?php $__env->slot('field'); ?>
                <?php echo Form::text('expiration_date',null,['class'=>'form-control datetimepicker-input date-field','data-toggle'=>'datetimepicker','id'=>'expiration_date','data-target'=>'#expiration_date','required','placeholder'=>__('chemical.expiration_date_placeholder')]); ?>

        <?php $__env->endSlot(); ?> 
        <?php echo $__env->renderComponent(); ?>
        <?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'date_opened','required' => '1','label'=>__('chemical.date_opened')]); ?> 
        <?php $__env->slot('field'); ?>
                <?php echo Form::text('date_opened',null,['class'=>'form-control datetimepicker-input date-field','data-toggle'=>'datetimepicker','id'=>'date_opened','data-target'=>'#date_opened','required','placeholder'=>__('chemical.date_opened_placeholder')]); ?>

        <?php $__env->endSlot(); ?> 
        <?php echo $__env->renderComponent(); ?>
        <?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'item_location','required' => '1','label'=>__('chemical.item_location')]); ?> 
        <?php $__env->slot('field'); ?>
            <?php echo Form::text('item_location',null,['class'=>'form-control','required','placeholder'=>__('chemical.item_location_placeholder'),'maxlength'=>254]); ?>

        <?php $__env->endSlot(); ?> 
        <?php echo $__env->renderComponent(); ?>
        <?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'item_brand','required' => '1','label'=>__('chemical.item_brand')]); ?> 
        <?php $__env->slot('field'); ?>
            <?php echo Form::text('item_brand',null,['class'=>'form-control','required','placeholder'=>__('chemical.item_brand_placeholder'),'maxlength'=>64]); ?>

        <?php $__env->endSlot(); ?> 
        <?php echo $__env->renderComponent(); ?>
        <?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'laboratory_id','required' => '1','label'=>__('chemical.laboratory_id')]); ?> 
        <?php $__env->slot('field'); ?>
            <?php echo Form::select('faculty',$laboratory_list,null,[ 'class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'laboratory_id','name'=>'laboratory_id']); ?>

        <?php $__env->endSlot(); ?> 
        <?php echo $__env->renderComponent(); ?>
        <?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'staff_id','required' => '1','label'=>__('chemical.staff_id')]); ?> 
        <?php $__env->slot('field'); ?>
            <?php echo Form::select('faculty',$staff_list,null,[ 'class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'staff_id','name'=>'staff_id']); ?>

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
            <?php echo $__env->make('report.chemical_report_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php $__env->endSlot(); ?> 
        <?php $__env->slot('cardFooter'); ?>
        <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startPush('scriptsDocumentReady'); ?>
	setMenuActive('menu-chemical-report'); 
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
        var expiration_date = $('input[name="expiration_date"]').val();
        var item_location = $('input[name="item_location"]').val();
        var date_opened = $('input[name="date_opened"]').val();
        var item_brand = $('input[name="item_brand"]').val();
        var laboratory_id = $('#laboratory_id').val();
        var staff_id = $('#staff_id').val();
        // var date1 = document.getElementById("date1").value;
        // var date2 = document.getElementById("date2").value;
        // window.location.href = "?date1=" + date1+ "&date2=" + date2;
        // window.location.href = "?laboratory_id=" + laboratory_id+ "&staff_id=" + staff_id;
        window.location.href = "?laboratory_id=" + laboratory_id+ "&staff_id=" + staff_id+"&item_brand=" + item_brand+
         "&item_location=" + item_location+"&date_opened=" + date_opened+"&expiration_date=" + expiration_date;
    }

    function downloadcsv(){
        var date1 = document.getElementById("date1").value;
        var date2 = document.getElementById("date2").value;
        window.location.href = "?date1=" + date1+ "&date2=" + date2+ "&option=downloadcsv";
    }
    
</script>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\chemicaldb\resources\views/report/chemical_report.blade.php ENDPATH**/ ?>