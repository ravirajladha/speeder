<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- manifest meta -->
    <meta name="apple-mobile-web-app-capable" content="yes">

  

    <!-- Material icons-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">

    <!-- swiper CSS -->
    <link href="<?php echo URLROOT; ?>/assets2/vendor/swiper/css/swiper.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo URLROOT; ?>/assets2/css/style.css" rel="stylesheet" id="style">
</head>

<body class="body-scroll d-flex flex-column h-100 menu-overlay">



        
<form method="post" action="<?php echo URLROOT;?>/drivers/user_login" autocomplete="off">
<div class="container h-100 text-white">
            
            <div class="row h-100">
                <div class="col-12 align-self-center mb-4">
                    <div class="row justify-content-center">
                   
                    <div class="col-11 col-sm-7 col-md-6 col-lg-5 col-xl-4">
                           <img class="mt-5" src="<?php echo URLROOT; ?>/assets2/logo_white.png" alt="" width="150">
                            <h2 class="font-weight-normal mb-5 mt-5">Login into<br>your account</h2>
                            <div class="form-group float-label active">
                                <input type="text" class="form-control text-white" name="username">
                                <label class="form-control-label text-white">Username/Email</label>
                            </div>
                            <div class="form-group float-label position-relative">
                                <input type="password" class="form-control text-white " name="password">
                                <label class="form-control-label text-white">Password</label>
                            </div>  
                           
                        </div>
               

                    </div>
                </div>
                
            </div>
        </div>
    </main>

    <!-- footer-->
    <div class="footer no-bg-shadow py-3">
        <div class="row justify-content-center">
            <div class="col">
                <button type="submit" class="btn btn-default rounded btn-block">Login</button>
            </div>
        </div>
    </div>
</form>


    <!-- Required jquery and libraries -->
    <script src="<?php echo URLROOT; ?>/assets2/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo URLROOT; ?>/assets2/js/popper.min.js"></script>
    <script src="<?php echo URLROOT; ?>/assets2/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- cookie js -->
    <script src="<?php echo URLROOT; ?>/assets2/js/jquery.cookie.js"></script>

    <!-- Swiper slider  js-->
    <script src="<?php echo URLROOT; ?>/assets2/vendor/swiper/js/swiper.min.js"></script>

    <!-- Customized jquery file  -->
    <script src="<?php echo URLROOT; ?>/assets2/js/main.js"></script>
    <script src="<?php echo URLROOT; ?>/assets2/js/color-scheme-demo.js"></script>


    <!-- page level custom script -->
    <script src="<?php echo URLROOT; ?>/assets2/js/app.js"></script>
    
</body>

</html>



<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php if(isset($_SESSION['success'])){ ?>
 <script type="text/javascript">
     swal("<?php echo $_SESSION['success']; ?>");
 </script>
<?php } unset($_SESSION['success']); ?>


<?php 
require APPROOT . '/views/inc/footer.php'; 
?>