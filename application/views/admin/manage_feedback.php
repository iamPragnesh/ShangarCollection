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
                        <li class="breadcrumb-item"><span>Feedback</span></li>
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
                                        <h4 class="element-header">Feedback</h4>
                                        <div class="element-box row col-12">
                                            <div class="col-6">
                                                <h5 class="form-header">View All Feedback</h5>
                                            </div>
                                            <div class="col-6">
                                                <p class="form-header" align="right">
                                                    <button onclick="delete_link('feedback/<?php echo base64_encode(base64_encode(0)); ?>')" class="btn btn-danger" data-target="#exampleModal1" data-toggle="modal" ">Delete All Records</button>
                                                </p>
                                            </div>
                                            <div class="table-responsive">
                                                <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                                                    <thead>
                                                        <tr class="text-center">
                                                            <th>No.</th>
                                                            <th>Name</th>
                                                            <th>Message</th>
                                                            <th>Remove</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $c = 0;
                                                        foreach ($feedback as $data) {
                                                            $c++;
                                                            ?>
                                                            <tr class="text-center">
                                                                <td><?php echo $c; ?></td>
                                                                <td><?php echo $data->name; ?></td>
                                                                <td style="width: 50%"><?php echo $data->message; ?></td>
                                                                <td>
                                                                    <a onclick="delete_link('feedback/<?php echo base64_encode(base64_encode($data->feedback_id)); ?>')" style="cursor: pointer"  data-toggle="tooltip" data-placement="bottom" title="Remove Data">
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