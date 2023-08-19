<div class="top-bar color-scheme-transparent">
    <div class="top-menu-controls">
        <div class="position-left">

        </div>
        <div class="logged-user-w">
            <div class="logged-user-i">
                <div class="avatar-w"><?php
                    $data = $this->md->my_select('tbl_admin_login', '*', array('admin_id' => $this->session->userdata('admin')))[0];

                    if (strlen($data->profile_pic) > 0) {
                        ?>
                        <img class="rounded-circle" id="preivew" src="<?php echo base_url() . $data->profile_pic; ?>" alt="Admin Panel" />
                        <?php
                    } else {
                        ?>
                        <img class="rounded-circle" id="preivew" src="<?php echo base_url(); ?>admin_assets/img/user.png" alt="Admin Panel" style="width:250px"/>
                        <?php
                    }
                    ?>
                </div>
                <div class="logged-user-info-w">
                    <div class="logged-user-name">Admin Panel</div>
<!--                    <div class="logged-user-role">Administrator</div>-->
                        <p style=" font-size: 11px;"><?php echo date('d-m-y h:i:s',strtotime($data->last_login)); ?></p>
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
                        <li><a href="<?php echo base_url(); ?>#"><i class="os-icon os-icon-settings"></i><span>Setting</span></a> </li>
                        <li><a href="<?php echo base_url('admin-logout'); ?>"><i class="os-icon os-icon-signs-11"></i><span>Logout</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>