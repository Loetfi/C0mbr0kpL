<?php
/* ==========================================================
  Accordion
=========================================================== */
if( ! function_exists( 'vc_similar_jobs_function' ) ) {
  function vc_similar_jobs_function( $atts, $content = '', $key = '' ) {

    extract( shortcode_atts( array(
      'class'         => '',
      'job_limit'     => '',
      'job_order'     => '',
      'job_orderby'     => '',
      'job_show_category' => '',
      'view_job'     => '',
      'tick_image'    => '',
      'title_size'    => '',
      'title_color' => '',
      'title_active_color' => '',
      'title_bg_color'    => '',
      'tgl_btn_color' =>'',
      'tgl_btn_bg_color' =>'',
    ), $atts ) );

    do_shortcode( $content );

    $image_url = wp_get_attachment_url( $tick_image );
    $view_job = $view_job ? $view_job : esc_html__('View Job','havnor');

    $uniqtab     = uniqid();
    // Shortcode Style CSS
    $inline_style  = '';

    if ( $title_size ) {
      $inline_style .= '.hanor-acc-'. $uniqtab .' .panel-title, .hanor-acc-'. $uniqtab .' .panel-title a {';
      $inline_style .= ( $title_size ) ? 'font-size:'. havnor_core_check_px($title_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $title_bg_color || $title_color ) {
      $inline_style .= '.hanor-acc-'. $uniqtab .' .panel-title a {';
      $inline_style .= ( $title_bg_color ) ? 'background:'. $title_bg_color .';' : '';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= '}';
    }
    if($title_active_color) {
      $inline_style .= '.hanor-acc-'. $uniqtab .' .active .panel-title a {';
      $inline_style .= ( $title_active_color ) ? 'color:'. $title_active_color .';' : '';
      $inline_style .= '}';
    }
    if ( $tgl_btn_color ) {
      $inline_style .= '.hanor-acc-'. $uniqtab .' .accordion-switch:before, .similar-job .hanor-acc-'. $uniqtab .' .active .accordion-switch:before {';
      $inline_style .= ( $tgl_btn_color ) ? 'background:'. $tgl_btn_color .';' : '';
      $inline_style .= '}';
    }
    if ( $tgl_btn_bg_color ) {
      $inline_style .= '.hanor-acc-'. $uniqtab .' .accordion-switch {';
      $inline_style .= ( $tgl_btn_bg_color ) ? 'background:'. $tgl_btn_bg_color .';' : '';
      $inline_style .= ( $tgl_btn_bg_color ) ? 'border-color:'. $tgl_btn_bg_color .';' : '';
      $inline_style .= '}';
    }
    if($image_url) {
      $inline_style .= '.similar-job .hanor-acc-'. $uniqtab .' .panel-title a:before {';
      $inline_style .= ( $image_url ) ? 'background-image:url('.$image_url.');' : '';
      $inline_style .= '}';
    }
    
    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' hanor-acc-'. $uniqtab;
    // Turn output buffer on
    ob_start();

    global $paged;
    if( get_query_var( 'paged' ) )
      $my_page = get_query_var( 'paged' );
    else {
      if( get_query_var( 'page' ) )
        $my_page = get_query_var( 'page' );
      else
        $my_page = 1;
      set_query_var( 'paged', $my_page );
      $paged = $my_page;
    }

    $args = array(
      'paged' => $my_page,
      'post_type' => 'job',
      'posts_per_page' => (int)$job_limit,
      'job_role' => esc_attr($job_show_category),
      'orderby' => $job_orderby,
      'order' => $job_order,
    );

    $havnor_job_qury = new WP_Query( $args );

    if ($havnor_job_qury->have_posts()) :
    ?>
    <div class="hanor-job <?php echo esc_attr($class); ?>">
    <!-- begin output -->
      <div class="similar-job">
        <div class="panel-group <?php echo $styled_class; ?>" id="accordion">
        <?php
        $id=0;
        while ($havnor_job_qury->have_posts()) : $havnor_job_qury->the_post();
          $title     = get_the_title(); ?>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><?php echo $title; ?><span class="accordion-switch"></span></a>
            </h4>
          </div>
          <div id="collapse<?php echo $id; ?>" class="panel-collapse collapse">
            <div class="panel-body">
                <p><?php $job_excerpt = cs_get_option('theme_job_excerpt');
                  if ($job_excerpt) {
                    $job_excerpt = $job_excerpt;
                  } else {
                    $job_excerpt = '50';
                  }
                  havnor_excerpt($job_excerpt);
                  echo havnor_wp_link_pages()
                  ?>
                </p>
                <a href="<?php echo esc_url( get_permalink() ); ?>" class="job-btn" ><span><?php echo $view_job; ?></span></a>
            </div>
          </div>
        </div>
        <?php 
          $id++;
          endwhile; 
        ?>
        </div>
      </div>
    </div>
    <?php    
    endif;
    wp_reset_postdata();
    // Return outbut buffer
    return ob_get_clean();
  }
  add_shortcode( 'vc_similar_jobs', 'vc_similar_jobs_function' );
}
