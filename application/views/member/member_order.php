
<!DOCTYPE html>
<html lang="en">

    <title>My Order - Shangar Collection</title>

    <?php
    $this->load->view('head');
    ?>

    <body>
        <div id="ec-overlay"><span class="loader_img"></span></div>

        <?php
        $this->load->view('header');
        ?>

        <!-- Ec breadcrumb start -->
        <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="row ec_breadcrumb_inner">
                            <div class="col-md-6 col-sm-12">
                                <h2 class="ec-breadcrumb-title">My Order</h2>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <!-- ec-breadcrumb-list start -->
                                <ul class="ec-breadcrumb-list">
                                    <li class="ec-breadcrumb-item"><a href="<?php echo base_url(); ?>home">Home</a></li>
                                    <li class="ec-breadcrumb-item active">My Order</li>
                                </ul>
                                <!-- ec-breadcrumb-list end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ec breadcrumb end -->


        <!-- User profile section -->
        <section class="ec-page-content ec-vendor-uploads ec-user-account section-space-p">
            <div class="container">
                <div class="row">
                    <!-- Sidebar Area Start -->
                    <?php
                    $this->load->view('member/member_menu');
                    ?>
                    <div class="ec-shop-rightside col-lg-9 col-md-12">
                        <div class="ec-cart-content">
                            <div class="ec-cart-inner">
                                <div class="row">
                                    <form action="#">
                                        <div class="table-content cart-table-content">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center;">No</th>
                                                        <th style="text-align: center;">Order Date</th>
                                                        <th style="text-align: center;">Order Details</th>
                                                        <th style="text-align: center;">Payment Mode</th>
                                                        <th style="text-align: center;width: 10%">Status</th>
                                                        <th style="text-align: center;">View More</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $c = 0;
                                                    foreach ($bill_data as $bdata) {
                                                        $c++;
                                                        ?>
                                                        <tr>
                                                            <td style="text-align: center;"><?php echo $c; ?></td>
                                                            <td style="text-align: center;"><?php echo date('d-m-y', strtotime($bdata->bill_date)); ?></td>
                                                            <td data-label="Product" class="ec-cart-pro-name" style="text-align: left;vertical-align: top;">
                                                                <?php
                                                                $trn_data = $this->md->my_select('tbl_transaction', '*', array('bill_id' => $bdata->bill_id));

                                                                foreach ($trn_data as $tdata) {
                                                                    $productinfo = $this->md->my_select('tbl_product', '*', array('product_id' => $tdata->product_id))[0];
                                                                    $imageinfo = $this->md->my_select('tbl_product_image', '*', array('image_id' => $tdata->image_id))[0];

                                                                    $allpath = explode(",", $imageinfo->path);
                                                                    ?>
                                                                    <div class="row">
                                                                        <div class="col-md-3">
                                                                            <img src="<?php echo base_url() . $allpath[0]; ?>" style="width: 100%;" alt="<?php echo $productinfo->name; ?>"/>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <p><b><?php echo $productinfo->name; ?></b></p>
                                                                            <p><b>Price :</b><?php echo $tdata->net_price ?></p>
                                                                            <p><b>Qty :</b><?php echo $tdata->qty; ?></</p>
                                                                        </div>
                                                                    </div>
                                                                    <hr/>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </td>
                                                            <td><?php
                                                                if ($bdata->pay_type == "online") {
                                                                    echo "online payment";
                                                                } else {

                                                                    echo"Case on Delivery";
                                                                }
                                                                ?>
                                                            </td>

                                                            <td style="text-align: center;">
                                                                <?php
                                                                if ($bdata->status == 0) {

                                                                    echo '<span class="badge bg-info">Pending</span>';
                                                                } elseif ($bdata->status == 1) {
                                                                    echo '<span class="badge bg-success">Accept</span>';
                                                                } elseif ($bdata->status == 2) {
                                                                    echo '<span class="badge bg-danger">Cancel</span>';
                                                                }
                                                                ?>
                                                            </td>
                                                
                                                            <td data-label="Total" class="ec-cart-pro-subtotal" style="text-align: center;"><a href="<?php echo base_url(); ?>member-order-detail/<?php echo base64_encode(base64_encode($bdata->bill_id));  ?>">View Detail</a></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </section>
    <!-- End User profile section -->

    <?php
    $this->load->view('footer');
    ?>

    <?php
    $this->load->view('footerscript');
    ?>

</body>

</html>