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
<section>
    <div class="bannerStatic">
        <div class="main-bannerStatic">
            <div class="main-bannerStatic__content">
                <div class="main-bannerStatic__img">
                    <img src="http://159.89.229.55/Must-Have/wp-content/uploads/2021/02/banner-about.png" alt="">
                </div>
                <div class="main-bannerStatic__text">
                    <p>MI CUENTA</p>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="main-MyAccount ">
	
	<?php do_action( 'woocommerce_account_navigation' );?>
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

</div>