<?php require APPROOT . '/views/inc_admin/header.php'; 
$pageMod = New Page; ?>

				<!-- CONTAINER -->
				<div class="app-content">

				    <!-- PAGE-HEADER -->
					<div class="page-header">
						<h4 class="page-title">Wallet Update</h4>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Wallet Update</li>
						</ol>
					</div>
					<!-- PAGE-HEADER END -->

					

					<!-- ROW-2 OPEN -->
					<div class="row">
						<div class="col-12">
							<div class="card">
							
								<div class="table-responsive">
									<table class="table table-hover card-table table-striped table-vcenter table-outline text-nowrap">
										<thead>
									
											<tr>
												<th scope="col">ID</th>
												<th scope="col">User</th>
												<th scope="col">Wallet Balance</th>
												<th scope="col" style="width:200px">Add/Minus Money</th>
												<th scope="col">Action</th>
											</tr>
										</thead>
										<tbody>
										
											<tr>
												<td><?php echo $data['user']->id; ?></td>
												<td><?php echo $data['user']->name; ?></td>
												<td><i class='fa fa-inr'></i><?php echo $data['wallet']->balance_amount;?></td>
												<form action="<?php echo URLROOT; ?>/admin/add_money_admin_vendor/<?php echo $data['user']->id; ?>" method="POST">
												<td><input type="text" class='form-control' name='amount' placeholder='Enter Amount' required></td>
												<td><button class='btn btn-primary brn-sm'>Send</button></td>
												</form>
												
												
											</tr>
									
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