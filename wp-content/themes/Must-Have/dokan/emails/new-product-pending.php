<?php
/**
 * New Product Email.
 *
 * An email sent to the admin when a new Product is created by vendor.
 *
 * @class       Dokan_Email_New_Product_Pending
 * @version     2.6.8
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

do_action( 'woocommerce_email_header', $email_heading, $email ); ?>

<p><?php esc_html_e( 'Hola,', 'dokan-lite' ); ?></p>

<p><?php esc_html_e( 'Se envió un nuevo producto a su sitio y está pendiente de revisión.', 'dokan-lite' ); ?> <a href="<?php echo esc_url( $data['site_url'] ); ?>" ><?php echo esc_html( $data['site_name'] ); ?></a> </p>
<p><?php esc_html_e( 'Resumen del producto:', 'dokan-lite' ); ?></p>
<hr>
<ul>
    <li>
        <strong>
            <?php esc_html_e( 'Titulo :', 'dokan-lite' ); ?>
        </strong>
        <?php printf( '<a href="%s">%s</a>', esc_url( $data['product_link'] ), esc_html( $data['product-title'] ) ); ?>
    </li>
    <li>
        <strong>
            <?php esc_html_e( 'Precio :', 'dokan-lite' ); ?>
        </strong>
        <?php echo wp_kses_post( wc_price( $data['price'] ) ); ?>
    </li>
    <li>
        <strong>
            <?php esc_html_e( 'Vendedor :', 'dokan-lite' ); ?>
        </strong>
        <?php
        printf( '<a href="%s">%s</a>', esc_url( $data['seller_url'] ), esc_html( $data['seller-name'] ) ); ?>
    </li>
    <li>
        <strong>
            <?php esc_html_e( 'Categoría :', 'dokan-lite' ); ?>
        </strong>
        <?php echo esc_html( $data['category'] ); ?>
    </li>

</ul>
<p><?php esc_html_e( 'El producto se encuentra actualmente en estado "pendiente".', 'dokan-lite' ); ?></p>

<?php

do_action( 'woocommerce_email_footer', $email );
