<?php get_header();?>

<?php
while ( have_posts() ) : the_post();
$banner = get_field('top_banner_image');
$banner_mobile = get_field('top_banner_mobile_image');
?>

<!--<div class="top-banner banner-gradient">-->
<!--    <img class="desktop"  src="<?php echo $banner['url']?>" alt="top banner">-->
<!--    <img class="mobile"  src="<?php echo $banner_mobile['url']?>" alt="top banner">-->
<!--    <div class="content-right">-->
<!--        <img src="<?php echo get_theme_file_uri('sass/images/pacwest-logo.png');?>" alt="pac west logo">-->
<!--        <h1 class="title-white-authenia">Food Service</h1>-->
<!--        <span class="title-white-avenir">HIGH QUALITY</span>-->
<!--        <span class="title-white-avenir">SEAFOOD</span>-->
<!--        <a class="button btn-white-blue" href="<?php echo site_url('/food-service-products');?>">VIEW PRODUCTS</a>-->
<!--    </div>-->
<!--    <div class="content-mobile mobile">-->
<!--        <h1 class="title-white-authenia">Food Service</h1>-->
<!--        <span class="title-white-avenir">HIGH QUALITY</span>-->
<!--        <span class="title-white-avenir">SEAFOOD</span>-->
<!--        <a class="button btn-white-transparent" href="<?php echo site_url('/food-service-products');?>">VIEW PRODUCTS</a>-->
<!--    </div>-->
<!--</div>-->

<?php
    the_content();
endwhile;
?>



<!--product slider-->

<?php 
    
    $enable_slider = get_field('disable_product_slider');
    
    if(!$enable_slider):

        
        $minor_title = get_field('food_service_product_slider_minor_title');
        $major_title = get_field('food_service_product_slider_major_title');
        $description = get_field('food_service_product_slider_description');
        $slider_var = 'food_service_products_in_slider';
        
?>

        <?php if($minor_title):?>
        
            <h2 class="popular title custom">
            	<span class="title-black-avenir"><?php echo $minor_title;?></span>
            	<span class="title-blue-authenia"><?php echo $major_title;?></span>
            </h2>
            
        <?php else:?>
        
            <h2 class="popular title">
            	<span class="title-black-avenir">POPULAR</span>
            	<span class="title-blue-authenia">Products</span>
            </h2>
        
        <?php endif;?>
        
        <p class="body-l"><?php echo $description?></p>
    
        <?php if( have_rows($slider_var) ):?>
        
            <div class="container full-container popular-products custom">
        	<div class="product-slider three">
        	    
        		<?php
                   while( have_rows($slider_var) ) : the_row();
                        $product= get_sub_field('product');
                            
                ?>
                    
                    <div class="item">
        				<a class="img-wrapper" href="<?php the_permalink($product->ID);?>">
        				    <img src="<?php echo get_the_post_thumbnail_url($product->ID, 'full');?>" alt="picture of <?php echo $product->post_title; ?>">
        				<!--<p class="body-l"><?php echo get_the_title(); ?></p>	-->
        				</a>	
        				<div class="name title-s"><?php echo $product->post_title;?></div>
        			</div>
                    
                <?php endwhile; ?>
         
        	</div>
        	<a class="button btn-white-blue" href="<?php echo site_url('/food-service-products');?>">VIEW PRODUCTS</a>
        </div>
            
            
        <?php else:
            
            get_template_part('/template-parts/content-popular-products-food-service');
            
        ?>
        
            
        <?php endif;?>
        
    <?php endif;?> <!-- end of if(!$enable_slider) -->
    
<!--Inspiration block-->

<?php if(!get_field('disable_inspiration_block')):

        $inspiration_minor_title = get_field('food_service_inspiration_minor_title');
        $inspiration_major_title = get_field('food_service_inspiration_major_title');
        $inspiration_description = get_field('food_service_inspiration_description');

?>

    <?php if($inspiration_minor_title):?>
            
        <h2 class=waterfall-title>
        	<span class="title-light"><?php echo $inspiration_minor_title;?></span>
        	<span class="title-blue-authenia"><?php echo $inspiration_major_title;?></span>
        </h2>
        
    <?php else:?>
    
        <h2 class=waterfall-title>
        	<span class="title-light">PRODUCT</span>
        	<span class="title-blue-authenia">Recipes</span>
        </h2>
    
    <?php endif;?>
    
    <p class="body-l"><?php echo $inspiration_description?></p>
    
    <!--no_filter_waterfall_tiles() is in functions.php-->
    <?php no_filter_waterfall_tiles(array(
        'post_type' => 'recipe',
    	'posts_per_page' => -1,
    	'tax_query' => array(
        	array(
        		'taxonomy' => 'category',
        		'field' => 'slug',
        		'terms' => 'food-service'
        	)
        )
    
    )); ?>
    
    <a class="button btn-blue-white center mb-50 mt-30" href="<?php echo site_url('/inspiration/?sort=recipe');?>">VIEW MORE</a>

<?php endif;?>    



<?php get_template_part('/template-parts/content-view-wholesalers');?>

<?php get_template_part('/template-parts/content-contact-block');?>

<?php get_footer();?>