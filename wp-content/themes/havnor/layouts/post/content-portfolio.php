<?php
/*
 * Admin Styles for Sensation Theme
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

$havnor_portfolio_style = cs_get_option('portfolio_style');
$havnor_portfolio_column = cs_get_option('portfolio_column');
// Category
global $post;
$havnor_terms = wp_get_post_terms($post->ID,'portfolio_category');
foreach ($havnor_terms as $term) {
  $havnor_cat_class = 'cat-' . $term->slug;
}
$havnor_count = count($havnor_terms);
$i=0;
$havnor_cat_class = '';
if ($havnor_count > 0) {
  foreach ($havnor_terms as $term) {
    $i++;
    $havnor_cat_class .= 'cat-'. $term->slug .' ';
    if ($havnor_count != $i) {
      $havnor_cat_class .= '';
    } else {
      $havnor_cat_class .= '';
    }
  }
}

// Featured Image
$havnor_large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
$havnor_large_image = $havnor_large_image[0];
if ($havnor_portfolio_column === '2') {
  if(class_exists('Aq_Resize')) {
    $havnor_portfolio_img = aq_resize( $havnor_large_image, '580', '420', true );
  } else {$havnor_portfolio_img = $havnor_large_image;}
  $havnor_featured_img = ( $havnor_portfolio_img ) ? $havnor_portfolio_img : HAVNOR_IMAGES . '/580x420.png';
} else {
  if(class_exists('Aq_Resize')) {
    $havnor_portfolio_img = aq_resize( $havnor_large_image, '370', '370', true );
  } else {$havnor_portfolio_img = $havnor_large_image;}
  $havnor_featured_img = ( $havnor_portfolio_img ) ? $havnor_portfolio_img : HAVNOR_IMAGES . '/370x370.png';
}

if ($havnor_portfolio_style === 'two') { ?>
<div class="masonry-item <?php echo esc_attr($havnor_cat_class); ?>" data-category="<?php echo esc_attr($havnor_cat_class); ?>">
  <div class="work-item">
    <div class="hanor-image"><img src="<?php echo esc_url($havnor_featured_img); ?>" alt="<?php echo esc_attr(get_the_title()); ?>"></div>
    <div class="work-info">
      <div class="hanor-table-wrap">
        <div class="hanor-align-wrap">
          <h4 class="work-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html(the_title()); ?></a></h4>
          <h5 class="work-category">
            <span class="category-link">
            <?php
              $category_list = wp_get_post_terms($post->ID, 'portfolio_category');
              $i=1;
              foreach ($category_list as $term) {
                $term_link = get_term_link( $term );
                echo '<a href="'. esc_url($term_link) .'">'. esc_html($term->name) .'</a> ';
                if($i++==2) break;
              }
            ?>
            </span>
          </h5>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } elseif ($havnor_portfolio_style === 'three') { ?>
<div class="masonry-item <?php echo esc_attr($havnor_cat_class); ?>" data-category="<?php echo esc_attr($havnor_cat_class); ?>">
  <div class="work-item">
    <div class="hanor-image"><img src="<?php echo esc_url($havnor_large_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>"></div>
    <div class="work-info">
      <div class="hanor-table-wrap">
        <div class="hanor-align-wrap">
          <h4 class="work-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html(the_title()); ?></a></h4>
          <h5 class="work-category">
            <span class="category-link">
            <?php
              $category_list = wp_get_post_terms($post->ID, 'portfolio_category');
              $i=1;
              foreach ($category_list as $term) {
                $term_link = get_term_link( $term );
                echo '<a href="'. esc_url($term_link) .'">'. esc_html($term->name) .'</a> ';
                if($i++==2) break;
              }
            ?>
            </span>
          </h5>
        </div>
      </div>
    </div>
  </div>
</div>  
<?php } else { ?>
<div class="masonry-item <?php echo esc_attr($havnor_cat_class); ?>" data-category="<?php echo esc_attr($havnor_cat_class); ?>">
  <div class="work-item">
    <div class="hanor-image"><img src="<?php echo esc_url($havnor_featured_img); ?>" alt="<?php echo esc_attr(get_the_title()); ?>"></div>
    <div class="work-info">
      <h4 class="work-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html(the_title()); ?></a></h4>
      <h5 class="work-category">
        <span class="category-link">
        <?php
          $category_list = wp_get_post_terms($post->ID, 'portfolio_category');
          $i=1;
          foreach ($category_list as $term) {
            $term_link = get_term_link( $term );
            echo '<a href="'. esc_url($term_link) .'">'. esc_html($term->name) .'</a> ';
            if($i++==2) break;
          }
        ?>
        </span>
      </h5>
    </div>
  </div>
</div>
<?php } 
