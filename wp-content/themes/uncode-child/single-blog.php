<?php get_header();?>

<?php
while ( have_posts() ) : the_post();
    $banner = get_field('top_banner_image');
    $title1 = get_field('title_1');
    $title2 = get_field('title_2');
    $brochure = get_field('product_brochure');
    $package_image = get_field('package_image');
?>

<div class="top-banner">
    <?php if($banner){ ?>
        <img src="<?php echo $banner['url']?>" alt="product top banner">
    <?php }else{ ?>
        <img src="<?php echo get_theme_file_uri('images/Mahi-Mahi-Fillet-and-portion.png');?>" alt="product top banner">
    <?php } ?>
</div>

<div class="container">
    
    <div class="social-share">
		
		<a class="fb" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>"></a>
		<a class="twitter" href="https://twitter.com/intent/tweet?url=<?php the_permalink();?>"></a>
		<a class="g-plus" href="https://plus.google.com/share?url=<?php the_permalink(); ?>"></a>
		<a class="whats" href="https://api.whatsapp.com/send?text=%0a<?php the_permalink();?>"></a>
		<!-- <a class="more"></a> -->

	</div>
	
    <div class="content">
        <h1 class="title-blue-avenir">
            <?php the_title(); ?>
        	<!--<span class="title1 title-black-avenir"><?php echo $title1; ?></span>-->
        	<!--<span class="title-blue-authenia"><?php echo $title2; ?></span>-->
        </h1>
        
        <?php the_content(); ?>
        
        <a class="button btn-blue-white" href="<?php echo site_url('/inspiration');?>" target="_blank">BACK TO INSPIRATION</a>
        
    </div>
    
</div>

<?php endwhile; ?>

<!--Inspiration block-->

<?php

    $cats = get_the_terms( get_the_ID(), 'category' );
    //get Food service or At home category
    $cat_arr = array_filter($cats, function($arr){
        return $arr->parent == 0;
    });
    
    $brand = array_values($cat_arr)[0]->slug;
    
    // Food service single food template:
    if($brand == 'food-service'){
        $inspiration_key = 'food_service_used_products';
    }else{
        $inspiration_key = 'at_home_used_products';
    }
    
    $inspiration_products = get_field($inspiration_key);

?>


<?php if(!get_field('disable_inspiration_block')):?>

    <?php 
        
        // get titles from Post/Single Blog Inspiration Block titles
        $blog_inspiration = [
            'post_type'      => 'post',
            'posts_per_page' => 1,
            'post_name__in'  => ['single-blog-inspiration-block-titles'],
            'fields'         => 'ids' 
        ];
        $blog_inspiration_id = get_posts( $blog_inspiration )[0];
    
    
    if(get_field('single_blog_minor_title', $blog_inspiration_id)):?>
            
        <h2 class=waterfall-title>
        	<span class="title-light"><?php echo get_field('single_blog_minor_title', $blog_inspiration_id);?></span>
        	<span class="title-blue-authenia"><?php echo get_field('single_blog_major_title', $blog_inspiration_id);?></span>
        </h2>
        
    <?php else:?>
    
        <h2 class=waterfall-title>
        	<span class="title-light">OTHER</span>
        	<span class="title-blue-authenia">Inspiration</span>
        </h2>
    
    <?php endif;?>
    
    <p class="body-l"><?php echo get_field('single_blog_description', $blog_inspiration_id);?></p>
    
    <?php if($inspiration_products):
       
        $inspiration_products_meta_query = array('relation' => 'OR');
    
            foreach($inspiration_products as $product):
                
                $inspiration_products_meta_query[] = ['key' => $inspiration_key,
                                                      'compare' => 'LIKE',
                                                      'value' => '"' . $product->ID . '"'];
    
            endforeach;    
    
    ?>
    
        <!--no_filter_waterfall_tiles() is in functions.php-->
        <?php no_filter_waterfall_tiles(array(
            'post_type' => array('recipe', 'blog', 'image'),
        	'posts_per_page' => -1,
        	'meta_query' => array(
                $inspiration_products_meta_query
              )
        
        )); ?>
        
    <?php else:
       
        // if the blog is not related to any products:
        no_filter_waterfall_tiles(array(
            'post_type' => array('recipe', 'blog', 'image'),
        	'posts_per_page' => -1,
        	'tax_query' => array(
            	array(
            		'taxonomy' => 'category',
            		'field' => 'slug',
            		'terms' => $brand
            	)
            )
        ));
    ?>
        
    <?php endif;?>
    
    <a class="button btn-blue-white center mb-50 mt-30" href="<?php echo site_url('/inspiration');?>">VIEW MORE</a>

<?php endif;?>

<div class="mt-50">
<?php 

    if($brand == 'food-service'){
        get_template_part('/template-parts/content-view-wholesalers');
    }else{
        get_template_part('/template-parts/content-at-home-view-stores');
    }

?>
</div>

<?php get_template_part('/template-parts/content-contact-block');?>

<?php get_footer();?>