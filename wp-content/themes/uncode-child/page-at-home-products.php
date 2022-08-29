  <?php get_header();?>

<h2 class="title mt-50">
	<span class="title-black-avenir">AT HOME</span>
	<span class="title-blue-authenia">Products</span>
</h2>

<div class="container products-block mb-50">
	<div class="row">
  	
	    <?php 
	        $products = new WP_Query(array(
				'posts_per_page' => -1,
	            'post_type' => 'product',       
	            'tax_query' => array(
                	array(
                		'taxonomy' => 'category',
                		'field' => 'slug',
                		'terms' => 'at-home'
                	)
                )
            ));
            
            
            while($products->have_posts()) : $products->the_post();
	            $cats = get_the_terms( get_the_ID(), 'category' );
	            $cat_names = array();
	         
	            foreach($cats as $cat){
	                array_push($cat_names, $cat->slug);
	            }
	            $cat_classes = implode(' ', $cat_names);
            
	    ?>
              <div class="element-item col-xl-3 col-lg-4 col-md-6 <?php echo $cat_classes;?>" data-category="transition">
                <a class="inner-wrapper" href="<?php echo get_permalink();?>" style="background-image:url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full')?>)">
                    <p class="title-s"><?php echo the_title();?></p>
                </a>
            </div>
              
              
        <?php endwhile;?>
                  
                
        <!--<div class="btn-center mb-50">-->
        <!--    <a class="button btn-blue-white" href="<?php echo site_url('/inspiration/?sort=recipe');?>" target="_blank">VIEW MORE</a>-->
        <!--</div>-->
                
	
	</div>
</div>

<?php get_template_part('/template-parts/content-at-home-view-stores');?>


<?php get_template_part('/template-parts/content-contact-block');?>

<?php get_footer();?>