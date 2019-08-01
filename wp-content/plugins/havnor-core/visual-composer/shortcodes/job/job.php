<?php
/* Job */
if ( !function_exists('havnor_job_function')) {
  function havnor_job_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'class'  => '',
      // Listing
      'job_limit'  => '',
      'job_order'  => '',
      'job_orderby'  => '',
      'job_show_category'  => '',
      'view_job' => '',
      'posted_on' => '',
      'date_format' => '',
      'job_pagination'  => '',
       
    ), $atts));

    // Turn output buffer on
    ob_start();

    // Query Starts Here
    // Pagination
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

    $date_format_actual = $date_format ? $date_format : '';

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
      <?php
      while ($havnor_job_qury->have_posts()) : $havnor_job_qury->the_post();
      // Featured Image
      $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
      $large_image = $large_image[0];
      $abt_title = get_the_title();
      // Link
      $job_options = get_post_meta( get_the_ID(), 'job_options', true );
      $job_location = $job_options['job_location'];
      $job_location_link = $job_options['job_location_link'];
      $job_duration = $job_options['job_duration'];
      $view_job = $view_job ? $view_job : esc_html__('View Job','havnor');
      $posted_on =$posted_on ? $posted_on : esc_html__('Posted on : ', 'havnor');
      ?>
        <div class="job-item hanor-item">
          <div class="row">
            <div class="col-md-2">
              <div class="hanor-image">
                <?php if ($large_image) { ?>
                <a href="<?php echo esc_url( get_permalink() ); ?>"><img src="<?php echo esc_url($large_image); ?>" alt="<?php echo esc_attr($abt_title); ?>"></a>
                <?php } ?>
              </div>
            </div>
            <div class="col-md-7">
              <div class="job-info">
                <h4 class="job-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo $abt_title; ?></a></h4>
                <div class="job-date"><i class="fa fa-calendar-o" aria-hidden="true"></i><?php echo $posted_on; ?><?php echo get_the_date($date_format_actual); //HavnorWP ?></div>
                <p><?php
                $job_excerpt = cs_get_option('theme_job_excerpt');
                if ($job_excerpt) {
                  $job_excerpt = $job_excerpt;
                } else {
                  $job_excerpt = '30';
                }
                havnor_excerpt($job_excerpt);
                echo havnor_wp_link_pages();
                ?></p>
              </div>
            </div>
            <div class="col-md-3">
              <div class="job-detail-info">
                <div class="hanor-btns-group">
                <?php if($job_duration){ ?>
                  <span class="job-btn blue" ><span><?php echo $job_duration; ?></span></span>
                <?php } ?>  
                  <a href="<?php echo esc_url( get_permalink() ); ?>" class="job-btn" ><span><?php echo $view_job; ?></span></a>
                </div>
                <?php if ($job_location) { ?>
                  <span class="job-location"><i class="fa fa-map-marker" aria-hidden="true"></i> <a href="<?php echo esc_url($job_location_link); ?>"><?php echo $job_location; ?></a></span>
                <?php } ?>
              </div>
            </div>       
          </div>
        </div>
      <?php endwhile; 
      if ($job_pagination) {havnor_paging_nav($havnor_job_qury->max_num_pages,"",$paged); wp_reset_postdata();} ?>
    </div>
     <!-- Job End -->
    <?php
      endif;
      wp_reset_postdata();
      // Return outbut buffer
      return ob_get_clean();

  }
}
add_shortcode( 'havnor_job', 'havnor_job_function' );
