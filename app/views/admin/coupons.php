<?php require APPROOT . '/views/inc_admin/header.php'; 
$pageMod = New Page; ?>

				<!-- CONTAINER -->
				<div class="app-content">

				    <!-- PAGE-HEADER -->
					<div class="page-header">
						<h4 class="page-title">Coupons</h4>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Pages</a></li>
							<li class="breadcrumb-item active" aria-current="page">Coupons</li>
						</ol>
					</div>
					<!-- PAGE-HEADER END -->

					

					<!-- ROW-2 OPEN -->
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header ">
									<h3 class="card-title ">Coupons</h3>
								
								</div>
								<div class="table-responsive">
                                <table class="table table-hover card-table table-striped table-vcenter table-outline text-nowrap">
                                        <thead>
                                        <tr>
                                            <th scope="col">Coupon Title</th>
                                            <th scope="col">Coupon Code</th>
                                            <th scope="col">Coupon Type</th>
                                            <th scope="col">Coupon Value</th>
                                            <th scope="col">Coupon Cap</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                <?php 
                                    foreach($data['all_coupons'] as $coupon) :
                                ?>
                                        <tr>
                                         <td class="digits"><?php echo $coupon->coupon_title; ?></td>
                                         <td class="digits"><?php echo $coupon->coupon_code; ?></td>
                                         <td class="digits"><?php if($coupon->coupon_type==1){echo "Percentage";}else{echo "Fixed";} ?></td>
                                         <td class="digits"><?php echo $coupon->coupon_value; ?></td>
                                         <td class="digits"><?php echo $coupon->coupon_cap; ?></td>
                                        
                                         <td class="digits">
                                         <form action="<?php echo URLROOT; ?>/admin/change_state_coupon/<?php echo $coupon->coupon_id; ?>" method="post">
                                        <select class='form-control' name="coupon_status" oninput="this.form.submit()" style="font-size:12px;">
                                        <option value="1" <?php if($coupon->coupon_status==1){echo "selected";} ?> >Active</option>
                                        <option value="0" <?php if($coupon->coupon_status==0){echo "selected";} ?> >Inactive</option>
                                        </select>
                                        </form>

                                         </td>
                                        </tr>  
                                        
                            <?php 
                            endforeach;
                            ?>

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