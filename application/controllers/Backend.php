<?php

class Backend extends CI_Controller {

    public function state() {
        $wh['parent_id'] = $this->input->post('id');
        $record = $this->md->my_select('tbl_location', '*', $wh);

        echo '<option value="">Select State</option>';    
        foreach ($record as $data) {
            ?>
            <option value="<?php echo $data->location_id; ?>"><?php echo $data->name; ?></option>
            <?php
        }
    }
    
    public function city() {
        $wh['parent_id'] = $this->input->post('id');
        $record = $this->md->my_select('tbl_location', '*', $wh);

        echo '<option value="">Select City</option>';    
        foreach ($record as $data) {
            ?>
            <option value="<?php echo $data->location_id; ?>"><?php echo $data->name; ?></option>
            <?php
        }
    }
    
    public function subcategory() {
        $wh['parent_id'] = $this->input->post('id');
        $record = $this->md->my_select('tbl_category', '*', $wh);

        echo '<option value="">Select category</option>';    
        foreach ($record as $data) {
            ?>
            <option value="<?php echo $data->category_id; ?>"><?php echo $data->name; ?></option>
            <?php
        }
    }
    
    public function petacategory() {
        $wh['parent_id'] = $this->input->post('id');
        $record = $this->md->my_select('tbl_category', '*', $wh);

        echo '<option value="">Peta category</option>';    
        foreach ($record as $data) {
            ?>
            <option value="<?php echo $data->category_id; ?>"><?php echo $data->name; ?></option>
            <?php
        }
    }
    
    
    
    public function change_status() {
        $action = $this->input->post('action');
        $id = $this->input->post('id');

        if ($action == "banner") {
            $wh['banner_id'] = $id;
            $status = $this->md->my_select('tbl_banner', 'status', $wh)[0]->status;
            
            if($status == 1){
                $ins['status'] = 0;
            } else {
                $ins['status'] = 1;
            }
            $this->md->my_update('tbl_banner' , $ins , $wh);
        }
        if($action == "promocode") 
        {
            $wh['promocode_id'] = $id;
            $status = $this->md->my_select('tbl_promocode', 'status', $wh)[0]->status;
            
            if($status == 1){
                $ins['status'] = 0;
            } else {
                $ins['status'] = 1;
            }
            $this->md->my_update('tbl_promocode' , $ins , $wh);
        }
        if ($action == "register") {
            $wh['register_id'] = $id;
            $status = $this->md->my_select('tbl_register', 'status', $wh)[0]->status;
            
            if($status == 1){
                $ins['status'] = 0;
            } else {
                $ins['status'] = 1;
            }
            $this->md->my_update('tbl_register' , $ins , $wh);
        }
        if ($action == "product") {
            $wh['product_id'] = $id;
            $status = $this->md->my_select('tbl_product', 'status', $wh)[0]->status;
            
            if($status == 1){
                $ins['status'] = 0;
            } else {
                $ins['status'] = 1;
            }
            $this->md->my_update('tbl_product' , $ins , $wh);
        }
        if ($action == "review") {
            $wh['review_id'] = $id;
            $status = $this->md->my_select('tbl_review', 'status', $wh)[0]->status;
            
            if($status == 1){
                $ins['status'] = 0;
            } else {
                $ins['status'] = 1;
            }
            $this->md->my_update('tbl_review' , $ins , $wh);
        }
    }
    
    
    public function subscribe() 
    {
       $wh['email'] = $this->input->post('email');
       $count = count($this->md->my_select('tbl_email_subscriber','*',$wh));
       
       if( $count == 1)
       {
           echo 2;
       }
       else
       {
           echo $this->md->my_insert('tbl_email_subscriber',$wh);
       }
    }
    
    public function change_image()
    {
        $this->session->set_userdata('image_id', $this->input->post('id'));
        
        
        $wh['image_id'] = $this->input->post('id');
        
        ?>
            <div class="single-product-scroll">
                                            <div class="single-product-cover">
                                                <?php 
                                                    $img = $this->md->my_select('tbl_product_image','*',$wh)[0];
                                                    $path = $img->path;
                                                    $allpath = explode(",", $path);
                                                    
                                                    foreach ( $allpath as $single )
                                                    {
                                                ?>
                                                <div class="single-slide zoom-image-hover">
                                                    <img class="img-responsive" src="<?php echo base_url().$single; ?>" >
                                                </div>
                                                <?php 
                                                    }
                                                ?>
                                            </div>
                                            <div class="single-nav-thumb">
                                                <?php 
                                                   foreach ( $allpath as $single )
                                                    { 
                                                ?>
                                                <div class="single-slide">
                                                    <img class="img-responsive" src="<?php echo base_url().$single; ?>">
                                                </div>
                                                <?php 
                                                    }
                                                ?>
                                            </div>
                                        </div>
        <?php
        
        $this->load->view('footerscript');
    }
    
    public function cart_btn() 
    {
        $wh['image_id'] = $this->input->post('id');
        $img = $this->md->my_select('tbl_product_image','*',$wh)[0];
        
        ?>
        <?php
        if( $img->qty > 0)
        {
            if( $this->session->userdata('member') )
                {
                    $ww['register_id'] = $this->session->userdata('member');
                    $ww['image_id'] = $img->image_id;
                    $cart_added = count($this->md->my_select('tbl_cart','*',$ww));
                    if( $cart_added == 1)
                    {
                        ?>
                    <div class="ec-single-cart " style="cursor: pointer;">                                
                        <button class="btn btn-primary" style="background: #000">Already Added Cart</button>
                                                </div>
                                                    <?php
                                                            }
                                                            else
                                                            {
                                                            ?>
                                                            <div class="ec-single-cart " style="cursor: pointer;">
                                                                <a onclick="add_cart_detail( <?php echo $img->product_id; ?> )">
                                                                <button class="btn btn-primary">Add To Cart</button>
                                                                </a>
                                                            </div>
                                                            <?php  
                                                            }
                                                        }
                                                        else
                                                        {
                                                    ?>
                                                    <div class="ec-single-cart" style="cursor: pointer;">
                                                        <a href="<?php echo base_url(); ?>login">
                                                    <button class="btn btn-primary">Add To Cart</button>
                                                    </a>
                                                </div>
                                                <?php
                                                }
                                                    }
                                                ?>                                                
        <?php
        
    }
    
    
    public function stock_status() 
    {
        $wh['image_id'] = $this->input->post('id');
        $img = $this->md->my_select('tbl_product_image','*',$wh)[0];
        ?>
        <?php
                                                        if ($img->qty == 0) {
                                                            ?>
                                                            <span class="ec-single-ps-title" style="color: #ff0202">OUT OF STOCK</span>
                                                    <?php
                                                        } else {
                                                            ?>
                                                            <span class="ec-single-ps-title" style="color: #6fff62">IN STOCK</span>
                                                    <?php
                                                        }
                                                        ?>
        <?php
    }

        public function wishlist() 
     {
     $wh['product_id'] = $this->input->post('pid');
     $wh['register_id'] = $this->session->userdata('member');
     
     $wish = count( $this->md->my_select('tbl_wishlist','*',$wh));
     
     if( $wish == 0)
     {
         $this->md->my_insert('tbl_wishlist',$wh);
     }
     else 
     {
     $this->md->my_delete('tbl_wishlist',$wh);    
     }
        
    }
    
    public function add_cart() 
    {
     
        $pid = $this->input->post('pid');
        
        $ins['register_id'] = $this->session->userdata('member');
        $ins['product_id'] = $pid;
        
        $product_data = $this->md->my_select('tbl_product','*',array('product_id' => $pid))[0];
        
        if( $this->session->userdata('image_id'))
        {
            $ins['image_id'] = $this->session->userdata('image_id');
        }
        else
        {
         $image_data = $this->md->my_select('tbl_product_image','*',array('product_id' => $pid))[0];
         $ins['image_id'] = $image_data->image_id;
        }
        
        $ins['gross_price'] = $product_data->price;
        
        if( $product_data->offer_id > 0)
        {
            $rate = $this->md->my_select('tbl_offer','*',array('offer_id'=>$product_data->offer_id))[0]->rate;
            
            $discount = ( $product_data->price * $rate )/100;
            $net_price = $product_data->price - $discount;
            
            $ins['discount'] = $discount;
            $ins['net_price'] = $net_price;
        }
        else
        {
            $ins['discount'] = 0;
            $ins['net_price'] = $product_data->price;
        }
        
        $ins['qty'] = 1;
        $ins['total_price'] = $ins['net_price'];
        
       $result = $this->md->my_insert('tbl_cart',$ins);
       
       echo $result;
       
       if( $result == 1)
       {
           $this->session->unset_userdata('image_id');
       }
    }
    
    
    public function header_cart()
    { 
    ?>        
      <div id="ec-side-cart" class="ec-side-cart">
        <?php
        if ($this->session->userdata('member')) {

            $item = $this->md->my_select('tbl_cart', '*', array('register_id' => $this->session->userdata('member')));
            $item_count = 0;
            $total = 0;
            foreach ($item as $single) {
                $item_count++;
                $total = $total + $single->total_price;
            }
            ?>
            <div class="ec-cart-inner">
                <div class="ec-cart-top">
                    <div class="ec-cart-title">
                        <span class="cart_title">My Cart</span>
                        <button class="ec-close">×</button>
                    </div>

                    <ul class="eccart-pro-items">
                        <?php
                        if ($item_count == 0) {
                            ?>    
                            <h5>Your Cart Is Empty.</h5>  

                            <?php
                        } else {
                            foreach ($item as $single) {
                                $product = $this->md->my_select('tbl_product', '*', array('product_id' => $single->product_id))[0];
                                $image = $this->md->my_select('tbl_product_image', '*', array('image_id' => $single->image_id))[0];
                                $allpath = explode(",", $image->path);
                                ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>view-product-detail/<?php echo base64_encode(base64_encode($product->product_id)); ?>">
                                        <img src="<?php echo base_url() . $allpath[0]; ?>" alt="product"></a>
                                    <div class="ec-pro-content">
                                        <a href="product-left-sidebar.html" class="cart_pro_title"><?php echo $product->name; ?></a>
                                        <span class="cart-price"><span>Rs. <?php echo $product->price ?>
                                                </div>
                                                </li>
                                                <?php
                                            }
                                        }
                                        ?>
                                        </ul>
                                        </div>
                                        <div class="ec-cart-bottom">
                                            <div class="cart-sub-total">
                                                <table class="table cart-table">
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-left">Items</td>
                                                            <td class="text-right"><?php echo $item_count; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-left">Total :</td>
                                                            <td class="text-right primary-color">Rs.<?php echo $total; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="cart_btn">
                                                <a href="<?php echo base_url(); ?>view-cart" class="btn btn-primary">View Cart</a>
                                            </div>
                                        </div>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="ec-cart-inner">
                                            <div class="ec-cart-top">
                                                <div class="ec-cart-title">
                                                    <span class="cart_title">My Cart</span>
                                                    <button class="ec-close">×</button>
                                                </div>
                                                <img src="<?php echo base_url(); ?>assets/images/icons/cart.svg" class="svg_img header_svg" alt="" />
                                                <h5>Login To view Product</h5>  
                                            </div>
                                            <div class="cart_btn">
                                                <a href="<?php echo base_url(); ?>login" class="btn btn-primary">Login</a>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    </div>
                                    </div>
      
    <?php       
    }

    public function change_qty() 
    {
     $wh['cart_id'] = $this->input->post('cart_id');
     $qty = $this->input->post('qty');
     
     $cartinfo = $this->md->my_select('tbl_cart','*',$wh)[0];
     
     $net_price = $cartinfo->net_price;
     
     $total = $net_price * $qty;
     
     $up['total_price'] = $total;
     $up['qty'] = $qty;
     
     echo $this->md->my_update('tbl_cart',$up,$wh);
    }

    public function remove_cart()
    {
        $wh['cart_id'] = $this->input->post('cart_id');
        echo $this->md->my_delete('tbl_cart',$wh);
    }
    
    public function remove_wish()
    {
        $wh['wish_id'] = $this->input->post('wish_id');
        echo $this->md->my_delete('tbl_wishlist',$wh);
    }
    
    public function remove_review()
    {
        $wh['review_id'] = $this->input->post('review_id');
        echo $this->md->my_delete('tbl_review',$wh);
    }
    
    public function remove_address()
    {
        $wh['shipment_id'] = $this->input->post('shipment_id');
        echo $this->md->my_delete('tbl_shipment',$wh);
    }
    
    public function cartdata() 
    {
        ?>
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
                                                        <a href="<?php echo base_url(); ?>collections">    Continue Shopping</a>
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
        <?php
    }
    
    public function select_address() 
    {
        $id = $this->input->post('id');
        $this->session->set_userdata('shipment_id',$id);
        ?>
        
        <form action="">
            <div class="row">
                <?php
                    $whh['register_id'] = $this->session->userdata('member');
                    $shipment = $this->md->my_select('tbl_shipment','*',$whh);
                                                        
                    foreach( $shipment as $data)
                        {
                                                        ?>
                                                        <div class="col-lg-3 col-md-6">
                                                            <div class="ec-vendor-dashboard-sort-card color-blue" style="height:89%; min-height: 250px;">
                                                                <h5 style="min-height: 50px;"><?php echo $data->name; ?></h5>
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
                                                           <a>
                                                            <div class="ec-vendor-dashboard-sort-card color-blue" style="height:89%">
                                                                <br><br>
                                                                <img style="margin-left: 45px;" src="<?php echo base_url(); ?>assets/images/common/plus.png" />
                                                                <br><br>
                                                                <p style="font-size: larger;">Add New Address</p> 
                                                            </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                            </form>    
        <?php
    }

        public function order_summary() 
    {
        ?>
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
        
        <?php
    }
    
    public function apply_code() 
    {
        $wh['code'] = $this->input->post('code');
        $wh['min_bill_price <='] = ($this->session->userdata('bill_amount') + 100);
        $wh['status'] = 1;
        
        $data = $this->md->my_select('tbl_promocode','*',$wh);
        $valid_code = count($data);
        
        if( $valid_code == 1)
        {
            $this->session->set_userdata('promocode_id',$data[0]->promocode_id);
            echo 1;
        }
        else
        {
            echo 0;
        }
    }
    
    public function order_status() 
    {
        $data['status'] = $this->input->post('status');
        $wh['bill_id'] = $this->input->post('bill_id');
        
        $this->md->my_update('tbl_bill',$data,$wh);
        
        //mailerr
        $bill = $this->md->my_select('tbl_bill','*',$wh)[0];
        $email = $this->md->my_select('tbl_register','*',array('register_id'=>$bill->register_id))[0]->email;
        
        
        if( $this->input->post('status') == 1)
        {
            $subject = "Order Accepted.";
            $msg = '<!DOCTYPE html>

<html lang="en" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">
    <head>
        <title></title>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml><![endif]-->
        <!--[if !mso]><!-->
        <link href="<?php echo base_url(); ?>https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css"/>
        <!--<![endif]-->
        <style>
            * {
                box-sizing: border-box;
            }

            body {
                margin: 0;
                padding: 0;
            }

            a[x-apple-data-detectors] {
                color: inherit !important;
                text-decoration: inherit !important;
            }

            #MessageViewBody a {
                color: inherit;
                text-decoration: none;
            }

            p {
                line-height: inherit
            }

            @media (max-width:670px) {
                .icons-inner {
                    text-align: center;
                }

                .icons-inner td {
                    margin: 0 auto;
                }

                .row-content {
                    width: 100% !important;
                }

                .column .border {
                    display: none;
                }

                .stack .column {
                    width: 100%;
                    display: block;
                }
            }
        </style>
    </head>
    <body style="background-color: #000000; margin: 0; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">
        <table border="0" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #000000;" width="100%">
            <tbody>
                <tr>
                    <td>
                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-2" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f3e6f8;" width="100%">
                            <tbody>
                                <tr>
                                    <td>
                                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #d4d0ff; background-image: url(https://i.ibb.co/3c7LZq0/bg-white-rombo2.png); background-repeat: no-repeat; color: #000000; width: 650px;" width="650">
                                            <tbody>
                                                <tr>
                                                    <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 45px; padding-bottom: 0px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
                                                        <table border="0" cellpadding="20" cellspacing="0" class="divider_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                                            <tr>
                                                                <td>
                                                                    <div align="center">
                                                                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                                                            <tr>
                                                                                <td class="divider_inner" style="font-size: 1px; line-height: 1px; border-top: 0px solid #BBBBBB;"><span> </span></td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <table border="0" cellpadding="0" cellspacing="0" class="heading_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                                            <tr>
                                                                <td style="padding-top:35px;text-align:center;width:100%;">
                                                                    <h1 style="margin: 0; color: #1213c0; direction: ltr; font-family: "Cabin", Arial, "Helvetica Neue", Helvetica, sans-serif; font-size: 28px; font-weight: normal; letter-spacing: normal; line-height: 120%; text-align: center; margin-top: 0; margin-bottom: 0;"><strong>Order Accepted</strong></h1>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <table border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
                                                            <tr>
                                                                <td style="padding-left:45px;padding-right:45px;padding-top:10px;">
                                                                    <div style="font-family: Arial, sans-serif">
                                                                        <div style="font-size: 12px; font-family: "Cabin", Arial, "Helvetica Neue", Helvetica, sans-serif; mso-line-height-alt: 18px; color: #393d47; line-height: 1.5;">
                                                                            <p style="margin: 0; text-align: center; mso-line-height-alt: 27px;"><span style="font-size:18px;color:#6d67cf;">Order id :'.$bill->order_id.'</span></p>
                                                                            <p style="margin: 0; text-align: center; mso-line-height-alt: 27px;"><span style="font-size:18px;color:#6d67cf;">Thank you for your order.</span></p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <table border="0" cellpadding="20" cellspacing="0" class="divider_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                                            <tr>
                                                                <td>
                                                                    <div align="center">
                                                                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="80%">
                                                                            <tr>
                                                                                <td class="divider_inner" style="font-size: 1px; line-height: 1px; border-top: 1px solid #b6b4fc;"><span> </span></td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <table border="0" cellpadding="20" cellspacing="0" class="image_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                                            <tr>
                                                                <td>
                                                                    <div align="center" style="line-height:10px"><img alt="Forgot your password?" src="https://i.ibb.co/gMFYwj5/Shangar2.png" style="display: block; height: auto; border: 0; width: 325px; max-width: 100%;" title="Forgot your password?" width="325"/></div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <table border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
                                                            <tr>
                                                                <td style="padding-bottom:15px;padding-left:10px;padding-right:10px;padding-top:10px;">
                                                                    <div style="font-family: Arial, sans-serif">
                                                                        <div style="font-size: 12px; font-family: "Cabin", Arial, "Helvetica Neue", Helvetica, sans-serif; mso-line-height-alt: 14.399999999999999px; color: #393d47; line-height: 1.2;">
                                                                            <p style="margin: 0; font-size: 14px; text-align: center;"><span style="font-size:10px;color:#6d67cf;"><span style="">Please do not reply to this email.</span></span></p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <table border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
                                                            <tr>
                                                                <td style="padding-bottom:20px;padding-left:10px;padding-right:10px;padding-top:10px;">
                                                                    <div style="font-family: sans-serif">
                                                                        <div style="font-size: 12px; mso-line-height-alt: 14.399999999999999px; color: #393d47; line-height: 1.2; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;">
                                                                            <p style="margin: 0; font-size: 14px; text-align: center;"><span style="color:#403b8f;">Copyright © 2022 </span></p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-3" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f3e6f8;" width="100%">
                            <tbody>
                                <tr>
                                    <td>
                                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 650px;" width="650">
                                            <tbody>
                                                <tr>
                                                    <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 10px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
                                                        <table border="0" cellpadding="5" cellspacing="0" class="divider_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                                            <tr>
                                                                <td>
                                                                    <div align="center">
                                                                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                                                            <tr>
                                                                                <td class="divider_inner" style="font-size: 1px; line-height: 1px; border-top: 0px solid #BBBBBB;"><span> </span></td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table><!-- End -->
    </body>
</html>';
        }
        else
        {
            $subject = "order cancel.";
            $msg = '<!DOCTYPE html>

<html lang="en" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">
    <head>
        <title></title>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml><![endif]-->
        <!--[if !mso]><!-->
        <link href="<?php echo base_url(); ?>https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css"/>
        <!--<![endif]-->
        <style>
            * {
                box-sizing: border-box;
            }

            body {
                margin: 0;
                padding: 0;
            }

            a[x-apple-data-detectors] {
                color: inherit !important;
                text-decoration: inherit !important;
            }

            #MessageViewBody a {
                color: inherit;
                text-decoration: none;
            }

            p {
                line-height: inherit
            }

            @media (max-width:670px) {
                .icons-inner {
                    text-align: center;
                }

                .icons-inner td {
                    margin: 0 auto;
                }

                .row-content {
                    width: 100% !important;
                }

                .column .border {
                    display: none;
                }

                .stack .column {
                    width: 100%;
                    display: block;
                }
            }
        </style>
    </head>
    <body style="background-color: #000000; margin: 0; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">
        <table border="0" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #000000;" width="100%">
            <tbody>
                <tr>
                    <td>
                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-2" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f3e6f8;" width="100%">
                            <tbody>
                                <tr>
                                    <td>
                                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #d4d0ff; background-image: url(https://i.ibb.co/3c7LZq0/bg-white-rombo2.png); background-repeat: no-repeat; color: #000000; width: 650px;" width="650">
                                            <tbody>
                                                <tr>
                                                    <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 45px; padding-bottom: 0px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
                                                        <table border="0" cellpadding="20" cellspacing="0" class="divider_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                                            <tr>
                                                                <td>
                                                                    <div align="center">
                                                                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                                                            <tr>
                                                                                <td class="divider_inner" style="font-size: 1px; line-height: 1px; border-top: 0px solid #BBBBBB;"><span> </span></td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <table border="0" cellpadding="0" cellspacing="0" class="heading_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                                            <tr>
                                                                <td style="padding-top:35px;text-align:center;width:100%;">
                                                                    <h1 style="margin: 0; color: #1213c0; direction: ltr; font-family: "Cabin", Arial, "Helvetica Neue", Helvetica, sans-serif; font-size: 28px; font-weight: normal; letter-spacing: normal; line-height: 120%; text-align: center; margin-top: 0; margin-bottom: 0;"><strong>Order Cancle</strong></h1>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <table border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
                                                            <tr>
                                                                <td style="padding-left:45px;padding-right:45px;padding-top:10px;">
                                                                    <div style="font-family: Arial, sans-serif">
                                                                        <div style="font-size: 12px; font-family: "Cabin", Arial, "Helvetica Neue", Helvetica, sans-serif; mso-line-height-alt: 18px; color: #393d47; line-height: 1.5;">
                                                                            <p style="margin: 0; text-align: center; mso-line-height-alt: 27px;"><span style="font-size:18px;color:#6d67cf;">Order id :'.$bill->order_id.'</span></p>
                                                                            <p style="margin: 0; text-align: center; mso-line-height-alt: 27px;"><span style="font-size:18px;color:#6d67cf;">Sorry, But Some ression we can cancle your order.</span></p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <table border="0" cellpadding="20" cellspacing="0" class="divider_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                                            <tr>
                                                                <td>
                                                                    <div align="center">
                                                                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="80%">
                                                                            <tr>
                                                                                <td class="divider_inner" style="font-size: 1px; line-height: 1px; border-top: 1px solid #b6b4fc;"><span> </span></td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <table border="0" cellpadding="20" cellspacing="0" class="image_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                                            <tr>
                                                                <td>
                                                                    <div align="center" style="line-height:10px"><img alt="Forgot your password?" src="https://i.ibb.co/gMFYwj5/Shangar2.png" style="display: block; height: auto; border: 0; width: 325px; max-width: 100%;" title="Forgot your password?" width="325"/></div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <table border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
                                                            <tr>
                                                                <td style="padding-bottom:15px;padding-left:10px;padding-right:10px;padding-top:10px;">
                                                                    <div style="font-family: Arial, sans-serif">
                                                                        <div style="font-size: 12px; font-family: "Cabin", Arial, "Helvetica Neue", Helvetica, sans-serif; mso-line-height-alt: 14.399999999999999px; color: #393d47; line-height: 1.2;">
                                                                            <p style="margin: 0; font-size: 14px; text-align: center;"><span style="font-size:10px;color:#6d67cf;"><span style="">Please do not reply to this email.</span></span></p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <table border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
                                                            <tr>
                                                                <td style="padding-bottom:20px;padding-left:10px;padding-right:10px;padding-top:10px;">
                                                                    <div style="font-family: sans-serif">
                                                                        <div style="font-size: 12px; mso-line-height-alt: 14.399999999999999px; color: #393d47; line-height: 1.2; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;">
                                                                            <p style="margin: 0; font-size: 14px; text-align: center;"><span style="color:#403b8f;">Copyright © 2022 </span></p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-3" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f3e6f8;" width="100%">
                            <tbody>
                                <tr>
                                    <td>
                                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 650px;" width="650">
                                            <tbody>
                                                <tr>
                                                    <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 10px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
                                                        <table border="0" cellpadding="5" cellspacing="0" class="divider_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                                            <tr>
                                                                <td>
                                                                    <div align="center">
                                                                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                                                            <tr>
                                                                                <td class="divider_inner" style="font-size: 1px; line-height: 1px; border-top: 0px solid #BBBBBB;"><span> </span></td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table><!-- End -->
    </body>
</html>';
        }
        $this->md->my_mailer($email,$subject,$msg);
        //reference 
        $bill_data = $this->md->my_select('tbl_bill','*',array('status'=>0));
        
        ?>
            <thead>
            <tr class="text-center">
                <th>No.</th>
                <th>Order Detail</th>
                <th>Product Detail</th>
                <th>Action</th>
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
                    <td style="vertical-align: top;">
                        <br/><br/>
                        <button onclick="order_status(<?php echo $bdata->bill_id; ?>,1)" class="btn btn-success">Accept</button>
                        <br/><br/>
                        <button onclick="order_status(<?php echo $bdata->bill_id; ?>,2)" class="btn btn-danger">Cancel</button>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
        <?php
    }
 
    
    
    public function add_review() 
    {
        $ins['register_id'] = $this->session->userdata('member');
        $ins['product_id'] = $this->input->post('pid');
        $ins['rating'] = $this->input->post('rate');
        $ins['message'] = $this->input->post('msg');
        $ins['date'] = date('Y-m-d h:i:s');
        $ins['status'] = 0;
        
       echo $this->md->my_insert('tbl_review',$ins);
    }
    
    public function product_data() 
    {
        //echo "<pre>";
        //print_r($this->input->post());
        $action = $this->input->post('action');
        $id = $this->input->post('id');
        $limit = $this->input->post('limit');
        
        $filter_data = $this->input->post('filter_data');
        $color = array();
        $price = array();
        $offer = array();
        
       if( isset($filter_data) && count($filter_data) > 0 )
       {
           foreach ( $filter_data as $single)
           {
               if( $single['name'] == "color[]")
               {
                   array_push($color,$single['value']);
               }
               else if( $single['name'] == "price[]")
               {
                   array_push($price,$single['value']);
               }
               else if( $single['name'] == "offer[]")
               {
                   array_push($offer,$single['value']);
               }
           }
       }
        
        
?>
                       <div class="shop-pro-content">
                            <div class="shop-pro-inner">
                                <div class="row">
                                    <?php
                                    if($action == 'main-collection')
                                    {
                                        $id = base64_decode(base64_decode($id ));
                                        $sql = "SELECT * FROM `tbl_product` WHERE `main_id`= $id AND `status` = 1 ";
                                        
                                    }
                                     else if($action == 'sub-collection')
                                    {
                                        $id = base64_decode(base64_decode($id ));
                                        $sql = "SELECT * FROM `tbl_product` WHERE `sub_id`= $id AND `status` = 1 ";
                                        
                                    }
                                     else if($action == 'peta-collection')
                                    {
                                        $id = base64_decode(base64_decode($id ));
                                        $sql = "SELECT * FROM `tbl_product` WHERE `peta_id`= $id AND `status` = 1 ";
                                        
                                    }
                                     else if($action == 'todays-offer')
                                    {
                                        $sql =  "SELECT * FROM `tbl_product` WHERE `offer_id` > 0 AND `status` = 1 ";
                                    }
                                    else if($action == 'search')
                                    {
                                        $id = str_replace("-", " ", $id);
                                        $sql =  "SELECT * FROM `tbl_product` WHERE `name` like '%".$id."%' AND `status` = 1 ";
                                    }
                                    else
                                    {
                                        $sql = "SELECT * FROM `tbl_product` WHERE `status` = 1 ";
                                    }
                                    
                                    $color_str = implode("','", $color);
                                    
                                    if( count($color) > 0)
                                    {
                                        $sql.="AND `product_id` IN(SELECT `product_id` FROM `tbl_product_image` WHERE `color` IN ('".$color_str."'))";
                                    }
                                    
                                    if(count($price) > 0)
                                    {
                                        $sql.="AND ( ";
                                        foreach ($price as $single)
                                        {
                                            if($single >= 10000)
                                            {
                                                $min_price = $single;
                                                $max_price = 500000;
                                            }
                                            else
                                            {
                                                $min_price = $single;
                                                $max_price = $single + 1000;
                                            }
                                            
                                            $sql.="( `price` BETWEEN $min_price AND $max_price) OR";
                                        }
                                        $sql = rtrim($sql, "OR");
                                        $sql.= ")";
                                    }
                                    
                                    if(count($offer) > 0)
                                    {
                                        $sql.= " AND ( ";
                                        if(in_array("1", $offer))
                                        {
                                            $sql.="`offer_id` > 0 OR ";
                                        }
                                        if(in_array("0", $offer))
                                        {
                                            $sql.="`offer_id` = 0 OR ";
                                        }
                                        $sql = rtrim($sql," OR ");
                                        $sql.= " ) ";
                                    }
                                   
                                    $temp = $this->md->my_query($sql);
                                    $total_product = count($temp);
                                    
                                    
                                    $sql.= " ORDER BY `product_id` DESC limit 0,$limit";
                                    
//                                    echo $sql;
//                                    die();
                                    
                                    if( $total_product > 0)
                                    {
                                    
                                    $products = $this->md->my_query($sql);
                                    
                                    foreach ($products as $data) {
                                        //image details
                                        $image_detail = $this->md->my_select('tbl_product_image', '*', array('product_id' => $data->product_id))[0];
                                        $paths = explode(",", $image_detail->path);
                                        $single_path = $paths[0];
                                        $second_path = $paths[1];
                                        ?>
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-6 pro-gl-content">
                                            <div class="ec-product-inner">
                                                <div class="ec-pro-image-outer">
                                                    <div class="ec-pro-image">
                                                        <a href="<?php echo base_url(); ?>view-product-detail/<?php echo base64_encode(base64_encode($data->product_id)); ?>" class="image">
                                                            <img class="main-image"
                                                                 src="<?php echo base_url() . $single_path; ?>" alt="<?php echo $data->name; ?>" />
                                                            <img class="hover-image"
                                                                 src="<?php echo base_url() . $second_path; ?>" alt="<?php echo $data->name; ?>" />
                                                        </a>
                                                        <?php
                                                        if ($image_detail->qty == 0) {
                                                            ?>
                                                            <span class="percentage">Out Of Stock</span>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <span class="percentage" style="background: #6fff62">In Stock</span>
                                                            <?php
                                                        }
                                                        ?>
                                                        <?php
                                                        if ($data->offer_id > 0) {
                                                            $rate = $this->md->my_select('tbl_offer', '*', array('offer_id' => $data->offer_id))[0]->rate;
                                                            ?>
                                                            <span class="flags">
                                                                <span class="new"><?php echo $rate; ?>% Off</span>
                                                            </span>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <span class="flags">
                                                                <span class="new"></span>
                                                            </span>
                                                            <?php
                                                        }
                                                        ?>
                                                        <div class="ec-pro-actions">
                                                            <?php
                                                            if ($image_detail->qty > 0) {
                                                                if ($this->session->userdata('member')) {
                                                                    $whh['product_id'] = $data->product_id;
                                                                    $whh['register_id'] = $this->session->userdata('member');

                                                                    $cart_added = count($this->md->my_select('tbl_cart', '*', $whh));

                                                                    if ($cart_added == 0) {
                                                                        ?>
                                                                        <a onclick="add_cart(<?php echo $data->product_id; ?>)" id="cart_btn<?php echo $data->product_id; ?>" style="cursor:pointer;" title="Add To Cart" class="ec-btn-group">
                                                                            <i  class="ecicon eci-cart-arrow-down" aria-hidden="true"></i>
                                                                        </a>
                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                        <a  title="Add To Cart" class="ec-btn-group">
                                                                            <i style="color: #003eff;" class="ecicon eci-cart-plus" aria-hidden="true"></i>
                                                                        </a>
                                                                            <?php
                                                                        }
                                                                    } else {
                                                                        ?>
                                                                    <a href="<?php echo base_url(); ?>login" title="Add To Cart" class="ec-btn-group"
                                                                       ><i  class="ecicon eci-cart-arrow-down" aria-hidden="true"></i></a>
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>
                                                                <?php
                                                                if ($this->session->userdata('member')) {
                                                                    $where['product_id'] = $data->product_id;
                                                                    $where['register_id'] = $this->session->userdata('member');

                                                                    $wish_added = count($this->md->my_select('tbl_wishlist', '*', $where));
                                                                    ?>
                                                                <a class="ec-btn-group wishlist" id="wish_btn<?php echo $data->product_id; ?>" title="Wishlist" onclick="add_wish(<?php echo $data->product_id; ?>)" >
                                                                    <?php
                                                                    if ($wish_added == 1) {
                                                                        ?>
                                                                    <i  class="ecicon eci-heart" style="color:red;" aria-hidden="true"></i>
                                                                        <?php
                                                                    } else {
                                                                        ?>
                                                                    <i  class="ecicon eci-heart-o" style="color:#888;" aria-hidden="true"></i>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </a>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <a class="ec-btn-group wishlist" title="Wishlist" href="<?php echo base_url(); ?>login" >
                                                                    <i  class="ecicon eci-heart-o"  aria-hidden="true"></i>
                                                                </a>
                                                                <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ec-pro-content">
                                                    <h5 class="ec-pro-title"><a href="<?php echo base_url(); ?>view-product-detail/<?php echo base64_encode(base64_encode($data->product_id)); ?>"><?php echo $data->name; ?></a></h5>
                                                    
                                                    <div class="ec-pro-rating">
                                                        <?php
                                                    $total_rating = 0;
                                                    $total_person = 0;
                                                    $rate = $this->md->my_select("tbl_review",'*',array('product_id'=>$data->product_id,'status=>1'));
                                                    foreach($rate as $ss)
                                                    {
                                                        $total_rating += $ss->rating;
                                                        $total_person++;
                                                    }
                                                    if ( $total_person > 0)
                                                    {
                                                        $avg_rate = ceil($total_rating / $total_person);
                                                    }
                                                    else 
                                                    {
                                                        $avg_rate = 0;
                                                    }
                                                    
                                                    $fill_star = $avg_rate;
                                                    $blank_star = 5 - $fill_star;
                                                    
                                                    //fill star loop
                                                    for( $i=1 ; $i<=$fill_star ; $i++ )
                                                    {
                                                ?>
                                                <i class="ecicon eci-star"></i>
                                                <?php
                                                    }
                                                    //blank start loop
                                                    for( $i=1 ; $i<=$blank_star ; $i++ )
                                                    {
                                                ?>
                                                <i class="ecicon eci-star-o"></i>
                                                <?php
                                                    }
                                                ?>
                                                    </div>
                                                    <div><?php echo $total_person; ?> Review</div>
                                                    
                                                    <?php
                                                    if ($data->offer_id > 0) {
                                                        $old_price = $data->price;

                                                        $rate = $this->md->my_select('tbl_offer', '*', array('offer_id' => $data->offer_id))[0]->rate;

                                                        $new_price = round($old_price - ( ( $old_price * $rate) / 100 ));
                                                        ?>
                                                        <span class="ec-price">
                                                            <span class="old-price">Rs. <?php echo $data->price; ?> /-</span>
                                                            <span class="new-price">Rs. <?php echo $new_price; ?> /-</span>
                                                        </span>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <span class="ec-price">
                                                            <span class="new-price">Rs. <?php echo $data->price; ?> /-</span>
                                                        </span>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        }
                                        if( $total_product > $limit)
                                        {
                                            $limit += 3;
                                        ?>
                                    <span class="ec-contact-wrap ec-contact-btn" >
                                        <button onclick="product_data('<?php echo $action; ?>','<?php echo base64_encode(base64_encode($id)); ?>','<?php echo $limit; ?>')" class="btn btn-primary" name="add" value="yes" type="submit">View More Products</button>
                                        </span>
                                        
                                    <?php
                                        }
                                    }
                                    else
                                    {
                                      echo "<div style='text-align: center;'><h2 class='ec-title-lds'><span><br/><br/><br/><br/><br/>NO Product Found.</span></h2></div>";  
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>        
<?php
    }
}