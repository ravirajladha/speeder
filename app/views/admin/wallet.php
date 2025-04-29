<?php require APPROOT . '/views/inc_admin/header.php'; 
$pageMod = New Page; ?>

				<!-- CONTAINER -->
				<div class="app-content">

				 
					


<style>
   
	.portfolio{
		padding:2%;
		text-align:center;
	}
	
	.heading img{
		width: 10%;
	}
	.bio-info{
		padding: 5%;
		background:#fff;
		box-shadow: 0px 0px 4px 0px #b0b3b7;
	}
	.name{
		font-family: 'Charmonman', cursive;
		font-weight:600;
	}
	.bio-image{
		text-align:center;
	}
	.bio-image img{
		border-radius:50%;
	}
	.bio-content{
		text-align:left;
	}
	.bio-content p{
		font-weight:600;
		font-size:30px;
	}
</style>
<div class="container portfolio">
	<div class="row">
		<div class="col-md-12">
		<h2 style="color:#fff">Wallet</h2>
		</div>	
	</div>
	<div class="bio-info">
		<div class="row">
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-12">
						<div class="bio-image">
                        <h1><i class="fa fa-inr"></i><?php echo $data['wallet']->balance_amount;?></h1>
						<ul>
							<li>Ballance</li>
						</ul>
						</div>			
					</div>
				</div>	
			</div>
			<div class="col-md-6" style="border-left:1px solid;">
				<div class="bio-image">
				<form action="<?php echo URLROOT; ?>/admin/pay" class="form-group" method="POST">
					<div class="row">
					<div class="col-md-2"></div>
						<div class="col-md-6"><input type="number" placeholder="Enter Amount" name="amount" class="form-control"></div>
						<div class="col-md-3"><button type="submit" class="btn btn-success">Add Money</button></div>
					</div>
				</form>
				<ul>
							<li>Recharge Wallet</li>
						</ul>
				</div>
			</div>
		</div>	
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="card">
								<div class="card-header " style="background:#00b894">
									<h3 class="card-title" style="color:#fff">IN</h3>
									<div class="card-options">
									
									</div>
								</div>
								<div class="table-responsive">
									<table class="table table-hover card-table table-striped table-vcenter table-outline text-nowrap">
										<thead>
									
											<tr>
												<th scope="col">ID</th>
												<th scope="col">Type</th>
												<th scope="col">Amount</th>
												<th scope="col">Date</th>
											</tr>
										</thead>
										<tbody>
										<?php foreach($data['transactions'] as $transaction): 
										if($transaction->type==1){
											$type = "Recharge";
										}else if($transaction->type==2){
											$type = "Payment";
										}else if($transaction->type==3){
											$type = "Credited";
										}else if($transaction->type==3){
											$type = "Debited";
										}
										if($transaction->type == 1 || $transaction->type == 3 ){
										?>
											<tr>
												<td><?php echo $transaction->id; ?></td>
												<td><?php echo $type; ?></td>
												<td><i class="fa fa-inr"></i><?php echo $transaction->amount;?></td>
												<td><?php echo date('M jS Y', strtotime($transaction->datetime)); ?></td>
												
											</tr>
										<?php } endforeach; ?>
										</tbody>
									</table>
								</div>
							</div>
		</div>
		<div class="col-md-6">
			<div class="card">
								<div class="card-header " style="background:#00b894">
									<h3 class="card-title" style="color:#fff">OUT</h3>
									<div class="card-options">
									
									</div>
								</div>
								<div class="table-responsive">
									<table class="table table-hover card-table table-striped table-vcenter table-outline text-nowrap">
										<thead>
									
											<tr>
												<th scope="col">ID</th>
												<th scope="col">Type</th>
												<th scope="col">Amount</th>
												<th scope="col">Date</th>
											</tr>
										</thead>
										<tbody>
										<?php foreach($data['transactions'] as $transaction): 
										if($transaction->type==1){
											$type = "Recharge";
										}else if($transaction->type==2){
											$type = "Payment";
										}else if($transaction->type==3){
											$type = "Credited";
										}else if($transaction->type==4){
											$type = "Debited";
										}
										if($transaction->type == 2 || $transaction->type == 4 ){
										?>
											<tr>
												<td><?php echo $transaction->id; ?></td>
												<td><?php echo $type; ?></td>
												<td><i class="fa fa-inr"></i><?php echo $transaction->amount;?></td>
												<td><?php echo date('M jS Y', strtotime($transaction->datetime)); ?></td>
												
											</tr>
										<?php } endforeach; ?>
										</tbody>
									</table>
								</div>
							</div>
		</div>
	</div>
</div>



				</div>
				<!--CONTAINER CLOSED -->
			</div>



			<?php require APPROOT . '/views/inc_admin/footer.php'; ?>