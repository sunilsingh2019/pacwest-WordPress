<?php get_header();?>

<?php
while ( have_posts() ) : the_post();
    the_content();
?>

<div class="hide mobile-background-image" data-image="<?php echo get_field('background_image_mobile')['url']; ?>"></div>
<div class="hide desktop-background-image" data-image="<?php echo get_field('background_image_desktop')['url']; ?>"></div>

<?php endwhile;?>

<div class="not-in-menu">
<?php get_template_part('/template-parts/content-brand-selector-custom');?>
</div>

<?php get_template_part('/template-parts/content-view-wholesalers');?>

<?php get_template_part('/template-parts/content-contact-block');?>

<?php get_footer();?>