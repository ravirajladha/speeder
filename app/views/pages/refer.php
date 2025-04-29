<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/nav-header.php'; ?>





        <!-- page content start -->
        <div class="container mb-4 text-center text-white">
            <div class="row">
                <div class="col col-sm-8 col-md-6 col-lg-5 mx-auto">
                    <img src="<?php echo URLROOT;?>/assets2/img/refer.png" alt="" class="mw-100 mb-4">
                    <h5>Invite your contacts<br>or friends and earn rewards</h5>
                </div>
            </div>
        </div>
        <div class="main-container">
            <div class="container mb-4">
                <div class="card border-0 mb-3">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto pr-0">
                                <div class="avatar avatar-50 border-0 bg-danger-light rounded-circle text-danger">
                                    <i class="material-icons vm text-template">card_giftcard</i>
                                </div>
                            </div>
                            <div class="col-auto align-self-center">
                                <h6 class="mb-1">Refer and Earn Rewards</h6>
                                <p class="small text-secondary">Share your referal link and start earning</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mb-4">
                <div class="alert alert-success d-none" id="successmessage">Referral link copied</div>
                <div class="input-group mb-3"><span style="margin-right:30px;margin-top:10px;">Your Referral Code </span>
                    <input type="text" class="form-control" placeholder="refferal Link" value="<?php echo strtoupper(substr ($_SESSION['rexkod_user_name'], 0, 3))."".$_SESSION['rexkod_user_id'];?>" id="referallnk" readonly>
                    <div class="input-group-append">
                        
                    </div>
                </div>
              

            </div>
        
        </div>
    </main>


    <?php require APPROOT . '/views/inc/nav-footer.php'; ?>
    <?php require APPROOT . '/views/inc/footer.php'; ?>

