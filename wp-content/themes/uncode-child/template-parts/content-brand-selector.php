<div class="brand-selector not-in-menu">
	<div class="container full-container">
		<div class="row">
			<a href="<?php echo site_url('/food-service');?>" class="col-md-4 food-service">
			    <img class="logo" src="<?php echo get_theme_file_uri('sass/images/pacwest-logo.png');?>" alt="Pac west logo">
				<div class="inner-content">
					<h3 class="title-white-authenia">Food Service</h3>
					<p class="title-s">Quality value added seafood products for the food service industry</p>
				</div>
			</a>
			<div class="col-md-8 food-service-hover">
				<div class="range">					
					<div class="inner-content">
						<p class="title-s">Our range of quality natural and coated seafoods.</p>
						<a class="btn-white-transparent" href="">VIEW RANGE</a>
					</div>					
				</div>
				<div class="products">

					<?php 
						$products = new WP_Query(array(
							"post_type" => 'product',
							"posts_per_page" => -1
						));
					?>
					
						<div class="product-slider">

							<?php while($products->have_posts()):
								$products->the_post();
							?>

								<div class="col-md-3">
									<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>">
								</div>

							<?php endwhile;?>
						</div>					

				</div>
			</div>
			
			<a href="<?php echo site_url('/at-home');?>" class="col-md-4 at-home">
			    <img class="logo" src="<?php echo get_theme_file_uri('sass/images/pacwest-logo.png');?>" alt="Pac west logo">
				<div class="inner-content">
					<h3 class="title-white-authenia">At Home</h3>
					<p class="title-s">Restaurant quality food that’s quick & simple to prepare at home.</p>
				</div>
			</a>
	
			<a href="<?php echo site_url('/');?>" class="col-md-4 other">
				<div class="inner-content-other">
					<h3 class="title-white-authenia">Other Brands</h3>
					<img class="ocean-chef" src="<?php echo get_theme_file_uri('sass/images/ocean-chef-logo.png');?>" alt="ocean chef logo">
					<img class="street" src="<?php echo get_theme_file_uri('sass/images/street-foodie-logo.png');?>" alt="street foodie logo">

				</div>
				<img class="wws" src="<?php echo get_theme_file_uri('sass/images/only-at-woolworths.jpeg');?>" alt="only at woolworths">
			</a>
		</div>
	</div>
</div>