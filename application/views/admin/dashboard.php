<!DOCTYPE html>
<html>

    <?php
    //require './headerlink.php';
    $this->load->view('admin/headerlink');
    ?>

    <body class="menu-position-side menu-side-left full-screen with-content-panel">
        <div class="all-wrapper with-side-panel solid-bg-all">
            <div class="search-with-suggestions-w">
                <div class="search-with-suggestions-modal">
                    <div class="element-search">
                        <input class="search-suggest-input" placeholder="Start typing to search...">
                        <div class="close-search-suggestions"><i class="os-icon os-icon-x"></i></div>
                    </div>
                    <div class="search-suggestions-group">
                        <div class="ssg-header">
                            <div class="ssg-icon">
                                <div class="os-icon os-icon-box"></div>
                            </div>
                            <div class="ssg-name">Projects</div>
                            <div class="ssg-info">24 Total</div>
                        </div>
                        <div class="ssg-content">
                            <div class="ssg-items ssg-items-boxed">
                                <a class="ssg-item" href="<?php echo base_url(); ?>users_profile_big.html">
                                    <div class="item-media" style="background-image: url(img/company6.png)"></div>
                                    <div class="item-name">Integ<span>ration</span> with API</div>
                                </a>
                                <a class="ssg-item" href="<?php echo base_url(); ?>users_profile_big.html">
                                    <div class="item-media" style="background-image: url(img/company7.png)"></div>
                                    <div class="item-name">Deve<span>lopm</span>ent Project</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="search-suggestions-group">
                        <div class="ssg-header">
                            <div class="ssg-icon">
                                <div class="os-icon os-icon-users"></div>
                            </div>
                            <div class="ssg-name">Customers</div>
                            <div class="ssg-info">12 Total</div>
                        </div>
                        <div class="ssg-content">
                            <div class="ssg-items ssg-items-list">
                                <a class="ssg-item" href="<?php echo base_url(); ?>users_profile_big.html">
                                    <div class="item-media" style="background-image: url(img/avatar1.jpg)"></div>
                                    <div class="item-name">John Ma<span>yer</span>s</div>
                                </a>
                                <a class="ssg-item" href="<?php echo base_url(); ?>users_profile_big.html">
                                    <div class="item-media" style="background-image: url(img/avatar2.jpg)"></div>
                                    <div class="item-name">Th<span>omas</span> Mullier</div>
                                </a>
                                <a class="ssg-item" href="<?php echo base_url(); ?>users_profile_big.html">
                                    <div class="item-media" style="background-image: url(img/avatar3.jpg)"></div>
                                    <div class="item-name">Kim C<span>olli</span>ns</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="search-suggestions-group">
                        <div class="ssg-header">
                            <div class="ssg-icon">
                                <div class="os-icon os-icon-folder"></div>
                            </div>
                            <div class="ssg-name">Files</div>
                            <div class="ssg-info">17 Total</div>
                        </div>
                        <div class="ssg-content">
                            <div class="ssg-items ssg-items-blocks">
                                <a class="ssg-item" href="<?php echo base_url(); ?>#">
                                    <div class="item-icon"><i class="os-icon os-icon-file-text"></i></div>
                                    <div class="item-name">Work<span>Not</span>e.txt</div>
                                </a>
                                <a class="ssg-item" href="<?php echo base_url(); ?>#">
                                    <div class="item-icon"><i class="os-icon os-icon-film"></i></div>
                                    <div class="item-name">V<span>ideo</span>.avi</div>
                                </a>
                                <a class="ssg-item" href="<?php echo base_url(); ?>#">
                                    <div class="item-icon"><i class="os-icon os-icon-database"></i></div>
                                    <div class="item-name">User<span>Tabl</span>e.sql</div>
                                </a>
                                <a class="ssg-item" href="<?php echo base_url(); ?>#">
                                    <div class="item-icon"><i class="os-icon os-icon-image"></i></div>
                                    <div class="item-name">wed<span>din</span>g.jpg</div>
                                </a>
                            </div>
                            <div class="ssg-nothing-found">
                                <div class="icon-w"><i class="os-icon os-icon-eye-off"></i></div><span>No files were found. Try changing your query...</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="layout-w">
                <?php
                //require './menu.php';
                $this->load->view('admin/menu');
                ?>
                <div class="content-w">

                    <?php
                    //require './topbar.php';
                    $this->load->view('admin/topbar');
                    ?>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin-home">Home</a></li>
                    </ul>
                    <div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>
                    <div class="content-i">
                        <div class="content-box">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="element-wrapper">
                                        <div class="element-actions">
                                            <form class="form-inline justify-content-sm-end">
                                            </form>
                                        </div>
                                        <h4 class="element-header">Dashboard</h4>
                                        <div class="element-content">
                                            <div class='element-box'>
                                                <h5 class="element-header">Pages</h5>
                                                <div class="row">
                                                    <div class="col-sm-4 col-xxxl-3">
                                                        <a class="element-box el-tablo" href="<?php echo base_url(); ?>manage-contact-us">
                                                            <?php
                                                            $contact = count($this->md->my_select('tbl_contact_us'));
                                                            ?>
                                                            <div class="label">Contact Us</div>
                                                            <div class="value" id="contact"></div>
                                                        </a>
                                                    </div>
                                                    <div class="col-sm-4 col-xxxl-3">
                                                        <a class="element-box el-tablo" href="<?php echo base_url(); ?>manage-feedback">
                                                            <?php
                                                            $feedback = count($this->md->my_select('tbl_feedback'));
                                                            ?>
                                                            <div class="label">Feedback</div>
                                                            <div class="value" id="feedback" ></div>
                                                        </a>
                                                    </div>
                                                    <div class="col-sm-4 col-xxxl-3">
                                                        <a class="element-box el-tablo" href="<?php echo base_url(); ?>manage-email-subscriber">
                                                            <?php
                                                            $email = count($this->md->my_select('tbl_email_subscriber'));
                                                            ?>
                                                            <div class="label">Email Subscriber</div>
                                                            <div class="value" id="email"><?php echo $email; ?></div>
                                                        </a>
                                                    </div>
                                                    <div class="d-none d-xxxl-block col-xxxl-3">
                                                        <a class="element-box el-tablo" href="<?php echo base_url(); ?>manage-banner">
                                                            <?php
                                                            $banner = count($this->md->my_select('tbl_banner'));
                                                            ?>
                                                            <div class="label">Banner</div>
                                                            <div class="value" id="banner"></div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-4 col-xxxl-3">
                                                        <a class="element-box el-tablo" href="<?php echo base_url(); ?>manage-member">
                                                            <?php
                                                            $member = count($this->md->my_select('tbl_register'));
                                                            ?>
                                                            <div class="label">Mamber</div>
                                                            <div class="value" id="member"></div>
                                                        </a>
                                                    </div>
                                                    <div class="col-sm-4 col-xxxl-3">
                                                        <a class="element-box el-tablo" href="<?php echo base_url(); ?>manage-aboutus">
                                                            <?php
                                                            $about = count($this->md->my_select('tbl_about'));
                                                            ?>
                                                            <div class="label">About Us</div>
                                                            <div class="value" id="about"></div>
                                                        </a>
                                                    </div>
                                                    <div class="col-sm-4 col-xxxl-3">
                                                        <a class="element-box el-tablo" href="<?php echo base_url(); ?>manage-privacy-policy">
                                                            <?php
                                                            $privacy = count($this->md->my_select('tbl_privacy_policy'));
                                                            ?>
                                                            <div class="label">Privacy Policy</div>
                                                            <div class="value" id="privacy"></div>
                                                        </a>
                                                    </div>
                                                    <div class="d-none d-xxxl-block col-xxxl-3">
                                                        <a class="element-box el-tablo" href="<?php echo base_url(); ?>manage-return-policy">
                                                            <?php
                                                            $return = count($this->md->my_select('tbl_return_policy'));
                                                            ?>
                                                            <div class="label">Return Policy</div>
                                                            <div class="value" id="return"></div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-4 col-xxxl-3">
                                                        <a class="element-box el-tablo" href="<?php echo base_url(); ?>manage-terms-and-condition">
                                                            <?php
                                                            $term = count($this->md->my_select('tbl_terms_condition'));
                                                            ?>
                                                            <div class="label">Terms And Condition</div>
                                                            <div class="value" id="term"></div>
                                                        </a>
                                                    </div>
                                                    <div class="col-sm-4 col-xxxl-3">
                                                        <a class="element-box el-tablo" href="<?php echo base_url(); ?>manage-faqs">
                                                            <?php
                                                            $faq = count($this->md->my_select('tbl_faqs'));
                                                            ?>
                                                            <div class="label">FAQ's</div>
                                                            <div class="value"id="faq"></div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='element-box'>
                                                <h5 class="element-header">Loction</h5>
                                                <div class="row">
                                                    <div class="col-sm-4 col-xxxl-3">
                                                        <a class="element-box el-tablo" href="<?php echo base_url(); ?>manage-country">
                                                            <?php
                                                            $cou = count($this->md->my_query("SELECT * FROM `tbl_location` WHERE label='country'"));
                                                            ?>
                                                            <div class="label">Country</div>
                                                            <div class="value" id="country"></div>
                                                        </a>
                                                    </div>
                                                    <div class="col-sm-4 col-xxxl-3">
                                                        <a class="element-box el-tablo" href="<?php echo base_url(); ?>manage-state">
                                                            <?php
                                                            $sta = count($this->md->my_query("SELECT * FROM `tbl_location` WHERE label='state'"));
                                                            ?>
                                                            <div class="label">State</div>
                                                            <div class="value" id="state"></div>
                                                        </a>
                                                    </div>
                                                    <div class="col-sm-4 col-xxxl-3">
                                                        <a class="element-box el-tablo" href="<?php echo base_url(); ?>manage-city">
                                                            <?php
                                                            $cit = count($this->md->my_query("SELECT * FROM `tbl_location` WHERE label='city'"));
                                                            ?>
                                                            <div class="label">City</div>
                                                            <div class="value" id="city"></div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='element-box'>
                                                <h5 class="element-header">Category</h5>
                                                <div class="row">
                                                    <div class="col-sm-4 col-xxxl-3">
                                                        <a class="element-box el-tablo" href="<?php echo base_url(); ?>manage-main-category">
                                                            <?php
                                                            $mainc = count($this->md->my_query("SELECT * FROM `tbl_category` WHERE label='maincategory'"));
                                                            ?>
                                                            <div class="label">Main Category</div>
                                                            <div class="value" id="main"></div>
                                                        </a>
                                                    </div>
                                                    <div class="col-sm-4 col-xxxl-3">
                                                        <a class="element-box el-tablo" href="<?php echo base_url(); ?>manage-sub-category">
                                                            <?php
                                                            $subc = count($this->md->my_query("SELECT * FROM `tbl_category` WHERE label='subcategory'"));
                                                            ?>
                                                            <div class="label">Sub Category</div>
                                                            <div class="value" id="sub"></div>
                                                        </a>
                                                    </div>
                                                    <div class="col-sm-4 col-xxxl-3">
                                                        <a class="element-box el-tablo" href="<?php echo base_url(); ?>manage-peta-category">
                                                            <?php
                                                            $petac = count($this->md->my_query("SELECT * FROM `tbl_category` WHERE label='petacategory'"));
                                                            ?>
                                                            <div class="label">Peta Category</div>
                                                            <div class="value" id="peta"></div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='element-box'>
                                                <h5 class="element-header">Product</h5>
                                                <div class="row">   
                                                    <div class="col-sm-4 col-xxxl-3">
                                                        <a class="element-box el-tablo" href="<?php echo base_url(); ?>manage-view-all-product">
                                                            <?php
                                                            $producta = count($this->md->my_select('tbl_product'));
                                                            ?>
                                                            <div class="label">View All Product</div>
                                                            <div class="value" id="product"></div>
                                                        </a>
                                                    </div>
                                                    <div class="col-sm-4 col-xxxl-3">
                                                        <a class="element-box el-tablo" href="<?php echo base_url(); ?>manage-product-reviews">
                                                            <?php
                                                            $reviewa = count($this->md->my_select('tbl_review'));
                                                            ?>
                                                            <div class="label">Product Reviews</div>
                                                            <div class="value" id="review"></div>
                                                        </a>
                                                    </div>
                                                    <div class="col-sm-4 col-xxxl-3">
                                                        <a class="element-box el-tablo" href="<?php echo base_url(); ?>manage-product-offer">
                                                            <?php
                                                            $offera = count($this->md->my_select('tbl_offer'));
                                                            ?>
                                                            <div class="label">Product Offer</div>
                                                            <div class="value" id="offer"></div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-8 col-xxxl-6">
                                    <div class="element-wrapper">
                                        <div class="d-none d-xxxl-block col-xxxl-6">
                                        </div>
                                    </div>
                                    <?php
                                    $this->load->view('admin/dark_mode');
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="display-type"></div>
                </div>
                <?php
                //require './footerscript.php';
                $this->load->view('admin/footerscript');
                ?>
                <script type="text/javascript">
                set_counter( 'feedback' , <?php echo $feedback; ?>)
                set_counter( 'contact' , <?php echo $contact; ?>)
                set_counter( 'email' , <?php echo $email; ?>)
                set_counter( 'banner' , <?php echo $banner; ?>)
                set_counter( 'member' , <?php echo $member; ?>)
                set_counter( 'about' , <?php echo $about; ?>)
                set_counter( 'privacy' , <?php echo $privacy; ?>)
                set_counter( 'return' , <?php echo $return; ?>)
                set_counter( 'term' , <?php echo $term; ?>)
                set_counter( 'faq' , <?php echo $faq; ?>)
                set_counter( 'country' , <?php echo $cou; ?>)
                set_counter( 'state' , <?php echo $sta; ?>)
                set_counter( 'city' , <?php echo $cit; ?>)
                set_counter( 'main' , <?php echo $mainc; ?>)
                set_counter( 'sub' , <?php echo $subc; ?>)
                set_counter( 'peta' , <?php echo $petac; ?>)
                set_counter( 'product' , <?php echo $producta; ?>)
                set_counter( 'review' , <?php echo $reviewa; ?>)
                set_counter( 'offer' , <?php echo $offera; ?>)
                
                </script>
            </div>    
    </body>

</html>


