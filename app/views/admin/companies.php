<?php require APPROOT . '/views/inc_admin/header.php'; 
$pageMod = New Page; ?>

				<!-- CONTAINER -->
				<div class="app-content">

				    <!-- PAGE-HECompanyER -->
					<div class="page-header">
						<h4 class="page-title">Companies</h4>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Pages</a></li>
							<li class="breadcrumb-item active" aria-current="page">Companies</li>
						</ol>
					</div>
					<!-- PAGE-HECompanyER END -->

					

					<!-- ROW-2 OPEN -->
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header ">
									<h3 class="card-title ">Companies</h3>
									<div class="card-options">
										<a href="<?php echo URLROOT; ?>/admin/add_company"><button id="add__new__list" type="button" class="btn btn-md btn-primary " data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-plus"></i> Add a Company</button></a>
									</div>
								</div>
								<div class="table-responsive">
									<table class="table table-hover card-table table-striped table-vcenter table-outline text-nowrap">
										<thead>
									
											<tr>
												<th scope="col">ID</th>
												<th scope="col">Company Name</th>
												<th scope="col">Company Phone</th>
												<th scope="col">Company Email</th>
												
												<th scope="col" style="width:5%">Action </th>
											</tr>
										</thead>
										<tbody>
										<?php foreach($data['companies'] as $company): ?>
											<tr>
												<td><?php echo $company->id; ?></td>
												<td><?php echo $company->name; ?></td>
												<td><?php echo $company->phone;?></td>
												<td><?php echo $company->email;?></td>
											
												<td>
													<a class="btn btn-sm btn-primary" href="<?php echo URLROOT; ?>/admin/edit_company/<?php echo $company->id; ?>"><i class="fa fa-edit"></i> Edit</a>
													<a class="btn btn-sm btn-default" href="<?php echo URLROOT; ?>/admin/add_money_vendor/<?php echo $company->id; ?>"><i class="fa fa-edit"></i> Wallet</a>
												
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