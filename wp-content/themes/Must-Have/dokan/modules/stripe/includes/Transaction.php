<?php

namespace WeDevs\DokanPro\Modules\Stripe;

use Exception;
use WeDevs\Dokan\Exceptions\DokanException;

defined( 'ABSPATH' ) || exit;

/**
 * The transaction class helps transfer fund from admin to vendor's account
 *
 * @since 2.9.13
 */
class Transaction {

    /**
     * Charge id holder
     *
     * @var string
     */
    protected $admin;

    /**
     * Amount holder
     *
     * @var float
     */
    protected $amount;

    /**
     * Connected vendor id holder
     *
     * @var string
     */
    protected $vendor;

    /**
     * Currecny holder
     *
     * @var string
     */
    protected $currency;

    /**
     * Amount to transfer
     *
     * @since 2.9.13
     *
     * @param float $amount
     *
     * @return this
     */
    public function amount( $amount, $currency = null ) {
        $this->amount   = $amount;
        $this->currency = $currency;

        return $this;
    }

    /**
     * The transfer will be made from which account
     *
     * @since 2.9.13
     *
     * @param string $admin
     *
     * @return this
     */
    public function from( $admin ) {
        $this->admin = $admin;

        return $this;
    }

    /**
     * The transfer will be made to which account
     *
     * @since 2.9.13
     *
     * @param string $vendor
     *
     * @return bool
     */
    public function to( $vendor ) {
        $this->vendor = $vendor;

        return $this->transfer();
    }

    /**
     * Transer the fund to vendor
     *
     * @since 2.9.13
     *
     * @return void
     */
    public function transfer() {
        try {
            $params = [
                'amount'             => $this->amount,
                'destination'        => $this->vendor,
                'source_transaction' => $this->admin,
                'currency'           => $this->currency ? strtolower( $this->currency ) : strtolower( get_woocommerce_currency() ),
            ];

            //dokan_log( "[Stripe Connect] Transfer params for transaction:\n" . print_r( $params, true ) );

            $transfer = \Stripe\Transfer::create( $params );

            //dokan_log( "[Stripe Connect] Transaction transferred successfully:\n" . print_r( $transfer, true ) );
        } catch ( Exception $e ) {
            dokan_log( '[Stripe Connect] Transfer Error: ' . $e->getMessage() );
            throw new DokanException( 'dokan_unable_to_transfer', $e->getMessage() );
        }
    }
}
