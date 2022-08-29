<?php

/**
 * Plugin Name: CPT Ajax Load More
 * Plugin URI: https://plugins.blacktheme.net/ajax-load-more
 * Description: The simple way to load custom post type with infinite scroll or  load more button.
 * Version: 1.6.0
 * Author: Tushar Gohel
 * Author URI: https://plugins.blacktheme.net
 * Text Domain: cpt-ajax-load-more
 * 
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Define WC_PLUGIN_FILE.
if ( ! defined( 'CPT_ALM_PLUGIN_FILE' ) ) {
	define( 'CPT_ALM_PLUGIN_FILE', __FILE__ );
}

// Include the main CPT_ALM class.
if ( ! class_exists( 'CPT_ALM' ) ) {
	include_once dirname( __FILE__ ) . '/includes/class-cpt-alm.php';
}


/**
 *
 * Main instance of CPT Ajax Load More
 *
 */
function cpt_alm() { return CPT_ALM::instance(); }

$GLOBALS['cpt_alm'] = cpt_alm();
