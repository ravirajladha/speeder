<?php require APPROOT . '/views/inc_admin/header.php'; 
$pageMod = New Page; ?>

				<!-- CONTAINER -->
				<div class="app-content">

				    <!-- PAGE-HEADER -->
					<div class="page-header">
						<h4 class="page-title">ADs</h4>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Md</a></li>
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
												
											</tr>
										</thead>
										<tbody>
										<?php foreach($data['ads'] as $ad_id): 
                                        $user = $pageMod->get_userinfo($ad_id); 
										$ad = $pageMod->get_ad($ad_id); 

                    
                                        ?>
                                            
											<tr>
												<td><?php echo $user->id; ?></td>
												<td><?php echo $user->name; ?></td>
												<td><?php echo $user->phone;?></td>
												<td><?php echo $user->email;?></td>
												<td><button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="
												<?php echo $ad->ad_pincodes;?> 
												">View</button>
												
											</tr>
										<?php  endforeach; ?>
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