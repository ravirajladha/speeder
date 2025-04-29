<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/nav-header.php'; 
$contact = $data['contact']; ?>

<style>
    .sub-label {
    padding-right: 20px;
    max-width: 160px;
    
}
</style>
<div class="container mt-3 mb-4 text-center">
            <h4 class="text-white">Create Booking</h4>
        </div>

       


        <!-- page content start -->

        <div class="main-container">
            <div class="container">
              
                <div class="card">
                    <div class="card-header">
                        <h6 class="subtitle mb-0">
                            <div class="avatar avatar-40 bg-primary-light text-primary rounded mr-2"><span class="material-icons vm">add_location_alt</span></div>
                            From
                        </h6>
                    </div>
                    <form action="<?php echo URLROOT; ?>/pages/create_booking" method="post" autocomplete="off">
                    <div class="card-body">
                       
                        <div class="form-group float-label">
                            <input type="text" class="form-control" name="from_address" required>
                            <label class="form-control-label">Address</label>                            
                        </div>
                       
                        <div style="display: table">
                         <div class="form-group float-label active sub-label" style="display: table-cell">
                            <input type="number" class="form-control" name="from_pincode" id="from_pincode" onkeyup="find_pincode(this.value)" required>
                            <label class="form-control-label">Pin Code</label>                            
                        </div>
                        <div class="form-group float-label active" style="display: table-cell">
                        <select type="text" class="form-control" id="from_area" name="from_area">
                            <option disabled hidden>...................................</option>
                            </select>
                            <label class="form-control-label">Area(Select Any)</label>                            
                        </div>
                        </div>

                       <div style="display: table">

                       <div class="form-group float-label active sub-label" style="display: table-cell">
                       <input type="text" class="form-control" name="from_city" id="from_city" value=" " readonly>
                            <label class="form-control-label">City</label>        
                        </div>
                       
                        <div class="form-group float-label active" style="display: table-cell">
                            <input type="text" class="form-control" name="from_state" id="from_state" value=" " readonly>
                            <label class="form-control-label">State</label>                            
                        </div>
                       </div>
                        <p style="margin-top:3px;color:red;" id="from_nonpincode"></p>
                    </div>
                  
                    
                </div><br>


                <div class="card">
                    <div class="card-header" style='padding-bottom:0px;'>
                        <h6 class="subtitle mb-0">
                            <div class="avatar avatar-40 bg-primary-light text-primary rounded mr-2"><span class="material-icons vm">add_location_alt</span></div>
                            To
                            <?php if(!$data['contact']){ ?>
                            <span class='pull-right form-group float-label'><input type="checkbox" class="formcontrol" name="add_contact">      
                            <label class="form-control-lbel"> Save Address</label> </span>
                            <?php } ?>
                        </h6>
                        
                    </div>
                  
                    <div class="card-body">



                    <div style="display: table">

                       <div class="form-group float-label sub-label active" style="display: table-cell">
                            <input type="text" class="form-control" name="to_name" value="<?php echo $contact->name; ?>" required>
                            <label class="form-control-label">Name</label>                            
                        </div>
                        <div class="form-group float-label active" style="display: table-cell">
                            <input type="number" class="form-control" name="to_phone" oninput="numberOnly(this.id);" id="tophn" maxlength="10" value="<?php echo $contact->phone; ?>" required>
                            <label class="form-control-label">Phone</label>                            
                        </div>

                       </div>
                       
                        <div class="form-group float-label active">
                            <input type="text" class="form-control" name="to_address" value="<?php echo $contact->address; ?>" required>
                            <label class="form-control-label">Address</label>                            
                        </div>
                       
                        <div style="display: table">
                         <div class="form-group float-label active sub-label" style="display: table-cell">
                            <input type="number" class="form-control" name="to_pincode" id="to_pincode" onkeyup="find_pincode2(this.value)" value="<?php echo $contact->pincode; ?>" required>
                            <label class="form-control-label">Pin Code</label>                            
                           </div>
                           <div class="form-group float-label active" style="display: table-cell">
                            <select type="text" class="form-control" id="to_area" name="to_area">
                            <option disabled hidden>............................</option>
                            </select>
                            <label class="form-control-label">Area(Select Any)</label>                            
                        </div>
                        </div>
                        

                    <div style="display: table">

                       <div class="form-group float-label active sub-label" style="display: table-cell">
                       <input type="text" class="form-control" name="to_city" value="<?php echo $contact->city; ?> " id="to_city" value=" " readonly>
                            <label class="form-control-label">City</label>        
                        </div>
                       
                        <div class="form-group float-label active" style="display: table-cell">
                            <input type="text" class="form-control" name="to_state" value="<?php echo $contact->state; ?> " id="to_state" readonly>
                            <label class="form-control-label">State</label>                            
                        </div>
                       </div>
                       <p style="margin-top:3px;color:red;" id="to_nonpincode"></p>
                    </div>
                  
                    
                </div><br>

               
                <div class="card">
                    <div class="card-header">
                        <h6 class="subtitle mb-0">
                            <div class="avatar avatar-40 bg-primary-light text-primary rounded mr-2"><span class="material-icons vm">add_location_alt</span></div>
                            Item Details
                        </h6>
                    </div>
                    <div class="card-body">
                  
                        
                    
                    <div class="form-group float-label">
                            <input type="text" class="form-control" name="item_name" maxlength="15" required>
                            <label class="form-control-label">Product Name - What are you sending?</label>                            
                        </div>
                        
                        <div style="display: table">
                        <div class="form-group float-label sub-label" style="display: table-cell">
                            <input class="form-control" disabled style="border-color:#ffffff !important;">
                            <label class="form-control-label">Quantity(in box)</label>                            
                        </div>

                        <div class="form-group float-label" style="display: table-cell">
                        <select name="item_qty" class="form-control">
                            <?php
                                for ($i=1; $i<=50; $i++)
                                {
                                    ?>
                                        <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                    <?php
                                }
                            ?>
                            <option value="3" hidden>--------------------------------</option>
                        </select>  
                        </div>
                       </div>
                        
                       
                       <div style="display: table">
                       <div class="form-group float-label sub-label" style="display: table-cell">
                            <input type="number" class="form-control" name="item_cost" id="item_cost">
                            <label class="form-control-label">Cost of Package</label>                            
                        </div>
                        <div class="form-group float-label active" style="display: table-cell">
                        <select name="item_weight" id="item_weight" class="form-control" onchange="valchange()">
                            <?php
                                $val=0;
                                for ($i=1; $i<=200; $i++)
                                { $range = $val + 1;
                                  $val = $val + 500;
                                  $val_kg = $val/1000;
                                    ?>
                                        <option value="<?php echo $val;?>"><?php echo $val_kg." Kg (".$range."-".$val." gm)";?></option>
                                    <?php
                                }
                            ?>
                            <option value="3" hidden>--------------------------------</option>
                        </select>  
                            <label class="form-control-label">Weight</label>                            
                        </div>
                       </div>

                       
 
                       
                    <center><img src="<?php echo URLROOT; ?>/assets2/box.png" alt="" width="200"></center>
                    <div style="display: table">
                       <div class="form-group float-label sub-label" style="display: table-cell">
                            <input min="1" type="number" onkeypress="valchange();return event.charCode >= 48 && event.charCode <= 57" class="form-control" name="item_length" id="item_length" required>
                            <label class="form-control-label">Length(Cm) </label>                            
                        </div>
                        <div class="form-group float-label sub-label" style="display: table-cell">
                            <input min="1" type="number" onkeypress="valchange();return event.charCode >= 48 && event.charCode <= 57" class="form-control" name="item_breadth" id="item_breadth" required>
                            <label class="form-control-label">Breadth(Cm)</label>                            
                        </div>
                        <div class="form-group float-label" style="display: table-cell">
                            <input min="1" type="number" onkeypress="valchange();return event.charCode >= 48 && event.charCode <= 57" class="form-control" name="item_height" id="item_height" required>
                            <label class="form-control-label">Height(Cm)</label>                            
                        </div>
                       </div>
                      
                        <div class="form-group float-label">
                           
                        <input type="checkbox" class="formcontrol" name="need_package">      
                         <label class="form-control-lbel"> Required Packing? (Charged Additionally*)</label>                       
                        </div>
                     
                    </div>
                  
                    
                </div>


                <br>

               
                <div class="card">
                    <div class="card-header">
                        <h6 class="subtitle mb-0">
                            <div class="avatar avatar-40 bg-primary-light text-primary rounded mr-2"><span class="material-icons vm">add_location_alt</span></div>
                            Mode of Payment
                        </h6>
                    </div>
                    <div class="card-body">
                  
                        <div class="form-group float-label" style="display: table-cell">
                        <select name="order_type" class="form-control" id="order_type" onchange="checkpaytype(this.value)">
                            
                            <option value="0">Wallet (₹<?php echo $data['wallet']->balance_amount; ?>)</option>
                            <option value="1">Pay at Pick Up</option>
                            <option value="2">Pay at Delivery</option>
                            <option value="3">Cash on Delivery</option>
                            <option value="5" hidden>-----------------------------------------------------------------</option>
                        </select>  
                        </div>
 
                       <?php if($data['wallet']->balance_amount < 50):?>
                        <div class="form-group float-label">
                            <label class="form-control-label" style="color:maroon;">Please Reacharge wallet to use prepaid.<br></label>   <br>                         
                        </div>
                        <?php endif; ?>
                       </div>
                </div>

                <br>

                <div class="card">
                    <div class="card-header">
                        <h6 class="subtitle mb-0">
                            <div class="avatar avatar-40 bg-primary-light text-primary rounded mr-2"><span class="material-icons vm">add_location_alt</span></div>
                            Shipping Details
                        </h6>
                    </div>
                    <div class="card-body">
                  
                        
                    <div style="display: table">
                        <div class="form-group float-label" style="display: table-cell;">
                            <input class="form-control" disabled>
                            <label class="form-control-label">Package Type</label>                            
                        </div>

                        <div class="form-group float-label" style="display: table-cell">
                        <select style="height: 37px; white-space: pre-wrap;"name="package_type" class="form-control" id="parcel_type" onchange="checkpacktype(this.value)">
                            <option value="0" id="packnormal">Normal Package</option>
                            <option value="1">Contains Battery</option>
                            <option value="2">Contain Glass Material</option>
                            <!-- <option value="3">Document / Letter</option> -->
                        </select>  
                        </div>
                       </div>


                       <div style="display: table">
                        <div class="form-group float-label" style="display: table-cell">
                            <input class="form-control" disabled>
                            <label class="form-control-label">Shipping Type</label>                            
                        </div>

                        <div class="form-group float-label" style="display: table-cell">
                        <select name="shipping_type" class="form-control" id="shipping_type" onchange="shipping(this.value)">
                            <option value="0" id="shipstandard">Standard</option>
                            <option value="1" id="shipexpress">Express</option>
                            <option value="2" id="shipschedule">Schedule</option>
                            <option hidden>-----------------------------</option>
                        </select>  
                        </div>
                       </div>

                    <?php 
                    $time = date('H:i:s');
                    $end_time = date('H:i:s', strtotime('14:00:00'));
                    $end_time_first = date('H:i:s', strtotime('11:00:00'));
                    $datelimit = date('Y-m-d');
                    $datelimit_next = date("Y-m-d", strtotime('tomorrow'));
                    $datelimit_next2 = date("Y-m-d",strtotime($datelimit_next . "+1 days"));
                    $datelimit_last = date("Y-m-d",strtotime($datelimit_next . "+6 days"));
                    $datelimit_last2 = date("Y-m-d",strtotime($datelimit_next . "+7 days"));
                    $datelimit_last3 = date("Y-m-d",strtotime($datelimit_next . "+8 days"));
                    ?>

                    <div style="display: table" id="standard_ship">
                        <div class="form-group float-label active sub-label" style="display: table-cell">
                        <select name="standard_date_slot" class="form-control">
                            <option value="<?php echo $datelimit_next; ?>"><?php echo date('d-m-Y', strtotime($datelimit_next)); ?></option>
                            <option hidden>--------------------------------</option>
                        </select>      
                        <label class="form-control-label">PICKUP</label>                 
                        </div>
                        <div class="form-group float-label" style="display: table-cell">
                        <select name="standard_time_slot" class="form-control">
                            <option value="0">(10am - 1pm)</option>
                            <option value="1">(2pm - 4pm)</option>
                            <option hidden>--------------------------------</option>
                        </select>  
                        </div>
                    </div>



                    <div style="display: none" id="schedule_ship">
                        <div class="form-group float-label active sub-label" style="display: table-cell">
                        <select name="schedule_date_slot" class="form-control">
                            <option value="<?php echo $datelimit_next; ?>"><?php echo date('d-m-Y', strtotime($datelimit_next)); ?></option>
                            <option value="<?php echo $datelimit_next2; ?>"><?php echo date('d-m-Y', strtotime($datelimit_next2)); ?></option>
                            <option hidden>--------------------------------</option>
                             </select>
                            <label class="form-control-label">PICK UP</label>                     
                        </div>
                        <div class="form-group float-label" style="display: table-cell">
                        <select name="schedule_time_slot" class="form-control">
                            <option value="0">(10am - 1pm)</option>
                            <option value="1">(2pm - 4pm)</option>
                            <option hidden>--------------------------------</option>
                        </select>  
                        </div>
                    </div>

                    <div style="display: none" id="schedule_ship2">
                        <div class="form-group float-label active sub-label" style="display: table-cell">
                        <select name="schedule_date_slot2" class="form-control">
                            <option value="<?php echo $datelimit_last; ?>"><?php echo date('d-m-Y', strtotime($datelimit_last)); ?></option>
                            <option value="<?php echo $datelimit_last2; ?>"><?php echo date('d-m-Y', strtotime($datelimit_last2)); ?></option>
                            <option value="<?php echo $datelimit_last3; ?>"><?php echo date('d-m-Y', strtotime($datelimit_last3)); ?></option>
                            <option hidden>--------------------------------</option>
                             </select>
                            <label class="form-control-label">DELIVERY</label>                           
                        </div>
                        <div class="form-group float-label" style="display: table-cell">
                        <select name="schedule_time_slot2" class="form-control">
                            <option value="0">(10am - 1pm)</option>
                            <option value="1">(2pm - 4pm)</option>
                            <option hidden>--------------------------------</option>
                        </select>  
                        </div>
                    </div>




                       <div style="display: none" id="express_ship">
                      

                        <?php if($time < $end_time){ ?>
                            <div class="form-group float-label active sub-label" style="display: table-cell">

                            <select name="express_date_slot" class="form-control">
                            <option value="<?php echo $datelimit; ?>"><?php echo date('d-m-Y', strtotime($datelimit)); ?></option>
                            <option hidden>--------------------------------</option>
                             </select>
                             <label class="form-control-label">PICKUP</label>          
                            </div>


                            <div class="form-group float-label" style="display: table-cell">
                            <select name="express_time_slot" class="form-control" <?php if($time > $end_time){echo "disabled";} ?>>
                            <?php if($time < $end_time_first){ ?>
                                <option value="0">(10am - 1pm)</option>
                            <?php } ?>
                                <option value="1">(2pm - 4pm)</option>
                                 <option hidden>--------------------------------</option>
                            </select>  
                            </div>
                        <?php }else { ?>
                            <div class="form-group float-label sub-label" style="display: table-cell">

                            <select name="express_date_slot" class="form-control">
                            <option value="<?php echo $datelimit_next; ?>"><?php echo date('d-m-Y', strtotime($datelimit_next)); ?></option>
                            <option hidden>--------------------------------</option>
                             </select>
                            
                            </div>

                            <div class="form-group float-label" style="display: table-cell">
                            <select name="express_time_slot" class="form-control" <?php if($time < $end_time){echo "disabled";} ?>>
                                <option value="0">(10am - 1pm)</option>
                                <option value="1">(2pm - 4pm)</option>
                                 <option hidden>--------------------------------</option>
                            </select>  
                            </div>
                        <?php } ?>
                                                 
                        
                       </div>



                     
                    </div>
                    
                </div>



                


                  <br>
                <div class="card">
                    <div class="card-header">
                     <span id="signIn" class="btn btn-block btn-default rounded">Calculate Cost</span>
                     
                    <div class="form-group float-label">
                            <input type="text" class="form-control" name="booking_cost" readonly id="payment_res">
                                                      
                     </div>


                        <div style="display:none" id="coupon_sec">

                            <div class="form-group" style="display: table-cell">
                            <input placeholder="Enter promo code" type="text" class="form-control" id="coupon">
                        </div>
                            <div style="display:table-cell">
                                  <span style="border-radius:15px;margin-left:25px;width:100%" type="submit" class="btn btn-success btn-sm" onclick="coupon(document.getElementById('coupon').value)">Apply</span>
                            </div>

                        </div>

                        <div class="form-group float-label">
                            <p id="coupon_res" style="color:#FF5C5C;margin-left:10px"></p>
                        </div>

                    </div>
                    
                    <div class="card-body">
                  

                      <br>
                        <div class="card-footer">
                        <span class="btn btn-primary rounded m-2" id="order_btn" type="button" class="btn btn-block btn-success rounded" style="display:none">Confirm Order</span>
                    </div>
                    </div>
                    
                </div>





                <div class="modal fade" id="orderconfirm" tabindex="-1" role="dialog" aria-labelledby="orderconfirmTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-sm modal-dialog-centered" role="document">
                        <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="orderconfirmTitle">Order Summary</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                <div class="modal-body">
              
                    
                    <div class="card-bod">
                        <ul class="list-group mb-4">
                            <li class="list-group-item" style="background:#eee;" id="confirm_from_address"></li>
                        </ul>
                        <ul class="list-group mb-4">
                            <li class="list-group-item" style="background:#eee;" id="confirm_to_address"></li>
                        </ul>
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action" id="confirm_product1"></a>
                            <a href="#" class="list-group-item list-group-item-action" id="confirm_product2"></a>
                            <a href="#" class="list-group-item list-group-item-action" id="confirm_product3"></a>
                            <a href="#" class="list-group-item list-group-item-action" id="confirm_package"></a>
                            <a href="#" class="list-group-item list-group-item-action" id="confirm_shipping"></a>
                            <a href="#" class="list-group-item list-group-item-action" id="confirm_payment_mode"></a>
                           
                        </div><br>
                        <ul class="list-group mb-4">
                          <li class="list-group-item" id="confirm_booking"></li>
                          <li class="list-group-item" id="confirm_tax"></li>
                          <li class="list-group-item active" id="confirm_cost"></li>
                        </ul>
                        <p><input type="checkbox"> I hereby declare that the consignment does not contain cash, jewellery, plain stamp paper. This package does not contain any illegal, hazardous products, explosives or any chemicals. To know more about prohibited items, please visit www.speedercouriers.com. No claims will be entertained for prohibited items. </p>
                      
                    </div>
               
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                    <button id="final_confirm_order" type="submit" class="btn btn-success">Create Order</button>
                </div>
                </div>
                </div>
                </div>




                
            </form>


            </div>
        </div>
    </main>

    <?php require APPROOT . '/views/inc/nav-footer.php'; ?>
    <?php require APPROOT . '/views/inc/footer.php'; ?>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


		<script type="text/javascript">
			$(document).ready(function(){
				$('#signIn').click(function(){
					var from_pincode = $('#from_pincode').val();
					var to_pincode = $('#to_pincode').val();
					var from_state = $('#from_state').val();
                    var to_state = $('#to_state').val();
					var item_cost = $('#item_cost').val();
                    var item_weight = $('#item_weight').val();
					var item_length = $('#item_length').val();
					var item_breadth = $('#item_breadth').val();
					var item_height = $('#item_height').val();
                    var parcel_type = $('#parcel_type').val();
					var order_type = $('#order_type').val();
                    var shipping_type = $('#shipping_type').val();
					var to_pincode = $('#to_pincode').val();
                    var from_pincode = $('#from_pincode').val();
                    
					if(from_pincode && to_pincode)
					{
							$.ajax({
								url  : '<?php echo URLROOT; ?>/pages/check_servicablity',
								type : 'POST',
								data : {from_pincode,to_pincode,from_state,to_state,item_cost,item_weight,item_length,item_breadth,item_height,parcel_type,order_type,shipping_type},

								success : function(res)
								{
									if (/^\d+\.\d+$|^\d+$/.test(res)) {
                                        $("#payment_res").val("₹ " + res);
                                        if(res>0){
                                        document.getElementById("order_btn").style.display = 'block';
                                        document.getElementById('coupon_sec').style.display = 'table';
                                        } else {
                                        document.getElementById("order_btn").style.display = 'none';
                                        }
                                    }else {
                                        $("#payment_res").val(res);
                                        document.getElementById("order_btn").style.display = 'none';
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

            function shipping(type) {
                if(type==0){
                    document.getElementById('standard_ship').style.display = 'table';
                    document.getElementById('schedule_ship').style.display = 'none';
                    document.getElementById('schedule_ship2').style.display = 'none';
                    document.getElementById('express_ship').style.display = 'none';
                    document.getElementById("order_btn").style.display = 'none';
                    $("#payment_res").val("");
                }
                else if(type==1){
                    document.getElementById('standard_ship').style.display = 'none';
                    document.getElementById('schedule_ship').style.display = 'none';
                    document.getElementById('schedule_ship2').style.display = 'none';
                    document.getElementById('express_ship').style.display = 'table';
                    document.getElementById("order_btn").style.display = 'none';
                    $("#payment_res").val("");
                }
                else if(type==2){
                    document.getElementById('standard_ship').style.display = 'none';
                    document.getElementById('schedule_ship').style.display = 'table';
                    document.getElementById('schedule_ship2').style.display = 'table';
                    document.getElementById('express_ship').style.display = 'none';
                    document.getElementById("order_btn").style.display = 'none';
                    $("#payment_res").val("");
                }
            }
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

                                if(detail[3] == "0"){
                                    document.getElementById("from_nonpincode").innerHTML = "Non Serviceable Pincode";
                                }else {
                                    document.getElementById("from_nonpincode").innerHTML = "";
                                }


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

                                if(detail[3] == "0"){
                                    document.getElementById("to_nonpincode").innerHTML = "Non Serviceable Pincode";
                                }else {
                                    document.getElementById("to_nonpincode").innerHTML = "";
                                }


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

function checkpaytype(type) {
    if(type == "1" || type == "10"){
    $('#shipexpress').prop('disabled', true);
    $('#shipschedule').prop('disabled', true);
    $('#shipstandard').prop("selected",true).trigger("change");
    $('#packnormal').prop("selected",true).trigger("change");
    document.getElementById("order_btn").style.display = 'none';
    $("#payment_res").val("");
    }else {
    
    $('#shipexpress').prop('disabled', false);
    $('#shipschedule').prop('disabled', false);$('#shipstandard').prop("selected",true).trigger("change");
    $('#packnormal').prop("selected",true).trigger("change");
    document.getElementById("order_btn").style.display = 'none';  
    $("#payment_res").val("");
    }
  }

function checkpacktype(type) {
    if(type == "2" || type == "1"){
    $('#shipexpress').prop('disabled', true);
    $('#shipstandard').prop("selected",true).trigger("change");
    document.getElementById("order_btn").style.display = 'none';
    $("#payment_res").val("");
    }else {
    if($('#order_type').val == "0"){
    $('#shipexpress').prop('disabled', false); 
    }
    ('#shipstandard').prop("selected",true).trigger("change");
    document.getElementById("order_btn").style.display = 'none';
    $("#payment_res").val("");
    }
}

function valchange() {
    document.getElementById("order_btn").style.display = 'none';
    $("#payment_res").val("");
}

function check_coupon(){
    document.getElementById("coupon_res").innerHTML = "Invalid Coupon Code";
}



function coupon(coupon){
   if(coupon){
   var subtotal = $("#payment_res").val();
   subtotal = subtotal.substring(0, subtotal.indexOf('.'));
   subtotal = subtotal.replace(/[^0-9]/g, '');
   $.ajax({
        url  : '<?php echo URLROOT; ?>/ecom/check_coupon',
        type : 'POST',
        data : {coupon,subtotal},
        success : function(res)
        {
            if(res=="0"){
               document.getElementById("coupon_res").innerHTML = "<span style='color:red;'>Invalid Coupon</span>";
               $('#signIn').click();
            }else {
               net_total = subtotal - res; 
               if(net_total>0){
               document.getElementById("coupon_res").innerHTML = "<span style='color:green;'>Coupon Applied</span>";
               $("#payment_res").val("₹ " + net_total);
               }else {
                document.getElementById("coupon_res").innerHTML = "<span style='color:red;'>Coupon not applied!</span>";
               }
            }
        }

    });
}}



$("#order_btn").on('click', function(){
    
    var com_from_address = $("input[name='from_address']").val();
    var com_from_city = $("input[name='from_city']").val();
    var com_from_state = $("input[name='from_state']").val();
    var com_from_pincode = $("input[name='from_pincode']").val();

    var com_to_address = $("input[name='to_address']").val();
    var com_to_city = $("input[name='to_city']").val();
    var com_to_state = $("input[name='to_state']").val();
    var com_to_pincode = $("input[name='to_pincode']").val();

    var com_item_name = $("input[name='item_name']").val();
    var com_item_qty = $("select[name='item_qty']").val();
    var com_item_weight = $("select[name='item_weight']").val();

    var com_item_length = $("input[name='item_length']").val();
    var com_item_breadth = $("input[name='item_breadth']").val();
    var com_item_height = $("input[name='item_height']").val();

    var com_order_type = $("select[name='order_type']").val();
    if(com_order_type==0){
        com_order_type="Prepaid (Wallet)";
    }else if(com_order_type==10){
        com_order_type="Pay at Pickup";
    }else if(com_order_type==1){
        com_order_type="Pay at Delivery";
    }

    var com_package_type = $("select[name='package_type']").val();
    if(com_package_type==0){
        com_package_type="Normal Package";
    }else if(com_package_type==1){
        com_package_type="Contains Battery";
    }else if(com_package_type==2){
        com_package_type="Contain Glass Material";
    }else if(com_package_type==3){
        com_package_type="Document / Letter";
    }

    var com_shipping_type = $("select[name='shipping_type']").val();
    if(com_shipping_type==0){
        com_shipping_type="Standard";
    }else if(com_shipping_type==10){
        com_shipping_type="Express";
    }else if(com_shipping_type==1){
        com_shipping_type="Schedule";
    }


    var com_booking_cost = $("input[name='booking_cost']").val();
    com_booking_cost = com_booking_cost.replace(/[^0-9.-]/g, '');
    com_booking_cost = parseFloat(com_booking_cost);
    var com_tax = (com_booking_cost * 18)/100;
    var com_cost = com_booking_cost + com_tax;
    com_cost = Math.ceil(com_cost);


    if(com_from_address && com_from_city && com_from_state && com_from_pincode && com_to_address && com_to_city && com_to_state && com_to_pincode && com_item_qty && com_item_weight && com_order_type && com_package_type && com_shipping_type){

    document.getElementById("confirm_from_address").innerHTML = "From: " + com_from_address+", "+com_from_city+", "+com_from_state+", "+com_from_pincode;
    document.getElementById("confirm_to_address").innerHTML = "To: " + com_to_address+", "+com_to_city+", "+com_to_state+", "+com_to_pincode;

    document.getElementById("confirm_product1").innerHTML = "Product Name: " + com_item_name;

    document.getElementById("confirm_product2").innerHTML = "Quantity: " + com_item_qty + ", Weight: "+ com_item_weight;

    document.getElementById("confirm_product3").innerHTML = "Dimensions (LxBxH): " + com_item_length +"Cm X "+com_item_breadth +"Cm X "+com_item_height+"Cm";

    document.getElementById("confirm_payment_mode").innerHTML = "Payment Mode: " + com_order_type;
    
    document.getElementById("confirm_package").innerHTML = "Package Type: " + com_package_type;

    document.getElementById("confirm_shipping").innerHTML = "Shipping Type: " + com_shipping_type;

    document.getElementById("confirm_booking").innerHTML = "Booking Cost: ₹" + com_booking_cost;

    document.getElementById("confirm_tax").innerHTML = "Tax (18%): ₹" + com_tax;

    document.getElementById("confirm_cost").innerHTML = "Total Cost: ₹" + com_cost;
    
    jQuery.noConflict(); 
    $('#orderconfirm').modal();

     }
     else {
        $("#payment_res").val("Please enter all details");
        document.getElementById("order_btn").style.display = 'none';
     }
});


</script>





<div class="modal fade" id="non_pincode" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>This is a small modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>