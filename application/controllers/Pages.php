<?php

class Pages extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/kolkata');
        
        //offer
        $today = date('Y-m-d');
        $offer = $this->md->my_select('tbl_offer');
        
        foreach ( $offer as $data )
        {
            //start offer
            $start_date = $data->start_date;
            
            if( $today >= $start_date)
            {
                $category_id = $data->category_id;
                $min_price = $data->min_price;
                $max_price = $data->max_price;
                
                $this->md->my_update('tbl_offer',array('status'=>1),array('offer_id'=>$data->offer_id));
                
                if( $data->label == "all")
                {
                    $wh['price >='] = $min_price;
                    $wh['price <='] = $max_price;
                }
                else if( $data->label == "main")
                {
                    $wh['price >='] = $min_price;
                    $wh['price <='] = $max_price;
                    $wh['main_id'] = $category_id;
                }
                else if( $data->label == "sub")
                {
                    $wh['price >='] = $min_price;
                    $wh['price <='] = $max_price;
                    $wh['sub_id'] = $category_id;
                }
                else if( $data->label == "peta")
                {
                    $wh['price >='] = $min_price;
                    $wh['price <='] = $max_price;
                    $wh['peta_id'] = $category_id;
                }
                $this->md->my_update('tbl_product',array('offer_id'=>$data->offer_id),$wh);
            }
            
            //end offer
            
            $end_date = $data->end_date;
            
            if( $today > $end_date )
            {
                $this->md->my_update('tbl_product',array('offer_id'=>0),array('offer_id'=>$data->offer_id));
                $this->md->my_update('tbl_offer',array('status'=>0),array('offer_id'=>$data->offer_id));
            }
        }
    }
     
    public function index() {
        $this->load->view('index');
    }

    public function about_us() {
        $data = array();

        $data['aboutus'] = $this->md->my_select('tbl_about');
        $this->load->view('about_us', $data);
    }

    public function privacy_policy() {
        $data = array();

        $data['privacypolicy'] = $this->md->my_select('tbl_privacy_policy');
        $this->load->view('privacy_policy', $data);
    }

    public function return_policy() {
        $data = array();

        $data['returnpolicy'] = $this->md->my_select('tbl_return_policy');
        $this->load->view('return_policy', $data);
    }

    public function terms_and_condition() {
        $data = array();

        $data['termscondition'] = $this->md->my_select('tbl_terms_condition');
        $this->load->view('terms_and_condition', $data);
    }

    public function contact_us() {
        $data = array();

        // click event of add
        if ($this->input->post('add')) {

            // create validation
            $this->form_validation->set_rules('name', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Please enter name', 'regex_match' => 'please enter valid name'));
            $this->form_validation->set_rules('email', '', 'required', array('required' => 'Please enter email'));
            $this->form_validation->set_rules('number', '', 'required|numeric', array('required' => 'Please enter name', 'numeric' => 'Please enter phone number'));
            $this->form_validation->set_rules('subject', '', 'required', array('required' => 'Please enter subject'));
            $this->form_validation->set_rules('message', '', 'required', array('required' => 'Please enter message'));

            // validation run
            if ($this->form_validation->run() == TRUE) {

                $ins['name'] = $this->input->post('name');
                $ins['email'] = $this->input->post('email');
                $ins['mobile'] = $this->input->post('number');
                $ins['subject'] = $this->input->post('subject');
                $ins['message'] = $this->input->post('message');

                $result = $this->md->my_insert('tbl_contact_us', $ins);
                if ($result == 1) {
                    $data['success'] = "Thank You for contact with us";
                }
            }
        }



        $data['contactus'] = $this->md->my_select('tbl_contact_us');
        $this->load->view('contact_us', $data);
    }

    public function faqs() {
        $data = array();

        $data['faqs'] = $this->md->my_select('tbl_faqs');
        $this->load->view('faqs', $data);
    }

    public function login() {
        $data = array();
        
        if ($this->input->post('login')) {

            $email = $this->input->post('email');

            //varify
            $record = $this->md->my_select('tbl_register', '*', array('email' => $email));
            $count = count($record);
            if ($count == 1) {

                //varify password
                $original_pass = $this->encryption->decrypt($record[0]->password);

                if ($this->input->post('ps') == $original_pass) {
                    //verify status
                    if ($record[0]->status == 1) {
                        //set cookie
                        if ($this->input->post('svp')) {
                            $expire = 60 * 60 * 24 * 365;

                            set_cookie('member_email', $email, $expire);
                            set_cookie('member_password', $original_pass, $expire);
                        } else {
                            //remove cookie
                            if ($this->input->cookie('member_email')) {
                                set_cookie('member_email', "", -10);
                                set_cookie('member_password', "", -10);
                            }
                        }

                        //store detail into session
                        $this->session->set_userdata('member', $record[0]->register_id);
                        $this->session->set_userdata('member_lastlogin', date('Y-m-d h:i:s'));

                        redirect('member-home');
                    } else {
                        $data['err'] = "Your account is inactive.Please contact admin for active account.";
                    }
                } 
            } 
            else {
                $data['err'] = 'Invalid email or password.';
            }
        }
        
        $this->load->view('login', $data);
    }

    public function forget_pass() {

        $data = array();
        
        if($this->input->post('send'))
        {
            $wh['email'] = $this->input->post('email');
            $record = $this->md->my_select('tbl_register','*',$wh);
            
            if( count($record))
            {
                
                $ps = $this->encryption->decrypt($record[0]->password);
                
                $name = $record[0]->name;
                $email = $record[0]->email;
                $msg = '
<table style="table-layout: fixed; vertical-align: top; min-width: 320px; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #d9dffa; width: 100%;user-select: none;" width="100%" cellspacing="0" cellpadding="0" bgcolor="#d9dffa">
	<tbody>
		<tr style="vertical-align: top;" valign="top">
			<td style="word-break: break-word; vertical-align: top;" valign="top">
				<table width="100%" cellspacing="0" cellpadding="0" border="0">
					<tbody>
						<tr>
							<td style="background-color: #d9dffa;" align="center">
								<div style="background-color: #eaf3fa;">
									<div style="min-width: 320px; max-width: 600px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; margin: 0 auto; background-color: transparent;">
										<div style="border-collapse: collapse; display: table; width: 100%; background-color: transparent;">
											<table style="background-color: #d9dffa;" width="100%" cellspacing="0" cellpadding="0" border="0">
												<tbody>
													<tr>
														<td align="center">
															<table style="width: 600px;" cellspacing="0" cellpadding="0" border="0">
																<tbody>
																	<tr style="background-color: transparent;">
																		<td style="background-color: transparent; width: 600px; border: 0px solid transparent;" width="600" valign="top" align="center">
																			<table width="100%" cellspacing="0" cellpadding="0" border="0">
																				<tbody>
																					<tr>
																						<td style="padding: 20px 0px 0px 0px;">
																							<div style="min-width: 320px; max-width: 600px; display: table-cell; vertical-align: top; width: 600px;">
																								<div style="width: 100% !important;">
																									<div style="border: 0px solid transparent; padding: 20px 0px 0px 0px;">
																										<div style="padding-right: 0px; padding-left: 0px;" align="center">
																											<table width="100%" cellspacing="0" cellpadding="0" border="0">
																												<tbody>
																													<tr style="line-height: 0px;">
																														<td style="padding-right: 0px; padding-left: 0px;" align="center"><img style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%; max-width: 100%; display: block;" title="Card Header with Border and Shadow Animated" alt="Card Header with Border and Shadow Animated" src="https://i.ibb.co/ZgCvBvH/forgot-email-4.jpg" width="600" border="0" align="middle"></td>
																													</tr>
																												</tbody>
																											</table>
																										</div>
																									</div>
																								</div>
																							</div>
																						</td>
																					</tr>
																				</tbody>
																			</table>
																		</td>
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
								<div style=" background-position: top center; background-repeat: repeat; background-color: #d9dffa;">
									<div style="min-width: 320px; max-width: 600px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; margin: 0 auto; background-color: white;">
										<div style="border-collapse: collapse; display: table; width: 100%; background-color: #fff;">
											<table style=" background-position: top center; background-repeat: repeat; background-color: #fff;" width="100%" cellspacing="0" cellpadding="0" border="0">
												<tbody>
													<tr>
														<td align="center">
															<table style="width: 600px;" cellspacing="0" cellpadding="0" border="0">
																<tbody>
																	<tr style="background-color: transparent;">
																		<td style="background-color: transparent; width: 600px; border: 0px solid transparent;" width="600" valign="top" align="center">
																			<table width="100%" cellspacing="0" cellpadding="0" border="0">
																				<tbody>
																					<tr>
																						<td style="padding: 15px 50px 15px 50px;">
																							<div style="min-width: 320px; max-width: 600px; display: table-cell; vertical-align: top; width: 600px;">
																								<div style="width: 100% !important;">
																									<div style="border: 0px solid transparent; padding: 15px 50px 15px 50px;">
																										<table width="100%" cellspacing="0" cellpadding="0" border="0">
																											<tbody>
																												<tr>
																													<td style="font-family: Arial, sans-serif; padding: 10px;">
																														<div style="color: #506bec; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; line-height: 1.2; padding: 10px;">
																															<div style="font-size: 14px; line-height: 1.2; color: #7499f1; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; mso-line-height-alt: 17px;">
																																<p style="margin: 0; font-size: 14px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 17px; margin-top: 0; margin-bottom: 0;"><strong><span style="font-size: 30px;">'.$name.'</span></strong></p>
																															</div>
																														</div>
																													</td>
																												</tr>
																											</tbody>
																										</table>
																										<table width="100%" cellspacing="0" cellpadding="0" border="0">
																											<tbody>
																												<tr>
																													<td style="font-family: Arial, sans-serif; padding: 10px;">
																														<div style="color: #506bec; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; line-height: 1.2; padding: 10px;">
																															<div style="font-size: 14px; line-height: 1.2; color: #7499f1; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; mso-line-height-alt: 17px;">
																																<p style="margin: 0; font-size: 14px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 17px; margin-top: 0; margin-bottom: 0;"><strong><span style="font-size: 30px;">Your Registered Password is <b>'.$ps.'</b> </span></strong></p>
																															</div>
																														</div>
																													</td>
																												</tr>
																											</tbody>
																										</table>
																										<table width="100%" cellspacing="0" cellpadding="0" border="0">
																											<tbody>
																												<tr>
																													<td style="font-family: Arial, sans-serif; padding: 10px;">
																														<div style="color: #40507a; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; line-height: 1.2; padding: 10px;">
																															<div style="font-size: 14px; line-height: 1.2; color: #40507a; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; mso-line-height-alt: 17px;">
																																<p style="margin: 0; font-size: 16px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 19px; margin-top: 0; margin-bottom: 0;"><span style="font-size: 16px;">hello</span></p>
																															</div>
																														</div>
																													</td>
																												</tr>
																											</tbody>
																										</table>
																										
																										<table width="100%" cellspacing="0" cellpadding="0" border="0">
																											<tbody>
																												<tr>
																													<td style="font-family: Arial, sans-serif; padding: 10px;">
																														<div style="color: #40507a; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; line-height: 1.2; padding: 10px;">
																															<div style="font-size: 14px; line-height: 1.2; color: #40507a; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; mso-line-height-alt: 17px;">
																																<p style="margin: 0; font-size: 14px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 17px; margin-top: 0; margin-bottom: 0;">Did not request a Forget Password? You can ignore this message.</p>
																															</div>
																														</div>
																													</td>
																												</tr>
																											</tbody>
																										</table>
																									</div>
																								</div>
																							</div>
																						</td>
																					</tr>
																				</tbody>
																			</table>
																		</td>
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
								<div style="background-color: transparent;">
									<div style="min-width: 320px; max-width: 600px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; margin: 0 auto; background-color: transparent;">
										<div style="border-collapse: collapse; display: table; width: 100%; background-color: transparent;">
											<table style="background-color: transparent;" width="100%" cellspacing="0" cellpadding="0" border="0">
												<tbody>
													<tr>
														<td align="center">
															<table style="width: 600px;" cellspacing="0" cellpadding="0" border="0">
																<tbody>
																	<tr style="background-color: transparent;">
																		<td style="background-color: transparent; width: 600px; border: 0px solid transparent;" width="600" valign="top" align="center">
																			<table width="100%" cellspacing="0" cellpadding="0" border="0">
																				<tbody>
																					<tr>
																						<td style="padding: 0px 0px 5px 0px;">
																							<div style="min-width: 320px; max-width: 600px; display: table-cell; vertical-align: top; width: 600px;">
																								<div style="width: 100% !important;">
																									<div style="border: 0px solid transparent; padding: 0px 0px 5px 0px;">
																										<div style="padding-right: 0px; padding-left: 0px;" align="center">
																											<table width="100%" cellspacing="0" cellpadding="0" border="0">
																												<tbody>
																													<tr style="line-height: 0px;">
																														<td style="padding-right: 0px; padding-left: 0px;" align="center"></td>
																													</tr>
																												</tbody>
																											</table>
																										</div>
																									</div>
																								</div>
																							</div>
																						</td>
																					</tr>
																				</tbody>
																			</table>
																		</td>
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
							</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
	</tbody>
</table>';
                $subject = "Password recover";
                
               $result = $this->md->my_mailer($email , $subject , $msg);
               if($result == 1)
               {
                   redirect('login/1');
               }
               else
               {
                   $data['error'] = "this email is not register.";
               }
            }
            else
            {
           
                $data['error'] = "this email is not register.";
            }
        }
        
        $this->load->view('forget_pass',$data);
    }

    public function register() {
        $data = array();

        if ($this->input->post('register')) {

            $this->form_validation->set_rules('name', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Please enter name', 'regex_match' => 'please enter valid name'));
            $this->form_validation->set_rules('email', 'email', 'required|valid_email', array('required' => 'Please Enter Email', 'valid_email' => 'please enter valid Email'));
            $this->form_validation->set_rules('number', '', 'required|regex_match[/^[0-9]{10}$/]', array('required' => 'Please enter phone number', 'regex_match' => 'please enter valid phone number'));
            $this->form_validation->set_rules('ps', '', 'required|min_length[8]|max_length[16]', array('required' => 'Please enter Password', 'matches' => 'please enter valid Password'));
            $this->form_validation->set_rules('cps', '', 'required|matches[cps]', array('required' => 'Please enter Password', 'matches' => 'please enter valid Password'));

            if ($this->form_validation->run() == TRUE) {
                $ins['name'] = $this->input->post('name');
                $ins['email'] = $this->input->post('email');
                $ins['mobile'] = $this->input->post('number');
                $ins['password'] = $this->encryption->encrypt($this->input->post('ps'));
                $ins['join_date'] = date('Y-m-d');
                $ins['status'] = 1;

                $result = $this->md->my_insert('tbl_register', $ins);
                
                
                if ($result == 1) {
                    $id = $this->md->my_query("select max(`register_id`) AS mx from `tbl_register`")[0]->mx;

                    $this->session->set_userdata('member', $id);
                    $this->session->set_userdata('member_lastlogin', date('Y-m-d h:i:s'));

                    redirect('member-home');
                }
            }
        }
        $this->load->view('register', $data);
    }

    public function feedback() {
        $data = array();

        // click event of add
        if ($this->input->post('add')) {

            $this->form_validation->set_rules('name', '', 'required', array('required' => 'Please enter name'));
            $this->form_validation->set_rules('message', '', 'required', array('required' => 'Please enter message'));

            if ($this->form_validation->run() == TRUE) {

                $ins['name'] = $this->input->post('name');
                $ins['message'] = $this->input->post('message');

                $result = $this->md->my_insert('tbl_feedback', $ins);
                if ($result == 1) {
                    $data['success'] = "Thank for your feedback.";
                }
            }
        }

        $data['feedback'] = $this->md->my_select('tbl_feedback');
        $this->load->view('feedback', $data);
    }

    public function demo() {

        $this->load->view('demo');
    }
    
    public function collections() {
        
        $this->load->view('collections');
    }
    
    public function product_details() {
        
        $data = array();
        if( !$this->uri->segment(2))
        {
            redirect('home');
        }
        else
        {
            $id = base64_decode(base64_decode($this->uri->segment(2)));
            
            $wh['product_id'] = $id;
            $data['detail'] = $this->md->my_select('tbl_product','*',$wh)[0];
            
        }
        
        $this->load->view('product_details',$data);
    }
    
    public function view_cart() {
        
        if(!$this->session->userdata('member'))
        {
            redirect('login');
        }
        
        $this->load->view('view_cart');
    }
    
    public function check_out() {
        
        $data = array();
        
        //check cart empty or not
        $wh['register_id'] = $this->session->userdata('member');
        $data['cart_data'] = $this->md->my_select('tbl_cart','*',$wh);
        
        $cart_item = count($data['cart_data']);
        if( $cart_item == 0)
        {
            redirect('view-cart');
        }
        
        //pay button click
        if( $this->input->post('pay'))
        {
            if( $this->input->post('paytype'))
            {
            $this->session->set_userdata('paytype',$this->input->post('paytype'));
            }
            
            if( !$this->session->userdata('shipment_id'))
            {
                $data['ship_err'] = "Please select Delivery Location";
            }
            
            if( !$this->session->userdata('paytype'))
            {
                $data['pay_err'] = "Please select Payment mode";
            }
            
            if( !isset($data['ship_err']) && !isset($data['pay_err']))
            { 
                if( $this->session->userdata('paytype') == "cod")
                {
                    $otp = rand( 100000 , 999999 );
                    $this->session->set_userdata('otp',$otp);
                    
                    $whh['register_id'] = $this->session->userdata('member');
                    $member = $this->md->my_select('tbl_register','*',$whh)[0];
                    
                    $email = $member->email;
                    $name = $member->name;
                    $subject = "One time Password For confirmation";
                    $msg= '<!DOCTYPE html>

<html lang="en" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">
    <head>
        <title></title>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml><![endif]-->
        <!--[if !mso]><!-->
        <link href="<?php echo base_url(); ?>https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css"/>
        <!--<![endif]-->
        <style>
            * {
                box-sizing: border-box;
            }

            body {
                margin: 0;
                padding: 0;
            }

            a[x-apple-data-detectors] {
                color: inherit !important;
                text-decoration: inherit !important;
            }

            #MessageViewBody a {
                color: inherit;
                text-decoration: none;
            }

            p {
                line-height: inherit
            }

            @media (max-width:670px) {
                .icons-inner {
                    text-align: center;
                }

                .icons-inner td {
                    margin: 0 auto;
                }

                .row-content {
                    width: 100% !important;
                }

                .column .border {
                    display: none;
                }

                .stack .column {
                    width: 100%;
                    display: block;
                }
            }
        </style>
    </head>
    <body style="background-color: #000000; margin: 0; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">
        <table border="0" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #000000;" width="100%">
            <tbody>
                <tr>
                    <td>
                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-2" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f3e6f8;" width="100%">
                            <tbody>
                                <tr>
                                    <td>
                                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #d4d0ff; background-image: url(https://i.ibb.co/3c7LZq0/bg-white-rombo2.png); background-repeat: no-repeat; color: #000000; width: 650px;" width="650">
                                            <tbody>
                                                <tr>
                                                    <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 45px; padding-bottom: 0px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
                                                        <table border="0" cellpadding="20" cellspacing="0" class="divider_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                                            <tr>
                                                                <td>
                                                                    <div align="center">
                                                                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                                                            <tr>
                                                                                <td class="divider_inner" style="font-size: 1px; line-height: 1px; border-top: 0px solid #BBBBBB;"><span> </span></td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <table border="0" cellpadding="0" cellspacing="0" class="heading_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                                            <tr>
                                                                <td style="padding-top:35px;text-align:center;width:100%;">
                                                                    <h1 style="margin: 0; color: #1213c0; direction: ltr; font-family: "Cabin", Arial, "Helvetica Neue", Helvetica, sans-serif; font-size: 28px; font-weight: normal; letter-spacing: normal; line-height: 120%; text-align: center; margin-top: 0; margin-bottom: 0;"><strong>Hello '.$name.'</strong></h1>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <table border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
                                                            <tr>
                                                                <td style="padding-left:45px;padding-right:45px;padding-top:10px;">
                                                                    <div style="font-family: Arial, sans-serif">
                                                                        <div style="font-size: 12px; font-family: "Cabin", Arial, "Helvetica Neue", Helvetica, sans-serif; mso-line-height-alt: 18px; color: #393d47; line-height: 1.5;">
                                                                            <p style="margin: 0; text-align: center; mso-line-height-alt: 27px;"><span style="font-size:18px;color:#6d67cf;">'.$otp.'</span></p>
                                                                            <p style="margin: 0; text-align: center; mso-line-height-alt: 27px;"><span style="font-size:18px;color:#6d67cf;">Your Order Confirmation OTP.</span></p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <table border="0" cellpadding="20" cellspacing="0" class="divider_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                                            <tr>
                                                                <td>
                                                                    <div align="center">
                                                                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="80%">
                                                                            <tr>
                                                                                <td class="divider_inner" style="font-size: 1px; line-height: 1px; border-top: 1px solid #b6b4fc;"><span> </span></td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <table border="0" cellpadding="20" cellspacing="0" class="image_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                                            <tr>
                                                                <td>
                                                                    <div align="center" style="line-height:10px"><img alt="Forgot your password?" src="https://i.ibb.co/gMFYwj5/Shangar2.png" style="display: block; height: auto; border: 0; width: 325px; max-width: 100%;" title="Forgot your password?" width="325"/></div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <table border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
                                                            <tr>
                                                                <td style="padding-bottom:15px;padding-left:10px;padding-right:10px;padding-top:10px;">
                                                                    <div style="font-family: Arial, sans-serif">
                                                                        <div style="font-size: 12px; font-family: "Cabin", Arial, "Helvetica Neue", Helvetica, sans-serif; mso-line-height-alt: 14.399999999999999px; color: #393d47; line-height: 1.2;">
                                                                            <p style="margin: 0; font-size: 14px; text-align: center;"><span style="font-size:10px;color:#6d67cf;"><span style="">Please do not reply to this email.</span></span></p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <table border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
                                                            <tr>
                                                                <td style="padding-bottom:20px;padding-left:10px;padding-right:10px;padding-top:10px;">
                                                                    <div style="font-family: sans-serif">
                                                                        <div style="font-size: 12px; mso-line-height-alt: 14.399999999999999px; color: #393d47; line-height: 1.2; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;">
                                                                            <p style="margin: 0; font-size: 14px; text-align: center;"><span style="color:#403b8f;">Copyright © 2022 </span></p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-3" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f3e6f8;" width="100%">
                            <tbody>
                                <tr>
                                    <td>
                                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 650px;" width="650">
                                            <tbody>
                                                <tr>
                                                    <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 10px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
                                                        <table border="0" cellpadding="5" cellspacing="0" class="divider_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                                            <tr>
                                                                <td>
                                                                    <div align="center">
                                                                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                                                            <tr>
                                                                                <td class="divider_inner" style="font-size: 1px; line-height: 1px; border-top: 0px solid #BBBBBB;"><span> </span></td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table><!-- End -->
    </body>
</html>';
                    $this->md->my_mailer( $email , $subject , $msg );
                    
                }
                
                redirect('order-confirmation');
                
            }
        }
        
        $data['cart'] = $this->md->my_select('tbl_cart','*',$wh);
        
        $this->load->view('check_out',$data);
    }
    
    public function order_success() 
    {
        $data = array();
        
        //check cart empty or not
        $wh['register_id'] = $this->session->userdata('member');
        $data['cart_data'] = $this->md->my_select('tbl_cart','*',$wh);
        $cart_item = count($data['cart_data']);
        if( $cart_item == 0)
        {
            redirect('view-cart');
        }
        
        // check order is success or not
        if( $this->session->userdata('status') != 1)
        {
            redirect('order-failed');
        }
        else
        {
           
            //gentate bill
            
           $ins['register_id'] = $this->session->userdata('member'); 
           $ins['shipment_id'] = $this->session->userdata('shipment_id'); 
           if( $this->session->userdata('promocode_id') )
           {
               $ins['promocode_id'] = $this->session->userdata('promocode_id'); 
           }
           else
           {
               $ins['promocode_id'] = 0;
           }
           $ins['bill_date'] =  date('Y-m-d');
           $ins['amount'] =  $this->session->userdata('bill_amount');
           $ins['pay_type'] =  $this->session->userdata('paytype');
           if( $this->session->userdata('paytype') == "online" )
           {
               $ins['payment_id'] = $this->session->userdata('razorpay_payment_id'); 
               $ins['order_id'] = $this->session->userdata('merchant_order_id'); 
           }
           else
           {
               $ins['payment_id'] =''; 
               $ins['order_id'] = "Sha_".date('Y-m-d').time();
           }
           $ins['status'] = 0; 
           
           $result = $this->md->my_insert('tbl_bill',$ins);
           if( $result == 1)
           {
              $bill_id = $this->md->my_query("SELECT MAX(`bill_id`) as mx FROM `tbl_bill` ")[0]->mx;
              
              $cartdata = $this->md->my_select('tbl_cart','*',array('register_id' => $this->session->userdata('member')));
              foreach ( $cartdata as $item ) 
              {
                  //store data in 
                  $ins2['bill_id'] = $bill_id;
                  $ins2['product_id'] = $item->product_id;
                  $ins2['image_id'] = $item->image_id;
                  $ins2['gross_price'] = $item->gross_price;
                  $ins2['discount'] = $item->discount;
                  $ins2['net_price'] = $item->net_price;
                  $ins2['qty'] = $item->qty;
                  $ins2['total_price'] = $item->total_price;
                  
                  
                  $this->md->my_insert('tbl_transaction',$ins2);
                  
                  
                  //get quantity
                  $old_qty = $this->md->my_select('tbl_product_image','*',array('image_id'=>$item->image_id))[0]->qty;
                  
                  
                  //update quantity
                  $current_qty = $item->qty;
                  $new_qty = $old_qty - $current_qty;
                  $this->md->my_update('tbl_product_image',array('qty'=>$new_qty),array('image_id'=>$item->image_id));
                  
                  //remove data from cart
                  $this->md->my_delete('tbl_cart',array('cart_id'=>$item->cart_id));   
              }
           }
        }
        
        if( $this->session->userdata('paytype') == "online")
        {
         $data['payment_id'] = $this->session->userdata('razorpay_payment_id');   
        }
        $data['order_id'] = $ins['order_id'];
        $data['paytype'] = $this->session->userdata('paytype');
        
        //unset unnessasary
        $this->session->unset_userdata('bill_amount');
        $this->session->unset_userdata('shipment_id');
        $this->session->unset_userdata('paytype');
        $this->session->unset_userdata('promocode_id');
        $this->session->unset_userdata('razorpay_payment_id');
        $this->session->unset_userdata('merchant_order_id');
        $this->session->unset_userdata('status');
        
        
        $this->load->view('order_success',$data);
    }
    
    public function order_failed() {
        
        $data = array();
        
        //check cart empty or not
        $wh['register_id'] = $this->session->userdata('member');
        $data['cart_data'] = $this->md->my_select('tbl_cart','*',$wh);
        $cart_item = count($data['cart_data']);
        if( $cart_item == 0)
        {
            redirect('view-cart');
        }
        
        if( $this->session->userdata('status') == 1)
        {
            redirect('order-success');
        }
        else
        {
        
           $data['razorpay_payment_id'] = $this->session->userdata('razorpay_payment_id');
           $data['merchant_order_id'] = $this->session->userdata('merchant_order_id');
            
        }
        
        
        $this->load->view('order_failed',$data);
    }
    
    public function order_confirmation() 
    {
        
        $data = array();
        
        //check cart empty or not
        $wh['register_id'] = $this->session->userdata('member');
        $data['cart_data'] = $this->md->my_select('tbl_cart','*',$wh);
        
        $cart_item = count($data['cart_data']);
        if( $cart_item == 0)
        {
            redirect('view-cart');
        }
        
        //cod verify
        if( $this->input->post('verify'))
        {
            $send_otp = $this->session->userdata('otp');
            $user_otp = $this->input->post('otp');
            
            if( $user_otp == $send_otp )
            {
                $this->session->unset_userdata('otp');
                $this->session->set_userdata('status',1);
                redirect('order-success');
            }
            else
            {
                $data['err'] = "OTP not match.";
            }
        }
        
        //razorpay perameter
        $data['return_url'] = site_url().'pages/callback';
        $data['surl'] = site_url('order-success');
        $data['furl'] = site_url('order-failed');
        $data['currency_code'] = 'INR';
        
        $this->load->view('order_confirmation',$data);
    }
    
    // initialized cURL Request
    private function get_curl_handle($payment_id, $amount)  {
        $url = 'https://api.razorpay.com/v1/payments/'.$payment_id.'/capture';
        $key_id = RAZOR_KEY_ID;
        $key_secret = RAZOR_KEY_SECRET;
        $fields_string = "amount=$amount";
        //cURL Request
        $ch = curl_init();
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERPWD, $key_id.':'.$key_secret);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_CAINFO, dirname(__FILE__).'/ca-bundle.crt');
        return $ch;
    }   
        
    // callback method
    public function callback() {        
        if (!empty($this->input->post('razorpay_payment_id')) && !empty($this->input->post('merchant_order_id'))) {
            $razorpay_payment_id = $this->input->post('razorpay_payment_id');
            $merchant_order_id = $this->input->post('merchant_order_id');
            
            $this->session->set_userdata('razorpay_payment_id', $this->input->post('razorpay_payment_id'));
            $this->session->set_userdata('merchant_order_id', $this->input->post('merchant_order_id'));
            
            $currency_code = 'INR';
            $amount = $this->input->post('merchant_total');
            $success = false;
            $error = '';
            try {                
                $ch = $this->get_curl_handle($razorpay_payment_id, $amount);
                //execute post
                $result = curl_exec($ch);
                
                //check success or not
                if( $http_status == 0)
                {
                    $this->session->set_userdata('status',1);
                }
                else
                {
                    $this->session->set_userdata('status',0);
                }
                
                $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                if ($result === false) {
                    $success = false;
                    $error = 'Curl error: '.curl_error($ch);
                } else {
                    $response_array = json_decode($result, true);
                   // echo "<pre>";print_r($response_array);exit;
                        //Check success response
                        if ($http_status === 200 and isset($response_array['error']) === false) {
                            $success = true;
                        } else {
                            $success = false;
                            if (!empty($response_array['error']['code'])) {
                                $error = $response_array['error']['code'].':'.$response_array['error']['description'];
                            } else {
                                $error = 'RAZORPAY_ERROR:Invalid Response <br/>'.$result;
                            }
                        }
                }
                //close connection
                curl_close($ch);
            } catch (Exception $e) {
                $success = false;
                $error = 'OPENCART_ERROR:Request to Razorpay Failed';
            }
            if ($success === true) {
                if(!empty($this->session->userdata('ci_subscription_keys'))) {
                    $this->session->unset_userdata('ci_subscription_keys');
                 }
                if (!$order_info['order_status_id']) {
                    redirect($this->input->post('merchant_surl_id'));
                } else {
                    redirect($this->input->post('merchant_surl_id'));
                }

            } else {
                redirect($this->input->post('merchant_furl_id'));
            }
        } else {
            echo 'An error occured. Contact site administrator, please!';
        }
    }
    
    public function resend_otp() 
    {
        //check user is login
        if( !$this->session->userdata('member'))
        {
            redirect('login');
        }
        
        //check cart empty or not
        $wh['register_id'] = $this->session->userdata('member');
        $data['cart_data'] = $this->md->my_select('tbl_cart','*',$wh);
        
        $cart_item = count($data['cart_data']);
        if( $cart_item == 0)
        {
            redirect('view-cart');
        }
        
        //generate otp and send mail
        $otp = rand(100000,999999);
        $this->session->set_userdata('otp',$otp);
                    
        $whh['register_id'] = $this->session->userdata('member');
        $member = $this->md->my_select('tbl_register','*',$whh)[0];

        $email = $member->email;
        $name = $member->name;
        $subject = "One time Password For confirmation";
        $msg= '<!DOCTYPE html>

<html lang="en" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">
    <head>
        <title></title>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml><![endif]-->
        <!--[if !mso]><!-->
        <link href="<?php echo base_url(); ?>https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css"/>
        <!--<![endif]-->
        <style>
            * {
                box-sizing: border-box;
            }

            body {
                margin: 0;
                padding: 0;
            }

            a[x-apple-data-detectors] {
                color: inherit !important;
                text-decoration: inherit !important;
            }

            #MessageViewBody a {
                color: inherit;
                text-decoration: none;
            }

            p {
                line-height: inherit
            }

            @media (max-width:670px) {
                .icons-inner {
                    text-align: center;
                }

                .icons-inner td {
                    margin: 0 auto;
                }

                .row-content {
                    width: 100% !important;
                }

                .column .border {
                    display: none;
                }

                .stack .column {
                    width: 100%;
                    display: block;
                }
            }
        </style>
    </head>
    <body style="background-color: #000000; margin: 0; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">
        <table border="0" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #000000;" width="100%">
            <tbody>
                <tr>
                    <td>
                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-2" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f3e6f8;" width="100%">
                            <tbody>
                                <tr>
                                    <td>
                                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #d4d0ff; background-image: url(https://i.ibb.co/3c7LZq0/bg-white-rombo2.png); background-repeat: no-repeat; color: #000000; width: 650px;" width="650">
                                            <tbody>
                                                <tr>
                                                    <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 45px; padding-bottom: 0px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
                                                        <table border="0" cellpadding="20" cellspacing="0" class="divider_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                                            <tr>
                                                                <td>
                                                                    <div align="center">
                                                                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                                                            <tr>
                                                                                <td class="divider_inner" style="font-size: 1px; line-height: 1px; border-top: 0px solid #BBBBBB;"><span> </span></td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <table border="0" cellpadding="0" cellspacing="0" class="heading_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                                            <tr>
                                                                <td style="padding-top:35px;text-align:center;width:100%;">
                                                                    <h1 style="margin: 0; color: #1213c0; direction: ltr; font-family: "Cabin", Arial, "Helvetica Neue", Helvetica, sans-serif; font-size: 28px; font-weight: normal; letter-spacing: normal; line-height: 120%; text-align: center; margin-top: 0; margin-bottom: 0;"><strong>Hello '.$name.'</strong></h1>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <table border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
                                                            <tr>
                                                                <td style="padding-left:45px;padding-right:45px;padding-top:10px;">
                                                                    <div style="font-family: Arial, sans-serif">
                                                                        <div style="font-size: 12px; font-family: "Cabin", Arial, "Helvetica Neue", Helvetica, sans-serif; mso-line-height-alt: 18px; color: #393d47; line-height: 1.5;">
                                                                            <p style="margin: 0; text-align: center; mso-line-height-alt: 27px;"><span style="font-size:18px;color:#6d67cf;">'.$otp.'</span></p>
                                                                            <p style="margin: 0; text-align: center; mso-line-height-alt: 27px;"><span style="font-size:18px;color:#6d67cf;">Your Order Confirmation OTP.</span></p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <table border="0" cellpadding="20" cellspacing="0" class="divider_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                                            <tr>
                                                                <td>
                                                                    <div align="center">
                                                                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="80%">
                                                                            <tr>
                                                                                <td class="divider_inner" style="font-size: 1px; line-height: 1px; border-top: 1px solid #b6b4fc;"><span> </span></td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <table border="0" cellpadding="20" cellspacing="0" class="image_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                                            <tr>
                                                                <td>
                                                                    <div align="center" style="line-height:10px"><img alt="Forgot your password?" src="https://i.ibb.co/gMFYwj5/Shangar2.png" style="display: block; height: auto; border: 0; width: 325px; max-width: 100%;" title="Forgot your password?" width="325"/></div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <table border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
                                                            <tr>
                                                                <td style="padding-bottom:15px;padding-left:10px;padding-right:10px;padding-top:10px;">
                                                                    <div style="font-family: Arial, sans-serif">
                                                                        <div style="font-size: 12px; font-family: "Cabin", Arial, "Helvetica Neue", Helvetica, sans-serif; mso-line-height-alt: 14.399999999999999px; color: #393d47; line-height: 1.2;">
                                                                            <p style="margin: 0; font-size: 14px; text-align: center;"><span style="font-size:10px;color:#6d67cf;"><span style="">Please do not reply to this email.</span></span></p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <table border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
                                                            <tr>
                                                                <td style="padding-bottom:20px;padding-left:10px;padding-right:10px;padding-top:10px;">
                                                                    <div style="font-family: sans-serif">
                                                                        <div style="font-size: 12px; mso-line-height-alt: 14.399999999999999px; color: #393d47; line-height: 1.2; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;">
                                                                            <p style="margin: 0; font-size: 14px; text-align: center;"><span style="color:#403b8f;">Copyright © 2022 </span></p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-3" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f3e6f8;" width="100%">
                            <tbody>
                                <tr>
                                    <td>
                                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 650px;" width="650">
                                            <tbody>
                                                <tr>
                                                    <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 10px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
                                                        <table border="0" cellpadding="5" cellspacing="0" class="divider_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                                            <tr>
                                                                <td>
                                                                    <div align="center">
                                                                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                                                            <tr>
                                                                                <td class="divider_inner" style="font-size: 1px; line-height: 1px; border-top: 0px solid #BBBBBB;"><span> </span></td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table><!-- End -->
    </body>
</html>';
        $this->md->my_mailer( $email , $subject , $msg );
                    
        redirect('order-confirmation');
    }
    public function page_not_found() {
        
        $this->load->view('page_not_found');
    }
    
}
