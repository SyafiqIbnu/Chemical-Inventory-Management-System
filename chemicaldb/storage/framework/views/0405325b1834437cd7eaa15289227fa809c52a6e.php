<?php

	if(! isset($route)){
		$route = Route::currentRouteName();
		$parts=explode(".",$route);
		$route=$parts[0];
	}

    if(! isset($createUrl)){
		$createUrl="$route/create";
	}
	
?>

dom: '<"row "<"pull-right col-md-4" f ><"col-md-4" l ><"col-md-4"<"text-right dom-button"<B>>>>rt<"row " <"col-sm-12" <"col-sm-4" i ><"col-sm-5" p>>>',
buttons: [
    {
            className: 'btn-sm btn-info',
            text: '<i class="fa fa-plus"></i> <?php echo e(__('general.add')); ?>',
            action: function ( e, dt, node, config ) {
                location.href="<?php echo e($createUrl); ?>";
            }
    },
    {
            className: 'btn-danger',
            text: '<i class="fas fa-file-pdf"></i> <?php echo e(__('general.pdf')); ?>',
            action: function ( e, dt, node, config ) {
                var link = document.createElement('a');
                var data = JSON.stringify(dt.ajax.params());
                var linkurl = '<?php echo url("$route/export-remote/pdf"); ?>';

                var form = $(document.createElement('form'));
                $(form).attr("action", linkurl);
                $(form).attr("method", "POST");
                $(form).attr("target", "_blank");

                var input = $("<input>")
                    .attr("type", "hidden")
                    .attr("name", "mydata")
                    .val(data);
                $(form).append($(input));
                input = $("<input>")
                    .attr("type", "hidden")
                    .attr("name", "_token")
                    .attr("name", "_token")
                    .val('<?php echo e(csrf_token()); ?>');
                $(form).append($(input));

                form.appendTo(document.body)
                $(form).submit();
            }
    },
    {
            className: 'btn-success',
            text: '<i class="fas fa-file-excel"></i> <?php echo e(__('general.excel')); ?>',
            action: function ( e, dt, node, config ) {
                var link = document.createElement('a');
                var data = JSON.stringify(dt.ajax.params());
                var linkurl = '<?php echo url("$route/export-remote/excel"); ?>';

                var form = $(document.createElement('form'));
                $(form).attr("action", linkurl);
                $(form).attr("method", "POST");
                $(form).attr("target", "_blank");

                var input = $("<input>")
                    .attr("type", "hidden")
                    .attr("name", "mydata")
                    .val(data);
                $(form).append($(input));
                input = $("<input>")
                    .attr("type", "hidden")
                    .attr("name", "_token")
                    .attr("name", "_token")
                    .val('<?php echo e(csrf_token()); ?>');
                $(form).append($(input));

                form.appendTo(document.body)
                $(form).submit();
            }
    }
],	<?php /**PATH D:\xampp\htdocs\chemicaldb\resources\views/layouts/components/datatable_button_export_create_modal.blade.php ENDPATH**/ ?>