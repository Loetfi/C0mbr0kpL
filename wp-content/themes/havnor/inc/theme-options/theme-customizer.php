<?php
/*
 * All customizer related options for Havnor theme.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

if( ! function_exists( 'havnor_vt_customizer' ) ) {
  function havnor_vt_customizer( $options ) {

	$options        = array(); // remove old options 

	// Primary Color
	$options[]      = array(
	  'name'        => 'elemets_color_section',
	  'title'       => esc_html__('Primary Color', 'havnor'),
	  'settings'    => array(

	    // Fields Start
			array(
				'name'      => 'all_element_colors',
				'default'   => '#87c818',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Elements Color', 'havnor'),
					'description'    => esc_html__('This is theme primary color, means it\'ll affect all elements that have default color of our theme primary color.', 'havnor'),
				),
			),
	    // Fields End

	  )
	);
	// Primary Color

	// Secondary Color
	$options[]      = array(
	  'name'        => 'elemets_sec_color_section',
	  'title'       => esc_html__('Secondary Color', 'havnor'),
	  'settings'    => array(

	    // Fields Start
			array(
				'name'      => 'all_element_secondary_colors',
				'default'   => '#04448e',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Elements secondary Color', 'havnor'),
					'description'    => esc_html__('This is theme secondary color, means it\'ll affect all elements that have default color of our theme secondary color.', 'havnor'),
				),
			),
	    // Fields End
	  )
	);
	// Secondary Color

	// Topbar Color
	$options[]      = array(
	  'name'        => 'topbar_color_section',
	  'title'       => esc_html__('01. Topbar Colors', 'havnor'),
	  'settings'    => array(

	    // Fields Start
	    array(
				'name'          => 'topbar_bg_heading',
				'control'       => array(
					'type'        => 'cs_field',
					'options'     => array(
						'type'      => 'notice',
						'class'     => 'info',
						'content'   => esc_html__('Bar Color', 'havnor'),
					),
				),
			),
			array(
				'name'      => 'topbar_bg_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Background Color', 'havnor'),
				),
			),
			array(
				'name'      => 'topbar_border_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Border Color', 'havnor'),
				),
			),
			array(
				'name'          => 'topbar_text_heading',
				'control'       => array(
					'type'        => 'cs_field',
					'options'     => array(
						'type'      => 'notice',
						'class'     => 'info',
						'content'   => esc_html__('Common Color', 'havnor'),
					),
				),
			),
			array(
				'name'      => 'topbar_text_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Text Color', 'havnor'),
				),
			),
			array(
				'name'      => 'topbar_link_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Link Color', 'havnor'),
				),
			),
			array(
				'name'      => 'topbar_link_hover_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Link Hover Color', 'havnor'),
				),
			),
			array(
				'name'          => 'topbar_social_heading',
				'control'       => array(
					'type'        => 'cs_field',
					'options'     => array(
						'type'      => 'notice',
						'class'     => 'info',
						'content'   => esc_html__('Social Icon Color', 'havnor'),
					),
				),
			),
			array(
				'name'      => 'topbar_social_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Social Icon Color', 'havnor'),
				),
			),
			array(
				'name'      => 'topbar_social_hover_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Social Icons Hover Color', 'havnor'),
				),
			),
	    // Fields End

	  )
	);
	// Topbar Color

	// Header Color
	$options[]      = array(
	  'name'        => 'header_color_section',
	  'title'       => esc_html__('02. Header Colors', 'havnor'),
	  'sections'    => array(

	  	array(
	      'name'          => 'normal_header_section',
	      'title'         => esc_html__('Normal Header', 'havnor'),
	      'settings'      => array(

			    // Fields Start
					array(
						'name'          => 'header_main_menu_heading',
						'control'       => array(
							'type'        => 'cs_field',
							'options'     => array(
								'type'      => 'notice',
								'class'     => 'info',
								'content'   => esc_html__('Main Menu Colors', 'havnor'),
							),
						),
					),
					array(
						'name'      => 'header_bg_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Background Color', 'havnor'),
						),
					),
					array(
						'name'      => 'header_logo_bg_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Logo Bar Background Color(only for header style six & seven)', 'havnor'),
						),
					),
					array(
						'name'      => 'header_border_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Border Color', 'havnor'),
						),
					),
					array(
						'name'      => 'header_link_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Link Color', 'havnor'),
						),
					),
					array(
						'name'      => 'header_link_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Link Hover Color', 'havnor'),
						),
					),

					// Sub Menu Color
					array(
						'name'          => 'header_submenu_heading',
						'control'       => array(
							'type'        => 'cs_field',
							'options'     => array(
								'type'      => 'notice',
								'class'     => 'info',
								'content'   => esc_html__('Sub-Menu Colors', 'havnor'),
							),
						),
					),
					array(
						'name'      => 'submenu_bg_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Background Color', 'havnor'),
						),
					),
					array(
						'name'      => 'submenu_bg_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Background Hover Color', 'havnor'),
						),
					),
					array(
						'name'      => 'submenu_border_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Border Color', 'havnor'),
						),
					),
					array(
						'name'      => 'submenu_link_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Link Color', 'havnor'),
						),
					),
					array(
						'name'      => 'submenu_link_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Link Hover Color', 'havnor'),
						),
					),

					// Header Button
					array(
						'name'          => 'header_button_heading',
						'control'       => array(
							'type'        => 'cs_field',
							'options'     => array(
								'type'      => 'notice',
								'class'     => 'info',
								'content'   => esc_html__('Header Button Colors', 'havnor'),
							),
						),
					),
					array(
						'name'      => 'button_bg_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Background Color', 'havnor'),
						),
					),
					array(
						'name'      => 'button_text_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Text Color', 'havnor'),
						),
					),
					array(
						'name'      => 'button_border_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Border Color', 'havnor'),
						),
					),
					array(
						'name'      => 'button_bg_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Background HoverColor', 'havnor'),
						),
					),
					array(
						'name'      => 'button_text_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Text Hover Color', 'havnor'),
						),
					),
					array(
						'name'      => 'button_border_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Border Hover Color', 'havnor'),
						),
					),



				)
    	),
    	array(
	      'name'          => 'transparent_header_section',
	      'title'         => esc_html__('Transparent Header', 'havnor'),
	      'settings'      => array(
					array(
						'name'          => 'header_transparent_heading',
						'control'       => array(
							'type'        => 'cs_field',
							'options'     => array(
								'type'      => 'notice',
								'class'     => 'info',
								'content'   => esc_html__('Transparent Header Colors', 'havnor'),
							),
						),
					),
					array(
						'name'      => 'trans_header_bg_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Background Color', 'havnor'),
						),
					),
					array(
						'name'      => 'trans_header_link_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Link Color', 'havnor'),
						),
					),
					array(
						'name'      => 'trans_header_link_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Link Hover Color', 'havnor'),
						),
					),
				)
			),
			array(
	      'name'          => 'sticky_header_section',
	      'title'         => esc_html__('Sticky Header', 'havnor'),
	      'settings'      => array(
	      	array(
						'name'          => 'header_transparent_sticky_heading',
						'control'       => array(
							'type'        => 'cs_field',
							'options'     => array(
								'type'      => 'notice',
								'class'     => 'info',
								'content'   => esc_html__('Sticky Header Colors(Except Header Style Seven)', 'havnor'),
							),
						),
					),
					array(
						'name'      => 'trans_sticky_header_bg_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Background Color', 'havnor'),
						),
					),
					array(
						'name'      => 'trans_sticky_header_link_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Link Color', 'havnor'),
						),
					),
					array(
						'name'      => 'trans_sticky_header_link_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Link Hover Color', 'havnor'),
						),
					),
				)
      ),
      array(
	      'name'          => 'mobile_menu_section',
	      'title'         => esc_html__('Mobile Menu', 'havnor'),
	      'settings'      => array(
	      	array(
						'name'          => 'mobile_menu_heading',
						'control'       => array(
							'type'        => 'cs_field',
							'options'     => array(
								'type'      => 'notice',
								'class'     => 'info',
								'content'   => esc_html__('Mobile Menu Colors', 'havnor'),
							),
						),
					),
					array(
						'name'      => 'mobile_menu_toggle_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Menu Toggle Color', 'havnor'),
						),
					),
					array(
						'name'      => 'mobile_menu_bg_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Background Color', 'havnor'),
						),
					),
					array(
						'name'      => 'mobile_menu_bg_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Background Hover Color', 'havnor'),
						),
					),
					array(
						'name'      => 'mobile_menu_link_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Link Color', 'havnor'),
						),
					),
					array(
						'name'      => 'mobile_menu_link_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Link Hover Color', 'havnor'),
						),
					),
					array(
						'name'      => 'mobile_menu_border_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Border Color', 'havnor'),
						),
					),
					array(
						'name'      => 'mobile_menu_expand_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Menu Expand Color', 'havnor'),
						),
					),
					array(
						'name'      => 'mobile_menu_expand_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Menu Expand Hover Color', 'havnor'),
						),
					),
					array(
						'name'      => 'mobile_menu_expand_bg_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Menu Expand Background Color', 'havnor'),
						),
					),
					array(
						'name'      => 'mobile_menu_expand_bg_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Menu Expand Background Hover Color', 'havnor'),
						),
					),
				)
      ),
	    // Fields End

	  )
	);
	// Header Color

	// Sidebar Menu Color
	$options[]      = array(
	  'name'        => 'sidemenu_section',
	  'title'       => esc_html__('03. Sidebar Menu Colors', 'havnor'),
    'settings'      => array(

    	// Fields Start
    	array(
				'name'          => 'sidemenu_colors_heading',
				'control'       => array(
					'type'        => 'cs_field',
					'options'     => array(
						'type'      => 'notice',
						'class'     => 'info',
						'content'   => esc_html__('Sidebar Menu Colors', 'havnor'),
					),
				),
			),
    	array(
				'name'      => 'sidebar_bg_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Background Color', 'havnor'),
				),
			),
			array(
				'name'      => 'sidebar_text_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Text Color', 'havnor'),
				),
			),
			array(
				'name'      => 'sidebar_link_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Link Color', 'havnor'),
				),
			),
			array(
				'name'      => 'sidebar_link_hover_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Link Hover Color', 'havnor'),
				),
			),
			array(
				'name'      => 'sidebar_menu_border_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Menu Border Color', 'havnor'),
				),
			),
			array(
				'name'      => 'sidebar_submenu_bg_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Sub-Menu Background Color', 'havnor'),
				),
			),
			array(
				'name'      => 'sidebar_submenu_link_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Sub-Menu Link Color', 'havnor'),
				),
			),
			array(
				'name'      => 'sidebar_submenu_link_hover_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Sub-Menu Link Hover Color', 'havnor'),
				),
			),
			array(
				'name'      => 'sidebar_submenu_border_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Sub-Menu Border Color', 'havnor'),
				),
			),
	    // Fields End

	  )
	);
	// Sidebar Menu Color

	// Title Bar Color
	$options[]      = array(
	  'name'        => 'titlebar_section',
	  'title'       => esc_html__('04. Title Bar Colors', 'havnor'),
    'settings'      => array(

    	// Fields Start
    	array(
				'name'          => 'titlebar_colors_heading',
				'control'       => array(
					'type'        => 'cs_field',
					'options'     => array(
						'type'      => 'notice',
						'class'     => 'info',
						'content'   => esc_html__('<h2 style="margin: 0;text-align: center;">Title Colors</h2> <br /> This is common settings, if this settings not affect in your page. Please check your page metabox. You may set default settings there.', 'havnor'),
					),
				),
			),
    	array(
				'name'      => 'titlebar_title_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Title Color', 'havnor'),
				),
			),
			array(
				'name'      => 'titlebar_sub_title_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Sub Title Color', 'havnor'),
				),
			),
			array(
	      'name'          => 'breadcrumb_color_notice',
	      'control'       => array(
	        'type'        => 'cs_field',
	        'options'     => array(
	          'type'      => 'notice',
	          'class'     => 'info',
	          'content'   => esc_html__('Breadcrumbs Colors', 'havnor'),
	        ),
	      ),
	    ),
	    array(
				'name'      => 'breadcrumb_text_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Breadcrumbs Text Color', 'havnor'),
				),
			),
			array(
				'name'      => 'breadcrumb_link_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Breadcrumbs Link Color', 'havnor'),
				),
			),
			array(
				'name'      => 'breadcrumb_link_hover_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Breadcrumbs Link Hover Color', 'havnor'),
				),
			),
			array(
				'name'      => 'breadcrumb_bg_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Breadcrumbs Background Color(Style Two)', 'havnor'),
				),
			),
	    // Fields End

	  )
	);
	// Title Bar Color

	// Content Color
	$options[]      = array(
	  'name'        => 'content_section',
	  'title'       => esc_html__('05. Content Colors', 'havnor'),
	  'description' => esc_html__('This is all about content area text and heading colors.', 'havnor'),
	  'sections'    => array(

	  	array(
	      'name'          => 'content_text_section',
	      'title'         => esc_html__('Content Text', 'havnor'),
	      'settings'      => array(

			    // Fields Start
			    array(
						'name'      => 'body_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Body & Content Color', 'havnor'),
						),
					),
					array(
						'name'      => 'body_links_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Body Links Color', 'havnor'),
						),
					),
					array(
						'name'      => 'body_link_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Body Links Hover Color', 'havnor'),
						),
					),
					array(
						'name'      => 'sidebar_content_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Sidebar Content Color', 'havnor'),
						),
					),
					array(
						'name'      => 'sidebar_links_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Sidebar Links Color', 'havnor'),
						),
					),
					array(
						'name'      => 'sidebar_links_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Sidebar Links Hover Color', 'havnor'),
						),
					),
			    // Fields End
			  )
			),

			// Text Colors Section
			array(
	      'name'          => 'content_heading_section',
	      'title'         => esc_html__('Headings', 'havnor'),
	      'settings'      => array(

	      	// Fields Start
					array(
						'name'      => 'content_heading_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Content Heading Color', 'havnor'),
						),
					),
	      	array(
						'name'      => 'sidebar_heading_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Sidebar Heading Color', 'havnor'),
						),
					),
			    // Fields End
      	)
      ),
	  )
	);
	// Content Color

	// Footer Color
	$options[]      = array(
	  'name'        => 'footer_section',
	  'title'       => esc_html__('06. Footer Colors', 'havnor'),
	  'description' => esc_html__('This is all about footer settings. Make sure you\'ve enabled your needed section at : Havnor > Theme Options > Footer ', 'havnor'),
	  'settings'      => array(

	    // Fields Start
			array(
	      'name'          => 'footer_widget_color_notice',
	      'control'       => array(
	        'type'        => 'cs_field',
	        'options'     => array(
	          'type'      => 'notice',
	          'class'     => 'info',
	          'content'   => esc_html__('Content Colors(Dark Footer)', 'havnor'),
	        ),
	      ),
	    ),
			array(
				'name'      => 'footer_heading_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Widget Heading Color', 'havnor'),
				),
			),
			array(
				'name'      => 'footer_text_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Widget Text Color', 'havnor'),
				),
			),
			array(
				'name'      => 'footer_link_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Widget Link Color', 'havnor'),
				),
			),
			array(
				'name'      => 'footer_link_hover_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Widget Link Hover Color', 'havnor'),
				),
			),
			array(
				'name'      => 'footer_bg_color',
				'default'   => '#222327',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Background Color', 'havnor'),
				),
			),
			array(
	      'name'          => 'light_footer_widget_color_notice',
	      'control'       => array(
	        'type'        => 'cs_field',
	        'options'     => array(
	          'type'      => 'notice',
	          'class'     => 'info',
	          'content'   => esc_html__('Content Colors(Light Footer)', 'havnor'),
	        ),
	      ),
	    ),
			array(
				'name'      => 'light_footer_heading_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Widget Heading Color', 'havnor'),
				),
			),
			array(
				'name'      => 'light_footer_text_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Widget Text Color', 'havnor'),
				),
			),
			array(
				'name'      => 'light_footer_link_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Widget Link Color', 'havnor'),
				),
			),
			array(
				'name'      => 'light_footer_link_hover_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Widget Link Hover Color', 'havnor'),
				),
			),
			array(
				'name'      => 'light_footer_bg_color',
				'default'   => '#f8f8f8',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Background Color', 'havnor'),
				),
			),
	    // Fields End
	)
);
	// Copyright Color
	$options[]      = array(
	  'name'        => 'copyright_section',
	  'title'       => esc_html__('07. Copyright Colors', 'havnor'),
	  'description' => esc_html__('This is all about footer settings. Make sure you\'ve enabled your needed section at : Havnor > Theme Options > Footer > Copyright Layout ', 'havnor'),
	  'settings'      => array(

	    // Fields Start
			array(
	      'name'          => 'copyright_color_notice',
	      'control'       => array(
	        'type'        => 'cs_field',
	        'options'     => array(
	          'type'      => 'notice',
	          'class'     => 'info',
	          'content'   => esc_html__('Copyright Colors(Dark Footer)', 'havnor'),
	        ),
	      ),
	    ),
			array(
				'name'      => 'copyright_text_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Copyright Text Color', 'havnor'),
				),
			),
			array(
				'name'      => 'copyright_link_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Copyright Link Color', 'havnor'),
				),
			),
			array(
				'name'      => 'copyright_link_hover_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Copyright Link Hover Color', 'havnor'),
				),
			),
			array(
				'name'      => 'copyright_bg_color',
				'default'   => '#222327',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Background Color', 'havnor'),
				),
			),
			array(
				'name'      => 'copyright_border_color',
				'default'   => '#303239',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Border Color', 'havnor'),
				),
			),
			array(
	      'name'          => 'light_copyright_color_notice',
	      'control'       => array(
	        'type'        => 'cs_field',
	        'options'     => array(
	          'type'      => 'notice',
	          'class'     => 'info',
	          'content'   => esc_html__('Copyright Colors(Light Footer)', 'havnor'),
	        ),
	      ),
	    ),
			array(
				'name'      => 'light_copyright_text_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Copyright Text Color', 'havnor'),
				),
			),
			array(
				'name'      => 'light_copyright_link_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Copyright Link Color', 'havnor'),
				),
			),
			array(
				'name'      => 'light_copyright_link_hover_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Copyright Link Hover Color', 'havnor'),
				),
			),
			array(
				'name'      => 'light_copyright_bg_color',
				'default'   => '#04448e',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Background Color', 'havnor'),
				),
			),
			array(
				'name'      => 'light_copyright_border_color',
				'default'   => '#04448e',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Border Color', 'havnor'),
				),
			),
	    // Fields End
	  )
	);
	// Footer Color

	return $options;

  }
  add_filter( 'cs_customize_options', 'havnor_vt_customizer' );
}
