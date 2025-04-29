<?php require APPROOT . '/views/inc_admin/header.php'; 
$pageMod = New Page; ?>

				<!-- CONTAINER -->
				<div class="app-content">

				    <!-- PAGE-HEADER -->
					<div class="page-header">
						<h4 class="page-title">Customers</h4>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Customers</li>
						</ol>
					</div>
					<!-- PAGE-HEADER END -->

					

					<!-- ROW-2 OPEN -->
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header ">
									<h3 class="card-title ">Customers</h3>
								</div>
								<div class="table-responsive">
									<table class="table table-hover card-table table-striped table-vcenter table-outline text-nowrap">
										<thead>
									
											<tr>
												<th scope="col">ID</th>
												<th scope="col">Name</th>
												<th scope="col">Phone</th>
												<th scope="col">Email</th>
												<th scope="col">Pincode</th>
												<th scope="col">Action</th>

												
											</tr>
										</thead>
										<tbody>
										<?php foreach($data['customers'] as $customer): ?>
											<tr>
												<td><?php echo $customer->id; ?></td>
												<td><?php echo $customer->name; ?></td>
												<td><?php echo $customer->phone;?></td>
												<td><?php echo $customer->email;?></td>	
												<td><?php echo $customer->pincode;?></td>	
												<td>
												<a class="btn btn-sm btn-primary" href="<?php echo URLROOT; ?>/admin/add_money_customer/<?php echo $customer->id; ?>"><i class="fa fa-edit"></i> Add Money</a>
												</td>	
											</tr>
										<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!-- ROW-2 CLOSED -->

				</div>
				<!--CONTAINER CLOSED -->
			</div>

	

			<?php require APPROOT . '/views/inc_admin/footer.php'; ?>