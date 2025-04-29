<!doctype html>
<html lang="en" dir="ltr">
	<head>
		<!-- Meta data -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta content="" name="description">
		<meta content="" name="author">
		<meta name="keywords" content="" />

		<!--favicon -->

		<!-- TITLE -->
		<title>Speeder</title>

		<!-- DASHBOARD CSS -->
		<link href="<?php echo URLROOT; ?>/assets/css/style.css" rel="stylesheet"/>
		<link href="<?php echo URLROOT; ?>/assets/css/style-modes.css" rel="stylesheet"/>

		<!-- LEFT-MENU CSS -->
		<link href="<?php echo URLROOT; ?>/assets/css/sidemenu/sidemenu-toggle.css" rel="stylesheet">

		<!--C3.JS CHARTS PLUGIN -->
		<link href="<?php echo URLROOT; ?>/assets/plugins/charts-c3/c3-chart.css" rel="stylesheet"/>

		<!-- TABS CSS -->
		<link href="<?php echo URLROOT; ?>/assets/plugins/tabs/style-2.css" rel="stylesheet" type="text/css">

		<!-- PERFECT SCROLL BAR CSS-->
		<link href="<?php echo URLROOT; ?>/assets/plugins/pscrollbar/perfect-scrollbar.css" rel="stylesheet" />

		<!--- FONT-ICONS CSS -->
		<link href="<?php echo URLROOT; ?>/assets/css/icons.css" rel="stylesheet"/>

		<!-- Skin css-->
		<link href="<?php echo URLROOT; ?>/assets/skins/skins-modes/color1.css"  id="theme" rel="stylesheet" type="text/css" media="all" />

	</head>


	<body class="app sidebar-mini default-header">

<!-- GLOBAL-LOADER -->
<div id="global-loader">
	<img src="<?php echo URLROOT; ?>/assets/images/svgs/loader.svg" class="loader-img" alt="Loader">
</div>

<div class="page">
	<div class="page-main">
		<!-- HEADER -->
		<div class="header app-header">
			<div class="container-fluid">
				<div class="d-flex">
				   <a class="header-brand" href="index.html">
						<img src="<?php echo URLROOT; ?>/assets/logo.png" class="header-brand-img desktop-logo" alt="Speederlogo">
						<img src="<?php echo URLROOT; ?>/assets/logo.png" class="header-brand-img mobile-view-logo" alt="Speederlogo">
					</a><!-- LOGO -->
				
				</div>
			</div>
		</div>
		<!-- HEADER END -->


		<?php $order = $data['order']; 
if($order->order_type=="0"){
	$order_type="Prepaid";}
else if($order->order_type=="1"){
	$order_type="Pay at Pickup";}
else if($order->order_type=="2"){
	$order_type="Pay at Delivery";}
else if($order->order_type=="3"){
	$order_type="Cash on Delivery";}
else if($order->order_type=="9"){
	$order_type="Reverse";}

$pageMod = New Page;

if($order->booking_status == 0){
	$odstatus = "Placed";
}elseif($order->booking_status <= 3){
	$odstatus = "to be sent to Area Distributor - ".$order->from_ad_id;
}else if($order->booking_status <= 5){
	$odstatus = "to be sent to Source Master Distributor - ".$order->from_md_id;
}else if($order->booking_status <= 7){
	$odstatus = "to be sent to Source Regional Distributor - ".$order->from_md_id;
}else if($order->booking_status <= 9){
	$odstatus = "to be sent to Destination Regional Distributor - ".$order->to_md_id;
}else if($order->booking_status <= 11){
	$odstatus = "to be sent to Destination Master Distributor - ".$order->to_md_id;
}else if($order->booking_status <= 13){
	$odstatus = "to be sent to Destination Area Distributor - ".$order->to_ad_id;
}else if($order->booking_status == 99){
	$odstatus = "Cancelled";
}
?>
<style>
	h5{
		color:#00b894;
	}
</style>

				<!-- CONTAINER -->
				<div class="app-content" style="margin-left:0px">

				    <!-- PAGE-HEADER -->
					<div class="page-header">
						<h4 class="page-title">Order #<?php echo $order->booking_id." - ".$order_type; ?>
						
					<br>
					
						<h6 class="page-title" style="font-size:15px">Ordered at <?php echo date('M jS Y, h:m A', strtotime($order->booking_datetime)); ?></h6>
					</h4>
						
					</div>
					<!-- PAGE-HEADER END -->

			        <!-- ROW-1 OPEN -->
					<div class="row" id="user-profile">
						<div class="col-lg-12">
						
							<div class="card">
								<div class="card-body">
									<div class="border-0">
										<div class="tab-content">
											<div class="tab-pane active show" id="tab-51">
												<div id="profile-log-switch">

												<div class="media-heading">
											
														<h5 class="text-uppercase"><strong>Shipping Details</strong>
														
													</h5>
													</div>
													<hr class="m-0">
													<div class="table-responsive ">
														<table class="table row table-borderless">
															<tbody class="col-lg-12 col-xl-6 p-0">
																<tr>
																	<td><strong>Shipping Type:</strong> 
																	<?php 
																	    if($order->shipping_type==0){
																		echo "Standard";
																		}else if($order->shipping_type==1){
																			echo "Express";
																		}else if($order->shipping_type==2){
																			echo "Scheduled";
																		} 
																		?>
																</td>
																</tr>
																
																
																
															</tbody>
														
															<tbody class="col-lg-12 col-xl-6 p-0">
															    
							<?php if($order->order_from=="0"){ ?>									
							<tr>
																	<td><strong>Pickup:</strong> 
							<?php if($order->date_slot_pickup){echo date('M jS Y', strtotime($order->date_slot_pickup));} ?>
							<?php 
							    
							 if($order->time_slot_pickup != NULL){if($order->time_slot_pickup == 0){
								echo ", ( 10am - 1pm)";
								} else {echo ", ( 2pm - 4pm)";}}?>
																	
																</td>
																</tr>
																<tr>
																<td><strong>Delivery:</strong> 
							<?php if($order->date_slot_delivery){echo date('M jS Y', strtotime($order->date_slot_delivery));} ?> 
							<?php 

								if($order->time_slot_delivery){if($order->time_slot_delivery == 0){
									echo ", ( 10am - 1pm)";
									} else {echo ", ( 2pm - 4pm)";}
								}	
							?></td>
																</tr>
						   <?php } ?>
															</tbody>
														</table>
													</div>



													<div class="media-heading">
														<h5 class="text-uppercase"><strong>From Details</strong></h5>
													</div>
													<hr class="m-0">
													<div class="table-responsive ">
														<table class="table row table-borderless">
															<tbody class="col-lg-12 col-xl-6 p-0">
																<tr>
																	<td><strong>From Address :</strong> <?php echo $order->from_name.",<br>".$order->from_address.", ".$order->from_city.", ".$order->from_state.", ".$order->from_pincode."<br><i class='fa fa-phone'></i> ".$order->from_phone.""; ?></td>
																</tr>
															
															</tbody>
															<tbody class="col-lg-12 col-xl-6 p-0">
																
															<?php if($order->from_ad_id  == $_SESSION['rexkod_vendor_id'] && !$order->pickup_agent_id && $order->booking_status =="0"){ ?>
																<tr>
																	<td><strong>Pickup Agent :</strong> Not Assigned</td>
																</tr>
																<tr>
																<form action="<?php echo URLROOT; ?>/admin/update_pickup_agent/<?php echo $order->booking_id;?>" method="post">
																	<td>
																	<select class='form-control' name="pickup_agent">
													<?php foreach($data['deliveries'] as $delivery): ?>

                                                                <option value="<?php echo $delivery->id?>"><?php echo $delivery->name; ?></option>
													<?php endforeach; ?>
                                                                </select>

																	</td>
																	<td><button class="btn btn-sm btn-primary" type="submit"> Assign</button></td>
																</form>
																</tr>
															<?php }else if($order->pickup_agent_id && $order->order_status=="1"){?>
																<tr>
																	<td><strong><span style='color:#00b894;'>Pickup Agent : </span><?php
																	$agent  = $pageMod->get_userinfo($order->pickup_agent_id);
																	 echo $agent->name; ?></strong> (Assigned)</td>
																	<?php if($order->pickup_datetime){echo "<td><strong>Order Picket at<br>".date('M jS Y, h:m A', strtotime($order->pickup_datetime))." <strong></td>";} else {echo "<td><strong>Order Not Picked <strong></td>";} ?>
																</tr>
																<tr>
																	<td></td>
																	<?php if($order->from_hub_datetime){echo "<td><strong>Reached Source Hub at<br>".date('M jS Y, h:m A', strtotime($order->from_hub_datetime))." <strong></td>";}  ?>
																</tr>

																<tr>
																	<td></td>
																	<?php if(!$order->issue_type && $order->pickup_datetime && $order->booking_status==4){echo "<td><form method='POST' action='".URLROOT."/admin/issue_update/".$order->booking_id."'><select name='issue_type' class='form-control'><option value='1'>No Descrepency</option><option value='2'>Weight Issue</option><option value='3'>Non Transferable Goods</option></select><input class='form-control' placeholder='Enter Remark' name='issue_remark'><button type='submit' class='btn btn-sm btn-primary pull-right' >Update</button></form></td>";}  
																	else {
																		if($order->issue_type==1){$issue="No Descrepency";}
																		else if($order->issue_type==2){$issue="Weight Issue";}
																		else if($order->issue_type==3){$issue="Non Transferable Goods";}
																	    echo "<td>
																		<strong><span style='color:red;'>".$issue."</span><br><i>".$order->issue_remark." </i></strong><br>";

																		if($order->from_hub_datetime){
																		if($order->issue_type==1){
																		echo "<a href='".URLROOT."/admin/shipping_label/".$order->booking_id."' target='_BLANK'><button class='btn btn-sm btn-primary'>Print Label</button></a>";

																		if($order->booking_status==4){
																		echo "<br><a href='".URLROOT."/admin/order_update/".$order->booking_id."/5'><button style='margin-top:10px' class='btn btn-sm btn-primary'>Sent to Mother Hub</button></a>";
																		}
																		else if($order->booking_status==5){
																		echo "<br><br><strong>Package Sent to Mother Hub<strong>";
																		}  


																	    }
																     	}
																		echo "</td>";}  
																	?>
																</tr>
																
																<?php }else if($order->order_from){?>
																<tr>
																	<?php if($order->booking_status != 0){ ?>
																	<td><strong><span style='color:#00b894;'>Pickup Agent : </span><?php
																	$agent  = $pageMod->get_userinfo($order->pickup_agent_id);
																	 echo $agent->name; ?></strong> (Assigned)</td>
																	 <?php} else { ?>
																	<td><strong><span style='color:#00b894;'>Pickup Agent : </span></strong> Not Assigned</td>
																	 <?php } ?>

																	<?php if($order->pickup_datetime){echo "<td><strong>Order Picked at<br>".date('M jS Y, h:m A', strtotime($order->pickup_datetime))." <strong></td>";} else {echo "<td><strong>Order Not Picked <strong></td>";} ?>
																</tr>
																<tr>
																	<td></td>
																	<?php if($order->from_hub_datetime){echo "<td><strong>Reached Source Hub at<br>".date('M jS Y, h:m A', strtotime($order->from_hub_datetime))." <strong></td>";}  ?>
																</tr>

																<tr>
																	<td></td>
																	<?php if(!$order->issue_type && $order->pickup_datetime && $order->booking_status == 4){echo "<td><form method='POST' action='".URLROOT."/admin/issue_update/".$order->booking_id."'><select name='issue_type' class='form-control'><option value='1'>No Descrepency</option><option value='2'>Weight Issue</option><option value='3'>Non Transferable Goods</option></select><input class='form-control' placeholder='Enter Remark' name='issue_remark'><button type='submit' class='btn btn-sm btn-primary pull-right' >Update</button></form></td>";}  
																	else {
																		if($order->issue_type==1){$issue="No Descrepency";}
																		else if($order->issue_type==2){$issue="Weight Issue";}
																		else if($order->issue_type==3){$issue="Non Transferable Goods";}
																	    echo "<td>
																		<strong><span style='color:red;'>".$issue."</span><br><i>".$order->issue_remark." </i></strong><br>";

																		if($order->from_hub_datetime){
																		if($order->issue_type==1){
																		echo "<a href='".URLROOT."/admin/shipping_label/".$order->booking_id."' target='_BLANK'><button class='btn btn-sm btn-primary'>Print Label</button></a>";

																		if($order->booking_status<=4){
																		echo "<a href='".URLROOT."/admin/order_update/".$order->booking_id."/3'><button style='margin-top:10px' class='btn btn-sm btn-primary'>Sent to Mother Hub</button></a>";
																		}
																	    }
																     	}
																		echo "</td>";}  
																	?>
																</tr>

															

																

																
																
																<?php }?>

																<tr>
																	<td></td>
																	<td>
																	<?php 
																		if($order->booking_status==5 && $order->from_md_id==$_SESSION['rexkod_vendor_id']){
																		echo "<a href='".URLROOT."/admin/order_update/".$order->booking_id."/6'><button class='btn btn-sm btn-primary'>Package Recieved</button></a>";
																		} 
																		
																		if($order->from_mother_datetime){
																		echo "<strong>Reached Mother Hub at<br>".date('M jS Y, h:m A', strtotime($order->from_mother_datetime))." <strong>";
																		} 
																		if($order->booking_status==6){
																			echo "<a href='".URLROOT."/admin/order_update/".$order->booking_id."/7'><button style='margin-top:10px' class='btn btn-sm btn-primary'>Sent to Region Hub</button></a>";
																			}
																	?>
																	</td>
																</tr>
																

																<tr>
																	<td></td>
																	<td>
																	<?php 
																		if($order->booking_status==7 && $order->from_rd_id==$_SESSION['rexkod_vendor_id']){
																		echo "<a href='".URLROOT."/admin/order_update/".$order->booking_id."/8'><button class='btn btn-sm btn-primary'>Package Recieved</button></a>";
																		} 
																		
																		if($order->from_region_datetime){
																		echo "<strong>Reached Region Hub at<br>".date('M jS Y, h:m A', strtotime($order->from_region_datetime))." <strong>";
																		} 
																	?>
																	</td>
																</tr>


																


															</tbody>
														</table>
													</div>
													
													

													<div class="media-heading mt-3">
														<h5 class="text-uppercase"><strong>Package Details</strong></h5>
													</div>
													<hr class="m-0">
													<div class="table-responsive ">
														<table class="table row table-borderless">
															<tbody class="col-lg-12 col-xl-6 p-0">
																<tr>
																	<td><strong>Item Name:</strong> <?php echo $order->item_name; ?></td>
																</tr>
																<tr>
																	<td><strong>Item Qty:</strong> <?php echo $order->item_qty; ?></td>
																</tr>
																
																
															</tbody>
														
															<tbody class="col-lg-12 col-xl-6 p-0">
															    
																<tr>
																	<td><strong>Weight:</strong> <?php echo $order->item_weight; ?> Gms, <strong>LxBxH:</strong> <?php echo $order->item_length." x ".$order->item_breadth." x ".$order->item_height; ?></td>
																</tr>
																<tr>
																	<td><strong>Package Needed:</strong> <?php if($order->need_package == 0){echo 
																	"No";}else{echo "Yes";} ?></td>
																</tr>
															</tbody>
														</table>
													</div>


													<div class="media-heading mt-3">
														<h5 class="text-uppercase"><strong>POD Details</strong></h5>
													</div>
													<hr class="m-0">
													<div class="table-responsive ">
														<table class="table row table-borderless">
															<?php if($order->pod_number){ ?>
															<tbody class="col-lg-12 col-xl-4 p-0">
																<tr>
																	<td><strong>Number:</strong> <?php echo $order->pod_number; ?></td>
																</tr>
																<tr>
																	<td><strong>Transport Type :</strong> <?php echo $order->pod_transport_type; ?></td>
																</tr>
															</tbody>
															<tbody class="col-lg-12 col-xl-4 p-0">
																<tr>
																	<td><strong>Vehicle :</strong> <?php echo $order->pod_vehicle_name.", ".$order->pod_vehicle_number; ?></td>
																</tr>
																<tr>
																	<td><strong>Booking Time:</strong> <?php echo $order->pod_booking_time; ?></td>
																</tr>
															</tbody>
															<tbody class="col-lg-12 col-xl-4 p-0">
																<tr>
																	<td><strong>Contact Number :</strong> <?php echo $order->pod_contact_number; ?></td>
																</tr>
																<tr>
																<td><a target='_BLANK' href='<?php echo URLROOT; ?>/uploads/<?php echo $order->pod_slip; ?>' ><button class='btn btn-sm btn-default'>View POD Slip</button></a></td>
																</tr>
															</tbody>

															<tbody class="col-lg-12 col-xl-4 p-0">
																<tr>
																	<td>
																	<?php 
																		if($order->booking_status==8 && $order->from_rd_id==$_SESSION['rexkod_vendor_id']){
																		echo "<a href='".URLROOT."/admin/order_update/".$order->booking_id."/9'><button class='btn btn-sm btn-primary'>Package Sent to Destination Region Hub</button></a>";
																		} 
																	?>
																	</td>
																</tr>
															</tbody>



															<?php } else if($order->from_rd_id == $_SESSION['rexkod_vendor_id'] && $order->from_region_datetime){ ?>
												<form action="<?php echo URLROOT; ?>/admin/update_pod/<?php echo $order->booking_id; ?>" method="post" autocomplete="off" enctype="multipart/form-data">
																<tbody class="col-lg-12 col-xl-4 p-0">
																<tr>
																	<td>
																	<div class="form-group">
												<label for="exampleInputname">POD Number</label>
												<input type="number" class="form-control" placeholder="Enter pod Number" name="pod_number">
										                        	</div>
																	</td>
																</tr>
																<tr>
																	<td>
																	<div class="form-group">
												<label for="exampleInputname">Transport Type</label>
												<select class="form-control" name="pod_transport_type">
													<option value="Air">Air</option>
													<option value="Bus">Bus</option>
													<option value="Train">Train</option>
															</select>
										                        	</div>
																	</td>
																</tr>
															</tbody>
															<tbody class="col-lg-12 col-xl-4 p-0">
																<tr>
																<td>
																	<div class="form-group">
												<label for="exampleInputname">Vehicle Name</label>
												<input type="text" class="form-control" placeholder="Enter Vehicle Name" name="pod_vehicle_name">
										                        	</div>
																	</td>
																</tr>
																<tr>
																<td>
																	<div class="form-group">
												<label for="exampleInputname">Booking Time</label>
												<input type="time" class="form-control" placeholder="Enter pod Number" name="pod_booking_time">
										                        	</div>
																	</td>
																</tr>
															</tbody>
															<tbody class="col-lg-12 col-xl-4 p-0">
																<tr>
																<td>
																	<div class="form-group">
												<label for="exampleInputname">Vehicle Number</label>
												<input type="text" class="form-control" placeholder="Enter Vehicle Number" name="pod_vehicle_number">
										                        	</div>
																	</td>
																</tr>
																<tr>
																<td>
																	<div class="form-group">
												<label for="exampleInputname">Contact Number</label>
												<input type="number" class="form-control" placeholder="Enter Contact Number" name="pod_contact_number">
										                        	</div>
																	</td>
																</tr>
																
															</tbody>
															<tbody class="col-lg-12 col-xl-4 p-0">
																<tr>
																<td>
																	<div class="form-group">
												<label for="exampleInputname">Upload POD Slip</label>
												<input type="file" class="form-control" name="pod_slip">
										                        	</div>
																	</td>
																	<td>
															</td>
																</tr>
															
																
															</tbody>
															<tbody class="col-lg-12 col-xl-4 p-0">
																<tr>
																<td>
																
																	</td>
																	<td>
															</td>
																</tr>
															
																
															</tbody>
															<tbody class="col-lg-12 col-xl-4 p-0">
																<tr>
																<td>
																
																	</td>
																	<td><button type="input" class="btn btn-primary" style='margin-top:20px;' name="name">Update POD</button>
															</td>
																</tr>
															
																
															</tbody>
												</form>
															<?php } else { ?>
																<tbody class="col-lg-12 col-xl-4 p-0">
																<tr>
																	<td><strong>Not Applicable</strong></td>
																</tr>
																
															</tbody>
															<?php } ?>
														</table>
													</div>

													<div class="media-heading mt-3">
														<h5 class="text-uppercase"><strong>To Details</strong></h5>
													</div>
													<hr class="m-0">
													<div class="table-responsive ">
														<table class="table row table-borderless">
														<tbody class="col-lg-12 col-xl-4 p-0">
																<tr>
																	<td><strong>To Address :</strong> <?php echo $order->to_name.",<br>".$order->to_address.", ".$order->to_city.", ".$order->to_state.", ".$order->to_pincode."<br><i class='fa fa-phone'></i> ".$order->to_phone.""; ?></td>
																</tr>
															
															</tbody>
															
															<?php if($order->pod_number){ ?>
															<tbody class="col-lg-12 col-xl-4 p-0"></tbody>
															<tbody class="col-lg-12 col-xl-4 p-0">
															
															<tr>
																<td></td>
																<td>
																<?php 
																		if($order->booking_status==9){
																		
																		if($order->to_rd_id==$_SESSION['rexkod_vendor_id']){
																		echo "<a href='".URLROOT."/admin/order_update/".$order->booking_id."/10'><button class='btn btn-sm btn-primary'>Package Recieved</button></a>";
																		} }
																		
																		if($order->to_region_datetime){
																		echo "<strong>Reached Destination Region Hub at<br>".date('M jS Y, h:m A', strtotime($order->to_region_datetime))." <strong>";
																		} 
																	?><br><br>
																	<?php 
																		if($order->booking_status==10){
																		if($order->to_rd_id==$_SESSION['rexkod_vendor_id']){
																		echo "<a href='".URLROOT."/admin/order_update/".$order->booking_id."/11'><button class='btn btn-sm btn-primary'>Sent to Destination Mother Hub</button></a>";
																		} }
																		
																	?>
																	<br>

																	<?php 
																		if($order->booking_status==11){
																		
																		if($order->to_md_id==$_SESSION['rexkod_vendor_id']){
																		echo "<a href='".URLROOT."/admin/order_update/".$order->booking_id."/12'><button class='btn btn-sm btn-primary'>Package Recieved</button></a>";
																		} }
																		
																		if($order->to_mother_datetime){
																		echo "<strong>Reached Destination Mother Hub at<br>".date('M jS Y, h:m A', strtotime($order->to_mother_datetime))." <strong>";
																		} 
																	?>
																</td>
															</tr>
															
															<tr>
																<td>
																</td>
																<td>
																<?php 
																		if($order->booking_status==12){
																		if($order->to_md_id==$_SESSION['rexkod_vendor_id']){
																		echo "<a href='".URLROOT."/admin/order_update/".$order->booking_id."/13'><button class='btn btn-sm btn-primary'>Sent to Destination Hub</button></a>";
																		} }
																	
																	?>
																</td>
															</tr>
															<tr>
																	<td></td>
																	<?php if($order->to_hub_datetime){echo "<td><strong>Reached Destination Hub at<br>".date('M jS Y, h:m A', strtotime($order->to_hub_datetime))." <strong></td>";}  ?>
															</tr>
															
															<?php if($order->booking_status==13 &&$order->to_ad_id  == $_SESSION['rexkod_vendor_id'] && !$order->to_hub_datetime){ 
																?>
																	<tr>
																	<td></td>
																	<td><a href="<?php echo URLROOT; ?>/admin/order_update/<?php echo $order->booking_id; ?>/14"><button class="btn btn-primary"> Package Recieved</button></a></td>
																	</tr>
																	
																<?php } else if($order->to_ad_id  == $_SESSION['rexkod_vendor_id'] && !$order->delivery_agent_id && $order->to_hub_datetime){ ?>
																	<tr>	<td></td>
																		<td><strong>Delivery Agent :</strong> Not Assigned</td>
																	</tr>
																	<tr>
																	<td></td>
																	<form action="<?php echo URLROOT; ?>/admin/update_delivery_agent/<?php echo $order->booking_id;?>" method="post">
																		<td>
																		<select class='form-control' name="delivery_agent">
														<?php foreach($data['deliveries'] as $delivery): ?>
																	<option value="<?php echo $delivery->id?>"><?php echo $delivery->name; ?></option>
														<?php endforeach; ?>
																	</select>
	
																		</td>
																		<td><button class="btn btn-sm btn-primary" type="submit"> Assign</button></td>
																	</form>
																	</tr>
																	
																	<tr>
																<?php }else if($order->delivery_agent_id) {?>
																	<tr>
															<td></td>
																	<td><strong><span style='color:#00b894;'>Delivery Agent : </span><?php
																	$agent  = $pageMod->get_userinfo($order->delivery_agent_id);
																	 echo $agent->name; ?></strong> (Assigned)</td>
																	 <td>
																	
																</td>
																    </tr>
																	<tr>
																		<td>
																		<?php if($order->delivery_datetime){
																			
																			echo "<td><strong>Order Delivered at<br>".date('M jS Y, h:m A', strtotime($order->delivery_datetime))." <strong>";
																		} else if($order->booking_status == 15){ echo "<td><strong>Order Out for Delivery </strong>";}else{ echo "<td><strong>Order Not Delivered </strong>";
																			} 
														    echo "<br>Delivery Attempts: "; 
															if($order->delivery_attempt_3)
															{ 
																if($order->booking_status == 15){echo "3<br><strong>RTO Created</strong>";}
																else {echo "3<br><a href='".URLROOT."/admin/create_rto/".$order->booking_id."'><button class='btn btn-sm btn-primary'>Create RTO</button></a>";}
															}else if($order->delivery_attempt_2){echo "2";}
															else if($order->delivery_attempt_1){echo "1";}
															else {echo "0";}echo "</td>"
																		?>
															     	</td>
																	</tr>
																	<?php }?>
																</tbody>
																<?php } ?>
														</table>
													</div>

													<div class="media-heading mt-3">
														<h5 class="text-uppercase"><strong>Delivery Details</strong></h5>
													</div>
													<hr class="m-0">
													<div class="table-responsive ">
														<table class="table row table-borderless">
														<tbody class="col-lg-12 col-xl-12 p-0">
																<tr>
																    <td style='min-width:250px'><strong>Delivery Attempts:</strong> <br><br><ol style="margin-left:0px">
																	<?php 
																	if($order->delivery_attempt_1){echo "<li> ".$order->delivery_attempt_1."</li>"; }
																	if($order->delivery_attempt_2){echo "<li> ".$order->delivery_attempt_2."</li>"; }
																	if($order->delivery_attempt_3){echo "<li> ".$order->delivery_attempt_3."</li>"; }
																	?></ol>
																	</td>
																	
																	<td style='min-width:250px'><strong>Delivery Remarks :</strong> <br>
																	<?php 
																	if($order->delivery_remark_1){echo "<br>1. ".$order->delivery_remark_1; }
																	if($order->delivery_remark_2){echo "<br>2. ".$order->delivery_remark_2; }
																	if($order->delivery_remark_3){echo "<br>3. ".$order->delivery_remark_3; }
																	?>
																	</td>

																	<td style='min-width:250px'><strong>Sender Remarks :</strong> <br>
																	<?php 
																	if($order->from_remark_1){echo "<br>1. ".$order->from_remark_1; }
																	if($order->from_remark_2){echo "<br>2. ".$order->from_remark_2; }
																	if($order->from_remark_3){echo "<br>3. ".$order->from_remark_3; }
																	?>
																	</td>

																	<td style='min-width:250px'><strong>Reciever Remarks :</strong> <br>
																	<?php 
																	if($order->to_remark_1){echo "<br>1. ".$order->reciever_remark_1; }
																	if($order->to_remark_2){echo "<br>2. ".$order->reciever_remark_2;} 
																	if($order->to_remark_3){echo "<br>3. ".$order->reciever_remark_3; }
																	?>
																	</td>
																</tr>
															
															</tbody>
															
														</table>
													</div>
												
												</div>
											</div>
											
										</div>
									</div>
								</div>
							</div>
						</div><!-- COL-END -->
					</div>
					<!-- ROW-1 CLOSED -->
				</div>
				<!-- CONTAINER CLOSED -->
			</div>

		
			<!-- SIDE-BAR CLOSED -->

		
			<!-- SIDE-BAR CLOSED -->

				<!-- FOOTER -->
	
			<!-- FOOTER END -->
		</div>

		<!-- BACK-TO-TOP -->
		<a href="#top" id="back-to-top"><i class="fa fa-long-arrow-up"></i></a>

		<!-- JQUERY SCRIPTS -->
		<script src="<?php echo URLROOT; ?>/assets/js/vendors/jquery-3.2.1.min.js"></script>

		<!-- BOOTSTRAP SCRIPTS -->
		<script src="<?php echo URLROOT; ?>/assets/js/vendors/bootstrap.bundle.min.js"></script>

		<!-- SPARKLINE -->
		<script src="<?php echo URLROOT; ?>/assets/js/vendors/jquery.sparkline.min.js"></script>

		<!-- CHART-CIRCLE -->
		<script src="<?php echo URLROOT; ?>/assets/js/vendors/circle-progress.min.js"></script>

		<!-- RATING STAR -->
		<script src="<?php echo URLROOT; ?>/assets/plugins/rating/jquery.rating-stars.js"></script>

		<!-- SELECT2 JS -->
		<script src="<?php echo URLROOT; ?>/assets/plugins/select2/select2.full.min.js"></script>
		<script src="<?php echo URLROOT; ?>/assets/js/select2.js"></script>

		<!-- CHARTJS CHART -->
		<script src="<?php echo URLROOT; ?>/assets/plugins/chart/Chart.bundle.js"></script>
		<script src="<?php echo URLROOT; ?>/assets/plugins/chart/utils.js"></script>

		<!-- PIETY CHART -->
		<script src="<?php echo URLROOT; ?>/assets/plugins/peitychart/jquery.peity.min.js"></script>
		<script src="<?php echo URLROOT; ?>/assets/plugins/peitychart/peitychart.init.js"></script>

		<!-- LEFT-MENU -->
		<script src="<?php echo URLROOT; ?>/assets/plugins/sidemenu-toggle/sidemenu-toggle.js"></script>

		<!-- PERFECT SCROLL BAR JS-->
		<script src="<?php echo URLROOT; ?>/assets/plugins/pscrollbar/perfect-scrollbar.js"></script>
		<script src="<?php echo URLROOT; ?>/assets/plugins/pscrollbar/pscroll-leftmenu.js"></script>

		<!-- SIDEBAR JS -->
		<script src="<?php echo URLROOT; ?>/assets/plugins/sidebar/sidebar.js"></script>

		<!-- APEX-CHARTS JS -->
		<script src="<?php echo URLROOT; ?>/assets/plugins/apexcharts/apexcharts.js"></script>
		<script src="<?php echo URLROOT; ?>/assets/plugins/apexcharts/irregular-data-series.js"></script>

		<!-- INDEX-SCRIPTS  -->
		<script src="<?php echo URLROOT; ?>/assets/js/index.js"></script>

		<!-- CUSTOM JS -->
		<script src="<?php echo URLROOT; ?>/assets/js/custom.js"></script>

	</body>
</html>

