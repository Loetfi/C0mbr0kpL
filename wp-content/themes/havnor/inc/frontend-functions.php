<?php
/*
 * All Front-End Helper Functions
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

/* Exclude category from blog */
if( ! function_exists( 'havnor_vt_excludeCat' ) ) {
  function havnor_vt_excludeCat($query) {
  	if ( $query->is_home ) {
  		$exclude_cat_ids = cs_get_option('theme_exclude_categories');
  		if($exclude_cat_ids) {
  			foreach( $exclude_cat_ids as $exclude_cat_id ) {
  				$exclude_from_blog[] = '-'. $exclude_cat_id;
  			}
  			$query->set('cat', implode(',', $exclude_from_blog));
  		}
  	}
  	return $query;
  }
  add_filter('pre_get_posts', 'havnor_vt_excludeCat');
}

/* Include Default value for dropdown in contact form7*/
function havnor_wpcf7_form_elements($html) {
    $text = 'Choose';
    $html = str_replace('---',  $text , $html);
    return $html;
}
add_filter('wpcf7_form_elements', 'havnor_wpcf7_form_elements');

/* Excerpt Length */
class HavnorExcerpt {

  // Default length (by WordPress)
  public static $length = 55;

  // Output: havnor_excerpt('short');
  public static $types = array(
    'short' => 25,
    'regular' => 55,
    'long' => 100
  );

  /**
   * Sets the length for the excerpt,
   * then it adds the WP filter
   * And automatically calls the_excerpt();
   *
   * @param string $new_length
   * @return void
   * @author Baylor Rae'
   */
  public static function length($new_length = 55) {
    HavnorExcerpt::$length = $new_length;
    add_filter('excerpt_length', 'HavnorExcerpt::new_length');
    HavnorExcerpt::output();
  }

  // Tells WP the new length
  public static function new_length() {
    if( isset(HavnorExcerpt::$types[HavnorExcerpt::$length]) )
      return HavnorExcerpt::$types[HavnorExcerpt::$length];
    else
      return HavnorExcerpt::$length;
  }

  // Echoes out the excerpt
  public static function output() {
    the_excerpt();
  }

}

// Custom Excerpt Length
if( ! function_exists( 'havnor_excerpt' ) ) {
  function havnor_excerpt($length = 55) {
    HavnorExcerpt::length($length);
  }
}

if ( ! function_exists( 'havnor_new_excerpt_more' ) ) {
  function havnor_new_excerpt_more( $more ) {
    return '...';
  }
  add_filter('excerpt_more', 'havnor_new_excerpt_more');
}


/* Tag Cloud Widget - Remove Inline Font Size */
if( ! function_exists( 'havnor_vt_tag_cloud' ) ) {
  function havnor_vt_tag_cloud($tag_string){
    return preg_replace("/style='font-size:.+pt;'/", '', $tag_string);
  }
  add_filter('wp_generate_tag_cloud', 'havnor_vt_tag_cloud', 10, 3);
}

/* Password Form */
if( ! function_exists( 'havnor_vt_password_form' ) ) {
  function havnor_vt_password_form( $output ) {
    $output = str_replace( 'type="submit"', 'type="submit" class=""', $output );
    return $output;
  }
  add_filter('the_password_form' , 'havnor_vt_password_form');
}

/* Maintenance Mode */
if( ! function_exists( 'havnor_vt_maintenance_mode' ) ) {
  function havnor_vt_maintenance_mode(){

    $maintenance_mode_page = cs_get_option( 'maintenance_mode_page' );
    $enable_maintenance_mode = cs_get_option( 'enable_maintenance_mode' );

    if ( isset($enable_maintenance_mode) && ! empty( $maintenance_mode_page ) && ! is_user_logged_in() ) {
      get_template_part('layouts/post/content', 'maintenance');
      exit;
    }

  }
  add_action( 'wp', 'havnor_vt_maintenance_mode', 1 );
}

/* Widget Layouts */
if ( ! function_exists( 'havnor_vt_footer_widgets' ) ) {
  function havnor_vt_footer_widgets() {

    $output = '';
    $footer_widget_layout = cs_get_option('footer_widget_layout');

    if( $footer_widget_layout ) {

      switch ( $footer_widget_layout ) {
        case 1: $widget = array('piece' => 1, 'class' => 'col-md-12'); break;
        case 2: $widget = array('piece' => 2, 'class' => 'col-md-6'); break;
        case 3: $widget = array('piece' => 3, 'class' => 'col-md-4'); break;
        case 4: $widget = array('piece' => 4, 'class' => 'col-md-3 col-sm-6'); break;
        case 5: $widget = array('piece' => 3, 'class' => 'col-md-3', 'layout' => 'col-md-6', 'queue' => 1); break;
        case 6: $widget = array('piece' => 3, 'class' => 'col-md-3', 'layout' => 'col-md-6', 'queue' => 2); break;
        case 7: $widget = array('piece' => 3, 'class' => 'col-md-3', 'layout' => 'col-md-6', 'queue' => 3); break;
        case 8: $widget = array('piece' => 4, 'class' => 'col-md-2', 'layout' => 'col-md-6', 'queue' => 1); break;
        case 9: $widget = array('piece' => 4, 'class' => 'col-md-2', 'layout' => 'col-md-6', 'queue' => 4); break;
        case 10: $widget = array('piece' => 4, 'class' => 'col-md-3', 'layout' => 'col-md-2', 'queue' => 2, 'layout_two' => 'col-md-4', 'queue_two' => 4); break;
        default : $widget = array('piece' => 4, 'class' => 'col-md-3'); break;
      }

      for( $i = 1; $i < $widget["piece"]+1; $i++ ) {
        if(isset( $widget["queue_two"] ) && $widget["queue_two"] == $i ){
          $widget_cls = ( isset( $widget["queue_two"] ) && $widget["queue_two"] == $i ) ? $widget["layout_two"] : '';
          $widget_class = '';
        } else {
          $widget_class = ( isset( $widget["queue"] ) && $widget["queue"] == $i ) ? $widget["layout"] : $widget["class"];
          $widget_cls = '';
        }
        $output .= '<div class="footer-widget '. $widget_class .' '.$widget_cls.'">';
        ob_start();
        if (is_active_sidebar('footer-'. $i)) {
          dynamic_sidebar( 'footer-'. $i );
        }
        $output .= ob_get_clean();
        $output .= '</div>';
      }
    }
    return $output;
  }
}

if( ! function_exists( 'havnor_vt_top_bar' ) ) {
  function havnor_vt_top_bar() {

    $out     = '';
    if ( ( cs_get_option( 'top_left' ) || cs_get_option( 'top_right' ) ) ) {
      $out .= '<div class="hanor-topbar"><div class="container"><div class="row">';
      $out .= havnor_vt_top_bar_modules( 'left' );
      $out .= havnor_vt_top_bar_modules( 'right' );
      $out .= '</div></div></div>';
    }
    return $out;
  }
}

/* WP Link Pages */
if ( ! function_exists( 'havnor_wp_link_pages' ) ) {
  function havnor_wp_link_pages() {
    $defaults = array(
      'before'           => '<div class="wp-link-pages">' . esc_html__( 'Pages:', 'havnor' ),
      'after'            => '</div>',
      'link_before'      => '<span>',
      'link_after'       => '</span>',
      'next_or_number'   => 'number',
      'separator'        => ' ',
      'pagelink'         => '%',
      'echo'             => 1
    );
    wp_link_pages( $defaults );
  }
}

/* Author Info */
if ( ! function_exists( 'havnor_author_info' ) ) {
  function havnor_author_info() {

    if (get_the_author_meta( 'url' )) {
      $author_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
      $website_url = get_the_author_meta( 'url' );
      $target = 'target="_blank"';
    } else {
      $author_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
      $website_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
      $target = '';
    }

    // variables
    $author_text = cs_get_option('author_text');
    $author_text = $author_text ? $author_text : esc_html__( 'Author', 'havnor' );
    $author_content = get_the_author_meta( 'description' );
if ($author_content) {
?>
  <div class="hanor-author-info">
    <div class="author-avatar">
      <a href="<?php echo esc_url($website_url); ?>" <?php echo esc_html($target); ?>>
        <?php echo get_avatar( get_the_author_meta( 'ID' ), 76 ); ?>
      </a>
    </div>
    <div class="author-content">
      <div class="author-pro"><?php echo esc_html($author_text); ?></div>
      <a href="<?php echo esc_url($author_url); ?>" class="author-name"><?php echo esc_html(get_the_author_meta('first_name')).' '.esc_html(get_the_author_meta('last_name')); ?></a>
      <p><?php echo esc_html(get_the_author_meta( 'description' )); ?></p>
      <div class="hanor-social">
        <?php if (get_the_author_meta( 'twitter' )): ?><a href="<?php echo esc_url( get_the_author_meta( 'twitter' ) ); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
        <?php endif;

        if (get_the_author_meta( 'facebook' )): ?><a href="<?php echo esc_url( get_the_author_meta( 'facebook' ) ); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
        <?php endif;

        if (get_the_author_meta( 'google_plus' )): ?><a href="<?php echo esc_url( get_the_author_meta( 'google_plus' ) ); ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
        <?php endif;

        if (get_the_author_meta( 'pinterest' )): ?><a href="<?php echo esc_url( get_the_author_meta( 'pinterest' ) ); ?>" target="_blank"><i class="fa fa-pinterest"></i></a>
        <?php endif; ?>
      </div>
    </div>
  </div>
<?php
} // if $author_content
  }
}

/* ==============================================
   Custom Comment Area Modification
=============================================== */
if ( ! function_exists( 'havnor_comment_modification' ) ) {
  function havnor_comment_modification($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);
    if ( 'div' == $args['style'] ) {
      $tag = 'div';
      $add_below = 'comment';
    } else {
      $tag = 'li';
      $add_below = 'div-comment';
    }
    $comment_class = empty( $args['has_children'] ) ? '' : 'parent';
  ?>

  <<?php echo esc_attr($tag); ?> <?php comment_class('item ' . $comment_class .' ' ); ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-item">
    <?php endif; ?>
    <div class="comment-theme">
        <div class="comment-image">
          <?php if ( $args['avatar_size'] != 0 ) {
            echo get_avatar( $comment, 76 );
          } ?>
        </div>
    </div>
    <div class="comment-main-area">
      <div class="comment-wrapper">
        <div class="hanor-comments-meta">
          <h4><?php printf( '%s', get_comment_author() ); ?></h4>
          <span class="comments-date"><?php echo esc_html(get_comment_date('M d, Y')); ?></span>
        </div>
        <?php if ( $comment->comment_approved == '0' ) : ?>
        <em class="comment-awaiting-moderation"><?php echo esc_html__( 'Your comment is awaiting moderation.', 'havnor' ); ?></em>
        <?php endif; ?>
        <div class="comment-area">
          <?php comment_text(); ?>
        </div>
        <div class="comments-reply">
        <?php
          comment_reply_link( array_merge( $args, array(
          'reply_text' => '<span class="comment-reply-link">'. esc_html__('Reply','havnor') .'</span>',
          'before' => '',
          'class'  => '',
          'depth' => $depth,
          'max_depth' => $args['max_depth']
          ) ) );
        ?>
        </div>
    </div>
    </div>
  <?php if ( 'div' != $args['style'] ) : ?>
  </div>
  <?php endif;
  }
}

/* Title Area */
if ( ! function_exists( 'havnor_title_area' ) ) {
  function havnor_title_area() {

    global $post, $wp_query;
    // Get post meta in all type of WP pages
    $havnor_id    = ( isset( $post ) ) ? $post->ID : 0;
    $havnor_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $havnor_id;
    $havnor_id    = ( havnor_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $havnor_id;
    $havnor_meta  = get_post_meta( $havnor_id, 'page_type_metabox', true );
    if ($havnor_meta && (!is_archive() || havnor_is_woocommerce_shop())) {
      $custom_title = $havnor_meta['page_custom_title'];
      if ($custom_title) {
        $custom_title = $custom_title;
      } elseif(post_type_archive_title()) {
        post_type_archive_title();
      } else {
        $custom_title = '';
      }
    } else { $custom_title = ''; }

    /**
     * For strings with necessary HTML, use the following:
     * Note that I'm only including the actual allowed HTML for this specific string.
     * More info: https://codex.wordpress.org/Function_Reference/wp_kses
     */
    $allowed_title_area_tags = array(
        'a' => array(
          'href' => array(),
        ),
        'span' => array(
          'class' => array(),
        )
    );

    if( $custom_title && !is_search()) {
      echo esc_html($custom_title);
    } elseif ( is_home() ) {
      bloginfo('description');
    } elseif ( is_search() ) {
      printf( esc_html__( 'Search Results for %s', 'havnor' ), '<span>' . get_search_query() . '</span>' );
    } elseif ( is_category() || is_tax() ){
      single_cat_title();
    } elseif ( is_tag() ){
      single_tag_title(esc_html__('Posts Tagged: ', 'havnor'));
    } elseif ( is_archive() ){
      if ( is_day() ) {
        printf( wp_kses( __( 'Archive for <span>%s</span>', 'havnor' ), $allowed_title_area_tags ), get_the_date());
      } elseif ( is_month() ) {
        printf( wp_kses( __( 'Archive for <span>%s</span>', 'havnor' ), $allowed_title_area_tags ), get_the_date( 'F, Y' ));
      } elseif ( is_year() ) {
        printf( wp_kses( __( 'Archive for <span>%s</span>', 'havnor' ), $allowed_title_area_tags ), get_the_date( 'Y' ));
      } elseif ( is_author() ) {
        printf( wp_kses( __( 'Posts by: <span>%s</span>', 'havnor' ), $allowed_title_area_tags ), get_the_author_meta( 'display_name', $wp_query->post->post_author ));
      } elseif( is_shop() ) {
        esc_html_e( 'Shop', 'havnor' );
      } elseif ( is_post_type_archive() ) {
        post_type_archive_title();
      } else {
        esc_html_e( 'Archives', 'havnor' );
      }
    } else {
      the_title();
    }

  }
}

/**
 * Pagination Function
 */
if ( ! function_exists( 'havnor_default_paging_nav' ) ) {
  function havnor_default_paging_nav($nav_query = NULL) {
    if ( function_exists('wp_pagenavi')) {
      echo '<div class="hanor-pagination"><div class="hanor-pagenavi">';
      wp_pagenavi();
      echo '</div></div>';
    } else {
      global $wp_query;
      $big = 999999999;
      $current = max( 1, get_query_var('paged') );
      $total = ($nav_query != NULL) ? $nav_query->max_num_pages : $wp_query->max_num_pages;

      if($wp_query->max_num_pages == '1' ) {} else {echo '';}
      echo '<div class="hanor-pagination"><div class="hanor-pagenavi">';
      echo paginate_links( array(
        'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
        'format' => '?paged=%#%',
        'prev_text' => '<i class="fa fa-angle-left"></i>',
        'next_text' => ' <i class="fa fa-angle-right"></i>',
        'current' => $current,
        'total' => $total,
        'type' => 'list'
      ));
      echo '</div></div>';
      if($wp_query->max_num_pages == '1' ) {} else {echo '';}
    }
  }
}

if ( ! function_exists( 'havnor_paging_nav' ) ) {
  function havnor_paging_nav($numpages = '', $pagerange = '', $paged='') {

      if (empty($pagerange)) {
        $pagerange = 2;
      }
      if (empty($paged)) {
        $paged = 1;
      } else {
        $paged = $paged;
      }
      if ($numpages == '') {
        global $wp_query;
        $numpages = $wp_query->max_num_pages;
        if(!$numpages) {
          $numpages = 1;
        }
      }
      global $wp_query;
      $big = 999999999;
      if($wp_query->max_num_pages != '1' ) { ?>
      <div class="hanor-pagination">
        <?php echo paginate_links( array(
          'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
          'format' => '?paged=%#%',
          'prev_text' => '<i class="fa fa-angle-left"></i>',
          'next_text' => '<i class="fa fa-angle-right"></i>',
          'current' => $paged,
          'total' => $numpages,
          'type' => 'list'
        )); ?>
      </div>
    <?php }
  }
}

/**
 * Custom Pagination Function
 */
if ( ! function_exists( 'havnor_custom_paging_nav' ) ) {
  function havnor_custom_paging_nav($numpages = '', $pagerange = '', $paged='') {
    if (empty($pagerange)) {
      $pagerange = 2;
    }
    if (empty($paged)) {
      $paged = 1;
    } else {
      $paged = $paged;
    }
    if ($numpages == '') {
      global $wp_query;
      $numpages = $wp_query->max_num_pages;
      if(!$numpages) {
        $numpages = 1;
      }
    }
    $big = 999999999; ?>
    <div class="hanor-pagenavi">
      <?php echo paginate_links( array(
        'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
        'format' => '?page=%#%',
        'prev_text' => '<i class="fa fa-angle-left" aria-hidden="true"></i>',
        'next_text' => '<i class="fa fa-angle-right" aria-hidden="true"></i>',
        'current' => $paged,
        'total' => $numpages,
        'type' => 'list'
      )); ?>
  </div>
<?php
  }
}
/* Added next class to wp-pagenavi*/
add_filter('wp_pagenavi_class_nextpostslink', 'havnor_pagination_nextpostslink_class');
function havnor_pagination_nextpostslink_class($class_name) {
  return 'next';
}
// Custom Post Type limit
function havnor_custom_posts_per_page( $query ) {
  if ( post_type_exists( 'team' ) ) {
    if ( is_post_type_archive('team') ) {
      $team_limit = cs_get_option('team_limit');
      $team_limit = $team_limit ? $team_limit : '6';
      if ( $query->query_vars['post_type'] === 'team' ) $query->query_vars['posts_per_page'] = $team_limit;
    }
  }
  if ( post_type_exists( 'portfolio' ) ) {
    if ( is_post_type_archive('portfolio') ) {
      $portfolio_limit = cs_get_option('portfolio_limit');
      $portfolio_limit = $portfolio_limit ? $portfolio_limit : '6';
      if ( $query->query_vars['post_type'] === 'portfolio' ) $query->query_vars['posts_per_page'] = $portfolio_limit;
    }
    if (is_tax('portfolio_category')) {
      $portfolio_limit = cs_get_option('portfolio_limit');
      $portfolio_limit = $portfolio_limit ? $portfolio_limit : '6';
      $query->set('posts_per_page', $portfolio_limit);
    }
  }
  return $query;
}
add_filter( 'pre_get_posts', 'havnor_custom_posts_per_page' );
