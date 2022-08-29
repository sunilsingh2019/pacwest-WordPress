<?php get_header();?>




<h2 class="title mt-50">
    <span class="title-black-avenir">FOOD SERVICE</span>
    <span class="title-blue-authenia">Products</span>
</h2>

<div class="container full-container products-block">
    <div class="row">
        <div class="col-xl-2 col-lg-3 col-md-3 left">

            <h3 class="body-l-bold">SEARCH BY TYPE OF SEAFOOD</h3>

            <div class="button-group seafood filters-button-group">
                <!--<button class="button is-checked" data-filter="*">show all</button>-->
                <button class="button is-checked" data-filter="*">Show all</button>
                <div class="row">

                <?php 
                    $seafoods = get_terms(array('taxonomy'=> 'seafoods','hide_empty' => false, )); 
                    foreach($seafoods as $seafood):
                      $term_id = $seafood->term_id;
                      $icon = get_field( 'icon', 'seafoods_' . $term_id ); 
                      $css_class = get_field( 'css_class', 'seafoods_' . $term_id ); 
                      //var_dump($seafoods);
                      ?>
                    <div class="col-6">
                        <button class="button " data-filter="<?php echo '.' . $seafood->slug;?>" style="background: url(<?php echo $icon['url']; ?>);"><span class="<?php echo $css_class; ?>"><?php echo $seafood->name;?></span></button>
                    </div>
                    <?php endforeach;?>
                   
            </div>
            </div>



            <h3 class="body-l-bold product-filter">FILTER PRODUCTS</h3>
            <ul class="button-group filters-button-group fish-type">
                <li>
                    <h4 class="body-l-bold">Fish type</h4>
                    <button class="button is-checked" data-filter="*">Show all</button>
                    <?php 
                    $fish_types = get_terms(array('taxonomy'=> 'fish_types','hide_empty' => false, )); 
                    foreach($fish_types as $fish_type):?>
                    <hr />
                    <button class="button"
                        data-filter="<?php echo '.' . $fish_type->slug;?>"><?php echo $fish_type->name;?></button>
                    <?php endforeach;?>

                </li>
            </ul>

            <ul class="button-group filters-button-group fish-type">
                <li>
                    <h4 class="body-l-bold">Coating</h4>
                    <button class="button is-checked" data-filter="*">Show all</button>
                    <?php 
                    $coatings = get_terms(array('taxonomy'=> 'coating','hide_empty' => false, )); 
                    foreach($coatings as $coating):?>
                    <hr />
                    <button class="button"
                        data-filter="<?php echo '.' . $coating->slug;?>"><?php echo $coating->name;?></button>
                    <?php endforeach;?>

                </li>
            </ul>

            <ul class="button-group filters-button-group fish-type">
                <li>
                    <h4 class="body-l-bold">Cooking type</h4>
                    <button class="button is-checked" data-filter="*">Show all</button>
                    <?php 
                    $cook_types = get_terms(array('taxonomy'=> 'cook_type','hide_empty' => false, )); 
                    foreach($cook_types as $cook_type):?>
                    <hr />
                    <button class="button"
                        data-filter="<?php echo '.' . $cook_type->slug;?>"><?php echo $cook_type->name;?></button>
                    <?php endforeach;?>
                </li>
            </ul>

        </div>

        <div class="col-xl-10 col-lg-9 col-md-9 right">
            <div class="container">
                <div class="grid">
                    <?php 
                      $products = new WP_Query(array(
                          'posts_per_page' => -1,
                          'post_type' => 'product',       
                          'tax_query'      => array( array(
                            'taxonomy' => 'category',
                            'field'    => 'term_id',
                            'terms'    => array( 3 ), // Term ids to be excluded
                            'operator' => 'NOT IN' // Excluding terms
                          ) ),


                      ));
                      
                      while($products->have_posts()) : $products->the_post();
                          $cats = get_the_terms( get_the_ID(), array( 
                              'taxonomy' => 
                              'fish_types',
                              'seafoods',
                              'coating',
                              'cook_type',
                          ) );
                          $cat_names = array();
                       
                          foreach($cats as $cat){
                              array_push($cat_names, $cat->slug);
                          }
                          $cat_classes = implode(' ', $cat_names);
                      
                       ?>
                    <div class="element-item col-xl-3 col-lg-4 col-md-6 col-12 <?php echo $cat_classes;?>"
                        data-category="transition">
                        <a class="inner-wrapper" href="<?php echo get_permalink();?>"
                            style="background-image:url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full')?>)">
                            <p class="title-s"><?php echo the_title();?></p>
                        </a>
                    </div>


                    <?php endwhile;?>

                </div>

                <div class="btn-center">
                    <a class="button btn-blue-white" id="grid-view-more" target="_blank">VIEW MORE</a>
                </div>

            </div>
        </div>
    </div>
</div>

<?php get_template_part('/template-parts/content-view-wholesalers');?>

<?php get_template_part('/template-parts/content-contact-block');?>

<?php get_footer();?>