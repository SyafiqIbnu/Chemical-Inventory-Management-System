@php
    $iCounter=0;
@endphp

<div class="card card-success card-outline">
    <div class="card-header" style="background-color: #DFDFDF">
    <h5 class="m-0">System Access</h5>
    </div>
    
    <div class="card-body">
        
            
            @foreach($applications as $application)
                @if($iCounter % 3 ==0)
                    @if($iCounter > 0)
                        </div><!-- /row -->
                    @endif
                    <div class="row">
                @endif
                @php                    
                    $app_icon=url($application->icon)                    
                @endphp
            <div class="col-lg-2 col-4" style="padding-bottom:10px;">
            <a id="moodle" class="btn btn-default" href="{{ url('application') }}/redirect/{!! $application->code!!}" target="_blank">
                <img src="{{$app_icon}}" height="64" width="64"><br>{{$application->name}}
            </a>	
            </div>
                @php                    
                    $iCounter++;
                @endphp
            @endforeach
       
    </div>
    <!-- /card body -->
</div>
<!-- /card -->