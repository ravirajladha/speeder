<?php require APPROOT . '/views/inc_admin/header.php'; 
$pageMod = New Page; ?>

				<!-- CONTAINER -->
				<div class="app-content">

				    <!-- PAGE-HEADER -->
					<div class="page-header">
						<h4 class="page-title">MDs</h4>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">RD</a></li>
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
                                                <th scope="col">MD City</th>
												
											</tr>
										</thead>
										<tbody>
										<?php foreach($data['mds'] as $md_id): 
                                        $user = $pageMod->get_userinfo($md_id); 
										$md = $pageMod->get_md($md_id); 

                    
                                        ?>
                                            
											<tr>
												<td><?php echo $user->id; ?></td>
												<td><?php echo $user->name; ?></td>
												<td><?php echo $user->phone;?></td>
												<td><?php echo $user->email;?></td>
                                                <td><?php echo $md->md_city;?></td>
												
												
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