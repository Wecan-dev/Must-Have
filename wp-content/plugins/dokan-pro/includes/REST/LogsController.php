<?php

namespace WeDevs\DokanPro\REST;

use WP_REST_Server;
use WeDevs\Dokan\Abstracts\DokanRESTAdminController;

class LogsController extends DokanRESTAdminController {

    /**
     * Route name
     *
     * @var string
     */
    protected $base = 'logs';

    /**
     * Register all routes related with logs
     *
     * @return void
     */
    public function register_routes() {
        register_rest_route(
            $this->namespace, '/' . $this->base, [
				[
					'methods'             => WP_REST_Server::READABLE,
					'callback'            => [ $this, 'get_logs' ],
					'permission_callback' => [ $this, 'check_permission' ],
				],
			]
        );
    }

    /**
     * Get all logs
     *
     * @since 2.9.4
     *
     * @return object
     */
    public function get_logs( $request ) {
        global $wpdb;

        $params = wp_unslash( $request->get_params() );
        $limit  = isset( $params['per_page'] ) ? (int) $params['per_page'] : 20;
        $offset = isset( $params['page'] ) ? (int) ( $params['page'] - 1 ) * $params['per_page'] : 0;

        // filter the log query
        $order_id     = ! empty( $params['order_id'] ) ? (int) sanitize_key( $params['order_id'] ) : 0;
        $vendor_id    = ! empty( $params['vendor_id'] ) ? (int) sanitize_key( $params['vendor_id'] ) : 0;
        $order_status = ! empty( $params['order_status'] ) ? sanitize_text_field( $params['order_status'] ) : '';

        $order_clause  = $order_id ? "order_id = {$order_id}" : 'order_id != 0';
        $seller_clause = $vendor_id ? "seller_id = {$vendor_id}" : 'seller_id != 0';
        $status_clause = $order_status ? "p.post_status = '{$order_status}'" : "p.post_status != 'trash'";
        $where_query   = "{$seller_clause} AND {$status_clause} AND {$order_clause}";

        $items = $wpdb->get_row(
            "SELECT COUNT( do.id ) as total FROM {$wpdb->prefix}dokan_orders do
            LEFT JOIN $wpdb->posts p ON do.order_id = p.ID
            WHERE $where_query
            ORDER BY do.order_id"
        );

        if ( is_wp_error( $items ) ) {
            return $items->get_error_message();
        }

        if ( ! $items->total ) {
            wp_send_json_error( __( 'No logs found', 'dokan' ) );
        }

        $sql = $wpdb->prepare(
            "SELECT do.*, p.post_date FROM {$wpdb->prefix}dokan_orders do
            LEFT JOIN $wpdb->posts p ON do.order_id = p.ID
            WHERE $where_query
            ORDER BY do.order_id DESC LIMIT %d OFFSET %d",
            $limit,
            $offset
        );

        $results  = $wpdb->get_results( $sql ); //phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
        $logs     = [];
        $statuses = wc_get_order_statuses();

        foreach ( $results as $result ) {
            $order                   = wc_get_order( $result->order_id );
            $is_subscription_product = false;

            foreach ( $order->get_items() as $item ) {
                $product = $item->get_product();

                if ( $product && 'product_pack' === $product->get_type() ) {
                    $is_subscription_product = true;
                    break;
                }
            }

            $order_total    = $order->get_total();
            $has_refund     = $order->get_total_refunded() ? true : false;
            $total_shipping = $order->get_shipping_total() ? $order->get_shipping_total() : 0;

            $tax_totals = 0;
            if ( $order->get_tax_totals() ) :
                foreach ( $order->get_tax_totals() as $tax ) :
                    $tax_totals = $tax_totals + $tax->amount;
                endforeach;
            endif;

            /**
             * Payment gateway fee minus from admin commission earning
             * net amount is excluding gateway fee, so we need to deduct it from admin commission
             * otherwise admin commission will be including gateway fees
             */
            $processing_fee = $order->get_meta( 'dokan_gateway_fee' );
            $commission     = $is_subscription_product ? $result->order_total : $result->order_total - $result->net_amount;

            if ( $processing_fee && $processing_fee > 0 ) {
                $commission = $is_subscription_product ? $result->order_total : $commission - $processing_fee;
            }

            /**
             * In case of refund, we are not excluding gateway fee, in case of stripe full/partial refund net amount can be negative
             */
            if ( $commission < 0 ) {
                $commission = 0;
            }

            $dp = 2; // 2 decimal points

            $gateway_fee_paid_by = $order->get_meta( 'dokan_gateway_fee_paid_by', true );

            if ( $processing_fee && empty( $gateway_fee_paid_by ) ) {
                $gateway_fee_paid_by = 'admin';
            }

            $logs[] = [
                'order_id'             => $result->order_id,
                'vendor_id'            => $result->seller_id,
                'vendor_name'          => dokan()->vendor->get( $result->seller_id )->get_shop_name(),
                'previous_order_total' => wc_format_decimal( $order_total, $dp ),
                'order_total'          => wc_format_decimal( $result->order_total, $dp ),
                'vendor_earning'       => $is_subscription_product ? 0 : wc_format_decimal( $result->net_amount, $dp ),
                'commission'           => wc_format_decimal( $commission ),
                'dokan_gateway_fee'    => $processing_fee ? wc_format_decimal( $processing_fee, $dp ) : 0,
                'gateway_fee_paid_by'  => $gateway_fee_paid_by ? $gateway_fee_paid_by : '',
                'shipping_total'       => wc_format_decimal( $total_shipping, $dp ),
                'tax_total'            => wc_format_decimal( $tax_totals, $dp ),
                'status'               => $statuses[ $result->order_status ],
                'date'                 => $result->post_date,
                'has_refund'           => $has_refund,
            ];
        }

        $response = rest_ensure_response( $logs );
        $response = $this->format_collection_response( $response, $request, $items->total );

        return $response;
    }
}
