<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Subsidi Permit Khas</title>
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
    }

    *{
      text-decoration: none !important;
    }

    /* header */
    .image{
    width: 100%;
    }

    /* About */

    .about{
    height: auto;
    background-color:  #881515;
    display: flex;
    flex-direction: row;
    padding: 80px;
    justify-content: space-evenly;
    }

    .aboutText{
    color: rgb(255, 255, 255);
    margin-top: -50px;
    }

    /* Float four columns side by side */
    .columns {
      float: left;
      width: 20%;
      padding: 0 10px;
    }

    /* Remove extra left and right margins, due to padding */
    .rows {margin: 0 -5px;}

    /* Clear floats after the columns */
    .rows:after {
      content: "";
      display: table;
      clear: both;
    }

    /* Responsive columns */
    @media screen and (max-width: 600px) {
      .columns {
        width: 100%;
        display: block;
        margin-bottom: 20px;
      }
    }

    /* Style the counter cards */
    .cards {
      box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2);
      padding: 10px;
      text-align: center;
      background-color: #f1f1f1;
      height: 180px;
      border-radius: 5px;
    }

    .cards .card-content{
      margin-top: -200px;
    }

    .cards h3{
      color: rgb(255, 255, 255);
      padding:10px;
    }

    .cards h1{
      color: rgb(24, 90, 145);
    }

    </style>
</head>
<body>
    <div class="wrapper">
    <header>
      <div>
       <img src="img/headSubPK.png" class="image" alt="" /> 
      </div>
    </header>
        <!-- navigation-->
        @include('portal.navbar') 

        <!-- slideshow-->
        <div class="slideshow-container">
					<div class="mySlides fade">
            <img src="{{ asset('img/banner/Banner Pemakluman.png') }}" style="width:100%">
          </div>
          <div class="mySlides fade">
            <img src="{{ asset('img/banner/banner11_kpdnhep.png') }}" style="width:100%">
          </div>
          <div class="mySlides fade">
             <img src="{{ asset('img/banner/banner55.png') }}" style="width:100%">
          </div>
					<br>
					<div style="text-align:center">
					  <span class="dot"></span> 
					  <span class="dot"></span> 
					  <span class="dot"></span>
          </div>
        </div>
        
        <!-- About -->  
        <div class="about" id="about">
            <div class="aboutText">
                <h1>PENDAFTARAN BARU<br> <span style="color:#e7a38b">Pilihan jenis pendaftaran</span> </h1>
                <p>Sila pastikan anda telah membaca Pengenalan, Cara Memohon dan Syarat Kelayakan yang berkaitan dengan Permohonan sebelum mengisi Borang Permohonan Online</p>

                  <div class="rows">
                    <a href="{{ url('account_application/create') }}">
                        <div class="columns">
                        <div class="cards">
                            <img src="{{ asset('img/company.jpg') }}" alt="company" style="width:100%; height: 100%;">
                                <div class="card-content">
                                    <h3>PENDAFTARAN BARU AWAM</h3>
                                    <h1>DAFTAR SYARIKAT</h1>
                                </div>
                            </div> 
                        </div>  
                    </a>
                    <a href="{{ url('account_application_agency/create') }}">
                        <div class="columns">
                                <div class="cards">
                                <img src="{{ asset('img/user.jpg') }}" alt="user" style="width:100%; height: 100%;">
                                <div class="card-content">
                                    <h3>PENDAFTARAN BARU AGENSI</h3>
                                    <h1>DAFTAR<br> AGENSI</h1>
                                </div>
                            </div>
                        </div>  
                    </a>
                    <a href="{{ url('account_application_individu/create') }}">
                        <div class="columns">
                                <div class="cards">
                                <img src="{{ asset('img/user.jpg') }}" alt="user" style="width:100%; height: 100%;">
                                <div class="card-content">
                                    <h3>PENDAFTARAN BARU AWAM</h3>
                                    <h1>DAFTAR INDIVIDU</h1>
                                </div>
                            </div>
                        </div>  
                    </a>
                    <a href="{{ url('createKpdnUser') }}">
                        <div class="columns">
                                <div class="cards">
                                <img src="{{ asset('img/mnger.jpg') }}" alt="user" style="width:100%; height: 100%;">
                                <div class="card-content">
                                    <h3>PENDAFTARAN PEGAWAI KPDNHEP</h3>
                                    <h1>PEGAWAI KPDNHEP</h1>
                                </div>
                            </div>
                        </div>  
                    </a>
                  </div>
            </div>
        </div>
     

<!-- FOOTER START -->
@include('portal.footer')

</div>
<!-- script for slideshow -->
<script>
    var slideIndex = 0;
    showSlides();
    
    function showSlides() {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("dot");
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
      }
      slideIndex++;
      if (slideIndex > slides.length) {slideIndex = 1}    
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";  
      dots[slideIndex-1].className += " active";
      setTimeout(showSlides, 2000); // Change image every 2 seconds
    }
</script>
</body>
</html>