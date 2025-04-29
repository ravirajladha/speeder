<?php require APPROOT . '/views/inc_driver/header.php'; ?>
<?php require APPROOT . '/views/inc_driver/nav-header.php'; ?>



<div class="container mt-3 mb-3 text-center">
            <h4 class="text-white">Orders</h4>
        </div>
    <!-- Begin page content -->
    <main class="flex-shrink-0 min">

        <!-- page content start -->

        <div class="main-container">
            <div class="container">
              
            <?php $order_count = 0;
            foreach($data['all_orders'] as $order):
            $order_count =1;
            if($order->booking_status == 14){
                $bstatus = "Ready for Delivery";
            }else if($order->booking_status == 15){
                $bstatus = "Out for Delivery";
            }else if($order->booking_status == 16){
                $bstatus = "Delivered";
            }elseif($order->booking_status == 20){
                $bstatus = "Reversed";
            }else if($order->booking_status == 99){
                $bstatus = "Cancelled";
            }

            if($order->order_type=="0"){
                $order_type="Prepaid";}
            else if($order->order_type=="1"){
                $order_type="Pay at Pickup";}
            else if($order->order_type=="2"){
                $order_type="Pay at Delivery";}
            else if($order->order_type=="3"){
                $order_type="Cash on Delivery";}
         
                ?>
                
                <div class="card mb-3">
                    <div class="card-body position-relative">
                        <div class="row mb-2">
                            <div class="col">
                                <h6>Order #<?php echo $order->booking_id; ?> | <?php echo $order_type; ?></h6>
                            <h6 class="mb-1 text-default"><?php echo $order->from_city. " to " . $order->to_city; ?></h6>
                            </div>
                            
                        </div>
                        <div class="media">                            
                            <div class="media-body">
                            
                            <p class=""><?php echo $order->item_name; ?></p>
                            <p class="text-secondary small"><?php echo $order->order_weight; ?>Gms - <?php echo $order->item_length."L x ".$order->item_breadth."B x ".$order->item_height."H"; ?> (CM)</p>
                                <h6 class="mb-1">Order <?php echo $bstatus; ?></h6>
                                <?php if($order->order_type==1 && !$order->delivery_datetime){echo "Cash to be collected: <i class='fa fa-inr'></i>".$order->booking_cost;}?>
                            <?php 
                            echo "<br>Delivery Attempts: "; 
                            if($order->delivery_attempt_3){echo "3";}
                            else if($order->delivery_attempt_2){echo "2";}
                            else if($order->delivery_attempt_1){echo "1";}
                            else {echo "0";}
                            ?>
                             <br><br><button class="btn btn-success btn-sm" onclick="sendOTP(<?php echo $order->to_phone; ?>,<?php echo $order->otp_delivery; ?>)">Send OTP</button> 
                             <?php
                             if($order->booking_status==15){
                             if($order->order_type == 2){
                                echo "<br><br><h6 class='mb-1'> <input onclick='confirm_cost(".$order->booking_id.")' type='checkbox'> I have collected ₹".$order->booking_cost."</h6>"; 
                             }else if($order->order_type == 3){
                                 $cost_collect = $order->booking_cost + $order->item_cost;
                                echo "<br><br><h6 class='mb-1'> <input onclick='confirm_cost(".$order->booking_id.")' type='checkbox'> I have collected ₹".$cost_collect."</h6>"; 
                             }}
                             ?>
                            </div>
                           
                            <?php if($order->booking_status == 14){?>
                            <?php if(!$order->delivery_attempt_3){ ?>
                            <a href="<?php echo URLROOT; ?>/drivers/order_update/<?php echo $order->booking_id; ?>/15"><button class="btn btn-success btn-sm" onclick="sendOTP(<?php echo $order->to_phone; ?>,<?php echo $order->otp_delivery; ?>)">Out for Delivery</button> </a>
                            <?php }?>
                            <?php }else  if($order->booking_status == 15){?>
                                
                            <?php if($order->order_type == 2 || $order->order_type == 3){ ?>
                            <span><input id="so<?php echo $order->booking_id; ?>" style="width:70px;border-radius:3px;margin-top:95px;display:none" type="text" class="form-control" placeholder="OTP" onkeyup="checkotp(this.value,<?php echo $order->otp_delivery;?>);"><br>
                            <a style='display:none' id='delivery' href="<?php echo URLROOT; ?>/drivers/order_update/<?php echo $order->booking_id; ?>/16"><button class="btn btn-success btn-sm">Delivered</button> </a></span>
                            <?php } else { ?>
                            <span><input id="so<?php echo $order->booking_id; ?>" style="width:70px;border-radius:3px;margin-top:95px;display:none" type="text" class="form-control" placeholder="OTP" onkeyup="checkotp(this.value,<?php echo $order->otp_delivery;?>);"><br>
                            <a style='display:none' id='delivery' href="<?php echo URLROOT; ?>/drivers/order_update/<?php echo $order->booking_id; ?>/16"><button class="btn btn-success btn-sm">Delivered</button> </a></span>
                            <?php } ?>
                            
                            </div>
                            <hr>
                            <span id='not-delivered'><div style="display: table">
                            <div style="display: table-cell">
                            <form action='<?php echo URLROOT; ?>/drivers/not_delivered/<?php echo $order->booking_id; ?>' method='POST'>
                            <select class='form-control' name="delivery_remark" style="width:200px;margin-right:10px;color:#333;" required><option value='Not Available'>Not Available</option>
                            <option value='Wrong Address'>Wrong Address</option></select></div>
                            <div style="display: table-cell">
                            <button type='submit' class="btn btn-success btn-sm">Not Delivered</button> 
                            </div>
                            </form>
                            </div>

                            </span>
                          
                                
                            
                            <?php }?>
                                                       
                        </div>
                    </div>
                </div>
                <?php endforeach; 
                if($order_count==0){ ?>
                <div class="card mb-3">
                    <div class="card-body position-relative">
                        <h6>No Orders</h6>
                </div>
                </div>
                <?php 
                }
                ?>
              
            </div>
        </div>
    </main>

    <?php require APPROOT . '/views/inc_driver/nav-footer.php'; ?>
    <?php require APPROOT . '/views/inc_driver/footer.php'; ?>

<script>

  function checkotp(val,otp){
    if(val == otp){
    document.getElementById("delivery").style.display = "block";
    document.getElementById("not-delivered").style.display = "none";
    document.getElementById("sendOTP").style.display = "none";
    }
  }


  function confirm_cost(soid){
    document.getElementById("so"+soid).style.display = "block";
  }

</script>

<script>
   function sendOTP(phone,otp) {
                    $.ajax({
                        url  : "<?php echo URLROOT; ?>/pages/send_otp/"+phone+"/"+otp,
                        type : 'POST',

                    });
   }
</script>