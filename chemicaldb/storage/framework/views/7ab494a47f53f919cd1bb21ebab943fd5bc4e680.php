<table class="table table-bordered">
                <tbody>
                <tr>
                    <td>Bil</td>
                    <td>Jenis Bahan Kawalan</td>
                    <td>Jenis Belian</td>
                    <td>Kuantiti Dipohon</td>
                    <td>Kuantiti Disyorkan</td>
                    
                </tr>
                <?php $bil=0; ?>
                    <?php $__currentLoopData = $permitPurchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $bil++; ?>
                        <tr>
                            <td><?php echo e($bil); ?></td>
                            <td><?php echo e($purchase->usageControlledGoodsType->name); ?></td>
                            <td><?php echo e($purchase->usagePurchaseType->name); ?></td>
                            <td><?php echo e($purchase->quantity); ?></td>
                            <td><?php echo e($purchase->recommended_quantity); ?></td>
                            
                        </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table><?php /**PATH C:\wamp64\www\permitkhas\resources\views/permit_application_approver/maklumat_belian_review.blade.php ENDPATH**/ ?>