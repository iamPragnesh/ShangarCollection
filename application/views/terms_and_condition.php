
<!DOCTYPE html>
<html lang="en">
    
    <title>Terms & Condition - Shangar Collection</title>
    
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
                                <h2 class="ec-breadcrumb-title">Terms & Condition</h2>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <!-- ec-breadcrumb-list start -->
                                <ul class="ec-breadcrumb-list">
                                    <li class="ec-breadcrumb-item"><a href="<?php echo base_url(); ?>home">Home</a></li>
                                    <li class="ec-breadcrumb-item active">Terms & Condition</li>
                                </ul>
                                <!-- ec-breadcrumb-list end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ec breadcrumb end -->

        <!-- Ec About Us page -->
        <section class="ec-page-content section-space-p">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="section-title">
                            <h2 class="ec-bg-title">Terms & Condition</h2>
                            <h2 class="ec-title">Terms & Condition</h2>
                        </div>
                    </div>
                    <div class="ec-common-wrapper">
                        <div class="row">
                            <div class="ec-cms-block ec-abcms-block text-center">
                                <?php 
                                    foreach ($termscondition as $data){
                                ?>
                                <div class="ec-cms-block-inner">
                                    <?php echo $data->data; ?>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
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