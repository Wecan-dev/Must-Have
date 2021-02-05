<?php get_header(); ?>
<section class="">
    <div class="registro">
        <div class="main-registro">
            <div class="main-registro__content">
                <div class="main-registro__img">
                    <div class="main-registro__img--content main-login__img--content">
                        <img  src="<?php echo get_template_directory_uri();?>/assets/img/banner-login.png" alt="">
                    </div>
                </div>
                <div class="main-registro__item">
                    <div class="main-registro__text">
                        <div class="main-registro__subtitle">
                            <p>tus favoritos</p>
                        </div>
                        <div class="main-registro__title">
                            <h1>lo quieres, lo puedes tener</h1>
                        </div>
                        <div class="boton-registro d-none d-lg-flex">
                        </div>
                    </div>
                    <div class="main-registro__form">
                        <div class="main-registro__form--title">
                            <p>Inciar sesión</p>
                        </div>
                        <div class="main-registro__form--content">
                           
<?php
  
  do_action( 'woocommerce_before_customer_login_form' ); ?>
  
          <form class="woocommerce-form woocommerce-form-login login" method="post">
  
              <?php do_action( 'woocommerce_login_form_start' ); ?>
  
              <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                  <label class="d-none" for="username"><?php esc_html_e( 'Username or email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
                  <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" placeholder="Correo Electronico" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
              </p>
              <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                  <label class="d-none" for="password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
                  <input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" placeholder="Contraseña" id="password" autocomplete="current-password" />
              </p>
  
              <?php do_action( 'woocommerce_login_form' ); ?>
            <div class="renember-form">
              <p class="form-row">
                  <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
                      <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e( 'Remember me', 'woocommerce' ); ?></span>
                  </label>
                </p>
                  <div class="woocommerce-LostPassword lost_password">
                      <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'woocommerce' ); ?></a>
                    </div>
                
            </div>
                  <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
                  
              
              <button type="submit" class="woocommerce-button button woocommerce-form-login__submit" name="login" value="<?php esc_attr_e( 'Iniciar sesión', 'woocommerce' ); ?>"><?php esc_html_e( 'Iniciar sesión', 'woocommerce' ); ?></button>
  
              <?php do_action( 'woocommerce_login_form_end' ); ?>
  
          </form>
          <?php do_action( 'woocommerce_after_customer_login_form' ); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<?php get_footer(); ?>