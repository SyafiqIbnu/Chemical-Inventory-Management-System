<?php $__env->startSection('page_title'); ?>
Booking Confirmation #<?php echo e($modelBooking->id); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_description'); ?>
<?php echo e(__('general.edit')); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.breadcrumb_edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('main-content'); ?>
	<?php $__env->startComponent('layouts.components.crud_card'); ?>
		<?php $__env->slot('cardTitle'); ?> <?php echo e(__('general.booking')); ?> Information  <?php $__env->endSlot(); ?>
		<?php $__env->slot('cardColor'); ?> card-success <?php $__env->endSlot(); ?>
		<?php $__env->slot('collapsible'); ?> true <?php $__env->endSlot(); ?>
		
		
		<?php $__env->slot('cardBody'); ?>
		
				<?php echo $__env->make('booking_application.edit_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				
		<?php $__env->endSlot(); ?>

		<?php $__env->slot('cardFooter'); ?>
			
		<?php $__env->endSlot(); ?>
	<?php echo $__env->renderComponent(); ?>
	
	<?php $__env->startComponent('layouts.components.crud_card'); ?>

			<?php $__env->slot('cardTitle'); ?> <?php echo e(__('general.booking_cargo')); ?> <?php $__env->endSlot(); ?>
			<?php $__env->slot('cardColor'); ?> card-success <?php $__env->endSlot(); ?>
			<?php $__env->slot('cardBody'); ?>

				<div class="col-md-12 table-responsive" style="border: none;">
					<?php $__env->startComponent('layouts.components.table_ajax', ['route'=>'booking_cargo','tname' => 'booking_cargo_table_ajax','bgColor'=>'bg-red']); ?> 

					<?php $__env->slot('url'); ?>
						<?php echo e(route('booking_cargo.indexAjax',$booking_application_id)); ?>

					<?php $__env->endSlot(); ?> 

					
					<?php $__env->slot('thead'); ?>
						<th style='width: 30px;'><?php echo e(__('general.number')); ?></th>
						<th><?php echo e(__('booking_cargo.cargo_type')); ?></th>
									<th><?php echo e(__('booking_cargo.weight')); ?></th>
									<th><?php echo e(__('booking_cargo.height')); ?></th>
									<th><?php echo e(__('booking_cargo.length')); ?></th>
									<th><?php echo e(__('booking_cargo.width')); ?></th>
									
									<th><?php echo e(__('booking_cargo.radius')); ?></th>
									<th><?php echo e(__('booking_cargo.diameter')); ?></th>
									<th><?php echo e(__('booking_cargo.unit')); ?></th>
									
					<?php $__env->endSlot(); ?> 

					<?php $__env->slot('tbody'); ?>
						<?php echo $__env->make('layouts.components.datatable_data_card_render_number',['table_name'=>'booking_cargo_table_ajax'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
						<?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'booking_cargo_table_ajax','name'=>'cargo_type','title'=>__('booking_cargo.cargo_type')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
												<?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'booking_cargo_table_ajax','name'=>'weight','title'=>__('booking_cargo.weight')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
												<?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'booking_cargo_table_ajax','name'=>'height','title'=>__('booking_cargo.height')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
												<?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'booking_cargo_table_ajax','name'=>'length','title'=>__('booking_cargo.length')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
												<?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'booking_cargo_table_ajax','name'=>'width','title'=>__('booking_cargo.width')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
												
												<?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'booking_cargo_table_ajax','name'=>'radius','title'=>__('booking_cargo.radius')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
												<?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'booking_cargo_table_ajax','name'=>'diameter','title'=>__('booking_cargo.diameter')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
												<?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'booking_cargo_table_ajax','name'=>'unit','title'=>__('booking_cargo.unit')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
									
					<?php $__env->endSlot(); ?> 

					<?php $__env->slot('filter_parameter'); ?>
						//dt.f_start_date = $('input[name=f_start_date]').val();
						//dt.f_end_date = $('input[name=f_end_date]').val();
					<?php $__env->endSlot(); ?> 

					<?php $__env->slot('firstScript'); ?>
					
					<?php $__env->endSlot(); ?> 

					<?php $__env->slot('secondScript'); ?>
					<?php $__env->endSlot(); ?> 
				<?php echo $__env->renderComponent(); ?>
				</div>

			<?php $__env->endSlot(); ?>
			<?php $__env->slot('cardFooter'); ?>
				
			

			<?php $__env->endSlot(); ?>

	<?php echo $__env->renderComponent(); ?>
	
	<?php $__env->startComponent('layouts.components.crud_card'); ?>
		<?php $__env->slot('cardTitle'); ?> <?php echo e(__('general.vehicle')); ?> Confirmation <?php $__env->endSlot(); ?>
		<?php $__env->slot('cardColor'); ?> card-success <?php $__env->endSlot(); ?>
		
		<?php $__env->slot('cardBody'); ?>
			<?php echo Form::model($modelBooking, ['route' => ['booking.update', $modelBooking->id],'method'=>'PUT','id'=>'bookingForm']); ?>

				<?php echo $__env->make('booking.create_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<?php $__env->endSlot(); ?>

		<?php $__env->slot('cardFooter'); ?>
			<a type="button" class="btn btn-danger"	onClick="location.href='<?php echo e(url('booking')); ?>'"><i class="fa fa-close"></i> <?php echo e(__('general.cancel')); ?></a>
			<?php echo Form::button('<i class="fa fa-refresh"></i> '.__('general.reset').'',['class'=>'btn btn-warning','type'=>'reset']); ?> 
			<?php echo Form::button('<i class="fa fa-floppy-o"></i> '.__('general.save').'',['class'=>'btn btn-success pull-right','type'=>'submit','id'=>'submitButton']); ?>

			<?php echo Form::close(); ?>

		<?php $__env->endSlot(); ?>
	<?php echo $__env->renderComponent(); ?>


	


<?php $__env->stopSection(); ?>

<?php echo $__env->make('booking.menu_active', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\factohub\resources\views/booking/edit.blade.php ENDPATH**/ ?>