<?php $__env->startSection('page_title'); ?>
<?php echo e($title ?? null); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_description'); ?>
<?php echo e($title ?? null); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li><a href="<?php echo e(url('/')); ?>"><i class="fa fa-gears"></i><?php echo e(__('general.home')); ?></a></li>
    <li><a href="#"><?php echo e($title ?? null); ?></a></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
    <?php echo $__env->make('layouts.components.session_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo Form::open(['route'=>'generator.index',$table]); ?>

        <div class="col-md-10">
            <?php $__env->startComponent('layouts.components.edit_one_column',['for' => 'table_list','required' => '1','label'=>'Table']); ?> <?php $__env->slot('field'); ?>
                <?php echo Form::select('table_list',$list,$request->table_list,['class'=>'form-control select2','required','placeholder'=>__('general.please_select')]); ?>

            <?php $__env->endSlot(); ?> <?php echo $__env->renderComponent(); ?>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-success pull-right"><i class="fa fa-floppy-o">&nbsp;Submit</i></button>
        </div>
    <?php echo Form::close(); ?>

    <div class="col-md-12">
        <?php echo e($request->table_list); ?>

		<?php echo e(route('generator.generate',['table'=>$request->table_list])); ?>

        <?php echo Form::open(['route'=>['generator.generate',$request->table_list],'method'=>'POST']); ?>

            <?php $__env->startComponent('layouts.components.table', ['tname' => 'generator_table']); ?> <?php $__env->slot('thead'); ?>
                <th style='width: 30px;'><?php echo e(__('general.number')); ?></th>
                <td>Column</td>
                <td>Types</td>
                <td></td>
            <?php $__env->endSlot(); ?> <?php $__env->slot('tbody'); ?>
                <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $col): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr id="<?php echo e($col->COLUMN_NAME); ?>_row">
                    <td> </td>
                    <td><?php echo e($col->COLUMN_NAME); ?></td>
                    <td><?php echo e($col->uitype); ?></td>      
                    <td class="<?php echo e($col->COLUMN_NAME); ?>">
                        <div id="<?php echo e($col->COLUMN_NAME); ?>_details">            
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php $__env->endSlot(); ?> <?php $__env->slot('firstScript'); ?>
                paging: false,
                searching: false,
            <?php $__env->endSlot(); ?> <?php echo $__env->renderComponent(); ?>
            <button type="submit" class="btn btn-success pull-right"><i class="fa fa-floppy-o">&nbsp;Generate</i></button>
        <?php echo Form::close(); ?>

        <?php echo Form::open(['route'=>'generator.index',$table]); ?>

            <?php echo Form::hidden('revoke',1); ?>

            <?php echo Form::hidden('table_list',$request->table_list); ?>

            <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o">&nbsp;Revoke</i></button>
        <?php echo Form::close(); ?>

    </div>   
<?php $__env->stopSection(); ?>

 <?php $__env->startPush('scripts'); ?>
    <script>
        function showTables() {
            var table = $('#table_list option:selected').val();
            var path = "<?php echo e(url('/generator')); ?>/" + table;
            location.href = path;
        }

        function uiTypeChanged(colName) {
            var uiTypeName = colName + "_UITypes";
            var selection = $("#" + uiTypeName).val();
            if (selection == "ComboBoxTable") {

                $.ajax({
                    method: "GET",
                    url: "<?php echo e(url('/generator/getDropdownOptions/')); ?>/" + colName,
                })
                        .done(function (msg) {
                            var n = "#" + colName + "_details";
                            var o = $(n);
                            o.html(msg);
                            //alert( "Data Saved: " + msg );
                        });
            } else {
                var n = "#" + colName + "_details";
                var o = $(n);
                if (o) {
                    o.html("");
                }
            }
        }
        function getDropdownTableOptions(colName) {
            var uiTypeName = "#" + colName + "_dropdown";
            var o = $(uiTypeName);
            $.ajax({
                method: "GET",
                url: "<?php echo e(url('/generator/getDropdownTableOptions/')); ?>/" + o.val() + "/" + colName,
            })
                    .done(function (msg) {
                        var n = "#" + colName + "_dropdown_table_option_div";
                        var o = $(n);
                        if (o) {
                            o.html(msg);
                        }
                    });
        }
    </script>
<?php $__env->stopPush(); ?>






<?php echo $__env->make('layouts.app_auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\factohub\resources\views/generator/generator_create.blade.php ENDPATH**/ ?>