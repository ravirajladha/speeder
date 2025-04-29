<?php require APPROOT . '/views/inc_admin/header.php'; ?>
<style>
    .form-control{
        background-color:#fff;
    }
</style>

				<!-- CONTAINER -->
				<div class="app-content">

				    <!-- PAGE-HEADER -->
					<div class="page-header">
						<h4 class="page-title">Billing</h4>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Billing</li>
						</ol>
					</div>
					<!-- PAGE-HEADER END -->

					<!-- ROW-1 OPEN -->
					<div class="row">
					
						<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
							
						<div class="main-container">
            <div class="container">
              
                <div class="card">
                    <div class="card-header">
                        <h6 class="subtitle mb-0">
                           
                            From Details
                        </h6>
                    </div>
                    <form action="<?php echo URLROOT; ?>/admin/create_billing" method="post" autocomplete="off">
                    <div class="card-body">
                       
                    <div class="row">

                        <div class="form-group float-label sub-label active col-md-6">
                        <label class="form-control-label">Name</label>  
                         <input type="text" class="form-control" name="from_name" value="<?php echo $contact->name; ?>" required>
                                                     
                        </div>
                        <div class="form-group float-label active col-md-6">
                        <label class="form-control-label">Phone</label>         
                         <input type="number" class="form-control" name="from_phone" oninput="numberOnly(this.id);" id="tophn" maxlength="10" value="<?php echo $contact->phone; ?>" required>
                                              
                        </div>

                        </div>

                        <div class="form-group float-label">
                        <label class="form-control-label">Address</label>         
                        <input type="text" class="form-control" name="from_address" required>
                                              
                        </div>
                       
                        <div class="row">
                         <div class="form-group float-label active sub-label col-md-6">
                         <label class="form-control-label">Pin Code</label>         
                          <input type="number" class="form-control" name="from_pincode" id="from_pincode" onkeyup="find_pincode(this.value)" required>
                                               
                        </div>
                        <div class="form-group float-label active col-md-6">
                        <label class="form-control-label">Area</label>      
                        <select type="text" class="form-control" id="from_area" name="from_area">
                            <option disabled hidden>............................</option>
                            </select>
                                                 
                        </div>
                        </div>

                       <div class="row">

                       <div class="form-group float-label active sub-label col-md-6">
                       <label class="form-control-label">City</label>       
                       <input type="text" class="form-control" name="from_city" id="from_city" value=" " readonly>
                           
                        </div>
                       
                        <div class="form-group float-label active col-md-6">
                        <label class="form-control-label">State</label>  
                        <input type="text" class="form-control" name="from_state" id="from_state" value=" " readonly>
                                                     
                        </div>
                       </div>

                    </div>
                  
                    
                </div><br>


                <div class="card">
                    <div class="card-header" style='padding-bottom:0px;'>
                        <h6 class="subtitle mb-0">
                            
                            To Details
                            
                        </h6>
                        
                    </div>
                  
                    <div class="card-body">



                    <div class="row">

                       <div class="form-group float-label sub-label active col-md-6">
                       <label class="form-control-label">Name</label>          
                       <input type="text" class="form-control" name="to_name" value="<?php echo $contact->name; ?>" required>
                                              
                        </div>
                        <div class="form-group float-label active col-md-6">
                        <label class="form-control-label">Phone</label>    
                         <input type="number" class="form-control" name="to_phone" oninput="numberOnly(this.id);" id="tophn" maxlength="10" value="<?php echo $contact->phone; ?>" required>
                                                    
                        </div>

                       </div>
                       
                        <div class="form-group float-label active">
                        <label class="form-control-label">Address</label>       
                         <input type="text" class="form-control" name="to_address" value="<?php echo $contact->address; ?>" required>
                                                
                        </div>
                       
                        <div class="row">
                         <div class="form-group float-label active sub-label col-md-6">
                         <label class="form-control-label">Pin Code</label>          
                          <input type="number" class="form-control" name="to_pincode" id="to_pincode" onkeyup="find_pincode2(this.value)" value="<?php echo $contact->pincode; ?>" required>
                                              
                           </div>
                           <div class="form-group float-label active col-md-6">
                           <label class="form-control-label">Area</label>       
                           <select type="text" class="form-control" id="to_area" name="to_area">
                            <option disabled hidden>............................</option>
                            </select>
                                                
                        </div>
                        </div>
                        

                    <div class="row">

                       <div class="form-group float-label active sub-label col-md-6">
                       <label class="form-control-label">City</label>   
                       <input type="text" class="form-control" name="to_city" value="<?php echo $contact->city; ?> " id="to_city" value=" " readonly>
                                
                        </div>
                       
                        <div class="form-group float-label active col-md-6">
                        <label class="form-control-label">State</label> 
                        <input type="text" class="form-control" name="to_state" value="<?php echo $contact->state; ?> " id="to_state" readonly>
                                                      
                        </div>
                       </div>

                    </div>
                  
                    
                </div><br>

               
                <div class="card">
                    <div class="card-header">
                        <h6 class="subtitle mb-0">
                            
                            Item Details
                        </h6>
                    </div>
                    <div class="card-body">
                  
                        
                
                        
                        
                        <div class="row">
                       <div class="form-group float-label sub-label col-md-6">
                       <label class="form-control-label">Product Name - What are you sending?</label> 
                     <input type="text" class="form-control" name="item_name" maxlength="15" required>
                            
                        </div>
                        <div class="form-group float-label active col-md-6">
                        <label class="form-control-label">Scan AWB</label>       
                        <input type="number" class="form-control" name="speeder_id" id="speeder_id">   
                        </div>
                       </div>

                       
                       <div class="row">
                       <div class="form-group float-label sub-label col-md-6">
                       <label class="form-control-label">Quantity</label>                            <input type="number" class="form-control" name="item_qty">
                            
                        </div>
                        <div class="form-group float-label active col-md-6">
                        <label class="form-control-label">Weight (Kg)</label>       
                        <input type="number" class="form-control" name="item_weight" id="item_weight">   
                        </div>
                       </div>

                       <div class="row">
                       <div class="form-group float-label sub-label col-md-6">
                       <label class="form-control-label">Package Value</label>                            <input type="number" class="form-control" name="item_cost" id="item_cost">
                            
                        </div>
                        <div class="form-group float-label active col-md-6">
                        <label class="form-control-label">e-Way Bill No. (if Package value above <i class="fa fa-inr"> 49,999</i> )</label>       
                        <input type="number" class="form-control"  name="eway_number" id="eway_number">   
                   
                        </div>
                       </div>

                       
 
                       
                    <center><img src="<?php echo URLROOT; ?>/assets2/box.png" alt="" width="200"></center>
                    <div class="row">
                       <div class="form-group float-label sub-label col-md-4">
                       <label class="form-control-label">Length(Cm) </label>  
                        <input type="text" class="form-control" name="item_length" id="item_length" required>
                                                     
                        </div>
                        <div class="form-group float-label sub-label col-md-4">
                        <label class="form-control-label">Breadth(Cm)</label> 
                         <input type="text" class="form-control" name="item_breadth" id="item_breadth" required>
                                                       
                        </div>
                        <div class="form-group float-label col-md-4">
                        <label class="form-control-label">Height(Cm)</label> 
                         <input type="text" class="form-control" name="item_height" id="item_height" required>
                                                      
                        </div>
                       </div>
                      
                       
                     
                    </div>
                  
                    
                </div>


                <br>

               
               

                <br>

                <div class="card">
                    <div class="card-header">
                        <h6 class="subtitle mb-0">
                            Order Details
                        </h6>
                    </div>
                    <div class="card-body">
                  
                        
                    <div class="row">
                    

                       <div class="form-group float-label col-md-6">
                        <select class="form-control" name="shipping_by" id="shipping_by">
                            <option value="0">Surface Shipping</option>
                            <option value="1">Air Shipping</option>
                        </select>  
                        </div>
                        
                        <div class="form-group float-label col-md-6">
                        <select name="package_type" class="form-control" id="parcel_type">
                            <option value="0">Normal Package</option>
                            <option value="3">Document / Letter</option>
                        </select>  
                        </div>
                       </div>
                        
                       <div class="row">
                       <div class="form-group float-label sub-label col-md-6">
                       <label class="form-control-label">Packing Cost</label>                            <input type="number" class="form-control" name="packing_cost" id="packing_cost">
                            
                        </div>
                        <div class="form-group float-label active col-md-6">
                        <label class="form-control-label">Order Margin (Percentage)</label>       
                        <input type="number" class="form-control" name="order_margin" id="order_margin">   
                   
                        </div>
                       </div>

                        
                       </div>



                     
                    </div>

                    
                    
                </div>



                


                  <br>
                <div class="card">
                    <div class="card-header row">
                     <span id="signIn" class="btn btn-block btn-default rounded col-md-12">Calculate Cost</span>
                     <input type="text" class="col-md-12 form-control" name="booking_cost" readonly id="payment_res" style="background-color:#fff;">
                                                      
                     </div>

                    <div class="card-boy">
                        <div class="car-footer">
                        <button id="order_btn" type="submit" class="btn btn-block btn-primary rounded" disabled>Create Order</button>
                    </div>
                </div>
                    
                </div>


            </form>


            </div>
        </div>
						
						</div>
					</div>
				

				</div>
				<!--CONTAINER CLOSED -->
			</div>


			<?php require APPROOT . '/views/inc_admin/footer.php'; ?>


			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script type="text/javascript">
	$(document).ready(function(){
		$('#signIn').click(function(){
			var from_pincode = $('#from_pincode').val();
			var to_pincode = $('#to_pincode').val();
			var from_state = $('#from_state').val();
			var to_state = $('#to_state').val();
			var item_weight = $('#item_weight').val();
			var item_length = $('#item_length').val();
			var item_breadth = $('#item_breadth').val();
			var item_height = $('#item_height').val();
			var parcel_type = $('#parcel_type').val();
			var to_pincode = $('#to_pincode').val();
			var from_pincode = $('#from_pincode').val();
            var item_cost = $('#item_cost').val();
            var eway_number = $('#eway_number').val();
            var packing_cost = $('#packing_cost').val();
            var order_margin = $('#order_margin').val();
            var shipping_by = $('#shipping_by').val();
            
			
			if(from_pincode && to_pincode)
			{
					$.ajax({
						url  : '<?php echo URLROOT; ?>/admin/check_costing',
						type : 'POST',
						data : {from_pincode,to_pincode,from_state,to_state,item_weight,item_length,item_breadth,item_height,parcel_type,item_cost,eway_number,packing_cost,order_margin,shipping_by},

						success : function(res)
						{
							if (/^\d+\.\d+$|^\d+$/.test(res)) {
								$("#payment_res").val("₹ " + res);
								if(res>0){
								document.getElementById("order_btn").disabled = false;
								document.getElementById('coupon_sec').style.display = 'table';
								} else {
								document.getElementById("order_btn").disabled = true;
								}
							}else {
								$("#payment_res").val(res);
								document.getElementById("order_btn").disabled = true;
							}
							

						}

					});
			}
			else
			{
				$("#payment_res").val("Please enter all details");
			}
		});
	});

</script>

 <script type="text/javascript">
	  
			function find_pincode(pin){
				if(pin.length==6){
					$.ajax({
					url  : '<?php echo URLROOT; ?>/pages/check_pincode',
					type : 'POST',
					data : {pin},

					success : function(res)
					{
						var detail = res.split(',');
						document.getElementById("from_city").value = detail[0];
						document.getElementById("from_state").value = detail[1];
						var area_detail = detail[2].split('*');
						document.getElementById("from_area").innerHTML = "";
						for (const area_val of area_detail) { 
							document.getElementById("from_area").innerHTML += "<option value='"+area_val+"'>"+area_val+"</option>";
						}

					}

				});
				}else {
					document.getElementById("from_city").value = "";
						document.getElementById("from_state").value = "";
				}
			}


			function find_pincode2(pin){
				if(pin.length==6){
					$.ajax({
					url  : '<?php echo URLROOT; ?>/pages/check_pincode',
					type : 'POST',
					data : {pin},

					success : function(res)
					{
						
						var detail = res.split(',');
						document.getElementById("to_city").value = detail[0];
						document.getElementById("to_state").value = detail[1];
						var area_detail = detail[2].split('*');
						document.getElementById("to_area").innerHTML = "";
						for (const area_val of area_detail) { 
							document.getElementById("to_area").innerHTML += "<option value='"+area_val+"'>"+area_val+"</option>";
						}
						
					}

				});
				}else {
					document.getElementById("to_city").value = "";
					document.getElementById("to_state").value = "";
				}
			}
function numberOnly(id) {
let input = document.getElementById(id);
let value = input.value;
if (value.length > input.maxLength) {
input.value = value.substring(0, input.maxLength);
}

}


</script>
