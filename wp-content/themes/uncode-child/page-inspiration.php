<?php get_header();?>


<h1 class="title">
    <span class="title-black-avenir">Pacific West</span>
    <span class="title-blue-authenia">Inspiration</span>
</h1>

<div class="waterfall inspiration__page">
    <div class="on-page-search">
        <img src="<?php echo get_theme_file_uri('sass/images/search-icon.svg');?>" alt="search icon">
        <form method="GET" id="" class="sort">
            <input id="grid__search" type="search" class="body-m" name="filter"
                placeholder="Search by recipe or ingredient">
        </form>
    </div>
    <div class="filter__wrap">
         <div class="filter__item ">
             <h5 class="title-s">Filter by type of post</h5>
            <ul class="button-group filters-button-group fish-type">
                <li>
                <button class="button is-checked" data-filter="*">Show all</button>
                <?php 
                    $blog_types = get_terms(array('taxonomy'=> 'blog_type','hide_empty' => false, )); 
                    foreach($blog_types as $blog_type):?>
                    <button class="button"
                        data-filter="<?php echo '.' . $blog_type->slug;?>"><?php echo $blog_type->name;?></button>
                    <?php endforeach;?>
                 
                </li>
            </ul>
        </div>
        <div class="filter__item filter__item--lg">
        <h5 class="title-s">Filter by type of post</h5>
            <div class="button-group seafood filters-button-group">
                
            <?php $seafoods = get_terms(array('taxonomy'=> 'recipe_seafoods','hide_empty' => false, )); 
                    foreach($seafoods as $seafood):
                      $term_id = $seafood->term_id;
                      $icon = get_field( 'icon', 'seafoods_' . $term_id ); 
                      //var_dump($seafoods);
                      $css_class = get_field( 'css_class', 'seafoods_' . $term_id ); 
                      ?>
                        <button class="button fish" data-filter="<?php echo '.' . $seafood->slug;?>" style="background: url(<?php echo $icon['url']; ?>);"><span class="<?php echo $css_class; ?>"><?php echo $seafood->name;?></span></button>
                    <?php endforeach;?>
            </div>
        </div>
       
        
    </div>

    <div class="grid masonry">

            <?php 
                $products = new WP_Query(array(
                    'posts_per_page' => -1,
                    'post_type' => array( 'recipe', 'blog' )       
                    //'cat' => 2,
                ));
                while($products->have_posts()) : $products->the_post();
                $cats = get_the_terms( get_the_ID(), array( 
                    'taxonomy' => 
                    'blog_type',
                    'recipe_seafoods',
                    
                ));
                    $cat_names = array();
                
                    foreach($cats as $cat){
                        array_push($cat_names, $cat->slug);
                    }
                    $cat_classes = implode(' ', $cat_names);

                    $thumbnail_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), '', true); 
                     //var_dump($cat_classes);

                    $recipe_sustainability = get_field('recipe_sustainability');
                    $recipe_species_of_protein = get_field('recipe_species_of_protein');
                    $recipe_country_of_origin = get_field('recipe_country_of_origin');
                ?>
            <div class="element-item item col-xl-3 col-lg-4 col-sm-6 col-12 hvr-bob element-item <?php echo $cat_classes;?>">

            <a href="<?php echo get_the_permalink();?>">
                <img src="<?php echo esc_url( $thumbnail_url[0] ); ?>">
                    <div class="general_info">
                        <div class="post_type body-s">recipe</div>
                        <div class="category body-s">Food Service</div>
                    </div>

                    <div class="wrapper">

                        <h3 class="title-s"><?php the_title(); ?></h3>

                        <div class="post_info container">
                        <?php if($recipe_sustainability): ?>

                            <div class="row">
                                <div class="col-6">Sustainability:</div>
                                <div class="col-6"><?php  echo $recipe_sustainability; ?></div>
                            </div>
                            <?php endif; ?>
                            <?php if($recipe_species_of_protein): ?>
                            <div class="row">
                                <div class="col-6">Species of protein:</div>
                                <div class="col-6"><?php echo $recipe_species_of_protein; ?></div>
                            </div>
                            <?php endif; ?>
                            <?php if($recipe_country_of_origin): ?>
                            <div class="row">
                                <div class="col-6">Country of origin:</div>
                                <div class="col-6"><?php echo $recipe_country_of_origin; ?></div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </a>
            </div>
        <?php endwhile;?>
       
    </div>

    <div class="btn-center">
        <a class="button btn-blue-white" id="grid-view-more" target="_blank">VIEW MORE</a>
    </div>
</div>

<?php get_template_part('/template-parts/content-view-wholesalers');?>

<?php get_template_part('/template-parts/content-contact-block');?>

<?php get_footer();?>