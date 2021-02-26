<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
//define( 'DB_NAME', 'db_musthave' );
define( 'DB_NAME', 'db_must-have' );

/** MySQL database username */

//define( 'DB_USER', 'adminwecan' );
define( 'DB_USER', 'admin' );

/** MySQL database password */
//define( 'DB_PASSWORD', '_*8gTYWqM9FHU' );
define( 'DB_PASSWORD', '123456' );


/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );
define( 'FS_METHOD', 'direct' );

// This enables debugging.
define( 'WP_DEBUG', true );

define('WP_MEMORY_LIMIT', '256M');

define('WP_CRON_LOCK_TIMEOUT', 120);

define('AUTOSAVE_INTERVAL', 300);

define('WP_POST_REVISIONS', 5);

define('EMPTY_TRASH_DAYS', 7);

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '2(C{B:*HP*k,X3+boCzhP#TEvL`#4!$UUSjVh:2I@bVD$.T,Arb+C}5I%&U()*UU' );
define( 'SECURE_AUTH_KEY',  ',A(5bN:B!7TI 3KvD;pOi?|+fWm5:CT0m<-9umxA_MC4]~uq.}nhJA_rVSfZwq#u' );
define( 'LOGGED_IN_KEY',    ':KW+c@Go=TS%gZ@k@@u!^eL*|Q]q@W~=)l6zwZcJ-r8W}(3VCBeg(,#t^`*W7Q3O' );
define( 'NONCE_KEY',        'VR0|rq,x0S.a6H@S_Y#:D8Ul=j?sLninpOEWT}X/)q>Z3@-]&yY1L~`9@VT{[hH{' );
define( 'AUTH_SALT',        '.$n]4oF]%T594GviyvJl}!=#8-#}=@q@d4}XOzdK#I=& R`]xf*$DX!S|2jCP/.h' );
define( 'SECURE_AUTH_SALT', '511!r*KZ$(uotH-_;|P?rO$.wEMdUfPx;rkr>>jfY0~lI- ?eqvJ/U-1Y{s`7~Ax' );
define( 'LOGGED_IN_SALT',   'PnCdSh?FsURX`ly9f#11^{{Tq_&?2F0]geU~?MVL?Sr29l1dyr|<o[HC|)Rmy*E ' );
define( 'NONCE_SALT',       'M5d*FcP^o--9rX5~PllJ~&Qxx2xv!?YM[8?_OUi8$rI]G[TW?J*dLC2ujC LhCu!' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
