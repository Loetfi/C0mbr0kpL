<?php
/* Topbar Shortcodes */

/* WPML */
function havnor_wpml_function($atts, $content = NULL) {
  extract(shortcode_atts(array(
    "custom_class" => '',
    "wpml_lang_type" => '',
    "wpml_lang_style" => '',
    "wpml_flag" => ''
  ), $atts));

  $output   = '';

  if ( havnor_is_wpml_activated() ) {
    global $sitepress;
    $sitepress_settings = $sitepress->get_settings();
    $icl_get_languages  = icl_get_languages();

    if ( ! empty( $icl_get_languages ) ) {
      // Horizontal View
      if($wpml_lang_style === 'horizontal') {
          $languages = icl_get_languages('skip_missing=0&orderby=code');

            if(!empty($languages)){
                echo '<div id="horizontal_language_list"><ul>';
                  foreach($languages as $l){
                    if($wpml_lang_type === 'translated_name') {
                      $lang_type = $l['translated_name'];
                    } elseif($wpml_lang_type === 'language_code') {
                      $lang_type = $l['language_code'];
                    }
                    else {
                      $lang_type = $l['native_name'];
                    }

                    echo '<li>';
                      if($l['country_flag_url']){
                          if(!$l['active']) echo '<a href="'.$l['url'].'">';
                            if (!$wpml_flag)  {
                              echo '<img src="'.$l['country_flag_url'].'" height="12" alt="'.$l['language_code'].'" width="18" />';
                            }
                          if(!$l['active']) echo '</a>';
                      }
                    if(!$l['active']) echo '<a href="'.$l['url'].'">';
                      echo icl_disp_language($lang_type);
                    if(!$l['active']) echo '</a>';
                        echo '</li>';
                  }
                echo '</ul></div>';
            }
      } elseif($wpml_lang_style === 'vertical') {
        // Vertical View
        $languages = icl_get_languages('skip_missing=0&orderby=code');
          if(!empty($languages)){
                echo '<div id="vertical_language_list"><ul>';
                  foreach($languages as $l){

                    if($wpml_lang_type === 'translated_name') {
                      $lang_type = $l['translated_name'];
                    } elseif($wpml_lang_type === 'language_code') {
                      $lang_type = $l['language_code'];
                    }
                    else {
                      $lang_type = $l['native_name'];
                    }

                    echo '<li>';
                    if($l['country_flag_url']){
                        if(!$l['active']) echo '<a href="'.$l['url'].'">';
                          if (!$wpml_flag)  {
                            echo '<img src="'.$l['country_flag_url'].'" height="12" alt="'.$l['language_code'].'" width="18" />';
                          }
                        if(!$l['active']) echo '</a>';
                    }
                    if(!$l['active']) echo '<a href="'.$l['url'].'">';
                      echo icl_disp_language($lang_type);
                    if(!$l['active']) echo '</a>';
                      echo '</li>';
                  }
                echo '</ul></div>';
          }
      } else {
      // Dropdown View
      $languages = icl_get_languages('skip_missing=0&orderby=code');
        $output .= '<div class="hanor-tr-element '. $custom_class .'"><div class="hanor-top-dropdown hanor-wpml-dropdown">';
          // current language
          $output .= '<a href="#" class="hanor-top-active">';
          foreach ( $languages as $current_lang ) {
            if($wpml_lang_type === 'translated_name') {
              $lang_type = $current_lang['translated_name'];
            } elseif($wpml_lang_type === 'language_code') {
              $lang_type = $current_lang['language_code'];
            }
            else {
              $lang_type = $current_lang['native_name'];
            }
            if ( $current_lang['active'] ) {
              if (!$wpml_flag)  {
                $output .= '<img src="'.$current_lang['country_flag_url'].'" height="12" alt="'.$current_lang['language_code'].'" width="18" />';
              }
                $output .= $lang_type;
                $output .= '<i class="fa fa-angle-down"></i>';
            }
          }
          $output .= '</a>';
          // list languages
          $output .= '<ul class="hanor-topdd-content">';
          foreach ( $languages as $language ) {
            if ( ! $language['active'] ) {
              if($wpml_lang_type === 'translated_name') {
                $lang_type = $language['translated_name'];
              } elseif($wpml_lang_type === 'language_code') {
                $lang_type = $language['language_code'];
              }
              else {
                $lang_type = $language['native_name'];
              }
              $output .= '<li>';
              $output .= '<a href="'. $language['url'] .'">';
              if (!$wpml_flag)  {
                $output .= '<img src="'.$language['country_flag_url'].'" height="12" alt="'.$language['language_code'].'" width="18" />';
              }
              $output .= $lang_type;
              $output .= '</a>';
              $output .= '</li>';
            }
            // print_r($language);
          }
        $output .= '</ul>';
        $output .= '</div>';
        $output .= '</div>';
      }
    }

  } else {
    $output .= '<p class="wpml-not-active">Please Activate WPML Plugin</p>';
  }
  return $output;

}
add_shortcode("havnor_wpml", "havnor_wpml_function");
/* Topbar Link */
function havnor_topbar_link_function($atts, $content = NULL) {
  extract(shortcode_atts(array(
    "link_icon" => '',
    "link_text" => '',
    "link" => '',
    "target_tab" => '',
    "text_color" => '',
    "text_size" => '',
    "text_hover_color" => '',
    "icon_color" => '',
    "icon_size" => '',
    "custom_class" => '',
  ), $atts));

  // Shortcode Style CSS
  $e_uniqid       = uniqid();
  $inline_style   = '';

  // Colors & Size
  if ( $text_color || $text_size) {
    $inline_style .= '.hanor-top-link-'. $e_uniqid .'.top-link a, .hanor-top-link-'. $e_uniqid .'.top-link span {';
    $inline_style .= ( $text_color ) ? 'color:'. $text_color .';' : '';
    $inline_style .= ( $text_size ) ? 'font-size:'. havnor_core_check_px($text_size) .';' : '';
    $inline_style .= '}';
  }
  if ( $icon_color || $icon_size) {
    $inline_style .= '.hanor-top-link-'. $e_uniqid .'.top-link i, .header-hanor-style-three .header-contents .hanor-top-link-'. $e_uniqid .'.top-link i {';
    $inline_style .= ( $icon_color ) ? 'color:'. $icon_color .';' : '';
    $inline_style .= ( $icon_size ) ? 'font-size:'. havnor_core_check_px($icon_size) .';' : '';
    $inline_style .= '}';
  }
  // add inline style
  add_inline_style( $inline_style );
  $styled_class  = ' hanor-top-link-'. $e_uniqid;

  // Atts
  $target_tab = $target_tab ? 'target="_blank"' : '';
  $arrow_icon = $link_icon ? ' <i class="'. $link_icon .'" aria-hidden="true"></i> ' : '';
  $link_main = $link ? '<a href="'. $link .'" '. $target_tab .' class="'. $custom_class .'">'. $arrow_icon . $link_text .'</a>' : '<span class="'. $custom_class .'">'. $arrow_icon . $link_text .'</span>';
  $result = '<span class="top-link '.$styled_class.'">'.$link_main.'</span>';
  return $result;
}
add_shortcode("havnor_topbar_link", "havnor_topbar_link_function");
/* Topbar Search */
function havnor_topbar_search_function($atts, $content = NULL) {
  extract(shortcode_atts(array(
    "link_icon" => '',
    "search_plshold" => '',
    "custom_class" => '',
  ), $atts));
  $result = '<div class="search-link '. $custom_class .'">
              <a href="javascript:void(0);"><i class="'. $link_icon .'" aria-hidden="true"></i></a>
              <div class="search-box">
                <form method="get" id="searchform" action="'.esc_url(home_url('/')).'" class="searchform" >
                  <p>
                    <input type="text" name="s" id="s" placeholder="'.$search_plshold.'" />
                    <input type="submit" id="searchsubmit" class="button-primary" value="&#xf002;" />
                  </p>
                </form>  
              </div>
            </div>';
  return $result;
}
add_shortcode("havnor_topbar_search", "havnor_topbar_search_function");

/* Topbar Separator */
function havnor_topbar_separator_function($atts, $content = NULL) {
  extract(shortcode_atts(array(
    "separator_color" => '',
    "right_space" => '',
    "left_space" => '',
    "custom_class" => '',
  ), $atts));

  // Shortcode Style CSS
  $e_uniqid       = uniqid();
  $inline_style   = '';

  // Colors & Size
  if ( $separator_color ) {
    $inline_style .= '.hanor-separator-'. $e_uniqid .'.shortcode-separator:after {';
    $inline_style .= ( $separator_color ) ? 'background:'. $separator_color .';' : '';
    $inline_style .= '}';
  }
  if ( $left_space || $right_space ) {
    $inline_style .= '.hanor-separator-'. $e_uniqid .'.shortcode-separator {';
    $inline_style .= ( $left_space ) ? 'margin-left:'. havnor_core_check_px($left_space) .';' : '';
    $inline_style .= ( $right_space ) ? 'margin-right:'. havnor_core_check_px($right_space) .';' : '';
    $inline_style .= '}';
  }
  // add inline style
  add_inline_style( $inline_style );
  $styled_class  = ' hanor-separator-'. $e_uniqid;
  $result = '<div class="shortcode-separator '. $custom_class .''.$styled_class.'"></div>';
  return $result;
}
add_shortcode("havnor_topbar_separator", "havnor_topbar_separator_function");

/* Address Infos */
function havnor_top_address_infos_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "custom_class" => '',
    'address_info_style'=>'',
    'info_title' =>'',
    "address_column" =>'',
    'info_title_color'=>'',
    'info_link_hover_color' => '',
    'info_title_size' =>'',
    'info_title_weight' => '',
    'info_content_size' => '',
    'info_content_weight' => '',
    'section_bg_color' =>'',
  ), $atts));

  // Shortcode Style CSS
  $e_uniqid       = uniqid();
  $inline_style   = '';

  // Colors & Size
  if ( $info_title_color || $info_title_size || $info_title_weight) {
    $inline_style .= '.hanor-address-info-'. $e_uniqid .'.address-info h3, .hanor-topbar .hanor-address-info-'. $e_uniqid .'.address-info .info-list a, footer.hanor-footer.footer-dark-version .footer-widget .hanor-widget .hanor-address-info-'. $e_uniqid .'.address-info .info-list a, .hanor-topbar .hanor-address-info-'. $e_uniqid .'.address-info, .hanor-topbar .hanor-address-info-'. $e_uniqid .'.address-info .info-list {';
    $inline_style .= ( $info_title_color ) ? 'color:'. $info_title_color .';' : '';
    $inline_style .= ( $info_title_size ) ? 'font-size:'. havnor_core_check_px($info_title_size) .';' : '';
    $inline_style .= ( $info_title_weight ) ? 'font-weight:'. $info_title_weight .';' : '';
    $inline_style .= '}';
  }
  if ( $info_link_hover_color ) {
    $inline_style .= '.hanor-topbar .hanor-address-info-'. $e_uniqid .'.address-info .info-list a:hover, .hanor-topbar .hanor-address-info-'. $e_uniqid .'.address-info .info-list a:focus, footer.hanor-footer.footer-dark-version .footer-widget .hanor-widget .hanor-address-info-'. $e_uniqid .'.address-info .info-list a:hover, footer.hanor-footer.footer-dark-version .footer-widget .hanor-widget .hanor-address-info-'. $e_uniqid .'.address-info .info-list a:focus {';
    $inline_style .= ( $info_link_hover_color ) ? 'color:'. $info_link_hover_color .';' : '';
    $inline_style .= '}';
  }
  if ( $info_content_size || $info_content_weight) {
    $inline_style .= '.hanor-address-info-'. $e_uniqid .'.address-info li {';
    $inline_style .= ( $info_content_size ) ? 'font-size:'. havnor_core_check_px($info_content_size) .';' : '';
    $inline_style .= ( $info_content_weight ) ? 'font-weight:'. $info_content_weight .';' : '';
    $inline_style .= '}';
  }
  if ( $section_bg_color ) {
    $inline_style .= '.hanor-address-info-'. $e_uniqid .'.address-info.info-style-two {';
    $inline_style .= ( $section_bg_color ) ? 'background-color:'. $section_bg_color .';' : '';
    $inline_style .= '}';
  }
  // add inline style
  add_inline_style( $inline_style );
  $styled_class  = ' hanor-address-info-'. $e_uniqid;

   if ($address_column === 'two_column') {
    $adrs_column = 'col-md-6';
   } else {
     $adrs_column = 'col-md-12';
   }
   $info_title = $info_title ? '<h3>'.$info_title.'</h3>' : '';
   // Address info style
    if ($address_info_style === 'style_two') {
    $adrs_info_style = 'info-style-two';
   } else {
     $adrs_info_style = '';
   }
   $result = '<ul class="address-info '.$adrs_column.' '. $custom_class . $adrs_info_style. $styled_class.'">'.$info_title.' '. do_shortcode($content) .'</ul>';
   return $result;
}
add_shortcode("havnor_top_address_infos", "havnor_top_address_infos_function");

/* Address Info */
function havnor_top_address_info_function($atts, $content = NULL) {
   extract(shortcode_atts(array(
      "address_icon" => '',
      "address_title" => '',
      "title_link" =>'',
      "address_link_text" => '',
      "address_text_link" => '',
      "target_tab" => ''
   ), $atts));

   $target_tab = ( $target_tab === '1' ) ? 'target="_blank"' : '';
   $class_icon = $address_icon ? ' hav-icon' : ' dhav-icon';
   $address_icon = ( isset( $address_icon ) ) ? '<i class="'. $address_icon .'"></i> ' : '';

   if (isset( $address_link_text ) && !$address_text_link ) {
      $address_link_text = $address_link_text;
   } elseif (isset( $address_link_text ) && isset( $address_text_link )) {
      $address_link_text = '<a href="'. $address_text_link .'" '. $target_tab .'>'. $address_link_text .'</a>';
   } else {
      $address_link_text = '';
   }

   $address_title = $title_link ? ' <a href="'.$title_link.'" '. $target_tab .'> '.$address_title.' </a> ' : $address_title;
   $result = '<li class="'.$class_icon.'">'. $address_icon .' <span class="info-list">'.$address_title . $address_link_text .'</span></li>';
   return $result;
}
add_shortcode("havnor_top_address_info", "havnor_top_address_info_function");

// Header
/* Header Buttons */
function havnor_header_btns_function($atts, $content = true) {
   extract(shortcode_atts(array(
      "custom_class" => ''
   ), $atts));

   $result = '<div class="header-buttons '. $custom_class .'">'. do_shortcode($content) .'</div>';
   return $result;
}
add_shortcode("havnor_header_btns", "havnor_header_btns_function");

/* Header Button */
function havnor_header_btn_function($atts, $content = NULL) {
   extract(shortcode_atts(array(
      "btn_style" => '',
      "btn_icon" => '',
      "btn_link_text" => '',
      "btn_text_link" => '',
      "target_tab" => ''
   ), $atts));

   $target_tab = ( $target_tab === '1' ) ? 'target="_blank"' : '';
   $btn_icon = ( isset( $btn_icon ) ) ? '<i class="'. $btn_icon .'"></i> ' : '';
   if ($btn_style === 'btn-light') {
      $result = '<a href="'. $btn_text_link .'" '.$target_tab.' class="login-link">'. $btn_icon . $btn_link_text .'</a>';
   } else {
      $result = '<a href="'. $btn_text_link .'" '.$target_tab.' class="hanor-btn hanor-btn-medium"><span class="hanor-btn-text">'. $btn_icon . $btn_link_text .'</span></a>';
   }

   return $result;
}
add_shortcode("havnor_header_btn", "havnor_header_btn_function");

/* Content Shortcodes */
/* Spacer */
function havnor_spacer_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "height" => '',
  ), $atts));

  $result = do_shortcode('[vc_empty_space height="'. $height .'"]');
  return $result;
}
add_shortcode("havnor_spacer", "havnor_spacer_function");

/* Social Icons */
function havnor_socials_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "custom_class" => '',
    "rounded" => '',
    // Colors
    "icon_color" => '',
    "icon_hover_color" => '',
    "bg_color" => '',
    "bg_hover_color" => '',
    "border_color" => '', 
    "icon_size" => '',
  ), $atts));

  // Shortcode Style CSS
  $e_uniqid       = uniqid();
  $inline_style   = '';

  // Colors & Size
  if ( $icon_color || $icon_size ) {
    $inline_style .= '.hanor-socials-'. $e_uniqid .'.hanor-social a, .hanor-socials-'. $e_uniqid .'.hanor-social a i {';
    $inline_style .= ( $icon_color ) ? 'color:'. $icon_color .';' : '';
    $inline_style .= ( $icon_size ) ? 'font-size:'. havnor_core_check_px($icon_size) .';' : '';
    $inline_style .= '}';
  }
  if ( $icon_hover_color ) {
    $inline_style .= '.hanor-socials-'. $e_uniqid .'.hanor-social li a:hover, .hanor-socials-'. $e_uniqid .'.hanor-social a:hover i {';
    $inline_style .= ( $icon_hover_color ) ? 'color:'. $icon_hover_color .';' : '';
    $inline_style .= '}';
  }
  // add inline style
  add_inline_style( $inline_style );
  $styled_class  = ' hanor-socials-'. $e_uniqid;

  if ($rounded) {
    $r_class = ' rounded';
  } else {
    $r_class = '';
  }
  $result = '<div class="hanor-social'.$r_class.' '. $custom_class . $styled_class .'">'. do_shortcode($content) .'</div>';
  return $result;
}
add_shortcode("havnor_socials", "havnor_socials_function");

/* Social Icon */
function havnor_social_function($atts, $content = NULL) {
   extract(shortcode_atts(array(
      "social_link" => '',
      "social_icon" => '',
      "target_tab" => '',
   ), $atts));

   $social_link = ( isset( $social_link ) ) ? 'href="'. $social_link . '"' : '';
   $target_tab = ( $target_tab === '1' ) ? ' target="_blank"' : '';
   $result = '<a '. $social_link . $target_tab .' class="social-icon-'. str_replace('fa fa-', '', $social_icon) .'"><i class="'. $social_icon .'"></i></a>';
   return $result;

}
add_shortcode("havnor_social", "havnor_social_function");

/* Subscribe */
function havnor_subscribe_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "custom_class" => '',
    "get_subscribe_image" => '',
    "title" => '',
    "sub_content" => '',
    "link_text" => '',
    "subscribe_link" => '',
    "target_tab" => '',
  ), $atts));

  $title_actual = $title ? '<h6>'.$title.'</h6>' : '';
  $content_actual = $sub_content ? '<p>'.$sub_content.'</p>' : '';
  $target_tab = ( $target_tab === '1' ) ? ' target="_blank"' : '';
  $sub_link = $subscribe_link ? '<span class="subscribe-lttr"><a href="'.$subscribe_link.'" '.$target_tab.'>'.$link_text.'</a></span>' : '<span class="subscribe-lttr">'.$link_text.'</span>';
  $sub_link_actual = $link_text ? $sub_link : '';

  $image_actual = '<div class="hanor-image hanor-item"><img src="'.$get_subscribe_image.'" alt="subscribe"/></div>';
  $result = '<div class="side-nav-newsletter">'.$image_actual.''.$title_actual.''.$content_actual.''.$sub_link_actual.'</div>';
  return $result;
}
add_shortcode("havnor_subscribe", "havnor_subscribe_function");

/* Side Menus */
function havnor_sidemenus_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "menu_style" => '',
    "custom_class" => '',
  ), $atts));

  if($menu_style === 'style-two') {
    $style_cls = ' normal-menu';
  } else {
    $style_cls = ' bold-list';
  }

  $result = '<ul class="custom-dropdown-nav '.$custom_class.''.$style_cls.'">'.do_shortcode($content).'</ul>';
  return $result;

}
add_shortcode("havnor_sidemenus", "havnor_sidemenus_function");
/* Side Menu */
function havnor_sidemenu_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "site_credit" => '',
    "get_text" => '',
    "get_text_secondary" => '',
    "get_link" => '',
    "target_tab" => '',
  ), $atts));

  $target_tab = ( $target_tab === '1' ) ? ' target="_blank"' : '';
  if($site_credit) {
    $list = $get_link ? '<li class="site-credit-link"><a href="'.$get_link.'" '.$target_tab.'><span class="default-text">'.$get_text.'</span><span class="change-text">'.$get_text_secondary.'</span></a></li>' : '<li class="site-credit-link"><span class="default-text">'.$get_text.'</span><span class="change-text">'.$get_text_secondary.'</span></li>';
    $list_actual = $get_text ? $list : '';
  } else {
    $list = $get_link ? '<li><a href="'.$get_link.'" '.$target_tab.'>'.$get_text.'</a></li>' : '<li>'.$get_text.'</li>';
    $list_actual = $get_text ? $list : '';
  }

  $result = $list_actual;
  return $result;

}
add_shortcode("havnor_sidemenu", "havnor_sidemenu_function");

/* Opening Hours List */
function havnor_opening_hours_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "sec_title" => '',
    "custom_class" => '',
    // Colors
    "title_color" => '',
    "title_size" => '',
    "text_color" => '',
    "text_weight" => '',
    "section_bg_color" => '',
    "border" => '',
    "border_color" => '',
    // Size
    "text_size" => '',
    "title_weight" => '',
  ), $atts));

  // Shortcode Style CSS
  $e_uniqid       = uniqid();
  $inline_style   = '';

  // Colors & Size
  if ( $text_color || $text_size || $border_color || $text_weight) {
    $inline_style .= '.hanor-opening-list-'. $e_uniqid .'.valuable-status-item ul li {';
    $inline_style .= ( $text_color ) ? 'color:'. $text_color .';' : '';
    $inline_style .= ( $border_color ) ? 'border-color:'. $border_color .';' : '';
    $inline_style .= ( $text_size ) ? 'font-size:'. havnor_core_check_px($text_size) .';' : '';
    $inline_style .= ( $text_weight ) ? 'font-weight:'. $text_weight .';' : '';
    $inline_style .= '}';
  }
  if ( $border_color) {
    $inline_style .= '.hanor-opening-list-'. $e_uniqid .'.valuable-status-item.hav-border {';
    $inline_style .= ( $border_color ) ? 'border-color:'. $border_color .';' : '';
    $inline_style .= '}';
  }
  if ( $title_color || $title_weight || $title_size ) {
    $inline_style .= '.hanor-opening-list-'. $e_uniqid .'.valuable-status-item h3 {';
    $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
    $inline_style .= ( $title_weight ) ? 'font-weight:'. $title_weight .';' : '';
    $inline_style .= ( $title_size ) ? 'font-size:'. havnor_core_check_px($title_size) .';' : '';
    $inline_style .= '}';
  }
  // Bg Color
  if ( $section_bg_color ) {
    $inline_style .= '.widget-opening-hours .hanor-opening-list-'. $e_uniqid .'.valuable-status-item {';
    $inline_style .= ( $section_bg_color ) ? 'background-color:'. $section_bg_color .';' : '';
    $inline_style .= '}';
  }

  if($border) {
    $brdr_cls = ' hav-border';
  } else {
    $brdr_cls = '';
  }

  // add inline style
  add_inline_style( $inline_style );
  $styled_class  = ' hanor-opening-list-'. $e_uniqid;

  $title = $sec_title ? '<h3 class="status-title">'.$sec_title.'</h3>' : '';

  $result = '<div id="hanor-widget-placeholder-2" class="widget-opening-hours"><div class="valuable-status-item '. $custom_class . $styled_class .' '.$brdr_cls.'">'.$title.'<ul>'. do_shortcode($content) .'</ul></div></div>';

  return $result;

}
add_shortcode("havnor_opening_hours", "havnor_opening_hours_function");

/* Opening Hour List */
function havnor_opening_hour_function($atts, $content = NULL) {
  extract(shortcode_atts(array(
    "text" => '',
    "price" => ''
  ), $atts));

  if($text){
    $result = '<li><div class="pull-left">'.$text.'</div><div class="pull-right">'.$price.'</div></li>';
  } else {
    $result = '';
  }
  return $result;

}
add_shortcode("havnor_opening_hour", "havnor_opening_hour_function");

/* Typewritter Lists */
function havnor_typewritter_lists_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "text_color" => '',
    "text_size" => '',
    "custom_class" => '',
  ), $atts));

  // Shortcode Style CSS
  $e_uniqid       = uniqid();
  $inline_style   = '';

  // Colors & Size
  if ( $text_color || $text_size) {
    $inline_style .= '.hanor-type-text-'. $e_uniqid .' {';
    $inline_style .= ( $text_color ) ? 'color:'. $text_color .';' : '';
    $inline_style .= ( $text_size ) ? 'font-size:'. havnor_core_check_px($text_size) .';' : '';
    $inline_style .= '}';
  }

  // add inline style
  add_inline_style( $inline_style );
  $styled_class  = ' hanor-type-text-'. $e_uniqid;

  // Output
  $output = '';
  $output .= '<div id="typed-strings" class="'. $custom_class .'">';
  $output .= do_shortcode($content);
  $output .= '</div><div class="typewriter-caption '.$styled_class.'" id="typed"></div>';

  return $output;

}
add_shortcode("havnor_typewritter_lists", "havnor_typewritter_lists_function");

/* Typewritter List */
function havnor_typewritter_list_function($atts, $content = NULL) {
  extract(shortcode_atts(array(
    "text" => '',
  ), $atts));

  // Atts
  $text = $text ? '<span>'. $text .'</span> ' : '';
  $result = $text;
  return $result;
}
add_shortcode("havnor_typewritter_list", "havnor_typewritter_list_function");

/* Simple Image */
function havnor_simple_image_function($atts, $content = NULL) {
  extract(shortcode_atts(array(
    "custom_class" => '',
    "get_image" => '',
    "retina_img" => '',
    "link" => '',
    "open_tab" => ''
  ), $atts));

  // Atts
  $alt_text = get_post_meta($get_image, '_wp_attachment_image_alt', true);
  if($get_image) {
    list($width, $height, $type, $attr) = getimagesize($get_image);
  } else {
    $width = '';
    $height = '';
  }
  if($retina_img) {
    $logo_width = $width/2;
    $logo_height = $height/2;
  } else {
    $logo_width = '';
    $logo_height = '';
  }
  
  if ($get_image) {
    $my_image = ($get_image) ? '<img src="'. $get_image .'" alt="'.esc_attr($alt_text).'" style="width: '.havnor_core_check_px($logo_width).'; height: '.havnor_core_check_px($logo_height).'"/>' : '';
  } else {
    $my_image = '';
  }
  if ($link) {
    $open_tab = $open_tab ? 'target="_blank"' : '';
    $link_o = '<a href="'. $link .'" '. $open_tab .'>';
    $link_c = '</a>';
  } else {
    $link_o = '';
    $link_c = '';
  }
  $result = '<div class="hanor-image '.$custom_class.'">'. $link_o . $my_image . $link_c .'</div>';
  return $result;
}
add_shortcode("havnor_simple_image", "havnor_simple_image_function");

/* Simple Image */
function havnor_simple_textarea_function($atts, $content = NULL) {
  extract(shortcode_atts(array(
    "custom_class" => '',
    "get_text" => '',
    "text_size" => '',
  ), $atts));

  // Shortcode Style CSS
  $e_uniqid       = uniqid();
  $inline_style   = '';

  // Colors & Size
  if ( $text_size) {
    $inline_style .= '.hanor-textarea-'. $e_uniqid .' {';
    $inline_style .= ( $text_size ) ? 'font-size:'. havnor_core_check_px($text_size) .';' : '';
    $inline_style .= '}';
  }

  // add inline style
  add_inline_style( $inline_style );
  $styled_class  = ' hanor-type-text-'. $e_uniqid;

  $result = '<p class="'.$custom_class . $styled_class.'">'. $get_text .'</p>';
  return $result;
}
add_shortcode("havnor_simple_textarea", "havnor_simple_textarea_function");

/* Simple Underline Link */
function vt_simple_link_function($atts, $content = NULL) {
  extract(shortcode_atts(array(
    "link_style" => '',
    "link_icon" => '',
    "link_text" => '',
    "link" => '',
    "target_tab" => '',
    "custom_class" => '',
    // Style
    "text_color" => '',
    "text_hover_color" => '',
    "text_size" => '',
  ), $atts));

  // Atts
  $target_tab = $target_tab ? 'target="_blank"' : '';
  $link_style = $link_style ? $link_style. ' ' : 'link-underline ';

  // Shortcode Style CSS
  $e_uniqid       = uniqid();
  $inline_style   = '';

  // Colors & Size
  if ( $text_color || $text_size ) {
    $inline_style .= '.hanor-simple-link-'. $e_uniqid .'-'.sanitize_title($link_text).' .hanor-'. $link_style .', .hanor-simple-link-'. $e_uniqid .' .hanor-link-arrow-left i, .hanor-simple-link-'. $e_uniqid .' .hanor-link-arrow-right i {';
    $inline_style .= ( $text_color ) ? 'color:'. $text_color .';' : '';
    $inline_style .= ( $text_size ) ? 'font-size:'. havnor_core_check_px($text_size) .';' : '';
    $inline_style .= '}';
    $inline_style .= '.hanor-simple-link-'. $e_uniqid .'-'.sanitize_title($link_text).' a.hanor-underline-animation:after {';
    $inline_style .= ( $text_color ) ? 'background:'. $text_color .';' : '';
    $inline_style .= '}';

  }
  if ( $text_hover_color ) {
    $inline_style .= '.hanor-simple-link-'. $e_uniqid .'-'.sanitize_title($link_text).' .hanor-'. $link_style .':hover, .hanor-simple-link-'. $e_uniqid .'-'.sanitize_title($link_text).' .hanor-link-arrow-right:hover, .hanor-simple-link-'. $e_uniqid .'-'.sanitize_title($link_text).' .hanor-link-arrow-left:hover, .hanor-simple-link-'. $e_uniqid .'-'.sanitize_title($link_text).' .hanor-link-arrow-right:hover i, .hanor-simple-link-'. $e_uniqid .'-'.sanitize_title($link_text).' .hanor-link-arrow-left:hover i, .hanor-simple-link-'. $e_uniqid .'-'.sanitize_title($link_text).' .hanor-link-underline:hover, .hanor-simple-link-'. $e_uniqid .'-'.sanitize_title($link_text).' a.hanor-underline-animation:hover {';
    $inline_style .= ( $text_hover_color ) ? 'color:'. $text_hover_color .';' : '';
    $inline_style .= '}';
  }

  // add inline style
  havnor_add_inline_style( $inline_style );
  $styled_class  = ' hanor-simple-link-'. $e_uniqid.'-'.sanitize_title($link_text);
  if($link) {
    $link_actual = '<a href="'. $link .'" '. $target_tab .' class="hanor-'. $link_style .'">'. $link_text .'</a>';
  } else {
    $link_actual = '<span class="hanor-'. $link_style .'">'. $link_text .'</span>';
  }

  $result = '<div class="hanor-link '. $custom_class . $link_style. $styled_class.'">'.$link_actual.'</div>';
  return $result;

}
add_shortcode("vt_simple_link", "vt_simple_link_function");

/* Blockquote */
function havnor_blockquote_function($atts, $content = NULL) {
  extract(shortcode_atts(array(
    "custom_class" => '',
    "text_size" => '',
    "name_size" => '',
    "content_color" => '',
    "name_color" => '',
    "name_hov_color" => '',
    "quote_text" => '',
    "name" => '',
    "name_link" => '',
    "target_tab" => '',
    "get_image" => '',
  ), $atts));

  // Shortcode Style CSS
  $e_uniqid        = uniqid();
  $inline_style  = '';

  if ( $content_color || $text_size ) {
    $inline_style .= '.blog-detail-wrap blockquote.hanor-blockquote-'. $e_uniqid .' p {';
    $inline_style .= ( $content_color ) ? 'color:'. $content_color .';' : '';
    $inline_style .= ( $text_size ) ? 'font-size:'. havnor_core_check_px($text_size) .';' : '';
    $inline_style .= '}';
  }
  if ( $name_color || $name_size ) {
    $inline_style .= 'blockquote.hanor-blockquote-'. $e_uniqid .' cite a {';
    $inline_style .= ( $name_color ) ? 'color:'. $name_color .';' : '';
    $inline_style .= ( $name_size ) ? 'font-size:'. havnor_core_check_px($name_size) .';' : '';
    $inline_style .= '}';
  }
  if ( $name_hov_color ) {
    $inline_style .= 'blockquote.hanor-blockquote-'. $e_uniqid .' cite a:hover {';
    $inline_style .= ( $name_hov_color ) ? 'color:'. $name_hov_color .';' : '';
    $inline_style .= '}';
  }
  if($get_image) {
    $inline_style .= 'blockquote.hanor-blockquote-'. $e_uniqid .' p:before {';
    $inline_style .= ( $get_image ) ? 'background-image:url('. $get_image .');' : '';
    $inline_style .= '}';
  }

  // add inline style
  add_inline_style( $inline_style );
  $styled_class  = ' hanor-blockquote-'. $e_uniqid;

  $target_tab = ( $target_tab === '1' ) ? ' target="_blank"' : '';
  $quote_name = $name_link ? '<cite><a href="'.$name_link.'" '.$target_tab.'>'.$name.'</a></cite>' : '<cite>'.$name.'</cite>';

  $result = '<blockquote class="'. $custom_class .''.$styled_class.'"><p>'. $quote_text .'</p>'. $quote_name .'</blockquote>';
  return $result;

}
add_shortcode("havnor_blockquote", "havnor_blockquote_function");

/* List Styles Lists */ 
function havnor_simple_lists_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "custom_class" => '',
    "get_tick_image" => '',
    // Colors
    "text_color" => '',
    // Size
    "text_size" => '',
  ), $atts));

  // Shortcode Style CSS
  $e_uniqid       = uniqid();
  $inline_style   = '';

  if ( $text_color || $text_size ) {
    $inline_style .= '.hanor-list-'. $e_uniqid .' li, .hanor-list-'. $e_uniqid .' li a {';
    $inline_style .= ( $text_color ) ? 'color:'. $text_color .';' : '';
    $inline_style .= ( $text_size ) ? 'font-size:'. havnor_core_check_px($text_size) .';' : '';
    $inline_style .= '}';
  }
  if($get_tick_image) {
    $inline_style .= '.hanor-list-'. $e_uniqid .'.hanor-list-icon li {';
    $inline_style .= ( $get_tick_image ) ? 'background-image:url('. $get_tick_image .');' : '';
    $inline_style .= '}';
  }

  // add inline style
  add_inline_style( $inline_style );
  $styled_class  = ' hanor-list-'. $e_uniqid;

  // Output
  $output = '';
  $output .= '<ul class="unordered-list hanor-list-icon '. $custom_class . $styled_class .'">';
  $output .= do_shortcode($content);
  $output .= '</ul>';
  return $output;
}
add_shortcode("havnor_simple_lists", "havnor_simple_lists_function");

/* List Styles List */
function havnor_simple_list_function($atts, $content = NULL) {
  extract(shortcode_atts(array(
    "list_title" => '',
    "list_text" => '',
    "list_text_link" => '',
    "target_tab" => '',
  ), $atts));

  // Atts
  $list_title = $list_title ? $list_title : '';
  $target_tab = ( $target_tab === '1' ) ? 'target="_blank"' : '';
  $list_text = $list_text_link ? '<a href="'.$list_text_link.'" '.$target_tab.'>'.$list_text.'</a>' : $list_text;

  $result = '<li>'. $list_title . $list_text .'</li>';
  return $result;

}
add_shortcode("havnor_simple_list", "havnor_simple_list_function");

/* Footer Menus */
function havnor_footer_menus_function($atts, $content = true) {
   extract(shortcode_atts(array(
      "custom_class" => '',
      "menu_size" => '',
      "single_column" => '',
   ), $atts));

   // Shortcode Style CSS
  $e_uniqid       = uniqid();
  $inline_style   = '';

  if ( $menu_size ) {
    $inline_style .= '.hanor-menu-'. $e_uniqid .'.footer-links li {';
    $inline_style .= ( $menu_size ) ? 'font-size:'. havnor_core_check_px($menu_size) .';' : '';
    $inline_style .= '}';
  }

  // add inline style
  add_inline_style( $inline_style );
  $styled_class  = ' hanor-menu-'. $e_uniqid;

   if($single_column) {
    $column_cls = ' links-single-column';
   } else {
    $column_cls = '';
   }

   $result = '<ul class="footer-links '. $custom_class .''.$column_cls . $styled_class.'">'. do_shortcode($content) .'</ul>';
   return $result;

}
add_shortcode("havnor_footer_menus", "havnor_footer_menus_function");

/* Footer Menu */
function havnor_footer_menu_function($atts, $content = NULL) {
   extract(shortcode_atts(array(
      "menu_title" => '',
      "menu_link" => '',
      "target_tab" => ''
   ), $atts));

   $menu_link = ( isset( $menu_link ) ) ? 'href="'. $menu_link . '"' : '';
   $target_tab = ( $target_tab === '1' ) ? 'target="_blank"' : '';
   $menu_link_title = $menu_title ? '<li><a '. $menu_link . $target_tab .'>'. $menu_title .'</a></li>' : '';

   $result = $menu_link_title;
   return $result;

}
add_shortcode("havnor_footer_menu", "havnor_footer_menu_function");

/* Copyright Menus */
function havnor_copyright_menus_function($atts, $content = true) {
   extract(shortcode_atts(array(
      "custom_class" => ''
   ), $atts));

   $result = '<ul class="copyright-links '. $custom_class .'">'. do_shortcode($content) .'</ul>';
   return $result;

}
add_shortcode("havnor_copyright_menus", "havnor_copyright_menus_function");

/*Copyright Menu */
function havnor_copyright_menu_function($atts, $content = NULL) {
   extract(shortcode_atts(array(
      "cpy_menu_title" => '',
      "cpy_menu_link" => '',
      "target_tab" => ''
   ), $atts));

   $cpy_menu_link = ( isset( $cpy_menu_link ) ) ? 'href="'. $cpy_menu_link . '"' : '';
   $target_tab = ( $target_tab === '1' ) ? 'target="_blank"' : '';
   $cpy_menu_link_title = $cpy_menu_title ? '<li><a '. $cpy_menu_link . $target_tab .'>'. $cpy_menu_title .'</a></li>' : '';

   $result = $cpy_menu_link_title;
   return $result;

}
add_shortcode("havnor_copyright_menu", "havnor_copyright_menu_function");

/* Current Year - Shortcode */
if( ! function_exists( 'havnor_current_year' ) ) {
  function havnor_current_year() {
    return date('Y');
  }
  add_shortcode( 'havnor_current_year', 'havnor_current_year' );
}

/* Get Home Page URL - Via Shortcode */
if( ! function_exists( 'havnor_home_url' ) ) {
  function havnor_home_url() {
    return esc_url( home_url( '/' ) );
  }
  add_shortcode( 'havnor_home_url', 'havnor_home_url' );
}
