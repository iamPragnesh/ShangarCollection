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
                        <li class="breadcrumb-item"><span>City</span></li>
                    </ul>
                    <div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>
                    <div class="content-i">
                        <div class="content-box">
                            <div class="element-wrapper">
                                <h4 class="element-header">City</h4>
                                <?php
                                if (isset($editcity)) {
                                    ?>
                                    <div class="element-box">
                                        <h5 class="form-header">Edit City</h5>
                                        <form action="" method="post" name="city" novalidate="" class="myform">
                                            <div class="row">
                                                <div class="col-4">

                                                    <div class="form-group">
                                                        <label class="col-form-label col-sm-5" for="">Enter Country</label>
                                                        <select required="" name="country" class="form-control <?php
                                                        if (form_error('country')) {
                                                            echo "error-border";
                                                        }
                                                        ?>" onchange="set_combo('state', this.value);">
                                                            <option value="">Select Country</option>
                                                            <?php
                                                            foreach ($country as $data) {
                                                                ?>
                                                                <option value="<?php echo $data->location_id; ?>" <?php
                                                                if (!isset($success) && set_select('country', $data->location_id)) {
                                                                    echo set_select('country', $data->location_id);
                                                                } else {
                                                                    if ($data->location_id == $editstate[0]->parent_id) {
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
                                                            echo form_error('country');
                                                            ?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label class="col-form-label col-sm-5" for="">Enter State</label>
                                                        <select required="" name="state" class="form-control <?php
                                                        if (form_error('state')) {
                                                            echo "error-border";
                                                        }
                                                        ?>" id="state">
                                                            <option value="">Select State</option>
                                                            <?php
                                                            if ($this->input->post('country')) {
                                                                $wh['parent_id'] = $this->input->post('country');
                                                                $records = $this->md->my_select('tbl_location', '*', $wh);
                                                                foreach ($records as $data) {
                                                                    ?>
                                                                    <option value="<?php echo $data->location_id; ?>" <?php
                                                                    if (!isset($success) && set_select('state', $data->location_id)) {
                                                                        echo set_select('state', $data->location_id);
                                                                    }
                                                                    ?>><?php echo $data->name; ?></option>
                                                                            <?php
                                                                        }
                                                                    } else {
                                                                        $wh['parent_id'] = $editstate[0]->parent_id;
                                                                        $records = $this->md->my_select('tbl_location', '*', $wh);
                                                                        foreach ($records as $data) {
                                                                            ?>
                                                                    <option value="<?php echo $data->location_id; ?>" <?php
                                                                    if (!isset($success) && set_select('state', $data->location_id)) {
                                                                        echo set_select('state', $data->location_id);
                                                                    } else {
                                                                        if ($data->location_id == $editcity[0]->parent_id) {
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
                                                            echo form_error('state');
                                                            ?>
                                                        </p>
                                                    </div>
                                                    <!--</div>-->
                                                </div>
                                                <div class="col-4">
                                                    <!--<div class="element-box">-->
                                                    <div class="form-group">
                                                        <label class="col-form-label col-sm-5" for="">Enter City</label>
                                                        <div class="col-sm-12">
                                                            <input required="" pattern="^[a-zA-Z ]+$" name="city" class="form-control <?php
                                                            if (form_error('city')) {
                                                                echo "error-border";
                                                            }
                                                            ?>" placeholder="Enter City" value="<?php
                                                                   if (!isset($success) && set_value('city')) {
                                                                       echo set_value('city');
                                                                   } else {
                                                                       echo $editcity[0]->name;
                                                                   }
                                                                   ?>" type="text">
                                                        </div>
                                                        <p class="err-msg">
                                                            <?php
                                                            echo form_error('city');
                                                            ?>
                                                        </p>
                                                    </div> 
                                                </div>
                                            </div>
                                            <p class="form-header">
                                                <button type="submit" name="edit" value="yes" class="btn btn-primary">Edit</button>
                                                <a href="<?php echo base_url(); ?>manage-city" type="" class="btn btn-default">Go Back</a>
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
                                        <h5 class="form-header">Add New City</h5>
                                        <form action="" method="post" name="city" novalidate="" class="myform">
                                            <div class="row">
                                                <div class="col-4">
                                                    <!--<div class="element-box">-->
                                                    <div class="form-group">
                                                        <label class="col-form-label col-sm-5" for="">Enter Country</label>
                                                        <select required="" name="country" class="form-control <?php
                                                        if (form_error('country')) {
                                                            echo "error-border";
                                                        }
                                                        ?>" onchange="set_combo('state', this.value);">
                                                            <option value="">Select Country</option>
                                                            <?php
                                                            foreach ($country as $data) {
                                                                ?>
                                                                <option value="<?php echo $data->location_id; ?>" <?php
                                                                if (!isset($success) && set_select('country', $data->location_id)) {
                                                                    echo set_select('country', $data->location_id);
                                                                }
                                                                ?> ><?php echo $data->name; ?></option>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                        </select>
                                                        <p class="err-msg">
                                                            <?php
                                                            echo form_error('country');
                                                            ?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label class="col-form-label col-sm-5" for="">Enter State</label>
                                                        <select required="" name="state" class="form-control <?php
                                                        if (form_error('state')) {
                                                            echo "error-border";
                                                        }
                                                        ?>" id="state">
                                                            <option value="">Select State</option>
                                                            <?php
                                                            if ($this->input->post('country')) {
                                                                $wh['parent_id'] = $this->input->post('country');
                                                                $records = $this->md->my_select('tbl_location', '*', $wh);
                                                                foreach ($records as $data) {
                                                                    ?>
                                                                    <option value="<?php echo $data->location_id; ?>" <?php
                                                                    if (!isset($success) && set_select('state', $data->location_id)) {
                                                                        echo set_select('state', $data->location_id);
                                                                    }
                                                                    ?>><?php echo $data->name; ?></option>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                        </select>
                                                        <p class="err-msg">
                                                            <?php
                                                            echo form_error('state');
                                                            ?>
                                                        </p>
                                                    </div>
                                                    <!--</div>-->
                                                </div>
                                                <div class="col-4">
                                                    <!--<div class="element-box">-->
                                                    <div class="form-group">
                                                        <label class="col-form-label col-sm-5" for="">Enter City</label>
                                                        <div class="col-sm-12">
                                                            <input required="" pattern="^[a-zA-Z ]+$" name="city" class="form-control <?php
                                                            if (form_error('city')) {
                                                                echo "error-border";
                                                            }
                                                            ?>" placeholder="Enter City" value="<?php
                                                                   if (!isset($success) && set_value('city')) {
                                                                       echo set_value('city');
                                                                   }
                                                                   ?>" type="text">
                                                        </div>
                                                        <p class="err-msg">
                                                            <?php
                                                            echo form_error('city');
                                                            ?>
                                                        </p>
                                                    </div> 
                                                </div>
                                            </div>
                                            <p class="form-header">
                                                <button type="submit" name="add" value="yes" class="btn btn-primary">Add</button>
                                                <button type="reset" class="btn btn-default">Clear</button>
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
                                    <div class="row">
                                        <div class="col-6">
                                            <h5 class="form-header">View All Country</h5>
                                        </div>
                                        <div class="col-6">
                                            <p class="form-header" align="right">
                                                <button onclick="delete_link('city/<?php echo base64_encode(base64_encode(0)); ?>')" class="btn btn-danger" data-target="#exampleModal1" data-toggle="modal">Delete All Record</button>
                                            </p>
                                        </div>
                                        <div class="table-responsive">
                                            <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th>No.</th>
                                                        <th>Country</th>
                                                        <th>State</th>
                                                        <th>City</th>
                                                        <th>change</th>
                                                        <th>Remove</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $c = 0;
                                                    foreach ($city as $data) {
                                                        $c++;
                                                        ?>
                                                        <tr class="text-center">
                                                            <td><?php echo $c; ?></td>
                                                            <td><?php echo $data->country; ?></td>
                                                            <td><?php echo $data->state; ?></td>
                                                            <td><?php echo $data->name; ?></td>
                                                            <td>
                                                                <a href="<?php echo base_url() ?>manage-city/<?php echo base64_encode(base64_encode($data->location_id)); ?>" style="cursor: pointer"  data-toggle="tooltip" data-placement="bottom" title="Edit">
                                                                    <i class="pre-icon os-icon os-icon-pencil-2" type="button"></i></a>
                                                            </td>
                                                            <td>
                                                                <a onclick="delete_link('city/<?php echo base64_encode(base64_encode($data->location_id)); ?>')" style="cursor: pointer"  data-toggle="tooltip" data-placement="bottom" title="Remove Data">
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