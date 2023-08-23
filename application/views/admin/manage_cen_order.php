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
                        <li class="breadcrumb-item"><span>Orders</span></li>
                        <li class="breadcrumb-item"><span>Cancel Orders</span></li>
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
                                        <h4 class="element-header">View all Cancel Orders</h4>
                                        <div class="element-box">
                                            <div class="table-responsive">
                                                <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                                                    <thead>
                                                        <tr class="text-center">
                                                            <th>No.</th>
                                                            <th>Order Detail</th>
                                                            <th>Product Detail</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $c = 0;
                                                        foreach ($bill_data as $bdata) {
                                                            $c++;
                                                            $name = $this->md->my_select('tbl_register', '*', array('register_id' => $bdata->register_id))[0]->name;
                                                            $address = $this->md->my_select('tbl_shipment', '*', array('shipment_id' => $bdata->shipment_id))[0]->address;
                                                            ?>
                                                            <tr class="text-center">
                                                                <td style="vertical-align: top;"><?php echo $c; ?></td>
                                                                <td style="text-align: left;vertical-align: top;width: 45%;">
                                                                    <p><b>Name :</b> <?php echo $name; ?></p>
                                                                    <p><b>Delivery Address :</b> <?php echo $address; ?></p>
                                                                    <p><b>Date :</b> <?php echo date('d-m-Y', strtotime($bdata->bill_date)); ?></p>
                                                                    <p><b>Order ID :</b> <?php echo $bdata->order_id; ?></p>
                                                                    <p><b>Payment Mode :</b> <?php echo ($bdata->pay_type == "cod") ? 'Cash on Delivery' : 'Online Payment'; ?></p>
                                                                    <?php
                                                                    if ($bdata->pay_type != "cod"):
                                                                        ?>
                                                                        <p><b>Payment ID :</b> <?php echo $bdata->payment_id; ?></p>
                                                                        <?php
                                                                    endif;
                                                                    ?> 
                                                                    <p><b>Amount :</b> Rs. <?php echo $bdata->amount; ?>/-</p>
                                                                    <p><b>Shipping Charge :</b> Rs. 100/-</p>
                                                                    <?php
                                                                    $amt = 0;
                                                                    if( $bdata->promocode_id > 0)
                                                                    {
                                                                        $promocode = $this->md->my_select('tbl_promocode','*',array('promocode_id'=>$bdata->promocode_id))[0];
                                                                        $code = $promocode->code;
                                                                        $amt= $promocode->amount;
                                                                        
                                                                    ?>
                                                                    <p><b>Promocode ( <?php echo $code; ?> ) :</b> Rs. <?php echo $amt; ?>/-</p>
                                                                    <?php 
                                                                    }
                                                                        $total = ( $bdata->amount + 100 ) - $amt;
                                                                   
                                                                    ?>
                                                                    <p><b>Total :</b> Rs. <?php echo $total; ?>/-</p>
                                                                </td>
                                                                <td style = "text-align: left;vertical-align: top; width: 45%;">    
                                                                    <?php
                                                                    $trn_data = $this->md->my_select('tbl_transaction','*',array('bill_id'=>$bdata->bill_id));
                                                                    
                                                                    foreach ( $trn_data as $tdata) {
                                                                        $productinfo = $this->md->my_select('tbl_product','*',array('product_id'=>$tdata->product_id))[0];
                                                                        $imageinfo = $this->md->my_select('tbl_product_image','*',array('image_id'=>$tdata->image_id))[0];
                                                                        
                                                                        $allpath = explode(",", $imageinfo->path);
                                                                        ?>
                                                                        <div class="row">
                                                                            <div class="col-md-3">
                                                                                <img src="<?php echo base_url().$allpath[0]; ?>" style="width: 100%;" alt="<?php echo $productinfo->name; ?>"/>
                                                                            </div>
                                                                            <div class="col-md-9">
                                                                                <p><a href=""> <?php echo substr($productinfo->name,0,50) ?>..</a></p>
                                                                                <p><b>Gross Price :</b> Rs. <?php echo $tdata->gross_price; ?>/- </p>
                                                                                <p><b>Discount :</b> Rs. <?php echo $tdata->discount; ?>/- </p>
                                                                                <p><b>Net Price :</b> Rs. <?php echo $tdata->net_price; ?>/- </p>
                                                                                <p><b>Qty :</b> <?php echo $tdata->qty; ?> </p>
                                                                                <p><b>Total :</b> Rs. <?php echo $tdata->total_price ?>/- </p>
                                                                            </div>
                                                                            <hr/>
                                                                        </div>
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