
<?php get_header();?>

<div class="top-banner">
	<?php add_revslider('home-slider'); ?>
</div>

<?php
while ( have_posts() ) : the_post();
    the_content();
endwhile;
?>

<?php get_template_part('/template-parts/content-brand-selector');?>

<h2 class=waterfall-title>
	<span class="title-light">POPULAR</span>
	<span class="title-blue-authenia">Recipes</span>
</h2>

<?php waterfall_tiles();?>

<?php get_template_part('/template-parts/content-globe-map');?>


<?php get_template_part('/template-parts/content-view-wholesalers');?>

<?php get_template_part('/template-parts/content-contact-block');?>

<?php get_footer();?>