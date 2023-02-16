<style>
    table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

    td, th {
  border: 1px solid #101010;
  text-align: left;
  padding: 8px;
}

    td:nth-child(even) {
  background-color: #e8e4e4;
}
</style>
<table>
   
    <thead>
    <th style="padding: 10px"> No</th>
    <th style="padding: 10px">Faculty</th>
    <th style="padding: 10px">Laboratory Name</th>
    <th style="padding: 10px">Laboratory Type</th>
    <th style="padding: 10px">Location</th>
    </thead>
    <?php
    $i = 1; 
    ?>
    <?php $__currentLoopData = $laboratories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tbody>  
    <tr>
            <td><?php echo e($i++); ?></td>
            <td id="faculty"><?php echo e($item->getFaculty->name); ?></td>
            <td><?php echo e($item->name); ?></td>
            <td id="type"><?php echo e($item->getType->name); ?></td>
            <td id="location"><?php echo e($item->location); ?></td>    
    </tr>
    </tbody>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
<script>
  console.log(locaStorage.setValue("sel"))
</script><?php /**PATH D:\xampp\htdocs\chemicaldb\resources\views/report/laboratory_report_table.blade.php ENDPATH**/ ?>