<?php

/**
 * Dashboard Coupon Form Template
 *
 * @since 2.4
 *
 * @package dokan
 */
?>

<form method="post" action="" class="dokan-form-horizontal coupons">
    <input type="hidden"  value="<?php echo $post_id; ?>" name="post_id">
    <?php wp_nonce_field('coupon_nonce','coupon_nonce_field'); ?>

    <div class="dokan-form-group">
        <label class="dokan-w3 dokan-control-label" for="title"><?php _e( 'Título del cupón', 'dokan' ); ?><span class="required"> *</span></label>
        <div class="dokan-w5 dokan-text-left">
            <input id="title" name="title" required value="<?php echo esc_attr( $post_title ); ?>" placeholder="<?php _e( 'Titulo', 'dokan' ); ?>" class="dokan-form-control input-md" type="text">
        </div>
    </div>

    <div class="dokan-form-group">
        <label class="dokan-w3 dokan-control-label" for="description"><?php _e( 'Descripción', 'dokan' ); ?></label>
        <div class="dokan-w5 dokan-text-left">
            <textarea class="dokan-form-control" id="description" name="description"><?php echo esc_textarea( $description ); ?></textarea>
        </div>
    </div>

    <div class="dokan-form-group">
        <label class="dokan-w3 dokan-control-label" for="discount_type"><?php _e( 'Tipo de descuento', 'dokan' ); ?></label>

        <div class="dokan-w5 dokan-text-left">
            <?php
            $coupon_types = dokan_get_coupon_types();
            
            if ( ! dokan_validate_boolean( dokan_is_single_seller_mode_enable() ) ) {
                unset( $coupon_types['fixed_cart'] );
            }
            ?>
            <select id="discount_type" name="discount_type" class="dokan-form-control">
                <?php foreach ( $coupon_types as $key => $value ) : ?>
                    <option <?php selected( $discount_type, $key ); ?> value="<?php echo esc_attr( $key ) ?>"><?php printf( __( '%s', 'dokan' ), $value ) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="dokan-form-group">
        <label class="dokan-w3 dokan-control-label" for="amount"><?php _e( 'Monto', 'dokan' ); ?><span class="required"> *</span></label>
        <div class="dokan-w5 dokan-text-left">
            <input id="coupon_amount" required value="<?php echo esc_attr( $amount ); ?>" name="amount" placeholder="<?php _e( 'Monto', 'dokan' ); ?>" class="wc_input_price dokan-form-control input-md" type="text">
        </div>
    </div>

    <div class="dokan-form-group">
        <label class="dokan-w3 dokan-control-label" for="email_restrictions"><?php _e( 'Restricciones de correo electrónico', 'dokan' ); ?></label>
        <div class="dokan-w5 dokan-text-left">
            <input id="email_restrictions" value="<?php echo esc_attr( $customer_email ); ?>" name="email_restrictions" placeholder="<?php _e( 'Restricciones de correo electrónicos', 'dokan' ); ?>" class="dokan-form-control input-md" type="text">
        </div>
    </div>

    <div class="dokan-form-group">
        <label class="dokan-w3 dokan-control-label" for="usage_limit"><?php _e( 'Límite de uso', 'dokan' ); ?></label>
        <div class="dokan-w5 dokan-text-left">
            <input id="usage_limit" value="<?php echo esc_attr( $usage_limit ); ?>" name="usage_limit" placeholder="<?php _e( 'Límite de uso', 'dokan' ); ?>" class="dokan-form-control input-md" type="text">
        </div>
    </div>

    <div class="dokan-form-group">
        <label class="dokan-w3 dokan-control-label" for="dokan-expire"><?php _e( 'Fecha de caducidad', 'dokan' ); ?></label>
        <div class="dokan-w5 dokan-text-left">
            <input id="dokan-expire" value="<?php echo esc_attr( $expire ); ?>" name="expire" placeholder="<?php _e( 'Fecha de caducidad', 'dokan' ); ?>" class="dokan-form-control input-md datepicker" type="text">
        </div>
    </div>

    <div class="dokan-form-group">
        <label class="dokan-w3 dokan-control-label" for="checkboxes"><?php _e( 'Excluir artículos en oferta', 'dokan' ); ?></label>
        <div class="dokan-w7 dokan-text-left">
            <div class="checkbox">
                <label for="checkboxes-2">
                    <input name="exclude_sale_items" <?php echo $exclide_sale_item; ?> id="checkboxes-2" value="yes" type="checkbox">
                    <?php _e( 'Marque esta casilla si el cupón no debe aplicarse a los artículos en oferta.', 'dokan' );?>
                </label>

                <div class="help">
                    <?php _e(' Los cupones por artículo solo funcionarán si el artículo no está en oferta. Los cupones por carrito solo funcionarán si no hay artículos en oferta en el carrito.', 'dokan' ); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="dokan-form-group">
        <label class="dokan-w3 dokan-control-label" for="minium_ammount"><?php _e( 'Monto minimo', 'dokan' ); ?></label>
        <div class="dokan-w5 dokan-text-left">
            <input id="minium_ammount" value="<?php echo $minimum_amount; ?>" name="minium_ammount" placeholder="<?php esc_attr_e( 'Monto minimo', 'dokan' ); ?>" class="wc_input_price dokan-form-control input-md" type="text">
        </div>
    </div>

    <div class="dokan-form-group">
        <label class="dokan-w3 dokan-control-label" for="product-dropdown"><?php _e( 'Producto', 'dokan' ); ?><span class="required"> *</span></label>
        <div class="dokan-w5 dokan-text-left">
            <select class="dokan-form-control dokan-coupon-product-select dokan-product-search" multiple="multiple" style="width: 100%;" id="product_drop_down[]" name="product_drop_down[]" data-placeholder="<?php esc_attr_e( 'Busque un producto &hellip;', 'dokan' ); ?>" data-action="dokan_json_search_products_and_variations" data-user_ids="<?php echo dokan_get_current_user_id(); ?>">
                <option value="select_all"><?php esc_html_e( 'Seleccionar todo', 'dokan' ); ?></option>
                <?php
                    foreach ( $products_id as $id ) {
                        $product = wc_get_product( $id );
                        if ( is_object( $product ) ) {
                            echo '<option value="' . esc_attr( $id ) . '"' . selected( true, true, false ) . '>' . wp_kses_post( $product->get_formatted_name() ) . '</option>';
                        }
                    }
                ?>
            </select>
            <a href="#" style="margin-top: 5px;" class="dokan-btn dokan-btn-default dokan-btn-sm dokan-coupon-product-select-all"><?php _e( 'Seleccionar todo', 'dokan' ) ?></a>
            <a href="#" style="margin-top: 5px;" class="dokan-btn dokan-btn-default dokan-btn-sm dokan-coupon-product-clear-all"><?php _e( 'Limpiar', 'dokan' ) ?></a>
        </div>
    </div>

    <div class="dokan-form-group">
        <label class="dokan-w3 dokan-control-label" for="product"><?php _e( 'Excluir productos', 'dokan' ); ?></label>
        <div class="dokan-w5 dokan-text-left">
            <select class="dokan-form-control dokan-product-search" multiple="multiple" style="width: 100%;" id="exclude_product_ids[]" name="exclude_product_ids[]" data-placeholder="<?php esc_attr_e( 'Busque un producto &hellip;', 'dokan' ); ?>" data-action="dokan_json_search_products_and_variations" data-user_ids="<?php echo dokan_get_current_user_id(); ?>">
                <option value="select_all"><?php esc_html_e( 'Seleccionar todo', 'dokan' ); ?></option>
                <?php
                    foreach ( $exclude_products as $id ) {
                        $product = wc_get_product( $id );
                        if ( is_object( $product ) ) {
                            echo '<option value="' . esc_attr( $id ) . '"' . selected( true, true, false ) . '>' . wp_kses_post( $product->get_formatted_name() ) . '</option>';
                        }
                    }
                ?>
            </select>
        </div>
    </div>

    <div class="dokan-form-group">
        <label class="dokan-w3 dokan-control-label" for="checkboxes"><?php _e( 'Mostrar en la tienda', 'dokan' ); ?></label>
        <div class="dokan-w7 dokan-text-left">
            <div class="checkbox">
                <label for="checkboxes-3">
                    <input name="show_on_store" <?php echo $show_on_store; ?> id="checkboxes-3" value="yes" type="checkbox">
                    <?php _e( 'Marque esta casilla si desea mostrar este cupón en la página de la tienda.', 'dokan' );?>
                </label>
            </div>
        </div>
    </div>

    <?php do_action( 'dokan_coupon_form_fields_end', $post_id ); ?>

    <div class="dokan-form-group">
        <div class="dokan-w5 ajax_prev dokan-text-left" style="margin-left:23%">
            <input type="submit" id="" name="coupon_creation" value="<?php echo $button_name; ?>" class="dokan-btn dokan-btn-danger dokan-btn-theme">
        </div>
    </div>

</form>

<style>
    .select2-container--default .select2-selection--multiple .select2-selection__rendered {
        max-height: 200px;
        overflow-y: scroll;
    }

</style>

<script>
    ;( function($) {
        $( '.dokan-coupon-product-select-all' ).click( function(e) {
            e.preventDefault();
            var self = $(this),
            select = self.closest('div').find('select.dokan-coupon-product-select');
            select.find('option:first').prop( 'selected', 'selected' );
            select.trigger('change');
        });

        $( '.dokan-coupon-product-clear-all' ).click( function(e) {
            e.preventDefault();
            var self = $(this),
            select = self.closest('div').find('select.dokan-coupon-product-select');
            select.val("");
            select.trigger('change');
        });
    })(jQuery);
</script>
