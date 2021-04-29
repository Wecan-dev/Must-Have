<div class="dokan-product-inventory dokan-edit-row <?php echo esc_attr( $class ); ?>">
    <div class="dokan-section-heading" data-togglehandler="dokan_product_inventory">
        <h2><i class="fa fa-cubes" aria-hidden="true"></i> <?php esc_html_e( 'Inventario', 'dokan-lite' ); ?></h2>
        <p><?php esc_html_e( 'Administrar el inventario de este producto.', 'dokan-lite' ); ?></p>
        <a href="#" class="dokan-section-toggle">
            <i class="fa fa-sort-desc fa-flip-vertical" aria-hidden="true"></i>
        </a>
        <div class="dokan-clearfix"></div>
    </div>

    <div class="dokan-section-content" style="display: none;">

        <div class="content-half-part dokan-form-group hide_if_variation">
            <label for="_sku" class="form-label"><?php esc_html_e( 'REF', 'dokan-lite' ); ?> <span><?php esc_html_e( '(Unidad de mantenimiento de stock)', 'dokan-lite' ); ?></span></label>
            <?php dokan_post_input_box( $post_id, '_sku' ); ?>
        </div>

        <div class="content-half-part hide_if_variable">
            <label for="_stock_status" class="form-label"><?php esc_html_e( 'Estado del inventario', 'dokan-lite' ); ?></label>

            <?php dokan_post_input_box( $post_id, '_stock_status', array( 'options' => array(
                'instock'     => __( 'En Stock', 'dokan-lite' ),
                'outofstock'  => __( 'Fuera de Stock', 'dokan-lite' ),
                'onbackorder' => __( 'Realizado pedido', 'dokan-lite' ),
            ) ), 'select' ); ?>
        </div>

        <div class="dokan-clearfix"></div>

        <?php if ( 'yes' === get_option( 'woocommerce_manage_stock' ) ) : ?>
        <div class="dokan-form-group hide_if_variation hide_if_grouped">
            <?php dokan_post_input_box( $post_id, '_manage_stock', array( 'label' => __( 'Habilite la gestión de stock de productos', 'dokan-lite' ) ), 'checkbox' ); ?>
        </div>

        <div class="show_if_stock dokan-stock-management-wrapper dokan-form-group dokan-clearfix">

            <div class="content-half-part hide_if_variation">
                <label for="_stock" class="form-label"><?php esc_html_e( 'Cantidad de stock', 'dokan-lite' ); ?></label>
                <input type="number" class="dokan-form-control" name="_stock" placeholder="<?php esc_attr__( '1', 'dokan-lite' ); ?>" value="<?php echo esc_attr( wc_stock_amount( $_stock ) ); ?>" min="0" step="1">
            </div>

            <?php if ( version_compare( WC_VERSION, '3.4.7', '>' ) ) : ?>
            <div class="content-half-part hide_if_variation">
                <label for="_low_stock_amount" class="form-label"><?php esc_html_e( 'Umbral de stock bajo', 'dokan-lite' ); ?></label>
                <input type="number" class="dokan-form-control" name="_low_stock_amount" placeholder="<?php esc_attr__( '1', 'dokan-lite' ); ?>" value="<?php echo esc_attr( wc_stock_amount( $_low_stock_amount ) ); ?>" min="0" step="1">
            </div>
            <?php endif; ?>

            <div class="content-half-part hide_if_variation last-child">
                <label for="_backorders" class="form-label"><?php esc_html_e( 'Permitir pedidos pendientes', 'dokan-lite' ); ?></label>

                <?php dokan_post_input_box( $post_id, '_backorders', array( 'options' => array(
                    'no'     => __( 'No permitir', 'dokan-lite' ),
                    'notify' => __( 'Permitir pero notificar al cliente', 'dokan-lite' ),
                    'yes'    => __( 'Permitir', 'dokan-lite' )
                ) ), 'select' ); ?>
            </div>
            <div class="dokan-clearfix"></div>
        </div><!-- .show_if_stock -->
        <?php endif; ?>

        <div class="dokan-form-group hide_if_grouped">
            <label class="" for="_sold_individually">
                <input name="_sold_individually" id="_sold_individually" value="yes" type="checkbox" <?php checked( $_sold_individually, 'yes' ); ?>>
                <?php esc_html_e( 'Permita que solo se compre una cantidad de este producto en un solo pedido', 'dokan-lite' ) ?>
            </label>
        </div>

        <?php if ( $post_id ): ?>
            <?php do_action( 'dokan_product_edit_after_inventory' ); ?>
        <?php endif; ?>

        <?php do_action( 'dokan_product_edit_after_downloadable', $post, $post_id ); ?>
        <?php do_action( 'dokan_product_edit_after_sidebar', $post, $post_id ); ?>
        <?php do_action( 'dokan_single_product_edit_after_sidebar', $post, $post_id ); ?>

    </div><!-- .dokan-side-right -->
</div><!-- .dokan-product-inventory -->
