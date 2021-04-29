<?php
/**
 *  Dahboard Coupon Header Template
 *
 *  @since 2.4
 *
 *  @package dokan
 */
?>
<header class="dokan-dashboard-header">
    <span class="left-header-content">
        <h1 class="entry-title">
            <?php _e( 'Cupones', 'dokan' ); ?>

            <?php
                if ( $is_edit_page ) {
                    echo $is_edit ? sprintf( '<small> - %s</small>', __( 'Editar cupón', 'dokan' ) ) : sprintf( '<small> - %s</small>', __( 'Agregar cupón', 'dokan' ) );
                }
            ?>

            <?php if ( ! $is_edit_page && current_user_can( 'dokan_add_coupon' ) ) { ?>
                <span class="left-header-content dokan-right">
                    <a href="<?php echo add_query_arg( array( 'view' => 'add_coupons' ), dokan_get_navigation_url( 'coupons' ) ); ?>" class="dokan-btn dokan-btn-theme dokan-right"><i class="fa fa-gift">&nbsp;</i> <?php _e( 'Agregar nuevo cupón', 'dokan' ); ?></a>
                </span>
            <?php } ?>
        </h1>
    </span>
    <div class="dokan-clearfix"></div>
</header><!-- .entry-header -->
