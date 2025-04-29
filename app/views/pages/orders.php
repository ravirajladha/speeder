<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/nav-header.php'; 
$wallet = $data['wallet'];?>


<style>
.bs-wizard {margin-top: 40px;}

/*Form Wizard*/
.bs-wizard {border-bottom: solid 1px #e0e0e0; padding: 0 0 10px 0;}
.bs-wizard > .bs-wizard-step {padding: 0; position: relative;}
.bs-wizard > .bs-wizard-step + .bs-wizard-step {}
.bs-wizard > .bs-wizard-step .bs-wizard-stepnum {color: #595959; font-size: 12px; margin-bottom: 5px;}
.bs-wizard > .bs-wizard-step .bs-wizard-info {color: #999; font-size: 14px;}
.bs-wizard > .bs-wizard-step > .bs-wizard-dot {position: absolute; width: 30px; height: 30px; display: block; background: #fbe8aa; top: 45px; left: 50%; margin-top: -15px; margin-left: -15px; border-radius: 50%;} 
.bs-wizard > .bs-wizard-step > .bs-wizard-dot:after {content: ' '; width: 14px; height: 14px; background: #fbbd19; border-radius: 50px; position: absolute; top: 8px; left: 8px; } 
.bs-wizard > .bs-wizard-step > .progress {position: relative; border-radius: 0px; height: 8px; box-shadow: none; margin: 30px 0;}
.bs-wizard > .bs-wizard-step > .progress > .progress-bar {width:0px; box-shadow: none; background: #fbe8aa;}
.bs-wizard > .bs-wizard-step.complete > .progress > .progress-bar {width:100%;}
.bs-wizard > .bs-wizard-step.active > .progress > .progress-bar {width:50%;}
.bs-wizard > .bs-wizard-step:first-child.active > .progress > .progress-bar {width:0%;}
.bs-wizard > .bs-wizard-step:last-child.active > .progress > .progress-bar {width: 100%;}
.bs-wizard > .bs-wizard-step.disabled > .bs-wizard-dot {background-color: #f5f5f5;}
.bs-wizard > .bs-wizard-step.disabled > .bs-wizard-dot:after {opacity: 0;}
.bs-wizard > .bs-wizard-step:first-child  > .progress {left: 50%; width: 50%;}
.bs-wizard > .bs-wizard-step:last-child  > .progress {width: 50%;}
.bs-wizard > .bs-wizard-step.disabled a.bs-wizard-dot{ pointer-events: none; }
.row>* {
    width: 20%;
    }
</style>                    
		


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
            if($order->booking_status == 0){
                $bstatus = "Placed";
            }else if($order->booking_status == 1){
                $bstatus = "Ready for Pickup";
            }else if($order->booking_status == 2){
                $bstatus = "Picked";
            }elseif($order->booking_status == 3){
                $bstatus = "Sent to Source Hub";
            }elseif($order->booking_status == 4){
                $bstatus = "Reached Source Hub";
            }else if($order->booking_status == 5){
                $bstatus = "Sent to Mother Hub";
            }else if($order->booking_status == 6){
                $bstatus = "Reached Mother Hub";
            }else if($order->booking_status == 7){
                $bstatus = "Sent to Regional Hub";
            }else if($order->booking_status == 8){
                $bstatus = "Reached Regional Hub";
            }else if($order->booking_status == 9){
                $bstatus = "Sent to Destination Regional Hub";
            }else if($order->booking_status == 10){
                $bstatus = "Reached Destination Regional Hub";
            }else if($order->booking_status == 11){
                $bstatus = "Sent to Destination Mother Hub";
            }else if($order->booking_status == 12){
                $bstatus = "Reached Destination Mother Hub";
            }else if($order->booking_status == 13){
                $bstatus = "Sent to Destination Hub"; 
            }else if($order->booking_status == 14){
                $bstatus = "Reached Destination Hub";
            }else if($order->booking_status == 15){
                $bstatus = "Out for Delivery";
            }else if($order->booking_status == 16){
                $bstatus = "Delivered";
            }else if($order->booking_status == 20){
                $bstatus = "Reversed";
            }
            else if($order->booking_status == 99){
                $bstatus = "Cancelled";
            }
            $cost_pay="";
            if($order->order_type=="0"){
                $order_type="Prepaid";}
            else if($order->order_type=="1"){
                $order_type="Pay at Delivery";}
            else if($order->order_type=="2"){
                $cost_pay = "| Pay: ₹".$order->booking_cost;
                $order_type="Pay at Pickup";}
            else if($order->order_type=="3"){
                $cost_pay = "| Pay: ₹".($order->booking_cost + $order->item_cost);
                $order_type="Cash on Delivery";}
            else if($order->order_type=="9"){
                $order_type="Reverse";}
                
                ?>
                
                <div class="card mb-3">
                    <div class="card-body position-relative">
                        <div class="row mb-2">
                            
                            <div class="col"><h6>Order #<?php echo $order->booking_id; ?> <?php echo $cost_pay; ?></h6><?php echo $order_type?> | <?php echo $order->from_city. " to " . $order->to_city; ?>
                            <h6 class="mb-1 text-default">To: <?php echo $order->to_name. ", " . $order->to_phone; ?></h6>
                            </div>
                          
                        </div>
                        <div class="media">                            
                            <div class="media-body">
                            
                            <p class=""><?php echo $order->item_name; ?></p>
                            <p class="text-secondary small"><?php echo $order->order_weight; ?>gms - <?php echo $order->item_length."L x ".$order->item_breadth."B x ".$order->item_height."H"; ?> (CM) | <i class='fa fa-inr'></i><?php echo $order->booking_cost?></p>
                                <h6 class="mb-1">
                                   

        
            <div class="row bs-wizard" style="border-bottom:0;">
                
                <div class="col-xs-1 bs-wizard-step 
                <?php 
                if($order->booking_status >=0){
                  echo 'complete';
                }
                ?>">
                  <div class="text-center bs-wizard-stepnum">Placed</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                 
                </div>
                
                <div class="col-xs-1 bs-wizard-step 
                <?php 
                if($order->booking_status >=1){
                  echo 'complete';
                }else{
                  echo "disabled";
                }
                ?>">
                  <div class="text-center bs-wizard-stepnum">To Pickup</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                 </div>

                 <div class="col-xs-1 bs-wizard-step 
                <?php 
                if($order->booking_status>=2){
                  echo 'complete';
                }else{
                  echo "disabled";
                }
                ?>">
                  <div class="text-center bs-wizard-stepnum">Picked</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                 </div>
                
                 <div class="col-xs-1 bs-wizard-step 
                <?php 
                if($order->booking_status>=5){
                  echo 'complete';
                }else{
                  echo "disabled";
                }
                ?>">
                  <div class="text-center bs-wizard-stepnum">Shipped</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                    </div>
                
                    <div class="col-xs-1 bs-wizard-step 
                <?php 
                if($order->booking_status==16){
                  echo 'complete';
                }else{
                  echo "disabled";
                }
                ?>">
                  <div class="text-center bs-wizard-stepnum">Delivered</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                   </div>
                   
                   
            </div>
       
  
                                
                                <?php 
                                if($order->from_id == $_SESSION['rexkod_user_id']){
                                    if($order->booking_status=="0"){
                                    echo "<span class='float-right' style='padding:5px 10px;background:#eee;color:#444;font-weight:light;margin-right:-40px !important;border-radius:10px;font-size:14px'>OTP1:".$order->otp_pickup."</span>";
                                    }else if($order->booking_status=="1"){
                                        if(!$order->weight_discrepancy){
                                            echo "<span class='float-right' style='padding:5px 10px;background:#eee;color:#444;font-weight:light;margin-right:-40px !important;border-radius:10px;font-size:14px'>OTP2:".$order->otp_pickup2."</span>";
                                        }else if($wallet->balance_amount >= $order->weight_payable){
                                            echo "<span class='float-right' style='padding:5px 10px;background:#eee;color:#444;font-weight:light;margin-right:-40px !important;border-radius:10px;font-size:14px'>OTP2:".$order->otp_pickup2."</span>";
                                        }
                                    

                                    }
                                }else {
                                    echo $order->otp_delivery;
                                } 
                                ?>
                                
                               </h6>
                               <?php if($order->weight_discrepancy){
echo "<br>";
                                if($order->order_type == "0"){
                                    echo "<span style='color:red;'>Weight Discrepancy Found</span><br>Extra ". $order->weight_discrepancy ."gms - Payable ₹".$order->weight_payable."<br><br>";
                                    
                                    if($wallet->balance_amount >= $order->weight_payable){
                                        echo "Please provide OTP to deduct payable amount from wallet and complete pickup<br><br>";
                                    }else {
                                        echo "Insufficient wallet balance. Please recharge wallet to clear payable amount<br><br>";
                                    }
                                }else if($order->order_type == "15"){
                                    $total_payable = $order->booking_cost + $order->weight_payable;
                                    echo "<span style='color:red;'>Weight Discrepancy Found</span><br>Extra ". $order->weight_discrepancy ."gms - (₹".$order->weight_payable.")<br>Total Payable: ₹".$order->booking_cost." + ₹".$order->weight_payable." = ₹".$total_payable."<br><br>";
                                    
                                    if($wallet->balance_amount >= $total_payable){
                                        echo "Please provide OTP to deduct payable amount from wallet and complete pickup<br><br>";
                                    }else {
                                        echo "Insufficient wallet balance. Please recharge wallet to clear payable amount<br><br>";
                                    }
                                }
                                
                                }?>
                                <?php if($order->booking_status != 99){if($order->booking_status == "0" || $order->booking_status == "1" ){?>
                                <a href="<?php echo URLROOT; ?>/pages/cancel_order/<?php echo $order->booking_id;?>"><button class="btn btn-sm btn-warning" style="color:#fff;" onclick="this.disabled=true;" >Cancel</button></a>
                                <?php }}?>
                               
                                
                            </div>
                            <button class="btn btn-default btn-40 rounded-circle"><i class="material-icons">
                               <?php if($order->from_id == $_SESSION['rexkod_user_id']) {echo "call_made";}else{echo "call_received";} ?>
                            </i></button>    
                                                    
                        </div>
                        
                            <?php if($order->delivery_attempt_1 && $order->booking_status!=16){
                            echo "<hr>";
                            if($order->delivery_attempt_3){echo "Third Attempt: Not Delivered<br><br>";}
                            else if($order->delivery_attempt_2){echo "Second Attempt: Not Delivered<br><br>";}  else if($order->delivery_attempt_1){echo "First Attempt: Not Delivered<br><br>";}    
                            ?>
                            
                            <?php if($order->booking_status!=20){?> <span id='not-delivered'><div style="display: table">
                            <div style="display: table-cell">
                            <form action='<?php echo URLROOT; ?>/pages/<?php if($order->from_id == $_SESSION['rexkod_user_id']){echo "from_remark";}else{echo "to_remark";}?>/<?php echo $order->booking_id; ?>' method='POST'>
                            <input placeholder='Enter remarks here' class='form-control' name="from_remark" style="width:200px;margin-right:10px;color:#333;" required></div>
                            <div style="display: table-cell">
                            <button type='submit' class="btn btn-success btn-sm">Add Remark</button> 
                            </div>
                            </form>
                            </div>

                            </span>
                            <?php } }?>

                            <hr>
                               <div class="pull-right">
                          <a href="<?php echo URLROOT; ?>/pages/feedback/<?php echo $order->booking_id; ?>"><button class='btn btn-default btn-sm'>Feedback</button></a>
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

    <?php require APPROOT . '/views/inc/nav-footer.php'; ?>
    <?php require APPROOT . '/views/inc/footer.php'; ?>






   
