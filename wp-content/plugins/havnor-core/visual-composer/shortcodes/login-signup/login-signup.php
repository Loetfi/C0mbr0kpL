<?php
/* ===========================================================
    Section Title
=========================================================== */
if ( !function_exists('havnor_login_signup_function')) {
  function havnor_login_signup_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'sign_up'  => '',
      'class'  => '',
      // Styling
      'bg_color' => '',
      'title_color'  => '',
      'title_size'  => '',
    ), $atts));

    // Shortcode Style CSS
    $e_uniqid     = uniqid();
    $inline_style = '';

    // Title Color
    if ( $title_color || $title_size ) {
      $inline_style .= '.hanor-lsform-'. $e_uniqid .' p.login-username label, .hanor-lsform-'. $e_uniqid .' p.login-remember label, .hanor-lsform-'. $e_uniqid .' p.login-password label {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. havnor_core_check_px($title_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $bg_color ) {
      $inline_style .= '.hanor-lsform-'. $e_uniqid .'.lsform-form-wrap {';
      $inline_style .= ( $bg_color ) ? 'background:'. $bg_color .';' : '';
      $inline_style .= '}';
    }
    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' hanor-lsform-'. $e_uniqid;

    if ($sign_up) {
      $form_class = ' signup-form';
    } else {
      $form_class = ' login-form';
    } ?>

    <div class="lsform-form-wrap<?php echo esc_attr($styled_class . $form_class .' '. $class); ?>">
      <?php if ($sign_up) {
        echo do_shortcode('[havnor_registration]'); 
      } else {
        if (is_user_logged_in()) { ?>
          <p class="log-message"><?php echo esc_html__('Welcome, registered user!', 'havnor'); ?></p>
        <?php } else { wp_login_form(); } 
      } ?>
    </div>
<?php
  }
}
add_shortcode( 'havnor_login_signup', 'havnor_login_signup_function' );
