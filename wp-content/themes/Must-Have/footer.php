
<?php if($descripcion): ?>
          	<p> <?php echo $descripcion; ?></p>
		  <?php endif;?>


<footer>
    <div class="footer">
      <div class="main-footer">
        <div class="main-footer__content">
          <div class="content-footer__text">
            <div class="subtitle-footer">
              <a href="<?php bloginfo('url'); ?>/"><img src="<?php echo get_template_directory_uri();?>/assets/img/logo-footer.png" alt=""></a>
            </div>
            <div class="content-footer__text--text">
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
            </div>
            <div class="content-footer__redes--content">
              <a target="_blank" href="#">
                <img src="<?php echo get_template_directory_uri();?>/assets/img/youtube.png" alt="">
              </a>
              <a target="_blank" href="#">
                <img src="<?php echo get_template_directory_uri();?>/assets/img/path.png" alt="">
              </a>
              <a target="_blank" href="#">
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
                <a href="<?php bloginfo('url'); ?>/">Políticas y privacidad</a>
                <a href="<?php bloginfo('url'); ?>/">Entregas y devoluciones</a>
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
                <img src="<?php echo get_template_directory_uri();?>/assets/img/fill-955.png" alt=""><a href="tel:57797599577">+57 797 599 577</a>
              </div>
              <div class="contact-footer__items">
                <img src="<?php echo get_template_directory_uri();?>/assets/img/fill-960.png" alt=""><a href="mailto:info@musthave.com">info@musthave.com</a>
              </div>
              <div class="contact-footer__items">
                <img src="<?php echo get_template_directory_uri();?>/assets/img/fill-1100.png" alt=""><a href="#">Calle 60 Nro 56 -124, Medellín Colombia</a>
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
              <a href="#">Inicio</a>
              <a href="#">Upcycling mood</a>
              <a class="" data-toggle="collapse" href="#collapseModal" role="button" aria-expanded="false" aria-controls="collapseModal">
                Categorías
              </a>
              <div class="collapse" id="collapseModal">
                <div class="collapseModal-content">
                  <a href="#">Second chance</a>
                  <a href="#">Upcycling</a>
                  <a href="#">Productos sosteblibe</a>
                </div>
              </div>
            </div>          
          </div>
          <div class="modalLogin">
            <div class="modalLogin-content">
              <a href="#">Log in</a>
              <a href="#">Sell here</a>
              <a href="#">Productos</a>
              <a href="#">Contacto</a>
            </div>          
          </div>
        </div>
      </div>
    </div>
  </div>
  


  <script>

document.getElementById('billing_first_name').placeholder='Nombre *';
document.getElementById('billing_last_name').placeholder='Apellido *';
document.getElementById('billing_company').placeholder='Nombre de la empresa (opcional)';
document.getElementById('billing_city').placeholder='Localidad / Ciudad';
document.getElementById('billing_state').placeholder='Estado / Municipio';
document.getElementById('billing_postcode').placeholder='Código postal';
document.getElementById('billing_phone').placeholder='Teléfono';
document.getElementById('billing_email').placeholder='Correo electrónico *';

document.getElementById('shipping_first_name').placeholder='Nombre *';
document.getElementById('shipping_last_name').placeholder='Apellido *';
document.getElementById('shipping_company').placeholder='Nombre de la empresa (opcional)';
document.getElementById('shipping_city').placeholder='Localidad / Ciudad';
document.getElementById('shipping_state').placeholder='Estado / Municipio';
document.getElementById('shipping_postcode').placeholder='Código postal';

document.getElementById('first-name').placeholder='Nombre';
document.getElementById('last-name').placeholder='Apellido';
document.getElementById('reg_email').placeholder='Correo electrónico';
document.getElementById('shop-phone').placeholder='Teléfono';
document.getElementById('reg_password').placeholder='Contraseña';
document.getElementById('company-name').placeholder='Nombre de la tienda';
document.getElementById('seller-url').placeholder='URL de la tienda';


  </script>


  
  <script src="<?php echo get_template_directory_uri(); ?>/assets/vendor/jquery/jquery-3.2.1.min.js"></script>
  <script src="<?php echo get_template_directory_uri();?>/assets/js/bootstrap.min.js"></script>
  <script src="<?php echo get_template_directory_uri();?>/assets/js/popper.min.js"></script>
  <script src="<?php echo get_template_directory_uri();?>/assets/js/slick.min.js"></script>
  <script src="<?php echo get_template_directory_uri();?>/assets/js/setting-slick.js"></script>
  <script src="<?php echo get_template_directory_uri();?>/assets/js/main.js"></script>

  <?php wp_footer(); ?>
  </body>
  </html>

  