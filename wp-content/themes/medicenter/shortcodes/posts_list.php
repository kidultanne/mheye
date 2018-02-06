<?php
function custom_posts_list($atts) {
   global $themename;
   extract(shortcode_atts(array(
      'posts' =>5,
   ), $atts));
 
   $return_string = '<ul>';
   $args = array(
      'showposts'=>$posts,
      'tag'=>'mhnews',
      'post_type' =>'post', 
      'post_status' =>'publish',      
      'post_type' =>'post', 
      'orderby' => 'date',
      'order' =>'DESC',    
      );
   query_posts($args);
   if (have_posts()) :
      while (have_posts()) : the_post();
         $return_string .= '<li><a href="'.get_permalink().'">· '.get_the_title().'</a><span>'. mb_strtoupper(date_i18n("Y-m-d", get_post_time())) . '</span></li>';
      endwhile;
   endif;
   $return_string .= '</ul>';
 
   wp_reset_query();
   return $return_string;
}


function register_shortcodes(){
   add_shortcode('posts_list', 'custom_posts_list');
}
add_action( 'init', 'register_shortcodes');


?>