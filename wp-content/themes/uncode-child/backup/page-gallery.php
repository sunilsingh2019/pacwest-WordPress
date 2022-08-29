<?php get_header();?>


<h1 class="title">
	<span class="title-black-avenir">PAC WEST</span>
	<span class="title-blue-authenia">Gallery</span>
</h1>

<?php
    $recipes = new WP_Query(array(
        'post_type' => 'recipe',
        'post_per_page' => -1
        ));
        
    $blogs = new WP_Query(array(
        'post_type' => 'blog',
        'post_per_page' => -1
        ));
        
    $gallery_arr = array();
        
    while ($recipes->have_posts()): $recipes->the_post();
        array_push($gallery_arr, get_the_ID());
    endwhile;
    
    while ($blogs->have_posts()): $blogs->the_post();
        array_push($gallery_arr, get_the_ID());
    endwhile;
?>


<div class="filter-container container">
    <p class="body-l">Filter by type of seafood</p>
    <form method="GET" id="" class="sort">
        <div class="button-group seafood filters-button-group waterfall-group">
          <!--<button class="button is-checked" data-filter="*">show all</button>-->
            <button name="sort" value="fish" class="button fish" data-filter="fish, fish-at-home">Fish</button>
            <button name="sort" value="specialty" class="button specialty" data-filter="specialty, specialty-at-home">Specialty</button>
            <button name="sort" value="squid" class="button squid" data-filter="squid, squid-calamari">Squid</button>
            <button name="sort" value="scallop" class="button scallop" data-filter="scallop">Scallops</button>
            <button name="sort" value="prawns" class="button prawn" data-filter="prawns, prawns-at-home">Prawns</button>
        </div>
    </form>
</div>

<div class="gallery mt-50">
    
    <?php 
        foreach($gallery_arr as $index => $gallery):
            // setup_postdata( $post ); 
            $cats = get_the_terms( $gallery, 'category' );
            
            $cat_arr = array_filter($cats, function($arr){
                return $arr->parent == 0;
            });
            
            $brand = array_values($cat_arr)[0];
                                
            $cat_names = array();
        
            foreach($cats as $cat){
                array_push($cat_names, strtolower($cat->name));
            }
            $cat_classes = implode(' ', $cat_names);
            // print_r($gallery);
            $post_type =  get_post_type($gallery);
		            
            echo $index % 3 == 0 ?  '<div class="group">' : '';
    ?>        
            <div class="item element-item <?php echo $cat_classes;?>"> 
			    <img src="<?php echo get_the_post_thumbnail_url($gallery,'full');?>">
			    <!--<div><?php echo get_the_title($gallery);?></div>-->
			    <div class="lightbox">
			        <div class="content row">
    			        <div class="col-md-4 left">
    			            <h2 class="title-m-bold"><?php echo get_the_title($gallery);?></h2>
    			            <?php if( ($post_type) == 'recipe' ):?>
    			                <p class="body-l"><?php echo get_post_field('post_content', $gallery);?></p>
    			            <?php else:?>    
    			                <p class="body-l"><?php echo get_field('single_blog_description', $gallery);?></p>
    			            <?php endif;?>
    			            <a class="button btn-blue-white" href="<?php echo get_permalink($gallery);?>"><?php echo $post_type == 'recipe' ? 'VIEW RECIPE' : 'VIEW INSPIRATION';?></a>
    			            
    			            <?php
    			            
    			                if($brand == 'food-service'){
    			                    $used_products = get_field('food_service_used_products', $gallery);
    			                }else{
    			                    $used_products = get_field('at_home_used_products', $gallery);
    			                }
    			                
    			                if($used_products):
    			            
    			            ?>
    			            
    			                    <h3 class="body-l-bold">Products Used</h3>
    			                    
    			                    <?php foreach($used_products as $product):?>
    			                    
    			                        <a class="blue-link" href="<?php echo $product->guid ?>"><?php echo $product->post_title;?></a>
    			                    
    			                    <?php endforeach;?>
    			            
    			            <?php endif;?>
    			            
    			        </div>
    			        <div class="col-md-8 right">
    			            <img src="<?php echo get_the_post_thumbnail_url($gallery,'full');?>">
    			        </div>
    			    </div>
			    </div>
			</div>
    <?php        
            echo $index % 3 == 2 ?  '</div>' : '';
         
        endforeach;
    ?>

</div>

</div>

<a class="button btn-blue-white center mb-50 mt-30" id="gallery-view-more" href="">VIEW MORE</a>

<?php get_template_part('/template-parts/content-view-wholesalers');?>

<?php get_template_part('/template-parts/content-contact-block');?>

<?php get_footer();?>