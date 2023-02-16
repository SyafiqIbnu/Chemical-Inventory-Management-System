<table class="table table-bordered ">

        <tbody>

           
            <tr>
                <th>Tarikh Mula Permit</th><td><?php echo e($modelPermitApplication->permit_start_date); ?></td>
                <th>Tarikh Tamat Permit</th><td><?php echo e($modelPermitApplication->permit_end_date); ?></td>
            </tr>
            <tr>
                <th>Aktiviti</th><td><?php echo e($modelPermitApplication->permitActivity->name); ?></td>
                <th>Tujuan</th><td><?php echo e($modelPermitApplication->purchase_purpose); ?></td>
            </tr>
        </tbody>

</table>


<table class="table table-bordered ">

        <tbody>

            <tr>
            
                <td colspan="4" style="background-color:#DFE6E9"><b>KEGUNAAN BAHAN API</b>
                
                </td>
           
            </tr>
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <td>Bil</td>
                    <td>Jenis Bahan Kawalan</td>
                    <td>Kuasa Kuda</td>
                    <td>Kegunaan Harian</td>
                    <td>Kuantiti</td>
                    <td>Alatan</td>
                </tr>
                <?php $bil=0; ?>
                    <?php $__currentLoopData = $permitUsages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $bil++; ?>
                        <tr>
                            <td><?php echo e($bil); ?></td>
                            <td><?php echo e($usage->usageControlledGoodsType->name); ?></td>
                            <td><?php echo e(number_format($usage->horse_power)); ?></td>
                            <td><?php echo e(number_format($usage->daily_usage)); ?></td>
                            <td><?php echo e(number_format($usage->quantity)); ?></td>
                            <td><?php echo e($usage->usageEquipment->name); ?></td>
                        </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </tbody>

</table>

<table class="table table-bordered ">

        <tbody>

            <tr>
                <td colspan="4" style="background-color:#DFE6E9"><b>BELIAN BAHAN API</b>
                
                </td>
            </tr>
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <td>Bil</td>
                    <td>Jenis Bahan Kawalan</td>
                    <td>Jenis Belian</td>
                    <td>Kuantiti</td>
                    
                </tr>
                <?php $bil=0; ?>
                    <?php $__currentLoopData = $permitPurchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $bil++; ?>
                        <tr>
                            <td><?php echo e($bil); ?></td>
                            <td><?php echo e($purchase->usageControlledGoodsType->name); ?></td>
                            <td><?php echo e($purchase->usagePurchaseType->name); ?></td>
                            <td><?php echo e($purchase->quantity); ?></td>
                            
                        </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </tbody>

</table><?php /**PATH C:\wamp64\www\permitkhas\resources\views/permit_application/maklumat_permit_view.blade.php ENDPATH**/ ?>