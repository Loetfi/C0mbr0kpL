<?php
/*
 * Get a Quote Widget
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

class havnor_about_widget extends WP_Widget {

  /**
   * Specifies the widget name, description, class name and instatiates it
   */
  public function __construct() {
    parent::__construct(
      'about-our-blog',
      VTHEME_NAME_P . __( ': About Our Blog', 'havnor' ),
      array(
        'classname'   => 'about-our-blog',
        'description' => VTHEME_NAME_P . __( ' widget that displays about content.', 'havnor' )
      )
    );
  }

  /**
   * Generates the back-end layout for the widget
   */
  public function form( $instance ) {
    // Default Values
    $instance   = wp_parse_args( $instance, array(
      'title'    => '',
      'content' => '',
      'about_image' => '',
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

    // Content
    $content_value = esc_attr( $instance['content'] );
    $content_field = array(
      'id'    => $this->get_field_name('content'),
      'name'  => $this->get_field_name('content'),
      'type'  => 'textarea',
      'title' => __( 'Content :', 'havnor' ),
    );
    echo cs_add_element( $content_field, $content_value );

    // Button Text
    $about_image_value = esc_attr( $instance['about_image'] );
    $about_image_field = array(
      'id'    => $this->get_field_name('about_image'),
      'name'  => $this->get_field_name('about_image'),
      'type'  => 'image',
      'title' => __( 'Image :', 'havnor' ),
    );
    echo cs_add_element( $about_image_field, $about_image_value );

  }

  /**
   * Processes the widget's values
   */
  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;

    // Update values
    $instance['title']      = strip_tags( stripslashes( $new_instance['title'] ) );
    $instance['content']    = strip_tags( stripslashes( $new_instance['content'] ) );
    $instance['about_image']   = strip_tags( stripslashes( $new_instance['about_image'] ) );

    return $instance;
  }

  /**
   * Output the contents of the widget
   */
  public function widget( $args, $instance ) {
    // Extract the arguments
    extract( $args );

    $title      = apply_filters( 'widget_title', $instance['title'] );
    $content    = $instance['content'];
    $about_image   = $instance['about_image'];

    // Display the markup before the widget
    echo $before_widget;
    if ( $title ) {
      echo '<h4 class="widget-title">' . $title . '</h4>';
    }
    $image_url = wp_get_attachment_url( $about_image );
    echo '<div class="hanor-image"><img src="'.$image_url.'" alt="Author"></div>';
    echo '<p>'. $content .'</p>';

    // Display the markup after the widget
    echo $after_widget;
  }
}

// Register the widget using an annonymous function
function havnor_about_widget_function() {
  register_widget( "havnor_about_widget" );
}
add_action( 'widgets_init', 'havnor_about_widget_function' );
