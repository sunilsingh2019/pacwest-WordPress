<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * CPT_ALM_Admin_Settings class.
 */

class CPT_ALM_Admin_Settings
{
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Start up
     */
    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );

        // Add settings link in the plugin page
        add_filter( "plugin_action_links_".CPT_ALM_PLUGIN_BASENAME, array( $this, 'plugin_add_settings_link' ));
    }

    /**
     * Add options page
     */
    public function add_plugin_page()
    {
        // This page will be under "Settings"
        add_options_page(
            'Settings Admin', 
            'CPT Ajax Load more', 
            'manage_options', 
            'cpt-alm-setting-admin', 
            array( $this, 'create_admin_page' )
        );
    }

    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        // Set class property
        $this->options = get_option( 'cpt_alm_option' );
        ?>
        <div class="wrap">
            <h1>CPT Ajax Load more</h1>
            <form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
                settings_fields( 'cpt_alm_option_group' );
                do_settings_sections( 'cpt-alm-setting-admin' );
                submit_button();
            ?>
            </form>
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function page_init()
    {
        register_setting(
            'cpt_alm_option_group', // Option group
            'cpt_alm_option', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_section(
            'setting_section_id',
            'General Settings', 
            array( $this, 'print_section_info' ), 
            'cpt-alm-setting-admin' 
        );  

        add_settings_field(
            'wrapper_class',
            'Wrapper Class',
            array( $this, 'wrapper_class_callback' ), 
            'cpt-alm-setting-admin', 
            'setting_section_id'          
        );

        add_settings_section(
            'setting_section_id_2', 
            'Security Settings', 
            array( $this, 'print_section_security_info' ),
            'cpt-alm-setting-admin'
        );   

        add_settings_field(
            'token_feature', 
            'Disable nonce with ajax loading',
            array( $this, 'token_feature_callback' ), 
            'cpt-alm-setting-admin', 
            'setting_section_id_2'
        );

        add_settings_field(
            'allow_post_type', 
            'Enable for these post type', 
            array( $this, 'allow_posts_callback' ), 
            'cpt-alm-setting-admin', 
            'setting_section_id_2'
        );    

        add_settings_field(
            'allow_post_status', 
            'Post Status',
            array( $this, 'post_status_callback' ), 
            'cpt-alm-setting-admin', 
            'setting_section_id_2'
        );
        
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input )
    {
    
        if( isset( $input['wrapper_class'] ) )
            $new_input['wrapper_class'] = sanitize_text_field( $input['wrapper_class'] );

        if( isset( $input['allow_post_type'] ) )
            $new_input['allow_post_type'] = $input['allow_post_type'];

        if( isset( $input['allow_post_status'] ) )
            $new_input['allow_post_status'] = sanitize_text_field($input['allow_post_status']);
        if( isset( $input['disable_nonce_security'] ) )
            $new_input['disable_nonce_security'] = sanitize_text_field($input['disable_nonce_security']);

        return $new_input;
    }

    /** 
     * Print the Section text
     */
    public function print_section_info()
    {
        print 'Enter your settings below:';
    }

    /** 
     * Print the Section text
     */
    public function print_section_security_info()
    {
        print 'Security related settings';
    }

    public function wrapper_class_callback()
    {
        printf(
            '<input type="text" class="regular-text" id="wrapper_class" placeholder="theme-custom etc.." name="cpt_alm_option[wrapper_class]" value="%s" />',
            isset( $this->options['wrapper_class'] ) ? esc_attr( $this->options['wrapper_class']) : ''
        );
        echo '<p class="description" id="tagline-description">You can specify main wrapper class</p>';
    }

    public function post_status_callback()
    {
        printf(
            '<input type="text" class="regular-text" placeholder="publish" id="title" name="cpt_alm_option[allow_post_status]" value="%s" />',
            isset( $this->options['allow_post_status'] ) ? esc_attr( $this->options['allow_post_status']) : ''
        );
    }

    public function token_feature_callback(){

        if ( isset($this->options['disable_nonce_security'] ) )
            $checked = 'checked="checked"';
        else 
            $checked='';

        printf(
            '<input type="checkbox" class="regular-text" placeholder="publish" id="disable_nonce_security" name="cpt_alm_option[disable_nonce_security]" value="1" '
            .$checked.' />'
        );
        echo '<p class="disable_nonce_security" id="tagline-disable_nonce_security"></p>';

    }
    public function allow_posts_callback(){

    	$args       = array(
		    'public' => true,
		);
    	$post_types = get_post_types( $args, 'objects' );
    	$options = (!empty($this->options['allow_post_type'])) ? $this->options['allow_post_type'] : array();
    	foreach ($post_types as $post_type) {

    		$checked = (in_array($post_type->name,$options)) ? 'checked="checked"' : '';
    		?>
    		<label>
    		<input type="checkbox" name="cpt_alm_option[allow_post_type][]" value="<?php echo $post_type->name ?>" <?php echo $checked ?>>
    		<?php echo $post_type->label; ?>
    		</label>
    		<?php
    	}

    	echo '<p class="description" id="tagline-description"></p>';
    }

    public function plugin_add_settings_link( $links ){

        $settings_link = '<a href="options-general.php?page=cpt-alm-setting-admin">' . __( 'Settings' ) . '</a>';
        array_unshift( $links, $settings_link );
        return $links;
    }
}

new CPT_ALM_Admin_Settings();