<?php $_sold_individually = get_post_meta( $post_id, '_sold_individually', true ); ?>
<div class="dokan-form-horizontal">
    <div class="dokan-form-group">
        <label class="dokan-w4 dokan-control-label" for="_purchase_note"><?php _e( 'Nota de compra', 'dokan' ); ?></label>
        <div class="dokan-w6 dokan-text-left">
            <?php dokan_post_input_box( $post->ID, '_purchase_note', array(), 'textarea' ); ?>
        </div>
    </div>

    <div class="dokan-form-group">
        <label class="dokan-w4 dokan-control-label" for="_enable_reviews"><?php _e( 'Reseñas', 'dokan' ); ?></label>
        <div class="dokan-w4 dokan-text-left">
            <?php $_enable_reviews = ( $post->comment_status == 'open' ) ? 'yes' : 'no'; ?>
            <?php dokan_post_input_box( $post->ID, '_enable_reviews', array('value' => $_enable_reviews, 'label' => __( 'Habilitar reseñas ', 'dokan' ) ), 'checkbox' ); ?>
        </div>
    </div>

    <div class="dokan-form-group">
        <label class="dokan-w4 dokan-control-label" for="_purchase_note"><?php _e( 'Visibilidad', 'dokan' ); ?></label>
        <div class="dokan-w6 dokan-text-left">
            <select name="_visibility" id="_visibility" class="dokan-form-control">
                <?php foreach ( $visibility_options = dokan_get_product_visibility_options() as $name => $label ): ?>
                    <option value="<?php echo $name; ?>" <?php selected( $_visibility, $name ); ?>><?php echo $label; ?></option>
                <?php endforeach ?>
            </select>
        </div>
    </div>

    <div class="dokan-form-group">
        <label class="dokan-w4 dokan-control-label" for="_sold_individually"><?php _e( 'Vendido Individualmente', 'dokan' ); ?></label>
        <div class="dokan-w7 dokan-text-left">
            <input name="_sold_individually" id="_sold_individually" value="yes" type="checkbox" <?php checked( $_sold_individually, 'yes' ); ?>>
            <?php _e( 'Permita que oooooo solo se compre una cantidad de este producto en un solo pedido', 'dokan' ) ?>
        </div>
    </div>

</div> <!-- .form-horizontal -->