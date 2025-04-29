  <!-- Page Sidebar Start-->
  <div class="page-sidebar">
            <div class="main-header-left d-none d-lg-block">
                <div class="logo-wrapper"><a href="#">
                <img class="blur-up lazyloaded" src="<?php echo URLROOT; ?>/assets2/img/logo-full.png" alt="" width="120" style='margin-left:20%;'></a></div>
            </div>
            <div class="sidebar custom-scrollbar">
                <div class="sidebar-user text-center">
                    <div>
                    </div>

                    <?php
                    if(isset($_SESSION['rexkod_admin_id'])){
                    echo "<h6 class='mt-3 f-14'>ADMIN</h6><p>".$_SESSION['rexkod_admin_email']."</p>";
                    } else {
                    echo "<h6 class='mt-3 f-14'>VENDOR</h6><p>".$_SESSION['rexkod_vendor_email']."</p>";
                    }
                    ?>


                </div>
                <ul class="sidebar-menu">
                    <li><a class="sidebar-header" href="<?php echo URLROOT; ?>/admin/index"><i data-feather="home"></i><span>Dashboard</span></a></li>
                    <li><a class="sidebar-header" href="#"><i data-feather="box"></i> <span>Products</span><i class="fa fa-angle-right pull-right"></i></a>
                    <ul class="sidebar-submenu">
                                    <li><a href="<?php echo URLROOT; ?>/admin/all_cat_subcat"><i class="fa fa-circle"></i>Category & Subcategory</a></li>
                                    <li><a href="<?php echo URLROOT; ?>/admin/all_products"><i class="fa fa-circle"></i>Products</a></li>
                                </ul>
                    </li>
                    <li><a class="sidebar-header" href=""><i data-feather="dollar-sign"></i><span>Sales</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li><a href="<?php echo URLROOT; ?>/admin/orders"><i class="fa fa-circle"></i>Orders</a></li>
                            <li><a href="<?php echo URLROOT; ?>/admin/label_orders"><i class="fa fa-circle"></i>Labels (Orders)</a></li>
                            <li><a href="<?php echo URLROOT; ?>/admin/transactions"><i class="fa fa-circle"></i>Transactions</a></li>
                         
                            
                        </ul>
                    </li>

                    <li><a class="sidebar-header" href="<?php echo URLROOT; ?>/admin/returns"><i data-feather="clipboard"></i><span>Returns</span></a></li>
                    
                    <li><a class="sidebar-header" href="<?php echo URLROOT; ?>/admin/reports"><i data-feather="bar-chart"></i><span>Reports</span></a></li>

                    <li><a class="sidebar-header" href=""><i data-feather="tag"></i><span>Coupons</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li><a href="<?php echo URLROOT; ?>/admin/coupons"><i class="fa fa-circle"></i>Coupons</a></li>
                            <li><a href="<?php echo URLROOT; ?>/admin/add_coupon_vendor"><i class="fa fa-circle"></i>Add Coupon (Vendor) </a></li>
                            <li><a href="<?php echo URLROOT; ?>/admin/add_coupon_subcat"><i class="fa fa-circle"></i>Add Coupon (Subcat)</a></li>
                            
                        </ul>
                    </li>
              
                    <li><a class="sidebar-header" href=""><i data-feather="user-plus"></i><span>Customers</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li><a href="<?php echo URLROOT; ?>/admin/customers"><i class="fa fa-circle"></i>Customers</a></li>
                            <li><a href="<?php echo URLROOT; ?>/admin/tcs_certificate_customer"><i class="fa fa-circle"></i>TCS Certificate</a></li>
                        </ul>
                    </li>

                    <li><a class="sidebar-header" href=""><i data-feather="users"></i><span>Vendors</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li><a href="<?php echo URLROOT; ?>/admin/vendors"><i class="fa fa-circle"></i>Vendors</a></li>
                            <li><a href="<?php echo URLROOT; ?>/admin/add_vendor"><i class="fa fa-circle"></i>Add Vendor</a></li>
                            <li><a href="<?php echo URLROOT; ?>/admin/tcs_certificate_vendor"><i class="fa fa-circle"></i>TCS Certificate</a></li>
                        </ul>
                    </li>

                    <li><a class="sidebar-header" href=""><i data-feather="list"></i><span>App Settings</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li><a href="<?php echo URLROOT; ?>/admin/banner"><i class="fa fa-circle"></i>Banners</a></li>
                            <li><a href="<?php echo URLROOT; ?>/admin/banner"><i class="fa fa-circle"></i>Featured Category</a></li>
                            <li><a href="<?php echo URLROOT; ?>/admin/banner"><i class="fa fa-circle"></i>Featured subcategory</a></li>
                            <li><a href="<?php echo URLROOT; ?>/admin/banner"><i class="fa fa-circle"></i>Featured Products</a></li>
                            <li><a href="<?php echo URLROOT; ?>/admin/banner"><i class="fa fa-circle"></i>Product Page Points</a></li>
                        </ul>
                    </li>
                    
                    
                    <li><a class="sidebar-header" href=""><i data-feather="settings" ></i><span>Shipping</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="sidebar-submenu">
                          
                            <li><a href="<?php echo URLROOT; ?>/admin/shipping_subcat"><i class="fa fa-circle"></i>Shipping Subcat</a></li>
                            <li><a href="<?php echo URLROOT; ?>/admin/shipping_range"><i class="fa fa-circle"></i>Shipping Range</a></li>
                        </ul>
                    </li>

                    </li>


                    <li><a class="sidebar-header" href="#"><i data-feather="archive" ></i><span>Export Enquiry</span></a></li>

                    <li><a class="sidebar-header" href="#"><i data-feather="log-in" ></i><span>Notification</span></a></li>


                </ul>
            </div>
        </div>
        <!-- Page Sidebar Ends-->
