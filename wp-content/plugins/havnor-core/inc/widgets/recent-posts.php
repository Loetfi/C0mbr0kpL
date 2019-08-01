<?php
/*
 * Recent Post Widget
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

class havnor_recent_posts extends WP_Widget {

  /**
   * Specifies the widget name, description, class name and instatiates it
   */
  public function __construct() {
    parent::__construct(
      'hanor-recent-blog',
      VTHEME_NAME_P . __( ': Latest Posts', 'havnor' ),
      array(
        'classname'   => 'latest-posts-widget',
        'description' => VTHEME_NAME_P . __( ' widget that displays recent posts.', 'havnor' )
      )
    );
  }

  /**
   * Generates the back-end layout for the widget
   */
  public function form( $instance ) {
    // Default Values
    $instance   = wp_parse_args( $instance, array(
      'title'    => __( 'Recent Posts', 'havnor' ),
      'ptypes'   => 'post',
      'limit'    => '3',
      'date'     => true,
      'date_format' => '',
      'author'     => false,
      'style'     => '',
      'category' => '',
      'order' => '',
      'orderby' => '',
    ));

    // Title
    $title_value = esc_attr( $instance['title'] );
    $title_field = array(
      'id'    => $this->get_field_name('title'),
      'name'  => $this->get_field_name('title'),
      'type'  => 'text',
      'title' => __( 'Title :', 'havnor' ),
      'wrap_class' => 'vt-cs-widget-fields',
    );
    echo cs_add_element( $title_field, $title_value );

    // Style
    $style_value = esc_attr( $instance['style'] );
    $style_field = array(
      'id'    => $this->get_field_name('style'),
      'name'  => $this->get_field_name('style'),
      'type' => 'select',
      'options'   => array(
        'one' => 'One',
        'two' => 'Two (Footer)',
      ),
      'default_option' => __( 'Select Style', 'havnor' ),
      'title' => __( 'Style :', 'havnor' ),
    );
    echo cs_add_element( $style_field, $style_value );

    // Post Type
    $ptypes_value = esc_attr( $instance['ptypes'] );
    $ptypes_field = array(
      'id'    => $this->get_field_name('ptypes'),
      'name'  => $this->get_field_name('ptypes'),
      'type' => 'select',
      'options' => 'post_types',
      'default_option' => __( 'Select Post Type', 'havnor' ),
      'title' => __( 'Post Type :', 'havnor' ),
    );
    echo cs_add_element( $ptypes_field, $ptypes_value );

    // Limit
    $limit_value = esc_attr( $instance['limit'] );
    $limit_field = array(
      'id'    => $this->get_field_name('limit'),
      'name'  => $this->get_field_name('limit'),
      'type'  => 'text',
      'title' => __( 'Limit :', 'havnor' ),
      'help' => __( 'How many posts want to show?', 'havnor' ),
    );
    echo cs_add_element( $limit_field, $limit_value );

    // Date
    $date_value = esc_attr( $instance['date'] );
    $date_field = array(
      'id'    => $this->get_field_name('date'),
      'name'  => $this->get_field_name('date'),
      'type'  => 'switcher',
      'on_text'  => __( 'Yes', 'havnor' ),
      'off_text'  => __( 'No', 'havnor' ),
      'title' => __( 'Display Date :', 'havnor' ),
    );
    echo cs_add_element( $date_field, $date_value );

    // Date Format
    $date_format_value = esc_attr( $instance['date_format'] );
    $date_format_field = array(
      'id'    => $this->get_field_name('date_format'),
      'name'  => $this->get_field_name('date_format'),
      'type'  => 'text',
      'on_text'  => __( 'Yes', 'havnor' ),
      'off_text'  => __( 'No', 'havnor' ),
      'title' => __( 'Date Format :', 'havnor' ),
      'help' => __( "Enter date format (for more info <a href='https://codex.wordpress.org/Formatting_Date_and_Time' target='_blank'>click here</a>).", 'havnor')
    );
    echo cs_add_element( $date_format_field, $date_format_value );

    // Author
    $author_value = esc_attr( $instance['author'] );
    $author_field = array(
      'id'    => $this->get_field_name('author'),
      'name'  => $this->get_field_name('author'),
      'type'  => 'switcher',
      'on_text'  => __( 'Yes', 'havnor' ),
      'off_text'  => __( 'No', 'havnor' ),
      'title' => __( 'Display Author :', 'havnor' ),
    );
    echo cs_add_element( $author_field, $author_value );

    // Category
    $category_value = esc_attr( $instance['category'] );
    $category_field = array(
      'id'    => $this->get_field_name('category'),
      'name'  => $this->get_field_name('category'),
      'type'  => 'text',
      'title' => __( 'Category :', 'havnor' ),
      'help' => __( 'Enter category slugs with comma(,) for multiple items', 'havnor' ),
    );
    echo cs_add_element( $category_field, $category_value );

    // Order
    $order_value = esc_attr( $instance['order'] );
    $order_field = array(
      'id'    => $this->get_field_name('order'),
      'name'  => $this->get_field_name('order'),
      'type' => 'select',
      'options'   => array(
        'ASC' => 'Ascending',
        'DESC' => 'Descending',
      ),
      'default_option' => __( 'Select Order', 'havnor' ),
      'title' => __( 'Order :', 'havnor' ),
    );
    echo cs_add_element( $order_field, $order_value );

    // Orderby
    $orderby_value = esc_attr( $instance['orderby'] );
    $orderby_field = array(
      'id'    => $this->get_field_name('orderby'),
      'name'  => $this->get_field_name('orderby'),
      'type' => 'select',
      'options'   => array(
        'none' => __('None', 'havnor'),
        'ID' => __('ID', 'havnor'),
        'author' => __('Author', 'havnor'),
        'title' => __('Title', 'havnor'),
        'name' => __('Name', 'havnor'),
        'type' => __('Type', 'havnor'),
        'date' => __('Date', 'havnor'),
        'modified' => __('Modified', 'havnor'),
        'rand' => __('Random', 'havnor'),
      ),
      'default_option' => __( 'Select OrderBy', 'havnor' ),
      'title' => __( 'OrderBy :', 'havnor' ),
    );
    echo cs_add_element( $orderby_field, $orderby_value );

  }

  /**
   * Processes the widget's values
   */
  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;

    // Update values
    $instance['title']        = strip_tags( stripslashes( $new_instance['title'] ) );
    $instance['style']       = strip_tags( stripslashes( $new_instance['style'] ) );
    $instance['ptypes']       = strip_tags( stripslashes( $new_instance['ptypes'] ) );
    $instance['limit']        = strip_tags( stripslashes( $new_instance['limit'] ) );
    $instance['date']         = strip_tags( stripslashes( $new_instance['date'] ) );
    $instance['date_format']         = strip_tags( stripslashes( $new_instance['date_format'] ) );
    $instance['author']       = strip_tags( stripslashes( $new_instance['author'] ) );
    $instance['category']     = strip_tags( stripslashes( $new_instance['category'] ) );
    $instance['order']        = strip_tags( stripslashes( $new_instance['order'] ) );
    $instance['orderby']      = strip_tags( stripslashes( $new_instance['orderby'] ) );

    return $instance;
  }

  /**
   * Output the contents of the widget
   */
  public function widget( $args, $instance ) {
    // Extract the arguments
    extract( $args );

    $title          = apply_filters( 'widget_title', $instance['title'] );
    $style         = $instance['style'];
    $ptypes         = $instance['ptypes'];
    $limit          = $instance['limit'];
    $display_date   = $instance['date'];
    $display_date_format = $instance['date_format'];
    $display_author = $instance['author'];
    $category       = $instance['category'];
    $order          = $instance['order'];
    $orderby        = $instance['orderby'];

    $args = array(
      // other query params here,
      'post_type' => esc_attr($ptypes),
      'posts_per_page' => (int)$limit,
      'orderby' => esc_attr($orderby),
      'order' => esc_attr($order),
      'category_name' => esc_attr($category),
      'ignore_sticky_posts' => 1,
     );

     $havnor_rpw = new WP_Query( $args );
     global $post;

    // Display the markup before the widget
    echo $before_widget;

    if ( $title ) {
      echo $before_title . $title . $after_title;
    }

    $display_date_format = $display_date_format ? $display_date_format : '';

    if ( $style  === 'two' ) {
      $style_class = 'news-item-wrap';
    } else {
      $style_class = 'post-item-wrap';
    }

    if ($havnor_rpw->have_posts()) : ?>
    <div class="<?php echo esc_attr($style_class); ?>">
      <?php while ($havnor_rpw->have_posts()) : $havnor_rpw->the_post();
      $havnor_large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
      $havnor_large_image = $havnor_large_image[0];
      $author_by_text = cs_get_option('author_by_text');
      if(class_exists('Aq_Resize')) {
        $blog_img = aq_resize( $havnor_large_image, '76', '76', true );
      } else {$blog_img = $havnor_large_image;}
      $featured_img = ( $blog_img ) ? $blog_img : $havnor_large_image;
      $author_by_text = $author_by_text ? $author_by_text : esc_html__('By', 'havnor');
    if ( $style  === 'two' ) {
    ?>
    <div class="news-item">
      <?php if($featured_img) { ?>
        <div class="hanor-image hanor-item">
          <div class="hanor-table-wrap">
            <div class="hanor-align-wrap">
              <img src="<?php echo esc_url($featured_img); ?>" alt="<?php the_title(); ?>">
            </div>
          </div>
        </div>
      <?php } ?>
      <div class="news-info hanor-item">
        <div class="hanor-table-wrap">
          <div class="hanor-align-wrap">
            <h3><a href="<?php esc_url(the_permalink()) ?>"><?php the_title(); ?></a></h3>
            <?php if ($display_author === '1') { ?><p><i class="fa fa-user" aria-hidden="true"></i> <?php echo $author_by_text; ?> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_the_author(); ?></a></p><?php } ?>
          </div>
        </div>
      </div>
    </div>
  <?php } else { ?>
    <div class="post-item">
      <?php if($featured_img) { ?>
        <div class="hanor-image">
          <img src="<?php echo esc_url($featured_img); ?>" alt="<?php the_title(); ?>">
        </div>
      <?php } ?>
      <div class="post-info">
        <h4 class="post-title"><a href="<?php esc_url(the_permalink()) ?>"><?php the_title(); ?></a></h4>
        <?php if ($display_date === '1') { ?><h5 class="post-time"><?php echo get_the_date($display_date_format); ?></h5><?php } ?>
      </div>
    </div>
  <?php }
  endwhile; ?>
  </div>
  <?php endif;
  wp_reset_postdata();
  // Display the markup after the widget
  echo $after_widget;
  }
}

// Register the widget using an annonymous function
function havnor_recent_posts_function() {
  register_widget( "havnor_recent_posts" );
}
add_action( 'widgets_init', 'havnor_recent_posts_function' );
