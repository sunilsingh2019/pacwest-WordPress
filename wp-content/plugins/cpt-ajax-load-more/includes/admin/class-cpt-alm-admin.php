<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * CPT_ALM_Admin class.
 */
class CPT_ALM_Admin {

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'includes' ) );
	}

	/**
	 * Include any classes we need within admin.
	 */
	public function includes() {
		include_once dirname( __FILE__ ) . '/class-cpt-alm-admin-settings.php';

		// Shortcode Button for editor
		include_once dirname( __FILE__ ) . '/class-cpt-alm-admin-editor.php';
	}

}

new CPT_ALM_Admin();