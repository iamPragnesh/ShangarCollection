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
                        <li class="breadcrumb-item"><span>Banner</span></li>
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
                                        <h4 class="element-header">Banner</h4>
                                        <div class="element-box">
                                            <h5 class="form-header">Add New Banner</h5>
                                            <form class="myform" method="post" action="" name="photo" novalidate="" enctype="multipart/form-data">  
                                                <div class="row">
                                                    <div class="col-6">
                                                        <br/>
                                                        <div class="form-group">
                                                            <label class="col-form-label col-sm-5"  for="">Title</label>
                                                            <div class="col-sm-12">
                                                                <input class="form-control <?php
                                                                if (form_error('title')) {
                                                                    echo "error-border";
                                                                }
                                                                ?>" required="" name="title" placeholder="Title" value="<?php
                                                                       if (!isset($success) && set_value('title')) {
                                                                           echo set_value('title');
                                                                       }
                                                                       ?>" type="">
                                                                <p class="err-msg">
                                                                    <?php
                                                                    echo form_error('title');
                                                                    ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-form-label col-sm-5"  for="">Subtitle</label>
                                                            <div class="col-sm-12">
                                                                <input class="form-control <?php
                                                                if (form_error('subtitle')) {
                                                                    echo "error-border";
                                                                }
                                                                ?>" required="" name="subtitle" placeholder="Subtitle" value="<?php
                                                                       if (!isset($success) && set_value('subtitle')) {
                                                                           echo set_value('subtitle');
                                                                       }
                                                                       ?>" type="">
                                                                <p class="err-msg">
                                                                    <?php
                                                                    echo form_error('subtitle');
                                                                    ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br/>
                                                    <div class="col-sm-6">
                                                        <center>
                                                            <div  style="padding: 10px;">
                                                                <img style="" id="preview" src="admin_assets/img/user.png" class="img-thumbnail"  width="250px" />
                                                            </div>
                                                            <br/>
                                                            <div class="custom-file">
                                                                <input accept="image/*" type="file" id="setPhoto" name="photo" class="custom-file-input-new">
                                                            </div>
                                                        </center>
                                                    </div>
                                                    <button type="submit" name="add" value="yes" class="btn btn-primary waves-effect waves-light">Upload</button>
                                                    <button type="reset" class="btn btn-default waves-effect waves-light">Clear</button>
                                                </div>
                                                <br/>
                                                <?php
                                                if (isset($success)) {
                                                    ?>
                                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                                            <span aria-hidden="true"> ×</span>
                                                        </button><strong>Ok! </strong><?php echo $success; ?>
                                                    </div>
                                                    <?php
                                                }
                                                if (isset($error)) {
                                                    ?>
                                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                                            <span aria-hidden="true"> ×</span>
                                                        </button><strong>Oops!</strong><?php echo $error; ?>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="element-wrapper">
                                        <div class="element-actions">
                                            <form class="form-inline justify-content-sm-end">
                                            </form>
                                        </div>
                                        <div class="element-box">
                                            <div class="row">
                                                <div class="col-6">
                                                    <h5 class="form-header">View All Banner</h5>
                                                </div>
                                                <div class="col-6">
                                                    <p class="form-header" align="right">
                                                        <button onclick="delete_link('banner/<?php echo base64_encode(base64_encode(0)); ?>')" class="btn btn-danger" data-target="#exampleModal1" data-toggle="modal">Delete All Banner</button>
                                                    </p>
                                                </div>
                                                <div class="table-responsive">
                                                    <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                                                        <thead>
                                                            <tr class="text-center">
                                                                <th>No.</th>
                                                                <th>Title</th>
                                                                <th>Subtitle</th>
                                                                <th>Banner</th>
                                                                <th>Status</th>
                                                                <th>Remove</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody><?php
                                                            $c = 0;
                                                            foreach ($banner as $data) {
                                                                $c++;
                                                                ?>
                                                                <tr class="text-center">
                                                                    <td><?php echo $c; ?></td>
                                                                    <td><?php echo $data->title; ?></td>
                                                                    <td><?php echo $data->subtitle; ?></td>
                                                                    <td>
                                                                        <a style="cursor: pointer" target="_new" href="<?php echo base_url() . $data->path; ?>">
                                                                            <img src="<?php echo base_url() . $data->path; ?>" alt="Workplace" usemap="#workmap" width="100" height="40">
                                                                        </a>
                                                                    </td> 
                                                                    <td>
                                                                        <?php
                                                                        if ($data->status == 1) {
                                                                            ?>
                                                                            <a>
                                                                                <i class="pre-post os-icon os-icon-toggle-right"  onclick="change_status('banner',<?php echo $data->banner_id; ?>)" id="status_<?php echo $data->banner_id; ?>"  style="cursor:pointer;color:#5156be;" style="cursor: pointer" data-toggle="tooltip" data-placement="bottom" title="Active"></i></a>
                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                            <a>
                                                                                <i class="pre-post os-icon os-icon-toggle-left"  onclick="change_status('banner',<?php echo $data->banner_id; ?>)" id="status_<?php echo $data->banner_id; ?>"  style="cursor:pointer" style="cursor: pointer" data-toggle="tooltip" data-placement="bottom" title="Deactive"></i></a>

                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                        <a onclick="delete_link('banner/<?php echo base64_encode(base64_encode($data->banner_id)); ?>')" style="cursor: pointer"  data-toggle="tooltip" data-placement="bottom" title="Remove Data">
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