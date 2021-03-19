<?php
/**
 * View Order
 *
 * Shows the details of a particular order on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/view-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.0.0
 */

defined( 'ABSPATH' ) || exit;

$notes = $order->get_customer_order_notes();
global $wpdb;  
$id_order = $order->get_order_number();
$result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."woocommerce_order_items WHERE order_item_type = 'line_item' and order_id = '$id_order'"); 
?>
<div class="content-viewOrder">
	<div class="content-viewOrder__img">
		<img src="<?php echo get_template_directory_uri();?>/assets/img/15. DETALLES DE LA ORDEN.jpg" >
	</div>
	<div class="content-viewOrder__content">
		<div class="regresar-myAccount">
			<a href="<?php bloginfo('url'); ?>/mi-cuenta/orders">Regresar</a>
			<div class="regresar-myAccount__migas">
				<p>Inicio / </p>
				<span>Mi información</span>
			</div>
		</div>
		<div class="content-viewOrder__title">
			<p>Detalles de</p>
			<span>la order</span>
		</div>
		<p>
			<span> Número de la orden: #<?php echo $order->get_order_number(); ?> <br></span>
			<span> Fecha: <?php echo wc_format_datetime( $order->get_date_created() ); ?> <br></span>
			<span> Estado de la orden: <strong> <?php echo wc_get_order_status_name( $order->get_status() ); ?> 				</strong> <br></span>
		</p>


	
	<?php do_action( 'woocommerce_view_order', $order_id ); ?>	
		
		
		<div class="detail-orden">
			<p>DETALLE DE LA ORDEN</p>
			<div class="total-orden">
				<div class="sub">
					<p>Correo Electrónico:</p>
				</div>
				<div >
					<p><?php echo $order->get_billing_email(); ?></p>
				</div>
			</div>
		</div>
		<div class="factura">
			<div class="factura-direccion">
				<p>Dirección de Facturación</p>
				<div class="info_factura">
					<p><?php echo $order->get_formatted_billing_address(); ?> </p>
					<div>
					

							<?php if ($order->get_formatted_billing_address() != NULL){?> 
							<a href="<?php echo get_home_url() ?>/mi-cuenta/edit-address/facturacion/" class="edit"><?php echo $address ? esc_html__( 'Edit', 'woocommerce' ) : esc_html__( 'Editar', 'woocommerce' ); ?></a>
							<?php }else{ ?>
							<a href="<?php echo get_home_url() ?>/mi-cuenta/edit-address/envio/" class="edit"><?php echo $address ? esc_html__( 'Edit', 'woocommerce' ) : esc_html__( 'Add', 'woocommerce' ); ?></a>
							<?php } ?>
					
					</div>
				</div>
			</div>

			<div class="factura-direccion">
				<p>Dirección de Envío</p>
				<div class="info_factura">
					<p><?php echo $order->get_formatted_shipping_address(); ?> </p>
					<div>

							<?php if ($order->get_formatted_shipping_address() != NULL){?> 
							<a href="<?php echo get_home_url() ?>/mi-cuenta/edit-address/envio/" class="edit"><?php echo $address ? esc_html__( 'Edit', 'woocommerce' ) : esc_html__( 'Editar', 'woocommerce' ); ?></a>
							<?php }else{ ?>
							<a href="<?php echo get_home_url() ?>/mi-cuenta/edit-address/envio/" class="edit"><?php echo $address ? esc_html__( 'Edit', 'woocommerce' ) : esc_html__( 'Add', 'woocommerce' ); ?></a>
							<?php } ?>
										
					</div>
				</div>
			</div>
		</div>
	</div>	
</div>

