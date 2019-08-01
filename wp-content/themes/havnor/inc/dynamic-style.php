<?php
/*
* ---------------------------------------------------------------------
* VictorThemes Dynamic Style
* ---------------------------------------------------------------------
*/

header("Content-type: text/css;");
$absolute_path = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
$wp_load = $absolute_path[0] . 'wp-load.php';
require_once($wp_load);

/* Custom Font */
$all_element_color  = cs_get_customize_option( 'all_element_colors' );
$all_element_secondary_colors = cs_get_customize_option('all_element_secondary_colors');
if($all_element_color) {
?>
  .no-class {}
  .hanor-btn:before, .wp-link-pages a, .wp-pagenavi > span.current, .wp-pagenavi > a:focus,
  .wp-pagenavi > a:hover, .wp-pagenavi > span:focus, 
  .wp-pagenavi > span:hover, input[type="submit"], .owl-carousel .owl-dot.active, .progress-bar,
  .flex-control-paging li a.flex-active, .hanor-link a:hover:after, .hanor-toggle-link:hover .toggle-separator,
  .hanor-toggle-link:hover .toggle-separator:before, .hanor-toggle-link:hover .toggle-separator:after,
  .close-btn a:hover, .hanor-video-btn-wrap:hover .video-btn, .hanor-callout, .hanor-outcome-services .nav-tabs > li > a:before,
  .hanor-outcome-services .nav-tabs > li > a:after, .grid-view-link:hover .grid-view-square,
  .grid-view-link:hover .grid-view-square:after, .tag-links a:hover, .hanor-social.rounded a:hover,
  .blogs-style-three .hanor-hover .hanor-link a:after, .hanor-blog-tags a:hover, .hanor-blog-share .hanor-social.rounded a,
  .menu-separator, .hanor-back-top a:hover, .hanor-footer .hanor-copyright .hanor-social.rounded a:hover,
  .hanor-quote .hanor-video-btn-wrap .video-btn:hover,
  .hanor-subscribe-section .subscribe-socials a:hover, .hanor-success .success-item .success-icon,
  .hanor-free-trail input[type="submit"], .woocommerce .products li.product a.button:hover, .woocommerce a.added_to_cart, .woocommerce .cart .button, .woocommerce a.button.alt:hover, .woocommerce button.button, .woocommerce button.button:hover, .woocommerce .woocommerce-checkout-review-order button.button.alt, .hanor-btn,
  .hanor-widget.widget_product_search button,
  .woocommerce .wc-proceed-to-checkout a.button.alt:hover,
  .hanor-free-trail input[type="submit"], .hanor-free-trail .wpcf7-form input[type="submit"],
  .woocommerce nav.woocommerce-pagination ul li a:focus,
  .woocommerce nav.woocommerce-pagination ul li a:hover,
  .woocommerce nav.woocommerce-pagination ul li span.current,
  .woocommerce div.product .single_add_to_cart_button.button.alt {
    background-color: <?php echo esc_attr($all_element_color); ?>;
  }

  .circle-progressbar-counter, a:hover, a:focus, .nav-tabs > li > a,
  .nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover,
  .nav-tabs > li > a:hover, .checkbox-icon-wrap input[type="checkbox"]:checked + .checkbox-icon:before,
  .panel-title a, .hanor-topbar ul li a:hover, .hanor-social a:hover, .hanor-topbar .hanor-social a:hover,
  .hanor-navigation > ul > li.active > a, .hanor-transparent-header .hanor-header-right .hanor-navigation > ul > li:hover > a,
  .hanor-transparent-header .hanor-header-right .hanor-navigation > ul > li.active > a,
  .hanor-fullscreen-navigation .dropdown-nav > li.active > a, .hanor-fullscreen-navigation .dropdown-nav > li:hover > a,
  .hanor-transparent-header .header-links-wrap a:hover, .header-links-wrap a:hover, .service-title a:hover,
  .service-item [class*="pe-7s-"], .hanor-footer a:hover, .hanor-footer .hanor-social a:hover,
  .hanor-dark-topbar .hanor-topbar .hanor-social a:hover, .mate-info .hanor-social a:hover,
  .hanor-link a:hover, .work-category a:hover, .hanor-team .testimonial-author-quote .hanor-social a:hover,
  .hanor-subscribe .hanor-social a:hover, .hanor-rating .active, .sidebar-nav-wrap .dropdown-nav > li:hover > a,
  .sidebar-nav-wrap .dropdown-nav > li.active > a, .sidebar-nav-wrap .hanor-social a:hover,
  .sidebar-nav-wrap .hanor-copyright a:hover, .hanor-topbar .search-link a:hover,.hanor-topbar .cart-link a:hover,
  .portfolio-detail-items-wrap a:hover, .portfolio-controls .portfolio-control-link:hover,
  .hanor-widget ul li a:hover, .blogs-style-three .blog-item.hanor-hover .blog-info a:hover,
  .contact-info p a:hover,
  span.top-link a:hover, span.top-link a:hover i, a.login-link:hover, .hanor-transparent-header .hanor-header-right .hanor-navigation > ul > li.current-menu-parent > a,
  .video-btn, .blogs-style-two .hanor-link a, .blogs-style-two .hanor-link a:hover,
  .blogs-style-two .blog-item.hanor-hover .blog-info .hanor-link a, .blogs-style-two .hanor-link a:hover:after,
  .blogs-style-two .blog-meta.blog-meta-top a:hover, .blogs-style-two .blog-meta.blog-meta-top a:focus,
  .process-item .hanor-icon i, .process-counter-number, .experience-item .hanor-icon [class*="pe-7s"],
  .hanor-outcome-services .nav-tabs > li > a [class*="pe-7s"],
  .vt-nav-links > div:hover, .vt-nav-links > div:hover a, .contact-info-item .hanor-icon [class*="pe-7s"],
  .hanor-portfolio-default .work-item:hover .work-info .port-icon i, blockquote a,
  blockquote cite:before, blockquote cite:after,
  .partnership-style-one .patnership-content-section .readmore-title a,
  .partnership-style-two .patnership-content-section .readmore-title a,
  .hanor-team.team-style-four .mate-info .hanor-social a:hover,
  .blogs-style-six .blog-item.hanor-item.hanor-hover .hanor-link a,
  .hanor-features .feature-item .feature-content-section i, .hanor-features .feature-item .feature-content-section [class*=" pe-7s-"],
  .hanor-features .feature-item .feature-content-section [class^=pe-7s-], .hanor-pagination .malinky-ajax-pagination-loading .mloader,
  .hanor-counting .count-item .counter-value, .hanor-team-intro .member-details h3,
  .hanor-job-detail .job-detail-item .job-detail-icon, .toggle-service-info .hanor-icon span,
  .hanor-process-wedo.wedo-style-two .process-wedo-item:hover .wedo-number h2, .job-btn:hover,
  .job-btn:focus, .job-btn.blue:hover, .job-btn.blue:focus, .job-location a:hover, .each-location-wrap ul li a:hover, #slick-pager p a,
  .hanor-signup-reg a:hover, .woocommerce .products li.product a.button:after, .woocommerce a.remove, .woocommerce-info a.showlogin, .woocommerce-info a.showcoupon,
  .service-item .hanor-icon span, .hanor-btn:hover, .hanor-btn:focus, .difference-info .hanor-icon span,
  .promo-info i, .hanor-footer.footer-light-version .footer-widget .hanor-widget ul li a:hover,
  .hanor-widget.widget_product_search button:hover,
  .hanor-widget.widget_product_search button:focus,
  .hanor-widget.woocommerce.widget_shopping_cart a.button:hover,
  .hanor-widget.woocommerce.widget_shopping_cart a.button:focus,
  footer.hanor-footer.footer-dark-version .footer-widget .hanor-widget ul li a:hover,
  .navi-open .sidebar-nav-wrap .hanor-navigation > ul.custom-dropdown-nav > li > a:hover,
  .navi-open .sidebar-nav-wrap ul.address-info li a:hover,
  .hanor-header .hanor-navigation > ul > li.current-menu-ancestor > a,
  .header-hanor-style-three.header-hanor-style-five .hanor-navigation > ul > li.current-menu-ancestor > a,
  .hanor-callout a:hover,
  .hanor-header-three.hanor-main-wrap .sidebar-nav-wrap .hanor-navigation ul li a:hover,
  .hanor-header-three.hanor-main-wrap .sidebar-nav-wrap .hanor-navigation > ul > li > a:hover,
  .hanor-header-three.hanor-main-wrap .sidebar-nav-wrap .hanor-navigation > ul > li > a:focus,
  .hanor-header-three.hanor-main-wrap .sidebar-nav-wrap .hanor-navigation > ul > li.current-menu-ancestor > a,
  .hanor-header-three.hanor-main-wrap .sidebar-nav-wrap .hanor-navigation > ul > li ul.dropdown-nav li.current-menu-parent > a,
  .hanor-header-three.hanor-main-wrap .sidebar-nav-wrap .hanor-navigation ul li.current-menu-item > a,
  .hanor-outcome-services.tab-style-five .nav.nav-tabs li.active .tab-title,
  .hanor-footer.footer-new-style-two h4.post-title a:hover,
  .hanor-footer.footer-new-style-two.footer-dark-version h4.post-title a:hover,
  .bmi-form .bmi-result span, .bmi-form .bmr-result span, .hanor-portfolio-four .work-item.hanor-item:hover .port-icon i,
  .hanor-portfolio-default .work-item:hover .work-info .port-icon i, .woocommerce .cart .button:hover,
  .woocommerce .cart input.button:hover, .hanor-team.team-style-eight .hanor-social a:hover,
  .hanor-breadcrumbs.breadcrumb-two a:hover, .job-apply-form .terms-condition span > a:hover,
  .similar-job .active .panel-title a, .header-hanor-style-three.header-hanor-style-five a.login-link:hover,
  .hanor-feature a:hover .featured-title, .woocommerce a.added_to_cart:hover, .woocommerce-page.woocommerce .products li.product a.button:after,
  .woocommerce #respond input#submit.disabled:hover,
  .woocommerce #respond input#submit:disabled:hover,
  .woocommerce #respond input#submit:disabled[disabled]:hover,
  .woocommerce a.button.disabled:hover,
  .woocommerce a.button:disabled:hover,
  .woocommerce a.button:disabled[disabled]:hover,
  .woocommerce button.button.disabled:hover,
  .woocommerce button.button:disabled:hover,
  .woocommerce button.button:disabled[disabled]:hover,
  .woocommerce input.button.disabled:hover,
  .woocommerce input.button:disabled:hover,
  .woocommerce input.button:disabled[disabled]:hover,
  .hanor-navigation > ul > li:hover > a,
  .hanor-navigation > ul > li > a:hover,
  .header-hanor-style-three.header-hanor-style-five .hanor-navigation > ul > li > a:hover,
  .hanor-transparent-header .hanor-header-right .hanor-navigation > ul > li.current-menu-parent > a,
  .hanor-transparent-header .hanor-header-right .hanor-navigation > ul > li:hover > a,
  .current-menu-ancestor > a,
  .current-menu-parent > a,
  .sitemap-list li.current-menu-item a,
  .woocommerce div.product .single_add_to_cart_button.button.alt:hover,
  .woocommerce p.stars a,
  .header-contents ul a:hover,
  .header-contents ul a:focus,
  .hanor-topbar .address-info .info-list a:hover,
  .hanor-topbar .address-info .info-list a:focus,
  .header-hanor-style-three.header-hanor-style-four .hanor-navigation > ul > li > a:hover,
  .header-hanor-style-three.header-hanor-style-four .hanor-navigation > ul > li > a:focus,
  .woocommerce .widget_price_filter .price_slider_amount .button,
  .hanor-breadcrumbs a:hover, td.product-name a:hover,
  .blog-detail-wrap .blog-meta, .hanor-related-articles .blog-meta,
  .hanor-related-articles .blogs-style-three .blog-item.hanor-hover .blog-meta,
  .hanor-related-articles .blogs-style-three .blog-item.hanor-hover .blog-info .hanor-link a,
  .hanor-team .style-seven-width h5.mate-designation,
  .hanor-dnt-transparent-header .hanor-header .hanor-navigation > ul > li.active > a,
  .woocommerce div.product .entry-summary p.price, 
  .woocommerce div.product .entry-summary span.price,
  .hanor-btn.hanor-blue-border-btn:hover, .hanor-btn.hanor-blue-border-btn:focus,
  .woocommerce .star-rating span,
  .woocommerce #review_form #respond .form-submit input:hover,
  .woocommerce form .form-row .required,
  .blog-single-metas .hanor-blog-tags a:hover,
  .blog-detail-wrap blockquote a {
    color: <?php echo esc_attr($all_element_color); ?>;
  }
  .woocommerce a.remove, .woocommerce a.remove:hover {color: <?php echo esc_attr($all_element_color); ?> !important;}

  .services-style-three .service-item:before,
  .services-style-three .service-item:after,
  .services-style-three .service-info:before,
  .services-style-three .service-info:after,
  .figuress-item .hanor-icon, .accordion-switch:before,
  .service-switch:before,
  .timeline-item:hover .timeline-image:before,
  .job-btn, .pagerNavigationBottom, .pagerNavigationTop, .slider-selection,
  .slider-handle:before, .slider.slider-horizontal .tooltip-inner, #domain-form #wdc-style .small button#Submit,
  .similar-job .active .accordion-switch:before,
  .woocommerce #review_form #respond .form-submit input,
  .woocommerce div.product .woocommerce-tabs ul.tabs li.active a:after,
  .widget-tags a:hover, .widget_tag_cloud a:hover, .tagcloud a:hover,
  .woocommerce .widget_price_filter .price_slider_amount .button:hover,
  .blog-detail-wrap .blog-meta-item:after,
  blockquote p:after, .hanor-related-articles .blog-meta-item:after,
  .woocommerce a.added_to_cart.wc-forward:hover,
  .blog-single-metas .hanor-blog-share .hanor-social a:hover,
  .hanor-blog-controls a:hover,
  .hanor-footer.footer-new-style-two .footer-widget form.mc4wp-form input[type="submit"] {
    background: <?php echo esc_attr($all_element_color); ?>;
  }

  ::selection {background: <?php echo esc_attr($all_element_color); ?>;}
  ::-webkit-selection {background: <?php echo esc_attr($all_element_color); ?>;}
  ::-moz-selection {background: <?php echo esc_attr($all_element_color); ?>;}
  ::-o-selection {background: <?php echo esc_attr($all_element_color); ?>;}
  ::-ms-selection {background: <?php echo esc_attr($all_element_color); ?>;}

  .hanor-btn, .wp-link-pages a, .hanor-btn:hover, .hanor-btn:focus, .hanor-btn.hanor-blue-border-btn,
  .tag-links a:hover, .hanor-social.rounded a:hover, .hanor-blog-tags a:hover, .hanor-btn.cat-btn:hover,
  .hanor-testimonials.testimonials-thumb-style .thumb-flexslider .flex-active-slide .hanor-image,
  .hanor-team.team-style-one .mate-item:hover .hanor-image, .partners-active.partners-item, .partners-item:hover,
  .hover-active .wedo-number h2:after, .hover-active .wedo-number, .hanor-hover .wedo-number,
  .hanor-process-wedo.wedo-style-two .process-wedo-item:hover, .job-btn, .sitemap-list ul li, 
  .hanor-free-trail input[type="submit"], .woocommerce .products li.product a.button:hover,.woocommerce a.added_to_cart, .woocommerce a.remove, .hanor-btn:hover, .hanor-btn:focus, .woocommerce .cart .button:hover, .woocommerce .cart input.button:hover,
  .hanor-free-trail input[type="submit"], .hanor-free-trail .wpcf7-form input[type="submit"],
  .woocommerce nav.woocommerce-pagination ul li a:focus,
  .woocommerce nav.woocommerce-pagination ul li a:hover,
  .woocommerce nav.woocommerce-pagination ul li span.current,
  .woocommerce a.remove:hover,
  .woocommerce div.product .single_add_to_cart_button.button.alt:hover,
  .woocommerce div.product .single_add_to_cart_button.button.alt,
  .hanor-footer .hanor-copyright .hanor-social.rounded a:hover,
  .hanor-social.rounded a:hover,
  .hanor-navi-wrap, .right .hanor-navi-wrap,
  .widget-tags a:hover, .widget_tag_cloud a:hover, .tagcloud a:hover,
  .woocommerce #review_form #respond .form-submit input:hover {border-color: <?php echo esc_attr($all_element_color); ?>;}


  <?php if (is_rtl()) { ?>
    blockquote {border-right-color: <?php echo esc_attr($all_element_color); ?>;}
  <?php } else { ?>
    blockquote {border-left-color: <?php echo esc_attr($all_element_color); ?>;}
  <?php } ?>

  .slider .tooltip.bottom .tooltip-arrow {border-bottom-color: <?php echo esc_attr($all_element_color); ?>;}

<?php } if($all_element_secondary_colors) { ?>
  .no-class {}
  .hanor-btn.hanor-white-transparent-btn,
  input[type="submit"]:hover, .accordion-style-two .panel-default.active:before,
  .hanor-pagination ul li a:hover, .hanor-pagination ul li a:focus,
  .hanor-pagination ul li span,
  .hanor-footer.footer-light-version .hanor-copyright,
  .hanor-free-trail input[type="submit"],
  .hanor-outcome-services.tab-style-three .nav-tabs > li.active > a:before, 
  .hanor-outcome-services.tab-style-three .nav-tabs > li.active > a:after,
  .hanor-outcome-services .nav-tabs > li.active > a:before, 
  .hanor-outcome-services .nav-tabs > li.active > a:after,
  .progress-item .progress-bar,
  .hanor-quote .hanor-video-btn-wrap .video-btn,
  .menu-separator, .wp-pagenavi > span.current, .wp-pagenavi > a:hover,
  .hanor-callout, .hanor-simple-list.simple-list-style-two .simple-list-content:before,
  .woocommerce .wc-proceed-to-checkout a.button.alt, .toggle-insights-info .insights-meta span:after {
    background-color: <?php echo esc_attr($all_element_secondary_colors); ?>;
  }

  .plan-item.pricing-style-two .plan-title-wrap h2,
  .hanor-testimonials.testimonials-thumb-style  .flex-direction-nav li a:before,
  .hanor-outcome-services.tab-style-three .nav.nav-tabs > li:hover,
  .hanor-outcome-services.tab-style-three .nav.nav-tabs > li:hover > a,
  .hanor-outcome-services.tab-style-three .nav.nav-tabs > li:focus > a,
  .hanor-outcome-services.tab-style-three .nav.nav-tabs > li:focus,
  .hanor-outcome-services.tab-style-three .nav.nav-tabs > li.active a,
  .hanor-plans .nav.nav-tabs > li > a,
  .hanor-secondary .post-info h5.post-time,
  .hanor-outcome-services.tab-style-six .nav-tabs > li.active > a .tab-title,
  .hanor-simple-list .sub-title, .hanor-simple-list .sub-title a,
  .toggle-insights-info .insights-meta,
  .hanor-signup-reg a, .woocommerce ul.products li.product .price,
  .hanor-comments-area .comment-reply-link,
  .blogs-style-three .blog-item.hanor-item .hanor-link a:hover,
  .blogs-style-three .blog-item.hanor-hover .blog-info .hanor-link a,
  .order-total .woocommerce-Price-amount.amount {
    color: <?php echo esc_attr($all_element_secondary_colors); ?>;
  }

  .testimonials-style-two .owl-carousel .owl-dot.active,
  .hanor-btn.cat-btn,
  .hanor-features.feature-style-two .feature-item .feature-content-section .feature-title:after,
  .service-toggle-content ul li:before,
  .timeline-menu:after,
  .timeline-image:before,
  .job-btn.blue,
  .bx-wrapper .bx-pager.bx-default-pager a:hover, 
  .bx-wrapper .bx-pager.bx-default-pager a.active, 
  .bx-wrapper .bx-pager.bx-default-pager a:focus,
  .woocommerce span.onsale, .job-btn.blue:hover, .job-btn.blue:focus,
  .blog-item.hanor-item .hanor-link a:after {
    background: <?php echo esc_attr($all_element_secondary_colors); ?>;
  }

  .hanor-btn.hanor-white-transparent-btn,
  .hanor-btn.hanor-white-transparent-btn:hover,
  .hanor-btn.hanor-white-transparent-btn:focus,
  .hanor-btn.cat-btn,
  .hanor-team.team-style-one .hanor-image,
  .job-btn.blue, .job-btn.blue:hover, .job-btn.blue:focus {
    border-color: <?php echo esc_attr($all_element_secondary_colors); ?>;
  }
<!-- Page Bg Color -->
<?php }
// Metabox
$havnor_id    = ( isset( $post ) ) ? $post->ID : 0;
$havnor_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $havnor_id;
$havnor_id    = ( havnor_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $havnor_id;
$havnor_meta  = get_post_meta( $havnor_id, 'page_type_metabox', true );
if($havnor_meta) {
  $page_bg_color = $havnor_meta['page_bg_color'];
} else {
  $page_bg_color = '';
} 
if($page_bg_color) {
?>
.no-class {}
.hanor-mid-wrap, .hanor-main-wrap.hanor-header-three,
.woocommerce.woocommerce-page .woo-commerce-page-bg,
.woocommerce-cart .hanor-mid-wrap, .woocommerce-checkout .hanor-mid-wrap {
  background-color: <?php echo esc_attr($page_bg_color); ?>;
}

<!-- Topbar Colors -->
<?php }
$topbar_bg_color = cs_get_customize_option( 'topbar_bg_color' );
$topbar_border_color  = cs_get_customize_option( 'topbar_border_color' );
$topbar_text_color = cs_get_customize_option( 'topbar_text_color' );
$topbar_link_color = cs_get_customize_option( 'topbar_link_color' );
$topbar_link_hover_color  = cs_get_customize_option( 'topbar_link_hover_color' );
$topbar_social_color = cs_get_customize_option( 'topbar_social_color' );
$topbar_social_hover_color  = cs_get_customize_option( 'topbar_social_hover_color' );
if($topbar_bg_color) { ?>
.no-class {}
.hanor-topbar {
  background-color: <?php echo esc_attr($topbar_bg_color); ?>;
}
<?php } if($topbar_border_color) { ?>
.no-class {}
.hanor-topbar {
  border-color: <?php echo esc_attr($topbar_border_color); ?>;
}
<?php } if($topbar_text_color) { ?>
.no-class {}
.hanor-topbar ul, 
.hanor-topbar ul li, 
.hanor-topbar ul li span, 
.hanor-topbar p,
.hanor-topbar .address-info .info-list {
  color: <?php echo esc_attr($topbar_text_color); ?>;
}
.topbar-search-cart {
  border-color: <?php echo esc_attr($topbar_text_color); ?>;
}
<?php } if($topbar_link_color) { ?>
.no-class {}
.hanor-topbar a, 
.hanor-topbar ul > li > a, 
.hanor-topbar p a,
.hanor-topbar .address-info .info-list a,
.hanor-topbar .hanor-social a,
.hanor-dark-topbar .hanor-topbar .hanor-social a,
.hanor-topbar .cart-link a, .hanor-topbar .search-link a  {
  color: <?php echo esc_attr($topbar_link_color); ?>;
}
<?php } if($topbar_link_hover_color) { ?>
.no-class {}
.hanor-topbar a:hover, 
.hanor-topbar ul li a:hover, 
.hanor-topbar p a:hover,
.hanor-topbar a:focus, 
.hanor-topbar ul li a:focus, 
.hanor-topbar p a:focus,
.hanor-topbar .address-info .info-list a:hover,
.hanor-topbar .address-info .info-list a:focus,
.hanor-topbar .hanor-social a:hover,
.hanor-topbar .hanor-social a:focus,
.hanor-dark-topbar .hanor-topbar .hanor-social a:hover,
.hanor-dark-topbar .hanor-topbar .hanor-social a:focus,
.hanor-topbar .cart-link a:hover, .hanor-topbar .search-link a:hover,
.hanor-topbar .cart-link a:focus, .hanor-topbar .search-link a:focus {
  color: <?php echo esc_attr($topbar_link_hover_color); ?>;
}
<?php } if($topbar_social_color) { ?>
.no-class {}
.hanor-topbar .hanor-social a,
.hanor-dark-topbar .hanor-topbar .hanor-social a {
  color: <?php echo esc_attr($topbar_social_color); ?>;
}
<?php } if($topbar_social_hover_color) { ?>
.no-class {}
.hanor-topbar .hanor-social a:hover,
.hanor-topbar .hanor-social a:focus,
.hanor-dark-topbar .hanor-topbar .hanor-social a:hover,
.hanor-dark-topbar .hanor-topbar .hanor-social a:focus {
  color: <?php echo esc_attr($topbar_social_hover_color); ?>;
}
<?php }

// Header colors - Customizer
$header_bg_color  = cs_get_customize_option( 'header_bg_color' );
$header_logo_bg_color = cs_get_customize_option('header_logo_bg_color');
$header_border_color = cs_get_customize_option('header_border_color');
$header_link_color  = cs_get_customize_option( 'header_link_color' );
$header_link_hover_color  = cs_get_customize_option( 'header_link_hover_color' );
if($header_bg_color) { ?>
.no-class {}
.header-hanor-style-three.header-hanor-style-five .menu-wraper .container{}
.hanor-dnt-transparent-header .hanor-header, .header-hanor-style-three.header-hanor-style-five .menu-wraper .container,
.hanor-sidebar-nav {
  background-color: <?php echo esc_attr($header_bg_color); ?>;
}
<?php } if($header_logo_bg_color) { ?>
.no-class {}
.header-hanor-style-three.header-hanor-style-five .hanor-header .logo-wraper,
.header-hanor-style-three .logo-wraper {
  background-color: <?php echo esc_attr($header_logo_bg_color); ?>;
}
<?php } if($header_border_color) { ?>
.no-class {}
.hanor-navigation-wrap,
.hanor-dnt-transparent-header .hanor-header,
.header-hanor-style-three.header-hanor-style-five .menu-wraper .container,
.hanor-sidebar-nav, .header-hanor-style-three .logo-wraper {
  border-color: <?php echo esc_attr($header_border_color); ?>;
}
<?php } if($header_link_color) { ?>
.no-class {}
.hanor-dnt-transparent-header .hanor-header .hanor-navigation > ul > li > a,
.header-links-wrap a,
.hanor-dnt-transparent-header .hanor-header a.login-link,
.header-hanor-style-three.header-hanor-style-five .hanor-navigation > ul > li > a,
.hanor-header-three.hanor-main-wrap .sidebar-nav-wrap .hanor-navigation ul li a,
.header-hanor-style-three.header-hanor-style-five a.login-link {
  color: <?php echo esc_attr($header_link_color); ?>;
}
.toggle-separator,
.toggle-separator:before, .toggle-separator:after,
.header-hanor-style-three.header-hanor-style-five .is-sticky .navi-toggle span:before,
.header-hanor-style-three.header-hanor-style-five .is-sticky .navi-toggle span:after {
  background: <?php echo esc_attr($header_link_color); ?>;
}
.hanor-dnt-transparent-header .navi-toggle a,
.header-hanor-style-three.header-hanor-style-five .navi-toggle a {
  border-color: <?php echo esc_attr($header_link_color); ?>;
}

.hanor-dnt-transparent-header .navi-toggle span,
.navi-toggle span:before, .navi-toggle span:after,
.hanor-dnt-transparent-header .navi-toggle span:before, .hanor-dnt-transparent-header .navi-toggle span:after,
.header-hanor-style-three.header-hanor-style-five .navi-toggle span {
  background: <?php echo esc_attr($header_link_color); ?>;
}
<?php } if($header_link_hover_color) { ?>
.no-class{}
.hanor-dnt-transparent-header .hanor-header .hanor-navigation > ul > li > a:hover,
.hanor-dnt-transparent-header .hanor-header .hanor-navigation > ul > li > a:focus,
.header-links-wrap a:hover,
.header-links-wrap a:focus,
.hanor-dnt-transparent-header .hanor-header a.login-link:hover,
.hanor-dnt-transparent-header .hanor-header a.login-link:focus,
.hanor-dnt-transparent-header .hanor-header .hanor-navigation > ul > li.active > a,
.hanor-dnt-transparent-header .hanor-header .hanor-navigation .current-menu-ancestor > a,
.hanor-dnt-transparent-header .hanor-header .hanor-navigation .current-menu-parent > a,
.hanor-dnt-transparent-header .hanor-header .hanor-navigation > ul > li:hover > a,
.header-hanor-style-three.header-hanor-style-five .hanor-navigation > ul > li > a:hover,
.header-hanor-style-three.header-hanor-style-five .hanor-navigation > ul > li > a:focus,
.hanor-header-three.hanor-main-wrap .sidebar-nav-wrap .hanor-navigation ul li a:hover,
.hanor-header-three.hanor-main-wrap .sidebar-nav-wrap .hanor-navigation ul li a:focus,
.hanor-header-three.hanor-main-wrap .sidebar-nav-wrap .hanor-navigation > ul > li.current-menu-ancestor > a,
.hanor-header-three.hanor-main-wrap .sidebar-nav-wrap .hanor-navigation ul li.current-menu-item > a,
.hanor-header .hanor-navigation > ul > li.current-menu-ancestor > a,
.header-hanor-style-three.header-hanor-style-five .hanor-navigation > ul > li.current-menu-ancestor > a,
.header-hanor-style-three.header-hanor-style-five .is-sticky .hanor-navigation > ul > li > a:hover,
.header-hanor-style-three.header-hanor-style-five a.login-link:hover,
.header-hanor-style-three.header-hanor-style-five a.login-link:focus {
  color: <?php echo esc_attr($header_link_hover_color); ?>;
}
.hanor-dnt-transparent-header .hanor-toggle-link:hover .toggle-separator,
.hanor-dnt-transparent-header .hanor-toggle-link:hover .toggle-separator:before,
.hanor-dnt-transparent-header .hanor-toggle-link:hover .toggle-separator:after {
  background: <?php echo esc_attr($header_link_hover_color); ?>;
}
<?php } 
/* Transparent Header - Customizer */
$trans_header_bg_color  = cs_get_customize_option( 'trans_header_bg_color' );
$trans_header_link_color  = cs_get_customize_option( 'trans_header_link_color' );
$trans_header_link_hover_color  = cs_get_customize_option( 'trans_header_link_hover_color' );
if ($trans_header_bg_color) { ?>
.no-class {} 
.hanor-transparent-header .hanor-header {
  background-color: <?php echo esc_attr($trans_header_bg_color); ?>;
}
<?php } if($trans_header_link_color) { ?>
.no-class {}
.hanor-transparent-header .hanor-header .hanor-navigation > ul > li > a,
.hanor-transparent-header .hanor-header a.login-link,
.hanor-transparent-header .header-links-wrap a {
  color: <?php echo esc_attr($trans_header_link_color); ?>;
}
.hanor-transparent-header .toggle-separator,
.hanor-transparent-header .toggle-separator:before,
.hanor-transparent-header .toggle-separator:after,
.hanor-transparent-header .navi-toggle span, .hanor-transparent-header .navi-toggle span:before,
.hanor-transparent-header .navi-toggle span:after {
  background: <?php echo esc_attr($trans_header_link_color); ?>;
}
.hanor-transparent-header .navi-toggle a {
  border-color: <?php echo esc_attr($trans_header_link_color); ?>;
}
<?php } if($trans_header_link_hover_color) { ?>
.no-class {}
.hanor-transparent-header .hanor-header .hanor-navigation > ul > li > a:hover,
.hanor-transparent-header .hanor-header .hanor-navigation > ul > li > a:focus,
.hanor-transparent-header .header-links-wrap a:hover,
.hanor-transparent-header .header-links-wrap a:focus,
.hanor-transparent-header .hanor-header a.login-link:hover,
.hanor-transparent-header .hanor-header a.login-link:focus,
.hanor-transparent-header .hanor-header .hanor-navigation .current-menu-ancestor > a,
.hanor-transparent-header .hanor-header .hanor-navigation .current-menu-parent > a,
.hanor-transparent-header .hanor-header .hanor-navigation > ul > li:hover > a,
.hanor-transparent-header .hanor-header-right .hanor-navigation > ul > li.current-menu-parent > a,
.hanor-transparent-header .hanor-header-right .hanor-navigation > ul > li.active > a {
  color: <?php echo esc_attr($trans_header_link_hover_color); ?>;
}
.hanor-transparent-header .hanor-toggle-link:hover .toggle-separator,
.hanor-transparent-header .hanor-toggle-link:hover .toggle-separator:before,
.hanor-transparent-header .hanor-toggle-link:hover .toggle-separator:after,
.hanor-transparent-header .menu-separator {
  background: <?php echo esc_attr($trans_header_link_hover_color); ?>;
}
<?php }
/* Transparent Sticky Header - Customizer */
$trans_sticky_header_bg_color  = cs_get_customize_option( 'trans_sticky_header_bg_color' );
$trans_sticky_header_link_color  = cs_get_customize_option( 'trans_sticky_header_link_color' );
$trans_sticky_header_link_hover_color  = cs_get_customize_option( 'trans_sticky_header_link_hover_color' );

if ($trans_sticky_header_bg_color) { ?>
.no-class {}
.hanor-transparent-header .is-sticky .hanor-header,
.hanor-dnt-transparent-header .is-sticky .hanor-header {
  background-color: <?php echo esc_attr($trans_sticky_header_bg_color); ?>;
}
<?php } if($trans_sticky_header_link_color) { ?>
.no-class {}
.hanor-transparent-header .is-sticky .hanor-header .hanor-navigation > ul > li > a,
.hanor-transparent-header .is-sticky .hanor-header a.login-link,
.hanor-transparent-header .is-sticky .header-links-wrap a,
.hanor-dnt-transparent-header .is-sticky .hanor-header .hanor-navigation > ul > li > a,
.hanor-dnt-transparent-header .is-sticky .hanor-header a.login-link,
.hanor-dnt-transparent-header .is-sticky .header-links-wrap a {
  color: <?php echo esc_attr($trans_sticky_header_link_color); ?>;
}
.hanor-transparent-header .is-sticky .navi-toggle a,
.hanor-dnt-transparent-header .is-sticky .navi-toggle a {
  border-color: <?php echo esc_attr($trans_sticky_header_link_color); ?>;
}
.hanor-transparent-header .is-sticky .toggle-separator,
.hanor-transparent-header .is-sticky .toggle-separator:before,
.hanor-transparent-header .is-sticky .toggle-separator:after,
.hanor-dnt-transparent-header .is-sticky .toggle-separator,
.hanor-dnt-transparent-header .is-sticky .toggle-separator:before,
.hanor-dnt-transparent-header .is-sticky .toggle-separator:after,
.hanor-transparent-header .is-sticky .navi-toggle span,.hanor-dnt-transparent-header .is-sticky .navi-toggle span,
 .is-sticky .navi-toggle span:before,
.is-sticky .navi-toggle span:after, .hanor-transparent-header .is-sticky .navi-toggle span:before,
.hanor-transparent-header .is-sticky .navi-toggle span:after {
  background: <?php echo esc_attr($trans_sticky_header_link_color); ?>;
}
<?php } if($trans_sticky_header_link_hover_color) { ?>
.no-class {}
.is-sticky .hanor-header .hanor-navigation > ul > li > a:hover,
.is-sticky .hanor-header .hanor-navigation > ul > li > a:focus,
.is-sticky .hanor-header .hanor-navigation > ul > li > a:hover,
.is-sticky .hanor-header .hanor-navigation > ul > li > a:focus,
.is-sticky .header-links-wrap a:hover,
.is-sticky .header-links-wrap a:focus,
.is-sticky .hanor-header a.login-link:hover,
.is-sticky .hanor-header a.login-link:focus,
.is-sticky .hanor-header .hanor-navigation .current-menu-ancestor > a,
.is-sticky .hanor-header .hanor-navigation .current-menu-parent > a,
.is-sticky .hanor-header .hanor-navigation > ul > li:hover > a,
.is-sticky .hanor-header-right .hanor-navigation > ul > li.current-menu-parent > a {
  color: <?php echo esc_attr($trans_sticky_header_link_hover_color); ?>;
}
.hanor-header .is-sticky .hanor-toggle-link:hover .toggle-separator,
.hanor-header .is-sticky .hanor-toggle-link:hover .toggle-separator:before,
.hanor-header .is-sticky .hanor-toggle-link:hover .toggle-separator:after,
.hanor-header .is-sticky .menu-separator {
  background: <?php echo esc_attr($trans_sticky_header_link_hover_color); ?>;
}
<?php }
// Sub-menu Colors
$submenu_bg_color  = cs_get_customize_option( 'submenu_bg_color' );
$submenu_bg_hover_color  = cs_get_customize_option( 'submenu_bg_hover_color' );
$submenu_border_color  = cs_get_customize_option( 'submenu_border_color' );
$submenu_link_color  = cs_get_customize_option( 'submenu_link_color' );
$submenu_link_hover_color  = cs_get_customize_option( 'submenu_link_hover_color' );
if($submenu_bg_color) { ?>
.no-class {}
.hanor-header .dropdown-nav, .sidebar-nav-wrap .dropdown-nav {
  background-color: <?php echo esc_attr($submenu_bg_color); ?>;
}
<?php } if($submenu_link_color) { ?>
.no-class {}
.hanor-header .dropdown-nav > li > a,
.hanor-header-three.hanor-main-wrap .sidebar-nav-wrap .hanor-navigation .dropdown-nav > li > a {
  color: <?php echo esc_attr($submenu_link_color); ?>;
}
<?php } if($submenu_border_color) { ?>
.no-class {}
.hanor-header .dropdown-nav > li > a,
.hanor-header-three.hanor-main-wrap .sidebar-nav-wrap .hanor-navigation .dropdown-nav > li > a {
  border-color: <?php echo esc_attr($submenu_border_color); ?>;
}
<?php } if($submenu_bg_hover_color) { ?>
.no-class {}
.hanor-header .dropdown-nav > li > a:focus,
.hanor-header .dropdown-nav > li > a:hover,
.hanor-header .dropdown-nav > .active > a,
.hanor-header .dropdown-nav > .active > a:focus,
.hanor-header .dropdown-nav > .active > a:hover,
.hanor-header .dropdown-nav > li:hover > a, .hanor-header .dropdown-nav > li.active > a,
.hanor-header .hanor-navigation .dropdown-nav .current-menu-ancestor > a,
.hanor-header .hanor-navigation .dropdown-nav .current-menu-parent > a,
.hanor-header-three.hanor-main-wrap .sidebar-nav-wrap .hanor-navigation .dropdown-nav > li > a:hover,
.hanor-header-three.hanor-main-wrap .sidebar-nav-wrap .hanor-navigation .dropdown-nav > li > a:focus,
.hanor-header-three.hanor-main-wrap .sidebar-nav-wrap .hanor-navigation ul.dropdown-nav li.current-menu-item > a {
  background-color: <?php echo esc_attr($submenu_bg_hover_color); ?>;
}
<?php } if($submenu_link_hover_color) { ?>
.no-class {}
.hanor-header .dropdown-nav > li > a:focus,
.hanor-header .dropdown-nav > li > a:hover,
.hanor-header .dropdown-nav > .active > a,
.hanor-header .dropdown-nav > .active > a:focus,
.hanor-header .dropdown-nav > .active > a:hover,
.hanor-header .dropdown-nav > li:hover > a, .hanor-header .dropdown-nav > li.active > a,
.hanor-header .hanor-navigation .dropdown-nav .current-menu-ancestor > a,
.hanor-header .hanor-navigation .dropdown-nav .current-menu-parent > a,
.hanor-header-three.hanor-main-wrap .sidebar-nav-wrap .hanor-navigation .dropdown-nav > li > a:hover,
.hanor-header-three.hanor-main-wrap .sidebar-nav-wrap .hanor-navigation .dropdown-nav > li > a:focus,
.hanor-header-three.hanor-main-wrap .sidebar-nav-wrap .hanor-navigation ul.dropdown-nav li.current-menu-item > a {
  color: <?php echo esc_attr($submenu_link_hover_color); ?>;
}
<?php }

/* Header Button Colors */
$button_bg_color = cs_get_customize_option('button_bg_color');
$button_text_color = cs_get_customize_option('button_text_color');
$button_border_color = cs_get_customize_option('button_border_color');
$button_bg_hover_color = cs_get_customize_option('button_bg_hover_color');
$button_text_hover_color = cs_get_customize_option('button_text_hover_color');
$button_border_hover_color = cs_get_customize_option('button_border_hover_color');
if($button_bg_color) { ?>
.no-class {}
.header-buttons .hanor-btn {}
.header-buttons .hanor-btn {
  background-color: <?php echo esc_attr($button_bg_color); ?>;
}
<?php } if($button_text_color) { ?>
.no-class {}
.header-buttons .hanor-btn {
  color: <?php echo esc_attr($button_text_color); ?>;
}
<?php } if($button_border_color) { ?>
.no-class {}
.header-buttons .hanor-btn {
  border-color: <?php echo esc_attr($button_border_color); ?>;
}
<?php } if($button_bg_hover_color) { ?>
.no-class {}
.header-buttons .hanor-btn:hover,
.header-hanor-style-three.header-hanor-style-five .menu-wraper .header-buttons .hanor-btn:hover {
  background-color: <?php echo esc_attr($button_bg_hover_color); ?>;
}
<?php } if($button_text_hover_color) { ?>
.no-class {}
.header-buttons .hanor-btn:hover,
.header-hanor-style-three.header-hanor-style-five .menu-wraper .header-buttons .hanor-btn:hover {
  color: <?php echo esc_attr($button_text_hover_color); ?>;
}
<?php } if($button_border_hover_color) { ?>
.no-class {}
.header-buttons .hanor-btn:hover {
  border-color: <?php echo esc_attr($button_border_hover_color); ?>;
}
<?php } 
/* Sidebar Menu - Customizer */
$sidebar_bg_color  = cs_get_customize_option( 'sidebar_bg_color' );
$sidebar_text_color  = cs_get_customize_option( 'sidebar_text_color' );
$sidebar_link_color  = cs_get_customize_option( 'sidebar_link_color' );
$sidebar_link_hover_color  = cs_get_customize_option( 'sidebar_link_hover_color' );
$sidebar_menu_border_color  = cs_get_customize_option( 'sidebar_menu_border_color' );
$sidebar_submenu_link_color  = cs_get_customize_option( 'sidebar_submenu_link_color' );
$sidebar_submenu_link_hover_color  = cs_get_customize_option( 'sidebar_submenu_link_hover_color' );
$sidebar_submenu_bg_color = cs_get_customize_option('sidebar_submenu_bg_color');
$sidebar_submenu_border_color = cs_get_customize_option('sidebar_submenu_border_color');
if ($sidebar_bg_color) { ?>
.no-class {}
.hanor-navi-wrap {
  background-color: <?php echo esc_attr($sidebar_bg_color); ?>;
}
<?php } if($sidebar_text_color) { ?>
.no-class {}
.hanor-navi-wrap,
.hanor-navi-wrap p,
.hanor-main-wrap .sidebar-nav-wrap .hanor-navi-wrap ul.address-info li {
  color: <?php echo esc_attr($sidebar_text_color); ?>;
}
<?php } if($sidebar_link_color) { ?>
.no-class {}
.sidebar-nav-wrap .hanor-navigation > ul > li > a,
.sidebar-nav-wrap a,
.sidebar-nav-wrap .hanor-social a,
.hanor-main-wrap .sidebar-nav-wrap .hanor-navigation > ul > li > a,
.hanor-main-wrap .sidebar-nav-wrap ul.address-info li a {
  color: <?php echo esc_attr($sidebar_link_color); ?>;
}
<?php } if($sidebar_link_hover_color) { ?>
.no-class {}
.sidebar-nav-wrap .hanor-navigation > ul > li > a:hover,
.sidebar-nav-wrap a:hover,
.sidebar-nav-wrap .hanor-navigation > ul > li.current-menu-ancestor > a,
.sidebar-nav-wrap .hanor-navigation > ul > li.current-menu-parent > a,
.sidebar-nav-wrap .hanor-social a:hover,
.sidebar-nav-wrap .hanor-social a:focus,
.hanor-main-wrap .sidebar-nav-wrap .hanor-navigation > ul > li > a:hover,
.hanor-main-wrap .sidebar-nav-wrap .hanor-navigation > ul > li > a:focus,
.hanor-main-wrap .sidebar-nav-wrap ul.address-info li a:hover,
.hanor-main-wrap .sidebar-nav-wrap ul.address-info li a:focus {
  color: <?php echo esc_attr($sidebar_link_hover_color); ?>;
}
<?php } if($sidebar_menu_border_color) { ?>
.no-class {}
.sidebar-nav-wrap .hanor-navigation > ul > li > a,
.hanor-main-wrap .sidebar-nav-wrap .hanor-navigation > ul > li > a,
.sidebar-nav-wrap .hanor-navi-wrap .dropdown-nav > li > a {
  border-color: <?php echo esc_attr($sidebar_menu_border_color); ?>;
}
<?php } if($sidebar_submenu_link_color) { ?>
.no-class {}
.sidebar-nav-wrap .dropdown-nav > li > a,
.hanor-main-wrap .sidebar-nav-wrap .hanor-navigation ul li li a {
  color: <?php echo esc_attr($sidebar_submenu_link_color); ?>;
}
<?php } if($sidebar_submenu_link_hover_color) { ?>
.no-class {}
.sidebar-nav-wrap .dropdown-nav > li > a:hover,
.sidebar-nav-wrap .dropdown-nav > li.active > a,
.hanor-main-wrap .sidebar-nav-wrap .dropdown-nav > li.active > a,
.hanor-main-wrap .sidebar-nav-wrap .hanor-navigation ul li li a:hover,
.hanor-main-wrap .sidebar-nav-wrap .hanor-navigation ul li li a:focus {
  color: <?php echo esc_attr($sidebar_submenu_link_hover_color); ?>;
}
<?php } if($sidebar_submenu_bg_color){ ?>
.no-class {}
.hanor-navi-wrap ul.dropdown-nav {
  background: <?php echo esc_attr($sidebar_submenu_bg_color); ?>;
}
<?php } if($sidebar_submenu_border_color){ ?>
.no-class {}
.sidebar-nav-wrap .hanor-navi-wrap .dropdown-nav > li > a {
  border-color: <?php echo esc_attr($sidebar_submenu_border_color); ?>;
}
<?php }

/* Mobile Menu - Customizer */
$mobile_menu_toggle_color = cs_get_customize_option('mobile_menu_toggle_color');
$mobile_menu_bg_color  = cs_get_customize_option( 'mobile_menu_bg_color' );
$mobile_menu_bg_hover_color  = cs_get_customize_option( 'mobile_menu_bg_hover_color' );
$mobile_menu_link_color  = cs_get_customize_option( 'mobile_menu_link_color' );
$mobile_menu_link_hover_color  = cs_get_customize_option( 'mobile_menu_link_hover_color' );
$mobile_menu_border_color  = cs_get_customize_option( 'mobile_menu_border_color' );
$mobile_menu_expand_color  = cs_get_customize_option( 'mobile_menu_expand_color' );
$mobile_menu_expand_hover_color  = cs_get_customize_option( 'mobile_menu_expand_hover_color' );
$mobile_menu_expand_bg_color  = cs_get_customize_option( 'mobile_menu_expand_bg_color' );
$mobile_menu_expand_bg_hover_color  = cs_get_customize_option( 'mobile_menu_expand_bg_hover_color' );
if($mobile_menu_toggle_color){ ?>
.no-class {}
.mean-container a.meanmenu-reveal span,
.mean-container a.meanmenu-reveal span:before,
.mean-container a.meanmenu-reveal span:after,
.hanor-transparent-header .mean-container a.meanmenu-reveal span:before,
.hanor-transparent-header .mean-container a.meanmenu-reveal span:after,
.hanor-transparent-header .mean-container a.meanmenu-reveal span,
.mean-container a.meanmenu-reveal.meanclose span:before {
  background: <?php echo esc_attr($mobile_menu_toggle_color); ?>;
}
<?php }
if ($mobile_menu_bg_color) { ?>
.no-class {}
.mean-container .mean-nav {
  background-color: <?php echo esc_attr($mobile_menu_bg_color); ?>;
}
<?php } if($mobile_menu_bg_hover_color) { ?>
.no-class {}
.hanor-header .mean-container .dropdown-nav > li:hover > a,
.hanor-header .mean-container .dropdown-nav > li:focus > a,
.mean-container .mean-nav ul li:hover > a,
.mean-container .mean-nav ul li:focus > a {
  background-color: <?php echo esc_attr($mobile_menu_bg_hover_color); ?>;
}
<?php } if($mobile_menu_link_color) { ?>
.no-class {}
.mean-container .mean-nav ul li a {
  color: <?php echo esc_attr($mobile_menu_link_color); ?>;
}
<?php } if($mobile_menu_link_hover_color) { ?>
.no-class {}
.mean-container .mean-nav ul li a:hover,
.mean-container .mean-nav ul li a:focus,
.hanor-header .mean-container .dropdown-nav > li.active > a,
.mean-container ul li.current-menu-ancestor > a {
  color: <?php echo esc_attr($mobile_menu_link_hover_color); ?>;
}
<?php } if($mobile_menu_border_color) { ?>
.no-class {}
.mean-container .mean-nav ul li li a, .mean-container .mean-nav ul li a {
  border-color: <?php echo esc_attr($mobile_menu_border_color); ?>;
}
<?php } if($mobile_menu_expand_color) { ?>
.no-class {}
.mean-container .mean-nav ul li a.mean-expand {
  color: <?php echo esc_attr($mobile_menu_expand_color); ?>;
}
<?php } if($mobile_menu_expand_hover_color) { ?>
.no-class {}
.mean-container .mean-nav ul li a.mean-expand:hover,
.mean-container .mean-nav ul li a.mean-expand:focus,
.mean-container .mean-nav ul li:hover > a.mean-expand,
.mean-container .mean-nav ul li:focus > a.mean-expand,
.hanor-header .mean-container .dropdown-nav > li:hover > a.mean-expand,
.hanor-header .mean-container .dropdown-nav > li:focus > a.mean-expand {
  color: <?php echo esc_attr($mobile_menu_expand_hover_color); ?>;
}
<?php } if($mobile_menu_expand_bg_color) { ?>
.no-class {}
.mean-container .mean-nav ul li a.mean-expand {
  background-color: <?php echo esc_attr($mobile_menu_expand_bg_color); ?>;
}
<?php } if($mobile_menu_expand_bg_hover_color) { ?>
.no-class {}
.mean-container .mean-nav ul li a.mean-expand:hover,
.mean-container .mean-nav ul li a.mean-expand:focus,
.mean-container .mean-nav ul li:hover > a.mean-expand,
.mean-container .mean-nav ul li:focus > a.mean-expand,
.hanor-header .mean-container .dropdown-nav > li:hover > a.mean-expand,
.hanor-header .mean-container .dropdown-nav > li:focus > a.mean-expand {
  background-color: <?php echo esc_attr($mobile_menu_expand_bg_hover_color); ?>;
}
<?php }
/* Title Area - Theme Options - Background */
$titlebar_bg = cs_get_option('titlebar_bg');
$title_heading_color  = cs_get_customize_option( 'titlebar_title_color' );
$title_sub_heading_color  = cs_get_customize_option( 'titlebar_sub_title_color' );
if ($titlebar_bg) {

  $title_area = ( ! empty( $titlebar_bg['image'] ) ) ? 'background-image: url('. $titlebar_bg['image'] .');' : '';
  $title_area .= ( ! empty( $titlebar_bg['repeat'] ) ) ? 'background-repeat: '. $titlebar_bg['repeat'] .';' : '';
  $title_area .= ( ! empty( $titlebar_bg['position'] ) ) ? 'background-position: '. $titlebar_bg['position'] .';' : '';
  $title_area .= ( ! empty( $titlebar_bg['attachment'] ) ) ? 'background-attachment: '. $titlebar_bg['attachment'] .';' : '';
  $title_area .= ( ! empty( $titlebar_bg['size'] ) ) ? 'background-size: '. $titlebar_bg['size'] .';' : '';
  $title_area .= ( ! empty( $titlebar_bg['color'] ) ) ? 'background-color: '. $titlebar_bg['color'] .';' : ''; ?>
  .hanor-page-title {
    <?php echo esc_attr($title_area); ?>
  }
<?php } if($title_heading_color) { ?>
.no-class {}
.hanor-page-title .page-title {
  color: <?php echo esc_attr($title_heading_color); ?>;
}
<?php } if ($title_sub_heading_color) { ?>
.no-class {}
.hanor-page-title .page-sub-title {
  color: <?php echo esc_attr($title_sub_heading_color); ?>;
}
<?php }
// Breadcrumb Colors
$breadcrumb_text_color = cs_get_customize_option('breadcrumb_text_color');
$breadcrumb_link_color = cs_get_customize_option('breadcrumb_link_color');
$breadcrumb_link_hover_color = cs_get_customize_option('breadcrumb_link_hover_color');
$breadcrumb_bg_color = cs_get_customize_option('breadcrumb_bg_color');
if ($breadcrumb_text_color) { ?>
.no-class {}
.hanor-breadcrumbs ul,
.hanor-breadcrumbs.breadcrumb-two ul {
  color: <?php echo esc_attr($breadcrumb_text_color); ?>;
}
<?php } if($breadcrumb_link_color) { ?>
.no-class {}
.hanor-breadcrumbs a, .hanor-breadcrumbs.breadcrumb-two a {
  color: <?php echo esc_attr($breadcrumb_link_color); ?>;
}
<?php } if($breadcrumb_link_hover_color) { ?>
.no-class {}
.hanor-breadcrumbs a:hover, .hanor-breadcrumbs a:focus,
.hanor-breadcrumbs.breadcrumb-two a:hover, .hanor-breadcrumbs.breadcrumb-two a:focus {
  color: <?php echo esc_attr($breadcrumb_link_hover_color); ?>;
}
<?php } if($breadcrumb_bg_color) { ?>
.no-class {}
.breadcrumb-style-two {
  background: <?php echo esc_attr($breadcrumb_bg_color); ?>;
}
<?php }
/* Footer */
$footer_bg_color  = cs_get_customize_option( 'footer_bg_color' );
$footer_heading_color  = cs_get_customize_option( 'footer_heading_color' );
$footer_text_color  = cs_get_customize_option( 'footer_text_color' );
$footer_link_color  = cs_get_customize_option( 'footer_link_color' );
$footer_link_hover_color  = cs_get_customize_option( 'footer_link_hover_color' );
if ($footer_bg_color) { ?>
.no-class {}
footer.hanor-footer.footer-dark-version {
  background: <?php echo esc_attr($footer_bg_color); ?>;
}
<?php } if ($footer_heading_color) { ?>
.no-class {}
.footer-widget h4, .hanor-footer h1, .hanor-footer h2, .hanor-footer h3, .hanor-footer h4,
.footer-widget-title {
  color: <?php echo esc_attr($footer_heading_color); ?>;
}
<?php } if ($footer_text_color) { ?>
.no-class {}
footer.footer-dark-version .footer-widget-area,
footer.footer-dark-version .hanor-widget p,
footer.footer-dark-version .hanor-widget p span,
footer.footer-dark-version .hanor-widget span,
footer.footer-dark-version .hanor-widget ul li,
footer.footer-dark-version .footer-widget-area,
footer.footer-dark-version .hanor-widget p,
footer.footer-dark-version .hanor-recent-blog .widget-bdate,
.hanor-footer-wrap,
footer.footer-dark-version .woocommerce ul.cart_list .woocommerce-Price-amount,
footer.footer-dark-version .woocommerce ul.product_list_widget .woocommerce-Price-amount,
footer.footer-dark-version table td,
footer.footer-dark-version caption, footer.footer-dark-version .hanor-widget.woocommerce.widget_products span.woocommerce-Price-amount.amount, .hanor-footer .footer-item p,
footer.footer-dark-version .hanor-widget input[type="email"] {
  color: <?php echo esc_attr($footer_text_color); ?>;
}
<?php } if ($footer_link_color) { ?>
.no-class {}
footer.footer-dark-version a,
footer.hanor-footer.footer-dark-version .footer-widget .hanor-widget ul li a,
footer.footer-dark-version .hanor-widget a span,
footer.footer-dark-version .widget_list_style ul a,
footer.footer-dark-version .widget_categories ul a,
footer.footer-dark-version .widget_archive ul a,
footer.footer-dark-version .widget_archive ul li,
footer.footer-dark-version .widget_recent_comments ul a,
footer.footer-dark-version .widget_recent_entries ul a,
footer.footer-dark-version .widget_meta ul a,
footer.footer-dark-version .widget_pages ul a,
footer.footer-dark-version .widget_rss ul a,
footer.footer-dark-version .widget_nav_menu ul a,
footer.footer-dark-version .hanor-recent-blog .widget-btitle,
footer.footer-dark-version .hanor-widget.woocommerce.widget_shopping_cart a,
footer.footer-dark-version table td a,
.hanor-footer ul li a, .hanor-footer .footer-item a,
footer.footer-dark-version .footer-widget .hanor-widget ul li a {
  color: <?php echo esc_attr($footer_link_color); ?>;
}
<?php } if ($footer_link_hover_color) { ?>
.no-class {}
footer.footer-dark-version a:hover,
footer.hanor-footer.footer-dark-version .footer-widget .hanor-widget ul li a:hover,
footer.footer-dark-version .hanor-widget a:hover span,
footer.footer-dark-version .widget_list_style ul a:hover,
footer.footer-dark-version .widget_categories ul a:hover,
footer.footer-dark-version .widget_archive ul a:hover,
footer.footer-dark-version .widget_archive ul li,
footer.footer-dark-version .widget_recent_comments ul a:hover,
footer.footer-dark-version .widget_recent_entries ul a:hover,
footer.footer-dark-version .widget_meta ul a:hover,
footer.footer-dark-version .widget_pages ul a:hover,
footer.footer-dark-version .widget_rss ul a:hover,
footer.footer-dark-version .widget_nav_menu ul a:hover,
footer.footer-dark-version .frxo-recent-blog .widget-btitle:hover,
footer.footer-dark-version .frxo-widget.woocommerce.widget_shopping_cart a:hover,
footer.footer-dark-version table td a:hover,
.frxo-footer ul li a:hover,
footer.footer-dark-version .woocommerce ul.product_list_widget li a:hover,
.frxo-footer .footer-item a:hover,
footer.footer-dark-version .footer-widget .hanor-widget ul li a:hover {
  color: <?php echo esc_attr($footer_link_hover_color); ?>;
}
<?php } 
// Light Footer Colors
  $light_footer_bg_color  = cs_get_customize_option( 'light_footer_bg_color' );
  $light_footer_heading_color  = cs_get_customize_option( 'light_footer_heading_color' );
  $light_footer_text_color  = cs_get_customize_option( 'light_footer_text_color' );
  $light_footer_link_color  = cs_get_customize_option( 'light_footer_link_color' );
  $light_footer_link_hover_color  = cs_get_customize_option( 'light_footer_link_hover_color' );

if ($light_footer_bg_color) { ?>
.no-class {}
footer.hanor-footer.footer-light-version {
  background: <?php echo esc_attr($light_footer_bg_color); ?>;
}
<?php } if ($light_footer_heading_color) { ?>
.no-class {}
.footer-light-version .footer-widget h4, .hanor-footer.footer-light-version h1, .hanor-footer.footer-light-version h2, .hanor-footer.footer-light-version h3, .hanor-footer.footer-light-version h4, .footer-light-version .footer-widget-title,
.hanor-footer.footer-light-version .footer-widget-title {
  color: <?php echo esc_attr($light_footer_heading_color); ?>;
}
<?php } if ($light_footer_text_color) { ?>
.no-class {}
footer.footer-light-version .footer-widget-area,
footer.footer-light-version .hanor-widget p,
footer.footer-light-version .hanor-widget p span,
footer.footer-light-version .hanor-widget span,
footer.footer-light-version .hanor-widget ul li,
footer.footer-light-version .footer-widget-area,
footer.footer-light-version .hanor-widget p,
footer.footer-light-version .hanor-recent-blog .widget-bdate,
.hanor-footer-wrap,
footer.footer-light-version .woocommerce ul.cart_list .woocommerce-Price-amount,
footer.footer-light-version .woocommerce ul.product_list_widget .woocommerce-Price-amount,
footer.footer-light-version table td,
footer.footer-light-version caption, footer.footer-light-version .hanor-widget.woocommerce.widget_products span.woocommerce-Price-amount.amount, .hanor-footer .footer-item p,
footer.footer-light-version .hanor-widget input[type="email"],
footer.footer-light-version .hanor-widget input[type="text"] {
  color: <?php echo esc_attr($light_footer_text_color); ?>;
}
<?php } if ($light_footer_link_color) { ?>
.no-class {}
footer.footer-light-version a,
footer.footer-light-version .hanor-widget a span,
footer.footer-light-version .widget_list_style ul a,
footer.footer-light-version .widget_categories ul a,
footer.footer-light-version .widget_archive ul a,
footer.footer-light-version .widget_archive ul li,
footer.footer-light-version .widget_recent_comments ul a,
footer.footer-light-version .widget_recent_entries ul a,
footer.footer-light-version .widget_meta ul a,
footer.footer-light-version .widget_pages ul a,
footer.footer-light-version .widget_rss ul a,
footer.footer-light-version .widget_nav_menu ul a,
footer.footer-light-version .hanor-recent-blog .widget-btitle,
footer.footer-light-version .hanor-widget.woocommerce.widget_shopping_cart a,
footer.footer-light-version table td a,
.hanor-footer ul li a, .hanor-footer .footer-item a,
footer.footer-light-version .footer-widget .hanor-widget ul li a,
.hanor-footer.footer-light-version .footer-widget .hanor-widget ul li a {
  color: <?php echo esc_attr($light_footer_link_color); ?>;
}
<?php } if ($light_footer_link_hover_color) { ?>
.no-class {}
footer.footer-light-version a:hover,
footer.footer-light-version .hanor-widget a:hover span,
footer.footer-light-version .widget_list_style ul a:hover,
footer.footer-light-version .widget_categories ul a:hover,
footer.footer-light-version .widget_archive ul a:hover,
footer.footer-light-version .widget_archive ul li,
footer.footer-light-version .widget_recent_comments ul a:hover,
footer.footer-light-version .widget_recent_entries ul a:hover,
footer.footer-light-version .widget_meta ul a:hover,
footer.footer-light-version .widget_pages ul a:hover,
footer.footer-light-version .widget_rss ul a:hover,
footer.footer-light-version .widget_nav_menu ul a:hover,
footer.footer-light-version .frxo-recent-blog .widget-btitle:hover,
footer.footer-light-version .frxo-widget.woocommerce.widget_shopping_cart a:hover,
footer.footer-light-version table td a:hover,
.frxo-footer ul li a:hover,
footer.footer-light-version .woocommerce ul.product_list_widget li a:hover,
.frxo-footer .footer-item a:hover,
footer.footer-light-version .footer-widget .hanor-widget ul li a:hover {
  color: <?php echo esc_attr($light_footer_link_hover_color); ?>;
}
<?php }
// Copyright Colors
$copyright_text_color  = cs_get_customize_option( 'copyright_text_color' );
$copyright_link_color  = cs_get_customize_option( 'copyright_link_color' );
$copyright_link_hover_color  = cs_get_customize_option( 'copyright_link_hover_color' );
$copyright_bg_color  = cs_get_customize_option( 'copyright_bg_color' );
$copyright_border_color  = cs_get_customize_option( 'copyright_border_color' );
if ($copyright_text_color) { ?>
.no-class {}
.hanor-copyright.footer-cpy-dark-version,
.hanor-footer .hanor-copyright.footer-cpy-dark-version .copyright-wrap p,
.hanor-footer .hanor-copyright.footer-cpy-dark-version .copyright-links li:after {
  color: <?php echo esc_attr($copyright_text_color); ?>;
}
<?php } if ($copyright_link_color) { ?>
.no-class {}
.hanor-copyright.footer-cpy-dark-version a,
.hanor-footer .hanor-copyright.footer-cpy-dark-version .copyright-wrap a {
  color: <?php echo esc_attr($copyright_link_color); ?>;
}
<?php } if ($copyright_link_hover_color) { ?>
.no-class {}
.hanor-copyright.footer-cpy-dark-version a:hover,
.hanor-copyright.footer-cpy-dark-version a:focus,
.hanor-footer .hanor-copyright.footer-cpy-dark-version .copyright-wrap a:hover,
.hanor-footer .hanor-copyright.footer-cpy-dark-version .copyright-wrap a:focus {
  color: <?php echo esc_attr($copyright_link_hover_color); ?>;
}
<?php } if ($copyright_bg_color) { ?>
.no-class {}
.hanor-copyright.footer-cpy-dark-version {
  background-color: <?php echo esc_attr($copyright_bg_color); ?>;
}
<?php } if ($copyright_border_color) { ?>
.no-class {}
.hanor-copyright.footer-cpy-dark-version .container {
  border-color: <?php echo esc_attr($copyright_border_color); ?>;
}
<?php }
// Copyright Light Version
$light_copyright_text_color  = cs_get_customize_option( 'light_copyright_text_color' );
$light_copyright_link_color  = cs_get_customize_option( 'light_copyright_link_color' );
$light_copyright_link_hover_color  = cs_get_customize_option( 'light_copyright_link_hover_color' );
$light_copyright_bg_color  = cs_get_customize_option( 'light_copyright_bg_color' );
$light_copyright_border_color  = cs_get_customize_option( 'light_copyright_border_color' );
if ($light_copyright_text_color) { ?>
.no-class {}
.hanor-copyright.footer-cpy-light-version,
.hanor-footer .hanor-copyright.footer-cpy-light-version .copyright-wrap p,
.hanor-footer .hanor-copyright.footer-cpy-light-version .copyright-links li:after {
  color: <?php echo esc_attr($light_copyright_text_color); ?>;
}
<?php } if ($light_copyright_link_color) { ?>
.no-class {}
.hanor-copyright.footer-cpy-light-version a,
.hanor-footer .hanor-copyright.footer-cpy-light-version .copyright-wrap a {
  color: <?php echo esc_attr($light_copyright_link_color); ?>;
}
<?php } if ($light_copyright_link_hover_color) { ?>
.no-class {}
.hanor-copyright.footer-cpy-light-version a:hover,
.hanor-copyright.footer-cpy-light-version a:focus,
.hanor-footer .hanor-copyright.footer-cpy-light-version .copyright-wrap a:hover,
.hanor-footer .hanor-copyright.footer-cpy-light-version .copyright-wrap a:focus {
  color: <?php echo esc_attr($light_copyright_link_hover_color); ?>;
}
<?php } if ($light_copyright_bg_color) { ?>
.no-class {}
.hanor-copyright.footer-cpy-light-version,
.hanor-footer.footer-light-version .hanor-copyright {
  background-color: <?php echo esc_attr($light_copyright_bg_color); ?>;
}
<?php } if ($light_copyright_border_color) { ?>
.no-class {}
.hanor-copyright.footer-cpy-light-version {
  border-color: <?php echo esc_attr($light_copyright_border_color); ?>;
}
<?php }
// Content Colors
$body_color  = cs_get_customize_option( 'body_color' ); 
if ($body_color) { ?>
.no-class {}
body, p, .hanor-content-area p, .hanor-content-side p, .hanor-primary p, .blog-meta,
.blog-detail-wrap .blog-time, .hanor-primary blockquote, ul.bullet-list,
.hanor-blog-detail .blog-meta .pull-left, .author-content, .hanor-primary form label,
.hanor-testimonials .owl-carousel p, .hanor-primary input[type="email"],
.hanor-primary input[type="text"], .hanor-primary input[type="password"],
.portfolio-detail p, .portfolio-subtitle,
.portfolio-detail-title, .portfolio-detail-wrap .portfolio-categories, .portfolio-detail-item,
.subtitle-item-title, .full-width .hanor-link, .job-location, .contact-info p span, textarea,
.woocommerce .woocommerce-result-count, .woocommerce-page .woocommerce-result-count,
.woocommerce div.product p.price ins, .woocommerce div.product span.price ins,
.product_meta, .woocommerce .quantity .qty, .woocommerce #reviews #comments ol.commentlist li .comment-text p.meta strong,
.woocommerce #reviews #comments ol.commentlist li time, .woocommerce table.shop_table th, .woocommerce table td,
.woocommerce table.shop_table .cart-subtotal, .woocommerce table.shop_table .order-total,
.woocommerce .cart_totals table.shop_table th, .woocommerce .nice-select,
.woocommerce-error, .woocommerce-info, .woocommerce-message,
.select2-container--default .select2-selection--single .select2-selection__rendered,
.woocommerce ul.order_details li, .woocommerce .woocommerce-customer-details address,
.woocommerce-MyAccount-content strong, .woocommerce-MyAccount-content p,
.woocommerce-edit-address address, .introduction-info p, .about-info p, .service-info p,
.hanor-testimonial p, .blog-wrap-item .blog-info p,.blog-post, .bullet-list li,
.woocommerce-page .woocommerce-ordering .nice-select, .woocommerce div.product p.price,
.woocommerce .quantity .qty, .woocommerce .quantity input.qty, .woocommerce-page .quantity input.qty,
.entry-content .comment-form label, .woocommerce table.shop_table td.product-price,
.woocommerce table.shop_table td .quantity .qty, input[type="text"],
.woocommerce-cart .cart-subtotal span.woocommerce-Price-amount.amount, .woocommerce-cart .cart_totals tr.shipping td,
form label, input[type="tel"], input[type="email"],
.woocommerce .woocommerce-checkout-review-order table.shop_table td.product-name a, .woocommerce .woocommerce-checkout-review-order table.shop_table td.product-total .amount, .portfolio-detail-wrap ul li, span.zilla-likes-postfix,
.item-list-subtitle, .portfolio-detail-wrap p,
ul.hanor-list-icon li, .hanor-signup .hanor-section-title p, .blogs-style-two .blog-meta,
.progress-title, .hanor-team .testimonial-author .mate-designation, .plan-info ul,
.hanor-subscribe .hanor-section-title p, .panel-title a.collapsed, .banner-style-two .caption-wrap-inner p,
.stories-style-two .story-date, .story-date, .hanor-feature .featured-title,
.hanor-team.team-style-four .style-four-width .mate-info,
.hanor-team.team-style-four .mate-info h5, .hanor-feature.featured-style-two .feature-content,
.twittDetails, ul.bxslider li .twitTime, #slick-pager span.time,
.hanor-team.team-style-five.team-round-image .style-five-width .mate-info, .mate-designation,
.hanor-outcome-services.tab-style-five.tab-dark-version .nav-tabs > li p,
.hanor-team-intro .member-details p, .hanor-team-intro .address-info li, blockquote p,.hanor-simple-list .list-tile,
.hanor-testimonials.testimonials-thumb-style .flex-direction-nav li a:before, .hanor-testimonials.testimonials-thumb-style .testimonial-author-name span.work-since, .testimonial-author-position, .timeline-info span,
.hanor-stats, .stats-title, .address-info.info-style-two i, .hanor-insights h5.subtitle,
.toggle-insights-info .insights-meta, .hanor-rating, .my-designation, .services-style-four .service-info p,
.white-c .process-item p, .white-c .process-item h4, .white-c .process-item .hanor-icon i,
.job-apply-form .upload-file, .job-apply-form .terms-condition span.term-text,
.masonry-filters ul li:after, .hanor-comments-area .hanor-comments-meta .comments-date,
.product_meta .posted_in, .product_meta .tagged_as, .woocommerce p.stars a,
.woocommerce div.product .entry-summary p.price, .woocommerce div.product .entry-summary span.price,
.woocommerce table.shop_table thead th, .woocommerce table.shop_table .cart_item td .amount, .woocommerce table.woocommerce-checkout-review-order-table tfoot td, .woocommerce .quantity .plus,
.woocommerce .quantity .minus, .woocommerce-page .quantity .plus, .woocommerce-page .quantity .minus,
.woocommerce-cart .cart-collaterals .cart_totals tr.order-total th,
.woocommerce-cart .cart-collaterals .cart_totals tr.order-total td, .order-total .woocommerce-Price-amount.amount,
.woocommerce form .form-row label, .woocommerce table.woocommerce-checkout-review-order-table .cart_item td,
.mate-info h5, .product_meta span.sku {
  color: <?php echo esc_attr($body_color); ?>;
}
.hanor-team-intro .hanor-social a {
  background-color: <?php echo esc_attr($body_color); ?>;
}
.hanor-team-intro .hanor-social a, .hanor-testimonials.testimonials-thumb-style .flex-direction-nav li a.flex-prev:before, .hanor-testimonials.testimonials-thumb-style .flex-direction-nav li a.flex-next:before, .woocommerce span.onsale  {
  border-color: <?php echo esc_attr($body_color); ?>;
}
<?php } 
$body_links_color  = cs_get_customize_option( 'body_links_color' );
if ($body_links_color) { ?>
.no-class {}
.hanor-primary a,
.hanor-content-side a,
a,
.hanor-mid-wrap div a,
.hanor-mid-wrap ul li a,
.hanor-mid-wrap span a, 
.hanor-mid-wrap p a,
.widget_list_style ul a,
.widget_categories ul a,
.widget_archive ul a,
.widget_recent_comments ul a,
.widget_recent_entries ul a,
.widget_meta ul a,
.widget_pages ul a,
.widget_rss ul a,
.widget_nav_menu ul a,
.widget_layered_nav ul a,
.widget_product_categories ul a,
.flex-control-paging li a.flex-active,
.hanor-blog-share .hanor-social.rounded a,
.nav-tabs > li > a,
.nav-tabs > li.active > a,
.panel-title a,
.hanor-navigation > ul > li > a,
.hanor-transparent-header .hanor-header-right .hanor-navigation > ul > li > a,
.hanor-fullscreen-navigation .dropdown-nav > li > a,
.sidebar-nav-wrap .dropdown-nav > li > a,
.blogs-style-three .blog-item.hanor-hover .blog-info .hanor-link a,
.hanor-outcome-services.tab-style-three .nav-tabs > li > a,
.mate-info .hanor-social a,
.hanor-portfolio-four .work-item.hanor-item .port-icon i,
.hanor-portfolio-default .work-item .work-info .port-icon i,
.hanor-team .testimonial-author-quote .hanor-social a,
.stories-style-two .story-title a, .hanor-feature .featured-title a,
.hanor-team.team-style-four .mate-info .hanor-social a,
.owl-drag .owl-prev:before, .owl-drag .owl-next:before, ul.bxslider li .twittMeta a,
.hanor-team-intro .address-info li a, .hanor-insights h3.insights-title a,
.job-apply-form .terms-condition span > a, .hanor-portfolio .work-info a, .hanor-portfolio .work-info .work-category,
.woocommerce div.product .woocommerce-tabs ul.tabs li a, .product_meta .posted_in a, .product_meta .tagged_as a {
  color: <?php echo esc_attr($body_links_color); ?>;
}
.blogs-style-six .owl-drag .owl-prev:before, .blogs-style-six .owl-drag .owl-next:before{
  border-color: <?php echo esc_attr($body_links_color); ?>;
}
<?php }
$body_link_hover_color  = cs_get_customize_option( 'body_link_hover_color' );
if ($body_link_hover_color) { ?>
.no-class {}
.hanor-primary a:hover,
.hanor-content-side a:hover,
a:hover,
a:focus,
.hanor-link a:hover:after,
.close-btn a:hover,
.hanor-mid-wrap div a:hover,
.hanor-mid-wrap ul li a:hover,
.hanor-mid-wrap span a:hover, 
.hanor-mid-wrap p a:hover,
.hanor-mid-wrap div a:focus,
.hanor-mid-wrap ul li a:focus,
.hanor-mid-wrap span a:focus, 
.hanor-mid-wrap p a:focus,
.hanor-pagination ul li a:hover,
.hanor-pagination ul li a:focus,
.blogs-style-two .blog-item.hanor-hover .blog-info a,
.hanor-outcome-services.tab-style-three .nav-tabs > li > a:hover,
.hanor-outcome-services.tab-style-three .nav.nav-tabs > li.active a,
.hanor-outcome-services.tab-style-three .nav.nav-tabs > li:hover,
.mate-info .hanor-social a:hover,
.hanor-portfolio-four .work-item.hanor-item:hover .port-icon i,
.hanor-portfolio-default .work-item:hover .work-info .port-icon i,
.hanor-team .testimonial-author-quote .hanor-social a:hover,
.hanor-team .testimonial-author-quote .hanor-social a:focus,
.stories-style-two .story-title a:hover,
.stories-style-two .story-title a:focus,
.blogs-style-three .blog-item.hanor-hover .blog-meta,
.hanor-feature .featured-title a:hover,
.hanor-feature .featured-title a:focus,
.hanor-team.team-style-four .mate-info .hanor-social a:hover,
.hanor-team.team-style-four .mate-info .hanor-social a:focus,
.owl-drag .owl-prev:hover:before, .owl-drag .owl-next:hover:before, ul.bxslider li .twittMeta a:hover,
ul.bxslider li .twittMeta a:focus, .hanor-team-intro .address-info li a:hover,
.hanor-team-intro .address-info li a:focus, .hanor-insights h3.insights-title a:hover,
.hanor-insights h3.insights-title a:focus,
.blogs-style-six .blog-item.hanor-hover .blog-info a, .blogs-style-six .blog-item.hanor-hover .blog-meta-item,
.blog-item.hanor-hover .blog-info a, .blog-item.hanor-hover .blog-meta,
.job-apply-form .terms-condition span > a:hover, .job-apply-form .terms-condition span > a:focus,
.masonry-filters ul li a.active, .masonry-filters ul li a:hover,
.woocommerce div.product .woocommerce-tabs ul.tabs li a:hover,
.woocommerce div.product .woocommerce-tabs ul.tabs li a:focus,
.woocommerce div.product .woocommerce-tabs ul.tabs li.active,
.product_meta .posted_in a:hover, .product_meta .tagged_as a:hover,
.product_meta .posted_in a:focus, .product_meta .tagged_as a:focus {
  color: <?php echo esc_attr($body_link_hover_color); ?>;
}
.hanor-outcome-services.tab-style-three .nav-tabs > li.active > a:before,
.hanor-outcome-services.tab-style-three .nav-tabs > li.active > a:after{
  background-color: <?php echo esc_attr($body_link_hover_color); ?>;
}
<?php }
$sidebar_content_color  = cs_get_customize_option( 'sidebar_content_color' );
if ($sidebar_content_color) { ?>
.no-class {}
.hanor-secondary p, .hanor-secondary .hanor-widget,
.hanor-secondary .widget_rss .rssSummary,
.hanor-secondary .news-time, .hanor-secondary .recentcomments,
.hanor-secondary input[type="text"], .hanor-secondary .nice-select, .hanor-secondary caption,
.hanor-secondary table td, .hanor-secondary .hanor-widget input[type="search"],
.hanor-secondary .woocommerce ul.product_list_widget .woocommerce-Price-amount,
.woocommerce .widget_price_filter .price_label, .hanor-secondary.woocommerce.widget_products span.woocommerce-Price-amount.amount {
  color: <?php echo esc_attr($sidebar_content_color); ?>;
}
<?php }
$sidebar_links_color  = cs_get_customize_option( 'sidebar_links_color' );
if ($sidebar_links_color) { ?>
.no-class {}
.hanor-secondary a,
.hanor-mid-wrap .hanor-secondary a,
.hanor-secondary .hanor-widget ul li a, .woocommerce .widget_shopping_cart ul.cart_list li a {
  color: <?php echo esc_attr($sidebar_links_color); ?>;
}
<?php }
$sidebar_links_hover_color  = cs_get_customize_option( 'sidebar_links_hover_color' );
if ($sidebar_links_hover_color) { ?>
.no-class {}
.hanor-secondary a:hover,
.hanor-mid-wrap .hanor-secondary a:hover,
.hanor-mid-wrap .hanor-secondary a:focus,
.hanor-secondary .hanor-widget ul li a:hover,
.woocommerce .widget_shopping_cart ul.cart_list li a:hover {
  color: <?php echo esc_attr($sidebar_links_hover_color); ?>;
}
<?php }
$content_heading_color  = cs_get_customize_option( 'content_heading_color' );
if ($content_heading_color) { ?>
.no-class {}
.hanor-primary h1, .hanor-primary h2, .hanor-primary h3, .hanor-primary h4, .hanor-primary h5, .hanor-primary h6,
.portfolio-detail .portfolio-title, h2.section-title, h4.section-subtitle,.about-info h2 p,.section-title-wrap h2 p,
h5.member-designation,.woocommerce .related-product-title, .woocommerce .related.products h2, .woocommerce #reviews .comment-reply-title,
.woocommerce legend, .banner-caption-title p, .portfolio-detail-wrap-title, .service-title, .caption-wrap h2.cpation-title,
.skill-title, .difference-title, .experience-title, .hanor-callout.callout-style-three h2,
.hanor-features .feature-item .feature-content-section .feature-title, .hanor-chart h2.chart-title,
.hanor-chart h5, #slick-pager h3, .hanor-outcome-services.tab-style-five.tab-dark-version .large-title, .hanor-outcome-services.tab-style-five.tab-dark-version .nav.nav-tabs li .tab-title, .hanor-process-wedo.wedo-style-two .process-wedo-item h3,
.hanor-insights h3.insights-title, .hanor-team.team-style-five .style-five-width .mate-info,
.process-wedo-item, .hanor-callout.callout-style-two h2, .hanor-sitemap-wrap h2,
.woocommerce div.product .product_title {
  color: <?php echo esc_attr($content_heading_color); ?>;
}
<?php }
$sidebar_heading_color  = cs_get_customize_option( 'sidebar_heading_color' );
if ($sidebar_heading_color) { ?>
.no-class {}
.hanor-secondary h1, .hanor-secondary h2, .hanor-secondary h3, .hanor-secondary h4, .hanor-secondary h5, .hanor-secondary h6 {
  color: <?php echo esc_attr($sidebar_heading_color); ?>;
}
<?php }
// Maintenance Mode
$maintenance_mode_bg  = cs_get_option( 'maintenance_mode_bg' );
if ($maintenance_mode_bg) {
  $maintenance_css = ( ! empty( $maintenance_mode_bg['image'] ) ) ? 'background-image: url('. $maintenance_mode_bg['image'] .');' : '';
  $maintenance_css .= ( ! empty( $maintenance_mode_bg['repeat'] ) ) ? 'background-repeat: '. $maintenance_mode_bg['repeat'] .';' : '';
  $maintenance_css .= ( ! empty( $maintenance_mode_bg['position'] ) ) ? 'background-position: '. $maintenance_mode_bg['position'] .';' : '';
  $maintenance_css .= ( ! empty( $maintenance_mode_bg['attachment'] ) ) ? 'background-attachment: '. $maintenance_mode_bg['attachment'] .';' : '';
  $maintenance_css .= ( ! empty( $maintenance_mode_bg['size'] ) ) ? 'background-size: '. $maintenance_mode_bg['size'] .';' : '';
  $maintenance_css .= ( ! empty( $maintenance_mode_bg['color'] ) ) ? 'background-color: '. $maintenance_mode_bg['color'] .';' : ''; ?>
  .vt-maintenance-mode {
    <?php echo esc_attr($maintenance_css); ?>
  }
<?php } 
// Mobile Menu Breakpoint
$mobile_breakpoint = cs_get_option('mobile_breakpoint');
$breakpoint = $mobile_breakpoint ? $mobile_breakpoint : '1199'; ?>
@media (max-width: <?php echo esc_attr($breakpoint); ?>px) {
  .no-class {}
  .hanor-header .hanor-navigation {
    display: none!important;
  }
  .hanor-sidebar-toggle,
  .hanor-header-three .hanor-full-wrap .hanor-sidebar-toggle {
    display: none;
  }
  .hanor-center-header .hanor-toggle {
    display: none;
  }
  .hanor-toggle.active,
  .hanor-header-right .hanor-navigation {
    display: none !important;
  }
  .header-hanor-style-two .navi-toggle {
    display: none;
  }
  .header-five-menu-toggle {
    display: none;
  }
  .hanor-header-three .hanor-sidebar-nav {
    position: relative;
    width: 100%;
    height: auto;
    background: #ffffff;
    z-index: 3;
    top: 0;
  }
  .hanor-header-three .sidebar-nav-wrap {
    padding: 13px 35px;
  }
  .hanor-header-three .sidebar-nav-wrap .hanor-brand {
    text-align: left;
    padding: 7px 0 20px;
    float: left;
  }
  .hanor-header-three .mean-container .mean-bar {
    width: 95%;
    top: 0;
    left: 0;
    right: 0;
    margin: 0 auto;
  }
  .hanor-header-three .hanor-sidebar-nav nav.hanor-navigation {
    display: none !important;
  }
  .has-sidebarnav .hanor-main-wrap {
    margin-left: 0 !important;
  }
  .sidebarnav-open .hanor-sidebar-nav {
    -webkit-transform: translateX(0);
    -ms-transform: translateX(0);
    transform: translateX(0);
  }
  .sidebarnav-open .hanor-full-wrap, .sidebarnav-open .hanor-footer {
    -webkit-transform: translateX(300px);
    -ms-transform: translateX(300px);
    transform: translateX(300px);
  }
  .hanor-full-wrap .hanor-sidebar-toggle {
    display: block;
  }
  .has-sidebarnav .hanor-footer {
    width: 100%;
    left: 0;
  }
  .hanor-main-wrap.hanor-header-three, .has-sidebarnav .hanor-banner.slider-cnt-left .caption-wrap {
    width: 100%;
    margin-left: 0;
  }
  .hanor-navigation-wrap {
    display: none;
  }
  nav.sidebar-nav-wrap.sidebar-menu-two,
  .sidebar-nav-wrap .hanor-navigation {
    display: none !important;
  }
  .header-links-wrap {
    display: none;
  }
  .header-hanor-style-three.header-hanor-style-five .hanor-header .logo-wraper {
    padding-bottom: 0;
  }
  .header-hanor-style-three.header-hanor-style-five .menu-wraper {
    display: none;
  }
}
<?php
$havnor_vt_get_typography  = havnor_vt_get_typography();
echo $havnor_vt_get_typography;