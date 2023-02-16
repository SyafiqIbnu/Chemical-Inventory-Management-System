
<table class="table table-bordered ">

<tbody>



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



</tbody>

</table><?php /**PATH C:\wamp64\www\permitkhas\resources\views/permit_search/maklumat_stesen.blade.php ENDPATH**/ ?>