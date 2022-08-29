<?php get_header();?>

<?php
while ( have_posts() ) : the_post();
    the_content();
endwhile;
?>

<?php get_template_part('/template-parts/content-brand-selector');?>

<?php get_template_part('/template-parts/content-view-wholesalers');?>

<?php get_template_part('/template-parts/content-contact-block');?>

<?php get_footer();?>