<?php

namespace WeDevs\DokanPro\Modules\Stripe;

use Exception;
use Stripe\Event;
use Stripe\Stripe;
use Stripe\WebhookEndpoint;
use WeDevs\Dokan\Exceptions\DokanException;

defined( 'ABSPATH' ) || exit;

class WebhookHandler {

    /**
     * Constructor method
     *
     * @since 3.0.3
     *
     * @return void
     */
    public function __construct() {
        Helper::bootstrap_stripe();
        $this->hooks();
    }

    /**
     * Init all the hooks
     *
     * @since 3.0.3
     *
     * @return void
     */
    public function hooks() {
        add_action( 'template_redirect', [ $this, 'register_webhook' ] );
        add_action( 'woocommerce_api_dokan_stripe', [ $this, 'handle_events' ] );
    }

    /**
     * Register webhook and remove old `webhook=dokan` endpoint from stripe
     *
     * @since 3.0.3
     *
     * @return void
     */
    public function register_webhook() {
        $mode = Helper::is_test_mode() ? 'test' : 'live';

        if ( get_transient( 'dokan_stripe_webhook_endpoint_is_enabled_' . $mode ) ) {
            return;
        }

        try {
            $response = WebhookEndpoint::create( [
                'url'            => home_url( 'wc-api/dokan_stripe' ),
                'enabled_events' => $this->get_events()
            ] );

            foreach ( WebhookEndpoint::all() as $hook ) {
                if ( false !== strpos( $hook->url, 'webhook=dokan' ) ) {
                    $event = WebhookEndpoint::retrieve( $hook->id );
                    $event->delete();
                    break;
                }
            }
        } catch ( Exception $e ) {
            return;
        }

        if ( ! empty( $response->status ) && 'enabled' === $response->status ) {
            set_transient( 'dokan_stripe_webhook_endpoint_is_enabled_' . $mode, true );
        }
    }

    /**
     * Get all the webhook events
     *
     * @since 3.0.3
     *
     * @return array
     */
    public function get_events() {
        return apply_filters( 'dokan_get_webhook_events', [
            'payment_intent.amount_capturable_updated',
            'payment_intent.canceled',
            'payment_intent.created',
            'payment_intent.payment_failed',
            'payment_intent.processing',
            'payment_intent.succeeded',
            'payment_intent.requires_action',
            'charge.captured',
            'charge.expired',
            'charge.failed',
            'charge.pending',
            'charge.refunded',
            'charge.succeeded',
            'charge.updated',
            'charge.dispute.closed',
            'charge.dispute.created',
            'charge.dispute.funds_reinstated',
            'charge.dispute.funds_withdrawn',
            'charge.dispute.updated',
            'charge.refund.updated',
            'customer.created',
            'customer.deleted',
            'customer.updated',
            'customer.discount.created',
            'customer.discount.deleted',
            'customer.discount.updated',
            'customer.source.created',
            'customer.source.deleted',
            'customer.source.expiring',
            'customer.source.updated',
            'customer.subscription.created',
            'customer.subscription.deleted',
            'customer.subscription.pending_update_applied',
            'customer.subscription.pending_update_expired',
            'customer.subscription.trial_will_end',
            'customer.subscription.updated',
            'customer.tax_id.created',
            'customer.tax_id.deleted',
            'customer.tax_id.updated',
            'invoice.created',
            'invoice.deleted',
            'invoice.finalized',
            'invoice.marked_uncollectible',
            'invoice.payment_action_required',
            'invoice.payment_failed',
            'invoice.payment_succeeded',
            'invoice.sent',
            'invoice.upcoming',
            'invoice.updated',
            'invoice.voided',
        ] );
    }

    /**
     * Handle events which are comming from stripe
     *
     * @since 3.0.3
     *
     * @return void
     */
    public function handle_events() {
        if ( 'POST' !== $_SERVER['REQUEST_METHOD'] ) {
            return;
        }

        $request_body = file_get_contents( 'php://input' );
        $event        = json_decode( $request_body );

        if ( empty( $event->id ) ) {
            return;
        }

        //dokan_log( "[Stripe Connect] Webhook request body:\n" . print_r( $event, true ) );

        try {
            if ( ! empty( $event->account ) ) {
                $users = get_users( [
                    'meta_key'     => 'dokan_connected_vendor_id',
                    'meta_value'   => $event->account,
                    'meta_compare' => '=',
                ] );

                if ( empty( $users ) ) {
                    // We've handled the deauth cleanup in RegisterWithdrawMethods::deauthorize_vendor
                    if ( 'account.application.deauthorized' === $event->type ) {
                        status_header( 200 );
                        exit;
                    }

                    throw new DokanException(
                        'dokan_stripe_connect_error_account_not_found',
                        sprintf(
                            __( 'No user found for Stripe account id %s.', 'dokan' ),
                            $event->account
                        )
                    );
                }

                $vendor            = $users[0];
                $vendor_id         = $vendor->ID;
                $vendor_access_key = get_user_meta( $vendor_id, '_stripe_connect_access_key', true );

                if ( empty( $vendor_access_key ) ) {
                    throw new DokanException(
                        'dokan_stripe_connect_error_vendor_access_key_not_found',
                        sprintf(
                            __( 'Stripe connect access key not found for vendor id %d.', 'dokan' ),
                            $vendor_id
                        )
                    );
                }

                Stripe::setApiKey( $vendor_access_key );
            }

            $event = Event::retrieve( $event->id );

            //dokan_log( "[Stripe Connect] Webhook retrieved event:\n" . print_r( $event, true ) );

            if ( array_key_exists( $event->type, Helper::get_supported_webhook_events() ) ) {
                DokanStripe::events()->get( $event )->handle();
            }

            status_header( 200 );
            exit;
        } catch ( Exception $e ) {
            dokan_log( $e->getMessage(), 'error' );
            exit;
        }
    }
}
