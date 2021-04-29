<?php
/**
 * Shipping template
 *
 * @since  2.0
 */

$country_obj     = new WC_Countries();
$countries       = $country_obj->countries;
$states          = $country_obj->states;
$user_id         = get_current_user_id();
$processing_time = dokan_get_shipping_processing_times();

$dps_enable_shipping     = get_user_meta( $user_id, '_dps_shipping_enable', true );
$dps_shipping_type_price = get_user_meta( $user_id, '_dps_shipping_type_price', true );
$dps_additional_product  = get_user_meta( $user_id, '_dps_additional_product', true );
$dps_additional_qty      = get_user_meta( $user_id, '_dps_additional_qty', true );
$dps_form_location       = get_user_meta( $user_id, '_dps_form_location', true );
$dps_country_rates       = get_user_meta( $user_id, '_dps_country_rates', true );
$dps_state_rates         = get_user_meta( $user_id, '_dps_state_rates', true );
$dps_pt                  = get_user_meta( $user_id, '_dps_pt', true );
$dps_shipping_policy     = get_user_meta( $user_id, '_dps_ship_policy', true );
$dps_refund_policy       = get_user_meta( $user_id, '_dps_refund_policy', true );
// Testing Extra code for shipping
?>

<form method="post" id="shipping-form"  action="" class="dokan-form-horizontal">

    <?php  wp_nonce_field( 'dokan_shipping_form_field', 'dokan_shipping_form_field_nonce' ); ?>

    <?php
    /**
     * @since 2.2.2 Insert action before shipping settings form
     */
    do_action( 'dokan_shipping_settings_form_top' ); ?>

    <div class="dokan-form-group">
        <label class="dokan-w4 dokan-control-label" for="dps_enable_shipping" style="margin-top:6px">
            <?php _e( 'Habilitar envío', 'dokan' ); ?>
            <span class="dokan-tooltips-help tips" title="<?php esc_attr_e( 'Marque esto si desea habilitar el envío para su tienda', 'dokan' ); ?>">
                <i class="fa fa-question-circle"></i>
            </span>
        </label>

        <div class="dokan-w5 dokan-text-left">
            <div class="checkbox">
                <label>
                    <input type="hidden" name="dps_enable_shipping" value="no">
                    <input type="checkbox" name="dps_enable_shipping" value="yes" <?php checked( 'yes', $dps_enable_shipping, true ); ?>> <?php _e( 'Habilitar la funcionalidad de envío', 'dokan' ); ?>
                </label>
            </div>
        </div>
    </div>

    <div class="dokan-shipping-wrapper">

        <div class="dokan-form-group dokan-shipping-price dokan-shipping-type-price">
            <label class="dokan-w4 dokan-control-label" for="shipping_type_price">
                <?php _e( 'Default Shipping Price', 'dokan' ); ?>
                <span class="dokan-tooltips-help tips" title="<?php esc_attr_e( 'Este es el precio base y será el precio de envío inicial para cada producto.', 'dokan' ); ?>">
                    <i class="fa fa-question-circle"></i>
                </span>
            </label>

            <div class="dokan-w5 dokan-text-left">
                <input id="shipping_type_price" value="<?php echo $dps_shipping_type_price; ?>" name="dps_shipping_type_price" placeholder="0.00" class="dokan-form-control" type="number" step="any" min="0">
            </div>
        </div>

        <div class="dokan-form-group dokan-shipping-price dokan-shipping-add-product">
            <label class="dokan-w4 dokan-control-label" for="dps_additional_product">
                <?php _e( 'Precio adicional por producto', 'dokan' ); ?>
                <span class="dokan-tooltips-help tips" title="<?php esc_attr_e( 'Si un cliente compra más de un tipo de producto en su tienda, el primer producto de cada segundo tipo se cobrará con este precio.', 'dokan' ); ?>">
                    <i class="fa fa-question-circle"></i>
                </span>
            </label>

            <div class="dokan-w5 dokan-text-left">
                <input id="additional_product" value="<?php echo $dps_additional_product; ?>" name="dps_additional_product" placeholder="0.00" class="dokan-form-control" type="number" step="any" min="0">
            </div>
        </div>

        <div class="dokan-form-group dokan-shipping-price dokan-shipping-add-qty">
            <label class="dokan-w4 dokan-control-label" for="dps_additional_qty">
                <?php _e( 'Precio adicional por cantidad', 'dokan' ); ?>
                <span class="dokan-tooltips-help tips" title="<?php esc_attr_e( 'Cada segundo producto del mismo tipo se cobrará con este precio.', 'dokan' ); ?>">
                    <i class="fa fa-question-circle"></i>
                </span>
            </label>

            <div class="dokan-w5 dokan-text-left">
                <input id="additional_qty" value="<?php echo $dps_additional_qty; ?>" name="dps_additional_qty" placeholder="0.00" class="dokan-form-control" type="number" step="any" min="0">
            </div>
        </div>

        <div class="dokan-form-group dokan-shipping-price dokan-shipping-add-qty">
            <label class="dokan-w4 dokan-control-label" for="dps_pt">
                <?php _e( 'Tiempo de procesamiento', 'dokan' ); ?>
                <span class="dokan-tooltips-help tips" title="<?php esc_attr_e( 'El tiempo requerido antes de enviar el producto para la entrega.', 'dokan' ); ?>">
                    <i class="fa fa-question-circle"></i>
                </span>
            </label>

            <div class="dokan-w5 dokan-text-left">
                <select name="dps_pt" id="dps_pt" class="dokan-form-control">
                    <?php foreach ( $processing_time as $processing_key => $processing_value ): ?>
                          <option value="<?php echo $processing_key; ?>" <?php selected( $dps_pt, $processing_key ); ?>><?php echo $processing_value; ?></option>
                    <?php endforeach ?>
                </select>
                <!-- <input id="additional_qty" value="<?php echo $dps_pt; ?>" name="dps_pt" placeholder="0.00" class="dokan-form-control" type="number" step="any" min="0"> -->
            </div>
        </div>

        <div class="dokan-form-group">
            <label class="dokan-w4 dokan-control-label" for="_dps_ship_policy">
                <?php _e( 'Politica de envios', 'dokan' ); ?>
                <span class="dokan-tooltips-help tips" title="<?php _e( 'Escriba sus términos, condiciones e instrucciones sobre el envío.', 'dokan' ); ?>">
                    <i class="fa fa-question-circle"></i>
                </span>
            </label>

            <div class="dokan-w6 dokan-text-left">
                <textarea name="dps_ship_policy" id="" class="dokan-form-control"><?php echo $dps_shipping_policy; ?></textarea>
            </div>
        </div>

        <div class="dokan-form-group">
            <label class="dokan-w4 dokan-control-label" for="_dps_refund_policy">
                <?php _e( 'Politica de reembolso', 'dokan' ); ?>
                <span class="dokan-tooltips-help tips" title="<?php _e( 'Escriba sus términos, condiciones e instrucciones sobre el reembolso', 'dokan' ); ?>">
                    <i class="fa fa-question-circle"></i>
                </span>
            </label>

            <div class="dokan-w6 dokan-text-left">
                <textarea name="dps_refund_policy" id="" class="dokan-form-control"><?php echo $dps_refund_policy; ?></textarea>
            </div>
        </div>

        <div class="dokan-form-group">
            <label class="dokan-w4 dokan-control-label" for="dps_form_location">
                <?php _e( 'Se envía desde:', 'dokan' ); ?>
                <span class="dokan-tooltips-help tips" title="<?php _e( 'Ubicación desde donde se envían los productos para su entrega. Por lo general, es lo mismo que en la tienda.', 'dokan' ); ?>">
                    <i class="fa fa-question-circle"></i>
                </span>
            </label>

            <div class="dokan-w5">
                <select name="dps_form_location" class="dokan-form-control">
                    <?php dokan_country_dropdown( $countries, $dps_form_location ); ?>
                </select>
            </div>
        </div>

        <div class="dokan-form-group">

            <div class="dokan-w12 dps-main-wrapper">
                <div class="dokan-shipping-location-wrapper">

                <p class="dokan-page-help"><?php _e( 'Agregue los países a los que entrega sus productos. También puede especificar estados. Si el precio de envío es el mismo excepto en algunos países / estados, hay una opción <strong> En cualquier otro lugar </strong>, puede usarla.', 'dokan' ) ?></p>

                <?php if ( $dps_country_rates ) : ?>

                    <?php foreach ( $dps_country_rates as $country => $country_rate ) : ?>

                        <div class="dps-shipping-location-content">

                            <table class="dps-shipping-table">
                                <tbody>

                                    <tr class="dps-shipping-location">
                                        <td width="40%">
                                            <label for=""><?php _e( 'Envie a', 'dokan' ); ?>
                                            <span class="dokan-tooltips-help tips" title="<?php _e( 'El país al que envías', 'dokan' ); ?>">
                                            <i class="fa fa-question-circle"></i></span></label>
                                            <select name="dps_country_to[]" class="dokan-form-control dps_country_selection" id="dps_country_selection">
                                                <?php dokan_country_dropdown( $countries, $country, true ); ?>
                                            </select>
                                        </td>
                                        <td class="dps_shipping_location_cost">
                                            <label for=""><?php _e( 'Costo', 'dokan' ); ?>
                                            <span class="dokan-tooltips-help tips" title="<?php _e( 'Si el precio de envío es el mismo para todos los estados, use este campo. De lo contrario, agregue manualmente los estados a continuación', 'dokan' ); ?>">
                                            <i class="fa fa-question-circle"></i></span></label>
                                            <div class="dokan-input-group">
                                                <span class="dokan-input-group-addon"><?php echo get_woocommerce_currency_symbol(); ?></span>
                                                <input type="text" placeholder="0.00" class="dokan-form-control" name="dps_country_to_price[]" value="<?php echo esc_attr( $country_rate ); ?>">
                                            </div>
                                        </td>
                                    </tr>

                                    <tr class="dps-shipping-states-wrapper">
                                        <table class="dps-shipping-states">
                                            <tbody>
                                               <?php if ( $dps_state_rates ): ?>
                                                    <?php if ( isset( $dps_state_rates[$country] ) ): ?>

                                                        <?php foreach ( $dps_state_rates[$country] as $state => $state_rate ): ?>

                                                            <?php if ( isset( $states[$country] ) && !empty( $states[$country] ) ): ?>

                                                                <tr>
                                                                    <td>
                                                                        <label for=""><?php _e( 'Estado', 'dokan' ) ?>
                                                                        <span class="dokan-tooltips-help tips" title="<?php _e( 'El estado al que envías', 'dokan' ); ?>">
                                                                        <i class="fa fa-question-circle"></i></span></label>
                                                                        <select name="dps_state_to[<?php echo $country ?>][]" class="dokan-form-control dps_state_selection">
                                                                            <?php dokan_state_dropdown( $states[$country], $state, true ); ?>
                                                                        </select>
                                                                    </td>
                                                                    <td>
                                                                        <label for=""><?php _e( 'Costo', 'dokan' ); ?>
                                                                        <span class="dokan-tooltips-help tips" title="<?php _e( 'Precio de envío para este estado', 'dokan' ); ?>">
                                                                        <i class="fa fa-question-circle"></i></span></label>
                                                                        <div class="dokan-input-group">
                                                                            <span class="dokan-input-group-addon"><?php echo get_woocommerce_currency_symbol(); ?></span>
                                                                            <input type="text" placeholder="0.00" value="<?php echo $state_rate; ?>" class="dokan-form-control" name="dps_state_to_price[<?php echo $country; ?>][]">
                                                                        </div>
                                                                    </td>

                                                                    <td width="15%">
                                                                        <label for=""></label>
                                                                        <div>
                                                                            <a class="dps-add" href="#"><i class="fa fa-plus"></i></a>
                                                                            <a class="dps-remove" href="#"><i class="fa fa-minus"></i></a>
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                            <?php else: ?>

                                                                <tr>
                                                                    <td>
                                                                        <label for=""><?php _e( 'Estado', 'dokan' ); ?></label>
                                                                        <input type="text" name="dps_state_to[<?php echo $country ?>][]" class="dokan-form-control dps_state_selection" placeholder="<?php _e( 'Nombre del estado', 'dokan' ); ?>" value="<?php echo $state; ?>">
                                                                    </td>
                                                                    <td>
                                                                        <label for=""><?php _e( 'Costo', 'dokan' ); ?></label>
                                                                        <div class="dokan-input-group">
                                                                            <span class="dokan-input-group-addon"><?php echo get_woocommerce_currency_symbol(); ?></span>
                                                                            <input type="text" placeholder="0.00" class="dokan-form-control" name="dps_state_to_price[<?php echo $country; ?>][]" value="<?php echo $state_rate; ?>">
                                                                        </div>
                                                                    </td>

                                                                    <td width="14%">
                                                                        <label for=""></label>
                                                                        <div>
                                                                            <a class="dps-add" href="#"><i class="fa fa-plus"></i></a>
                                                                            <a class="dps-remove" href="#"><i class="fa fa-minus"></i></a>
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                            <?php endif ?>

                                                        <?php endforeach ?>

                                                    <?php endif ?>

                                                <?php endif ?>
                                            </tbody>
                                        </table>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="#" class="dps-shipping-remove"><i class="fa fa-remove"></i></a>
                        </div>

                    <?php endforeach; ?>

                <?php else: ?>

                    <div class="dps-shipping-location-content">
                        <table class="dps-shipping-table">
                            <tbody>
                                <tr class="dps-shipping-location">
                                    <td>
                                        <label for=""><?php _e( 'Envie a', 'dokan' ); ?>
                                        <span class="dokan-tooltips-help tips" title="<?php _e( 'El país al que envías', 'dokan' ); ?>">
                                        <i class="fa fa-question-circle"></i></span></label>
                                        <select name="dps_country_to[]" class="dokan-form-control dps_country_selection" id="dps_country_selection">
                                            <?php dokan_country_dropdown( $countries, '', true ); ?>
                                        </select>
                                    </td>
                                    <td class="dps_shipping_location_cost">
                                        <label for=""><?php _e( 'Costo', 'dokan' ); ?>
                                        <span class="dokan-tooltips-help tips" title="<?php _e( 'Si el precio de envío es el mismo para todos los estados, use este campo. De lo contrario, agregue manualmente los estados a continuación', 'dokan' ); ?>">
                                        <i class="fa fa-question-circle"></i></span></label>
                                        <div class="dokan-input-group">
                                            <span class="dokan-input-group-addon"><?php echo get_woocommerce_currency_symbol(); ?></span>
                                            <input type="text" placeholder="0.00" class="dokan-form-control" name="dps_country_to_price[]">
                                        </div>
                                    </td>
                                </tr>

                                <tr class="dps-shipping-states-wrapper">
                                    <table class="dps-shipping-states">
                                        <tbody></tbody>
                                    </table>
                                </tr>

                            </tbody>
                        </table>
                        <a href="#" class="dps-shipping-remove"><i class="fa fa-remove"></i></a>
                    </div>
                <?php endif; ?>

                </div>
                <a href="#" class="dokan-btn dokan-btn-default dps-shipping-add dokan-right"><?php _e( 'Añadir lugar', 'dokan' ); ?></a>
            </div>
        </div>

    </div>

    <?php
    /**
     * @since 2.2.2 Insert action after social settings form
     */
    do_action( 'dokan_shipping_settings_form_bottom' ); ?>

    <div class="dokan-form-group">

        <div class="dokan-w4 ajax_prev dokan-text-left" style="margin-left:23%;">
            <input type="submit" name="dokan_update_shipping_options" class="dokan-btn dokan-btn-danger dokan-btn-theme" value="<?php esc_attr_e( 'Guardar ajustes', 'dokan' ); ?>">
        </div>
    </div>
</form>

<!-- Render Via js for add black location field -->
<div class="dps-shipping-location-content" id="dps-shipping-hidden-lcoation-content">
    <table class="dps-shipping-table">
        <tbody>

            <tr class="dps-shipping-location">
                <td>
                    <label for=""><?php _e( 'Envie a', 'dokan' ); ?>
                    <span class="dokan-tooltips-help tips" title="<?php _e( 'El país al que envías', 'dokan' ); ?>">
                    <i class="fa fa-question-circle"></i></span></label>
                    <select name="dps_country_to[]" class="dokan-form-control dps_country_selection" id="dps_country_selection">
                        <?php dokan_country_dropdown( $countries, '', true ); ?>
                    </select>
                </td>
                <td class="dps_shipping_location_cost">
                    <label for=""><?php _e( 'Cost', 'dokan' ); ?>
                    <span class="dokan-tooltips-help tips" title="<?php _e( 'Si el precio de envío es el mismo para todos los estados, use este campo. De lo contrario, agregue manualmente los estados a continuación', 'dokan' ); ?>">
                    <i class="fa fa-question-circle"></i></span></label>
                    <div class="dokan-input-group">
                        <span class="dokan-input-group-addon"><?php echo get_woocommerce_currency_symbol(); ?></span>
                        <input type="text" placeholder="0.00" class="dokan-form-control" name="dps_country_to_price[]">
                    </div>
                </td>
            </tr>
            <tr class="dps-shipping-states-wrapper">
                <table class="dps-shipping-states">
                    <tbody></tbody>
                </table>
            </tr>
        </tbody>
    </table>
    <a href="#" class="dps-shipping-remove"><i class="fa fa-remove"></i></a>
</div>
