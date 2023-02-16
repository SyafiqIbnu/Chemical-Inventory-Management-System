@php
	if(!isset($cardColor)){
		$cardColor="card-primary";
	}

    $vehicleInfoActive="";
    $vehicleLicenseActive="";
    $vehicleMaintenanceActive="";
    $vehicleSummonActive="";
    $vehicleRoadTaxActive="";
    $vehicleOdometerActive="";
    $vehicleFuelActive="";
    $vehicleTollActive="";
    
    if($selectedTab=='vehicleinfo'){
        $vehicleInfoActive='active';
    }else if($selectedTab=='license'){
        $vehicleLicenseActive='active';
    }else if($selectedTab=='maintenance'){
        $vehicleMaintenanceActive='active';
    }else if($selectedTab=='summon'){
        $vehicleSummonActive='active';
    }else if($selectedTab=='roadtax'){
        $vehicleRoadTaxActive='active';
    }else if($selectedTab=='odometer'){
        $vehicleOdometerActive='active';
    }else if($selectedTab=='fuel'){
        $vehicleFuelActive='active';
    }else if($selectedTab=='toll'){
        $vehicleTollActive='active';
    }
@endphp

@include('layouts.components.session_message')

<div class="col-md-12">
    <div class="card card-primary card-outline card-outline-tabs">
        <div class="card-header p-0 border-bottom-0">
        <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">

            <li class="nav-item">
            <a class="nav-link {{$vehicleInfoActive}}" id="custom-tabs-three-vehicleinfo" data-toggle="pill" href="#" onclick="location.href='{{url('vehicle')}}/{{$vehicle_id}}'" role="tab" aria-controls="custom-tabs-three-vehicleinfo" >Maklumat Kenderaan</a>
            </li>

            <li class="nav-item">
            <a class="nav-link {{$vehicleLicenseActive}}" id="custom-tabs-three-license" data-toggle="pill" href="#" onclick="location.href='{{ url('vehicle_licen/index_by_vehicle') }}/{{$vehicle_id}}';" role="tab" aria-controls="custom-tabs-three-license">Lesen</a>
            </li>

            <li class="nav-item">
            <a class="nav-link {{$vehicleMaintenanceActive}}" id="custom-tabs-three-maintenance" data-toggle="pill" href="#" onclick="location.href='{{url('vehicle_maintenance/index_by_vehicle')}}/{{$vehicle_id}}'" role="tab" aria-controls="custom-tabs-three-maintenance">Penyelenggaraan</a>
            </li>

            <li class="nav-item">
            <a class="nav-link {{$vehicleSummonActive}}" id="custom-tabs-three-summon" data-toggle="pill" href="#" onclick="location.href='{{url('vehicle_summon/index_by_vehicle')}}/{{$vehicle_id}}'" role="tab" aria-controls="custom-tabs-three-summons">Saman</a>
            </li>

            <li class="nav-item">
            <a class="nav-link {{$vehicleRoadTaxActive}}" id="custom-tabs-three-roadtax" data-toggle="pill" href="#" onclick="location.href='{{url('vehicle_roadtaxe/index_by_vehicle')}}/{{$vehicle_id}}'" role="tab" aria-controls="custom-tabs-three-roadtax">Cukai Jalan</a>
            </li>

            <li class="nav-item">
            <a class="nav-link {{$vehicleOdometerActive}}" id="custom-tabs-three-odometer" data-toggle="pill" href="#" onclick="location.href='{{url('vehicle_odometer/index_by_vehicle')}}/{{$vehicle_id}}'" role="tab" aria-controls="custom-tabs-three-odometer">Odometer</a>
            </li>
            
            <li class="nav-item">
            <a class="nav-link {{$vehicleFuelActive}}" id="custom-tabs-three-fuel" data-toggle="pill" href="#" onclick="location.href='{{url('vehicle_fuel/index_by_vehicle')}}/{{$vehicle_id}}'" role="tab" aria-controls="custom-tabs-three-fuel">Bahan Api</a>
            </li>
            
            <li class="nav-item">
            <a class="nav-link {{$vehicleTollActive}}" id="custom-tabs-three-toll" data-toggle="pill" href="#" onclick="location.href='{{url('vehicle_toll/index_by_vehicle')}}/{{$vehicle_id}}'" role="tab" aria-controls="custom-tabs-three-toll">Tol</a>
            </li>
            
        </ul>
        </div>

        <div class="card-body">
        <div class="tab-content" id="custom-tabs-three-tabContent">
            <div class="tab-pane fade active show" id="custom-tabs-three-" role="tabpanel" aria-labelledby="custom-tabs-three-">
            {{$content}}
            </div>
        </div>
        </div>
        <!-- /.card -->
    </div>
</div>