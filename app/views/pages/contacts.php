<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/nav-header.php'; ?>

        <div class="container mt-3 mb-4 text-center">
            <h4 class="text-white">My Contacts</h4>
        </div>

        <div class="main-container">
            <!-- page content start -->

       


         

            <div class="container mb-4">
                <div class="swiper-ontainer swier-users text-center ">
                   
                   
                <div class="container mb-4">
                <div class="swiper-contaner swier-users text-center ">
                    <div class="swiper-wraper">
                        <?php foreach($data['contacts'] as $contact){?>
                       <a href="<?php echo URLROOT; ?>/pages/new_order/<?php echo $contact->contact_id; ?>"> <div class="swiper-slide">
                            <div class="card">
                                <div class="card-body p-2" style="display:table">
                                    <div class="avatar avatar-60 rounded mb-1" style="display:table-cell">
                                        <div class="backgound">
                                            <img src="<?php echo URLROOT; ?>/assets2/img/user.png" alt="" style="width:35px !important">
                                        </div>
                                    </div>
                                    <div style="display:table-cell">
                                    <h5 class="text-secondary"><small><?php echo $contact->name; ?></small></h5>
                                    <h5 class="text-secondary"><small><?php echo $contact->phone; ?></small></h5>
                                    </div>
                                </div>
                            </div>
                        </div></a><br>
<?php } ?>
                        
                      
                    </div>
                </div>
            </div>
                </div>
            </div>

         

          
            

        </div>
    </main>

    <?php require APPROOT . '/views/inc/nav-footer.php'; ?>
    <?php require APPROOT . '/views/inc/footer.php'; ?>