<?php

// Main wp_ajax action of the AJAX LOAD MORE
add_action('wp_ajax_cpt_alm_loadmore', 'cpt_alm_loadmore_ajax_handler'); 
add_action('wp_ajax_nopriv_cpt_alm_loadmore', 'cpt_alm_loadmore_ajax_handler');

function cpt_alm_loadmore_ajax_handler()
{

	$post_type = isset($_GET['post_type']) ? sanitize_text_field($_GET['post_type']) : 'post';
	$post_status = isset($_GET['post_status']) ? sanitize_text_field($_GET['post_status']) : 'publish';
	
	// Check security first
	$check = CPT_ALM_Security::is_permission($post_type,$post_status);

	if(!$check){
		return apply_filters('cpt_alm_security_message','Not permision to allow this post');
	}

	$settings = get_option('cpt_alm_option');

	if(empty($settings['disable_nonce_security'])){
		$nonce = sanitize_text_field($_GET['cpt_alm_nonce']);
    	if ( ! wp_verify_nonce( $nonce, 'cpt-alm-nonce' ) )
        	die ( 'Invalid Token');
	}
	$response = array();
	$args = CPT_ALM_Query_Args::cpt_alm_build_queryargs($_GET, true);

	$unique_id = isset($_GET['id']) ? $_GET['id'] : 'cptalm_'.uniqid();
	if(!empty($unique_id))
		$query_args = apply_filters('cpt_alm_query_args', $args, $unique_id);


	$template = isset($_GET['template']) ? sanitize_file_name($_GET['template']) : 'default';
	if (locate_template('cpt-alm/loop/' . $template . '.php')) {
		$path = locate_template('cpt-alm/loop/' . $template . '.php');			
	}else if(file_exists(CPT_ALM_ABSPATH.'templates/loop/'.$template.'.php')){
		$path = CPT_ALM_ABSPATH.'templates/loop/'.$template.'.php';
	}else{
		$path = CPT_ALM_ABSPATH.'templates/loop/default.php';
	}

	$itemClass = isset($_GET['itemClass']) ? sanitize_html_class($_GET['item_Class']) : 'cpt-alm-item';
	
	$itemClass .= !empty($_GET['grid']) ? ' cpt-alm-col-'.(12 / intval($_GET['grid'])) : ' cpt-alm-col-1';

	$offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0;
	$paged = isset($_GET['paged']) ? intval($_GET['paged']) : 1;

	$the_query = new WP_Query( $query_args );

	ob_start();
	if ( $the_query->have_posts() ) {

		$cpt_alm_curr_item = $offset + 1;
		$cpt_alm_found_posts = $the_query->found_posts;
		$cpt_alm_curr_page = $paged;

		while ( $the_query->have_posts() ) {
		    $the_query->the_post();
		   
		    echo '<div class="'.$itemClass.'">';
		    include($path);
		    echo '</div>';
		    $cpt_alm_curr_item++;
		}
	}
	wp_reset_query();
	$html = ob_get_clean();

	if(!empty($html)){
		$response['html'] = $html;
		$response['status'] = 'ok';
	}else{
		$response['html'] = $html;
		$response['status'] = 'error';
	}
	
	echo json_encode($response);
	exit;
}

// String execept with ending dots.
function cpt_alm_short_text($text, $start, $end){

	$contentlen = strlen($text);
	$dot = '';
	if($contentlen > $end){
		$dot = '...';
	}
	return substr($text,$start,$end).$dot;
}

add_image_size( 'cpt-alm-listing', 600, 400, true );
add_image_size( 'cpt-alm-listing-square', 600, 600, true );


function cpt_alm_assets(){
	return untrailingslashit( plugins_url( '/', CPT_ALM_PLUGIN_FILE ) ).'/assets/';
}

// Render CPT Ajax Load more using php function.
function cpt_alm_render($atts){
	return CPT_ALM_Shortcodes::generate_shortcode($atts);
}