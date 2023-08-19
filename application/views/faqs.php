
<!DOCTYPE html>
<html lang="en">

    <title>FAQ's - Shangar Collection</title>

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
                                <h2 class="ec-breadcrumb-title">FAQ's</h2>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <!-- ec-breadcrumb-list start -->
                                <ul class="ec-breadcrumb-list">
                                    <li class="ec-breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="ec-breadcrumb-item active">FAQ's</li>
                                </ul>
                                <!-- ec-breadcrumb-list end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ec breadcrumb end -->

        <!-- Ec FAQ page -->
        <section class="ec-page-content section-space-p">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="section-title">
                            <h2 class="ec-bg-title">FAQ's</h2>
                            <h2 class="ec-title">FAQ's</h2>
                        </div>
                    </div>
                    <div class="ec-faq-wrapper">
                        <div class="ec-faq-container">
                            <div id="ec-faq">
                                <?php
                                foreach ($faqs as $data) {
                                    ?>
                                <div class="col-sm-12 ec-faq-block">
                                    <h4 class="ec-faq-title">Q:&nbsp;<?php echo $data->question; ?></h4>
                                    <div class="ec-faq-content">
                                        <p>Answer:&nbsp;<?php echo $data->answer; ?></p>
                                    </div>
                                </div>
                                 <?php
                                }
                                ?>
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