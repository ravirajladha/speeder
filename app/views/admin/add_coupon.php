<?php require APPROOT . '/views/inc_admin/header.php'; ?>


				<!-- CONTAINER -->
				<div class="app-content">

				    <!-- PAGE-HEADER -->
					<div class="page-header">
						<h4 class="page-title">Add AD</h4>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Add AD</li>
						</ol>
					</div>
					<!-- PAGE-HEADER END -->

					<!-- ROW-1 OPEN -->
					<div class="row">
					
						<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Add Coupon</h3>
								</div>
							
								
                                <div class="card-body">
                        
                        <div class="tab-cotent" id="myTabCntent">
                            <div >


                            <form action="<?php echo URLROOT; ?>/admin/create_coupon" method="post" enctype="multipart/form-data">

                            
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group row">
                                                <label for="validationCustom0"><span>*</span> Coupon Title</label>
                                                <div class="col-md-12">
                                                    <input class="form-control" id="validationCustom0" type="text" required="" name="coupon_title">
                                                </div>
                                            </div>

                                          

                                            <div class="row">
                                                <div class="form-group col-md-6" >
                                                    <label for="validationCustom1"><span>*</span>Coupon Code</label>
                                                    <div >
                                                        <input class="form-control" id="validationCustom1" type="text" required="" name="coupon_code">
                                                    </div>
                                                    <div class="valid-feedback">Please Provide a Valid Coupon Code.</div>
                                                </div>
                                                
                                                
                                                <div class="form-group col-md-6">
                                                    <label class=""><span>*</span>Discount Type</label>
                                                    <div >
                                                        <select class="custom-select w-100 form-control" required="" name="coupon_type">
                                                            <option value="">--Select--</option>
                                                            <option value="1">Percent</option>
                                                            <option value="2">Fixed</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="row">

                                                 <div class="form-group col-md-6">
                                                    <label for="validationCustom1"><span>*</span>Discount Value</label>
                                                    <div>
                                                        <input class="form-control" id="validationCustom1" type="text" required="" name="coupon_value">
                                                    </div>
                                                    <div class="valid-feedback">Please Provide a Valid Coupon Code.</div>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="validationCustom1"><span>*</span>Discount Cap</label>
                                                    <div>
                                                        <input class="form-control" id="validationCustom1" type="text" required="" name="coupon_cap">
                                                    </div>
                                                    <div class="valid-feedback">Please Provide a Valid Coupon Code.</div>
                                                </div>
                                            </div>  

                                        </div>
                                    </div>
                                    <div class="pull-right">
                            <input type="submit" class="btn btn-primary" value="Create">
                        </div>

                                </form>
                            </div>
                           
                        </div>
                        
                    </div>
								
							</div>
						
						</div>
					</div>
				

				</div>
				<!--CONTAINER CLOSED -->
			</div>


			<?php require APPROOT . '/views/inc_admin/footer.php'; ?>