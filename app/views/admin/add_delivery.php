<?php require APPROOT . '/views/inc_admin/header.php'; ?>


				<!-- CONTAINER -->
				<div class="app-content">

				    <!-- PAGE-HEADER -->
					<div class="page-header">
						<h4 class="page-title">Add Delivery Agent</h4>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Add Delivery Agent</li>
						</ol>
					</div>
					<!-- PAGE-HEADER END -->

					<!-- ROW-1 OPEN -->
					<div class="row">
					
						<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Add Delivery Agent</h3>
								</div>
								<form action="<?php echo URLROOT; ?>/admin/create_delivery" method="post" autocomplete="off">
								
								<div class="card-body">

								

									<div class="row">
										<div class="col-lg-6 col-md-12">
											<div class="form-group">
												<label for="exampleInputname">Name</label>
												<input type="text" class="form-control" id="exampleInputname" placeholder="First Name" name="name">
											</div>
										</div>
										<div class="col-lg-6 col-md-12">
											<div class="form-group">
												<label for="exampleInputname1">Phone</label>
												<input type="number" class="form-control" id="exampleInputname1" placeholder="Enter Last Name" name="phone">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Email</label>
										<input type="email" class="form-control" id="exampleInputEmail1" placeholder="email address" name="email">
									</div>
									

								   
									
								</div>
								<div class="card-footer pull-right">
									<button type="submit" class="btn btn-success mt-1 mr-1 pull-right">Create</button>
								</div>
								</form>
							</div>
						
						</div>
					</div>
				

				</div>
				<!--CONTAINER CLOSED -->
			</div>


			<?php require APPROOT . '/views/inc_admin/footer.php'; ?>



