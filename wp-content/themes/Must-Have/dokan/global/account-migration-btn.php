<?php
/**
 * Dokan Account Migration Button Template
 *
 * @since 2.4
 *
 * @package dokan
 */

?>

<p>&nbsp;</p>

<ul class="dokan-account-migration-lists">
    <li>
        <div class="dokan-w8 left-content">
            <p><strong><?php _e( 'Conviértete en vendedor', 'dokan' ) ?></strong></p>
            <p><?php _e( 'Los proveedores pueden vender productos y administrar una tienda con un panel de proveedores.', 'dokan' ) ?></p>
        </div>
        <div class="dokan-w4 right-content">
            <a href="<?php echo esc_url( dokan_get_page_url( 'Mi cuenta', 'woocommerce' ) . 'account-migration' ); ?>" class="btn btn-primary"><?php _e( 'Conviértete en vendedor', 'dokan' ); ?></a>
        </div>
        <div class="dokan-clearfix"></div>
    </li>

    <?php do_action( 'dokan_customer_account_migration_list' ); ?>
</ul>
