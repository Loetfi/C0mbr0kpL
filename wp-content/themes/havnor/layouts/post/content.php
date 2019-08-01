<?php
/**
 * Template part for displaying posts.
 */
// Metabox
global $post;
$havnor_id    = ( isset( $post ) ) ? $post->ID : 0;
$havnor_meta  = get_post_meta( $havnor_id, 'post_type_metabox', true );
if($havnor_meta){
	$audio_post = $havnor_meta['audio_post'];
	$video_post = $havnor_meta['video_post'];
	$video_post_video_link = $havnor_meta['video_post_video_link'];
	$gallery_post_format = $havnor_meta['gallery_post_format'];
} else {
	$audio_post = '';
	$video_post = '';
	$video_post_video_link = '';
	$gallery_post_format = '';
}

$havnor_large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
$havnor_large_image = $havnor_large_image[0];
$havnor_read_more_text = cs_get_option('read_more_text');
$havnor_read_text = $havnor_read_more_text ? $havnor_read_more_text : esc_html__( 'READ MORE', 'havnor' );
$havnor_post_type = get_post_meta( get_the_ID(), 'post_type_metabox', true );
$havnor_blog_style = cs_get_option('blog_listing_style');
$havnor_metas_hide = (array) cs_get_option( 'theme_metas_hide' );
$havnor_blog_columns = cs_get_option('blog_listing_columns');
$date_format = cs_get_option('blog_date_format');
$date_format_actual = $date_format ? $date_format : '';
// Columns
if ($havnor_blog_columns === 'col-3') {
	$havnor_blog_col_class = 'col-md-4 col-sm-6';
} else {
	$havnor_blog_col_class = 'col-md-6 col-sm-6';
}

if ($havnor_blog_style === 'style-two' || $havnor_blog_style === 'style-three' || $havnor_blog_style === 'style-four' || $havnor_blog_style === 'style-five') {
	if ($havnor_blog_columns === 'col-3') {
		if($havnor_blog_style === 'style-five'){
      if(class_exists('Aq_Resize')) {
        $blog_img = aq_resize( $havnor_large_image, '710', '595', true );
      } else {$blog_img = $havnor_large_image;}
      $featured_img = ( $blog_img ) ? $blog_img : HAVNOR_IMAGES . '/370x310.png';
    } else {
      if(class_exists('Aq_Resize')) {
        $blog_img = aq_resize( $havnor_large_image, '370', '310', true );
      } else {$blog_img = $havnor_large_image;}
      $featured_img = ( $blog_img ) ? $blog_img : HAVNOR_IMAGES . '/370x310.png';
    }
	} else {
  	if(class_exists('Aq_Resize')) {
			$blog_img = aq_resize( $havnor_large_image, '570', '400', true );
    } else {$blog_img = $havnor_large_image;}
		$featured_img = ( $blog_img ) ? $blog_img : HAVNOR_IMAGES . '/600x420.png';
	}
} else {
	if(class_exists('Aq_Resize')) {
		$blog_img = aq_resize( $havnor_large_image, '900', '600', true );
   } else {$blog_img = $havnor_large_image;}
	$featured_img = ( $blog_img ) ? $blog_img : $havnor_large_image;
}

if ($havnor_large_image) {
	$image_class = '';
} else {
	$image_class = ' no-feature-image';
}
if(is_sticky()) {
  $sticky_class = ' sticky';
} else {
  $sticky_class = '';
}
// RTL
if ( is_rtl() ) {
  $switch_rtl = ' data-rtl="true"';
} else {
  $switch_rtl = ' data-rtl="false"';
}
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('hanor-blog-post posts-item'); ?>>
	<?php if ($havnor_blog_style === 'style-two' || $havnor_blog_style === 'style-three' || $havnor_blog_style === 'style-four' || $havnor_blog_style === 'style-five') { ?>
	<div class="<?php echo esc_attr($havnor_blog_col_class); ?>">
	  <div class="blog-item hanor-item <?php echo esc_attr($image_class); ?><?php echo esc_attr($sticky_class); ?>">
	  	<?php if ($havnor_large_image) { ?>
	  	<a href="<?php echo esc_url( get_permalink() ); ?>">
	    <div class="hanor-image">
	      <img src="<?php echo esc_url($featured_img); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" class="blogs-two-image">
	    </div>
	    </a>
	  	<?php } ?>
	    <div class="blog-info">
	    <?php if ($havnor_blog_style === 'style-five') { ?>
		    <div class="blog-info-wrap">
	        <div class="blog-meta blog-meta-top">
	          <?php if ( !in_array( 'category', $havnor_metas_hide ) ) { ?> <div class="blog-meta-item"><?php echo the_category(', '); ?></div> <?php }
	           if ( !in_array( 'date', $havnor_metas_hide ) ) { ?><div class="blog-meta-item"><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo get_the_date($date_format_actual); ?></div> <?php } ?>
	        </div>
	        <h4 class="blog-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html(get_the_title()); ?></a></h4>
	        <div class="hanor-link"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html($havnor_read_text); ?></a></div>
	      </div>
	    <?php } elseif ($havnor_blog_style === 'style-four') { ?>
	      <div class="blog-info-wrap">
	        <h4 class="blog-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html(get_the_title()); ?></a></h4>
	        <?php
					$blog_excerpt = cs_get_option('theme_blog_excerpt');
					if ($blog_excerpt) {
						$blog_excerpt = $blog_excerpt;
					} else {
						$blog_excerpt = '12';
					}
					echo '<div class="hanor-blog-excerpt">';
					havnor_excerpt($blog_excerpt);
					echo '</div>';
					echo havnor_wp_link_pages();
					?>
	      </div>
	      <div class="blog-meta">
	        <?php if ( !in_array( 'author', $havnor_metas_hide ) ) { ?><div class="blog-meta-item"><div class="hanor-image"><?php echo get_avatar( get_the_author_meta( 'ID' ), 52 ); ?></div><?php echo esc_html__( 'By', 'havnor' ); ?> <span class="blog-author-name"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html(get_the_author()); ?></a></span></div><?php }
	        if ( !in_array( 'date', $havnor_metas_hide ) ) { ?><div class="blog-meta-item"><?php echo get_the_date($date_format_actual); ?></div><?php }
	        if ( !in_array( 'category', $havnor_metas_hide ) ) { ?> <div class="blog-meta-item"><?php echo the_category(', '); ?></div> <?php } ?>
	      </div>
			<?php } elseif ($havnor_blog_style === 'style-two') { ?>
				<div class="hanor-table-wrap">
	        <div class="hanor-align-wrap bottom">
	        	<div class="blog-meta blog-meta-top">
		          <?php if ( !in_array( 'date', $havnor_metas_hide ) ) { ?><div class="blog-meta-item"><?php echo get_the_date($date_format_actual); ?></div> <?php }
		        	if ( !in_array( 'category', $havnor_metas_hide ) ) { ?> <div class="blog-meta-item"><?php echo the_category(', '); ?></div> <?php } ?>
		        </div>
	          <div class="blog-info-wrap">
	            <h4 class="blog-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html(get_the_title()); ?></a></h4>
	          </div>
	          <div class="blog-meta">
	            <?php if ( !in_array( 'author', $havnor_metas_hide ) ) { ?><div class="hanor-image"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_avatar( get_the_author_meta( 'ID' ), 52 ); ?></a></div>
	        		<div class="blog-meta-item"><?php echo esc_html__( 'By', 'havnor' ); ?> <span class="blog-author-name"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html(get_the_author()); ?></a></span></div><?php } ?>
	          </div>
	        </div>
	      </div>
			<?php } else { ?>
				<div class="blog-info-wrap">
	        <div class="blog-meta">
	          <?php if ( !in_array( 'author', $havnor_metas_hide ) ) { ?><div class="blog-meta-item"><?php echo esc_html__( 'By', 'havnor' ); ?> <span class="blog-author-name"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html(get_the_author()); ?></a></span></div> <?php }
	        	if ( !in_array( 'date', $havnor_metas_hide ) ) { ?><div class="blog-meta-item"><?php echo get_the_date($date_format_actual); ?></div> <?php }
	        	if ( !in_array( 'category', $havnor_metas_hide ) ) { ?> <div class="blog-meta-item"><?php echo the_category(', '); ?></div> <?php } ?>
	        </div>
	        <h4 class="blog-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html(get_the_title()); ?></a></h4>
	      </div>
	      <div class="hanor-link"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html($havnor_read_text); ?></a></div>
			<?php } ?>
	    </div>
	  </div>
	</div>
<?php } else { ?>
	<div class="story-item <?php echo esc_attr($image_class); ?><?php echo esc_attr($sticky_class); ?>">
	<?php if(get_post_format() === 'gallery')  {
		if($gallery_post_format) { ?>
		<div class="owl-carousel" data-items="1" data-margin="0" data-loop="true" data-nav="true" data-dots="true" data-autoplay="true" data-auto-height="true"<?php echo esc_attr($switch_rtl); ?>>
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
	<?php } } elseif (get_post_format() === 'audio') { if ($audio_post) { ?>
		<div class="hanor-iframe">
      <?php echo $audio_post; ?>
    </div>
	<?php } }	elseif (get_post_format() === 'video') { if ($havnor_large_image) { ?>
		<div class="hanor-image hanor-video-wrap">
      <img src="<?php echo esc_url($featured_img); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
      <a href="<?php echo esc_url($video_post_video_link); ?>" class="hanor-video-btn-wrap hanor-popup-video">
        <img src="<?php echo esc_url(HAVNOR_IMAGES . '/buttons/button3@1x.png'); ?>" alt="Button" width="73">
      </a>
    </div>
	<?php } else { ?>
		<div class="hanor-image hanor-video-iframe">
			<?php echo $video_post; ?>
		</div>
	<?php	} } else { ?>
		<?php if ($havnor_large_image) { ?>
	  <div class="hanor-image">
	    <img src="<?php echo esc_url($featured_img); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
	  </div>
		<?php } ?>
	<?php } ?>
		<div class="story-info">
			<div class="story-meta">
        <?php if ( !in_array( 'author', $havnor_metas_hide ) ) { ?><div class="blog-meta-item"><?php echo esc_html__( 'By', 'havnor' ); ?> <span class="blog-author-name"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html(get_the_author()); ?></a></span></div> <?php }
      	if ( !in_array( 'date', $havnor_metas_hide ) ) { ?><div class="blog-meta-item"><span class="story-date"><?php echo get_the_date($date_format_actual); ?></span></div> <?php }
      	if ( !in_array( 'category', $havnor_metas_hide ) ) { ?> <div class="blog-meta-item"><?php echo the_category(', '); ?></div> <?php } ?>
      </div>

		  <h3 class="story-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html(get_the_title()); ?></a></h3>
			  <?php
					$blog_excerpt = cs_get_option('theme_blog_excerpt');
					if ($blog_excerpt) {
						$blog_excerpt = $blog_excerpt;
					} else {
						$blog_excerpt = '55';
					}
					echo '<div class="hanor-blog-excerpt">';
					havnor_excerpt($blog_excerpt);
					echo '</div>';
					echo havnor_wp_link_pages();
				?>
		  <div class="hanor-btns-group">
		    <a href="<?php echo esc_url( get_permalink() ); ?>" class="hanor-btn hanor-blue-border-btn"><span class="hanor-btn-text"><?php echo esc_html($havnor_read_text); ?></span></a>
		  </div>
		</div>
  </div>
<?php } ?>

</div><!-- #post-## -->
<?php
