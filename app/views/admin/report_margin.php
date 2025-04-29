<?php require APPROOT . '/views/inc_admin/header.php'; ?>

				<!-- CONTAINER -->
				<div class="app-content">

					<!-- PAGE-HEADER -->
					<div class="page-header">
						<h4 class="page-title">Margin Report</h4>
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
                                                <th scope="col">Distributor</th>
													<th scope="col">From Pincode</th>
													<th scope="col">To Pincode</th>
													<th scope="col">From State</th>
                                                    <th scope="col">To State</th>
													<th scope="col">Total Weight</th>
													<th scope="col">Total Cost (₹)</th>
                                                    <th scope="col">GST (₹)</th>
                                                    <th scope="col">Packing Cost (₹)</th>
                                                    <th scope="col">Margin (₹)</th>
												</tr>
											</thead>
											<tbody>

                                            <?php $pageMod = New Page;
                                            foreach($data['all_orders'] as $order):
                                            $dist = $pageMod->get_userinfo($order->order_from);
                                            $gst = round((18 * $order->booking_cost)/100,2)
			
                ?>
				
											
												
												<tr>
													<td><?php echo $order->booking_id; ?></td>
                                                    <td><?php echo $dist->name; ?></td>
													<td><?php echo $order->from_pincode; ?></td>
                                                    <td><?php echo $order->to_pincode; ?></td>
													<td><?php echo $order->from_state; ?></td>
													<td><?php echo $order->to_state; ?></td>
													<td><?php echo $order->order_weight; ?> Kgs</td>
                                                    <td><?php echo $order->booking_cost; ?></td>
                                                    <td><?php echo $gst; ?></td>
                                                    <td><?php echo $order->packing_cost; ?></td>
                                                    <td><?php echo $order->order_margin; ?></td>
													
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
         XLSX.writeFile(wb, fn || ('margin_report.' + (type || 'xlsx')));
    }
            </script>