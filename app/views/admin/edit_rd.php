<?php require APPROOT . '/views/inc_admin/header.php'; ?>
<style>
	.select2{
		width:100% !important;
	}
</style>

				<!-- CONTAINER -->
				<div class="app-content">

				    <!-- PAGE-HEADER -->
					<div class="page-header">
						<h4 class="page-title">Edit RD</h4>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Edit RD</li>
						</ol>
					</div>
					<!-- PAGE-HEADER END -->

					<!-- ROW-1 OPEN -->
					<div class="row">
					
						<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Edit RD</h3>
								</div>
								<form action="<?php echo URLROOT; ?>/admin/update_rd/<?php echo $data['rd']->id; ?>" method="post" autocomplete="off">
								
								<div class="card-body">


									<div class="row">
										<div class="col-lg-6 col-md-12">
											<div class="form-group">
												<label for="exampleInputname">Name</label>
												<input type="text" class="form-control" id="exampleInputname" placeholder="First Name" name="name" value="<?php echo $data['rd']->name?>">
											</div>
										</div>
										<div class="col-lg-6 col-md-12">
											<div class="form-group">
												<label for="exampleInputname1">Phone</label>
												<input type="number" class="form-control" id="exampleInputname1" placeholder="Enter Last Name" name="phone" value="<?php echo $data['rd']->phone?>">
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-lg-12 col-md-12">
											<div class="form-group">
												<label for="exampleInputEmail1">Email</label>
												<input type="email" class="form-control" id="exampleInputEmail1" placeholder="email address" name="email" value="<?php echo $data['rd']->email?>">
											</div>
										</div>
									
									</div>

									<div class="row">
										<div class="col-lg-6 col-md-12">
											<div class="form-group">
												<label for="exampleInputname">Business Name</label>
												<input type="text" class="form-control" id="exampleInputname" placeholder="Business Name" name="business_name" value="<?php echo $data['rd']->rd_business_name?>">
											</div>
										</div>
										<div class="col-lg-6 col-md-12">
											<div class="form-group">
												<label for="exampleInputname1">GST</label>
												<input type="text" class="form-control" id="exampleInputname1" placeholder="GST" name="gst" value="<?php echo $data['rd']->rd_gst?>">
											</div>
										</div>
									</div>



									<div class="form-group">
										<label for="exampleInputEmail1">Address</label>
										<input type="text" class="form-control" id="exampleInputEmail1" placeholder="email address" name="address" value="<?php echo $data['rd']->rd_address; ?>">
									</div>

									<div class="row">
										<div class="col-lg-4 col-md-12">
											<div class="form-group">
												<label for="exampleInputEm">City</label>
												<input type="text" class="form-control" placeholder="Enter City" name="city" value="<?php echo $data['rd']->rd_city?>">
											</div>
										</div>
										<div class="col-lg-4 col-md-12">
											<div class="form-group">
												<label for="exampleInputname1">State</label>
												<input type="text" class="form-control" placeholder="Enter State" name="state" value="<?php echo $data['rd']->rd_state?>">
											</div>
										</div>
										<div class="col-lg-4 col-md-12">
											<div class="form-group">
												<label for="exampleInputname1">Pincode</label>
												<input type="text" class="form-control" placeholder="Enter State" name="pincode" value="<?php echo $data['rd']->rd_pincode?>">
											</div>
										</div>
									</div>

									<div class="row">
										
										<div class="col-lg-12 col-md-12">
										<div class="form-group">
												<label for="exampleInputname1">Assigned MDs</label>
												<select name="mds[]" multiple class="form-control select2">
												<?php 
												$cur_mds = explode(',', $data['cur_rd']->mds);
												foreach($data['mds'] as $md){?>
												<option value="<?php echo $md->id; ?>"
												<?php  if(in_array($md->id, $cur_mds)){
													echo "selected";
												}?>>
												<?php echo $md->name; ?></option>
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
	$(".checkbox").click(function(){
    if($(".checkbox").is(':checked') ){
        $(this).parent().find('option').prop("selected","selected");
        $(this).parent().find('option').trigger("change");
        $(this).parent().find('option').click();
        
    }else{
       $(this).parent().find('option').removeAttr("selected","selected");
       $(this).parent().find('option').trigger("change");
     }
});

$("#button").click(function(){
       alert($("select").val());
});

$(document).ready(function() {
    		  $('.select2').select2({
    			    closeOnSelect: false,
    			    allowClear:false
    		  });
    	  	});
</script>