<?php
defined('BASEPATH') OR exit('No direct script access allowed');



$route['default_controller'] = 'pages';
$route['404_override'] = 'pages/page_not_found';
$route['translate_uri_dashes'] = FALSE;



//index
$route['home'] = 'Pages/index';
$route['about-us'] = 'Pages/about_us';
$route['privacy-policy'] = 'Pages/privacy_policy';
$route['return-policy'] = 'Pages/return_policy';
$route['terms-and-condition'] = 'Pages/terms_and_condition';
$route['contact-us'] = 'Pages/contact_us';
$route['feedback'] = 'Pages/feedback';
$route['faqs'] = 'Pages/faqs';
$route['login/?(:any)?'] = 'Pages/login/$2';
$route['register'] = 'Pages/register';
$route['forget-password'] = 'Pages/forget_pass';
$route['collections/?(:any)?/?(:any)?'] = 'Pages/collections/$2/$3';
$route['view-product-detail/?(:any)?'] = 'Pages/product_details/$2';
$route['view-cart'] = 'Pages/view_cart';
$route['checkout'] = 'Pages/check_out';
$route['order-success'] = 'Pages/order_success';
$route['order-failed'] = 'Pages/order_failed';
$route['order-confirmation'] = 'Pages/order_confirmation';
$route['resend-otp'] = 'Pages/resend_otp';


//member
$route['member-home'] = 'Member/member_home';
$route['member-profile'] = 'Member/member_profile';
$route['member-setting'] = 'Member/member_setting';
$route['member-logout'] = 'Member/logout';
$route['member-address'] = 'Member/member_address';
$route['member-wishlist'] = 'Member/member_wishlist';
$route['member-review'] = 'Member/member_review';
$route['member-order'] = 'Member/member_order';
$route['member-order-detail/(:any)'] = 'Member/member_order_detail/$2';
$route['delete/(:any)/(:any)'] = 'Member/delete/$2/$3';



//admin
$route['admin-login/?(:any)?'] = 'Authorize/login/$2';
$route['admin-logout'] = 'Authorize/logout';
$route['admin-forget-password'] = 'Authorize/forget_password';
$route['admin-home'] = 'Authorize/dashboard';
$route['manage-contact-us'] = 'Authorize/manage_contactus';
$route['manage-feedback'] = 'Authorize/manage_feedback';
$route['manage-email-subscriber'] = 'Authorize/manage_email_subscriber';
$route['manage-banner'] = 'Authorize/manage_banner';
$route['manage-member'] = 'Authorize/manage_member';
$route['manage-aboutus/?(:any)?'] = 'Authorize/manage_aboutus/$2';
$route['manage-privacy-policy/?(:any)?'] = 'Authorize/manage_privacy_policy/$2';
$route['manage-return-policy/?(:any)?'] = 'Authorize/manage_return_policy/$2';
$route['manage-terms-and-condition/?(:any)?'] = 'Authorize/manage_terms_and_condition/$2';
$route['manage-faqs/?(:any)?'] = 'Authorize/manage_faqs/$2';
$route['manage-country/?(:any)?'] = 'Authorize/manage_country/$2';
$route['manage-state/?(:any)?'] = 'Authorize/manage_state/$2';
$route['manage-city/?(:any)?'] = 'Authorize/manage_city/$2';
$route['manage-main-category/?(:any)?'] = 'Authorize/manage_main_category/$2';
$route['manage-sub-category/?(:any)?'] = 'Authorize/manage_sub_category/$2';
$route['manage-peta-category/?(:any)?'] = 'Authorize/manage_peta_category/$2';
$route['manage-add-new-product'] = 'Authorize/manage_add_new_product';
$route['manage-view-all-product'] = 'Authorize/manage_view_all_product';
$route['manage-product-reviews'] = 'Authorize/manage_product_reviews';
$route['manage-product-offer'] = 'Authorize/manage_product_Offer';
$route['manage-promocode'] = 'Authorize/manage_promocode';
$route['manage-settings'] = 'Authorize/manage_settings';
$route['manage-pending-orders'] = 'Authorize/manage_p_orders';
$route['manage-confrim-orders'] = 'Authorize/manage_confrim_orders';
$route['manage-cancel-orders'] = 'Authorize/manage_cancel_order';
$route['delete/(:any)/(:any)'] = 'Authorize/delete/$2/$3';

