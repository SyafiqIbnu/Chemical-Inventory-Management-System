@php
	$bCollapsible=false;
	if(isset($collapsible)){
		$bCollapsible=filter_var($collapsible, FILTER_VALIDATE_BOOLEAN);
	}else{
		$collapsible=false;
	}

	if(!isset($cardColor)){
		//$cardColor="card-primary";
		$cardColor="";
	}

	if(!isset($borderColor)){
		$borderColor="";
	}

	$bShowMessage=true;
	if(isset($showMessage)){
		$bShowMessage=filter_var($showMessage, FILTER_VALIDATE_BOOLEAN);
	}

@endphp

@if($bShowMessage)
	@include('layouts.components.session_message')
@endif

<div class="col-md-12"  >
	<div class="card {!! $cardColor !!} {!! $borderColor !!}  "  >

		<div class="card-header {!! $borderColor !!}">
			<h3 class="card-title">{{$cardTitle}}</h3>
			
			@if($bCollapsible)
			<div class="card-tools">
				<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
				</button>
			</div>
			@endif

		</div>	
	
		<div class="card-body {!! $borderColor !!}">
			{!! $cardBody !!}
		</div>

		<div class="card-footer {!! $borderColor !!}">
			{!! $cardFooter !!}
		</div>		

	</div>	

</div>