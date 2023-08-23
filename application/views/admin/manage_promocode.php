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
                                <h4 class="element-header">Promocode</h4>
                                <div class="element-box">
                                    <h5 class="form-header">Add New Promocode</h5>
                                    <form action="" method="post" name="city" novalidate="" class="myform">
                                        <div class="row">
                                            <div class="col-4">
                                                <!--<div class="element-box">-->
                                                <div class="form-group">
                                                    <label class="col-form-label col-sm-5" for="">Code Name</label>
                                                    <div class="col-sm-12">
                                                        <input required="" pattern="^[a-zA-Z0-9 ]+$" name="code" class="form-control <?php
                                                        if (form_error('code')) {
                                                            echo "error-border";
                                                        }
                                                        ?>" placeholder="Code Name" value="<?php
                                                               if (!isset($success) && set_value('code')) {
                                                                   echo set_value('code');
                                                               }
                                                               ?>" type="text">
                                                    </div>
                                                    <p class="err-msg">
                                                        <?php
                                                        echo form_error('code');
                                                        ?>
                                                    </p>
                                                </div> 
                                            </div>
                                            <div class="col-4">
                                                <!--<div class="element-box">-->
                                                <div class="form-group">
                                                    <label class="col-form-label col-sm-5" for="">Amount</label>
                                                    <div class="col-sm-12">
                                                        <input required="" pattern="^[0-9]+$" name="amount" class="form-control <?php
                                                        if (form_error('amount')) {
                                                            echo "error-border";
                                                        }
                                                        ?>" placeholder="Amount" value="<?php
                                                               if (!isset($success) && set_value('amount')) {
                                                                   echo set_value('amount');
                                                               }
                                                               ?>" type="text">
                                                    </div>
                                                    <p class="err-msg">
                                                        <?php
                                                        echo form_error('amount');
                                                        ?>
                                                    </p>
                                                </div> 
                                            </div>
                                            <div class="col-4">
                                                <!--<div class="element-box">-->
                                                <div class="form-group">
                                                    <label class="col-form-label col-sm-5" for="">Min Bill Price</label>
                                                    <div class="col-sm-12">
                                                        <input required="" pattern="^[0-9]+$" name="min_bill_price" class="form-control <?php
                                                        if (form_error('min_bill_price')) {
                                                            echo "error-border";
                                                        }
                                                        ?>" placeholder="Min Bill Price" value="<?php
                                                               if (!isset($success) && set_value('min_bill_price')) {
                                                                   echo set_value('min_bill_price');
                                                               }
                                                               ?>" type="text">
                                                    </div>
                                                    <p class="err-msg">
                                                        <?php
                                                        echo form_error('min_bill_price');
                                                        ?>
                                                    </p>
                                                </div> 
                                            </div>
                                        </div>
                                        <br/>
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
                                <div class="element-box">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="element-wrapper">
                                                <div class="col-6">
                                                    <h5 class="form-header">Promocode Details</h5>
                                                </div>
                                                <div class="table-responsive">
                                                    <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                                                        <thead>
                                                            <tr class="text-center">
                                                                <th>No.</th>
                                                                <th>Code</th>
                                                                <th>Amount</th>
                                                                <th>Min Bill Price</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $c = 0;
                                                            foreach ($promocode as $data) {
                                                                $c++;
                                                                ?>
                                                                <tr class="text-center">
                                                                    <td><?php echo $c; ?></td>
                                                                    <td><?php echo $data->code; ?></td>
                                                                    <td><?php echo $data->amount; ?></td>
                                                                    <td><?php echo $data->min_bill_price; ?></td>
                                                                    <td>
                                                                        <?php
                                                                        if ($data->status == 1) {
                                                                            ?>
                                                                            <a>
                                                                                <i class="pre-post os-icon os-icon-toggle-right"  onclick="change_status('promocode',<?php echo $data->promocode_id; ?>)" id="status_<?php echo $data->promocode_id; ?>"  style="cursor:pointer;color:#5156be;" style="cursor: pointer" data-toggle="tooltip" data-placement="bottom" title="Active"></i></a>
                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                            <a>
                                                                                <i class="pre-post os-icon os-icon-toggle-left"  onclick="change_status('promocode',<?php echo $data->promocode_id; ?>)" id="status_<?php echo $data->promocode_id; ?>"  style="cursor:pointer" style="cursor: pointer" data-toggle="tooltip" data-placement="bottom" title="Deactive"></i></a>

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