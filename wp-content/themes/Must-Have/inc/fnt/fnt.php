<?php

/************* General wordpress ************/
the_post_thumbnail();
the_post_thumbnail('thumbnail');       
the_post_thumbnail('medium');          
the_post_thumbnail('large');           
the_post_thumbnail('full');            

add_theme_support( 'post-thumbnails' );
the_post_thumbnail( array(100,100) ); 
set_post_thumbnail_size( 1568, 9999 );

// Add default posts and comments RSS feed links to head.
add_theme_support( 'automatic-feed-links' );

/*
 * Let WordPress manage the document title.
 * By adding theme support, we declare that this theme does not use a
 * hard-coded <title> tag in the document head, and expect WordPress to
 * provide it for us.
 *
 */add_theme_support( 'title-tag' );

/*
 * Enable support for Post Thumbnails on posts and pages.
*
* @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
 */
add_theme_support( 'post-thumbnails' );

    // This theme uses wp_nav_menu() in one location.
register_nav_menus( array(
	'primary' => __( 'Primary Menu', 'store' ),
	'top' => __( 'Top Menu', 'store' ),
) );

/*
 * Switch default core markup for search form, comment form, and comments
 * to output valid HTML5.
 */
add_theme_support( 'html5', array(
	'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
) );

/*
 * Enable support for Post Formats.
 * See http://codex.wordpress.org/Post_Formats
 */
add_theme_support( 'post-formats', array(
    'aside', 'image', 'video', 'quote', 'link',
) );

// Set up the WordPress core custom background feature.
add_theme_support( 'custom-background', apply_filters( 'store_custom_background_args', array(
    'default-color' => 'f7f5ee',
    'default-image' => '',
) ) );

add_image_size('store-sq-thumb', 600,600, true );
add_image_size('store-thumb', 540,450, true );
add_image_size('pop-thumb',542, 340, true );

//Declare woocommerce support
add_theme_support('woocommerce');
add_theme_support( 'wc-product-gallery-lightbox' );

/*****************Widge ************************/
function dosher_widgets_init() {

  register_sidebar(
    array(
      'name'          => __( 'Footer', 'Dosher' ),
      'id'            => 'sidebar-1',
      'description'   => __( 'Add widgets here to appear in your footer.', 'Dosher' ),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>',
    )
  );

}
add_action( 'widgets_init', 'dosher_widgets_init' );

/****************Excerpt general****************/

function excerpt($limit) {
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt)>=$limit) {
		array_pop($excerpt);
		$excerpt = implode(" ",$excerpt).'...';
	} else {
		$excerpt = implode(" ",$excerpt);
	}
	$excerpt = preg_replace('`[[^]]*]`','',$excerpt);
	return $excerpt;
}

/******************Excerp*****************/
function cut_text($text, $le) 
{ 
   $points = "...";
   $words = explode(' ', $text); 
   if (count($words) > $le) 
   { 
     return implode(' ', array_slice($words, 0, $le)) ." ". $points; 
   } else
         {
           return $text; 
         } 
}

/************* Content *******************************/
function content($id,$type){
    global $wpdb;
    $result = $wpdb->get_results ("SELECT * FROM ".$wpdb->prefix."posts where ID = '$id' and post_type = '$type'");
    foreach ( $result as $page )
    {   
      return $page->post_content;
    }  
}

/***************** Meta *****************/
function meta_value( $meta_key, $post_id ){
            global $wpdb;  
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."postmeta WHERE meta_key = '$meta_key' and post_id = '$post_id'"); 
              foreach($result_link as $r)
              {
                      $value = $r->meta_value;                      
              }
              $value = str_replace("\n", "<br>", $value); 
              return $value;

}

/***************** Meta IMG *****************/
function meta_value_img( $meta_key, $post_id ){
            global $wpdb;  
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."postmeta WHERE meta_key = '$meta_key' and post_id = '$post_id'"); 
              foreach($result_link as $r)
              {
                      $value = $r->meta_value;                      
              }
              $result_link1 = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."posts WHERE ID = '$value'"); 
              foreach($result_link1 as $r1)
               {
                      $value_img = $r1->guid;                      
              }              
              return $value_img;

}

/***************** Termmeta *****************/
function termmeta_value( $meta_key, $post_id ){
            global $wpdb;  
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."termmeta WHERE meta_key = '$meta_key' and term_id = '$post_id'"); 
              foreach($result_link as $r)
              {
                      $value = $r->meta_value;                      
              }
              $value = str_replace("\n", "<br>", $value); 
              return $value;

}

/***************** User Meta *****************/
function usermeta_value( $meta_key, $user_id ){
            global $wpdb;  
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."usermeta WHERE meta_key = '$meta_key' and user_id = '$user_id'"); 
              foreach($result_link as $r)
              {
                      $value = $r->meta_value;                      
              }
              return $value;

}

/***************** Category Child *****************/
function category_child( $term_id ){
            global $wpdb;  
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."term_taxonomy WHERE term_id = '$term_id'"); 
              foreach($result_link as $r)
              {
                      $value = $r->parent;                      
              }
              return $value;

}

?>