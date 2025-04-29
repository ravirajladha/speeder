<?php require APPROOT . '/views/inc_admin/header.php'; ?>


				<!-- CONTAINER -->
				<div class="app-content">

				    <!-- PAGE-HEADER -->
					<div class="page-header">
						<h4 class="page-title">Edit MD</h4>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Edit MD</li>
						</ol>
					</div>
					<!-- PAGE-HEADER END -->

					<!-- ROW-1 OPEN -->
					<div class="row">
					
						<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Edit MD</h3>
								</div>
								<form action="<?php echo URLROOT; ?>/admin/update_md/<?php echo $data['md']->id; ?>" method="post" autocomplete="off">
								
								<div class="card-body">


									<div class="row">
										<div class="col-lg-6 col-md-12">
											<div class="form-group">
												<label for="exampleInputname">Name</label>
												<input type="text" class="form-control" id="exampleInputname" placeholder="First Name" name="name" value="<?php echo $data['md']->name?>">
											</div>
										</div>
										<div class="col-lg-6 col-md-12">
											<div class="form-group">
												<label for="exampleInputname1">Phone</label>
												<input type="number" class="form-control" id="exampleInputname1" placeholder="Enter Last Name" name="phone" value="<?php echo $data['md']->phone?>">
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-lg-12 col-md-12">
											<div class="form-group">
												<label for="exampleInputEmail1">Email</label>
												<input type="email" class="form-control" id="exampleInputEmail1" placeholder="email address" name="email" value="<?php echo $data['md']->email?>">
											</div>
										</div>
									
									</div>

									<div class="row">
										<div class="col-lg-6 col-md-12">
											<div class="form-group">
												<label for="exampleInputname">Business Name</label>
												<input type="text" class="form-control" id="exampleInputname" placeholder="Business Name" name="business_name" value="<?php echo $data['md']->md_business_name?>">
											</div>
										</div>
										<div class="col-lg-6 col-md-12">
											<div class="form-group">
												<label for="exampleInputname1">GST</label>
												<input type="text" class="form-control" id="exampleInputname1" placeholder="GST" name="gst" value="<?php echo $data['md']->md_gst?>">
											</div>
										</div>
									</div>



									<div class="form-group">
										<label for="exampleInputEmail1">Address</label>
										<input type="text" class="form-control" id="exampleInputEmail1" placeholder="email address" name="address" value="<?php echo $data['md']->md_address; ?>">
									</div>

									<div class="row">
										<div class="col-lg-4 col-md-12">
											<div class="form-group">
												<label for="exampleInputEm">City</label>
												<input type="text" class="form-control" placeholder="Enter City" name="city" value="<?php echo $data['md']->md_city?>">
											</div>
										</div>
										<div class="col-lg-4 col-md-12">
											<div class="form-group">
												<label for="exampleInputname1">State</label>
												<input type="text" class="form-control" placeholder="Enter State" name="state" value="<?php echo $data['md']->md_state?>">
											</div>
										</div>
										<div class="col-lg-4 col-md-12">
											<div class="form-group">
												<label for="exampleInputname1">Pincode</label>
												<input type="text" class="form-control" placeholder="Enter State" name="pincode" value="<?php echo $data['md']->md_pincode?>">
											</div>
										</div>
									</div>

									<div class="row">
										
										<div class="col-lg-12 col-md-12">
										<div class="form-group">
												<label for="exampleInputname1">Assigned ADs</label>
												<select name="ads[]" multiple class="form-control select2">
												<?php 
												$cur_ads = explode(',', $data['cur_md']->ads);
												foreach($data['ads'] as $ad){?>
												<option value="<?php echo $ad->id; ?>"
												<?php  if(in_array($ad->id, $cur_ads)){
													echo "selected";
												}?>>
												<?php echo $ad->name; ?></option>
												<?php } ?>
												</select> 
											</div>
										</div>
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