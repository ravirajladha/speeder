<?php require APPROOT . '/views/inc_admin/header.php'; ?>
<?php 
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
						<h4 class="page-title">Booking Orders</h4>
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
										<div class="col-md-3">
										Recent Orders 
										</div>

										<div class="col-md-3">
										<a href='<?php echo URLROOT; ?>/admin/from_orders_md'><button class='btn btn-primary btn-sm'>All</button></a>
										<a href='<?php echo URLROOT; ?>/admin/from_orders_md?rec=1'><button class='btn btn-primary btn-sm'>Recieved</button></a>
										<a href='<?php echo URLROOT; ?>/admin/from_orders_md?rec=2'><button class='btn btn-primary btn-sm'>Not Recieved</button></a>
										</div>

										<div class="col-md-3">
										<form action='<?php echo URLROOT;?>/admin/from_orders_md' method='GET' >
										<select name="ship_type" class="form-control" oninput="this.form.submit()">
											<option value="9" <?php if($ship_type == 9){echo "selected"; }?>>All Orders</option>
											<option value="0" <?php if($ship_type == 0){echo "selected"; }?>>Standard Order</option>
											<option value="1" <?php if($ship_type == 1){echo "selected"; }?>>Express Order</option>
											<option value="2" <?php if($ship_type == 2){echo "selected"; }?>>Scheduled order</option>
										</select>
									    </form>	
										</div>

										
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
													<th scope="col">Name</th>
													<th scope="col">AWB</th>
													<th scope="col">Date</th>
													<th scope="col">From</th>
													<th scope="col">To</th>
													<th scope="col">From AD</th>
													<th scope="col">To AD</th>
                                                    <th scope="col">Action</th>
												</tr>
											</thead>
											<tbody>

                                            <?php foreach($data['all_orders'] as $order):
											if($order->shipping_type == $ship_type || $ship_type == 9){
												
		    
            if($order->booking_status == 0){
                $bstatus = "Placed";
            }else if($order->booking_status == 1){
                $bstatus = "Picked";
            }elseif($order->booking_status == 2){
                $bstatus = "At Transit";
            }else if($order->booking_status == 3){
                $bstatus = "Shipped";
            }else if($order->booking_status == 4){
                $bstatus = "Out for Delivery";
            }else if($order->booking_status == 9){
                $bstatus = "Cancelled";
            }
                ?>
				
											
												<?php if($rec == 1 && $order->from_mother_datetime){?>
												<tr>
													<td><?php echo $order->from_name; ?></td>
													<td><?php echo $order->speeder_id; ?></td>
													<td><?php echo date('M jS Y, h:m A', strtotime($order->booking_datetime)); ?></td>
													<td><?php echo $order->from_city; ?></td>
													<td><?php echo $order->to_city; ?></td>
													<td><?php echo $order->from_ad_id; ?></td>
                                                    <td><?php echo $order->to_ad_id; ?></td>
													<td><a class="btn btn-sm btn-primary" href="<?php echo URLROOT; ?>/admin/order/<?php echo $order->booking_id?>"> View</a>
													<?php if($order->order_from){ ?>
													<a target="_BLANK" class="btn btn-sm btn-default" href="<?php echo URLROOT; ?>/admin/print_bill/<?php echo $order->booking_id?>"> Print</a>
													<?php } ?>
												</td>
												</tr>
												<?php } else if($rec == 2 && !$order->from_mother_datetime){?>
												<tr>
													<td><?php echo $order->from_name; ?></td>
													<td><?php echo $order->speeder_id; ?></td>
													<td><?php echo date('M jS Y, h:m A', strtotime($order->booking_datetime)); ?></td>
													<td><?php echo $order->from_city; ?></td>
													<td><?php echo $order->to_city; ?></td>
													<td><?php echo $order->from_ad_id; ?></td>
                                                    <td><?php echo $order->to_ad_id; ?></td>
													<td><a class="btn btn-sm btn-primary" href="<?php echo URLROOT; ?>/admin/order/<?php echo $order->booking_id?>"> View</a>
													<?php if($order->order_from){ ?>
													<a target="_BLANK" class="btn btn-sm btn-default" href="<?php echo URLROOT; ?>/admin/print_bill/<?php echo $order->booking_id?>"> Print</a>
													<?php } ?>
												</td>
												</tr>
												<?php } else if($rec == 9){?>
												<tr>
													<td><?php echo $order->from_name; ?></td>
													<td><?php echo $order->speeder_id; ?></td>
													<td><?php echo date('M jS Y, h:m A', strtotime($order->booking_datetime)); ?></td>
													<td><?php echo $order->from_city; ?></td>
													<td><?php echo $order->to_city; ?></td>
													<td><?php echo $order->from_ad_id; ?></td>
                                                    <td><?php echo $order->to_ad_id; ?></td>
													<td><a class="btn btn-sm btn-primary" href="<?php echo URLROOT; ?>/admin/order/<?php echo $order->booking_id?>"> View</a> 
													<?php if($order->order_from){ ?>
													<a target="_BLANK" class="btn btn-sm btn-default" href="<?php echo URLROOT; ?>/admin/print_bill/<?php echo $order->booking_id?>"> Print</a>
													<?php } ?>
												</td>
												</tr>
												<?php } ?>


												
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
