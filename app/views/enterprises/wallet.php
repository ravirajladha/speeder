<?php require APPROOT . '/views/inc_enterprises/header.php'; ?>
<?php require APPROOT . '/views/inc_enterprises/nav-header.php'; 

$wallet = $data['wallet'];
?>


        <!-- page content start -->
        <div class="container mt-3 mb-4 text-center">
            
            <h2 class="text-white"><i class='fa fa-inr'></i> <?php echo $wallet->balance_amount; ?></h2>
            <p class="text-white mb-4">Total Balance</p>
        </div>

        <div class="main-container">

            <div class="container mb-4">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="card">
                            <div class="card-body container" style='display:table'>
                            <form action='<?php echo URLROOT; ?>/enterprises/pay' method='POST'>
                            <div style="display: table-cell">
                            <input placeholder='Enter amount here' class='form-control' name="amount" style="width:175px;margin-right:20px;color:#333;" required></div>
                            <div style="display: table-cell">
                            <button type='submit' class="btn btn-success btn-sm"><i class='fa fa-inr'></i> Add Money</button> 
                            </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mb-4">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="card">
                            <div class="card-body container" style='display:table'>
                            <form action='#' method='POST'>
                            <div style="display: table-cell">
                            <input placeholder='Enter Referral Code' class='form-control' name="amount" style="width:175px;margin-right:20px;color:#333;" required></div>
                            <div style="display: table-cell">
                            <button type='submit' class="btn btn-success btn-sm">Redeem Now</button> 
                            </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            

        
          

            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0">Wallet History</h6>
                    </div>

                    <?php foreach($data['orders'] as $order): ?>
                    <div class="card-body px-0 pt-0">
                        <div class="list-group list-group-flush border-top border-color">
                            <a href="#" class="list-group-item list-group-item-action border-color">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="avatar avatar-50 bg-default-light text-default rounded">
                                            <span class="material-icons">receipt</span>
                                        </div>
                                    </div>
                                    <div class="col align-self-center pl-0">
                                        <h6 class="mb-1"><i class='fa fa-inr'></i> <?php echo $order->booking_cost; ?></h6>
                                        <p class="text-secondary"><?php echo date('M jS Y, h:m A', strtotime($order->booking_datetime)); ?></p>
                                    </div>
                                </div>
                            </a>
                         
                        </div>
                    </div>

                    <?php endforeach; ?>
                    


                </div>
            </div>
        </div>
    </main>


    <?php require APPROOT . '/views/inc_enterprises/nav-footer.php'; ?>
    <?php require APPROOT . '/views/inc_enterprises/footer.php'; ?>

