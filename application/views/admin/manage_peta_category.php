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
                        <li class="breadcrumb-item"><span>Location</span></li>
                        <li class="breadcrumb-item"><span>Peta Category</span></li>
                    </ul>
                    <div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>
                    <div class="content-i">
                        <div class="content-box">
                            <div class="element-wrapper">
                                <h4 class="element-header">Peta Category</h4>
                                <?php
                                if (isset($editpetacategory)) {
                                    ?>
                                    <div class="element-box">
                                        <h5 class="form-header">Edit Peta Category</h5>
                                        <form action="" method="post" name="petacategory" novalidate="" class="myform">
                                            <div class="row">
                                                <div class="col-4">
                                                    <!--<div class="element-box">-->
                                                    <div class="form-group">
                                                        <label class="col-form-label col-sm-4" for="">Main Category</label>
                                                        <select required="" name="maincategory" class="form-control <?php
                                                        if (form_error('maincategory')) {
                                                            echo "error-border";
                                                        }
                                                        ?>" onchange="set_combo('subcategory', this.value);">
                                                            <option value="">Select Category</option>
                                                            <?php
                                                            foreach ($maincategory as $data) {
                                                                ?>
                                                                <option value="<?php echo $data->category_id; ?>" <?php
                                                                if (!isset($success) && set_select('maincategory', $data->category_id)) {
                                                                    echo set_select('maincategory', $data->category_id);
                                                                } else {
                                                                    if ($data->category_id == $editsubcategory[0]->parent_id) {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> ><?php echo $data->name; ?></option>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                        </select>
                                                        <p class="err-msg">
                                                            <?php
                                                            echo form_error('maincategory');
                                                            ?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label class="col-form-label col-sm-4" for="">Sub Category</label>
                                                        <select required="" name="subcategory" class="form-control <?php
                                                        if (form_error('subcategory')) {
                                                            echo "error-border";
                                                        }
                                                        ?>" id="subcategory">
                                                            <option value="">Select Category</option>
                                                            <?php
                                                            if ($this->input->post('maincategory')) {
                                                                $wh['parent_id'] = $this->input->post('maincategory');
                                                                $records = $this->md->my_select('tbl_category', '*', $wh);
                                                                foreach ($records as $data) {
                                                                    ?>
                                                                    <option value="<?php echo $data->category_id; ?>" <?php
                                                                    if (!isset($success) && set_select('subcategory', $data->category_id)) {
                                                                        echo set_select('subcategory', $data->category_id);
                                                                    }
                                                                    ?>><?php echo $data->name; ?></option>
                                                                            <?php
                                                                        }
                                                                    } else {
                                                                        $wh['parent_id'] = $editsubcategory[0]->parent_id;
                                                                        $records = $this->md->my_select('tbl_category', '*', $wh);
                                                                        foreach ($records as $data) {
                                                                            ?>
                                                                    <option value="<?php echo $data->category_id; ?>" <?php
                                                                    if (!isset($success) && set_select('subcategory', $data->category_id)) {
                                                                        echo set_select('subcategory', $data->category_id);
                                                                    } else {
                                                                        if ($data->category_id == $editpetacategory[0]->parent_id) {
                                                                            echo "selected";
                                                                        }
                                                                    }
                                                                    ?>><?php echo $data->name; ?></option>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                        </select>
                                                        <p class="err-msg">
                                                            <?php
                                                            echo form_error('subcategory');
                                                            ?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label class="col-form-label col-sm-5" for="">Enter Peta Category</label>
                                                        <div class="col-sm-12">
                                                            <input required="" pattern="^[a-zA-Z ]+$" name="petacategory" class="form-control <?php
                                                            if (form_error('petacategory')) {
                                                                echo "error-border";
                                                            }
                                                            ?>" placeholder="Enter Peta Category" value="<?php
                                                                   if (!isset($success) && set_value('petacategory')) {
                                                                       echo set_value('petacategory');
                                                                   } else {
                                                                       echo $editpetacategory[0]->name;
                                                                   }
                                                                   ?>" type="text">
                                                        </div>
                                                        <p class="err-msg">
                                                            <?php
                                                            echo form_error('petacategory');
                                                            ?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <p class="form-header">
                                                    <button type="submit" name="edit" value="yes" class="btn btn-primary">Edit</button>
                                                    <a href="<?php echo base_url(); ?>manage-peta-category" type="reset" class="btn btn-default">Go Back</a>
                                                </p>
                                            </div>
                                        </form>
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
                                    </div>
                                    <?php
                                } else {
                                    ?>
                                    <div class="element-box">
                                        <h5 class="form-header">Add New Peta Category</h5>
                                        <form action="" method="post" name="petacategory" novalidate="" class="myform">
                                            <div class="row">
                                                <div class="col-4">
                                                    <!--<div class="element-box">-->
                                                    <div class="form-group">
                                                        <label class="col-form-label col-sm-4" for="">Main Category</label>
                                                        <select required="" name="maincategory" class="form-control <?php
                                                        if (form_error('maincategory')) {
                                                            echo "error-border";
                                                        }
                                                        ?>" onchange="set_combo('subcategory', this.value);">
                                                            <option value="">Select Category</option>
                                                            <?php
                                                            foreach ($maincategory as $data) {
                                                                ?>
                                                                <option value="<?php echo $data->category_id; ?>" <?php
                                                                if (!isset($success) && set_select('maincategory', $data->category_id)) {
                                                                    echo set_select('maincategory', $data->category_id);
                                                                }
                                                                ?> ><?php echo $data->name; ?></option>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                        </select>
                                                        <p class="err-msg">
                                                            <?php
                                                            echo form_error('maincategory');
                                                            ?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label class="col-form-label col-sm-4" for="">Sub Category</label>
                                                        <select required="" name="subcategory" class="form-control <?php
                                                        if (form_error('subcategory')) {
                                                            echo "error-border";
                                                        }
                                                        ?>" id="subcategory">
                                                            <option value="">Select Category</option>
                                                            <?php
                                                            if ($this->input->post('maincategory')) {
                                                                $wh['parent_id'] = $this->input->post('maincategory');
                                                                $records = $this->md->my_select('tbl_category', '*', $wh);
                                                                foreach ($records as $data) {
                                                                    ?>
                                                                    <option value="<?php echo $data->category_id; ?>" <?php
                                                                    if (!isset($success) && set_select('subcategory', $data->category_id)) {
                                                                        echo set_select('subcategory', $data->category_id);
                                                                    }
                                                                    ?>><?php echo $data->name; ?></option>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                        </select>
                                                        <p class="err-msg">
                                                            <?php
                                                            echo form_error('subcategory');
                                                            ?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label class="col-form-label col-sm-5" for="">Enter Peta Category</label>
                                                        <div class="col-sm-12">
                                                            <input required="" pattern="^[a-zA-Z ]+$" name="petacategory" class="form-control <?php
                                                            if (form_error('petacategory')) {
                                                                echo "error-border";
                                                            }
                                                            ?>" placeholder="Enter Peta Category" value="<?php
                                                                   if (!isset($success) && set_value('petacategory')) {
                                                                       echo set_value('petacategory');
                                                                   }
                                                                   ?>" type="text">
                                                        </div>
                                                        <p class="err-msg">
                                                            <?php echo form_error('petacategory'); ?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <p class="form-header">
                                                    <button type="submit" name="add" value="yes" class="btn btn-primary">Add</button>
                                                    <button type="reset" class="btn btn-default">Clear</button>
                                                </p>
                                            </div>
                                        </form>
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
                                    </div>
                                    <?php
                                }
                                ?>
                                <div class="element-box">
                                    <div class="row">
                                        <div class="col-6">
                                            <h5 class="form-header">View All Country</h5>
                                        </div>
                                        <div class="col-6">
                                            <p class="form-header" align="right">
                                                <button onclick="delete_link('petacategory/<?php echo base64_encode(base64_encode(0)); ?>')" class="btn btn-danger" data-target="#exampleModal1" data-toggle="modal">Delete All Record</button>
                                            </p>
                                        </div>
                                        <div class="table-responsive">
                                            <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th>No.</th>
                                                        <th>Main Category</th>
                                                        <th>Sub Category</th>
                                                        <th>Peta Category</th>
                                                        <th>change</th>
                                                        <th>Remove</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $c = 0;
                                                    foreach ($petacategory as $data) {
                                                        $c++;
                                                        ?>
                                                        <tr class="text-center">
                                                            <td><?php echo $c; ?></td>
                                                            <td><?php echo $data->maincategory; ?></td>
                                                            <td><?php echo $data->subcategory; ?></td>
                                                            <td><?php echo $data->name; ?></td>
                                                            <td>
                                                                <a href="<?php echo base_url() ?>manage-peta-category/<?php echo base64_encode(base64_encode($data->category_id)); ?>" style="cursor: pointer"  data-toggle="tooltip" data-placement="bottom" title="Edit">
                                                                    <i class="pre-icon os-icon os-icon-pencil-2" type="button"></i></a>
                                                            </td>
                                                            <td>
                                                                <a onclick="delete_link('petacategory/<?php echo base64_encode(base64_encode($data->category_id)); ?>')" style="cursor: pointer"  data-toggle="tooltip" data-placement="bottom" title="Remove Data">
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