<?php get_header();?>

<?php
while ( have_posts() ) : the_post();
    $banner = get_field('top_banner_image');
    $title1 = get_field('title_1');
    $title2 = get_field('title_2');
    $brochure = get_field('product_brochure');
    $package_image = get_field('package_image');
    $features_benefits = get_field('features_benefits');
?>

<div class="top-banner">
    <?php if($banner){ ?>
        <img src="<?php echo $banner['url']?>" alt="product top banner">
    <?php }else{ ?>
        <img src="<?php echo get_theme_file_uri('images/Mahi-Mahi-Fillet-and-portion.png');?>" alt="product top banner">
    <?php } ?>
</div>

<div class="container">
    <div class="content">
        <h1 class=" title">
        	<span class="title1 title-black-avenir"><?php echo $title1; ?></span>
        	<span class="title-blue-authenia"><?php echo $title2; ?></span>
        </h1>
        
        <?php the_content(); ?>
        
        <h3 class="title-m-bold features">FEATURES & BENEFITS</h3>
        <p class="body-l"><?php echo $features_benefits;?></p>
        
        <a class="button btn-black-white" href="<?php echo $brochure['url']?>" target="_blank">DOWNLOAD BROCHURE</a>
        
    </div>
    
    <div class="specs-title-wrapper">
        <img src="<?php echo $package_image['url'];?>" alt="package image">
        <div class="specs-title">
            <h2 class="title-m-bold">PURCHASE SPECS</h2>
            <p class="body-l"><a>Contact a wholesaler</a> to purchase our products</p>  
        </div>
    </div>
    
    <?php if( have_rows('product_variations') ): ?>
            <table class="variations">
                <tr>
                    <th>Name</th>
                    <th>Unit</th>
                    <th>Pack</th>
                    <th>Pack Type</th>
                    <th>Imported/Local</th>
                    <th>Brand</th>
                </tr>
        <?php while( have_rows('product_variations') ) : the_row();

                $name= get_sub_field('name');
                $unit= get_sub_field('unit');
                $pack= get_sub_field('pack');
                $pack_type= get_sub_field('pack_type');
                $importlocal= get_sub_field('importlocal');
                $brand= get_sub_field('brand');
                
    ?>            
                <tr>
                    <td><?php echo $name;?></td>
                    <td><?php echo $unit;?></td>
                    <td><?php echo $pack;?></td>
                    <td><?php echo $pack_type;?></td>
                    <td><?php echo $importlocal;?></td>
                    <td><?php echo $brand;?></td>
                </tr>
            <?php endwhile;?>
        
            </table>
    <?php else : ?>
           
        
    <?php endif;?>
    
</div>

<?php endwhile; ?>

<h2 class=waterfall-title>
	<span class="title-light">PRODUCT</span>
	<span class="title-blue-authenia">Gallery</span>
</h2>

<?php waterfall_tiles(array(
			'post_type' => 'recipe',
			'posts_per_page' => 8			
));?>

<h2 class="popular title">
	<span class="title-black-avenir">OTHER</span>
	<span class="title-blue-authenia">Products</span>
</h2>

<?php get_template_part('/template-parts/content-popular-products');?>

<?php get_template_part('/template-parts/content-view-wholesalers');?>

<?php get_template_part('/template-parts/content-contact-block');?>

<?php get_footer();?>