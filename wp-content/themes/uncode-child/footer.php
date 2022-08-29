<footer class="footer container full-container">
	<div class="row">
		<div class="col-5 col-md-3 col-lg-2 left">
			<img src="<?php echo get_theme_file_uri('sass/images/pacwest-logo.png');?>" alt="pac west logo">
		</div>
		
		<div class="col-7 col-md-9 col-lg-10 right">
		    <div class="row">
        		<div class="col-md-4 col-lg-4 col-custom-5 pages">
        			<ul>
        				<li>
        					<a href="<?php echo site_url('/');?>">HOME</a>
        				</li>
        				<li>
        					<a href="<?php echo site_url('/about-us');?>">ABOUT US</a>
        				</li>
        				<li>
        					<a href="<?php echo site_url('/inspiration');?>">INSPIRATION</a>
        				</li>
        				<li>
        					<a href="<?php echo site_url('/gallery');?>">GALLERY</a>
        				</li>
        				<li>
        					<a href="<?php echo site_url('/inspiration/?sort=news');?>">NEWS</a>
        				</li>
        				<li>
        					<a href="<?php echo site_url('/contact-us');?>">CONTACT</a>
        				</li>
        			</ul>
        		</div>
        		
        		<div class="col-md-4 col-lg-4 col-custom-5 range">
        			<h3>OUR RANGES</h3>
        			<ul>
        			<?php
        				$ranges = new WP_Query(array(
        					'posts_per_page' => -1,
        					'post_type' => 'range'
        				));
        
        				while($ranges->have_posts()):
        					$ranges->the_post();
        				?>
        
        					<li>
        						<a href="<?php echo get_permalink();?>"><?php echo get_the_title();?></a>
        					</li>					
        
        				<?php endwhile;?>
        				
        				<li><a href="<?php echo site_url('/food-service-products');?>">FOOD SERVICE</a></li>
        				<li><a href="<?php echo site_url('/at-home-products');?>">AT HOME</a></li>
        			
        			</ul>
        		</div>
        		
        		<div class="col-md-4 col-lg-4 col-custom-5">
        			<h3>RECIPES</h3>
        			<ul>
        			<?php
        				$ranges = new WP_Query(array(
        					'posts_per_page' => -1,
        					'post_type' => 'range'
        				));
        
        				while($ranges->have_posts()):
        					$ranges->the_post();
        				?>
        
        					<li>
        						<a href="<?php echo get_permalink();?>"><?php echo get_the_title();?></a>
        					</li>					
        
        				<?php endwhile;?>
        				
        				<li><a href="">FOOD SERVICE</a></li>
        				<li><a href="">AT HOME</a></li>
        			
        			</ul>
        		</div>
        		
        		<div class="col-md-4 col-lg-4 col-custom-5">
        		    <h3>TRENDS</h3>
        		    <ul>
            		    <li><a href="">FOOD SERVICE</a></li>
            			<li><a href="">AT HOME</a></li>
        			</ul>
        		</div>
        		
        		<div class="col-md-4 col-lg-2 col-custom-5 contact-info">
        			<table>
        				<tr>
        					<td>NSW</td>
        					<td>1800 888 388</td>
        				</tr>
        				<tr>
        					<td>QLD</td>
        					<td>07 3890 1171</td>
        				</tr>
        				<tr>
        					<td>VIC/TAS</td>
        					<td>03 9872 3071</td>
        				</tr>
        				<tr>
        					<td>SA/NT</td>
        					<td>0417 879 770</td>
        				</tr>
        				<tr>
        					<td>WA</td>
        					<td>0487 771 178</td>
        				</tr>
        			</table>
        			<p class="body-l">Copyright Pacific West Foods Australia Pty Ltd. All rights reserved.</p>
        			<a class="body-l">Terms & conditions</a>
        			<a class="body-l">Privacy Policy</a>
        		</div>
    		</div>
    	</div>
	</div>

	
</footer>

<?php wp_footer();?>
</body>
</html>