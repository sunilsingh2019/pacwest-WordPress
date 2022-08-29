<?php get_header();?>

<?php
while ( have_posts() ) : the_post();
    $banner = get_field('top_banner_image');
    $recipe_sustainability = get_field('recipe_sustainability');
    $recipe_species_of_protein= get_field('recipe_species_of_protein');
    $recipe_country_of_origin = get_field('recipe_country_of_origin');
    $recipe_resale_amount = get_field('recipe_resale_amount');
    $prep_time = get_field('prep_time');
    $cook_time = get_field('cook_time');
    $recipe_ingredients = get_field('recipe_ingredients');
    $recipe_instructions = get_field('recipe_instructions');
    $recipe_pacwest_products = get_field('recipe_pacwest_products');
    $cats = get_the_terms( get_the_ID(), 'category' );
    
    //get Food service or At home category
    $cat_arr = array_filter($cats, function($arr){
        return $arr->parent == 0;
    });
    
    $brand = array_values($cat_arr)[0]->slug;
 
?>

<div class="top-banner single-post">
    <div class="wrapper">
        <div class="img-wrapper">
            <?php if($banner){ ?>
                <img src="<?php echo $banner['url']?>" alt="product top banner">
            <?php }else{ ?>
                <img src="<?php echo get_theme_file_uri('images/Mahi-Mahi-Fillet-and-portion.png');?>" alt="product top banner">
            <?php } ?>
        </div>
    </div>
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
        <p class="cat body-l-bold"><?php echo $brand->name ?></p>
        
        <div class="title-wrapper">
            <h1 class="title-blue-avenir">
                <?php the_title(); ?>
            	<!--<span class="title1 title-black-avenir"><?php echo $title1; ?></span>-->
            	<!--<span class="title-blue-authenia"><?php echo $title2; ?></span>-->
            </h1>
            <div class="print-wrapper"><button class="button btn-blue-white print" onclick="window.print();return false;">PRINT</button></div>
            
        </div>
        
        <div class="row detail-list">
        
            <div class="col-12 col-sm-12 col-md-6">
                <table>
                    <tr>
                        <td>Species of protein:</td>
                        <td><?php echo $recipe_species_of_protein;?></td>
                        
                    </tr>
                    <tr>
                        <td>Country of origin:</td>
                        <td><?php echo $recipe_country_of_origin;?></td>
                        
                    </tr>
                    <tr>
                        <td>Pacwest Products:</td>
                        <td>
                            <?php
            			        
        		                if($brand == 'food-service'){
        		                    $used_products = get_field('food_service_used_products', $gallery);
        		                }else{
        		                    $used_products = get_field('at_home_used_products', $gallery);
        		                }
        		            
        		            ?>
        		            
        		            <?php 
            		            $row = 0;
            		            foreach($used_products as $product):
            		                
            		                if($row == 0){
                                        $primary_product = $product;
                                    }
            		        ?>
                                    <a class="blue-link" href="<?php echo $product->guid ?>"><?php echo $product->post_title;?></a>
                                    <br />  
                            
                            <?php 
                                $row++;
                                endforeach;
                            ?>
                         
                        </td>
                        
                    </tr>
                    
                </table>
            </div>
            
            <div class="col-12 col-sm-12 col-md-6">
                <table>
                    <tr>
                        <td>Sustainability:</td>
                        <td><?php echo $recipe_sustainability;?></td>
                    </tr>
                    <!--tr>
                        
                        <td>Resale amount:</td>
                        <td><?php //echo $recipe_resale_amount;?></td>
                    </tr -->
                    <tr>
                    
                        <td>Prep Time:</td>
                        <td><?php echo $prep_time;?></td>
                    </tr>
                    <tr>
                        
                        <td>Cook Time:</td>
                        <td><?php echo $cook_time;?></td>
                    </tr>
                  
                </table>
            </div>
        </div>
        
        
        <?php the_content(); ?>
        
        <div class="instruction-wrapper row">
            <div class="col-md-4">
                <h3 class="title-m-bold">INGREDIENTS</h3>
                <ul>
                    <?php 
                        if( have_rows('recipe_ingredients') ):

                            while( have_rows('recipe_ingredients') ) : the_row();

                                $ingredient = get_sub_field('ingredient');
                    ?>    
                                <li><?php echo $ingredient;?></li>
                    <?php
                            endwhile;
                        endif;
                    ?>
                </ul>
            </div>
            <div class="col-md-8">
                <h3 class="title-m-bold">INSTRUCTIONS</h3>
                <p class="body-l"><?php echo $recipe_instructions;?></p>
            </div>
        </div>
        
        <div class="product-wrapper row">
            <div class="col-md-6">
                <img src="<?php echo get_the_post_thumbnail_url($primary_product->ID); ?>">
                <!--<?php var_dump($primary_product);?>-->
            </div>
            <div class="col-md-6">
                <p class="company">PACIFIC WEST</p>
                <h3>
                  <?php echo $primary_product->post_title; ?>
                </h3>
                <p><?php echo $product->post_content;?></p>
                <a class="button btn-blue-white" href="<?php echo $product->guid;?>" target="_blank">VIEW PRODUCT</a>
            </div>
        </div>
        
        <div class="btn-center">
            <a class="button btn-blue-white" href="<?php echo site_url('/inspiration/?sort=recipe');?>" target="_blank">BACK TO ALL RECIPES</a>
        </div>
        
    </div>
    
</div>

<?php endwhile; ?>

<?php if(!get_field('disable_inspiration_block')):?>

    <?php 
        
        // get titles from Post/Single Blog Inspiration Block titles
        $blog_inspiration = [
            'post_type'      => 'post',
            'posts_per_page' => 1,
            'post_name__in'  => ['single-recipe-inspiration-block-titles'],
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
        	<span class="title-blue-authenia">Recipes</span>
        </h2>
    
    <?php endif;?>
    
    <p class="body-l"><?php echo get_field('single_blog_description', $blog_inspiration_id);?></p>
    
    <?php 
        no_filter_waterfall_tiles(array(
            'post_type' => 'recipe',
        	'posts_per_page' => -1,
        	'tax_query' => array(
            	array(
            		'taxonomy' => 'category',
            		'field' => 'slug',
            		'terms' => $brand
            	)
            )
    )); ?>
        
    <a class="button btn-blue-white center mb-50 mt-30" href="<?php echo site_url('/inspiration/?sort=recipe');?>">VIEW MORE</a>

<?php endif;?>

<?php 

    if($brand == 'food-service'){
        get_template_part('/template-parts/content-view-wholesalers');
    }else{
        get_template_part('/template-parts/content-at-home-view-stores');
    }

?>

<?php get_template_part('/template-parts/content-contact-block');?>

<?php get_footer();?>