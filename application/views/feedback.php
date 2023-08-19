
<!DOCTYPE html>
<html lang="en">

    <title>Feedback - Shangar Collection</title>

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
                                <h2 class="ec-breadcrumb-title">Feedback</h2>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <!-- ec-breadcrumb-list start -->
                                <ul class="ec-breadcrumb-list">
                                    <li class="ec-breadcrumb-item"><a href="<?php echo base_url(); ?>home">Home</a></li>
                                    <li class="ec-breadcrumb-item active">Feedback</li>
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
                                    <form method="post" action="" name="contactus" novalidate="" class="myform">
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
                                                   ?>" placeholder="Enter your first name"
                                                   />
                                            <p class="err-msg">
                                                <?php
                                                echo form_error('name');
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
                                        <span class="ec-contact-wrap ec-contact-btn">
                                            <button class="btn btn-primary" name="add" value="yes" type="submit">Submit</button>
                                        </span>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="ec-common-wrapper">
                            <div class="ec-cms-block ec-abcms-block text-center">
                                <div class="ec-cms-block-inner">
                                    <img class="a-img" src="assets/images/offer-image/7.jpg" alt="about">
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