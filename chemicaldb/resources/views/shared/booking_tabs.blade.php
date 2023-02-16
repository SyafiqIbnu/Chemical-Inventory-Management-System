@php
	if(!isset($cardColor)){
		$cardColor="card-primary";
	}

    $bookingInfoActive="";
    $bookingApplicationActive="";
    $bookingPassengerActive="";
    $bookingVehicleActive="";
    $bookingDriverActive="";
    $bookingAcceptanceActive="";
    $bookingStartJobActive="";
    $bookingLogTollActive="";
    $bookingLogFuelActive="";
    $bookingEndJobActive="";   
    $bookingSubmissionActive="";
    $bookingApprovalActive="";    
    
    if($selectedTab=='bookinginfo'){
        $bookingInfoActive='active';
    }else if($selectedTab=='application'){
        $bookingApplicationActive='active';
    }else if($selectedTab=='passenger'){
        $bookingPassengerActive='active';
    }else if($selectedTab=='vehicle'){
        $bookingVehicleActive='active';
    }else if($selectedTab=='driver'){
        $bookingDriverActive='active';
    }else if($selectedTab=='acceptance'){
        $bookingAcceptanceActive='active';
    }else if($selectedTab=='startjob'){
        $bookingStartJobActive='active';
    }else if($selectedTab=='logtoll'){
        $bookingLogTollActive='active';
    }else if($selectedTab=='logfuel'){
        $bookingLogFuelActive='active';
    }else if($selectedTab=='endjob'){
        $bookingEndJobActive='active';
    }else if($selectedTab=='bookingsubmission'){
        $bookingSubmissionActive='active';
    }else if($selectedTab=='bookingapproval'){
        $bookingApprovalActive="active";    
    }

    


    $bookingInfoVisible="none";
    $bookingApplicationVisible="none";
    $bookingPassengerVisible="none";
    $bookingVehicleVisible="none";;
    $bookingDriverVisible="none";
    $bookingAcceptanceVisible="none";
    $bookingStartJobVisible="none";
    $bookingLogTollVisible="none";
    $bookingLogFuelVisible="none";
    $bookingEndJobVisible="none";   
    $bookingSubmissionVisible="none";   
    $bookingApprovalVisible="none";   

    if($modelBooking->booking_status_id==1){
        $bookingInfoVisible="view";
        $bookingPassengerVisible="view";
        if($modelBooking->created_by==Auth::user()->id){
            $bookingInfoVisible="edit";
            $bookingPassengerVisible="edit";
            $bookingSubmissionVisible="edit";
        }

    }else if($modelBooking->booking_status_id==2){
        $bookingInfoVisible="view";
        $bookingPassengerVisible="view";

        if($modelBooking->branch_id==Auth::user()->staff->branch_id && \App\Helpers\PermissionHelper::hasBookingApprovalEdit(false)){
            $bookingApprovalVisible='edit';            
        }

    }elseif($modelBooking->booking_status_id==3){
        $bookingInfoVisible="view";
        $bookingPassengerVisible="view";
        $bookingApprovalVisible='none';

        //If booking officer and office == officer office
        if($modelBooking->branch_id==Auth::user()->staff->branch_id && \App\Helpers\PermissionHelper::hasBookingApprovalEdit(false)){
            $bookingVehicleVisible='edit';            
        }
    }elseif($modelBooking->booking_status_id==4){
        $bookingInfoVisible="view";
        $bookingPassengerVisible="view";
        $bookingVehicleVisible='view'; 
        if($modelBooking->branch_id==Auth::user()->staff->branch_id && \App\Helpers\PermissionHelper::hasBookingApprovalEdit(false)){
            $bookingDriverVisible='edit';            
        }

    }elseif($modelBooking->booking_status_id==7){
        $bookingInfoVisible="view";
        $bookingPassengerVisible="view";
        $bookingVehicleVisible='view'; 
        $bookingDriverVisible='view';   

        if($modelBooking->branch_id==Auth::user()->staff->branch_id && \App\Helpers\PermissionHelper::hasBookingApprovalEdit(false)){
            $bookingStartJobVisible='edit';
        }
      
    }elseif($modelBooking->booking_status_id==8){
        $bookingInfoVisible="view";
        $bookingPassengerVisible="view";
        $bookingVehicleVisible='view'; 
        $bookingDriverVisible='view';   
        $bookingStartJobVisible='none';

        if($modelBooking->branch_id==Auth::user()->staff->branch_id && \App\Helpers\PermissionHelper::hasBookingApprovalEdit(false)){
            $bookingLogTollVisible="edit";
            $bookingLogFuelVisible="edit";
            $bookingEndJobVisible="edit";   
        }
      
    }elseif($modelBooking->booking_status_id==9){
        $bookingInfoVisible="view";
        $bookingPassengerVisible="view";
        $bookingVehicleVisible='view'; 
        $bookingDriverVisible='view';   
        $bookingLogTollVisible='view';
        $bookingLogFuelVisible='view';
        $bookingEndJobVisible='view';
        $bookingStartJobVisible='view';
        $bookingApprovalVisible='view';
    }



@endphp

@include('layouts.components.session_message')

<div class="col-md-12">
    <div class="card card-primary card-outline card-outline-tabs">
        <div class="card-header p-0 border-bottom-0">
        <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">

            @if($bookingInfoVisible !="none")
            <li class="nav-item">
            <a class="nav-link {{$bookingInfoActive}}" id="custom-tabs-three-vehicleinfo" data-toggle="pill" href="#" onclick="location.href='{{url('booking')}}/{{$booking_id}}'" role="tab" aria-controls="custom-tabs-three-bookinginfo" >Maklumat Tempahan</a>
            </li>
            @endif

            @if($bookingInfoVisible !="none")
            <li class="nav-item">
            <a class="nav-link {{$bookingApplicationActive}}" id="custom-tabs-three-application" data-toggle="pill" href="#" onclick="location.href='{{ url('booking_applications/index_by_booking') }}/{{$booking_id}}';" role="tab" aria-controls="custom-tabs-three-application">Permohonan</a>
            </li>
            @endif

            @if($bookingPassengerVisible !="none")
            <li class="nav-item">
            <a class="nav-link {{$bookingPassengerActive}}" id="custom-tabs-three-pasengger" data-toggle="pill" href="#" onclick="location.href='{{ url('booking_passenger/index_by_booking') }}/{{$booking_id}}';" role="tab" aria-controls="custom-tabs-three-passenger">Penumpang</a>
            </li>
            @endif

            @if($bookingSubmissionVisible !="none")
            <li class="nav-item">
            <a class="nav-link {{$bookingSubmissionActive}}" id="custom-tabs-three-submission" data-toggle="pill" href="#" onclick="location.href='{{ url('booking/submission') }}/{{$booking_id}}';" role="tab" aria-controls="custom-tabs-three-submission">Hantar Tempahan</a>
            </li>
            @endif

            @if($bookingApprovalVisible !="none")
            <li class="nav-item">
            <a class="nav-link {{$bookingApprovalActive}}" id="custom-tabs-three-approval" data-toggle="pill" href="#" onclick="location.href='{{ url('booking/approval') }}/{{$booking_id}}';" role="tab" aria-controls="custom-tabs-three-approval">Kelulusan Pegawai</a>
            </li>
            @endif

            @if($bookingVehicleVisible !="none")
            <li class="nav-item">
            <a class="nav-link {{$bookingVehicleActive}}" id="custom-tabs-three-vehicle" data-toggle="pill" href="#" onclick="location.href='{{ url('booking_vehicle') }}/{{$booking_id}}';" role="tab" aria-controls="custom-tabs-three-vehicle">Kenderaan</a>
            </li>
            @endif

            @if($bookingDriverVisible !="none")
            <li class="nav-item">
            <a class="nav-link {{$bookingDriverActive}}" id="custom-tabs-three-driver" data-toggle="pill" href="#" onclick="location.href='{{ url('booking_driver') }}/{{$booking_id}}';" role="tab" aria-controls="custom-tabs-three-driver">Pemandu</a>
            </li>
            @endif

            @if($bookingAcceptanceVisible !="none")            
            <li class="nav-item">
            <a class="nav-link {{$bookingAcceptanceActive}}" id="custom-tabs-three-acceptance" data-toggle="pill" href="#" onclick="location.href='{{ url('booking/driver_acceptance') }}/{{$booking_id}}';" role="tab" aria-controls="custom-tabs-three-acceptance">Penerimaan Pemandu</a>
            </li>
            @endif

            @if($bookingStartJobVisible !="none")      
            <li class="nav-item">
            <a class="nav-link {{$bookingStartJobActive}}" id="custom-tabs-three-startjob" data-toggle="pill" href="#" onclick="location.href='{{ url('booking/startjob') }}/{{$booking_id}}';" role="tab" aria-controls="custom-tabs-three-startjob">Mula Tugas</a>
            </li>
            @endif

            @if($bookingLogTollVisible !="none")   
            <li class="nav-item">
            <a class="nav-link {{$bookingLogTollActive}}" id="custom-tabs-three-log-toll" data-toggle="pill" href="#" onclick="location.href='{{ url('booking_log/toll') }}/{{$booking_id}}';" role="tab" aria-controls="custom-tabs-three-log-toll">Log Tol</a>
            </li>
            @endif

            @if($bookingLogFuelVisible !="none")   
            <li class="nav-item">
            <a class="nav-link {{$bookingLogFuelActive}}" id="custom-tabs-three-log-fuel" data-toggle="pill" href="#" onclick="location.href='{{ url('booking_log/fuel') }}/{{$booking_id}}';" role="tab" aria-controls="custom-tabs-three-log-fuel">Log Bahan Api</a>
            </li>
            @endif

            @if($bookingEndJobVisible !="none")   
            <li class="nav-item">
            <a class="nav-link {{$bookingEndJobActive}}" id="custom-tabs-three-endjob" data-toggle="pill" href="#" onclick="location.href='{{ url('booking/endjob') }}/{{$booking_id}}';" role="tab" aria-controls="custom-tabs-three-endjob">Tamat Tugas</a>
            </li>
            @endif

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

