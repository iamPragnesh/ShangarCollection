<!DOCTYPE html>
<html>

    <?php
    $this->load->view('admin/headerlink');
    ?>

    <body class="auth-wrapper">
        <div class="all-wrapper menu-side with-pattern">
            <div class="auth-box-w" style=" padding: 0px;">
                <div class="logo-w" style=" height: 275px;">
                    <a href="<?php echo base_url(); ?>index.html"><img alt="" height="250px" style=" margin-top: -100px;" src="<?php echo base_url(); ?>admin_assets/img/Shangar.png"></a>
                </div>
                <h4 class="auth-header" style=" margin-top: -80px;">Welcome To Admin Panel</h4>
                <form action="" method="post" name="login" class="myform" novalidate="">
                    <div class="form-group">
                        <label for="">Email</label>
                        <input class="form-control" name="email" value="<?php
                        if ($this->input->cookie('admin_email')) {
                            echo $this->input->cookie('admin_email');
                        }
                        ?>" required="" placeholder="Enter email">
                        <div class="pre-icon os-icon os-icon-user-male-circle"></div>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <div class="input-group" id="show_hide_password">
                            <input class="form-control" name="password" required="" value="<?php
                            if ($this->input->cookie('admin_password')) {
                                echo $this->input->cookie('admin_password');
                            }
                            ?>" placeholder="Enter password" type="password">
                            <div class="pre-icon os-icon os-icon-lock"></div>
                            <i id = "ic_Eye" class="post-icon os-icon os-icon-eye-off" aria-hidden="true" style="padding: 10px;"></i>
                        </div>
                    </div>
                    <div class="buttons-w">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" name="svp" <?php
                                if ($this->input->cookie('admin_email') && $this->input->cookie('admin_password')) {
                                    echo "checked";
                                }
                                ?> value="yes"  type="checkbox">Remember Me</label>
                        </div>
                        &nbsp;
                        &nbsp;
                        <button name="login" value="yes" class="btn btn-primary">Login</button>
                        <?php
                        if ($this->uri->segment(2) == 1) {
                            ?>
                            <br/><br/>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <a href="<?php echo base_url(); ?>admin-login" aria-label="Close" class="close" data-dismiss="alert" type="button">
                                    <span aria-hidden="true"> ×</span>
                                </a><strong>Ok! </strong>.Please check your mail.
                            </div>
                            <?php
                        }
                        if (isset($err)) {
                            ?>
                            <br/><br/>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                    <span aria-hidden="true"> ×</span>
                                </button><strong>Oops!</strong>.Something Wrong.
                            </div>
                            <?php
                        }
                        ?>
                        <div align="center" style=" margin-top: 50px;">
                            <a href="<?php echo base_url('admin-forget-password'); ?>" class="text-muted">Forgot Password?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script src="<?php echo base_url(); ?>admin_assets/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>admin_assets/js/set.js"></script>
    </body>
</html>