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
                        <li class="breadcrumb-item"><span>Product</span></li>
                        <li class="breadcrumb-item"><span>View All Product</span></li>
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
                                        <h4 class="element-header">View All Product</h4>
                                        <div class="element-box row col-12">
                                            <div class="table-responsive">
                                                <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                                                    <thead>
                                                        <tr class="text-center">
                                                            <th>No.</th>
                                                            <th>Product Image</th>
                                                            <th>Product Name</th>
                                                            <th>Price</th>
                                                            <th>Update qty</th>
                                                            <th>Quantity</th>
                                                            <th>View Details</th>
                                                            <th>Satus</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $c = 0;
                                                        foreach ($products as $data) {
                                                            $c++;

                                                            //image detail
                                                            $allpath = $this->md->my_select('tbl_product_image', '*', array('product_id' => $data->product_id))[0]->path;
                                                            $qty = $this->md->my_select('tbl_product_image', '*', array('product_id' => $data->product_id))[0]->qty;
                                                            $paths = explode(",", $allpath);
                                                            $single = $paths[0];
                                                            ?>
                                                            <tr class="text-center">
                                                                <td><?php echo $c; ?></td>
                                                                <td>
                                                                    <a style="cursor: pointer" target="_new" data-toggle="tooltip" data-placement="bottom" title="<?php echo $data->name; ?>" href="<?php echo base_url() . $single; ?>" >
                                                                        <img src="<?php echo base_url() . $single; ?>" alt="<?php echo $data->name; ?>" usemap="#workmap" width="80" height="">
                                                                    </a>
                                                                </td>                                                                    
                                                                <td><?php echo $data->name; ?></td>
                                                                <td>Rs.<?php echo number_format($data->price, 2); ?></td>
                                                                <td>
                                                                    <form method="post" action="" name="qty" novalidate="">
                                                                    <div>
                                                                    <input  type="number" min="0" max="50" name="qty" value="<?php echo $qty; ?>" />
                                                                    <input  type="hidden" name="product-id" value="<?php echo $data->product_id; ?>" />
                                                                    <br/><br/>
                                                                    <button style="cursor: pointer;" type="submit" name="update" value="yes">Update</button>
                                                                    </div>
                                                                    </form>
                                                                </td>
                                                                <td><?php echo $qty; ?></td>
                                                                <td style="width: 10%;">
                                                                    <?php
                                                                    if ($data->status == 1) {
                                                                        ?>
                                                                        <a href="<?php echo base_url(); ?>" target="_new" style="cursor: pointer" data-toggle="tooltip" data-placement="bottom" title="Click For More detail">
                                                                            View Details
                                                                        </a>
                                                                        <?php
                                                                    } else {
                                                                        ?>
                                                                        <a style="cursor: pointer" data-toggle="tooltip" data-placement="bottom" title="Active to view More Detail">
                                                                            View Details
                                                                        </a>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    if ($data->status == 1) {
                                                                        ?>
                                                                        <a>
                                                                            <i class="pre-post os-icon os-icon-toggle-right"  onclick="change_status('product',<?php echo $data->product_id; ?>)" id="status_<?php echo $data->product_id; ?>"  style="cursor:pointer;color:#5156be;" style="cursor: pointer" data-toggle="tooltip" data-placement="bottom" title="Active"></i></a>
                                                                        <?php
                                                                    } else {
                                                                        ?>
                                                                        <a>
                                                                            <i class="pre-post os-icon os-icon-toggle-left"  onclick="change_status('product',<?php echo $data->product_id; ?>)" id="status_<?php echo $data->product_id; ?>"  style="cursor:pointer" style="cursor: pointer" data-toggle="tooltip" data-placement="bottom" title="Deactive"></i></a>

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