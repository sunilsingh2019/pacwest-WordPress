<?php

defined( 'ABSPATH' ) || exit;

final class CPT_ALM {

	/**
	 * The single instance of the class.
	 *
	 */
	protected static $_instance = null;

	/**
	 * Main CTP ALM Instance.
	 *
	 * Only one instance loaded.
	 *
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * CPT ALM Constructor.
	 */
	public function __construct() {

		$this->define_constants();
		$this->includes();
		$this->init_hooks();
	}


	/**
	 * Define WC Constants.
	 */
	private function define_constants() {

		$this->define( 'CPT_ALM_ABSPATH', dirname( CPT_ALM_PLUGIN_FILE ) . '/' );
   		$this->define('CPT_ALM_ADMIN_URL', plugins_url('admin/', __FILE__));

		$this->define( 'CPT_ALM_PLUGIN_BASENAME', plugin_basename( CPT_ALM_PLUGIN_FILE ) );
	}

	/**
	 * Define constant if not already set.
	 *
	 * @param string      $name  Constant name.
	 * @param string|bool $value Constant value.
	 */
	private function define( $name, $value ) {
		if ( ! defined( $name ) ) {
			define( $name, $value );
		}
	}

	/**
	 * Include required core files used in admin and on the frontend.
	 */
	public function includes() {

		include_once CPT_ALM_ABSPATH . 'includes/class-cpt-alm-security.php';
		include_once CPT_ALM_ABSPATH . 'includes/class-cpt-alm-shortcodes.php';
		include_once CPT_ALM_ABSPATH . 'includes/class-cpt-alm-query-args.php';

		// Includes file if only admin
		if(is_admin()){
			include_once CPT_ALM_ABSPATH . 'includes/admin/class-cpt-alm-admin.php';
		}
	}

	/**
	 * Hook into actions and filters.
	 *
	 * @since 2.3
	 */
	private function init_hooks() {
		//add_action( 'init', array( $this, 'init' ), 0 );
		add_action( 'init', array( 'CPT_ALM_Shortcodes', 'init' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'load_script' ) );
		add_action( 'after_setup_theme', array( $this, 'include_template_functions' ), 11 );
		add_action( 'wp_enqueue_scripts', array( $this, 'load_style' ) );
	}

	public function load_style(){
		//wp_enqueue_style( 'cpt-alm-app', $this->plugin_url() . '/assets/css/style.css', false );
	}

	public function load_script(){

		//wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'cpt-alm-script', $this->plugin_url() . '/assets/js/app.js',  array('jquery'), '1.0.0', true );

		wp_localize_script( 'cpt-alm-script', 'cpt_ala_params', array(
				'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
				'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
				'nonce' => wp_create_nonce('cpt-alm-nonce')
			) 
		);
	}

	/**
	 * Loads plugin's core helper template functions.
	 */
	public function include_template_functions() {
		include_once( CPT_ALM_ABSPATH . 'includes/functions-cpt-alm.php' );
	}

	/**
	 * Get the plugin url.
	 *
	 * @return string
	 */
	public function plugin_url() {
		return untrailingslashit( plugins_url( '/', CPT_ALM_PLUGIN_FILE ) );
	}
}