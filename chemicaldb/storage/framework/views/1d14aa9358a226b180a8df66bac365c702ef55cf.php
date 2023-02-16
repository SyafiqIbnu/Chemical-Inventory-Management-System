<!DOCTYPE html>
<html>
    <head>
        <title><?php echo e($title); ?></title>
    </head>
    <style>
        body{
            font-size: 10px;
            font-family: sans-serif;

        }
    </style>
    <body>
        <?php echo $__env->make('layouts.components.export_pdf_banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
       
        <table class="table table-bordered " width="100%">

                <tbody>

                    <tr>
                        <td colspan="4" style="background-color:#DFE6E9"><b>MAKLUMAT PERMIT</b></td>
                        
                    </tr>
                    <tr>
                        <th>Tarikh Mula Permit</th><td><?php echo e($permit->permit_start_date); ?></td>
                        <th>Tarikh Tamat Permit</th><td><?php echo e($permit->permit_end_date); ?></td>
                    </tr>
                    <tr>
                        <th>Aktiviti</th><td><?php echo e($permit->permitActivity->name); ?></td>
                        <th>Tujuan</th><td><?php echo e($permit->purchase_purpose); ?></td>
                    </tr>
                </tbody>

        </table>
        <table class="table table-bordered " width="100%">

            <tbody>

                <tr>
                    <td colspan="4" style="background-color:#DFE6E9"><b>KEGUNAAN BAHAN API</b></td>
                    
                </tr>
                
            </tbody>

    </table>
    <table class="table table-bordered" width="100%">
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

        
    <table class="table table-bordered " width="100%">

    <tbody>

        <tr>
            <td colspan="4" style="background-color:#DFE6E9"><b>BELIAN BAHAN API</b></td>
            
        </tr>
        
    </tbody>

    </table>
    <table class="table table-bordered" width="100%">
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

        
    <table class="table table-bordered " width="100%">

    <tbody>

        <tr>
            <td colspan="4" style="background-color:#DFE6E9"><b>AKTIVITI & PENGESAHAN</b></td>
            
        </tr>

    <tr>
        
            <th>Alamat Aktiviti Dijalankan</th><td><?php echo e($permit->activity_address); ?></td>
            <th>Negeri Aktiviti Dijalankan</th><td><?php echo e($permit->permitState->name); ?></td>
    </tr>
    <tr>
        
            <th>Pejabat Pengeluar</th><td colspan="3"><?php echo e($permit->permitBranch->name); ?></td>
            
    </tr>
    <tr>
            <td colspan="4" style="background-color:#DFE6E9"><b>BUTIRAN STESEN MINYAK</b></td>
            
    </tr>
    <tr>
        <th>Syarikat Minyak</th><td><?php echo e($permit->permitOilco->name); ?></td>
        <th>Pembekal</th><td><?php echo e($permit->permitSupplier->name); ?></td>
    </tr>
    <tr>
        <th>Negeri</th><td><?php echo e($permit->permitFSState->name); ?></td>
        <th>Bandar</th><td><?php echo e($permit->permitFSCity->name); ?></td>
    </tr>
    <tr>
        <th>Nama Stesen</th><td><?php echo e($permit->fuelstation_name); ?></td>
        <th>Alamat Stesen</th><td><?php echo e($permit->fuelstation_address); ?></td>
    </tr>

    <tr style="background-color:#6FAB48">
        <th>Tarikh Permohonan</th><td colspan="3"><?php echo e($permit->application_date); ?></td>
        
    </tr>

    </tbody>

    </table>

        <br>
        <br><b><?php echo e(__('general.generated_by')); ?> : </b> <?php if(Auth::check()): ?> <?php echo e(Auth::user()->user_fullname); ?> <?php endif; ?>
        <br><b><?php echo e(__('general.generated_date')); ?> : </b> <?php echo date('d/m/Y H:i'); ?>

        

</body>
</html><?php /**PATH C:\wamp64\www\permitkhas\resources\views/permit/reportpermit_pdf.blade.php ENDPATH**/ ?>