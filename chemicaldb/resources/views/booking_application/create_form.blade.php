
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
@component('layouts.components.edit_modal_one_column',['for' => 'origin','required' => '1','label'=>__('booking_application.origin')]) 
@slot('field')
	{!! Form::text('origin',null,['class'=>'form-control','required','placeholder'=>__('booking_application.origin')])  !!}
@endslot 
@endcomponent
@component('layouts.components.edit_modal_one_column',['for' => 'destination','required' => '1','label'=>__('booking_application.destination')]) 
@slot('field')
	{!! Form::text('destination',null,['class'=>'form-control','required','placeholder'=>__('booking_application.origin')])  !!}
@endslot 
@endcomponent

@component('layouts.components.edit_modal_one_column',['for' => 'distance','required' => '1','label'=>__('booking_application.distance').' (KM)']) 
@slot('field')
	{!! Form::text('distance',null,['class'=>'form-control','required','placeholder'=>__('booking_application.distance_placeholder')])  !!}
@endslot 
@endcomponent



@push('scripts')
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
@endpush

@section('scripts')
    @parent
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script>
    <script src="/js/mapInput.js"></script>
    <script src="/js/mapInputDestination.js"></script>
    
@stop
