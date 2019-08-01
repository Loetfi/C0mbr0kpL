<?php
/* ==========================================================
  Award Section
=========================================================== */
if ( !function_exists('havnor_share_func')) {
  function havnor_share_func( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'share_text' =>'',
      'hide_fb_share'=>'',
      'hide_twitter_share'=>'',
      'hide_gplus_share' =>'',
      'hide_insta_share' =>'',
      'hide_linked_share' =>'',
      'hide_pin_share' => '',
      'class'  => '',
      // Styling
      'title_color' =>'',
      'title_size' =>'',
    ), $atts));

    // Shortcode Style CSS
    $e_uniqid     = uniqid();
    $inline_style = '';

    // Text Color
    if ( $title_color || $title_size ) {
      $inline_style .= '.hanor-social-share-'. $e_uniqid .'.hanor-blog-share.havnor-share-page .blog-share-title  {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. havnor_core_check_px($title_size) .';' : '';
      $inline_style .= '}';
    }
    // add inline style
    havnor_add_inline_style( $inline_style );
    $styled_class  = ' hanor-social-share-'. $e_uniqid;

    global $post;
    $page_url = get_permalink($post->ID );
    $title = $post->post_title;
    $share_text = $share_text ? $share_text : esc_html__( 'Share Us On : ', 'havnor' );
    $share_on_text = cs_get_option('share_on_text');
    $share_on_text = $share_on_text ? $share_on_text : esc_html__( 'Share On', 'havnor' );
   
    // Turn output buffer on
    ob_start(); ?>
        
    <div class="hanor-blog-share havnor-share-page <?php echo $class . $styled_class; ?>">
      <h5 class="blog-share-title"><?php echo $share_text; ?></h5>
      <div class="hanor-social rounded">
        <?php if(!$hide_fb_share) { ?>
        <a href="//www.facebook.com/sharer/sharer.php?u=<?php print(urlencode($page_url)); ?>&amp;t=<?php print(urlencode($title)); ?>" class="facebook" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Facebook', 'havnor'); ?>" target="_blank"><i class="fa fa-facebook"></i></a> <?php }
        if(!$hide_twitter_share) { ?>
        <a href="//twitter.com/home?status=<?php print(urlencode($title)); ?>+<?php print(urlencode($page_url)); ?>" class="twitter" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Twitter', 'havnor'); ?>" target="_blank"><i class="fa fa-twitter"></i></a> <?php }
        if(!$hide_gplus_share) { ?>
        <a href="//plus.google.com/share?url=<?php print(urlencode($page_url)); ?>" class="google-plus" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Google+', 'havnor'); ?>" target="_blank"><i class="fa fa-google-plus"></i></a> <?php }
        if(!$hide_pin_share) { ?>
        <a href="http://pinterest.com/pin/create/button/?url=<?php print(urlencode($page_url)); ?>&amp;title=<?php print(urlencode($title)); ?>" class="pinterest" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Pinterest', 'havnor'); ?>" target="_blank"><i class="fa fa-pinterest"></i></a> <?php }
        if(!$hide_linked_share) { ?>
        <a href="//www.linkedin.com/shareArticle?mini=true&amp;url=<?php print(urlencode($page_url)); ?>&amp;title=<?php print(urlencode($title)); ?>" class="linkedin" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Linkedin', 'havnor'); ?>" target="_blank"><i class="fa fa-linkedin"></i></a>  <?php } ?>
      </div>
    </div>
    <?php
    // Return outbut buffer
    return ob_get_clean();
  }
}
add_shortcode( 'hanor_share', 'havnor_share_func' );
