<!doctype html>
<html lang="en" class="h-100">

<style>
.invisible{
  visibility : hidden;
}
</style>
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



<div class='container'><div class='container' style='margin-top:5%'><img class="mt-5" src="<?php echo URLROOT; ?>/assets2/logo_white.png" alt="" width="150"></div></div>
<?php
$otp_new = str_pad(rand(0,9999), 4, "0", STR_PAD_LEFT);
session_start();
?>


        


<form method="post" action="<?php echo URLROOT;?>/enterprises/user_login" autocomplete="off">
<div class="container h-100 text-white">
            
            <div class="row h-100">
                <div class="col-12 align-self-center mb-4">
                    <div class="row justify-content-center">
                   
                    <div class="col-11 col-sm-7 col-md-6 col-lg-5 col-xl-4">
                           
                            <h2 class="font-weight-normal mb-5 mt-5">Login into<br>your account</h2>
                            <div class="form-group float-label position-relative">
                                <input type="number" class="form-control text-white" name="user_phone" id="phone_otp" onkeyup="checkphn(this.value);">
                                <label class="form-control-label text-white">Phone</label>
                            </div>  
                          
                            <p class="text-left"><span class='pull-left' id="countdown"></span><a href="#" id='genOTP' style='display:none;' class="text-white">Generate OTP</a> </p>
                           

                            <div class="form-group float-label position-relative" id='otp_val' style='display:none'>
                                <input id="otp_fill" type="number" class="form-control text-white" onkeyup="checkotp(this.value,<?php echo $otp_new;?>);">
                                <label class="form-control-label text-white">Enter OTP</label>
                            </div> 

                           
                        </div> 
               

                    </div>
                </div>
                
            </div>
        </div>
    </main>

    <!-- footer-->
   
        <div class="row justify-content-center">
            <div class="col">
                <center><button type="submit" style='width:300px;display:none;' id="login_btn" class="btn btn-default rounded btn-block">Login</button></center><br>
                <p class="text-center"><a href="<?php echo URLROOT; ?>/enterprises/register" class="text-white">Don't have an account? Sign Up</a></p><br>
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





<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script type="text/javascript">

   


        document.addEventListener('keypress', function (e) {
            if (e.keyCode === 13 || e.which === 13) {
                e.preventDefault();
                return false;
            }
            
        });



        $(document).ready(function(){
        $('#genOTP').click(function(){

            var timeleft = 20;

            var downloadTimer = setInterval(function function1(){
            document.getElementById("countdown").innerHTML = "Resend OTP (" + timeleft + "s)";

            timeleft -= 1;
            if(timeleft <= 0){
                clearInterval(downloadTimer);
                document.getElementById("countdown").innerHTML = ""
            }
            }, 1000);



            var ThisIt = $(this);
            ThisIt.addClass('invisible');
            setTimeout(function(){
                ThisIt.removeClass('invisible');
            } , 20000);

            document.getElementById("otp_val").style.display = "block";
            $('#otp_fill').focus().select()
            var phone_otp = document.getElementById('phone_otp').value; 
        
                    $.ajax({
                        url  : "<?php echo URLROOT; ?>/enterprises/send_otp/"+phone_otp+"/<?php echo $otp_new; ?>",
                        type : 'POST',

                    }); 
          
        });
    });

function checkotp(val,otp){
 
if(val == otp){
$("#login_btn").click();
}
}

function checkphn(phn){
if(phn.length == 10){
$("#genOTP").click();
}
}

</script>