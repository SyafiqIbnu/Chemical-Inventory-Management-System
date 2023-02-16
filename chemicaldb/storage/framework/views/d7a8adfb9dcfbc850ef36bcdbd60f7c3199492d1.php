<?php $__env->startSection('htmlheader_title'); ?>
Invoice
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
Invoice: #<?php echo e($booking->id); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-content'); ?>

<a class="btn btn-success" onClick="printreceipt('receipt');" id="btn2" href="#">Print</a>
<a class="btn btn-warning" onClick="history.back();" id="btn2" href="#">Back</a>
</br></br>
<div id="receipt">
<table class="table table-bordered" class="table">
    <thead>
        <tr>
            <th colspan="4"><h3>Invoice for Booking # <?php echo e($bookingApplication->id); ?></h3></th>
            
        </tr>
        <tr>
            <th style="background-color:#CAEEF9;" colspan="4">Booking Information</th>
            
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Customer's Name</td>
            <td><?php echo e(Auth::user()->name); ?></td>
            
        </tr>
        
        
        <tr>
            <td>Origin</td>
            <td><?php echo e($bookingApplication->origin); ?></td>
            <td>Destination</td>
            <td><?php echo e($bookingApplication->destination); ?></td>
        </tr>
        <tr>
            <td>Delivery Date</td>
            <td><?php echo e(date_format(new DateTime($booking->delivery_date),'d-m-Y')); ?></td>
            <td>Distance</td>
            <td><?php echo e($bookingApplication->distance); ?></td>
            
        </tr>
    </tbody>
</table>

<table class="table table-bordered" class="table">
    <thead>
        
        <tr>
            <th style="background-color:#CAEEF9;" colspan="9">Cargo Information</th>
            
        </tr>
        <tr>
            <th>No.</th>
            <th>Cargo Type</th>
            <th>Weight(kg)</th>
            <th>Height(m)</th>
            <th>Length(m)</th>
            <th>Width(m)</th>
            <th>Radius(m)</th>
            <th>Diameter(m)</th>
            <th>Quantity</th>
            
        </tr>
    </thead>
    <?php $bil=1;  ?>
    <tbody>
        <?php $__currentLoopData = $bookingCargos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bookingCargo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($bil++); ?></td>
                <td><?php echo e($bookingCargo->cargoType->name); ?></td>
                <td><?php echo e($bookingCargo->weight); ?></td>
                <td><?php echo e($bookingCargo->height); ?></td>
                <td><?php echo e($bookingCargo->length); ?></td>
                <td><?php echo e($bookingCargo->width); ?></td>
                <td><?php echo e($bookingCargo->radius); ?></td>
                <td><?php echo e($bookingCargo->diameter); ?></td>
                <td><?php echo e($bookingCargo->unit); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<table class="table table-bordered" class="table">
    <thead>
        
        <tr>
            <th style="background-color:#CAEEF9;" colspan="9">Confirmed Vehicle Information</th>
            
        </tr>
        
    </thead>
    
    <tbody>
        <tr>
            <td>Cargo Quantity</td>
            <td><?php echo e($cargo_quantity); ?></td>
            <td>Booking Date</td>
            <td><?php echo e($booking->updated_at); ?></td>
            
        </tr>
        <tr>
            <td>Vehicle Type</td>
            <td><?php echo e($booking->vehicleType->name); ?></td>
            <td>No. of Vehicles</td>
            <td><?php echo e($booking->numVehicles); ?></td>
            
        </tr>
        <tr>
            <td>Cost Rate (RM)</td>
            <td><?php echo e($booking->costRateVehicles); ?></td>
            <td>Delivery Date</td>
            <td><?php echo e($booking->delivery_date); ?></td>
            
        </tr>
    </tbody>
</table>



</br></br>
<table class="table">
    <tbody>
    <tr>
        <td width="33%">Prepare By:</br></br></br>..................................................</br>Date:<?php echo e(date_format(new DateTime($printdate),'d/m/Y')); ?></br></td>
        <td width="33%">Received By:</br></br></br>..................................................</br></td>
        
    </tr>
    </tbody>
</table>
</br></br>
</div>

<?php echo $__env->make('booking.menu_active', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<script language="javascript">
    function printreceipt(printpage)
    {
        var headstr = "<html><head><title></title></head><body>";
        var footstr = "</body>";
		var newstr = document.all.item(printpage).innerHTML;
        var oldstr = document.body.innerHTML;
        document.body.innerHTML = headstr+newstr+footstr;
        window.print();
        document.body.innerHTML = oldstr;
        return false;
    }

</script>





<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\factohub\resources\views/booking/invoice.blade.php ENDPATH**/ ?>