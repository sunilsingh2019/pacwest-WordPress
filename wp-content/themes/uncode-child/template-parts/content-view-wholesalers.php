<?php

//get data from the post View Wholesaler
    $post = [
        'post_type'      => 'post',
        'posts_per_page' => 1,
        'post_name__in'  => ['view-wholesaler'],
        'fields'         => 'ids' 
    ];
    $post_id = get_posts( $post )[0];
?>

<div class="view-wholesalers" style="background-image: url(<?php echo get_field('background_image', $post_id)['url']?>)">
<h2 class="title">
	<span class="title"><span class="line-one"><?php echo get_field('title_1_first_line_on_mobile', $post_id);?></span><span class="line-two"> <?php echo get_field('title_1_second_line_on_mobile', $post_id);?></span><span class="line-three"> <?php echo get_field('title_1_third_line_on_mobile', $post_id);?></span></span>
	<span class="title-white-authenia"><?php echo get_field('title_2', $post_id);?></span>
</h2>
<a class="button btn-white-transparent" href="<?php echo site_url(get_field('button_link_slug', $post_id));?>"><?php echo get_field('button_text', $post_id);?></a>
</div>

