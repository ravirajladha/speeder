<?php require APPROOT . '/views/inc_admin/header.php'; ?>

				<!-- CONTAINER -->
				<div class="app-content">

				    <!-- PAGE-HEADER -->
					<div class="page-header">
						<h4 class="page-title">Delivery Agents</h4>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Pages</a></li>
							<li class="breadcrumb-item active" aria-current="page">Delivery Agents</li>
						</ol>
					</div>
					<!-- PAGE-HEADER END -->

					

					<!-- ROW-2 OPEN -->
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header ">
									<h3 class="card-title ">Delivery Agents</h3>
									<div class="card-options">
										<a href="<?php echo URLROOT; ?>/admin/add_delivery"><button id="add__new__list" type="button" class="btn btn-md btn-primary " data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-plus"></i> Add a Delivery Agent</button></a>
									</div>
								</div>
								<div class="table-responsive">
									<table class="table table-hover card-table table-striped table-vcenter table-outline text-nowrap">
										<thead>
									
											<tr>
												<th scope="col">ID</th>
												<th scope="col">AD Name</th>
												<th scope="col">AD Phone</th>
												<th scope="col">AD Email</th>
												<th scope="col">Action </th>
											</tr>
										</thead>
										<tbody>
										<?php foreach($data['deliveries'] as $deliver): ?>
											<tr>
												<td><?php echo $deliver->id; ?></td>
												<td><?php echo $deliver->name; ?></td>
												<td><?php echo $deliver->phone;?></td>
												<td><?php echo $deliver->email;?></td>
												
												<td>
													<a class="btn btn-sm btn-primary" href="#"><i class="fa fa-edit"></i> Edit</a>
												
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