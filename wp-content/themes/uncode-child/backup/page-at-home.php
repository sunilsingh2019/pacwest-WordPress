<?php get_header();?>

<?php
while ( have_posts() ) : the_post();
    the_content();
endwhile;
?>

<h2 class="title">
	<span class="title-black-avenir">FIND OUR FOOD SERVICE PRODUCTS AT YOUR</span>
	<span class="title-blue-authenia">Nearest Wholesaler</span>
</h2>

<?php get_template_part('/template-parts/content-popular-products');?>

<?php waterfall_tiles(array(
			'post_type' => 'recipe',
			'posts_per_page' => 8			
));?>

<?php get_template_part('/template-parts/content-view-wholesalers');?>

<?php get_template_part('/template-parts/content-contact-block');?>

<?php get_footer();?>