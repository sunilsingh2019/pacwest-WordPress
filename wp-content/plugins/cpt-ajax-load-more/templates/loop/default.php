<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'cpt-alm-listing-square');
if(empty($featured_img_url)){
	$featured_img_url = esc_url(cpt_alm_assets().'images/placeholder.jpg');
}

?>
<div class="cpt-list-box">
	<div class="cpt-list-box-img" style="background: url(<?php echo $featured_img_url; ?>)">
		<a href="<?php echo get_permalink(); ?>">
			<span class="cpt-list-details"><?php _e('Read More','cpt-ajax-load-more') ?></span>
		</a>
	</div>
	<div class="cpt-list-box-text">
		<a href="<?php echo get_permalink(); ?>"><h3><?php echo get_the_title(); ?></h3>
			<p><?php echo cpt_alm_short_text(get_the_excerpt(),0,250); ?> </p>
			<div class="cpt-list-metainfo">
				<div class="cpt-post-meta">
					<span class="cpt-user"><i class="cpt-icon cpt-user-icon"></i> By <?php the_author(); ?></span>
					<span class="cpt-comments"><i class="cpt-icon cpt-comments-icon"></i> <?php comments_number( 'No comments', '1 comment', '% comments' ); ?></span>
				</div>
			</div>
		</a>
	</div>
	<div class="clear"></div>
</div>