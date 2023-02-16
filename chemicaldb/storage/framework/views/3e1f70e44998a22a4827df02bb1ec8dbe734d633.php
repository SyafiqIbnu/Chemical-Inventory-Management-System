
<!--
<div class="form-group">
    <label for="address_address">Origin</label>
    <input type="text" id="address-input" name="address_address" class="form-control map-input">
    <input type="hidden" name="address_latitude" id="address-latitude" value="0" />
    <input type="hidden" name="address_longitude" id="address-longitude" value="0" />
</div>

<div id="address-map-container" style="width:100%;height:400px; ">
    <div style="width: 100%; height: 100%" id="address-map"></div>
</div>

<div class="form-group">
    <label for="address_address">Destination</label>
    <input type="text" id="address-input" name="address_address" class="form-control map-input-destination">
    <input type="hidden" name="address_latitude" id="address-latitude" value="0" />
    <input type="hidden" name="address_longitude" id="address-longitude" value="0" />
</div>


<button id="testButton" type=""button">Calculate Distance</button>

-->
<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'origin','required' => '1','label'=>__('booking_application.origin')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('origin',null,['class'=>'form-control','required','placeholder'=>__('booking_application.origin')]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>
<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'destination','required' => '1','label'=>__('booking_application.destination')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('destination',null,['class'=>'form-control','required','placeholder'=>__('booking_application.origin')]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'distance','required' => '1','label'=>__('booking_application.distance').' (KM)']); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('distance',null,['class'=>'form-control','required','placeholder'=>__('booking_application.distance_placeholder')]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>



<?php $__env->startPush('scripts'); ?>
<script type="text/javascript">
    
    
    $(document).on('click', '#testButton', function(event) {
        event.preventDefault();
        /* Act on the event */

        getDistance();

    });
    var getDistance = function(){
        $.ajax({
            type:'GET',
            url:'../calculateDistance/cheras/gombak/k', //Make sure your URL is correct
            dataType: 'json', //Make sure your returning data type dffine as json

            success:function(data){
                $("#distance").html(data);
                console.log(data); //Please share cosnole data
                if(data.msg) //Check the data.msg isset?
                {
                    $("#distance").html(data.msg); //replace html by data.msg
                }

            }
        });
    }

</script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('scripts'); ?>
    ##parent-placeholder-16728d18790deb58b3b8c1df74f06e536b532695##
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(env('GOOGLE_MAPS_API_KEY')); ?>&libraries=places&callback=initialize" async defer></script>
    <script src="/js/mapInput.js"></script>
    <script src="/js/mapInputDestination.js"></script>
    
<?php $__env->stopSection(); ?>
<?php /**PATH D:\xampp\htdocs\zonkargo\resources\views/booking_application/create_form.blade.php ENDPATH**/ ?>