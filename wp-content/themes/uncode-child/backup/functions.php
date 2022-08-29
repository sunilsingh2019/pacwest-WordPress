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
	wp_enqueue_style('slick-css', get_theme_file_uri('/slick-1.8.1/slick/slick.css'));
	wp_enqueue_style('slick-theme-css', get_theme_file_uri('/slick-1.8.1/slick/slick-theme.css'));
	wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', $child_style, $resources_version);

	wp_enqueue_script('jquery', "//code.jquery.com/jquery-1.11.0.min.js");
	wp_enqueue_script('jquery-migrate', "//code.jquery.com/jquery-migrate-1.2.1.min.js");
    wp_enqueue_script('slick-js', get_theme_file_uri('/slick-1.8.1/slick/slick.min.js'), array('jquery'), '1.8.1', true);

    wp_enqueue_script('main-js', get_theme_file_uri('/js/main.js'), array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles', 100);

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

	<div class="waterfall container">
		
		<div class="items-wrapper">

		<?php while($posts->have_posts()) : $posts->the_post();?>	


			<div class="col-xl-3 col-md-3 col-lg-3 col-custom-5 col-custom-2">
				<div class="item" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)"> 

					<div class="general_info">
						<div class="post_type body-s"><?php echo get_post_type();?></div>
						<div class="category body-s"><?php echo get_the_category()[0]->name;?></div>
					</div>

					<div class="wrapper">

						<h3 class="title-s"><?php echo get_the_title();?></h3>

						<div class="post_info container">
							<div class="row">
								<div class="col-6">Sustainability:</div>
								<div class="col-6"><?php echo get_field('recipe_sustainability');?></div>
							</div>
							<div class="row">
								<div class="col-6">Species of protein:</div>
								<div class="col-6"><?php echo get_field('recipe_species_of_protein');?></div>
							</div>
							<div class="row">
								<div class="col-6">Country of origin:</div>
								<div class="col-6"><?php echo get_field('recipe_country_of_origin');?></div>
							</div>
							<div class="row">
								<div class="col-6">Resale amount:</div>
								<div class="col-6"><?php echo get_field('recipe_resale_amount');?></div>
							</div>
						</div>
					</div>		
					
					 <?php $url = get_post_type_archive_link($args['post_type']);?>
					 
					 <!--<?php echo $count == 4 ? '<a href="'. $url .'" class="button btn-blue-white">VIEW MORE</a>' : ''; ?>	-->
					 
				</div>	
						
			</div>
			<?php $count++; ?>
		<?php endwhile;?>	

		</div>
		
		<a class="button btn-blue-white" href="<?php $url ?>">VIEW MORE</a>	

	</div>

	<?php endif;
}
