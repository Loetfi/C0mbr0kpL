<?php
/*
 * All Metabox related options for Havnor theme.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

function havnor_vt_metabox_options( $options ) {

  $options      = array();

  // -----------------------------------------
  // Post Metabox Options                    -
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'post_type_metabox',
    'title'     => esc_html__('Post Options', 'havnor'),
    'post_type' => 'post',
    'context'   => 'normal',
    'priority'  => 'default',
    'sections'  => array(

      // All Post Formats
      array(
        'name'   => 'section_post_formats',
        'fields' => array(

          // Standard, Image
          array(
            'title' => 'Standard Image',
            'type'  => 'subheading',
            'content' => esc_html__('There is no Extra Option for this Post Format!', 'havnor'),
            'wrap_class' => 'vt-minimal-heading hide-title',
          ),
          // Standard, Image

          // Gallery
          array(
            'type'    => 'notice',
            'title'   => 'Gallery Format',
            'wrap_class' => 'hide-title',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Gallery Format', 'havnor')
          ),
          array(
            'id'          => 'gallery_post_format',
            'type'        => 'gallery',
            'title'       => esc_html__('Add Gallery', 'havnor'),
            'add_title'   => esc_html__('Add Image(s)', 'havnor'),
            'edit_title'  => esc_html__('Edit Image(s)', 'havnor'),
            'clear_title' => esc_html__('Clear Image(s)', 'havnor'),
          ),
          // Gallery

          // Audio Post
          array(
            'type'       => 'notice',
            'title'      => 'Audio Post',
            'wrap_class' => 'hide-title',
            'class'      => 'info cs-vt-heading',
            'content'    => esc_html__('Audio Post', 'havnor')
          ),
          array(
            'id'        => 'audio_post',
            'type'      => 'textarea',
            'title'     => esc_html__('Audio iframe code', 'havnor'),
            'info'      => esc_html__('Enter your audio iframe code', 'havnor'),
            'sanitize'  => true,
          ),
          // Audio Post

          // Video Post
          array(
            'type'       => 'notice',
            'title'      => 'Video Post',
            'wrap_class' => 'hide-title',
            'class'      => 'info cs-vt-heading',
            'content'    => esc_html__('Video Post', 'havnor')
          ),
          array(
            'id'        => 'video_post',
            'type'      => 'textarea',
            'title'     => esc_html__('Video iframe code', 'havnor'),
            'info'      => esc_html__('Enter your Video iframe code', 'havnor'),
            'sanitize'  => true,
          ),
          array(
            'id'      => 'video_post_video_link',
            'type'    => 'text',
            'title'   => esc_html__('Video Link', 'havnor'),
            'info'    => esc_html__('Enter your Video Link', 'havnor'),
          ),
          // Video Post

        ),
      ),

    ),
  );

  // -----------------------------------------
  // Page Metabox Options                    -
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'page_type_metabox',
    'title'     => esc_html__('Page Custom Options', 'havnor'),
    'post_type' => array('post', 'page', 'portfolio', 'product', 'job', 'team'),
    'context'   => 'normal',
    'priority'  => 'default',
    'sections'  => array(

      // Title Section
      array(
        'name'  => 'page_layout_section',
        'title' => esc_html__('Layout', 'havnor'),
        'icon'  => 'fa fa-minus',

        // Fields Start
        'fields' => array(

          array(
            'id'        => 'page_layout',
            'type'      => 'image_select',
            'title'          => esc_html__('Page Layout', 'havnor'),
            'options'   => array(
              'default'       => HAVNOR_CS_IMAGES . '/page-0.png',
              'full-width'    => HAVNOR_CS_IMAGES . '/page-2.png',
              'left-sidebar'  => HAVNOR_CS_IMAGES . '/page-3.png',
              'right-sidebar' => HAVNOR_CS_IMAGES . '/page-4.png',
            ),
            'attributes' => array(
              'data-depend-id' => 'page_layout',
            ),
            'default'    => 'default',
            'radio'      => true,
          ),
          array(
            'id'            => 'page_sidebar_widget',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Widget', 'havnor'),
            'options'        => havnor_vt_registered_sidebars(),
            'default_option' => esc_html__('Select Widget', 'havnor'),
            'dependency'   => array('page_layout', 'any', 'left-sidebar,right-sidebar'),
          ),
          array(
            'id'    => 'page_bg_color',
            'type'  => 'color_picker',
            'title' => esc_html__('Page Background Color', 'havnor'),
            'info' => esc_html__('Pick your page background color.', 'havnor'),
          ),

        ), // End : Fields

      ), // Title Section

      // Header
      array(
        'name'  => 'header_section',
        'title' => esc_html__('Header', 'havnor'),
        'icon'  => 'fa fa-bars',
        'fields' => array(

          array(
            'id'             => 'choose_menu',
            'type'           => 'select',
            'title'          => esc_html__('Choose Menu', 'havnor'),
            'desc'          => esc_html__('Choose custom menus for this page.', 'havnor'),
            'options'        => 'menus',
            'default_option' => esc_html__('Select your menu', 'havnor'),
          ),
          array(
            'id'    => 'one_page_menu',
            'type'  => 'switcher',
            'title' => esc_html__('One Page Scroll Menu', 'obira'),
            'label' => esc_html__('Yes, Please do it.', 'obira'),
          ),

        ),
      ),
      // Header

      // Banner & Title Area
      array(
        'name'  => 'banner_title_section',
        'title' => esc_html__('Banner & Title Area', 'havnor'),
        'icon'  => 'fa fa-bullhorn',
        'fields' => array(

          array(
            'id'        => 'banner_type',
            'type'      => 'select',
            'title'     => esc_html__('Choose Banner Type', 'havnor'),
            'options'   => array(
              'default-title'    => 'Default Title',
              'revolution-slider' => 'Shortcode [Rev Slider]',
              'custom-shortcode' => 'Custom Shortcode',
              'hide-title-area'   => 'Hide Title/Banner Area',
            ),
          ),
          array(
            'id'    => 'page_revslider',
            'type'  => 'textarea',
            'title' => esc_html__('Revolution Slider or Any Shortcodes', 'havnor'),
            'desc' => esc_html__('Enter any shortcodes that you want to show in this page title area. <br />Eg : Revolution Slider shortcode.', 'havnor'),
            'attributes' => array(
              'placeholder' => esc_html__('Enter your shortcode...', 'havnor'),
            ),
            'dependency'   => array('banner_type', '==', 'revolution-slider' ),
          ),
          array(
            'id'    => 'button_shortcode',
            'type'  => 'textarea',
            'title' => esc_html__('Button Shortcodes', 'havnor'),
            'desc' => esc_html__('Enter button shortcodes that you want to show in this page title area.', 'havnor'),
            'attributes' => array(
              'placeholder' => esc_html__('Enter your shortcode...', 'havnor'),
            ),
            'shortcode' => true,
            'dependency'   => array('banner_type', '==', 'default-title' ),
          ),
          array(
            'id'    => 'page_custom',
            'type'  => 'textarea',
            'title' => esc_html__('Custom Shortcodes', 'havnor'),
            'desc' => esc_html__('Enter any shortcodes that you want to show in this page title area.', 'havnor'),
            'attributes' => array(
              'placeholder' => esc_html__('Enter your shortcode...', 'havnor'),
            ),
            'shortcode' => true,
            'dependency'   => array('banner_type', '==', 'custom-shortcode' ),
          ),
          array(
            'id'    => 'page_custom_title',
            'type'  => 'text',
            'title' => esc_html__('Custom Title', 'havnor'),
            'attributes' => array(
              'placeholder' => esc_html__('Enter your custom title...', 'havnor'),
            ),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),
          array(
            'id'    => 'page_custom_sub_title',
            'type'  => 'text',
            'title' => esc_html__('Custom Sub Title', 'havnor'),
            'attributes' => array(
              'placeholder' => esc_html__('Enter your custom subtitle title...', 'havnor'),
            ),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),
          array(
            'id'        => 'title_area_spacings',
            'type'      => 'select',
            'title'     => esc_html__('Title Area Spacings', 'havnor'),
            'options'   => array(
              'padding-default' => esc_html__('Default Spacing', 'havnor'),
              'padding-xs' => esc_html__('Extra Small Padding', 'havnor'),
              'padding-sm' => esc_html__('Small Padding', 'havnor'),
              'padding-md' => esc_html__('Medium Padding', 'havnor'),
              'padding-lg' => esc_html__('Large Padding', 'havnor'),
              'padding-xl' => esc_html__('Extra Large Padding', 'havnor'),
              'padding-no' => esc_html__('No Padding', 'havnor'),
              'padding-custom' => esc_html__('Custom Padding', 'havnor'),
            ),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),
          array(
            'id'        => 'title_area_align',
            'type'      => 'select',
            'title'     => esc_html__('Title Area Text Align', 'havnor'),
            'options'   => array(
              'theme-options' => esc_html__('Theme Options', 'havnor'),
              'text-left' => esc_html__('Left', 'havnor'),
              'text-right' => esc_html__('Right', 'havnor'),
              'text-center' => esc_html__('Center', 'havnor'),
            ),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),
          array(
            'id'        => 'sub_title_align',
            'type'      => 'select',
            'title'     => esc_html__('Sub-Title Position', 'havnor'),
            'options'   => array(
              'theme-options' => esc_html__('Theme Options', 'havnor'),
              'above-title' => esc_html__('Above Title', 'havnor'),
              'below-title' => esc_html__('Below Title', 'havnor'),
            ),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),
          array(
            'id'    => 'title_top_spacings',
            'type'  => 'text',
            'title' => esc_html__('Top Spacing', 'havnor'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'  => array('banner_type|title_area_spacings', '==|==', 'default-title|padding-custom'),
          ),
          array(
            'id'    => 'title_bottom_spacings',
            'type'  => 'text',
            'title' => esc_html__('Bottom Spacing', 'havnor'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'  => array('banner_type|title_area_spacings', '==|==', 'default-title|padding-custom'),
          ),
          array(
            'id'    => 'title_area_bg',
            'type'  => 'background',
            'title' => esc_html__('Background', 'havnor'),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),
          array(
            'id'    => 'titlebar_bg_overlay_color',
            'type'  => 'color_picker',
            'title' => esc_html__('Overlay Color', 'havnor'),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),

        ),
      ),
      // Banner & Title Area

      // Content Section
      array(
        'name'  => 'page_content_options',
        'title' => esc_html__('Content Options', 'havnor'),
        'icon'  => 'fa fa-file',

        'fields' => array(

          array(
            'id'        => 'content_spacings',
            'type'      => 'select',
            'title'     => esc_html__('Content Spacings', 'havnor'),
            'options'   => array(
              'padding-default' => esc_html__('Default Spacing', 'havnor'),
              'padding-xs' => esc_html__('Extra Small Padding', 'havnor'),
              'padding-sm' => esc_html__('Small Padding', 'havnor'),
              'padding-md' => esc_html__('Medium Padding', 'havnor'),
              'padding-lg' => esc_html__('Large Padding', 'havnor'),
              'padding-xl' => esc_html__('Extra Large Padding', 'havnor'),
              'padding-cnt-no' => esc_html__('No Padding', 'havnor'),
              'padding-custom' => esc_html__('Custom Padding', 'havnor'),
            ),
            'desc' => esc_html__('Content area top and bottom spacings.', 'havnor'),
          ),
          array(
            'id'    => 'content_top_spacings',
            'type'  => 'text',
            'title' => esc_html__('Top Spacing', 'havnor'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'  => array('content_spacings', '==', 'padding-custom'),
          ),
          array(
            'id'    => 'content_bottom_spacings',
            'type'  => 'text',
            'title' => esc_html__('Bottom Spacing', 'havnor'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'  => array('content_spacings', '==', 'padding-custom'),
          ),

        ), // End Fields
      ), // Content Section

      // Enable & Disable
      array(
        'name'  => 'hide_show_section',
        'title' => esc_html__('Enable & Disable', 'havnor'),
        'icon'  => 'fa fa-toggle-on',
        'fields' => array(

          array(
            'id'    => 'hide_header',
            'type'  => 'switcher',
            'title' => esc_html__('Hide Header', 'havnor'),
            'label' => esc_html__('Yes, Please do it.', 'havnor'),
          ),
          array(
            'id'    => 'hide_breadcrumbs',
            'type'  => 'switcher',
            'title' => __('Hide Breadcrumbs', 'havnor'),
            'label' => __('Yes, Please do it.', 'havnor'),
          ),
          array(
            'id'    => 'hide_footer',
            'type'  => 'switcher',
            'title' => esc_html__('Hide Footer', 'havnor'),
            'label' => esc_html__('Yes, Please do it.', 'havnor'),
          ),
          array(
            'id'    => 'hide_copyright',
            'type'  => 'switcher',
            'title' => esc_html__('Hide Copyright', 'havnor'),
            'label' => esc_html__('Yes, Please do it.', 'havnor'),
          ),

        ),
      ),
      // Enable & Disable

    ),
  );

  // -----------------------------------------
  // Testimonial
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'testimonial_options',
    'title'     => esc_html__('Testimonial Client', 'havnor'),
    'post_type' => 'testimonial',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'testimonial_option_section',
        'fields' => array(

          array(
            'id'      => 'testi_name',
            'type'    => 'text',
            'title'   => esc_html__('Name', 'havnor'),
            'info'    => esc_html__('Enter client name', 'havnor'),
          ),
          array(
            'id'        => 'testi_rating',
            'type'      => 'select',
            'title'     => esc_html__('Testimonial Ratings', 'havnor'),
            'options'   => array(
              '1' => esc_html__('1', 'havnor'),
              '2' => esc_html__('2', 'havnor'),
              '3' => esc_html__('3', 'havnor'),
              '4' => esc_html__('4', 'havnor'),
              '5' => esc_html__('5', 'havnor'),
            ),
          ),
           array(
            'id'      => 'testi_position',
            'type'    => 'text',
            'title'     => esc_html__('Job Position', 'havnor'),
            'attributes' => array(
              'placeholder' => esc_html__('Eg : Financial Manager', 'havnor'),
            ),
            'info'    => esc_html__('Enter job position in your company.', 'havnor'),
          ),
          array(
            'id'      => 'testi_since',
            'type'    => 'text',
            'title'     => esc_html__('Working From', 'havnor'),
            'attributes' => array(
              'placeholder' => esc_html__('Eg : Since 2009', 'havnor'),
            ),
            'info'    => esc_html__('Enter year from working in company.', 'havnor'),
          ),

        ),
      ),

    ),
  );

  // -----------------------------------------
  // Team
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'team_options',
    'title'     => esc_html__('Job Position', 'havnor'),
    'post_type' => 'team',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'team_option_section',
        'fields' => array(

          array(
            'id'      => 'team_job_position',
            'type'    => 'text',
            'attributes' => array(
              'placeholder' => esc_html__('Eg : Financial Manager', 'havnor'),
            ),
            'info'    => esc_html__('Enter this employee job position, in your company.', 'havnor'),
          ),
          // Social fields
          array(
            'id'                  => 'social_icons',
            'type'                => 'group',
            'title'    => esc_html__('Social Icons', 'havnor'),
            'button_title'       => 'Add New Icon',
            'accordion_title'    => 'Adding New Icon',
            'accordion'          => true,
            'fields'              => array(
              array(
                'id'              => 'icon',
                'type'            => 'icon',
                'title'           => esc_html__('Selected your icon', 'havnor'),
              ),
              array(
                'id'              => 'icon_link',
                'type'            => 'text',
                'title'           => esc_html__('Enter your icon link', 'havnor'),
              ),
              array(
                'id'              => 'icon_text',
                'type'            => 'text',
                'title'           => esc_html__('Enter your icon text', 'havnor'),
              ),
            ),
          ),
          // Social fields

        ),
      ),

    ),
  );

  // -----------------------------------------
  // Job
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'job_options',
    'title'     => esc_html__('Job Position', 'havnor'),
    'post_type' => 'job',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'job_option_section',
        'fields' => array(

          array(
            'id'      => 'job_location',
            'type'    => 'text',
            'title'    => esc_html__('Job Location', 'havnor'),
          ),
          array(
            'id'      => 'job_location_link',
            'type'    => 'text',
            'title'    => esc_html__('Job Location Link', 'havnor'),
          ),
          array(
            'id'      => 'job_duration',
            'type'    => 'text',
            'title'    => esc_html__('Duration (Full/Half Time)', 'havnor'),
            'attributes' => array(
              'placeholder' => esc_html__('Eg : Full Time', 'havnor'),
            ),
            'info'    => esc_html__('Enter this job duration.', 'havnor'),
          ),

        ),
      ),

    ),
  );

  // -----------------------------------------
  // Portfolio Client
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'portfolio_client',
    'title'     => esc_html__('Portfolio Client', 'havnor'),
    'post_type' => 'portfolio',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'portfolio_client_section',
        'fields' => array(

          array(
            'id'      => 'client_name',
            'type'    => 'text',
            'attributes' => array(
              'placeholder' => esc_html__('Eg : Techno Fire', 'havnor'),
            ),
            'info'    => esc_html__('Enter this portfolio client.', 'havnor'),
          ),
          array(
            'id'      => 'client_link',
            'type'    => 'text',
            'title'    => esc_html__('Client Link', 'havnor'),
            'info'    => esc_html__('Enter your custom link.', 'havnor'),
          ),

        ),
      ),

    ),
  );

  // -----------------------------------------
  // Portfolio Type
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'portfolio_type',
    'title'     => esc_html__('Portfolio Type', 'havnor'),
    'post_type' => 'portfolio',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'portfolio_type_section',
        'fields' => array(

          array(
            'id'      => 'port_type',
            'type'    => 'text',
            'attributes' => array(
              'placeholder' => esc_html__('Eg : Modern Product Design', 'havnor'),
            ),
            'info'    => esc_html__('Enter this portfolio type.', 'havnor'),
          ),

        ),
      ),

    ),
  );

  // -----------------------------------------
  // Portfolio Metabox Options
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'portfolio_single_metabox',
    'title'     => esc_html__('Single Image Options', 'havnor'),
    'post_type' => 'portfolio',
    'context'   => 'normal',
    'priority'  => 'high',
    'sections'  => array(

      // All Post Formats
      array(
        'name'   => 'portfolio_single_formats',
        'fields' => array(

          // Gallery
          array(
            'type'    => 'notice',
            'title'   => 'Gallery Images',
            'wrap_class' => 'hide-title',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Gallery Images', 'havnor')
          ),
          array(
            'id'       => 'port_gallery_images',
            'type'     => 'gallery',
            'title'       => esc_html__('Add Gallery', 'havnor'),
            'add_title'   => esc_html__('Add Image(s)', 'havnor'),
            'edit_title'  => esc_html__('Edit Image(s)', 'havnor'),
            'clear_title' => esc_html__('Clear Image(s)', 'havnor'),
          ),
          // Gallery

        ),
      ),

    ),
  );

  return $options;

}
add_filter( 'cs_metabox_options', 'havnor_vt_metabox_options' );
