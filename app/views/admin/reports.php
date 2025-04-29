<?php require APPROOT . '/views/inc_admin/header.php'; 
$pageMod = New Page; ?>

				<!-- CONTAINER -->
				<div class="app-content">

				    <!-- PAGE-HEADER -->
					<div class="page-header">
						<h4 class="page-title">Reports</h4>
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
												<th scope="col">Report</th>
												<th scope="col">Start Date</th>
												<th scope="col">End Date</th>
                                                <th scope="col">Action</th>
											</tr>
										</thead>
									
										<tbody>
								
									
											<tr>
                                                <form action="<?php echo URLROOT; ?>/admin/report_margin" method="POST">
												<td><b>Margin Report</b></td>
                                                <td><input class="form-control" type="date" name="start_date" required></td>
                                                <td><input class="form-control" type="date" name="end_date" required></td>
                                                <td><button class="btn btn-sm btn-primary" type="submit">Generate</button> </td>
                                                </form>
											</tr>

                                            

											
									
											<tr>
                                                <form action="<?php echo URLROOT; ?>/admin/report_pending_payment" method="POST">
												<td><b>Payment Report</b></td>
                                                <td><input class="form-control" type="date" name="start_date" required></td>
                                                <td><input class="form-control" type="date" name="end_date" required></td>
                                                <td><button class="btn btn-sm btn-primary" type="submit">Generate</button> </td>
                                                </form>
											</tr>

											<tr>
                                                <form action="<?php echo URLROOT; ?>/admin/report_cod" method="POST">
												<td><b>COD Report</b></td>
												<td><input class="form-control" type="date" name="start_date" required></td>
                                                <td><input class="form-control" type="date" name="end_date" required></td>
                                                <td><button class="btn btn-sm btn-primary" type="submit">Generate</button> </td>
                                                </form>
											</tr>
											<tr>
                                                <form action="<?php echo URLROOT; ?>/admin/report_customer" method="POST">
												<td><b>Customer Report</b></td>
                                                <td></td>
                                                <td></td>
                                                <td><button class="btn btn-sm btn-primary" type="submit">Generate</button> </td>
                                                </form>
											</tr>

											<tr>
                                                <form action="<?php echo URLROOT; ?>/admin/report_ad" method="POST">
												<td><b>AD Report</b></td>
                                                <td></td>
                                                <td></td>
                                                <td><button class="btn btn-sm btn-primary" type="submit">Generate</button> </td>
                                                </form>
											</tr>

											<tr>
                                                <form action="<?php echo URLROOT; ?>/admin/report_customer_wallet" method="POST">
												<td><b>Customer Wallet Report</b></td>
                                                <td></td>
                                                <td></td>
                                                <td><button class="btn btn-sm btn-primary" type="submit">Generate</button> </td>
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