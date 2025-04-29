<?php require APPROOT . '/views/inc_admin/header.php'; 
$pageMod = New Page; ?>

				<!-- CONTAINER -->
				<div class="app-content">

				    <!-- PAGE-HEADER -->
					<div class="page-header">
						<h4 class="page-title">ADs</h4>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Pages</a></li>
							<li class="breadcrumb-item active" aria-current="page">ADs</li>
						</ol>
					</div>
					<!-- PAGE-HEADER END -->

					

					<!-- ROW-2 OPEN -->
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header ">
									<h3 class="card-title ">ADs</h3>
									<div class="card-options">
										<a href="<?php echo URLROOT; ?>/admin/add_ad"><button id="add__new__list" type="button" class="btn btn-md btn-primary " data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-plus"></i> Add an AD</button></a>
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
												<th scope="col" style="width:10%;">Pincodes</th>
												<th scope="col" style="width:5%">Action </th>
											</tr>
										</thead>
										<tbody>
										<?php foreach($data['ads'] as $ad): ?>
											<tr>
												<td><?php echo $ad->id; ?></td>
												<td><?php echo $ad->name; ?></td>
												<td><?php echo $ad->phone;?></td>
												<td><?php echo $ad->email;?></td>
												<td><button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="
												<?php $curad  = $pageMod->get_ad_pincodes($ad->id); echo $curad->ad_pincodes;?> 
												">View</button>
												<td>
													<a class="btn btn-sm btn-primary" href="<?php echo URLROOT; ?>/admin/edit_ad/<?php echo $ad->id; ?>"><i class="fa fa-edit"></i> Edit</a>
													<a class="btn btn-sm btn-default" href="<?php echo URLROOT; ?>/admin/add_money_vendor/<?php echo $ad->id; ?>"><i class="fa fa-edit"></i> Wallet</a>
												
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