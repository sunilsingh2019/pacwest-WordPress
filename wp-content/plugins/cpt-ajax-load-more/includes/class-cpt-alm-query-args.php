<?php

defined( 'ABSPATH' ) || exit;

/**
 * CPT_ALM_Query_Args Class.
 */

class CPT_ALM_Query_Args {

	 public static function cpt_alm_build_queryargs($a){

	 	   $post_type = (isset($a['post_type'])) ? $a['post_type'] : 'post';

	 	   // Posts Per Page
      	$posts_per_page = (isset($a['posts_per_page'])) ? $a['posts_per_page'] : 5;

      	// Offset
   		$offset = (isset($a['offset'])) ? $a['offset'] : 0;

	 	   // Ordering
   		$order = (isset($a['order'])) ? $a['order'] : 'DESC';
   		$orderby = (isset($a['orderby'])) ? $a['orderby'] : 'date';

   		// Post Status
   		$post_status = (isset($a['post_status'])) ? $a['post_status'] : 'publish';
   		if(empty($post_status))
   			$post_status = 'publish';   		
   		if($post_status != 'publish' && $post_status != 'inherit'){
      		// If not 'publish', confirm user has rights to view these old posts.
      		if (current_user_can( 'edit_theme_options' )){
         		$post_status = $post_status;
            } else {
               $post_status = 'publish';
            }
        }

        $category = (isset($a['category'])) ? $a['category'] : '';
   		$category__and = (isset($a['category__and'])) ? $a['category__and'] : '';   		
   		$category__not_in = (isset($a['category__not_in'])) ? $a['category__not_in'] : '';


   		// Tags
   		$tag = (isset($a['tag'])) ? $a['tag'] : '';
   		$tag__and = (isset($a['tag__and'])) ? $a['tag__and'] : '';
   		$tag__not_in = (isset($a['tag__not_in'])) ? $a['tag__not_in'] : '';
   		
   		// Taxonomy
   		$taxonomy = (isset($a['taxonomy'])) ? $a['taxonomy'] : '';
   		$taxonomy_terms = (isset($a['taxonomy_terms'])) ? $a['taxonomy_terms'] : '';
   		$taxonomy_operator = (isset($a['taxonomy_operator'])) ? $a['taxonomy_operator'] : '';
   		if(empty($taxonomy_operator))
   			$taxonomy_operator = 'IN';
   		$taxonomy_relation = (isset($a['taxonomy_relation'])) ? $a['taxonomy_relation'] : 'AND';
   		if(empty($taxonomy_relation))
   			$taxonomy_relation = 'AND';


		$args = array(
			'post_type' => explode(',',$post_type),
			'posts_per_page' => $posts_per_page,
			'offset' => $offset,
			'order' => $order,
			'orderby' => $orderby,		
			'post_status' => $post_status,
		);	


		if(!empty($post_format) || !empty($taxonomy)){      		
      		
            $tax_query_total = count(explode(":", $taxonomy)); // Total $taxonomy objects
            $taxonomy = explode(":", $taxonomy); // convert to array
            $taxonomy_terms = explode(":", $taxonomy_terms); // convert to array
            $taxonomy_operator = explode(":", $taxonomy_operator); // convert to array            
            
            if(empty($taxonomy)){
               
               // Post Format only
               $args['tax_query'] = array(
      			   alm_get_post_format($post_format),
      			);   
      			            
            }else{
               
           		// Post Formats            
				$args['tax_query'] = array(
					'relation' => $taxonomy_relation,
					alm_get_post_format($post_format)
				);					
				
				// Loop Taxonomies					
				for($tax_i = 0; $tax_i < $tax_query_total; $tax_i++){
					$args['tax_query'][] = alm_get_taxonomy_query($taxonomy[$tax_i], $taxonomy_terms[$tax_i], $taxonomy_operator[$tax_i]);
				}
					
   			}
   			
   	   }	
   	   
   	   // Category
   		if(!empty($category)){
   			$args['category_name'] = $category;
   		}
   		if(!empty($category__and)){
   			$args['category__and'] = explode(",", $category__and);
   		}
         
         // Category Not In
   		if(!empty($category__not_in)){
   		   $exclude_cats = explode(",",$category__not_in);
   			$args['category__not_in'] = $exclude_cats;
   		}
         
         // Tag
   		if(!empty($tag)){
   			$args['tag'] = $tag;
   		} 	
   		if(!empty($tag__and)){
   			$args['tag__and'] = explode(",", $tag__and);
   		} 		 
         
         // Tag Not In
   		if(!empty($tag__not_in)){
   		   $exclude_tags = explode(",",$tag__not_in);
   			$args['tag__not_in'] = $exclude_tags;
   		}

		return $args;
	 }
}