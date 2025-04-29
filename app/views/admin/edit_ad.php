<?php require APPROOT . '/views/inc_admin/header.php'; ?>


				<!-- CONTAINER -->
				<div class="app-content">

				    <!-- PAGE-HEADER -->
					<div class="page-header">
						<h4 class="page-title">Edit AD</h4>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Edit AD</li>
						</ol>
					</div>
					<!-- PAGE-HEADER END -->

					<!-- ROW-1 OPEN -->
					<div class="row">
					
						<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Edit AD</h3>
								</div>
								<form action="<?php echo URLROOT; ?>/admin/update_ad/<?php echo $data['ad']->id; ?>" method="post" autocomplete="off">
								
								<div class="card-body">


									<div class="row">
										<div class="col-lg-6 col-md-12">
											<div class="form-group">
												<label for="exampleInputname">Name</label>
												<input type="text" class="form-control" id="exampleInputname" placeholder="First Name" name="name" value="<?php echo $data['ad']->name?>">
											</div>
										</div>
										<div class="col-lg-6 col-md-12">
											<div class="form-group">
												<label for="exampleInputname1">Phone</label>
												<input type="number" class="form-control" id="exampleInputname1" placeholder="Enter Last Name" name="phone" value="<?php echo $data['ad']->phone?>">
											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-lg-6 col-md-12">
											<div class="form-group">
												<label for="exampleInputEmail1">Email</label>
												<input type="email" class="form-control" id="exampleInputEmail1" placeholder="email address" name="email" value="<?php echo $data['ad']->email?>">
											</div>
										</div>
										<div class="col-lg-6 col-md-12">
											<div class="form-group">
												<label for="exampleInputname1">Area Type</label>
											<select class="form-control" name="area_type">
												<option value="t1" <?php if($data['ad']->area_type == "t1"){echo "selected='selected'";}?>>T1</option>
												<option value="t2" <?php if($data['ad']->area_type == "t2"){echo "selected='selected'";}?>>T2</option>
												<option value="t3" <?php if($data['ad']->area_type == "t3"){echo "selected='selected'";}?>>T3</option>
                                            </select>
											</div>
										</div>
									</div>


									<div class="row">
										<div class="col-lg-6 col-md-12">
											<div class="form-group">
												<label for="exampleInputname">Business Name</label>
												<input type="text" class="form-control" id="exampleInputname" placeholder="Business Name" name="business_name" value="<?php echo $data['ad']->ad_business_name?>">
											</div>
										</div>
										<div class="col-lg-6 col-md-12">
											<div class="form-group">
												<label for="exampleInputname1">GST</label>
												<input type="text" class="form-control" id="exampleInputname1" placeholder="GST" name="gst" value="<?php echo $data['ad']->ad_gst?>">
											</div>
										</div>
									</div>



									<div class="form-group">
										<label for="exampleInputEmail1">Address</label>
										<input type="text" class="form-control" id="exampleInputEmail1" placeholder="email address" name="address" value="<?php echo $data['ad']->ad_address; ?>">
									</div>

									<div class="row">
										<div class="col-lg-4 col-md-12">
											<div class="form-group">
												<label for="exampleInputEm">City</label>
												<input type="text" class="form-control" placeholder="Enter City" name="city" value="<?php echo $data['ad']->ad_city?>">
											</div>
										</div>
										<div class="col-lg-4 col-md-12">
											<div class="form-group">
												<label for="exampleInputname1">State</label>
												<input type="text" class="form-control" placeholder="Enter State" name="state" value="<?php echo $data['ad']->ad_state?>">
											</div>
										</div>
										<div class="col-lg-4 col-md-12">
											<div class="form-group">
												<label for="exampleInputname1">Pincode</label>
												<input type="text" class="form-control" placeholder="Enter State" name="pincode" value="<?php echo $data['ad']->ad_pincode?>">
											</div>
										</div>
									</div>


									
									<div class="form-group">
										<label for="exampleInputnumber">Serviceable Pincodes (Seperated by comma)</label>
										<input type="text" class="form-control" id="exampleInputnumber" placeholder="Pincodes" name="pincodes" value="<?php echo $data['ad']->ad_pincodes?>">
									</div>

								   
									
								</div>
								<div class="card-footer pull-right">
									<button type="submit" class="btn btn-success mt-1 mr-1 pull-right">Update</button>
								</div>
								</form>
							</div>
						
						</div>
					</div>
				

				</div>
				<!--CONTAINER CLOSED -->
			</div>


			<?php require APPROOT . '/views/inc_admin/footer.php'; ?>

			<script>
$('body').on('keyup', 'input[name=pincodes]', function() {
  $(this).val($(this).val().replace(/\s/g, ','));
});
</script>