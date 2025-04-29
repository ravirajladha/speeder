<?php require APPROOT . '/views/inc_enterprises/header.php'; ?>
<?php require APPROOT . '/views/inc_enterprises/nav-header.php'; ?>

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



            <div class="container mb-4 text-center">
                <div class="card bg-default-secondary shadow-default">
                    <div class="card-body">
                        <!-- Swiper -->
                        <div class="swiper-container addsendcarousel text-center">
                            <div class="swiper-wrapper mb-4">
                                <a href="<?php echo URLROOT; ?>/enterprises/new_order" class="swiper-slide text-white">
                                    <div class="icon icon-50 rounded-circle mb-2 bg-white-light"><span class="material-icons">call_made</span></div>
                                    <p><small>New Order</small></p>
                                </a>

                               
                                <a href="<?php echo URLROOT; ?>/enterprises/orders" class="swiper-slide text-white">
                                    <div class="icon icon-50 rounded-circle mb-2 bg-white-light"><span class="material-icons">swap_horiz</span></div>
                                    <p><small>Orders</small></p>
                                </a>

                                
                                

                                <a href="<?php echo URLROOT; ?>/enterprises/wallet" class="swiper-slide text-white">
                                    <div class="icon icon-50 rounded-circle mb-2 bg-white-light"><span class="material-icons">class</span></div>
                                    <p><small>Wallet</small></p>
                                </a>
                                <a href="<?php echo URLROOT; ?>/enterprises/contacts" class="swiper-slide text-white">
                                    <div class="icon icon-50 rounded-circle mb-2 bg-white-light"><span class="material-icons">people</span></div>
                                    <p><small>Contacts</small></p>
                                </a>
                                <a href="<?php echo URLROOT; ?>/enterprises/transactions" class="swiper-slide text-white">
                                    <div class="icon icon-50 rounded-circle mb-2 bg-white-light"><span class="material-icons">money</span></div>
                                    <p><small>Transactions</small></p>
                                </a>
                            </div>
                            <!-- Add Pagination -->
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Swiper -->

            <div class="container mb-4">
                <div class="row">
                    <div class="col">
                        <h6 class="subtitle mb-3">Orders </h6>
                    </div>
                    <div class="col-auto"><a href="<?php echo URLROOT; ?>/enterprises/orders" class="text-default">View all</a></div>
                </div>

                <div class="row">

                <?php $order_count = 0;
            foreach(array_slice($data['orders'], 0, 2) as $order): 
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
                                    <a href="<?php echo URLROOT; ?>/enterprises/new_order" class="avatar avatar-60 rounded mb-1 bg-default-light">
                                        <span class="material-icons">add</span>
                                    </a>
                                    <p class="text-secondary"><small>Send</small></p>
                                </div>
                            </div>
                        </div>

                        <?php $order_count = 0;
            foreach($data['contacts'] as $contact): ?>
                        <div class="swiper-slide">
                            <div class="card">
                                <div class="card-body p-2">
                                    <a href='<?php echo URLROOT; ?>/enterprises/new_order/<?php echo $contact->contact_id; ?>'><div class="avatar avatar-60 rounded mb-1">
                                        <div class="background"><img src="<?php echo URLROOT; ?>/assets2/img/user1.jpeg" alt=""></div>
                                    </div></a>
                                    <p class="text-secondary"><small><?php echo $contact->name; ?></small></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    </div>
                </div>
            </div>

        
          
            

        </div>
    </main>

    <?php require APPROOT . '/views/inc_enterprises/nav-footer.php'; ?>
    <?php require APPROOT . '/views/inc_enterprises/footer.php'; ?>