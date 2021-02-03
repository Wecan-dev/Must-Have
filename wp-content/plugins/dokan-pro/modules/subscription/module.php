<?php

namespace WeDevs\DokanPro\Modules\ProductSubscription;

use DokanPro\Modules\Subscription\Helper;
use DokanPro\Modules\Subscription\SubscriptionPack;

class Module {

    /**
     * Class constructor
     *
     * Sets up all the appropriate hooks and actions
     * within our plugin.
     *
     * @uses register_activation_hook()
     * @uses register_deactivation_hook()
     * @uses is_admin()
     * @uses add_action()
     */
    public function __construct() {
        require_once dirname( __FILE__ ) . '/includes/classes/class-dps-product-pack.php';

        $this->response = '';

        $this->define_constants();
        $this->file_includes();

        // load subscription class
        add_filter( 'dokan_get_class_container', [ __CLASS__, 'load_subscription_class' ] );
        add_action( 'dokan_vendor', [ __CLASS__, 'add_vendor_subscription' ] );

        // Activation and Deactivation hook
        add_action( 'dokan_activated_module_product_subscription', array( self::class, 'activate' ) );
        add_action( 'dokan_deactivated_module_product_subscription', array( self::class, 'deactivate' ) );

        // enable the settings only when the subscription is ON
        $enable_option = get_option( 'dokan_product_subscription', array( 'enable_pricing' => 'off' ) );

        if ( ! isset( $enable_option['enable_pricing'] ) || $enable_option['enable_pricing'] != 'on' ) {
            return;
        }

        $this->init_hooks();
    }

    /**
     * Init hooks
     *
     * @return void
     */
    public function init_hooks() {
        // Loads frontend scripts and styles
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ), 99 );

        // Loads all actions
        add_filter( 'dokan_can_add_product', array( $this, 'seller_add_products' ), 1, 1 );
        add_filter( 'dokan_vendor_can_duplicate_product', array( $this, 'vendor_can_duplicate_product' ) );
        add_filter( 'dokan_update_product_post_data', array( $this, 'make_product_draft' ), 1 );
        add_action( 'dokan_can_post_notice', array( $this, 'display_product_pack' ) );
        add_filter( 'dokan_can_post', array( $this, 'can_post_product' ) );
        add_filter( 'dokan_product_cat_dropdown_args', [ __CLASS__, 'filter_category' ] );

        // filter product types
        add_filter( 'dokan_product_types', [ __CLASS__, 'filter_product_types' ], 99 );

        // filter capapbilies of accessing pages
        add_filter( 'map_meta_cap', [ __CLASS__, 'filter_capability' ], 20, 2 );

        // filter gallery iamge uploading
        add_filter( 'dokan_product_gallery_allow_add_images', [ __CLASS__, 'restrict_gallery_image_upload' ] );

        add_action( 'dps_schedule_pack_update', array( $this, 'schedule_task' ) );
        add_action( 'dokan_before_listing_product', array( $this, 'show_custom_subscription_info' ) );
        add_filter( 'woocommerce_register_post_type_product', [ __CLASS__, 'disable_creating_new_product' ] );

        add_filter( 'dokan_get_dashboard_nav', [ __CLASS__, 'add_new_page' ], 11, 1 );
        add_filter( 'dokan_set_template_path', array( $this, 'load_subscription_templates' ), 11, 3 );
        add_action( 'dokan_load_custom_template', array( $this, 'load_template_from_plugin' ) );
        add_action( 'dokan_rewrite_rules_loaded', array( $this, 'add_rewrite_rules' ) );

        add_filter( 'woocommerce_order_item_needs_processing', array( $this, 'order_needs_processing' ), 10, 2 );
        add_filter( 'woocommerce_add_to_cart_redirect', [ __CLASS__, 'add_to_cart_redirect' ] );
        add_filter( 'woocommerce_add_to_cart_validation', [ __CLASS__, 'maybe_empty_cart' ], 10, 3 );
        add_filter( 'woocommerce_add_to_cart_validation', [ __CLASS__, 'remove_addons_validation' ], 1, 3 );

        add_action( 'woocommerce_order_status_changed', array( $this, 'process_order_pack_product' ), 10, 3 );

        add_action( 'template_redirect', array( $this, 'maybe_cancel_or_activate_subscription' ) );
        add_action( 'dps_cancel_recurring_subscription', array( $this, 'cancel_recurring_subscription' ), 10, 2 );
        add_action( 'dps_cancel_non_recurring_subscription', array( $this, 'cancel_non_recurring_subscription' ), 10, 3 );

        add_filter( 'dokan_query_var_filter', [ __CLASS__, 'add_subscription_endpoint' ] );

        // Handle popup error if subscription outdated
        add_action( 'dokan_new_product_popup_args', [ __CLASS__, 'can_create_product' ], 20, 2 );

        // remove subscripton product from vendor product listing page
        add_filter( 'dokan_product_listing_exclude_type', array( $this, 'exclude_subscription_product' ) );
        add_filter( 'dokan_count_posts', array( $this, 'exclude_subscription_product_count' ), 10, 3 );

        // remove subscription product from best selling and top rated product query
        add_filter( 'dokan_best_selling_products_query', array( $this, 'exclude_subscription_product_query' ) );
        add_filter( 'dokan_top_rated_products_query', array( $this, 'exclude_subscription_product_query' ) );

        // Allow vendor to import only allowed number of products
        add_filter( 'woocommerce_product_import_pre_insert_product_object', [ __CLASS__, 'import_products' ] );

        // include rest api class
        add_filter( 'dokan_rest_api_class_map', [ __CLASS__, 'rest_api_class_map' ] );

        // include email class
        add_action( 'dokan_loaded', [ __CLASS__, 'load_emails' ], 20 );

        //Category import restriction if category restriction enable, for XML
        add_filter( 'wp_import_post_data_raw', [ $this, 'restrict_category_on_xml_import' ] );

        //For csv
        add_action( 'woocommerce_product_import_before_process_item', [ $this, 'restrict_category_on_csv_import' ] );
    }

    /**
     * Load email classes
     *
     * @return void
     */
    public static function load_emails() {
        add_filter( 'dokan_email_classes', [ __CLASS__, 'register_email_class' ] );
        add_filter( 'dokan_email_actions', [ __CLASS__, 'register_email_action' ] );
    }

    /**
     * Placeholder for activation function
     *
     * Nothing being called here yet.
     */
    public static function activate() {
        do_action( 'dps_schedule_pack_update' );

        set_transient( 'dokan-subscription', 1 );

        if ( false == wp_next_scheduled( 'dps_schedule_pack_update' ) ) {
            wp_schedule_event( time(), 'daily', 'dps_schedule_pack_update' );
        }

        if ( ! self::is_dokan_plugin() ) {
            if ( ! get_page_by_title( __( 'Product Subscription', 'dokan' ) ) ) {
                $dasboard_page = get_page_by_title( 'Dashboard' );

                $page_id = wp_insert_post(
                    array(
                        'post_title'   => wp_strip_all_tags( __( 'Product Subscription', 'dokan' ) ),
                        'post_content' => '[dps_product_pack]',
                        'post_status'  => 'publish',
                        'post_parent'  => $dasboard_page->ID,
                        'post_type'    => 'page',
                    )
                );
            }
        }
    }

    /**
     * Placeholder for deactivation function
     */
    public static function deactivate() {
        $users = get_users(
            [
                'role'   => 'seller',
                'fields' => [ 'ID', 'user_email' ],
            ]
        );

        foreach ( $users as $user ) {
            Helper::make_product_publish( $user->ID );
        }

        wp_clear_scheduled_hook( 'dps_schedule_pack_update' );
    }

    /**
     * Check is Dokan is plugin or nor
     * @return boolean true|false
     */
    public static function is_dokan_plugin() {
        return defined( 'DOKAN_PLUGIN_VERSION' );
    }

    /**
     * Define constants
     *
     * @return void
     */
    function define_constants() {
        define( 'DPS_PATH', dirname( __FILE__ ) );
        define( 'DPS_URL', plugins_url( '', __FILE__ ) );
    }

    /**
     * Includes required files
     *
     * @return void
     */
    function file_includes() {
        if ( is_admin() ) {
            require_once DPS_PATH . '/includes/admin/admin.php';
        }

        require_once DPS_PATH . '/includes/classes/Helper.php';
        require_once DPS_PATH . '/includes/classes/class-dps-paypal-standard-subscriptions.php';
        require_once DPS_PATH . '/includes/classes/Shortcode.php';
        require_once DPS_PATH . '/includes/classes/Registration.php';
        require_once DPS_PATH . '/includes/Abstracts/VendorSubscription.php';
        require_once DPS_PATH . '/includes/classes/SubscriptionPack.php';
        require_once DPS_PATH . '/includes/classes/ProductStatusChanger.php';
    }

    /**
     * Enqueue admin scripts
     *
     * Allows plugin assets to be loaded.
     *
     * @uses wp_enqueue_script()
     * @uses wp_localize_script()
     * @uses wp_enqueue_style
     */
    public function enqueue_scripts() {
        // Use minified libraries if SCRIPT_DEBUG is turned off
        $suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

        wp_enqueue_style( 'dps-custom-style', DPS_URL . '/assets/css/style' . $suffix . '.css', [], date( 'Ymd' ) );
        wp_enqueue_script( 'dps-custom-js', DPS_URL . '/assets/js/script' . $suffix . '.js', array( 'jquery' ), time(), true );
        wp_localize_script(
            'dps-custom-js', 'dokanSubscription', array(
                'cancel_string'   => __( 'Do you really want to cancel the subscription?', 'dokan' ),
                'activate_string' => __( 'Want to activate the subscription again?', 'dokan' ),
        ) );
    }

    /**
     * Show_custom_subscription_info in Listing products
     */
    public function show_custom_subscription_info() {
        $vendor_id = dokan_get_current_user_id();

        if ( dokan_is_seller_enabled( $vendor_id ) ) {
            $remaining_product = Helper::get_vendor_remaining_products( $vendor_id );

            if ( '-1' === $remaining_product ) {
                return printf( '<p class="dokan-info">%s</p>', __( 'You can add unlimited products', 'dokan' ) );
            }

            if ( $remaining_product == 0 || ! self::can_post_product() ) {
                if ( self::is_dokan_plugin() ) {
                    $permalink = dokan_get_navigation_url( 'subscription' );
                } else {
                    $page_id   = dokan_get_option( 'subscription_pack', 'dokan_product_subscription' );
                    $permalink = get_permalink( $page_id );
                }
                // $page_id = dokan_get_option( 'subscription_pack', 'dokan_product_subscription' );
                $info = sprintf( __( 'Sorry! You can not add or publish any more product. Please <a href="%s">update your package</a>.', 'dokan' ), $permalink );
                echo "<p class='dokan-info'>" . $info . '</p>';
                echo '<style>.dokan-add-product-link{display : none !important}</style>';
            } else {
                echo "<p class='dokan-info'>" . sprintf( __( 'You can add %d more product(s).', 'dokan' ), $remaining_product ) . '</p>';
            }
        }
    }

    /**
     * Add Subscription endpoint to the end of Dashboard
     * @param array $query_var
     * @return array
     */
    public static function add_subscription_endpoint( $query_var ) {
        $query_var[] = 'subscription';

        return $query_var;
    }

    /**
     * Get plugin path
     *
     * @since 2.8
     *
     * @return void
     **/
    public function plugin_path() {
        return untrailingslashit( plugin_dir_path( __FILE__ ) );
    }

    /**
     * Load Dokan subscription templates
     *
     * @since 2.8
     *
     * @return void
     **/
    public function load_subscription_templates( $template_path, $template, $args ) {
        if ( isset( $args['is_subscription'] ) && $args['is_subscription'] ) {
            return $this->plugin_path() . '/templates';
        }

        return $template_path;
    }

    /**
     * Load template for the dashboard
     *
     * @param  array $query_vars
     *
     * @return void
     */
    function load_template_from_plugin( $query_vars ) {
        if ( ! isset( $query_vars['subscription'] ) ) {
            return $query_vars;
        }

        if ( current_user_can( 'vendor_staff' ) ) {
            return dokan_get_template_part( 'global/no-permission' );
        }

        $installed_version = get_option( 'dokan_theme_version' );

        if ( $installed_version > '2.3' ) {
            dokan_get_template_part( 'subscription/product_subscription_plugin_new', '', array( 'is_subscription' => true ) );
        } else {
            dokan_get_template_part( 'subscription/product_subscription_plugin', '', array( 'is_subscription' => true ) );
        }
    }

    /**
     * Flush rewirte rules for activation
     *
     * @since 1.1.5
     */
    function add_rewrite_rules() {
        if ( get_transient( 'dokan-subscription' ) ) {
            flush_rewrite_rules( true );
            delete_transient( 'dokan-subscription' );
        }
    }

    /**
     * Add new menu in seller dashboard
     *
     * @param array   $urls
     * @return array
     */
    public static function add_new_page( $urls ) {
        if ( self::is_dokan_plugin() ) {
            $permalink = dokan_get_navigation_url( 'subscription' );
        } else {
            $page_id = dokan_get_option( 'subscription_pack', 'dokan_product_subscription' );
            $permalink = get_permalink( $page_id );
        }

        if ( current_user_can( 'vendor_staff' ) ) {
            return $urls;
        }

        if ( dokan_is_seller_enabled( get_current_user_id() ) ) {
            $installed_version = get_option( 'dokan_theme_version' );

            if ( $installed_version > '2.3' ) {
                $urls['subscription'] = array(
                    'title' => __( 'Subscription', 'dokan' ),
                    'icon'  => '<i class="fa fa-book"></i>',
                    'url'   => $permalink,
                    'pos'   => 180,
                );
            } else {
                $urls['subscription'] = array(
                    'title' => __( 'Subscription', 'dokan' ),
                    'icon'  => '<i class="fa fa-book"></i>',
                    'url'   => $permalink,
                );
            }
        }

        return $urls;
    }

    /**
     * Restriction for adding product for seller
     *
     * @param array   $errors
     * @return string
     */
    public function seller_add_products( $errors ) {
        $user_id = dokan_get_current_user_id();

        if ( dokan_is_user_seller( $user_id ) ) {
            $remaining_product = Helper::get_vendor_remaining_products( $user_id );

            if ( '-1' === $remaining_product ) {
                return;
            }

            if ( $remaining_product <= 0 ) {
                $errors[] = __( 'Sorry your subscription exceeds your package limits please update your package subscription', 'dokan' );
                return $errors;
            } else {
                update_user_meta( $user_id, 'product_no_with_pack', $remaining_product - 1 );
                return $errors;
            }
        }
    }

    /**
     * Vendor can duplicate product
     *
     * @return boolean
     */
    public function vendor_can_duplicate_product() {
        $vendor_id = dokan_get_current_user_id();

        if ( ! Helper::get_vendor_remaining_products( $vendor_id ) ) {
            return false;
        }

        return true;
    }

    /**
     * Make product status draft when vendor's remaining product is zero
     *
     * @param array $data
     *
     *  @return array
     */
    public function make_product_draft( $data ) {
        $vendor_id = dokan_get_current_user_id();

        if ( Helper::get_vendor_remaining_products( $vendor_id ) ) {
            return $data;
        }

        // if product status was not publish and pending then make it draft
        $product = wc_get_product( $data['ID'] );

        if ( 'publish' !== $product->get_status() && 'pending' !== $product->get_status() ) {
            $data['post_status'] = 'draft';
        }

        return $data;
    }

    /**
     * Get number of product by seller
     *
     * @param integer $user_id
     * @return integer
     */
    function get_number_of_product_by_seller( $user_id ) {
        global $wpdb;

        $allowed_status = apply_filters( 'dps_get_product_by_seller_allowed_statuses', array( 'publish', 'pending' ) );

        $query = "SELECT COUNT(*) FROM $wpdb->posts WHERE post_author = $user_id AND post_type = 'product' AND post_status IN ( '" . implode( "','", $allowed_status ) . "' )";
        $count = $wpdb->get_var( $query );

        return $count;
    }

    /**
     * Check if have pack availability
     *
     * @since 1.2.1
     *
     * @return void
     */
    public static function can_create_product( $errors, $data ) {
        if ( $data['ID'] ) {
            return;
        }

        $user_id = dokan_get_current_user_id();

        if ( dokan_is_user_seller( $user_id ) ) {
            $remaining_product = Helper::get_vendor_remaining_products( $user_id );

            if ( '-1' === $remaining_product ) {
                return;
            }

            if ( $remaining_product <= 0 ) {
                $errors = new \WP_Error( 'no-subscription', __( 'Sorry your subscription exceeds your package limits please update your package subscription', 'dokan' ) );
            } else {
                update_user_meta( $user_id, 'product_no_with_pack', $remaining_product - 1 );
            }

            return $errors;
        }
    }

    /**
     * Display Product Pack
     */
    function display_product_pack() {
        if ( dokan_is_seller_enabled( get_current_user_id() ) ) {
            echo do_shortcode( '[dps_product_pack]' );
        } else {
            dokan_seller_not_enabled_notice();
        }
    }

    /**
     * Check is Seller has any subscription
     *
     * @return boolean
     */
    public static function can_post_product() {
        if ( get_user_meta( dokan_get_current_user_id(), 'can_post_product', true ) == '1' ) {
            return true;
        }

        return false;
    }

    /**
     * Filter vendor category according to subscription
     *
     * @since 1.1.5
     *
     * @return void
     **/
    public static function filter_category( $args ) {
        $user_id = get_current_user_id();

        if ( ! dokan_is_user_seller( $user_id ) ) {
            return $args;
        }

        $is_seller_enabled = dokan_is_seller_enabled( $user_id );

        if ( ! $is_seller_enabled ) {
            return $args;
        }

        $vendor = dokan()->vendor->get( $user_id )->subscription;

        if ( ! $vendor ) {
            return $args;
        }

        if ( ( self::can_post_product() ) && $vendor->has_subscription() ) {
            $override_cat = get_user_meta( $user_id, 'vendor_allowed_categories', true );
            $selected_cat = ! empty( $override_cat ) ? $override_cat : $vendor->get_allowed_product_categories();

            if ( empty( $selected_cat ) ) {
                return $args;
            }

            $args['include'] = $selected_cat;
            return $args;
        }

        return $args;
    }

    /**
     * Filter product types for a vendor
     *
     * @param  array $types
     *
     * @return array
     */
    public static function filter_product_types( $types ) {
        $user_id = dokan_get_current_user_id();

        if ( ! dokan_is_user_seller( $user_id ) ) {
            return $types;
        }

        if ( ! dokan_is_seller_enabled( $user_id ) ) {
            return $types;
        }

        $allowed_product_types = Helper::get_vendor_allowed_product_types();

        if ( ! $allowed_product_types ) {
            return $types;
        }

        $types = array_filter(
            $types, function( $value, $key ) use ( $allowed_product_types ) {
            return in_array( $key, $allowed_product_types );
        }, ARRAY_FILTER_USE_BOTH
        );

        return $types;
    }

    /**
     * Filter capability for vendor
     *
     * @param  array $caps
     * @param  string $cap
     *
     * @return array
     */
    public static function filter_capability( $caps, $cap ) {
        global $wp_query;

        // if not vendor dashboard and not product edit page
        if ( ! dokan_is_seller_dashboard() && empty( $wp_query->query_vars['edit'] ) ) {
            return $caps;
        }

        if ( 'dokan_view_product_menu' === $cap ) {
            $allowed_product_types = Helper::get_vendor_allowed_product_types();

            $default_types = [ 'simple', 'variable', 'grouped', 'external' ];

            // if no other default product is selected ( ei: dokan_get_product_types() ) then don't show the product menu
            if ( $allowed_product_types && ! array_intersect( $default_types, $allowed_product_types ) ) {
                return [ 'no_permission' ];
            }
        }

        if ( 'dokan_view_booking_menu' === $cap ) {
            $allowed_product_types = Helper::get_vendor_allowed_product_types();

            if ( $allowed_product_types && ! in_array( 'booking', $allowed_product_types ) ) {
                return [ 'no_permission' ];
            }
        }

        if ( 'dokan_view_auction_menu' === $cap ) {
            $allowed_product_types = Helper::get_vendor_allowed_product_types();

            if ( $allowed_product_types && ! in_array( 'auction', $allowed_product_types ) ) {
                return [ 'no_permission' ];
            }
        }

        return $caps;
    }

    /**
     * Restrict gallery image upload for vendor
     *
     * @return void
     */
    public static function restrict_gallery_image_upload() {
        $vendor = dokan()->vendor->get( dokan_get_current_user_id() )->subscription;

        if ( $vendor && $vendor->is_gallery_image_upload_restricted() ) {
            return false;
        }

        return true;
    }

    /**
     * Schedule task daily update this functions
     */
    public function schedule_task() {
        $users = get_users(
            [
                'role__in'   => [ 'seller', 'administrator' ],
                'fields' => [ 'ID', 'user_email' ],
            ]
        );

        foreach ( $users as $user ) {
            $vendor_subscription = dokan()->vendor->get( $user->ID )->subscription;

            // if no vendor is not subscribed to any pack, skip the vendor, this process also enable code editor autocomplete/quick access support.
            if ( ! $vendor_subscription instanceof \DokanPro\Modules\Subscription\SubscriptionPack ) {
                continue;
            }

            if ( ! Helper::is_subscription_product( $vendor_subscription->get_id() ) ) {
                continue;
            }

            if ( Helper::maybe_cancel_subscription( $user->ID ) ) {
                if ( Helper::check_vendor_has_existing_product( $user->ID ) ) {
                    Helper::make_product_draft( $user->ID );
                }

                $order_id = get_user_meta( $user->ID, 'product_order_id', true );

                if ( $order_id ) {
                    $subject = ( dokan_get_option( 'email_subject', 'dokan_product_subscription' ) ) ? dokan_get_option( 'email_subject', 'dokan_product_subscription' ) : __( 'Subscription Package Cancel notification', 'dokan' );
                    $message = ( dokan_get_option( 'email_body', 'dokan_product_subscription' ) ) ? dokan_get_option( 'email_body', 'dokan_product_subscription' ) : __( 'Due to finish your Package validation we are canceling your Subscription Package', 'dokan' );
                    $headers = 'From: ' . get_option( 'blogname' ) . ' <' . get_option( 'admin_email' ) . '>' . "\r\n";

                    wp_mail( $user->user_email, $subject, $message, $headers );

                    Helper::log( 'Subscription cancel check: As the package has expired for order #' . $order_id . ', we are cancelling the Subscription Package of user #' . $user->ID );
                    Helper::delete_subscription_pack( $user->ID, $order_id );
                }
            }

            $is_seller_enabled  = dokan_is_seller_enabled( $user->ID );
            $can_post_product   = $vendor_subscription->can_post_product();
            $has_recurring_pack = $vendor_subscription->has_recurring_pack();
            $has_subscription   = $vendor_subscription->has_subscription();

            if ( ! $has_recurring_pack && $is_seller_enabled && $has_subscription && $can_post_product ) {
                if ( Helper::alert_before_two_days( $user->ID ) ) {
                    $subject = ( dokan_get_option( 'email_subject', 'dokan_product_subscription' ) ) ? dokan_get_option( 'email_subject', 'dokan_product_subscription' ) : __( 'Package End notification alert', 'dokan' );
                    $message = ( dokan_get_option( 'email_body', 'dokan_product_subscription' ) ) ? dokan_get_option( 'email_body', 'dokan_product_subscription' ) : __( 'Your Package validation remaining some days please confirm it', 'dokan' );
                    $headers = 'From: ' . get_option( 'blogname' ) . ' <' . get_option( 'admin_email' ) . '>' . "\r\n";

                    wp_mail( $user->user_email, $subject, $message, $headers );
                }
            }
        }
    }

    /**
     * Process order for specipic package
     *
     * @param integer $order_id
     * @param string  $old_status
     * @param string  $new_status
     */
    function process_order_pack_product( $order_id, $old_status, $new_status ) {
        $customer_id = get_post_meta( $order_id, '_customer_user', true );

        if ( $new_status == 'completed' ) {
            $order = new \WC_Order( $order_id );

            $product_items = $order->get_items();

            $product    = reset( $product_items );
            $product_id = $product['product_id'];

            if ( Helper::is_subscription_product( $product_id ) ) {
                if ( ! Helper::has_used_trial_pack( $customer_id ) ) {
                    Helper::add_used_trial_pack( $customer_id, $product_id );
                }

                if ( get_post_meta( $product_id, '_enable_recurring_payment', true ) == 'yes' ) {
                    return;
                }

                $pack_validity = get_post_meta( $product_id, '_pack_validity', true );
                update_user_meta( $customer_id, 'product_package_id', $product_id );
                update_user_meta( $customer_id, 'product_order_id', $order_id );
                update_user_meta( $customer_id, 'product_no_with_pack', get_post_meta( $product_id, '_no_of_product', true ) );
                update_user_meta( $customer_id, 'product_pack_startdate', date( 'Y-m-d H:i:s' ) );

                if ( $pack_validity == 0 ) {
                    update_user_meta( $customer_id, 'product_pack_enddate', 'unlimited' );
                } else {
                    update_user_meta( $customer_id, 'product_pack_enddate', date( 'Y-m-d H:i:s', strtotime( "+$pack_validity days" ) ) );
                }

                update_user_meta( $customer_id, 'can_post_product', '1' );
                update_user_meta( $customer_id, '_customer_recurring_subscription', '' );

                $admin_commission      = get_post_meta( $product_id, '_subscription_product_admin_commission', true );
                $admin_commission_type = get_post_meta( $product_id, '_subscription_product_admin_commission_type', true );

                if ( ! empty( $admin_commission ) && ! empty( $admin_commission_type ) ) {
                    update_user_meta( $customer_id, 'dokan_admin_percentage', $admin_commission );
                    update_user_meta( $customer_id, 'dokan_admin_percentage_type', $admin_commission_type );
                } else {
                    update_user_meta( $customer_id, 'dokan_admin_percentage', '' );
                }

                do_action( 'dokan_vendor_purchased_subscription', $customer_id );
            }
        }
    }

    /**
     * Redirect after add product into cart
     *
     * @param string $url url
     * @return string $url
     */
    public static function add_to_cart_redirect( $url ) {
        $product_id = isset( $_REQUEST['add-to-cart'] ) ? (int) $_REQUEST['add-to-cart'] : 0;

        if ( ! $product_id ) {
            return $url;
        }

        // If product is of the subscription type
        if ( Helper::is_subscription_product( $product_id ) ) {
            $url = wc_get_checkout_url();
        }

        return $url;
    }


    /**
     * When a subscription is added to the cart, remove other products/subscriptions to
     * work with PayPal Standard, which only accept one subscription per checkout.
     */
    public static function maybe_empty_cart( $valid, $product_id, $quantity ) {
        if ( Helper::is_subscription_product( $product_id ) ) {
            WC()->cart->empty_cart();
        }

        if ( Helper::cart_contains_subscription() ) {
            Helper::remove_subscriptions_from_cart();

            wc_add_notice( __( 'A subscription has been removed from your cart. Due to payment gateway restrictions, products and subscriptions can not be purchased at the same time.', 'dokan' ) );
        }

        return $valid;
    }

    /**
     * Remove addon required validation for dokan subscription product
     *
     * @param bool $valid
     * @param int $product_id
     * @param int $quantity
     * @return bool
     */
    public static function remove_addons_validation( $valid, $product_id, $quantity ) {
        if ( Helper::is_subscription_product( $product_id ) && class_exists( 'WC_Product_Addons_Cart' ) ) {
            remove_filter( 'woocommerce_add_to_cart_validation', array( $GLOBALS['Product_Addon_Cart'], 'validate_add_cart_item' ), 999 );
        }

        return $valid;
    }

    /**
     * Tell WC that we don't need any processing
     *
     * @param  bool $needs_processing
     * @param  array $product
     * @return bool
     */
    function order_needs_processing( $needs_processing, $product ) {
        if ( $product->get_type() == 'product_pack' ) {
            $needs_processing = false;
        }

        return $needs_processing;
    }

    public function maybe_cancel_or_activate_subscription() {
        $posted_data     = wp_unslash( $_POST );
        $cancel_action   = ! empty( $posted_data['dps_cancel_subscription'] ) ? 'cancel' : '';
        $activate_action = ! empty( $posted_data['dps_activate_subscription'] ) ? 'activate' : '';
        $nonce           = $cancel_action ? 'dps-sub-cancel' : 'dps-sub-activate';

        if ( ! $cancel_action && ! $activate_action ) {
            return;
        }

        if ( ! wp_verify_nonce( $posted_data['_wpnonce'], $nonce ) ) {
            wp_die( __( 'Nonce failure', 'dokan' ) );
        }

        $user_id  = get_current_user_id();
        $order_id = get_user_meta( $user_id, 'product_order_id', true );

        if ( self::is_dokan_plugin() ) {
            $page_url = dokan_get_navigation_url( 'subscription' );
        } else {
            $page_url = get_permalink( dokan_get_option( 'subscription_pack', 'dokan_product_subscription' ) );
        }

        if ( $cancel_action ) {
            $cancel_immediately = false;

            if ( $order_id && get_user_meta( $user_id, '_customer_recurring_subscription', true ) == 'active' ) {
                Helper::log( 'Subscription cancel check: User #' . $user_id . ' has canceled his Subscription of order #' . $order_id );
                do_action( 'dps_cancel_recurring_subscription', $order_id, $user_id, $cancel_immediately );
                wp_redirect( add_query_arg( array( 'msg' => 'dps_sub_cancelled' ), $page_url ) );
                exit;
            } else {
                Helper::log( 'Subscription cancel check: User #' . $user_id . ' has canceled his Subscription of order #' . $order_id );
                do_action( 'dps_cancel_non_recurring_subscription', $order_id, $user_id, $cancel_immediately );
                wp_redirect( add_query_arg( array( 'msg' => 'dps_sub_cancelled' ), $page_url ) );
                exit;
            }
        }

        if ( $activate_action ) {
            Helper::log( 'Subscription activation check: User #' . $user_id . ' has reactivate his Subscription of order #' . $order_id );
            do_action( 'dps_activate_recurring_subscription', $order_id, $user_id );
            wp_redirect( add_query_arg( array( 'msg' => 'dps_sub_activated' ), $page_url ) );
        }
    }

    /**
     * Cancel recurrring subscription via paypal
     *
     * @since 1.2.1
     *
     * @return void
     **/
    public function cancel_recurring_subscription( $order_id, $user_id ) {
        if ( ! $order_id ) {
            return;
        }

        $order = wc_get_order( $order_id );

        if ( 'paypal' == $order->get_payment_method() ) {
            \DPS_PayPal_Standard_Subscriptions::cancel_subscription_with_paypal( $order_id, $user_id );
        }
    }

    /**
     * Cancel non recurring subscription
     *
     * @since 3.0.3
     *
     * @param int $order_id
     * @param int $vendor_id
     *
     * @return void
     */
    public function cancel_non_recurring_subscription( $order_id, $vendor_id, $cancel_immediately ) {
        if ( $cancel_immediately || 'unlimited' === Helper::get_pack_end_date( $vendor_id ) ) {
            return Helper::delete_subscription_pack( $vendor_id, $order_id );
        }

        $subscription = dokan()->vendor->get( $vendor_id )->subscription;

        if ( ! $subscription ) {
            dokan_log( sprintf( __( 'Unable to find subscription to be cancelled for vendor id# %s', 'dokan' ), $vendor_id ) );
            return;
        }

        $subscription->set_active_cancelled_subscription();
    }

    /**
     * Disable creating new product from backend
     *
     * @param  array $args
     *
     * @return array
     */
    public static function disable_creating_new_product( $args ) {
        $user_id = dokan_get_current_user_id();

        if ( current_user_can( 'manage_woocommerce' ) ) {
            return $args;
        }

        if ( ! dokan_is_user_seller( $user_id ) ) {
            return $args;
        }

        if ( ! dokan_is_seller_enabled( $user_id ) ) {
            return $args;
        }

        $remaining_product = Helper::get_vendor_remaining_products( $user_id );

        if ( $remaining_product == 0 || ! self::can_post_product() ) {
            $args['capabilities']['create_posts'] = 'do_not_allow';
        }

        return $args;
    }

    /**
     * Exclude subscription product from product listing page
     *
     * @param  array $terms
     *
     * @return array
     */
    public function exclude_subscription_product( $terms ) {
        $terms[] = 'product_pack';

        return $terms;
    }

    /**
     * Exclude subscription product from total product count
     *
     * @param  string $query
     *
     * @return string
     */
    public function exclude_subscription_product_count( $query, $post_type, $user_id ) {
        global $wpdb;

        $query = "SELECT post_status,
            COUNT( ID ) as num_posts
            FROM {$wpdb->posts}
            WHERE post_type = %s
            AND post_author = %d
            AND ID NOT IN (
                SELECT object_id
                FROM {$wpdb->term_relationships}
                WHERE term_taxonomy_id = (
                    SELECT term_id FROM {$wpdb->terms}
                    WHERE name = 'product_pack'
                )
            )
            GROUP BY post_status";

        $results = $wpdb->get_results(
            $wpdb->prepare(
                $query,
                $post_type, $user_id
            ),
            ARRAY_A
        );
    }

    /**
     * Import number of allowed products
     *
     * @param object $object
     * @throws \ReflectionException
     * @return object
     */
    public static function import_products( $object ) {
        $user_id = dokan_get_current_user_id();

        if ( user_can( $user_id, 'manage_woocommerce' ) ) {
            return $object;
        }

        $user_remaining_product = Helper::get_vendor_remaining_products( $user_id );

        // -1 menas unlimited products
        if ( '-1' === $user_remaining_product ) {
            return $object;
        }

        if ( $user_remaining_product < 1 ) {
            $rf = new \ReflectionProperty( get_class( $object ), 'data_store' );

            if ( ! is_object( $rf ) ) {
                return $object;
            }

            $rf->setAccessible( true );
            $rf->setValue( $object, null );
        }

        return $object;
    }

    /**
     * Include subscription api class
     *
     * @param  array $classes
     *
     * @return array
     */
    public static function rest_api_class_map( $classes ) {
        $class = [ dirname( __FILE__ ) . '/api/class-subscription-controller.php' => 'Dokan_REST_Subscription_Controller' ];

        return array_merge( $classes, $class );
    }

    /**
     * Register email class
     *
     * @param  array $wc_emails
     *
     * @return array
     */
    public static function register_email_class( $wc_emails ) {
        $wc_emails['Dokan_Subscription_Cancelled'] = require_once DPS_PATH . '/includes/emails/subscription-cancelled.php';

        return $wc_emails;
    }

    /**
     * Register email action
     *
     * @param array $actions
     *
     * @return array
     */
    public static function register_email_action( $actions ) {
        $actions[] = 'dokan_subscription_cancelled';

        return $actions;
    }

    /**
     * Load subscription class
     *
     * @param array $classes
     *
     * @return array
     */
    public static function load_subscription_class( $classes ) {
        $classes['subscription'] = new SubscriptionPack();

        return $classes;
    }

    /**
     * Add vendor subscriptionn class
     *
     * @param object $vendor
     *
     * @return void
     */
    public static function add_vendor_subscription( $vendor ) {
        $subscription_pack = null;

        if ( $vendor->get_id() && dokan_is_user_seller( $vendor->get_id() ) ) {
            $subscription_pack_id = get_user_meta( $vendor->get_id(), 'product_package_id', true );

            if ( $subscription_pack_id ) {
                // $subscription_pack = new Dokan_Subscription_Pack( $subscription_pack_id );
                return $vendor->subscription = new SubscriptionPack( $subscription_pack_id, $vendor->get_id() );
            }
        }

        $vendor->subscription = $subscription_pack;
    }

    /**
     * Exclude subscription products from the best selling products
     *
     * @since 2.9.10
     *
     * @param array $args
     *
     * @return array
     */
    public function exclude_subscription_product_query( $args ) {
        $args['tax_query'][] = [
            'taxonomy' => 'product_type',
            'field'    => 'slug',
            'terms'    => 'product_pack',
            'operator' => 'NOT IN',
        ];

        return $args;
    }

    /**
     * Restrict category if selected category found
     *
     * * @since 3.1.0
     *
     * @param $post
     *
     * @return null|\WP_Post $post
     */
    public function restrict_category_on_xml_import( $post ) {
        $category_name = array_values(
            array_map(
                function ( $category ) {
                    return $category['name'];
                }, array_filter(
                    $post['terms'], function ( $term ) {
                    return 'product_cat' === $term['domain'];
                }
                )
            )
        )[0];

        $allowed_categories = $this->get_vendor_allowed_categories();

        if ( ! empty( $allowed_categories ) ) {
            $categories = [];
            foreach ( $allowed_categories as $allowed_category ) {
                $categories[] = strtolower( get_term_field( 'name', $allowed_category ) );
            }

            if ( in_array( strtolower( $category_name ), $categories ) ) {
                return $post;
            }

            return null;
        }

        return $post;
    }

    /**
     * Restric product import on csv if category restriction enable
     *
     * @param $data
     * @since 3.1.0
     * @throws \Exception
     */
    public function restrict_category_on_csv_import( $data ) {
        $categories         = $data['category_ids'];
        $allowed_categories = $this->get_vendor_allowed_categories();

        if ( ! empty( $allowed_categories ) ) {
            foreach ( $categories as $category ) {
                if ( ! in_array( $category, $allowed_categories ) ) {
                    throw new \Exception( __( 'Current subscription does not allow this', 'dokan' ) . get_term_field( 'name', $category ) );
                }
            }
        }
    }

    /**
     * Get subscription allowed categories if exist
     *
     * @since 3.1.0
     *
     * @return array
     */
    protected function get_vendor_allowed_categories() {
        $vendor_subscription = dokan()->vendor->get( get_current_user_id() )->subscription;
        $allowed_categories  = $vendor_subscription->get_allowed_product_categories();

        return $allowed_categories;
    }
}
