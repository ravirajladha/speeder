<?php require APPROOT . '/views/inc_driver/header.php'; ?>
<?php require APPROOT . '/views/inc_driver/nav-header.php'; ?>

        <div class="container mt-3 mb-4 text-center">
            <h4 class="text-white">Welcome, <?php echo $_SESSION['rexkod_driver_name']; ?></h4>
        </div>

        <div class="main-container">
            <!-- page content start -->

            <div class="container mb-4 text-center">
                <div class="card bg-default-secondary shadow-default">
                    <div class="card-body">
                        <!-- Swiper -->
                        <div class="swiper-container addsendcarousel text-center">
                            <div class="swiper-wrapper mb-4">
                                <a href="<?php echo URLROOT; ?>/drivers/pickup_orders" class="swiper-slide text-white">
                                    <div class="icon icon-50 rounded-circle mb-2 bg-white-light"><span class="material-icons">call_made</span></div>
                                    <p><small>Pickups</small></p>
                                </a>
                                <a href="#" class="swiper-slide text-white">
                                    <div class="icon icon-50 rounded-circle mb-2 bg-white-light"><span class="material-icons">call_received</span></div>
                                    <p><small>Delivery</small></p>
                                </a>
                                <a href="#" class="swiper-slide text-white">
                                    <div class="icon icon-50 rounded-circle mb-2 bg-white-light"><span class="material-icons">swap_horiz</span></div>
                                    <p><small>Orders</small></p>
                                </a>
                                <a href="#" class="swiper-slide text-white">
                                    <div class="icon icon-50 rounded-circle mb-2 bg-white-light"><span class="material-icons">class</span></div>
                                    <p><small>Sent</small></p>
                                </a>
                                <a href="#" class="swiper-slide text-white">
                                    <div class="icon icon-50 rounded-circle mb-2 bg-white-light"><span class="material-icons">class</span></div>
                                    <p><small>Recieved</small></p>
                                </a>
                                <a href="#" class="swiper-slide text-white">
                                    <div class="icon icon-50 rounded-circle mb-2 bg-white-light"><span class="material-icons">receipt</span></div>
                                    <p><small>Bills</small></p>
                                </a>
                            </div>
                            <!-- Add Pagination -->
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        

            <div class="container mb-4">
                <div class="row">
                    <div class="col">
                        <h6 class="subtitle mb-3">Orders </h6>
                    </div>
                    <div class="col-auto"><a href="" class="text-default">View all</a></div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="card border-0 mb-4">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto pr-0">
                                        <div class="avatar avatar-50 border-0 bg-default-light rounded-circle text-default">
                                        <i class="material-icons vm text-template">local_shipping</i>
                                        </div>
                                    </div>
                                    <div class="col-4 align-self-center">
                                        <h6 class="mb-1">From</h6>
                                        <p class="small text-secondary">In Transit</p>
                                    </div>
                                    <div class="col-auto align-self-center border-left">
                                        <h6 class="mb-1">To</h6>
                                        <p class="small text-secondary">Delivery: Date</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card border-0 mb-4">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto pr-0">
                                        <div class="avatar avatar-50 border-0 bg-default-light rounded-circle text-default">
                                        <i class="material-icons vm text-template">local_shipping</i>
                                        </div>
                                    </div>
                                    <div class="col-4 align-self-center">
                                        <h6 class="mb-1">From</h6>
                                        <p class="small text-secondary">In Transit</p>
                                    </div>
                                    <div class="col-auto align-self-center border-left">
                                        <h6 class="mb-1">To</h6>
                                        <p class="small text-secondary">Delivery: Date</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>

            <div class="container mb-4">
                <div class="card">
                    <div class="card-body text-center ">
                        <div class="row justify-content-equal no-gutters">
                            <div class="col-4 col-md-2 mb-3">
                                <div class="icon icon-50 rounded-circle mb-1 bg-default-light text-default"><span class="material-icons">qr_code_2</span></div>
                                <p class="text-secondary"><small>Pickups</small></p>
                            </div>
                            <div class="col-4 col-md-2 mb-3">
                                <div class="icon icon-50 rounded-circle mb-1 bg-default-light text-default"><span class="material-icons">swap_horiz</span></div>
                                <p class="text-secondary"><small>Delivery</small></p>
                            </div>
                            <div class="col-4 col-md-2 mb-3">
                                <div class="icon icon-50 rounded-circle mb-1 bg-default-light text-default"><span class="material-icons">sim_card</span></div>
                                <p class="text-secondary"><small>Wallet</small></p>
                            </div>
                            <div class="col-4 col-md-2 mb-3">
                                <div class="icon icon-50 rounded-circle mb-1 bg-default-light text-default"><span class="material-icons">account_circle</span></div>
                                <p class="text-secondary"><small>Support</small></p>
                            </div>
                            <div class="col-4 col-md-2 mb-3">
                                <div class="icon icon-50 rounded-circle mb-1 bg-default-light text-default"><span class="material-icons">receipt</span></div>
                                <p class="text-secondary"><small>Vehicle</small></p>
                            </div>
                            <div class="col-4 col-md-2 mb-3">
                                <div class="icon icon-50 rounded-circle mb-1 bg-default-light text-default"><span class="material-icons">wb_incandescent</span></div>
                                <p class="text-secondary"><small>Distance</small></p>
                            </div>
                        </div>
                        <button class="btn btn-sm btn-outline-secondary rounded" id="more-expand-btn">Show more <span class="ml-2 small material-icons">expand_more</span></button>
                        <div class="row justify-content-equal no-gutters" id="more-expand">
                            <div class="col-4 col-md-2">
                                <div class="icon icon-50 rounded-circle mb-1 bg-default-light text-default"><span class="material-icons">beach_access</span></div>
                                <p class="text-secondary"><small>Feedbacks</small></p>
                            </div>
                            <div class="col-4 col-md-2">
                                <div class="icon icon-50 rounded-circle mb-1 bg-default-light text-default"><span class="material-icons">drive_eta</span></div>
                                <p class="text-secondary"><small>Ratings</small></p>
                            </div>
                            <div class="col-4 col-md-2">
                                <div class="icon icon-50 rounded-circle mb-1 bg-default-light text-default"><span class="material-icons">flight</span></div>
                                <p class="text-secondary"><small>Transport</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

        </div>
    </main>

    <?php require APPROOT . '/views/inc_driver/nav-footer.php'; ?>
    <?php require APPROOT . '/views/inc_driver/footer.php'; ?>