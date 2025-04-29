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
            if($order->booking_status == 0){
                $bstatus = "To be Picked";
            }else if($order->booking_status == 1){
                $bstatus = "Arrived for pickup";
            }else if($order->booking_status == 2){
                $bstatus = "Picked";
            }elseif($order->booking_status == 3){
                $bstatus = "At Transit";
            }else if($order->booking_status == 4){
                $bstatus = "Delivered to Source Hub";
            }
                ?>
                
                <div class="card mb-3">
                    <div class="card-body position-relative">
                        <div class="row mb-2">
                            <div class="col">
                            <h6>Order #<?php echo $order->booking_id; ?></h6>
                            <h6 class="mb-1 text-default"><?php echo $order->from_city. " to " . $order->to_city; ?></h6>
                            </div>
                            
                        </div>
                        <div class="media">                            
                            <div class="media-body">
                            
                            <p class=""><?php echo $order->from_name; ?>, <?php echo $order->from_phone; ?></p>
                            <p class="text-secondary small"><?php echo $order->order_weight; ?>Gms - <?php echo $order->item_length."L x ".$order->item_breadth."B x ".$order->item_height."H"; ?> (CM)</p>
                                <h6 class="mb-1">Order <?php echo $bstatus; ?></h6>
                               
                            <?php  if($order->booking_status == 0 || $order->booking_status == 1){?>

                            <br>


                            <div id="first<?php echo $order->booking_id?>" <?php if($order->booking_status == 1 ){echo "style='display:none'";}?>>
                                <div style="display:table-cell">
                                <input type="text" class="form-control" id="" placeholder="Enter OTP to proceed" onkeyup="checkotp_first(this.value,<?php echo $order->otp_pickup;?>,<?php echo $order->booking_id;?>);">
                                </div>
                            </div>

                           <div id="main<?php echo $order->booking_id?>" <?php if($order->booking_status == "0" ){echo "style='display:none'";}?>>
                            <div style="display:table">
                                <div style="display:table-cell">
                              <label class="form-control-label">Length</label>
                                    <input type="text" class="form-control" id="item_length" value="<?php echo $order->item_length; ?>">
                                </div>
                                <div style="display:table-cell">
                                <label class="form-control-label">Breadth</label>
                                    <input type="text" class="form-control" id="item_breadth" value="<?php echo $order->item_breadth; ?>">
                                </div>
                                <div style="display:table-cell">
                                <label class="form-control-label">Height</label> 
                                    <input type="text" class="form-control" id="item_height" value="<?php echo $order->item_height; ?>">
                                </div>
                                <div style="display:table-cell">
                                <label class="form-control-label">Weight</label> 
                                    <input type="text" class="form-control" placeholder="Weight" id="item_weight" value="<?php echo $order->item_weight; ?>">
                                </div>
                            </div>
                            <br>
                            <div style="display:table">
                               
                                <div style="display:table-cell">
                                  <button style="border-radius:15px;margin-right:25px" type="submit" class="btn btn-success btn-sm" onclick="checkcost(<?php echo $order->booking_id; ?>)">Update</button>
                                </div>

                                <div style="display:table-cell">
                                 <p id="pm<?php echo $order->booking_id?>"></p>
                                </div>
                            </div>
                            </div>

                            <br>
<hr>
                            <form action="<?php echo URLROOT; ?>/drivers/order_update_pickup/<?php echo 
                            $order->booking_id; ?>" method="POST" style="display:none" id="fm<?php echo $order->booking_id?>">
                            <div style="display:table">
                            <div style="display:table-cell">
                            <input type="text" class="form-control" placeholder="Scan Barcode" name="barcode" required>
                            </div><div style="display:table-cell">
                            <input type="text" class="form-control" placeholder="OTP" onkeyup="checkotp_second(this.value,<?php echo $order->otp_pickup2;?>,<?php echo $order->booking_id; ?>);">
                            </div></div><br>
                           <button type="submit" style="display:none;" class="btn btn-success btn-sm pull-right" id="picked">Picked</button>
                            </form>
                          
                            
                            <?php }else  if($order->booking_status == 3){?>
                             
                            <a href="<?php echo URLROOT; ?>/drivers/order_update/<?php echo $order->booking_id; ?>/4"><button class="btn btn-success btn-sm">Delivered at Hub</button> </a>
                            <?php }?>
                            </div>        
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
  function checkotp_first(val,otp,oid){
    if(val == otp){
      
        $.ajax({
            url  : '<?php echo URLROOT; ?>/drivers/order_update/'+ oid +'/1',
            type : 'POST',
            data : {oid},

            success : function()
            {
                
            }

        });
        
    document.getElementById("first"+oid).style.display = "none";
    document.getElementById("main"+oid).style.display = "block";
    }
  }
  
  function checkotp_second(val,otp,id){

    if(val == otp){

        var item_weight = $('#item_weight').val();
        var item_length = $('#item_length').val();
        var item_breadth = $('#item_breadth').val();
        var item_height = $('#item_height').val();

        $.ajax({
            url  : '<?php echo URLROOT; ?>/drivers/update_discrepancy/',
            type : 'POST',
            data : {id, item_weight,item_length,item_breadth,item_height},

            success : function(res)
            {
                
            }

        });
    document.getElementById("picked").style.display = "block";
    document.getElementById("pm"+id).innerHTML = "No Weight Discrepancy";
    }
  }



function checkcost(id){

    var item_weight = $('#item_weight').val();
    var item_length = $('#item_length').val();
    var item_breadth = $('#item_breadth').val();
    var item_height = $('#item_height').val();

        $.ajax({
            url  : '<?php echo URLROOT; ?>/drivers/check_discrepancy',
            type : 'POST',
            data : {id, item_weight,item_length,item_breadth,item_height},

            success : function(res)
            {
                document.getElementById("pm"+id).innerHTML = res;
            }

        });
                        
    document.getElementById("fm"+id).style.display = "block";
  }





</script>



