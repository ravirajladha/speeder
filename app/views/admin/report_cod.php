<?php require APPROOT . '/views/inc_admin/header.php'; ?>

				<!-- CONTAINER -->
				<div class="app-content">

					<!-- PAGE-HEADER -->
					<div class="page-header">
						<h4 class="page-title">COD Report</h4>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#"><button onclick="ExportToExcel('xlsx')" class="btn btn-default">Export</button></a></li>
							
						</ol>
					</div>
					<!-- PAGE-HEADER END -->
                    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>	

					<div class="row">
						<div class="col-md-12 col-xl-12 col-lg-12">
							<div class="card">
								<div class="card-header" style='display:block'>
							
								</div>
								<div class="">
									<div class="table-responsive">
										<table class="table table-hover card-table table-striped table-vcenter table-outline text-nowrap" id="tbl_exporttable_to_xls">
											<thead>
												<tr>
                                                <th scope="col">ID</th>
                                               
													<th scope="col">AD Name</th>
													<th scope="col">Cash to collect (₹)</th>
													<th scope="col">Paid</th>
												</tr>
											</thead>
											<tbody>

                                            <?php $pageMod = New Page;
                                            foreach($data['all_orders'] as $order):
                                            $ad = $pageMod->get_userinfo($order->to_ad_id);
                                            $collect = $order->booking_cost + $order->item_cost;
                                            if($order->booking_status==18){
                                                $paid = "Paid";
                                            }else {
                                                $paid = "Not Paid";
                                            }
                                            ?>
				
											
												
												<tr>
													<td><?php echo $order->booking_id; ?></td>
                                                    <td><?php echo $ad->name; ?></td>
													<td><?php echo $collect; ?></td>
                                                    <td><?php echo $paid; ?></td>
													
												</tr>
											


												
								<?php endforeach; ?>							
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- ROW-4 END -->

				</div>
				<!-- CONTAINER END -->
            </div>

			<!-- SIDE-BAR -->
			
			<!-- SIDE-BAR CLOSED -->

			<?php require APPROOT . '/views/inc_admin/footer.php'; ?>

            <script>
                $(document).ready(async function (){
    history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
    };
})

function ExportToExcel(type, fn, dl) {
       var elt = document.getElementById('tbl_exporttable_to_xls');
       var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
       return dl ?
         XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
         XLSX.writeFile(wb, fn || ('cod_report.' + (type || 'xlsx')));
    }
            </script>