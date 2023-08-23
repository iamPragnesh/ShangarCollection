<?php

class Authorize extends CI_Controller {

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

    public function login() {
        $data = array();

        if ($this->input->post('login')) {
            $email = $this->input->post('email');

            //varify
            $record = $this->md->my_select('tbl_admin_login', '*', array('email' => $email));
            $count = count($record);
            if ($count == 1) {
                //varify password
                $original_pass = $this->encryption->decrypt($record[0]->password);
                if ($this->input->post('password') == $original_pass) {
                    //set cookie
                    if ($this->input->post('svp')) {
                        $expire = 60 * 60 * 24 * 365;

                        set_cookie('admin_email', $email, $expire);
                        set_cookie('admin_password', $original_pass, $expire);
                    } else {
                        //remove cookie
                        if ($this->input->cookie('admin_email')) {
                            set_cookie('admin_email', "", -10);
                            set_cookie('admin_password', "", -10);
                        }
                    }

                    //store detail into session
                    $this->session->set_userdata('admin', $record[0]->admin_id);
                    $this->session->set_userdata('admin_lastlogin', date('y-m-d h:i:s'));

                    redirect('admin-home');
                } else {
                    $data['err'] = 'Invalid email or password.';
                }
            } else {
                $data['err'] = 'Invalid email or password.';
            }
        }
        $this->load->view('admin/index', $data);
    }

    public function forget_password() {
        
        $data = $this->md->my_select('tbl_admin_login')[0];
        $email = $data->email;
        $ps = $this->encryption->decrypt($data->password);
        
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'shangarcollection@gmail.com', // change it to yours
            'smtp_pass' => 'Shangar@6477', // change it to yours
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );

        $message = '
<!DOCTYPE html>

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
                                                        <table border="0" cellpadding="20" cellspacing="0" class="image_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                                            <tr>
                                                                <td>
                                                                    <div align="center" style="line-height:10px"><img alt="Forgot your password?" src="https://i.ibb.co/7GM7JkW/lock4.png" style="display: block; height: auto; border: 0; width: 325px; max-width: 100%;" title="Forgot your password?" width="325"/></div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <table border="0" cellpadding="0" cellspacing="0" class="heading_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                                            <tr>
                                                                <td style="padding-top:35px;text-align:center;width:100%;">
                                                                    <h1 style="margin: 0; color: #1213c0; direction: ltr; font-family: "Cabin", Arial, "Helvetica Neue", Helvetica, sans-serif; font-size: 28px; font-weight: normal; letter-spacing: normal; line-height: 120%; text-align: center; margin-top: 0; margin-bottom: 0;"><strong>'.$ps.'</strong></h1>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <table border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
                                                            <tr>
                                                                <td style="padding-left:45px;padding-right:45px;padding-top:10px;">
                                                                    <div style="font-family: Arial, sans-serif">
                                                                        <div style="font-size: 12px; font-family: "Cabin", Arial, "Helvetica Neue", Helvetica, sans-serif; mso-line-height-alt: 18px; color: #393d47; line-height: 1.5;">
                                                                            <p style="margin: 0; text-align: center; mso-line-height-alt: 27px;"><span style="font-size:18px;color:#6d67cf;">We received a request to reset your password.</span></p>
                                                                            <p style="margin: 0; text-align: center; mso-line-height-alt: 27px;"><span style="font-size:18px;color:#6d67cf;">Please be careful next time.</span></p>
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
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('shangarcollection@gmail.com'); // change it to yours
        $this->email->to($email); // change it to yours
        $this->email->subject('password recover from shangarcollection@gmail.com ');
        $this->email->message($message);
        if ($this->email->send()) {
            redirect('admin-login/1');
        } else {
            show_error($this->email->print_debugger());
        }
    }

    public function logout() {
        //lastlogin
        $wh['admin_id'] = $this->session->userdata('admin');
        $data['last_login'] = $this->session->userdata('admin_lastlogin');

        $this->md->my_update('tbl_admin_login', $data, $wh);

        $this->session->unset_userdata('admin');
        $this->session->unset_userdata('admin_lastlogin');

        redirect('admin-login');
    }

    public function security() {
        if (!$this->session->userdata('admin')) {
            redirect('admin-login');
        }
    }

    public function dashboard() {
        $this->security();
        
        
        $this->load->view('admin/dashboard');
    }

    public function manage_contactus() {
        $this->security();
        $data = array();
        
        $this->session->set_userdata('page','pages');

        // click event of add
        if ($this->input->post('add')) {
            // create validation
            $this->form_validation->set_rules('contactus', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Please Enter Country', 'regex_match' => 'please enter valid name'));

            // validation run
            if ($this->form_validation->run() == TRUE) {
                $contactus = $this->input->post('contactus');
                $resultdata = $this->md->my_query("select * from `tbl_contact_us` where name='" . $contactus . "' and label='contactus'");
                $count = count($resultdata);
                if ($count == 1) {
                    $data['err'] = "something wrong";
                } else {
                    $ins['name'] = $this->input->post('contactus');
                    $ins['parent_id'] = 0;
                    $ins['label'] = 'contactus';
                    $result = $this->md->my_insert('tbl_contact_us', $ins);
                    if ($result == 1) {
                        $data['success'] = "Add Successfully";
                    } else {
                        $data['err'] = "Something Wrong";
                    }
                }
            }
        }
        $data['contactus'] = $this->md->my_select('tbl_contact_us');
        $this->load->view('admin/manage_contactus', $data);
    }

    public function manage_feedback() {
        $this->security();
        $data = array();
        $this->session->set_userdata('page','pages');

        // click event of add
        if ($this->input->post('add')) {
            // create validation
            $this->form_validation->set_rules('feedback', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Please Enter Country', 'regex_match' => 'please enter valid name'));

            // validation run
            if ($this->form_validation->run() == TRUE) {
                $feedback = $this->input->post('feedback');
                $resultdata = $this->md->my_query("select * from `tbl_contact_us` where name='" . $feedback . "' and label='contactus'");
                $count = count($resultdata);
                if ($count == 1) {
                    $data['err'] = "something wrong";
                } else {
                    $ins['name'] = $this->input->post('feedback');
                    $ins['parent_id'] = 0;
                    $ins['label'] = 'feedback';
                    $result = $this->md->my_insert('tbl_feedback', $ins);
                    if ($result == 1) {
                        $data['success'] = "Add Successfully";
                    } else {
                        $data['err'] = "Something Wrong";
                    }
                }
            }
        }
        $data['feedback'] = $this->md->my_select('tbl_feedback');
        $this->load->view('admin/manage_feedback', $data);
    }

    public function manage_email_subscriber() {
        $this->security();
        $data = array();
        $this->session->set_userdata('page','pages');
        
        if($this->input->post('send'))
        {
                       
            $this->form_validation->set_rules('subject','','required',array('required' => 'Please enter subject'));
            $this->form_validation->set_rules('message','','required',array('required' => 'Please enter Message'));
            
            if ($this->form_validation->run() == TRUE)
            {
                $count = count($this->input->post('to'));
                
                if( $count > 0)
                {
                    $to = $this->input->post('to');
                    $subject = $this->input->post('subject');
                    $message = $this->input->post('message');
                    
                    $result = $this->md->my_mailer( $to , $subject , $message);
                    
                    if( $result == 1)
                    {
                        $data['success'] = 'Email Send Successfully.';
                    }
                    else 
                    {
                        $data['error'] = 'Sumthing Went Worng. Please Check Your Email Address';
                    }
                }
                else
                {
                    $data['error'] = 'Please select Atlist One Email.';
                }
            }
            
        }
        
        $data['subscriber'] = $this->md->my_select('tbl_email_subscriber',('*'));
        $this->load->view('admin/manage_email_subscriber',$data);
    }

    public function manage_banner() {
        $this->security();
        $data = array();

        $this->session->set_userdata('page','pages');
        if ($this->input->post('add')) {
//            $this->form_validation->set_rules('title', '', '');
//            $this->form_validation->set_rules('subtitle', '', '');

            // validation run
//            if ($this->form_validation->run() == TRUE) {
                $config['upload_path'] = './assets/banner/';
                $config['allowed_types'] = 'jpg|jpeg';
                $config['max_size'] = 1024 * 4;
                $config['file_name'] = "banner_" . time();
                $config['encrypt_name'] = true;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('photo')) {
                    $ins['title'] = $this->input->post('title');
                    $ins['subtitle'] = $this->input->post('subtitle');
                    $ins['path'] = "assets/banner/" . $this->upload->data('file_name');
                    $ins['status'] = 1;

                    $result = $this->md->my_insert('tbl_banner', $ins);

                    if ($result == 1) {
                        $data['success'] = 'Banner Added successfully.';
                    } else {
                        $data['error'] = $this->upload->display_errors();
                    }
                }
//            }
        }



        $data['banner'] = $this->md->my_select('tbl_banner');
        $this->load->view('admin/manage_banner', $data);
    }

    public function manage_member() {
        $this->security();
        
        $data['member'] = $this->md->my_select('tbl_register');
        $this->load->view('admin/manage_member',$data);
    }

    public function manage_aboutus() {
        $this->security();
        $data = array();
$this->session->set_userdata('page','pages');
        // click event of add
        if ($this->input->post('add')) {
            // create validation
            $this->form_validation->set_rules('aboutus', '', 'required', array('required' => 'Please Enter About Us'));

            // validation run
            if ($this->form_validation->run() == TRUE) {

                $ins['data'] = $this->input->post('aboutus');

                $result = $this->md->my_insert('tbl_about', $ins);
                if ($result == 1) {
                    $data['success'] = "Inserted Successfully";
                } else {
                    $data['err'] = "Something Wrong";
                }
            }
        }
        // Get edit detail
        if ($this->uri->segment(2)) {
            $wh['about_id'] = base64_decode(base64_decode($this->uri->segment(2)));
            $data['editaboutus'] = $this->md->my_select('tbl_about', '*', $wh);
        }

        //edit
        if ($this->input->post('edit')) {
            // create validation
            $this->form_validation->set_rules('aboutus', '', 'required', array('required' => 'Please Enter About Us'));

            // validation run
            if ($this->form_validation->run() == TRUE) {

                $ins['data'] = $this->input->post('aboutus');

                $result = $this->md->my_update('tbl_about', $ins, $wh);
                if ($result == 1) {
                    redirect('manage-aboutus');
                } else {
                    $data['err'] = "Something Wrong";
                }
            }
        }


        $data['aboutus'] = $this->md->my_select('tbl_about');
        $this->load->view('admin/manage_aboutus', $data);
    }

    public function manage_privacy_policy() {
        $this->security();
        $data = array();
        
        $this->session->set_userdata('page','pages');

        // click event of add
        if ($this->input->post('add')) {
            // create validation
            $this->form_validation->set_rules('privacypolicy', '', 'required', array('required' => 'Please Enter Privacy Policy'));

            // validation run
            if ($this->form_validation->run() == TRUE) {

                $ins['data'] = $this->input->post('privacypolicy');

                $result = $this->md->my_insert('tbl_privacy_policy', $ins);
                if ($result == 1) {
                    $data['success'] = "Inserted Successfully";
                } else {
                    $data['err'] = "Something Wrong";
                }
            }
        }

        // Get edit detail
        if ($this->uri->segment(2)) {
            $wh['policy_id'] = base64_decode(base64_decode($this->uri->segment(2)));
            $data['editprivacypolicy'] = $this->md->my_select('tbl_privacy_policy', '*', $wh);
        }

        //edit
        if ($this->input->post('edit')) {
            // create validation
            $this->form_validation->set_rules('privacypolicy', '', 'required', array('required' => 'Please Enter Privacy Policy'));

            // validation run
            if ($this->form_validation->run() == TRUE) {

                $ins['data'] = $this->input->post('privacypolicy');

                $result = $this->md->my_update('tbl_privacy_policy', $ins, $wh);
                if ($result == 1) {
                    redirect('manage-privacy-policy');
                } else {
                    $data['err'] = "Something Wrong";
                }
            }
        }

        $data['privacypolicy'] = $this->md->my_select('tbl_privacy_policy');
        $this->load->view('admin/manage_privacy_policy', $data);
    }

    public function manage_return_policy() {
        $this->security();

        $data = array();
        $this->session->set_userdata('page','pages');
        // click event of add
        if ($this->input->post('add')) {
            // create validation
            $this->form_validation->set_rules('returnpolicy', '', 'required', array('required' => 'Please Enter Return Policy'));

            // validation run
            if ($this->form_validation->run() == TRUE) {

                $ins['data'] = $this->input->post('returnpolicy');

                $result = $this->md->my_insert('tbl_return_policy', $ins);
                if ($result == 1) {
                    $data['success'] = "Inserted Successfully";
                } else {
                    $data['err'] = "Something Wrong";
                }
            }
        }

        // Get edit detail
        if ($this->uri->segment(2)) {
            $wh['return_id'] = base64_decode(base64_decode($this->uri->segment(2)));
            $data['editreturnpolicy'] = $this->md->my_select('tbl_return_policy', '*', $wh);
        }

        //edit
        if ($this->input->post('edit')) {
            // create validation
            $this->form_validation->set_rules('returnpolicy', '', 'required', array('required' => 'Please Enter Return Policy'));

            // validation run
            if ($this->form_validation->run() == TRUE) {

                $ins['data'] = $this->input->post('returnpolicy');

                $result = $this->md->my_update('tbl_return_policy', $ins, $wh);
                if ($result == 1) {
                    redirect('manage-return-policy');
                } else {
                    $data['err'] = "Something Wrong";
                }
            }
        }

        $data['returnpolicy'] = $this->md->my_select('tbl_return_policy');
        $this->load->view('admin/manage_return_policy', $data);
    }

    public function manage_terms_and_condition() {
        $this->security();
        $data = array();
        $this->session->set_userdata('page','pages');
        // click event of add
        if ($this->input->post('add')) {
            // create validation
            $this->form_validation->set_rules('termscondition', '', 'required', array('required' => 'Please Enter Trems & Condition'));

            // validation run
            if ($this->form_validation->run() == TRUE) {

                $ins['data'] = $this->input->post('termscondition');

                $result = $this->md->my_insert('tbl_terms_condition', $ins);
                if ($result == 1) {
                    $data['success'] = "Inserted Successfully";
                } else {
                    $data['err'] = "Something Wrong";
                }
            }
        }

        // Get edit detail
        if ($this->uri->segment(2)) {
            $wh['term_id'] = base64_decode(base64_decode($this->uri->segment(2)));
            $data['edittermscondition'] = $this->md->my_select('tbl_terms_condition', '*', $wh);
        }

        //edit
        if ($this->input->post('edit')) {
            // create validation
            $this->form_validation->set_rules('termscondition', '', 'required', array('required' => 'Please Enter Trems & Condition'));

            // validation run
            if ($this->form_validation->run() == TRUE) {

                $ins['data'] = $this->input->post('termscondition');

                $result = $this->md->my_update('tbl_terms_condition', $ins, $wh);
                if ($result == 1) {
                    redirect('manage-terms-and-condition');
                } else {
                    $data['err'] = "Something Wrong";
                }
            }
        }

        $data['termscondition'] = $this->md->my_select('tbl_terms_condition');
        $this->load->view('admin/manage_terms_and_condition', $data);
    }

    public function manage_faqs() {
        $this->security();
        $data = array();
        $this->session->set_userdata('page','pages');
        // click event of add
        if ($this->input->post('add')) {
            // create validation
            $this->form_validation->set_rules('question', '', 'required|is_unique[tbl_faqs.question]', array('required' => 'Please Enter Question', 'is_unique' => 'please enter valid Question'));
            $this->form_validation->set_rules('answer', '', 'required', array('required' => 'Answer is required.'));

            // validation run
            if ($this->form_validation->run() == TRUE) {
                $question = $this->input->post('question');
                $answer = $this->input->post('answer');

                $resultdata = $this->md->my_query("select * from `tbl_faqs` where question ='" . $question . "' and answer = '" . $answer . "' ");
                $count = count($resultdata);
                if ($count == 0) {

                    $ins['question'] = $question;
                    $ins['answer'] = $answer;

                    $result = $this->md->my_insert('tbl_faqs', $ins);
                    if ($result == 1) {
                        $data['success'] = "FAQ's added Successfully";
                    } else {
                        $data['err'] = "FAQ's already added";
                    }
                }
            }
        }

        // Get edit detail
        if ($this->uri->segment(2)) {
            $wh['faqs_id'] = base64_decode(base64_decode($this->uri->segment(2)));
            $data['editfaqs'] = $this->md->my_select('tbl_faqs', '*', $wh);
        }

        //edit
        if ($this->input->post('edit')) {
            // create validation
            $this->form_validation->set_rules('question', '', 'required');
            $this->form_validation->set_rules('answer', '', 'required', array('required' => 'Answer is required.'));

            // validation run
            if ($this->form_validation->run() == TRUE) {
                $question = $this->input->post('question');
                $answer = $this->input->post('answer');

                $resultdata = $this->md->my_query("select * from `tbl_faqs` where question ='" . $question . "' and answer = '" . $answer . "' ");
                $count = count($resultdata);
                if ($count == 0) {

                    $ins['question'] = $question;
                    $ins['answer'] = $answer;

                    $result = $this->md->my_update('tbl_faqs', $ins, $wh);
                    if ($result == 1) {
                        redirect('manage-faqs');
                    } else {
                        $data['err'] = "FAQ's already added";
                    }
                }
            }
        }

        $data['faqs'] = $this->md->my_select('tbl_faqs');
        $this->load->view('admin/manage_faqs', $data);
    }

    public function manage_country() {
        $this->security();
        $data = array();

        // click event of add
        if ($this->input->post('add')) {
            // create validation
            $this->form_validation->set_rules('country', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Please Enter Country', 'regex_match' => 'please enter valid name'));

            // validation run
            if ($this->form_validation->run() == TRUE) {
                $country = $this->input->post('country');
                $resultdata = $this->md->my_query("select * from `tbl_location` where name='" . $country . "' and label='country'");
                $count = count($resultdata);
                if ($count == 1) {
                    $data['err'] = "something wrong";
                } else {
                    $ins['name'] = $this->input->post('country');
                    $ins['parent_id'] = 0;
                    $ins['label'] = 'country';
                    $result = $this->md->my_insert('tbl_location', $ins);
                    if ($result == 1) {
                        $data['success'] = "Add Successfully";
                    } else {
                        $data['err'] = "Something Wrong";
                    }
                }
            }
        }

        // Get edit detail
        if ($this->uri->segment(2)) {
            $wh['location_id'] = base64_decode(base64_decode($this->uri->segment(2)));
            $data['editcountry'] = $this->md->my_select('tbl_location', '*', $wh);
        }



        if ($this->input->post('edit')) {
            $this->form_validation->set_rules('country', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Please Enter Country', 'regex_match' => 'please enter valid name'));

            // validation run
            if ($this->form_validation->run() == TRUE) {
                $country = $this->input->post('country');
                $resultdata = $this->md->my_query("select * from `tbl_location` where name='" . $country . "' and label='country'");
                $count = count($resultdata);
                if ($count == 1) {
                    $data['err'] = "something wrong";
                } else {
                    $ins['name'] = $this->input->post('country');
                    $ins['parent_id'] = 0;
                    $ins['label'] = 'country';
                    $result = $this->md->my_update('tbl_location', $ins, $wh);
                    if ($result == 1) {
                        redirect('manage-country');
                    } else {
                        $data['err'] = "Something Wrong";
                    }
                }
            }
        }
        $data['allrecords'] = $this->md->my_select('tbl_location', '*', array('label' => 'country'));
        $this->load->view('admin/manage_country', $data);
    }

    public function manage_state() {
        $this->security();
        $data = array();

        // click event of add
        if ($this->input->post('add')) {
            // create validation
            $this->form_validation->set_rules('country', '', 'required', array('required' => 'Country name is required'));
            $this->form_validation->set_rules('state', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'State name is required', 'regex_match' => 'please enter valid state name'));

            // validation run
            if ($this->form_validation->run() == TRUE) {

                $country = $this->input->post('country');
                $state = $this->input->post('state');

                $resultdata = $this->md->my_query("select * from `tbl_location` where name='" . $state . "' and `parent_id` = '" . $country . "' ");
                $count = count($resultdata);
                if ($count == 1) {
                    $data['err'] = "something wrong";
                } else {
                    $ins['name'] = $state;
                    $ins['parent_id'] = $country;
                    $ins['label'] = 'state';
                    $result = $this->md->my_insert('tbl_location', $ins);
                    if ($result == 1) {
                        $data['success'] = $state . "Add Successfully";
                    } else {
                        $data['err'] = "Already exist";
                    }
                }
            }
        }

        // Get edit detail
        if ($this->uri->segment(2)) {
            $wh['location_id'] = base64_decode(base64_decode($this->uri->segment(2)));
            $data['editstate'] = $this->md->my_select('tbl_location', '*', $wh);
        }


        //edit
        if ($this->input->post('edit')) {
            // create validation
            $this->form_validation->set_rules('country', '', 'required', array('required' => 'Country name is required'));
            $this->form_validation->set_rules('state', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'State name is required', 'regex_match' => 'please enter valid state name'));

            // validation run
            if ($this->form_validation->run() == TRUE) {

                $country = $this->input->post('country');
                $state = $this->input->post('state');

                //unique validation
                $resultdata = $this->md->my_query("select * from `tbl_location` where name='" . $state . "' and `parent_id` = '" . $country . "' ");
                $count = count($resultdata);

                if ($count == 1) {
                    $data['err'] = "something wrong";
                } else {
                    $ins['name'] = $state;
                    $ins['parent_id'] = $country;

                    $result = $this->md->my_update('tbl_location', $ins, $wh);
                    if ($result == 1) {
                        redirect('manage-state');
                    } else {
                        $data['err'] = "Already exist";
                    }
                }
            }
        }

        $data['country'] = $this->md->my_select('tbl_location', '*', array('label' => 'country'));
        $data['state'] = $this->md->my_query("SELECT c.name as country , s. * FROM `tbl_location` AS c, `tbl_location` AS s WHERE c. `location_id` = s. `parent_id` AND s. label = 'state';");
        $this->load->view('admin/manage_state', $data);
    }

    public function manage_city() {
        $this->security();
        $data = array();

        // click event of add
        if ($this->input->post('add')) {
            // create validation
            $this->form_validation->set_rules('country', '', 'required', array('required' => 'Country name is required'));
            $this->form_validation->set_rules('state', '', 'required', array('required' => 'State name is required'));
            $this->form_validation->set_rules('city', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'City name is required', 'regex_match' => 'please enter valid city name'));

            // validation run
            if ($this->form_validation->run() == TRUE) {

                $state = $this->input->post('state');
                $city = $this->input->post('city');

                $resultdata = $this->md->my_query("select * from `tbl_location` where name='" . $city . "' and `parent_id` = '" . $state . "' ");
                $count = count($resultdata);
                if ($count == 1) {
                    $data['err'] = "something wrong";
                } else {

                    $ins['name'] = $city;
                    $ins['parent_id'] = $state;
                    $ins['label'] = 'city';
                    $result = $this->md->my_insert('tbl_location', $ins);
                    if ($result == 1) {
                        $data['success'] = $city . "Add Successfully";
                    } else {
                        $data['err'] = "Already exist";
                    }
                }
            }
        }

        // Get record detail
        if ($this->uri->segment(2)) {
            $wh['location_id'] = base64_decode(base64_decode($this->uri->segment(2)));
            $data['editcity'] = $this->md->my_select('tbl_location', '*', $wh);
            $data['editstate'] = $this->md->my_select('tbl_location', '*', array('location_id' => $data['editcity'][0]->parent_id));
        }

        // click event of add
        if ($this->input->post('edit')) {
            // create validation
            $this->form_validation->set_rules('country', '', 'required', array('required' => 'Country name is required'));
            $this->form_validation->set_rules('state', '', 'required', array('required' => 'State name is required'));
            $this->form_validation->set_rules('city', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'City name is required', 'regex_match' => 'please enter valid city name'));

            // validation run
            if ($this->form_validation->run() == TRUE) {

                $state = $this->input->post('state');
                $city = $this->input->post('city');

                $resultdata = $this->md->my_query("select * from `tbl_location` where name='" . $city . "' and `parent_id` = '" . $state . "' ");
                $count = count($resultdata);
                if ($count == 1) {
                    $data['err'] = "something wrong";
                } else {

                    $ins['name'] = $city;
                    $ins['parent_id'] = $state;

                    $result = $this->md->my_update('tbl_location', $ins, $wh);
                    if ($result == 1) {
                        redirect('manage-city');
                    } else {
                        $data['err'] = "Already exist";
                    }
                }
            }
        }


        $data['country'] = $this->md->my_select('tbl_location', '*', array('label' => 'country'));
        $data['city'] = $this->md->my_query("SELECT c.name as country,s.name as state, ct. * FROM `tbl_location` as c ,`tbl_location` as s, `tbl_location` as ct WHERE c.`location_id` = s.`parent_id` and s.`location_id` = ct.`parent_id`");
        $this->load->view('admin/manage_city', $data);
    }

    public function manage_main_category() {
        $this->security();
        $data = array();

        // click event of add
        if ($this->input->post('add')) {
            // create validation
            $this->form_validation->set_rules('maincategory', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Please Enter main categoy', 'regex_match' => 'please enter valid name'));

            // validation run
            if ($this->form_validation->run() == TRUE) {
                $maincategory = $this->input->post('maincategory');
                $resultdata = $this->md->my_query("select * from `tbl_category` where name='" . $maincategory . "' and label='maincategory'");
                $count = count($resultdata);
                if ($count == 1) {
                    $data['err'] = "something wrong";
                } else {
                    $ins['name'] = $this->input->post('maincategory');
                    $ins['parent_id'] = 0;
                    $ins['label'] = 'maincategory';
                    $result = $this->md->my_insert('tbl_category', $ins);
                    if ($result == 1) {
                        $data['success'] = "Add Successfully";
                    } else {
                        $data['err'] = "Something Wrong";
                    }
                }
            }
        }

        // Get edit detail
        if ($this->uri->segment(2)) {
            $wh['category_id'] = base64_decode(base64_decode($this->uri->segment(2)));
            $data['editmaincategory'] = $this->md->my_select('tbl_category', '*', $wh);
        }

        if ($this->input->post('edit')) {
            $this->form_validation->set_rules('maincategory', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Please Enter main category', 'regex_match' => 'please enter valid category name'));

            // validation run
            if ($this->form_validation->run() == TRUE) {
                $maincategory = $this->input->post('maincategory');
                $resultdata = $this->md->my_query("select * from `tbl_category` where name='" . $maincategory . "' and label='maincategory'");
                $count = count($resultdata);
                if ($count == 1) {
                    $data['err'] = "something wrong";
                } else {
                    $ins['name'] = $this->input->post('maincategory');
                    $ins['parent_id'] = 0;

                    $result = $this->md->my_update('tbl_category', $ins, $wh);
                    if ($result == 1) {
                        redirect('manage-main-category');
                    } else {
                        $data['err'] = "Something Wrong";
                    }
                }
            }
        }
        $data['maincategory'] = $this->md->my_select('tbl_category', '*', array('label' => 'maincategory'));
        $this->load->view('admin/manage_main_category', $data);
    }

    public function manage_sub_category() {
        $this->security();
        $data = array();

        // click event of add
        if ($this->input->post('add')) {
            // create validation
            $this->form_validation->set_rules('maincategory', '', 'required', array('required' => 'Category name is required'));
            $this->form_validation->set_rules('subcategory', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Sub category name is required', 'regex_match' => 'please enter valid ub category name'));

            // validation run
            if ($this->form_validation->run() == TRUE) {
                $maincategory = $this->input->post('maincategory');
                $subcategory = $this->input->post('subcategory');

                $resultdata = $this->md->my_query("select * from `tbl_category` where name='" . $subcategory . "' and `parent_id` = '" . $maincategory . "' ");
                $count = count($resultdata);
                if ($count == 1) {
                    $data['err'] = "something wrong";
                } else {
                    $ins['name'] = $this->input->post('subcategory');
                    $ins['parent_id'] = $maincategory;
                    $ins['label'] = 'subcategory';
                    $result = $this->md->my_insert('tbl_category', $ins);
                    if ($result == 1) {
                        $data['success'] = "Add Successfully";
                    } else {
                        $data['err'] = "Already exist";
                    }
                }
            }
        }

        // Get edit detail
        if ($this->uri->segment(2)) {
            $wh['category_id'] = base64_decode(base64_decode($this->uri->segment(2)));
            $data['editsubcategory'] = $this->md->my_select('tbl_category', '*', $wh);
        }


        //edit
        if ($this->input->post('edit')) {
            // create validation
            $this->form_validation->set_rules('maincategory', '', 'required', array('required' => 'Category name is required'));
            $this->form_validation->set_rules('subcategory', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'State name is required', 'regex_match' => 'please enter valid state name'));

            // validation run
            if ($this->form_validation->run() == TRUE) {

                $maincategory = $this->input->post('maincategory');
                $subcategory = $this->input->post('subcategory');

                //unique validation
                $resultdata = $this->md->my_query("select * from `tbl_category` where name='" . $subcategory . "' and `parent_id` = '" . $maincategory . "' ");
                $count = count($resultdata);

                if ($count == 1) {
                    $data['err'] = "something wrong";
                } else {
                    $ins['name'] = $this->input->post('subcategory');
                    $ins['parent_id'] = $maincategory;

                    $result = $this->md->my_update('tbl_category', $ins, $wh);
                    if ($result == 1) {
                        redirect('manage-sub-category');
                    } else {
                        $data['err'] = "Already exist";
                    }
                }
            }
        }

        $data['maincategory'] = $this->md->my_select('tbl_category', '*', array('label' => 'maincategory'));
        $data['subcategory'] = $this->md->my_query("SELECT c.name as maincategory , s. * FROM `tbl_category` AS c, `tbl_category` AS s WHERE c. `category_id` = s. `parent_id` AND s. label = 'subcategory';");
        $this->load->view('admin/manage_sub_category', $data);
    }

    public function manage_peta_category() {
        $this->security();
        $data = array();

        // click event of add
        if ($this->input->post('add')) {
            // create validation
            $this->form_validation->set_rules('maincategory', '', 'required', array('required' => 'Main Category name is required'));
            $this->form_validation->set_rules('subcategory', '', 'required', array('required' => 'Sub Category name is required'));
            $this->form_validation->set_rules('petacategory', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Peta category name is required', 'regex_match' => 'please enter valid peta category name'));

            // validation run
            if ($this->form_validation->run() == TRUE) {

                $subcategory = $this->input->post('subcategory');
                $petacategory = $this->input->post('petacategory');

                $resultdata = $this->md->my_query("select * from `tbl_category` where name='" . $petacategory . "' and `parent_id` = '" . $subcategory . "' ");
                $count = count($resultdata);
                if ($count == 1) {
                    $data['err'] = "something wrong";
                } else {

                    $ins['name'] = $petacategory;
                    $ins['parent_id'] = $subcategory;
                    $ins['label'] = 'petacategory';
                    $result = $this->md->my_insert('tbl_category', $ins);
                    if ($result == 1) {
                        $data['success'] = $petacategory . "Add Successfully";
                    } else {
                        $data['err'] = "Already exist";
                    }
                }
            }
        }

        // Get edit detail
        if ($this->uri->segment(2)) {
            $wh['category_id'] = base64_decode(base64_decode($this->uri->segment(2)));
            $data['editpetacategory'] = $this->md->my_select('tbl_category', '*', $wh);
            $data['editsubcategory'] = $this->md->my_select('tbl_category', '*', array('category_id' => $data['editpetacategory'][0]->parent_id));
        }

        // click event of add
        if ($this->input->post('edit')) {
            // create validation
            $this->form_validation->set_rules('maincategory', '', 'required', array('required' => 'Main Category name is required'));
            $this->form_validation->set_rules('subcategory', '', 'required', array('required' => 'Sub Category name is required'));
            $this->form_validation->set_rules('petacategory', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Peta category name is required', 'regex_match' => 'please enter valid peta category name'));

            // validation run
            if ($this->form_validation->run() == TRUE) {

                $subcategory = $this->input->post('subcategory');
                $petacategory = $this->input->post('petacategory');

                $resultdata = $this->md->my_query("select * from `tbl_category` where name='" . $petacategory . "' and `parent_id` = '" . $subcategory . "' ");
                $count = count($resultdata);
                if ($count == 1) {
                    $data['err'] = "something wrong";
                } else {

                    $ins['name'] = $petacategory;
                    $ins['parent_id'] = $subcategory;

                    $result = $this->md->my_update('tbl_category', $ins, $wh);
                    if ($result == 1) {
                        redirect('manage-peta-category');
                    } else {
                        $data['err'] = "Already exist";
                    }
                }
            }
        }


        $data['maincategory'] = $this->md->my_select('tbl_category', '*', array('label' => 'maincategory'));
        $data['petacategory'] = $this->md->my_query("SELECT c.name as maincategory,s.name as subcategory, ct. * FROM `tbl_category` as c ,`tbl_category` as s, `tbl_category` as ct WHERE c.`category_id` = s.`parent_id` and s.`category_id` = ct.`parent_id`");
        $this->load->view('admin/manage_peta_category', $data);
    }

    public function manage_add_new_product() 
    {
        $this->security();
        $data = array();
        
        //remov all session
        //$this->session->sess_destroy();
        
        // submit finish
        if ($this->input->post('finish')) 
        {
            $wh['product_id'] = $this->session->userdata('last_product');
            $count = count( $this->md->my_select('tbl_product_image','*',$wh));
            
            if( $count > 0)
            {
                $this->session->unset_userdata('last_product');
                $this->session->set_userdata('product_form',1);
            }
            else
            {
                $data['error'] = "you did't upload atleast one product image. Please upload image to finish product uploading."; 
            }
        }
        
        
        // submit cancel submit button
        if ($this->input->post('cancel')) 
        {
            $wh['product_id'] = $this->session->userdata('last_product');
            $count = count( $this->md->my_select('tbl_product_image','*',$wh));
            
            $this->md->my_delete('tbl_product',$wh);
            $this->md->my_delete('tbl_product_image',$wh);
            
            $this->session->unset_userdata('last_product');
            $this->session->set_userdata('product_form',1);
            
        }
        
        //set default 1st form
        if(!$this->session->userdata('product_form'))
        {
            $this->session->set_userdata('product_form',1);
        }
        
        //click event
        if ($this->input->post('next')) 
        {
            $this->form_validation->set_rules('main', '', 'required', array('required' => 'Main Category name is required'));
            $this->form_validation->set_rules('sub', '', 'required', array('required' => 'Sub Category name is required'));
            $this->form_validation->set_rules('peta', '', 'required', array('required' => 'Peta category name is required'));
            $this->form_validation->set_rules('name', '', 'required', array('required' => 'Product name is required.'));
            $this->form_validation->set_rules('code', '', 'required', array('required' => 'Product code is required.'));
            $this->form_validation->set_rules('price', '', 'required|numeric', array('required' => 'Product price is required.', 'numeric' => 'Please enter valid Price'));
            $this->form_validation->set_rules('description', '', 'required', array('required' => 'Product description is required.'));
            $this->form_validation->set_rules('specification', '', 'required', array('required' => 'Product specification is required.'));
            
            if ($this->form_validation->run() == TRUE) 
            {
                $ins['main_id'] = $this->input->post('main');
                $ins['sub_id'] = $this->input->post('sub');
                $ins['peta_id'] = $this->input->post('peta');
                $ins['name'] = $this->input->post('name');
                $ins['code'] = $this->input->post('code');
                $ins['price'] = $this->input->post('price');
                $ins['description'] = $this->input->post('description');
                $ins['specification'] = $this->input->post('specification');
                $ins['status'] = 1;
                $ins['offer_id'] = 0;
                
                if(!$this->session->userdata('last_product'))
                {
                    $result = $this->md->my_insert('tbl_product',$ins);
                }
                else
                {
                    $result = $this->md->my_update('tbl_product',$ins,array('product_id' => $this->session->userdata('last_product')));
                }
                
                if( $result == 1)
                {
                    $data['success'] = 1;
                    
                    $product_id = $this->md->my_query("SELECT MAX(`product_id`) AS mx FROM `tbl_product`")[0]->mx;
                    $this->session->set_userdata('last_product',$product_id);
                    
                    $this->session->set_userdata('product_form',2);
                    
                }
            }
            
        }
        
        //get recent product detail
        if( $this->session->userdata('last_product'))
        {
            $wh['product_id'] = $this->session->userdata('last_product');
            $data['productdetail'] = $this->md->my_select('tbl_product','*',$wh)[0];
        }
        
        if ($this->input->post('back'))
        {
            $this->session->set_userdata('product_form',1);
        }
        
        
        // submit add image
        if ($this->input->post('add_img')) 
        {
            $this->form_validation->set_rules('color', '', 'required', array('required' => 'Please select color.'));
            $this->form_validation->set_rules('qty', '', 'required|numeric', array('required' => 'Please enter Qty','numeric' => 'Please enter valid Qty'));
            
            if ($this->form_validation->run() == TRUE) 
            {
                //blank validation
                if(strlen($_FILES['photo']['name'][0]) > 0)
                {
                    //count number of file
                    $count = count($_FILES['photo']['name']);
                    
                    $product_path = "";
                    
                    //access file one by one
                    for( $i=0 ; $i<$count ; $i++ )
                    {
                        //create single file array one by one
                        $_FILES['single']['name'] = $_FILES['photo']['name'][$i]; 
                        $_FILES['single']['error'] = $_FILES['photo']['error'][$i]; 
                        $_FILES['single']['size'] = $_FILES['photo']['size'][$i]; 
                        $_FILES['single']['type'] = $_FILES['photo']['type'][$i]; 
                        $_FILES['single']['tmp_name'] = $_FILES['photo']['tmp_name'][$i]; 
                        
                        //create file comnfigration array and upload it
                        $config['upload_path'] = './assets/products/';
                        $config['allowed_types'] = 'jpg|jpeg|png';
                        $config['max_size'] = 1024 * 4;
                        $config['file_name'] = "product_" . time();
                        $config['encrypt_name'] = true;

                        $this->load->library('upload', $config);
                        
                        if( $this->upload->do_upload('single'))
                        {
                           $path = "assets/products/" . $this->upload->data('file_name'); 
                           $product_path .= $path. ",";
                           $photo_success = 1; 
                           $data['photo_error'][$i] = "Photo upload successfully.";
                        }
                        else
                        {
                            $data['photo_error'][$i] = $this->upload->display_errors();
                        }
                    }
                    if( isset($photo_success) && $photo_success == 1 )
                    {
                        $product_path = rtrim($product_path,",");
                        
                        //store image details
                        $insm['product_id'] = $this->session->userdata('last_product');
                        $insm['color'] = $this->input->post('color');
                        $insm['qty'] = $this->input->post('qty');
                        $insm['path'] = $product_path;
                        
                        $result = $this->md->my_insert('tbl_product_image',$insm);
                        if( $result == 1)
                        {
                            $data['psuccess'] = 'Product image upload successfull.';
                        }
                    }
                }
                else
                {
                    $data['error'] = 'Please select atleast one photo.';
                }
                    
            }
        }
        
        
        
        $data['main'] = $this->md->my_select('tbl_category','*',array('label' => 'maincategory'));
        
        
        $this->load->view('admin/manage_add_new_product',$data);
    }

    public function manage_view_all_product() 
    {
        $this->security();
        $data = array();
        
        if($this->input->post('update'))
        {
            $ins['qty'] = $this->input->post('qty');
            $wh['product_id'] = $this->input->post('product-id'); 
            
            $result = $this->md->my_update('tbl_product_image', $ins, $wh );
           
            if($result == 1)
            {
                redirect('manage-view-all-product');
            }
        }
        
        $data['products'] = $this->md->my_query("SELECT * FROM `tbl_product` ORDER BY `product_id` DESC");
        $this->load->view('admin/manage_view_all_product',$data);
    }

    public function manage_product_reviews()
    {
        $this->security();
        $data = array();
        
        $data['allp'] = $this->md->my_select('tbl_review');
        $this->load->view('admin/manage_product_reviews',$data);
    }

    public function manage_product_Offer() {

        $this->security();
        $data = array();

        if ($this->input->post('add')) {
            $this->form_validation->set_rules('name', '', 'required', array('required' => 'Offer name is required.'));
            $this->form_validation->set_rules('rate', '', 'required|numeric', array('required' => 'Offer rate is required.', 'numeric' => 'Offer rate is required.'));
            $this->form_validation->set_rules('min_price', '', 'required|numeric', array('required' => 'Offer Min price is required.', 'numeric' => 'Offer rate is required.'));
            $this->form_validation->set_rules('max_price', '', 'required|numeric', array('required' => 'Offer Max price is required.', 'numeric' => 'Offer rate is required.'));
            $this->form_validation->set_rules('start_date', '', 'required', array('required' => 'Start date is required.'));
            $this->form_validation->set_rules('end_date', '', 'required', array('required' => 'End date is required.'));

            if ($this->form_validation->run() == TRUE) {
                $start_date = date('Y-m-d', strtotime($this->input->post('start_date')));

                $today = date('Y-m-d');

                if ($start_date < $today) {
                    $data['start_date_err'] = 'please select valid start date';
                } else {
                    $end_date = date('Y-m-d', strtotime($this->input->post('end_date')));

                    if ($end_date < $start_date) {
                        $data['end_date_err'] = 'Please select valid end date';
                    } else {
                        //insert
                        $ins['name'] = $this->input->post('name');
                        $ins['rate'] = $this->input->post('rate');
                        $ins['min_price'] = $this->input->post('min_price');
                        $ins['max_price'] = $this->input->post('max_price');
                        $ins['start_date'] = $start_date;
                        $ins['end_date'] = $end_date;

                        if (!$this->input->post('maincategory') && !$this->input->post('subcategory') && !$this->input->post('petacategory')) {
                            $ins['category_id'] = 0;
                            $ins['label'] = 'all';
                        } else if ($this->input->post('maincategory') && !$this->input->post('subcategory') && !$this->input->post('petacategory')) {
                            $ins['category_id'] = $this->input->post('maincategory');
                            $ins['label'] = 'main';
                        } else if ($this->input->post('maincategory') && $this->input->post('subcategory') && !$this->input->post('petacategory')) {
                            $ins['category_id'] = $this->input->post('subcategory');
                            $ins['label'] = 'sub';
                        } else if ($this->input->post('maincategory') && $this->input->post('subcategory') && $this->input->post('petacategory')) {
                            $ins['category_id'] = $this->input->post('petacategory');
                            $ins['label'] = 'peta';
                        }

                        $result = $this->md->my_insert('tbl_offer', $ins);

                        if ($result == 1) {
                            redirect('manage-product-offer');
                        }
                    }
                }
            }
        }

        $data['maincategory'] = $this->md->my_select('tbl_category', '*', array('label' => 'maincategory'));
        $data['offer'] = $this->md->my_select('tbl_offer');

        $this->load->view('admin/manage_product_Offer', $data);
    }

    public function manage_promocode() {
        $this->security();
        $data = array();

        if ($this->input->post('add')) {
            // create validation
            $this->form_validation->set_rules('code', '', 'required|is_unique[tbl_promocode.code]', array('required' => 'Please Enter Code', 'is_unique' => 'please enter valid Code'));
            $this->form_validation->set_rules('amount', '', 'required|numeric', array('required' => 'Please Enter amount', 'numeric' => 'Please Enter Amount'));
            $this->form_validation->set_rules('min_bill_price', '', 'required|numeric', array('required' => 'Please Enter Min Bill Price', 'numeric' => 'Please Enter Min Bill Price'));

            // validation run
            if ($this->form_validation->run() == TRUE) {

                $ins['code'] = $this->input->post('code');
                $ins['amount'] = $this->input->post('amount');
                $ins['min_bill_price'] = $this->input->post('min_bill_price');
                $ins['status'] = 1;

                $result = $this->md->my_insert('tbl_promocode', $ins);
                if ($result == 1) {
                    $data['success'] = "Insert Successfully";
                }
            }
        }
        $data['promocode'] = $this->md->my_select('tbl_promocode');
        $this->load->view('admin/manage_promocode', $data);
    }

    public function manage_settings() {
        $this->security();
        $data = array();

        if ($this->input->post('change_profile')) {
            $config['upload_path'] = './admin_assets/img/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = 1024 * 2;
            $config['file_name'] = "img_" . time();
            $config['encrypt_name'] = true;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('photo')) {
                $wh['admin_id'] = $this->session->userdata('admin');
                $path = $this->md->my_select('tbl_admin_login', 'profile_pic', $wh)[0]->profile_pic;

                if (strlen($path) > 0) {
                    unlink("./" . $path);
                }

                $ins['profile_pic'] = "admin_assets/img/" . $this->upload->data('file_name');
                $result = $this->md->my_update('tbl_admin_login', $ins, array('admin_id' => $this->session->userdata('admin')));

                if ($result == 1) {
                    $data['profile_success'] = 'Profile change successfully.';
                } else {
                    $data['profile_error'] = $this->upload->display_errors();
                }
            }
        }

        if ($this->input->post('change_ps')) {
            //verify old password
            $record = $this->md->my_select('tbl_admin_login', '*', array('admin_id' => $this->session->userdata('admin')))[0];
            $current_ps = $this->encryption->decrypt($record->password);

            if ($current_ps == $this->input->post('ops')) {
                $this->form_validation->set_rules('nps', '', 'required|min_length[8]|max_length[16]', array('required' => 'Please enter new password.', 'min_length' => 'Enter password between 8-16 charctars.', 'max_length' => 'Enter password between 8-16 charctars.'));
                $this->form_validation->set_rules('cps', '', 'required|matches[nps]', array('required' => 'Please enter confirm password.', 'matches' => 'Confirm password does not match with new passsword.'));

                if ($this->form_validation->run() == TRUE) {
                    $wh['admin_id'] = $this->session->userdata('admin');

                    $ins['password'] = $this->encryption->encrypt($this->input->post('nps'));

                    $result = $this->md->my_update('tbl_admin_login', $ins, $wh);

                    if ($result == 1) {
                        $data['ps_success'] = "Password Change Successfully.";

                        if ($this->input->cookie('admin_password'))
                            $expire = 60 * 60 * 24 * 365;
                        set_cookie('admin_password', $this->input->post('nps'), $expire);
                    }
                }
            } else {
                $data ['ps_error'] = "Old Password Does Not Metch.";
            }
        }

        $this->load->view('admin/manage_settings', $data);
    }
    
    public function manage_p_orders() 
    {
        $bdata = array();
        
        $bdata['bill_data'] = $this->md->my_select('tbl_bill','*',array('status'=>0));
        
        $this->load->view('admin/manage_p_orders',$bdata);
    }
    
     public function manage_confrim_orders() 
    {
        $bdata = array();
        
        $bdata['bill_data'] = $this->md->my_select('tbl_bill','*',array('status'=>1));
        
        $this->load->view('admin/manage_c_order',$bdata);
    }
    
     public function manage_cancel_order() 
    {
        $bdata = array();
        
        $bdata['bill_data'] = $this->md->my_select('tbl_bill','*',array('status'=>2));
        
        $this->load->view('admin/manage_cen_order',$bdata);
    }

    
    public function delete() 
    {
        $action = $this->uri->segment(2);
        $id = base64_decode(base64_decode($this->uri->segment(3)));

        if ($action == "country") {
            if ($id > 0) {
                $this->md->my_delete('tbl_location', array('location_id' => $id));
                redirect('manage-country');
            } else {
                $this->md->my_truncate('tbl_location');
                redirect('manage-country');
            }
        } else if ($action == "state") {
            if ($id > 0) {
                $this->md->my_delete('tbl_location', array('location_id' => $id));
                redirect('manage-state');
            } else {
                $this->md->my_delete('tbl_location', array('label' => 'state'));
                redirect('manage-state');
            }
        } else if ($action == "city") {
            if ($id > 0) {
                $this->md->my_delete('tbl_location', array('location_id' => $id));
                redirect('manage-city');
            } else {
                $this->md->my_delete('tbl_location', array('label' => 'city'));
                redirect('manage-city');
            }
        } else if ($action == "maincategory") {
            if ($id > 0) {
                $this->md->my_delete('tbl_category', array('category_id' => $id));
                redirect('manage-main-category');
            } else {
                $this->md->my_truncate('tbl_category');
                redirect('manage-main-category');
            }
        } else if ($action == "subcategory") {
            if ($id > 0) {
                $this->md->my_delete('tbl_category', array('category_id' => $id));
                redirect('manage-sub-category');
            } else {
                $this->md->my_delete('tbl_category', array('label' => 'subcategory'));
                redirect('manage-sub-category');
            }
        } else if ($action == "petacategory") {
            if ($id > 0) {
                $this->md->my_delete('tbl_category', array('category_id' => $id));
                redirect('manage-peta-category');
            } else {
                $this->md->my_delete('tbl_category', array('label' => 'petacategory'));
                redirect('manage-peta-category');
            }
        } else if ($action == "contactus") {
            if ($id > 0) {
                $this->md->my_delete('tbl_contact_us', array('contact_id' => $id));
                redirect('manage-contact-us');
            } else {
                $this->md->my_truncate('tbl_contact_us');
                redirect('manage-contact-us');
            }
        } else if ($action == "feedback") {
            if ($id > 0) {
                $this->md->my_delete('tbl_feedback', array('feedback_id' => $id));
                redirect('manage-feedback');
            } else {
                $this->md->my_truncate('tbl_feedback');
                redirect('manage-feedback');
            }
        } else if ($action == "aboutus") {
            if ($id > 0) {
                $this->md->my_delete('tbl_about', array('about_id' => $id));
                redirect('manage-aboutus');
            } else {
                $this->md->my_truncate('tbl_about');
                redirect('manage-aboutus');
            }
        } else if ($action == "subscriber") {
            if ($id > 0) {
                $this->md->my_delete('tbl_email_subscriber', array('subscriber_id' => $id));
                redirect('manage-email-subscriber');
            } else {
                $this->md->my_truncate('tbl_email_subscriber');
                redirect('manage-email-subscriber');
            }
        } else if ($action == "faqs") {
            if ($id > 0) {
                $this->md->my_delete('tbl_faqs', array('faqs_id' => $id));
                redirect('manage-faqs');
            } else {
                $this->md->my_truncate('tbl_faqs');
                redirect('manage-faqs');
            }
        } else if ($action == "privacypolicy") {
            if ($id > 0) {
                $this->md->my_delete('tbl_privacy_policy', array('policy_id' => $id));
                redirect('manage-privacy-policy');
            } else {
                $this->md->my_truncate('tbl_privacy_policy');
                redirect('manage-privacy-policy');
            }
        } else if ($action == "returnpolicy") {
            if ($id > 0) {
                $this->md->my_delete('tbl_return_policy', array('return_id' => $id));
                redirect('manage-return-policy');
            } else {
                $this->md->my_truncate('tbl_return_policy');
                redirect('manage-return-policy');
            }
        } else if ($action == "termscondition") {
            if ($id > 0) {
                $this->md->my_delete('tbl_terms_condition', array('term_id' => $id));
                redirect('manage-terms-and-condition');
            } else {
                $this->md->my_truncate('tbl_terms_condition');
                redirect('manage-terms-and-condition');
            }
        } else if ($action == "banner") {
            if ($id > 0) {

                $wh['banner_id'] = $id;
                $path = $this->md->my_select('tbl_banner', 'path', $wh)[0]->path;
                unlink('./' . $path);

                $this->md->my_delete('tbl_banner', $wh);
                redirect('manage-banner');
            } else {

                $all = $this->md->my_select('tbl_banner');
                foreach ($all as $data) {
                    unlink('./' . $data->path);
                }

                $this->md->my_truncate('tbl_banner');
                redirect('manage-banner');
            }
        } else if ($action == "offer") {
            if ($id > 0) {

                $this->md->my_update('tbl_product', array('offer_id' => 0), array('offer_id' => 0), array('offer_id' => $id));
                $this->md->my_delete('tbl_offer', array('offer_id' => $id));

                redirect('manage-product-offer');
            }
        } else if ($action == "review") {
            if ($id > 0) {
                $this->md->my_delete('tbl_review', array('review_id' => $id));
                redirect('manage-product-reviews');
            } else {
                $this->md->my_truncate('tbl_review');
                redirect('manage-product-reviews');
            }
        } 
    }
   

    
}
