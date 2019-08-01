<?php
/*
 * All Custom Shortcode for havnor theme.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

if( ! function_exists( 'havnor_vt_shortcodes' ) ) {
  function havnor_vt_shortcodes( $options ) {

    $options       = array();

    /* Topbar Shortcodes */
    $options[]     = array(
      'title'      => __('Topbar Shortcodes', 'havnor'),
      'shortcodes' => array(

        // WPML 
        array(
          'name'          => 'havnor_wpml',
          'title'         => esc_html__('Havnor WPML', 'havnor-core'),
          'fields'        => array(

            array(
            'id'        => 'custom_class',
            'type'      => 'text',
            'title'     => esc_html__('Custom Class', 'havnor-core'),
            ),
            array(
              'id'        => 'wpml_lang_style',
              'type'      => 'select',
              'options'      => array(
                'dropdown'   => esc_html__('Dropdown', 'havnor-core'),
                'horizontal' => esc_html__('Horizontal', 'havnor-core'),
                'vertical'   => esc_html__('Vertical', 'havnor-core'),
              ),
              'title'     => esc_html__('WPML Style', 'havnor-core'),
            ),
            array(
              'id'        => 'wpml_lang_type',
              'type'      => 'select',
              'options'           => array(
                'native_name'     => esc_html__('Native Name', 'havnor-core'),
                'translated_name' => esc_html__('Translated Name', 'havnor-core'),
                'language_code'   => esc_html__('Language Code', 'havnor-core'),
              ),
              'title'     => esc_html__('Language Type', 'havnor-core'),
            ),
            array(
              'id'        => 'wpml_flag',
              'type'      => 'switcher',
              'title'     => esc_html__('Remove Flag', 'havnor-core'),
              'info'      => 'Remove Flag from Language'
            ),
          ),
        ),
        // WPML
        // Topbar Links
        array(
          'name'          => 'havnor_topbar_link',
          'title'         => __('Topbar Link', 'havnor'),
          'fields'        => array(

            array(
              'id'        => 'link_icon',
              'type'      => 'icon',
              'title'     => __('Icon', 'havnor'),
              'value'      => 'fa fa-sign-in',
            ),
            array(
              'id'        => 'link_text',
              'type'      => 'text',
              'title'     => __('Link Text', 'havnor'),
            ),
            array(
              'id'        => 'link',
              'type'      => 'text',
              'title'     => __('Link', 'havnor'),
              'attributes' => array(
                'placeholder'     => 'http://',
              ),
            ),
            array(
              'id'        => 'text_color',
              'type'      => 'color_picker',
              'title'     => __('Text Color', 'havnor'),
            ),
            array(
              'id'        => 'text_hover_color',
              'type'      => 'color_picker',
              'title'     => __('Text Hover Color', 'havnor'),
            ),
            array(
              'id'        => 'text_size',
              'type'      => 'text',
              'title'     => __('Text Size', 'havnor'),
            ),
            array(
              'id'        => 'icon_color',
              'type'      => 'color_picker',
              'title'     => __('Icon Color', 'havnor'),
            ),
            array(
              'id'        => 'icon_size',
              'type'      => 'text',
              'title'     => __('Icon Size', 'havnor'),
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => __('Open New Tab?', 'havnor'),
              'on_text'     => __('Yes', 'havnor'),
              'off_text'     => __('No', 'havnor'),
            ),
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'havnor'),
            ),
          ),
        ),
        // Topbar Links

        // Search
        array(
          'name'          => 'havnor_topbar_search',
          'title'         => esc_html__('Search', 'havnor'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => esc_html__('Custom Class', 'havnor'),
            ),
            array(
              'id'        => 'link_icon',
              'type'      => 'icon',
              'title'     => __('Icon', 'havnor'),
              'value'      => 'fa fa-search',
            ),
            array(
              'id'        => 'search_plshold',
              'type'      => 'text',
              'title'     => esc_html__('Placeholder', 'havnor'),
              'value'      => 'Search for...',
            ),
            
          ),
        ),
        // Search
        // Separator
        array(
          'name'          => 'havnor_topbar_separator',
          'title'         => esc_html__('Shortcode Separator', 'havnor'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => esc_html__('Custom Class', 'havnor'),
            ),
            array(
              'id'        => 'separator_color',
              'type'      => 'color_picker',
              'title'     => __('Separator Color', 'havnor'),
            ),
            array(
              'id'        => 'right_space',
              'type'      => 'text',
              'title'     => esc_html__('Right Space', 'havnor'),
            ),
            array(
              'id'        => 'left_space',
              'type'      => 'text',
              'title'     => esc_html__('Left Space', 'havnor'),
            ),

          ),
        ),
        // Separator
        // Topbar Address
        array(
          'name'          => 'havnor_top_address_infos',
          'title'         => __('Topbar Address', 'havnor'),
          'view'          => 'clone',
          'clone_id'      => 'havnor_top_address_info',
          'clone_title'   => __('Add New', 'havnor'),
          'fields'        => array(

            array(
              'id'        => 'address_info_style',
              'type'      => 'select',
              'options'           => array(
                'style_one'     => esc_html__('Default ', 'havnor'),
                'style_two' => esc_html__('Style Two', 'havnor'),
              ),
              'title'     => esc_html__('Address Info Style', 'havnor'),
            ),
            array(
              'id'        => 'info_title',
              'type'      => 'text',
              'title'     => __('Info Title', 'havnor'),
              'dependency'  => array('address_info_style', '==', 'style_two'),
            ),
            array(
              'id'        => 'info_title_size',
              'type'      => 'text',
              'title'     => __('Title Size', 'havnor'),
              'dependency'  => array('address_info_style', '==', 'style_two'),
            ),
            array(
              'id'        => 'info_title_weight',
              'type'      => 'text',
              'title'     => __('Title Weight', 'havnor'),
              'dependency'  => array('address_info_style', '==', 'style_two'),
            ),
            array(
              'id'        => 'info_title_color',
              'type'      => 'color_picker',
              'title'     => __('Title Color', 'havnor'),
              'dependency'  => array('address_info_style', '==', 'style_two'),
            ),
            array(
              'id'        => 'info_link_hover_color',
              'type'      => 'color_picker',
              'title'     => __('Link Hover Color', 'havnor'),
              'dependency'  => array('address_info_style', '==', 'style_two'),
            ),
            array(
              'id'        => 'info_content_size',
              'type'      => 'text',
              'title'     => __('Content/Text Size', 'havnor'),
              'dependency'  => array('address_info_style', '==', 'style_two'),
            ),
            array(
              'id'        => 'info_content_weight',
              'type'      => 'text',
              'title'     => __('Content/Text Font Weight', 'havnor'),
              'dependency'  => array('address_info_style', '==', 'style_two'),
            ),
            array(
              'id'        => 'section_bg_color',
              'type'      => 'color_picker',
              'title'     => __('Section Background Color', 'havnor'),
              'dependency'  => array('address_info_style', '==', 'style_two'),
            ),
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'havnor'),
            ),
            array(
              'id'        => 'address_column',
              'type'      => 'select',
              'options'           => array(
                'one_column'     => esc_html__('One Column', 'havnor'),
                'two_column' => esc_html__('Two Column', 'havnor'),
              
              ),
              'title'     => esc_html__('Address Info Column', 'havnor'),
            ),

          ),
          'clone_fields'  => array(

            array(
              'id'        => 'address_icon',
              'type'      => 'icon',
              'title'     => __('Icon', 'havnor')
            ),
            array(
              'id'        => 'address_title',
              'type'      => 'text',
              'title'     => __('Title', 'havnor')
            ),
            array(
              'id'        => 'title_link',
              'type'      => 'text',
              'title'     => __('Title Link', 'havnor')
            ),
            array(
              'id'        => 'address_link_text',
              'type'      => 'text',
              'title'     => __('Link Text', 'havnor')
            ),
            array(
              'id'        => 'address_text_link',
              'type'      => 'text',
              'title'     => __('Text Link', 'havnor'),
              'attributes' => array(
                'placeholder'     => 'http://',
              ),
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => __('Open New Tab?', 'havnor'),
              'on_text'     => __('Yes', 'havnor'),
              'off_text'     => __('No', 'havnor'),
            ),

          ),

        ),
        // Topbar Address

      ),
    );

    /* Header Shortcodes */
    $options[]     = array(
      'title'      => __('Header Shortcodes', 'havnor'),
      'shortcodes' => array(

      // Header Buttons
        array(
          'name'          => 'havnor_header_btns',
          'title'         => __('Header Buttons', 'havnor'),
          'view'          => 'clone',
          'clone_id'      => 'havnor_header_btn',
          'clone_title'   => __('Add New', 'havnor'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'havnor'),
            ),

          ),
          'clone_fields'  => array(

            array(
              'id'        => 'btn_style',
              'type'      => 'select',
              'title'     => __('Button Style', 'havnor'),
              'options'        => array(
                'btn-dark'  => __('Dark', 'havnor'),
                'btn-light' => __('Light', 'havnor'),
              ),
            ),
            array(
              'id'        => 'btn_icon',
              'type'      => 'icon',
              'title'     => __('Icon', 'havnor')
            ),
            array(
              'id'        => 'btn_link_text',
              'type'      => 'text',
              'title'     => __('Link Text', 'havnor')
            ),
            array(
              'id'        => 'btn_text_link',
              'type'      => 'text',
              'title'     => __('Text Link', 'havnor'),
              'attributes' => array(
                'placeholder'     => 'http://',
              ),
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => __('Open New Tab?', 'havnor'),
              'on_text'     => __('Yes', 'havnor'),
              'off_text'     => __('No', 'havnor'),
            ),

          ),

        ),
        // Header Buttons

      ),
    );

    /* Content Shortcodes */
    $options[]     = array(
      'title'      => __('Content Shortcodes', 'havnor'),
      'shortcodes' => array(

        // Spacer
        array(
          'name'          => 'vc_empty_space',
          'title'         => __('Spacer', 'havnor'),
          'fields'        => array(

            array(
              'id'        => 'height',
              'type'      => 'text',
              'title'     => __('Height', 'havnor'),
              'attributes' => array(
                'placeholder'     => '20px',
              ),
            ),

          ),
        ),
        // Spacer

        // Social Icons
        array(
          'name'          => 'havnor_socials',
          'title'         => __('Social Icons', 'havnor'),
          'view'          => 'clone',
          'clone_id'      => 'havnor_social',
          'clone_title'   => __('Add New', 'havnor'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'havnor'),
            ),

            // Colors
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => __('Colors', 'havnor'),
            ),
            array(
              'id'        => 'icon_color',
              'type'      => 'color_picker',
              'title'     => __('Icon Color', 'havnor'),
              'wrap_class' => 'column_half',
            ),
            array(
              'id'        => 'icon_hover_color',
              'type'      => 'color_picker',
              'title'     => __('Icon Hover Color', 'havnor'),
              'wrap_class' => 'column_half',
            ),

            // Icon Size
            array(
              'id'        => 'icon_size',
              'type'      => 'text',
              'title'     => __('Icon Size', 'havnor'),
              'wrap_class' => 'column_full',
            ),
            array(
              'id'        => 'rounded',
              'type'      => 'switcher',
              'title'     => __('Rounded?', 'havnor'),
              'on_text'     => __('Yes', 'havnor'),
              'off_text'     => __('No', 'havnor'),
              'wrap_class' => 'column_full',
            ),

          ),
          'clone_fields'  => array(

            array(
              'id'        => 'social_link',
              'type'      => 'text',
              'attributes' => array(
                'placeholder'     => 'http://',
              ),
              'title'     => __('Link', 'havnor')
            ),
            array(
              'id'        => 'social_icon',
              'type'      => 'icon',
              'title'     => __('Social Icon', 'havnor')
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => __('Open New Tab?', 'havnor'),
              'on_text'     => __('Yes', 'havnor'),
              'off_text'     => __('No', 'havnor'),
            ),

          ),

        ),
        // Social Icons

        // Subscribe
        array(
          'name'          => 'havnor_subscribe',
          'title'         => __('Subscribe', 'havnor'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'havnor'),
            ),
            array(
              'id'        => 'get_subscribe_image',
              'type'      => 'upload',
              'title'     => __('Image', 'havnor')
            ),
            array(
              'id'        => 'title',
              'type'      => 'text',
              'title'     => __('Subscribe Title', 'havnor'),
            ),
            array(
              'id'        => 'sub_content',
              'type'      => 'textarea',
              'title'     => __('Subscribe Content', 'havnor'),
            ),
            array(
              'id'        => 'link_text',
              'type'      => 'text',
              'title'     => __('Subscribe Link Text', 'havnor'),
            ),
            array(
              'id'        => 'subscribe_link',
              'type'      => 'text',
              'title'     => __('Subscribe Link', 'havnor'),
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => __('Open New Tab?', 'havnor'),
              'on_text'     => __('Yes', 'havnor'),
              'off_text'     => __('No', 'havnor'),
            ),

          ),

        ),
        // Subscribe

        // Side Menus
        array(
          'name'          => 'havnor_sidemenus',
          'title'         => __('Side Menus (for sidebar menu only)', 'havnor'),
          'view'          => 'clone',
          'clone_id'      => 'havnor_sidemenu',
          'clone_title'   => __('Add New', 'havnor'),
          'fields'        => array(

            array(
              'id'        => 'menu_style',
              'type'      => 'select',
              'options'   => array(
                'style-one' => __('Style One (Bold)', 'havnor'),
                'style-two' => __('Style Two (Normal)', 'havnor'),
              ),
              'title'     => __('Menu List Style', 'havnor'),
            ),

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'havnor'),
            ),

          ),
          'clone_fields'  => array(
            array(
              'id'    => 'site_credit',
              'type'  => 'switcher',
              'std'   => false,
              'title' => __('Include site credit link?', 'havnor'),
            ),
            array(
              'id'        => 'get_text',
              'type'      => 'text',
              'title'     => __('Text', 'havnor')
            ),
            array(
              'id'        => 'get_text_secondary',
              'type'      => 'text',
              'title'     => __('Secondary Text', 'havnor'),
              'dependency'  => array('site_credit', '==', 'true'),
            ),
            array(
              'id'        => 'get_link',
              'type'      => 'text',
              'title'     => __('Link', 'havnor')
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => __('Open New Tab?', 'havnor'),
              'on_text'     => __('Yes', 'havnor'),
              'off_text'     => __('No', 'havnor'),
            ),
          ),
        ),
        // Side Menus

        // Opening Hours List
        array(
          'name'          => 'havnor_opening_hours',
          'title'         => __('Opening Hours', 'havnor'),
          'view'          => 'clone',
          'clone_id'      => 'havnor_opening_hour',
          'clone_title'   => __('Add New', 'havnor'),
          'fields'        => array(

            array(
              'id'        => 'sec_title',
              'type'      => 'text',
              'title'     => __('Section Title', 'havnor'),
            ),
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'havnor'),
            ),

            // Colors
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => __('Colors', 'havnor')
            ),
            array(
              'id'        => 'title_color',
              'type'      => 'color_picker',
              'title'     => __('Title Color', 'havnor'),
            ),
            array(
              'id'        => 'text_color',
              'type'      => 'color_picker',
              'title'     => __('Text Color', 'havnor'),
            ),
            array(
              'id'        => 'section_bg_color',
              'type'      => 'color_picker',
              'title'     => __('Section Background Color', 'havnor'),
            ),

            // Size
            array(
              'id'        => 'title_size',
              'type'      => 'text',
              'title'     => __('Title Size', 'havnor'),
              'attributes' => array(
                'placeholder'     => 'Eg: 20px',
              ),
            ),
            array(
              'id'        => 'text_size',
              'type'      => 'text',
              'title'     => __('Text Size', 'havnor'),
              'attributes' => array(
                'placeholder'     => 'Eg: 14px',
              ),
            ),
            array(
              'id'        => 'text_weight',
              'type'      => 'text',
              'title'     => __('Text Font Weight', 'havnor'),
              'attributes' => array(
                'placeholder'     => 'Eg: 400',
              ),
            ),
            array(
              'id'        => 'title_weight',
              'type'      => 'text',
              'title'     => __('Title Font Weight', 'havnor'),
              'attributes' => array(
                'placeholder'     => 'Eg: 600',
              ),
            ),

          ),
          'clone_fields'  => array(

            array(
              'id'        => 'text',
              'type'      => 'text',
              'title'     => __('Day', 'havnor')
            ),
            array(
              'id'        => 'price',
              'type'      => 'text',
              'title'     => __('Time', 'havnor')
            ),

          ),

        ),
        // Opening Hours List

         // Typewritter Text
        array(
          'name'          => 'havnor_typewritter_lists',
          'title'         => __('Typewritter Text', 'havnor'),
          'view'          => 'clone',
          'clone_id'      => 'havnor_typewritter_list',
          'clone_title'   => __('Add New', 'havnor'),
          'fields'        => array(

            array(
              'id'        => 'text_color',
              'type'      => 'color_picker',
              'title'     => __('Text Color', 'havnor'),
            ),
            array(
              'id'        => 'text_size',
              'type'      => 'text',
              'title'     => __('Text Size', 'havnor'),
            ),
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'havnor'),
            ),

          ),
          'clone_fields'  => array(

            array(
              'id'        => 'text',
              'type'      => 'text',
              'title'     => __('Typewritter Text', 'havnor')
            ),

          ),

        ),
        // Typewritter List

        // Simple Image
        array(
          'name'          => 'havnor_simple_image',
          'title'         => __('Simple Image', 'havnor'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'havnor'),
            ),
            array(
              'id'        => 'get_image',
              'type'      => 'upload',
              'title'     => __('Image', 'havnor')
            ),
            array(
              'id'    => 'retina_img',
              'type'  => 'switcher',
              'std'   => false,
              'title' => __('Retina Image?', 'havnor')
            ),
            array(
              'id'        => 'link',
              'type'      => 'text',
              'attributes' => array(
                'placeholder'     => 'http://',
              ),
              'title'     => __('Link', 'havnor')
            ),
            array(
              'id'    => 'open_tab',
              'type'  => 'switcher',
              'std'   => false,
              'title' => __('Open link to new tab?', 'havnor')
            ),

          ),

        ),
        // Simple Image

        // Simple Textarea
        array(
          'name'          => 'havnor_simple_textarea',
          'title'         => __('Simple Textarea', 'havnor'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'havnor'),
            ),
            array(
              'id'        => 'get_text',
              'type'      => 'textarea',
              'title'     => __('Text Block', 'havnor')
            ),
            array(
              'id'        => 'text_size',
              'type'      => 'text',
              'title'     => __('Text Size', 'havnor'),
            ),

          ),

        ),
        // Simple Textarea

        // Simple Link
        array(
          'name'          => 'vt_simple_link',
          'title'         => __('Simple Link', 'havnor'),
          'fields'        => array(

            array(
              'id'        => 'link_style',
              'type'      => 'select',
              'title'     => __('Link Style', 'havnor'),
              'options'        => array(
                'link-underline' => __('Link Underline', 'havnor'),
                'simple' => __('Simple Link', 'havnor'),
              ),
            ),
            array(
              'id'        => 'link_text',
              'type'      => 'text',
              'title'     => __('Link Text', 'havnor'),
            ),
            array(
              'id'        => 'link',
              'type'      => 'text',
              'title'     => __('Link', 'havnor'),
              'attributes' => array(
                'placeholder'     => 'http://',
              ),
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => __('Open New Tab?', 'havnor'),
              'on_text'     => __('Yes', 'havnor'),
              'off_text'     => __('No', 'havnor'),
            ),
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'havnor'),
            ),

            // Normal Mode
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => __('Normal Mode', 'havnor')
            ),
            array(
              'id'        => 'text_color',
              'type'      => 'color_picker',
              'title'     => __('Text Color', 'havnor'),
              'wrap_class' => 'column_half el-hav-border',
            ),
            // Hover Mode
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => __('Hover Mode', 'havnor')
            ),
            array(
              'id'        => 'text_hover_color',
              'type'      => 'color_picker',
              'title'     => __('Text Hover Color', 'havnor'),
              'wrap_class' => 'column_half el-hav-border',
            ),

            // Size
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => __('Font Sizes', 'havnor')
            ),
            array(
              'id'        => 'text_size',
              'type'      => 'text',
              'title'     => __('Text Size', 'havnor'),
              'attributes' => array(
                'placeholder'     => 'Eg: 14px',
              ),
            ),

          ),
        ),
        // Simple Link

        // Blockquotes
        array(
          'name'          => 'havnor_blockquote',
          'title'         => __('Blockquote', 'havnor'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'havnor'),
            ),
            array(
              'id'        => 'text_size',
              'type'      => 'text',
              'title'     => __('Content Size', 'havnor'),
            ),
            array(
              'id'        => 'name_size',
              'type'      => 'text',
              'title'     => __('Name Size', 'havnor'),
            ),
            array(
              'id'        => 'content_color',
              'type'      => 'color_picker',
              'title'     => __('Content Color', 'havnor'),
            ),
            array(
              'id'        => 'name_color',
              'type'      => 'color_picker',
              'title'     => __('Name Color', 'havnor'),
            ),
            array(
              'id'        => 'name_hov_color',
              'type'      => 'color_picker',
              'title'     => __('Name Hover Color', 'havnor'),
            ),
            // Content
            array(
              'id'        => 'quote_text',
              'type'      => 'textarea',
              'title'     => __('Content', 'havnor'),
            ),
            array(
              'id'        => 'name',
              'type'      => 'text',
              'title'     => __('Name', 'havnor'),
            ),
            array(
              'id'        => 'name_link',
              'type'      => 'text',
              'title'     => __('Name Link', 'havnor'),
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => __('Open New Tab?', 'havnor'),
              'on_text'     => __('Yes', 'havnor'),
              'off_text'     => __('No', 'havnor'),
            ),
            array(
              'id'        => 'get_image',
              'type'      => 'upload',
              'title'     => __('Image', 'havnor')
            ),

          ),

        ),
        // Blockquotes
        // List Styles 
        array(
          'name'          => 'havnor_simple_lists',
          'title'         => __('Simple Lists', 'havnor'),
          'view'          => 'clone',
          'clone_id'      => 'havnor_simple_list',
          'clone_title'   => __('Add New', 'havnor'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'havnor'),
            ),
            array(
              'id'        => 'get_tick_image',
              'type'      => 'upload',
              'title'     => __('Tick Image(Bullet Image)', 'havnor')
            ),

            // Colors
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => __('Colors', 'havnor')
            ),
            array(
              'id'        => 'text_color',
              'type'      => 'color_picker',
              'title'     => __('Text Color', 'havnor'),
              'wrap_class' => 'column_half el-hav-border',
            ),

            // Size
            array(
              'id'        => 'text_size',
              'type'      => 'text',
              'title'     => __('Text Size', 'havnor'),
              'wrap_class' => 'column_half el-hav-border',
            ),

          ),
          'clone_fields'  => array(

            array(
              'id'        => 'need_link',
              'type'      => 'switcher',
              'title'     => __('Need Link?', 'havnor'),
              'on_text'     => __('Yes', 'havnor'),
              'off_text'     => __('No', 'havnor'),
            ),
            array(
              'id'        => 'list_title',
              'type'      => 'text',
              'title'     => __('List Title', 'havnor'),
              'dependency'  => array('need_link', '==', 'true'),
            ),
            array(
              'id'        => 'list_text',
              'type'      => 'text',
              'title'     => __('List Text', 'havnor'),
            ),
            array(
              'id'        => 'list_text_link',
              'type'      => 'text',
              'title'     => __('List Text Link', 'havnor'),
              'dependency'  => array('need_link', '==', 'true'),
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => __('Open New Tab?', 'havnor'),
              'on_text'     => __('Yes', 'havnor'),
              'off_text'     => __('No', 'havnor'),
              'dependency'  => array('need_link', '==', 'true'),
            ),

          ),

        ),
        // List Styles

      ),
    );

    /* Footer Shortcodes */
    $options[]     = array(
      'title'      => __('Footer Shortcodes', 'havnor'),
      'shortcodes' => array(

        // Footer Menus
        array(
          'name'          => 'havnor_footer_menus',
          'title'         => __('Footer Menu Links', 'havnor'),
          'view'          => 'clone',
          'clone_id'      => 'havnor_footer_menu',
          'clone_title'   => __('Add New', 'havnor'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'havnor'),
            ),
            array(
              'id'        => 'menu_size',
              'type'      => 'text',
              'title'     => __('Menu Size', 'havnor'),
              'attributes' => array(
                'placeholder'     => 'Eg: 14px',
              ),
            ),
            array(
              'id'        => 'single_column',
              'type'      => 'switcher',
              'title'     => __('Single Column?', 'havnor'),
              'on_text'     => __('Yes', 'havnor'),
              'off_text'     => __('No', 'havnor'),
            ),

          ),
          'clone_fields'  => array(

            array(
              'id'        => 'menu_title',
              'type'      => 'text',
              'title'     => __('Menu Title', 'havnor')
            ),
            array(
              'id'        => 'menu_link',
              'type'      => 'text',
              'title'     => __('Menu Link', 'havnor')
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => __('Open New Tab?', 'havnor'),
              'on_text'     => __('Yes', 'havnor'),
              'off_text'     => __('No', 'havnor'),
            ),

          ),

        ),
        // Footer Menus

      ),
    );

    /* Copyright Shortcodes */
    $options[]     = array(
      'title'      => __('Copyright Shortcodes', 'havnor'),
      'shortcodes' => array(

        // Copyright Menus
        array(
          'name'          => 'havnor_copyright_menus',
          'title'         => __('Copyright Menu Links', 'havnor'),
          'view'          => 'clone',
          'clone_id'      => 'havnor_copyright_menu',
          'clone_title'   => __('Add New', 'havnor'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'havnor'),
            ),

          ),
          'clone_fields'  => array(

            array(
              'id'        => 'cpy_menu_title',
              'type'      => 'text',
              'title'     => __('Menu Title', 'havnor')
            ),
            array(
              'id'        => 'cpy_menu_link',
              'type'      => 'text',
              'title'     => __('Menu Link', 'havnor')
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => __('Open New Tab?', 'havnor'),
              'on_text'     => __('Yes', 'havnor'),
              'off_text'     => __('No', 'havnor'),
            ),

          ),

        ),
        // Copright Menus

      ),
    );

  return $options;

  }
  add_filter( 'cs_shortcode_options', 'havnor_vt_shortcodes' );
}
