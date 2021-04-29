<div class="dokan-download-options dokan-edit-row dokan-clearfix <?php echo esc_attr( $class ); ?>">
    <div class="dokan-section-heading" data-togglehandler="dokan_download_options">
        <h2><i class="fa fa-download" aria-hidden="true"></i> <?php esc_html_e( 'Opciones descargables', 'dokan-lite' ); ?></h2>
        <p><?php esc_html_e( 'Configure los ajustes de su producto descargable', 'dokan-lite' ); ?></p>
        <a href="#" class="dokan-section-toggle">
            <i class="fa fa-sort-desc fa-flip-vertical" aria-hidden="true"></i>
        </a>
        <div class="dokan-clearfix"></div>
    </div>

    <div class="dokan-section-content">
        <div class="dokan-divider-top dokan-clearfix">

            <?php do_action( 'dokan_product_edit_before_sidebar' ); ?>

            <div class="dokan-side-body dokan-download-wrapper">
                <table class="dokan-table">
                    <tfoot>
                        <tr>
                            <th colspan="3">
                                <a href="#" class="insert-file-row dokan-btn dokan-btn-sm dokan-btn-success" data-row="<?php
                                    $file = array(
                                        'file' => '',
                                        'name' => ''
                                    );
                                    ob_start();
                                    include DOKAN_INC_DIR . '/woo-views/html-product-download.php';
                                    echo esc_attr( ob_get_clean() );
                                ?>"><?php esc_html_e( 'Añadir archivo', 'dokan-lite' ); ?></a>
                            </th>
                        </tr>
                    </tfoot>
                    <thead>
                        <tr>
                            <th><?php esc_html_e( 'Nombre', 'dokan-lite' ); ?> <span class="tips" title="<?php esc_attr_e( 'Este es el nombre de la descarga que se muestra al cliente.', 'dokan-lite' ); ?>">[?]</span></th>
                            <th><?php esc_html_e( 'URL del archivo', 'dokan-lite' ); ?> <span class="tips" title="<?php esc_attr_e( 'Esta es la URL o ruta absoluta al archivo al que los clientes tendrán acceso.', 'dokan-lite' ); ?>">[?]</span></th>
                            <th><?php esc_html_e( 'Acción', 'dokan-lite' ); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $downloadable_files = get_post_meta( $post_id, '_downloadable_files', true );

                        if ( $downloadable_files ) {
                            foreach ( $downloadable_files as $key => $file ) {
                                include DOKAN_INC_DIR . '/woo-views/html-product-download.php';
                            }
                        }
                        ?>
                    </tbody>
                </table>

                <div class="dokan-clearfix">
                    <div class="content-half-part">
                        <label for="_download_limit" class="form-label"><?php esc_html_e( 'Limite de descargas', 'dokan-lite' ); ?></label>
                        <?php dokan_post_input_box( $post_id, '_download_limit', array( 'placeholder' => __( 'e.g. 4', 'dokan-lite' ) ) ); ?>
                    </div><!-- .content-half-part -->

                    <div class="content-half-part">
                        <label for="_download_expiry" class="form-label"><?php esc_html_e( 'Caducidad de descarga', 'dokan-lite' ); ?></label>
                        <?php dokan_post_input_box( $post_id, '_download_expiry', array( 'placeholder' => __( 'Número de días', 'dokan-lite' ) ) ); ?>
                    </div><!-- .content-half-part -->
                </div>

            </div> <!-- .dokan-side-body -->
        </div> <!-- .downloadable -->
    </div>
</div>
