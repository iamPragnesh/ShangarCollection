
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
                        <div class="ec-vendor-dashboard-card ec-vendor-profile-card">
                            <div class="ec-vendor-card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="ec-vendor-block-profile">
                                            <div class="ec-login-wrapper">
                                                <div class="ec-login-container">
                                                    <div class="ec-login-form">
                                                        <form action="" method="post" novalidate=""  class="myform" enctype="multipart/form-data">
                                                            <span class="ec-login-wrap">
                                                                <label>Name*</label>
                                                                <input type="text" name="name" class="<?php
                                                                if (form_error('name')) {
                                                                    echo "error-border";
                                                                }
                                                                ?>" value="<?php
                                                                       if (set_value('name')) {
                                                                           echo set_value('name');
                                                                       } else {
                                                                           echo $detail->name;
                                                                       }
                                                                       ?>" pattern="^[a-zA-Z ]+$" placeholder="Enter your Name" required="" />
                                                            </span>
                                                            <p class="err-msg">
                                                                <?php echo form_error('name'); ?>
                                                            </p>
                                                            <span class="ec-login-wrap">
                                                                <label>Email Address*</label>
                                                                <input type="email" name="email" class="<?php
                                                                if (form_error('email')) {
                                                                    echo "error-border";
                                                                }
                                                                ?>" value="<?php
                                                                       if (set_value('email')) {
                                                                           echo set_value('email');
                                                                       } else {
                                                                           echo $detail->email;
                                                                       }
                                                                       ?>" placeholder="Enter your email add..." required="" />
                                                            </span>
                                                            <p class="err-msg">
                                                                <?php echo form_error('email'); ?>
                                                            </p>
                                                            <p style="color: red;">
                                                                <?php
                                                                if (isset($email_err)) {
                                                                    echo $email_err;
                                                                }
                                                                ?>
                                                            </p>
                                                            <span class="ec-login-wrap">
                                                                <label>Phone Number*</label>
                                                                <input type="number" name="number"class="<?php
                                                                if (form_error('number')) {
                                                                    echo "error-border";
                                                                }
                                                                ?>" value="<?php
                                                                       if (set_value('number')) {
                                                                           echo set_value('number');
                                                                       } else {
                                                                           echo $detail->mobile;
                                                                       }
                                                                       ?>" placeholder="Enter your phone number" pattern="^[0-9]{10}$" required="" />
                                                            </span>
                                                            <p class="err-msg">
                                                                <?php echo form_error('number'); ?>
                                                            </p>
                                                            <label>Gender*</label>
                                                            <span class="ec-del-opt-head ">
                                                                <input type="radio" style="height: 18px;" id="del1" name="gender" value="Male"<?php
                                                                if (set_radio('gender', 'Male')) {
                                                                    echo set_radio('gender', 'Male');
                                                                } else {
                                                                    if ($detail->gender == 'Male') {
                                                                        echo "checked";
                                                                    }
                                                                }
                                                                ?> >
                                                                <label for="del1">Male</label>
                                                                <span>
                                                                    <input type="radio" style="height: 18px;" id="del2" name="gender" value="Female"<?php
                                                                    if (set_radio('gender', 'Female')) {
                                                                        echo set_radio('gender', 'Female');
                                                                    } else {
                                                                        if ($detail->gender == 'Female') {
                                                                            echo "checked";
                                                                        }
                                                                    }
                                                                    ?>>
                                                                    <label for="del2">Female</label>
                                                                </span>
                                                            </span>
                                                            <br/>
                                                            <span class="ec-login-wrap">
                                                                <label>DOB*</label>
                                                                <input type="date" name="dob" required=""class="<?php
                                                                if (form_error('dob')) {
                                                                    echo "error-border";
                                                                }
                                                                ?>" value="<?php
                                                                       if (set_value('dob')) {
                                                                           echo set_value('dob');
                                                                       } else {
                                                                           echo $detail->birth_date;
                                                                       }
                                                                       ?>" required="" />
                                                            </span>
                                                            <p class="err-msg">
                                                                <?php echo form_error('dob'); ?>
                                                            </p>
                                                            <p style="color: red;">
                                                                <?php
                                                                if (isset($dob_err)) {
                                                                    echo $dob_err;
                                                                }
                                                                ?>
                                                            </p>
                                                            <div class="col-sm-6">
                                                                <center>
                                                                    <div class="custom-file">
                                                                        <input accept="image/*" type="file" id="setPhoto" name="photo" class="custom-file-input-new">
                                                                    </div>
                                                                </center>
                                                            </div>
                                                            <span class="ec-login-wrap ec-login-btn">
                                                                <button class="btn btn-primary" name="change" value="yes" type="submit">Save Changes</button>
                                                            </span>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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