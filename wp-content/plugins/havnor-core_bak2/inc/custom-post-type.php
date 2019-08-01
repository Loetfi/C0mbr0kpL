<?php

/**
 * Initialize Custom Post Type - Havnor Theme
 */

function havnor_custom_post_type() {

	$portfolio_cpt = (havnor_framework_active()) ? cs_get_option('theme_portfolio_name') : '';
	$portfolio_slug = (havnor_framework_active()) ? cs_get_option('theme_portfolio_slug') : '';
	$portfolio_cpt_slug = (havnor_framework_active()) ? cs_get_option('theme_portfolio_cat_slug') : '';

	$base = (isset($portfolio_cpt_slug) && $portfolio_cpt_slug !== '') ? sanitize_title_with_dashes($portfolio_cpt_slug) : ((isset($portfolio_cpt) && $portfolio_cpt !== '') ? strtolower($portfolio_cpt) : 'portfolio');
	$base_slug = (isset($portfolio_slug) && $portfolio_slug !== '') ? sanitize_title_with_dashes($portfolio_slug) : ((isset($portfolio_cpt) && $portfolio_cpt !== '') ? strtolower($portfolio_cpt) : 'portfolio');
	$label = ucfirst((isset($portfolio_cpt) && $portfolio_cpt !== '') ? strtolower($portfolio_cpt) : 'portfolio');

	// Register custom post type - Portfolio
	register_post_type('portfolio',
		array(
			'labels' => array(
				'name' => $label,
				'singular_name' => sprintf(esc_html__('%s Post', 'havnor-core' ), $label),
				'all_items' => sprintf(esc_html__('All %s', 'havnor-core' ), $label),
				'add_new' => esc_html__('Add New', 'havnor-core') ,
				'add_new_item' => sprintf(esc_html__('Add New %s', 'havnor-core' ), $label),
				'edit' => esc_html__('Edit', 'havnor-core') ,
				'edit_item' => sprintf(esc_html__('Edit %s', 'havnor-core' ), $label),
				'new_item' => sprintf(esc_html__('New %s', 'havnor-core' ), $label),
				'view_item' => sprintf(esc_html__('View %s', 'havnor-core' ), $label),
				'search_items' => sprintf(esc_html__('Search %s', 'havnor-core' ), $label),
				'not_found' => esc_html__('Nothing found in the Database.', 'havnor-core') ,
				'not_found_in_trash' => esc_html__('Nothing found in Trash', 'havnor-core') ,
				'parent_item_colon' => ''
			) ,
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 21,
			'menu_icon' => 'dashicons-portfolio',
			'rewrite' => array(
				'slug' => $base_slug,
				'with_front' => false
			),
			'has_archive' => true,
			'capability_type' => 'post',
			'hierarchical' => true,
			'supports' => array(
				'title',
				'editor',
				'author',
				'thumbnail',
				'excerpt',
				'trackbacks',
				'custom-fields',
				'comments',
				'revisions',
				'sticky',
				'page-attributes'
			)
		)
	);
	// Registered

	// Add Category Taxonomy for our Custom Post Type - Portfolio
	register_taxonomy(
		'portfolio_category',
		'portfolio',
		array(
			'hierarchical' => true,
			'public' => true,
			'show_ui' => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'labels' => array(
				'name' => sprintf(esc_html__( '%s Categories', 'havnor-core' ), $label),
				'singular_name' => sprintf(esc_html__('%s Category', 'havnor-core'), $label),
				'search_items' =>  sprintf(esc_html__( 'Search %s Categories', 'havnor-core'), $label),
				'all_items' => sprintf(esc_html__( 'All %s Categories', 'havnor-core'), $label),
				'parent_item' => sprintf(esc_html__( 'Parent %s Category', 'havnor-core'), $label),
				'parent_item_colon' => sprintf(esc_html__( 'Parent %s Category:', 'havnor-core'), $label),
				'edit_item' => sprintf(esc_html__( 'Edit %s Category', 'havnor-core'), $label),
				'update_item' => sprintf(esc_html__( 'Update %s Category', 'havnor-core'), $label),
				'add_new_item' => sprintf(esc_html__( 'Add New %s Category', 'havnor-core'), $label),
				'new_item_name' => sprintf(esc_html__( 'New %s Category Name', 'havnor-core'), $label)
			),
			'rewrite' => array( 'slug' => $base . '_cat' ),
		)
	);

	$args = array(
		'hierarchical' => true,
		'public' => true,
		'show_ui' => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => false,
	);

	// Job
	$job_cpt = (havnor_framework_active()) ? cs_get_option('theme_job_name') : '';
	$job_slug = (havnor_framework_active()) ? cs_get_option('theme_job_slug') : '';
	$job_cpt_slug = (havnor_framework_active()) ? cs_get_option('theme_job_cat_slug') : '';

	$base = (isset($job_cpt_slug) && $job_cpt_slug !== '') ? sanitize_title_with_dashes($job_cpt_slug) : ((isset($job_cpt) && $job_cpt !== '') ? strtolower($job_cpt) : 'job');
	$base_slug = (isset($job_slug) && $job_slug !== '') ? sanitize_title_with_dashes($job_slug) : ((isset($job_cpt) && $job_cpt !== '') ? strtolower($job_cpt) : 'job');
	$label = ucfirst((isset($job_cpt) && $job_cpt !== '') ? strtolower($job_cpt) : 'job');

	// Register custom post type - Job
	register_post_type('job',
		array(
			'labels' => array(
				'name' => $label,
				'singular_name' => sprintf(esc_html__('%s Post', 'havnor-core' ), $label),
				'all_items' => sprintf(esc_html__('All %s', 'havnor-core' ), $label),
				'add_new' => esc_html__('Add New', 'havnor-core') ,
				'add_new_item' => sprintf(esc_html__('Add New %s', 'havnor-core' ), $label),
				'edit' => esc_html__('Edit', 'havnor-core') ,
				'edit_item' => sprintf(esc_html__('Edit %s', 'havnor-core' ), $label),
				'new_item' => sprintf(esc_html__('New %s', 'havnor-core' ), $label),
				'view_item' => sprintf(esc_html__('View %s', 'havnor-core' ), $label),
				'search_items' => sprintf(esc_html__('Search %s', 'havnor-core' ), $label),
				'not_found' => esc_html__('Nothing found in the Database.', 'havnor-core') ,
				'not_found_in_trash' => esc_html__('Nothing found in Trash', 'havnor-core') ,
				'parent_item_colon' => ''
			) ,
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 22,
			'menu_icon' => 'dashicons-welcome-learn-more',
			'rewrite' => array(
				'slug' => $base_slug,
				'with_front' => false
			),
			'has_archive' => true,
			'capability_type' => 'post',
			'hierarchical' => true,
			'supports' => array(
				'title',
				'editor',
				'author',
				'thumbnail',
				'excerpt',
				'trackbacks',
				'custom-fields',
				'comments',
				'revisions',
				'sticky',
				'page-attributes'
			)
		)
	);
	// Registered

	// Add Role Taxonomy for our Custom Post Type - Job
	register_taxonomy(
		'job_role',
		'job',
		array(
			'hierarchical' => true,
			'public' => true,
			'show_ui' => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'labels' => array(
				'name' => sprintf(esc_html__( '%s Roles', 'havnor-core' ), $label),
				'singular_name' => sprintf(esc_html__('%s Role', 'havnor-core'), $label),
				'search_items' =>  sprintf(esc_html__( 'Search %s Roles', 'havnor-core'), $label),
				'all_items' => sprintf(esc_html__( 'All %s Roles', 'havnor-core'), $label),
				'parent_item' => sprintf(esc_html__( 'Parent %s Role', 'havnor-core'), $label),
				'parent_item_colon' => sprintf(esc_html__( 'Parent %s Role:', 'havnor-core'), $label),
				'edit_item' => sprintf(esc_html__( 'Edit %s Role', 'havnor-core'), $label),
				'update_item' => sprintf(esc_html__( 'Update %s Role', 'havnor-core'), $label),
				'add_new_item' => sprintf(esc_html__( 'Add New %s Role', 'havnor-core'), $label),
				'new_item_name' => sprintf(esc_html__( 'New %s Role Name', 'havnor-core'), $label)
			),
			'rewrite' => array( 'slug' => $base . '_cat' ),
		)
	);

	$args = array(
		'hierarchical' => true,
		'public' => true,
		'show_ui' => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => true,
	);

	// Add Designation Taxonomy for our Custom Post Type - Job
	register_taxonomy(
		'job_designation',
		'job',
		array(
			'hierarchical' => true,
			'public' => true,
			'show_ui' => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'labels' => array(
				'name' => sprintf(esc_html__( '%s Designations', 'havnor-core' ), $label),
				'singular_name' => sprintf(esc_html__('%s Designation', 'havnor-core'), $label),
				'search_items' =>  sprintf(esc_html__( 'Search %s Designations', 'havnor-core'), $label),
				'all_items' => sprintf(esc_html__( 'All %s Designations', 'havnor-core'), $label),
				'parent_item' => sprintf(esc_html__( 'Parent %s Designation', 'havnor-core'), $label),
				'parent_item_colon' => sprintf(esc_html__( 'Parent %s Designation:', 'havnor-core'), $label),
				'edit_item' => sprintf(esc_html__( 'Edit %s Designation', 'havnor-core'), $label),
				'update_item' => sprintf(esc_html__( 'Update %s Designation', 'havnor-core'), $label),
				'add_new_item' => sprintf(esc_html__( 'Add New %s Designation', 'havnor-core'), $label),
				'new_item_name' => sprintf(esc_html__( 'New %s Designation Name', 'havnor-core'), $label)
			),
			'rewrite' => array( 'slug' => $base . '_des' ),
		)
	);

	$args = array(
		'hierarchical' => true,
		'public' => true,
		'show_ui' => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => true,
	);

	// Testimonials - Start
	$testimonial_cpt = (havnor_framework_active()) ? cs_get_option('theme_testimonial_name') : '';
	$testimonial_slug = (havnor_framework_active()) ? cs_get_option('theme_testimonial_slug') : '';
	$testimonial_cpt_slug = (havnor_framework_active()) ? cs_get_option('theme_testimonial_cat_slug') : '';

	$testi_base = (isset($testimonial_cpt_slug) && $testimonial_cpt_slug !== '') ? sanitize_title_with_dashes($testimonial_cpt_slug) : ((isset($testimonial_cpt) && $testimonial_cpt !== '') ? strtolower($testimonial_cpt) : 'testimonial');
	$testi_base_slug = (isset($testimonial_slug) && $testimonial_slug !== '') ? sanitize_title_with_dashes($testimonial_slug) : ((isset($testimonial_cpt) && $testimonial_cpt !== '') ? strtolower($testimonial_cpt) : 'testimonial');
	$testi_label = ucfirst((isset($testimonial_cpt) && $testimonial_cpt !== '') ? strtolower($testimonial_cpt) : 'testimonial');

	// Register custom post type - Testimonials
	register_post_type('testimonial',
		array(
			'labels' => array(
				'name' => $testi_label,
				'singular_name' => sprintf(esc_html__('%s Post', 'havnor-core' ), $testi_label),
				'all_items' => sprintf(esc_html__('%s', 'havnor-core' ), $testi_label),
				'add_new' => esc_html__('Add New', 'havnor-core') ,
				'add_new_item' => sprintf(esc_html__('Add New %s', 'havnor-core' ), $testi_label),
				'edit' => esc_html__('Edit', 'havnor-core') ,
				'edit_item' => sprintf(esc_html__('Edit %s', 'havnor-core' ), $testi_label),
				'new_item' => sprintf(esc_html__('New %s', 'havnor-core' ), $testi_label),
				'view_item' => sprintf(esc_html__('View %s', 'havnor-core' ), $testi_label),
				'search_items' => sprintf(esc_html__('Search %s', 'havnor-core' ), $testi_label),
				'not_found' => esc_html__('Nothing found in the Database.', 'havnor-core'),
				'not_found_in_trash' => esc_html__('Nothing found in Trash', 'havnor-core'),
				'parent_item_colon' => ''
			) ,
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 24,
			'menu_icon' => 'dashicons-groups',
			'rewrite' => array(
				'slug' => $testi_base_slug,
				'with_front' => false
			),
			'has_archive' => true,
			'capability_type' => 'post',
			'hierarchical' => true,
			'supports' => array(
				'title',
				'editor',
				'thumbnail',
				'revisions',
				'sticky',
				'page-attributes'
			)
		)
	);

	// Add Category Taxonomy for our Custom Post Type - Testimonial
	register_taxonomy(
		'testimonial_category',
		'testimonial',
		array(
			'hierarchical' => true,
			'public' => true,
			'show_ui' => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'labels' => array(
				'name' => sprintf(esc_html__( '%s Categories', 'havnor-core' ), $testi_label),
				'singular_name' => sprintf(esc_html__('%s Category', 'havnor-core'), $testi_label),
				'search_items' =>  sprintf(esc_html__( 'Search %s Categories', 'havnor-core'), $testi_label),
				'all_items' => sprintf(esc_html__( 'All %s Categories', 'havnor-core'), $testi_label),
				'parent_item' => sprintf(esc_html__( 'Parent %s Category', 'havnor-core'), $testi_label),
				'parent_item_colon' => sprintf(esc_html__( 'Parent %s Category:', 'havnor-core'), $testi_label),
				'edit_item' => sprintf(esc_html__( 'Edit %s Category', 'havnor-core'), $testi_label),
				'update_item' => sprintf(esc_html__( 'Update %s Category', 'havnor-core'), $testi_label),
				'add_new_item' => sprintf(esc_html__( 'Add New %s Category', 'havnor-core'), $testi_label),
				'new_item_name' => sprintf(esc_html__( 'New %s Category Name', 'havnor-core'), $testi_label)
			),
			'rewrite' => array( 'slug' => $testi_base . '_cat' ),
		)
	);

	$args = array(
		'hierarchical' => true,
		'public' => true,
		'show_ui' => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => false,
	);
	// Testimonials - End

	// Team Start
	$team_cpt = (havnor_framework_active()) ? cs_get_option('theme_team_name') : '';
	$team_slug = (havnor_framework_active()) ? cs_get_option('theme_team_slug') : '';
	$team_cpt_slug = (havnor_framework_active()) ? cs_get_option('theme_team_cat_slug') : '';

	$team_base = (isset($team_cpt_slug) && $team_cpt_slug !== '') ? sanitize_title_with_dashes($team_cpt_slug) : ((isset($team_cpt) && $team_cpt !== '') ? strtolower($team_cpt) : 'team');
	$team_base_slug = (isset($team_slug) && $team_slug !== '') ? sanitize_title_with_dashes($team_slug) : ((isset($team_cpt) && $team_cpt !== '') ? strtolower($team_cpt) : 'team');
	$teams = ucfirst((isset($team_cpt) && $team_cpt !== '') ? strtolower($team_cpt) : 'team');

	// Register custom post type - Team
	register_post_type('team',
		array(
			'labels' => array(
				'name' => $teams,
				'singular_name' => sprintf(esc_html__('%s Post', 'havnor-core' ), $teams),
				'all_items' => sprintf(esc_html__('%s', 'havnor-core' ), $teams),
				'add_new' => esc_html__('Add New', 'havnor-core') ,
				'add_new_item' => sprintf(esc_html__('Add New %s', 'havnor-core' ), $teams),
				'edit' => esc_html__('Edit', 'havnor-core') ,
				'edit_item' => sprintf(esc_html__('Edit %s', 'havnor-core' ), $teams),
				'new_item' => sprintf(esc_html__('New %s', 'havnor-core' ), $teams),
				'view_item' => sprintf(esc_html__('View %s', 'havnor-core' ), $teams),
				'search_items' => sprintf(esc_html__('Search %s', 'havnor-core' ), $teams),
				'not_found' => esc_html__('Nothing found in the Database.', 'havnor-core') ,
				'not_found_in_trash' => esc_html__('Nothing found in Trash', 'havnor-core') ,
				'parent_item_colon' => ''
			) ,
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 23,
			'menu_icon' => 'dashicons-businessman',
			'rewrite' => array(
				'slug' => $team_base_slug,
				'with_front' => false
			),
			'has_archive' => true,
			'capability_type' => 'post',
			'hierarchical' => true,
			'supports' => array(
				'title',
				'editor',
				'thumbnail',
				'excerpt',
				'revisions',
				'sticky',
				'page-attributes'
			)
		)
	);

	// Add Category Taxonomy for our Custom Post Type - TEam
	register_taxonomy(
		'team_category',
		'team',
		array(
			'hierarchical' => true,
			'public' => true,
			'show_ui' => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'labels' => array(
				'name' => sprintf(esc_html__( '%s Categories', 'havnor-core' ), $teams),
				'singular_name' => sprintf(esc_html__('%s Category', 'havnor-core'), $teams),
				'search_items' =>  sprintf(esc_html__( 'Search %s Categories', 'havnor-core'), $teams),
				'all_items' => sprintf(esc_html__( 'All %s Categories', 'havnor-core'), $teams),
				'parent_item' => sprintf(esc_html__( 'Parent %s Category', 'havnor-core'), $teams),
				'parent_item_colon' => sprintf(esc_html__( 'Parent %s Category:', 'havnor-core'), $teams),
				'edit_item' => sprintf(esc_html__( 'Edit %s Category', 'havnor-core'), $teams),
				'update_item' => sprintf(esc_html__( 'Update %s Category', 'havnor-core'), $teams),
				'add_new_item' => sprintf(esc_html__( 'Add New %s Category', 'havnor-core'), $teams),
				'new_item_name' => sprintf(esc_html__( 'New %s Category Name', 'havnor-core'), $teams)
			),
			'rewrite' => array( 'slug' => $team_base . '_cat' ),
		)
	);

	$args = array(
		'hierarchical' => true,
		'public' => true,
		'show_ui' => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => false,
	);
	// Team - End

}

// Portfolio Slug
function havnor_custom_portfolio_slug() {
	$portfolio_cpt = (havnor_framework_active()) ? cs_get_option('theme_portfolio_name') : '';
	if ($portfolio_cpt === '') $portfolio_cp = 'portfolio';
  $rules = get_option( 'rewrite_rules' );
  if ( ! isset( $rules['('.$portfolio_cpt.')/(\d*)$'] ) ) {
		global $wp_rewrite;
		$wp_rewrite->flush_rules();
  }
  // Job Post
  $job_cpt = (havnor_framework_active()) ? cs_get_option('theme_job_name') : '';
	if ($job_cpt === '') $job_cp = 'job';
  $rules = get_option( 'rewrite_rules' );
  if ( ! isset( $rules['('.$job_cpt.')/(\d*)$'] ) ) {
		global $wp_rewrite;
		$wp_rewrite->flush_rules();
  }
  // Testimonial Post
  $testimonial_cpt = (havnor_framework_active()) ? cs_get_option('theme_testimonial_name') : '';
	if ($testimonial_cpt === '') $testimonial_cp = 'testimonial';
  $rules = get_option( 'rewrite_rules' );
  if ( ! isset( $rules['('.$testimonial_cpt.')/(\d*)$'] ) ) {
		global $wp_rewrite;
		$wp_rewrite->flush_rules();
  }
  // Team Post
  $team_cpt = (havnor_framework_active()) ? cs_get_option('theme_team_name') : '';
	if ($team_cpt === '') $team_cp = 'team';
  $rules = get_option( 'rewrite_rules' );
  if ( ! isset( $rules['('.$team_cpt.')/(\d*)$'] ) ) {
		global $wp_rewrite;
		$wp_rewrite->flush_rules();
  }
}
add_action( 'cs_validate_save_after','havnor_custom_portfolio_slug' );

// After Theme Setup
function havnor_custom_flush_rules() {
	// Enter post type function, so rewrite work within this function
	havnor_custom_post_type();
	// Flush it
	flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'havnor_custom_flush_rules');
add_action('init', 'havnor_custom_post_type');

// Avoid portfolio post type as 404 page while it change
function vt_cpt_avoid_error_portfolio() {
	$portfolio_cpt = (havnor_framework_active()) ? cs_get_option('theme_portfolio_name') : '';
	if ($portfolio_cpt === '') $portfolio_cp = 'portfolio';
	$set = get_option('post_type_rules_flased_' . $portfolio_cpt);
	if ($set !== true){
		flush_rewrite_rules(false);
		update_option('post_type_rules_flased_' . $portfolio_cpt,true);
	}
	// Job Post
	$job_cpt = (havnor_framework_active()) ? cs_get_option('theme_job_name') : '';
	if ($job_cpt === '') $job_cp = 'job';
	$set = get_option('post_type_rules_flased_' . $job_cpt);
	if ($set !== true){
		flush_rewrite_rules(false);
		update_option('post_type_rules_flased_' . $job_cpt,true);
	}
	// Testimonial Post
	$testimonial_cpt = (havnor_framework_active()) ? cs_get_option('theme_testimonial_name') : '';
	if ($testimonial_cpt === '') $testimonial_cp = 'testimonial';
	$set = get_option('post_type_rules_flased_' . $testimonial_cpt);
	if ($set !== true){
		flush_rewrite_rules(false);
		update_option('post_type_rules_flased_' . $testimonial_cpt,true);
	}
	// Team Post
	$team_cpt = (havnor_framework_active()) ? cs_get_option('theme_team_name') : '';
	if ($team_cpt === '') $team_cp = 'team';
	$set = get_option('post_type_rules_flased_' . $team_cpt);
	if ($set !== true){
		flush_rewrite_rules(false);
		update_option('post_type_rules_flased_' . $team_cpt,true);
	}
}
add_action('init', 'vt_cpt_avoid_error_portfolio');

// Add Filter by Category in Portfolio Type
add_action('restrict_manage_posts', 'havnor_filter_portfolio_categories');
function havnor_filter_portfolio_categories() {
	global $typenow;
	$post_type = 'portfolio'; // Portfolio post type
	$taxonomy  = 'portfolio_category'; // Portfolio category taxonomy
	if ($typenow == $post_type) {
		$selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
		$info_taxonomy = get_taxonomy($taxonomy);
		wp_dropdown_categories(array(
			'show_option_all' => sprintf(esc_html__("Show All %s", 'havnor-core'), $info_taxonomy->label),
			'taxonomy'        => $taxonomy,
			'name'            => $taxonomy,
			'orderby'         => 'name',
			'selected'        => $selected,
			'show_count'      => true,
			'hide_empty'      => true,
		));
	};
}

// Portfolio Search => ID to Term
add_filter('parse_query', 'havnor_portfolio_id_term_search');
function havnor_portfolio_id_term_search($query) {
	global $pagenow;
	$post_type = 'portfolio'; // Portfolio post type
	$taxonomy  = 'portfolio_category'; // Portfolio category taxonomy
	$q_vars    = &$query->query_vars;
	if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
		$term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
		$q_vars[$taxonomy] = $term->slug;
	}
}

/* ---------------------------------------------------------------------------
 * Custom columns - Portfolio
 * --------------------------------------------------------------------------- */
add_filter("manage_edit-portfolio_columns", "havnor_portfolio_edit_columns");
function havnor_portfolio_edit_columns($columns) {
  $new_columns['cb'] = '<input type="checkbox" />';
  $new_columns['title'] = __('Title', 'havnor-core' );
  $new_columns['thumbnail'] = __('Image', 'havnor-core' );
  $new_columns['portfolio_category'] = __('Categories', 'havnor-core' );
  $new_columns['portfolio_order'] = __('Order', 'havnor-core' );
  $new_columns['date'] = __('Date', 'havnor-core' );

  return $new_columns;
}
add_action('manage_portfolio_posts_custom_column', 'havnor_manage_portfolio_columns', 10, 2);
function havnor_manage_portfolio_columns( $column_name ) {
  global $post;

  switch ($column_name) {

    /* If displaying the 'Image' column. */
    case 'thumbnail':
      echo get_the_post_thumbnail( $post->ID, array( 100, 100) );
    break;

    /* If displaying the 'Categories' column. */
    case 'portfolio_category' :

      $terms = get_the_terms( $post->ID, 'portfolio_category' );

      if ( !empty( $terms ) ) {

        $out = array();
        foreach ( $terms as $term ) {
            $out[] = sprintf( '<a href="%s">%s</a>',
            	esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'portfolio_category' => $term->slug ), 'edit.php' ) ),
            	esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'portfolio_category', 'display' ) )
            );
        }
        /* Join the terms, separating them with a comma. */
        echo join( ', ', $out );
      }

      /* If no terms were found, output a default message. */
      else {
        echo '&macr;';
      }

    break;

    case "portfolio_order":
      echo $post->menu_order;
    break;

    /* Just break out of the switch statement for everything else. */
    default :
      break;
    break;

  }
}

/* ---------------------------------------------------------------------------
 * Custom columns - Job
 * --------------------------------------------------------------------------- */
add_filter("manage_edit-job_columns", "havnor_job_edit_columns");
function havnor_job_edit_columns($columns) {
  $new_columns['cb'] = '<input type="checkbox" />';
  $new_columns['title'] = __('Title', 'havnor-core' );
  $new_columns['thumbnail'] = __('Image', 'havnor-core' );
  $new_columns['job_role'] = __('Roles', 'havnor-core' );
  $new_columns['job_designation'] = __('Designations', 'havnor-core' );
  $new_columns['job_order'] = __('Order', 'havnor-core' );
  $new_columns['date'] = __('Date', 'havnor-core' );

  return $new_columns;
}
add_action('manage_job_posts_custom_column', 'havnor_manage_job_columns', 10, 2);
function havnor_manage_job_columns( $column_name ) {
  global $post;

  switch ($column_name) {

    /* If displaying the 'Image' column. */
    case 'thumbnail':
      echo get_the_post_thumbnail( $post->ID, array( 100, 100) );
    break;

    /* If displaying the 'Roles' column. */
    case 'job_role' :

      $terms = get_the_terms( $post->ID, 'job_role' );

      if ( !empty( $terms ) ) {

        $out = array();
        foreach ( $terms as $term ) {
            $out[] = sprintf( '<a href="%s">%s</a>',
            	esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'job_role' => $term->slug ), 'edit.php' ) ),
            	esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'job_role', 'display' ) )
            );
        }
        /* Join the terms, separating them with a comma. */
        echo join( ', ', $out );
      }

      /* If no terms were found, output a default message. */
      else {
        echo '&macr;';
      }

    break;

    /* If displaying the 'Designations' column. */
    case 'job_designation' :

      $terms = get_the_terms( $post->ID, 'job_designation' );

      if ( !empty( $terms ) ) {

        $out = array();
        foreach ( $terms as $term ) {
            $out[] = sprintf( '<a href="%s">%s</a>',
            	esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'job_designation' => $term->slug ), 'edit.php' ) ),
            	esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'job_designation', 'display' ) )
            );
        }
        /* Join the terms, separating them with a comma. */
        echo join( ', ', $out );
      }

      /* If no terms were found, output a default message. */
      else {
        echo '&macr;';
      }

    break;

    case "job_order":
      echo $post->menu_order;
    break;

    /* Just break out of the switch statement for everything else. */
    default :
      break;
    break;

  }
}

/* ---------------------------------------------------------------------------
 * Custom columns - Testimonial
 * --------------------------------------------------------------------------- */
add_filter("manage_edit-testimonial_columns", "havnor_testimonial_edit_columns");
function havnor_testimonial_edit_columns($columns) {
  $new_columns['cb'] = '<input type="checkbox" />';
  $new_columns['title'] = __('Title', 'havnor-core' );
  $new_columns['thumbnail'] = __('Image', 'havnor-core' );
  $new_columns['id'] = __('Testimonial ID', 'havnor-core' );
  $new_columns['name'] = __('Client Name', 'havnor-core' );
  $new_columns['testimonial_order'] = __('Order', 'havnor-core' );
  $new_columns['date'] = __('Date', 'havnor-core' );

  return $new_columns;
}

add_action('manage_testimonial_posts_custom_column', 'havnor_manage_testimonial_columns', 10, 2);
function havnor_manage_testimonial_columns( $column_name ) {
  global $post;

  switch ($column_name) {

    /* If displaying the 'Image' column. */
    case 'thumbnail':
      echo get_the_post_thumbnail( $post->ID, array( 100, 100) );
    break;

    /* If displaying the 'ID' column. */
    case 'id':
      echo '<input type="text" onfocus="this.select();" readonly="readonly" value="'. esc_attr( $post->ID ) .'">';
    break;

    case "name":
    	$testimonial_options = get_post_meta( get_the_ID(), 'testimonial_options', true );
      echo $testimonial_options['testi_name'];
    break;

    case "testimonial_order":
      echo $post->menu_order;
    break;

    /* Just break out of the switch statement for everything else. */
    default :
      break;
    break;

  }
}

/* ---------------------------------------------------------------------------
 * Custom columns - Team
 * --------------------------------------------------------------------------- */
add_filter("manage_edit-team_columns", "havnor_team_edit_columns");
function havnor_team_edit_columns($columns) {
  $new_columns['cb'] = '<input type="checkbox" />';
  $new_columns['title'] = __('Title', 'havnor-core' );
  $new_columns['thumbnail'] = __('Image', 'havnor-core' );
  $new_columns['id'] = __('Member ID', 'havnor-core' );
  $new_columns['name'] = __('Job Position', 'havnor-core' );
  $new_columns['team_order'] = __('Order', 'havnor-core' );
  $new_columns['date'] = __('Date', 'havnor-core' );

  return $new_columns;
}

add_action('manage_team_posts_custom_column', 'havnor_manage_team_columns', 10, 2);
function havnor_manage_team_columns( $column_name ) {
  global $post;

  switch ($column_name) {

    /* If displaying the 'Image' column. */
    case 'thumbnail':
      echo get_the_post_thumbnail( $post->ID, array( 100, 100) );
    break;

    /* If displaying the 'ID' column. */
    case 'id':
      echo '<input type="text" onfocus="this.select();" readonly="readonly" value="'. esc_attr( $post->ID ) .'">';
    break;

    case "name":
    	$team_options = get_post_meta( get_the_ID(), 'team_options', true );
      echo $team_options['team_job_position'];
    break;

    case "team_order":
      echo $post->menu_order;
    break;

    /* Just break out of the switch statement for everything else. */
    default :
      break;
    break;

  }
}
