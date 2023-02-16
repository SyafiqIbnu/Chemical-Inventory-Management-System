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
    <th style="padding: 10px">No</th>
    <th style="padding: 10px">Laboratory</th>
    <th style="padding: 10px">Item Name</th>
    <th style="padding: 10px">Item Brand</th>
    <th style="padding: 10px">Item Cas</th>
    <th style="padding: 10px">Item Catalog</th>
    <th style="padding: 10px">Item Location</th>
    <th style="padding: 10px">Item Price</th>
    <th style="padding: 10px">Item Quantity</th>
    <th style="padding: 10px">Item Amount</th>
    <th style="padding: 10px">Item Supplier</th>
    <th style="padding: 10px">Date Opened</th>
    <th style="padding: 10px">Expiration Date</th>
    <th style="padding: 10px">Staff</th>
  </thead>
    <?php
    $i = 1; 
    ?>
    <?php $__currentLoopData = $chemicals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tbody>  
    <tr>
            <td><?php echo e($i++); ?></td>
            <td><?php echo e($item->getLaboratory->name); ?></td>
            <td><?php echo e($item->item_name); ?></td>
            <td><?php echo e($item->item_brand); ?></td>
            <td><?php echo e($item->item_cas); ?></td>    
            <td><?php echo e($item->item_catalog); ?></td>    
            <td><?php echo e($item->item_location); ?></td>    
            <td><?php echo e($item->item_price); ?></td>    
            <td><?php echo e($item->item_quantity); ?></td>                  
            <td><?php echo e($item->item_amount); ?></td>    
            <td><?php echo e($item->item_supplier); ?></td>    
            <td><?php echo e($item->date_opened); ?></td>    
            <td><?php echo e($item->expiration_date); ?></td>    
            <td><?php echo e($item->getStaff->name); ?></td>    
    </tr>
    </tbody>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
<script>
  console.log(locaStorage.setValue("sel"))
</script><?php /**PATH D:\xampp\htdocs\chemicaldb\resources\views/report/chemical_report_table.blade.php ENDPATH**/ ?>