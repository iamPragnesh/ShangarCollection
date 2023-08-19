
<!DOCTYPE html>
<html lang="en">

    <title>My Shopping Cart - Shangar Collection</title>

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
                                <h2 class="ec-breadcrumb-title">My Shopping Cart</h2>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <!-- ec-breadcrumb-list start -->
                                <ul class="ec-breadcrumb-list">
                                    <li class="ec-breadcrumb-item"><a href="<?php echo base_url(); ?>home">Home</a></li>
                                    <li class="ec-breadcrumb-item active">My Shopping Cart</li>
                                </ul>
                                <!-- ec-breadcrumb-list end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ec breadcrumb end -->
        <div id="cartdata">
        <?php
        $wh['register_id'] = $this->session->userdata('member');
        $cartdata = $this->md->my_select('tbl_cart', '*', $wh);

        if (count($cartdata) > 0) {
            ?>
            <!-- Ec cart page -->
            <section class="ec-page-content section-space-p">
                <div class="container">
                    <div class="row">
                        <div class="ec-cart-leftside">
                            <!-- cart content Start -->
                            <div class="ec-cart-content">
                                <div class="ec-cart-inner">
                                    <div class="row">
                                        <form action="#">
                                            <div class="table-content cart-table-content">
                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Product</th>
                                                            <th>Gross Price</th>
                                                            <th>Discount</th>
                                                            <th>Net Price</th>
                                                            <th style="text-align: center;">Quantity</th>
                                                            <th>Total</th>
                                                            <th>Remove</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $gtotal = 0;
                                                        $c = 0;
                                                        foreach ($cartdata as $single) {
                                                            $c++;

                                                            $product = $this->md->my_select('tbl_product', '*', array('product_id' => $single->product_id))[0];
                                                            $image = $this->md->my_select('tbl_product_image', '*', array('image_id' => $single->image_id))[0];
                                                            $allpath = explode(",", $image->path);
                                                            
                                                            $gtotal = $gtotal + $single->total_price;
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $c; ?></td>
                                                                <td data-label="Product" class="ec-cart-pro-name"><a href="<?php echo base_url(); ?>view-product-detail/<?php echo base64_encode(base64_encode($product->product_id)); ?>" target="_new">
                                                                        <img class="ec-cart-pro-img mr-4" src="<?php echo base_url().$allpath[0]; ?>" alt="" /><?php echo substr($product->name,0,50); ?>...</a></td>
                                                                <td data-label="Price" class="ec-cart-pro-price"><span
                                                                        class="amount"><?php echo $single->gross_price; ?>/-</span></td>
                                                                <td data-label="Price" class="ec-cart-pro-price"><span
                                                                        class="amount"><?php echo $single->discount; ?></span></td>
                                                                <td data-label="Price" class="ec-cart-pro-price"><span
                                                                        class="amount"><?php echo $single->net_price; ?>/-</span></td>
                                                                <td data-label="Quantity" class="ec-cart-pro-qty"
                                                                    style="text-align: center;">
                                                                    <div>
                                                                        <?php 
                                                                            $qty = $image->qty;
                                                                            if( $qty > 5 )
                                                                            {
                                                                                $max = 5;
                                                                            }
                                                                            else
                                                                            {
                                                                                $max = $qty;
                                                                            }
                                                                        ?>
                                                                        <input  min="1" onchange="change_qty(<?php echo $single->cart_id ?> , this.value);" type="number" max="<?php echo $max; ?>"
                                                                               name="cartqtybutton" value="<?php echo $single->qty; ?>" />
                                                                        <?php 
                                                                        
                                                                        ?>
                                                                    </div>
                                                                </td>
                                                                <td data-label="Total" class="ec-cart-pro-subtotal"><?php echo $single->total_price; ?>/-</td>
                                                                <td data-label="Remove" class="ec-cart-pro-remove">
                                                                    <a onclick="remove_cart(<?php echo $single->cart_id; ?>)" class="remove"><i style="color: red;" class="ecicon eci-trash-o"></i></a>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>
                                                            <tr>
                                                                <td colspan="8" style="text-align: right;">
                                                                    <b> Grand Total:</b> &nbsp; <?php echo number_format($gtotal,2); ?>/-
                                                                </td>
                                                                <?php 
                                                                    $this->session->set_userdata('bill_amount',$gtotal);
                                                                ?>
                                                            </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="ec-cart-update-bottom">
                                                        <a href="<?php echo base_url(); ?>collections">Continue Shopping</a>
                                                        <a class="btn btn-primary" href="<?php echo base_url(); ?>checkout">Check Out</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--cart content End -->
                        </div>
                        <!-- Sidebar Area Start -->
                    </div>
                </div>
            </section>
            <?php
        } else {
            $name = $this->md->my_select('tbl_register', '*', array('register_id' => $this->session->userdata('member')))[0];
            ?>
            <section class="ec-under-maintenance">

                <div class="container">
                    <div class="row">
                        <div>
                            <div class="under-maintenance">
                                <h1><img class="cart-img" src="assets/images/common/cart.png" alt="maintenance"></h1>
                                <h2>Hi, <?php echo $name->name; ?></h2>
                                <h4>Your Shopping Cart is Empty. </h4>
                                <br/>
                                <a href="<?php echo base_url(); ?>collections" class="btn btn-lg btn-primary" tabindex="0">Continue Shopping</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php
        }
        ?>
            </div>
        <?php
        $this->load->view('footer');
        ?>

        <?php
        $this->load->view('footerscript');
        ?>

    </body>

</html>