<!-- jQuery -->
<script src="{{ url('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ url('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- DataTables -->
<link rel="stylesheet" href="{{url('plugins/datatables/jquery.datatables.min.js')}}">
<link rel="stylesheet" href="{{url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"> 
<link rel="stylesheet" href="{{url('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"> 
<link rel="stylesheet" href="{{url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"> 

<!-- AdminLTE App -->
<script src="{{ url('dist/js/adminlte.min.js')}}"></script>

{{-- CDN
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/af-2.3.4/b-1.6.1/b-colvis-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/sselect2.full.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
--}}

{{-- CDN LOCAL FOR DEV --}}
{{-- <script type="text/javascript" src="{{ url('js/vfs_fonts.js')}}"></script> --}}

<script type="text/javascript" src="{{ url('plugins/viewerjs/viewer.min.js') }}"></script>
<script type="text/javascript" src="{{ url('plugins/select2/js/select2.min.js')}}"></script>
<script type="text/javascript" src="{{ url('plugins/moment/moment.min.js')}}"></script>
<script type="text/javascript" src="{{ url('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>

{{-- Custom JS--}}
<script src="{{ url('js/app-general.js')}}"></script>
<script src="{{ url('js/appmenu.js')}}"></script>
<script type="text/javascript" src="{{ url('js/datatables.min.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script>
<script src="{{ url('js/mapInput.js')}}"></script>

<script>
	
    @stack('scriptsTop')
    
    $(document).ready(function () {
        
		@stack('scriptsDocumentReadyTop')
        @stack('scriptsDocumentReady')
        @stack('scriptsDocumentReadyBottom')
		
	});
</script>

