<tr>
	<td class="sort"></td>
	<td class="file_name"><input type="text" class="input_text" placeholder="<?php _e( 'Nombre del archivo', 'dokan' ); ?>" name="_wc_file_names[]" value="<?php echo esc_attr( $file['name'] ); ?>" /></td>
	<td class="file_url"><input type="text" class="input_text" placeholder="<?php _e( "http://", 'dokan' ); ?>" name="_wc_file_urls[]" value="<?php echo esc_attr( $file['file'] ); ?>" /></td>
	<td class="file_url_choose" width="1%"><a href="#" class="button upload_file_button" data-choose="<?php _e( 'Elija el archivo', 'dokan' ); ?>" data-update="<?php _e( 'Insertar URL de archivo', 'dokan' ); ?>"><?php echo str_replace( ' ', '&nbsp;', __( 'Elija el archivo', 'dokan' ) ); ?></a></td>
	<td width="1%"><a href="#" class="delete"><?php _e( 'Borrar', 'dokan' ); ?></a></td>
</tr>