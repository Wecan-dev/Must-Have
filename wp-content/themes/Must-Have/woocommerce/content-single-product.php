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

