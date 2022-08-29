<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
	<div>
		<?php 
			if ( has_post_thumbnail() ) {
				the_post_thumbnail('cpt-alm-listing'); 
			}else{
				$no_img = cpt_alm_assets().'images/placeholder-ls.jpg';
				echo '<img src="'.esc_url($no_img).'" alt="">';
			}
		?>
	</div>
	<div class="cpt-content">
		<h5><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h5>
		<p>
			<?php echo cpt_alm_short_text(get_the_excerpt(),0,150); ?>
		</p>
		<div class="cpt-bottom-btn"><a class="button btn cpt-btn" href="<?php echo get_permalink(); ?>"><?php _e('Read More..','cpt-ajax-load-more') ?></a></div>
	</div>

