<?php get_header(); ?>

<h1 class=title>
	<span class="title-light">SEARCH</span>
	<span class="title-blue-authenia">Products</span>
</h1>

<div class="on-page-search">
  <i class="fas fa-search" aria-hidden="true"></i>
  <form method="get" id="searchform" action="<?php echo site_url();?>">
	<input type="search" class="body-m" name="s" id="s" placeholder="Search by recipe or ingredient">
</form>
</div>

<div id="content-inner" class="mb-50">

	<?php if ( have_posts() && strlen(get_search_query()) > 0 ) : ?>
	
	
	
	    <h2 class="body-l-bold results-count"><?php echo $wp_query->post_count;?> Results for keyword "<?php echo get_search_query()?>"</h2>
	   
    
		<!--<h2 class="title-green-l"><?php printf( __( 'Search Results: %s'), '<span>' . get_search_query() . '</span>' ); ?></h2>-->
		
        <div class="results">
		<?php while ( have_posts() ) : the_post(); ?>
		
    		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
    		
    		    
    		        <div class="wrapper">
    		            <img src="<?php echo get_the_post_thumbnail_url();?>">
    		            <h2><a class="blue-link" href="<?php echo get_permalink();?>"><?php echo get_the_title();?></a></h2>
    		            <p class="desc"><?php echo get_the_content();?></p>
    		        </div>
    		        
    		 <?php endif; ?>  
		    
	    <?php endwhile; ?>  
		    
	<?php else : ?>
	
	    <?php if ( strlen(get_search_query()) > 0) : ?>

    		<div id="post-0" class="post no-results not-found mt-50">
    
    			<h2 class="title">No Results</h2>
    
    			<div class="post">
    				<p class="body-l"><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.'); ?></p>
    				
    			</div>
    
    		</div>
    		
        <?php else : ?>
        
        <?php endif; ?>	  
	    
	    </div>
		    
	<?php endif; ?>	    
		    
</div>

<?php get_footer(); ?>		    
		    