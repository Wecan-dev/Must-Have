<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;
$variable = get_the_ID();
get_header( 'shop' );
$category_id = get_queried_object_id();
/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
?>
<div class="main-content__archive" id="<?php the_ID(); ?>">





<?php if($category_id == 27 and $variable == 42) :?>

<div class="title-marcas_archive">
	<p>Marcas</p>
</div>

<?php else : ?>

<section>
    <div class="bannerStatic">
        <div class="main-bannerStatic">
            <div class="main-bannerStatic__content">
                <div class="main-bannerStatic__img">
                    <img src="http://159.89.229.55/Must-Have/wp-content/uploads/2021/03/Foto-producto-final-scaled.jpg" alt="">
                </div>
                <div class="main-bannerStatic__text">
                    <p>Productos</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php endif; ?>

<header class="woocommerce-products-header">
	<div class="archive-tabs">
	<?php $wcatTerm = get_terms('product_tag', array('hide_empty' => 0)); 
	foreach($wcatTerm as $wcatTer) : ?>
	
		<div class="archive-tabs__items <?php if ($category_id == $wcatTer->term_id) {echo 'active';} ?> ">
		<a href="<?php echo get_term_link( $wcatTer->slug, $wcatTer->taxonomy );?>"><?php echo $wcatTer->name ?></a>
		</div>

		
	
	<?php endforeach; ?>
	</div>
</header>






<?php if($category_id == 27 and $variable == 42) :?>


	<div class="main-contentArchive__items main-contentArchive__items2">
		<div class="main-contentArchive__datos">
			<?php echo woocommerce_result_count();  ?>
			<div class="main-contentArchive__datos--btn">
				<a id="vistaList" href="#!"><img src="<?php echo get_template_directory_uri();?>/assets/img/list.png" alt=""></a>
				<a id="vistaCuadra" class="active" href="#!"><img src="<?php echo get_template_directory_uri();?>/assets/img/menu.png" alt=""></a>
			</div>
		</div>
		<div class="main-contentArchive__products">
			<?php echo do_shortcode('[br_filter_single filter_id=188]') ?>
		</div>
	</div>

<?php else : ?>

	<div class="main-contentArchive">
		<div class="sidebarArchive" id="accordionExample">
			<div class="sidebarArchive-content" >
				<div id="headingOne">
					<button class="sidebarArchive-content__btn" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						Filtros
					</button>
				</div>
				<div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
					<div class="sidebarArchive-content__item">
						<div class="sidebarArchive-content__title">
							<p></p>
						</div>
						<div class="sidebarArchive-content__content">
							<?php echo do_shortcode('[br_filter_single filter_id=140]') ?>
						</div>
					</div>
					<div class="sidebarArchive-content__item">
						<div class="sidebarArchive-content__title">
							<p></p>
						</div>
						<div class="sidebarArchive-content__content">
							<?php echo do_shortcode('[br_filter_single filter_id=137]') ?>
						</div>
					</div>
					<div class="sidebarArchive-content__item">
						<div class="sidebarArchive-content__title">
							<p></p>
						</div>
						<div class="sidebarArchive-content__content">
							<?php echo do_shortcode('[br_filter_single filter_id=136]') ?>
						</div>
					</div>
					<div class="sidebarArchive-content__item">
						<div class="sidebarArchive-content__title">
							<p></p>
						</div>
						<div class="sidebarArchive-content__content">
							<?php echo do_shortcode('[br_filter_single filter_id=135]') ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="main-contentArchive__items">
			<div class="main-contentArchive__datos">
				<?php echo woocommerce_result_count();  ?>
				<div class="main-contentArchive__datos--btn">
					<a id="vistaList" href="#!"><img src="<?php echo get_template_directory_uri();?>/assets/img/list.png" alt=""></a>
					<a id="vistaCuadra" class="active" href="#!"><img src="<?php echo get_template_directory_uri();?>/assets/img/menu.png" alt=""></a>
				</div>
			</div>
			<div class="main-contentArchive__products">
				<?php while ( have_posts() ) : the_post(); global $product;?>	
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
				<?php endwhile; ?>
				</div>
		</div>
	</div>

<?php endif; ?>

</div> 

<?php
get_footer( 'shop' );
