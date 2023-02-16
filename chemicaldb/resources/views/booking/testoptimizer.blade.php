
@extends('layouts.app')

@section('page_title')
TEST OPTIMIZER AZURE API
@endsection

@section('page_description')
TEST OPTIMIZER
@endsection

@section('main-content')
<body>
     
         <div class="col-sm-6 col-sm-offset-3">
    
      <form>
        <div id="originAddr-group" class="form-group">
          <label for="originAddr">originAddr</label>
          <input type="text" class="form-control" id="originAddr" name="originAddr" placeholder="originAddr"/>
        </div>
        <div id="destinationAddr-group" class="form-group">
          <label for="destinationAddr">destinationAddr</label>
          <input type="text" class="form-control" id="destinationAddr" name="destinationAddr" placeholder="destinationAddr"/>
        </div>
        <div id="distance-group" class="form-group">
          <label for="distance">distance</label>
          <input type="text" class="form-control" id="distance" name="distance" placeholder="distance"/>
        </div>
        <div id="durationHrs-group" class="form-group">
          <label for="durationHrs">durationHrs</label>
          <input type="text" class="form-control" id="durationHrs" name="durationHrs" placeholder="durationHrs"/>
        </div>
        <div id="durationMins-group" class="form-group">
          <label for="durationMins">durationMins</label>
          <input type="text" class="form-control" id="durationMins" name="durationMins" placeholder="durationMins"/>
        </div>
        <div id="cargoQuantity-group" class="form-group">
          <label for="cargoQuantity">cargoQuantity</label>
          <input type="text" class="form-control" id="cargoQuantity" name="cargoQuantity" placeholder="cargoQuantity"/>
        </div>

        <div id="cargoid-group" class="form-group">
          <label for="cargoid">cargoid</label>
          <input type="text" class="form-control" id="cargoid" name="cargoid" placeholder="cargoid"/>
        </div>
        <div id="cargoWeight-group" class="form-group">
          <label for="cargoWeight">cargoWeight</label>
          <input type="text" class="form-control" id="cargoWeight" name="cargoWeight" placeholder="cargoWeight"/>
        </div>
        <div id="cargoLength-group" class="form-group">
          <label for="cargoLength">cargoLength</label>
          <input type="text" class="form-control" id="cargoLength" name="cargoLength" placeholder="cargoLength"/>
        </div>
        <div id="cargoWidth-group" class="form-group">
          <label for="cargoWidth">cargoWidth</label>
          <input type="text" class="form-control" id="cargoWidth" name="cargoWidth" placeholder="cargoWidth"/>
        </div>
        <div id="cargoHeight-group" class="form-group">
          <label for="cargoHeight">cargoHeight</label>
          <input type="text" class="form-control" id="cargoHeight" name="cargoHeight" placeholder="cargoHeight"/>
        </div>
        <div id="cargoRadius-group" class="form-group">
          <label for="cargoRadius">cargoRadius</label>
          <input type="text" class="form-control" id="cargoRadius" name="cargoRadius" placeholder="cargoRadius"/>
        </div>
        <div id="cargoDiameter-group" class="form-group">
          <label for="cargoDiameter">cargoDiameter</label>
          <input type="text" class="form-control" id="cargoDiameter" name="cargoDiameter" placeholder="cargoDiameter"/>
        </div>

        <button type="button" id="loginBtn" class="btn btn-success">Test Optimizer</button>
	
      </form>
      
    </div>

      
</body>
@endsection
{!! Form::hidden('sessionid','')  !!}

@push('scripts')
        <script>
            $(document).ready(function()
                  {
                  var sessionData =
                  {
                     sessionid: 0,
                     expires: 0
                  };

                  $("#loginBtn").click(function(event)
                  {
                     var cargoData={
                        cargoid: $("#cargoid").val(),
                        cargoWeight: $("#cargoWeight").val(),
                        cargoLength: $("#cargoLength").val(),
                        cargoWidth: $("#cargoWidth").val(),
                        cargoHeight: $("#cargoHeight").val(),
                        cargoRadius: $("#cargoRadius").val(),
                        cargoDiameter: $("#cargoDiameter").val()
                     }
                     var formData =
                     {
                        originAddr: $("#originAddr").val(),
                        destinationAddr: $("#destinationAddr").val(),
                        distance: $("#distance").val(),
                        durationHrs: $("#durationHrs").val(),
                        durationMins: $("#durationMins").val(),
                        cargoQuantity: $("#cargoQuantity").val(),
                        cargoData: cargoData
                        
                     };

                     var headerBanner =
                     {
                        "X-Sessionid": sessionData.sessionid,
                        "X-Expires": sessionData.expires
                     };

                     $.ajax(
                     {
                        method: "POST",
                        url: "http://factohubdemo.azurewebsites.net/api/web/forms/optimize",
                        data: formData,
                        contentType: "application/x-www-form-urlencoded",
                        headers: headerBanner,
                        dataType: "json",
                        success: function(data)
                            
                           {
                           sessionData.sessionid = data.sessionid;
                           sessionData.expires = data.expires;
                           alert("Successful. sessionid=" + data.sessionid + " and expires=" + data.expires);
                           },
                           error: function(error)
                           {
                           alert("Failed.");
                           },
                           processData: true
                     });
                  });

                  
                  });
                     
        </script>
@endpush

