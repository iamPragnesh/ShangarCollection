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
                        <li class="breadcrumb-item"><span>Category</span></li>
                        <li class="breadcrumb-item"><span>Main Category</span></li>
                    </ul>
                    <div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>
                    <div class="content-i">
                        <div class="content-box">
                            <div class="element-wrapper">
                                <h4 class="element-header">Main Category</h4>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <?php
                                        if (isset($editmaincategory)) {
                                            ?>
                                            <div class="element-box">
                                            <div>
                                                <h5 class="form-header">Edit Main Category</h5>
                                                <form class="myform" method="post" action="" name="maincategory" novalidate="">
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-sm-4" for="">Edit Main Category</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control <?php
                                                                if (form_error('maincategory')) {
                                                                    echo "error-border";
                                                                }
                                                                ?>" name="maincategory" required="" pattern="^[a-zA-z ]+$" value="<?php
                                                                       if (!isset($success) && set_value('maincategory')) {
                                                                           echo set_value('maincategory');
                                                                       } else {
                                                                           echo $editmaincategory[0]->name;
                                                                       } 
                                                                       ?>" placeholder="Enter Main Category">
                                                                <p class="err-msg">
                                                                    <?php
                                                                    echo form_error('maincategory');
                                                                    ?>
                                                        </div>
                                                    </div>
                                                    <br/>
                                                    <p class="form-header">
                                                        <button name="edit" value="yes" type="submit" class="btn btn-primary">Edit</button>
                                                        <a href="<?php echo base_url(); ?>manage-main-category" type="reset" class="btn btn-default">Go Back</a>
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
                                        </div>
                                            <?php
                                        } else {
                                            ?>
                                            <div class="element-box">
                                            <div>
                                                <h5 class="form-header">Add New Main Category</h5>
                                                <form class="myform" method="post" action="" name="maincategory" novalidate="">
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-sm-4" for="">Enter Main Category</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control <?php
                                                                if (form_error('maincategory')) {
                                                                    echo "error-border";
                                                                }
                                                                ?>" name="maincategory" required="" pattern="^[a-zA-z ]+$" value="<?php
                                                                       if (!isset($success) && set_value('maincategory')) {
                                                                           echo set_value('maincategory');
                                                                       }
                                                                       ?>" placeholder="Enter Main Category">
                                                                <p class="err-msg">
                                                                    <?php
                                                                    echo form_error('maincategory');
                                                                    ?>
                                                        </div>
                                                    </div>
                                                    <br/>
                                                    <p class="form-header">
                                                        <button name="add" value="yes" type="submit" class="btn btn-primary">Add</button>
                                                        <button name="clear" type="reset" class="btn btn-primary">Clear</button>
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
                                        </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="element-box">
                                            <div class="row">
                                                <div class="col-6">
                                                    <h5 class="form-header">View All Main Category</h5>
                                                </div>
                                                <div class="col-6">
                                                    <p class="form-header" align="right">
                                                        <button onclick="delete_link('maincategory/<?php echo base64_encode(base64_encode(0)); ?>')" class="btn btn-danger" data-target="#exampleModal1" data-toggle="modal">Delete All Record</button>
                                                    </p>
                                                </div>
                                                <div class="table-responsive">
                                                    <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                                                        <thead>
                                                            <tr class="text-center">
                                                                <th>No.</th>
                                                                <th>Main Category</th>
                                                                <th>change</th>
                                                                <th>Remove</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $c = 0;
                                                            foreach ($maincategory as $data) {
                                                                $c++;
                                                                ?>
                                                                <tr class="text-center">
                                                                    <td><?php echo $c; ?></td>
                                                                    <td><?php echo $data->name; ?></td>
                                                                    <td>
                                                                        <a href="<?php echo base_url(); ?>manage-main-category/<?php echo base64_encode(base64_encode($data->category_id)); ?>" style="cursor: pointer"  data-toggle="tooltip" data-placement="bottom" title="Edit">
                                                                            <i class="pre-icon os-icon os-icon-pencil-2" type="button"></i></a>
                                                                    </td>
                                                                    <td>
                                                                        <a onclick="delete_link('maincategory/<?php echo base64_encode(base64_encode($data->category_id)); ?>')" style="cursor: pointer"  data-toggle="tooltip" data-placement="bottom" title="Remove Data">
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