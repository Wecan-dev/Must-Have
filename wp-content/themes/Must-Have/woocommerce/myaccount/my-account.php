<?php
/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * My Account navigation.
 *
 * @since 2.6.0
 */?>



	
	
	<div class="woocommerce-MyAccount-content">
		<?php
			/**
			 * My Account content.
			 *
			 * @since 2.6.0
			 */
			do_action( 'woocommerce_account_content' );
		?>
	</div>


<script>

document.getElementById('shipping_first_name').placeholder='Nombre';
document.getElementById('shipping_last_name').placeholder='Apellidos';
document.getElementById('shipping_company').placeholder='Nombre de la empresa (opcional)';
document.getElementById('shipping_city').placeholder='Localidad / Ciudad';
document.getElementById('shipping_state').placeholder='Estado / Municipio';
document.getElementById('shipping_postcode').placeholder='Código postal (opcional)';

</script>