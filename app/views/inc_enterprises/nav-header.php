

    <!-- menu main -->
    <div class="main-menu">
        <div class="row mb-4 no-gutters">
            <div class="col-auto"><button class="btn btn-link btn-40 btn-close text-white"><span class="material-icons">chevron_left</span></button></div>
            <div class="col-auto">
                <div class="avatar avatar-40 rounded-circle position-relative">
                    <figure class="background">
                        <img src="<?php echo URLROOT;?>/assets/images/profile.png">
                    </figure>
                </div>
            </div>
            <div class="col pl-3 text-left align-self-center">
              <h6 class="mb-1"><?php echo $_SESSION['rexkod_user_name']; ?></h6>
                <p class="small text-default-seconary"><?php echo $_SESSION['rexkod_user_email']; ?></p>
            </div>
        </div>
        <div class="menu-container">

            <ul class="nav nav-pills flex-column ">
           
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/enterprises/orders">
                        <div>
                            <span class="material-icons icon">insert_chart</span>
                            Orders 
                        </div>
                        <span class="arrow material-icons">chevron_right</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/enterprises/contacts">
                        <div>
                            <span class="material-icons icon">perm_contact_calendar</span>
                            My Contacts 
                        </div>
                        <span class="arrow material-icons">chevron_right</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/enterprises/wallet">
                        <div>
                            <span class="material-icons icon">card_giftcard</span>
                            Wallet & Passbook 
                        </div>
                        <span class="arrow material-icons">chevron_right</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/enterprises/discrepancy">
                        <div>
                            <span class="material-icons icon">shopping_bag</span>
                            Parcel discrepancy 
                        </div>
                        <span class="arrow material-icons">chevron_right</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/enterprises/refer">
                        <div>
                            <span class="material-icons icon">layers</span>
                            Refer & Earn 
                        </div>
                        <span class="arrow material-icons">chevron_right</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/enterprises/profile">
                        <div>
                            <span class="material-icons icon">widgets</span>
                            Profile
                        </div>
                        <span class="arrow material-icons">chevron_right</span>
                    </a>
                </li>
                <!--
                <li class="nav-item">
                    <a class="nav-link" href="controls.html">
                        <div>
                            <span class="material-icons icon">widgets</span>
                            Help & Support 
                        </div>
                        <span class="arrow material-icons">chevron_right</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="controls.html">
                        <div>
                            <span class="material-icons icon">widgets</span>
                            Privacy Policy 
                        </div>
                        <span class="arrow material-icons">chevron_right</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="controls.html">
                        <div>
                            <span class="material-icons icon">widgets</span>
                            About Speeder 
                        </div>
                        <span class="arrow material-icons">chevron_right</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="controls.html">
                        <div>
                            <span class="material-icons icon">widgets</span>
                            Share feedback 
                        </div>
                        <span class="arrow material-icons">chevron_right</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="controls.html">
                        <div>
                            <span class="material-icons icon">widgets</span>
                            Rate Us
                        </div>
                        <span class="arrow material-icons">chevron_right</span>
                    </a>
                </li>
            </ul>
-->
            <div class="text-center">
                <a href="<?php echo URLROOT;?>/enterprises/logout" class="btn btn-default rounded my-3 mx-auto">Logout</a>
            </div>
        </div>
    </div>
    <div class="backdrop"></div>
    

    <!-- Begin page content -->
    <main class="flex-shrink-0 main has-footer">
        <!-- Fixed navbar -->
        <header class="header">
            <div class="row">
                <div class="col-auto px-0">
                    <button class="menu-btn btn btn-40 btn-link" type="button">
                        <span class="material-icons">menu</span>
                    </button>
                </div>
                <div class="text-left col align-self-center">
                    <a class="navbar-brand" href="<?php echo URLROOT; ?>/enterprises/index">
                        <img src="<?php echo URLROOT; ?>/assets2/img/logo.png" alt="" width="100">
                    </a>
                </div>
                <div class="ml-auto col-auto pl-0">

                   
                </div>
            </div>
        </header>