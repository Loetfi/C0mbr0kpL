<?php
/**
 * Single Post.
 */
// Metabox
global $post;
$havnor_id    = ( isset( $post ) ) ? $post->ID : 0;
$havnor_meta  = get_post_meta( $havnor_id, 'post_type_metabox', true );
if($havnor_meta){
	$audio_post = $havnor_meta['audio_post'];
	$video_post_video_link = $havnor_meta['video_post_video_link'];
	$gallery_post_format = $havnor_meta['gallery_post_format'];
} else {
	$audio_post = '';
	$video_post_video_link = '';
	$gallery_post_format = '';
}
$havnor_metas_hide = (array) cs_get_option( 'theme_metas_hide' );
$havnor_large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
$havnor_large_image = $havnor_large_image[0];
$havnor_post_type = get_post_meta( get_the_ID(), 'post_type_metabox', true );
$date_format = cs_get_option('blog_date_format');
$date_format_actual = $date_format ? $date_format : '';
// Single Theme Option
$havnor_single_featured_image = cs_get_option('single_featured_image');
$havnor_single_tag_list = cs_get_option('single_tag_list');
$havnor_single_category_list = cs_get_option('single_category_list');
$havnor_single_share_option = cs_get_option('single_share_option');
$havnor_single_author_info = cs_get_option('single_author_info');
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('hanor-blog-post'); ?>>
	<?php
	if(!$havnor_single_featured_image){} else {
		if(get_post_format() === 'gallery')  {
		if($gallery_post_format) { ?>
		<div class="owl-carousel" data-items="1" data-margin="0" data-loop="true" data-nav="true" data-dots="true" data-autoplay="true" data-auto-height="true">
			<?php
			$ids = explode( ',', $gallery_post_format );
			foreach ( $ids as $id ) {
			  $attachment = wp_get_attachment_image_src( $id, 'fullsize' );
			  $alt = get_post_meta($id, '_wp_attachment_image_alt', true);
			  $g_img = $attachment[0];
		      $post_img = $g_img;
			  echo '<div class="item"><div class="hanor-image"><img src="'. esc_url($post_img) .'" alt="'. esc_attr($alt) .'" /></div></div>';
			}	?>
    </div>
	<?php } elseif ($havnor_large_image) { ?>
	  <div class="blog-image">
	    <img src="<?php echo esc_url($havnor_large_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
	  </div>
		<?php } } elseif (get_post_format() === 'audio') { if ($audio_post) { ?>
		<div class="hanor-iframe">
      <?php echo $audio_post; ?>
    </div>
	<?php } elseif ($havnor_large_image) { ?>
	  <div class="blog-image">
	    <img src="<?php echo esc_url($havnor_large_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
	  </div>
		<?php } }	elseif (get_post_format() === 'video') { if ($havnor_large_image) { ?>
		<div class="blog-image hanor-video-wrap">
	    <img src="<?php echo esc_url($havnor_large_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
      <a href="<?php echo esc_url($video_post_video_link); ?>" class="hanor-video-btn-wrap hanor-popup-video">
        <img src="<?php echo esc_url(HAVNOR_IMAGES . '/buttons/button3@1x.png'); ?>" alt="Button" width="73">
      </a>
    </div>
	<?php } } else {
		if ($havnor_large_image) { ?>
	  <div class="blog-image">
	    <img src="<?php echo esc_url($havnor_large_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
	  </div>
		<?php }
	 }
}
	?>
	<div class="blog-detail-wrap">
	<div class="blog-meta">
	 <?php if ( !in_array( 'author', $havnor_metas_hide ) ) { ?>
		<div class="blog-meta-item"><i class="fa fa-user-o" aria-hidden="true"></i><?php echo esc_html__( 'By', 'havnor' ); ?> <span class="blog-author-name"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html(get_the_author()); ?></a></span></div>
		<?php } if ( !in_array( 'date', $havnor_metas_hide ) ) { ?>
		<i class="fa fa-clock-o" aria-hidden="true"></i><?php echo esc_html(get_the_date($date_format_actual)); } ?>
	</div>
	<!-- Content -->
	<?php
	the_content();
	echo havnor_wp_link_pages();
	?>
	<!-- Content -->
</div> <!-- Detail wrap -->
	<!-- Tags and Share -->
	<div class="hanor-blog-meta blog-single-metas">
		<?php 
			$tag_list = get_the_tags();
			$cat_list = get_the_category();
			if($tag_list && $cat_list) {
				$meta_class = ' hav-both-meta';
			} else {
				$meta_class = ' dhav-both-meta';
			}
		if($havnor_single_tag_list || $havnor_single_category_list) { ?>
		<div class="hanor-tags-cats <?php echo esc_attr($meta_class); ?>">
		<?php
			if($havnor_single_category_list) {
		  if($cat_list) { ?>
	    <div class="hanor-blog-tags hanor-blog-cat hanor-item">
	      <span><?php echo esc_html__( 'Categories:', 'havnor' ); ?></span>
	      <?php echo the_category(', '); ?>
	    </div>
	    <?php } }
		  if($havnor_single_tag_list) {
		  if($tag_list) { ?>
	    <div class="hanor-blog-tags hanor-item">
	      <span><?php echo esc_html__( 'Tags:', 'havnor' ); ?></span>
	      <?php echo the_tags('', ', ', ''); ?>
	    </div>
	    <?php } }
		   ?>
	    </div>
	    <?php }
			if($havnor_single_share_option) {
				if ( function_exists( 'havnor_wp_share_option' ) ) {
					echo havnor_wp_share_option();
				}
			}

				$older_post = cs_get_option('older_post');
	      $newer_post = cs_get_option('newer_post');
	      $older_post = $older_post ? $older_post : esc_html__( 'Prev Post', 'havnor' );
	      $newer_post = $newer_post ? $newer_post : esc_html__( 'Next Post', 'havnor' );
	      $prev_post = get_adjacent_post(false, '', true);
	      $next_post = get_adjacent_post(false, '', false);
	      if($prev_post || $next_post) { ?>
	      <div class="hanor-blog-controls">
	        <?php
	  		 		if($prev_post) {
	          	echo '<div class="pull-left"><a href="' . esc_url(get_permalink($prev_post->ID)) . '"><i class="fa fa-angle-left" aria-hidden="true"></i> '.esc_html($older_post).'</a></div>';
	          }
	  				if($next_post) {
	          	echo '<div class="pull-right"><a href="'. esc_url(get_permalink($next_post->ID)) .'">'.esc_html($newer_post).' <i class="fa fa-angle-right" aria-hidden="true"></i></a></div>';
	        	}
	        ?>
	      </div>
	      <?php } // $prev_post && $next_post
			?>
  </div>
	<!-- Tags and Share -->
	<!-- Related Articles -->
	<?php
	$single_related_post = cs_get_option('single_related_post');
	$single_related_title = cs_get_option('single_related_title');
	$single_related_limit = cs_get_option('single_related_limit');
	$single_related_more = cs_get_option('single_related_more');
	$single_related_title = $single_related_title ? $single_related_title : esc_html__( 'Related Articles', 'havnor' );
	$single_related_limit = $single_related_limit ? $single_related_limit : '2';
	$single_related_more = $single_related_more ? $single_related_more : esc_html__( 'READ MORE', 'havnor' );

	if(!$single_related_post) {} else {
	$related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => $single_related_limit, 'post__not_in' => array($post->ID) ) );
	if ($related) { ?>
	<div class="hanor-related-articles">
    <h3 class="related-articles-title"><?php echo esc_html($single_related_title); ?></h3>
    <div class="blogs-style-three">
      <div class="row">
      <?php
			if( $related ) foreach( $related as $post ) {
			setup_postdata($post);
      $related_large_image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
      $related_large_image = $related_large_image[0];
    	if(class_exists('Aq_Resize')) {
				$related_img = aq_resize( $related_large_image, '405', '260', true );
	    } else {$related_img = $related_large_image;}
			$related_featured_img = ( $related_img ) ? $related_img : $related_large_image; ?>
        <div class="col-sm-6">
          <div class="blog-item hanor-item">
          	<?php if ($related_large_image) { ?>
            <div class="hanor-image">
            	<a href="<?php echo esc_url( get_permalink() ); ?>"><img src="<?php echo esc_url($related_featured_img); ?>" alt="<?php echo esc_attr(get_the_title()); ?>"></a>
            </div>
          	<?php } ?>
            <div class="blog-info">
              <div class="blog-info-wrap">
                <div class="blog-meta">
                  <div class="blog-meta-item"><?php echo esc_html__( 'By', 'havnor' ); ?> <span class="blog-author-name"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html(get_the_author()); ?></a></span></div>
	        				<div class="blog-meta-item"><?php echo get_the_date($date_format_actual);?></div>
                </div>
                <h4 class="blog-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html(get_the_title()); ?></a></h4>
              </div>
              <div class="hanor-link"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html($single_related_more); ?></a></div>
            </div>
          </div>
        </div>
			<?php	} wp_reset_postdata(); ?>
      </div>
    </div>
  </div>
	<?php	} }
	// Related Articles
	if(!$havnor_single_author_info) {} else {
		echo havnor_author_info();
	}
	?>
</div><!-- #post-## -->
<?php
