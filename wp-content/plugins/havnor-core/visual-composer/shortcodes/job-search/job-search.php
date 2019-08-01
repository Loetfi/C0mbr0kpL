<?php
/* ==========================================================
  Image Compare
=========================================================== */
if ( !function_exists('havnor_job_search_function')) {
  function havnor_job_search_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'search_style'  => '',
      'search_title'  => '',
      'class'  => '',
      // Style
      'title_color'  => '',
      'title_size'  => '',
      'text_color'  => '',
      'bg_color'  => '',
      'border_color'  => '',
      'text_hover_color'  => '',
      'bg_hover_color'  => '',
      'border_hover_color'  => '',
      'text_size'  => '',
      'section_bg_color'  => '',
      'section_border_color'  => '',

    ), $atts));

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    // Title Color
    if ( $title_size || $title_color ) {
      $inline_style .= '.hanor-search-'. $e_uniqid .'.hanor-job-search h2 {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. havnor_core_check_px($title_size) .';' : '';
      $inline_style .= '}';
    }
    // Button Color
    if ( $text_color || $text_size || $bg_color || $border_color ) {
      $inline_style .= '.hanor-search-'. $e_uniqid .'.hanor-job-search input[type="submit"] {';
      $inline_style .= ( $text_color ) ? 'color:'. $text_color .';' : '';
      $inline_style .= ( $text_size ) ? 'font-size:'. havnor_core_check_px($text_size) .';' : '';
      $inline_style .= ( $bg_color ) ? 'background-color:'. $bg_color .';' : '';
      $inline_style .= ( $border_color ) ? 'border-color:'. $border_color .';' : '';
      $inline_style .= '}';
    }
    // Button Hover Color
    if ( $text_hover_color || $border_hover_color || $bg_hover_color ) {
      $inline_style .= '.hanor-search-'. $e_uniqid .'.hanor-job-search input[type="submit"]:hover {';
      $inline_style .= ( $text_hover_color ) ? 'color:'. $text_hover_color .';' : '';
      $inline_style .= ( $bg_hover_color ) ? 'background:'. $bg_hover_color .';' : '';
      $inline_style .= ( $border_hover_color ) ? 'border-color: '. $border_hover_color .';' : '';
      $inline_style .= '}';
    }
    // Bg
    if ( $section_border_color || $section_bg_color ) {
      $inline_style .= '.hanor-search-'. $e_uniqid .'.hanor-job-search {';
      $inline_style .= ( $section_bg_color ) ? 'background:'. $section_bg_color .';' : '';
      $inline_style .= ( $section_border_color ) ? 'border-color: '. $section_border_color .';' : '';
      $inline_style .= '}';
    }
    
    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' hanor-search-'. $e_uniqid;

    $search_title = $search_title ? '<h2>'.$search_title.'</h2>' : '';
    if ($search_style === 'search-style-two') {
      $style_class = ' search-style-two';
    } else {
      $style_class = '';
    }
      // Turn output buffer on
      ob_start(); ?>
  
      <div class="hanor-job-search<?php echo esc_attr($class . $style_class . $styled_class); ?>">
        <?php echo $search_title;
        if ($search_style === 'search-style-two') { ?>
          <div class="search-wrap">
            <form method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>" class="searchform" >
              <div class="row">
                <input type="hidden" name="s" id="s" />
                <input type="hidden" name="post_type" value="job">
                <div class="col-md-4">
                  <?php
                  $args = array(
                    'show_option_none' => __( 'Job Title' ),
                    'post_type'        => 'job',
                    'taxonomy'         => 'job_role',
                    'name'             => 's',
                    'option_none_value'  => '',
                    'value_field'      => 'name',
                  );
                  wp_dropdown_categories( $args ); ?>
                </div>
                <div class="col-md-4">
                  <?php
                  $args_tag = array(
                    'show_option_none' => __( 'Job Designation' ),
                    'post_type'        => 'job',
                    'taxonomy'         => 'job_designation',
                    'name'             => 'job_designation',
                    'option_none_value'  => '',
                    'value_field'      => 'name',
                  );
                  wp_dropdown_categories( $args_tag ); ?>
                </div>
                <div class="col-md-4"><input type="submit" id="searchsubmit" class="button-primary" value="CHECK OPENINGS" /></div>
              </div>
            </form>
          </div>
        <?php } else { ?>
          <form method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>" class="searchform" >
            <p>
              <input type="hidden" name="s" id="s" />
              <input type="hidden" name="post_type" value="job">
              <?php
              $args = array(
                'show_option_none' => __( 'Job Title' ),
                'post_type'        => 'job',
                'taxonomy'         => 'job_role',
                'name'             => 's',
                'option_none_value'  => '',
                'value_field'      => 'name',
              );
              wp_dropdown_categories( $args );
              $args_tag = array(
                'show_option_none' => __( 'Job Designation' ),
                'post_type'        => 'job',
                'taxonomy'         => 'job_designation',
                'name'             => 'job_designation',
                'option_none_value'  => '',
                'value_field'      => 'name',
              );
              wp_dropdown_categories( $args_tag ); ?>
              <input type="submit" id="searchsubmit" class="button-primary" value="CHECK OPENINGS" />
            </p>
          </form>
        <?php } ?>
      </div>
    <?php
    // Return outbut buffer
    return ob_get_clean();
  }
}
add_shortcode( 'hanor_job_search', 'havnor_job_search_function' );
