<?php
/**
 * Dokan Review Listing Table body Template
 *
 * @since 2.4
 *
 * @package dokan
 */
?>
<?php

if ( count( $comments ) == 0 ) {
    ?>
        <tr><td colspan="5"><?php _e( 'No se han encontrado resultados', 'dokan' ); ?></td></tr>
    <?php
} else {

    foreach ( $comments as $comment ) {
        dokan_pro()->review->render_row( $comment, $post_type );
    }

}
