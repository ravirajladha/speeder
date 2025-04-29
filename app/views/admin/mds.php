<?php require APPROOT . '/views/inc_admin/header.php'; 
$pageMod = New Page; ?>

				<!-- CONTAINER -->
				<div class="app-content">

				    <!-- PAGE-HEADER -->
					<div class="page-header">
						<h4 class="page-title">MDs</h4>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">MDs</li>
						</ol>
					</div>
					<!-- PAGE-HEADER END -->

					

					<!-- ROW-2 OPEN -->
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header ">
									<h3 class="card-title ">MDs</h3>
									<div class="card-options">
										<a href="<?php echo URLROOT; ?>/admin/add_md"><button id="add__new__list" type="button" class="btn btn-md btn-primary " data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-plus"></i> Add an MD</button></a>
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
												<th scope="col">City</th>
												<th scope="col" style="width:10%">Action </th>
											</tr>
										</thead>
										<tbody>
										<?php foreach($data['mds'] as $md): 
											$curmd = $pageMod->get_md($md->id);
										?>
											<tr>
												<td><?php echo $md->id; ?></td>
												<td><?php echo $md->name; ?></td>
												<td><?php echo $md->phone;?></td>
												<td><?php echo $md->email;?></td>
												
												<td><?php echo $curmd->md_city;?></td>
												<td>
													<a class="btn btn-sm btn-primary" href="<?php echo URLROOT; ?>/admin/edit_md/<?php echo $md->id; ?>"><i class="fa fa-edit"></i> Edit</a>
													
													<a class="btn btn-sm <?php if($curmd->express == 1){echo "btn-primary";} else{echo "btn-warning";} ?>" href="<?php echo URLROOT; ?>/admin/md_express_update/<?php echo $md->id; ?>/<?php if($curmd->express=="1"){echo "0";}else{echo "1";} ?>">Express</a>

													<a class="btn btn-sm btn-default" href="<?php echo URLROOT; ?>/admin/add_money_vendor/<?php echo $md->id; ?>"><i class="fa fa-edit"></i> Wallet</a>
													
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