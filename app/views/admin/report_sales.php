<?php require APPROOT . '/views/inc_admin/header.php'; ?>


				<!-- CONTAINER -->
				<div class="app-content">

				   <!-- PAGE-HEADER -->
					<div class="page-header">
						<h4 class="page-title">Reports</h4>
						
					</div>
					<!-- PAGE-HEADER END -->


					<!-- ROW-1 OPEN -->
					<div class="row">
						<div class="col-md-12 col-lg-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Sales Report</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="datable-1" class="table table-striped table-bordered text-nowrap w-100">
											<thead>
												<tr>
													<th class="wd-15p">Name</th>
													<th class="wd-15p">Date</th>
													<th class="wd-10p">MD Code</th>
													<th class="wd-25p">Status</th>
													<th class="wd-10p">Amount</th>
												</tr>
											</thead>
											<tbody>
											<?php foreach($data['all_orders'] as $order):
											

            if($order->booking_status == 0){
                $bstatus = "Placed";
            }else if($order->booking_status == 1){
                $bstatus = "Picked";
            }elseif($order->booking_status == 2){
                $bstatus = "Delivered at Source AD";
            }else if($order->booking_status == 3){
                $bstatus = "Shipped to Source MD";
            }else if($order->booking_status == 4){
                $bstatus = "Delivered at Source MD";
            }else if($order->booking_status == 5){
                $bstatus = "Shipped to Destination MD";
            }else if($order->booking_status == 6){
                $bstatus = "Delivered at Destination MD";
            }else if($order->booking_status == 7){
                $bstatus = "Shipped to Destination AD";
            }else if($order->booking_status == 8){
                $bstatus = "Delivered at Destination AD";
            }else if($order->booking_status == 9){
                $bstatus = "Out for Delivery";
            }else if($order->booking_status == 10){
                $bstatus = "Delivered";
            }else if($order->booking_status == 11){
                $bstatus = "Returned";
            }else if($order->booking_status == 99){
                $bstatus = "Cancelled";
            }

                ?>
												<tr>
													<td><?php echo $order->from_name; ?></td>
												
													<td><?php echo date('M jS Y', strtotime($order->booking_datetime)); ?></td>
													
													<td>MD-<?php echo $order->from_md_id; ?></td>
													<td>Order <?php echo $bstatus;?></td>
													<td><i class='fa fa-inr'></i><?php echo $order->booking_cost; ?></td>
													
												</tr>
												
				<?php  endforeach; ?>	
											
											</tbody>
										</table>
									</div>
								</div>
								<!-- TABLE WRAPPER -->
							</div>
							<!-- SECTION WRAPPER -->
						</div>
					</div>
					
				</div>
				<!-- CONTAINER CLOSED -->
			</div>

			<?php require APPROOT . '/views/inc_admin/footer.php'; ?>
