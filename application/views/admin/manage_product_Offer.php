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
                        <li class="breadcrumb-item"><span>Product</span></li>
                        <li class="breadcrumb-item"><span>Add New Offer</span></li>
                    </ul>
                    <div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>
                    <div class="content-i">
                        <div class="content-box">
                            <div class="element-wrapper">
                                <h4 class="element-header">Add New Offer</h4>
                                <div class="element-box">
                                    <form method="post" action="" novalidate="" name="offer" class="myform">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="col-form-label col-sm-5"  for="">Offer Name</label>
                                                    <div class="col-sm-12">
                                                        <input class="form-control <?php
                                                        if (form_error('name')) {
                                                            echo "error-border";
                                                        }
                                                        ?>" name="name" required="" placeholder="Offer Name" value="<?php
                                                               if (!isset($success) && set_value('name')) {
                                                                   echo set_value('name');
                                                               }
                                                               ?>" type="">
                                                        <p class="err-msg">
                                                            <?php
                                                            echo form_error('name');
                                                            ?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-form-label col-sm-5"  for="">Offer Rate</label>
                                                    <div class="col-sm-12">
                                                        <input class="form-control <?php
                                                        if (form_error('rate')) {
                                                            echo "error-border";
                                                        }
                                                        ?>" pattern="^[0-9]+$" required="" name="rate" placeholder="Offer Rate" value="<?php
                                                               if (!isset($success) && set_value('rate')) {
                                                                   echo set_value('rate');
                                                               }
                                                               ?>" type="">
                                                        <p class="err-msg">
                                                            <?php
                                                            echo form_error('rate');
                                                            ?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="col-form-label col-sm-5" for="">Min Price</label>
                                                            <div class="col-sm-12">
                                                                <input class="form-control <?php
                                                                if (form_error('min_price')) {
                                                                    echo "error-border";
                                                                }
                                                                ?>" pattern="^[0-9]+$" required="" name="min_price" placeholder="Min Price" value="<?php
                                                                       if (!isset($success) && set_value('min_price')) {
                                                                           echo set_value('min_price');
                                                                       }
                                                                       ?>" type="">
                                                                <p class="err-msg">
                                                                    <?php
                                                                    echo form_error('min_price');
                                                                    ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="col-form-label col-sm-5" for="">Max Price</label>
                                                            <div class="col-sm-12">
                                                                <input class="form-control <?php
                                                                if (form_error('max_price')) {
                                                                    echo "error-border";
                                                                }
                                                                ?>" pattern="^[0-9]+$" required="" name="max_price" placeholder="Max Price" value="<?php
                                                                       if (!isset($success) && set_value('max_price')) {
                                                                           echo set_value('max_price');
                                                                       }
                                                                       ?>" type="">
                                                                <p class="err-msg">
                                                                    <?php
                                                                    if (form_error('max_price')) {
                                                                        echo form_error('max_price');
                                                                    }
                                                                    ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="col-form-label col-sm-5" for=""> Start Date</label>
                                                            <div class="col-sm-12">
                                                                <input type="date" class="form-control <?php
                                                                if (form_error('start_date')) {
                                                                    echo "error-border";
                                                                }
                                                                ?>" required="" name="start_date" placeholder="Start Date" value="<?php
                                                                       if (!isset($success) && set_value('start_date')) {
                                                                           echo set_value('start_date');
                                                                       }
                                                                       ?>">
                                                                <p class="err-msg">
                                                                    <?php
                                                                    if (form_error('start_date')) {
                                                                        echo form_error('start_date');
                                                                    }
                                                                    ?>
                                                                </p>
                                                                <p class="err-msg" style="color:red">
                                                                    <?php
                                                                    if (isset($start_date_err)) {
                                                                        echo $start_date_err;
                                                                    }
                                                                    ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="col-form-label col-sm-5" for=""> End Date</label>
                                                            <div class="col-sm-12">
                                                                <input type="date" class="form-control <?php
                                                                if (form_error('end_date')) {
                                                                    echo "error-border";
                                                                }
                                                                ?>" required="" name="end_date" placeholder="End Date" value="<?php
                                                                       if (!isset($success) && set_value('end_date')) {
                                                                           echo set_value('end_date');
                                                                       }
                                                                       ?>" >
                                                                <p class="err-msg">
                                                                    <?php
                                                                    if (form_error('end_date')) {
                                                                        echo form_error('end_date');
                                                                    }
                                                                    ?>
                                                                </p >
                                                                <p class="err-msg" style="color:red">
                                                                    <?php
                                                                    if (isset($end_date_err)) {
                                                                        echo $end_date_err;
                                                                    }
                                                                    ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-sm-4" for=""> Main Category</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control <?php
                                                        if (form_error('maincategory')) {
                                                            echo "error-border";
                                                        }
                                                        ?>" required="" name="maincategory" onchange="set_combo('subcategory', this.value);">
                                                            <option value="">Select category</option>
                                                            <?php
                                                            foreach ($maincategory as $data) {
                                                                ?>
                                                                <option value="<?php echo $data->category_id; ?>" <?php
                                                                if (!isset($success) && set_select('maincategory', $data->category_id)) {
                                                                    echo set_select('maincategory', $data->category_id);
                                                                }
                                                                ?>><?php echo $data->name; ?></option>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                        </select><p class="err-msg">
                                                            <?php
                                                            echo form_error('maincategory');
                                                            ?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-form-label col-sm-4"  for=""> Sub Category</label>
                                                    <div class="col-sm-10">
                                                        <select required="" name="subcategory" class="form-control <?php
                                                        if (form_error('subcategory')) {
                                                            echo "error-border";
                                                        }
                                                        ?>" onchange="set_combo('petacategory', this.value);" id="subcategory">
                                                            <option value="">Select Category</option>
                                                        </select>
                                                        <p class="err-msg">
                                                            <?php
                                                            echo form_error('subcategory');
                                                            ?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-form-label col-sm-4" for=""> Peta Category</label>
                                                    <div class="col-sm-10">
                                                        <select required="" name="petacategory" class="form-control <?php
                                                        if (form_error('petacategory')) {
                                                            echo "error-border";
                                                        }
                                                        ?>" id="petacategory">
                                                            <option value="">Select Category</option>
                                                        </select>
                                                        <p class="err-msg">
                                                            <?php
                                                            echo form_error('petacategory');
                                                            ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="form-header">
                                                <button type="submit"name="add" value="yes" class="btn btn-primary">Add</button>
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
                                        </div>
                                    </form>
                                </div>
                                <div class="element-box">
                                    <div class="">
                                        <h4 class="element-header">View All Offer</h4>
                                    </div>
                                    <div class="table-responsive">
                                        <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>No.</th>
                                                    <th>Name</th>
                                                    <th>Rate</th>
                                                    <th>Start Date</th>
                                                    <th>End Date</th>
                                                    <th>Min Price</th>
                                                    <th>Max Price</th>
                                                    <th>Main Category</th>
                                                    <th>Sub Category</th>
                                                    <th>Peta Category</th>
                                                    <th>Status</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $c = 0;
                                                foreach ($offer as $data) {
                                                    $c++;
                                                    ?>
                                                    <tr class="text-center">
                                                        <td><?php echo $c; ?></td>
                                                        <td><?php echo $data->name; ?></td>
                                                        <td><?php echo $data->rate; ?></td>
                                                        <td><?php echo date('Y-m-d', strtotime($data->start_date)); ?></td>
                                                        <td><?php echo date('Y-m-d', strtotime($data->end_date)); ?></td>
                                                        <td><?php echo $data->min_price; ?></td>
                                                        <td><?php echo $data->max_price; ?></td>
                                                        <?php
                                                        if ($data->label == "all") {
                                                            ?>
                                                            <td>All</td>
                                                            <td>All</td>
                                                            <td>All</td>
                                                            <?php
                                                        } else if ($data->label == "main") {
                                                            $main = $this->md->my_select('tbl_category', '*', array('category_id' => $data->category_id))[0]->name;
                                                            ?>
                                                            <td><?php echo $main; ?></td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <?php
                                                        } else if ($data->label == "sub") {
                                                            $record = $this->md->my_query("SELECT m.name AS main, s.name AS sub FROM `tbl_category` AS s, `tbl_category` AS m WHERE m. `category_id` =s.`parent_id` AND s.`category_id`=" . $data->category_id . ";")[0]
                                                            ?>
                                                            <td><?php echo $record->main; ?></td>
                                                            <td><?php echo $record->sub; ?></td>
                                                            <td>-</td>
                                                            <?php
                                                        } else if ($data->label == "peta") {
                                                            $record = $this->md->my_query("SELECT m.name AS main , s.name AS sub , p.name AS peta FROM `tbl_category` AS m , `tbl_category` AS s ,`tbl_category` AS p WHERE m. `category_id` = s.`parent_id` AND s.`category_id` = p.`parent_id` AND p. `category_id` = " . $data->category_id . ";")[0]
                                                            ?>
                                                            <td><?php echo $record->main; ?></td>
                                                            <td><?php echo $record->sub; ?></td>
                                                            <td><?php echo $record->peta; ?></td>
                                                            <?php
                                                        }
                                                        ?>
                                                        <td>
                                                            <?php
                                                            if ($data->end_date < date('Y-m-d')) {
                                                                ?>
                                                                <span class="alert alert-danger fade show">Expire</span>
                                                                <?php
                                                            } else if ($data->status == 1) {
                                                                ?>
                                                                <span class="alert alert-success fade show">Running</span>
                                                                <?php
                                                            } else if ($data->start_date > date('Y-m-d')) {
                                                                ?>
                                                                <span class="alert alert-info fade show">Upcoming</span>
                                                                <?php
                                                            }
                                                            ?>
                                                        </td>

                                                        <td>
                                                            <a onclick="delete_link('offer/<?php echo base64_encode(base64_encode($data->offer_id)); ?>')" style="cursor: pointer"  data-toggle="tooltip" data-placement="bottom" title="Remove Data">
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