<!DOCTYPE html>
<html>

    <?php
    $this->load->view('admin/headerlink');
    ?>

    <body class="menu-position-side menu-side-left full-screen with-content-panel">
        <div class="all-wrapper with-side-panel solid-bg-all">
            <div class="layout-w">
                <?php
                //require './menu.php';
                $this->load->view('admin/menu');
                ?>
                <div class="content-w">

                    <?php
                    //require './topbar.php';
                    $this->load->view('admin/topbar');
                    ?>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin-home">Home</a></li>
                        <li class="breadcrumb-item"><span>Settings</span></li>
<!--                        <li class="breadcrumb-item"><span></span></li>-->
                    </ul>
                    <div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>
                    <div class="content-i">
                        <div class="content-box">
                            <div class="element-wrapper">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="element-box">
                                            <h5 class="form-header">Change Profile</h5>
                                            <form class="myform" method="post" action="" name="photo" novalidate="" enctype="multipart/form-data">
                                                <br/>
                                                <div class="card-body">
                                                    <center>
                                                        <div  style="padding: 10px;">
                                                            <img style="" id="preview" src="admin_assets/img/user.png" class="rounded-circle img-thumbnail"  width="250px" />
                                                        </div>
                                                        <br/>
                                                        <div class="custom-file">
                                                            <input accept="image/*" type="file" id="setPhoto" name="photo" class="custom-file-input-new">
                                                        </div>
                                                    </center>
                                                    <br/><br/>
                                                    <div class="card">
                                                        <button type="submit" name="change_profile" value="yes" class="btn btn-block btn-primary waves-effect waves-light">Change Profile</button>                              
                                                    </div>

                                                    <br/>
                                                    <?php
                                                    if (isset($profile_success)) {
                                                        ?>
                                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                            <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                                                <span aria-hidden="true"> ×</span>
                                                            </button><strong>Ok! </strong><?php echo $profile_success; ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    if (isset($profile_error)) {
                                                        ?>
                                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                            <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                                                <span aria-hidden="true"> ×</span>
                                                            </button><strong>Oops!</strong><?php echo $profile_error; ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                    <br/>
                                                </div>
                                            </form>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="element-box">
                                            <h5 class="form-header">Change Password</h5>
                                            <form method="post" action="" novalidate="" name="change_ps" class="myform">
                                                <div class="form-group">
                                                    <label for="">Old Password</label>
                                                    <div class="input-group" id="show_hide_password">
                                                        <input class="form-control <?php
                                                        if (form_error('ops')) {
                                                            echo "error-border";
                                                        }
                                                        ?>"" name="ops" required="" placeholder="Enter password" type="password" value="<?php
                                                               if (!isset($ps_success) && set_value('ops')) {
                                                                   echo set_value('ops');
                                                               }
                                                               ?>" id="current_ps">
                                                        <i id = "ic_Eye" class="post-icon os-icon os-icon-eye-off" aria-hidden="true" style="padding: 10px;"></i>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">New Password</label>
                                                    <div class="input-group" id="show_hide_password1">
                                                        <input class="form-control <?php
                                                        if (form_error('nps')) {
                                                            echo "error-border";
                                                        }
                                                        ?>" name="nps" required="" pattern="^[A-Za-z0-9@ ]{8,16}$" placeholder="New password" type="password" value="<?php
                                                               if (!isset($ps_success) && set_value('nps')) {
                                                                   echo set_value('nps');
                                                               }
                                                               ?>">
                                                        <i id = "ic_Eye1" class="post-icon os-icon os-icon-eye-off" aria-hidden="true" style="padding: 10px;"></i>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Confirm Password</label>
                                                    <div class="input-group" id="show_hide_password2">
                                                        <input class="form-control <?php
                                                        if (form_error('cps')) {
                                                            echo "error-border";
                                                        }
                                                        ?>" name="cps" required="" pattern="^[A-Za-z0-9@ ]{8,16}$" placeholder="Confirm password" type="password">
                                                        <i id = "ic_Eye2" class="post-icon os-icon os-icon-eye-off" aria-hidden="true" style="padding: 10px;"></i>
                                                    </div>
                                                </div>
                                                <br>
                                                <button type="submit" name="change_ps" value="yes" class="btn btn-block btn-primary">Change Password</button>
                                                <br/>
                                                <?php
                                                if (isset($ps_error) || form_error('nps') || form_error('cps')) {
                                                    ?>
                                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                                            <span aria-hidden="true"> ×</span>
                                                        </button><strong>Oops!</strong><?php
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
                                                        </button><strong>Ok!</strong><?php echo $ps_success; ?>
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
                        <div class="floated-colors-btn second-floated-btn">
                            <div class="os-toggler-w">
                                <div class="os-toggler-i">
                                    <div class="os-toggler-pill">
                                    </div>
                                </div>
                            </div>
                            <span>Dark </span>
                            <span>Colors</span>
                        </div>
                    </div>
                </div>
                <div class="display-type"></div>
            </div>
            <?php
            $this->load->view('admin/footerscript');
            ?>

        </div>
    </div>
</body>

</html>