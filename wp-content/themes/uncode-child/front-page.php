<?php get_header();?>



<?php
while ( have_posts() ) : the_post();
    the_content();
?>

<div class="hide mobile-background-image" data-image="<?php echo get_field('background_image_mobile')['url']; ?>"></div>
<div class="hide desktop-background-image" data-image="<?php echo get_field('background_image_desktop')['url']; ?>">
</div>
<?php endwhile;?>

<div class="not-in-menu">
    <?php get_template_part('/template-parts/content-brand-selector-custom');?>
</div>

<div class="waterfall-wrapper">
    <?php if(!get_field('disable_inspiration_block')):?>

    <h2 class=waterfall-title>
        <span class="title-light"><?php echo get_field('single_blog_minor_title');?></span>
        <span class="title-blue-authenia"><?php echo get_field('single_blog_major_title');?></span>
    </h2>

    <?php if(get_field('single_blog_description')): ?>
    <p class="body-l"><?php echo get_field('single_blog_description');?></p>
    <?php endif;?>

    <?php no_filter_waterfall_tiles(); ?>
    <div class="waterfall__btn text-center">
        <a class="button btn-blue-white show-more--4" href="#">VIEW MORE</a>
    </div>
    <?php endif;?>
</div>

<?php //get_template_part('/template-parts/content-globe-map');?>


<?php get_template_part('/template-parts/content-view-wholesalers');?>

<?php get_template_part('/template-parts/content-contact-block');?>

<?php get_footer();?>