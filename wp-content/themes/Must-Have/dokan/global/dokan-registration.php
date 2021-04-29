<?php
/**
 * Dokan Registration
 *
 * Shows orders on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/orders.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */
$user_id    = get_current_user_id();
$user_data  = get_userdata( $user_id );
$roles      = $user_data->roles;
$role       = in_array( 'customer', $user_data->roles ) ? 'customer' : '';
$role_style = ( $role == 'customer' ) ? ' style="display:none"' : '';
?>
<form method="post" action="" class="dokan-social-form" novalidate>
    <div class="form-row-wide">
        <p class="form-row form-group">
            <label for="first-name"><?php _e( 'Nombre', 'dokan' ); ?> <span class="required">*</span></label>
            <input type="text" class="input-text form-control" name="fname" id="first-name" value="<?php if ( !empty( $user_data->first_name ) ) echo esc_attr( $user_data->first_name ); ?>" required="required" />
        </p>

        <p class="form-row form-group">
            <label for="last-name"><?php _e( 'Apellido', 'dokan' ); ?></label>
            <input type="text" class="input-text form-control" name="lname" id="last-name" value="<?php if ( !empty( $user_data->last_name ) ) echo esc_attr( $user_data->last_name ); ?>" />
        </p>
    </div>
    <div class="show_if_seller"<?php echo $role_style; ?>>
        <p class="form-row form-group form-row-wide">
            <label for="company-name"><?php _e( 'Nombre de la tienda', 'dokan' ); ?> <span class="required">*</span></label>
            <input type="text" class="input-text form-control" name="shopname" id="company-name" value="<?php echo esc_attr( $user_data->user_login ) ?>" required="required" />
        </p>

        <p class="form-row form-group form-row-wide">
            <label for="seller-url" class="pull-left"><?php _e( 'URL de la tienda', 'dokan' ); ?> <span class="required">*</span></label>
            <strong id="url-alart-mgs" class="pull-right"></strong>
            <input type="text" class="input-text form-control" name="shopurl" id="seller-url" value="<?php echo esc_attr( $user_data->user_login ); ?>" required="required" />
            <small><?php echo home_url() . '/' . dokan_get_option( 'custom_store_url', 'dokan_general', 'store' ); ?>/<strong id="url-alart"></strong></small>
        </p>
        
        <p class="form-row form-group form-row-wide">
            <label for="seller-address"><?php _e( 'Dirección', 'dokan' ); ?><span class="required">*</span></label>
            <textarea type="text" id="seller-address" name="address" class="form-control input" required="required"></textarea>
        </p>

        <p class="form-row form-group form-row-wide">
            <label for="shop-phone"><?php _e( 'Número de teléfono', 'dokan' ); ?><span class="required">*</span></label>
            <input type="text" class="input-text form-control" name="phone" id="shop-phone" value="" required="required" />
        </p>
        <?php
        $show_toc   = dokan_get_option( 'enable_tc_on_reg', 'dokan_general' );

        if ( $show_toc == 'on' ) {
            $toc_page_id = dokan_get_option( 'reg_tc_page', 'dokan_pages' );
            if ( $toc_page_id != -1 ) {
                $toc_page_url = get_permalink( $toc_page_id );
                ?>
                <p class="form-row form-group form-row-wide">
                    <input class="tc_check_box" type="checkbox" id="tc_agree" name="tc_agree" required="required">
                    <label style="display: inline" for="tc_agree"><?php echo sprintf( __( 'He leído y estoy de acuerdo con <a target="_blank" href="%s">Terminos &amp; Condiciones</a>.', 'dokan' ), $toc_page_url ); ?></label>
                </p>    
            <?php } ?>
        <?php } ?>
        <?php do_action( 'dokan_seller_registration_field_after' ); ?>

    </div>

    <?php do_action( 'dokan_reg_form_field' ); ?>

    <p class="form-row form-group user-role">
        <label class="radio">
            <input type="radio" name="role" value="customer"<?php checked( $role, 'customer' ); ?>>
            <?php _e( 'Soy un cliente', 'dokan' ); ?>
        </label>

        <label class="radio">
            <input type="radio" name="role" value="seller"<?php checked( $role, 'seller' ); ?>>
            <?php _e( 'Soy vendedor', 'dokan' ); ?>
        </label>
        <?php do_action( 'dokan_registration_form_role', $role ); ?>
    </p>
    <p class="form-row">
        <?php wp_nonce_field( 'account_migration', 'dokan_nonce' ); ?>
        <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
        <input type="submit" class="dokan-btn dokan-btn-default" id="social-submit" name="dokan_social" value="<?php _e( 'Actualizar', 'dokan' ); ?>" />
    </p>
</form>

<script>
        ( function ( $ ) {

            $( document ).ready( function () {
                $( '.user-role input[type=radio]' ).on( 'change', function () {
                    var value = $( this ).val();
                    
                    if ( value === 'seller' ) {
                        $( '#social-submit' ).attr( 'name', 'dokan_migration' );
                        $( '.dokan-social-form' ).removeAttr( 'novalidate' );
                    } else {
                        $( '.dokan-social-form' ).attr( 'novalidate', true );
                        $( '#social-submit' ).attr( 'name', 'dokan_social' );
                    }
                } );
            } );

        } )( jQuery );
</script>
