<?php 


function theme_customize_register($wp_customize){

  $wp_customize->add_panel('panel1',
        array(
            'title' => 'Home',
            'priority' => 1,
            )
        );
  require_once trailingslashit( get_template_directory() ) . 'inc/home/customizer-home-publicidad.php';
  require_once trailingslashit( get_template_directory() ) . 'inc/home/customizer-home-contacto.php';

  $wp_customize->add_panel('panel2',
        array(
            'title' => 'Quienes Somos',
            'priority' => 1,
            )
        );
  require_once trailingslashit( get_template_directory() ) . 'inc/about/customizer-about-banner.php';
  require_once trailingslashit( get_template_directory() ) . 'inc/about/customizer-about-content.php';
  require_once trailingslashit( get_template_directory() ) . 'inc/about/customizer-about-razones.php';

  $wp_customize->add_panel('panel3',
        array(
            'title' => 'Contáctanos',
            'priority' => 1,
            )
        );
  require_once trailingslashit( get_template_directory() ) . 'inc/contact/customizer-contact-banner.php';
  require_once trailingslashit( get_template_directory() ) . 'inc/contact/customizer-contact-content.php';


}
add_action('customize_register','theme_customize_register');


add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
   add_theme_support( 'woocommerce' );
}
//Compatibilidad con galerías a partir de WooCommerce 3.0>
add_action( 'after_setup_theme', 'yourtheme_setup' );
function yourtheme_setup() {
add_theme_support( 'wc-product-gallery-slider' );
}
/**
 * Declare WooCommerce Support
 */
function oblique_woocommerce_support() {
	// add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}
// Register Custom Banner Home
function Banner() {

    $labels = array(
      'name'                  => _x( 'Banner ', 'Post Type General Name', 'must-have' ),
      'singular_name'         => _x( 'Banner', 'Post Type Singular Name', 'must-have' ),
      'menu_name'             => __( 'Banners', 'must-have' ),
      'name_admin_bar'        => __( 'Banners', 'must-have' ),
      'archives'              => __( 'Archivo', 'must-have' ),
      'attributes'            => __( 'Atributos', 'must-have' ),
      'parent_item_colon'     => __( 'Artículo principal', 'must-have' ),
      'all_items'             => __( 'Todos los artículos', 'must-have' ),
      'add_new_item'          => __( 'Agregar ítem nuevo', 'must-have' ),
      'add_new'               => __( 'Añadir nuevo', 'must-have' ),
      'new_item'              => __( 'Nuevo artículo', 'must-have' ),
      'edit_item'             => __( 'Editar elemento', 'must-have' ),
      'update_item'           => __( 'Actualizar artículo', 'must-have' ),
      'view_item'             => __( 'Ver ítem', 'must-have' ),
      'view_items'            => __( 'Ver artículos', 'must-have' ),
      'search_items'          => __( 'Buscar artículo', 'must-have' ),
      'not_found'             => __( 'Extraviado', 'must-have' ),
      'not_found_in_trash'    => __( 'No se encuentra en la basura', 'must-have' ),
      'featured_image'        => __( 'Foto principal', 'must-have' ),
      'set_featured_image'    => __( 'Establecer imagen destacada', 'must-have' ),
      'remove_featured_image' => __( 'Remove featured image', 'must-have' ),
      'use_featured_image'    => __( 'Usar como imagen destacada', 'must-have' ),
      'insert_into_item'      => __( 'Insertar en el elemento', 'must-have' ),
      'uploaded_to_this_item' => __( 'Subido a este artículo', 'must-have' ),
      'items_list'            => __( 'Lista de artículos', 'must-have' ),
      'items_list_navigation' => __( 'Lista de elementos de navegación', 'must-have' ),
      'filter_items_list'     => __( 'Lista de elementos de filtro', 'must-have' ),
    );
    $args = array(
      'label'                 => __( 'Banner Home', 'must-have' ),
      'description'           => __( 'Post Type Description', 'must-have' ),
      'labels'                => $labels,
      'supports'              => array( 'title','editor', 'thumbnail' ),
      'taxonomies'            => array(  ),
      'hierarchical'          => false,
      'public'                => true,
      'show_ui'               => true,
      'show_in_menu'          => true,
      'menu_position'         => 5,
      'menu_icon'             => 'dashicons-images-alt2',
      'show_in_admin_bar'     => true,
      'show_in_nav_menus'     => true,
      'can_export'            => true,
      'has_archive'           => true,
      'exclude_from_search'   => false,
      'publicly_queryable'    => true,
      'capability_type'       => 'page',
    );
    register_post_type( 'Banner', $args );
  
  }
  add_action( 'init', 'Banner', 0 );



  function Team() {

    $labels = array(
      'name'                  => _x( 'Team ', 'Post Type General Name', 'must-have' ),
      'singular_name'         => _x( 'Team', 'Post Type Singular Name', 'must-have' ),
      'menu_name'             => __( 'Nuestro Team', 'must-have' ),
      'name_admin_bar'        => __( 'Nuestro Team', 'must-have' ),
      'archives'              => __( 'Archivo', 'must-have' ),
      'attributes'            => __( 'Atributos', 'must-have' ),
      'parent_item_colon'     => __( 'Artículo principal', 'must-have' ),
      'all_items'             => __( 'Todos los artículos', 'must-have' ),
      'add_new_item'          => __( 'Agregar ítem nuevo', 'must-have' ),
      'add_new'               => __( 'Añadir nuevo', 'must-have' ),
      'new_item'              => __( 'Nuevo artículo', 'must-have' ),
      'edit_item'             => __( 'Editar elemento', 'must-have' ),
      'update_item'           => __( 'Actualizar artículo', 'must-have' ),
      'view_item'             => __( 'Ver ítem', 'must-have' ),
      'view_items'            => __( 'Ver artículos', 'must-have' ),
      'search_items'          => __( 'Buscar artículo', 'must-have' ),
      'not_found'             => __( 'Extraviado', 'must-have' ),
      'not_found_in_trash'    => __( 'No se encuentra en la basura', 'must-have' ),
      'featured_image'        => __( 'Foto principal', 'must-have' ),
      'set_featured_image'    => __( 'Establecer imagen destacada', 'must-have' ),
      'remove_featured_image' => __( 'Remove featured image', 'must-have' ),
      'use_featured_image'    => __( 'Usar como imagen destacada', 'must-have' ),
      'insert_into_item'      => __( 'Insertar en el elemento', 'must-have' ),
      'uploaded_to_this_item' => __( 'Subido a este artículo', 'must-have' ),
      'items_list'            => __( 'Lista de artículos', 'must-have' ),
      'items_list_navigation' => __( 'Lista de elementos de navegación', 'must-have' ),
      'filter_items_list'     => __( 'Lista de elementos de filtro', 'must-have' ),
    );
    $args = array(
      'label'                 => __( 'Team', 'must-have' ),
      'description'           => __( 'Post Type Description', 'must-have' ),
      'labels'                => $labels,
      'supports'              => array( 'title', 'thumbnail' ),
      'taxonomies'            => array(  ),
      'hierarchical'          => false,
      'public'                => true,
      'show_ui'               => true,
      'show_in_menu'          => true,
      'menu_position'         => 5,
      'menu_icon'             => 'dashicons-images-alt2',
      'show_in_admin_bar'     => true,
      'show_in_nav_menus'     => true,
      'can_export'            => true,
      'has_archive'           => true,
      'exclude_from_search'   => false,
      'publicly_queryable'    => true,
      'capability_type'       => 'page',
    );
    register_post_type( 'Team', $args );
  
  }
  add_action( 'init', 'Team', 0 );



/***************** Termmeta *****************/
function termmeta_value( $meta_key, $post_id ){
    global $wpdb;  
      $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."termmeta WHERE meta_key = '$meta_key' and term_id = '$post_id'"); 
      foreach($result_link as $r)
      {
              $value = $r->meta_value;                      
      }
      $result_link1 = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."posts WHERE ID = '$value'"); 
       
      return $value;

}

/***************** Termmeta IMG *****************/
function termmeta_value_img( $meta_key, $post_id ){
    global $wpdb;  
      $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."termmeta WHERE meta_key = '$meta_key' and term_id = '$post_id'"); 
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

// Display the product thumbnail in order view pages
add_filter( 'woocommerce_order_item_name', 'display_product_image_in_order_item', 20, 3 );
function display_product_image_in_order_item( $item_name, $item, $is_visible ) {
    // Targeting view order pages only
    if( is_wc_endpoint_url( 'view-order' ) ) {
        $product   = $item->get_product(); // Get the WC_Product object (from order item)
        $thumbnail = $product->get_image(array( 36, 36)); // Get the product thumbnail (from product object)
        if( $product->get_image_id() > 0 )
            $item_name = '<div class="item-thumbnail">' . $thumbnail . '</div>' . $item_name;
    }
    return $item_name;
}

