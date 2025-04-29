<?php require APPROOT . '/views/inc_admin/header.php'; 
$pageMod = New Page; ?>

				<!-- CONTAINER -->
				<div class="app-content">

				    <!-- PAGE-HEADER -->
					<div class="page-header">
						<h4 class="page-title">Transactions</h4>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Transactions</li>
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
												<th scope="col">Customer</th>
												<th scope="col">Payment ID</th>
												<th scope="col">Payment Amount</th>
												<th scope="col">Payment Date</th>
											</tr>
										</thead>
										<tbody>
										<?php 
										$curModel = New Page; 
										foreach($data['transactions'] as $transaction):
										$curcust  = $curModel->get_userinfo($transaction->user_id);?>
											<tr>
												<td><?php echo $transaction->id; ?></td>
												<td><?php echo $curcust->name; ?><br><?php echo $curcust->phone; ?></td>
												<td><?php echo $transaction->transaction_id; ?></td>
												<td> <i class='fa fa-inr'></i> <?php echo $transaction->amount;?></td>
												<td><?php echo date('M jS Y, h:m A', strtotime($transaction->datetime)); ?></td>
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