<?php

//get data from the post Brand selector
    $brand_selector = [
        'post_type'      => 'post',
        'posts_per_page' => 1,
        'post_name__in'  => ['brand-selector'],
        'fields'         => 'ids' 
    ];
    $brand_selector_id = get_posts( $brand_selector )[0];
?>


<div class="brand-selector">
	<div class="container full-container">
		<div class="row">
			<a href="<?php echo site_url('/food-service');?>" class="col-md-4 brand-selector__col brand-selector__hashover food-service" style="background-image: url(<?php echo get_field('food_service_image', $brand_selector_id)['url']?>)">
			    <img class="logo" src="<?php echo get_theme_file_uri('sass/images/pacwest-logo.png');?>" alt="Pac west logo">
				<div class="inner-content">
					<h3 class="title-white-authenia">Food Service</h3>
					<p class="title-s"><?php echo get_field('food_service_subtitle', $brand_selector_id);?></p>
				</div>
			</a>
			<a href="<?php echo site_url('/at-home');?>" class="col-md-4 brand-selector__col brand-selector__hashover at-home" style="background-image: url(<?php echo get_field('at_home_image', $brand_selector_id)['url']?>)">
			    <img class="logo" src="<?php echo get_theme_file_uri('sass/images/pacwest-logo.png');?>" alt="Pac west logo">
				<div class="inner-content">
					<h3 class="title-white-authenia">At Home</h3>
					<p class="title-s"><?php echo get_field('at_home_subtitle', $brand_selector_id);?></p>
				</div>
			</a>
			<a href="<?php echo site_url('/');?>" class="col-md-4 brand-selector__col other" style="background-image: url(<?php echo get_field('other_brands_image', $brand_selector_id)['url']?>)">
				<div class="inner-content-other">
					<h3 class="title-white-authenia">Other Brands</h3>
					<img class="ocean-chef" src="<?php echo get_theme_file_uri('sass/images/ocean-chef-logo.png');?>" alt="ocean chef logo">
					<img class="street" src="<?php echo get_theme_file_uri('sass/images/street-foodie-logo.png');?>" alt="street foodie logo">

				</div>
				<img class="wws" src="<?php echo get_theme_file_uri('sass/images/only-at-woolworths.jpeg');?>" alt="only at woolworths">
			</a>
			<div class='' id="background-blue-curtain-left"></div>
			<div class="col-md-8 food-service-hover hover-part">
			    <div class='' id="background-blue-curtain-right"></div>
				<div class="range" style="background-image: url(<?php echo get_field('food_service_hover_primary_image', $brand_selector_id)['url']?>)">					
					<div class="inner-content">
						<p class="title-s"><?php echo get_field('food_service_hover_primary_image_title', $brand_selector_id);?></p>
						<a class="btn-white-transparent" href="<?php echo site_url('/food-service');?>">VIEW RANGE</a>
					</div>					
				</div>
				<div class="products">
						
					<?php if( have_rows('food_service_hover_product_slider', $brand_selector_id) ):?>
						    
						    <div class="product-slider">
                        
                            <?php while( have_rows('food_service_hover_product_slider', $brand_selector_id) ) : the_row();
                        
                                $product = get_sub_field('product');
                            ?>
                                    <a class="col-md-3 item" href="<?php echo get_the_permalink($product->ID);?>">
                                        <div class="img-wrapper" href="<?php echo get_the_permalink($product->ID);?>">
    									    <img src="<?php echo get_the_post_thumbnail_url($product->ID, 'full'); ?>">
    									</div>
    									<div class="name body-m"><?php echo $product->post_title;?></div>
    								</a>
                           
                            <?php endwhile;?>
                            </div>
                   		 <?php endif;?>
				</div>
			</div>
			
		</div>
	</div>
</div>
