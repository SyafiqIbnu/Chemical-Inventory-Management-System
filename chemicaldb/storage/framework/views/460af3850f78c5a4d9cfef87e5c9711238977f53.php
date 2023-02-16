
<div class="row">
<?php $categoryid=''; $totalayam=0; $totalkambing=0; $totalcondiments=0; $totalnasi=0;  ?>
<?php $__currentLoopData = $product_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php $__env->startComponent('layouts.components.crud_card'); ?>
        <?php $__env->slot('cardTitle'); ?> <b> JENIS <?php echo e($category->name); ?></b></br> <?php $__env->endSlot(); ?>
        <?php $__env->slot('cardColor'); ?> card-primary <?php $__env->endSlot(); ?>

        <?php $__env->slot('cardBody'); ?>
        <?php $__currentLoopData = $order_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
            <?php if($product->product->product_category!=$categoryid): ?>
                <?php $categoryid=$product->product->product_category ?>
                <?php if($product->product->food_group==1){
                        $totalayam+=$product->bil_pax;
                        $totalnasi+=$product->bil_pax;
                    }
                    if($product->product->food_group==2){
                        $totalkambing+=$product->bil_pax;
                        $totalnasi+=$product->bil_pax;
                    }
                    if($product->product->food_group==3){
                        $totalayam+=$product->bil_pax;
                        $totalkambing+=$product->bil_pax;
                        $totalnasi+=$product->bil_pax;
                    }
                    if($product->product->food_group==4){
                        $totalnasi+=$product->quantity;
                    }
                    if($product->product->has_condiments==1){
                        $totalcondiments=$product->bil_pax;
                    }
                ?>
                <table class="table table-bordered">
                <tbody>
                <tr>
                    <th>Menu</th>
                    <th>Qty</th>
                </tr>
                <tr>
                    <td><?php echo e($product->product->name); ?> (<?php echo e($product->product->pax_no); ?>)</td>
                    <td><?php echo e($product->quantity); ?> </td>
                </tr>
                </tbody>
                </table>
                
                </div><div class="row">
            <?php else: ?>  <?php endif; ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php $__env->endSlot(); ?>

        <?php $__env->slot('cardFooter'); ?>
            
        <?php $__env->endSlot(); ?>

    <?php echo $__env->renderComponent(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->startComponent('layouts.components.crud_card'); ?>
        <?php $__env->slot('cardTitle'); ?> <b> SUMMARY </b></br> <?php $__env->endSlot(); ?>
        <?php $__env->slot('cardColor'); ?> card-warning <?php $__env->endSlot(); ?>

        <?php $__env->slot('cardBody'); ?>
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <th>TOTAL AYAM</th>
                    <th><?php echo e($totalayam); ?></th>
                </tr>
                <tr>
                    <th>TOTAL KAMBING</th>
                    <th><?php echo e($totalkambing); ?></th>
                </tr>
                <tr>
                    <th>TOTAL PAX (NASI)</th>
                    <th><?php echo e($totalnasi); ?></th>
                </tr>
                <tr>
                    <th>TOTAL CONDIMENTS (DALCA,SALAD,SAMBAL)</th>
                    <th><?php echo e($totalcondiments); ?></th>
                </tr>
                </tbody>
                </table>
        <?php $__env->endSlot(); ?>

        <?php $__env->slot('cardFooter'); ?>
            
        <?php $__env->endSlot(); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\wamp64\www\bizmillaagent\resources\views/order/kitchen_summary_individual.blade.php ENDPATH**/ ?>