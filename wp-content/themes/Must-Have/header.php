<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Must Have</title>

  <!-- Behavioral Meta Data -->
  <meta content='width=device-width, initial-scale=1, user-scalable=no' name='viewport'>
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="theme-color" content="#24272c">
  
  <!-- Google Meta Data -->
  <meta name='description', content=''>
  <meta name='keywords', content=''>
  <meta name="robots" content="index, follow">

  <!-- Blog Meta Data -->
  <meta name="dc.language" content="es">
  <meta name="dc.source" content="">
  <meta itemprop="url" content="">

  <!-- Twitter Card Meta Data -->
  <meta content='summary' name='twitter:card'>
  <meta content='Must Have' name='twitter:site'>
  <meta content='Must Have' name='twitter:title'>
  <meta content='Must Have' name='twitter:description'>

  <!-- Open Graph Meta Data -->
  <meta content='website' property='og:type'>
  <meta content='<?php echo get_template_directory_uri();?>/assets/img/favicon-32x32.png' property='og:image'>
  <meta property="og:site_name" content="">
  <meta property="og:title" content="">
  <meta content='' property='og:description'>
  <meta property="og:type" content="">
  <meta property="og:image" content="">

  <link crossorigin="anonymous" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" rel="stylesheet">

	<link href="<?php echo get_template_directory_uri();?>/assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo get_template_directory_uri();?>/assets/css/font-awesome.css" rel="stylesheet">
  <link href="<?php echo get_template_directory_uri();?>/assets/css/slick-theme.css" rel="stylesheet">
  <link href="<?php echo get_template_directory_uri();?>/assets/css/slick.css" rel="stylesheet">
  <link href="<?php echo get_template_directory_uri();?>/assets/css/main.css" rel="stylesheet">
  <link href="<?php echo get_template_directory_uri();?>/assets/css/responsive.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->

	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/vendor/slick/slick.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/vendor/slick/slick-theme.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/vendor/lightbox2/css/lightbox.min.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/css/flaticon.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/css/animate.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" rel="stylesheet">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri();?>/assets/img/favicon-32x32.png">
  <?php wp_head(); ?>
</head>
<body>
<div class="main-content__global">
<header id="header" class="header <?php if(is_home() ){echo 'header-home';} ?>">
  <nav class="navbar navbar-expand-lg navbar-fixed-js" id="navbar">
    <button class="navbar-buttonModal  border-0 hamburger--elastic ml-autos" data-toggle="modal" data-target="#staticBackdrop">
        <span class="hamburger-box">
          <span class="hamburger-inner"></span>
        </span>
      </button>
    <div class="main-brand">
      <a itemprop="url" class="navbar-brand" href="<?php bloginfo('url'); ?>/">
        <?php if (is_home()) : ?>
          <img id="logoHeader" class="logoChange1" src="<?php echo get_template_directory_uri();?>/assets/img/logo-w.png" alt="" />
          <img id="logoHeader" class="logoChange2" src="<?php echo get_template_directory_uri();?>/assets/img/Logo-must.png" alt="" />
        <?php else : ?>
          <img id="logoHeader" src="<?php echo get_template_directory_uri();?>/assets/img/Logo-must.png" alt="" />
        <?php endif; ?>
      </a>
      <div class="iconNav-respon d-flex d-lg-none">
        <div class="content-dropdownUser">
        <?php if (is_user_logged_in() == NULL){ ?>
			<?php  $user = wp_get_current_user(); ?>
            <a class="icon-user dropdown-toggle" id="dropdownUser" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img  src="<?php echo get_template_directory_uri();?>/assets/img/shape.png" alt="">
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownUser">
              <a class="dropdown-item" href="<?php echo get_home_url() ?>/login">Login</a>
              <a class="dropdown-item" href="<?php echo get_home_url() ?>/mi-cuenta">Registrarse</a>
              <a class="dropdown-item" href="<?php echo get_home_url() ?>/vende-aqui">Vende aquí</a>
            </div>
          <?php }else{ ?>  
            <a class="icon-user dropdown-toggle" id="dropdownUser" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="<?php echo get_template_directory_uri();?>/assets/img/shape.png" alt="">
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownUser">
				<?php if ( in_array( 'seller', (array) $user->roles ) ): ?>
              		<a class="dropdown-item" href="<?php echo get_home_url() ?>/mi-cuenta/edit-account/">Mi información</a>
				<?php else : ?> 
					<a class="dropdown-item" href="<?php echo get_home_url() ?>/dashboard">Mi información</a>
				<?php endif; ?>
				<a class="dropdown-item" href="<?php echo get_home_url() ?>/wishlist">Favoritos</a>
				<a class="dropdown-item" href="<?php echo get_home_url() ?>#">Orden</a>
              <a class="dropdown-item" href="<?php echo wp_logout_url( home_url()); ?>">Cerrar Sesión</a>
            </div>
          <?php } ?> 
          </div>
          <a class="icon-nav" href="<?php echo get_home_url() ?>/wishlist">
            <img src="<?php echo get_template_directory_uri();?>/assets/img/fill-1161.png" alt="">
            <p class="mini-cart"><?php $wishlist_count = YITH_WCWL()->count_products(); echo esc_html( $wishlist_count ); ?></p>
          </a> 
          <div class="content-dropdownCart">
            <a class="icon-nav dropdown-toggle" href="#" role="button" id="dropdownCart" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="<?php echo get_template_directory_uri();?>/assets/img/fill-929.png" alt="">
              <p class="mini-cart"><?php echo WC()->cart->get_cart_contents_count(); ?></p>
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownCart">
              <div class="dropdown-menu__content">
                <div class="dropdown-menu__title">
                  <p>Tu carrito de compras</p>
                </div>
                <div class="dropdown-menu__item">
                  <div class="dropdown-menu__product">
                    <?php
                      foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                        $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                        $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                        if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                          $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                          ?>
                          <div class="woocommerce-cart-form__cart-item d-flex <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

                            <div class="product-thumbnail" style="height:123px; width:100px; margin-right: 15px;">
                              <?php
                              $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

                              if ( ! $product_permalink ) {
                                echo $thumbnail; // PHPCS: XSS ok.
                              } else {
                                printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
                              }?>
                            </div>
                          <div>
                          <td class="product-name" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">
                          <?php
                          if ( ! $product_permalink ) {
                            echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
                          } else {
                            echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
                          }

                          do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

                          // Meta data.
                          echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.
                          ?>
                          </td>
                          <td class="product-quantity" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
                            <p>	Cantidad:  <?php echo apply_filters( 'woocommerce_checkout_cart_item_quantity',  sprintf( '%s', $cart_item['quantity'] ) , $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> </p>
                          </td>
                            <p>Precio: <?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok. ?></p>
                        </div>
                      </div>
                    <?php
                    }
                    }
                    ?>
                    
                  </div>
                  <div class="order-total ">
                      <th><?php esc_html_e( 'Total', 'woocommerce' ); ?></th>
                      <td data-title="<?php esc_attr_e( 'Total', 'woocommerce' ); ?>"><?php wc_cart_totals_order_total_html(); ?></td>
                  </div>
                    <div class="wc-proceed-to-checkout">
                      <a href="<?php bloginfo('url') ?>/carrito">Ir al proceso de compra</a>
                    </div>
                </div>
              </div>
            </div>
          </div> 
      </div>
      <button class="navbar-toggler  border-0 hamburger hamburger--elastic ml-autos" data-toggle="offcanvas"
        type="button">
        <span class="hamburger-box">
          <span class="hamburger-inner"></span>
        </span>
      </button>
    </div>
    <div class="navbar-collapse offcanvas-collapse">
      <div class="collapse-fixed__content d-none d-lg-flex">
        <a href="<?php bloginfo('url'); ?>/">Inicio</a>
        <div class="dropdownUpcycling__content">
          <a class="dropdown-toggle" id="dropdownUpcycling" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Upcycling mood </a>
          <div class="dropdown-menu" aria-labelledby="dropdownUpcycling">
            <a class="dropdown-item" href="<?php echo get_home_url() ?>/quienes-somos">Quienes somos</a>
            <a class="dropdown-item" href="<?php echo get_home_url() ?>/contactanos">Contáctanos</a>
          </div>
        </div>
        <a href="<?php bloginfo('url'); ?>/categorias">Categorías</a>
      </div>
      <ul class="navbar-nav ">
        <form class="form-inline my-2 my-lg-0">
          <?php echo do_shortcode('[wcas-search-form]'); ?>
        </form>
        <div class="content-dropdownUser d-none d-lg-flex">
          <?php if (is_user_logged_in() == NULL){ ?>
			
            <a class="icon-user dropdown-toggle" id="dropdownUser" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="<?php echo get_template_directory_uri();?>/assets/img/shape.png" alt="">
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownUser">
              <a class="dropdown-item" href="<?php echo get_home_url() ?>/login">Login</a>
              <a class="dropdown-item" href="<?php echo get_home_url() ?>/mi-cuenta">Registrarse</a>
              <a class="dropdown-item" href="<?php echo get_home_url() ?>/vende-aqui">Vende aquí</a>
            </div>
          <?php }else{ ?>  
            <a class="icon-user dropdown-toggle" id="dropdownUser" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="<?php echo get_template_directory_uri();?>/assets/img/shape.png" alt="">
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownUser">
				<?php  $user = wp_get_current_user();  ?>
              <?php if ( in_array( 'customer', (array) $user->roles ) ): ?>
              		<a class="dropdown-item" href="<?php echo get_home_url() ?>/mi-cuenta/edit-account/">Mi información</a>
				<?php else : ?> 
					<a class="dropdown-item" href="<?php echo get_home_url() ?>/dashboard">Mi información</a>
				<?php endif; ?>
				<a class="dropdown-item" href="<?php echo get_home_url() ?>/wishlist">Favoritos</a>
				<?php if ( in_array( 'customer', (array) $user->roles ) ): ?>
					<a class="dropdown-item" href="<?php echo get_home_url() ?>/mi-cuenta/orders/">Orden</a>
				<?php else : ?>
					<a class="dropdown-item" href="<?php echo get_home_url() ?>/dashboard/orders/">Orden</a>
				<?php endif; ?>
              <a class="dropdown-item" href="<?php echo wp_logout_url( home_url()); ?>">Cerrar Sesión</a>
            </div>
          <?php } ?> 
        </div>
        <a class="icon-nav d-none d-lg-flex" href="<?php echo get_home_url() ?>/wishlist">
          <img src="<?php echo get_template_directory_uri();?>/assets/img/fill-1161.png" alt="">
          <p class="mini-cart"><?php $wishlist_count = YITH_WCWL()->count_products(); echo esc_html( $wishlist_count ); ?></p>
        </a>
        <div class="content-dropdownCart d-none d-lg-flex">
          <?php $contadorCart = WC()->cart->get_cart_contents_count(); ?>
            <?php if ($contadorCart == 0 ) : ?>
              <a class="icon-nav" role="button">
                <img src="<?php echo get_template_directory_uri();?>/assets/img/fill-929.png" alt="">
                <p class="mini-cart"><?php echo WC()->cart->get_cart_contents_count(); ?></p>
              </a>
            <?php else : ?>
              <a class="icon-nav dropdown-toggle d-none d-lg-flex"  href="#" role="button" id="dropdownCart" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="<?php echo get_template_directory_uri();?>/assets/img/fill-929.png" alt="">
                <p class="mini-cart"><?php echo WC()->cart->get_cart_contents_count(); ?></p>
              </a>
            <?php endif; ?>
          <div class="dropdown-menu" aria-labelledby="dropdownCart">
            <div class="dropdown-menu__content">
              <div class="dropdown-menu__title">
                <p>Tu carrito de compras</p>
              </div>
              <div class="dropdown-menu__item">
                <div class="dropdown-menu__product">
                  <?php
                    foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                      $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                      $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                      if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                        $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                        ?>
                        <div class="woocommerce-cart-form__cart-item d-flex <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

                          <div class="product-thumbnail" style="height:123px; width:100px; margin-right: 15px;">
                            <?php
                            $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

                            if ( ! $product_permalink ) {
                              echo $thumbnail; // PHPCS: XSS ok.
                            } else {
                              printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
                            }?>
                          </div>
                        <div>
                        <td class="product-name" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">
                        <?php
                        if ( ! $product_permalink ) {
                          echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
                        } else {
                          echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
                        }

                        do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

                        // Meta data.
                        echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.
                        ?>
                        </td>
                        <td class="product-quantity" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
                          <p>	Cantidad:  <?php echo apply_filters( 'woocommerce_checkout_cart_item_quantity',  sprintf( '%s', $cart_item['quantity'] ) , $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> </p>
                        </td>
                          <p>Precio: <?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok. ?></p>
                      </div>
                    </div>
                  <?php
                  }
                  }
                  ?>
                  
                </div>
                <div class="order-total ">
                    <th><?php esc_html_e( 'Total', 'woocommerce' ); ?></th>
                    <td data-title="<?php esc_attr_e( 'Total', 'woocommerce' ); ?>"><?php wc_cart_totals_order_total_html(); ?></td>
                </div>
                  <div class="wc-proceed-to-checkout">
                    <a href="<?php bloginfo('url') ?>/carrito">Ir al proceso de compra</a>
                  </div>
              </div>
            </div>
          </div>
        </div> 
        <div class="navCollapse-respon d-block d-lg-none">
          <div class="modalInicio">
            <div class="modalInicio-content">
              <a href="<?php bloginfo('url'); ?>">Inicio</a>
              <a class="" data-toggle="collapse" href="#collapseModal1" role="button" aria-expanded="false" aria-controls="collapseModal">Upcycling mood</a>
              <div class="collapse" id="collapseModal1">
                <div class="collapseModal-content">
                  <a href="<?php bloginfo('url'); ?>/quienes-somos">Quienes Somos</a>
                  <a href="<?php bloginfo('url'); ?>/contactanos">Contáctanos</a>
                </div>
              </div>
              <a class="" data-toggle="collapse" href="#collapseModal2" role="button" aria-expanded="false" aria-controls="collapseModal">
                Categorías
              </a>
              <div class="collapse" id="collapseModal2">
                <div class="collapseModal-content">
                  <?php $wcatTerm = get_terms('product_cat', array('hide_empty' => 0)); 
                  foreach($wcatTerm as $wcatTer) : ?>
                    <a href="<?php echo get_term_link( $wcatTer->slug, $wcatTer->taxonomy );?>"><?php echo $wcatTer->name ?></a>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>          
          </div>
          <div class="modalLogin">
            <div class="modalLogin-content">
              <a href="<?php echo get_home_url() ?>/login">Log in</a>
              <a href="<?php echo get_home_url() ?>/vende-aqui">Sell here</a>
              <a href="<?php bloginfo('url'); ?>/categoria-producto/productos-sostenibles">Productos</a>
              <a href="<?php echo get_home_url() ?>/contactanos">Contacto</a>
            </div>          
          </div>
        </div>
      </ul>
    </div>
  </nav>
</header>