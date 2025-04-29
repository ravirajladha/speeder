<?php require APPROOT . '/views/inc_admin/header.php'; ?>
<?php 
$curmodel = new Page;
$ship_type = $_GET['ship_type']; 
$rec = $_GET['rec']; 
if(empty($ship_type) && $ship_type !== "0" )
{
$ship_type = 9;
}
if(empty($rec) && $rec !== "0" )
{
$rec = 9;
} ?>
				<!-- CONTAINER -->
				<div class="app-content">

					<!-- PAGE-HEADER -->
					<div class="page-header">
						<h4 class="page-title">Orders</h4>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Orders</li>
						</ol>
					</div>
					<!-- PAGE-HEADER END -->

					<div class="row">
						<div class="col-md-12 col-xl-12 col-lg-12">
							<div class="card">
								<div class="card-header" style='display:block'>
									<div class="card-title">
									<div class="row" style='margin-top:10px;'>
										<div class="col-md-2">
										Recent Orders 
										</div>

										

										<div class="col-md-3">
										<form action='<?php echo URLROOT;?>/admin/orders/' method='GET' >
										<select name="ship_type" class="form-control">
											<option value="9" <?php if($ship_type == 9){echo "selected"; }?>>All Orders</option>
											<option value="0" <?php if($ship_type == 0){echo "selected"; }?>>Standard Order</option>
											<option value="1" <?php if($ship_type == 1){echo "selected"; }?>>Express Order</option>
											<option value="2" <?php if($ship_type == 2){echo "selected"; }?>>Scheduled order</option>
										</select>
										</div>

										<div class="col-md-3">
										<select name="ship_type" class="form-control">
											<option value="9" <?php if($ship_type == 9){echo "selected"; }?>>All Status</option>
											<option value="0" <?php if($ship_type == 0){echo "selected"; }?>>Placed</option>
											<option value="1" <?php if($ship_type == 1){echo "selected"; }?>>Picked</option>
											<option value="2" <?php if($ship_type == 2){echo "selected"; }?>>At Source AD</option>
											<option value="2" <?php if($ship_type == 2){echo "selected"; }?>>To Source MD</option>
											<option value="2" <?php if($ship_type == 2){echo "selected"; }?>>At Source MD</option>
											<option value="2" <?php if($ship_type == 2){echo "selected"; }?>>To Destination MD</option>
											<option value="2" <?php if($ship_type == 2){echo "selected"; }?>>At Destination MD</option>
											<option value="2" <?php if($ship_type == 2){echo "selected"; }?>>To Destination AD</option>
											<option value="2" <?php if($ship_type == 2){echo "selected"; }?>>At Destination AD</option>
											<option value="2" <?php if($ship_type == 2){echo "selected"; }?>>Out for Delivery</option>
											<option value="2" <?php if($ship_type == 2){echo "selected"; }?>>Delivered</option>
											<option value="2" <?php if($ship_type == 2){echo "selected"; }?>>Returned</option>

										</select>
										</div>

										

										<div class="col-md-1">
										<button name='barcode' class='btn btn-primary' type='text' placeholder='Scan Barcode'>Filter</button>
										</div>


										
										</form>	
										<div class="col-md-3">
										<form action='<?php echo URLROOT;?>/admin/scan_barcode' method='POST' >
										<input name='barcode' class='form-control' type='text' placeholder='Scan Barcode'>
									    </form>	
										</div>
									</div>							
									</div>
								</div>
									
								<div class="">
									<div class="table-responsive">
										<table class="table table-hover card-table table-striped table-vcenter table-outline text-nowrap">
											<thead>
												<tr>
													<th scope="col">ID</th>
													<th scope="col">Name</th>
													<th scope="col">AWB</th>
													<th scope="col">Date</th>
													<th scope="col">Cost</th>
													<th scope="col">From</th>
													<th scope="col">To</th>
													<th scope="col">Status</th>
													<th scope="col">OTPs</th>
													<th scope="col">Routes</th>
													<th scope="col">Action</th>
												</tr>
											</thead>
											<tbody>

                                            <?php foreach($data['all_orders'] as $order):
											if($order->shipping_type == $ship_type || $ship_type == 9){

												if($order->booking_status == 0){
													$bstatus = "Placed";
												}else if($order->booking_status == 1){
													$bstatus = "Ready for Pickup";
												}else if($order->booking_status == 2){
													$bstatus = "Picked";
												}elseif($order->booking_status == 3){
													$bstatus = "Sent to Source Hub";
												}elseif($order->booking_status == 4){
													$bstatus = "Reached Source Hub";
												}else if($order->booking_status == 5){
													$bstatus = "Sent to Mother Hub";
												}else if($order->booking_status == 6){
													$bstatus = "Reached Mother Hub";
												}else if($order->booking_status == 7){
													$bstatus = "Sent to Regional Hub";
												}else if($order->booking_status == 8){
													$bstatus = "Reached Regional Hub";
												}else if($order->booking_status == 9){ 
													$bstatus = "In Transit";
												}else if($order->booking_status == 10){
													$bstatus = "Sent to Destination Regional Hub";
												}else if($order->booking_status == 11){
													$bstatus = "Reached Destination Regional Hub";
												}else if($order->booking_status == 12){
													$bstatus = "Sent to Destination Mother Hub";
												}else if($order->booking_status == 13){
													$bstatus = "Reached Destination Mother Hub";
												}else if($order->booking_status == 14){
													$bstatus = "Sent to Destination Hub";
												}else if($order->booking_status == 15){
													$bstatus = "Reached Destination Hub";
												}else if($order->booking_status == 16){
													$bstatus = "Ready for Delivery";
												}else if($order->booking_status == 17){
													$bstatus = "Out for Delivery";
												}else if($order->booking_status == 18){
													$bstatus = "Delivered";
												}else if($order->booking_status == 20){
													$bstatus = "Reversed";
												}
												else if($order->booking_status == 99){
													$bstatus = "Cancelled";
												}

                ?> 
												<tr>
													<td> <?php echo $order->booking_id; ?> <?php if($order->order_from){echo "<i class='fa fa-arrow-circle-up'></i>"; } ?></td>
													<td><?php echo $order->from_name; ?></td>
													<td><?php echo $order->speeder_id; ?></td>
													<td><?php echo date('M jS Y', strtotime($order->booking_datetime)); ?></td>
													
													<td>
													<?php if($order->order_from){ 
														$order_margin = 0;
														$packing_cost = 0;
														if($order->order_margin){$order_margin =($order->order_margin * $order->booking_cost) / 100; }
														if($order->packing_cost){$packing_cost = $order->packing_cost; }
														?>
														M: <?php echo round($order_margin); ?><br>
														P:<?php echo $packing_cost; ?><br>
													<?php } ?>
													<b><i class='fa fa-inr'></i><?php echo $order->booking_cost; ?></b>
													</td>
													
													<td><i class='fa fa-map-marker'></i> <?php echo $order->from_city.", ".$order->from_state; ?></td>
													<td><i class='fa fa-map-marker'></i> <?php echo $order->to_city.", ".$order->to_state; ?></td>
													<td>Order <?php echo $bstatus;?></td>
													<td>
														POTP1: <?php echo $order->otp_pickup;?><br>
														POTP2: <?php echo $order->otp_pickup2;?><br>
														DOTP: <?php echo $order->otp_delivery;?><br>
													</td>
													<td><button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="
												<?php 
												$fad = $curmodel->get_userinfo($order->from_ad_id); 
												echo "AD(S):". $fad->name. ", "; 
												$fmd = $curmodel->get_userinfo($order->from_md_id); 
												echo "MD(S):". $fmd->name. ", "; 
												$frd = $curmodel->get_userinfo($order->from_rd_id); 
												echo "RD(S):". $frd->name. ", "; 
												$tad = $curmodel->get_userinfo($order->to_ad_id); 
												echo "AD(D):". $tad->name. ", "; 
												$tmd = $curmodel->get_userinfo($order->to_md_id); 
												echo "MD(D):". $tmd->name. ", "; 
												$trd = $curmodel->get_userinfo($order->to_rd_id); 
												echo "RD(D):". $trd->name. ", "; 
												?> 
												">View</button>
													</td>
													<td><a class="btn btn-sm btn-primary" href="<?php echo URLROOT; ?>/admin/order/<?php echo $order->booking_id?>"> View</a> 
													<?php if($order->booking_status!=99){?>
													<a class="btn btn-sm btn-warning" href="<?php echo URLROOT; ?>/admin/cancel_order_admin/<?php echo $order->booking_id?>"> Cancel</a>
													<?php } else {?>
													<button class="btn btn-sm btn-warning" disabled> Cancelled</button>
													<?php } ?>
												
												</td>
												</tr>
												
				<?php } endforeach; ?>							
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- ROW-4 END -->

				</div>
				<!-- CONTAINER END -->
            </div>

			<!-- SIDE-BAR -->
			
			<!-- SIDE-BAR CLOSED -->

			<?php require APPROOT . '/views/inc_admin/footer.php'; ?>