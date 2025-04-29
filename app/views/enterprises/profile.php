<?php require APPROOT . '/views/inc_enterprises/header.php'; ?>
<?php require APPROOT . '/views/inc_enterprises/nav-header.php'; ?>







       

        <div class="main-container">
    

            <div class="container">
                <div class="card">
                   
                    <div class="card-body px-0 pt-0">
                        <div class="list-group list-group-flush border-top border-color">
                           
                            <a href="<?php echo URLROOT; ?>/enterprises/logout" class="list-group-item list-group-item-action border-color">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="avatar avatar-50 bg-danger-light text-danger rounded">
                                            <span class="material-icons">person</span>
                                        </div>
                                    </div>
                                    <div class="col align-self-center pl-0">
                                    <h6 class="mb-1"><?php echo $_SESSION['rexkod_user_name'];?></h6>
                                        
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0">
                        <div class="list-group list-group-flush border-top border-color">
                           
                            <a href="<?php echo URLROOT; ?>/enterprises/logout" class="list-group-item list-group-item-action border-color">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="avatar avatar-50 bg-danger-light text-danger rounded">
                                            <span class="material-icons">phone</span>
                                        </div>
                                    </div>
                                    <div class="col align-self-center pl-0">
                                    <h6 class="mb-1"><?php echo $_SESSION['rexkod_user_phone'];?></h6>
                                        
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </main>

    <?php require APPROOT . '/views/inc_enterprises/nav-footer.php'; ?>
    <?php require APPROOT . '/views/inc_enterprises/footer.php'; ?>

