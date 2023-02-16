<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="{{ url('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ url('dist/css/adminlte.min.css') }}">
<!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="{{ url('dist/css/skins/_all-skins.min.css') }}">
<!-- Button style -->
<link rel="stylesheet" href="{{ url('css/button.css') }}">
<!-- Datatables 
<link rel="stylesheet" href="{{url('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
<link rel="stylesheet" href="{{ url('css/rowReorder.dataTables.min.css') }}">
-->




<!--<link rel="stylesheet" href="{{ url('css/dataTables.listView.css') }}">-->
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ url('bower_components/font-awesome/css/font-awesome.min.css') }}">
<!-- Ionicons -->
<link rel="stylesheet" href="{{url('bower_components/Ionicons/css/ionicons.min.css') }}">
<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<!-- select2 -->
<link rel="stylesheet" href="{{url('plugins/select2/dist/css/select2.css')}}">

<!-- datepicker 
<link rel="stylesheet" href="{{url('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
<link rel="stylesheet" href="{{url('css/bootstrap-datetimepicker.min.css')}}">
-->
{{-- CDN
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />
--}}

<link rel="stylesheet" href="{{ url('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}"></script>

<link rel="stylesheet" href="{{url('bower_components/fullcalendar/dist/fullcalendar.min.css')}}">
<link rel="stylesheet" href="{{url('css/datatables.min.css')}}">

{{-- 
<link rel="stylesheet" href="{{url('css/datatable-cards.css')}}">
--}}

<style>
    .clear{
        color: unset !important;
        text-decoration: unset !important;
    }
    .dom-button {
        margin-top: 5px;
    }
    .required:after {
        color: #cc0000;
        content: "*";
        font-weight: bold;
        margin-left: 5px;
    }
    .bg-white {
        background-color: #fff !important;
    }    
    
	@media screen and (max-width: 800px) {
        .table-responsive{
            border: unset;
        }
        .nav-tabs-custom > .nav-tabs > li{
            border-top: 3px solid transparent;
            margin-right: 0px;
        }
        .nav-tabs-responsive > li {
            display: none;
            width: 23%;
        }
        .nav-tabs-responsive > li > p > a {
            max-width: 100%;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            word-wrap: normal;
            width: 100%;
            width: 100%;
            text-align: center;
            vertical-align: top;
        }
        .nav-tabs-responsive > li.active {
            width: 54%;
        }
        .nav-tabs-responsive > li.active:first-child {
            margin-left: 23%;
        }
        .nav-tabs-responsive > li.active,.nav-tabs-responsive > li.prev,.nav-tabs-responsive > li.next {
            display: block;
        }
        .nav-tabs-responsive > li.prev,.nav-tabs-responsive > li.next {
            -webkit-transform: scale(0.9);
            transform: scale(0.9);
        }
        .nav-tabs-responsive > li.next > p > a,.nav-tabs-responsive > li.prev > p > a {
            -webkit-transition: none;
            transition: none;
        }
        .nav-tabs-responsive > li.next > p > a > .text,.nav-tabs-responsive > li.prev > p > a > .text {
            display: none;
        }
        .nav-tabs-responsive > li.next > p > span.text,.nav-tabs-responsive > li.prev > p > span.text {
            display: none;
        }
        .nav-tabs-responsive > li.next > p > a::after,.nav-tabs-responsive > li.prev > p > a::after {
            position: relative;
            top: 1px;
            display: inline-block;
            font-family: 'Glyphicons Halflings';
            font-style: normal;
            font-weight: 400;
            line-height: 1;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        .nav-tabs-responsive > li.prev > p > a::after {
            content: "\e079";
        }
        .nav-tabs-responsive > li.next > p > a::after {
            content: "\e080";
        }
    }
</style>