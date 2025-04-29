<?php require APPROOT . '/views/inc_go/header.php'; ?>
<?php require APPROOT . '/views/inc_go/nav-header.php'; ?>

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
                                <a href="<?php echo URLROOT; ?>/go/hyperlocal"><div class="icon icon-50 rounded-circle mb-1 bg-white-light text-white">  <i class="material-icons">shopping_bag</i></div>
                                <p class="text-white"><small>Book Local</small></p></a>
                            </div>
                            
                          
                            <div class="col-4 col-md-2 mb-3">
                               <a href="<?php echo URLROOT; ?>/go/hyperlocal_orders"> <div class="icon icon-50 rounded-circle mb-1 bg-white-light text-white" style="border:1px dotted #fff;">  <i class="material-icons">shopping_bag</i></div>
                                <p class="text-white"><small>Local Orders</small></p></a>
                            </div>

                            <div class="col-4 col-md-2 mb-3">
                            <a href="<?php echo URLROOT; ?>/go/wallet"><div class="icon icon-50 rounded-circle mb-1 bg-white-light text-white"><span class="material-icons">account_balance_wallet</span></div>
                                <p class="text-white"><small>Wallet</small></p></a>
                            </div>
                            
                        </div>
                        <button class="btn btn-sm btn-outline-secondary rounded" id="more-expand-btn">Show more <span class="ml-2 small material-icons">expand_more</span></button>
                        <div class="row justify-content-equal no-gutters" id="more-expand">
                            <div class="col-4 col-md-2">
                                <a href="<?php echo URLROOT; ?>/go/profile"><div class="icon icon-50 rounded-circle mb-1 bg-white-light text-white"><span class="material-icons">person</span></div>
                                <p class="text-white"><small>Profile</small></p></a>
                            </div>
                            
                            <div class="col-4 col-md-2">
                                <a href="<?php echo URLROOT; ?>/go/transactions"><div class="icon icon-50 rounded-circle mb-1 bg-white-light text-white"><span class="material-icons">list</span></div>
                                <p class="text-white"><small>Transactions</small></p></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

           
            <!-- Swiper -->


            </div> <br><br>
            <div class="container mb-4">
                <div class="swiper-container swiper-users text-center ">
                    <div class="swiper-wrapper">
                       
                        <div class="swiper-slide">
                            <div class="card ">
                                <div class="card-body p-2">
                                    <a href="<?php echo URLROOT; ?>/go/hyperlocal" class="avatar avatar-60 rounded mb-1 bg-default-light">
                                        <span class="material-icons">add</span>
                                    </a>
                                    <p class="text-secondary"><small>Book Local</small></p>
                                </div>
                            </div>
                        </div>

            
                    </div>
                </div>
            </div>

        
          
            

        </div>
    </main>

    <?php require APPROOT . '/views/inc_go/nav-footer.php'; ?>
    <?php require APPROOT . '/views/inc_go/footer.php'; ?>