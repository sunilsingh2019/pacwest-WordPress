<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<?php
$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'cpt-alm-listing-square');
if(empty($featured_img_url)){
	$featured_img_url = esc_url(cpt_alm_assets().'images/placeholder.jpg');
}
?>
<div class="cpt-news-card cpt-news-card-layer">
	<div class="cpt-wrapper" style="background: url(<?php echo $featured_img_url; ?>)">
		<div class="cpt-header">
			<div class="cpt-news-date">
				<span><?php echo get_the_date( 'd' ) ?></span>
				<span><?php echo get_the_date( 'M' ) ?></span>
				<span><?php echo get_the_date( 'Y' ) ?></span>
			</div>
	</div>
	<div class="cpt-news-data">
		<div class="cpt-news-content">
			<span class="cpt-news-author"><?php _e('By','cpt-ajax-load-more') ?> <?php the_author(); ?></span>
			<h3 class="cpt-news-title"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
			<p class="cpt-news-text"><?php echo cpt_alm_short_text(get_the_excerpt(),0,100); ?></p>
			<a href="<?php echo get_permalink(); ?>" class="cpt-news-button"><?php _e('Read More','cpt-ajax-load-more') ?></a>
		</div>
	</div>
	</div>
</div>