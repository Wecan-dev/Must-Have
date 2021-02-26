<?php
/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.2
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_lost_password_form' );
?>
<section class="">
    <div class="registro">
        <div class="main-registro">
            <div class="main-registro__content">
                <div class="main-registro__img">
                    <div class="main-registro__img--content main-login__img--content">
                        <img  src="<?php echo get_template_directory_uri();?>/assets/img/banner-forgot-password.png" alt="">
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
                            <p>Recupera tu contraseña</p>
                        </div>
                        <div class="main-registro__form--content">
							<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
								<input placeholder="Correo electrónico" class="woocommerce-Input woocommerce-Input--text input-text" type="text" name="user_login" id="user_login" autocomplete="username" />
							</p>
                            <p class="woocommerce-form-row form-row">
								<input type="hidden" name="wc_reset_password" value="true" />
								<button type="submit" class="woocommerce-Button button" value="<?php esc_attr_e( 'Reset password', 'woocommerce' ); ?>"><?php esc_html_e( 'Reset password', 'woocommerce' ); ?></button>
							</p> 
                            <a href="<?php bloginfo('url') ?>/mi-cuenta" class="create-new">Crear una nueva cuenta <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<form method="post" class="woocommerce-ResetPassword lost_reset_password d-none">

	<p><?php echo apply_filters( 'woocommerce_lost_password_message', esc_html__( 'Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.', 'woocommerce' ) ); ?></p><?php // @codingStandardsIgnoreLine ?>

	
	<div class="clear"></div>

	<?php do_action( 'woocommerce_lostpassword_form' ); ?>

	<p class="woocommerce-form-row form-row">
		<input type="hidden" name="wc_reset_password" value="true" />
		<button type="submit" class="woocommerce-Button button" value="<?php esc_attr_e( 'Reset password', 'woocommerce' ); ?>"><?php esc_html_e( 'Reset password', 'woocommerce' ); ?></button>
	</p>

	<?php wp_nonce_field( 'lost_password', 'woocommerce-lost-password-nonce' ); ?>

</form>
<?php
do_action( 'woocommerce_after_lost_password_form' );
