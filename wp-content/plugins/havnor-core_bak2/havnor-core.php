<?php
/*
Plugin Name: Havnor Core
Plugin URI: http://themeforest.net/user/VictorThemes
Description: Plugin to contain shortcodes and custom post types of the havnor theme.
Author: VictorThemes
Author URI: http://themeforest.net/user/VictorThemes/portfolio
Version: 1.9.4
Text Domain: havnor-core
*/

if( ! function_exists( 'havnor_block_direct_access' ) ) {
	function havnor_block_direct_access() {
		if( ! defined( 'ABSPATH' ) ) {
			exit( 'Forbidden' );
		}
	}
}

// Plugin URL
define( 'HAVNOR_PLUGIN_URL', plugins_url( '/', __FILE__ ) );

// Plugin PATH
define( 'HAVNOR_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'HAVNOR_PLUGIN_ASTS', HAVNOR_PLUGIN_URL . 'assets' );
define( 'HAVNOR_PLUGIN_IMGS', HAVNOR_PLUGIN_ASTS . '/images' );
define( 'HAVNOR_PLUGIN_INC', HAVNOR_PLUGIN_PATH . 'inc' );

// DIRECTORY SEPARATOR
define ( 'DS' , DIRECTORY_SEPARATOR );

// Havnor Shortcode Path
define( 'HAVNOR_SHORTCODE_BASE_PATH', HAVNOR_PLUGIN_PATH . 'visual-composer/' );
define( 'HAVNOR_SHORTCODE_PATH', HAVNOR_SHORTCODE_BASE_PATH . 'shortcodes/' );

/**
 * Check if Codestar Framework is Active or Not!
 */
function havnor_framework_active() {
  return ( defined( 'CS_VERSION' ) ) ? true : false;
}

/* VTHEME_NAME_P */
define('VTHEME_NAME_P', 'Havnor');

include_once( HAVNOR_SHORTCODE_PATH . '/about-me/about-me-options.php' );
include_once( HAVNOR_SHORTCODE_PATH . '/about-me/about-me.php' );

// Initial File
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if (is_plugin_active('havnor-core/havnor-core.php')) {

	// Custom Post Type
	require_once( HAVNOR_PLUGIN_INC . '/custom-post-type.php' );

    // Aq Resizer
  require_once( HAVNOR_PLUGIN_INC . '/aq_resizer.php' );

  if (!defined( 'CS_VERSION' )) {
    require_once( HAVNOR_PLUGIN_INC . '/theme-metabox.php' );
  }

  // Shortcodes
  require_once( HAVNOR_SHORTCODE_BASE_PATH . '/vc-setup.php' );
  require_once( HAVNOR_PLUGIN_INC . '/custom-shortcodes/theme-shortcodes.php' );
  require_once( HAVNOR_PLUGIN_INC . '/custom-shortcodes/custom-shortcodes.php' );
  require_once( HAVNOR_PLUGIN_INC . '/load-more/malinky-ajax-pagination-functions.php' );
  require_once( HAVNOR_PLUGIN_INC . '/load-more/malinky-ajax-pagination.php' );

  // Widgets
  require_once( HAVNOR_PLUGIN_INC . '/widgets/about-widget.php' );
  require_once( HAVNOR_PLUGIN_INC . '/widgets/nav-widget.php' );
  require_once( HAVNOR_PLUGIN_INC . '/widgets/recent-posts.php' );
  require_once( HAVNOR_PLUGIN_INC . '/widgets/newsletter-widget.php' );
  require_once( HAVNOR_PLUGIN_INC . '/widgets/text-widget.php' );
  require_once( HAVNOR_PLUGIN_INC . '/widgets/widget-extra-fields.php' );

}

/**
 * Plugin language
 */
function havnor_plugin_language_setup() {
  load_plugin_textdomain( 'havnor-core', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
add_action( 'init', 'havnor_plugin_language_setup' );

/* WPAUTOP for shortcode output */
if( ! function_exists( 'havnor_set_wpautop' ) ) {
  function havnor_set_wpautop( $content, $force = true ) {
    if ( $force ) {
      $content = wpautop( preg_replace( '/<\/?p\>/', "\n", $content ) . "\n" );
    }
    return do_shortcode( shortcode_unautop( $content ) );
  }
}

/* Use shortcodes in text widgets */
add_filter('widget_text', 'do_shortcode');

/* Shortcodes enable in the_excerpt */
add_filter('the_excerpt', 'do_shortcode');

/* Remove p tag and add by our self in the_excerpt */
remove_filter('the_excerpt', 'wpautop');

/* Add Extra Social Fields in Admin User Profile */
function havnor_add_twitter_facebook( $contactmethods ) {
  $contactmethods['twitter']    = 'Twitter';
  $contactmethods['facebook']   = 'Facebook';
  $contactmethods['google_plus']  = 'Google Plus';
  $contactmethods['pinterest']  = 'Pinterest';
  return $contactmethods;
}
add_filter('user_contactmethods','havnor_add_twitter_facebook',10,1);

/**
 *
 * Encode string for backup options
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'cs_encode_string' ) ) {
  function cs_encode_string( $string ) {
    return rtrim( strtr( call_user_func( 'base'. '64' .'_encode', addslashes( gzcompress( serialize( $string ), 9 ) ) ), '+/', '-_' ), '=' );
  }
}

/**
 *
 * Decode string for backup options
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'cs_decode_string' ) ) {
  function cs_decode_string( $string ) {
    return unserialize( gzuncompress( stripslashes( call_user_func( 'base'. '64' .'_decode', rtrim( strtr( $string, '-_', '+/' ), '=' ) ) ) ) );
  }
}

/* Share Options */
  if ( ! function_exists( 'havnor_wp_share_option' ) ) {
    function havnor_wp_share_option() {

      global $post;
      $page_url = get_permalink($post->ID );
      $title = $post->post_title;
      $share_text = cs_get_option('share_text');
      $share_text = $share_text ? $share_text : esc_html__( 'Share This Article', 'havnor' );
      $share_on_text = cs_get_option('share_on_text');
      $share_on_text = $share_on_text ? $share_on_text : esc_html__( 'Share On', 'havnor' );
      ?>
      <div class="hanor-blog-share">
        <h5 class="blog-meta-title"><?php echo $share_text; ?></h5>
        <div class="hanor-social">
          <a href="//www.facebook.com/sharer/sharer.php?u=<?php print(urlencode($page_url)); ?>&amp;t=<?php print(urlencode($title)); ?>" class="facebook" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Facebook', 'havnor'); ?>" target="_blank"><i class="fa fa-facebook facebook"></i><?php echo esc_attr('Facebook', 'havnor');?></a>
          <a href="//twitter.com/home?status=<?php print(urlencode($title)); ?>+<?php print(urlencode($page_url)); ?>" class="twitter" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Twitter', 'havnor'); ?>" target="_blank"><i class="fa fa-twitter twitter"></i><?php echo esc_attr('Twitter', 'havnor');?></a>
          <a href="http://pinterest.com/pin/create/button/?url=<?php print(urlencode($page_url)); ?>&amp;title=<?php print(urlencode($title)); ?>" class="pinterest" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Pinterest', 'havnor'); ?>" target="_blank"><i class="fa fa-pinterest pinterest"></i><?php echo esc_attr('Pinterest', 'havnor'); ?></a>
          <a href="//www.linkedin.com/shareArticle?mini=true&amp;url=<?php print(urlencode($page_url)); ?>&amp;title=<?php print(urlencode($title)); ?>" class="linkedin" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Linkedin', 'havnor'); ?>" target="_blank"><i class="fa fa-linkedin linkedin"></i><?php echo esc_attr('Linkedin', 'havnor'); ?></a>

        </div>
      </div>
  <?php
    }
  }

/* Portfolio Share Options */
  if ( ! function_exists( 'havnor_folio_share_option' ) ) {
    function havnor_folio_share_option() {

      global $post;
      $page_url = get_permalink($post->ID );
      $title = $post->post_title;
      $share_on_text = cs_get_option('share_on_text');
      $share_on_text = $share_on_text ? $share_on_text : esc_html__( 'Share On', 'havnor' );
      ?>
      <div class="hanor-social">
        <a href="//www.facebook.com/sharer/sharer.php?u=<?php print(urlencode($page_url)); ?>&amp;t=<?php print(urlencode($title)); ?>" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Facebook', 'havnor'); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
        <a href="//twitter.com/home?status=<?php print(urlencode($title)); ?>+<?php print(urlencode($page_url)); ?>" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Twitter', 'havnor'); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
        <a href="//www.linkedin.com/shareArticle?mini=true&amp;url=<?php print(urlencode($page_url)); ?>&amp;title=<?php print(urlencode($title)); ?>" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Linkedin', 'havnor'); ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
        <a href="http://pinterest.com/pin/create/button/?url=<?php print(urlencode($page_url)); ?>&amp;title=<?php print(urlencode($title)); ?>" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Pinterest', 'havnor'); ?>" target="_blank"><i class="fa fa-pinterest-p"></i></a>
      </div>
  <?php
    }
  }
/* Common Share Options */
  if ( ! function_exists( 'havnor_post_share_option' ) ) {
    function havnor_post_share_option() {

      global $post;
      $page_url = get_permalink($post->ID );
      $title = $post->post_title;
      $share_on_text = cs_get_option('share_on_text');
      $share_on_text = $share_on_text ? $share_on_text : esc_html__( 'Share This Post On', 'havnor' );
      ?>
      <div class="hanor-page-share">
        <div class="hanor-social">
          <a href="//www.facebook.com/sharer/sharer.php?u=<?php print(urlencode($page_url)); ?>&amp;t=<?php print(urlencode($title)); ?>" class="icon-fa-facebook" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Facebook', 'havnor'); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
          <a href="//twitter.com/home?status=<?php print(urlencode($title)); ?>+<?php print(urlencode($page_url)); ?>" class="icon-fa-twitter" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Twitter', 'havnor'); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
          <a href="//www.linkedin.com/shareArticle?mini=true&amp;url=<?php print(urlencode($page_url)); ?>&amp;title=<?php print(urlencode($title)); ?>" class="icon-fa-linkedin" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Linkedin', 'havnor'); ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
          <a href="//plus.google.com/share?url=<?php print(urlencode($page_url)); ?>" class="icon-fa-google-plus" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Google+', 'havnor'); ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
        </div>
        <span class="share-link"><p><i class="fa fa-share-alt"></i>Share</p></span>
      </div>
  <?php
    }
  }

/* Portfolio Category List */
  if ( ! function_exists( 'havnor_portfolio_category_list' ) ) {
    function havnor_portfolio_category_list() {

      $terms = get_terms('portfolio_category');
      $count = count($terms);
      $i=0;
      $term_list = '';
      if ($count > 0) {
        foreach ($terms as $term) {
          $i++;
          $term_list .= '<li><a href="javascript:void(0);" class="filter cat-'. esc_attr($term->slug) .'" data-filter=".cat-'. esc_attr($term->slug) .'" title="' . esc_attr($term->name) . '">' . esc_html($term->name) . '</a></li>';
          if ($count != $i) {
            $term_list .= '';
          } else {
            $term_list .= '';
          }
        }
        echo $term_list;
      }

    }
  }

/* Custom WordPress admin login logo */
  if( ! function_exists( 'havnor_theme_login_logo' ) ) {
    function havnor_theme_login_logo() {
      $login_logo = cs_get_option('brand_logo_wp');
      if($login_logo) {
        $login_logo_url = wp_get_attachment_url($login_logo);
      } else {
        $login_logo_url = HAVNOR_IMAGES . '/logo.png';
      }
      if($login_logo) {
      echo "
        <style>
          body.login #login h1 a {
          background: url('$login_logo_url') no-repeat scroll center bottom transparent;
          height: 100px;
          width: 100%;
          margin-bottom:0px;
          }
        </style>";
      }
    }
    add_action('login_head', 'havnor_theme_login_logo');
  }
/* WordPress admin login logo link */
if( ! function_exists( 'havnor_login_url' ) ) {
  function havnor_login_url() {
    return site_url();
  }
  add_filter( 'login_headerurl', 'havnor_login_url', 10, 4 );
}

/* WordPress admin login logo link */
if( ! function_exists( 'havnor_login_title' ) ) {
  function havnor_login_title() {
    return get_bloginfo('name');
  }
  add_filter('login_headertext', 'havnor_login_title');
}

/* WP Registration form in Shortcode */
add_shortcode( 'havnor_registration', 'havnor_registration' );
function havnor_registration() {
    ob_start();
    havnor_registration_function();
    return ob_get_clean();
}

/* Registration Form Function */
function havnor_registration_function() {
  $first_name = $password = $email = '';
  if ( isset($_POST['wp-submit'] ) ) {
    registration_validation(
    $_POST['first_name'],
    $_POST['email'],
    $_POST['password']
    );

    // sanitize user form input
    global $username, $password, $email, $website, $first_name, $last_name, $nickname, $bio;

    $username   =   sanitize_email( $_POST['email'] );
    $password   =   esc_attr( $_POST['password'] );
    $email      =   sanitize_email( $_POST['email'] );
    $first_name =   sanitize_text_field( $_POST['first_name'] );
    // call @function complete_registration to create the user
    // only when no WP_error is found
    complete_registration($username,$password,$email,$first_name
    );
  }

  registration_form($first_name,$email,$password );
}

/* Complete Resgistration Form s*/
function complete_registration() {
  global $reg_errors, $first_name, $email, $password;
  if ( 1 > count( $reg_errors->get_error_messages() ) ) {
    $userdata = array(
    'user_login'    =>   $email,
    'user_email'    =>   $email,
    'user_pass'     =>   $password,
    'first_name'    =>   $first_name,
    );
    $user = wp_insert_user( $userdata );
    //print_r($user);
    if($user)
      echo __('Registration complete. ','havnor');
    else
      echo __('Problem in Registration . ','havnor');
  }
}

/* WP Registration Form Output */
function registration_form( $first_name, $email, $password ) {
  echo '
  <form name="loginform" id="loginform" action="'.( is_ssl() ? 'https://' : 'http://' ).$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . '" method="post">
    <div class="row">
      <div class="col-sm-6">
        <p>
          <input name="email" id="email_address" class="input" placeholder="Email" size="20" type="email" value="'.( isset( $_POST['email']) ? $email : null ).'">
        </p>
      </div>
      <div class="col-sm-6">
        <p>
          <input name="password" id="password" class="input" placeholder="Password" size="20" type="password" value="' . ( isset( $_POST['password'] ) ? $password : null ) . '">
        </p>
      </div>
      <div class="col-sm-12">
        <p>
          <input name="first_name" id="full_name" class="input" placeholder="Your Name" size="20" type="text" value="'.( isset( $_POST['first_name']) ? $first_name : null ).'">
        </p>
      </div>
      <div class="col-sm-12 text-center">
        <p>
          <input name="wp-submit" id="wp-submit" class="" value="Create Account" type="submit">
          <input name="redirect_to" value="" type="hidden">
        </p>
      </div>
    </div>
  </form>
  ';
}

/* Registration Form Validation */
function registration_validation( $first_name, $email, $password )  {
  global $reg_errors;
  $reg_errors = new WP_Error;
  if ( !( $first_name ) || !( $password ) || !( $email ) ) {
    $reg_errors->add('first_name', __('Required form field is missing','havnor'));
  }
  if ( 5 > strlen( $password ) ) {
    $reg_errors->add( 'password', __('Password length must be greater than 5','havnor') );
      }
  if ( !is_email( $email ) ) {
    $reg_errors->add( 'email_invalid', __('Email is not valid','havnor') );
  }
  if ( email_exists( $email ) ) {
    $reg_errors->add( 'email', __('Email Already in use','havnor') );
  }
  if ( is_wp_error( $reg_errors ) ) {

    foreach ( $reg_errors->get_error_messages() as $error ) {
      echo '<div class="hanor-register-error">';
      echo '<strong>'.__('ERROR','havnor').'</strong>:';
      echo $error . '<br/>';
      echo '</div>';
    }
  }
}
/* end code for registration form*/

/* WP Registration form in Shortcode */
add_shortcode( 'havnor_registration_up', 'havnor_registration_up' );
function havnor_registration_up() {
    ob_start();
    havnor_registration_up_function();
    return ob_get_clean();
}

/* Registration Form Function */
function havnor_registration_up_function() {
  $first_name = $password = $email = $last_name = '';
  if ( isset($_POST['wp-submit'] ) ) {
    registration_validation(
    $_POST['first_name'],
    $_POST['last_name'],
    $_POST['email'],
    $_POST['password']
    );

    // sanitize user form input
    global $username, $password, $email, $website, $first_name, $last_name, $nickname, $bio;

    $username   =   sanitize_email( $_POST['email'] );
    $password   =   esc_attr( $_POST['password'] );
    $email      =   sanitize_email( $_POST['email'] );
    $first_name =   sanitize_text_field( $_POST['first_name'] );
    $first_name =   sanitize_text_field( $_POST['last_name'] );
    // call @function complete_registration to create the user
    // only when no WP_error is found
    complete_registration_up($username,$password,$email,$first_name,$last_name
    );
  }

  registration_up_form($first_name,$last_name,$email,$password );
}

/* Complete Resgistration Form s*/
function complete_registration_up() {
  global $reg_errors, $first_name, $last_name, $email, $password;
  if ( 1 > count( $reg_errors->get_error_messages() ) ) {
    $userdata = array(
    'user_login'    =>   $email,
    'user_email'    =>   $email,
    'user_pass'     =>   $password,
    'first_name'    =>   $first_name,
    'last_name'     =>   $last_name,
    );
    $user = wp_insert_user( $userdata );
    //print_r($user);
    if($user)
      echo __('Registration complete. ','havnor');
    else
      echo __('Problem in Registration . ','havnor');
  }
}

/* WP Registration Form Output */
function registration_up_form( $first_name, $last_name, $email, $password ) {
  echo '
  <form name="loginform" id="loginform" action="'.( is_ssl() ? 'https://' : 'http://' ).$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . '" method="post">
    <div class="row">
      <div class="col-sm-6">
        <p>
          <input name="first_name" id="first_name" class="input" placeholder="First Name" size="20" type="text" value="'.( isset( $_POST['first_name']) ? $first_name : null ).'">
        </p>
      </div>
      <div class="col-sm-6">
        <p>
          <input name="last_name" id="last_name" class="input" placeholder="Last Name" size="20" type="text" value="'.( isset( $_POST['last_name']) ? $last_name : null ).'">
        </p>
      </div>
      <div class="col-sm-12">
        <p>
          <input name="email" id="email_address" class="input" placeholder="Email" size="20" type="email" value="'.( isset( $_POST['email']) ? $email : null ).'">
        </p>
      </div>
      <div class="col-sm-12">
        <p>
          <input name="password" id="password" class="input" placeholder="Password" size="20" type="password" value="' . ( isset( $_POST['password'] ) ? $password : null ) . '">
        </p>
      </div>
      <div class="col-sm-12 text-center">
        <p>
          <input name="wp-submit" id="wp-submit" class="" value="REGISTER NOW" type="submit">
          <input name="redirect_to" value="" type="hidden">
        </p>
      </div>
    </div>
  </form>
  ';
}

/* Registration Form Validation */
function registration_up_validation( $first_name, $last_name, $email, $password )  {
  global $reg_errors;
  $reg_errors = new WP_Error;
  if ( !( $first_name ) || !( $last_name ) || !( $password ) || !( $email ) ) {
    $reg_errors->add('first_name', __('Required form field is missing','havnor'));
  }
  if ( !( $first_name ) || !( $last_name ) || !( $password ) || !( $email ) ) {
    $reg_errors->add('last_name', __('Required form field is missing','havnor'));
  }
  if ( 5 > strlen( $password ) ) {
    $reg_errors->add( 'password', __('Password length must be greater than 5','havnor') );
      }
  if ( !is_email( $email ) ) {
    $reg_errors->add( 'email_invalid', __('Email is not valid','havnor') );
  }
  if ( email_exists( $email ) ) {
    $reg_errors->add( 'email', __('Email Already in use','havnor') );
  }
  if ( is_wp_error( $reg_errors ) ) {

    foreach ( $reg_errors->get_error_messages() as $error ) {
      echo '<div class="hanor-register-error">';
      echo '<strong>'.__('ERROR','havnor').'</strong>:';
      echo $error . '<br/>';
      echo '</div>';
    }
  }
}
/* end code for registration form*/

/**
 * One Click Install
 * @return Import Demos - Needed Import Demo's
 */
function havnor_import_files() {
  return array(
    array(
      'import_file_name'           => 'Creative Agency',
      'categories'                 => array( 'Agency' ),
      'import_file_url'            => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/creative-agency/content.xml',
      'import_widget_file_url'     => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/creative-agency/widget.wie',
      'import_customizer_file_url' => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/creative-agency/customize.dat',
      'local_import_csf'           => array(
        array(
          'file_path'   => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/creative-agency/theme-options.json',
          'option_name' => '_cs_options',
        ),
      ),
      'import_preview_image_url'   => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/creative-agency/screenshot.jpg',
      'import_notice'              => __( 'Import process may take 3-5 minutes, please be patient. It\'s really based on your network speed.', 'havnor-core' ),
      'preview_url'                => 'https://victorthemes.com/themes/havnor/creative-agency/',
    ),
    array(
      'import_file_name'           => 'Web Design Agency',
      'categories'                 => array( 'Agency' ),
      'import_file_url'            => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/web-design-agency/content.xml',
      'import_widget_file_url'     => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/web-design-agency/widget.wie',
      'import_customizer_file_url' => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/web-design-agency/customize.dat',
      'local_import_csf'           => array(
        array(
          'file_path'   => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/web-design-agency/theme-options.json',
          'option_name' => '_cs_options',
        ),
      ),
      'import_preview_image_url'   => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/web-design-agency/screenshot.jpg',
      'import_notice'              => __( 'Import process may take 3-5 minutes, please be patient. It\'s really based on your network speed.', 'havnor-core' ),
      'preview_url'                => 'https://victorthemes.com/themes/havnor/web-design-agency/',
    ),
    array(
      'import_file_name'           => 'Corporate',
      'categories'                 => array( 'Business' ),
      'import_file_url'            => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/corporate/content.xml',
      'import_widget_file_url'     => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/corporate/widget.wie',
      'import_customizer_file_url' => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/corporate/customize.dat',
      'local_import_csf'           => array(
        array(
          'file_path'   => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/corporate/theme-options.json',
          'option_name' => '_cs_options',
        ),
      ),
      'import_preview_image_url'   => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/corporate/screenshot.jpg',
      'import_notice'              => __( 'Import process may take 3-5 minutes, please be patient. It\'s really based on your network speed.', 'havnor-core' ),
      'preview_url'                => 'https://victorthemes.com/themes/havnor/',
    ),
    array(
      'import_file_name'           => 'Construction',
      'categories'                 => array( 'Business' ),
      'import_file_url'            => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/construction/content.xml',
      'import_widget_file_url'     => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/construction/widget.wie',
      'import_customizer_file_url' => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/construction/customize.dat',
      'local_import_csf'           => array(
        array(
          'file_path'   => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/construction/theme-options.json',
          'option_name' => '_cs_options',
        ),
      ),
      'import_preview_image_url'   => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/construction/screenshot.jpg',
      'import_notice'              => __( 'Import process may take 3-5 minutes, please be patient. It\'s really based on your network speed.', 'havnor-core' ),
      'preview_url'                => 'https://victorthemes.com/themes/havnor/construction/',
    ),
    array(
      'import_file_name'           => 'Architecture',
      'categories'                 => array( 'Business' ),
      'import_file_url'            => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/architect/content.xml',
      'import_widget_file_url'     => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/architect/widget.wie',
      'import_customizer_file_url' => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/architect/customize.dat',
      'local_import_csf'           => array(
        array(
          'file_path'   => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/architect/theme-options.json',
          'option_name' => '_cs_options',
        ),
      ),
      'import_preview_image_url'   => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/architect/screenshot.jpg',
      'import_notice'              => __( 'Import process may take 3-5 minutes, please be patient. It\'s really based on your network speed.', 'havnor-core' ),
      'preview_url'                => 'https://victorthemes.com/themes/havnor/architect/',
    ),
    array(
      'import_file_name'           => 'Smart Security',
      'categories'                 => array( 'Misc' ),
      'import_file_url'            => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/security/content.xml',
      'import_widget_file_url'     => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/security/widget.wie',
      'import_customizer_file_url' => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/security/customize.dat',
      'local_import_csf'           => array(
        array(
          'file_path'   => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/security/theme-options.json',
          'option_name' => '_cs_options',
        ),
      ),
      'import_preview_image_url'   => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/security/screenshot.jpg',
      'import_notice'              => __( 'Import process may take 3-5 minutes, please be patient. It\'s really based on your network speed.', 'havnor-core' ),
      'preview_url'                => 'https://victorthemes.com/themes/havnor/smart-security-home/',
    ),
    array(
      'import_file_name'           => 'Lawyer',
      'categories'                 => array( 'Misc' ),
      'import_file_url'            => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/lawyer/content.xml',
      'import_widget_file_url'     => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/lawyer/widget.wie',
      'import_customizer_file_url' => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/lawyer/customize.dat',
      'local_import_csf'           => array(
        array(
          'file_path'   => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/lawyer/theme-options.json',
          'option_name' => '_cs_options',
        ),
      ),
      'import_preview_image_url'   => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/lawyer/screenshot.jpg',
      'import_notice'              => __( 'Import process may take 3-5 minutes, please be patient. It\'s really based on your network speed.', 'havnor-core' ),
      'preview_url'                => 'https://victorthemes.com/themes/havnor/lawyer/',
    ),
    array(
      'import_file_name'           => 'Logistics',
      'categories'                 => array( 'Misc' ),
      'import_file_url'            => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/logistic/content.xml',
      'import_widget_file_url'     => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/logistic/widget.wie',
      'import_customizer_file_url' => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/logistic/customize.dat',
      'local_import_csf'           => array(
        array(
          'file_path'   => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/logistic/theme-options.json',
          'option_name' => '_cs_options',
        ),
      ),
      'import_preview_image_url'   => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/logistic/screenshot.jpg',
      'import_notice'              => __( 'Import process may take 3-5 minutes, please be patient. It\'s really based on your network speed.', 'havnor-core' ),
      'preview_url'                => 'https://victorthemes.com/themes/havnor/logistic/',
    ),
    array(
      'import_file_name'           => 'Conference Event',
      'categories'                 => array( 'Business' ),
      'import_file_url'            => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/conference-event/content.xml',
      'import_widget_file_url'     => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/conference-event/widget.wie',
      'import_customizer_file_url' => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/conference-event/customize.dat',
      'local_import_csf'           => array(
        array(
          'file_path'   => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/conference-event/theme-options.json',
          'option_name' => '_cs_options',
        ),
      ),
      'import_preview_image_url'   => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/conference-event/screenshot.jpg',
      'import_notice'              => __( 'Import process may take 3-5 minutes, please be patient. It\'s really based on your network speed.', 'havnor-core' ),
      'preview_url'                => 'https://victorthemes.com/themes/havnor/conference-event/',
    ),
    array(
      'import_file_name'           => 'Hosting',
      'categories'                 => array( 'Misc' ),
      'import_file_url'            => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/hosting/content.xml',
      'import_widget_file_url'     => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/hosting/widget.wie',
      'import_customizer_file_url' => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/hosting/customize.dat',
      'local_import_csf'           => array(
        array(
          'file_path'   => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/hosting/theme-options.json',
          'option_name' => '_cs_options',
        ),
      ),
      'import_preview_image_url'   => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/hosting/screenshot.jpg',
      'import_notice'              => __( 'Import process may take 3-5 minutes, please be patient. It\'s really based on your network speed.', 'havnor-core' ),
      'preview_url'                => 'https://victorthemes.com/themes/havnor/hosting/',
    ),
    array(
      'import_file_name'           => 'SEO',
      'categories'                 => array( 'Misc' ),
      'import_file_url'            => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/seo/content.xml',
      'import_widget_file_url'     => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/seo/widget.wie',
      'import_customizer_file_url' => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/seo/customize.dat',
      'local_import_csf'           => array(
        array(
          'file_path'   => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/seo/theme-options.json',
          'option_name' => '_cs_options',
        ),
      ),
      'import_preview_image_url'   => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/seo/screenshot.jpg',
      'import_notice'              => __( 'Import process may take 3-5 minutes, please be patient. It\'s really based on your network speed.', 'havnor-core' ),
      'preview_url'                => 'https://victorthemes.com/themes/havnor/seo/',
    ),
    array(
      'import_file_name'           => 'Financial Consulting',
      'categories'                 => array( 'Business' ),
      'import_file_url'            => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/financial-consulting/content.xml',
      'import_widget_file_url'     => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/financial-consulting/widget.wie',
      'import_customizer_file_url' => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/financial-consulting/customize.dat',
      'local_import_csf'           => array(
        array(
          'file_path'   => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/financial-consulting/theme-options.json',
          'option_name' => '_cs_options',
        ),
      ),
      'import_preview_image_url'   => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/financial-consulting/screenshot.jpg',
      'import_notice'              => __( 'Import process may take 3-5 minutes, please be patient. It\'s really based on your network speed.', 'havnor-core' ),
      'preview_url'                => 'https://victorthemes.com/themes/havnor/financial-consulting/',
    ),
    array(
      'import_file_name'           => 'Business Consulting',
      'categories'                 => array( 'Business' ),
      'import_file_url'            => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/business-consulting/content.xml',
      'import_widget_file_url'     => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/business-consulting/widget.wie',
      'import_customizer_file_url' => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/business-consulting/customize.dat',
      'local_import_csf'           => array(
        array(
          'file_path'   => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/business-consulting/theme-options.json',
          'option_name' => '_cs_options',
        ),
      ),
      'import_preview_image_url'   => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/business-consulting/screenshot.jpg',
      'import_notice'              => __( 'Import process may take 3-5 minutes, please be patient. It\'s really based on your network speed.', 'havnor-core' ),
      'preview_url'                => 'https://victorthemes.com/themes/havnor/business-consulting/',
    ),
    array(
      'import_file_name'           => 'Mobile App',
      'categories'                 => array( 'Misc' ),
      'import_file_url'            => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/mobile-app/content.xml',
      'import_widget_file_url'     => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/mobile-app/widget.wie',
      'import_customizer_file_url' => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/mobile-app/customize.dat',
      'local_import_csf'           => array(
        array(
          'file_path'   => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/mobile-app/theme-options.json',
          'option_name' => '_cs_options',
        ),
      ),
      'import_preview_image_url'   => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/mobile-app/screenshot.jpg',
      'import_notice'              => __( 'Import process may take 3-5 minutes, please be patient. It\'s really based on your network speed.', 'havnor-core' ),
      'preview_url'                => 'https://victorthemes.com/themes/havnor/mobile-app/',
    ),
    array(
      'import_file_name'           => 'StartUp',
      'categories'                 => array( 'Business' ),
      'import_file_url'            => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/startup/content.xml',
      'import_widget_file_url'     => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/startup/widget.wie',
      'import_customizer_file_url' => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/startup/customize.dat',
      'local_import_csf'           => array(
        array(
          'file_path'   => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/startup/theme-options.json',
          'option_name' => '_cs_options',
        ),
      ),
      'import_preview_image_url'   => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/startup/screenshot.jpg',
      'import_notice'              => __( 'Import process may take 3-5 minutes, please be patient. It\'s really based on your network speed.', 'havnor-core' ),
      'preview_url'                => 'https://victorthemes.com/themes/havnor/startup/',
    ),
    array(
      'import_file_name'           => 'Medical',
      'categories'                 => array( 'Misc' ),
      'import_file_url'            => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/medical/content.xml',
      'import_widget_file_url'     => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/medical/widget.wie',
      'import_customizer_file_url' => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/medical/customize.dat',
      'local_import_csf'           => array(
        array(
          'file_path'   => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/medical/theme-options.json',
          'option_name' => '_cs_options',
        ),
      ),
      'import_preview_image_url'   => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/medical/screenshot.jpg',
      'import_notice'              => __( 'Import process may take 3-5 minutes, please be patient. It\'s really based on your network speed.', 'havnor-core' ),
      'preview_url'                => 'https://victorthemes.com/themes/havnor/medical/',
    ),
    array(
      'import_file_name'           => 'Freelancer',
      'categories'                 => array( 'Business' ),
      'import_file_url'            => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/freelancer/content.xml',
      'import_widget_file_url'     => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/freelancer/widget.wie',
      'import_customizer_file_url' => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/freelancer/customize.dat',
      'local_import_csf'           => array(
        array(
          'file_path'   => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/freelancer/theme-options.json',
          'option_name' => '_cs_options',
        ),
      ),
      'import_preview_image_url'   => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/freelancer/screenshot.jpg',
      'import_notice'              => __( 'Import process may take 3-5 minutes, please be patient. It\'s really based on your network speed.', 'havnor-core' ),
      'preview_url'                => 'https://victorthemes.com/themes/havnor/freelancer/',
    ),
    array(
      'import_file_name'           => 'Mac App',
      'categories'                 => array( 'Misc' ),
      'import_file_url'            => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/mac-app/content.xml',
      'import_widget_file_url'     => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/mac-app/widget.wie',
      'import_customizer_file_url' => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/mac-app/customize.dat',
      'local_import_csf'           => array(
        array(
          'file_path'   => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/mac-app/theme-options.json',
          'option_name' => '_cs_options',
        ),
      ),
      'import_preview_image_url'   => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/mac-app/screenshot.jpg',
      'import_notice'              => __( 'Import process may take 3-5 minutes, please be patient. It\'s really based on your network speed.', 'havnor-core' ),
      'preview_url'                => 'https://victorthemes.com/themes/havnor/mac-app/',
    ),
    array(
      'import_file_name'           => 'Restaurant',
      'categories'                 => array( 'Business' ),
      'import_file_url'            => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/restaurant/content.xml',
      'import_widget_file_url'     => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/restaurant/widget.wie',
      'import_customizer_file_url' => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/restaurant/customize.dat',
      'local_import_csf'           => array(
        array(
          'file_path'   => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/restaurant/theme-options.json',
          'option_name' => '_cs_options',
        ),
      ),
      'import_preview_image_url'   => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/restaurant/screenshot.jpg',
      'import_notice'              => __( 'Import process may take 3-5 minutes, please be patient. It\'s really based on your network speed.', 'havnor-core' ),
      'preview_url'                => 'https://victorthemes.com/themes/havnor/restaurant/',
    ),
    array(
      'import_file_name'           => 'Gym',
      'categories'                 => array( 'Misc' ),
      'import_file_url'            => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/gym/content.xml',
      'import_widget_file_url'     => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/gym/widget.wie',
      'import_customizer_file_url' => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/gym/customize.dat',
      'local_import_csf'           => array(
        array(
          'file_path'   => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/gym/theme-options.json',
          'option_name' => '_cs_options',
        ),
      ),
      'import_preview_image_url'   => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/gym/screenshot.jpg',
      'import_notice'              => __( 'Import process may take 3-5 minutes, please be patient. It\'s really based on your network speed.', 'havnor-core' ),
      'preview_url'                => 'https://victorthemes.com/themes/havnor/gym/',
    ),
    array(
      'import_file_name'           => 'Wedding',
      'categories'                 => array( 'Misc' ),
      'import_file_url'            => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/wedding/content.xml',
      'import_widget_file_url'     => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/wedding/widget.wie',
      'import_customizer_file_url' => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/wedding/customize.dat',
      'local_import_csf'           => array(
        array(
          'file_path'   => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/wedding/theme-options.json',
          'option_name' => '_cs_options',
        ),
      ),
      'import_preview_image_url'   => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/wedding/screenshot.jpg',
      'import_notice'              => __( 'Import process may take 3-5 minutes, please be patient. It\'s really based on your network speed.', 'havnor-core' ),
      'preview_url'                => 'https://victorthemes.com/themes/havnor/wedding/',
    ),
    array(
      'import_file_name'           => 'One Page',
      'categories'                 => array( 'Business' ),
      'import_file_url'            => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/one-page/content.xml',
      'import_widget_file_url'     => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/one-page/widget.wie',
      'import_customizer_file_url' => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/one-page/customize.dat',
      'local_import_csf'           => array(
        array(
          'file_path'   => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/one-page/theme-options.json',
          'option_name' => '_cs_options',
        ),
      ),
      'import_preview_image_url'   => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/one-page/screenshot.jpg',
      'import_notice'              => __( 'Import process may take 3-5 minutes, please be patient. It\'s really based on your network speed.', 'havnor-core' ),
      'preview_url'                => 'https://victorthemes.com/themes/havnor/one-page/',
    ),
    array(
      'import_file_name'           => 'Journal',
      'categories'                 => array( 'Misc' ),
      'import_file_url'            => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/journal/content.xml',
      'import_widget_file_url'     => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/journal/widget.wie',
      'import_customizer_file_url' => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/journal/customize.dat',
      'local_import_csf'           => array(
        array(
          'file_path'   => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/journal/theme-options.json',
          'option_name' => '_cs_options',
        ),
      ),
      'import_preview_image_url'   => trailingslashit( HAVNOR_PLUGIN_URL ) . 'inc/import/journal/screenshot.jpg',
      'import_notice'              => __( 'Import process may take 3-5 minutes, please be patient. It\'s really based on your network speed.', 'havnor-core' ),
      'preview_url'                => 'https://victorthemes.com/themes/havnor/journal/',
    )
  );
}
add_filter( 'pt-ocdi/import_files', 'havnor_import_files' );

/**
 * One Click Import Function for CodeStar Framework
 */
if ( ! function_exists( 'csf_after_content_import_execution' ) ) {
  function csf_after_content_import_execution( $selected_import_files, $import_files, $selected_index ) {

    $downloader = new OCDI\Downloader();

    if( ! empty( $import_files[$selected_index]['import_csf'] ) ) {

      foreach( $import_files[$selected_index]['import_csf'] as $index => $import ) {
        $file_path = $downloader->download_file( $import['file_url'], 'demo-csf-import-file-'. $index . '-'. date( 'Y-m-d__H-i-s' ) .'.json' );
        $file_raw  = OCDI\Helpers::data_from_file( $file_path );
        update_option( $import['option_name'], json_decode( $file_raw, true ) );
      }

    } else if( ! empty( $import_files[$selected_index]['local_import_csf'] ) ) {

      foreach( $import_files[$selected_index]['local_import_csf'] as $index => $import ) {
        $file_path = $import['file_path'];
        $file_raw  = OCDI\Helpers::data_from_file( $file_path );
        update_option( $import['option_name'], json_decode( $file_raw, true ) );
      }

    }

    // Put info to log file.
    $ocdi       = OCDI\OneClickDemoImport::get_instance();
    $log_path   = $ocdi->get_log_file_path();

    OCDI\Helpers::append_to_file( 'Codestar Framework files loaded.'. $logs, $log_path );

  }
  add_action('pt-ocdi/after_content_import_execution', 'csf_after_content_import_execution', 3, 99 );
}

/**
 * [havnor_after_import_setup]
 * @return Front Page, Post Page & Menu Set
 */
function havnor_after_import_setup() {
    // Assign menus to their locations.
    $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array(
        'primary' => $main_menu->term_id,
      )
    );

    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'Home' );
    $blog_page_id  = get_page_by_title( 'Blog' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'havnor_after_import_setup' );

// Install Demos Menu - Menu Edited
function havnor_core_one_click_page( $default_settings ) {
  $default_settings['parent_slug'] = 'themes.php';
  $default_settings['page_title']  = esc_html__( 'Install Demos', 'havnor-core' );
  $default_settings['menu_title']  = esc_html__( 'Install Demos', 'havnor-core' );
  $default_settings['capability']  = 'import';
  $default_settings['menu_slug']   = 'install_demos';

  return $default_settings;
}
add_filter( 'pt-ocdi/plugin_page_setup', 'havnor_core_one_click_page' );

// Model Popup - Width Increased
function havnor_ocdi_confirmation_dialog_options ( $options ) {
  return array_merge( $options, array(
    'width'       => 600,
    'dialogClass' => 'wp-dialog',
    'resizable'   => false,
    'height'      => 'auto',
    'modal'       => true,
  ) );
}
add_filter( 'pt-ocdi/confirmation_dialog_options', 'havnor_ocdi_confirmation_dialog_options', 10, 1 );

// Disable the branding notice - ProteusThemes
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

function ocdi_plugin_intro_text( $default_text ) {
  $auto_install = admin_url('themes.php?page=install_demos');
  $manual_install = admin_url('themes.php?page=install_demos&import-mode=manual');
  $default_text .= '<h1>Install Demos</h1>
  <div class="havnor-core_intro-text vtdemo-one-click">
  <div id="poststuff">

    <div class="postbox important-notes">
      <h3><span>Important notes:</span></h3>
      <div class="inside">
        <ol>
          <li>Please note, this import process will take time. So, please be patient.</li>
          <li>Please make sure you\'ve installed recommended plugins before you import this content.</li>
          <li>All images are demo purposes only. So, images may repeat in your site content.</li>
        </ol>
      </div>
    </div>

    <div class="postbox vt-support-box vt-error-box">
      <h3><span>Don\'t Edit Parent Theme Files:</span></h3>
      <div class="inside">
        <p>Don\'t edit any files from parent theme! Use only a <strong>Child Theme</strong> files for your customizations!</p>
        <p>If you get future updates from our theme, you\'ll lose edited customization from your parent theme.</p>
      </div>
    </div>

    <div class="postbox vt-support-box">
      <h3><span>Need Support?</span> <a href="https://www.youtube.com/watch?v=xlsxsNDQmLs" target="_blank" class="cs-section-video"><i class="fa fa-youtube-play"></i> <span>How to?</span></a></h3>
      <div class="inside">
        <p>Have any doubts regarding this installation or any other issues? Please feel free to open a ticket in our support center.</p>
        <a href="http://victorthemes.com/docs/havnor" class="button-primary" target="_blank">Docs</a>
        <a href="https://victorthemes.com/my-account/support/" class="button-primary" target="_blank">Support</a>
        <a href="https://themeforest.net/item/havnor-corporate-responsive-multipurpose-wordpress-theme/23057786?ref=VictorThemes" class="button-primary" target="_blank">Item Page</a>
      </div>
    </div>
    <div class="nav-tab-wrapper vt-nav-tab">
      <a href="'. $auto_install .'" class="nav-tab vt-mode-switch vt-auto-mode nav-tab-active">Auto Import</a>
      <a href="'. $manual_install .'" class="nav-tab vt-mode-switch vt-manual-mode">Manual Import</a>
    </div>

  </div>
  </div>';

  return $default_text;
}
add_filter( 'pt-ocdi/plugin_intro_text', 'ocdi_plugin_intro_text' );

/**
 * Theme Auto Updates - Using Envato Toolkit
 */
$username = (havnor_framework_active()) ? cs_get_option( 'themeforest_username' ) : '';
$apikey   = (havnor_framework_active()) ? cs_get_option( 'themeforest_api' ) : '';
if( ! empty( $username ) && ! empty( $apikey ) ) {
  require_once( HAVNOR_PLUGIN_INC . '/theme-updater/theme-updater.php' );
}
