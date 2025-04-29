<?php require APPROOT . '/views/inc_admin/header.php'; 
$pageMod = New Page; ?>

				<!-- CONTAINER -->
				<div class="app-content">

				    <!-- PAGE-HEADER -->
					<div class="page-header">
						<h4 class="page-title">Banners</h4>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Banners</li>
						</ol>
					</div>
					<!-- PAGE-HEADER END -->

					<div class="row">
					
						<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Update Banner</h3>
								</div>


								<form action="<?php echo URLROOT; ?>/admin/update_banner/1" method="post" autocomplete="off" enctype="multipart/form-data">
								
								<div class="card-body">
                                  <div class="row">
										<div class="col-lg-3 col-md-12">
											<div class="form-group">
												<img src="<?php echo URLROOT; ?>/uploads/<?php echo $data['banner']->banner1?>" alt="">
											</div>
										</div>
										<div class="col-lg-7 col-md-12">
											<div class="form-group">
												<label for="exampleInputname1">Upload Image (App Banner 1)</label>
												<input type="file" class="form-control" id="exampleInputname1" name="banner">
											</div>
										</div>
										<div class="col-lg-2 col-md-12">
											<div class="form-group">
											<label for="exampleInputname1"></label><br>
											<button type="submit" class="btn btn-success mt-1 mr-1 pull-right">Update</button>
											</div>
										</div>
									</div>
								</div>
								</form>


								<form action="<?php echo URLROOT; ?>/admin/update_banner/2" method="post" autocomplete="off" enctype="multipart/form-data">
								
								<div class="card-body">
                                  <div class="row">
										<div class="col-lg-3 col-md-12">
											<div class="form-group">
												<img src="<?php echo URLROOT; ?>/uploads/<?php echo $data['banner']->banner2?>" alt="">
											</div>
										</div>
										<div class="col-lg-7 col-md-12">
											<div class="form-group">
												<label for="exampleInputname1">Upload Image (App Banner 2)</label>
												<input type="file" class="form-control" id="exampleInputname1" name="banner">
											</div>
										</div>
										<div class="col-lg-2 col-md-12">
											<div class="form-group">
											<label for="exampleInputname1"></label><br>
											<button type="submit" class="btn btn-success mt-1 mr-1 pull-right">Update</button>
											</div>
										</div>
									</div>
								</div>
								</form>

								<form action="<?php echo URLROOT; ?>/admin/update_banner/3" method="post" autocomplete="off" enctype="multipart/form-data">
								
								<div class="card-body">
                                  <div class="row">
										<div class="col-lg-3 col-md-12">
											<div class="form-group">
												<img src="<?php echo URLROOT; ?>/uploads/<?php echo $data['banner']->banner3?>" alt="">
											</div>
										</div>
										<div class="col-lg-7 col-md-12">
											<div class="form-group">
												<label for="exampleInputname1">Upload Image (App Banner 3)</label>
												<input type="file" class="form-control" id="exampleInputname1" name="banner">
											</div>
										</div>
										<div class="col-lg-2 col-md-12">
											<div class="form-group">
											<label for="exampleInputname1"></label><br>
											<button type="submit" class="btn btn-success mt-1 mr-1 pull-right">Update</button>
											</div>
										</div>
									</div>
								</div>
								</form>

								<form action="<?php echo URLROOT; ?>/admin/update_banner/4" method="post" autocomplete="off" enctype="multipart/form-data">
								
								<div class="card-body">
                                  <div class="row">
										<div class="col-lg-3 col-md-12">
											<div class="form-group">
												<img src="<?php echo URLROOT; ?>/uploads/<?php echo $data['banner']->banner4?>" alt="">
											</div>
										</div>
										<div class="col-lg-7 col-md-12">
											<div class="form-group">
												<label for="exampleInputname1">Upload Image (Vendor Notification)</label>
												<input type="file" class="form-control" id="exampleInputname1" name="banner">
											</div>
										</div>
										<div class="col-lg-2 col-md-12">
											<div class="form-group">
											<label for="exampleInputname1"></label><br>
											<button type="submit" class="btn btn-success mt-1 mr-1 pull-right">Update</button>
											</div>
										</div>
									</div>
								</div>
								</form>



								<div class="card-footer pull-right">
									
								</div>
								
							</div>
						
						</div>
					</div>

				</div>
				<!--CONTAINER CLOSED -->
			</div>

	

			<?php require APPROOT . '/views/inc_admin/footer.php'; ?>