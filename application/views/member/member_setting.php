
<!DOCTYPE html>
<html lang="en">

    <title>My Profile - Shangar Collection</title>

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
                                <h2 class="ec-breadcrumb-title">My Profile</h2>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <!-- ec-breadcrumb-list start -->
                                <ul class="ec-breadcrumb-list">
                                    <li class="ec-breadcrumb-item"><a href="<?php echo base_url(); ?>home">Home</a></li>
                                    <li class="ec-breadcrumb-item active">My Profile</li>
                                </ul>
                                <!-- ec-breadcrumb-list end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ec breadcrumb end -->


        <!-- User profile section -->
        <section class="ec-page-content ec-vendor-uploads ec-user-account section-space-p">
            <div class="container">
                <div class="row">
                    <!-- Sidebar Area Start -->
                    <?php
                    $this->load->view('member/member_menu');
                    ?>
                    <div class="ec-shop-rightside col-lg-9 col-md-12">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div class="section-title">
                                    <br/>
                                    <h2 class="ec-bg-title">Change Password</h2>
                                    <h2 class="ec-title">Change Password</h2>
                                </div>
                            </div>
                            <div class="ec-login-wrapper">
                                <div class="ec-login-container">
                                    <div class="ec-login-form">
                                        <form action="" method="post" class="myform" required="" novalidate="" name="change_ps">
                                            <span class="ec-login-wrap" id="show_hide_password3">
                                                <label>Current Password*</label>
                                                <div>
                                                    <input style="margin-right: -35px" class="<?php
                                                    if (form_error('ops')) {
                                                        echo "error-border";
                                                    }
                                                    ?>" type="password" name="ops" placeholder="Enter your current password" value="<?php
                                                           if (!isset($ps_success) && set_value('ops')) {
                                                               echo set_value('ops');
                                                           }
                                                           ?>" required="">
                                                    <i id = "ic_Eye3" class="ecicon eci-eye-slash" aria-hidden="true"></i>
                                                </div>
                                            </span>
                                            <p class="err-msg">
                                                <?php echo form_error('ops'); ?>
                                            </p>
                                            <span class="ec-login-wrap" id="show_hide_password4">
                                                <label>New Password*</label>
                                                <div>
                                                    <input style="margin-right: -35px" class="<?php
                                                    if (form_error('nps')) {
                                                        echo "error-border";
                                                    }
                                                    ?>" type="password" name="nps" placeholder="Enter your new password" value="<?php
                                                           if (!isset($ps_success) && set_value('nps')) {
                                                               echo set_value('nps');
                                                           }
                                                           ?>" required="">
                                                    <i id = "ic_Eye4" class="ecicon eci-eye-slash" aria-hidden="true"></i>
                                                </div>
                                            </span>
                                            <p class="err-msg">
                                                <?php echo form_error('nps'); ?>
                                            </p>
                                            <span class="ec-login-wrap" id="show_hide_password5">
                                                <label>Confirm Password*</label>
                                                <div>
                                                    <input style="margin-right: -35px" class="<?php
                                                    if (form_error('cps')) {
                                                        echo "error-border";
                                                    }
                                                    ?>" type="password" name="cps" placeholder="Enter your confirm password" required="">
                                                    <i id = "ic_Eye5" class="ecicon eci-eye-slash" aria-hidden="true"></i>
                                                </div>
                                            </span>
                                            <p class="err-msg">
                                                <?php echo form_error('cps'); ?>
                                            </p>
                                            <span class="ec-login-wrap ec-login-btn">
                                                <button class="btn btn-primary" name="change_ps" value="yes" type="submit">Chnage Password</button>
                                            </span>
                                            <br/>
                                            <?php
                                            if (isset($ps_error) || form_error('nps') || form_error('cps')) {
                                                ?>
                                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                                        <span aria-hidden="true"> ×</span>
                                                    </button><strong>Oops! </strong><?php
                                                    if (isset($ps_error)) {
                                                        echo $ps_error;
                                                    }
                                                    ?>
                                                    <?php
                                                    echo form_error('nps');
                                                    echo form_error('cps');
                                                    ?>
                                                </div>
                                                <?php
                                            }
                                            if (isset($ps_success)) {
                                                ?>
                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                                        <span aria-hidden="true"> ×</span>
                                                    </button><strong>Ok! </strong><?php echo $ps_success; ?>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End User profile section -->

        <?php
        $this->load->view('footer');
        ?>

        <?php
        $this->load->view('footerscript');
        ?>

    </body>

</html>