<?php require APPROOT . '/views/inc_driver/header.php'; ?>
<?php require APPROOT . '/views/inc_driver/nav-header.php'; ?>



<div class="container mt-3 mb-3 text-center">
            <h4 class="text-white">Hyperlocal Orders</h4>
        </div>
    <!-- Begin page content -->
    <main class="flex-shrink-0 min">
    <div class="card mb-3">
                    <div class="card-body position-reltive">
                        <div class="row">
                            <div class="col">
                            <h6><?php echo $data['new_orders']; ?> New Order <a href='<?php echo URLROOT; ?>/drivers/hyperlocal_new' class='pull-right'><button class='btn btn-success btn-sm'>View</button></a></h6>
                           
                            </div>
                            
                        </div>
                        </div></div>
        <!-- page content start -->
        <!-- page content start -->

        <div class="main-container">
            <div class="container">
              
            <?php $order_count = 0;
            foreach($data['all_orders'] as $order):
          
                ?>
                
                <div class="card mb-3">
                    <div class="card-body position-relative">
                        <div class="row mb-2">
                            <div class="col">
                            <h6>Order #<?php echo $order->order_id; ?></h6>
                            <h6 class="mb-1 text-default">From: <?php echo $order->from_name.", ".$order->from_phone."<br>".$order->from_area. " <br><br>To: " . $order->to_name.", ".$to->from_phone."<br>".$order->to_area; ?></h6>
                            </div>
                            
                        </div>
                        <div class="media">                            
                            <div class="media-body">
                            
                            <p class=""><?php echo $order->distance; ?>Kms</p>
                           <?php if($order->status==1){ ?>
                            <span><input style="width:150px;border-radius:3px;" type="text" class="form-control" placeholder="Pickup OTP" id="pickup_otp" onkeyup="checkotp_pickup(this.value,<?php echo $order->otp_pickup;?>);">
                            <a style='display:none' id='pickup' href="<?php echo URLROOT; ?>/drivers/hyperlocal_update/<?php echo $order->order_id; ?>/2"><button class="btn btn-success btn-sm">Parcel Picked</button> </a></span>
                               <br> 
                                <hr>
                                <center><button class="btn btn-success btn-sm" onclick="sendOTP(<?php echo $order->from_phone; ?>,<?php echo $order->otp_pickup; ?>)">Pickup OTP</button> 
                                <button class="btn btn-success btn-sm" onclick="sendOTP(<?php echo $order->to_phone; ?>,<?php echo $order->otp_delivery; ?>)">Delivery OTP</button>
                                <center>
                            <?php } else if($order->status==2){ ?>
                            <span><input style="width:150px;border-radius:3px;" type="text" class="form-control" placeholder="Delivery OTP" id="delivery_otp" onkeyup="checkotp_delivery(this.value,<?php echo $order->otp_delivery;?>);">
                            <a style='display:none' id='delivery' href="<?php echo URLROOT; ?>/drivers/hyperlocal_update/<?php echo $order->order_id; ?>/3"><button class="btn btn-success btn-sm">Parcel Delivered</button> </a></span>
                               <br> 
                                <hr>
                                <center><button class="btn btn-success btn-sm" onclick="sendOTP(<?php echo $order->from_phone; ?>,<?php echo $order->otp_pickup; ?>)">Pickup OTP</button> 
                                <button class="btn btn-success btn-sm" onclick="sendOTP(<?php echo $order->to_phone; ?>,<?php echo $order->otp_delivery; ?>)">Delivery OTP</button>
                                <center>
                            <?php } ?>

                            </div>        
                        </div>
                    </div>
                </div>
                <?php endforeach; 
                
                ?>              
            </div>
        </div>
    </main>

    <?php require APPROOT . '/views/inc_driver/nav-footer.php'; ?>
    <?php require APPROOT . '/views/inc_driver/footer.php'; ?>





<script>
   function sendOTP(phone,otp) {
                    $.ajax({
                        url  : "<?php echo URLROOT; ?>/pages/send_otp/"+phone+"/"+otp,
                        type : 'POST',

                    });
   }

   function checkotp_pickup(val,otp){
    if(val == otp){
    document.getElementById("pickup").style.display = "block";
    document.getElementById("pickup_otp").style.display = "none";
    }
  }

  function checkotp_delivery(val,otp){
    if(val == otp){
    document.getElementById("delivery").style.display = "block";
    document.getElementById("delivery_otp").style.display = "none";
    }
  }
</script>