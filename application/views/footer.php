<!-- Footer Start -->
<footer class="ec-footer section-space-mt">
    <div class="footer-container">
        <div class="footer-top section-space-footer-p">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-3 ec-footer-contact">
                        <div class="ec-footer-widget">
                            <div class="ec-footer-logo"><a href="<?php echo base_url(); ?>home"><img src="<?php echo base_url(); ?>assets/images/logo/Shangar2.png"
                                                                                                     alt=""><img class="dark-footer-logo" src="<?php echo base_url(); ?>assets/images/logo/dark-logo.png"
                                                                                                     alt="Site Logo" style="display: none;" /></a></div>
                            <h4 class="ec-footer-heading">Contact us</h4>
                            <div class="ec-footer-links">
                                <ul class="align-items-center">
                                    <li class="ec-footer-link">C.B.Patel Computer college,Bharthana,Vesu</li>
                                    <li class="ec-footer-link"><span>Call Us:</span><a href="tel:+9265778295">+91
                                            92657 78295</a></li>
                                    <li class="ec-footer-link"><span>Email:</span><a href="mailto:shangarcollection@gmail.com">shangarcollection@gmail.com</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-2 ec-footer-info">
                        <div class="ec-footer-widget">
                            <h4 class="ec-footer-heading">Our Pages</h4>
                            <div class="ec-footer-links">
                                <ul class="align-items-center">
                                    <li class="ec-footer-link"><a href="<?php echo base_url(); ?>about-us">About Us</a></li>
                                    <li class="ec-footer-link"><a href="<?php echo base_url(); ?>contact-us">Contact Us</a></li>
                                    <li class="ec-footer-link"><a href="<?php echo base_url(); ?>feedback">Feedback</a></li>
                                    <li class="ec-footer-link"><a href="<?php echo base_url(); ?>faqs">FAQ's</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-2 ec-footer-account">
                        <div class="ec-footer-widget">
                            <h4 class="ec-footer-heading">Account</h4>
                            <div class="ec-footer-links">
                                <ul class="align-items-center">
                                    <?php
                                    if ($this->session->userdata('member')) {
                                        ?>
                                        <li class="ec-footer-link"><a href="<?php echo base_url('member-logout'); ?>">Logout</a></li>
                                        <li class="ec-footer-link"><a href="<?php echo base_url('member-profile'); ?>">My Profile</a></li>
                                        <?php
                                    } else {
                                        ?>
                                        <li class="ec-footer-link"><a href="<?php echo base_url('login'); ?>">Login</a></li>
                                        <li class="ec-footer-link"><a href="<?php echo base_url('register'); ?>">Register</a></li>
                                        <?php 
                                    }
                                        ?>
                                        <li class="ec-footer-link"><a href="<?php echo base_url('member-home'); ?>">My Account</a></li>
                                        <li class="ec-footer-link"><a href="">My Wish List</a></li>
                                        <li class="ec-footer-link"><a href="offer.html">My Order</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-2 ec-footer-service">
                            <div class="ec-footer-widget">
                                <h4 class="ec-footer-heading">Our Services</h4>
                                <div class="ec-footer-links">
                                    <ul class="align-items-center">
                                        <li class="ec-footer-link"><a href="<?php echo base_url(); ?>privacy-policy">Privacy Policy </a></li>
                                        <li class="ec-footer-link"><a href="<?php echo base_url(); ?>return-policy">Return Policy</a></li>
                                        <li class="ec-footer-link"><a href="<?php echo base_url(); ?>terms-and-condition">Terms & Conditions</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-3 ec-footer-news">
                        <div class="ec-footer-widget">
                            <h4 class="ec-footer-heading">Email Subscriber</h4>
                            <div class="ec-footer-links">
                                <ul class="align-items-center">
                                    <li class="ec-footer-link">Get instant updates about our new products and
                                        special promos!</li>
                                </ul>
                                <div class="ec-subscribe-form">
                                    <div id="ec_news_signup" class="ec-form">
                                        <input class="ec-email" type="email" id="email" required=""
                                               placeholder="Enter your email here..." name="ec-email" value="" />
                                        <button id="ec-news-btn" class="button btn-primary" type="button" onclick="subscribe();"
                                                name="subscribe" value=""><i class="ecicon eci-paper-plane-o" aria-hidden="true"></i></button>
                                    </div>
                                    <p style="color: #3474d4; padding-top: 3px;" id="msg">
                                    </p>
                                </div>
                            </div>
                            <div id="google_translate_element"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Footer social Start -->
                    <div class="col text-left footer-bottom-left">
                        <div class="footer-bottom-social">
                            <span class="social-text text-upper">Follow us on:</span>
                            <ul class="mb-0">
                                <li class="list-inline-item"><a target="_new" class="hdr-facebook" href="https://www.facebook.com/Shangar_collection-103441855582953"><i class="ecicon eci-facebook"></i></a></li>
                                <li class="list-inline-item"><a target="_new" class="hdr-twitter" href="https://twitter.com/shangar777"><i class="ecicon eci-twitter"></i></a></li>
                                <li class="list-inline-item"><a target="_new" class="hdr-instagram" href="https://www.instagram.com/shangar_collection/"><i class="ecicon eci-instagram"></i></a></li>
                                <li class="list-inline-item"><a target="_new" class="hdr-linkedin" href="https://www.linkedin.com/in/shangar-collection-55689a232/"><i class="ecicon eci-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Footer social End -->
                    <!-- Footer Copyright Start -->
                    <div class="col text-center footer-copy">
                        <div class="footer-bottom-copy ">
                            <div class="ec-copy">Copyright © 2022 <a class="site-name text-upper" href="#">Shangar collection<span>.</span></a>. All Rights Reserved.</div>
                            <div>Design by <a target="_new" href="https://www.instagram.com/m_k_vaghasiya/">Mihirkumar<span>, </span></a><a target="_new" href="https://www.instagram.com/ajayvaja22/">Ajay<span>, </span></a><a target="_new" href="https://www.instagram.com/official_vamja/">Parth<span></span></a></div>
                        </div>
                    </div>
                    <!-- Footer Copyright End -->
                    <!-- Footer payment -->
                    <div class="col footer-bottom-right">
                        <div class="footer-bottom-payment d-flex justify-content-end">
                            <div class="payment-link">
                                <img src="<?php echo base_url(); ?>assets/images/icons/payment.png" alt="">
                            </div>

                        </div>
                    </div>
                    <!-- Footer payment -->
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Area End -->

<!-- Whatsapp -->
<!--<div class="ec-style ec-right-bottom">
     Start Floating Panel Container 
    <div class="ec-panel">
         Panel Header 
        <div class="ec-header">
            <strong>Need Help?</strong>
            <p>Chat with us on WhatsApp</p>
        </div>
         Panel Content 
        <div class="ec-body">
            <ul>
                 Start Single Contact List 
                <li>
                    <a class="ec-list" data-number="918866774266"
                       data-message="Please help me! I have got wrong product - ORDER ID is : #654321485">
                        <div class="d-flex bd-highlight">
                             Profile Picture 
                            <div class="ec-img-cont">
                                <img src="<?php echo base_url(); ?>assets/images/whatsapp/profile_01.jpg" class="ec-user-img"
                                     alt="Profile image">
                                <span class="ec-status-icon"></span>
                            </div>
                             Display Name & Last Seen 
                            <div class="ec-user-info">
                                <span>Sahar Darya</span>
                                <p>Sahar left 7 mins ago</p>
                            </div>
                             Chat iCon 
                            <div class="ec-chat-icon">
                                <i class="fa fa-whatsapp"></i>
                            </div>
                        </div>
                    </a>
                </li>
                / End Single Contact List 
                 Start Single Contact List 
                <li>
                    <a class="ec-list" data-number="918866774266"
                       data-message="Please help me! I have got wrong product - ORDER ID is : #654321485">
                        <div class="d-flex bd-highlight">
                             Profile Picture 
                            <div class="ec-img-cont">
                                <img src="<?php echo base_url(); ?>assets/images/whatsapp/profile_02.jpg" class="ec-user-img"
                                     alt="Profile image">
                                <span class="ec-status-icon ec-online"></span>
                            </div>
                             Display Name & Last Seen 
                            <div class="ec-user-info">
                                <span>Yolduz Rafi</span>
                                <p>Yolduz is online</p>
                            </div>
                             Chat iCon 
                            <div class="ec-chat-icon">
                                <i class="fa fa-whatsapp"></i>
                            </div>
                        </div>
                    </a>
                </li>
                / End Single Contact List 
                 Start Single Contact List 
                <li>
                    <a class="ec-list" data-number="918866774266"
                       data-message="Please help me! I have got wrong product - ORDER ID is : #654321485">
                        <div class="d-flex bd-highlight">
                             Profile Picture 
                            <div class="ec-img-cont">
                                <img src="<?php echo base_url(); ?>assets/images/whatsapp/profile_03.jpg" class="ec-user-img"
                                     alt="Profile image">
                                <span class="ec-status-icon ec-offline"></span>
                            </div>
                             Display Name & Last Seen 
                            <div class="ec-user-info">
                                <span>Nargis Hawa</span>
                                <p>Nargis left 30 mins ago</p>
                            </div>
                             Chat iCon 
                            <div class="ec-chat-icon">
                                <i class="fa fa-whatsapp"></i>
                            </div>
                        </div>
                    </a>
                </li>
                / End Single Contact List 
                 Start Single Contact List 
                <li>
                    <a class="ec-list" data-number="918866774266"
                       data-message="Please help me! I have got wrong product - ORDER ID is : #654321485">
                        <div class="d-flex bd-highlight">
                             Profile Picture 
                            <div class="ec-img-cont">
                                <img src="<?php echo base_url(); ?>assets/images/whatsapp/profile_04.jpg" class="ec-user-img"
                                     alt="Profile image">
                                <span class="ec-status-icon ec-offline"></span>
                            </div>
                             Display Name & Last Seen 
                            <div class="ec-user-info">
                                <span>Khadija Mehr</span>
                                <p>Khadija left 50 mins ago</p>
                            </div>
                             Chat iCon 
                            <div class="ec-chat-icon">
                                <i class="fa fa-whatsapp"></i>
                            </div>
                        </div>
                    </a>
                </li>
                / End Single Contact List 
            </ul>
        </div>
    </div>
    / End Floating Panel Container 
     Start Right Floating Button
    <div class="ec-right-bottom">
        <div class="ec-box">
            <div class="ec-button rotateBackward">
                <img class="whatsapp" src="<?php echo base_url(); ?>assets/images/common/whatsapp.png" alt="whatsapp icon">
            </div>
        </div>
    </div>
    / End Right Floating Button
</div>-->
<!-- Whatsapp end -->



<!-- Modal -->
    <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="ec-vendor-block-img space-bottom-30">
                            <div class="ec-vendor-block-bg cover-upload">
                                <div class="thumb-upload">
                                    <div class="thumb-edit">
                                        <input type='file' id="thumbUpload01" class="ec-image-upload"
                                            accept=".png, .jpg, .jpeg" />
                                        <label><img src="assets/images/icons/edit.svg"
                                                class="svg_img header_svg" alt="edit" /></label>
                                    </div>
                                    <div class="thumb-preview ec-preview">
                                        <div class="image-thumb-preview">
                                            <img class="image-thumb-preview ec-image-preview v-img"
                                                src="assets/images/banner/8.jpg" alt="edit" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ec-vendor-block-detail">
                                <div class="thumb-upload">
                                    <div class="thumb-edit">
                                        <input type='file' id="thumbUpload02" class="ec-image-upload"
                                            accept=".png, .jpg, .jpeg" />
                                        <label><img src="assets/images/icons/edit.svg"
                                                class="svg_img header_svg" alt="edit" /></label>
                                    </div>
                                    <div class="thumb-preview ec-preview">
                                        <div class="image-thumb-preview">
                                            <img class="image-thumb-preview ec-image-preview v-img"
                                                src="assets/images/user/1.jpg" alt="edit" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ec-vendor-upload-detail">
                                <form class="row g-3">
                                    <div class="col-md-6 space-t-15">
                                        <label class="form-label">First name</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-6 space-t-15">
                                        <label class="form-label">Last name</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-12 space-t-15">
                                        <label class="form-label">Address 1</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-12 space-t-15">
                                        <label class="form-label">Address 2</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-12 space-t-15">
                                        <label class="form-label">Address 3</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-6 space-t-15">
                                        <label class="form-label">Email id 1</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-6 space-t-15">
                                        <label class="form-label">Email id 2</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-6 space-t-15">
                                        <label class="form-label">Phone number 1</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-6 space-t-15">
                                        <label class="form-label">Phone number 2</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-12 space-t-15">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <a href="#" class="btn btn-lg btn-secondary qty_close" data-bs-dismiss="modal"
                                            aria-label="Close">Close</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->