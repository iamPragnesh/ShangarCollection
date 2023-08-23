
<!DOCTYPE html>
<html lang="en">

    <title>Order Failed - Shangar Collection</title>

    <?php
    $this->load->view('head');
    ?>

    <body>
        <div id="ec-overlay"><span class="loader_img"></span></div>

        <?php
        $this->load->view('header');
        ?>

        <!-- Ec breadcrumb start -->
        <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="row ec_breadcrumb_inner">
                            <div class="col-md-6 col-sm-12">
                                <h2 class="ec-breadcrumb-title">Order Failed</h2>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <!-- ec-breadcrumb-list start -->
                                <ul class="ec-breadcrumb-list">
                                    <li class="ec-breadcrumb-item"><a href="<?php echo base_url(); ?>home">Home</a></li>
                                    <li class="ec-breadcrumb-item active">Order Failed</li>
                                </ul>
                                <!-- ec-breadcrumb-list end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ec breadcrumb end -->

       <!-- Start main Section -->
	<section class="ec-under-maintenance">

		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="under-maintenance">
                                            <h1><img class="green-img" style="display: inline-block; margin: 0 0.5rem; animation: bounce; animation-duration: 2s;" src="assets/images/common/red-mark.png" alt="maintenance"></h1>
						<h4>Order Failed</h4>
                                                <?php
                                                if(isset($merchant_order_id))
                                                {
                                                ?>
						<h5>Order ID : <?php echo $merchant_order_id; ?></h5>
                                                <?php
                                                }
                                                if(isset($razorpay_payment_id))
                                                {
                                                ?>
                                                <h5>Payment ID : <?php echo $merchant_order_id; ?></h5>
                                                <?php
                                                }
                                                ?>
						<p>click on the following button and retry for payment is deduct form your bank then don't worry it will refunded within 7 working days and contact our administration department.</p>
                                                <a href="<?php echo base_url('checkout'); ?>" class="btn btn-lg btn-primary" tabindex="0">Retry Payment</a>
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


        
<?php
$this->load->view('footer');
?>

<?php
$this->load->view('footerscript');
?>

    </body>

</html>