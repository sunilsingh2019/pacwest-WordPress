<div class="container full-container popular-products">
	<div class="row product-slider">
		<?php
			$products = new WP_Query(array(
				'post_type' => 'product',
				'posts_per_page' => 3,
				'orderby' => 'menu_order',
				'order' => 'ASC',
				'tax_query' => array(
                    array(
                        'taxonomy' => 'category',
                        'field'    => 'slug',
                        'terms'    => 'food-service'
                    ),
                )
    		));

			while($products->have_posts()):
				$products->the_post();
				
		?> 

			<div class="col-md-4 item">
				<a class="img-wrapper" href="<?php the_permalink();?>">
				    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full');?>" alt="picture of <?php echo get_the_title(); ?>">
				<!--<p class="body-l"><?php echo get_the_title(); ?></p>	-->
				</a>	
				<div class="name title-s"><?php echo get_the_title();?></div>
			</div>

		

			<?php endwhile;?>	
		
	</div>
	<a class="button btn-white-blue" href="<?php echo site_url('/food-service-products');?>">VIEW PRODUCTS</a>
</div>