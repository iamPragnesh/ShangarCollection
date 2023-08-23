<!DOCTYPE html>
<html>

    <?php
    //require './headerlink.php';
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
                        <li class="breadcrumb-item"><span>Privacy Policy</span></li>
                    </ul>
                    <div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>
                    <div class="content-i">
                        <div class="content-box">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="element-wrapper">
                                        <div class="element-actions">
                                            <form class="form-inline justify-content-sm-end">
                                            </form>
                                        </div>
                                        <h4 class="element-header">Privacy Policy</h4>
                                        <?php
                                        if (isset($editprivacypolicy)) {
                                            ?>
                                            <div class="element-box">
                                                <h5 class="form-header">Edit Privacy Policy</h5>
                                                <form class="myform" method="post" action="" name="privacypolicy" novalidate="">
                                                    </br>
                                                    <textarea id="editor1" name="privacypolicy" required="form-control<?php
                                                    if (form_error('privacypolicy')) {
                                                        echo "error_border";
                                                    }
                                                    ?>" rows="5" placeholder="Enter Message"><?php
                                                                  if (!isset($success) && set_value('privacypolicy')) {
                                                                      echo set_value('privacypolicy');
                                                                  } else {
                                                                      echo $editprivacypolicy[0]->data;
                                                                  }
                                                                  ?></textarea>
                                                    </br></br>
                                                    <button type="submit" name="edit" value="yes" class="btn btn-primary w-md">Edit</button>
                                                    <a name="clear" type="reset" class="btn btn-default text-dark" href="<?php echo base_url(); ?>manage-privacy-policy">Go Back</a>
                                                    <p class="err-msg">
                                                    <?php echo form_error('privacypolicy'); ?>
                                                    </p>
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
                                                    if (isset($err)) {
                                                        ?>
                                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                            <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                                                <span aria-hidden="true"> ×</span>
                                                            </button><strong>Oops!</strong>.Something Wrong.
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                </form>
                                            </div>
                                            <?php
                                        } else {
                                            ?>
                                            <div class="element-box">
                                                <h5 class="form-header">Write Privacy Policy</h5>
                                                <form class="myform" method="post" action="" name="privacypolicy" novalidate="">
                                                    </br>
                                                    <textarea id="editor1" name="privacypolicy" required="form-control<?php
                                                    if (form_error('privacypolicy')) {
                                                        echo "error_border";
                                                    }
                                                    ?>" rows="5" placeholder="Enter Message" ><?php
                                                                  if (!isset($success) && set_value('privacypolicy')) {
                                                                      echo set_value('privacypolicy');
                                                                  } ?></textarea>
                                                    </br></br>
                                                    <button type="submit" name="add" value="yes" class="btn btn-primary w-md">Add</button>
                                                    <p class="err-msg">
                                                    <?php echo form_error('privacypolicy'); ?>
                                                    </p>
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
                                                    if (isset($err)) {
                                                        ?>
                                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                            <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                                                <span aria-hidden="true"> ×</span>
                                                            </button><strong>Oops!</strong>.Something Wrong.
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                </form>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                        <div class="element-box">
                                            <div class="element-box row col-12">
                                                <div class="col-6">
                                                    <h5 class="form-header">View Privacy Policy</h5>
                                                </div>
                                                <div class="col-6">
                                                    <p class="form-header" align="right">
                                                        <button onclick="delete_link('privacypolicy/<?php echo base64_encode(base64_encode(0)); ?>')" class="btn btn-danger" data-target="#exampleModal1" data-toggle="modal">Delete All Record</button>
                                                    </p>
                                                </div>
                                                <div class="table-responsive">
                                                    <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                                                        <thead>
                                                            <tr class="text-center">
                                                                <th>No.</th>
                                                                <th>Description</th>
                                                                <th>change</th>
                                                                <th>Remove</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $c = 0;
                                                            foreach ($privacypolicy as $data) {
                                                                $c++;
                                                                ?>
                                                                <tr class="text-center">
                                                                    <td><?php echo $c; ?></td>
                                                                    <td><?php echo $data->data; ?></td>
                                                                    <td>
                                                                        <a href="<?php echo base_url() ?>manage-privacy-policy/<?php echo base64_encode(base64_encode($data->policy_id)); ?>" style="cursor: pointer"  data-toggle="tooltip" data-placement="bottom" title="Edit">
                                                                            <i class="pre-icon os-icon os-icon-pencil-2" type="button"></i></a>
                                                                    </td>
                                                                    <td>
                                                                        <a onclick="delete_link('privacypolicy/<?php echo base64_encode(base64_encode($data->policy_id)); ?>')" style="cursor: pointer"  data-toggle="tooltip" data-placement="bottom" title="Remove Data">
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
                                </div>
                            </div>
                        </div>
                        <div class="floated-colors-btn second-floated-btn">
                            <div class="os-toggler-w">
                                <div class="os-toggler-i">
                                    <div class="os-toggler-pill">
                                    </div>
                                </div>
                            </div><span>Dark </span><span>Colors</span></div>
                    </div>
                </div>
                <div class="display-type"></div>
            </div>
            <?php
            //require './footerscript.php';
            $this->load->view('admin/footerscript');
            ?>
            <script src="<?php echo base_url(); ?>admin_assets/ckeditor/ckeditor.js"></script>
            <script type="text/javascript">
                                                                            CKEDITOR.replace('editor1');
            </script>
        </div>
    </body>

</html>