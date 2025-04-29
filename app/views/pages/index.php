<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/nav-header.php'; ?>

        <div class="container mt-3 mb-4 text-center">
            <h4 class="text-white">Welcome, <?php echo ucfirst($_SESSION['rexkod_user_name']); ?></h4>
        </div>

        <div class="main-container">
            <!-- page content start -->

            <div class="container mb-4">
                <!-- Swiper -->
                <div class="swiper-container offerslidetab1">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="card overflow-hidden">
                                <div class="background opacity-30">
                                    <img src="<?php echo URLROOT; ?>/uploads/<?php echo $data['banner']->banner1; ?>" alt="">
                                </div>
                                <div class="card-body text-white">
                                    <br><br><br><br><br><br><br>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card overflow-hidden">
                                <div class="background opacity-30">
                                <img src="<?php echo URLROOT; ?>/uploads/<?php echo $data['banner']->banner2; ?>" alt="">
                                </div>
                                <div class="card-body text-white">
                                    <br><br><br><br><br><br><br>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card overflow-hidden">
                                <div class="background opacity-30">
                                <img src="<?php echo URLROOT; ?>/uploads/<?php echo $data['banner']->banner3; ?>" alt="">
                                </div>
                                <div class="card-body text-white">
                                    <br><br><br><br><br><br><br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination white-pagination text-left pl-2 mb-3"></div>
                </div>
            </div>
<style>
    .btn-outline-secondary {
    color: #fff;
    border-color: #fff;
}
</style>

             <div class="container mb-4">
                <div class="card" style="background:#00b491">
                    <div class="card-body text-center ">
                        <div class="row justify-content-equal no-gutters">
                            <div class="col-4 col-md-2 mb-3">
                                <a href="<?php echo URLROOT; ?>/pages/new_order"><div class="icon icon-50 rounded-circle mb-1 bg-white-light text-white"> <i class="material-icons">inventory</i></div>
                                <p class="text-white"><small>Book Couriers</small></p></a>
                            </div>
                            <div class="col-4 col-md-2 mb-3">
                                <a href="<?php echo URLROOT; ?>/pages/hyperlocal"><div class="icon icon-50 rounded-circle mb-1 bg-white-light text-white">  <i class="material-icons">shopping_bag</i></div>
                                <p class="text-white"><small>Book Local</small></p></a>
                            </div>
                            <div class="col-4 col-md-2 mb-3">
                                <a href="<?php echo URLROOT; ?>/pages/truck_order"><div class="icon icon-50 rounded-circle mb-1 bg-white-light text-white"> <i class="material-icons">local_shipping</i></div>
                                <p class="text-white"><small>Book Truck</small></p></a>
                            </div>
                            <div class="col-4 col-md-2 mb-3">
                                <a href="<?php echo URLROOT; ?>/pages/orders"><div class="icon icon-50 rounded-circle mb-1 bg-white-light text-white" style="border:1px dotted #fff;"> <i class="material-icons">inventory</i></div>
                                <p class="text-white"><small>Courier Orders</small></p></a>
                            </div>
                            <div class="col-4 col-md-2 mb-3">
                               <a href="<?php echo URLROOT; ?>/pages/hyperlocal_orders"> <div class="icon icon-50 rounded-circle mb-1 bg-white-light text-white" style="border:1px dotted #fff;">  <i class="material-icons">shopping_bag</i></div>
                                <p class="text-white"><small>Local Orders</small></p></a>
                            </div>
                            <div class="col-4 col-md-2 mb-3">
                                <a href="<?php echo URLROOT; ?>/pages/truck_orders"><div class="icon icon-50 rounded-circle mb-1 bg-white-light text-white" style="border:1px dotted #fff;"> <i class="material-icons">local_shipping</i></div>
                                <p class="text-white"><small>Truck Orders</small></p></a>
                            </div>
                        </div>
                        <button class="btn btn-sm btn-outline-secondary rounded" id="more-expand-btn">Show more <span class="ml-2 small material-icons">expand_more</span></button>
                        <div class="row justify-content-equal no-gutters" id="more-expand">
                            <div class="col-4 col-md-2">
                                <a href="<?php echo URLROOT; ?>/pages/contacts"><div class="icon icon-50 rounded-circle mb-1 bg-white-light text-white"><span class="material-icons">person</span></div>
                                <p class="text-white"><small>Contacts</small></p></a>
                            </div>
                            <div class="col-4 col-md-2">
                                <a href="<?php echo URLROOT; ?>/pages/wallet"><div class="icon icon-50 rounded-circle mb-1 bg-white-light text-white"><span class="material-icons">account_balance_wallet</span></div>
                                <p class="text-white"><small>Wallet</small></p></a>
                            </div>
                            <div class="col-4 col-md-2">
                                <a href="<?php echo URLROOT; ?>/pages/transactions"><div class="icon icon-50 rounded-circle mb-1 bg-white-light text-white"><span class="material-icons">list</span></div>
                                <p class="text-white"><small>Transactions</small></p></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

           
            <!-- Swiper -->

            <?php 
                $order_count = 0;
                foreach(array_slice($data['orders'], 0, 2) as $order): 
                $order_count++;
                endforeach;
            ?>

            <div class="container mb-4">
                <div class="row">
                   
                    <?php if($order_count){ ?>
                         <div class="col">
                        <h6 class="subtitle mb-3">Orders </h6>
                    </div>
                    <div class="col-auto"><a href="<?php echo URLROOT; ?>/pages/orders" class="text-default">View all</a></div>
                    <?php } else { ?>
                         <div class="col">
                        <h6 class="subtitle mb-3">Please place an order to track</h6>
                    </div>
                    <div class="col-auto"><a href="<?php echo URLROOT; ?>/pages/orders" class="text-default">View all</a></div>
                    <?php } ?>
                </div>

                <div class="row">

                <?php $order_count = 0;
                foreach(array_slice($data['orders'], 0, 2) as $order): 
                $order_count++;
                if($order->booking_status == 0){
                    $bstatus = "Placed";
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
                ?>
                    <div class="col-12 col-md-6">
                        <div class="card border-0 mb-4">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto pr-0">
                                        <div class="avatar avatar-50 border-0 bg-default-light rounded-circle text-default">
                                        <i class="material-icons vm text-template">local_shipping</i>
                                        </div>
                                    </div>
                                    <div class="col-auto align-self-center">
                                        <h6 class="mb-1"><?php echo $order->from_city; ?></h6>
                                     
                                    </div>
                                    <div class="col-auto align-self-center">
                                    <i style="color:#00b491" class="fa fa-arrow-right"></i>
                                    </div>
                                    <div class="col-auto align-self-center">
                                        <h6 class="mb-1"><?php echo $order->to_city; ?></h6>
                                       
                                    </div>
                                </div><center><p class="small text-secondary">Order <?php echo $bstatus; ?></p></center>
                            </div>
                        </div>
                    </div>
            <?php endforeach; ?>     
                   
                </div>

            </div>
            <div class="container mb-4">
                <div class="swiper-container swiper-users text-center ">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="card ">
                                <div class="card-body p-2">
                                    <a href="<?php echo URLROOT; ?>/pages/new_order" class="avatar avatar-60 rounded mb-1 bg-default-light">
                                        <span class="material-icons">add</span>
                                    </a>
                                    <p class="text-secondary"><small>Book Courier</small></p>
                                </div>
                            </div>
                        </div>

            
                    </div>
                </div>
            </div>

        
          
            

        </div>
    </main>

    <?php require APPROOT . '/views/inc/nav-footer.php'; ?>
    <?php require APPROOT . '/views/inc/footer.php'; ?>