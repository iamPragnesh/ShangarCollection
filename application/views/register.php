
<!DOCTYPE html>
<html lang="en">

    <title>Register - Shangar Collection</title>

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
                                <h2 class="ec-breadcrumb-title">Register</h2>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <!-- ec-breadcrumb-list start -->
                                <ul class="ec-breadcrumb-list">
                                    <li class="ec-breadcrumb-item"><a href="<?php echo base_url(); ?>home">Home</a></li>
                                    <li class="ec-breadcrumb-item active">Register</li>
                                </ul>
                                <!-- ec-breadcrumb-list end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ec breadcrumb end -->
        
        <!-- Start Register -->
        <section class="ec-page-content section-space-p">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="section-title">
                            <h2 class="ec-bg-title">Sign Up</h2>
                            <h2 class="ec-title">Sign Up</h2>
                            <p class="sub-title mb-3">Fill the following form and become our member and purchase your favorite product.</p>
                        </div>
                    </div>
                    <div class="ec-register-wrapper">
                        <div class="ec-register-container">
                            <div class="ec-register-form">
                                <form onsubmit=" return (grecaptcha.getResponse(widgetId1) == '')? false : true;" action="" method="post" name="register" novalidate="" class="myform">
                                    <span class="ec-register-wrap">
                                        <label>Name*</label>
                                        <input class="cat-icons <?php
                                        if (form_error('name')) {
                                            echo "error-border";
                                        }
                                        ?>" type="text" name="name" value="<?php
                                               if (!isset($success) && set_value('name')) {
                                                   echo set_value('name');
                                               }
                                               ?>" placeholder="Enter your name" required="" />
                                    </span>
                                    <p class="err-msg">
                                        <?php
                                        echo form_error('name');
                                        ?>
                                    </p>
                                    <span class="ec-register-wrap">
                                        <label>Email*</label>
                                        <input type="email" name="email" class="<?php
                                        if (form_error('email')) {
                                            echo "error-border";
                                        }
                                        ?>" value="<?php
                                               if (!isset($success) && set_value('email')) {
                                                   echo set_value('emial');
                                               }
                                               ?>" placeholder="Enter your email add..." required="" />
                                    </span>
                                    <p class="err-msg">
                                        <?php
                                        echo form_error('email');
                                        ?>
                                    </p>
                                    <span class="ec-register-wrap">
                                        <label>Phone Number*</label>
                                        <input type="text" name="number" class="<?php
                                        if (form_error('number')) {
                                            echo "error-border";
                                        }
                                        ?>" value="<?php
                                               if (!isset($success) && set_value('number')) {
                                                   echo set_value('number');
                                               }
                                               ?>" placeholder="Enter your phone number"
                                               required="" />
                                    </span>
                                    <p class="err-msg">
                                        <?php
                                        echo form_error('number');
                                        ?>
                                    </p>
                                    <span class="ec-register-wrap" id="show_hide_password3">
                                        <label>Password</label>
                                        <input style="margin-right: -35px" type="password" class="<?php
                                        if (form_error('ps')) {
                                            echo "error-border";
                                        }
                                        ?>" value="<?php
                                               if (!isset($success) && set_value('ps')) {
                                                   echo set_value('ps');
                                               }
                                               ?>" name="ps" placeholder="Enter Password" required="" />
                                        <i id = "ic_Eye3" class="ecicon eci-eye-slash" aria-hidden="true"></i>
                                    </span>
                                    <p class="err-msg">
                                        <?php
                                        echo form_error('ps');
                                        ?>
                                    </p>
                                    <span class="ec-register-wrap" id="show_hide_password4">
                                        <label>Confirm Password</label>
                                        <input type="password" style="margin-right: -35px" class="<?php
                                        if (form_error('cps')) {
                                            echo "error-border";
                                        }
                                        ?>" name="cps" placeholder="Enter Confirm Password" required="" />
                                        <i id = "ic_Eye4" class="ecicon eci-eye-slash" aria-hidden="true"></i>
                                    </span>
                                    <p class="err-msg">
                                        <?php
                                        echo form_error('cps');
                                        ?>
                                    </p>
                                    <br/>
                                    <span class="ec-login-wrap ec-login-fp"> 
                                        <div class="row">
                                            <div class="col-2" >
                                                <input style="height: 18px;" type="checkbox"  value="" class="" disabled="" checked="">
                                            </div>
                                            <div class="col-10">
                                                <label>I accept all <a target="_new" href="<?php echo base_url(); ?>terms-and-condition">Terms & conditions </a>and <a target="_new" href="<?php echo base_url(); ?>privacy-policy">Privacy Policy</a></label>

                                            </div>
                                        </div>
                                    </span>
                                    <div id="example1" style="margin-left: 287px;"></div>
                                    <span class="ec-register-wrap ec-register-btn">
                                        <button class="btn btn-primary" name="register" value="yes" type="submit">Register</button>
                                    </span>
                                </form>
                                <br/>
                                <div style="padding-left: 340px;">
                                    <a href="<?php echo base_url(); ?>login">I have Already Account</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Register -->


        <?php
        $this->load->view('footer');
        ?>

        <?php
        $this->load->view('footerscript');
        ?>

    </body>

</html>