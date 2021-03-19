<footer>
    <div class="footer">
      <div class="main-footer">
        <div class="main-footer__content">
          <div class="content-footer__text">
            <div class="subtitle-footer">
              <a href="<?php bloginfo('url'); ?>/"><img src="<?php echo get_template_directory_uri();?>/assets/img/logo-footer.png" alt=""></a>
            </div>
            <div class="content-footer__text--text">
              <p><?php echo get_theme_mod('home_contacto_info'); ?></p>
            </div>
            <div class="content-footer__redes--content">
              <a target="_blank" href="<?php echo get_theme_mod('home_contacto_youtube'); ?>">
                <img src="<?php echo get_template_directory_uri();?>/assets/img/youtube.png" alt="">
              </a>
              <a target="_blank" href="<?php echo get_theme_mod('home_contacto_facebook'); ?>">
                <img src="<?php echo get_template_directory_uri();?>/assets/img/path.png" alt="">
              </a>
              <a target="_blank" href="<?php echo get_theme_mod('home_contacto_insta'); ?>">
                <img src="<?php echo get_template_directory_uri();?>/assets/img/Icon-insta.png" alt="">
              </a>
            </div>
          </div>
          <div class="content-footer__menu">
            <div class="subtitle-footer">
              <p>Menú</p>
            </div>
            <div class="content-footer__menu--content">
              <a href="<?php bloginfo('url'); ?>/">Inicio</a>
              <a href="<?php bloginfo('url'); ?>/quienes-somos">Quienes somos</a>
              <a href="<?php bloginfo('url'); ?>/contactanos">Contacto</a>
              <a href="<?php bloginfo('url'); ?>/terminos-y-condiciones">Términos y condiciones</a>
              <div class="content-footer__menu--content d-none d-md-flex d-lg-none">
                <a href="<?php bloginfo('url'); ?>/politica-privacidad">Políticas y privacidad</a>
                <a href="<?php bloginfo('url'); ?>/entregas-y-devoluciones">Entregas y devoluciones</a>
              </div>
            </div>
          </div>
          <div class="content-footer__menu d-flex d-md-none d-lg-flex">
            <div class="content-footer__menu--content">
              <a href="<?php bloginfo('url'); ?>/">Políticas y privacidad</a>
              <a href="<?php bloginfo('url'); ?>/">Entregas y devoluciones</a>
            </div>
          </div>
          <div class="content-footer__contact">
            <div class="subtitle-footer">
              <p>Contacto</p>
            </div>
            <div class="content-footer__contact--text">
              <div class="contact-footer__items">
                <img src="<?php echo get_template_directory_uri();?>/assets/img/fill-955.png" alt=""><a href="tel:<?php echo get_theme_mod('home_contacto_phone'); ?>">+<?php echo get_theme_mod('home_contacto_phone'); ?></a>
              </div>
              <div class="contact-footer__items">
                <img src="<?php echo get_template_directory_uri();?>/assets/img/fill-960.png" alt=""><a href="mailto:<?php echo get_theme_mod('home_contacto_email'); ?>"><?php echo get_theme_mod('home_contacto_email'); ?></a>
              </div>
              <div class="contact-footer__items">
                <img src="<?php echo get_template_directory_uri();?>/assets/img/fill-1100.png" alt=""><a href="<?php echo get_theme_mod('home_contacto_url_direc'); ?>"><?php echo get_theme_mod('home_contacto_text_direc'); ?></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="pie-footer">
        <p> Copyright © 2021 <a href="#">Branch</a></p>
    </div>
  </div>
</footer>


<div class="modal modalNav fade" data-backdrop="static" id="staticBackdrop" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <button class="navbar-buttonModal__close  border-0 hamburger--elastic ml-autos" data-toggle="modal" data-target="#staticBackdrop">
      <span class="hamburger-box">
        <span class="hamburger-inner"></span>
      </span>
    </button>
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
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
      </div>
    </div>
  </div>
  


  <script>

	  
$("#wpua-remove-existing").text('Save');

	  
document.getElementById('first-name').placeholder='Nombre';
document.getElementById('last-name').placeholder='Apellido';
document.getElementById('reg_email').placeholder='Correo electrónico';
document.getElementById('shop-phone').placeholder='Teléfono';
document.getElementById('reg_password').placeholder='Contraseña';
document.getElementById('company-name').placeholder='Nombre de la tienda';
document.getElementById('seller-url').placeholder='URL de la tienda';


document.getElementById('shipping_first_name').placeholder='Nombre *';
document.getElementById('shipping_last_name').placeholder='Apellido *';
document.getElementById('shipping_company').placeholder='Nombre de la empresa (opcional)';
document.getElementById('shipping_city').placeholder='Localidad / Ciudad';
document.getElementById('shipping_state').placeholder='Estado / Municipio';
document.getElementById('shipping_postcode').placeholder='Código postal';




  </script>


  
  <script src="<?php echo get_template_directory_uri(); ?>/assets/vendor/jquery/jquery-3.2.1.min.js"></script>
  <script src="<?php echo get_template_directory_uri();?>/assets/js/bootstrap.min.js"></script>
  <script src="<?php echo get_template_directory_uri();?>/assets/js/popper.min.js"></script>
  <script src="<?php echo get_template_directory_uri();?>/assets/js/slick.min.js"></script>
  <script src="<?php echo get_template_directory_uri();?>/assets/js/setting-slick.js"></script>
  <script src="<?php echo get_template_directory_uri();?>/assets/js/main.js"></script>

  <?php wp_footer(); ?>

</div>
  </body>
  </html>

  