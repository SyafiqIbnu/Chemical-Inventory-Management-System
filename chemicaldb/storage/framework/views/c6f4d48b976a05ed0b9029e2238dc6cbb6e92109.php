
<div class="row">
<?php $category='';   ?>
<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<?php if($product->product_category!=$category): ?><?php $category=$product->product_category ?> </div><div class="row" id="<?php echo e($product->productcategory->name); ?>"><?php else: ?>  <?php endif; ?>
    <?php $__env->startComponent('layouts.components.crud_card_col4'); ?>
            <?php $__env->slot('cardTitle'); ?> <b><?php echo e($product->name); ?></b></br> <?php $__env->endSlot(); ?>
            <?php $__env->slot('cardColor'); ?> card-primary <?php $__env->endSlot(); ?>
            
            <?php $__env->slot('cardBody'); ?>
            <?php echo Form::model($modelOrder, ['route' => ['order.store_products', $modelOrder->id],'method'=>'PUT','id'=>'orderForm']); ?>

                <img width=100px height=100px src="<?php echo e(asset('../bizmillaagent/storage/app/'.$product->image_path)); ?>"></img> </br>
                <?php echo e($product->description); ?></br>
                RM <?php echo e($product->price); ?></br>
                <?php echo Form::hidden('product_id',$product->id); ?>

                <?php echo Form::label('Kuantiti:'); ?>

                <?php echo Form::select('quantity',[0,1,2,3,4,5,6,7,8,9,10],null,['class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'quantity','name'=>'quantity']); ?>

            <?php $__env->endSlot(); ?>

            <?php $__env->slot('cardFooter'); ?>
            <?php echo Form::button('<i class="fa fa-floppy-o"></i> '.__('general.save').'',['class'=>'btn btn-success pull-right','type'=>'submit','id'=>'submitButton']); ?>

			<?php echo Form::close(); ?>

            
            <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

	


<?php /**PATH C:\wamp64\www\bizmillaagent\resources\views/order/create_form_products.blade.php ENDPATH**/ ?>