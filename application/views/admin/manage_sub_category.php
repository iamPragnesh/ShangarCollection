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
                        <li class="breadcrumb-item"><span>Category</span></li>
                        <li class="breadcrumb-item"><span>Sub Category</span></li>
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
                                        <h4 class="element-header">Sub Category</h4>
                                        <?php
                                        if (isset($editsubcategory)) {
                                            ?>
                                        <div class="element-box">
                                            <h5 class="form-header">Edit Sub Category</h5>
                                            <form action="" method="post" name="subcategory" novalidate="" class="myform">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-sm-4" for="">Edit Main Category</label>
                                                            <select class="form-control <?php
                                                            if (form_error('maincategory')) {
                                                                echo "error-border";
                                                            }
                                                            ?>" required="" name="maincategory">
                                                                <option value="">Select category</option>
                                                                <?php
                                                                foreach ($maincategory as $data) {
                                                                    ?>
                                                                    <option value="<?php echo $data->category_id; ?>" <?php
                                                                    if (!isset($success) && set_select('maincategory', $data->category_id)) 
                                                                    {
                                                                        echo set_select('maincategory', $data->category_id);
                                                                    }
                                                                    else
                                                                        {
                                                                            if( $data->category_id == $editsubcategory[0]->parent_id)
                                                                            {
                                                                                echo "selected";
                                                                            }
                                                                        }
                                                                    ?>><?php echo $data->name; ?></option>
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
                                                    <div class="col-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-sm-4" for="">Enter Sub Category</label>
                                                            <div class="col-sm-12">
                                                                <input class="form-control <?php
                                                                if (form_error('subcategory')) {
                                                                    echo "error-border";
                                                                }
                                                                ?>" placeholder="Enter Sub Category" value="<?php
                                                                       if (!isset($success) && set_value('subcategory')) {
                                                                           echo set_value('subcategory');
                                                                       }
                                                                       else
                                                                           {
                                                                               echo $editsubcategory[0]->name;
                                                                           }
                                                                           ?>" type="text" required="" pattern="^[a-zA-Z ]+$" name="subcategory" >
                                                            </div>
                                                            <p class="err-msg">
                                                                <?php
                                                                echo form_error('subcategory');
                                                                ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <p class="form-header">
                                                        <button type="submit" name="edit" value="yes" class="btn btn-primary">Edit</button>
                                                        <a href="<?php echo base_url(); ?>manage-sub-category" type="" name="" class="btn btn-default">Go Back</a>
                                                    </p>
                                                </div>
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
                                            <h5 class="form-header">Add New Sub Category</h5>
                                            <form action="" method="post" name="subcategory" novalidate="" class="myform">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-sm-4" for="">Select Main Category</label>
                                                            <select class="form-control <?php
                                                            if (form_error('maincategory')) {
                                                                echo "error-border";
                                                            }
                                                            ?>" required="" name="maincategory">
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
                                                            </select>
                                                            <p class="err-msg">
                                                                <?php
                                                                echo form_error('maincategory');
                                                                ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-sm-4" for="">Enter Sub Category</label>
                                                            <div class="col-sm-12">
                                                                <input class="form-control <?php
                                                                if (form_error('subcategory')) {
                                                                    echo "error-border";
                                                                }
                                                                ?>" placeholder="Enter Sub Category" value="<?php
                                                                       if (!isset($success) && set_value('subcategory')) {
                                                                           echo set_value('subcategory');
                                                                       }
                                                                       ?>" type="text" required="" pattern="^[a-zA-Z ]+$" name="subcategory" >
                                                            </div>
                                                            <p class="err-msg">
                                                                <?php
                                                                echo form_error('subcategory');
                                                                ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <p class="form-header">
                                                        <button type="submit" name="add" value="yes" class="btn btn-primary">Add</button>
                                                        <button type="reset" name="clear" class="btn btn-default">Clear</button>
                                                    </p>
                                                </div>
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
                                            <div class="table-responsive">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <h5 class="form-header">View All Category</h5>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="form-header" align="right">
                                                            <button onclick="delete_link('subcategory/<?php echo base64_encode(base64_encode(0)); ?>')" class="btn btn-danger" data-target="#exampleModal1" data-toggle="modal">Delete All Record</button>
                                                        </p>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                                                            <thead>
                                                                <tr class="text-center">
                                                                    <th>No.</th>
                                                                    <th>Main Category</th>
                                                                    <th>Sub Category</th>
                                                                    <th>change</th>
                                                                    <th>Remove</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $c = 0;
                                                                foreach ($subcategory as $data) {
                                                                    $c++;
                                                                    ?>
                                                                    <tr class="text-center">
                                                                        <td><?php echo $c; ?></td>
                                                                        <td><?php echo $data->maincategory; ?></td>
                                                                        <td><?php echo $data->name; ?></td>
                                                                        <td>
                                                                            <a href="<?php echo base_url() ?>manage-sub-category/<?php echo base64_encode(base64_encode($data->category_id)); ?>" style="cursor: pointer"  data-toggle="tooltip" data-placement="bottom" title="Edit">
                                                                                <i class="pre-icon os-icon os-icon-pencil-2" type="button"></i></a>
                                                                        </td>
                                                                        <td>
                                                                            <a onclick="delete_link('subcategory/<?php echo base64_encode(base64_encode($data->category_id)); ?>')" style="cursor: pointer"  data-toggle="tooltip" data-placement="bottom" title="Remove Data">
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
</div>
</body>

</html>