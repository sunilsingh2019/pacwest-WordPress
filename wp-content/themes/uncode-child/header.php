<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset=<?php echo bloginfo('charset'); ?>>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <?php wp_head(); ?>
    <!-- <script>
    	$.ajax({
	            // beforeSend: (xhr) => {
	            //     xhr.setRequestHeader('X-WP-Nonce', siteData.nonce); //siteData was set in functions.php
	            // },
	            url: siteData.root_url,
	            type: 'POST',
	            data: {'width': $(window).width()},
	            success: (response) => {
	                // $("body").html(response);
	                // console.log(response);
	            },
	            error: (response) => {

	            }
	        });   

    	console.log('width', );

    	var c=document.cookie;
document.cookie='size='+Math.max(screen.width,screen.height)+';'; 
    </script> -->
</head>
<body <?php body_class(); ?>>

    <header class="header pos-absolute">
    	<div class="desktop-menu wrapper">
    	
	      	<div class="container full-container">
	      		 
		      	<div class="row">
		      		<div class="col-lg-2 logo">
		      			<a href="<?php echo site_url();?>"><img src="<?php echo get_theme_file_uri('sass/images/pacwest-logo.png');?>" alt="Pac west logo"></a>
		      		</div>

		      		<div class="col-lg-8 top-menu title-s">
		      			<ul>
		      				<li class="home"><a href="<?php echo site_url('/');?>">HOME</a></li>
		      				<li class="our-ranges">
		      					<a href="<?php echo site_url('/our-range');?>">OUR RANGES</a>	
		      					<!-- <div class="our-ranges-hover-show"><?php get_template_part('/template-parts/content-brand-selector-custom');?></div> -->
		      				</li>
		      				<li class="about-us"><a href="<?php echo site_url('/about-us');?>">ABOUT US</a></li>
		      				<li class="recipes-inspiration"><a href="<?php echo site_url('/inspiration');?>">RECIPES & INSPIRATION</a></li>
		      				<li class='contact'><a href="<?php echo site_url('/contact-us');?>">CONTACT</a></li>
		      			</ul>
		      		</div>

		      		<div class="col-lg-2 site-search">
		      		    <!--<i class="fas fa-search"></i>-->
		      		    <img src="<?php echo get_theme_file_uri('sass/images/search-icon.svg');?>" alt="search icon">
		      			<form method="get" id="searchform" action="<?php echo esc_url(site_url('/'));?>">
							<input type="search" class="body-m" name="s" id="s" placeholder="Search Inspiration & Products">
						</form>
		      		</div>
		      	</div>
	        
	      	</div>
	     </div>

      	<!-- <div class="our-ranges-hover-show hover-show"><?php get_template_part('/template-parts/content-brand-selector-custom');?></div> -->
      	
      	<?php
      	
      	    // get inspiration images from Post/Header
            $header = [
                'post_type'      => 'post',
                'posts_per_page' => 1,
                'post_name__in'  => ['header'],
                'fields'         => 'ids' 
            ];
            $header_id = get_posts( $header )[0];
      	
      	?>

      	<div class="recipes-inspiration-hover-show hover-show container full-container">
      		<div class="row">
	      		<a class="col-lg-3 recipes" href="<?php echo get_field('inspiration_image_for_recipe_link_1', $header_id)['url'];?>" style="background-image:url(<?php echo get_field('inspiration_image_for_recipe_1', $header_id)['url'];?>)"><span><?php echo get_field('inspiration_image_for_recipe_text_1', $header_id);?></span></a>
	      		<a class="col-lg-3 trends" href="<?php echo get_field('inspiration_image_for_recipe_link_2', $header_id)['url'];?>" style="background-image:url(<?php echo get_field('inspiration_image_for_recipe_2', $header_id)['url'];?>)"><span><?php echo get_field('inspiration_image_for_recipe_text_2', $header_id);?></span></a>
	      		<a class="col-lg-3 header-gallery" href="<?php echo get_field('inspiration_image_for_recipe_link_3', $header_id)['url'];?>" style="background-image:url(<?php echo get_field('inspiration_image_for_recipe_3', $header_id)['url'];?>)"><span><?php echo get_field('inspiration_image_for_recipe_text_3', $header_id);?></span></a>
	      		<a class="col-lg-3 news" href="<?php echo get_field('inspiration_image_for_recipe_link_4', $header_id)['url'];?>" style="background-image:url(<?php echo get_field('inspiration_image_for_recipe_4', $header_id)['url'];?>)"><span><?php echo get_field('inspiration_image_for_recipe_text_4', $header_id);?></span></a>
	      	</div>
      	</div>
      	<div class="our-ranges-hover-show  hover-show container full-container">
      		<div class="row">
	      		<a class="col-lg-4 recipes" href="<?php echo get_field('our_ranges_image_link_1', $header_id)['url'];?>" style="background-image:url(<?php echo get_field('our_ranges_image_1', $header_id)['url'];?>)">
				<span>
					<img src="<?php echo get_field('our_ranges_logo_1', $header_id)['url'];?>" width="162" height="185">
					<br>
					<?php echo get_field('our_ranges_image_text_1', $header_id);?>
				</span>
				</a>
	      		<a class="col-lg-4 trends" href="<?php echo get_field('our_ranges_image_link_2', $header_id)['url'];?>" style="background-image:url(<?php echo get_field('our_ranges_image_2', $header_id)['url'];?>)">
				<span>
					<img src="<?php echo get_field('our_ranges_logo_2', $header_id)['url'];?>"><br>
					<?php echo get_field('our_ranges_image_text_2', $header_id);?>
				</span>
				</a>
	      		<a class="col-lg-4 header-gallery" href="<?php echo get_field('our_ranges_image_link_3', $header_id)['url'];?>" style="background-image:url(<?php echo get_field('our_ranges_image_3', $header_id)['url'];?>)">
				<span>
					<img src="<?php echo get_field('our_ranges_logo_3', $header_id)['url'];?>" width="162" height="185"><br>
					<?php echo get_field('our_ranges_image_text_3', $header_id);?>
				</span>
				</a>
	      	</div>
      	</div>
      	
      	<div class="mobile-menu wrapper">
      	    <a href="<?php echo site_url();?>"><img src="<?php echo get_theme_file_uri('sass/images/pacwest-logo.png');?>" alt="Pac west logo"></a>
      	    <div>
          	    <a href="<?php echo site_url('/?s');?>"><img src="<?php echo get_theme_file_uri('sass/images/search-icon.svg');?>" alt="search icon"></a>
          	    <img class="mobile-menu-icon" src="<?php echo get_theme_file_uri('sass/images/mobile-menu-logo.png');?>" alt="mobile menu icon">
      	    </div>
      	    <ul class="menu-list">
      	        <li><a href="<?php echo site_url('/');?>">HOME</a></li>
  				<li class="our-ranges">
  					<a href="<?php echo site_url('/our-range');?>">OUR RANGES</a>	      					
  				</li>
  				<li><a href="<?php echo site_url('/about-us');?>">ABOUT US</a></li>
  				<li class="recipes-inspiration"><a href="<?php echo site_url('/inspiration');?>">RECIPES & INSPIRATION</a></li>
  				<li><a href="<?php echo site_url('/gallery');?>">GALLERY</a></li>
  				<li><a href="<?php echo site_url('/inspiration/?sort=news');?>">NEWS</a></li>
  				<li><a href="<?php echo site_url('/contact-us');?>">CONTACT</a></li>
      	    </ul>
      	</div>
    </header>

    