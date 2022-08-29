<?php

defined( 'ABSPATH' ) || exit;

/**
 * CPT ALM Shortcodes Class.
 */
class CPT_ALM_Shortcodes {

	public static $attributes;

	/**
	 * Init shortcodes.
	 */
	public static function init() {
		add_shortcode( 'cpt_ajax_load_more', __CLASS__ .  '::generate_shortcode' );

	}

	/**
	 * Show messages.
	 *
	 * @return string
	 */
	public static function generate_shortcode($params = array()) {

		$atts = shortcode_atts( apply_filters('cpt_alm_shortcode_defaults',array(
			'id' => 'cptalm_'.uniqid(),
			'post_type' => 'post',
			'post_status' => 'publish',
			'posts_per_page' => '3',
			'init_load' => 6,
			'category' => '',
   			'category__and' => '',
   			'category__not_in' => '',
   			'tag' => '',
   			'tag__and' => '',
   			'tag__not_in' => '',
   			'taxonomy' => '',
   			'taxonomy_terms' => '',
   			'taxonomy_operator' => '',
   			'taxonomy_relation' => '',
			'order' => 'DESC',
			'orderby' => 'date',
			'category' => '',
			'offset' => 0,
			'template' => 'default',
			'default_css' => 'yes',
			'scroll' => false,
			'grid' => '1',
			'item_class' => '',
			'container_class' => '',
			'button_text' =>  __('Load More','cpt-ajax-load-more'),
			'button_color' => '#6bd298',
			'loading_style' => 'normal',
			'loading_text' => 'Loading...',
		)), $params, 'cpt_ajax_load_more' );


		self::$attributes = $atts;

		$html = self::fire_shorcode();
	
		return $html;
	}

	public static function fire_shorcode(){

		$post_type = !empty(self::$attributes['post_type']) ? self::$attributes['post_type'] : 'post';
		$post_status = !empty(self::$attributes['post_status']) ? self::$attributes['post_status'] : 'publish';

		// Check security first
		$check = CPT_ALM_Security::is_permission($post_type,$post_status);
		if(!$check){
			return apply_filters('cpt_alm_security_wall_message','Not permision to allow this post');
		}
		
		$default_css = self::$attributes['default_css'];

		if($default_css != 'no'){
			wp_enqueue_style( 'cpt-alm-app', untrailingslashit( plugins_url( '/', CPT_ALM_PLUGIN_FILE ) ) . '/assets/css/style.css', false );
		}

		self::add_inline_style();		

		self::$attributes['id'] = (!empty(self::$attributes['id'])) ? self::$attributes['id'] : 'cptalm_'.uniqid();

		$args = CPT_ALM_Query_Args::cpt_alm_build_queryargs(self::$attributes, true);

		$init_load = (!empty(self::$attributes['init_load'])) ? self::$attributes['init_load'] : 5;
		$args['posts_per_page'] = $init_load;
	
		if(!empty(self::$attributes['id']))
			$args = apply_filters('cpt_alm_query_args', $args, self::$attributes['id']);

		$template = (!empty(self::$attributes['template'])) ? sanitize_file_name(self::$attributes['template']) : 'default';

		$containerClass = (!empty(self::$attributes['container_class'])) ? sanitize_html_class(self::$attributes['container_class']) : '';

		$grid = (!empty(self::$attributes['grid'])) ? self::$attributes['grid'] : 1;
   		$gridClass = 'cpt-alm-grid-'.$grid;	
   		$itemClass = !empty(self::$attributes['item_class']) ? sanitize_html_class(self::$attributes['item_class']) : '';
		$itemClass = 'cpt-alm-item cpt-alm-col-'.(12 / $grid).' '.$itemClass;

		if (locate_template('cpt-alm/loop/' . $template . '.php')) {
			$path = locate_template('cpt-alm/loop/' . $template . '.php');
		}else if (file_exists(CPT_ALM_ABSPATH.'templates/loop/'.$template.'.php')) {
			$path = CPT_ALM_ABSPATH.'templates/loop/'.$template.'.php';
		}else{
			$path = CPT_ALM_ABSPATH.'templates/loop/default.php';
		}

		
		$the_query = new WP_Query( $args );
		
		self::$attributes['offset'] = (int) $the_query->post_count;
		self::$attributes['found_posts'] = (int)$the_query->found_posts;

		$cpt_alm_id = !empty(self::$attributes['id']) ? self::$attributes['id'] : 'cptalm_'.uniqid();
		$data_atts = self::get_data_attributes();

		$html = '';

		if ( $the_query->have_posts() ) {

			$html .= '<div class="cpt-alm-main" id="'.$cpt_alm_id.'">';

			$html .= apply_filters('cpt_alm_before_container', '');
			$html .= '<div class="cpt-alm-wrapper '.$containerClass.' '.$gridClass.'" '.$data_atts.'>';
			$cpt_alm_curr_item = 1;
			$cpt_alm_curr_page = 1;
			$cpt_alm_found_posts = $the_query->found_posts;

		    while ( $the_query->have_posts() ) {
		    	$the_query->the_post();
		    	ob_start();
		    	echo '<div class="'.$itemClass.'">';
		    	include($path);
		    	echo '</div>';
		    	$html .= ob_get_clean();
		    	$cpt_alm_curr_item++;
			}

			$html .= apply_filters('cpt_alm_after_container', '');
			$html .= '</div>';

         	$html .= apply_filters('cpt_alm_before_btn', '');
         	if($the_query->found_posts > $init_load)
				$html .= self::load_more_button();
			
			$html .= apply_filters('cpt_alm_after_btn', '');
			$html .= '</div>';

		}else{
			$html .= apply_filters('cpt_alm_post_not_found', 'Post not found');
		}

		wp_reset_query();	
		return $html;
	}

	public static function load_more_button(){

		$loader = self::loader_style();
		return '
			<div class="cpt-alm-read-more">
				'.$loader.'
				<a href="javascript:void(0)" class="cpt-alm-btn-load-more">
				'.self::$attributes['button_text'].'
				</a>
			</div>';

	}

	public static function loader_style(){

		$style = (!empty(self::$attributes['loading_style'])) ? self::$attributes['loading_style'] : 'normal';

		if($style == 'normal'){
			$loader = '<div class="cpt-alm-loader cpt-custom-loader"><div class="cpt-loading-icon loading-normal-inner">
				<div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div>';
		}else if ($style == 'loader-1') {
			$loader = '<div class="cpt-alm-loader cpt-custom-loader"><div class="cpt-loading-icon cpt-loader-2">
				<div><div></div><div></div><div></div></div>
				</div></div>';
		}else if ($style == 'loader-2') {
			$loader = '<div class="cpt-alm-loader cpt-custom-loader"><div class="cpt-loading-icon cpt-loader-3">
				<div style="left:19px;top:19px;animation-delay:0s"></div><div style="left:40px;top:19px;animation-delay:0.125s"></div><div style="left:61px;top:19px;animation-delay:0.25s"></div><div style="left:19px;top:40px;animation-delay:0.875s"></div><div style="left:61px;top:40px;animation-delay:0.375s"></div><div style="left:19px;top:61px;animation-delay:0.75s"></div><div style="left:40px;top:61px;animation-delay:0.625s"></div><div style="left:61px;top:61px;animation-delay:0.5s"></div></div>
				</div>';
		}else if ($style == 'loader-3') {
			$loader = '<div class="cpt-alm-loader cpt-custom-loader"><div class="cpt-loading-icon cpt-loader-4">
				<div><div></div><div></div><div></div><div></div><div></div><div></div></div>
				</div></div>';
		}

		return $loader;
	}

	public static function add_inline_style(){

		// Fix out Gutenberg page update in the admin side.
		if (strpos($_SERVER[ 'REQUEST_URI' ], '/wp-json/') !== false) {
		    return '';
		}

		$btncolor = self::$attributes['button_color'];
		$custom_css = '.cpt-btn, .cpt-alm-btn-load-more, .loading-normal-inner div, .cpt-loader-3 div, .cpt-loader-4 > div div, .cpt-post-module .cpt-thumbnail .cpt-date, .cpt-post-module .cpt-category, .cpt-list-box .cpt-list-details {
	    background: '.$btncolor.';
		}
		.cpt-loader-2{border-color: transparent transparent transparent '.$btncolor.';}
		.cpt-loader-2 > div div:nth-child(1), .cpt-loader-2 > div div:nth-child(2){border-color: transparent '.$btncolor.' '.$btncolor.' '.$btncolor.';}';
		echo '<style type="text/css">'.$custom_css.'</style>';
	}

	public static function get_data_attributes(){

		$data_atts = self::$attributes;
		$html_attr = '';
		foreach ($data_atts as $key => $attr) {
			$html_attr .= 'data-'.str_replace('_','-',$key).'="'.$attr.'"';
		}
		return $html_attr;
	}
}