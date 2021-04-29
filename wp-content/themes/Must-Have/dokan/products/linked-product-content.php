<div class="dokan-linked-product-options dokan-edit-row dokan-clearfix">
    <div class="dokan-section-heading" data-togglehandler="dokan_linked_product_options">
        <h2><i class="fa fa-link" aria-hidden="true"></i> <?php _e( 'Productos vinculados', 'dokan' ); ?></h2>
        <p><?php _e( 'Configure sus productos vinculados para ventas adicionales y ventas cruzadas', 'dokan' ); ?></p>
        <a href="#" class="dokan-section-toggle">
            <i class="fa fa-sort-desc fa-flip-vertical" aria-hidden="true"></i>
        </a>
        <div class="dokan-clearfix"></div>
    </div>

    <div class="dokan-section-content">
        <div class="content-half-part dokan-form-group hide_if_variation">
            <label for="upsell_ids" class="form-label"><?php _e( 'Ventas adicionales', 'dokan' ); ?> <i class="fa fa-question-circle tips" aria-hidden="true" data-title="<?php _e( 'Las ventas adicionales son productos que usted recomienda en lugar del producto que está viendo actualmente, por ejemplo, productos que son más rentables, de mejor calidad o más caros.', 'dokan' ); ?>"></i></label>
            <select class="dokan-form-control dokan-product-search" multiple="multiple" style="width: 100%;" id="upsell_ids" name="upsell_ids[]" data-placeholder="<?php esc_attr_e( 'Buscar un producto&hellip;', 'dokan' ); ?>" data-action="dokan_json_search_products_and_variations" data-exclude="<?php echo intval( $post->ID ); ?>" data-user_ids="<?php echo dokan_get_current_user_id(); ?>">
                <?php
                    if ( !empty( $upsells_ids ) ) {
                        foreach ( $upsells_ids as $product_id ) {
                            $product = wc_get_product( $product_id );
                            if ( is_object( $product ) ) {
                                echo '<option value="' . esc_attr( $product_id ) . '"' . selected( true, true, false ) . '>' . wp_kses_post( $product->get_formatted_name() ) . '</option>';
                            }
                        }
                    }
                ?>
            </select>
        </div>

        <div class="content-half-part">
            <label for="crosssell_ids" class="form-label"><?php _e( 'Ventas cruzadas', 'dokan' ); ?> <i class="fa fa-question-circle tips" aria-hidden="true" data-title="<?php _e( 'Las ventas cruzadas son productos que promociona en el carrito, según el producto actual.', 'dokan' ); ?>"></i></label>
            <select class="dokan-form-control dokan-product-search" multiple="multiple" style="width: 100%;" id="crosssell_ids" name="crosssell_ids[]" data-placeholder="<?php esc_attr_e( 'Buscar un producto&hellip;', 'dokan' ); ?>" data-action="dokan_json_search_products_and_variations" data-exclude="<?php echo intval( $post->ID ); ?>" data-user_ids="<?php echo dokan_get_current_user_id(); ?>">
                <?php
                    if ( ! empty( $crosssells_ids ) ) {
                        foreach ( $crosssells_ids as $product_id ) {
                            $product = wc_get_product( $product_id );
                            if ( is_object( $product ) ) {
                                echo '<option value="' . esc_attr( $product_id ) . '"' . selected( true, true, false ) . '>' . wp_kses_post( $product->get_formatted_name() ) . '</option>';
                            }
                        }
                    }
                ?>
            </select>
        </div>

        <div class="dokan-clearfix"></div>

        <?php do_action( 'dokan_after_linked_product_fields', $post, $post_id ); ?>
    </div>
</div>