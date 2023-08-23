
<!DOCTYPE html>
<html lang="en">

    <title>My Address - Shangar Collection</title>

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
                                <h2 class="ec-breadcrumb-title">My Address</h2>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <!-- ec-breadcrumb-list start -->
                                <ul class="ec-breadcrumb-list">
                                    <li class="ec-breadcrumb-item"><a href="<?php echo base_url(); ?>home">Home</a></li>
                                    <li class="ec-breadcrumb-item active">My Address</li>
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
                        <div class="ec-vendor-dashboard-card ec-vendor-profile-card">
                            <div class="ec-vendor-card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="ec-vendor-block-profile">
                                            <!--<div class="ec-login-wrapper">-->
                                            <div class="ec-login-container">
                                                <div class="ec-login-form">
                                                    <form action="" method="post" novalidate=""  class="myform" enctype="multipart/form-data">
                                                        <div class="ec-checkout-wrap margin-bottom-30 padding-bottom-3">
                                                            <div class="ec-checkout-block ec-check-bill">
                                                                <div class="ec-bl-block-content">
                                                                        <div class="ec-check-bill-form">
                                                                            <div class="row">
                                                                                <div class="col-6">
                                                                                    <span class="">
                                                                                        <span class="ec-login-wrap">
                                                                                            <label>Name*</label>
                                                                                            <input type="text" name="name" class="<?php
                                                                                            if (form_error('name')) {
                                                                                                echo "error-border";
                                                                                            }
                                                                                            ?>" value="<?php
                                                                                                   if (set_value('name')) {
                                                                                                       echo set_value('name');
                                                                                                   }
                                                                                                   ?>" pattern="^[a-zA-Z ]+$" placeholder="Enter your Name" required="" />
                                                                                        </span>
                                                                                        <p class="err-msg">
                                                                                            <?php echo form_error('name'); ?>
                                                                                        </p>
                                                                                        <label>Country *</label>
                                                                                        <span class="ec-bl-select-inner">
                                                                                            <select name="country" class=" <?php
                                                                                            if (form_error('country')) {
                                                                                                echo "error-border";
                                                                                            }
                                                                                            ?>" required="" onchange="set_combo('state', this.value);">
                                                                                                <option value="" >Country</option>
                                                                                                <?php
                                                                                                foreach ($country as $data) {
                                                                                                    ?>
                                                                                                    <option value="<?php echo $data->location_id; ?>" <?php
                                                                                                    if (!isset($success) && set_select('country', $data->location_id)) {
                                                                                                        echo set_select('country', $data->location_id);
                                                                                                    }
                                                                                                    ?> ><?php echo $data->name; ?></option>
                                                                                                            <?php
                                                                                                        }
                                                                                                        ?>
                                                                                            </select>
                                                                                        </span>
                                                                                        <p class="err-msg">
                                                                                            <?php echo form_error('country'); ?>
                                                                                        </p>
                                                                                        <label>State *</label>
                                                                                        <span class="ec-bl-select-inner">
                                                                                            <select name="state" class="<?php
                                                                                            if (form_error('state')) {
                                                                                                echo "error-border";
                                                                                            }
                                                                                            ?>" required="" onchange="set_combo('city', this.value);" id="state">
                                                                                                <option value="">State</option>
                                                                                            </select>
                                                                                        </span>
                                                                                        <p class="err-msg">
                                                                                            <?php echo form_error('state'); ?>
                                                                                        </p>
                                                                                        <label>City *</label>
                                                                                        <span class="ec-bl-select-inner">
                                                                                            <select name="city" class="<?php
                                                                                            if (form_error('city')) {
                                                                                                echo "error-border";
                                                                                            }
                                                                                            ?>" required="" id="city">
                                                                                                <option value="">City</option>

                                                                                            </select>
                                                                                        </span>
                                                                                        <p class="err-msg">
                                                                                            <?php echo form_error('city'); ?>
                                                                                        </p>
                                                                                    </span>
                                                                                </div>
                                                                                <div class="col-6">
                                                                                    <label>Address Type *</label>
                                                                                    <span class="ec-bill-option">
                                                                                        <span>
                                                                                            <input type="radio" id="bill1" value="office" name="address_type">
                                                                                            <label for="bill1">Office</label>
                                                                                        </span>
                                                                                        <span>
                                                                                            <input type="radio" id="bill2" value="home" name="address_type" checked>
                                                                                            <label for="bill2">Home</label>
                                                                                        </span>
                                                                                    </span>
                                                                                    <span class="ec-del-commemt">
                                                                                        <label>Address *</label>
                                                                                        <textarea class=" <?php
                                                                                        if (form_error('address')) {
                                                                                            echo "error-border";
                                                                                        }
                                                                                        ?>" value="<?php
                                                                                                   if (set_value('address')) {
                                                                                                       echo set_value('address');
                                                                                                   }
                                                                                                   ?>" name="address" required="" placeholder="Please enter address"></textarea>
                                                                                    </span>
                                                                                    <p class="err-msg">
                                                                                        <?php echo form_error('address'); ?>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                            <span class="ec-check-login-wrap ec-check-login-btn">
                                                                                <button class="btn btn-primary" type="submit" name="add" value="yes">Add</button>
                                                                                <button class="btn btn-default" type="clear" name="clear">Clear</button>
                                                                            </span>
                                                                        </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!--</div>-->
                                        </div>
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="ec-vendor-block-profile">
                                            <!--<div class="ec-login-wrapper">-->
                                            <div class="ec-login-container">
                                                <div class="ec-login-form">
                                                    <form action="" method="post" novalidate=""  class="myform" enctype="multipart/form-data">
                                                        <div class="row">
                                                            <?php
                                                            $whh['register_id'] = $this->session->userdata('member');
                                                            $address = $this->md->my_select('tbl_shipment','*',$whh);
                                                            
                                                            $c = 0;
                                                            foreach ($address as $data) {
                                                                $c++;
                                                                
                                                                
                                                                ?>
                                                                <div class="col-md-6 col-sm-12">
                                                                    <div class="ec-vendor-detail-block ec-vendor-block-address mar-b-30">
                                                                        <h6>Address <?php echo $c; ?>
                                                                            <a onclick="remove_address(<?php echo $data->shipment_id; ?>)">
                                                                                <i style="color: red;" class="ecicon eci-trash-o"></i>
                                                                            </a></h6>
                                                                        <ul>
                                                                            <li><?php echo $data->name; ?></li>
                                                                            <li><strong><?php echo $data->address_type; ?> : </strong><?php echo $data->address; ?></li>
                                                                        </ul>
                                                                    </div>
                                                                    <br/>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!--</div>-->
                                        </div>
                                    </div>
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