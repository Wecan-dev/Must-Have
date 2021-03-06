<?php get_header(); ?>


<!-- Banner -->

<section class="">
    <div class="banner">
      <div class="main-banner">
        <div class="main-banner__content">
        <?php $args = array( 'post_type' => 'Banner');?>   
        <?php $loop = new WP_Query( $args ); ?>
        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
          <div class="main-banner__item">
            <div class="main-banner__text">
              <div class="main-banner__subtitle">
                <p><?php the_field( 'subtitulo_banner_home' ); ?> </p>
              </div>
              <div class="main-banner__title">
                <h1> <?php the_title(); ?> </h1>
              </div>
              <div class="main-banner__info">
                <p> <?php the_content(); ?> </p>
              </div>
              <div class="boton-banner">
                <?php $boton_banner_home = get_field( 'boton_banner_home' ); ?>
                <?php if ( $boton_banner_home ) : ?>
                  <a class="btn btn-banner" href="<?php echo esc_url( $boton_banner_home['url'] ); ?>" target="<?php echo esc_attr( $boton_banner_home['target'] ); ?>"><?php echo esc_html( $boton_banner_home['title'] ); ?></a>
                <?php endif; ?>
              </div>
            </div>
            <div class="main-banner__img">
              <div class="main-banner__img--content">
                <img  src="<?php echo get_the_post_thumbnail_url(); ?>">
              </div>
            </div>
          </div>
          <?php endwhile; ?>
        </div>
      </div>
    </div>
</section>

<!-- Banner /-->
  
<!-- Categorías -->

<section>

  <div class="categoria">
    <div class="main-categoria">
      <div class="main-categoria__content">
        <div class="main-categoria__title">
          <p>categorías</p>
        </div>
        <div class="main-categoria__items">
        <?php $wcatTerm = get_terms('product_cat', array('hide_empty' => 0)); 
          foreach($wcatTerm as $wcatTer) : ?>
			<?php
            $thumb_id = get_woocommerce_term_meta( $wcatTer->term_id, 'thumbnail_id', true );
            $term_img = wp_get_attachment_url(  $thumb_id );
            ?>
            <div class="item-categoria__content">
              <div class="item-categoria__img">
                <img src="<?php echo $term_img;?>" alt="">
              </div>
              <div class="item-categoria__btn">
              <a href="<?php echo get_term_link( $wcatTer->slug, $wcatTer->taxonomy );?>"><?php echo $wcatTer->name ?></a>
              </div>
              <div class="item-categoria__mask"></div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Categorías /-->


<!-- Lo Más Vendido -->


<section>
  <div class="bestVendido">
    <div class="main-bestVendido">
      <div class="main-bestVendido__title">
        <p>lo más vendido</p>
      </div>
      <div class="main-bestVendido__slider d-none d-lg-block">
      <?php $wcatTerm = get_terms('product_tag', array('hide_empty' => 0)); 
          foreach($wcatTerm as $wcatTer) : ?>
      <!--<?php   $args = array(
				'post_type' => 'product',
				'paged' => $paged,
				'posts_per_page' => 12,     
				'meta_key' => 'total_sales',
				'orderby' => 'meta_value_num', 
				/*'meta_query' => array(
					array(
						'key' => 'total_sales',
						'value' => 0,
						'compare' => '>'
					)
				),*/
				'post_status' => 'publish',

			);	?>	
        <?php $loop = new WP_Query( $args ); ?>-->
        <?php while ( $loop->have_posts() ) : $loop->the_post(); global $product;?>	
          <div class="main-bestVendido__content">
            <div class="main-bestVendido__item">
              <div class="main-bestVendido__img">
                <img src="<?php the_post_thumbnail_url('full');?>" alt="">
              </div>
              <div class="main-bestVendido__card">
                <div class="main-bestVendido__card--content">
                  <div class="main-bestVendido__card--img">
                    <img src="<?php the_post_thumbnail_url('full');?>" alt="">
                  </div>
                  <div class="main-bestVendido__card--name">
                    <p><?php the_title() ?></p>
                  </div>
                  <div class="main-bestVendido__card--price">
                    <p><?php echo $product->get_price_html(); ?></p>
                  </div>
                  <div class="main-bestVendido__card--btn">
                    <a href="<?php the_permalink(); ?>">comprar</a>
                  </div>
                </div>
                <div class="main-bestVendido__card--category">
                  <p><?php echo $wcatTer->name ?></p>
                </div>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
        <?php endforeach; ?>
      </div>
      <div class="main-bestVendido__slider--res d-block d-lg-none">
      <?php $wcatTerm = get_terms('product_tag', array('hide_empty' => 0)); 
          foreach($wcatTerm as $wcatTer) : ?>
      <!--<?php   $args = array(
				'post_type' => 'product',
				'paged' => $paged,
				'posts_per_page' => 12,     
				'meta_key' => 'total_sales',
				'orderby' => 'meta_value_num', 
				/*'meta_query' => array(
					array(
						'key' => 'total_sales',
						'value' => 0,
						'compare' => '>'
					)
				),*/
				'post_status' => 'publish',

			);	?>	
        <?php $loop = new WP_Query( $args ); ?>-->
        <?php while ( $loop->have_posts() ) : $loop->the_post(); global $product;?>	
          <div class="main-bestVendido__content">
            <div class="main-bestVendido__item">
              <div class="main-bestVendido__card">
                <div class="main-bestVendido__card--content">
                  <div class="main-bestVendido__card--img">
                    <img src="<?php the_post_thumbnail_url('full');?>" alt="">
                  </div>
                  <div class="main-bestVendido__card--name">
                    <p><?php the_title() ?></p>
                  </div>
                  <div class="main-bestVendido__card--category d-block d-lg-none">
                    <p><?php echo $wcatTer->name ?></p>
                  </div>
                  <div class="main-bestVendido__card--price">
                    <p><?php echo $product->get_price_html(); ?></p>
                  </div>
                  <div class="main-bestVendido__card--btn">
                    <a href="<?php the_permalink(); ?>">comprar</a>
                  </div>
                </div>
                <div class="main-bestVendido__card--category d-none d-lg-block">
                  <p><?php echo $wcatTer->name ?></p>
                </div>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!-- Lo Más Vendido  /-->


<!-- Upcycling-->

<div class="upcycling">
  <div class="main-upcycling">
    <div class="main-upcycling__content">
      <div class="main-upcycling__title">
        <p><?php echo get_theme_mod('home_publicidad_title'); ?></p>
      </div>
      <div class="main-upcycling__text">
        <p><?php echo get_theme_mod('home_publicidad_text'); ?></p>
      </div>
      <div class="main-upcycling__btn ">
        <a class="btn-banner" href="<?php echo get_theme_mod('home_publicidad_url'); ?>"><?php echo get_theme_mod('home_publicidad_btn'); ?></a>
      </div>
    </div>
    <div class="main-upcycling__img">
      <img src="<?php echo get_theme_mod('home_publicidad_image'); ?>" alt="">
    </div>
  </div>
</div>

<!-- Upcycling  /-->


  <?php get_footer(); ?>


