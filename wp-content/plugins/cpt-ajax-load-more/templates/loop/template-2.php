<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="cpt-post-module cpt-post-module-hover">
	<a href="<?php echo get_permalink(); ?>">
		<div class="cpt-thumbnail">
			<div class="cpt-date">
				<div class="cpt-day"><?php echo get_the_date( 'd' ) ?></div>
				<div class="cpt-month"><?php echo get_the_date( 'M' ) ?></div>
			</div>
			<?php 
				if ( has_post_thumbnail() ) {
					the_post_thumbnail('cpt-alm-listing'); 
				}else{
					$no_img = cpt_alm_assets().'images/placeholder-ls.jpg';
					echo '<img src="'.esc_url($no_img).'" alt="">';
				}

				$categories = get_the_category();
				if ( ! empty( $categories ) ) {
				    echo '<div class="cpt-category">'.esc_html( $categories[0]->name ).'</div>';
				}
			?>
		</div>

		<div class="cpt-post-content">
		<h3 class="cpt-title"><?php echo get_the_title(); ?></h3>
		<p class="cpt-description"><?php echo cpt_alm_short_text(get_the_excerpt(),0,150); ?></p>
		<div class="cpt-post-meta"><span class="cpt-user"><i class="cpt-icon cpt-user-icon"></i> <?php _e('By','cpt-ajax-load-more') ?> <?php the_author(); ?></span><span class="cpt-comments"><i class="cpt-icon cpt-comments-icon"></i> <?php comments_number( 'No comments', '1 comment', '% comments' ); ?></span></div>
		</div>
	</a>
</div>