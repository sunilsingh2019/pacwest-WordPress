<?php get_header();?>

<?php
while ( have_posts() ) : the_post();
the_content();
?>

<?php endwhile;?>

<?php get_template_part('/template-parts/content-contact-block');?>

<?php get_footer();?>