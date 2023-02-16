<table class="table table-bordered ">

        <tbody>

           
            <tr>
            <?php if($modelPermitApplication->accountHolder->isPbt==1): ?>
                <th>No PBT</th><td><?php echo e($modelPermitApplication->pbt_no); ?></td>
            <?php else: ?>
                <th>No Pendaftaran	</th><td><?php echo e($modelPermitApplication->registration_no); ?></td>
            <?php endif; ?>
                <th>Nama Syarikat/Agensi</th><td><?php echo e($modelPermitApplication->company_name); ?></td>
                
            </tr>
            
            <tr>
                <th>Nama Pemohon</th><td><?php echo e($modelPermitApplication->accountHolder->name); ?></td>
                <th>No K/P</th><td><?php echo e($modelPermitApplication->accountHolder->icno); ?></td>
                
            </tr>
           
            <tr>
                <th>Kategori Pemohon</th><td><?php echo e($modelPermitApplication->permitCategory->name); ?></td>
                <th>Tarikh Permohonan</th><td><?php echo e($modelPermitApplication->submitted_at); ?></td>
            </tr>
            <tr>
                <th>Alamat</td><td colspan="3"><?php echo e($modelPermitApplication->address1); ?></br>
                <?php echo e($modelPermitApplication->address2); ?></br>
                <?php echo e($modelPermitApplication->postcode); ?>,<?php echo e($modelPermitApplication->permitCity->name); ?></br>
                <?php echo e($modelPermitApplication->permitDistrict->name); ?>,<?php echo e($modelPermitApplication->permitState->name); ?>

                </td>
                
            </tr>
            <tr>
                <th>No Telefon</th><td><?php echo e($modelPermitApplication->phone_no); ?></td>
                <th>No Faks</th><td><?php echo e($modelPermitApplication->fax_no); ?></td>
                
            </tr>
            <tr>
               
                <th>No Handphone</th><td><?php echo e($modelPermitApplication->mobile_no); ?></td>
                <th>Email</th><td><?php echo e($modelPermitApplication->email); ?></td>
            </tr>
        </tbody>

</table><?php /**PATH C:\wamp64\www\permitkhas\resources\views/permit_application_reviewer/maklumat_pemohon.blade.php ENDPATH**/ ?>