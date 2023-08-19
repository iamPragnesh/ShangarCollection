    
<!DOCTYPE html>
<html lang="en">

    <title>Login - Shangar Collection</title>

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
                                <h2 class="ec-breadcrumb-title">Login</h2>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <!-- ec-breadcrumb-list start -->
                                <ul class="ec-breadcrumb-list">
                                    <li class="ec-breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="ec-breadcrumb-item active">Login</li>
                                </ul>
                                <!-- ec-breadcrumb-list end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ec breadcrumb end -->

        <!-- Ec login page -->
        <section class="ec-page-content section-space-p">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="section-title">
                            <h2 class="ec-bg-title">Log In</h2>
                            <h2 class="ec-title">Log In</h2>
                            <p class="sub-title mb-3">If you have an account with please sign in and enjoy shopping</p>
                        </div>
                    </div>
                    <div class="ec-login-wrapper">
                        <div class="ec-login-container">
                            <div class="ec-login-form">
                                <form action="" method="post" class="myform" novalidate="" required="" name="login">
                                    <span class="ec-login-wrap">
                                        <label>Email Address*</label>
                                        <input type="text" name="email" value="<?php
                                        if($this->input->cookie('member_email'))
                                        {
                                            echo $this->input->cookie('member_email');
                                        } 
                                        ?>" placeholder="Enter your email add..." required="" />
                                    </span>
                                    <span class="ec-login-wrap" id="show_hide_password3">
                                        <label>Password*</label>
                                        <div>
                                            <input style="margin-right: -35px" type="password"value="<?php
                                        if($this->input->cookie('member_password'))
                                        {
                                            echo $this->input->cookie('member_password');
                                        } 
                                        ?>" name="ps" placeholder="Enter your password" required="">
                                            <i id = "ic_Eye3" class="ecicon eci-eye-slash" aria-hidden="true"></i>
                                        </div>
                                    </span>
                                    <span class="ec-login-wrap ec-login-fp">
                                        <label><a target="_new" href="<?php echo base_url(); ?>forget-password">Forgot Password?</a></label>
                                    </span>
                                    <br/>
                                    <span class="ec-pay-agree">
                                        <div class="row ">
                                            <div class="col-2">
                                                <input style="height: 18px; " type="checkbox" <?php
                                        if($this->input->cookie('member_password'))
                                        {
                                            echo "checked";
                                        } 
                                        ?> name="svp" value="yes">
                                            </div>
                                            <div class="col-6">
                                                <a href="">Remember Me</a>
                                            </div>
                                        </div>
                                    </span>
                                    <span class="ec-login-wrap ec-login-btn">
                                        <button class="btn btn-primary" name="login" value="yes" type="submit">Login</button>
                                    </span>
                                    <br/>
                                    <?php
                                    if (isset($err)) {
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
                                </form>
                                <br/>
                                <div style="padding-left: 138px;">
                                    <a href="<?php echo base_url(); ?>register">I don't have Account</a>
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