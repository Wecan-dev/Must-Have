<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );
get_header( 'shop' );
if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>

<div class="content-singleProducto">

	<div class="singleProducto--content" id="product-<?php the_ID(); ?>" class="d-flex" <?php wc_product_class( '', $product ); ?>>

		<?php
		/**
		 * Hook: woocommerce_before_single_product_summary.
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );
		?>

		<div class="summary entry-summary">
			<?php
			/**
			 * Hook: woocommerce_single_product_summary.
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 * @hooked WC_Structured_Data::generate_product_data() - 60
			 */
			do_action( 'woocommerce_single_product_summary' );
			?>
		</div>

		<?php
		/**
		 * Hook: woocommerce_after_single_product_summary.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
		?>
	</div>
</div>
<?php
/**
 * The Template for displaying all single posts.
 *
 * @package dokan
 * @package dokan - 2014 1.0
 */


$store_user   = dokan()->vendor->get( get_query_var( 'author' ) );
$store_info   = $store_user->get_shop_info();
$map_location = $store_user->get_location();
$layout       = get_theme_mod( 'store_layout', 'left' );



?>
   



<?php global $product;
$store_user   = dokan()->vendor->get( get_query_var( 'author' ) );
$author     = get_user_by( 'id', $product->post->post_author );
$store_info = dokan_get_store_info( $author->ID );

?>

<div class="dokan-profile-frame-wrapper">
    <div class="profile-frame<?php echo esc_attr( $no_banner_class ); ?>">

        <div class="profile-info-box profile-layout-<?php echo esc_attr( $profile_layout ); ?>">
            <div class="profile-info-summery-wrapper dokan-clearfix">
                <div class="profile-info-summery">
                    <div class="profile-info-head">
                        <div class="profile-img <?php echo esc_attr( $profile_img_class ); ?>">
                            <?php echo get_avatar( get_the_author_email(), $author_id ); ?>
                        </div>                
                            <h1 class="store-name"><?php echo esc_html( $store_info['store_name'] ); ?></h1>
                    </div>

                    <div class="profile-info">
        
                        <ul class="dokan-store-info">
                            
                            

                            <li class="dokan-store-rating">
                            <?php 
                            $estrella = dokan_get_readable_seller_rating( $author->ID )
                            ?>
                                <i class="fa fa-star"></i>
                                <?php echo wp_kses_post( dokan_get_readable_seller_rating( $author->ID ) ); ?>
                               <?php if( $width == 50) {echo '<i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i>';}?>

                            </li>
                            <script>
                                
                            </script>
                            <?php if ( $show_store_open_close == 'on' && $dokan_store_time_enabled == 'yes') : ?>
                                <li class="dokan-store-open-close">
                                    <i class="fa fa-shopping-cart"></i>
                                    <?php if ( dokan_is_store_open( $store_user->get_id() ) ) {
                                        echo esc_attr( $store_open_notice );
                                    } else {
                                        echo esc_attr( $store_closed_notice );
                                    } ?>
                                </li>
                            <?php endif ?>

                            <?php do_action( 'dokan_store_header_info_fields',  $author->ID ); ?>
                        </ul>

                        <?php if ( $social_fields ) { ?>
                            <div class="store-social-wrapper">
                                <ul class="store-social">
                                    <?php foreach( $social_fields as $key => $field ) { ?>
                                        <?php if ( !empty( $social_info[ $key ] ) ) { ?>
                                            <li>
                                                <a href="<?php echo esc_url( $social_info[ $key ] ); ?>" target="_blank"><i class="fa fa-<?php echo esc_attr( $field['icon'] ); ?>"></i></a>
                                            </li>
                                        <?php } ?>
                                    <?php } ?>
                                </ul>
                            </div>
                        <?php } ?>

                    </div> <!-- .profile-info -->
                </div><!-- .profile-info-summery -->
            </div><!-- .profile-info-summery-wrapper -->
        </div> <!-- .profile-info-box -->
    </div> <!-- .profile-frame -->

    <?php if ( $store_tabs ) { ?>
        <div class="dokan-store-tabs<?php echo esc_attr( $no_banner_class_tabs ); ?>">
            <ul class="dokan-list-inline">
                <?php foreach( $store_tabs as $key => $tab ) { ?>
                    <?php if ( $tab['url'] ): ?>
                        <li><a href="<?php echo esc_url( $tab['url'] ); ?>"><?php echo esc_html( $tab['title'] ); ?></a></li>
                    <?php endif; ?>
                <?php } ?>
                <?php do_action( 'dokan_after_store_tabs', $store_user->get_id() ); ?>
            </ul>
        </div>
    <?php } ?>
</div>
        <span class="details">
            <?php printf( '<a href="%s">%s</a>', dokan_get_store_url( $author->ID ), $store_info['store_name'] ); ?>
        </span>
<?php 
     echo get_avatar( get_the_author_email(), $author_id );
     
?>


<section>
    <div class="navSeller singleProducto-navSeller">
        <div class="main-navSeller">
            <div class="main-navSeller__content">
                <div class="main-navSeller__img">
                    <img src="<?php echo get_template_directory_uri();?>/assets/img/image-team1.png" alt="">
                </div>
                <div class="main-navSeller__text">
                    <div class="main-navSeller__items">
                        <div class="item-navSeller__content">
                            <div class="item-navSeller__name">
                                <p>Carmen Sánchez</p>
                            </div>
                            <div class="item-navSeller__stars">
                                <div class="item-navSeller__stars--can">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                                <div class="item-navSeller__stars--number">
                                    <p>[15]</p>
                                </div>
                            </div>
                            <div class="item-navSeller__sellers">
                                <span>278</span><p>ventas</p>
                            </div>
                        </div>
                        <div class="item-navSeller__numbers">
                            <a href="#" class="item-navSeller__numbers--items active">
                                <span>24</span><p>Ventas</p>
                            </a>
                            <a href="#" class="item-navSeller__numbers--items">
                                <span>17</span><p>Seguidores</p>
                            </a>
                            <a href="#" class="item-navSeller__numbers--items">
                                <span>2</span><p>Productos</p>
                            </a>
                        </div>
                    </div>
                    <div class="main-navSeller__redes">
                        <div class="main-navSeller__redes--follow">
                            <a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i>Compartir</a>
                            <a href="#"><i class="fa fa-user-plus" aria-hidden="true"></i>Seguir</a>
                        </div>
                        <div class="main-navSeller__redes--solic">
                            <a href="#"><i class="fa fa-user-circle-o" aria-hidden="true"></i>Solicitud de servicio</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navSeller-comments container">
                <div class="navSeller-comments__content">
                    <div class="navSeller-comments__title">
                        <p>Últimas calificaciones</p>
                    </div>
                    <div class="navSeller-comments__items">
                        <div class="navSeller-comments__img">
                            <img src="<?php echo get_template_directory_uri();?>/assets/img/image-team1.png" alt="">
                        </div>
                        <div class="navSeller-comments__text">
                            <div class="navSeller-comments__name">
                                <p>Carmen Sánchez</p>
                            </div>
                            <div class="navSeller-comments__stars">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <div class="navSeller-comments__stars--number">
                                    <p>[15]</p>
                                </div>
                            </div>
                            <div class="navSeller-comments__commet">
                                <p>Hermoso el bolso</p>
                            </div>
                        </div>
                    </div>
                    <div class="navSeller-comments__items">
                        <div class="navSeller-comments__img">
                            <img src="<?php echo get_template_directory_uri();?>/assets/img/image-team1.png" alt="">
                        </div>
                        <div class="navSeller-comments__text">
                            <div class="navSeller-comments__name">
                                <p>Carmen Sánchez</p>
                            </div>
                            <div class="navSeller-comments__stars">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <div class="navSeller-comments__stars--number">
                                    <p>[15]</p>
                                </div>
                            </div>
                            <div class="navSeller-comments__commet">
                                <p>Hermoso el bolso</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="navSeller-comments__btn">
                    <a href="#">Ir al closet</a>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="">
    <div class="listProducts">
        <div class="main-listProducts">
            <div class="main-listProducts__title">
                <p>Productos relacionados</p>
            </div>
            <div class="slider-listProducts__content">
                <div class="main-listProducts__item">  
                    <div class="main-listProducts__img">
                        <a href="#" class="main-listProducts__img--content">
                            <img src="<?php echo get_template_directory_uri();?>/assets/img/slider-vendido1.png" alt="">
                        </a>
                        <div class="btn-wishlist">
                            <a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a>
                        </div>
                    </div> 
                    <div class="main-listProducts__text">
                        <div class="text-listProducts__name">
                            <p>Chaqueta estampada</p>
                        </div>
                        <div class="text-listProducts__price">
                            <p>$300.000</p>
                        </div>
                        <a href="#" class="text-listProducts__btn">Comprar</a>
                    </div>
                </div>
                <div class="main-listProducts__item">  
                    <div class="main-listProducts__img">
                        <a href="#" class="main-listProducts__img--content">
                            <img src="<?php echo get_template_directory_uri();?>/assets/img/slider-vendido1.png" alt="">
                        </a>
                        <div class="btn-wishlist">
                            <a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a>
                        </div>
                    </div> 
                    <div class="main-listProducts__text">
                        <div class="text-listProducts__name">
                            <p>Chaqueta estampada</p>
                        </div>
                        <div class="text-listProducts__price">
                            <p>$300.000</p>
                        </div>
                        <a href="#" class="text-listProducts__btn">Comprar</a>
                    </div>
                </div>
                <div class="main-listProducts__item">  
                    <div class="main-listProducts__img">
                        <a href="#" class="main-listProducts__img--content">
                            <img src="<?php echo get_template_directory_uri();?>/assets/img/slider-vendido1.png" alt="">
                        </a>
                        <div class="btn-wishlist">
                            <a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a>
                        </div>
                    </div> 
                    <div class="main-listProducts__text">
                        <div class="text-listProducts__name">
                            <p>Chaqueta estampada</p>
                        </div>
                        <div class="text-listProducts__price">
                            <p>$300.000</p>
                        </div>
                        <a href="#" class="text-listProducts__btn">Comprar</a>
                    </div>
                </div>
                <div class="main-listProducts__item">  
                    <div class="main-listProducts__img">
                        <a href="#" class="main-listProducts__img--content">
                            <img src="<?php echo get_template_directory_uri();?>/assets/img/slider-vendido1.png" alt="">
                        </a>
                        <div class="btn-wishlist">
                            <a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a>
                        </div>
                    </div> 
                    <div class="main-listProducts__text">
                        <div class="text-listProducts__name">
                            <p>Chaqueta estampada</p>
                        </div>
                        <div class="text-listProducts__price">
                            <p>$300.000</p>
                        </div>
                        <a href="#" class="text-listProducts__btn">Comprar</a>
                    </div>
                </div>
                <div class="main-listProducts__item">  
                    <div class="main-listProducts__img">
                        <a href="#" class="main-listProducts__img--content">
                            <img src="<?php echo get_template_directory_uri();?>/assets/img/slider-vendido1.png" alt="">
                        </a>
                        <div class="btn-wishlist">
                            <a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a>
                        </div>
                    </div> 
                    <div class="main-listProducts__text">
                        <div class="text-listProducts__name">
                            <p>Chaqueta estampada</p>
                        </div>
                        <div class="text-listProducts__price">
                            <p>$300.000</p>
                        </div>
                        <a href="#" class="text-listProducts__btn">Comprar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<?php do_action( 'woocommerce_after_single_product' ); ?>
