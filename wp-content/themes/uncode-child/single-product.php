<?php get_header();?>

<?php
while ( have_posts() ) : the_post();

    $cats = get_the_terms( get_the_ID(), 'category' );
    //get Food service or At home category
    $cat_arr = array_filter($cats, function($arr){
        return $arr->parent == 0;
    });
    
    $brand = array_values($cat_arr)[0]->slug;
    
    // Food service single food template:
    if($brand == 'food-service'){
        
        
        
        $banner = get_field('top_banner_image');
        $title1 = get_field('title_1');
        $title2 = get_field('title_2');
        $brochure = get_field('product_brochure');
        $package_image = get_field('package_image');
        $features_benefits = get_field('features_benefits');
        $purchase_title = get_field('title_below_package_image');
        $purchase_text = get_field('text_below_package_image');
        // $inspiration_key = 'food_service_used_products';
        // $inspiration_minor_title = get_field('food_service_inspiration_minor_title', $post_id);
        // $inspiration_major_title = get_field('food_service_inspiration_major_title', $post_id);
        // $inspiration_description = get_field('food_service_inspiration_description');
?>

<div class="food-service">
    
    <div class="top-banner single-post">
        <div class="wrapper">
            <div class="img-wrapper">
                
                <?php if($banner){ ?>
                
                    <img src="<?php echo $banner['url']?>" alt="product top banner">
                <?php }else{ ?>
                    <img src="<?php echo get_theme_file_uri('sass/images/Mahi-Mahi-Fillet-and-portion.png');?>" alt="product top banner">
                <?php } ?>
                
            </div>
        </div>
    </div>
    
    <div class="container mt-50">
        <div class="content">
            <h1 class=" title" style="background-image:url(<?php echo get_field('food_service_title_icon') ? get_field('food_service_title_icon')['url'] : get_theme_file_uri('sass/images/product-fish-icon.png');?>);">
            	<span class="title1 title-black-avenir"><?php echo $title1; ?></span>
            	<span class="title-blue-authenia"><?php echo $title2; ?></span>
            </h1>
            
            <?php the_content(); ?>
            
            <?php if($features_benefits):?>
                <h3 class="title-m-bold features">How To Cook</h3>
                <p class="body-l"><?php echo $features_benefits;?></p>
            <?php endif;?>
            <?php if($brochure): ?>
            <a class="button btn-black-white" href="<?php echo $brochure['url']?>" target="_blank">DOWNLOAD BROCHURE</a>
            <?php endif; ?>
        </div>
    </div>
    
    <div class="single-product-slider mt-50">
    
        <?php
        
        if( have_rows('single_product_page_gallery_slider') ):
            while( have_rows('single_product_page_gallery_slider') ) : the_row();
                $img = get_sub_field('product_image');
                $title = get_sub_field('product_title');
                // print_r($product);
        ?>
        
        <div class="col-md-4 item">
            <div class="img-wrapper">
    		    <img src="<?php echo $img['url'] ?>">
    		</div>
    		<div class="name title-s"><?php echo $title;?></div>
    	</div>
        
        <?php
         
            endwhile;
            
        endif;
        
        ?>
    
    </div>
    
    
    <div class="container">
        <div class="purchase-wrapper">
            
            <?php if($package_image):?>
            <img src="<?php echo $package_image['url'];?>" alt="package image">
            <?php endif;?>
            
            <h2 class="title-m-bold"><?php echo $purchase_title;?></h2>
            <?php echo $purchase_text;?>
            <a class="button btn-white-blue" href="site_url('/contact-us');">CONTACT US</a>
        </div>
    </div>
    
</div>
        
<?php

    }else{ // At home single food template:
    
        $banner = get_field('top_banner_image');
        $title1 = get_field('at_home_title_1');
        $title2 = get_field('at_home_title_2');
        $brochure = get_field('at_home_product_brochure');
        $package_image = get_field('at_home_package_image');
        $features_benefits = get_field('at_home_features_benefits');
        // $inspiration_key = 'at_home_used_products';
        // $inspiration_minor_title = get_field('at_home_inspiration_minor_title');
        // $inspiration_major_title = get_field('at_home_inspiration_major_title');
        // $inspiration_description = get_field('at_home_inspiration_description');
?>

<div class="at-home">
    
    <div class="top-banner single-post">
        
        <div class="wrapper">
            <div class="img-wrapper">
                <?php if($banner){ ?>
                    <img src="<?php echo $banner['url']?>" alt="product top banner">
                <?php }else{ ?>
                    <img src="<?php echo get_theme_file_uri('sass/images/Mahi-Mahi-Fillet-and-portion.png');?>" alt="product top banner">
                <?php } ?>
            </div>
        </div>
        
        <?php if($package_image):?>
            <div class="package"><img src="<?php echo $package_image['url']?>" alt="product package image"></div>
        <?php endif;?>
    </div>
    
    <div class="container mt-50">
        <div class="content">
            <h1 class=" title" style="background-image:url(<?php echo get_field('at_home_title_icon') ? get_field('at_home_title_icon')['url'] : get_theme_file_uri('sass/images/product-fish-icon.png');?>);">
            	<span class="title1 title-black-avenir"><?php echo $title1; ?></span>
            	<span class="title-blue-authenia"><?php echo $title2; ?></span>
            </h1>
            
            <?php the_content(); ?>
            
            <?php if($features_benefits):?>
                <h3 class="title-m-bold features">How To Cook</h3>
                <p class="body-l"><?php echo $features_benefits;?></p>
            <?php endif;?>
            
            <?php if($brochure):?>
                <a class="button btn-black-white" href="<?php echo $brochure['url']?>" target="_blank">DOWNLOAD BROCHURE</a>
            <?php endif;?>
            
            
            <div class="mt-50">
    
                <?php
                
                if( have_rows('text_blocks_below_download_brochure_button') ):
                    while( have_rows('text_blocks_below_download_brochure_button') ) : the_row();
                        $title = get_sub_field('title');
                        $description = get_sub_field('description');
                        // print_r($product);
                ?>
                
                <h3 class="title-m-bold features"><?php echo $title;?></h3>
                <p class="body-l"><?php echo $description;?></p>
                
                <?php
                 
                    endwhile;
                    
                endif;
                
                ?>
            
            </div>
            
        </div>
    </div>
    
</div>

<?php        

    }
 
?>



<!--Inspiration block-->

<?php

    if($brand == 'food-service'){
        
        // get data from Post -> Food Service Single Product Inspiration Block Titles
        $post_inspiration = [
            'post_type'      => 'post',
            'posts_per_page' => 1,
            'post_name__in'  => ['food-service-single-product-inspiration-block-titles'],
            'fields'         => 'ids' 
        ];
        $post_id = get_posts( $post_inspiration )[0];
        
        $inspiration_key = 'food_service_used_products';
        $inspiration_minor_title = get_field('food_service_inspiration_minor_title', $post_id);
        $inspiration_major_title = get_field('food_service_inspiration_major_title', $post_id);
        $inspiration_description = get_field('food_service_inspiration_description', $post_id);
        
    }else{
        
        //get data from the Post -> At Home Single Product Inspiration Block Titles
        $post_inspiration = [
            'post_type'      => 'post',
            'posts_per_page' => 1,
            'post_name__in'  => ['at-home-single-product-inspiration-block-titles'],
            'fields'         => 'ids' 
        ];
        $post_id = get_posts( $post_inspiration )[0];
        
        $inspiration_key = 'at_home_used_products';
        $inspiration_minor_title = get_field('at_home_inspiration_minor_title', $post_id);
        $inspiration_major_title = get_field('at_home_inspiration_major_title', $post_id);
        $inspiration_description = get_field('at_home_inspiration_description', $post_id);
    }

?>

<?php if(!get_field('disable_inspiration_block')):?>

    <?php if($inspiration_minor_title):?>
            
        <h2 class=waterfall-title>
        	<span class="title-light"><?php echo $inspiration_minor_title;?></span>
        	<span class="title-blue-authenia"><?php echo $inspiration_major_title;?></span>
        </h2>
        
    <?php else:?>
    
        <h2 class=waterfall-title>
        	<span class="title-light">PRODUCT</span>
        	<span class="title-blue-authenia">Gallery</span>
        </h2>
    
    <?php endif;?>
    
    <p class="body-l"><?php echo $inspiration_description?></p>
    
    <!--no_filter_waterfall_tiles() is in functions.php-->
    <?php no_filter_waterfall_tiles(array(
        'post_type' => array('recipe', 'blog', 'image'),
    	'posts_per_page' => -1,
    	'meta_query' => array(
            array(
              'key' => $inspiration_key,
              'compare' => 'LIKE',
              'value' => '"' . get_the_ID() . '"'
            )
          )
    
    )); ?>
    
    <a class="button btn-blue-white center mb-50 mt-30" href="<?php echo site_url('/inspiration');?>">VIEW MORE</a>

<?php endif;?>


<!--product slider-->

<?php 
    
    wp_reset_query();
    
    $enable_slider = get_field('disable_product_slider');
    
    if(!$enable_slider):

        if($brand == 'food-service'){
            $minor_title = get_field('food_service_product_slider_minor_title');
            $major_title = get_field('food_service_product_slider_major_title');
            $description = get_field('food_service_product_slider_description');
            $slider_var = 'food_service_products_in_slider';
        }else{
            $minor_title = get_field('at_home_product_slider_minor_title');
            $major_title = get_field('at_home_product_slider_major_title');
            $description = get_field('at_home_product_slider_description');
            $slider_var = 'at_home_products_in_slider';
        }
?>

        <?php if($minor_title):?>
        
            <h2 class="popular title custom">
            	<span class="title-black-avenir"><?php echo $minor_title;?></span>
            	<span class="title-blue-authenia"><?php echo $major_title;?></span>
            </h2>
            
        <?php else:?>
        
            <h2 class="popular title">
            	<span class="title-black-avenir">OTHER</span>
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
                            
                            // print_r($product);
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
        
        	<a class="button btn-white-blue" href="<?php echo site_url('/' . $brand . '-products');?>">VIEW PRODUCTS</a>
        </div>
            
            
        <?php else:
        
            if($brand == 'food-service'){
                get_template_part('/template-parts/content-popular-products-food-service');
            }else{
                get_template_part('/template-parts/content-popular-products-at-home');
            }
        ?>
        
            
        <?php endif;?>
        
    <?php endif;?> <!-- end of if(!$enable_slider) -->

<?php 

    if($brand == 'food-service'){
        get_template_part('/template-parts/content-view-wholesalers');
    }else{
        get_template_part('/template-parts/content-at-home-view-stores');
    }

?>

<?php get_template_part('/template-parts/content-contact-block');?>

<?php endwhile; ?>

<?php get_footer();?>