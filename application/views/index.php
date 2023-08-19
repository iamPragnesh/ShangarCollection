
<!DOCTYPE html>
<html lang="en">

    <?php
    $this->load->view('head');
    ?>

    <body>
        <div id="ec-overlay"><span class="loader_img"></span></div>

        <!-- Header start  -->
        <?php
        $this->load->view('header');
        ?>
        <!-- Header End  -->

        <!-- Main Slider Start -->
        <div class="sticky-header-next-sec ec-main-slider section section-space-pb">
            <div class="ec-slider swiper-container main-slider-nav main-slider-dot">
                <!-- Main slider -->
                <div class="swiper-wrapper">
                    <?php
                    $slider = $this->md->my_select('tbl_banner', '*', array('status' => 1));

                    foreach ($slider as $single) {
                        ?>
                        <div class="ec-slide-item swiper-slide d-flex ec-slide-1" style="width: 100%;
                             background-image: url('<?php echo base_url() . $single->path; ?>');
                             background-repeat: no-repeat;
                             background-size: cover;
                             background-position: center;
                             overflow-y: hidden;">
                            <div class="container align-self-center">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-7 col-md-7 col-sm-7 align-self-center">
                                        <div class="ec-slide-content slider-animation">
                                            <h1 class="ec-slide-title"><?php echo $single->title; ?></h1>
                                            <h2 class="ec-slide-stitle"><?php echo $single->subtitle; ?></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="swiper-pagination swiper-pagination-white"></div>
                <div class="swiper-buttons">
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
        <!-- Main Slider End -->

        <!-- Product tab Area Start -->
        <section class="section ec-product-tab section-space-p">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="section-title">
                            <h2 class="ec-bg-title">Our Top Collection</h2>
                            <h2 class="ec-title">Our Top Collection</h2>
                            <p class="sub-title">Browse The Collection of Top Products</p>
                        </div>
                    </div>

                    <!-- Tab Start -->
                    <div class="col-md-12 text-center">
                        <ul class="ec-pro-tab-nav nav justify-content-center">
                            <?php
                            $c = 0;
                            $main = $this->md->my_select('tbl_category', '*', array('label' => 'maincategory'));
                            foreach ($main as $single) {
                                $c++;
                                ?>
                                <li class="nav-item"><a class="nav-link <?php
                                    if ($c == 1) {
                                        echo "active";
                                    }
                                    ?>" data-bs-toggle="tab" href="#cate<?php echo $single->category_id; ?>"><?php echo $single->name; ?></a></li>
                                    <?php
                                }
                                ?>
                        </ul>
                    </div>
                    <!-- Tab End -->
                </div>
                <div class="row">
                    <div class="col">
                        <div class="tab-content">
                            <?php
                            $cc = 0;
                            foreach ($main as $single) {
                                $cc++;
                                ?>
                                <!-- 1st Product tab start -->
                                <div class="tab-pane fade <?php
                                if ($cc == 1) {
                                    echo "active show";
                                }
                                ?>" id="cate<?php echo $single->category_id; ?>">
                                    <div class="row">
                                        <!-- Product Content -->
                                        <?php
                                        
                                        $id = $single->category_id;
                                        $products = $this->md->my_query("SELECT * FROM `tbl_product` WHERE `status` = 1 AND `main_id` = $id ORDER BY `product_id` DESC LIMIT 0,12");
                                        foreach ($products as $data) {
                                            
                                            //image details
                                            $image_detail = $this->md->my_select('tbl_product_image', '*', array('product_id' => $data->product_id))[0];
                                            $paths = explode(",", $image_detail->path);
                                            $single_path = $paths[0];
                                            $second_path = $paths[1];
                                            ?>
                                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-6 pro-gl-content">
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
                                                            $rate = $this->md->my_select("tbl_review", '*', array('product_id' => $data->product_id, 'status=>1'));
                                                            foreach ($rate as $ss) {
                                                                $total_rating += $ss->rating;
                                                                $total_person++;
                                                            }
                                                            if ($total_person > 0) {
                                                                $avg_rate = ceil($total_rating / $total_person);
                                                            } else {
                                                                $avg_rate = 0;
                                                            }

                                                            $fill_star = $avg_rate;
                                                            $blank_star = 5 - $fill_star;

                                                            //fill star loop
                                                            for ($i = 1; $i <= $fill_star; $i++) {
                                                                ?>
                                                                <i class="ecicon eci-star"></i>
                                                                <?php
                                                            }
                                                            //blank start loop
                                                            for ($i = 1; $i <= $blank_star; $i++) {
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
                                        ?>

                                        <div class="col-sm-12 shop-all-btn"><a href="<?php echo base_url('collections'); ?>">Shop All Collection</a></div>
                                    </div>
                                </div>
                                <!-- ec 1st Product tab end -->
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ec Product tab Area End -->

        <!-- ec Banner Section Start -->
        <!--        <section class="ec-banner section section-space-p">
            <h2 class="d-none">Banner</h2>
            <div class="container">
                 ec Banners Start 
                <div class="ec-banner-inner">
                    ec Banner Start 
                    <div class="ec-banner-block ec-banner-block-2">
                        <div class="row">
                            <div class="banner-block col-lg-6 col-md-12 margin-b-30" data-animation="slideInRight">
                                <div class="bnr-overlay">
                                    <img src="<?php echo base_url(); ?>assets/images/banner/2.jpg" alt="" />
                                    <div class="banner-text">
                                        <span class="ec-banner-stitle">New Arrivals</span>
                                        <span class="ec-banner-title">mens<br> Sport shoes</span>
                                        <span class="ec-banner-discount">30% Discount</span>
                                    </div>
                                    <div class="banner-content">
                                        <span class="ec-banner-btn"><a href="#">Order Now</a></span>
                                    </div>
                                </div>
                            </div>
                            <div class="banner-block col-lg-6 col-md-12" data-animation="slideInLeft">
                                <div class="bnr-overlay">
                                    <img src="assets/images/banner/3.jpg" alt="" />
                                    <div class="banner-text">
                                        <span class="ec-banner-stitle">New Trending</span>
                                        <span class="ec-banner-title">Smart<br> watches</span>
                                        <span class="ec-banner-discount">Buy any 3 Items & get <br>20% Discount</span>
                                    </div>
                                    <div class="banner-content">
                                        <span class="ec-banner-btn"><a href="#">Order Now</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                         ec Banner End 
                    </div>
                     ec Banners End 
                </div>
            </div>
        </section>-->
        <!-- ec Banner Section End -->

        <!--  Category Section Start -->
        <!--        <section class="section ec-category-section section-space-p">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="section-title">
                            <h2 class="ec-bg-title">Our Top Collection</h2>
                            <h2 class="ec-title">Choose Categories</h2>
                            <p class="sub-title">Browse The Collection of Top Categories</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    Category Nav Start 
                    <div class="col-lg-3">
                        <ul class="ec-cat-tab-nav nav">
                            <li class="cat-item"><a class="cat-link active" data-bs-toggle="tab" href="#tab-cat-1">
                                    <div class="cat-icons"><img class="cat-icon" src="assets/images/icons/cat_1.png"
                                                                alt="cat-icon"><img class="cat-icon-hover" src="assets/images/icons/cat_1_1.png"
                                                                alt="cat-icon"></div>
                                    <div class="cat-desc"><span>Clothes</span><span>440 Products</span></div>
                                </a></li>
                            <li class="cat-item"><a class="cat-link" data-bs-toggle="tab" href="#tab-cat-2">
                                    <div class="cat-icons"><img class="cat-icon" src="assets/images/icons/cat_2.png"
                                                                alt="cat-icon"><img class="cat-icon-hover" src="assets/images/icons/cat_2_1.png"
                                                                alt="cat-icon"></div>
                                    <div class="cat-desc"><span>Watches</span><span>510 Products</span></div>
                                </a></li>
                            <li class="cat-item"><a class="cat-link" data-bs-toggle="tab" href="#tab-cat-3">
                                    <div class="cat-icons"><img class="cat-icon" src="assets/images/icons/cat_3.png"
                                                                alt="cat-icon"><img class="cat-icon-hover" src="assets/images/icons/cat_3_1.png"
                                                                alt="cat-icon"></div>
                                    <div class="cat-desc"><span>Bags</span><span>620 Products</span></div>
                                </a></li>
                            <li class="cat-item"><a class="cat-link" data-bs-toggle="tab" href="#tab-cat-4">
                                    <div class="cat-icons"><img class="cat-icon" src="assets/images/icons/cat_4.png"
                                                                alt="cat-icon"><img class="cat-icon-hover" src="assets/images/icons/cat_4_1.png"
                                                                alt="cat-icon"></div>
                                    <div class="cat-desc"><span>Shoes</span><span>320 Products</span></div>
                                </a></li>
                        </ul>

                    </div>
                     Category Nav End 
                    Category Tab Start 
                    <div class="col-lg-9">
                        <div class="tab-content">
                             1st Category tab end 
                            <div class="tab-pane fade show active" id="tab-cat-1">
                                <div class="row">
                                    <img src="assets/images/cat-banner/1.jpg" alt="" />
                                </div>
                                <span class="panel-overlay">
                                    <a href="<?php echo base_url('collections') ?>" class="btn btn-primary">View All</a>
                                </span>
                            </div>
                             1st Category tab end 
                            <div class="tab-pane fade" id="tab-cat-2">
                                <div class="row">
                                    <img src="assets/images/cat-banner/2.jpg" alt="" />
                                </div>
                                <span class="panel-overlay">
                                    <a href="shop-left-sidebar-col-3.html" class="btn btn-primary">View All</a>
                                </span>
                            </div>
                             2nd Category tab end 
                             3rd Category tab start 
                            <div class="tab-pane fade" id="tab-cat-3">
                                <div class="row">
                                    <img src="assets/images/cat-banner/3.jpg" alt="" />
                                </div>
                                <span class="panel-overlay">
                                    <a href="shop-left-sidebar-col-3.html" class="btn btn-primary">View All</a>
                                </span>
                            </div>
                             3rd Category tab end 
                             4th Category tab start 
                            <div class="tab-pane fade" id="tab-cat-4">
                                <div class="row">
                                    <img src="assets/images/cat-banner/4.jpg" alt="" />
                                </div>
                                <span class="panel-overlay">
                                    <a href="shop-left-sidebar-col-3.html" class="btn btn-primary">View All</a>
                                </span>
                            </div>
                             4th Category tab end 
                        </div>
                         Category Tab End 
                    </div>
                </div>
            </div>
        </section>-->
        <!-- Category Section End -->

        <!--          Feature & Special Section Start 
    <section class="section ec-fre-spe-section section-space-p">
        <div class="container">
            <div class="row">
                  Feature Section Start 
                <div class="ec-fre-section col-lg-6 col-md-6 col-sm-6 margin-b-30" data-animation="slideInRight">
                    <div class="col-md-12 text-left">
                        <div class="section-title">
                            <h2 class="ec-bg-title">Feature Items</h2>
                            <h2 class="ec-title">Feature Items</h2>
                        </div>
                    </div>

                    <div class="ec-fre-products">
                        <div class="ec-fs-product">
                            <div class="ec-fs-pro-inner">
                                <div class="ec-fs-pro-image-outer col-lg-6 col-md-6 col-sm-6">
                                    <div class="ec-fs-pro-image">
                                        <a href="product-left-sidebar.html" class="image"><img class="main-image"
                                                src="assets/images/product-image/1_1.jpg" alt="Product" /></a>
                                        <a href="#" class="quickview" data-link-action="quickview" title="Quick view"
                                            data-bs-toggle="modal" data-bs-target="#ec_quickview_modal"><img
                                                src="assets/images/icons/quickview.svg" class="svg_img pro_svg"
                                                alt="" /></a>
                                    </div>
                                </div>
                                <div class="ec-fs-pro-content col-lg-6 col-md-6 col-sm-6">
                                    <h5 class="ec-fs-pro-title"><a href="product-left-sidebar.html">Baby Toy Teddybear</a>
                                    </h5>
                                    <div class="ec-fs-pro-rating">
                                        <span class="ec-fs-rating-icon">
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star"></i>
                                        </span>
                                        <span class="ec-fs-rating-text">4 Review</span>
                                    </div>
                                    <div class="ec-fs-price">
                                        <span class="old-price">$549.00</span>
                                        <span class="new-price">$480.00</span>
                                    </div>

                                    <div class="countdowntimer"><span id="ec-fs-count-1"></span></div>
                                    <div class="ec-fs-pro-desc">Lorem Ipsum is simply dummy text the printing and
                                        typesetting.
                                    </div>
                                    <div class="ec-fs-pro-book">Total Booking: <span>25</span></div>
                                    <div class="ec-fs-pro-btn">
                                        <a href="#" class="btn btn-lg btn-secondary">Remind Me</a>
                                        <a href="#" class="btn btn-lg btn-primary">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ec-fs-product">
                            <div class="ec-fs-pro-inner">
                                <div class="ec-fs-pro-image-outer col-lg-6 col-md-6 col-sm-6">
                                    <div class="ec-fs-pro-image">
                                        <a href="product-left-sidebar.html" class="image"><img class="main-image"
                                                src="assets/images/product-image/3_1.jpg" alt="Product" /></a>
                                        <a href="#" class="quickview" data-link-action="quickview" title="Quick view"
                                            data-bs-toggle="modal" data-bs-target="#ec_quickview_modal"><img
                                                src="assets/images/icons/quickview.svg" class="svg_img pro_svg"
                                                alt="" /></a>
                                    </div>
                                </div>
                                <div class="ec-fs-pro-content col-lg-6 col-md-6 col-sm-6">
                                    <h5 class="ec-fs-pro-title"><a href="product-left-sidebar.html">Leather Purse For Women</a>
                                    </h5>
                                    <div class="ec-fs-pro-rating">
                                        <span class="ec-fs-rating-icon">
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                        </span>
                                        <span class="ec-fs-rating-text">4 Review</span>
                                    </div>
                                    <div class="ec-fs-price">
                                        <span class="old-price">$300.00</span>
                                        <span class="new-price">$250.00</span>
                                    </div>

                                    <div class="countdowntimer"><span id="ec-fs-count-2"></span></div>
                                    <div class="ec-fs-pro-desc">Lorem Ipsum is simply dummy text the printing and
                                        typesetting.
                                    </div>
                                    <div class="ec-fs-pro-book">Total Booking: <span>25</span></div>
                                    <div class="ec-fs-pro-btn">
                                        <a href="#" class="btn btn-lg btn-secondary">Remind Me</a>
                                        <a href="#" class="btn btn-lg btn-primary">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                  Feature Section End 
                  Special Section Start 
                <div class="ec-spe-section col-lg-6 col-md-6 col-sm-6" data-animation="slideInLeft">
                    <div class="col-md-12 text-left">
                        <div class="section-title">
                            <h2 class="ec-bg-title">Limited Time Offer</h2>
                            <h2 class="ec-title">Limited Time Offer</h2>
                        </div>
                    </div>

                    <div class="ec-spe-products">
                        <div class="ec-fs-product">
                            <div class="ec-fs-pro-inner">
                                <div class="ec-fs-pro-image-outer col-lg-6 col-md-6 col-sm-6">
                                    <div class="ec-fs-pro-image">
                                        <a href="product-left-sidebar.html" class="image"><img class="main-image"
                                                src="assets/images/product-image/8_1.jpg" alt="Product" /></a>
                                        <a href="#" class="quickview" data-link-action="quickview" title="Quick view"
                                            data-bs-toggle="modal" data-bs-target="#ec_quickview_modal"><img
                                                src="assets/images/icons/quickview.svg" class="svg_img pro_svg"
                                                alt="" /></a>
                                    </div>
                                </div>
                                <div class="ec-fs-pro-content col-lg-6 col-md-6 col-sm-6">
                                    <h5 class="ec-fs-pro-title"><a href="product-left-sidebar.html">Smart watch Firebolt</a>
                                    </h5>
                                    <div class="ec-fs-pro-rating">
                                        <span class="ec-fs-rating-icon">
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star"></i>
                                        </span>
                                        <span class="ec-fs-rating-text">4 Review</span>
                                    </div>
                                    <div class="ec-fs-price">
                                        <span class="old-price">$200.00</span>
                                        <span class="new-price">$180.00</span>
                                    </div>
                                    <div class="countdowntimer"><span id="ec-fs-count-3"></span></div>
                                    <div class="ec-fs-pro-desc">Lorem Ipsum is simply dummy text the printing and
                                        typesetting.
                                    </div>
                                    <div class="ec-fs-pro-book">Total Booking: <span>25</span></div>
                                    <div class="ec-fs-pro-btn">
                                        <a href="#" class="btn btn-lg btn-secondary">Remind Me</a>
                                        <a href="#" class="btn btn-lg btn-primary">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ec-fs-product">
                            <div class="ec-fs-pro-inner">
                                <div class="ec-fs-pro-image-outer col-lg-6 col-md-6 col-sm-6">
                                    <div class="ec-fs-pro-image">
                                        <a href="product-left-sidebar.html" class="image"><img class="main-image"
                                                src="assets/images/product-image/10_1.jpg" alt="Product" /></a>
                                        <a href="#" class="quickview" data-link-action="quickview" title="Quick view"
                                            data-bs-toggle="modal" data-bs-target="#ec_quickview_modal"><img
                                                src="assets/images/icons/quickview.svg" class="svg_img pro_svg"
                                                alt="" /></a>
                                    </div>
                                </div>
                                <div class="ec-fs-pro-content col-lg-6 col-md-6 col-sm-6">
                                    <h5 class="ec-fs-pro-title"><a href="product-left-sidebar.html">Casual Shoes Men</a>
                                    </h5>
                                    <div class="ec-fs-pro-rating">
                                        <span class="ec-fs-rating-icon">
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                        </span>
                                        <span class="ec-fs-rating-text">4 Review</span>
                                    </div>
                                    <div class="ec-fs-price">
                                        <span class="old-price">$120.00</span>
                                        <span class="new-price">$95.00</span>
                                    </div>

                                    <div class="countdowntimer"><span id="ec-fs-count-4"></span></div>
                                    <div class="ec-fs-pro-desc">Lorem Ipsum is simply dummy text the printing and
                                        typesetting.
                                    </div>
                                    <div class="ec-fs-pro-book">Total Booking: <span>25</span></div>
                                    <div class="ec-fs-pro-btn">
                                        <a href="#" class="btn btn-lg btn-secondary">Remind Me</a>
                                        <a href="#" class="btn btn-lg btn-primary">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                  Special Section End 
            </div>
        </div>
    </section>
     Feature & Special Section End -->

        <!--  services Section Start -->
        <!--        <section class="section ec-services-section section-space-p">
            <h2 class="d-none">Services</h2>
            <div class="container">
                <div class="row">
                    <div class="ec_ser_content ec_ser_content_1 col-sm-12 col-md-6 col-lg-3" data-animation="zoomIn">
                        <div class="ec_ser_inner">
                            <div class="ec-service-image">
                                <img src="assets/images/icons/service_1.svg" class="svg_img" alt="" />
                            </div>
                            <div class="ec-service-desc">
                                <h2>Free Shipping</h2>
                                <p>Free shipping on all US order or order above $200</p>
                            </div>
                        </div>
                    </div>
                    <div class="ec_ser_content ec_ser_content_2 col-sm-12 col-md-6 col-lg-3" data-animation="zoomIn">
                        <div class="ec_ser_inner">
                            <div class="ec-service-image">
                                <img src="assets/images/icons/service_2.svg" class="svg_img" alt="" />
                            </div>
                            <div class="ec-service-desc">
                                <h2>24X7 Support</h2>
                                <p>Contact us 24 hours a day, 7 days a week</p>
                            </div>
                        </div>
                    </div>
                    <div class="ec_ser_content ec_ser_content_3 col-sm-12 col-md-6 col-lg-3" data-animation="zoomIn">
                        <div class="ec_ser_inner">
                            <div class="ec-service-image">
                                <img src="assets/images/icons/service_3.svg" class="svg_img" alt="" />
                            </div>
                            <div class="ec-service-desc">
                                <h2>30 Days Return</h2>
                                <p>Simply return it within 30 days for an exchange</p>
                            </div>
                        </div>
                    </div>
                    <div class="ec_ser_content ec_ser_content_4 col-sm-12 col-md-6 col-lg-3" data-animation="zoomIn">
                        <div class="ec_ser_inner">
                            <div class="ec-service-image">
                                <img src="assets/images/icons/service_4.svg" class="svg_img" alt="" />
                            </div>
                            <div class="ec-service-desc">
                                <h2>Payment Secure</h2>
                                <p>Contact us 24 hours a day, 7 days a week</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>-->
        <!--services Section End -->

        <!--  offer Section Start -->
        <!--        <section class="section ec-offer-section section-space-p section-space-m">
            <h2 class="d-none">Offer</h2>
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-xl-6 col-lg-7 col-md-7 col-sm-7 align-self-center ec-offer-content">
                        <h2 class="ec-offer-title">Sunglasses</h2>
                        <h3 class="ec-offer-stitle" data-animation="slideInDown">Super Offer</h3>
                        <span class="ec-offer-img" data-animation="zoomIn"><img src="assets/images/offer-image/1.png" alt="offer image" /></span>
                        <span class="ec-offer-desc">Acetate Frame Sunglasses</span>
                        <span class="ec-offer-price">$40.00 Only</span>
                        <a class="btn btn-primary" href="shop-left-sidebar-col-3.html" data-animation="zoomIn">Shop Now</a>
                    </div>
                </div>
            </div>
        </section>-->
        <!-- offer Section End -->

        <!-- New Product Start -->
        <section class="section ec-new-product section-space-p">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="section-title">
                            <h2 class="ec-bg-title">Top selling Products</h2>
                            <h2 class="ec-title">Top selling Products</h2>
                            <p class="sub-title">Browse The Collection of Top Sale Products</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- New Product Content -->
                    <?php
                            $products = $this->md->my_query("SELECT p.* ,t.`product_id` AS tt , COUNT( t.`product_id` ) as cc FROM `tbl_transaction` AS t, `tbl_product` AS P GROUP BY P.`product_id` ORDER BY cc DESC LIMIT 0,8");
                            foreach ($products as $data) {
                                //image details
                                $image_detail = $this->md->my_select('tbl_product_image', '*', array('product_id' => $data->product_id))[0];
                                $paths = explode(",", $image_detail->path);
                                $single_path = $paths[0];
                                $second_path = $paths[1];
                                ?>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-6  ec-product-content" data-animation="flipInY">
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
                                                            $rate = $this->md->my_select("tbl_review", '*', array('product_id' => $data->product_id, 'status=>1'));
                                                            foreach ($rate as $ss) {
                                                                $total_rating += $ss->rating;
                                                                $total_person++;
                                                            }
                                                            if ($total_person > 0) {
                                                                $avg_rate = ceil($total_rating / $total_person);
                                                            } else {
                                                                $avg_rate = 0;
                                                            }

                                                            $fill_star = $avg_rate;
                                                            $blank_star = 5 - $fill_star;

                                                            //fill star loop
                                                            for ($i = 1; $i <= $fill_star; $i++) {
                                                                ?>
                                                                <i class="ecicon eci-star"></i>
                                                                <?php
                                                            }
                                                            //blank start loop
                                                            for ($i = 1; $i <= $blank_star; $i++) {
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
<!--                        <div class="ec-product-inner">
                            <div class="ec-pro-image-outer">
                                <div class="ec-pro-image">
                                    <a href="product-left-sidebar.html" class="image">
                                        <img class="main-image" src="assets/images/product-image/9_1.jpg"
                                             alt="Product" />
                                        <img class="hover-image" src="assets/images/product-image/9_2.jpg"
                                             alt="Product" />
                                    </a>
                                    <span class="flags">
                                        <span class="sale">Sale</span>
                                    </span>
                                    <a href="#" class="quickview" data-link-action="quickview" title="Quick view"
                                       data-bs-toggle="modal" data-bs-target="#ec_quickview_modal"><img
                                            src="assets/images/icons/quickview.svg" class="svg_img pro_svg" alt="" /></a>
                                    <div class="ec-pro-actions">
                                        <a href="compare.html" class="ec-btn-group compare" title="Compare"><img
                                                src="assets/images/icons/compare.svg" class="svg_img pro_svg" alt="" /></a>
                                        <button title="Add To Cart" class="add-to-cart"><img
                                                src="assets/images/icons/cart.svg" class="svg_img pro_svg" alt="" /> Add To
                                            Cart</button>
                                        <a class="ec-btn-group wishlist" title="Wishlist"><img
                                                src="assets/images/icons/wishlist.svg" class="svg_img pro_svg" alt="" /></a>
                                    </div>
                                </div>
                            </div>
                            <div class="ec-pro-content">
                                <h5 class="ec-pro-title"><a href="product-left-sidebar.html">Full Sleeve Cap T-Shirt</a></h5>
                                <div class="ec-pro-rating">
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star"></i>
                                </div>
                                <span class="ec-price">
                                    <span class="old-price">$20.00</span>
                                    <span class="new-price">$15.00</span>
                                </span>
                                <div class="ec-pro-option">
                                    <div class="ec-pro-color">
                                        <span class="ec-pro-opt-label">Color</span>
                                        <ul class="ec-opt-swatch ec-change-img">
                                            <li><a href="#" class="ec-opt-clr-img"
                                                   data-src="assets/images/product-image/9_1.jpg"
                                                   data-src-hover="assets/images/product-image/9_1.jpg"
                                                   data-tooltip="Orange"><span style="background-color:#74c7ff;"></span></a></li>
                                            <li><a href="#" class="ec-opt-clr-img"
                                                   data-src="assets/images/product-image/9_2.jpg"
                                                   data-src-hover="assets/images/product-image/9_2.jpg"
                                                   data-tooltip="Green"><span  style="background-color:#7af6ff;"></span></a>
                                            </li>
                                            <li><a href="#" class="ec-opt-clr-img"
                                                   data-src="assets/images/product-image/9_3.jpg"
                                                   data-src-hover="assets/images/product-image/9_3.jpg"
                                                   data-tooltip="Sky Blue"><span style="background-color:#85ffeb;"></span></a></li>
                                        </ul>
                                    </div>
                                    <div class="ec-pro-size">
                                        <span class="ec-pro-opt-label">Size</span>
                                        <ul class="ec-opt-size">
                                            <li class="active"><a href="#" class="ec-opt-sz" data-old="$20.00"
                                                                  data-new="$15.00" data-tooltip="Small">S</a></li>
                                            <li><a href="#" class="ec-opt-sz" data-old="$22.00" data-new="$17.00"
                                                   data-tooltip="Medium">M</a></li>
                                            <li><a href="#" class="ec-opt-sz" data-old="$25.00" data-new="$20.00"
                                                   data-tooltip="Large">X</a></li>
                                            <li><a href="#" class="ec-opt-sz" data-old="$27.00" data-new="$22.00"
                                                   data-tooltip="Extra Large">XL</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>-->
                    </div>
                    <?php
                            }
                            ?>
                    <div class="col-sm-12 shop-all-btn"><a href="shop-left-sidebar-col-3.html">Shop All Collection</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- New Product end -->
        
        <!-- offer Product Start -->
        <section class="section ec-new-product section-space-p">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="section-title">
                            <h2 class="ec-bg-title">Limited Time Offer</h2>
                            <h2 class="ec-title">Limited Time Offer</h2>
                            <p class="sub-title"></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- New Product Content -->
                    <?php
                                $limited = $this->md->my_query("SELECT * FROM `tbl_product` WHERE `offer_id` > 0 AND `status` = 1 ");
                                $k=0;
                                foreach ($limited as  $data)
                                {
                                    $image_detail = $this->md->my_select('tbl_product_image', '*', array('product_id' => $data->product_id))[0];
                                $paths = explode(",", $image_detail->path);
                                $single_path = $paths[0];
                                $second_path = $paths[1];
                                $k++;
                                    if($k > 8)
                                    {
                                        break;
                                    }
                                
                                ?>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-6  ec-product-content" data-animation="flipInY">
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
                                                            $rate = $this->md->my_select("tbl_review", '*', array('product_id' => $data->product_id, 'status=>1'));
                                                            foreach ($rate as $ss) {
                                                                $total_rating += $ss->rating;
                                                                $total_person++;
                                                            }
                                                            if ($total_person > 0) {
                                                                $avg_rate = ceil($total_rating / $total_person);
                                                            } else {
                                                                $avg_rate = 0;
                                                            }

                                                            $fill_star = $avg_rate;
                                                            $blank_star = 5 - $fill_star;

                                                            //fill star loop
                                                            for ($i = 1; $i <= $fill_star; $i++) {
                                                                ?>
                                                                <i class="ecicon eci-star"></i>
                                                                <?php
                                                            }
                                                            //blank start loop
                                                            for ($i = 1; $i <= $blank_star; $i++) {
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
                            ?>
                    <div class="col-sm-12 shop-all-btn"><a href="<?php echo base_url(); ?>collections/todays-offer">See All Offer Product</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- offer Product end -->

        <!-- ec testmonial Start -->
        <section class="section ec-test-section section-space-ptb-100 section-space-m">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="section-title mb-0">
                            <h2 class="ec-bg-title">Client Review</h2>
                            <h2 class="ec-title">Client Review</h2>
                            <p class="sub-title mb-3">What say client about us</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="ec-test-outer">
                        <ul id="ec-testimonial-slider">
                            <?php
                            $review = $this->md->my_select('tbl_review');
                                                    
                            foreach($review as $dd)
                            {
                                $user_info = $this->md->my_select('tbl_register','*',array('register_id'=>$dd->register_id))[0];
                            ?>
                            <li class="ec-test-item">
                                <img src="<?php echo base_url(); ?>assets/images/testimonial/top-quotes.svg" class="svg_img test_svg top" alt="" />
                                <div class="ec-test-inner">
<!--                                    <div class="ec-test-img"><img alt="testimonial" title="testimonial"
                                        src="assets/images/testimonial/3.jpg" /></div>-->
                                    <div class="ec-test-img">
                                        
                                        <?php
                                            if(strlen($user_info->profile_pic) > 0)
                                            {
                                        ?>
                                        <img alt="<?php echo $user_info->name; ?>" title="testimonial" src="<?php echo base_url().$user_info->profile_pic; ?>" />
                                        <?php
                                        }
                                        else
                                        {
                                        ?>
                                        <img alt="<?php echo $user_info->name; ?>" title="testimonial" src="assets/images/review-image/user.png" />
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="ec-test-content">
                                        <div class="ec-test-desc"><?php echo $dd->message; ?></div>
                                        <div class="ec-test-name"><?php echo $user_info->name; ?></div>
                                        <div class="ec-test-rating">
                                            <?php
                                                $fill_star = $dd->rating;
                                                $blank_star = 5 - $fill_star;

                                                for( $i=1 ; $i<=$fill_star ; $i++ )
                                                {
                                            ?>
                                            <i class="ecicon eci-star"></i>
                                            <?php
                                                }

                                                for( $i=1 ; $i<=$blank_star ; $i++)
                                                {
                                            ?>
                                            <i class="ecicon eci-star-o"></i>
                                            <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <img src="<?php echo base_url(); ?>assets/images/testimonial/bottom-quotes.svg" class="svg_img test_svg bottom"
                                     alt="" />
                            </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>

            </div>
        </section>
        <!-- ec testmonial end -->

        <!-- Ec Brand Section Start -->
        <!--        <section class="section ec-brand-area section-space-p">
            <h2 class="d-none">Brand</h2>
            <div class="container">
                <div class="row">
                    <div class="ec-brand-outer">
                        <ul id="ec-brand-slider">
                            <li class="ec-brand-item"  data-animation="zoomIn">
                                <div class="ec-brand-img"><a href="#"><img alt="brand" title="brand"
                                                                           src="assets/images/brand-image/1.png" /></a></div>
                            </li>
                            <li class="ec-brand-item"  data-animation="zoomIn">
                                <div class="ec-brand-img"><a href="#"><img alt="brand" title="brand"
                                                                           src="assets/images/brand-image/2.png" /></a></div>
                            </li>
                            <li class="ec-brand-item"  data-animation="zoomIn">
                                <div class="ec-brand-img"><a href="#"><img alt="brand" title="brand"
                                                                           src="assets/images/brand-image/3.png" /></a></div>
                            </li>
                            <li class="ec-brand-item"  data-animation="zoomIn">
                                <div class="ec-brand-img"><a href="#"><img alt="brand" title="brand"
                                                                           src="assets/images/brand-image/4.png" /></a></div>
                            </li>
                            <li class="ec-brand-item"  data-animation="zoomIn">
                                <div class="ec-brand-img"><a href="#"><img alt="brand" title="brand"
                                                                           src="assets/images/brand-image/5.png" /></a></div>
                            </li>
                            <li class="ec-brand-item"  data-animation="zoomIn">
                                <div class="ec-brand-img"><a href="#"><img alt="brand" title="brand"
                                                                           src="assets/images/brand-image/6.png" /></a></div>
                            </li>
                            <li class="ec-brand-item"  data-animation="zoomIn">
                                <div class="ec-brand-img"><a href="#"><img alt="brand" title="brand"
                                                                           src="assets/images/brand-image/7.png" /></a></div>
                            </li>
                            <li class="ec-brand-item"  data-animation="zoomIn">
                                <div class="ec-brand-img"><a href="#"><img alt="brand" title="brand"
                                                                           src="assets/images/brand-image/8.png" /></a></div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>-->
        <!-- Ec Brand Section End -->

        <!-- Ec Instagram Start -->
        <!--        <section class="section ec-instagram-section module section-space-p">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="section-title">
                            <h2 class="ec-bg-title">Instagram Feed</h2>
                            <h2 class="ec-title">Instagram Feed</h2>
                            <p class="sub-title">Share your store with us</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ec-insta-wrapper">
                <div class="ec-insta-outer">
                    <div class="container" data-animation="fadeIn">
                        <div class="insta-auto">
                             instagram item 
                            <div class="ec-insta-item">
                                <div class="ec-insta-inner">
                                    <a href="#" target="_blank"><img src="assets/images/instragram-image/1.jpg"
                                                                     alt="insta"></a>
                                </div>
                            </div>
                             instagram item 
                            <div class="ec-insta-item">
                                <div class="ec-insta-inner">
                                    <a href="#" target="_blank"><img src="assets/images/instragram-image/2.jpg"
                                                                     alt="insta"></a>
                                </div>
                            </div>
                             instagram item 
                            <div class="ec-insta-item">
                                <div class="ec-insta-inner">
                                    <a href="#" target="_blank"><img src="assets/images/instragram-image/3.jpg"
                                                                     alt="insta"></a>
                                </div>
                            </div>
                             instagram item 
                            <div class="ec-insta-item">
                                <div class="ec-insta-inner">
                                    <a href="#" target="_blank"><img src="assets/images/instragram-image/4.jpg"
                                                                     alt="insta"></a>
                                </div>
                            </div>
                             instagram item 
                             instagram item 
                            <div class="ec-insta-item">
                                <div class="ec-insta-inner">
                                    <a href="#" target="_blank"><img src="assets/images/instragram-image/5.jpg"
                                                                     alt="insta"></a>
                                </div>
                            </div>
                             instagram item 
                             instagram item 
                            <div class="ec-insta-item">
                                <div class="ec-insta-inner">
                                    <a href="#" target="_blank"><img src="assets/images/instragram-image/6.jpg"
                                                                     alt="insta"></a>
                                </div>
                            </div>
                             instagram item 
                             instagram item 
                            <div class="ec-insta-item">
                                <div class="ec-insta-inner">
                                    <a href="#" target="_blank"><img src="assets/images/instragram-image/7.jpg"
                                                                     alt="insta"></a>
                                </div>
                            </div>
                             instagram item 
                        </div>
                    </div>
                </div>
            </div>
        </section>-->
        <!-- Ec Instagram End -->

        <?php
        $this->load->view('footer');
        ?>


        <!-- Footer navigation panel for responsive display -->
        <!--        <div class="ec-nav-toolbar">
            <div class="container">
                <div class="ec-nav-panel">
                    <div class="ec-nav-panel-icons">
                        <a href="#ec-mobile-menu" class="navbar-toggler-btn ec-header-btn ec-side-toggle"><img
                                src="assets/images/icons/menu.svg" class="svg_img header_svg" alt="icon" /></a>
                    </div>
                    <div class="ec-nav-panel-icons">
                        <a href="#ec-side-cart" class="toggle-cart ec-header-btn ec-side-toggle"><img
                                src="assets/images/icons/cart.svg" class="svg_img header_svg" alt="icon" /><span
                                class="ec-cart-noti ec-header-count cart-count-lable">3</span></a>
                    </div>
                    <div class="ec-nav-panel-icons">
                        <a href="index.html" class="ec-header-btn"><img src="assets/images/icons/home.svg"
                                                                        class="svg_img header_svg" alt="icon" /></a>
                    </div>
                    <div class="ec-nav-panel-icons">
                        <a href="wishlist.html" class="ec-header-btn"><img src="assets/images/icons/wishlist.svg"
                                                                           class="svg_img header_svg" alt="icon" /><span class="ec-cart-noti">4</span></a>
                    </div>
                    <div class="ec-nav-panel-icons">
                        <a href="login.html" class="ec-header-btn"><img src="assets/images/icons/user.svg"
                                                                        class="svg_img header_svg" alt="icon" /></a>
                    </div>

                </div>
            </div>
        </div>-->
        <!-- Footer navigation panel for responsive display end -->





        <?php
        $this->load->view('footerscript');
        ?>

    </body>

</html>