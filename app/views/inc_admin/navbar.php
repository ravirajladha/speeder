	<!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
				<aside class="app-sidebar left-menu2">
					<div class="app-sidebar__user clearfix">
						<div class="dropdown user-pro-body text-center">
							
							<div class="user-info">
								<h2><?php if($_SESSION['rexkod_admin_id']){echo $_SESSION['rexkod_admin_name'];}else {echo $_SESSION['rexkod_vendor_name'];} ?></h2>
								<span><?php echo ucfirst($_SESSION['rexkod_login_type']); ?></span>
							</div>
						
						</div>
					</div>
					<ul class="side-menu">
						
						<li class="slide">
							<a class="side-menu__item  slide-show" href="<?php echo URLROOT; ?>/admin/index"><i class="side-menu__icon  fe fe-airplay"></i><span class="side-menu__label">Dashboard</span><i class="angle fa fa-angle-right"></i></a>
							
						</li>
						<li>
							<a class="side-menu__item" href="<?php echo URLROOT; ?>/admin/orders"><i class="side-menu__icon fe fe-box"></i><span class="side-menu__label">Orders</span></a>
						</li>

						<li>
							<a class="side-menu__item" href="<?php echo URLROOT; ?>/admin/truck_orders_admin"><i class="side-menu__icon fe fe-truck"></i><span class="side-menu__label">Truck Orders</span></a>
						</li>

						<li>
							<a class="side-menu__item" href="<?php echo URLROOT; ?>/admin/hyperlocal_orders"><i class="side-menu__icon fe fe-shopping-bag"></i><span class="side-menu__label">Hyperlocal Orders</span></a>
						</li>
						
						<li class="slide">
							<a class="side-menu__item  slide-show" href="#"><i class="side-menu__icon fe fe-users"></i><span class="side-menu__label">Distributors</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
								<li>
									<a href="<?php echo URLROOT; ?>/admin/rds" class="slide-item">All RDs</a>
								</li>
								<li>
									<a href="<?php echo URLROOT; ?>/admin/mds" class="slide-item">All MDs</a>
								</li>
								<li>
									<a href="<?php echo URLROOT; ?>/admin/ads" class="slide-item">All ADs</a>
								</li>
								<li>
									<a href="<?php echo URLROOT; ?>/admin/companies" class="slide-item">All Companies</a>
								</li>
								<li>
									<a href="<?php echo URLROOT; ?>/admin/add_rd" class="slide-item">Add RD</a>
								</li>
								<li>
									<a href="<?php echo URLROOT; ?>/admin/add_md" class="slide-item">Add MD</a>
								</li>
								<li>
									<a href="<?php echo URLROOT; ?>/admin/add_ad" class="slide-item">Add AD</a>
								</li>
								<li>
									<a href="<?php echo URLROOT; ?>/admin/add_company" class="slide-item">Add Company</a>
								</li>
							</ul>
						</li>
						
					

						<li class="slide">
							<a class="side-menu__item  slide-show" href="<?php echo URLROOT; ?>/admin/customers"><i class="side-menu__icon fe fe-user"></i><span class="side-menu__label">Customers</span><i class="angle fa fa-angle-right"></i></a>
							
						</li>
						

						<li class="slide">
							<a class="side-menu__item  slide-show" href="<?php echo URLROOT; ?>/admin/transactions"><i class="side-menu__icon fe fe-layers"></i><span class="side-menu__label">Transactions</span><i class="angle fa fa-angle-right"></i></a>
							
						</li>
						
						
					
						<li class="slide">
							<a class="side-menu__item  slide-show" href="<?php echo URLROOT; ?>/admin/banners"><i class="side-menu__icon fe fe-layout"></i><span class="side-menu__label">Banners</span><i class="angle fa fa-angle-right"></i></a>
							
						</li>

						<li class="slide">
							<a class="side-menu__item  slide-show" href="<?php echo URLROOT; ?>/admin/feedbacks"><i class="side-menu__icon fe fe-layout"></i><span class="side-menu__label">Feedbacks</span><i class="angle fa fa-angle-right"></i></a>
						</li>

						<li class="slide">
							<a class="side-menu__item  slide-show" href="#"><i class="side-menu__icon fa fa-gift"></i><span class="side-menu__label">Coupons</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
								<li>
									<a href="<?php echo URLROOT; ?>/admin/add_coupon" class="slide-item">Add Coupon</a>
								</li>
								<li>
									<a href="<?php echo URLROOT; ?>/admin/coupons" class="slide-item">All Coupons</a>
								</li>
							</ul>
						</li>

						<li class="slide">
							<a class="side-menu__item  slide-show" href="<?php echo URLROOT; ?>/admin/reports"><i class="side-menu__icon fe fe-file-text"></i><span class="side-menu__label">Reports</span><i class="angle fa fa-angle-right"></i></a>
						</li>

						


						<li>
							<a class="side-menu__item" href="<?php echo URLROOT; ?>/admin/logout"><i class="side-menu__icon fe fe-user"></i><span class="side-menu__label"> Logout</span></a>
						</li>

					<li>
					<form style="padding: 20px" action='<?php echo URLROOT;?>/admin/scan_barcode' method='POST' >
										<input name='barcode' class='form-control' type='text' placeholder='Track Parcel'>
									    </form>	
					</li>
					
					</ul>
					
				</aside>