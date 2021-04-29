<script type="text/html" id="tmpl-sc-category">
    <div class="inputs-box woocommerce_attribute" data-count="[{{ data.row }}]">

        <div class="box-header">
            <input type="text" class="category-name" placeholder="<?php esc_attr_e( 'Nombre de la categoría', 'dokan' ); ?>" name="attribute_names[{{ data.row }}]" value="">

            <input type="hidden" name="attribute_is_taxonomy[{{ data.row }}]" value="0">
            <input type="hidden" name="attribute_position[{{ data.row }}]" class="attribute_position" value="{{ data.row }}" />

            <span class="actions">
                <button class="row-remove btn pull-right btn-danger btn-sm"><?php _e( 'Remover', 'dokan' ); ?></button>
            </span>
        </div>

        <div class="box-inside dokan-clearfix">

            <div class="attribute-config">
                <ul class="list-unstyled ">
                    <li>
                        <label class="checkbox-inline">
                            <input type="checkbox" class="checkbox" name="attribute_visibility[{{ data.row }}]" value="1" /> <?php _e( 'Visible en la página del producto', 'dokan' ); ?>
                        </label>
                    </li>

                    <li class="enable_variation show_if_variable">
                        <label class="checkbox-inline">
                            <input type="checkbox" class="checkbox" name="attribute_variation[{{ data.row }}]" value="1" /> <?php _e( 'Utilizado para variaciones', 'dokan' ); ?>
                        </label>
                    </li>
                </ul>
            </div>

            <div class="attribute-options">
                <ul class="option-couplet list-unstyled ">
                    <li>
                        <input type="text" class="option" placeholder="<?php esc_attr_e( 'Opción...', 'dokan' ); ?>" name="attribute_values[{{ data.row }}][0]">

                        <span class="item-action actions">
                            <a href="#" class="row-add">+</a>
                            <a href="#" class="row-remove">-</a>
                        </span>
                    </li>
                </ul>

            </div> <!-- .attribute-options -->

        </div> <!-- .box-inside -->

    </div> <!-- .inputs-box -->
</script>

<script type="text/html" id="tmpl-sc-category-item">
    <li>
        <input type="text" class="option" placeholder="<?php esc_attr_e( 'Opción...', 'dokan' ); ?>" name="attribute_values[<%= row %>][<%= col %>]">

        <span class="actions item-action">
            <a href="#" class="row-add">+</a>
            <a href="#" class="row-remove">-</a>
        </span>
    </li>
</script>