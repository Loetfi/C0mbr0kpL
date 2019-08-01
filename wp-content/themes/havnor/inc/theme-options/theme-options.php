<?php
/*
 * All Theme Options for Havnor theme.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

function havnor_vt_settings( $settings ) {
  $settings           = array(
    'menu_title'      => HAVNOR_NAME . esc_html__(' Options', 'havnor'),
    'menu_slug'       => sanitize_title(HAVNOR_NAME) . '_options',
    'menu_type'       => 'menu',
    'menu_icon'       => 'dashicons-awards',
    'menu_position'   => '4',
    'ajax_save'       => false,
    'show_reset_all'  => true,
    'framework_title' => HAVNOR_NAME .' <small>V-'. HAVNOR_VERSION .' by <a href="'. HAVNOR_BRAND_URL .'" target="_blank">'. HAVNOR_BRAND_NAME .'</a></small>',
  );
  return $settings;
}
add_filter( 'cs_framework_settings', 'havnor_vt_settings' );

// Theme Framework Options
function havnor_vt_options( $options ) {

  $options      = array(); // remove old options
  // ------------------------------
  // Theme Brand
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_brand',
    'title'    => esc_html__('Logo', 'havnor'),
    'icon'     => 'fa fa-bookmark',
    'fields' => array(

      // Site Logo
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Site Logo', 'havnor')
      ),
      array(
        'id'    => 'brand_logo_default',
        'type'  => 'image',
        'title' => esc_html__('Default Logo', 'havnor'),
        'info'  => esc_html__('Upload your default logo here. If you not upload, then site title will load in this logo location.', 'havnor'),
        'add_title' => esc_html__('Add Logo', 'havnor'),
      ),
      array(
        'id'    => 'brand_logo_retina',
        'type'  => 'image',
        'title' => esc_html__('Retina Logo', 'havnor'),
        'info'  => esc_html__('Upload your retina logo here. Recommended size is 2x from default logo.', 'havnor'),
        'add_title' => esc_html__('Add Retina Logo', 'havnor'),
      ),
      array(
        'id'          => 'retina_width',
        'type'        => 'text',
        'title'       => esc_html__('Retina & Normal Logo Width', 'havnor'),
        'unit'        => 'px',
      ),
      array(
        'id'          => 'retina_height',
        'type'        => 'text',
        'title'       => esc_html__('Retina & Normal Logo Height', 'havnor'),
        'unit'        => 'px',
      ),
      array(
        'id'          => 'brand_logo_top',
        'type'        => 'number',
        'title'       => esc_html__('Logo Top Space', 'havnor'),
        'attributes'  => array( 'placeholder' => 5 ),
        'unit'        => 'px',
      ),
      array(
        'id'          => 'brand_logo_bottom',
        'type'        => 'number',
        'title'       => esc_html__('Logo Bottom Space', 'havnor'),
        'attributes'  => array( 'placeholder' => 5 ),
        'unit'        => 'px',
      ),

      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Transparent Header', 'havnor')
      ),
      array(
        'id'    => 'transparent_logo_default',
        'type'  => 'image',
        'title' => esc_html__('Transparent Logo', 'havnor'),
        'info'  => esc_html__('Upload your transparent header logo here. This logo is used in transparent header by enabled in each pages.', 'havnor'),
        'add_title' => esc_html__('Add Transparent Logo', 'havnor'),
      ),
      array(
        'id'    => 'transparent_logo_retina',
        'type'  => 'image',
        'title' => esc_html__('Transparent Retina Logo', 'havnor'),
        'info'  => esc_html__('Upload your transparent header retina logo here. This logo is used in transparent header by enabled in each pages.', 'havnor'),
        'add_title' => esc_html__('Add Transparent Retina Logo', 'havnor'),
      ),

      // WordPress Admin Logo
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('WordPress Admin Logo', 'havnor')
      ),
      array(
        'id'    => 'brand_logo_wp',
        'type'  => 'image',
        'title' => esc_html__('Login logo', 'havnor'),
        'info'  => esc_html__('Upload your WordPress login page logo here.', 'havnor'),
        'add_title' => esc_html__('Add Login Logo', 'havnor'),
      ),

    ),
  );

  // ------------------------------
  // Layout
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_layout',
    'title'  => esc_html__('Layout', 'havnor'),
    'icon'   => 'fa fa-file-text'
  );
  $options[]      = array(
    'name'        => 'theme_general',
    'title'       => esc_html__('General', 'havnor'),
    'icon'        => 'fa fa-wrench',

    // begin: fields
    'fields'      => array(

      // -----------------------------
      // Begin: Responsive
      // -----------------------------
      array(
        'id'    => 'theme_responsive',
        'type'  => 'switcher',
        'title' => esc_html__('Responsive', 'havnor'),
        'info' => esc_html__('Turn off if you don\'t want your site to be responsive.', 'havnor'),
        'default' => true,
      ),
      array(
        'id'    => 'theme_preloader',
        'type'  => 'switcher',
        'title' => esc_html__('Preloader', 'havnor'),
        'info' => esc_html__('Turn off if you don\'t want preloader.', 'havnor'),
      ),
      array(
        'id'    => 'theme_btotop',
        'type'  => 'switcher',
        'title' => esc_html__('Back To Top', 'havnor'),
        'info' => esc_html__('Turn off if you don\'t want back to top button.', 'havnor'),
        'default' => true,
      ),
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Pre-Defined Page Templates', 'havnor'),
      ),
      array(
        'id'             => 'pre_pages',
        'type'           => 'select',
        'title'          => esc_html__('Pre-Defined Page Templates', 'havnor'),
        'options'        => array(
          'corporate' => esc_html__('Corporate', 'havnor'),
          'gym' => esc_html__('Gym', 'havnor'),
          'creative' => esc_html__('Creative', 'havnor'),
          'design' => esc_html__('Design', 'havnor'),
          'construction' => esc_html__('Construction', 'havnor'),
          'logistic' => esc_html__('Logistic', 'havnor'),
          'mac' => esc_html__('Mac', 'havnor'),
          'restaurant' => esc_html__('Restaurant', 'havnor'),
          'freelancer' => esc_html__('Freelancer', 'havnor'),
          'medical' => esc_html__('Medical', 'havnor'),
          'startup' => esc_html__('Startup', 'havnor'),
          'mobile' => esc_html__('Mobile', 'havnor'),
          'financial' => esc_html__('Financial', 'havnor'),
          'business' => esc_html__('Business', 'havnor'),
          'seo' => esc_html__('Seo', 'havnor'),
          'hosting' => esc_html__('Hosting', 'havnor'),
          'architect' => esc_html__('Architect', 'havnor'),
          'conference' => esc_html__('Conference', 'havnor'),
          'lawyer' => esc_html__('Lawyer', 'havnor'),
          'security' => esc_html__('Security', 'havnor'),
          'wedding' => esc_html__('Wedding', 'havnor'),
        ),
        'info' => esc_html__('Select which category you want in WPBakery Page Builder pre-defined page templates?', 'havnor'),
      ),

      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Search Type', 'havnor'),
      ),
      array(
        'id'             => 'search_type',
        'type'           => 'select',
        'title'          => esc_html__('Search Page Style', 'havnor'),
        'options'        => array(
          'normal' => esc_html__('Default', 'havnor'),
          'post_type_search' => esc_html__('Post Type Search', 'havnor'),
        ),
        'info' => esc_html__('Select Search Page Style', 'havnor'),
      ),

    ), // end: fields

  );

  // ------------------------------
  // Header Sections
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_header_tab',
    'title'    => esc_html__('Header', 'havnor'),
    'icon'     => 'fa fa-bars',
    'sections' => array(

      // header design tab
      array(
        'name'     => 'header_design_tab',
        'title'    => esc_html__('Design', 'havnor'),
        'icon'     => 'fa fa-magic',
        'fields'   => array(
          // Header Select
          array(
            'id'           => 'select_header_design',
            'type'         => 'image_select',
            'title'        => esc_html__('Select Header Design', 'havnor'),
            'options'      => array(
              'style_one'    => HAVNOR_CS_IMAGES .'/hs-1.png',
              'style_two'    => HAVNOR_CS_IMAGES .'/hs-2.png',
              'style_three'  => HAVNOR_CS_IMAGES .'/hs-3.png',
              'style_four'  => HAVNOR_CS_IMAGES .'/hs-4.png',
              'style_five'  => HAVNOR_CS_IMAGES .'/hs-5.png',
              'style_six'  => HAVNOR_CS_IMAGES .'/hs-6.png',
              'style_seven'  => HAVNOR_CS_IMAGES .'/hs-7.png',
            ),
            'attributes' => array(
              'data-depend-id' => 'header_design',
            ),
            'radio'        => true,
            'default'   => 'style_one',
            'info' => esc_html__('Select your header design, following options will may differ based on your selection of header design.', 'havnor'),
          ),
          array(
            'id'    => 'page_container',
            'type'  => 'switcher',
            'title' => esc_html__('Fullwidth Page', 'havnor'),
            'info' => esc_html__('Use Fullwidth page', 'havnor'),
            'dependency'   => array('header_design', '==', 'style_three' ),
          ),
          array(
            'id'    => 'fullwidth_header',
            'type'  => 'switcher',
            'title' => esc_html__('Fullwidth Header', 'havnor'),
            'info' => esc_html__('Turn On if you want full width header.', 'havnor'),
            'default' => false,
            'dependency' => array('header_design|header_design|header_design', '!=|!=|!=', 'style_three|style_seven|style_two'),
          ),
          array(
            'id'    => 'transparent_header',
            'type'  => 'switcher',
            'title' => esc_html__('Transparent Header', 'havnor'),
            'info' => esc_html__('Turn On if you want transparent header.', 'havnor'),
            'default' => false,
            'dependency' => array('header_design|header_design|header_design', '!=|!=|!=', 'style_three|style_five|style_seven'),
          ),
          array(
            'id'    => 'need_content',
            'type'  => 'switcher',
            'title' => esc_html__('Need Header Content', 'havnor'),
            'default' => true,
          ),
          array(
            'id'              => 'header_address_info',
            'title'           => esc_html__('Header Content', 'havnor'),
            'desc'            => esc_html__('Add your header content here. Example : Buttons', 'havnor'),
            'type'            => 'textarea',
            'shortcode'       => true,
            'dependency'   => array('need_content', '==', 'true'),
          ),
          array(
            'id'              => 'header_address_info_secondary',
            'title'           => esc_html__('Header Content Secondary', 'havnor'),
            'desc'            => esc_html__('Add your header secondary content here. Example : Buttons,Address info', 'havnor'),
            'type'            => 'textarea',
            'shortcode'       => true,
            'dependency'   => array('need_content|header_design', '==|any', 'true|style_four,style_six,style_seven'),
          ),
          // Header Select
          // Extra's
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Extra\'s', 'havnor'),
            'dependency' => array('header_design', '!=', 'style_three'),
          ),
          array(
            'id'    => 'sticky_header',
            'type'  => 'switcher',
            'title' => esc_html__('Sticky Header', 'havnor'),
            'info' => esc_html__('Turn On if you want your naviagtion bar on sticky.', 'havnor'),
            'default' => true,
            'dependency' => array('header_design', '!=', 'style_three'),
          ),
          array(
            'id'    => 'sticky_footer',
            'type'  => 'switcher',
            'title' => esc_html__('Enable Sticky Footer', 'havnor'),
            'info' => esc_html__('If you turn this ON the footer will be sticky.', 'havnor'),
            'default' => false,
            'dependency' => array('header_design', '!=', 'style_three'),
          ),
          array(
            'id'    => 'search_icon',
            'type'  => 'switcher',
            'title' => esc_html__('Search Icon', 'havnor'),
            'info' => esc_html__('Turn On if you want to show search icon in navigation bar.', 'havnor'),
            'default' => true,
            'dependency' => array('header_design', '!=', 'style_three'),
          ),
          array(
            'id'    => 'cart_icon',
            'type'  => 'switcher',
            'title' => esc_html__('Cart Icon', 'havnor'),
            'info' => esc_html__('Turn On if you want to show cart icon in navigation bar.', 'havnor'),
            'default' => true,
            'dependency' => array('header_design', '!=', 'style_three'),
          ),
          array(
            'id'          => 'mobile_breakpoint',
            'type'        => 'text',
            'title'       => esc_html__('Mobile Menu Starts from?', 'havnor'),
            'attributes'  => array( 'placeholder' => '1199' ),
            'info' => esc_html__('Just put numeric value only. Like : 1199. Don\'t use px or any other units.', 'havnor'),
          ),

        )
      ),

      // header top bar
      array(
        'name'     => 'header_top_bar_tab',
        'title'    => esc_html__('Top Bar', 'havnor'),
        'icon'     => 'fa fa-minus',
        'fields'   => array(

          array(
            'id'          => 'top_bar',
            'type'        => 'switcher',
            'title'       => esc_html__('Hide Top Bar', 'havnor'),
            'on_text'     => esc_html__('Yes', 'havnor'),
            'off_text'    => esc_html__('No', 'havnor'),
            'default'     => false,
          ),
          array(
            'id'          => 'top_bar_in_responsive',
            'type'        => 'switcher',
            'title'       => esc_html__('Hide Top Bar in Responsive', 'havnor'),
            'on_text'     => esc_html__('Yes', 'havnor'),
            'off_text'    => esc_html__('No', 'havnor'),
            'default'     => false,
          ),
          array(
            'id'    => 'fullwidth_topbar',
            'type'  => 'switcher',
            'title' => esc_html__('Fullwidth Top Bar', 'havnor'),
            'info' => esc_html__('Turn On if you want full width topbar.', 'havnor'),
            'default' => false,
            'dependency'  => array('top_bar', '==', false),
          ),
          array(
            'id'          => 'top_left',
            'title'       => esc_html__('Top Left Block', 'havnor'),
            'desc'        => esc_html__('Top bar left block.', 'havnor'),
            'type'        => 'textarea',
            'shortcode'   => true,
            'dependency'  => array('top_bar', '==', false),
          ),
          array(
            'id'          => 'top_right',
            'title'       => esc_html__('Top Right Block', 'havnor'),
            'desc'        => esc_html__('Top bar right block.', 'havnor'),
            'type'        => 'textarea',
            'shortcode'   => true,
            'dependency'  => array('top_bar', '==', false),
          ),

          array(
            'id'          => 'topbar_left_width',
            'type'        => 'text',
            'title'       => esc_html__('Top Left Width in %', 'havnor'),
            'attributes'  => array(
              'placeholder' => '50%'
            ),
            'dependency'  => array('top_bar', '==', false),
          ),
          array(
            'id'          => 'topbar_right_width',
            'type'        => 'text',
            'title'       => esc_html__('Top Right Width in %', 'havnor'),
            'attributes'  => array(
              'placeholder' => '50%'
            ),
            'dependency'  => array('top_bar', '==', false),
          ),
          array(
            'id'    => 'top_search_icon',
            'type'  => 'switcher',
            'title' => esc_html__('Search Icon', 'havnor'),
            'info' => esc_html__('Turn On if you want to show search icon in top bar.', 'havnor'),
            'dependency'  => array('top_bar', '==', false),
          ),
          array(
            'id'    => 'top_cart_icon',
            'type'  => 'switcher',
            'title' => esc_html__('Cart Icon', 'havnor'),
            'info' => esc_html__('Turn On if you want to show cart icon in top bar.', 'havnor'),
            'dependency'  => array('top_bar', '==', false),
          ),

        )
      ),

      // header banner
      array(
        'name'     => 'header_banner_tab',
        'title'    => esc_html__('Title Bar (or) Banner', 'havnor'),
        'icon'     => 'fa fa-bullhorn',
        'fields'   => array(

          // Title Area
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Title Area', 'havnor')
          ),
          array(
            'id'      => 'need_title_bar',
            'type'    => 'switcher',
            'title'   => esc_html__('Title Bar', 'havnor'),
            'label'   => esc_html__('If you want title bar in your sub-pages, please turn this ON.', 'havnor'),
            'default'    => true,
          ),
          array(
            'id'             => 'title_bar_padding',
            'type'           => 'select',
            'title'          => esc_html__('Padding Spaces Top & Bottom', 'havnor'),
            'options'        => array(
              'padding-default' => esc_html__('Default Spacing', 'havnor'),
              'padding-xs' => esc_html__('Extra Small Padding', 'havnor'),
              'padding-sm' => esc_html__('Small Padding', 'havnor'),
              'padding-md' => esc_html__('Medium Padding', 'havnor'),
              'padding-lg' => esc_html__('Large Padding', 'havnor'),
              'padding-xl' => esc_html__('Extra Large Padding', 'havnor'),
              'padding-no' => esc_html__('No Padding', 'havnor'),
              'padding-custom' => esc_html__('Custom Padding', 'havnor'),
            ),
            'dependency'   => array( 'need_title_bar', '==', 'true' ),
          ),
          array(
            'id'    => 'button_shortcode',
            'type'  => 'textarea',
            'title' => esc_html__('Button Shortcodes', 'havnor'),
            'label' => esc_html__('Enter button shortcodes that you want to show in this page title area.', 'havnor'),
            'attributes' => array(
              'placeholder' => esc_html__('Enter your shortcode...', 'havnor'),
            ),
            'shortcode' => true,
            'dependency'   => array( 'need_title_bar', '==', 'true' ),
          ),
          array(
            'id'             => 'title_area_align',
            'type'           => 'select',
            'title'          => esc_html__('Title Area Text Align', 'havnor'),
            'options'        => array(
              'text-left' => esc_html__('Left', 'havnor'),
              'text-right' => esc_html__('Right', 'havnor'),
              'text-center' => esc_html__('Center', 'havnor'),
            ),
            'dependency'   => array( 'need_title_bar', '==', 'true' ),
          ),
          array(
            'id'        => 'sub_title_align',
            'type'      => 'select',
            'title'     => esc_html__('Sub-Title Position', 'havnor'),
            'options'   => array(
              'above-title' => esc_html__('Above Title', 'havnor'),
              'below-title' => esc_html__('Below Title', 'havnor'),
            ),
            'dependency'   => array( 'need_title_bar', '==', 'true' ),
          ),
          array(
            'id'             => 'titlebar_top_padding',
            'type'           => 'text',
            'title'          => esc_html__('Padding Top', 'havnor'),
            'attributes' => array(
              'placeholder'     => '100px',
            ),
            'dependency'   => array( 'title_bar_padding|need_title_bar', '==|==', 'padding-custom|true' ),
          ),
          array(
            'id'             => 'titlebar_bottom_padding',
            'type'           => 'text',
            'title'          => esc_html__('Padding Bottom', 'havnor'),
            'attributes' => array(
              'placeholder'     => '100px',
            ),
            'dependency'   => array( 'title_bar_padding|need_title_bar', '==|==', 'padding-custom|true' ),
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Breadcrumbs', 'havnor'),
          ),
          array(
            'id'      => 'need_breadcrumbs',
            'type'    => 'switcher',
            'title'   => esc_html__('Breadcrumbs', 'havnor'),
            'label'   => esc_html__('If you want Breadcrumbs in your banner, please turn this ON.', 'havnor'),
            'default'    => true,
          ),
          array(
            'id'          => 'breadcrumb_style',
            'title'       => esc_html__('Select Breadcrumbs Style', 'havnor'),
            'type'        => 'select',
            'options'        => array(
              'one' => esc_html__('Style One', 'havnor'),
              'two' => esc_html__('Style Two', 'havnor'),
            ),
            'dependency'  => array('need_breadcrumbs', '==', 'true'),
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Background Options', 'havnor'),
            'dependency' => array( 'need_title_bar', '==', 'true' ),
          ),
          array(
            'id'      => 'titlebar_bg',
            'type'    => 'background',
            'title'   => esc_html__('Background', 'havnor'),
            'dependency' => array( 'need_title_bar', '==', 'true' ),
          ),
          array(
            'id'      => 'titlebar_bg_overlay_color',
            'type'    => 'color_picker',
            'title'   => esc_html__('Overlay Color', 'havnor'),
            'dependency' => array( 'need_title_bar', '==', 'true' ),
          ),

        )
      ),
      // Side Bar Menu
      array(
        'name'     => 'header_sidebar_menu_tab',
        'title'    => esc_html__('Side Bar Menu', 'havnor'),
        'icon'     => 'fa fa-minus',
        'fields'   => array(

          array(
            'id'             => 'fixed_nav',
            'type'           => 'select',
            'title'          => esc_html__('Fixed Navigation', 'havnor'),
            'options'        => array(
              'hide' => esc_html__('Hide', 'havnor'),
              'show' => esc_html__('Show', 'havnor'),
            ),
            'info' => esc_html__('Turn On if you want to show fixed navigation in navigation bar.', 'havnor'),
          ),
          array(
            'id'          => 'side_menu_align',
            'title'       => esc_html__('Side Menu Alignment', 'havnor'),
            'type'        => 'select',
            'options'        => array(
              'left' => esc_html__('Left', 'havnor'),
              'right' => esc_html__('Right', 'havnor'),
            ),
            'dependency'  => array('fixed_nav', '==', 'show'),
          ),
          array(
            'id'          => 'side_menu_style',
            'title'       => esc_html__('Select Side Menu', 'havnor'),
            'type'        => 'select',
            'options'        => array(
              'default' => esc_html__('Default Menu', 'havnor'),
              'custom' => esc_html__('Custom Menu', 'havnor'),
            ),
            'dependency'  => array('fixed_nav', '==', 'show'),
          ),
          array(
            'id'             => 'choose_menu',
            'type'           => 'select',
            'title'          => esc_html__('Choose Menu', 'havnor'),
            'desc'          => esc_html__('Choose custom menus for this page.', 'havnor'),
            'options'        => 'menus',
            'default_option' => esc_html__('Select your menu', 'havnor'),
            'dependency'  => array('side_menu_style|fixed_nav', '==|==', 'default|show'),
          ),

          array(
            "type"        =>'textarea',
            "title"     => esc_html__('Custom Menu Shortcode', 'havnor'),
            "id"  => "custom_menu",
            'shortcode'   => true,
            "info" => esc_html__( "Include custom shortcode to display in side menu section.", 'havnor'),
            'dependency'  => array('side_menu_style|fixed_nav', '==|==', 'custom|show'),
          ),
          array(
            "type"        =>'textarea',
            "title"     => esc_html__('Subscribe Shortcode', 'havnor'),
            "id"  => "subscribe",
            'shortcode'   => true,
            "info" => esc_html__( "Include subscribe shortcode to display in side menu section.", 'havnor'),
            'dependency'  => array('fixed_nav', '==', 'show'),
          ),
          array(
            "type"        =>'textarea',
            "title"     => esc_html__('Social Shortcode', 'havnor'),
            "id"  => "social_shortcode",
            'shortcode'   => true,
            "info" => esc_html__( "Include social shortcode to display in side menu section.", 'havnor'),
            'dependency'  => array('fixed_nav', '==', 'show'),
          ),
          array(
            'id'      => 'select_mean_menu',
            'type'    => 'switcher',
            'title'   => esc_html__('Mean Menu', 'havnor'),
            'label'   => esc_html__('If you want this menu as mean menu, Please turn this ON.', 'havnor'),
            'dependency'  => array('fixed_nav', '==', 'show'),
          ),

        )
      ),

    ),
  );

  // ------------------------------
  // Footer Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'footer_section',
    'title'    => esc_html__('Footer', 'havnor'),
    'icon'     => 'fa fa-ellipsis-h',
    'fields'   => array(

      // Footer Widget Block
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Footer Style', 'havnor'),
      ),
      array(
        'id'             => 'footer_styles',
        'type'           => 'select',
        'title'          => esc_html__('Footer Style', 'havnor'),
        'options'        => array(
          'dark_version' => esc_html__('Dark Footer', 'havnor'),
          'light_version' => esc_html__('Light Footer', 'havnor'),
        ),
      ),

      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Footer Widget Block', 'havnor')
      ),
      array(
        'id'    => 'footer_widget_block',
        'type'  => 'switcher',
        'title' => esc_html__('Enable Widget Block', 'havnor'),
        'info' => esc_html__('If you turn this ON, then Goto : Appearance > Widgets. There you can see Footer Widget 1,2,3 or 4 Widget Area, add your widgets there.', 'havnor'),
        'default' => true,
      ),
      array(
        'id'    => 'footer_widget_layout',
        'type'  => 'image_select',
        'title' => esc_html__('Widget Layouts', 'havnor'),
        'info' => esc_html__('Choose your footer widget layouts.', 'havnor'),
        'default' => 4,
        'options' => array(
          1   => HAVNOR_CS_IMAGES . '/footer/footer-1.png',
          2   => HAVNOR_CS_IMAGES . '/footer/footer-2.png',
          3   => HAVNOR_CS_IMAGES . '/footer/footer-3.png',
          4   => HAVNOR_CS_IMAGES . '/footer/footer-4.png',
          5   => HAVNOR_CS_IMAGES . '/footer/footer-5.png',
          6   => HAVNOR_CS_IMAGES . '/footer/footer-6.png',
          7   => HAVNOR_CS_IMAGES . '/footer/footer-7.png',
          8   => HAVNOR_CS_IMAGES . '/footer/footer-8.png',
          9   => HAVNOR_CS_IMAGES . '/footer/footer-9.png',
          10   => HAVNOR_CS_IMAGES . '/footer/footer-10.png',
        ),
        'radio'       => true,
        'dependency'  => array('footer_widget_block', '==', true),
      ),
      array(
        'id'             => 'footer_widget_align',
        'type'           => 'select',
        'title'          => esc_html__('Widget Align', 'havnor'),
        'options'        => array(
          '' => esc_html__('Select Footer Align', 'havnor'),
          'center-align' => esc_html__('Center', 'havnor'),
          'left-align' => esc_html__('Left', 'havnor'),
          'right-align' => esc_html__('Right', 'havnor'),
        ),
        'dependency'  => array('footer_widget_layout_1', '==', true),
      ),
      array(
        'id'    => 'dark_bg_image',
        'type'  => 'image',
        'title' => esc_html__('Footer Background', 'havnor'),

        'add_title' => esc_html__('Add Footer Background ', 'havnor'),
      ),
       // Copyright
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Copyright Layout', 'havnor'),
      ),
      array(
        'id'    => 'need_copyright',
        'type'  => 'switcher',
        'title' => esc_html__('Enable Copyright Section', 'havnor'),
        'default' => true,
      ),
      array(
        'id'    => 'footer_copyright_layout',
        'type'  => 'image_select',
        'title' => esc_html__('Select Copyright Layout', 'havnor'),
        'info' => esc_html__('In above image, blue box is copyright text and yellow box is secondary text.', 'havnor'),
        'default'      => 'copyright-3',
        'options'      => array(
          'copyright-1'    => HAVNOR_CS_IMAGES .'/footer/copyright-1.png',
          'copyright-2'    => HAVNOR_CS_IMAGES .'/footer/copyright-2.png',
          'copyright-3'    => HAVNOR_CS_IMAGES .'/footer/copyright-3.png',
          ),
        'radio'        => true,
        'dependency'     => array('need_copyright', '==', true),
      ),
      array(
        'id'    => 'copyright_text',
        'type'  => 'textarea',
        'title' => esc_html__('Copyright Text', 'havnor'),
        'shortcode' => true,
        'dependency' => array('need_copyright', '==', true),
        'after'       => 'Helpful shortcodes: [vt_current_year] [vt_home_url] or any shortcode.',
      ),

      // Copyright Another Text
      array(
        'type'    => 'notice',
        'class'   => 'warning cs-vt-heading',
        'content' => esc_html__('Copyright Secondary Text', 'havnor'),
        'dependency'     => array('need_copyright', '==', true),
      ),
      array(
        'id'    => 'secondary_text',
        'type'  => 'textarea',
        'title' => esc_html__('Secondary Text', 'havnor'),
        'shortcode' => true,
        'dependency' => array('need_copyright', '==', 'true'),
      ),
    ),
  );

  // ------------------------------
  // Design
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_design',
    'title'  => esc_html__('Design', 'havnor'),
    'icon'   => 'fa fa-magic'
  );

  // ------------------------------
  // color section
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_color_section',
    'title'    => esc_html__('Colors', 'havnor'),
    'icon'     => 'fa fa-eyedropper',
    'fields' => array(

      array(
        'type'    => 'heading',
        'content' => esc_html__('Color Options', 'havnor'),
      ),
      array(
        'type'    => 'subheading',
        'wrap_class' => 'color-tab-content',
        'content' => esc_html__('All color options are available in our theme customizer. The reason of we used customizer options for color section is because, you can choose each part of color from there and see the changes instantly using customizer. Highly customizable colors are in Appearance > Customize', 'havnor'),
      ),

    ),
  );

  // ------------------------------
  // Typography section
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_typo_section',
    'title'    => esc_html__('Typography', 'havnor'),
    'icon'     => 'fa fa-header',
    'fields' => array(

      // Start fields
      array(
        'id'                  => 'typography',
        'type'                => 'group',
        'fields'              => array(
          array(
            'id'              => 'title',
            'type'            => 'text',
            'title'           => esc_html__('Title', 'havnor'),
          ),
          array(
            'id'              => 'selector',
            'type'            => 'textarea',
            'title'           => esc_html__('Selector', 'havnor'),
            'info'           => esc_html__('Enter css selectors like : body, .custom-class', 'havnor'),
          ),
          array(
            'id'              => 'font',
            'type'            => 'typography',
            'title'           => esc_html__('Font Family', 'havnor'),
          ),
          array(
            'id'              => 'css',
            'type'            => 'textarea',
            'title'           => esc_html__('Custom CSS', 'havnor'),
          ),
        ),
        'button_title'        => esc_html__('Add New Typography', 'havnor'),
        'accordion_title'     => esc_html__('New Typography', 'havnor'),
        'default'             => array(
          array(
            'title'           => esc_html__('Body Typography', 'havnor'),
            'selector'        => 'body',
            'font'            => array(
              'family'        => 'Montserrat',
              'variant'       => 'regular',
            ),
          ),
          array(
            'title'           => esc_html__('Menu Typography', 'havnor'),
            'selector'        => '.hanor-navigation, .hanor-navigation > ul > li, .mean-container .mean-nav ul li a',
            'font'            => array(
              'family'        => 'Montserrat',
              'variant'       => 'regular',
            ),
          ),
          array(
            'title'           => esc_html__('Sub Menu Typography', 'havnor'),
            'selector'        => '.dropdown-nav > li, .dropdown-nav, .mean-container .mean-nav ul.sub-menu li a',
            'font'            => array(
              'family'        => 'Montserrat',
              'variant'       => 'regular',
            ),
          ),
          array(
            'title'           => esc_html__('Headings Typography', 'havnor'),
            'selector'        => 'h1, h2, h3, h4, h5, h6, .hanor-location-name, .text-logo, .hanor-team-intro .member-details h3, h2.quote-title p',
            'font'            => array(
              'family'        => 'Montserrat',
              'variant'       => 'regular',
            ),
          ),
          array(
            'title'           => esc_html__('Shortcode Elements Primary Font', 'havnor'),
            'selector'        => 'body, input[type="submit"], .hanor-btn, .blogs-style-two .blog-meta .blog-author-name, .hanor-dark-topbar .hanor-topbar ul, .hanor-gray-topbar .hanor-topbar ul, .portfolio-detail-item-title, .hanor-countdown .countdown_section, .hanor-countdown .countdown_amount, .otw-button-wrap input.otw-submit, .woocommerce ul.product_list_widget li a',
            'font'            => array(
              'family'        => 'Montserrat',
              'variant'       => 'regular',
            ),
          ),
          array(
            'title'           => esc_html__('Shortcode Elements Secondary Font', 'havnor'),
            'selector'        => 'input[type="text"], input[type="email"], input[type="password"], input[type="tel"], input[type="search"], input[type="date"], input[type="time"], input[type="datetime-local"], input[type="month"], input[type="url"], input[type="number"], textarea, select, .form-control, p, .hanor-blog-excerpt, .video-btn-title, .story-meta, .blog-meta, .hanor-footer ul, .text-italic, .stats-title, .mate-designation, .work-category, .offer-alert, .process-counter, .hanor-topbar .pull-left ul, .plan-info ul, .sidebar-nav-wrap .hanor-copyright, .story-date, .hanor-pagination, .my-designation, .masonry-filters, .work-subtitle, .portfolio-detail-items-wrap, .post-time, .hanor-comments-area .hanor-comments-meta .comments-date, .hanor-comments-area .comments-reply, .service-toggle-content ul li, .hanor-callout p, .work-detail-wrap h5, .hanor-feature .feature-content, .woocommerce ul.products li.product .price, span.woocommerce-Price-amount.amount, .woocommerce table.shop_table .cart_item td .amount, .woocommerce table.woocommerce-checkout-review-order-table tfoot td, .tooltip, .unordered-list, .qty, .product_meta span, .woocommerce-review-link, .woocommerce table.shop_attributes tr, .woocommerce-Reviews .comment-form-rating',
            'font'            => array(
              'family'        => 'Source Sans Pro',
              'variant'       => 'regular',
            ),
          ),
          array(
            'title'           => esc_html__('Example Usage', 'havnor'),
            'selector'        => '.your-custom-class',
            'font'            => array(
              'family'        => 'Montserrat',
              'variant'       => 'regular',
            ),
          ),
        ),
      ),

      // Subset
      array(
        'id'                  => 'subsets',
        'type'                => 'select',
        'title'               => esc_html__('Subsets', 'havnor'),
        'class'               => 'chosen',
        'options'             => array(
          'latin'             => 'latin',
          'latin-ext'         => 'latin-ext',
          'cyrillic'          => 'cyrillic',
          'cyrillic-ext'      => 'cyrillic-ext',
          'greek'             => 'greek',
          'greek-ext'         => 'greek-ext',
          'vietnamese'        => 'vietnamese',
          'devanagari'        => 'devanagari',
          'khmer'             => 'khmer',
        ),
        'attributes'         => array(
          'data-placeholder' => 'Subsets',
          'multiple'         => 'multiple',
          'style'            => 'width: 200px;'
        ),
        'default'             => array( 'latin' ),
      ),

      array(
        'id'                  => 'font_weight',
        'type'                => 'select',
        'title'               => esc_html__('Font Weights', 'havnor'),
        'class'               => 'chosen',
        'options'             => array(
          '300'   => 'Light 300',
          '400'   => 'Regular 400',
          '500'   => 'Medium 500',
          '600'   => 'Semi Bold 600',
          '700'   => 'Bold 700',
          '800'   => 'Extra Bold 800',
        ),
        'attributes'         => array(
          'data-placeholder' => 'Font Weight',
          'multiple'         => 'multiple',
          'style'            => 'width: 200px;'
        ),
        'default'             => array( '300', '400', '500', '600', '700', '800' ),
      ),

      // Custom Fonts Upload
      array(
        'id'                 => 'font_family',
        'type'               => 'group',
        'title'              => 'Upload Custom Fonts',
        'button_title'       => 'Add New Custom Font',
        'accordion_title'    => 'Adding New Font',
        'accordion'          => true,
        'desc'               => 'It is simple. Only add your custom fonts and click to save. After you can check "Font Family" selector. Do not forget to Save!',
        'fields'             => array(

          array(
            'id'             => 'name',
            'type'           => 'text',
            'title'          => 'Font-Family Name',
            'attributes'     => array(
              'placeholder'  => 'for eg. Arial'
            ),
          ),

          array(
            'id'             => 'ttf',
            'type'           => 'upload',
            'title'          => 'Upload .ttf <small><i>(optional)</i></small>',
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => 'Use this Font-Format',
              'button_title' => 'Upload <i>.ttf</i>',
            ),
          ),

          array(
            'id'             => 'eot',
            'type'           => 'upload',
            'title'          => 'Upload .eot <small><i>(optional)</i></small>',
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => 'Use this Font-Format',
              'button_title' => 'Upload <i>.eot</i>',
            ),
          ),

          array(
            'id'             => 'otf',
            'type'           => 'upload',
            'title'          => 'Upload .otf <small><i>(optional)</i></small>',
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => 'Use this Font-Format',
              'button_title' => 'Upload <i>.otf</i>',
            ),
          ),

          array(
            'id'             => 'woff',
            'type'           => 'upload',
            'title'          => 'Upload .woff <small><i>(optional)</i></small>',
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => 'Use this Font-Format',
              'button_title' => 'Upload <i>.woff</i>',
            ),
          ),

          array(
            'id'             => 'css',
            'type'           => 'textarea',
            'title'          => 'Extra CSS Style <small><i>(optional)</i></small>',
            'attributes'     => array(
              'placeholder'  => 'for eg. font-weight: normal;'
            ),
          ),

        ),
      ),
      // End All field

    ),
  );

  // ------------------------------
  // Pages
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_pages',
    'title'  => esc_html__('Pages', 'havnor'),
    'icon'   => 'fa fa-files-o'
  );

  // ------------------------------
  // Portfolio Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'portfolio_section',
    'title'    => esc_html__('Portfolio', 'havnor'),
    'icon'     => 'fa fa-briefcase',
    'fields' => array(

      // portfolio name change
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Name Change', 'havnor')
      ),
      array(
        'id'      => 'theme_portfolio_name',
        'type'    => 'text',
        'title'   => esc_html__('Portfolio Name', 'havnor'),
        'attributes'     => array(
          'placeholder'  => 'Portfolio'
        ),
      ),
      array(
        'id'      => 'theme_portfolio_slug',
        'type'    => 'text',
        'title'   => esc_html__('Portfolio Slug', 'havnor'),
        'attributes'     => array(
          'placeholder'  => 'portfolio-item'
        ),
      ),
      array(
        'id'      => 'theme_portfolio_cat_slug',
        'type'    => 'text',
        'title'   => esc_html__('Portfolio Category Slug', 'havnor'),
        'attributes'     => array(
          'placeholder'  => 'portfolio-category'
        ),
      ),
      array(
        'type'    => 'notice',
        'class'   => 'danger',
        'content' => esc_html__('Important: Please do not set portfolio slug and page slug as same. It\'ll not work.', 'havnor')
      ),
      // Portfolio Name

      // portfolio listing
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Portfolio Style', 'havnor')
      ),
      array(
        'id'             => 'portfolio_style',
        'type'           => 'select',
        'title'          => esc_html__('Portfolio Style', 'havnor'),
        'options'        => array(
          'one' => esc_html__('Style One (Grid)', 'havnor'),
          'two' => esc_html__('Style Two (Grid)', 'havnor'),
          'three' => esc_html__('Style Three (Masonry)', 'havnor'),
        ),
        'default_option'     => esc_html__('Select Portfolio Style', 'havnor'),
      ),
      array(
        'id'             => 'portfolio_column',
        'type'           => 'select',
        'title'          => esc_html__('Portfolio Column', 'havnor'),
        'options'        => array(
          '3' => esc_html__('Three Columns', 'havnor'),
          '2' => esc_html__('Two Columns', 'havnor'),
        ),
        'default_option'     => esc_html__('Select Portfolio Column', 'havnor'),
      ),
      array(
        'id'      => 'portfolio_limit',
        'type'    => 'text',
        'title'   => esc_html__('Portfolio Limit', 'havnor'),
        'attributes'     => array(
          'placeholder'  => '10'
        ),
      ),
      array(
        'id'      => 'portfolio_show_category',
        'type'    => 'text',
        'title'   => esc_html__('Portfolio Categorys', 'havnor'),
        'info'   => esc_html__('Enter category SLUGS (comma separated) you want to display.', 'havnor'),
      ),
      array(
        'id'             => 'portfolio_orderby',
        'type'           => 'select',
        'title'          => esc_html__('Order By', 'havnor'),
        'options'        => array(
          'none' => esc_html__('None', 'havnor'),
          'ID' => esc_html__('ID', 'havnor'),
          'author' => esc_html__('Author', 'havnor'),
          'title' => esc_html__('Title', 'havnor'),
          'date' => esc_html__('Date', 'havnor'),
          'name' => esc_html__('Name', 'havnor'),
          'modified' => esc_html__('Modified', 'havnor'),
          'rand' => esc_html__('Random', 'havnor'),
          'menu_order' => esc_html__('Menu Order', 'havnor'),
        ),
        'default_option'     => esc_html__('Select Portfolio Order By', 'havnor'),
      ),
      array(
        'id'             => 'portfolio_order',
        'type'           => 'select',
        'title'          => esc_html__('Order', 'havnor'),
        'options'        => array(
          'ASC' => esc_html__('Asending', 'havnor'),
          'DESC' => esc_html__('Desending', 'havnor'),
        ),
        'default_option'     => esc_html__('Select Portfolio Order', 'havnor'),
      ),

      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Enable/Disable Options', 'havnor')
      ),
      array(
        'id'      => 'portfolio_filter',
        'type'    => 'switcher',
        'title'   => esc_html__('Filter', 'havnor'),
        'label'   => esc_html__('If you need filter in portfolio pages, please turn this ON.', 'havnor'),
        'default'   => true,
      ),
      array(
        'id'      => 'portfolio_pagination',
        'type'    => 'switcher',
        'title'   => esc_html__('Pagination', 'havnor'),
        'label'   => esc_html__('If you need pagination in portfolio pages, please turn this ON.', 'havnor'),
        'default'   => true,
      ),

      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Single Portfolio', 'havnor')
      ),
      array(
        "id"  => "portfolio_date_format",
        "type"        => 'text',
        "title"     => esc_html__('Date Format', 'havnor'),
        "info" => esc_html__( "Enter date format (for more info <a href='https://codex.wordpress.org/Formatting_Date_and_Time' target='_blank'>click here</a>).", 'havnor')
      ),
      array(
        'id'             => 'port_sidebar_type',
        'type'           => 'select',
        'title'          => esc_html__('Sidebar Scrolling Style', 'havnor'),
        'options'        => array(
          'normal'       => esc_html__('Normal', 'havnor'),
          'bar-sticky'   => esc_html__('Sticky', 'havnor'),
          'bar-float'    => esc_html__('Floating', 'havnor'),
        ),
        'default_option' => 'Select Sidebar Style',
      ),
      array(
        'id'      => 'portfolio_home_link',
        'type'    => 'text',
        'title'   => esc_html__('Portfolio Home Link', 'havnor'),
        'info'   => esc_html__('Enter link to pagination section grid.', 'havnor'),
      ),
      array(
        'id'      => 'portfolio_single_pagination',
        'type'    => 'switcher',
        'title'   => esc_html__('Next & Prev Navigation', 'havnor'),
        'label'   => esc_html__('If you don\'t want next and previous navigation in portfolio single pages, please turn this OFF.', 'havnor'),
        'default'   => true,
      ),
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Related Projects', 'havnor')
      ),
      array(
        'id'      => 'portfolio_need_related',
        'type'    => 'switcher',
        'title'   => esc_html__('Need Related Projects', 'havnor'),
        'label'   => esc_html__('If you need related projects in portfolio single pages, please turn this ON.', 'havnor'),
        'default'   => true,
      ),
      array(
        'id'      => 'portfolio_related_title',
        'type'    => 'text',
        'title'   => esc_html__('Portfolio Related Projects Title', 'havnor'),
        'info'   => esc_html__('Enter related projects title.', 'havnor'),
        'dependency'     => array('portfolio_need_related', '==', 'true'),
      ),
      array(
        'id'      => 'portfolio_related_content',
        'type'    => 'textarea',
        'title'   => esc_html__('Portfolio Related Projects Content', 'havnor'),
        'info'   => esc_html__('Enter related projects content.', 'havnor'),
        'dependency'     => array('portfolio_need_related', '==', 'true'),
      ),
      array(
        'id'      => 'portfolio_related_loop',
        'type'    => 'switcher',
        'title'   => esc_html__('Need Loop?', 'havnor'),
        'default'   => true,
        'dependency'     => array('portfolio_need_related', '==', 'true'),
      ),
      array(
        'id'      => 'portfolio_related_items',
        'type'    => 'text',
        'title'   => esc_html__('Portfolio Items', 'havnor'),
        'info'   => esc_html__('Enter number of related projects items to show.', 'havnor'),
        'dependency'     => array('portfolio_need_related', '==', 'true'),
      ),
      array(
        'id'      => 'portfolio_related_nav',
        'type'    => 'switcher',
        'title'   => esc_html__('Need Navigation?', 'havnor'),
        'dependency'     => array('portfolio_need_related', '==', 'true'),
      ),
      array(
        'id'      => 'portfolio_related_dot',
        'type'    => 'switcher',
        'title'   => esc_html__('Need Dots?', 'havnor'),
        'dependency'     => array('portfolio_need_related', '==', 'true'),
      ),
      array(
        'id'      => 'portfolio_related_drag',
        'type'    => 'switcher',
        'title'   => esc_html__('Mouse Drag?', 'havnor'),
        'dependency'     => array('portfolio_need_related', '==', 'true'),
      ),
      // Portfolio Listing

    ),
  );

  // ------------------------------
  // Job Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'job_section',
    'title'    => esc_html__('Job', 'havnor'),
    'icon'     => 'fa fa-black-tie',
    'fields' => array(

      // job name change
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Name Change', 'havnor')
      ),
      array(
        'id'      => 'theme_job_name',
        'type'    => 'text',
        'title'   => esc_html__('Job Name', 'havnor'),
        'attributes'     => array(
          'placeholder'  => 'Job'
        ),
      ),
      array(
        'id'      => 'theme_job_slug',
        'type'    => 'text',
        'title'   => esc_html__('Job Slug', 'havnor'),
        'attributes'     => array(
          'placeholder'  => 'job-item'
        ),
      ),
      array(
        'id'      => 'theme_job_cat_slug',
        'type'    => 'text',
        'title'   => esc_html__('Job Category Slug', 'havnor'),
        'attributes'     => array(
          'placeholder'  => 'job-category'
        ),
      ),
      array(
        'type'    => 'notice',
        'class'   => 'danger',
        'content' => esc_html__('Important: Please do not set job slug and page slug as same. It\'ll not work.', 'havnor')
      ),
      // Job Name

      // job listing
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Job Style', 'havnor')
      ),
      array(
        'id'      => 'job_limit',
        'type'    => 'text',
        'title'   => esc_html__('Job Limit', 'havnor'),
        'attributes'     => array(
          'placeholder'  => '10'
        ),
      ),
      array(
        'id'      => 'view_job',
        'type'    => 'text',
        'title'   => esc_html__('View Job Button Text', 'havnor'),
      ),
      array(
        'id'      => 'job_show_category',
        'type'    => 'text',
        'title'   => esc_html__('Job Roles', 'havnor'),
        'info'   => esc_html__('Enter category SLUGS (comma separated) you want to display.', 'havnor'),
      ),
      array(
        'id'             => 'job_orderby',
        'type'           => 'select',
        'title'          => esc_html__('Order By', 'havnor'),
        'options'        => array(
          'none' => esc_html__('None', 'havnor'),
          'ID' => esc_html__('ID', 'havnor'),
          'author' => esc_html__('Author', 'havnor'),
          'title' => esc_html__('Title', 'havnor'),
          'date' => esc_html__('Date', 'havnor'),
          'name' => esc_html__('Name', 'havnor'),
          'modified' => esc_html__('Modified', 'havnor'),
          'rand' => esc_html__('Random', 'havnor'),
          'menu_order' => esc_html__('Menu Order', 'havnor'),
        ),
        'default_option'     => esc_html__('Select Job Order By', 'havnor'),
      ),
      array(
        'id'             => 'job_order',
        'type'           => 'select',
        'title'          => esc_html__('Order', 'havnor'),
        'options'        => array(
          'ASC' => esc_html__('Asending', 'havnor'),
          'DESC' => esc_html__('Desending', 'havnor'),
        ),
        'default_option'     => esc_html__('Select Job Order', 'havnor'),
      ),
      array(
        "id"  => "job_date_format",
        "type"        => 'text',
        "title"     => esc_html__('Date Format', 'havnor'),
        "info" => esc_html__( "Enter date format (for more info <a href='https://codex.wordpress.org/Formatting_Date_and_Time' target='_blank'>click here</a>).", 'havnor')
      ),

      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Enable/Disable Options', 'havnor')
      ),
      array(
        'id'      => 'job_pagination',
        'type'    => 'switcher',
        'title'   => esc_html__('Pagination', 'havnor'),
        'label'   => esc_html__('If you need pagination in job pages, please turn this ON.', 'havnor'),
        'default'   => true,
      ),
      // Job Listing

    ),
  );

  // ------------------------------
  // Testimonial Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'testimonial_section',
    'title'    => esc_html__('Testimonial', 'havnor'),
    'icon'     => 'fa fa-users',
    'fields' => array(

      // Testimonial name change
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Name Change', 'havnor')
      ),
      array(
        'id'      => 'theme_testimonial_name',
        'type'    => 'text',
        'title'   => esc_html__('Testimonial Name', 'havnor'),
        'attributes'     => array(
          'placeholder'  => 'Testimonial'
        ),
      ),
      array(
        'id'      => 'theme_testimonial_slug',
        'type'    => 'text',
        'title'   => esc_html__('Testimonial Slug', 'havnor'),
        'attributes'     => array(
          'placeholder'  => 'testimonial-item'
        ),
      ),
      array(
        'id'      => 'theme_testimonial_cat_slug',
        'type'    => 'text',
        'title'   => esc_html__('Testimonial Category Slug', 'havnor'),
        'attributes'     => array(
          'placeholder'  => 'testimonial-category'
        ),
      ),
      array(
        'type'    => 'notice',
        'class'   => 'danger',
        'content' => esc_html__('Important: Please do not set testimonial slug and page slug as same. It\'ll not work.', 'havnor')
      ),
      // Testimonial Name

      // Testimonial Start
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Testimonial Options', 'havnor')
      ),
      array(
        'id'             => 'testimonial_style',
        'type'           => 'select',
        'title'          => esc_html__('Testimonial Style', 'havnor'),
        'options'        => array(
          'testimonial_one'          => esc_html__('Style One', 'havnor'),
          'testimonial_two'          => esc_html__('Style Two', 'havnor'),
          'testimonial_three'          => esc_html__('Style Three', 'havnor'),
          'testimonial_four'          => esc_html__('Style Four', 'havnor'),
          'testimonial_five'          => esc_html__('Style Five', 'havnor'),
        ),
        'default_option' => esc_html__('Select Testimonial Style', 'havnor'),
      ),
      array(
        'id'    => 'with_image',
        'type'  => 'switcher',
        'title' => esc_html__('Featured Image', 'havnor'),
        'info' => esc_html__('If you need testimonial with features image, please turn this OFF.', 'havnor'),
        'default' => true,
        'dependency'     => array('testimonial_style', '==', 'testimonial_one'),
      ),
      array(
        'id'      => 'testi_title',
        'type'    => 'text',
        'title'   => esc_html__('Testimonial Title', 'havnor'),
        'dependency'     => array('testimonial_style', 'any', 'testimonial_four,testimonial_two'),
      ),
      array(
        'id'             => 'image_align_style',
        'type'           => 'select',
        'title'          => esc_html__('Testimonial Image Style', 'havnor'),
        'options'        => array(
          'image-left'          => esc_html__('Image Left', 'havnor'),
          'image-top'          => esc_html__('Image Top', 'havnor'),
          'image-hide'          => esc_html__('Image Hide', 'havnor'),
        ),
        'default_option' => esc_html__('Select Testimonial image Style', 'havnor'),
        'dependency'     => array('testimonial_style', '==', 'testimonial_four'),
      ),
      array(
        'id'      => 'testimonial_limit',
        'type'    => 'text',
        'title'   => esc_html__('Testimonial Limit', 'havnor'),
        'attributes'     => array(
          'placeholder'  => '3'
        ),
      ),
      array(
        'id'             => 'testimonial_orderby',
        'type'           => 'select',
        'title'          => esc_html__('Order By', 'havnor'),
        'options'        => array(
          'none' => esc_html__('None', 'havnor'),
          'ID' => esc_html__('ID', 'havnor'),
          'author' => esc_html__('Author', 'havnor'),
          'title' => esc_html__('Title', 'havnor'),
          'date' => esc_html__('Date', 'havnor'),
          'name' => esc_html__('Name', 'havnor'),
          'modified' => esc_html__('Modified', 'havnor'),
          'rand' => esc_html__('Random', 'havnor'),
          'menu_order' => esc_html__('Menu Order', 'havnor'),
        ),
        'default_option'     => esc_html__('Select Testimonial Order By', 'havnor'),
      ),
      array(
        'id'             => 'testimonial_order',
        'type'           => 'select',
        'title'          => esc_html__('Order', 'havnor'),
        'options'        => array(
          'ASC' => esc_html__('Asending', 'havnor'),
          'DESC' => esc_html__('Desending', 'havnor'),
        ),
        'default_option'     => esc_html__('Select Testimonial Order', 'havnor'),
      ),
      // Testimonial End

    ),
  );

  // ------------------------------
  // Team Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'team_section',
    'title'    => esc_html__('Team', 'havnor'),
    'icon'     => 'fa fa-users',
    'fields' => array(

      // Team name change
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Name Change', 'havnor')
      ),
      array(
        'id'      => 'theme_team_name',
        'type'    => 'text',
        'title'   => esc_html__('Team Name', 'havnor'),
        'attributes'     => array(
          'placeholder'  => 'Team'
        ),
      ),
      array(
        'id'      => 'theme_team_slug',
        'type'    => 'text',
        'title'   => esc_html__('Team Slug', 'havnor'),
        'attributes'     => array(
          'placeholder'  => 'team-item'
        ),
      ),
      array(
        'id'      => 'theme_team_cat_slug',
        'type'    => 'text',
        'title'   => esc_html__('Team Category Slug', 'havnor'),
        'attributes'     => array(
          'placeholder'  => 'team-category'
        ),
      ),
      array(
        'type'    => 'notice',
        'class'   => 'danger',
        'content' => esc_html__('Important: Please do not set team slug and page slug as same. It\'ll not work.', 'havnor')
      ),
      // Team Name

      // Team Start
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Team Options', 'havnor')
      ),
      array(
        'id'      => 'team_limit',
        'type'    => 'text',
        'title'   => esc_html__('Team Limit', 'havnor'),
        'attributes'     => array(
          'placeholder'  => '8'
        ),
      ),
      array(
        'id'             => 'team_orderby',
        'type'           => 'select',
        'title'          => esc_html__('Order By', 'havnor'),
        'options'        => array(
          'none' => esc_html__('None', 'havnor'),
          'ID' => esc_html__('ID', 'havnor'),
          'author' => esc_html__('Author', 'havnor'),
          'title' => esc_html__('Title', 'havnor'),
          'date' => esc_html__('Date', 'havnor'),
          'name' => esc_html__('Name', 'havnor'),
          'modified' => esc_html__('Modified', 'havnor'),
          'rand' => esc_html__('Random', 'havnor'),
          'menu_order' => esc_html__('Menu Order', 'havnor'),
        ),
        'default_option'     => esc_html__('Select Team Order By', 'havnor'),
      ),
      array(
        'id'             => 'team_order',
        'type'           => 'select',
        'title'          => esc_html__('Order', 'havnor'),
        'options'        => array(
          'ASC' => esc_html__('Asending', 'havnor'),
          'DESC' => esc_html__('Desending', 'havnor'),
        ),
        'default_option'     => esc_html__('Select Team Order', 'havnor'),
      ),
      array(
        'id'             => 'team_style',
        'type'           => 'select',
        'title'          => esc_html__('Team Style', 'havnor'),
        'options'        => array(
          'one'          => esc_html__('Style One (Square)', 'havnor'),
          'two'          => esc_html__('Style Two (Circle)', 'havnor'),
        ),
        'default_option' => esc_html__('Select Team Style', 'havnor'),
      ),
      array(
        'id'             => 'team_column',
        'type'           => 'select',
        'title'          => esc_html__('Team Column', 'havnor'),
        'options'        => array(
          '4' => esc_html__('Four Columns', 'havnor'),
          '3' => esc_html__('Three Columns', 'havnor'),
        ),
        'default_option' => esc_html__('Select Team Column', 'havnor'),
        'dependency'     => array('team_style', '!=', 'three'),
      ),
      array(
        'id'    => 'team_pagination',
        'type'  => 'switcher',
        'title' => esc_html__('Pagination', 'havnor'),
        'info' => esc_html__('If you need pagination in team global pages, please turn this ON.', 'havnor'),
      ),
      // Team End

    ),
  );

  // ------------------------------
  // Blog Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'blog_section',
    'title'    => esc_html__('Blog', 'havnor'),
    'icon'     => 'fa fa-edit',
    'sections' => array(

      // blog general section
      array(
        'name'     => 'blog_general_tab',
        'title'    => esc_html__('General', 'havnor'),
        'icon'     => 'fa fa-cog',
        'fields'   => array(

          // Layout
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Layout', 'havnor')
          ),
          array(
            'id'             => 'blog_listing_style',
            'type'           => 'select',
            'title'          => esc_html__('Blog Listing Style', 'havnor'),
            'options'        => array(
              'style-one'   => esc_html__('Style One (List)', 'havnor'),
              'style-two'   => esc_html__('Style Two (Updates)', 'havnor'),
              'style-three' => esc_html__('Style Three (Grid)', 'havnor'),
              'style-four' => esc_html__('Style Four (Morden)', 'havnor'),
              'style-five' => esc_html__('Style Five (Creative)', 'havnor'),
            ),
            // 'default_option' => 'Select blog style',
            'help'          => esc_html__('This style will apply, default blog pages - Like : Archive, Category, Tags, Search & Author. If this settings will not apply your blog page, please set that page as a post page in Settings > Readings.', 'havnor'),
          ),
          array(
            'id'             => 'blog_listing_columns',
            'type'           => 'select',
            'title'          => esc_html__('Blog Listing Columns', 'havnor'),
            'options'        => array(
              'col-2' => esc_html__('Column Two', 'havnor'),
              'col-3' => esc_html__('Column Three', 'havnor'),
            ),
            'default_option' => 'Select blog column',
            'dependency'     => array('blog_listing_style', '!=', 'style-one'),
          ),
          array(
            'id'             => 'blog_sidebar_position',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Position', 'havnor'),
            'options'        => array(
              'sidebar-right' => esc_html__('Right', 'havnor'),
              'sidebar-left' => esc_html__('Left', 'havnor'),
              'sidebar-hide' => esc_html__('Hide', 'havnor'),
            ),
            'default_option' => 'Select sidebar position',
            'help'          => esc_html__('This style will apply, default blog pages - Like : Archive, Category, Tags, Search & Author.', 'havnor'),
            'info'          => esc_html__('Default option : Right', 'havnor'),
          ),
          array(
            'id'             => 'blog_widget',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Widget', 'havnor'),
            'options'        => havnor_vt_registered_sidebars(),
            'default_option' => esc_html__('Select Widget', 'havnor'),
            'dependency'     => array('blog_sidebar_position', '!=', 'sidebar-hide'),
            'info'          => esc_html__('Default option : Main Widget Area', 'havnor'),
          ),
          array(
            'id'             => 'sidebar_type',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Style', 'havnor'),
            'options'        => array(
              'normal'       => esc_html__('Normal', 'havnor'),
              'bar-sticky'   => esc_html__('Sticky', 'havnor'),
              'bar-float'    => esc_html__('Floating', 'havnor'),
            ),
            'default_option' => 'Select Sidebar Style',
            'dependency'     => array('blog_sidebar_position', '!=', 'sidebar-hide'),
          ),
          // Layout
          // Global Options
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Global Options', 'havnor')
          ),
          array(
            'id'         => 'theme_exclude_categories',
            'type'       => 'checkbox',
            'title'      => esc_html__('Exclude Categories', 'havnor'),
            'info'      => esc_html__('Select categories you want to exclude from blog page.', 'havnor'),
            'options'    => 'categories',
          ),
          array(
            'id'      => 'theme_blog_excerpt',
            'type'    => 'text',
            'title'   => esc_html__('Excerpt Length', 'havnor'),
            'info'   => esc_html__('Blog short content length, in blog listing pages.', 'havnor'),
            'default' => '35',
          ),
          array(
            'id'      => 'blog_pagination_style',
            'type'    => 'select',
            'title'   => esc_html__('Blog Pagination', 'havnor'),
            'options'        => array(
              'navigation' => esc_html__('Navigation', 'havnor'),
              'load-more' => esc_html__('Ajax Button', 'havnor'),
              'infinite-scroll' => esc_html__('Ajax Infinite Scroll', 'havnor'),
            ),
            'info'          => esc_html__('Default : Navigation', 'havnor'),
          ),
          array(
            'id'      => 'blog_load_more_btn_txt',
            'type'    => 'text',
            'title'   => esc_html__('Load More Button Text', 'havnor'),
            'dependency'     => array('blog_pagination_style', '==', 'load-more'),
          ),
          array(
            'id'      => 'theme_metas_hide',
            'type'    => 'checkbox',
            'title'   => esc_html__('Meta\'s to hide', 'havnor'),
            'info'    => esc_html__('Check items you want to hide from blog/post meta field.', 'havnor'),
            'class'      => 'horizontal',
            'options'    => array(
              'category'   => esc_html__('Category', 'havnor'),
              'date'    => esc_html__('Date', 'havnor'),
              'author'     => esc_html__('Author', 'havnor'),
              'comments'      => esc_html__('Comments', 'havnor'),
            ),
            // 'default' => '30',
          ),
          array(
            "id"  => "blog_date_format",
            "type"        => 'text',
            "title"     => esc_html__('Date Format', 'havnor'),
            "info" => esc_html__( "Enter date format (for more info <a href='https://codex.wordpress.org/Formatting_Date_and_Time' target='_blank'>click here</a>).", 'havnor')
          ),
          // End fields

        )
      ),

      // blog single section
      array(
        'name'     => 'blog_single_tab',
        'title'    => esc_html__('Single', 'havnor'),
        'icon'     => 'fa fa-sticky-note',
        'fields'   => array(

          // Start fields
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Enable / Disable', 'havnor')
          ),
          array(
            'id'    => 'single_featured_image',
            'type'  => 'switcher',
            'title' => esc_html__('Featured Image', 'havnor'),
            'info' => esc_html__('If need to hide featured image from single blog post page, please turn this OFF.', 'havnor'),
            'default' => true,
          ),
          array(
            'id'    => 'single_tag_list',
            'type'  => 'switcher',
            'title' => esc_html__('Tags', 'havnor'),
            'info' => esc_html__('If need to hide tags from single blog post page, please turn this OFF.', 'havnor'),
            'default' => true,
          ),
          array(
            'id'    => 'single_category_list',
            'type'  => 'switcher',
            'title' => esc_html__('Category', 'havnor'),
            'info' => esc_html__('If need to hide category from single blog post page, please turn this OFF.', 'havnor'),
            'default' => true,
          ),
          array(
            'id'    => 'single_share_option',
            'type'  => 'switcher',
            'title' => esc_html__('Share Option', 'havnor'),
            'info' => esc_html__('If need to hide share option on single blog page, please turn this OFF.', 'havnor'),
            'default' => true,
          ),
          array(
            'id'    => 'single_author_info',
            'type'  => 'switcher',
            'title' => esc_html__('Author Info', 'havnor'),
            'info' => esc_html__('If need to hide author info on single blog page, please turn this OFF.', 'havnor'),
            'default' => true,
          ),
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Related Posts', 'havnor')
          ),
          array(
            'id'    => 'single_related_post',
            'type'  => 'switcher',
            'title' => esc_html__('Related Posts', 'havnor'),
            'info' => esc_html__('If need to hide related posts on single blog page, please turn this OFF.', 'havnor'),
            'default' => true,
          ),
          array(
            'id'      => 'single_related_title',
            'type'    => 'text',
            'title'   => esc_html__('Section Title', 'havnor'),
            'info'   => esc_html__('Related post section title.', 'havnor'),
            'dependency'     => array('single_related_post', '==', 'true'),
          ),
          array(
            'id'      => 'single_related_limit',
            'type'    => 'text',
            'title'   => esc_html__('Post Limit', 'havnor'),
            'info'   => esc_html__('Related post limit, in single blog page.', 'havnor'),
            'default' => '2',
            'dependency'     => array('single_related_post', '==', 'true'),
          ),
          array(
            'id'      => 'single_related_more',
            'type'    => 'text',
            'title'   => esc_html__('Read More', 'havnor'),
            'info'   => esc_html__('Related post read more text.', 'havnor'),
            'dependency'     => array('single_related_post', '==', 'true'),
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Sidebar', 'havnor')
          ),
          array(
            'id'             => 'single_sidebar_position',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Position', 'havnor'),
            'options'        => array(
              'sidebar-right' => esc_html__('Right', 'havnor'),
              'sidebar-left' => esc_html__('Left', 'havnor'),
              'sidebar-hide' => esc_html__('Hide', 'havnor'),
            ),
            'default_option' => 'Select sidebar position',
            'info'          => esc_html__('Default option : Right', 'havnor'),
          ),
          array(
            'id'             => 'single_blog_widget',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Widget', 'havnor'),
            'options'        => havnor_vt_registered_sidebars(),
            'default_option' => esc_html__('Select Widget', 'havnor'),
            'dependency'     => array('single_sidebar_position', '!=', 'sidebar-hide'),
            'info'          => esc_html__('Default option : Main Widget Area', 'havnor'),
          ),
          array(
            'id'             => 'single_sidebar_type',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Style', 'havnor'),
            'options'        => array(
              'normal'       => esc_html__('Normal', 'havnor'),
              'bar-sticky'   => esc_html__('Sticky', 'havnor'),
              'bar-float'    => esc_html__('Floating', 'havnor'),
            ),
            'default_option' => 'Select Sidebar Style',
            'dependency'     => array('single_sidebar_position', '!=', 'sidebar-hide'),
          ),
          // End fields

        )
      ),

    ),
  );

if (class_exists( 'WooCommerce' )){
  // ------------------------------
  // WooCommerce Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'woocommerce_section',
    'title'    => esc_html__('WooCommerce', 'havnor'),
    'icon'     => 'fa fa-shopping-cart',
    'fields' => array(

      // Start fields
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Layout', 'havnor')
      ),
      array(
        'id'             => 'woo_product_columns',
        'type'           => 'select',
        'title'          => esc_html__('Product Column', 'havnor'),
        'options'        => array(
          3 => esc_html__('Three Column', 'havnor'),
          4 => esc_html__('Four Column', 'havnor'),
        ),
        'default_option' => esc_html__('Select Product Columns', 'havnor'),
        'help'          => esc_html__('This style will apply, default woocommerce listings pages. Like, shop and archive pages.', 'havnor'),
      ),
      array(
        'id'             => 'woo_sidebar_position',
        'type'           => 'select',
        'title'          => esc_html__('Sidebar Position', 'havnor'),
        'options'        => array(
          'right-sidebar' => esc_html__('Right', 'havnor'),
          'left-sidebar' => esc_html__('Left', 'havnor'),
          'sidebar-hide' => esc_html__('Hide', 'havnor'),
        ),
        'default_option' => esc_html__('Select sidebar position', 'havnor'),
        'info'          => esc_html__('Default option : Right', 'havnor'),
      ),
      array(
        'id'             => 'woo_widget',
        'type'           => 'select',
        'title'          => esc_html__('Sidebar Widget', 'havnor'),
        'options'        => havnor_vt_registered_sidebars(),
        'default_option' => esc_html__('Select Widget', 'havnor'),
        'dependency'     => array('woo_sidebar_position', '!=', 'sidebar-hide'),
        'info'          => esc_html__('Select woocommerce page widget', 'havnor'),
      ),

      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Listing', 'havnor')
      ),
      array(
        'id'      => 'theme_woo_limit',
        'type'    => 'text',
        'title'   => esc_html__('Product Limit', 'havnor'),
        'info'   => esc_html__('Enter the number value for per page products limit.', 'havnor'),
      ),
      array(
        'id'      => 'theme_align_height',
        'type'    => 'text',
        'title'   => esc_html__('Have Alignment Space?', 'havnor'),
        'info'   => esc_html__('Set minimun height of each products here. Current minimum height is 100px', 'havnor'),
      ),
      // End fields

      // Start fields
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Single Product', 'havnor')
      ),
      array(
        'id'             => 'woo_related_limit',
        'type'           => 'text',
        'title'          => esc_html__('Related Products Limit', 'havnor'),
      ),
      array(
        'id'    => 'woo_single_upsell',
        'type'  => 'switcher',
        'title' => esc_html__('You May Also Like', 'havnor'),
        'info' => esc_html__('If you don\'t want \'You May Also Like\' products in single product page, please turn this ON.', 'havnor'),
        'default' => false,
      ),
      array(
        'id'    => 'woo_single_related',
        'type'  => 'switcher',
        'title' => esc_html__('Related Products', 'havnor'),
        'info' => esc_html__('If you don\'t want \'Related Products\' in single product page, please turn this ON.', 'havnor'),
        'default' => false,
      ),
      // End fields

    ),
  );
}

  // ------------------------------
  // Extra Pages
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_extra_pages',
    'title'    => esc_html__('Extra Pages', 'havnor'),
    'icon'     => 'fa fa-clone',
    'sections' => array(

      // error 404 page
      array(
        'name'     => 'error_page_section',
        'title'    => esc_html__('404 Page', 'havnor'),
        'icon'     => 'fa fa-exclamation-triangle',
        'fields'   => array(

          // Start 404 Page
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('404 Page', 'havnor')
          ),
          array(
            'id'             => 'error_page',
            'type'           => 'select',
            'title'          => esc_html__('Error Page', 'havnor'),
            'options'        => 'pages',
            'default_option' => esc_html__('Select a page', 'havnor'),
          ),
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('404 Error Page Options', 'havnor')
          ),
          array(
            'id'    => 'error_title',
            'type'  => 'text',
            'title' => esc_html__('404 Text', 'havnor'),
            'info'  => esc_html__('Enter 404 text here.', 'havnor'),
          ),
          array(
            'id'    => 'error_heading',
            'type'  => 'text',
            'title' => esc_html__('404 Page Heading', 'havnor'),
            'info'  => esc_html__('Enter 404 page heading.', 'havnor'),
          ),
          array(
            'id'    => 'error_page_content',
            'type'  => 'textarea',
            'title' => esc_html__('404 Page Content', 'havnor'),
            'info'  => esc_html__('Enter 404 page content.', 'havnor'),
            'shortcode' => true,
          ),
          array(
            'id'    => 'error_page_bg',
            'type'  => 'image',
            'title' => esc_html__('404 Page Background', 'havnor'),
            'info'  => esc_html__('Choose 404 page background styles.', 'havnor'),
            'add_title' => esc_html__('Add 404 Image', 'havnor'),
          ),
          array(
            'id'    => 'error_btn_text',
            'type'  => 'text',
            'title' => esc_html__('Button Text', 'havnor'),
            'info'  => esc_html__('Enter BACK TO HOME button text. If you want to change it.', 'havnor'),
          ),
          // End 404 Page

        ) // end: fields
      ), // end: fields section

      // maintenance mode page
      array(
        'name'     => 'maintenance_mode_section',
        'title'    => esc_html__('Maintenance Mode', 'havnor'),
        'icon'     => 'fa fa-hourglass-half',
        'fields'   => array(

          // Start Maintenance Mode
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('If you turn this ON : Only Logged in users will see your pages. All other visiters will see, selected page of : Maintenance Mode Page', 'havnor')
          ),
          array(
            'id'             => 'enable_maintenance_mode',
            'type'           => 'switcher',
            'title'          => esc_html__('Maintenance Mode', 'havnor'),
            'default'        => false,
          ),
          array(
            'id'             => 'maintenance_mode_page',
            'type'           => 'select',
            'title'          => esc_html__('Maintenance Mode Page', 'havnor'),
            'options'        => 'pages',
            'default_option' => esc_html__('Select a page', 'havnor'),
            'dependency'   => array( 'enable_maintenance_mode', '==', 'true' ),
          ),
          array(
            'id'             => 'maintenance_mode_bg',
            'type'           => 'background',
            'title'          => esc_html__('Page Background', 'havnor'),
            'dependency'   => array( 'enable_maintenance_mode', '==', 'true' ),
          ),
          // End Maintenance Mode

        ) // end: fields
      ), // end: fields section

    )
  );

  // ------------------------------
  // Advanced
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_advanced',
    'title'  => esc_html__('Advanced', 'havnor'),
    'icon'   => 'fa fa-cog'
  );

  // ------------------------------
  // Misc Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'misc_section',
    'title'    => esc_html__('Misc', 'havnor'),
    'icon'     => 'fa fa-recycle',
    'sections' => array(

      // custom sidebar section
      array(
        'name'     => 'custom_sidebar_section',
        'title'    => esc_html__('Custom Sidebar', 'havnor'),
        'icon'     => 'fa fa-reorder',
        'fields'   => array(

          // start fields
          array(
            'id'              => 'custom_sidebar',
            'title'           => esc_html__('Sidebars', 'havnor'),
            'desc'            => esc_html__('Go to Appearance -> Widgets after create sidebars', 'havnor'),
            'type'            => 'group',
            'fields'          => array(
              array(
                'id'          => 'sidebar_name',
                'type'        => 'text',
                'title'       => esc_html__('Sidebar Name', 'havnor'),
              ),
              array(
                'id'          => 'sidebar_desc',
                'type'        => 'text',
                'title'       => esc_html__('Custom Description', 'havnor'),
              )
            ),
            'accordion'       => true,
            'button_title'    => esc_html__('Add New Sidebar', 'havnor'),
            'accordion_title' => esc_html__('New Sidebar', 'havnor'),
          ),
          // end fields
        )
      ),
      // custom sidebar section

      // Custom CSS/JS
      array(
        'name'        => 'custom_css_js_section',
        'title'       => esc_html__('Custom Codes', 'havnor'),
        'icon'        => 'fa fa-code',

        // begin: fields
        'fields'      => array(
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Custom JS', 'havnor')
          ),
          array(
            'id'             => 'theme_custom_js',
            'type'           => 'textarea',
            'attributes' => array(
              'rows'     => 10,
              'placeholder'     => esc_html__('Enter your JS code here...', 'havnor'),
            ),
          ),
          // End Custom CSS/JS
        ) // end: fields
      ),

      // Translation
      array(
        'name'        => 'theme_translation_section',
        'title'       => esc_html__('Translation', 'havnor'),
        'icon'        => 'fa fa-language',

        // begin: fields
        'fields'      => array(
          // Start Translation
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Common Texts', 'havnor')
          ),
          array(
            'id'          => 'read_more_text',
            'type'        => 'text',
            'title'       => esc_html__('Read More Text', 'havnor'),
          ),
          array(
            'id'          => 'share_text',
            'type'        => 'text',
            'title'       => esc_html__('Share Text', 'havnor'),
          ),
          array(
            'id'          => 'share_on_text',
            'type'        => 'text',
            'title'       => esc_html__('Share On Tooltip Text', 'havnor'),
          ),
          array(
            'id'          => 'author_text',
            'type'        => 'text',
            'title'       => esc_html__('Author Text', 'havnor'),
          ),
          array(
            'id'          => 'author_by_text',
            'type'        => 'text',
            'title'       => esc_html__('Author (By) Text', 'havnor'),
          ),
          array(
            'id'          => 'posted_on',
            'type'        => 'text',
            'title'       => esc_html__('Posted on Text(Job)', 'havnor'),
          ),
          array(
            'id'          => 'post_comment_text',
            'type'        => 'text',
            'title'       => esc_html__('Post Comment Text [Submit Button]', 'havnor'),
          ),
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Portfolio Filter', 'havnor')
          ),
          array(
            'id'          => 'all_text',
            'type'        => 'text',
            'title'       => esc_html__('All Text', 'havnor'),
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Single Post Pagination', 'havnor'),
          ),
          array(
            'id'          => 'older_post',
            'type'        => 'text',
            'title'       => esc_html__('Older Posts Text', 'havnor'),
          ),
          array(
            'id'          => 'newer_post',
            'type'        => 'text',
            'title'       => esc_html__('Newer Posts Text', 'havnor'),
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Single Portfolio Pagination', 'havnor')
          ),
          array(
            'id'          => 'prev_port',
            'type'        => 'text',
            'title'       => esc_html__('Prev Project Text', 'havnor'),
          ),
          array(
            'id'          => 'next_port',
            'type'        => 'text',
            'title'       => esc_html__('Next Project Text', 'havnor'),
          ),
          // End Translation
        ) // end: fields
      ),

    ),
  );

  // ------------------------------
  // backup                       -
  // ------------------------------
  $options[]   = array(
    'name'     => 'backup_section',
    'title'    => 'Backup',
    'icon'     => 'fa fa-shield',
    'fields'   => array(

      array(
        'type'    => 'notice',
        'class'   => 'warning',
        'content' => 'You can save your current options. Download a Backup and Import.',
      ),
      array(
        'type'    => 'backup',
      ),

    )
  );
  return $options;
}
add_filter( 'cs_framework_options', 'havnor_vt_options' );
