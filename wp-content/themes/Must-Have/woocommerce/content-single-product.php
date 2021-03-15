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
 


<?php global $product; global $wpdb;
$store_user   = dokan()->vendor->get( get_query_var( 'author' ) );
$author     = get_user_by( 'id', $product->post->post_author );
$store_info = dokan_get_store_info( $author->ID );
$seller_id = get_post_field( 'post_author', $product_id );
$seller        = get_user_by( 'id', $seller_id );
$order_count = dokan_count_orders( $seller_id );
$post_counts  = dokan_count_posts( 'product', $seller_id );
$followers = $wpdb->get_results(
    $wpdb->prepare(
          "select follower_id, vendor_id, followed_at"
        . " from {$wpdb->prefix}dokan_follow_store_followers"
        . " where vendor_id = %d"
        . "     and unfollowed_at is null",
        $seller_id
    ),
    OBJECT_K
);
$contador = count($followers);
$dokan_template_reviews = dokan_pro()->review;
$id                     = $store_user->ID;
$post_type              = 'product';
$limit                  = 20;
$status                 = '1';
$comments               = $dokan_template_reviews->comment_query( $id, $post_type, $limit, $status );
$commenter = wp_get_current_commenter( $product, 'id');
$product_id = yit_get_prop( $product, 'id' );
if (!comments_open($product_id)) {
    return;
}
global $YWAR_AdvancedReview;
$reviews_count = count( $YWAR_AdvancedReview->get_product_reviews_by_rating( $product_id ) );

?>

<section>
    <div class="navSeller singleProducto-navSeller">
        <div class="main-navSeller">
            <div class="main-navSeller__content">
                <div class="main-navSeller__img">
                <?php  echo get_avatar( get_the_author_email(), $author_id ); ?>
                </div>
                <div class="main-navSeller__text">
                    <div class="main-navSeller__items">
                        <div class="item-navSeller__content">
                            <div class="item-navSeller__name">
                                <p><?php echo esc_html( $store_info['store_name'] ); ?></p>
                            </div>
                            <div class="item-navSeller__stars">
                                <?php echo wp_kses_post( dokan_get_readable_seller_rating( $author->ID ) );?>
                            </div>
                            <div class="item-navSeller__sellers">
                                <span><?php echo esc_attr( $order_count->{'wc-completed'} ); ?></span><p>ventas</p>
                            </div>
                        </div>
                        <div class="item-navSeller__numbers">
                            <a href="#" class="item-navSeller__numbers--items active">
                                <span><?php echo esc_attr( $order_count->{'wc-completed'} ); ?></span><p>Ventas</p>
                            </a>
                            <a href="#" class="item-navSeller__numbers--items">
                                <span><?php echo $contador; ?></span><p>Seguidores</p>
                            </a>
                            <a href="#" class="item-navSeller__numbers--items">
                                <span><?php echo esc_attr( $post_counts->total ); ?></span><p>Productos</p>
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
                    <div class="contentReview-product">
                        <div class="contentReview-product__comments">
                            <?php if ( $reviews_count ) : ?>
                                <?php do_action( 'yith_advanced_reviews_before_review_list', $product ); ?>

                                <ol class="commentlist">
                                    <?php $YWAR_AdvancedReview->reviews_list( $product_id ); ?>
                                </ol>
                            <?php else : ?>

                                <p class="woocommerce-noreviews"><?php _e( 'There are no reviews yet.', 'yith-woocommerce-advanced-reviews' ); ?></p>

                            <?php endif; ?>
                        </div>
                        <div class="contentReview-product__inputs">
                            <?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product_id ) ) : ?>
                                <div id="review_form_wrapper">
                                    <div id="review_form">
                                        <?php

$current_content = $comment_form['comment_field'];
			
//  In case of a page refresh following a reply request, don't add additional fields
$hide_rating = isset( $_REQUEST["replytocom"] ) ? "hide-rating" : '';
$selected    = isset( $_REQUEST["replytocom"] ) ? "selected" : '';


    $comment_form['comment_field'] = '<p class="' . $hide_rating . ' comment-form-rating">
    <label for="rating">' . __( 'hoal Rate', 'yith-woocommerce-advanced-reviews' ) . '</label>
    <select name="rating" id="rating">
                <option value="">' . __( 'Rate&hellip;', 'yith-woocommerce-advanced-reviews' ) . '</option>
                <option value="5">' . __( 'Perfect', 'yith-woocommerce-advanced-reviews' ) . '</option>
                <option value="4">' . __( 'Good', 'yith-woocommerce-advanced-reviews' ) . '</option>
                <option value="3">' . __( 'Average', 'yith-woocommerce-advanced-reviews' ) . '</option>
                <option value="2">' . __( 'Not that bad', 'yith-woocommerce-advanced-reviews' ) . '</option>
                <option value="1" ' . $selected . '>' . __( 'Very Poor', 'yith-woocommerce-advanced-reviews' ) . '</option>';
    
    $comment_form['comment_field'] .= '</select></p>' . $current_content;


                                        $commenter = wp_get_current_commenter();

                                        $comment_form = array(
                                            'title_reply'          => $reviews_count ? __( 'Add a review', 'yith-woocommerce-advanced-reviews' ) : __( 'Be the first to review', 'yith-woocommerce-advanced-reviews' ) . ' &ldquo;' . get_the_title() . '&rdquo;',
                                            'title_reply_to'       => __( 'Write a reply to %s', 'yith-woocommerce-advanced-reviews' ),
                                            'comment_notes_before' => '',
                                            'comment_notes_after'  => '',
                                            'fields'               => array(
                                                'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name', 'yith-woocommerce-advanced-reviews' ) . ' <span class="required">*</span></label> ' .
                                                            '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" aria-required="true" /></p>',
                                                'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Email', 'yith-woocommerce-advanced-reviews' ) . ' <span class="required">*</span></label> ' .
                                                            '<input id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" aria-required="true" /></p>',
                                            ),
                                            'label_submit'         => __( 'Enviar', 'yith-woocommerce-advanced-reviews' ),
                                            'logged_in_as'         => '',
                                            'comment_field'        => ''
                                        );

                                        $comment_form['comment_field'] .= '<p class="comment-form-comment"><label for="comment">' . __( 'Tu comentario', 'yith-woocommerce-advanced-reviews' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>';

                                        $comment_form['comment_field'] .= '<input type="hidden" name="action" value="submit-form" />';
                                        comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
                                        ?>
                                    </div>
                                </div>

                            <?php else : ?>

                                <p class="woocommerce-verification-required"><?php _e( 'Only logged in customers who have purchased this product may write a review.', 'yith-woocommerce-advanced-reviews' ); ?></p>

                            <?php endif; ?>
                        </div>
                    </div>
                    
             
                </div>
                <div class="navSeller-comments__btn">
                    <a  href="<?php echo dokan_get_store_url( $seller_id ) ?>">Ir al closet</a>
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
                <?php $args = array( 'post_type' => 'product', 'posts_per_page' => 6 ); ?>
                <?php $loop = new WP_Query( $args ); ?>
                <?php while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
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
                <?php endwhile ?>
                
            </div>
        </div>
    </div>
</section>


  <?php
$user = wp_get_current_user();
if ( in_array( 'seller', (array) $user->roles ) ) {
    //The user has the "author" role
    echo do_shortcode('[favorite_button post_id="" site_id=""]');
}

echo do_shortcode('[favorite_count post_id=""]');
?>
<?php do_action( 'woocommerce_after_single_product' ); ?>
