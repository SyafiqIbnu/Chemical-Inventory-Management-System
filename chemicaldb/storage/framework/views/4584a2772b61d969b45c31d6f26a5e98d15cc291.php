<!-- <style>
  table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
  }
</style> -->


<div class="card direct-chat direct-chat-primary">
    <div class="card-header ui-sortable-handle" style="cursor: move;">
      <h3 class="card-title">Status Permohonan</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>

    <div class="card-body" style="display: block;">
      <table width="90%" cellspacing="1" cellpadding="3" border="0" align="center">
        <tbody><tr> 
          <td class="fontbiasa">Nama</td>
          <td class="fontbiasa" align="center">:</td>
          <td class="fontbiasa"><?php echo e($modelUser->name); ?></td>
        </tr>
        <tr> 
          <td class="fontbiasa" width="38%">Nombor KP/ Nombor Pendaftaran Syarikat</td>
          <td class="fontbiasa" width="1%" align="center">:</td>
          <td class="fontbiasa" width="61%"><?php if(isset($modelUser->mykad)): ?> <?php echo e($modelUser->mykad); ?> <?php else: ?> <?php echo e($modelUser->cpy_reg_no); ?> <?php endif; ?></td>
        </tr>
      </tbody></table>

      <div class="col-md-11 table-responsive" style="border: none;margin: auto;">
        <?php $__env->startComponent('layouts.components.table_ajax', ['route'=>'home','tname' => 'status_table_ajax','bgColor'=>'bg-red']); ?> 

        <?php $__env->slot('url'); ?>
                <?php echo e(route('home.indexAjax')); ?>

            <?php $__env->endSlot(); ?> 

        <?php $__env->slot('thead'); ?>
          <th style='width: 30px;'><?php echo e(__('general.number')); ?></th>
          <th>Tarikh Permohonan</th>
          <th>Pejabat Pengeluar</th>
          <th>Status</th>
          <th>No Rujukan</th>
          <th>Tempoh Permit</th>
          <th style="width:80px;"></th>
        <?php $__env->endSlot(); ?> 

        <?php $__env->slot('tbody'); ?>
          <?php echo $__env->make('layouts.components.datatable_data_card_render_number',['table_name'=>'status_table_ajax'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
          <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'status_table_ajax','name'=>'application_date','title'=>'Tarikh Permohonan'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
          <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'status_table_ajax','name'=>'branch_id','title'=>'Pejabat Pengeluar'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
          <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'status_table_ajax','name'=>'permit_application_status_id','title'=>'Status'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
          <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'status_table_ajax','name'=>'permit_no','title'=>'No Rujukan'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
          <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'status_table_ajax','name'=>'permit_period','title'=>'Tempoh Permit'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
          <?php echo $__env->make('layouts.components.datatable_data_card_render_action', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
        <?php $__env->endSlot(); ?> 

        <?php $__env->slot('filter_parameter'); ?>
        <?php $__env->endSlot(); ?> 

        <?php $__env->slot('firstScript'); ?>
          'paging':false,
          'searching': false,
          'info': false, 
        <?php $__env->endSlot(); ?> 

        <?php $__env->slot('secondScript'); ?>
        <?php $__env->endSlot(); ?>

        <?php echo $__env->renderComponent(); ?>
        </div>

        <div style="text-align:center;">
          <a title='Papar' type='button' class='btn btn-info' href="<?php echo e(url('permit_application/create')); ?>">PERMOHONAN BARU</a>
        </div>
        <br/><br/>

    </div>
    
  </div><?php /**PATH C:\wamp64\www\bizmillaagent\resources\views/home/index_status.blade.php ENDPATH**/ ?>