<?php
/**
 * Dokan Review Content Template
 *
 * @since 2.4
 *
 * @package dokan
 */
?>
<div class="dokan-report-wrap informes-wrap">
    <ul class="dokan_tabs">
    <?php
    foreach ( $charts['charts'] as $key => $value ) {
        if ( isset( $value['permission'] ) && ! current_user_can( $value['permission'] ) ) {
            continue;
        }

        $class = ( $current == $key ) ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>', $class, add_query_arg( array( 'chart' => $key ), $link ), $value['title'] );
    }
    ?>
    </ul>

    <?php if ( isset( $charts['charts'][$current] ) ) { ?>
        <?php if ( isset( $charts['charts'][$current]['permission'] ) && ! current_user_can( $charts['charts'][$current]['permission'] ) ): ?>
            <?php
                dokan_get_template_part('global/dokan-error', '', array( 'deleted' => false, 'message' => __( 'No tienes permiso para ver este informe.', 'dokan' ) ) );
            ?>
        <?php else: ?>
            <div id="dokan_tabs_container">
                <div class="tab-pane active" id="home">
                    <?php
                    $func = $charts['charts'][$current]['function'];
                    if ( $func && ( is_callable( $func ) ) ) {
                        call_user_func( $func );
                    }
                    ?>
                </div>
            </div>
        <?php endif ?>

    <?php } ?>
</div> 

<?php
    $datepicker_format = 'yy-mm-dd';
    if ( get_option( 'date_format' ) === 'F j, Y' ) {
        $datepicker_format = 'MM d, yy';
    }
?>

<script>
    (function($){
        $(document).ready(function(){
            $('.datepicker').datepicker({
                dateFormat: '<?php echo $datepicker_format; ?>'
            });
        });
    })(jQuery);
</script>
