

<table class="table table-bordered">
                <tbody>
                <tr>
                    <th>Bil</th>
                    <th>Menu</th>
                    <th>Kuantiti</th>
                    <th>Jumlah (RM)</th>
                    <th>Buang</th>
                </tr>
               
                <?php $bil=0; $totalamount=0; $bilpax=0; ?>
                    <?php $__currentLoopData = $order_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $bil++; $totalamount+=$product->amount; $bilpax+=$product->bil_pax; ?>
                        <tr>
                            <td><?php echo e($bil); ?></td>
                            <td><?php echo e($product->product->name); ?></td>
                            <td><?php echo e($product->quantity); ?> </td>
                            <td> <?php echo e($product->amount); ?></td>
                            
                            <td>
                            <?php echo Form::open(['route' => ['order_product.destroy', $product->id], 'method' => 'delete']); ?>

                            <?php echo Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger']); ?></div>
                            <?php echo Form::close(); ?>

                            </td>
                        </tr>
                       
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr>
                <th colspan="4">JUMLAH PAX</th>
                <th><?php echo e(number_format($bilpax)); ?></th>
                </tr>
                <tr>
                <th colspan="4">JUMLAH KESELURUHAN</th>
                <th>RM <?php echo e(number_format($totalamount,2)); ?></th>
                </tr>
                
                </tbody>
            </table><?php /**PATH C:\wamp64\www\bizmillaagent\resources\views/order/product_summary.blade.php ENDPATH**/ ?>