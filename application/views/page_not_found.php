
<!DOCTYPE html>
<html lang="en">

    <title>Register - Shangar Collection</title>

    <?php
    $this->load->view('head');
    ?>

    <body>
        <div id="ec-overlay"><span class="loader_img"></span></div>

        <?php
//        $this->load->view('header');
        ?>

        <!-- Ec breadcrumb start -->
       
	<!-- Start main Section -->
	<section class="ec-under-maintenance">

		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="under-maintenance">
						<h1>Error 404</h1>
						<h4>This is not web page you are looking for.</h4>
						<p>The requested URL / 404 was not found on this server. </p> 
						<a href="<?php echo base_url('home'); ?>" class="btn btn-lg btn-primary" tabindex="0">Back to Home</a>
					</div>
				</div>
				<div class="col-md-6 disp-768">
					<div class="under-maintenance">
						<img class="maintenance-img" src="assets/images/common/404.png" alt="maintenance">
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End main Section -->

	<!-- Vendor JS -->
	<script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
	<script src="assets/js/vendor/popper.min.js"></script>
	<script src="assets/js/vendor/bootstrap.min.js"></script>
	<script src="assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
	<script src="assets/js/vendor/modernizr-3.11.2.min.js"></script>

	<!--Plugins JS-->
	<script src="assets/js/plugins/swiper-bundle.min.js"></script>
	<script src="assets/js/plugins/countdownTimer.min.js"></script>
	<script src="assets/js/plugins/scrollup.js"></script>
	<script src="assets/js/plugins/jquery.zoom.min.js"></script>
	<script src="assets/js/plugins/slick.min.js"></script>
	<script src="assets/js/plugins/infiniteslidev2.js"></script>
	<script src="assets/js/vendor/jquery.magnific-popup.min.js"></script>
	<script src="assets/js/plugins/coming-soon.js"></script>
	<script src="assets/js/plugins/jquery.sticky-sidebar.js"></script>
	
	<!-- Main Js -->
	<script src="assets/js/vendor/index.js"></script>
	<script src="assets/js/main.js"></script>

        <?php
//        $this->load->view('footer');
        ?>

        <?php
//        $this->load->view('footerscript');
        ?>

    </body>

</html>