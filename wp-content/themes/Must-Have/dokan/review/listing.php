<?php
/**
 * Dokan Review Listing Template
 *
 * @since 2.4
 *
 * @package dokan
 */

?>
<form id="dokan_comments-form" action="" method="post">
    <table id="dokan-comments-table" class="dokan-table dokan-table-striped">
        <?php if ( dokan_get_option( 'seller_review_manage', 'dokan_selling', 'on' ) == 'on' ) : ?>
        <thead>
            <tr>
                <th class="col-check"><input class="dokan-check-all" type="checkbox" ></th>
                <th class="col-author"><?php _e( 'Autor', 'dokan' ); ?></th>
                <th class="col-content"><?php _e( 'Comentario', 'dokan' ); ?></th>
                <th class="col-link"><?php _e( 'Enlace a', 'dokan' ); ?></th>
                <th class="col-link"><?php _e( 'Clasificación', 'dokan' ); ?></th>
            </tr>
        </thead>
        <?php endif; ?>

        <tbody>

            <?php

                /**
                 * dokan_review_listing_table_body hook
                 *
                 * @hooked dokan_render_listing_table_body
                 */
                do_action( 'dokan_review_listing_table_body', $post_type )
            ?>

        </tbody>

    </table>
<?php if ( current_user_can( 'dokan_manage_reviews' ) && dokan_get_option( 'seller_review_manage', 'dokan_selling', 'on' ) == 'on' ) : ?>
    <select name="comment_status">
        <?php
            if ( $comment_status == 'hold' ) {
                ?>
                <option value="none"><?php _e( '-Ninguno-', 'dokan' ); ?></option>
                <option value="approve"><?php _e( 'Marcar Aprobado', 'dokan' ); ?></option>
                <option value="spam"><?php _e( 'Marcar Spam', 'dokan' ); ?></option>
                <option value="trash"><?php _e( 'Marcar basura', 'dokan' ); ?></option>
            <?php } else if ( $comment_status == 'spam' ) { ?>
                <option value="none"><?php _e( '-Ninguno-', 'dokan' ); ?></option>
                <option value="approve"><?php _e( 'Marcar como no spam', 'dokan' ); ?></option>
                <option value="delete"><?php _e( 'Borrar permanentemente', 'dokan' ); ?></option>
            <?php } else if ( $comment_status == 'trash' ) { ?>
                <option value="none"><?php _e( '-Ninguno-', 'dokan' ); ?></option>
                <option value="approve"><?php _e( 'Restaurar', 'dokan' ); ?></option>
                <option value="delete"><?php _e( 'Borrar permanentemente', 'dokan' ); ?></option>
            <?php } else { ?>
                <option value="none"><?php _e( '-Ninguno-', 'dokan' ); ?></option>
                <option value="hold"><?php _e( 'Marcar como pendiente', 'dokan' ); ?></option>
                <option value="spam"><?php _e( 'Marcar como spam', 'dokan' ); ?></option>
                <option value="trash"><?php _e( 'Marcar basura', 'dokan' ); ?></option>
                <?php
            }
        ?>
    </select>

    <?php wp_nonce_field( 'dokan_comment_nonce_action', 'dokan_comment_nonce' ); ?>

    <input type="submit" value="<?php _e( 'Enviar', 'dokan' ); ?>" class="dokan-btn  dokan-danger dokan-btn-theme dokan-btn-sm" name="comt_stat_sub">
</form>
<?php endif; ?>
