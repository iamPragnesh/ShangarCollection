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
                        <li class="breadcrumb-item"><span>Pages</span></li>
                        <li class="breadcrumb-item"><span>Email Subscriber</span></li>
                    </ul>
                    <div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>
                    <div class="content-i">
                        <div class="content-box">
                            <div class="element-wrapper">
                                <h4 class="element-header">Email Subscriber</h4>
                                <form method="post" action="" name="subscriber" novalidate="" class="myform">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="element-box">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <h5 class="form-header">View All Subscriber</h5>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="form-header" align="right">
                                                            <button onclick="delete_link('subscriber/<?php echo base64_encode(base64_encode(0)); ?>')" class="btn btn-danger" data-target="#exampleModal1" data-toggle="modal">Delete All Record</button>
                                                        </p>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                                                            <thead>
                                                                <tr class="text-center">
                                                                    <th>
                                                                        <label>
                                                                            <input class="checked"  type="checkbox" id="allcheck">
                                                                        </label>
                                                                    </th>
                                                                    <th>Email</th>
                                                                    <th>Remove</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                foreach ($subscriber as $data) {
                                                                    ?>
                                                                    <tr class="text-center">
                                                                        <td><input class="checked" name="to[]" value="<?php echo $data->email; ?>" type="checkbox"></td>
                                                                        <td>
                                                                            <a href="mailto:<?php echo $data->email; ?>"><?php echo $data->email; ?></a>
                                                                        </td>
                                                                        <td>
                                                                            <a onclick="delete_link('subscriber/<?php echo base64_encode(base64_encode($data->subscriber_id)); ?>')" style="cursor: pointer"  data-toggle="tooltip" data-placement="bottom" title="Remove Data">
                                                                                <i class="pre-icon os-icon os-icon-trash text-danger" data-target="#exampleModal1" data-toggle="modal" type="button"></i></a>

                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-6">
                                            <div class="element-box">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h4 class="card-title" style="padding-top: 10px">Send Email</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="mb-4 form-floating">
                                                            <label for="floatingInput">Subject</label>
                                                            <input required="" name="subject" type="text" value="<?php
                                                            if (!isset($success) && set_value('subject')) {
                                                                echo set_value('subject');
                                                            }
                                                            ?>" class="form-control <?php
                                                                   if (form_error('subject')) {
                                                                       echo "error-border";
                                                                   }
                                                                   ?>">
                                                        </div>
                                                        <p class="err-msg">
                                                            <?php
                                                            echo form_error('subject');
                                                            ?>
                                                        </p>
                                                        <label class="form-label">Message</label></br>
                                                        <textarea required="" class="<?php
                                                                   if (form_error('message')) {
                                                                       echo "error-border";
                                                                   }
                                                                   ?>" name="message" id="editor1"><?php
                                                            if (!isset($success) && set_value('message')) {
                                                                echo set_value('message');
                                                            }
                                                            ?></textarea>
                                                        <p class="err-msg">
                                                            <?php
                                                            echo form_error('message');
                                                            ?>
                                                        </p>
                                                    </div>
                                                    <br/><br/>
                                                    <button type="submit" name="send" value="yes" class="btn btn-primary w-md">Send Email</button>
                                                    <br/>
                                                    <?php
                                                    if (isset($success)) {
                                                        ?>
                                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                            <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                                                <span aria-hidden="true"> ×</span>
                                                            </button><strong>Ok! </strong>.Insert Success.
                                                        </div>
                                                        <?php
                                                    }
                                                    if (isset($error)) {
                                                        ?>
                                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                            <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                                                <span aria-hidden="true"> ×</span>
                                                            </button><strong>Oops!</strong>.Something Wrong.
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </form>
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

            <script src="<?php echo base_url(); ?>admin_assets/ckeditor/ckeditor.js"></script>
            <script type="text/javascript">
                 CKEDITOR.replace('editor1');
            </script>
        </div>
    </div>
</body>

</html>