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
                        <li class="breadcrumb-item"><span>Member</span></li>
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
                                        <h4 class="element-header">View All Member</h4>
                                        <div class="element-box row col-12">
                                            <div class="col-6">
                                                <h5 class="form-header">Member Details</h5>
                                            </div>
                                            <div class="col-6">
                                                <p class="form-header" align="right">
                                                    <button class="btn btn-danger" data-target="#exampleModal1" data-toggle="modal">Delete All Record</button>
                                                </p>
                                            </div>
                                            <div class="table-responsive">
                                                <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                                                    <thead>
                                                        <tr class="text-center">
                                                            <th>No.</th>
                                                            <th>Profile</th>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Mobile</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $c = 0;
                                                        foreach ($member as $data) {
                                                            $c++;
                                                            ?>
                                                            <tr class="text-center">
                                                                <td><?php echo $c; ?></td>
                                                                <td>
                                                                    <?php
                                                                    if(strlen($data->profile_pic)>0)
                                                                    {
                                                                    ?>
                                                                    <img src="<?php echo base_url().$data->profile_pic; ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo $data->name; ?>" alt="Workplace" usemap="#workmap" width="40" height="40" >
                                                                    <?php 
                                                                    }
                                                                    else
                                                                    {
                                                                    ?>
                                                                    <img src="<?php echo base_url(); ?>admin_assets/img/user.png" data-toggle="tooltip" data-placement="bottom" title="<?php echo $data->name; ?>" alt="Workplace" usemap="#workmap" width="40" height="40" >
                                                                    <?php 
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td><?php echo $data->name; ?></td>
                                                                <td>    
                                                                    <a href="mailto:<?php echo $data->email; ?>"><?php echo $data->email; ?></a>
                                                                </td>
                                                                <td><?php echo $data->mobile; ?></td>
                                                                <td>
                                                                    <?php
                                                                    if ($data->status == 1) {
                                                                        ?>
                                                                        <a>
                                                                            <i class="pre-post os-icon os-icon-toggle-right"  onclick="change_status('register',<?php echo $data->register_id; ?>)" id="status_<?php echo $data->register_id; ?>"  style="cursor:pointer;color:#5156be;" style="cursor: pointer" data-toggle="tooltip" data-placement="bottom" title="Active"></i></a>
                                                                        <?php
                                                                    } else {
                                                                        ?>
                                                                        <a>
                                                                            <i class="pre-post os-icon os-icon-toggle-left"  onclick="change_status('register',<?php echo $data->register_id; ?>)" id="status_<?php echo $data->register_id; ?>"  style="cursor:pointer" style="cursor: pointer" data-toggle="tooltip" data-placement="bottom" title="Deactive"></i></a>

                                                                        <?php
                                                                    }
                                                                    ?>
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