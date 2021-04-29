<?php

/**
 * Vendor staff class
 */
class Dokan_Staffs {

    private static $errors;

    /**
     * Load automatically when class initiate
     *
     * @since 1.0.0
     */
    public function __construct() {
        add_action( 'dokan_add_staff_content', array( $this, 'display_errors' ), 10 );
        add_action( 'dokan_add_staff_content', array( $this, 'add_staff_content' ), 15 );
        add_action( 'template_redirect', array( $this, 'handle_staff' ), 10 );
        add_action( 'template_redirect', array( $this, 'delete_staff' ), 99 );
        add_action( 'template_redirect', array( $this, 'handle_pemission' ), 99 );
        add_action( 'dokan_new_product_added', array( $this, 'filter_product' ), 10, 2 );
        add_action( 'dokan_product_duplicate_after_save', array( $this, 'filter_duplicate_product' ), 10, 2 );
        add_action( 'dokan_product_updated', array( $this, 'update_product' ), 10 );
        add_action( 'dokan_product_listing_arg', array( $this, 'listing_product' ), 10 );
        add_action( 'dokan_is_product_author', array( $this, 'dokan_is_product_author_modified' ), 10, 2 );
    }

    /**
     * Display all errors
     *
     * @since 1.0.0
     *
     * @return void
     */
    public function display_errors() {
        if ( ! empty( self::$errors ) ) {
            foreach ( self::$errors as $key => $error ) {
                if ( is_wp_error( $error ) ) {
                    dokan_get_template_part(
                        'global/dokan-error', '', array(
							'deleted' => true,
							'message' => $error->get_error_message(),
                        )
                    );
                }
            }
        }
    }

    /**
     * Add staff content
     *
     * @since 1.0.0
     *
     * @return void
     */
    public function add_staff_content() {
        $get_data = wp_unslash( $_GET ); // phpcs:ignore
        $is_edit = ( isset( $get_data['action'] ) && $get_data['action'] === 'edit' && ! empty( $get_data['staff_id'] ) ) ? $get_data['staff_id'] : 0;

        if ( ! $is_edit ) {
            $first_name  = '';
            $last_name   = '';
            $email       = '';
            $phone       = '';
            $button_name = __( 'Create staff', 'dokan' );
        } else {
            $user        = get_user_by( 'id', $get_data['staff_id'] );
            $first_name  = $user->first_name;
            $last_name   = $user->last_name;
            $email       = $user->user_email;
            $phone       = get_user_meta( $user->ID, '_staff_phone', true );
            $button_name = __( 'Update staff', 'dokan' );
        }

        include DOKAN_VENDOR_STAFF_DIR . '/templates/form.php';
    }

    /**
     * Hande form submission
     *
     * @since 1.0.0
     *
     * @return void
     */
    public function handle_staff() {
        $post_data = wp_unslash( $_POST );

        if ( ! isset( $post_data['staff_creation'] ) ) {
            return;
        }

        if ( ! wp_verify_nonce( $post_data['vendor_staff_nonce_field'], 'vendor_staff_nonce' ) ) {
            return;
        }

        $is_edit = ! empty( $post_data['staff_id'] ) ? $post_data['staff_id'] : false;
        $user_password = '';

        if ( empty( $post_data['first_name'] ) ) {
            self::$errors[] = new WP_Error( 'no-first-name', __( 'First Name must be required', 'dokan' ) );
        }

        if ( empty( $post_data['last_name'] ) ) {
            self::$errors[] = new WP_Error( 'no-last-name', __( 'Last Name must be required', 'dokan' ) );
        }

        if ( empty( $post_data['email'] ) ) {
            self::$errors[] = new WP_Error( 'no-email', __( 'Email must be required', 'dokan' ) );
        }

        if ( empty( $post_data['vendor_id'] ) ) {
            self::$errors[] = new WP_Error( 'no-vendor', __( 'No vendor found for assigning this staff', 'dokan' ) );
        }

        if ( ! empty( $post_data['staff_id'] ) ) {
            if ( ! empty( $post_data['password'] ) ) {
                $user_password = $post_data['password'];
            }
        }

        if ( ! $is_edit ) {
            $userdata = array(
                'user_email'   => $post_data['email'],
                'user_pass'    => wp_generate_password(),
                'user_login'   => $post_data['email'],
                'first_name'   => sanitize_text_field( $post_data['first_name'] ),
                'last_name'    => sanitize_text_field( $post_data['last_name'] ),
                'role'         => 'vendor_staff',
                'display_name' => sanitize_text_field( $post_data['first_name'] ) . ' ' . sanitize_text_field( $post_data['last_name'] ),
            );
        } else {
            $userdata = array(
                'ID'           => (int) $is_edit,
                'user_email'   => $post_data['email'],
                'user_login'   => $post_data['email'],
                'first_name'   => sanitize_text_field( $post_data['first_name'] ),
                'last_name'    => sanitize_text_field( $post_data['last_name'] ),
                'role'         => 'vendor_staff',
                'display_name' => sanitize_text_field( $post_data['first_name'] ) . ' ' . sanitize_text_field( $post_data['last_name'] ),
            );

            if ( ! empty( $user_password ) ) {
                $userdata['user_pass'] = wp_hash_password( $user_password );
            }
        }

        remove_filter( 'pre_user_display_name', 'dokan_seller_displayname' );
        $user = wp_insert_user( $userdata );

        if ( is_wp_error( $user ) ) {
            self::$errors[] = $user;
            return;
        }

        if ( ! $is_edit ) {
            wp_send_new_user_notifications( $user, 'user' );
        }

        $staff = new WP_User( $user );
        $staff_caps = dokan_get_staff_capabilities();

        $staff->add_cap( 'dokandar' );
        $staff->add_cap( 'delete_pages' );
        $staff->add_cap( 'publish_posts' );
        $staff->add_cap( 'edit_posts' );
        $staff->add_cap( 'delete_published_posts' );
        $staff->add_cap( 'edit_published_posts' );
        $staff->add_cap( 'delete_posts' );
        $staff->add_cap( 'manage_categories' );
        $staff->add_cap( 'moderate_comments' );
        $staff->add_cap( 'unfiltered_html' );
        $staff->add_cap( 'upload_files' );
        $staff->add_cap( 'edit_shop_orders' );
        $staff->add_cap( 'edit_product' );

        foreach ( $staff_caps as $key => $staff_cap ) {
            $staff->add_cap( $staff_cap );
        }

        update_user_meta( $user, 'dokan_enable_selling', 'yes' );
        update_user_meta( $user, '_vendor_id', sanitize_text_field( $post_data['vendor_id'] ) );
        update_user_meta( $user, '_staff_phone', sanitize_text_field( $post_data['phone'] ) );
        wp_safe_redirect( dokan_get_navigation_url( 'staffs' ) );
        exit();
    }

    /**
     * Delete staff
     *
     * @since 1.0.0
     *
     * @return void
     */
    public function delete_staff() {
        $get_data = wp_unslash( $_GET );

        if ( isset( $get_data['action'] ) && $get_data['action'] === 'delete_staff' ) {
            if ( isset( $get_data['_staff_delete_nonce'] ) && wp_verify_nonce( $get_data['_staff_delete_nonce'], 'staff_delete_nonce' ) ) {
                $user_id   = ! empty( $get_data['staff_id'] ) ? $get_data['staff_id'] : 0;
                $vendor_id = (int) get_user_meta( $user_id, '_vendor_id', true );

                if ( $vendor_id === get_current_user_id() ) {
                    if ( $user_id ) {
                        require_once ABSPATH . 'wp-admin/includes/user.php';
                        wp_delete_user( $user_id );

                        $redirect_url = add_query_arg( array( 'message' => 'deleted' ), dokan_get_navigation_url( 'staffs' ) );
                        wp_safe_redirect( $redirect_url );
                        exit();
                    }
                }
            }
        }
    }

    /**
     * Handle staff permissions
     *
     * @since 1.0.0
     *
     * @return void
     */
    public function handle_pemission() {
        $post_data = wp_unslash( $_POST );
        $get_data  = wp_unslash( $_GET );

        if ( ! isset( $post_data['update_staff_permission'] ) ) {
            return;
        }

        if ( ! dokan_is_user_seller( get_current_user_id() ) ) {
            return;
        }

        if ( ! wp_verify_nonce( $post_data['_dokan_manage_staff_permission_nonce'], 'dokan_manage_staff_permission' ) ) {
            return;
        }

        if ( isset( $get_data['view'] ) && 'manage_permissions' !== $get_data['view'] ) {
            return;
        }

        $staff_id  = ! empty( $get_data['staff_id'] ) ? $get_data['staff_id'] : 0;
        $vendor_id = (int) get_user_meta( $staff_id, '_vendor_id', true );

        if ( $staff_id && $vendor_id !== get_current_user_id() ) {
            return;
        }

        $capabilities = array();
        $all_cap      = dokan_get_all_caps();
        $staff        = new WP_User( $staff_id );

        if ( ! $staff ) {
            return;
        }

        foreach ( $all_cap as $key => $cap ) {
            $capabilities = array_merge( $capabilities, array_keys( $cap ) );
        }

        foreach ( $capabilities as $key => $value ) {
            if ( isset( $post_data[ $value ] ) && $post_data[ $value ] ) {
                $staff->add_cap( $value );
            } else {
                $staff->remove_cap( $value );
            }
        }

        $redirect_url = add_query_arg(
            [
                'view'     => 'manage_permissions',
                'action'   => 'manage',
                'staff_id' => $staff_id,
                'message'  => 'success',
            ], dokan_get_navigation_url( 'staffs' )
        );
        wp_safe_redirect( $redirect_url );
    }

    /**
     * Handle product for staff uploading and editing
     *
     * @since 1.0.0
     *
     * @return void
     */
    public function filter_product( $product_id, $post_data ) {
        if ( ! $product_id ) {
            return;
        }

        if ( ! is_user_logged_in() ) {
            return;
        }

        if ( ! current_user_can( 'vendor_staff' ) ) {
            return;
        }

        $staff_id  = get_current_user_id();
        $vendor_id = get_user_meta( $staff_id, '_vendor_id', true );

        if ( empty( $vendor_id ) ) {
            return;
        }

        wp_update_post(
            [
                'ID' => $product_id,
                'post_author' => $vendor_id,
            ]
        );
        update_post_meta( $product_id, '_staff_id', $staff_id );
    }

    /**
     * Update product data
     *
     * @since 1.0.0
     *
     * @return void
     */
    public function update_product( $post_id ) {
        $this->filter_product( $post_id, array() );
    }

    /**
     * Update duplicate product data
     *
     * @since 3.1.2
     *
     * @return void
     */
    public function filter_duplicate_product( $clone_product ) {
        if ( ! isset( $clone_product ) ) {
            return;
        }

        $this->filter_product( $clone_product->get_id(), array() );
    }

    /**
     * Listing product argument filter
     *
     * @since 1.0.0
     *
     * @return void
     */
    public function listing_product( $args ) {
        if ( current_user_can( 'vendor_staff' ) ) {
            $staff_id = get_current_user_id();
            $vendor_id = get_user_meta( $staff_id, '_vendor_id', true );

            if ( empty( $vendor_id ) ) {
                return $args;
            }

            $args['author'] = $vendor_id;
        }

        return $args;
    }

    /**
     * Product author modified
     *
     * @since 3.1.2
     *
     * @param int $user_id
     * @param int $product_id
     *
     * @return int $vendor_id
     */
    public function dokan_is_product_author_modified( $user_id, $product_id ) {
        if ( ! $product_id ) {
            return $user_id;
        }

        if ( ! is_user_logged_in() ) {
            return $user_id;
        }

        if ( ! current_user_can( 'vendor_staff' ) ) {
            return $user_id;
        }

        $staff_id  = get_current_user_id();
        $vendor_id = get_user_meta( $staff_id, '_vendor_id', true );

        return (int) $vendor_id;
    }
}
