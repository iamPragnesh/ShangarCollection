
<!DOCTYPE html>
<html lang="en">

    <title>Forget Password - Shangar Collection</title>

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
                                <h2 class="ec-breadcrumb-title">Forget Password</h2>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <!-- ec-breadcrumb-list start -->
                                <ul class="ec-breadcrumb-list">
                                    <li class="ec-breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="ec-breadcrumb-item active">Forget Password</li>
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
                            <h2 class="ec-bg-title">Forget Password</h2>
                            <h2 class="ec-title">Reset You Password</h2>
                            <p class="sub-title mb-3">Please enter your register email we will help you to recover your forget password</p>
                        </div>
                    </div>
                    <div class="ec-login-wrapper">
                        <div class="ec-login-container">
                            <div class="ec-login-form">
                                <form action="" method="post" novalidate="" name="forget" class="myform">
                                    <span class="ec-login-wrap">
                                        <label>Email Address*</label>
                                        <input type="text" name="email" placeholder="Enter your email add..." required />
                                    </span>
                                    <span class="ec-login-wrap ec-login-btn">
                                        <button class="btn btn-primary" name="send" value="yes" type="submit">Send Email</button>
                                    </span>
                                </form>
                                <br/>
                                <div style="padding-left: 165px;">
                                    <a href="<?php echo base_url(); ?>login">Back to Login</a>
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