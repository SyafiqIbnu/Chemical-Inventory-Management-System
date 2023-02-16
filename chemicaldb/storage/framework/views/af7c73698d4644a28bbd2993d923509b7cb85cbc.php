@#extends('layouts.app')

@#section('page_title')
/{/{$title/}/}
@#endsection

@#section('page_description')
/{/{$title/}/}
@#endsection

@#section('breadcrumb')
	<li class="breadcrumb-item"><a href="#">/{/{__('general.home')/}/}</a></li>
    <li class="breadcrumb-item active">/{/{$title/}/}</li>
	
@#endsection

@#section('main-content')

    @#include('layouts.components.session_message')
	
	
    @#push('modals')
        @#if(\App\Helpers\PermissionHelper::has<?php echo e($modelName); ?>Delete(false))
            @#include('layouts.components.modal_delete')
        @#endif
    @#endpush

	
    <div class="col-md-12 table-responsive" style="border: none;">
        @#component('layouts.components.table_ajax', ['route'=>'<?php echo e($name); ?>','tname' => '<?php echo e($name); ?>_table_ajax','bgColor'=>'bg-red']) 

		@#slot('url')
            /{/{ route('<?php echo e($name); ?>.indexAjax')/}/}
        @#endslot 

        <?php $__env->slot('options'); ?>   
            "order": [[ 1, "asc" ]],
        <?php $__env->endSlot(); ?> 

		@#slot('thead')
            <th style='width: 30px;'>/{/{__('general.number')/}/}</th>
            <?php $__currentLoopData = $filteredColumns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $col): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <th>/{/{__('<?php echo e($name); ?>.<?php echo e($col->COLUMN_NAME); ?>')/}/}</th>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <th style="width:80px;">/{/{__('general.action')/}/}</th>
        @#endslot 

		@#slot('tbody')
            @#include('layouts.components.datatable_data_card_render_number',['table_name'=>'<?php echo e($name); ?>_table_ajax']),
            <?php $__currentLoopData = $filteredColumns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $col): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php
				$colName=$col->COLUMN_NAME;
			?>
            @#include('layouts.components.datatable_data_card_render', ['table_name'=>'<?php echo e($name); ?>_table_ajax','name'=>'<?php echo e($colName); ?>','title'=>__('<?php echo e($name); ?>.<?php echo e($colName); ?>')]),
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            @#include('layouts.components.datatable_data_card_render_action'),
        @#endslot 

		@#slot('filter_parameter')
            //dt.f_start_date = $('input[name=f_start_date]').val();
            //dt.f_end_date = $('input[name=f_end_date]').val();
        @#endslot 

		@#slot('firstScript')
            @#if(Auth::user()->can('<?php echo e($name); ?>_create'))
                @#include('layouts.components.datatable_button_export_create_modal')
            @#else
                @#include('layouts.components.datatable_button_export')
            @#endif
        @#endslot 

		@#slot('secondScript')
        @#endslot 
	@#endcomponent
    </div>
	
    @#include('<?php echo e($name); ?>.menu_active')
@#endsection<?php /**PATH C:\wamp64\www\bizmillaagent\resources\views/generator/index.blade.php ENDPATH**/ ?>