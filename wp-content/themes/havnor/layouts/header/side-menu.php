<?php
// Metabox
$havnor_id    = ( isset( $post ) ) ? $post->ID : 0;
$havnor_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $havnor_id;
$havnor_id    = ( ! is_tag() && ! is_archive() && ! is_search() && ! is_404() && ! is_singular('testimonial') ) ? $havnor_id : false;
$havnor_meta  = get_post_meta( $havnor_id, 'page_type_metabox', true );

// Header Style - ThemeOptions & Metabox
$side_menu_style    = cs_get_option('side_menu_style');
$choose_menu    = cs_get_option('choose_menu');
$custom_menu    = cs_get_option('custom_menu');
$subscribe_actual = cs_get_option('subscribe');
$social = cs_get_option('social_shortcode');
?>
<nav class="hanor-side-navigation">
  <div class="navigation-wrap">
    <div class="close-btn"><a href="javascript:void(0);"></a></div>
    <div class="vertical-scroll">
      <?php if($side_menu_style === 'custom') {
        echo do_shortcode($custom_menu);
      } else {
        wp_nav_menu(
          array(
            'menu'              => 'primary',
            'theme_location'    => 'primary',
            'container'         => '',
            'container_class'   => '',
            'container_id'      => '',
            'menu'              => $choose_menu,
            'menu_class'        => 'navigation',
            'fallback_cb'       => 'havnor_wp_bootstrap_navwalker::fallback',
            'walker'            => new havnor_wp_bootstrap_navwalker()
          )
        );
      }
      ?>
    </div>
    <div class="navigation-bottom-wrap">
      <?php echo do_shortcode($subscribe_actual);
      if ($social) { ?>
        <ul class="sidebar-menu-social">
          <?php echo do_shortcode($social); ?>
        </ul>
      <?php } ?>
    </div>
  </div>
</nav>
<div class="hanor-navigation-overlay"></div>
<?php
