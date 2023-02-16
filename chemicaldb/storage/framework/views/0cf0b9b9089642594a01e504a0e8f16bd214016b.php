<table class="table table-bordered">
                <tbody>
                <tr>
                    <td>Bil</td>
                    <td>Jenis Bahan Kawalan</td>
                    <td>Jenis Belian</td>
                    <td>Kuantiti Dipohon</td>
                    <td>Kuantiti Disyorkan(Penyemak)</td>
                    <td>Kuantiti Disyorkan</td>
                    <td>Tindakan</td>
                </tr>
                <?php $bil=0; ?>
                    <?php $__currentLoopData = $permitPurchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $bil++; ?>
                        <?php echo Form::model($modelPermitApplication, ['route' => ['permit_application_purchase.update_belian_approval', $purchase->id],'method'=>'PUT','id'=>'permit_application_activityForm']); ?>

                        <tr>
                            <td><?php echo e($bil); ?></td>
                            <td><?php echo e($purchase->usageControlledGoodsType->name); ?></td>
                            <td><?php echo e($purchase->usagePurchaseType->name); ?></td>
                            <td><?php echo e($purchase->quantity); ?></td>
                            <td><?php echo e($purchase->recommended_quantity); ?></td>
                            <td><?php echo Form::text('approved_quantity',$purchase->approved_quantity,['class'=>'form-control','id'=>'approved_quantity','name'=>'approved_quantity']); ?></td>
                            <!--<td><a title='Edit' type='button' class='btn btn-xs btn-warning' href="<?php echo e(url('permit_application_review/'.$purchase->getKey().'/edit_belian')); ?>"><i class='fa fa-pencil'></i></a></td>-->
                            <td><?php echo Form::button('<i class="fa fa-floppy-o"></i> '.__('general.save').'',['class'=>'btn btn-success pull-right','type'=>'submit','id'=>'submitButton']); ?></td>
                            
                        </tr>
                        <?php echo Form::close(); ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table><?php /**PATH C:\wamp64\www\permitkhas\resources\views/permit_application_approver/maklumat_belian.blade.php ENDPATH**/ ?>