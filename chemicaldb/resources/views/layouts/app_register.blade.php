<!DOCTYPE html>
<html>
    <head>
        <title>{{config('app.name')}}</title>
        @laravelPWA
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--Made with love by Mutiullah Samim -->
        <!--Bootsrap 4 CDN-->
        <link href="{{ asset('css/bootstrap-4.1.1-no-modals.css') }}" rel="stylesheet" id="bootstrap-css">
        <link rel="stylesheet" href="{{ asset('css/modals.css') }}">
        <!--Fontawesome CDN-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <!--Custom styles-->
        <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
		<script src="{{ url('plugins/jquery/jquery.min.js')}}"></script>
    
        <!--<link rel="stylesheet" type="text/css" href="styles.css">-->
        <!--<link rel="stylesheet" type="text/css" href="{!! asset('css/main.css') !!}">-->
        <style>
            @import url('bower_components/bootstrap/less/bootstrap.less');
            @import url('https://fonts.googleapis.com/css?family=Numans');

            html,body{
                background-image: url({{ asset('img/wallpaper-login.jpg') }});
                background-size: cover;
                
                height: 100%;
                font-family: 'Numans', sans-serif;
            }

            .container{
                height: 100%;
                align-content: center;
            }

            .card{
                height: 100%;
                margin-top: auto;
                margin-bottom: auto;
                
                width: 900px;
                background-color: #FFFFFF !important;
            }

            .social_icon span{
                font-size: 60px;
                margin-left: 10px;
                color: #FFC312;
            }

            .social_icon span:hover{
                color: white;
                cursor: pointer;
            }

            .card-header h3{
                color: white;
            }

            .social_icon{
                position: absolute;
                right: 20px;
                top: -45px;
            }

            .input-group-prepend span{
                width: 50px;
                background-color: #FFC312;
                color: black;
                border:0 !important;
            }

            input:focus{
                outline: 0 0 0 0  !important;
                box-shadow: 0 0 0 0 !important;

            }

            .remember{
                color: white;
            }

            .remember input
            {
                width: 20px;
                height: 20px;
                margin-left: 15px;
                margin-right: 5px;
            }

            .login_btn{
                color: black;
                background-color: #FFC312;
                width: 100px;
            }

            .login_btn:hover{
                color: black;
                background-color: white;
            }

            .links{
                color: white;
            }

            .links a{
                margin-left: 4px;
            }
        </style>
        {{--@laravelPWA --}}
        @stack('styles')
    </head>
    <body>
        <div class="container">
            @stack('modals')
            <div class="d-flex justify-content-center h-flex">				
                <div class="card">
					<div class="col-md-12">
					<div class="title text-center">
						<a href="{{url('/')}}"><img src="{{url('images/logo.png')}}" width="128px"></a>
						<div ><center><h3>USER REGISTRATION {{ config('app.name', 'Laravel') }}</h3><center></div>
					</div>
				</div>
                    @yield('main-content')
                </div>
            </div>
        </div>
    </body>
    {!! survivor() !!}
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    @stack('scripts')
</html>