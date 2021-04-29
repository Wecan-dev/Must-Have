<?php
/**
 * Dokan Withdraw Status filter template
 *
 * @since 2.4
 *
 * @package dokan
 */
?>
<ul class="list-inline subsubsub">
    <li<?php echo $current == 'pending' ? ' class="active"' : ''; ?>>
        <a href="<?php echo esc_url( dokan_get_navigation_url( 'withdraw' ) ); ?>"><?php esc_html_e( 'Solicitudes de retiro', 'dokan-lite' ); ?></a>
    </li>
    <li<?php echo $current == 'approved' ? ' class="active"' : ''; ?>>
        <a href="<?php echo esc_url( add_query_arg( array( 'type' => 'approved' ), dokan_get_navigation_url( 'withdraw' ) ) ); ?>"><?php esc_html_e( 'Solicitudes aprobadas', 'dokan-lite' ); ?></a>
    </li>
    <li<?php echo $current == 'cancelled' ? ' class="active"' : ''; ?>>
        <a href="<?php echo esc_url( add_query_arg( array( 'type' => 'cancelled' ), dokan_get_navigation_url( 'withdraw' ) ) ); ?>"><?php esc_html_e( 'Solicitudes canceladas', 'dokan-lite' ); ?></a>
    </li>
</ul>