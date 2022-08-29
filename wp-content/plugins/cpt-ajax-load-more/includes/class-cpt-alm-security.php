<?php

defined( 'ABSPATH' ) || exit;

/**
 * CPT_ALM_Security Class.
 */

class CPT_ALM_Security {

   /**
    * Check the security if post or status allow to access via shortcode.
    */

   public static function is_permission($post_type,$post_status) {

      $allow = 1;

      switch (0) {
         case self::allow_post_type(array_map('trim', explode(',',$post_type))):
         $allow = 0;
         break;

         case self::allow_post_status(explode(',',$post_status)):
         $allow = 0;
         break;
      }

      return apply_filters('cpt_alm_secuity_wall',$allow,$post_type,$post_status);

   }
   
	public static function allow_post_type($post_type) {

      $option = get_option('cpt_alm_option');

      if(empty($option['allow_post_type']))
         return 1;

      if(is_array($post_type)){
         foreach ($post_type as $postname) {
            if(!in_array($postname,$option['allow_post_type'])){
               return 0;
            }
         }
      }else{

         if(!in_array($post_type,$option['allow_post_type'])){
            return 0;
         }
      }

      return 1;
   }

   public static function allow_post_status($post_status) {
      
      $option = get_option('cpt_alm_option');
      
      if(empty($option['allow_post_status']))
         return 1;

      $allow_status = explode(',',$option['allow_post_status']);
      foreach ($post_status as $status) {
         if(!in_array($status,$allow_status)){
            return 0;
         }
      }
      return 1;
   }
}