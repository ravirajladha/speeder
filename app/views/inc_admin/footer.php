	<!-- FOOTER -->
	<footer class="footer">
				<div class="container">
					<div class="row align-items-center flex-row-reverse">
						<div class="col-md-12 col-sm-12 text-center">
							Copyright © 2022 <a href="#">Speeder - </a><a href="#">Biglander Services Private Limited</a> All rights reserved.
						</div>
					</div>
				</div>
			</footer>
			<!-- FOOTER END -->
		</div>

		<!-- BACK-TO-TOP -->
		<a href="#top" id="back-to-top"><i class="fa fa-long-arrow-up"></i></a>

		<!-- JQUERY SCRIPTS -->
		<script src="<?php echo URLROOT; ?>/assets/js/vendors/jquery-3.2.1.min.js"></script>

		<!-- BOOTSTRAP SCRIPTS -->
		<script src="<?php echo URLROOT; ?>/assets/js/vendors/bootstrap.bundle.min.js"></script>

		<!-- SPARKLINE -->
		<script src="<?php echo URLROOT; ?>/assets/js/vendors/jquery.sparkline.min.js"></script>

		<!-- CHART-CIRCLE -->
		<script src="<?php echo URLROOT; ?>/assets/js/vendors/circle-progress.min.js"></script>

		<!-- RATING STAR -->
		<script src="<?php echo URLROOT; ?>/assets/plugins/rating/jquery.rating-stars.js"></script>

		<!-- SELECT2 JS -->
		<script src="<?php echo URLROOT; ?>/assets/plugins/select2/select2.full.min.js"></script>
		<script src="<?php echo URLROOT; ?>/assets/js/select2.js"></script>

		<!-- CHARTJS CHART -->
		<script src="<?php echo URLROOT; ?>/assets/plugins/chart/Chart.bundle.js"></script>
		<script src="<?php echo URLROOT; ?>/assets/plugins/chart/utils.js"></script>

		<!-- PIETY CHART -->
		<script src="<?php echo URLROOT; ?>/assets/plugins/peitychart/jquery.peity.min.js"></script>
		<script src="<?php echo URLROOT; ?>/assets/plugins/peitychart/peitychart.init.js"></script>

		<!-- LEFT-MENU -->
		<script src="<?php echo URLROOT; ?>/assets/plugins/sidemenu-toggle/sidemenu-toggle.js"></script>

		<!-- PERFECT SCROLL BAR JS-->
		<script src="<?php echo URLROOT; ?>/assets/plugins/pscrollbar/perfect-scrollbar.js"></script>
		<script src="<?php echo URLROOT; ?>/assets/plugins/pscrollbar/pscroll-leftmenu.js"></script>

		<!-- SIDEBAR JS -->
		<script src="<?php echo URLROOT; ?>/assets/plugins/sidebar/sidebar.js"></script>

		<!-- APEX-CHARTS JS -->
		<script src="<?php echo URLROOT; ?>/assets/plugins/apexcharts/apexcharts.js"></script>
		<script src="<?php echo URLROOT; ?>/assets/plugins/apexcharts/irregular-data-series.js"></script>

		<!-- INDEX-SCRIPTS  -->
		<script src="<?php echo URLROOT; ?>/assets/js/index.js"></script>

		<!-- CUSTOM JS -->
		<script src="<?php echo URLROOT; ?>/assets/js/custom.js"></script>

	</body>
</html>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php if(isset($_SESSION['success'])){ ?>
 <script type="text/javascript">
     swal("<?php echo $_SESSION['success']; ?>");
 </script>
<?php } unset($_SESSION['success']); ?>