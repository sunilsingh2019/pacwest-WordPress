<?php
add_action('after_setup_theme', 'uncode_language_setup');
function uncode_language_setup()
{
	load_child_theme_textdomain('uncode', get_stylesheet_directory() . '/languages');
}

function theme_enqueue_styles()
{
	$production_mode = ot_get_option('_uncode_production');
	$resources_version = ($production_mode === 'on') ? null : rand();
	if ( function_exists('get_rocket_option') && ( get_rocket_option( 'remove_query_strings' ) || get_rocket_option( 'minify_css' ) || get_rocket_option( 'minify_js' ) ) ) {
		$resources_version = null;
	}
	$parent_style = 'uncode-style';
	$child_style = array('uncode-style');
	wp_enqueue_style($parent_style, get_template_directory_uri() . '/library/css/style.css', array(), $resources_version);
	wp_enqueue_script('fontawesome', '//kit.fontawesome.com/4659e77d7b.js');
	wp_enqueue_style('slick-css', get_theme_file_uri('/slick-1.8.1/slick/slick.css'));
	wp_enqueue_style('slick-theme-css', get_theme_file_uri('/slick-1.8.1/slick/slick-theme.css'));
	wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', $child_style, $resources_version);
	
	wp_enqueue_script('jquery', "//code.jquery.com/jquery-1.11.0.min.js");
	wp_enqueue_script('jquery-migrate', "//code.jquery.com/jquery-migrate-1.2.1.min.js");
    wp_enqueue_script('slick-js', get_theme_file_uri('/slick-1.8.1/slick/slick.min.js'), array('jquery'), '1.8.1', true);
    wp_enqueue_script('isotope', "//unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js");

    wp_enqueue_script('main-js', get_theme_file_uri('/js/main.js'), array('jquery'), '1.0', true);

    wp_localize_script('main-js', 'siteData', array(
        'root_url' => get_site_url(),
        'theme_uri' => get_theme_file_uri(),
        'nonce' => wp_create_nonce('wp_rest')
    ));
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles', 100);

function pine_add_page_slug_body_class( $classes ) {
    global $post;
    
    if ( isset( $post ) ) {
        $classes[] = 'page-' . $post->post_name;
    }
    return $classes;
}

add_filter( 'body_class', 'pine_add_page_slug_body_class' );


if (!function_exists('additional_font_styles')) {
    function additional_font_styles () {
        wp_enqueue_style('Authenia', 'https://redpin.com.au/pacwestdemo/wp-content/themes/uncode-child/sass/fonts/authenia');
    }
    add_action('wp_enqueue_scripts', 'additional_font_styles');
}

function waterfall_tiles($args = NULL){
	if(!$args){
		$args = array(
			'post_type' => 'recipe',
			'posts_per_page' => 12
		);
	}

	$count = 0;

	$posts = new WP_Query($args);

	if($posts->have_posts()):
	?>

	<div class="<?php echo $args['post_type']; ?> waterfall">
		
		<div class="waterfall-content"></div>
		
		<a class="button btn-blue-white" href="<?php echo get_post_type_archive_link(post_type) ?>">VIEW MORE</a>	

	</div>

	<?php endif;
}

function no_filter_waterfall_tiles($args = NULL){
    if(!$args){
		$args = array(
			'post_type' => 'recipe',
			'posts_per_page' => -1
		);
	}
	
	$posts = new WP_Query($args);
	
	echo '<div class="no_filter_waterfall waterfall">';
	
	$gallery_arr = array();
    
    while ($posts->have_posts()): $posts->the_post();
        array_push($gallery_arr, get_the_ID());
    endwhile;
            
            
    foreach($gallery_arr as $index => $gallery):
        // setup_postdata( $post ); 
        $cats = get_the_terms( $gallery, 'category' );
        //get Food service or At home category
        $cat_arr = array_filter($cats, function($arr){
            return $arr->parent == 0;
        });
        
        $brand = array_values($cat_arr)[0];
        // print_r($brand); 
        $post_type = get_post_type($gallery);
        $cat_names = array();
        // print_r($cats);
        $blog_type = get_the_terms($gallery, 'blog_type')[0]->slug;
    
        foreach($cats as $cat){
            array_push($cat_names, strtolower($cat->name));
        }
        
        array_push($cat_names, $post_type);
        
        array_push($cat_names, $blog_type);
        
        $cat_classes = implode(' ', $cat_names);
	            
        echo $index % 2 == 0 ?  '<div class="group">' : '';
?>
    
    <div class="item <?php echo $cat_classes;?>"> 
   
        <a href="<?php echo get_the_permalink($gallery);?>">
		    <img src="<?php echo get_the_post_thumbnail_url($gallery,'full');?>">
		    <div class="general_info">
				<div class="post_type body-s"><?php echo $post_type;?></div>
				<div class="category body-s"><?php echo $brand->name;?></div>
			</div>

			<div class="wrapper">

				<h3 class="title-s"><?php echo get_the_title($gallery);;?></h3>

				<div class="post_info container">
					<div class="row">
						<div class="col-6">Sustainability:</div>
						<div class="col-6"><?php echo get_field('$recipe_sustainability', $gallery);?></div>
					</div>
					<div class="row">
						<div class="col-6">Species of protein:</div>
						<div class="col-6"><?php echo get_field('recipe_species_of_protein', $gallery);?></div>
					</div>
					<div class="row">
						<div class="col-6">Country of origin:</div>
						<div class="col-6"><?php echo get_field('recipe_country_of_origin', $gallery);?></div>
					</div>
					<div class="row">
						<div class="col-6">Resale amount:</div>
						<div class="col-6"><?php echo get_field('recipe_resale_amount', $gallery);?></div>
					</div>
				</div>
			</div>		
	    </a>
		
    </div>
<?php 
    
    echo $index % 2 == 1 ?  '</div>' : '';
         
    endforeach;
        
?>
    </div>
</div>

<?php 
}
	


	// if(isset($_POST['width'])) {
	//     $_SESSION['screen_width'] = $_POST['width'];
	//     echo json_encode(array('outcome'=>'success'));
	//     echo 'Screen width:' . $_SESSION['screen_width'];
	// } else {
	//     echo json_encode(array('outcome'=>'error','error'=>"Couldn't save dimension info"));
	// }




// session_start();
// if(isset($_SESSION['screen_width']) AND isset($_SESSION['screen_height'])){
//     echo 'User resolution: ' . $_SESSION['screen_width'] . 'x' . $_SESSION['screen_height'];
// } else if(isset($_REQUEST['width']) AND isset($_REQUEST['height'])) {
//     $_SESSION['screen_width'] = $_REQUEST['width'];
//     $_SESSION['screen_height'] = $_REQUEST['height'];
//     header('Location: ' . $_SERVER['PHP_SELF']);
// } else {
//     echo '<script type="text/javascript">window.location = "' . $_SERVER['PHP_SELF'] . '?width="+screen.width+"&height="+screen.height;</script>';
// }

function pacwest_custom_rest(){
	register_rest_field('recipe', 'postInfo', array(
		'get_callback' => function($object){
			$media = wp_get_attachment_image_src(get_post_thumbnail_id($object->id),'large');
		
			// return $media[0];
			return array(
				'featuredImage'=> $media,
				'brand' => get_the_category(get_the_ID()),
				'recipe_sustainability' => get_field('recipe_sustainability', get_the_ID())
			);
		}
	));
	
	register_rest_field('blog', 'postInfo', array(
		'get_callback' => function($object){
			$media = wp_get_attachment_image_src(get_post_thumbnail_id($object->id),'large');
		
			// return $media[0];
			return array(
				'featuredImage'=> $media,
				'brand' => get_the_category(get_the_ID())
			);
		}
	));


	register_rest_field('recipe', 'postInfo', array(
		'get_callback' => function($object){
			$item = new WP_Query(array(
				'post_type' => 'recipe',
				'posts_per_page' => -1
				// 'tax_query' => array(
	   //          	array(
	   //          		'taxonomy' => 'brand',
	   //          		'terms' => $object['id']
	   //          	)
	   //          )
			));
			while(have_posts())
			$item->the_post();
			
			return array(
				'featuredImage'=> get_the_post_thumbnail_url(),
				'brand' => get_the_category(get_the_ID())[0],
				'recipe_sustainability' => get_field('recipe_sustainability')
				
			);
		}
	));
	
	register_rest_field('blog', 'postInfo', array(
		'get_callback' => function($object){
			$item = new WP_Query(array(
				'post_type' => 'blog',
				'posts_per_page' => -1
			));
			while(have_posts())
			$item->the_post();
			
			return array(
				'featuredImage'=> get_the_post_thumbnail_url(),
				'brand' => get_the_category(get_the_ID())[0]
				
			);
		}
	));
}

add_action('rest_api_init', 'pacwest_custom_rest');

