<?php
	if(! isset($default_sortby)){
		$default_sortby=1;		
	}

	if(! isset($default_sortdir)){
		$default_sortdir='asc';
	}

	if(! isset($bgColor)){
		$bgColor='bg-blue';
	}

	if(! isset($createUrl)){
		$createUrl="$route/create";
	}

	if(! isset($scrollTop)){
		$scrollTop=true;
	}

?>

<table id="<?php echo e($tname); ?>" class="table display table-hover dtcards row-border" width="100%">
    <?php if(isset($filter)): ?>
    <div class='col-md-10'>				
        <div class='row'>
            <?php echo e($filter); ?>

        </div>
    </div>
    <div class='col-md-2'>
        <button class='col-md-12 btn btn-success form-group' style='margin-top: 23px' id='btn_filter'><i class='fa fa-search' style='margin-right: 5px'></i>Lihat</button> 
    </div>
    <?php endif; ?>
    <thead>
        <tr class='<?php echo $bgColor; ?>'>
            <?php echo e($thead); ?>

        </tr>
    </thead>
</table>

<?php if(Request()->session()->get('platform') == 'mobile'): ?>
    <div class="dt-more-container">
        <button id="btn-<?php echo e($tname); ?>-load-more" style="display:none">Load More</button>
        <button id="btn-<?php echo e($tname); ?>-reload">Reset</button>
     </div>
<?php endif; ?>

<?php $__env->startPush('scriptsDocumentReady'); ?>
	$(document).ready(function() {
		var <?php echo e($tname); ?> = $('#<?php echo e($tname); ?>').DataTable({
			"processing": true,
			"serverSide": true,
			"responsive": true,
        	"autoWidth": false,
			ajax:{
				"url": "<?php echo e($url); ?>",
				"dataType": "json",
				"type": "POST",
				"timeout": 30000,
				"data": function(dt) {
					<?php if(isset($filter_parameter)): ?>
					<?php echo e($filter_parameter); ?>

					<?php endif; ?>
				},
				<?php if(env('APP_DEBUG') != 1): ?>
					"error": function(e){
						<?php echo e($tname); ?>.ajax.reload();
					},
				<?php endif; ?>
			},
			columns: [
				<?php echo e($tbody); ?>

			],
			"order": [[ <?php echo e($default_sortby); ?>, "<?php echo e($default_sortdir); ?>" ]],
			<?php if(isset($options)): ?>
				<?php echo e($options); ?>

			<?php endif; ?>
			language: {"url": "<?php echo e(url('asset/lang/')); ?>/<?php echo e(app()->getLocale()); ?>/datatable.json"},
			<?php if(isset($firstScript)): ?>
				<?php echo e($firstScript); ?>

			<?php endif; ?>	
			
	} );

	<?php if($scrollTop): ?>
		$('#<?php echo e($tname); ?>').on( 'draw.dt', function (event) {				
			$("html, body").animate({scrollTop: 0 }, "slow");
			event.preventDefault();
			return false;		
		});
	<?php endif; ?>


	} );
	

<?php $__env->stopPush(); ?>

<?php $__env->startPush('scriptsDocumentReady12'); ?>
	var <?php echo e($tname); ?> = $('#<?php echo e($tname); ?>').DataTable({
		<?php if(Request()->session()->get('platform') == 'mobile'): ?>
			"sDom": '<"row "<"col-md-4" f ><"col-md-4" l ><"col-md-4"<"pull-right dom-button"<B>>>>rti',
		<?php endif; ?>
		processing: true,		
		<?php if(!isset($no_serverside)): ?>
			serverSide: true,
		<?php endif; ?>
		stateSave: true,
		<?php if(isset($firstScript)): ?>
			<?php echo e($firstScript); ?>

		<?php endif; ?>
		order: [[ <?php echo e($default_sortby); ?>, "<?php echo e($default_sortdir); ?>" ]],
		ajax:{
			"url": "<?php echo e($url); ?>",
			"data": function(dt) {
					<?php if(isset($filter_parameter)): ?>
					<?php echo e($filter_parameter); ?>

					<?php endif; ?>
			},
			"dataType": "json",
			"type": "POST",
			"timeout": 30000,
			<?php if(env('APP_DEBUG') != 1): ?>
				"error": function(e){
					<?php echo e($tname); ?>.ajax.reload();
				},
			<?php endif; ?>
		},
		"createdRow": function( row, data, dataIndex ) {
			var i=dataIndex % 2;
			if (i==1) {
			  $(row).addClass( 'bs-callout bs-callout-danger"' );
			}else{
			  $(row).addClass( 'bs-callout bs-callout-primary"' );
			}
		},
		drawCallback: function(){
			//$('#btn-<?php echo e($tname); ?>-load-more').toggle(this.api().page.hasMore());
		},      
		columns: [
			<?php echo e($tbody); ?>

		],
	});
	<?php if(!isset($no_number)): ?>
		/*<?php echo e($tname); ?>.on('order.dt search.dt', function () {				    
			<?php echo e($tname); ?>.column(0, {search:'applied', order:'applied'}).nodes().each(function (cell, i) {
				cell.innerHTML = i + 1;
			});
		}).draw(); */
		

		$('#<?php echo e($tname); ?>').on( 'draw.dt', function (event) {				
			$("html, body").animate({scrollTop: 0 }, "slow");
			event.preventDefault();
			return false;
		
		});


	<?php endif; ?>
	<?php if(isset($secondScript)): ?>
		<?php echo e($secondScript); ?>

	<?php endif; ?>
	<?php if(isset($filter_parameter)): ?>
		<?php if(isset($filter_parameter_script)): ?>
			$("#btn_filter").click(function() {
				<?php echo e($tname); ?>.ajax.reload();
				<?php echo e($filter_parameter_script); ?>;
			});
		<?php endif; ?>
	<?php endif; ?>
	<?php if(Request()->session()->get('platform') == 'mobile'): ?>
		$('#btn-<?php echo e($tname); ?>-load-more').on('click', function(){  
			<?php echo e($tname); ?>.page.loadMore();
		});
		$('#btn-<?php echo e($tname); ?>-reload').on('click', function(){
			$('#<?php echo e($tname); ?>').DataTable().page.len(10).draw();
		});
	<?php endif; ?>
<?php $__env->stopPush(); ?>


<?php if(isset($mthead)): ?>
    <?php $__env->startPush('styles1'); ?>
        <style>
            @media  only screen and (max-width: 800px) {

            /* Force table to not be like tables anymore */
                #<?php echo e($tname); ?> table, 
                #<?php echo e($tname); ?> thead, 
                #<?php echo e($tname); ?> tbody, 
                #<?php echo e($tname); ?> th, 
                #<?php echo e($tname); ?> td, 
                #<?php echo e($tname); ?> tr { 
                        display: block; 
                }

                /* Hide table headers (but not display: none;, for accessibility) */
                #<?php echo e($tname); ?> thead tr { 
                        position: absolute;
                        top: -9999px;
                        left: -9999px;
                }

                #<?php echo e($tname); ?> tr {
                    margin-left: -15px;
                    margin-right: -15px;
                    /*border: 1px solid #ccc;*/ 
                }
                
                #<?php echo e($tname); ?> td { 
                    display: none !important;
                        /* Behave  like a "row" */
                }

                #<?php echo e($tname); ?> td.mobile-responsive {
                    padding: 0px;
                    display: unset !important;
                        /* Behave  like a "row" */
                }

                #<?php echo e($tname); ?> td:before { 
                        /* Now like a table header */
                        position: absolute;
                        /* Top/left values mimic padding */
                        top: 6px;
                        left: 6px;
                        width: 45%; 
                        padding-right: 10px; 
                        white-space: nowrap;
                        text-align:left;
                        font-weight: bold;
                        overflow: hidden;
                }

                /*
                Label the data
                */
            }
        </style>
    <?php $__env->stopPush(); ?>
<?php endif; ?><?php /**PATH C:\wamp64\www\factohub\resources\views/layouts/components/table_ajax.blade.php ENDPATH**/ ?>