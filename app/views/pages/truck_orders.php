<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/nav-header.php'; 
?>

<div class="container mt-3 mb-3 text-center">
            <h4 class="text-white">Truck Orders</h4>
        </div>
    <!-- Begin page content -->
    <main class="flex-shrink-0 min">

        <!-- page content start -->

        <div class="main-container">
            <div class="container">
              
            <?php $order_count = 0;

            foreach($data['all_orders'] as $order):

            $order_count =1;
            if($order->status == 0){
                $bstatus = "Placed";
            }else if($order->status == 1){
                $bstatus = "In Progress";
            }else if($order->status == 2){
                $bstatus = "Completed";
            }else if($order->status == 3){
                $bstatus = "Cancelled";
            }

            if($order->truck=="1"){
                $truck_type="Tempo";}
            else if($order->truck=="2"){
                $truck_type="Truck";}
            else if($order->truck=="3"){
                $truck_type="Lorry";}    
                ?>
                
                <div class="card mb-3">
                    <div class="card-body position-relative">
                        <div class="row mb-2">
                            
                            <div class="col"><h6>Order #<?php echo $order->order_id; ?></h6><?php echo $order_type?>
                            <h6 class="mb-1 text-default"><?php echo $order->from_area . " to " . $order->to_area; ?></h6>
                            </div>
                          
                        </div>
                        <div class="media">                            
                            <div class="media-body">
                            
                            <p class=""><?php echo $truck_type; ?></p>
                            <p class="text-secondary"><?php echo $order->distance; ?>Kms  | <i class='fa fa-inr'></i><?php echo $order->cost?></p>
                                <h6 class="mb-1">Order <?php echo $bstatus; ?>

                                
                              
                                
                               </h6><br>
                               
                                <?php if($order->status == "0"){?>
                                <a href="<?php echo URLROOT; ?>/pages/cancel_truck_order/<?php echo $order->order_id;?>"><button class="btn btn-sm btn-warning" style="color:#fff;" onclick="this.disabled=true;" >Cancel</button></a>
                                <?php }?>
                               
                                
                            </div>
                            <button class="btn btn-default btn-40 rounded-circle"><i class="material-icons">
                               <?php if($order->user_id == $_SESSION['rexkod_user_id']) {echo "call_made";}else{echo "call_received";} ?>
                            </i></button>    
                                                    
                        </div>
                        <hr>
                          
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

