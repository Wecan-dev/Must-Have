<?php

namespace WeDevs\DokanPro\Admin;

/**
 * Class Dokan_Pro_Admin_Settings
 *
 * Class for load Admin functionality for Pro Version
 *
 * @since 2.4
 *
 * @author weDevs <info@wedevs.com>
 */
class Admin {

    /**
     * Constructor for the Dokan_Pro_Admin_Settings class
     *
     * Sets up all the appropriate hooks and actions
     * within our plugin.
     *
     * @return void
     */
    public function __construct() {
        add_action( 'dokan_admin_menu', array( $this, 'load_admin_settings' ), 10, 2 );
        add_action( 'dokan-admin-routes', array( $this, 'vue_admin_routes' ) );
        add_action( 'wp_ajax_create_pages', array( $this, 'create_default_pages' ) );
        add_filter( 'dokan_settings_fields', array( $this, 'load_settings_sections_fields' ), 10, 2 );
        add_filter( 'dokan_settings_general_vendor_store_options', array( $this, 'add_settings_general_vendor_store_options' ), 9 );
        add_filter( 'dokan_settings_selling_option_vendor_capability', array( $this, 'add_settings_selling_option_vendor_capability' ), 9 );
        add_filter( 'dokan_admin_settings_rearrange_map', array( $this, 'admin_settings_rearrange_map' ) );
        add_action( 'dokan_render_admin_toolbar', array( $this, 'render_pro_admin_toolbar' ) );
        add_action( 'init', array( $this, 'dokan_export_all_logs' ), 99 );
        add_action( 'admin_menu', array( $this, 'remove_add_on_menu' ), 80 );
        add_action( 'admin_notices', array( $this, 'show_whats_new_notice' ), 10 );
        add_action( 'admin_notices', array( $this, 'show_chirstmas_notice' ), 10 );
        add_action( 'wp_ajax_dokan-whats-new-notice', array( $this, 'dismiss_new_notice' ) );
        add_action( 'wp_ajax_dokan-dismiss-christmas-offer-notice', array( $this, 'dismiss_christmas_offer' ) );
        add_action( 'admin_init', array( $this, 'handle_seller_bulk_action' ), 10 );
        add_filter( 'dokan_commission_types', [ $this, 'add_combine_commission_type' ] );

        //save user meta
        add_action( 'dokan_seller_meta_fields_after_admin_commission', [ $this, 'add_additional_fee' ] );
        add_action( 'dokan_process_seller_meta_fields', [ $this, 'save_meta_fields' ] );
        add_action( 'user_profile_update_errors', [ $this, 'make_combine_commission_fields_mandatory' ], 10, 3 );
    }

    /**
     * Load Admin Pro settings
     *
     * @since 2.4
     *
     * @param  string $capability
     * @param  intiger $menu_position
     *
     * @return void
     */
    public function load_admin_settings( $capability, $menu_position ) {
        global $submenu;

        $refund      = dokan_get_refund_count();
        $refund_text = __( 'Refunds', 'dokan' );
        $slug        = 'dokan';

        remove_submenu_page( 'dokan', 'dokan-pro-features' );

        if ( $refund['pending'] ) {
            $refund_text = sprintf( __( 'Refunds %s', 'dokan' ), '<span class="awaiting-mod count-1"><span class="pending-count">' . $refund['pending'] . '</span></span>' );
        }

        if ( current_user_can( $capability ) ) {
            $submenu[ $slug ][] = array( __( 'Announcements', 'dokan' ), $capability, 'admin.php?page=' . $slug . '#/announcement' );
            $submenu[ $slug ][] = array( $refund_text, $capability, 'admin.php?page=' . $slug . '#/refund?status=pending' );
            $submenu[ $slug ][] = array( __( 'Reports', 'dokan' ), $capability, 'admin.php?page=' . $slug . '#/reports' );
        }

        add_submenu_page( null, __( 'Whats New', 'dokan' ), __( 'Whats New', 'dokan' ), $capability, 'whats-new-dokan', array( $this, 'whats_new_page' ) );

        // Load tools ad modules menu
        if ( current_user_can( $capability ) ) {
            $submenu[ $slug ][] = array( __( 'Modules', 'dokan' ), $capability, 'admin.php?page=' . $slug . '#/modules' );
            $submenu[ $slug ][] = array( __( 'Tools', 'dokan' ), $capability, 'admin.php?page=' . $slug . '#/tools' );
        }
    }

    /**
     * Remove addon submen from dokan admin menu
     *
     * @since 2.7.0
     *
     * @return void
     */
    public function remove_add_on_menu() {
        remove_submenu_page( 'dokan', 'dokan-addons' );
    }

    /**
     * Add vendor store options in general settings
     *
     * @since 2.9.13
     *
     * @param array $settings_fields
     *
     * @return array
     */
    public function add_settings_general_vendor_store_options( $settings_fields ) {
        $settings_fields['enable_tc_on_reg'] = [
            'name'    => 'enable_tc_on_reg',
            'label'   => __( 'Enable Terms and Condition', 'dokan' ),
            'desc'    => __( 'Enable Terms and Condition check on registration form', 'dokan' ),
            'type'    => 'checkbox',
            'default' => 'on'
        ];
        $settings_fields['enable_single_seller_mode'] = [
            'name'    => 'enable_single_seller_mode',
            'label'   => __( 'Enable Single Seller Mode', 'dokan' ),
            'desc'    => __( 'Enable single seller mode', 'dokan' ),
            'type'    => 'checkbox',
            'default' => 'off'
        ];

        return $settings_fields;
    }

    /**
     * Add vendor capability settings in selling option settings
     *
     * @since 2.9.13
     *
     * @param array $settings_fields
     *
     * @return array
     */
    public function add_settings_selling_option_vendor_capability( $settings_fields ) {
        $settings_fields['product_status'] = array(
            'name'    => 'product_status',
            'label'   => __( 'New Product Status', 'dokan' ),
            'desc'    => __( 'Product status when a vendor creates a product', 'dokan' ),
            'type'    => 'select',
            'default' => 'pending',
            'options' => array(
                'publish' => __( 'Published', 'dokan' ),
                'pending' => __( 'Pending Review', 'dokan' )
            )
        );

        $settings_fields['vendor_duplicate_product'] = array(
            'name'    => 'vendor_duplicate_product',
            'label'   => __( 'Duplicate product', 'dokan' ),
            'desc'    => __( 'Allow vendor to duplicate their product', 'dokan' ),
            'type'    => 'checkbox',
            'default' => 'on'
        );

        $settings_fields['edited_product_status'] = array(
            'name'    => 'edited_product_status',
            'label'   => __( 'Edited Product Status', 'dokan' ),
            'desc'    => __( 'Set Product status as pending review when a vendor edits or updates a product', 'dokan' ),
            'type'    => 'checkbox',
            'default' => 'off',
        );

        $settings_fields['product_add_mail'] = array(
            'name'    => 'product_add_mail',
            'label'   => __( 'Product Mail Notification', 'dokan' ),
            'desc'    => __( 'Email notification on new product submission', 'dokan' ),
            'type'    => 'checkbox',
            'default' => 'on'
        );

        $settings_fields['product_category_style'] = array(
            'name'    => 'product_category_style',
            'label'   => __( 'Product Category Selection', 'dokan' ),
            'desc'    => __( 'Select a category type for Products', 'dokan' ),
            'type'    => 'select',
            'default' => 'single',
            'options' => array(
                'single'   => __( 'Single', 'dokan' ),
                'multiple' => __( 'Multiple', 'dokan' )
            )
        );

        $settings_fields['product_vendors_can_create_tags'] = array(
            'name'    => 'product_vendors_can_create_tags',
            'label'   => __( 'Vendors Can Create Tags', 'dokan' ),
            'desc'    => __( 'Allow vendors to create new product tags from vendor dashboard.', 'dokan' ),
            'type'    => 'checkbox',
            'default' => 'off',
        );

        $settings_fields['discount_edit'] = array(
            'name'    => 'discount_edit',
            'label'   => __( 'Discount Editing', 'dokan' ),
            'desc'    => __( 'Vendor can add order and product discount', 'dokan' ),
            'type'    => 'multicheck',
            'default' => array( 'product-discount' => __( 'Allow vendor to add discount on product', 'dokan' ), 'order-discount' => __( 'Allow vendor to add discount on order', 'dokan' ) ),
            'options' => array( 'product-discount' => __( 'Allow vendor to add discount on product', 'dokan' ), 'order-discount' => __( 'Allow vendor to add discount on order', 'dokan' ) )
        );

        $settings_fields['hide_customer_info'] = array(
            'name'    => 'hide_customer_info',
            'label'   => __( 'Hide Customer info', 'dokan' ),
            'desc'    => __( 'Hide customer information from order details of vendors', 'dokan' ),
            'type'    => 'checkbox',
            'default' => 'off'
        );

        $settings_fields['seller_review_manage'] = array(
            'name'    => 'seller_review_manage',
            'label'   => __( 'Vendor Product Review', 'dokan' ),
            'desc'    => __( 'Vendor can change product review status from vendor dashboard', 'dokan' ),
            'type'    => 'checkbox',
            'default' => 'on'
        );

        return $settings_fields;
    }

    /**
     * Backward compatible settings option map
     *
     * @since 2.9.13
     *
     * @param array $map
     *
     * @return array
     */
    public function admin_settings_rearrange_map( $map ) {
        return array_merge( $map, array(
            'seller_review_manage_dokan_general' => array( 'seller_review_manage', 'dokan_selling' ),
            'store_banner_width_dokan_general'   => array( 'store_banner_width', 'dokan_appearance' ),
            'store_banner_height_dokan_general'  => array( 'store_banner_height', 'dokan_appearance' ),
        ) );
    }

    /**
     * Load all pro settings field
     *
     * @since 2.4
     *
     * @param  array $settings_fields
     *
     * @return array
     */
    public function load_settings_sections_fields( $settings_fields , $dokan_settings ) {
        $appearence_settings = array(
            'store_banner_width' => array(
                'name'    => 'store_banner_width',
                'label'   => __( 'Store Banner width', 'dokan' ),
                'type'    => 'text',
                'default' => 625
            ),
            'store_banner_height' => array(
                'name'    => 'store_banner_height',
                'label'   => __( 'Store Banner height', 'dokan' ),
                'type'    => 'text',
                'default' => 300
            ),
        );

        $settings_fields = $dokan_settings->add_settings_after(
            $settings_fields,
            'dokan_appearance',
            'store_header_template',
            $appearence_settings
        );

        $new_settings_fields['dokan_withdraw'] = array(
            'withdraw_order_status' => array(
                'name'    => 'withdraw_order_status',
                'label'   => __( 'Order Status for Withdraw', 'dokan' ),
                'desc'    => __( 'Order status for which vendor can make a withdraw request.', 'dokan' ),
                'type'    => 'multicheck',
                'default' => array( 'wc-completed' => __( 'Completed', 'dokan' ), 'wc-processing' => __( 'Processing', 'dokan' ), 'wc-on-hold' => __( 'On-hold', 'dokan' ) ),
                'options' => array( 'wc-completed' => __( 'Completed', 'dokan' ), 'wc-processing' => __( 'Processing', 'dokan' ), 'wc-on-hold' => __( 'On-hold', 'dokan' ) )
            ),
            'withdraw_date_limit'   => array(
                'name'    => 'withdraw_date_limit',
                'label'   => __( 'Withdraw Threshold', 'dokan' ),
                'desc'    => __( 'Days, ( Make order matured to make a withdraw request) <br> Value "0" will inactive this option', 'dokan' ),
                'default' => '0',
                'type'    => 'number',
            ),
            'hide_withdraw_option' => array(
                'name'    => 'hide_withdraw_option',
                'label'   => __( 'Hide Withdraw Option', 'dokan' ),
                'desc'    => __( 'Hide withdraw option (when vendor is getting commission automatically) ', 'dokan' ),
                'default' => 'off',
                'type'    => 'checkbox'
            ),
        );

        $settings_fields['dokan_withdraw'] = array_merge( $settings_fields['dokan_withdraw'], $new_settings_fields['dokan_withdraw'] );

        return $dokan_settings->add_settings_after(
            $settings_fields,
            'dokan_selling',
            'commission_type',
            $this->get_additional_fee()
        );
    }

    /**
     * Get additional fee settings fields
     *
     * @since 2.9.14
     *
     * @return array
     */
    public function get_additional_fee() {
        return [
            'additional_fee' => [
                'name'    => 'additional_fee',
                'label'   => __( 'Admin Commission', 'dokan' ),
                'type'    => 'combine',
                'fields'  => [
                    'percent_fee' => [
                        'name'    => 'admin_percentage',
                        'label'   => __( 'Percent Fee', 'dokan' ),
                        'default' => '10',
                        'type'    => 'text',
                        'desc'    => __( 'Amount you will get from sales in percentage (10%)', 'dokan' ),
                        'required' => 'yes',
                        'sanitize_callback'          => 'wc_format_decimal',
                        'response_sanitize_callback' => 'wc_format_decimal',
                    ],
                    'fixed_fee' => [
                        'name'    => 'additional_fee',
                        'label'   => __( 'Fixed Fee', 'dokan' ),
                        'default' => '10',
                        'type'    => 'text',
                        'desc'    => __( 'Amount you will get from sales in flat rate(+5)', 'dokan' ),
                        'required' => 'yes',
                        'sanitize_callback'          => 'wc_format_decimal',
                        'response_sanitize_callback' => 'wc_format_localized_price',
                    ]
                ],
                'min'     => '0',
                'step'    => 'any',
                'desc'    => __( 'Amount you will get from sales in both percentage and fixed fee', 'dokan' ),
                'condition' => [
                    'type' => 'show',
                    'logic' => [
                        'commission_type' => [ 'combine' ]
                    ]
                ],
                'sanitize_callback'          => 'wc_format_decimal',
                'response_sanitize_callback' => 'wc_format_localized_price',
            ]
        ];
    }

    /**
     * Load Report Scripts
     *
     * @since 2.4
     *
     * @return void
     */
    function common_scripts() {
        wp_enqueue_style( 'jquery-ui' );
        wp_enqueue_style( 'dokan-select2-css' );

        wp_enqueue_script( 'jquery-ui-datepicker' );
        wp_enqueue_script( 'dokan-flot' );
        wp_enqueue_script( 'dokan-chart' );
        wp_enqueue_script( 'dokan-select2-js' );
    }

    /**
     * Add vue routes for admin pages
     *
     * @param  array $routes
     *
     * @return array
     */
    public function vue_admin_routes( $routes ) {
        $routes[] = array(
            'path'      => '/vendors/:id',
            'name'      => 'VendorSingle',
            'component' => 'VendorSingle'
        );

        $routes[] = array(
            'path'      => '/announcement',
            'name'      => 'Announcement',
            'component' => 'Announcement'
        );

        $routes[] = array(
            'path'      => '/announcement/new',
            'name'      => 'NewAnnouncement',
            'component' => 'NewAnnouncement'
        );

        $routes[] = array(
            'path'      => '/announcement/:id/edit',
            'name'      => 'EditAnnouncement',
            'component' => 'EditAnnouncement'
        );

        $routes[] = array(
            'path'      => '/refund',
            'name'      => 'Refund',
            'component' => 'Refund'
        );

        $routes[] = array(
            'path'      => '/modules',
            'component' => 'Modules',
            'children' => [
                [
                    'path' => '',
                    'name' => 'Modules',
                    'component' => 'Modules',
                    'children' => [
                        [
                            'path' => 'status/:status',
                            'name' => 'ModulesStatus',
                            'component' => 'Modules'
                        ]
                    ]
                ],
            ]
        );

        if ( dokan_is_store_categories_feature_on() ) {
            $routes[] = array(
                'path' => '/store-categories',
                'name' => 'StoreCategoriesIndex',
                'component' => 'StoreCategoriesIndex',
            );
            $routes[] = array(
                'path' => '/store-categories/:id',
                'name' => 'StoreCategoriesShow',
                'component' => 'StoreCategoriesShow',
            );
        }

        $routes[] = array(
            'path'      => '/tools',
            'name'      => 'Tools',
            'component' => 'Tools'
        );

        $routes[] = array(
            'path'      => '/reports',
            'name'      => 'Reports',
            'component' => 'Reports'
        );

        return $routes;
    }

    /**
     * Whats new page for dokan pro
     *
     * @return void
     */
    function whats_new_page() {
        include dirname( __FILE__ ) . '/Views/whats-new.php';
    }

    /**
     * Create default pages
     *
     * @since 2.4
     *
     * @return void
     */
    function create_default_pages() {

        if ( ! isset( $_POST['action'] ) || $_POST['action'] !== 'create_pages' ) {
            return wp_send_json_error( __( 'You don\'t have enough permission', 'dokan', '403' ) );
        }

        if ( ! current_user_can( 'manage_woocommerce' ) ) {
            return wp_send_json_error( __( 'You don\'t have enough permission', 'dokan', '403' ) );
        }

        $page_created = get_option( 'dokan_pages_created', false );
        $pages = array(
            array(
                'post_title' => __( 'Dashboard', 'dokan' ),
                'slug'       => 'dashboard',
                'page_id'    => 'dashboard',
                'content'    => '[dokan-dashboard]'
            ),
            array(
                'post_title' => __( 'Store List', 'dokan' ),
                'slug'       => 'store-listing',
                'page_id'    => 'store_listing',
                'content'    => '[dokan-stores]'
            ),
            array(
                'post_title' => __( 'My Orders', 'dokan-lite' ),
                'slug'       => 'my-orders',
                'page_id'    => 'my_orders',
                'content'    => '[dokan-my-orders]',
            ),
        );

        $dokan_pages = array() ;

        if ( ! $page_created ) {

            foreach ( $pages as $page ) {
                $page_id = wp_insert_post( array(
                    'post_title'     => $page['post_title'],
                    'post_name'      => $page['slug'],
                    'post_content'   => $page['content'],
                    'post_status'    => 'publish',
                    'post_type'      => 'page',
                    'comment_status' => 'closed'
                        ) );
                $dokan_pages[ $page['page_id'] ] = $page_id ;
            }

            update_option( 'dokan_pages', $dokan_pages );
            flush_rewrite_rules();
        } else {
            foreach ( $pages as $page ) {

                if ( !$this->dokan_page_exist( $page['slug'] ) ) {
                    $page_id = wp_insert_post( array(
                        'post_title'     => $page['post_title'],
                        'post_name'      => $page['slug'],
                        'post_content'   => $page['content'],
                        'post_status'    => 'publish',
                        'post_type'      => 'page',
                        'comment_status' => 'closed'
                            ) );
                    $dokan_pages[ $page['page_id'] ] = $page_id ;
                    update_option( 'dokan_pages', $dokan_pages );
                }
            }

            flush_rewrite_rules();
        }

        update_option( 'dokan_pages_created', 1 );
        wp_send_json_success( array(
            'message' => __( 'All the default pages has been created!', 'dokan' )
        ), 201 );
        exit;
    }

    /**
     * Check a Donan shortcode  page exist or not
     *
     * @since 2.5
     *
     * @param type $slug
     *
     * @return boolean
     */
    function dokan_page_exist( $slug ) {
        if ( ! $slug ) {
            return false;
        }

        $page_created = get_option( 'dokan_pages_created', false );

        if ( ! $page_created ) {
            return false;
        }

        $page_list = get_option( 'dokan_pages', '' );
        $slug      = str_replace( '-', '_', $slug );
        $page      = isset( $page_list[$slug] ) ? get_post( $page_list[$slug] ) : null;

        if ( $page === null ) {
            return false;
        } else {
            return true;
        }
    }

    function render_pro_admin_toolbar( $wp_admin_bar ) {

        $wp_admin_bar->remove_menu( 'dokan-pro-features' );

        $wp_admin_bar->add_menu( array(
            'id'     => 'dokan-sellers',
            'parent' => 'dokan',
            'title'  => __( 'Vendors', 'dokan' ),
            'href'   => admin_url( 'admin.php?page=dokan#/vendors' )
        ) );

        $wp_admin_bar->add_menu( array(
            'id'     => 'dokan-reports',
            'parent' => 'dokan',
            'title'  => __( 'Reports', 'dokan' ),
            'href'   => admin_url( 'admin.php?page=dokan#/reports' )
        ) );

        $wp_admin_bar->add_menu( array(
            'id'     => 'dokan-settings',
            'parent' => 'dokan',
            'title'  => __( 'Settings', 'dokan' ),
            'href'   => admin_url( 'admin.php?page=dokan#/settings' )
        ) );
    }

    /**
     * Export method to generate CSV for all logs tab
     *
     * @since 2.6.6
     *
     * @global type $wpdb
     */
    function dokan_export_all_logs() {

        if ( isset( $_GET['action'] ) && $_GET['action'] == 'dokan-export' ) {
            global $wpdb;
            $seller_where = '';

            if ( isset( $_GET['seller_id'] ) ) {
                $seller_where = $wpdb->prepare( 'AND seller_id = %d', $_GET['seller_id'] );
            }

            $sql = "SELECT do.*, p.post_date FROM {$wpdb->prefix}dokan_orders do
                LEFT JOIN $wpdb->posts p ON do.order_id = p.ID
                WHERE seller_id != 0 AND p.post_status != 'trash' $seller_where";

            $all_logs = $wpdb->get_results( $sql );

            $all_logs = json_decode( json_encode( $all_logs ), true );
            $ob = fopen( "php://output", 'w' );

            $headers = array(
                'order_id'     => __( 'Order', 'dokan' ),
                'seller_id'    => __( 'Vendor', 'dokan' ),
                'order_total'  => __( 'Order Total', 'dokan' ),
                'net_amount'   => __( 'Vendor Earning', 'dokan' ),
                'order_status' => __( 'Status', 'dokan' ),
                'commission'   => __( 'Commission', 'dokan' )
            );

            $filename = "Report-" . date( 'Y-m-d', time() );
            header( "Content-Type: application/csv; charset=" . get_option( 'blog_charset' ) );
            header( "Content-Disposition: attachment; filename=$filename.csv" );

            fputcsv( $ob, array_values( $headers ) );

            foreach ( $all_logs as $a ) {
                unset( $a['id'] );
                unset( $a['post_date'] );

                $a['seller_id'] = dokan()->vendor->get($a['seller_id'])->get_name();
                $a['order_status'] = ucwords( substr( $a['order_status'], 3 ) );
                $a['commission'] = $a['order_total'] - $a['net_amount'];

                fputcsv( $ob, array_values( $a ) );
            }
            fclose( $ob );
            exit();
        }
    }

    /**
     * Show update notice
     *
     * @since 1.0
     *
     * @return void
     */

    public function show_whats_new_notice() {

        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }

        // check if it has already been dismissed
        $versions = get_option( 'dokan_whats_new_versions', array() );

        if ( in_array( DOKAN_PRO_PLUGIN_VERSION, $versions ) ) {
            return;
        }

        ?>
            <div class="info notice notice-info is-dismissible" id="dokan-pro-whats-new-notice">
                <p>Check What's new in Dokan Pro</p>
                <a style="margin-bottom: 10px;" href="<?php echo add_query_arg( array( 'page' => 'whats-new-dokan' ), admin_url( 'admin.php' ) ); ?>" class="button button-primary">What's New in Dokan Pro</a>
            </div>

            <script type='text/javascript'>
                jQuery('body').on('click', '#dokan-pro-whats-new-notice .notice-dismiss', function(e) {
                    e.preventDefault();

                    wp.ajax.post('dokan-whats-new-notice', {
                        dokan_promotion_dismissed: true
                    });
                });
            </script>
       <?php
    }

    public function dismiss_new_notice() {
        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }

        if ( !empty( $_POST['dokan_promotion_dismissed'] ) ) {
            $versions = get_option( 'dokan_whats_new_versions', array() );

            if ( ! in_array( DOKAN_PRO_PLUGIN_VERSION, $versions ) ) {
                $versions[] = DOKAN_PRO_PLUGIN_VERSION;
            }

            update_option( 'dokan_whats_new_versions', $versions );
        }
    }

    /**
     * Added xmas promotion notice
     *
     * @since  2.9.3
     *
     * @return void
     */
    public function show_chirstmas_notice() {

        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }

        // check if it has already been dismissed
        $offer_key   = 'dokan_pro_christmas_notice';
        $hide_notice = get_option( $offer_key, 'show' );
        $offer_link  = 'https://wedevs.com/dokan/pricing/#dokan-compare-table-section';
        $offer_last_date = strtotime( '2018-12-31 12:00:00' );
        $content = __( '<p>Christmas Offer! <strong>Save 30%%</strong> Upgrading Your Dokan Package. <strong>Coupon: “XMAS30”</strong>. Offer Ends in 31st Dec, 12.00 PM! <a target="_blank" href="%s">Grab The Deal</a></p>', 'dokan-lite' );

        if ( 'hide' == $hide_notice ) {
            return;
        }

        if ( current_time( 'timestamp' ) > $offer_last_date ) {
            return;
        }

        ?>
            <div class="notice notice-success is-dismissible" id="dokan-christmas-notice">
                <?php printf( wp_kses_post( $content ), esc_url( $offer_link ) ); ?>
            </div>

            <style>
                #dokan-christmas-notice p {
                    font-size: 14px;
                }
            </style>

            <script type='text/javascript'>
                jQuery('body').on('click', '#dokan-christmas-notice .notice-dismiss', function(e) {
                    e.preventDefault();

                    wp.ajax.post( 'dokan-dismiss-christmas-offer-notice', {
                        dokan_christmas_dismissed: true,
                        nonce: '<?php echo esc_attr( wp_create_nonce( 'dokan_admin' ) ); ?>'
                    });
                });
            </script>
        <?php
    }

    /**
     * Dismiss promotion notice
     *
     * @since  2.9.3
     *
     * @return void
     */
    public function dismiss_christmas_offer() {
        if ( ! current_user_can( 'manage_options' ) ) {
            wp_send_json_error( __( 'You have no permission to do that', 'dokan-lite' ) );
        }

        $nonce = isset( $_POST['nonce'] ) ? sanitize_text_field( wp_unslash( $_POST['nonce'] ) ) : '';

        if ( ! wp_verify_nonce( $nonce, 'dokan_admin' ) ) {
            wp_send_json_error( __( 'Invalid nonce', 'dokan-lite' ) );
        }

        if ( ! empty( $_POST['dokan_christmas_dismissed'] ) ) {
            $offer_key = 'dokan_pro_christmas_notice';
            update_option( $offer_key, 'hide' );
        }
    }

    /**
     * Handle seller bulk action
     *
     * @since 2.8.0
     *
     * @return void
     */
    public function handle_seller_bulk_action() {
        if ( ! isset( $_REQUEST['dokan-seller-bulk-action'] ) ) {
            return;
        }

        if ( isset( $_REQUEST['action2'] ) && $_REQUEST['action2'] == 'delete' ) {

            $users = $_REQUEST['users'];

            if ( $users ) {
                foreach ( $users as $key => $user ) {
                    dokan()->vendor->get( intval( $user ) )->delete();
                }
            }
        }

        $redirect_url = add_query_arg( array( 'page' => 'dokan-sellers'), admin_url( 'admin.php' ) );
        wp_redirect( $redirect_url );
        exit();
    }

    /**
     * Add combine commission type
     *
     * @since DOKAN_LITE_SINCE
     *
     * @param array $types
     *
     * @return array
     */
    public function add_combine_commission_type( $types ) {
        $types['combine'] = __( 'Combine', 'dokan' );

        return $types;
    }

    /**
     * Save meta fields
     *
     * @param  int $user_id
     *
     * @return void
     */
    public function save_meta_fields( $user_id ) {
        if ( ! current_user_can( 'manage_woocommerce' ) ) {
            return;
        }

        $post_data = wp_unslash( $_POST );
        $additional_fee  = isset( $post_data['dokan_admin_additional_fee'] ) && $post_data['dokan_admin_additional_fee'] != '' ? $post_data['dokan_admin_additional_fee'] : '';

        update_user_meta( $user_id, 'dokan_admin_additional_fee', wc_format_decimal( $additional_fee ) );
    }

    /**
     * Add additional fee
     *
     * @since 2.9.16
     *
     * @param Object $user
     */
    public function add_additional_fee( $user ) {
        $admin_additional_fee = get_user_meta( $user->ID, 'dokan_admin_additional_fee', true );
        ?>
        <span class="additional-fee dokan-hide">
            <?php echo esc_html( '% &nbsp;&nbsp; +'); ?>
            <input type="text" class="wc_input_price small-text" name="dokan_admin_additional_fee" value="<?php echo esc_attr( wc_format_localized_price( $admin_additional_fee ) ); ?>">
        </span>

        <script type="text/javascript">
            ;(function($) {
                $('#dokan_admin_percentage_type').on('change', function() {
                    if ( 'combine' === $(this).val() ) {
                        $('span.additional-fee').removeClass('dokan-hide');
                        $('.combine-commission-description').text( dokan_admin.combine_commission_desc );
                        $('input[name=dokan_admin_percentage]').attr('required', true);
                        $('input[name=dokan_admin_additional_fee]').attr('required', true);
                    } else {
                        $('span.additional-fee').addClass('dokan-hide');
                        $('.combine-commission-description').text( dokan_admin.default_commission_desc );
                        $('input[name=dokan_admin_percentage]').removeAttr('required');
                        $('input[name=dokan_admin_additional_fee]').removeAttr('required');
                    }
                }).trigger('change');
            })(jQuery);
        </script>
        <?php
    }

    /**
     * Make combine commission fields mandatory
     *
     * @since  2.9.16
     *
     * @param  WC_Error
     *
     * @return void
     */
    public function make_combine_commission_fields_mandatory( &$errors, $update, &$user ) {
        $post = wp_unslash( $_POST );

        if ( empty( $post['dokan_admin_percentage_type'] ) || 'combine' !== $post['dokan_admin_percentage_type'] ) {
            return;
        }

        if ( isset( $post['dokan_admin_percentage'] ) && '' === $post['dokan_admin_percentage'] ) {
            update_user_meta( $user->ID, 'dokan_admin_percentage', '' );
            update_user_meta( $user->ID, 'dokan_admin_additional_fee', '' );
            $errors->add( 'required', sprintf( '<strong>%1$s:</strong> %2$s', __( 'Error', 'dokan' ), __( 'Admin percentage commission is required.', 'dokan' ) ) );
        }

        if ( isset( $post['dokan_admin_additional_fee'] ) && '' === $post['dokan_admin_additional_fee'] ) {
            update_user_meta( $user->ID, 'dokan_admin_percentage', '' );
            update_user_meta( $user->ID, 'dokan_admin_additional_fee', '' );
            $errors->add( 'required', sprintf( '<strong>%1$s:</strong> %2$s', __( 'Error', 'dokan' ), __( 'Admin flat commission is required.', 'dokan' ) ) );
        }
    }
}

// End of WeDevs\DokanPro\Admin\Admin class;
