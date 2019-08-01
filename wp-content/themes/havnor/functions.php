<?php
/*
 * Havnor Theme's Functions
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

/**
 * Define - Folder Paths
 */
define( 'HAVNOR_THEMEROOT_PATH', get_template_directory() );
define( 'HAVNOR_THEMEROOT_URI', get_template_directory_uri() );
define( 'HAVNOR_CSS', HAVNOR_THEMEROOT_URI . '/assets/css' );
define( 'HAVNOR_IMAGES', HAVNOR_THEMEROOT_URI . '/assets/images' );
define( 'HAVNOR_SCRIPTS', HAVNOR_THEMEROOT_URI . '/assets/js' );
define( 'HAVNOR_FRAMEWORK', get_template_directory() . '/inc' );
define( 'HAVNOR_LAYOUT', get_template_directory() . '/layouts' );
define( 'HAVNOR_CS_IMAGES', HAVNOR_THEMEROOT_URI . '/inc/theme-options/theme-extend/images' );
define( 'HAVNOR_CS_FRAMEWORK', get_template_directory() . '/inc/theme-options/theme-extend' ); // Called in Icons field *.json
define( 'HAVNOR_ADMIN_PATH', get_template_directory() . '/inc/theme-options/cs-framework' ); // Called in Icons field *.json

/**
 * Define - Global Theme Info's
 */
if (is_child_theme()) { // If Child Theme Active
	$havnor_theme_child = wp_get_theme();
	$havnor_get_parent = $havnor_theme_child->Template;
	$havnor_theme = wp_get_theme($havnor_get_parent);
} else { // Parent Theme Active
	$havnor_theme = wp_get_theme();
}
define('HAVNOR_NAME', $havnor_theme->get( 'Name' ));
define('HAVNOR_VERSION', $havnor_theme->get( 'Version' ));
define('HAVNOR_BRAND_URL', $havnor_theme->get( 'AuthorURI' ));
define('HAVNOR_BRAND_NAME', $havnor_theme->get( 'Author' ));

/**
 * All Main Files Include
 */
require_once( HAVNOR_FRAMEWORK . '/init.php' );
