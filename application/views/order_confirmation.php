<?php

$productinfo = "Shangar Collection";
$txnid = time();
$surl = $surl;
$furl = $furl;        
$key_id = RAZOR_KEY_ID;
$currency_code = $currency_code;

$bill_amount = ( $this->session->userdata('bill_amount') + 100 );
if( $this->session->userdata('promocode_id'))
{
    $wh['promocode_id'] = $this->session->userdata('promocode_id');
    $promo_data = $this->md->my_select('tbl_promocode','*',$wh)[0];
    $bill_amount = ( $bill_amount - $promo_data->amount );
}
$total = ($bill_amount * 100); //paisa 
$amount = $total;
$merchant_order_id = "Sha_".date('Y-m-d').time();

//user info
$member = $this->md->my_select('tbl_register','*',array('register_id'=>$this->session->userdata('member')))[0];

$card_holder_name = $member->name;
$email = $member->email;
$phone = $member->mobile;
$name = APPLICATION_NAME;
$return_url = site_url().'pages/callback';
?>
<!DOCTYPE html>
<html lang="en">

    <title>Order Confirmation - Shangar Collection</title>

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
                                <h2 class="ec-breadcrumb-title">Order Confirmation</h2>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <!-- ec-breadcrumb-list start -->
                                <ul class="ec-breadcrumb-list">
                                    <li class="ec-breadcrumb-item"><a href="<?php echo base_url(); ?>home">Home</a></li>
                                    <li class="ec-breadcrumb-item active">All Products</li>
                                </ul>
                                <!-- ec-breadcrumb-list end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ec breadcrumb end -->
        <form method="post" action="" name="confirmation">
       <?php
        if($this->session->userdata('paytype') == "online")
        {
       ?>
      <!--order confirmation start-->  
        <table style="table-layout: fixed; vertical-align: top; min-width: 320px; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #111111; width: 100%;user-select: none;" width="100%" cellspacing="0" cellpadding="0" bgcolor="#111111">
	<tbody>
		<tr style="vertical-align: top;" valign="top">
			<td style="word-break: break-word; vertical-align: top;" valign="top"><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td style="background-color:#111111" align="center">
				<div style="background-color: #fff;">
					<div style="min-width: 320px; max-width: 680px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; margin: 0 auto; background-color: transparent;">
						<div style="border-collapse: collapse; display: table; width: 100%; background-color: transparent;border: 2px solid #f4f8fb;"><table style="background-color:#fff;border: 2px solid #f4f8fb;" width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center"><table style="width:680px" cellspacing="0" cellpadding="0" border="0"><tbody><tr style="background-color:transparent"> <td style="background-color:transparent;width:680px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" width="680" valign="top" align="center"><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;">
							<div style="min-width: 320px; max-width: 680px; display: table-cell; vertical-align: top; width: 680px;">
								<div style="width: 100% !important;">
									<div style="border: 0px solid transparent; padding: 5px 0px 5px 0px;">
										<table style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" width="100%" cellspacing="0" cellpadding="0" border="0">
											<tbody>
												<tr style="vertical-align: top;" valign="top">
													<td style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding: 10px;" valign="top">
														<table style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 15px; width: 100%;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
															<tbody>
																<tr style="vertical-align: top;" valign="top">
																	<td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" height="15">&nbsp;</td>
																</tr>
															</tbody>
														</table>
													</td>
												</tr>
											</tbody>
										</table>
										<table style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" width="100%" cellspacing="0" cellpadding="0" border="0">
											<tbody>
												<tr style="vertical-align: top;" valign="top">
													<td style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding: 10px;" valign="top">
														<table style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 15px; width: 100%;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
															<tbody>
																<tr style="vertical-align: top;" valign="top">
																	<td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" height="15">&nbsp;</td>
																</tr>
															</tbody>
														</table>
													</td>
												</tr>
											</tbody>
										</table>
                                                                            <div style="padding-right: 15px; padding-left: 15px;" align="center"><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr style="line-height:0px"><td style="padding-right: 15px;padding-left: 15px;" align="center"><img style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%; max-width: 200px; display: block;" title="Don't Know What Happened" alt="Don't Know What Happened" src="<?php echo base_url(); ?>assets/images/email-template/confirm-email-4.jpg" width="650" border="0" align="middle">
											<div style="font-size: 1px; line-height: 15px;">&nbsp;</div>
										</td></tr></tbody></table></div>
										<table style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%" cellspacing="0" cellpadding="0">
											<tbody>
												<tr style="vertical-align: top;" valign="top">
													<td style="word-break: break-word; vertical-align: top; text-align: center; width: 100%; padding: 0px 20px 0 20px;" width="100%" valign="top" align="center">
														<h1 style="color: #212121; direction: ltr; font-family: 'Fira Sans', 'Lucida Sans Unicode', 'Lucida Grande', sans-serif; font-size: 30px; font-weight: normal; letter-spacing: normal;  text-align: center; margin-top: 0; margin-bottom: 0;"><strong>Order Confirmation</strong></h1>
													</td>
												</tr>
											</tbody>
										</table>
										<table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td style="    ">
											<div style="color: #858585; font-family: 'Fira Sans', 'Lucida Sans Unicode', 'Lucida Grande', sans-serif; line-height: 1.5; padding: 10px 20px 10px 20px;">
												<div style="line-height: 1.5; font-size: 12px; color: #858585; font-family: 'Fira Sans', 'Lucida Sans Unicode', 'Lucida Grande', sans-serif; mso-line-height-alt: 18px;">
													<p style="font-size: 18px; line-height: 1.5; word-break: break-word; text-align: center; mso-line-height-alt: 27px; margin: 0;"><span style="font-size: 18px;">Hello <?php echo $member->name; ?>,</span></p>
												</div>
											</div>
											</td></tr></tbody></table>  <table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td style="    ">
											<div style="color: #858585; font-family: 'Fira Sans', 'Lucida Sans Unicode', 'Lucida Grande', sans-serif; line-height: 1.8; padding: 15px 20px 10px 20px;">
												<div style="line-height: 1.8; font-size: 12px; color: #858585; font-family: 'Fira Sans', 'Lucida Sans Unicode', 'Lucida Grande', sans-serif; mso-line-height-alt: 22px;">
													<p style="font-size: 17px; line-height: 1.8; word-break: break-word; text-align: center; mso-line-height-alt: 31px; mso-ansi-font-size: 18px; margin: 0;"><span style="font-size: 17px; mso-ansi-font-size: 18px;">Click on this button,we will redirect you to payment page and then pay and confirm your order Make sure while page will processing</span></p>
													<p style="font-size: 17px; line-height: 1.8; word-break: break-word; text-align: center; mso-line-height-alt: 31px; mso-ansi-font-size: 18px; margin: 0;"><span style="font-size: 17px; mso-ansi-font-size: 18px;">please do not refresh on payment page</span></p>
												</div>
											</div>
										</td></tr></tbody></table>
										<div style="padding: 10px;" align="center"><table style="border-spacing: 0; border-collapse: collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td style="padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px" align="center"><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="#" style="height:42.75pt;width:341.25pt;v-text-anchor:middle;" arcsize="8%" stroke="false" fillcolor="#e0e0e0"><w:anchorlock><v:textbox inset="0,0,0,0"><center style="color:#212121; font-family:sans-serif; font-size:24px">
											<div style="text-decoration: none; display: inline-block; color: #212121; background-color: #f4f8fb; border-radius: 4px; -webkit-border-radius: 4px; -moz-border-radius: 4px; width: auto; ;border-top: 1px solid #e0e0e0; border-right: 1px solid #e0e0e0; border-bottom: 1px solid #e0e0e0; border-left: 1px solid #e0e0e0; padding-top: 5px; padding-bottom: 5px; font-family: 'Fira Sans', 'Lucida Sans Unicode', 'Lucida Grande', sans-serif; text-align: center; mso-border-alt: none; word-break: keep-all;cursor: pointer;"><span style="padding-left: 50px; padding-right: 55px;  display: inline-block; letter-spacing: undefined;"><span style=" line-height: 2; word-break: break-word; mso-line-height-alt: 32px;font-weight: 300;"><span style="font-size: 16px; ">
                                                                                                        <button id="submit-pay" type="button" onclick="razorpaySubmit(this);" value="Pay Now">Pay Now</button>
                                                                                                    </span></span></span></div>
										</center></v:textbox></w:anchorlock></v:roundrect></td></tr></tbody></table></div>
                                                                                        <div style="color: #858585; font-family: 'Fira Sans', 'Lucida Sans Unicode', 'Lucida Grande', sans-serif; line-height: 1.8; padding: 15px 20px 10px 20px;">
												<div style="line-height: 1.8; font-size: 12px; color: #858585; font-family: 'Fira Sans', 'Lucida Sans Unicode', 'Lucida Grande', sans-serif; mso-line-height-alt: 22px;">
													<p style="font-size: 17px; line-height: 1.8; word-break: break-word; text-align: center; mso-line-height-alt: 31px; mso-ansi-font-size: 18px; margin: 0;"><a style="font-size: 17px; mso-ansi-font-size: 18px;" href="<?php echo base_url('checkout'); ?>">Back to checkout</a></p>
												</div>
											</div>
										<table style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" width="100%" cellspacing="0" cellpadding="0" border="0">
											<tbody>
												<tr style="vertical-align: top;" valign="top">
													<td style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding: 10px;" valign="top">
														<table style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 20px; width: 100%;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
															<tbody>
																<tr style="vertical-align: top;" valign="top">
																	<td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" height="20">&nbsp;</td>
																</tr>
															</tbody>
														</table>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</td></tr></tbody></table> </td></tr></tbody></table></td></tr></tbody></table></div>
					</div>
				</div>
				<div style="background-color: #fff;">
					<div style="min-width: 320px; max-width: 680px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; margin: 0 auto; background-color: transparent;">
						<div style="border-collapse: collapse; display: table; width: 100%; background-color: transparent;border: 2px solid #f4f8fb;"><table style="background-color:#f4f8fb;border: 2px solid #f4f8fb;" width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center"></td></tr></tbody></table></div>
					</div>
				</div>
			</td></tr></tbody></table></td>
		</tr>
	</tbody>
</table>
      <!--order confirmation end-->
      <?php 
        }
        else if($this->session->userdata('paytype') == "cod")
        {
            $whh['register_id'] = $this->session->userdata('member');
                    $member = $this->md->my_select('tbl_register','*',$whh)[0];
                    
                    $email = $member->email;
      ?>
      <!--order confirmation OTP-->  
        <table style="table-layout: fixed; vertical-align: top; min-width: 320px; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #111111; width: 100%;user-select: none;" width="100%" cellspacing="0" cellpadding="0" bgcolor="#111111">
	<tbody>
		<tr style="vertical-align: top;" valign="top">
			<td style="word-break: break-word; vertical-align: top;" valign="top"><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td style="background-color:#111111" align="center">
				<div style="background-color: #fff;">
					<div style="min-width: 320px; max-width: 680px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; margin: 0 auto; background-color: transparent;">
						<div style="border-collapse: collapse; display: table; width: 100%; background-color: transparent;border: 2px solid #f4f8fb;"><table style="background-color:#fff;border: 2px solid #f4f8fb;" width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center"><table style="width:680px" cellspacing="0" cellpadding="0" border="0"><tbody><tr style="background-color:transparent"> <td style="background-color:transparent;width:680px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" width="680" valign="top" align="center"><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;">
							<div style="min-width: 320px; max-width: 680px; display: table-cell; vertical-align: top; width: 680px;">
								<div style="width: 100% !important;">
									<div style="border: 0px solid transparent; padding: 5px 0px 5px 0px;">
										<table style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" width="100%" cellspacing="0" cellpadding="0" border="0">
											<tbody>
												<tr style="vertical-align: top;" valign="top">
													<td style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding: 10px;" valign="top">
														<table style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 15px; width: 100%;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
															<tbody>
																<tr style="vertical-align: top;" valign="top">
																	<td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" height="15">&nbsp;</td>
																</tr>
															</tbody>
														</table>
													</td>
												</tr>
											</tbody>
										</table>
										<table style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" width="100%" cellspacing="0" cellpadding="0" border="0">
											<tbody>
												<tr style="vertical-align: top;" valign="top">
													<td style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding: 10px;" valign="top">
														<table style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 15px; width: 100%;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
															<tbody>
																<tr style="vertical-align: top;" valign="top">
																	<td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" height="15">&nbsp;</td>
																</tr>
															</tbody>
														</table>
													</td>
												</tr>
											</tbody>
										</table>
                                                                            <div style="padding-right: 15px; padding-left: 15px;" align="center"><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr style="line-height:0px"><td style="padding-right: 15px;padding-left: 15px;" align="center"><img style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%; max-width: 200px; display: block;" title="Don't Know What Happened" alt="Don't Know What Happened" src="<?php echo base_url(); ?>assets/images/email-template/confirm-email-4.jpg" width="650" border="0" align="middle">
											<div style="font-size: 1px; line-height: 15px;">&nbsp;</div>
										</td></tr></tbody></table></div>
										<table style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%" cellspacing="0" cellpadding="0">
											<tbody>
												<tr style="vertical-align: top;" valign="top">
													<td style="word-break: break-word; vertical-align: top; text-align: center; width: 100%; padding: 0px 20px 0 20px;" width="100%" valign="top" align="center">
														<h1 style="color: #212121; direction: ltr; font-family: 'Fira Sans', 'Lucida Sans Unicode', 'Lucida Grande', sans-serif; font-size: 30px; font-weight: normal; letter-spacing: normal;  text-align: center; margin-top: 0; margin-bottom: 0;"><strong>Order Confirmation</strong></h1>
													</td>
												</tr>
											</tbody>
										</table>
										<table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td style="    ">
											<div style="color: #858585; font-family: 'Fira Sans', 'Lucida Sans Unicode', 'Lucida Grande', sans-serif; line-height: 1.5; padding: 10px 20px 10px 20px;">
												<div style="line-height: 1.5; font-size: 12px; color: #858585; font-family: 'Fira Sans', 'Lucida Sans Unicode', 'Lucida Grande', sans-serif; mso-line-height-alt: 18px;">
													<p style="font-size: 18px; line-height: 1.5; word-break: break-word; text-align: center; mso-line-height-alt: 27px; margin: 0;"><span style="font-size: 18px;">Hello <?php echo $member->name; ?>,</span></p>
												</div>
											</div>
											</td></tr></tbody></table>  <table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td style="    ">
											<div style="color: #858585; font-family: 'Fira Sans', 'Lucida Sans Unicode', 'Lucida Grande', sans-serif; line-height: 1.8; padding: 15px 20px 10px 20px;">
												<div style="line-height: 1.8; font-size: 12px; color: #858585; font-family: 'Fira Sans', 'Lucida Sans Unicode', 'Lucida Grande', sans-serif; mso-line-height-alt: 22px;">
                                                                                                    <p style="font-size: 17px; line-height: 1.8; word-break: break-word; text-align: center; mso-line-height-alt: 31px; mso-ansi-font-size: 18px; margin: 0;"><span style="font-size: 17px; mso-ansi-font-size: 18px;">Please enter one time password for confirm order. We send one time password on your register email <a href="mailto:" type="email" ><?php echo $email; ?></a></span></p>
												</div>
                                                                                            <br>
                                                                                            <div style="width: 50%;">
                                                                                                <input type="text" min="0"  name="otp" style="margin-left: 50%;" placeholder="Enter Six Digit OTP" ><a href="<?php echo base_url('resend-otp'); ?>" style="margin-left: 50%;">Resend OTP?</a></div>
											</div>
										</td></tr></tbody></table>
										<div style="padding: 10px;" align="center"><table style="border-spacing: 0; border-collapse: collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td style="padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px" align="center"><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="#" style="height:42.75pt;width:341.25pt;v-text-anchor:middle;" arcsize="8%" stroke="false" fillcolor="#e0e0e0"><w:anchorlock><v:textbox inset="0,0,0,0"><center style="color:#212121; font-family:sans-serif; font-size:24px">
                                                                                                        <div style="text-decoration: none; display: inline-block; color: #212121; background-color: #f4f8fb; border-radius: 4px; -webkit-border-radius: 4px; -moz-border-radius: 4px; width: auto; ;border-top: 1px solid #e0e0e0; border-right: 1px solid #e0e0e0; border-bottom: 1px solid #e0e0e0; border-left: 1px solid #e0e0e0; padding-top: 5px; padding-bottom: 5px; font-family: 'Fira Sans', 'Lucida Sans Unicode', 'Lucida Grande', sans-serif; text-align: center; mso-border-alt: none; word-break: keep-all;cursor: pointer;"><span style="padding-left: 50px; padding-right: 55px;  display: inline-block; letter-spacing: undefined;"><span style=" line-height: 2; word-break: break-word; mso-line-height-alt: 32px;font-weight: 300;"><span style="font-size: 16px; ">
                                                                                                                        <button name="verify" value="yes" type="submit" >Verify</button></span></span></span></div>
                                                                                                        
                                                                                                        <?php
                                                                                                        if( isset($err))
                                                                                                        {
                                                                                                        ?>
                                                                                                        <div class="recent-purchase" style="background: #ee8989;">
                                                                                                            <div class="detail">
                                                                                                                <h6><strong>Oops!</strong> <?php echo $err; ?></h6>
                                                                                                            </div>
                                                                                                            <a href="javascript:void(0)" class="icon-btn recent-close">×</a>
                                                                                                        </div>
                                                                                                        <?php 
                                                                                                        }
                                                                                                        ?>
                                                                                                        
										</center></v:textbox></w:anchorlock></v:roundrect></td></tr></tbody></table></div>
                                                                                        <div style="color: #858585; font-family: 'Fira Sans', 'Lucida Sans Unicode', 'Lucida Grande', sans-serif; line-height: 1.8; padding: 15px 20px 10px 20px;">
												<div style="line-height: 1.8; font-size: 12px; color: #858585; font-family: 'Fira Sans', 'Lucida Sans Unicode', 'Lucida Grande', sans-serif; mso-line-height-alt: 22px;">
                                                                                                    <p style="font-size: 17px; line-height: 1.8; word-break: break-word; text-align: center; mso-line-height-alt: 31px; mso-ansi-font-size: 18px; margin: 0;"><a style="font-size: 17px; mso-ansi-font-size: 18px;" href="<?php echo base_url('checkout'); ?>">Back to checkout</a></p>
												</div>
											</div>
    
										<table style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" width="100%" cellspacing="0" cellpadding="0" border="0">
											<tbody>
												<tr style="vertical-align: top;" valign="top">
													<td style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding: 10px;" valign="top">
														<table style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 20px; width: 100%;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
															<tbody>
																<tr style="vertical-align: top;" valign="top">
																	<td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" height="20">&nbsp;</td>
																</tr>
															</tbody>
														</table>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</td></tr></tbody></table> </td></tr></tbody></table></td></tr></tbody></table></div>
					</div>
				</div>
				<div style="background-color: #fff;">
					<div style="min-width: 320px; max-width: 680px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; margin: 0 auto; background-color: transparent;">
						<div style="border-collapse: collapse; display: table; width: 100%; background-color: transparent;border: 2px solid #f4f8fb;"><table style="background-color:#f4f8fb;border: 2px solid #f4f8fb;" width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center"></td></tr></tbody></table></div>
					</div>
				</div>
			</td></tr></tbody></table></td>
		</tr>
	</tbody>
</table>
      <!--order confirmation OTP-->
      <?php 
        }
      ?>
      </form>
        
        <form name="razorpay-form" id="razorpay-form" action="<?php echo $return_url; ?>" method="POST">
          <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id" />
          <input type="hidden" name="merchant_order_id" id="merchant_order_id" value="<?php echo $merchant_order_id; ?>"/>
          <input type="hidden" name="merchant_trans_id" id="merchant_trans_id" value="<?php echo $txnid; ?>"/>
          <input type="hidden" name="merchant_product_info_id" id="merchant_product_info_id" value="<?php echo $productinfo; ?>"/>
          <input type="hidden" name="merchant_surl_id" id="merchant_surl_id" value="<?php echo $surl; ?>"/>
          <input type="hidden" name="merchant_furl_id" id="merchant_furl_id" value="<?php echo $furl; ?>"/>
          <input type="hidden" name="card_holder_name_id" id="card_holder_name_id" value="<?php echo $card_holder_name; ?>"/>
          <input type="hidden" name="merchant_total" id="merchant_total" value="<?php echo $total; ?>"/>
          <input type="hidden" name="merchant_amount" id="merchant_amount" value="<?php echo $amount; ?>"/>
        </form>
        <?php
        $this->load->view('footer');
        ?>

        <?php
        $this->load->view('footerscript');
        ?>
        
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
      var razorpay_options = {
        key: "<?php echo $key_id; ?>",
        amount: "<?php echo $total; ?>",
        name: "<?php echo $name; ?>",
        description: "Order # <?php echo $merchant_order_id; ?>",
        netbanking: true,
        currency: "<?php echo $currency_code; ?>",
        prefill: {
          name:"<?php echo $card_holder_name; ?>",
          email: "<?php echo $email; ?>",
          contact: "<?php echo $phone; ?>"
        },
        notes: {
          soolegal_order_id: "<?php echo $merchant_order_id; ?>",
        },
        handler: function (transaction) {
            document.getElementById('razorpay_payment_id').value = transaction.razorpay_payment_id;
            document.getElementById('razorpay-form').submit();
        },
        "modal": {
            "ondismiss": function(){
                window.location = "<?php echo base_url('order-failed'); ?>"
                //location.reload()
            }
        }
      };
      var razorpay_submit_btn, razorpay_instance;

      function razorpaySubmit(el){
        if(typeof Razorpay == 'undefined'){
          setTimeout(razorpaySubmit, 200);
          if(!razorpay_submit_btn && el){
            razorpay_submit_btn = el;
            el.disabled = true;
            el.value = 'Please wait...';  
          }
        } else {
          if(!razorpay_instance){
            razorpay_instance = new Razorpay(razorpay_options);
            if(razorpay_submit_btn){
              razorpay_submit_btn.disabled = false;
              razorpay_submit_btn.value = "Pay Now";
            }
          }
          razorpay_instance.open();
        }
      }  
    </script>
        
    </body>
</html>