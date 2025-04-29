<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
            <aside class="app-sidebar left-menu2">
                <div class="app-sidebar__user clearfix">
                    <div class="dropdown user-pro-body text-center">
                        
                        <div class="user-info">
                        <div class="user-info">
                            <h2><?php if($_SESSION['rexkod_admin_id']){echo $_SESSION['rexkod_admin_name'];}else {echo $_SESSION['rexkod_vendor_name'];} ?></h2>
                            <span><?php echo strtoupper($_SESSION['rexkod_login_type']); ?></span>
                        </div>
                        </div>
                    
                    </div>
                </div>
                <ul class="side-menu">
                    
                    <li class="slide">
                        <a class="side-menu__item  slide-show" href="<?php echo URLROOT; ?>/admin/index"><i class="side-menu__icon  fe fe-airplay"></i><span class="side-menu__label">Dashboard</span><i class="angle fa fa-angle-right"></i></a>
                        
                    </li>
                    <li>
                        <a class="side-menu__item" href="<?php echo URLROOT; ?>/admin/from_orders_rd"><i class="side-menu__icon fe fe-box"></i><span class="side-menu__label">Booking Orders</span></a>
                    </li>
                    <li>
                        <a class="side-menu__item" href="<?php echo URLROOT; ?>/admin/to_orders_rd"><i class="side-menu__icon fe fe-box"></i><span class="side-menu__label">Delivery Orders</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item  slide-show" href="<?php echo URLROOT; ?>/admin/mds_rd"><i class="side-menu__icon fe fe-file"></i><span class="side-menu__label">MDs</span></a>
                    
                    </li>


                    <li class="slide">
							<a class="side-menu__item  slide-show" href="<?php echo URLROOT; ?>/admin/wallet"><i class="side-menu__icon fe fe-credit-card"></i><span class="side-menu__label">Wallet</span></a>
						
					</li>

                    <li class="slide">
                        <a class="side-menu__item  slide-show" href="<?php echo URLROOT; ?>/admin/billing"><i class="side-menu__icon fe fe-file-plus"></i><span class="side-menu__label">Billing</span><i class="angle fa fa-angle-right"></i></a>
                    </li>

                

                    
                </ul>
                <form style="padding: 20px" action='<?php echo URLROOT;?>/admin/scan_barcode' method='POST' >
                                    <input name='barcode' class='form-control' type='text' placeholder='Track Parcel'>
                                    </form>	
            </aside>