<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * CPT_ALM_Admin_Editor class.
 */

class CPT_ALM_Admin_Editor
{
    /**
     * Holds the values to be used in the fields callbacks
     */


    /**
     * Start up
     */
    public function __construct()
    {
        add_action('init',array( $this,'editor_init'));
        //add_action('wp_ajax_cpt_alm_popup', array( $this, 'alm_ajax_tinymce') );
        add_action(
            'media_buttons',
            array( __CLASS__, 'classic_editor_button' ),
            1000
        );
        add_action( 'admin_footer', array( $this, 'dialog_form' ) );
        add_action( 'admin_enqueue_scripts',   array( $this,   'admin_scripts' ) );

        add_action('admin_enqueue_scripts', array( $this, 'include_media_button_js_file') );
    }

    public function include_media_button_js_file() {

        wp_enqueue_script('cptalm_shortcode', CPT_ALM_ADMIN_URL.'js/shortcode-generator.js', array('jquery', 'wp-color-picker'), '1.0', true);
        wp_enqueue_script('media_button', CPT_ALM_ADMIN_URL.'js/media_button.js', array('jquery'), '1.0', true);
    }

    public function admin_scripts(){
        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_script( 'jquery-ui-autocomplete' );
        wp_enqueue_style( 'jquery-ui-autocomplete' );
        wp_enqueue_script( 'jquery-ui-dialog' ); 
        wp_enqueue_style( 'wp-jquery-ui-dialog' );

        wp_enqueue_style('select2', CPT_ALM_ADMIN_URL.'/css/select2.min.css' );
        wp_enqueue_style('cpt-alm-admin', CPT_ALM_ADMIN_URL.'/css/admin.css' );
        wp_enqueue_script('select2', CPT_ALM_ADMIN_URL.'/js/select2.min.js', array('jquery') );
    }

    public static function classic_editor_button( $args = array() ) {

        $target = is_string( $args ) ? $args : 'content';

        $args = wp_parse_args(
            $args,
            array(
                'target'    => $target,
                'text'      => __( 'Add Shortcode', 'cpt-ajax-load-more' ),
                'class'     => 'button',
                'icon'      => false,
                'echo'      => true,
                'shortcode' => '',
            )
        );

        $onclick = sprintf(
            "CPT_ALM.App.insert( 'classic', { editorID: '%s', shortcode: '%s' } );",
            esc_attr( $args['target'] ),
            esc_attr( $args['shortcode'] )
        );

        $button = sprintf(
            '<button
                type="button"
                id="insert-cpt-alm-button"
                class="su-generator-button %1$s"
                title="%2$s"
                onclick="%3$s"
            >
                %4$s %5$s
            </button>',
            esc_attr( $args['class'] ),
            esc_attr( $args['text'] ),
            '',
            $args['icon'],
            esc_html( $args['text'] )
        );

        if ( $args['echo'] ) {
            echo $button;
        }

        return $button;

    }

    public function dialog_form(){
        ?>
        <div id="dialogForm" style="display: none;">
            <?php
            $screen = dirname(__FILE__) . '/views/shortcode-builder.php';
            include_once( $screen );
            ?>
        </div>
        <?php
    }
    // Enqueue jQuery in editor
    public function editor_init() {
        wp_enqueue_script( 'jquery' );
    }

    // add the button to the tinyMCE bar
    public function alm_tinymce_plugin($plugin_array) {
        $plugin_array['cptalm_shortcode_button'] = plugins_url( 'editor/shortcode.js' , __FILE__ );
        return $plugin_array;
    }

}

new CPT_ALM_Admin_Editor();