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
          Order Created at DB, View for Panel missing.


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
			var order_type = $('#order_type').val();
			var shipping_type = $('#shipping_type').val();
			var to_pincode = $('#to_pincode').val();
			var from_pincode = $('#from_pincode').val();
            var package_value = $('#package_value').val();
            var eway_number = $('#eway_number').val();
            var packing_cost = $('#packing_cost').val();
            var order_margin = $('#order_margin').val();
            
			
			if(from_pincode && to_pincode)
			{
					$.ajax({
						url  : '<?php echo URLROOT; ?>/admin/check_costing',
						type : 'POST',
						data : {from_pincode,to_pincode,from_state,to_state,item_weight,item_length,item_breadth,item_height,parcel_type,order_type,shipping_type,package_value,eway_number,packing_cost,order_margin},

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
