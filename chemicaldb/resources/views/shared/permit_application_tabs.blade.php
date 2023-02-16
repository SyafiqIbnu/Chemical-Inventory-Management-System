@php
    if(!isset($canEdit)){
        $canEdit=false;
    }

	if(!isset($cardColor)){
		$cardColor="card-primary";
	}

    $basicInfoActive="";
    $usageInfoActive="";
    $purchaseInfoActive="";
    $documentInfoActive="";
    $activitiesInfoActive="";
    $reportSubmitInfoActive="";
    
    if($selectedTab=='basicinfo'){
        $basicInfoActive='active';
    }else if($selectedTab=='usage'){
        $usageInfoActive='active';
    }else if($selectedTab=='purchase'){
        $purchaseInfoActive="active";
    }else if($selectedTab=='document'){
        $documentInfoActive="active";
    }else if($selectedTab=='activities'){
        $activitiesInfoActive="active";
    }else if($selectedTab=='reportsubmit'){
        $reportSubmitInfoActive="active";
    }

    $basicInfoVisible="view";
    $usageInfoVisible="view";
    $purchaseInfoVisible="view";
    $documentInfoVisible="view";
    $activitiesInfoVisible="view";
    $reportSubmitInfoVisible="view";
    
    $basicInfoViewURL=url('permit_application'.'/'.$permit_application_id);
    $basicInfoEditURL=url('permit_application'.'/'.$permit_application_id."/edit");

    $activitiesInfoViewURL=url('permit_application_activity'.'/'.$permit_application_id);
    $activitiesInfoEditURL=url('permit_application_activity'.'/'.$permit_application_id."/edit");

    if($canEdit){
        $basicInfoVisible="edit";
        $activitiesInfoVisible="edit";
    }

@endphp    



<div class="col-md-12">
    <div class="card card-primary card-outline card-outline-tabs">
        <div class="card-header p-0 border-bottom-0">
        <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">

            @if($basicInfoVisible !="none")
                <li class="nav-item">
                <a class="nav-link {{$basicInfoActive}}" id="custom-tabs-three-basicinfo" data-toggle="pill" href="#" 
                @if($basicInfoVisible =="view")
                    onclick="location.href='{!! $basicInfoViewURL !!}'" 
                @elseif($basicInfoVisible =="edit")
                    onclick="location.href='{!! $basicInfoEditURL !!}'" 
                @endif
                role="tab" aria-controls="custom-tabs-three-basicinfo" >Maklumat Am</a>
                </li>
            @endif

            @if($usageInfoVisible !="none")
                <li class="nav-item">
                <a class="nav-link {{$usageInfoActive}}" id="custom-tabs-three-usage" data-toggle="pill" href="#" onclick="location.href='{{ url('permit_application_usage') }}/{{$permit_application_id}}/index';" role="tab" aria-controls="custom-tabs-three-usage">{{ __('general.permit_application_usage')}}</a>
                </li>
            @endif

            @if($purchaseInfoVisible !="none")
                <li class="nav-item">
                <a class="nav-link {{$purchaseInfoActive}}" id="custom-tabs-three-purchase" data-toggle="pill" href="#" onclick="location.href='{{ url('permit_application_purchase') }}/{{$permit_application_id}}/index';" role="tab" aria-controls="custom-tabs-three-purchase">{{ __('general.permit_application_purchase')}}</a>
                </li>
            @endif

            @if($documentInfoVisible !="none")
                <li class="nav-item">
                <a class="nav-link {{$documentInfoActive}}" id="custom-tabs-three-document" data-toggle="pill" href="#" onclick="location.href='{{ url('permit_application_document') }}/{{$permit_application_id}}/index';" role="tab" aria-controls="custom-tabs-three-document">{{ __('general.permit_application_document')}}</a>
                </li>
            @endif

            @if($activitiesInfoVisible !="none")
                <li class="nav-item">
                <a class="nav-link {{$activitiesInfoActive}}" id="custom-tabs-three-activities" data-toggle="pill" 
                @if($activitiesInfoVisible =="view")
                        onclick="location.href='{!! $activitiesInfoViewURL !!}'" 
                @elseif($activitiesInfoVisible =="edit")
                    onclick="location.href='{!! $activitiesInfoEditURL !!}'" 
                @endif
                href="#" onclick="location.href='{{ url('permit_application_activity') }}/{{$permit_application_id}}';" 
                role="tab" aria-controls="custom-tabs-three-activities">{{ __('general.permit_application_activity_approval')}}</a>
                </li>
            @endif

            <li class="nav-item">
                <a class="nav-link {{$reportSubmitInfoActive}}" id="custom-tabs-three-reportsubmit" data-toggle="pill" href="#" onclick="location.href='{{ url('permit_application') }}/{{$permit_application_id}}/reportsubmit';" role="tab" aria-controls="custom-tabs-three-reportsubmit">{{ __('general.permit_application_submit')}}</a>
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

