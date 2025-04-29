<?php require APPROOT . '/views/inc_admin/header.php'; ?>

				<!-- CONTAINER -->
				<div class="app-content">

					<!-- PAGE-HEADER -->
					<div class="page-header">
						<h4 class="page-title"><?php echo strtoupper($_SESSION['rexkod_login_type']); ?> - #<?php if($_SESSION['rexkod_admin_id']){echo $_SESSION['rexkod_admin_id'];}else {
							echo $_SESSION['rexkod_vendor_id'];
						} ?></h4>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
						</ol>
					</div>
					<!-- PAGE-HEADER END -->

					<!-- ROW-1 -->
					
					<!-- ROW-1 END -->
<?php if($_SESSION['rexkod_login_type']=="admin"){?>
	<div class="row">
						<div class="col-sm-6 col-lg-6 col-xl-3">
							<div class="card">
								<div class="card-body iconfont text-left">
									<h6 class="mb-3">Orders</h6>
									<h2 class="mb-1 text-dark display-4 font-weight-bold"><?php echo $data['all_orders']?><span class="text-success fs-13 ml-2">(0%)</span></h2>
									<p class="mb-3">Overview of Last month</p>
									<div class="progress h-1 mb-2">
										<div class="progress-bar bg-primary w-0 " role="progressbar"></div>
									</div>
									<small class="mb-0  text-muted">Monthly<span class="float-right text-muted">0%</span></small>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-lg-6 col-xl-3">
							<div class="card">
								<div class="card-body iconfont text-left">
									<h6 class="mb-3">Users</h6>
									<h2 class="mb-1 text-dark display-4 font-weight-bold"><?php echo $data['customers']?><span class="text-success fs-13 ml-2">(0%)</span></h2>
									<p class="mb-3">Overview of Last month</p>
									<div class="progress h-1 mb-2">
										<div class="progress-bar bg-secondary w-0 " role="progressbar"></div>
									</div>
									<small class="mb-0 text-muted">Monthly<span class="float-right text-muted">0%</span></small>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-lg-6 col-xl-3">
							<div class="card">
								<div class="card-body iconfont text-left">
									<h6 class="mb-3">Online Orders</h6>
									<!-- <h2 class="mb-1 text-dark display-4 font-weight-bold"><?php echo $data['online_orders']?><span class="text-success fs-13 ml-2">(0%)</span></h2> -->
									<p class="mb-3">Overview of Last month</p>
									<div class="progress h-1 mb-2">
										<div class="progress-bar bg-danger w-0 " role="progressbar"></div>
									</div>
									<small class="mb-0 text-muted">Monthly<span class="float-right text-muted">0%</span></small>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-lg-6 col-xl-3">
							<div class="card">
								<div class="card-body iconfont text-left">
									<h6 class="mb-3">Billing Orders</h6>
									<!-- <h2 class="mb-1 text-dark display-4 font-weight-bold"><?php echo $data['billing_orders']?><span class="text-success fs-13 ml-2">(0%)</span></h2> -->
									<p class="mb-3">Overview of Last month</p>
									<div class="progress h-1 mb-2">
										<div class="progress-bar bg-warning w-0 " role="progressbar"></div>
									</div>
									<small class="mb-0 text-muted">Monthly<span class="float-right text-muted">0%</span></small>
								</div>
							</div>
						</div>
					</div>
					<!-- ROW-2 -->
					<div class="row">
						<div class="col-lg-12">
							<div class="row">
								<div class="col-xl-6 col-md-12">
									<div class="card">
										<div class="card-body">
											<div class="d-flex">
												<div class="">
													<p class="mb-1 font-weight-semibold">
														Truck Orders
													</p>
													<h2 class="mt-2 mb-2 display-6 font-weight-bold"><?php echo $data['truck_orders']; ?></h2>
													<span class="mb-0 text-muted"><i class="fa fa-caret-down text-danger mr-1"></i> 0% last month</span>
												</div>
												<div class="ml-auto mt-3">
													<span class="pie" data-peity='{ "fill": ["#564ec1", "#e2e1ea"]}'>360/360</span>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-xl-6 col-md-12">
									<div class="card">
										<div class="card-body">
											<div class="d-flex">
												<div class="">
													<p class="mb-1 font-weight-semibold">
														Hyperlocal Orders
													</p>
													<h2 class="mt-2 mb-2 display-6 font-weight-bold"><?php echo $data['local_orders']?></h2>
													<span class="mb-0 text-muted"><i class="fa fa-caret-up text-success mr-1"></i> 0% last month</span>
												</div>
												<div class="ml-auto mt-3">
													<span class="pie" data-peity='{ "fill": ["#04cad0", "#e2e1ea"]}'>360/360</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="card overflow-hidden">
								<div class="card-body pb-0">
									<div class="h3 text-left mb-1">Orders</div>
									<br>
									<div class="row text-left">
										<div class="col dash-1">
											<p class="mb-0 font-weight-semibold">Option</p>
											<h2 class="mb-0">0</h2>
										</div>
										<div class="col dash-1">
											<p class="mb-0 font-weight-semibold">Option</p>
											<h2 class="mb-0">0</h2>
										</div>
										<div class="col">
											<p class="mb-0 font-weight-semibold">Option</p>
											<h2 class="mb-0">0</h2>
										</div>
									</div>
									<div class="chart-wrapper ">
										<canvas id="widgetChart1" class="mb-0 p-0 overflow-hidden"></canvas>
									</div>
								</div>
							</div>
						</div>
					
					</div>
<?php } else { ?>
	<div class="row">
						<div class="col-sm-6 col-lg-6 col-xl-3">
							<div class="card">
								<div class="card-body iconfont text-left">
									<h6 class="mb-3">Orders</h6>
									<h2 class="mb-1 text-dark display-4 font-weight-bold">
										
									<?php 
									if($_SESSION['rexkod_login_type']=="ad"){
									echo $data['ad_orders'];
									} else if($_SESSION['rexkod_login_type']=="ad"){
										echo $data['ad_orders'];
									} else if($_SESSION['rexkod_login_type']=="md"){
										echo $data['md_orders'];
									} else if($_SESSION['rexkod_login_type']=="rd"){
										echo $data['rd_orders'];
									} else if($_SESSION['rexkod_login_type']=="company"){
										echo $data['company_orders'];
									}
									?>
									
									<span class="text-success fs-13 ml-2">(0%)</span></h2>
									<p class="mb-3">Overview of Last month</p>
									<div class="progress h-1 mb-2">
										<div class="progress-bar bg-primary w-0 " role="progressbar"></div>
									</div>
									<small class="mb-0  text-muted">Monthly<span class="float-right text-muted">0%</span></small>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-lg-6 col-xl-3">
							<div class="card">
								<div class="card-body iconfont text-left">
									<h6 class="mb-3">Users</h6>
									<h2 class="mb-1 text-dark display-4 font-weight-bold"><?php echo $data['customers']?><span class="text-success fs-13 ml-2">(0%)</span></h2>
									<p class="mb-3">Overview of Last month</p>
									<div class="progress h-1 mb-2">
										<div class="progress-bar bg-secondary w-0 " role="progressbar"></div>
									</div>
									<small class="mb-0 text-muted">Monthly<span class="float-right text-muted">0%</span></small>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-lg-6 col-xl-3">
							<div class="card">
								<div class="card-body iconfont text-left">
									<h6 class="mb-3">Wallet Balance</h6>
									<h2 class="mb-1 text-dark display-4 font-weight-bold"><i class='fa fa-inr' style="font-size:20px"></i><?php echo $data['wallet']->balance_amount; ?><span class="text-success fs-13 ml-2">(0%)</span></h2>
									<p class="mb-3">Overview of Last month</p>
									<div class="progress h-1 mb-2">
										<div class="progress-bar bg-danger w-0 " role="progressbar"></div>
									</div>
									<small class="mb-0 text-muted">Monthly<span class="float-right text-muted">0%</span></small>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-lg-6 col-xl-3">
							<div class="card">
								<div class="card-body iconfont text-left">
									<h6 class="mb-3">Transactions</h6>
									<h2 class="mb-1 text-dark display-4 font-weight-bold"><?php echo $data['transactions']; ?><span class="text-success fs-13 ml-2">(0%)</span></h2>
									<p class="mb-3">Overview of Last month</p>
									<div class="progress h-1 mb-2">
										<div class="progress-bar bg-warning w-0 " role="progressbar"></div>
									</div>
									<small class="mb-0 text-muted">Monthly<span class="float-right text-muted">0%</span></small>
								</div>
							</div>
						</div>
					</div>
	<div class="row">
						<div class="col-lg-12">
							<div class="row">
								<div class="col-xl-12 col-md-12">
									<div class="card">
										<div class="card-body">
											<div class="d-flex">
												<img src="<?php echo URLROOT; ?>/uploads/<?php echo $data['banners']->banner4; ?>" alt="">
												
											</div>
										</div>
									</div>
								</div>
							
							</div>
						
						</div>
					
					</div>
<?php } ?>
					<!-- ROW-2 END -->

					<!-- ROW-3 -->
				
					<!-- ROW-3 END -->


				</div>
				<!-- CONTAINER END -->
            </div>

			<!-- SIDE-BAR -->
			
			<!-- SIDE-BAR CLOSED -->

			<?php require APPROOT . '/views/inc_admin/footer.php'; ?>


			<script>
	console.log("Data fields mismatch at updated data structure Error (103)");
</script>