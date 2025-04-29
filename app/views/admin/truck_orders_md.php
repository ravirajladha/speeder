<?php require APPROOT . '/views/inc_admin/header.php'; ?>

				<!-- CONTAINER -->
				<div class="app-content">

					<!-- PAGE-HEADER -->
					<div class="page-header">
						<h4 class="page-title">Truck Orders</h4>
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
                                        <?php $md_trucks = explode(',', $data['md']->trucks); ?>
										<div class="col-md-9">
										<form action='<?php echo URLROOT;?>/admin/update_trucks_md/<?php echo $_SESSION['rexkod_vendor_id']?>' method='POST' class="pull-right">
                                        <span>Available Trucks: </span>
                                            <?php foreach($data['trucks'] as $truck):?>
											<span style="padding:2px 5px;margin-right:5px;background:#00b894;font-size:14px;color:#fff">
                                            <input type="checkbox" name="T<?php echo $truck->truck_id;?>" value="<?php echo $truck->truck_id;?>" <?php if(in_array($truck->truck_id, $md_trucks)){echo "checked";}?>>
                                            <label for=""><?php echo $truck->name; ?></label>
                                            </span>
                                            <?php endforeach; ?>
                                        <button class="btn btn-primary btn-sm">Update</button>
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
                                                <th scope="col">Customer</th>
                                                <th scope="col">From</th>
													<th scope="col">to</th>
													<th scope="col">Truck</th>
													<th scope="col">Distance</th>
													<th scope="col">Cost</th>
                                                    <th scope="col">Status</th>
												</tr>
											</thead>
											<tbody>

                                            <?php foreach($data['all_orders'] as $order):
											if($order->shipping_type == $ship_type || $ship_type == 9){
												
		    
                                                $order_count =1;
                                                if($order->status == 0){
                                                    $bstatus = "Placed";
                                                }else if($order->status == 1){
                                                    $bstatus = "In Progress";
                                                }else if($order->status == 2){
                                                    $bstatus = "Completed";
                                                }else if($order->status == 3){
                                                    $bstatus = "Cancelled";
                                                }
                                    
                                                if($order->truck=="1"){
                                                    $truck_type="Tempo";}
                                                else if($order->truck=="2"){
                                                    $truck_type="Truck";}
                                                else if($order->truck=="3"){
                                                    $truck_type="Lorry";}    
                                               ?>
				
											
												<tr>
                                                    <td><?php echo $order->name."<br>".$order->phone; ?></td>
                                                    <td><?php echo $order->from_area.",".$order->from_pincode; ?></td>
                                                    <td><?php echo $order->to_area.",".$order->to_pincode; ?></td>
													<td><?php echo $truck_type; ?></td>
													<td><?php echo $order->distance." Kms"; ?></td>
													<td><i class="fa fa-inr"></i> <?php echo $order->cost; ?></td>
													<td>
                                                    <form action='<?php echo URLROOT;?>/admin/to_orders_md' method='GET' >
                                                    <select style="width:100px" name="status" class="form-control" oninput="this.form.submit()">
                                                        <option value="0" <?php if($order->status == 0){echo "selected"; }?>>Placed</option>
                                                        <option value="1" <?php if($order->status == 1){echo "selected"; }?>>In Process</option>
                                                        <option value="2" <?php if($order->status == 2){echo "selected"; }?>>Completed</option>
                                                        <option value="3" <?php if($order->status == 3){echo "selected"; }?>>Cancelled</option>
                                                    </select>
                                                </form>
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
