
<!DOCTYPE html>
<html lang="en">

    <title>Member Home - Shangar Collection</title>

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
                                <h2 class="ec-breadcrumb-title">Dashboard</h2>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <!-- ec-breadcrumb-list start -->
                                <ul class="ec-breadcrumb-list">
                                    <li class="ec-breadcrumb-item"><a href="<?php echo base_url(); ?>home">Home</a></li>
                                    <li class="ec-breadcrumb-item active">Dashboard</li>
                                </ul>
                                <!-- ec-breadcrumb-list end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ec breadcrumb end -->

        <!-- Vendor dashboard section -->
        <section class="ec-page-content ec-vendor-dashboard section-space-p">
            <div class="container">
                <div class="row">
                    <!-- Sidebar Area Start -->
                    
                    <?php
                    $this->load->view('member/member_menu');
                    ?>
                    
                    <div class="ec-shop-rightside col-lg-9 col-md-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <a href="<?php echo base_url('member-address'); ?>">
                                <div class="ec-vendor-dashboard-sort-card color-blue">
                                    <?php
                                    $wh['register_id'] =$this->session->userdata('member');
                                    $add = count($this->md->my_select('tbl_shipment','*',$wh))
                                    ?>
                                    <h5>My Address</h5>
                                    <h3 id="address"></h3>
                                </div>
                                    </a>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <a href="<?php echo base_url('member-review'); ?>">
                                <div class="ec-vendor-dashboard-sort-card color-pink">
                                    <?php
                                    $rev = count($this->md->my_select('tbl_review','*',$wh))
                                    ?>
                                    <h5>My Review</h5>
                                    <h3 id="rev"></h3>
                                </div>
                                </a>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <a href="<?php echo base_url('member-wishlist'); ?>">
                                <div class="ec-vendor-dashboard-sort-card color-green">
                                    <?php
                                    $wish = count($this->md->my_select('tbl_wishlist','*',$wh))
                                    ?>
                                    <h5>My Wishlist</h5>
                                    <h3 id="wish"></h3>
                                </div>
                                </a>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <a href="<?php echo base_url('member-order'); ?>">
                                <div class="ec-vendor-dashboard-sort-card color-orange">
                                    <?php
                                    $morder = count($this->md->my_select('tbl_bill','*',$wh));
                                    ?>
                                    <h5>My Order</h5>
                                    <h3 id="order"></h3>
                                </div>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- End Vendor dashboard section -->

        <?php
        $this->load->view('footer');
        ?>

        <?php
        $this->load->view('footerscript');
        ?>
        <script type="text/javascript">
            
        set_counter( 'address' , <?php echo $add; ?>)
        set_counter( 'rev' , <?php echo $rev; ?>)
        set_counter( 'wish' , <?php echo $wish; ?>)
        set_counter( 'order' , <?php echo $morder; ?>)
        
        </script>
    </body>

</html>