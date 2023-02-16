<style>
/* nav */

.navbars {
    overflow: hidden;
    background-color: rgb(31, 131, 177);
    }

    .navbars a {
    float: left;
    display: block;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
    }

    .navbars a:hover {
    background-color: rgb(211, 81, 81);
    color: white;
    }

    .navbars a:active {
    background-color: #8a1a1a;
    color: white;
    }

    .content {
    padding: 16px;
    }

    .sticky {
    position: fixed;
    top: 0;
    width: 100%;
    }

    .sticky + .content {
    padding-top: 60px;
    }
</style>
<body>
<div class="navbars">
    <a href="<?php echo e(url('/portal')); ?>"><i class="fa fa-fw fa-home"></i> Laman Utama</a> 
    <a href="#"><i class="fa fa-plus-circle"></i> Cara Memohon</a> 
    <a href="#"><i class="fa fa-file"></i> Syarat Kelayakan</a>
    <a href="#"><i class="fa fa-phone"></i> Hubungi Kami</a> 
    <a href="<?php echo e(url('/')); ?>"><i class="fa fa-fw fa-user"></i> Log Masuk</a>
    <a href="<?php echo e(url('/portal')); ?>#about"><i class="fa fa-user-plus"></i>  Pendaftaran Baru</a>
</div>
</body>
<!-- script for sticky navbar -->
<script>
    window.onscroll = function() {myFunction()};
    
    var navbars = document.getElementById("navbars");
    var sticky = navbars.offsetTop;
    
    function myFunction() {
      if (window.pageYOffset >= sticky) {
        navbars.classList.add("sticky")
      } else {
        navbars.classList.remove("sticky");
      }
    }
</script><?php /**PATH C:\wamp64\www\factohub\resources\views/portal/navbar.blade.php ENDPATH**/ ?>