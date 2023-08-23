
<!DOCTYPE html>
<html lang="en">

    <title>Contact Us - Shangar Collection</title>

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
                                <h2 class="ec-breadcrumb-title">Contact Us</h2>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <!-- ec-breadcrumb-list start -->
                                <ul class="ec-breadcrumb-list">
                                    <li class="ec-breadcrumb-item"><a href="<?php echo base_url(); ?>home">Home</a></li>
                                    <li class="ec-breadcrumb-item active">Contact Us</li>
                                </ul>
                                <!-- ec-breadcrumb-list end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ec breadcrumb end -->

        <!-- Ec Contact Us page -->
        <section class="ec-page-content section-space-p">
            <div class="container">
                <div class="row">
                    <div class="ec-common-wrapper">
                        <div class="ec-contact-leftside">
                            <div class="ec-contact-container">
                                <div class="ec-contact-form">
                                    <form onsubmit=" return (grecaptcha.getResponse(widgetId1) == '')? false : true;" method="post" action="" name="contactus" novalidate="" class="myform">
                                        <span class="ec-contact-wrap">
                                            <label>Name*</label>
                                            <input required="" type="text" name="name" value="<?php
                                            if (!isset($success) && set_value('name')) {
                                                echo set_value('name');
                                            }
                                            ?>" class="<?php
                                                   if (form_error('name')) {
                                                       echo "error-border";
                                                   }
                                                   ?>" pattern="^[A-Za-z ]+$" placeholder="Enter your name"
                                                   />
                                            <p class="err-msg">
                                                <?php
                                                echo form_error('name');
                                                ?>
                                            </p>
                                        </span>

                                        <span class="ec-contact-wrap">
                                            <label>Email*</label>
                                            <input type="email" name="email" value="<?php
                                            if (!isset($success) && set_value('email')) {
                                                echo set_value('email');
                                            }
                                            ?>" class="<?php
                                                   if (form_error('email')) {
                                                       echo "error-border";
                                                   }
                                                   ?>" placeholder="Enter your email address"
                                                   required="" />
                                            <p class="err-msg">
                                                <?php
                                                echo form_error('email');
                                                ?>
                                            </p>
                                        </span>
                                        <span class="ec-contact-wrap">
                                            <label>Phone Number*</label>
                                            <input type="text" name="number" value="<?php
                                            if (!isset($success) && set_value('number')) {
                                                echo set_value('number');
                                            }
                                            ?>" class="<?php
                                                   if (form_error('number')) {
                                                       echo "error-border";
                                                   }
                                                   ?>" pattern="^[0-9]+$"< placeholder="Enter your phone number"
                                                   required="" />
                                            <p class="err-msg">
                                                <?php
                                                echo form_error('number');
                                                ?>
                                            </p>
                                        </span>
                                        <span class="ec-contact-wrap">
                                            <label>Subject*</label>
                                            <input type="text" name="subject" value="<?php
                                            if (!isset($success) && set_value('subject')) {
                                                echo set_value('subject');
                                            }
                                            ?>" class="<?php
                                                   if (form_error('subject')) {
                                                       echo "error-border";
                                                   }
                                                   ?>" placeholder="Enter your subject"
                                                   required="" />
                                            <p class="err-msg">
                                                <?php
                                                echo form_error('subject');
                                                ?>
                                            </p>
                                        </span>
                                        <span class="ec-contact-wrap">
                                            <label>Message*</label>
                                            <textarea name="message" class="<?php
                                            if (form_error('message')) {
                                                echo "error-border";
                                            }
                                            ?>"
                                                      placeholder="Please leave your comments here.."><?php
                                                          if (!isset($success) && set_value('message')) {
                                                              echo set_value('message');
                                                          }
                                                          ?></textarea>
                                            <p class="err-msg">
                                                <?php
                                                echo form_error('message');
                                                ?>
                                            </p>
                                        </span>
                                        <span class="ec-contact-wrap ec-recaptcha">
                                            <span class="g-recaptcha"
                                                  data-sitekey="6LfKURIUAAAAAO50vlwWZkyK_G2ywqE52NU7YO0S"
                                                  data-callback="verifyRecaptchaCallback"
                                                  data-expired-callback="expiredRecaptchaCallback"></span>
                                            <input class="form-control d-none" data-recaptcha="true" required=""
                                                   data-error="Please complete the Captcha">
                                            <span class="help-block with-errors"></span>
                                        </span>
                                        <div id="example1" style="margin-left:15px;"></div>
                                        <span class="ec-contact-wrap ec-contact-btn">
                                            <button class="btn btn-primary" name="add" value="yes" type="submit">Submit</button>
                                        </span>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="ec-contact-rightside">
                            <div class="ec_contact_map">
                                <div class="ec_map_canvas">
                                    <iframe id="ec_map_canvas" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d29768.62413491199!2d72.79343908990478!3d21.149293286321647!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04dff37ee2f05%3A0x2ed617f17458fa81!2sC%20B%20Patel%20Computer%20College!5e0!3m2!1sen!2sin!4v1645851669428!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                    <a href="https://sites.google.com/view/maps-api-v2/mapv2"></a>
                                </div>
                            </div>
                            <div class="row">
                            <div class="ec_contact_info col-6">
                                <h1 class="ec_contact_info_head">Contact us</h1>
                                <ul class="align-items-center">
                                    <li class="ec-contact-item"><i class="ecicon eci-map-marker"
                                                                   aria-hidden="true"></i><span>Address :</span>C.B.Patel Computer college,Bharthana,Vesu</li>
                                    <li class="ec-contact-item align-items-center"><i class="ecicon eci-phone"
                                                                                      aria-hidden="true"></i><span>Call Us :</span><a href="tel:+9265778295">+91 92657 78295</a></li>
                                    <li class="ec-contact-item align-items-center"><i class="ecicon eci-envelope"
                                                                                      aria-hidden="true"></i><span>Email :</span><a href="mailto:shangarcollection@gmail.com">shangarcollection@gmail.com</a></li>
                                </ul>
                            </div>
                            <div class="col-6">
                            <br/><br/>
                            <div id="qrcode"></div>
                            <input type="hidden" value="<?php echo "Address : C.B.Patel Computer college,Bharthana,Vesu, \nPhone : +91 92657 78295, \nEmail : shangarcollection@gmail.com"; ?>" name="qrvalue" />
                            <a id="get_img" style="display: none" download="">Download</a>
                        </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <?php
        $this->load->view('footer');
        ?>

        <?php
        $this->load->view('footerscript');
        ?>
        
    </body>

</html>