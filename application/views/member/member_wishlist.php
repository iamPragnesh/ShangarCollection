
<!DOCTYPE html>
<html lang="en">

    <title>My Wishlist - Shangar Collection</title>

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
                                <h2 class="ec-breadcrumb-title">My Wishlist</h2>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <!-- ec-breadcrumb-list start -->
                                <ul class="ec-breadcrumb-list">
                                    <li class="ec-breadcrumb-item"><a href="<?php echo base_url(); ?>home">Home</a></li>
                                    <li class="ec-breadcrumb-item active">My Wishlist</li>
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
                                                    <th style="text-align: center;">Product Detail</th>
                                                    <th style="text-align: center;">Price</th>
                                                    <th style="text-align: center;">View More</th>
                                                    <th>Remove</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                
                                                $c=0;
                                                foreach ($wishlist as $data) {
                                                    $c++;
                                                    
                                                    $name = $this->md->my_select('tbl_product','*',array('product_id'=>$data->product_id))[0];
                                                    
                                                    $price = $name->price;
                                                    
                                                    //image details
                                                    $image_detail = $this->md->my_select('tbl_product_image', '*', array('product_id' => $data->product_id))[0];
                                                    $paths = explode(",", $image_detail->path);
                                                    $single_path = $paths[0];
                                                ?>
                                                <tr>
                                                    <td style="text-align: center;"><?php echo $c; ?></td>
                                                    <td data-label="Product" class="ec-cart-pro-name">
                                                        <a href="<?php echo base_url(); ?>view-product-detail/<?php echo base64_encode(base64_encode($data->product_id)); ?>">
                                                            <img class="ec-cart-pro-img mr-4" src="<?php echo base_url().$single_path; ?>" alt="<?php echo $name->name; ?>" /><?php echo substr($name->name,0,50); ?>...
                                                        </a>
                                                    </td>
                                                    <td data-label="Price" class="ec-cart-pro-price" style="text-align: center;"><span
                                                            class="amount"><?php echo $price; ?></span></td>
                                                    <td data-label="Total" class="ec-cart-pro-subtotal" style="text-align: center;"><a href="<?php echo base_url(); ?>view-product-detail/<?php echo base64_encode(base64_encode($data->product_id)); ?>">View Detail</a></td>
                                                    <td data-label="Remove" class="ec-cart-pro-remove" style="text-align: center;">
                                                        <a onclick="remove_wish(<?php echo $data->wish_id; ?>)"><i style="color: red;" class="ecicon eci-trash-o"></i></a>
                                                    </td>
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