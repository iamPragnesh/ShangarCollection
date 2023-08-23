<div class="menu-w color-scheme-light color-style-transparent menu-position-side menu-side-left menu-layout-compact sub-menu-style-over sub-menu-color-bright selected-menu-color-light menu-activated-on-hover menu-has-selected-link">
    <div class="logo-w">
        <a class="logo" href="<?php echo base_url(); ?>admin-login">
            <img src="<?php echo base_url(); ?>admin_assets/img/Shangar2.png">
            <div class="logo-label">Shangar Collection</div>
        </a>
    </div>
    <div class="logged-user-w avatar-inline">
        <div class="logged-user-i">
            <div class="avatar-w"><?php
                $data = $this->md->my_select('tbl_admin_login', '*', array('admin_id' => $this->session->userdata('admin')))[0];

                if (strlen($data->profile_pic) > 0) {
                    ?>
                    <img class="rounded-circle" id="preivew" src="<?php echo base_url() . $data->profile_pic; ?>" alt="Admin Panel"/>
                    <?php
                } else {
                    ?>
                    <img class="rounded-circle" id="preivew" src="<?php echo base_url(); ?>admin_assets/img/user.png" alt="Admin Panel" style="width:250px"/>
                    <?php
                }
                ?></div>
            <div class="logged-user-info-w">
                <div class="logged-user-name">Admin Panel</div>
                <div class="logged-user-role">Administrator</div>
            </div>
            <div class="logged-user-toggler-arrow">
                <div class="os-icon os-icon-chevron-down"></div>
            </div>
            <div class="logged-user-menu color-style-bright">
                <div class="logged-user-avatar-info">
                    <div class="avatar-w"><?php
                        $data = $this->md->my_select('tbl_admin_login', '*', array('admin_id' => $this->session->userdata('admin')))[0];

                        if (strlen($data->profile_pic) > 0) {
                            ?>
                            <img class="rounded-circle" id="preivew" src="<?php echo base_url() . $data->profile_pic; ?>" alt="Admin Panel"/>
                            <?php
                        } else {
                            ?>
                            <img class="rounded-circle" id="preivew" src="<?php echo base_url(); ?>admin_assets/img/user.png" alt="Admin Panel" style="width:250px"/>
                            <?php
                        }
                        ?></div>
                    <div class="logged-user-info-w">
                        <div class="logged-user-name">Admin Panel</div>
                        <div class="logged-user-role">Administrator</div>
                    </div>
                </div>
                <div class="bg-icon"><i class="os-icon os-icon-wallet-loaded"></i></div>
                <ul>
                    <li><a href="#"><i class="os-icon os-icon-settings"></i><span>Setting</span></a></li>
                    <li><a href="<?php echo base_url('admin-logout'); ?>"><i class="os-icon os-icon-signs-11"></i><span>Logout</span></a></li>
                </ul>
            </div>
        </div>
    </div>
    <ul class="main-menu">
        <li class=" "><span>Layouts</span></li>
        <li class="selected has-sub-menu">
            <a href="<?php echo base_url(); ?>admin-home">
                <div class="icon-w">
                    <div class="os-icon os-icon-layout"></div>
                </div><span>Dashboard</span></a>
            <div class="sub-menu-w">
                <div class="sub-menu-header">Dashboard</div>
                <div class="sub-menu-icon"><i class="os-icon os-icon-layout"></i></div>
                <div class="sub-menu-i">
                    <ul class="sub-menu">
                        <li><a href="<?php echo base_url(); ?>admin-home">Dashboard</a></li>
                    </ul>
                </div>
            </div>
        </li>

        <li class="has-sub-menu ">
            <a href="">
                <div class="icon-w">
                    <div class="os-icon os-icon-file-text"></div>
                </div><span>Pages</span></a>
            <div class="sub-menu-w">
                <div class="sub-menu-header">Pages</div>
                <div class="sub-menu-icon"><i class="os-icon os-icon-file-text"></i></div>
                <div class="sub-menu-i">
                    <ul class="sub-menu">
                        <li><a href="<?php echo base_url(); ?>manage-contact-us">Contact Us</a></li>
                        <li><a href="<?php echo base_url(); ?>manage-feedback">Feedback</a></li>
                        <li><a href="<?php echo base_url(); ?>manage-email-subscriber">Email Subscriber</a></li>
                        <li><a href="<?php echo base_url(); ?>manage-banner">Banner</a></li>
                        <li><a href="<?php echo base_url(); ?>manage-member">Member</a></li>
                        <li><a href="<?php echo base_url(); ?>manage-aboutus">About Us</a></li>
                        <li><a href="<?php echo base_url(); ?>manage-privacy-policy">Privacy Policy</a></li>
                        <li><a href="<?php echo base_url(); ?>manage-return-policy">Return Policy</a></li>
                        <li><a href="<?php echo base_url(); ?>manage-terms-and-condition">Terms and Condition</a></li>
                        <li><a href="<?php echo base_url(); ?>manage-faqs">FAQ's</a></li>
                    </ul>
                </div>
            </div>
        </li>

        <li class="sub-header"><span>Options</span></li>
        <li class="has-sub-menu">
            <a href="">
                <div class="icon-w">
                    <div class="os-icon os-icon-map-pin"></div>
                </div><span>Location</span></a>
            <div class="sub-menu-w">
                <div class="sub-menu-header">Location</div>
                <div class="sub-menu-icon"><i class="os-icon os-icon-map-pin"></i></div>
                <div class="sub-menu-i">
                    <ul class="sub-menu">
                        <li><a href="<?php echo base_url(); ?>manage-country">Country</a></li>
                        <li><a href="<?php echo base_url(); ?>manage-state">State</a></li>
                        <li><a href="<?php echo base_url(); ?>manage-city">City</a></li>
                    </ul>
                </div>
            </div>
        </li>

        <li class="has-sub-menu">
            <a href="">
                <div class="icon-w">
                    <div class="os-icon os-icon-layers"></div>
                </div><span>Category</span></a>
            <div class="sub-menu-w">
                <div class="sub-menu-header">Category</div>
                <div class="sub-menu-icon"><i class="os-icon os-icon-layers"></i></div>
                <div class="sub-menu-i">
                    <ul class="sub-menu">
                        <li><a href="<?php echo base_url(); ?>manage-main-category">Main Category</a></li>
                        <li><a href="<?php echo base_url(); ?>manage-sub-category">Sub Category</a></li>
                        <li><a href="<?php echo base_url(); ?>manage-peta-category">Peta Category</a></li>
                    </ul>
                </div>
            </div>
        </li>

        <li class="has-sub-menu">
            <a href="">
                <div class="icon-w">
                    <div class="os-icon os-icon-box"></div>
                </div><span>Product</span></a>
            <div class="sub-menu-w">
                <div class="sub-menu-header">Product</div>
                <div class="sub-menu-icon"><i class="os-icon os-icon-box"></i></div>
                <div class="sub-menu-i">
                    <ul class="sub-menu">
                        <li><a href="<?php echo base_url(); ?>manage-add-new-product">Add New Product</a></li>
                        <li><a href="<?php echo base_url(); ?>manage-view-all-product">View All Product</a></li>
                        <li><a href="<?php echo base_url(); ?>manage-product-reviews">Product Reviews</a></li>
                        <li><a href="<?php echo base_url(); ?>manage-product-offer">Product Offer</a></li>
                        <li><a href="<?php echo base_url(); ?>manage-promocode">Promocode</a></li>
                    </ul>                </div>
            </div>
        </li>
        
        <li class="has-sub-menu">
            <a href="">
                <div class="icon-w">
                    <div class="os-icon os-icon-package"></div>
                </div><span>Order</span></a>
            <div class="sub-menu-w">
                <div class="sub-menu-header">Order</div>
                <div class="sub-menu-icon"><i class="os-icon os-icon-package"></i></div>
                <div class="sub-menu-i">
                    <ul class="sub-menu">
                        <li><a href="<?php echo base_url(); ?>manage-pending-orders">Pending order</a></li>
                        <li><a href="<?php echo base_url(); ?>manage-confrim-orders">Confirm Order</a></li>
                        <li><a href="<?php echo base_url(); ?>manage-cancel-orders">Cancel Order</a></li>
                    </ul>                
                </div>
            </div>
        </li>
        <li class="sub-header"><span>Elements</span></li>
        <li class="has-sub-menu">
            <a href="">
                <div class="icon-w">
                    <div class="os-icon os-icon-settings"></div>
                </div><span>Settings</span></a>
            <div class="sub-menu-w">
                <div class="sub-menu-header">Settings</div>
                <div class="sub-menu-icon"><i class="os-icon os-icon-settings"></i></div>
                <div class="sub-menu-i">
                    <ul class="sub-menu">
                        <li><a href="<?php echo base_url(); ?>manage-settings">Settings</a></li>
                    </ul>
                </div>
            </div>
        </li>
        <li class="has-sub-menu">
            <a href="">
                <div class="icon-w">
                    <div class="os-icon os-icon-log-out"></div>
                </div><span>Log Out</span></a>
            <div class="sub-menu-w">
                <div class="sub-menu-header">Log Out</div>
                <div class="sub-menu-icon"><i class="os-icon os-icon-log-out"></i></div>
                <div class="sub-menu-i">
                    <ul class="sub-menu">
                        <li><a href="<?php echo base_url('admin-logout'); ?>">Log Out</a></li>
                    </ul>
                </div>
            </div>
        </li>
    </ul>
</div>