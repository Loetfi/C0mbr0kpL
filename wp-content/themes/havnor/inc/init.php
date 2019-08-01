<?php
/*
 * All Havnor Theme Related Functions Files are Linked here
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

/* Theme All Basic Setup */
require_once( HAVNOR_FRAMEWORK . '/theme-support.php' );
require_once( HAVNOR_FRAMEWORK . '/backend-functions.php' );
require_once( HAVNOR_FRAMEWORK . '/frontend-functions.php' );
require_once( HAVNOR_FRAMEWORK . '/enqueue-files.php' );
require_once( HAVNOR_CS_FRAMEWORK . '/config.php' );

/* WooCommerce Integration */
if (class_exists( 'WooCommerce' )){
	require_once( HAVNOR_FRAMEWORK . '/plugins/woocommerce/woo-config.php' );
}

/* Bootstrap Menu Walker */
require_once( HAVNOR_FRAMEWORK . '/core/vt-mmenu/wp_bootstrap_navwalker.php' );

/* Install Plugins */
require_once( HAVNOR_FRAMEWORK . '/plugins/notify/activation.php' );

/* Breadcrumbs */
require_once( HAVNOR_FRAMEWORK . '/plugins/breadcrumb-trail.php' );

/* Sidebars */
require_once( HAVNOR_FRAMEWORK . '/core/sidebars.php' );
