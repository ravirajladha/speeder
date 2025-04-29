<?php require APPROOT . '/views/inc_go/header.php'; ?>
<?php require APPROOT . '/views/inc_go/nav-header.php'; 
?>

<div class="container mt-3 mb-3 text-center">
            <h4 class="text-white">Local Orders</h4>
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
                $bstatus = "Accpted";
            }else if($order->status == 2){
                $bstatus = "In Progress";
            }else if($order->status == 3){
                $bstatus = "Completed";
            }else if($order->status == 4){
                $bstatus = "Cancelled";
            }

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

                                
                              <span class="pull-right">OTP1: <?php echo $order->otp_pickup; ?><br>
                             OTP2 <?php echo $order->otp_delivery; ?></span>
                                
                               </h6><br>
                               
                                <?php if($order->status == "0"){?>
                                <a href="<?php echo URLROOT; ?>/go/cancel_hyperlocal_order/<?php echo $order->order_id;?>"><button class="btn btn-sm btn-warning" style="color:#fff;" onclick="this.disabled=true;" >Cancel</button></a>
                                <?php }?>
                               
                                
                            </div>
                            <button class="btn btn-default btn-40 rounded-circle"><i class="material-icons">
                               <?php if($order->user_id == $_SESSION['rexkod_user_id']) {echo "call_made";}else{echo "call_received";} ?>
                            </i></button>    
                                                    
                        </div>
                        <hr>
                        <div id="pbar_outerdiv" style="width: 300px; height: 20px; border: 1px solid grey; z-index: 1; position: relative; border-radius: 5px; -moz-border-radius: 5px;">
                            <div id="pbar_innerdiv" style="background-color: #00b491; z-index: 2; height: 100%; width: 0%;"></div>
                            <div id="pbar_innertext" style="z-index: 3; position: absolute; top: 0; left: 0; width: 100%; height: 100%; color: black; font-weight: bold; text-align: center;">0%</div>
                            </div>
                    </div>
                </div>
                <script src="<?php echo URLROOT; ?>/assets2/js/jquery-3.3.1.min.js"></script>
                <script>
                    var phpTimeStamp = '<?php echo $order->booking_datetime ?>'; /* timestamp format*/
                    var start = new Date('d-m-Y G:H', strtotime($order->booking_status));
                    var maxTime = 6000000;
                    var timeoutVal = Math.floor(maxTime/100);
                    animateUpdate();

                    function updateProgress(percentage) {
                        $('#pbar_innerdiv').css("width", percentage + "%");
                        $('#pbar_innertext').text(percentage + "%");
                    }

                    function animateUpdate() {
                        var now = new Date();
                        var timeDiff = now.getTime() - start.getTime();
                        var perc = Math.round((timeDiff/maxTime)*100);
                        console.log(perc);
                        if (perc <= 100) {
                        updateProgress(perc);
                        setTimeout(animateUpdate, timeoutVal);
                        }
                        if(timeDiff > 6000000) {
                            $('#pbar_outerdiv').html('Taking longer to deliver | Contact Support');
                        }
                    }
                </script>
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

    <?php require APPROOT . '/views/inc_go/nav-footer.php'; ?>
    <?php require APPROOT . '/views/inc_go/footer.php'; ?>

