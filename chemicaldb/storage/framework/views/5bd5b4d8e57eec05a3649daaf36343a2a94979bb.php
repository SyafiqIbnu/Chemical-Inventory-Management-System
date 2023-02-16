<?php
    if(! isset($name)){
        $name="id";
    }
?>

{data: '<?php echo e($name); ?>',title: "<?php echo e(__('general.number')); ?>", orderable: false, searchable: false,visible: true,
render: function (data, type, full, meta) { 
    var table = $('#<?php echo e($table_name); ?>').DataTable(); 
    var info = table.page.info(); 
    var title = $('#<?php echo e($table_name); ?>').DataTable().column(meta.col).header(); 
    return parseInt((info.page *info.length) + meta.row+1);
    //return 1;
    } 
}<?php /**PATH C:\wamp64\www\factohub\resources\views/layouts/components/datatable_data_card_render_number.blade.php ENDPATH**/ ?>