<table class="table table-bordered ">

        <tbody>

           
            <tr>
                <th>No Pendaftaran	</th><td><?php echo e($modelPermitApplication->registration_no); ?></td>
                <th>Nama Syarikat/Agensi</th><td><?php echo e($modelPermitApplication->company_name); ?></td>
                
            </tr>
            <tr>
                <th>Nama Pemohon	</th><td><?php echo e($modelPermitApplication->name); ?></td>
                <th>No K/P</th><td><?php echo e($modelPermitApplication->icno); ?></td>
                
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

</table><?php /**PATH C:\wamp64\www\permitkhas\resources\views/permit_application/maklumat_pemohon.blade.php ENDPATH**/ ?>