<table class="table table-bordered ">

        <tbody>

           
            <tr>
            <?php if($permit->accountHolder->isPbt==1): ?>
                <th>No PBT</th><td><?php echo e($permit->pbt_no); ?></td>
            <?php else: ?>
                <th>No Pendaftaran	</th><td><?php echo e($permit->registration_no); ?></td>
            <?php endif; ?>
                <th>Nama Syarikat/Agensi</th><td><?php echo e($permit->company_name); ?></td>
                
            </tr>
            <tr>
                <th>Nama Pemohon</th><td><?php echo e($permit->accountHolder->name); ?></td>
                <th>No K/P</th><td><?php echo e($permit->accountHolder->icno); ?></td>
                
            </tr>
           
            <tr>
                <th>Kategori Pemohon</th><td><?php echo e($permit->permitCategory->name); ?></td>
                <th>Tarikh Permohonan</th><td><?php echo e($permit->permitApplication->submitted_at); ?></td>
            </tr>
            <tr>
                <th>Alamat</td><td colspan="3"><?php echo e($permit->address1); ?></br>
                <?php echo e($permit->address2); ?></br>
                <?php echo e($permit->postcode); ?>,<?php echo e($permit->permitCity->name); ?></br>
                <?php echo e($permit->permitDistrict->name); ?>,<?php echo e($permit->permitState->name); ?>

                </td>
                
            </tr>
            <tr>
                <th>No Telefon</th><td><?php echo e($permit->phone_no); ?></td>
                <th>No Faks</th><td><?php echo e($permit->fax_no); ?></td>
                
            </tr>
            <tr>
               
                <th>No Handphone</th><td><?php echo e($permit->mobile_no); ?></td>
                <th>Email</th><td><?php echo e($permit->email); ?></td>
            </tr>
        </tbody>

</table><?php /**PATH C:\wamp64\www\permitkhas\resources\views/permit_search/maklumat_pemohon.blade.php ENDPATH**/ ?>