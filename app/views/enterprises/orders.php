<?php require APPROOT . '/views/inc_enterprises/header.php'; ?>
<?php require APPROOT . '/views/inc_enterprises/nav-header.php'; 
$wallet = $data['wallet'];?>



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
            }else if($order->booking_status == 100){
                $bstatus = "Ready for Pickup";
            }else if($order->booking_status == 1){
                $bstatus = "Picked";
            }elseif($order->booking_status == 2){
                $bstatus = "Reached Source Hub";
            }else if($order->booking_status == 3){
                $bstatus = "Reached Mother Hub";
            }else if($order->booking_status == 4){
                $bstatus = "";
            }else if($order->booking_status == 5){
                $bstatus = "In Transit";
            }else if($order->booking_status == 6){
                $bstatus = "Reached Mother Hub";
            }else if($order->booking_status == 7){
                $bstatus = "Reached Destination Hub";
            }else if($order->booking_status == 8){
                $bstatus = "Ready for Delivery";
            }else if($order->booking_status == 9){
                $bstatus = "Out for Delivery";
            }else if($order->booking_status == 10){
                $bstatus = "Delivered";
            }else if($order->booking_status == 15){
                $bstatus = "Reversed";
            }
            else if($order->booking_status == 99){
                $bstatus = "Cancelled";
            }
            if($order->order_type=="0"){
                $order_type="Prepaid";}
            else if($order->order_type=="1"){
                $order_type="Pay at Delivery";}
            else if($order->order_type=="10"){
                $order_type="Pay at Pickup";}
            else if($order->order_type=="2"){
                    $order_type="Reverse";}
                
                ?>
                
                <div class="card mb-3">
                    <div class="card-body position-relative">
                        <div class="row mb-2">
                            
                            <div class="col"><h6>Order #<?php echo $order->booking_id; ?></h6><?php echo $order_type?>
                            <h6 class="mb-1 text-default"><?php echo $order->from_city. " to " . $order->to_city; ?></h6>
                            </div>
                          
                        </div>
                        <div class="media">                            
                            <div class="media-body">
                            
                            <p class=""><?php echo $order->item_name; ?></p>
                            <p class="text-secondary small"><?php echo $order->order_weight; ?>gms - <?php echo $order->item_length."L x ".$order->item_breadth."B x ".$order->item_height."H"; ?> (CM) | <i class='fa fa-inr'></i><?php echo $order->booking_cost?></p>
                                <h6 class="mb-1">Order <?php echo $bstatus; ?>

                                
                                <?php 
                                if($order->from_id == $_SESSION['rexkod_user_id']){
                                    if($order->booking_status=="0"){
                                    echo "<span class='float-right' style='padding:5px 10px;background:#eee;color:#444;font-weight:light;margin-right:-40px !important;border-radius:10px;font-size:14px'>OTP1:".$order->otp_pickup."</span>";
                                    }else if($order->booking_status=="100"){
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
                                
                               </h6><br>
                               <?php if($order->weight_discrepancy){

                                if($order->order_type == "0"){
                                    echo "<span style='color:red;'>Weight Discrepancy Found</span><br>Extra ". $order->weight_discrepancy ."gms - Payable ₹".$order->weight_payable."<br><br>";
                                    
                                    if($wallet->balance_amount >= $order->weight_payable){
                                        echo "Please provide OTP to deduct payable amount from wallet and complete pickup<br><br>";
                                    }else {
                                        echo "Insufficient wallet balance. Please recharge wallet to clear payable amount<br><br>";
                                    }
                                }else if($order->order_type == "10"){
                                    $total_payable = $order->booking_cost + $order->weight_payable;
                                    echo "<span style='color:red;'>Weight Discrepancy Found</span><br>Extra ". $order->weight_discrepancy ."gms - (₹".$order->weight_payable.")<br>Total Payable: ₹".$order->booking_cost." + ₹".$order->weight_payable." = ₹".$total_payable."<br><br>";
                                    
                                    if($wallet->balance_amount >= $total_payable){
                                        echo "Please provide OTP to deduct payable amount from wallet and complete pickup<br><br>";
                                    }else {
                                        echo "Insufficient wallet balance. Please recharge wallet to clear payable amount<br><br>";
                                    }
                                }
                                
                                }?>
                                <?php if($order->booking_status != 99){if($order->booking_status == "0" || $order->booking_status == "100" ){?>
                                <a href="<?php echo URLROOT; ?>/enterprises/cancel_order/<?php echo $order->booking_id;?>"><button class="btn btn-sm btn-warning" style="color:#fff;" onclick="this.disabled=true;" >Cancel</button></a>
                                <?php }}?>
                               
                                
                            </div>
                            <button class="btn btn-default btn-40 rounded-circle"><i class="material-icons">
                               <?php if($order->from_id == $_SESSION['rexkod_user_id']) {echo "call_made";}else{echo "call_received";} ?>
                            </i></button>    
                                                    
                        </div>
                        <hr>
                            <?php if($order->delivery_attempt_1){
                            if($order->delivery_attempt_3){echo "Third Attempt: Not Delivered<br><br>";}
                            else if($order->delivery_attempt_2){echo "Second Attempt: Not Delivered<br><br>";}  else if($order->delivery_attempt_1){echo "First Attempt: Not Delivered<br><br>";}    
                            ?>
                            
                            <?php if($order->booking_status!=15){?> <span id='not-delivered'><div style="display: table">
                            <div style="display: table-cell">
                            <form action='<?php echo URLROOT; ?>/enterprises/<?php if($order->from_id == $_SESSION['rexkod_user_id']){echo "from_remark";}else{echo "to_remark";}?>/<?php echo $order->booking_id; ?>' method='POST'>
                            <input placeholder='Enter remarks here' class='form-control' name="from_remark" style="width:200px;margin-right:10px;color:#333;" required></div>
                            <div style="display: table-cell">
                            <button type='submit' class="btn btn-success btn-sm">Add Remark</button> 
                            </div>
                            </form>
                            </div>

                            </span>
                            <?php } }?>

                            <?php if($order->booking_status==10){?> 
                               <div class="pull-right">
                          <a href="<?php echo URLROOT; ?>/enterprises/feedback/<?php echo $order->booking_id; ?>"><button class='btn btn-default btn-sm'>Feedback</button></a>
                            </div>
                          
                            <?php }?>
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

    <?php require APPROOT . '/views/inc_enterprises/nav-footer.php'; ?>
    <?php require APPROOT . '/views/inc_enterprises/footer.php'; ?>

