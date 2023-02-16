<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BIZMILLA NASI ARAB</title>
    @laravelPWA
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <style>
    html,body{
    background-color: #fff;
    font-family: 'Source Sans Pro',sans-serif;
    overflow-x: hidden !important;
    margin: 0px !important;
    padding: 0px !important;
    background-size: cover;
    background-repeat: no-repeat;
    background-image: url({{ asset('img/logo-nasi-arab-bizmilla.png') }});
    }

    *{
        text-decoration: none !important;
    }

    /* header */
    .image{
    width: 100%;
    }

    /* login */
    .container {
        position: relative;
        width: 100%;
        height: auto;
        background-color: transparent;
        min-height: 100vh;
        overflow: hidden;
        justify-content: center;
        /* padding-left:100px; */
    }

    form{
        width: auto;
        height: auto;
        justify-content: center;
        
    }

    .input-group-text{
        background-color: #5a99b8;
    }

    .input-div{
        position: relative;
        width: auto;
        display: grid;
        grid-template-columns: 20% 80%;
        margin: 25px 0;
        margin-left: 30px;
        padding: 5px 0;
        border-bottom: 2px solid #d9d9d9;
    }

    .input-div.one{
        margin-top: 20px;
        margin-left: 250px;
    }

    .i{
        color: #d9d9d9;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .i i{
        transition: .3s;
    }

    .input-div > div{
        position: relative;
        height: 15px;
    }

    .input-div > div > {
        position: absolute;
        left: 10px;
        top: -100%;
        transform: translateY(-50%);
        color: rgb(214, 209, 209);
        font-size: 15px;
        transition: .3s;
    }

    .txtLabel::placeholder {
        color:black; 
    }

    .input-div:before, .input-div:after{
        content: '';
        position: absolute;
        bottom: -2px;
        width: 0%;
        height: 2px;
        background-color: #38d39f;
        transition: .4s;
    }

    .input-div:before{
        right: 50%;
    }

    .input-div:after{
        left: 50%;
    }

    .input-div.focus:before, .input-div.focus:after{
        width: 50%;
    }

    .input-div.focus > div > h5{
        top: -5px;
        font-size: 15px;
    }

    .input-div.focus > .i > i{
        color: #38d39f;
    }

    .input-div > div > input{
        position: absolute;
        left: 0;
        top: -8px;
        width: 100%;
        height: 100%;
        border: none;
        outline: none;
        background: none;
        padding: 0.5rem 0.7rem;
        font-size: 1.2rem;
        color: rgb(214, 214, 214);
        font-family: 'poppins', sans-serif;
    }

    .input-div.pass{
        margin-bottom: 4px;
    }

    a{
        display: block;
        text-align: right;
        text-decoration: none;
        /*color: rgb(240, 240, 240);*/
        font-size: 0.9rem;
        transition: .3s;
    }

    a:hover{
        color: #38d39f;
    }

    .button{
        display: block;
        width: 100%;
        height: 50px;
        border-radius: 25px;
        outline: none;
        border: none;
        background-image: linear-gradient(to right, #5a99b8, #38d39f, #32be8f);
        background-size: 200%;
        font-size: 1.2rem;
        /*color: #fff;*/
        font-family: 'Poppins', sans-serif;
        text-transform: uppercase;
        margin: 1rem 0;
        cursor: pointer;
        transition: .5s;
    }
    .button:hover{
        background-position: right;
    }

    .submit{
        display: block;
        width: 100%;
        height: 50px;
        border-radius: 25px;
        outline: none;
        border: none;
        background-image: linear-gradient(to right, #5a99b8, #38d39f, #32be8f);
        background-size: 200%;
        font-size: 1.2rem;
        color: #fff;
        font-family: 'Poppins', sans-serif;
        text-transform: uppercase;
        margin: 1rem 0;
        cursor: pointer;
        transition: .5s;
    }
    
    .btn {
        width: 100%;
        /*background-color: #f07a6b;*/
        border: none;
        outline: none;
        height: 49px;
        border-radius: 49px;
        /*color: #fff;*/
        text-transform: uppercase;
        font-weight: 600;
        margin: 10px 0;
        cursor: pointer;
        transition: 0.5s;
    }
    
    .btn:hover {
        background-color: #b42323;
    }

    .card-footer{
        margin-top: -30px;
    }

    .center {
        margin: auto;
        width: 60%;
        border: 2px solid #f44336;
        padding: 10px;
        color: black;
        text-align: center;
        margin-top: 80px;
        background-color: white;
    }


    /* RESPONSIVE */

    /* Responsive columns */
    @media screen and (max-width: 600px) {
        .column {
        width: 100%;
        display: block;
        margin-bottom: 10px;
        }

        .center {
        margin: auto;
        width: 100%;
        border: 2px solid #f44336;
        padding: 10px;
        color: white;
        text-align: center;
        margin-top: 80px;
    }
    }

    </style>
</head>
<body>
    <div class="wrapper">
    <header>
      <div>
       <!--<img src="{{ asset('img/nasiarab-header.png') }}" class="image" alt="" /> -->
      </div>
    </header>
        <!-- navigation-->
        <!--@include('portal.navbar')    -->
        <!-- login section -->

        <div class="container">
            <div class="center">
				<br>
                <h1>NASI ARAB BIZMILLA</h1>
                    @yield('main-content')
            </div>
        </div>

<!-- FOOTER START -->
@include('portal.footer')

</div>
</body>
</html>