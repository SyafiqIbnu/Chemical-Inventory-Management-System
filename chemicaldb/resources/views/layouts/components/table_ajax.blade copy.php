@php
	if(! isset($default_sortby)){
		$default_sortby=1;		
	}

	if(! isset($default_sortdir)){
		$default_sortdir='asc';
	}

	if(! isset($bgColor)){
		$bgColor='bg-blue';
	}

	if(! isset($createUrl)){
		$createUrl="$route/create";
	}
@endphp

<table id="{{ $tname }}" class="table display table-hover dtcards row-border" width="100%">
    @if(isset($filter))
    <div class='col-md-10'>				
        <div class='row'>
            {{ $filter }}
        </div>
    </div>
    <div class='col-md-2'>
        <button class='col-md-12 btn btn-success form-group' style='margin-top: 23px' id='btn_filter'><i class='fa fa-search' style='margin-right: 5px'></i>Lihat</button> 
    </div>
    @endif
    <thead>
        <tr class='{!! $bgColor !!}'>
            {{ $thead }}
        </tr>
    </thead>
</table>

@if(Request()->session()->get('platform') == 'mobile')
    <div class="dt-more-container">
        <button id="btn-{{ $tname }}-load-more" style="display:none">Load More</button>
        <button id="btn-{{ $tname }}-reload">Reset</button>
     </div>
@endif

@push('scriptsDocumentReady')
	$(document).ready(function() {
		var {{ $tname }} = $('#{{ $tname }}').DataTable({
			"processing": true,
			"serverSide": true,
			ajax:{
				"url": "{{ $url }}",
				"dataType": "json",
				"type": "POST",
				"timeout": 30000,
				@if(env('APP_DEBUG') != 1)
					"error": function(e){
						{{ $tname }}.ajax.reload();
					},
				@endif
			},
			columns: [
				{{ $tbody }}
			],
			@if(isset($options))
				{{$options}}
			@endif
			language: {"url": "{{url('asset/lang/')}}/{{app()->getLocale()}}/datatable.json"},
			dom: '<"row "<"pull-right col-md-4" f ><"col-md-4" l ><"col-md-4"<"text-right dom-button"<B>>>>rt<"row " <"col-sm-12" <"col-sm-4" i ><"col-sm-5" p>>>',
			buttons: [
				{
						className: 'btn-sm btn-info',
						text: '<i class="fa fa-plus"></i> {{__('general.add')}}',
						action: function ( e, dt, node, config ) {
							location.href="{{$createUrl}}";
						}
				},
				{
						className: 'btn-danger',
						text: '<i class="fas fa-file-pdf"></i> {{__('general.pdf')}}',
						action: function ( e, dt, node, config ) {
							var link = document.createElement('a');
                            var data = JSON.stringify(dt.ajax.params());
							var linkurl = '{!!url("$route/export-remote/pdf")!!}';

                            var form = $(document.createElement('form'));
                            $(form).attr("action", linkurl);
                            $(form).attr("method", "POST");
                            $(form).attr("target", "_blank");

                            var input = $("<input>")
                                .attr("type", "hidden")
                                .attr("name", "mydata")
                                .val(data);
                            $(form).append($(input));
                            input = $("<input>")
                                .attr("type", "hidden")
                                .attr("name", "_token")
                                .attr("name", "_token")
                                .val('{{csrf_token()}}');
                            $(form).append($(input));

                            form.appendTo(document.body)
                            $(form).submit();
						}
				},
				{
						className: 'btn-success',
						text: '<i class="fas fa-file-excel"></i> {{__('general.excel')}}',
						action: function ( e, dt, node, config ) {
							var link = document.createElement('a');
                            var data = JSON.stringify(dt.ajax.params());
                            var linkurl = '{!!url("$route/export-remote/excel")!!}';

                            var form = $(document.createElement('form'));
                            $(form).attr("action", linkurl);
                            $(form).attr("method", "POST");
                            $(form).attr("target", "_blank");

                            var input = $("<input>")
                                .attr("type", "hidden")
                                .attr("name", "mydata")
                                .val(data);
                            $(form).append($(input));
                            input = $("<input>")
                                .attr("type", "hidden")
                                .attr("name", "_token")
                                .attr("name", "_token")
                                .val('{{csrf_token()}}');
                            $(form).append($(input));

                            form.appendTo(document.body)
                            $(form).submit();
						}
				}
			],			
			@if(isset($firstScript121))
				{{ $firstScript }}
			@endif	
			
	} );

		$('#{{ $tname }}').on( 'draw.dt', function (event) {				
			$("html, body").animate({scrollTop: 0 }, "slow");
			event.preventDefault();
			return false;
		
		});

	} );

@endpush

@push('scriptsDocumentReady12')
	var {{ $tname }} = $('#{{ $tname }}').DataTable({
		@if(Request()->session()->get('platform') == 'mobile')
			"sDom": '<"row "<"col-md-4" f ><"col-md-4" l ><"col-md-4"<"pull-right dom-button"<B>>>>rti',
		@endif
		processing: true,
		@if(!isset($no_serverside))
			serverSide: true,
		@endif
		stateSave: true,
		@if(isset($firstScript))
			{{ $firstScript }}
		@endif
		order: [[ {{$default_sortby}}, "{{$default_sortdir}}" ]],
		ajax:{
			"url": "{{ $url }}",
			"data": function(dt) {
					@if(isset($filter_parameter))
					{{ $filter_parameter }}
					@endif
			},
			"dataType": "json",
			"type": "POST",
			"timeout": 30000,
			@if(env('APP_DEBUG') != 1)
				"error": function(e){
					{{ $tname }}.ajax.reload();
				},
			@endif
		},
		"createdRow": function( row, data, dataIndex ) {
			var i=dataIndex % 2;
			if (i==1) {
			  $(row).addClass( 'bs-callout bs-callout-danger"' );
			}else{
			  $(row).addClass( 'bs-callout bs-callout-primary"' );
			}
		},
		drawCallback: function(){
			//$('#btn-{{ $tname }}-load-more').toggle(this.api().page.hasMore());
		},      
		columns: [
			{{ $tbody }}
		],
	});
	@if(!isset($no_number))
		/*{{ $tname }}.on('order.dt search.dt', function () {				    
			{{ $tname }}.column(0, {search:'applied', order:'applied'}).nodes().each(function (cell, i) {
				cell.innerHTML = i + 1;
			});
		}).draw(); */
		

		$('#{{ $tname }}').on( 'draw.dt', function (event) {				
			$("html, body").animate({scrollTop: 0 }, "slow");
			event.preventDefault();
			return false;
		
		});


	@endif
	@if(isset($secondScript))
		{{ $secondScript }}
	@endif
	@if(isset($filter_parameter))
		@isset($filter_parameter_script)
			$("#btn_filter").click(function() {
				{{ $tname }}.ajax.reload();
				{{ $filter_parameter_script }};
			});
		@endisset
	@endif
	@if(Request()->session()->get('platform') == 'mobile')
		$('#btn-{{ $tname }}-load-more').on('click', function(){  
			{{ $tname }}.page.loadMore();
		});
		$('#btn-{{ $tname }}-reload').on('click', function(){
			$('#{{ $tname }}').DataTable().page.len(10).draw();
		});
	@endif
@endpush


@if(isset($mthead))
    @push('styles1')
        <style>
            @media only screen and (max-width: 800px) {

            /* Force table to not be like tables anymore */
                #{{ $tname }} table, 
                #{{ $tname }} thead, 
                #{{ $tname }} tbody, 
                #{{ $tname }} th, 
                #{{ $tname }} td, 
                #{{ $tname }} tr { 
                        display: block; 
                }

                /* Hide table headers (but not display: none;, for accessibility) */
                #{{ $tname }} thead tr { 
                        position: absolute;
                        top: -9999px;
                        left: -9999px;
                }

                #{{ $tname }} tr {
                    margin-left: -15px;
                    margin-right: -15px;
                    /*border: 1px solid #ccc;*/ 
                }
                
                #{{ $tname }} td { 
                    display: none !important;
                        /* Behave  like a "row" */
                }

                #{{ $tname }} td.mobile-responsive {
                    padding: 0px;
                    display: unset !important;
                        /* Behave  like a "row" */
                }

                #{{ $tname }} td:before { 
                        /* Now like a table header */
                        position: absolute;
                        /* Top/left values mimic padding */
                        top: 6px;
                        left: 6px;
                        width: 45%; 
                        padding-right: 10px; 
                        white-space: nowrap;
                        text-align:left;
                        font-weight: bold;
                        overflow: hidden;
                }

                /*
                Label the data
                */
            }
        </style>
    @endpush
@endif