
<!DOCTYPE html>
<html lang="en">

    <title>My Review - Shangar Collection</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                                <h2 class="ec-breadcrumb-title">My Review</h2>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <!-- ec-breadcrumb-list start -->
                                <ul class="ec-breadcrumb-list">
                                    <li class="ec-breadcrumb-item"><a href="<?php echo base_url(); ?>home">Home</a></li>
                                    <li class="ec-breadcrumb-item active">My Review</li>
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
                                                        <th style="text-align: center;">Product Image</th>
                                                        <th style="text-align: center;">Message</th>
                                                        <th style="text-align: center;width: 12%">Rating</th>
                                                        <th style="text-align: center;width: 10%">Status</th>
                                                        <th style="text-align: center;">Remove</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $c = 0;
                                                    foreach ($review as $data)
                                                    {
                                                        $c++;
                                                        //image details
                                                        $image_detail = $this->md->my_select('tbl_product_image', '*', array('product_id' => $data->product_id))[0];
                                                        $paths = explode(",", $image_detail->path);
                                                        $single_path = $paths[0];
                                                        ?>
                                                        <tr >
                                                            <td style="text-align: center;"><?php echo $c; ?></td>
                                                            <td style="text-align: center;"><img src="<?php echo base_url() . $single_path; ?>" alt="" width="90" /></td>
                                                            <td style="text-align: center;"><?php echo $data->message; ?></td>
                                                            <td style="text-align: center;">
                                                                <?php
                                                                    $rate = $data->rating;
                                                                    $blank = 5 - $rate;

                                                                    for( $i=1 ; $i<=$rate ; $i++ )
                                                                    {
                                                                ?>
                                                                <i class="ecicon eci-star"></i>
                                                                <?php 
                                                                    }
                                                                    //blank star
                                                                   for($i=1;$i<=$blank;$i++)
                                                                   {
                                                                ?>
                                                                    <i class="ecicon eci-star-o"></i>
                                                                <?php
                                                                   }
                                                                ?>    
                                                                </td>
                                                            <td>
                                                    <?php 
                                                     if( $data->status == 0)
                                                     {
                                                        echo '<span class="badge bg-primary">Panding</span>';
                                                     }
                                                     else if ( $data->status == 1) 
                                                     {
                                                        echo '<span class="badge bg-success">Active</span>';   
                                                     }
                                                    ?>
                                                </td>
                                                
                                                            <td data-label="Remove" class="ec-cart-pro-remove" style="text-align: center;">
                                                        <a onclick="remove_review(<?php echo $data->review_id; ?>)"><i style="color: red;" class="ecicon eci-trash-o"></i></a>
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