
<!DOCTYPE html>
<html lang="en">

    <title>Checkout - Shangar Collection</title>

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
                                <h2 class="ec-breadcrumb-title">Checkout</h2>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <!-- ec-breadcrumb-list start -->
                                <ul class="ec-breadcrumb-list">
                                    <li class="ec-breadcrumb-item"><a href="<?php echo base_url(); ?>home">Home</a></li>
                                    <li class="ec-breadcrumb-item active">Checkout</li>
                                </ul>
                                <!-- ec-breadcrumb-list end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ec breadcrumb end -->

        <!-- Ec checkout page -->
        <section class="ec-page-content ec-vendor-dashboard section-space-p">
            <div class="container">
                <form method="post" action="">
                <div class="row">
                    <div class="ec-checkout-leftside col-lg-8 col-md-12 ">
                        <!-- checkout content Start -->
                        <div class="ec-checkout-content">
                            <div class="ec-checkout-inner">
                                <div class="ec-checkout-wrap margin-bottom-30">
                                    <div class="ec-checkout-block ec-check-new" >
                                        <h3 class="ec-checkout-title">Select Delivery Location</h3>
                                        <div class="ec-check-block-content" id="shipment_area">
                                                    <div class="row">
                                                        <?php
                                                        $whh['register_id'] = $this->session->userdata('member');
                                                        $shipment = $this->md->my_select('tbl_shipment','*',$whh);
                                                        
                                                        foreach( $shipment as $data)
                                                            {
                                                        ?>
                                                        <div class="col-lg-3 col-md-6">
                                                            <div class="ec-vendor-dashboard-sort-card color-blue" style="height:89%; min-height: 250px;">
                                                                <h5><?php echo $data->name; ?></h5>
                                                                <h6>(<?php echo $data->address_type; ?>)</h6>
                                                                <p style="min-height: 100px;"><?php echo $data->address; ?></p>
                                                                 <?php 
                                                                if( $this->session->userdata('shipment_id') == $data->shipment_id )
                                                                {
                                                            ?>
                                                                <a class="btn btn-primary" style="font-size: smaller; background: black;" href="#">Delivered here</a>
                                                                <?php
                                                                }
                                                                else 
                                                                {
                                                            ?>
                                                                <a class="btn btn-primary" style="font-size: 10px;" onclick="select_address(<?php echo $data->shipment_id; ?>)">Click To select</a>
                                                                <?php
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <?php 
                                                            }
                                                        ?>
                                                        <div class="col-lg-3 col-md-6">
                                                            <a href="<?php echo base_url('member-address'); ?>">
                                                            <div class="ec-vendor-dashboard-sort-card color-blue" style="height:89%">
                                                                <br><br>
                                                                <img style="margin-left: 45px;" src="<?php echo base_url(); ?>assets/images/common/plus.png" />
                                                                <br><br>
                                                                <p style="font-size: larger;">Add New Address</p> 
                                                            </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                        </div>
                                    </div>
                                    

                                </div>
                                <div class="ec-checkout-wrap margin-bottom-30 padding-bottom-3">
                                    <div class="ec-checkout-block ec-check-bill">
                                        <h3 class="ec-checkout-title">Selelct Payment Mode</h3>
                                        <div class="ec-bl-block-content">
                                            <div class="ec-check-subtitle">Checkout Options</div>
                                            <span class="ec-bill-option">
                                                <span>
                                                    <input type="radio" id="bill1" name="paytype" value="cod" <?php 
                                                        if( $this->session->userdata('paytype') && $this->session->userdata('paytype') == "cod")
                                                        {
                                                            echo "checked";
                                                        }
                                                    ?>>
                                                    <label for="bill1">Cash On Delivery</label>
                                                </span>
                                                <span>
                                                    <input type="radio" id="bill2" name="paytype" value="online"  <?php 
                                                        if( $this->session->userdata('paytype') && $this->session->userdata('paytype') == "online")
                                                        {
                                                            echo "checked";
                                                        }
                                                    ?>>
                                                    <label for="bill2">Online Payment</label>
                                                </span>
                                            </span>
                                            <h3 class="ec-checkout-title">Promocode ( Optional )</h3>
                                                <div class="row"  style="margin-left: 10px;">
                                                    <div class="col-md-5">
                                                    <div class="ec-checkout-coupan-form">
                                                        <input class="ec-coupan" id="code" type="text" placeholder="Enter Your Coupan Code" name="ec-coupan" value="">
                                                        <a onclick="apply_code();" class="ec-coupan-btn button btn-primary" name="subscribe" value="">Apply</a>
                                                    </div>
                                                        <p id="codemsg"></p>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <div style="height: 200px;overflow-y: auto;overflow-x: hidden;">
                                                            <div class="row">
                                                                <?php
                                                                    $ftotal = $this->session->userdata('bill_amount') + 100;
                                                                    
                                                                    $wh2['min_bill_price <='] = $ftotal;
                                                                    $wh2['status'] = 1;
                                                                    
                                                                    $promocode = $this->md->my_select('tbl_promocode','*',$wh2);
                                                                    
                                                                    foreach( $promocode as $data )
                                                                    {
                                                                ?>
                                                                <div class="col-md-8">
                                                                    <br/>
                                                                    <p>Rs. <?php echo $data->amount; ?> off on minimum purchase of Rs.<?php echo $data->min_bill_price; ?> bill amount.</p>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <br/>
                                                                    <span style="border:1px solid blue;padding: 10px;border-radius: 3px;font-size: 12px;font-weight: bold;margin-top: 5px;"><?php echo $data->code; ?></span>
                                                                </div>
                                                                <?php
                                                                    }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--cart content End -->
                    </div>
                    <!-- Sidebar Area Start -->
                    <div class="ec-checkout-rightside col-lg-4 col-md-12" id="order_summary">
                        <div class="ec-sidebar-wrap">
                            <!-- Sidebar Summary Block -->
                            <div class="ec-sidebar-block">
                                <div class="ec-sb-title">
                                    <h3 class="ec-sidebar-title">Order Summary</h3>
                                </div>
                                <div class="ec-sb-block-content">
                                    <div class="ec-checkout-pro">
                                        <?php 
                                            $wh['register_id'] = $this->session->userdata('member');
                                            $cart = $this->md->my_select('tbl_cart','*',$wh);
                                        
                                            $total = 0;
                                            foreach( $cart as $data)
                                            {
                                                $name = $this->md->my_select('tbl_product','*',array('product_id'=>$data->product_id))[0];
                                                $price = $data->total_price;
                                                
                                                //image details
                                                    $image_detail = $this->md->my_select('tbl_product_image', '*', array('product_id' => $data->product_id))[0];
                                                    $paths = explode(",", $image_detail->path);
                                                    $single_path = $paths[0];
                                                    $second_path = $paths[1];
                                                    
                                                    $total += $data->total_price;
                                        ?>
                                        <div class="col-sm-12 mb-6">
                                            <div class="ec-product-inner">
                                                <div class="ec-pro-image-outer">
                                                    <div class="ec-pro-image">
                                                        <a href="<?php echo base_url(); ?>view-product-detail/<?php echo base64_encode(base64_encode($data->product_id)); ?>" class="image">
                                                            <img class="main-image"
                                                                 src="<?php echo base_url() . $single_path; ?>"
                                                                 alt="<?php echo $name->name; ?>" />
                                                            <img class="hover-image"
                                                                 src="<?php echo base_url() . $second_path; ?>"
                                                                 alt="Product" />
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="ec-pro-content">
                                                    <h5 class="ec-pro-title"><a href="<?php echo base_url(); ?>view-product-detail/<?php echo base64_encode(base64_encode($data->product_id)); ?>"><?php echo substr($name->name,0,25); ?>...</a></h5>
                                                    <span>
                                                        <span>Qty: <?php echo $data->qty; ?></span>
                                                    </span>
                                                    <span class="ec-price">
                                                        <span class="new-price"><?php echo $price; ?></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <br/>
                                    <div class="ec-checkout-summary">
                                        <div>
                                            <span class="text-left">Sub-Total</span>
                                            <span class="text-right">Rs. <?php echo $total;  ?></span>
                                        </div>
                                        <?php 
                                        
                                        $gtotal = $total + 100;
                                                ?>
                                        <div>
                                            <span class="text-left">Shipping Charges</span>
                                            <span class="text-right">Rs.100</span>
                                        </div>
                                        <?php 
                                            if( $this->session->userdata('promocode_id'))
                                            {
                                                $wh3['promocode_id'] = $this->session->userdata('promocode_id');
                                                $code = $this->md->my_select('tbl_promocode','*',$wh3)[0];
                                                
                                                $gtotal = $gtotal - $code->amount;
                                        ?>
                                        <div>
                                            <span class="text-left">Promocode (<?php echo $code->code; ?>)</span>
                                            <span class="text-right">Rs.<?php echo $code->amount; ?></span>
                                        </div>
                                        <?php
                                            }
                                        ?>
                                        <div class="ec-checkout-summary-total">
                                            <span class="text-left">Total Amount</span>
                                            <button type="submit" name="pay" value="yes" class="btn btn-primary">Your pay: <?php echo $gtotal; ?></button>
                                        </div>
                                        <br/>
                                        <?php 
                                            if(isset($ship_err))
                                            {
                                        ?>
                                        <div class="recent-purchase" style="background: #ee8989;">
                                        <div class="detail">
                                            <h6><strong>Oops!</strong> <?php echo $ship_err; ?></h6>
                                        </div>
                                        <a href="javascript:void(0)" class="icon-btn recent-close">×</a>
                                    </div>
                                        <?php 
                                            }
                                            if(isset($pay_err))
                                            {
                                        ?>
                                        <div class="recent-purchase" style="background: #ee8989; margin-left: 22%;">
                                        <div class="detail">
                                            <h6><strong>Oops!</strong> <?php echo $pay_err; ?></h6>
                                        </div>
                                        <a href="javascript:void(0)" class="icon-btn recent-close">×</a>
                                    </div>
                                        <?php 
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <!-- Sidebar Summary Block -->
                        </div>
                        <div class="ec-sidebar-wrap ec-check-pay-img-wrap">
                            <!-- Sidebar Payment Block -->
                            <div class="ec-sidebar-block">
                                <div class="ec-sb-title">
                                    <h3 class="ec-sidebar-title">Payment Method</h3>
                                </div>
                                <div class="ec-sb-block-content">
                                    <div class="ec-check-pay-img-inner">
                                        <div class="ec-check-pay-img">
                                            <img src="assets/images/icons/payment1.png" alt="">
                                        </div>
                                        <div class="ec-check-pay-img">
                                            <img src="assets/images/icons/payment2.png" alt="">
                                        </div>
                                        <div class="ec-check-pay-img">
                                            <img src="assets/images/icons/payment3.png" alt="">
                                        </div>
                                        <div class="ec-check-pay-img">
                                            <img src="assets/images/icons/payment4.png" alt="">
                                        </div>
                                        <div class="ec-check-pay-img">
                                            <img src="assets/images/icons/payment5.png" alt="">
                                        </div>
                                        <div class="ec-check-pay-img">
                                            <img src="assets/images/icons/payment6.png" alt="">
                                        </div>
                                        <div class="ec-check-pay-img">
                                            <img src="assets/images/icons/payment7.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Sidebar Payment Block -->
                        </div>
                    </div>
                </div>
             </form>
            </div>
        </section>

        <?php
        $this->load->view('footer');
        ?>

        <?php
        $this->load->view('footerscript');
        ?>

    </body>

</html>