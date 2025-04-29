<?php require APPROOT . '/views/inc_admin/header.php'; 
$pageMod = New Page; ?>

				<!-- CONTAINER -->
				<div class="app-content">

				    <!-- PAGE-HEADER -->
					<div class="page-header">
						<h4 class="page-title">Feedbacks</h4>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Feedbacks</li>
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
												<th scope="col">Order ID</th>
												<th scope="col">User Remark</th>
												<th scope="col" style="width:200px">Admin Remark</th>
												<th scope="col">Status</th>
											</tr>
										</thead>
										<tbody>
										<?php foreach($data['feedbacks'] as $feedback): ?>
											<tr>
												<td><?php echo $feedback->id; ?></td>
												<td><?php echo $feedback->order_id; ?></td>
												<td><?php echo $feedback->user_remark;?></td>
												
												<td>
													<form action="<?php echo URLROOT; ?>/admin/update_admin_remark/<?php echo $feedback->id; ?>" method="post">
													<select class='form-control' name="admin_remark" oninput="this.form.submit()" style="font-size:12px;max-width:200px;">

													<option value="Feedback Submitted" <?php if($feedback->admin_remark=="Feedback Submitted"){echo "selected";} ?> >FEEDBACK SUBMITTED</option>

													<option value="REFUND ISSUED" <?php if($feedback->admin_remark=="REFUND ISSUED"){echo "selected";} ?> >REFUND ISSUED</option>

													<option value="CREDITS ADDED" <?php if($feedback->admin_remark=="CREDITS ADDED"){echo "selected";} ?> >CREDITS ADDED</option>

													<option value="ESCALATED TO PRIORITY TEAM" <?php if($feedback->admin_remark=="ESCALATED TO PRIORITY TEAM"){echo "selected";} ?> >ESCALATED TO PRIORITY TEAM</option>

													<option value="COMPLAINT RAISED" <?php if($feedback->admin_remark=="COMPLAINT RAISED"){echo "selected";} ?> >COMPLAINT RAISED</option>

													<option value="COMPLAINT SOLVED" <?php if($feedback->admin_remark=="COMPLAINT SOLVED"){echo "selected";} ?> >COMPLAINT SOLVED</option>

										        	</form>
													</td>
													<td>
													<form action="<?php echo URLROOT; ?>/admin/update_feedback_status/<?php echo $feedback->id; ?>" method="post">
													<select class='form-control' name="feedback_status" style="font-size:12px;max-width:150px;">
													<option value="0" <?php if($feedback->status==0){echo "selected";} ?> >Open</option>
													<option value="1" <?php if($feedback->status==1){echo "selected";} ?> >Closed</option>
													</select>

										        	</form>
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