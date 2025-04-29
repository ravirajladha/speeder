<?php require APPROOT . '/views/inc_admin/header.php'; 
$pageMod = New Page; ?>

				<!-- CONTAINER -->
				<div class="app-content">

				    <!-- PAGE-HEADER -->
					<div class="page-header">
						<h4 class="page-title">RDs</h4>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">RDs</li>
						</ol>
					</div>
					<!-- PAGE-HEADER END -->

					

					<!-- ROW-2 OPEN -->
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header ">
									<h3 class="card-title ">RDs</h3>
									<div class="card-options">
										<a href="<?php echo URLROOT; ?>/admin/add_rd"><button id="add__new__list" type="button" class="btn btn-md btn-primary " data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-plus"></i> Add an RD</button></a>
									</div>
								</div>
								<div class="table-responsive">
									<table class="table table-hover card-table table-striped table-vcenter table-outline text-nowrap">
										<thead>
									
											<tr>
												<th scope="col">ID</th>
												<th scope="col">MD Name</th>
												<th scope="col">MD Phone</th>
												<th scope="col">MD Email</th>
												<th scope="col">Assigned MDs</th>
												<th scope="col" style="width:5%">Action </th>
											</tr>
										</thead>
										<tbody>
										<?php foreach($data['rds'] as $rd): ?>
											<tr>
												<td><?php echo $rd->id; ?></td>
												<td><?php echo $rd->name; ?></td>
												<td><?php echo $rd->phone;?></td>
												<td><?php echo $rd->email;?></td>
												<td>
												<?php $currd  = $pageMod->get_rd_detail($rd->id); ?>
												<?php 
												$mds = explode(',', $currd->mds);
												$curModel = New Page;
												foreach($mds as $md){
													$md = (int)$md;
													$cur_md = $curModel->get_userinfo($md);
													echo $cur_md->name.", ";
												}
												?>
													
												</td>
												
												<td>
													<a class="btn btn-sm btn-primary" href="<?php echo URLROOT; ?>/admin/edit_rd/<?php echo $rd->id; ?>"><i class="fa fa-edit"></i> Edit</a>
													<a class="btn btn-sm btn-default" href="<?php echo URLROOT; ?>/admin/add_money_vendor/<?php echo $rd->id; ?>"><i class="fa fa-edit"></i> Wallet</a>
												
													
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