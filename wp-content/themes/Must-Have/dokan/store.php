<?php
/**
 * The Template for displaying all single posts.
 *
 * @package dokan
 * @package dokan - 2014 1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$store_user   = dokan()->vendor->get( get_query_var( 'author' ) );
$store_tabs               = dokan_get_store_tabs( $store_user->get_id() );
$is_logged_in = is_user_logged_in();
$store_info   = $store_user->get_shop_info();
$map_location = $store_user->get_location();
$layout       = get_theme_mod( 'store_layout', 'left' );
$seller_id = get_post_field( 'post_author', $product_id );
$order_count = dokan_count_orders( $seller_id );
$post_counts  = dokan_count_posts( 'product', $seller_id );
$followers = $wpdb->get_results(
    $wpdb->prepare(
          "select follower_id, vendor_id, followed_at"
        . " from {$wpdb->prefix}dokan_follow_store_followers"
        . " where vendor_id = %d"
        . "     and unfollowed_at is null",
        $store_user->{'id'}
    ),
    OBJECT_K
);
$contador = count($followers);

get_header( 'shop' );

if ( function_exists( 'yoast_breadcrumb' ) ) {
    yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
}
?>
    <?php do_action( 'woocommerce_before_main_content' ); ?>


<section>
    <div class="navSeller">
        <div class="main-navSeller">
            <div class="main-navSeller__content">
                <div class="main-navSeller__img">
                    <img src="<?php echo esc_url( $store_user->get_avatar() ) ?>"
                                alt="<?php echo esc_attr( $store_user->get_shop_name() ) ?>"
                                size="150">
                </div>
                <div class="main-navSeller__text">
                    <div class="main-navSeller__items">
                        <div class="item-navSeller__content">
                            <div class="item-navSeller__name">
                                <p><?php echo esc_html( $store_user->get_shop_name() ); ?></p>
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
                                <span><?php echo esc_attr( $order_count->{'wc-completed'} ); ?></span><p>ventas</p>
                            </div>
                        </div>
                        <div class="item-navSeller__numbers">
                            <a href="#" class="item-navSeller__numbers--items active">
                                <span><?php echo esc_attr( $post_counts->total ); ?></span><p>Productos</p>
                            </a>
                            <a href="#" class="item-navSeller__numbers--items">
                                <span><?php $wishlist_count = YITH_WCWL()->count_products(); echo esc_html( $wishlist_count ); ?></span><p>Favoritos</p>
                            </a>
                            <a href="#" class="item-navSeller__numbers--items">
                                <span>2</span><p>Siguiendo</p>
                            </a>
                            <a href="#" class="item-navSeller__numbers--items">
                                <span><?php echo $contador; ?></span><p>Seguidores</p>
                            </a>
                        </div>
                    </div>
                    <div class="main-navSeller__redes">
                        <div class="main-navSeller__redes--follow">
                            <a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i>Compartir</a>
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
                            <a href="#"><i class="fa fa-user-plus" aria-hidden="true"></i>Seguir</a>
                        </div>
                        <div class="main-navSeller__redes--solic">
                            <a  data-toggle="modal" data-target="#serviceModal"><i class="fa fa-user-circle-o" aria-hidden="true"></i>Solicitud de servicio</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="serviceModal" tabindex="-1" role="dialog" aria-labelledby="serviceModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
 
      <div class="modal-body">
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <?php echo FrmFormsController::get_form_shortcode( array( 'id' => 3, 'title' => false, 'description' => false ) ); ?>
      </div>
    </div>
  </div>
</div>

    <div class="dokan-store-wrap layout-<?php echo esc_attr( $layout ); ?>">

        <?php if ( 'left' === $layout ) { ?>
            <?php dokan_get_template_part( 'store', 'sidebar', array( 'store_user' => $store_user, 'store_info' => $store_info, 'map_location' => $map_location ) ); ?>
        <?php } ?>

        <div id="dokan-primary" class="dokan-single-store">
            <div id="dokan-content" class="store-page-wrap woocommerce" role="main">

                <?php dokan_get_template_part( 'store-header' ); ?>

                <?php do_action( 'dokan_store_profile_frame_after', $store_user->data, $store_info ); ?>

                <?php if ( have_posts() ) { ?>

                    <div class="seller-items">
						<div class="main-listProducts__title">
								<p>Productos</p>
							</div>
                        <?php woocommerce_product_loop_start(); ?>
							
                            <?php while ( have_posts() ) : the_post(); ?>

                                <div class="main-listProducts__item ">  
						<div class="main-listProducts__img">
							<a href="<?php the_permalink(); ?>" class="main-listProducts__img--content">
								<img src="<?php the_post_thumbnail_url('full');?>" alt="">
							</a>
							<div class="btn-wishlist">
								<a href="#"><?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?></a>
							</div>
						</div> 
						<div class="main-listProducts__text">
							<div class="text-listProducts__name">
								<p><?php the_title() ?></p>
							</div>
							<div class="text-listProducts__price">
								<p><?php echo $product->get_price_html(); ?></p>
							</div>
							<a href="<?php the_permalink(); ?>" class="text-listProducts__btn">Comprar</a>
						</div>
						<!--<a href="?add_to_wishlist=<?php echo get_the_ID(); ?>" class="block2-btn-addwishlist hov-pointer trans-0-4">
							<i class="fa fa-heart" aria-hidden="true"></i>
							<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
						</a> -->
					</div>

                            <?php endwhile; // end of the loop. ?>

                        <?php woocommerce_product_loop_end(); ?>

                    </div>

                    <?php dokan_content_nav( 'nav-below' ); ?>

                <?php } else { ?>

                    <p class="dokan-info"><?php esc_html_e( 'No products were found of this vendor!', 'dokan-lite' ); ?></p>

                <?php } ?>
            </div>

        </div><!-- .dokan-single-store -->

        <?php if ( 'right' === $layout ) { ?>
            <?php dokan_get_template_part( 'store', 'sidebar', array( 'store_user' => $store_user, 'store_info' => $store_info, 'map_location' => $map_location ) ); ?>
        <?php } ?>

    </div><!-- .dokan-store-wrap -->




    <?php do_action( 'woocommerce_after_main_content' ); ?>

<?php get_footer( 'shop' ); ?>
