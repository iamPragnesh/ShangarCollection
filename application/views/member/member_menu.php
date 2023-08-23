<div class="ec-shop-leftside ec-vendor-sidebar col-lg-3 col-md-12">
    <div class="ec-sidebar-wrap">
        <!-- Sidebar Category Block -->
        <div class="ec-sidebar-block">
            <div class="ec-vendor-block">
                <div class="ec-vendor-block-bg"></div>
                <div class="ec-vendor-block-detail">
                    <?php
                    $wh['register_id'] = $this->session->userdata('member');
                    $detail = $this->md->my_select('tbl_register','*',$wh)[0];
                    
                    if(strlen($detail->profile_pic) > 0)
                    {
                       ?>
                    <img class="v-img" id="preview" src="<?php echo base_url().$detail->profile_pic; ?>" alt="vendor image">
                    <?php
                    }
                    else
                    {
                     ?>
                    <img class="v-img" id="preview" src="admin_assets/img/user.png" alt="vendor image">
                    <?php
                    }
                    ?>
                    
                    <h5><?php echo $detail->name; ?>
                    </h5>
                    <p style=" font-size: 14px;"><?php echo date('d-m-Y h:i:s', strtotime($detail->last_login));  ?></p>
                    <p style=" font-size: 14px;">Member since &nbsp;<?php echo date('d-m-Y', strtotime($detail->join_date));  ?></p>
                </div>
                <div class="ec-vendor-block-items">
                    <ul class="menu">
                        <li class="<?php if( $this->session->userdata('mpage') == "dashboard" ){ echo "active-menu"; } ?>"><a href="<?php echo base_url(); ?>member-home">Dashboard</a></li>
                        <li class="<?php if( $this->session->userdata('mpage') == "profile" ){ echo "active-menu"; } ?>"><a href="<?php echo base_url(); ?>member-profile">My Profile</a></li>
                        <li class="<?php if( $this->session->userdata('mpage') == "address" ){ echo "active-menu"; } ?>"><a href="<?php echo base_url(); ?>member-address">My Address</a></li>
                        <li class="<?php if( $this->session->userdata('mpage') == "review" ){ echo "active-menu"; } ?>"><a href="<?php echo base_url(); ?>member-review"">My Review</a></li>
                        <li class="<?php if( $this->session->userdata('mpage') == "wishlist" ){ echo "active-menu"; } ?>"><a href="<?php echo base_url(); ?>member-wishlist">My Wish List</a></li>
                        <li class="<?php if( $this->session->userdata('mpage') == "order" ){ echo "active-menu"; } ?>"><a href="<?php echo base_url(); ?>member-order">My Order</a></li>
                        <li class="<?php if( $this->session->userdata('mpage') == "setting" ){ echo "active-menu"; } ?>"><a href="<?php echo base_url(); ?>member-setting">Settings</a></li>
                        <li><a href="<?php echo base_url('member-logout'); ?>">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>