<?php
//$sql = "SELECT m.name as main,s.name as sub,p.name as peta from tbl_category as m, tbl_category as s, tbl_category as p where m.category_id = s.parent_id and s.category_id = p.parent_id and p.category_id = " . $detail->peta_id;
//$cate = $this->md->my_query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<!--<meta name="title" content="<?php // echo 'Product Name : ' . $detail->name . ", Product Code : " . $detail->code . ', Price : ' . $detail->price; ?>" />
        <meta name="keyword" content="<?php // echo $detail->name . '  Main category : ' . $cate[0]->main . ", Sub Category : " . $cate[0]->sub . ', Peta Category : ' . $cate[0]->peta; ?>" />
        <meta name="description" content="<?php // echo $detail->name . ", Product Code : " . $detail->code . ', Price : ' . $detail->price . '  Main category : ' . $cate[0]->main . ", Sub Category : " . $cate[0]->sub . ', Peta Category : ' . $cate[0]->peta; ?>" />-->
    <title><?php echo $detail->name; ?> - Shangar Collection</title>
    <style>
        /* Rating Star Widgets Style */
        .rating-stars ul {
            list-style-type:none;
            padding:0;

            -moz-user-select:none;
            -webkit-user-select:none;
        }
        .rating-stars ul > li.star {
            display:inline-block;

        }

        /* Idle State of the stars */
        .rating-stars ul > li.star > i.fa {
            font-size:1.5em; /* Change the size of the stars */
            color:#ccc; /* Color on idle state */
        }

        /* Hover state of the stars */
        .rating-stars ul > li.star.hover > i.fa {
            color:#FFCC36;
        }

        /* Selected state of the stars */
        .rating-stars ul > li.star.selected > i.fa {
            color:#FF912C;
        }

    </style>
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
                                <h2 class="ec-breadcrumb-title">View Product</h2>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <!-- ec-breadcrumb-list start -->
                                <ul class="ec-breadcrumb-list">
                                    <li class="ec-breadcrumb-item"><a href="<?php echo base_url(); ?>home">Home</a></li>
                                    <li class="ec-breadcrumb-item"><a href="<?php echo base_url(); ?>collections">Collections</a></li>
                                    <li class="ec-breadcrumb-item active"><?php echo $detail->name; ?></li>
                                </ul>
                                <!-- ec-breadcrumb-list end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ec breadcrumb end -->

        <!-- Sart Single product -->
        <section class="ec-page-content section-space-p">
            <div class="container">
                <div class="row">
                    <div class="ec-pro-rightside ec-common-rightside col-lg-9 col-md-12">

                        <!-- Single product content Start -->
                        <div class="single-pro-block">
                            <div class="single-pro-inner">
                                <div class="row">
                                    <div class="single-pro-img" id="color_preview">
                                        <div class="single-product-scroll">
                                            <div class="single-product-cover">
                                                <?php
                                                $img = $this->md->my_select('tbl_product_image', '*', array('product_id' => $detail->product_id))[0];
                                                $path = $img->path;
                                                $allpath = explode(",", $path);

                                                foreach ($allpath as $single) {
                                                    ?>
                                                    <div class="single-slide zoom-image-hover">
                                                        <img class="img-responsive" src="<?php echo base_url() . $single; ?>" alt="<?php echo $detail->name; ?>">
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="single-nav-thumb">
                                                <?php
                                                foreach ($allpath as $single) {
                                                    ?>
                                                    <div class="single-slide">
                                                        <img class="img-responsive" src="<?php echo base_url() . $single; ?>" alt="<?php echo $detail->name; ?>">
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-pro-desc">
                                        <div class="single-pro-content">
                                            <h5 class="ec-single-title"><?php echo $detail->name; ?></h5>
                                            <div class="ec-single-rating-wrap">
                                                <div class="ec-single-rating">
                                                    <?php
                                                $total_rating = 0;
                                                $total_person = 0;
                                                $rate = $this->md->my_select("tbl_review", '*', array('product_id' => $detail->product_id, 'status=>1'));
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
                                            </div>
                                            <div class="ec-single-desc"><?php echo $detail->description; ?></div>
                                            <br/>
                                            <div class="ec-single-price-stoke">
                                                <?php
                                                if ($detail->offer_id > 0) {
                                                    $old_price = $detail->price;

                                                    $rate = $this->md->my_select('tbl_offer', '*', array('offer_id' => $detail->offer_id))[0]->rate;

                                                    $new_price = round($old_price - ( ( $old_price * $rate) / 100 ));
                                                    ?>
                                                    <div class="ec-single-price">
                                                        <strick><span class="old-price">Rs. <?php echo $detail->price; ?> /-</span></strick>
                                                        <span class="new-price">Rs. <?php echo $new_price; ?> /-</span>
                                                    </div>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <div class="ec-single-price">
                                                        <span class="new-price">Rs. <?php echo $detail->price; ?> /-</span>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                                <div class="ec-single-stoke">
                                                    <div id="stock_status">
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
                                                    </div>
                                                    <span class="ec-single-sku">Code: <?php echo $detail->code; ?></span>
                                                </div>
                                            </div>

                                            <div class="ec-pro-variation">
                                                <div class="ec-pro-variation-inner ec-pro-variation-color">
                                                    <span>Color</span>
                                                    <div class="ec-pro-variation-content">
                                                        <ul>
                                                            <?php
                                                            $cc = 0;
                                                            $color = $this->md->my_select('tbl_product_image', '*', array('product_id' => $detail->product_id));
                                                            foreach ($color as $single) {
                                                                $cc++;
                                                                ?>
                                                                <li class="active"><span onclick="change_image(<?php echo $single->image_id; ?>);cart_btn(<?php echo $single->image_id; ?>)" style="background-color:<?php echo $single->color; ?>;<?php if ($cc == 1) echo "border: 3px solid #0088cc;" ?>" title="<?php echo $single->color; ?>"></span></li>
                                                                <?php
                                                            }
                                                            ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ec-single-qty">
                                                <div class="ec-single-cart ">
                                                    <button class="btn btn-primary">Add To Wishlist</button>
                                                </div>
                                                <div id="cart_btn_area">
                                                    <?php
                                                    if ($img->qty > 0) {
                                                        if ($this->session->userdata('member')) {
                                                            $ww['register_id'] = $this->session->userdata('member');
                                                            $ww['image_id'] = $img->image_id;

                                                            $cart_added = count($this->md->my_select('tbl_cart', '*', $ww));

                                                            if ($cart_added == 1) {
                                                                ?>
                                                                <div class="ec-single-cart " style="cursor: pointer;">
                                                                    <button class="btn btn-primary" style="background: #000">Already Added Cart</button>
                                                                </div>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <div class="ec-single-cart " style="cursor: pointer;">
                                                                    <a onclick="add_cart_detail(<?php echo $detail->product_id; ?>)">
                                                                        <button class="btn btn-primary">Add To Cart</button>
                                                                    </a>
                                                                </div>
                                                                <?php
                                                            }
                                                        } else {
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
                                                </div>
                                            </div>
                                            <div class="ec-single-social">      
                                        <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                            <div class="addthis_inline_share_toolbox"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Single product content End -->
                        <!-- Single product tab start -->
                        <div class="ec-single-pro-tab">
                            <div class="ec-single-pro-tab-wrapper">
                                <div class="ec-single-pro-tab-nav">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab"
                                               data-bs-target="#ec-spt-nav-details" role="tablist">Description</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#ec-spt-nav-info"
                                               role="tablist">Specification</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#ec-spt-nav-review"
                                               role="tablist">Reviews</a>
                                        </li>
                                        <?php
                                        if ($this->session->userdata('member')) {
                                            ?>
                                            <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#ec-spt-nav-review-add"
                                                   role="tablist">Add Reviews</a>
                                            </li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <div class="tab-content  ec-single-pro-tab-content">
                                    <div id="ec-spt-nav-details" class="tab-pane fade show active">
                                        <div class="ec-single-pro-tab-desc">
                                            <p><?php echo $detail->description; ?></p>
                                        </div>
                                    </div>
                                    <div id="ec-spt-nav-info" class="tab-pane fade">
                                        <div class="ec-single-pro-tab-moreinfo">
                                            <ul>
                                                <?php echo $detail->specification; ?>
                                            </ul>
                                        </div>
                                    </div>

                                    <div id="ec-spt-nav-review" class="tab-pane fade">
                                        <div class="row">
                                            <div class="ec-t-review-wrapper">
                                                <?php
                                                    $review = $this->md->my_select('tbl_review','*',array('product_id'=>$detail->product_id,'status'=>1));
                                                    if( count($review) > 0 )
                                                    {
                                                    
                                                    foreach($review as $dd)
                                                    {
                                                        $user_info = $this->md->my_select('tbl_register','*',array('register_id'=>$dd->register_id))[0];
                                                    ?>
                                                <div class="ec-t-review-item">
                                                    <?php
                                                            if(strlen($user_info->profile_pic) > 0)
                                                            {
                                                        ?>
                                                    <div class="ec-t-review-avtar">
                                                        <img src="<?php echo base_url().$user_info->profile_pic; ?>" alt="<?php echo $user_info->name; ?>" />
                                                    </div>
                                                    <?php
                                                    }
                                                    else
                                                    {
                                                    ?>
                                                    <div class="ec-t-review-avtar">
                                                        <img src="<?php echo base_url(); ?>assets/images/review-image/user.png" alt="" />
                                                    </div>
                                                    <?php
                                                    }
                                                    ?>
                                                    <div class="ec-t-review-content">
                                                        <div class="ec-t-review-top">
                                                            <div class="ec-t-review-name"><?php echo $user_info->name; ?></div>
                                                            <div class="ec-t-review-rating">
                                                                <?php
                                                                    $fill_star = $dd->rating;
                                                                    $blank_star = 5 - $fill_star;

                                                                    for( $i=1 ; $i<=$fill_star ; $i++ )
                                                                    {
                                                                ?>
                                                                <i class="fa fa-star"></i>
                                                                <?php
                                                                    }

                                                                    for( $i=1 ; $i<=$blank_star ; $i++)
                                                                    {
                                                                ?>
                                                                <i class="fa fa-star-o"></i>
                                                                <?php
                                                                    }
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <div class="ec-t-review-bottom">
                                                            <p><?php echo $dd->message; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                    }
                                                   }
                                                   else
                                                   {
                                                       echo "<h2 style='color:#ddd'>No Review Yet.</h2>";
                                                   }
                                                   ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="ec-spt-nav-review-add" class="tab-pane fade">
                                        <div class="row">
                                            <div class="ec-t-review-wrapper">
                                                <div class="ec-ratting-content">
                                                    <h3>Add a Review</h3>
                                                    <div class="ec-ratting-form">
                                                        <form action="">
                                                            <div class="ec-ratting-star">
                                                                <span>Your rating:</span>
                                                                <div class="ec-t-review-rating">
                                                                    <input type="hidden" id="rate-value" />
                                                                    <div class='rating-stars text-center'>
                                                                        <ul id='stars'>
                                                                            <li class='star' title='Poor' data-value='1'>
                                                                                <i class='fa fa-star fa-fw'></i>
                                                                            </li>
                                                                            <li class='star' title='Fair' data-value='2'>
                                                                                <i class='fa fa-star fa-fw'></i>
                                                                            </li>
                                                                            <li class='star' title='Good' data-value='3'>
                                                                                <i class='fa fa-star fa-fw'></i>
                                                                            </li>
                                                                            <li class='star' title='Excellent' data-value='4'>
                                                                                <i class='fa fa-star fa-fw'></i>
                                                                            </li>
                                                                            <li class='star' title='WOW!!!' data-value='5'>
                                                                                <i class='fa fa-star fa-fw'></i>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="ec-ratting-input form-submit">
                                                                <textarea name="" id="review-msg" placeholder="Enter Your Comment"></textarea>
                                                                <button class="btn btn-primary"  onclick="add_review(<?php echo $detail->product_id; ?>);"
                                                                        value="Submit">Submit</button>
                                                            </div>
                                                            <div id="msg"></div>
                                                        </form>
                                                    </div>
                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product details description area end -->
                    </div>
                    <!-- Sidebar Area Start -->
                    <div class="ec-pro-leftside ec-common-leftside col-lg-3 col-md-12">
                        <div class="ec-sidebar-slider">
                            <div class="ec-sb-slider-title">Related Products</div>
                            <div class="ec-sb-pro-sl">
                                <?php
                                $whh['main_id'] = $detail->main_id;
                                $whh['product_id !='] = $detail->product_id;
                                $whh['status'] = 1;

                                $related = $this->md->my_select('tbl_product', '*', $whh);

                                foreach ($related as $data) {
                                    //image details
                                    $image_detail = $this->md->my_select('tbl_product_image', '*', array('product_id' => $data->product_id))[0];
                                    $paths = explode(",", $image_detail->path);
                                    $single_path = $paths[0];
                                    $second_path = $paths[1];
                                    ?>
                                    <div>
                                        <div class="ec-sb-pro-sl-item">
                                            <a href="<?php echo base_url(); ?>view-product-detail/<?php echo base64_encode(base64_encode($data->product_id)); ?>" class="sidekka_pro_img">
                                                <img
                                                    src="<?php echo base_url() . $single_path; ?>" alt="product" /></a>
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
                                                <?php
                                                if ($data->offer_id > 0) {
                                                    $old_price = $data->price;

                                                    $rate = $this->md->my_select('tbl_offer', '*', array('offer_id' => $data->offer_id))[0]->rate;

                                                    $new_price = round($old_price - ( ( $old_price * $rate) / 100 ));
                                                    ?>
                                                    <span class="ec-price">
                                                        <span class="old-price">Rs.<?php echo $data->price; ?>/-</span>
                                                        <span class="new-price">Rs.<?php echo $new_price; ?>/-</span>
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
                            </div>
                        </div>
                    </div>
                    <!-- Sidebar Area Start -->
                </div>
            </div>
        </section>
        <!-- End Single product -->

        <!-- Related Product Start -->
        <section class="section ec-releted-product section-space-p">
            <div class="container">
                <?php
                if ($this->session->userdata('member')) {
                    $where['product_id'] = $detail->product_id;
                    $where['register_id'] = $this->session->userdata('member');

                    $count = count($this->md->my_select('tbl_recent_view', '*', $where));

                    if ($count == 0) {
                        $this->md->my_insert('tbl_recent_view', $where);
                    }
                    ?>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="section-title">
                                <h2 class="ec-bg-title">Recent View</h2>
                                <h2 class="ec-title">Recent View</h2>
                                <p class="sub-title">Browse The Collection of recent Products</p>
                            </div>
                        </div>
                    </div>
                    <div class="row margin-minus-b-30">
                        <!-- Related Product Content -->
                        <?php
                        $recent = $this->md->my_query("SELECT * FROM `tbl_recent_view` WHERE `register_id` = '" . $this->session->userdata('member') . "' AND `product_id` != '" . $detail->product_id . "' ORDER BY `view_id`  DESC ");
                        foreach ($recent as $single) {
                            $data = $this->md->my_select('tbl_product', '*', array('product_id' => $single->product_id))[0];

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
                                            <a href="product-left-sidebar.html" class="image">
                                                <img class="main-image"
                                                     src="<?php echo base_url() . $single_path; ?>" alt="<?php echo $data->name; ?>" />
                                                <img class="hover-image"
                                                     src="<?php echo base_url() . $second_path; ?>" alt="<?php echo $data->name; ?>" />
                                            </a>
                                            <div>
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
                                            </div>
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
                                                        $whhh['product_id'] = $data->product_id;
                                                        $whhh['register_id'] = $this->session->userdata('member');

                                                        $cart_added = count($this->md->my_select('tbl_cart', '*', $whhh));

                                                        if ($cart_added == 0) {
//                                                                    
                                                            ?>
                                                            <a onclick="add_cart(<?php echo $data->product_id; ?>)" id="cart_btn<?php echo $data->product_id; ?>" style="cursor:pointer;" title="Add To Cart" class="ec-btn-group">
                                                                <i  class="ecicon eci-cart-arrow-down" aria-hidden="true"></i>
                                                            </a>
                                                            <?php
                                                        } else {
//                                                                    
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
                                                <a class="ec-btn-group wishlist" title="Wishlist" href="<?php echo base_url(); ?>login" >
                                                    <i  class="ecicon eci-heart-o"  aria-hidden="true"></i>
                                                </a>
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
                    </div>
                    <?php
                }
                ?>
            </div>
        </section>
        <!-- Related Product end -->


        <?php
        $this->load->view('footer');
        ?>

        <?php
        $this->load->view('footerscript');
        ?>
        <script>
            $(document).ready(function () {

                /* 1. Visualizing things on Hover - See next part for action on click */
                $('#stars li').on('mouseover', function () {
                    var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

                    // Now highlight all the stars that's not after the current hovered star
                    $(this).parent().children('li.star').each(function (e) {
                        if (e < onStar) {
                            $(this).addClass('hover');
                        } else {
                            $(this).removeClass('hover');
                        }
                    });

                }).on('mouseout', function () {
                    $(this).parent().children('li.star').each(function (e) {
                        $(this).removeClass('hover');
                    });
                });


                /* 2. Action to perform on click */
                $('#stars li').on('click', function () {
                    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
                    var stars = $(this).parent().children('li.star');

                    for (i = 0; i < stars.length; i++) {
                        $(stars[i]).removeClass('selected');
                    }

                    for (i = 0; i < onStar; i++) {
                        $(stars[i]).addClass('selected');
                    }

                    // JUST RESPONSE (Not needed)
                    var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);

                    $("#rate-value").attr('value', ratingValue);

                });


            });


            function responseMessage(msg) {
                $('.success-box').fadeIn(200);
                $('.success-box div.text-message').html("<span>" + msg + "</span>");
            }
        </script>

    </body>

</html>
