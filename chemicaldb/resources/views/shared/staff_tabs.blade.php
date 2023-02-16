@php
	if(!isset($cardColor)){
		$cardColor="card-primary";
	}

    $staffInfoActive="";
    $staffLicenseActive="";
    $staffLeaveActive='';
    $staffSummonActive='';
    $staffDisciplineActive='';

    if($selectedTab=='staffinfo'){
        $staffInfoActive='active';
    }else if($selectedTab=='stafflicense'){
        $staffLicenseActive='active';
    }else if($selectedTab=='staffleave'){
        $staffLeaveActive='active';
    }else if($selectedTab=='staffsummon'){
        $staffSummonActive='active';
    }else if($selectedTab=='staffdiscipline'){
        $staffDisciplineActive='active';
    }
    
    
@endphp

@include('layouts.components.session_message')

<div class="col-md-12">
    <div class="card card-primary card-outline card-outline-tabs">
        <div class="card-header p-0 border-bottom-0">
        <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">

            <li class="nav-item">
            <a class="nav-link {{$staffInfoActive}}" id="custom-tabs-three-staffinfo" data-toggle="pill" href="{{url('/staff')}}/{{$staffid}}" onclick="location.href='{{url('staff')}}/{{$staffid}}'" role="tab" aria-controls="custom-tabs-three-staffinfo" >Maklumat Kakitangan</a>
            </li>

            <li class="nav-item">
            <a class="nav-link {{$staffLicenseActive}}" id="custom-tabs-three-license" data-toggle="pill" href="{{url('staff_license/index_by_staff')}}/{{$staffid}}" onclick="location.href='{{ url('staff_licen/index_by_staff') }}/{{$staffid}}';" role="tab" aria-controls="custom-tabs-three-license">Lesen</a>
            </li>

            <li class="nav-item">
            <a class="nav-link {{$staffLeaveActive}}" id="custom-tabs-three-leave" data-toggle="pill" href="#" onclick="location.href='{{url('leave/index_by_staff')}}/{{$staffid}}'" role="tab" aria-controls="custom-tabs-three-leave">Cuti</a>
            </li>

            <li class="nav-item">
            <a class="nav-link {{$staffSummonActive}}" id="custom-tabs-three-summon" data-toggle="pill" href="#" onclick="location.href='{{url('summon/index_by_staff')}}/{{$staffid}}'" role="tab" aria-controls="custom-tabs-three-summons">Saman</a>
            </li>

            <li class="nav-item">
            <a class="nav-link {{$staffDisciplineActive}}" id="custom-tabs-three-discipline" data-toggle="pill" href="#" onclick="location.href='{{url('discipline/index_by_staff')}}/{{$staffid}}'" role="tab" aria-controls="custom-tabs-three-discipline">Disiplin</a>
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