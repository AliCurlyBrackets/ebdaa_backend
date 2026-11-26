<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'ebdaa' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'SF:BN=}%F`79ux @GUx)Tu`B!aWvx>:si)yK}w+e3<QCInf2)HM:Wi}!0l!iS!wi' );
define( 'SECURE_AUTH_KEY',  'NE<!m42>AAVAMp@]E=QC$4Z;<cw@YSJAOHhqvHO%[?g`%f+F].@.acV{s,]N.;xE' );
define( 'LOGGED_IN_KEY',    '~f(H-|}EGfp,{S63hGeM72!vic9w{;p:M3V wKc-SQ#5Eh<A^HN/7bu1o=Ug2(8|' );
define( 'NONCE_KEY',        '&nWV4AHZ}&X;N:GidX|F`FVqf*;^ HcX/[q?!.v_J!Ao,-*U`tm1(ocP3]&)htxb' );
define( 'AUTH_SALT',        'y%{+u,/qXn7Ju=3%a4l;- ;*Y/Ybw%z^QZ=oh$k$D9bt}LgEWrBZ_8z0Eq3q+$e#' );
define( 'SECURE_AUTH_SALT', 'x%>~+NL|1 -Gjs9ddHUI$sT+KcWN3HsF80O29[BU&WmyfLF@evQ`~`%|Z42YN_Wa' );
define( 'LOGGED_IN_SALT',   'ZQP9bSu??G2q^km>?HG@PB5noU=pO4Ye3[^wOO(quA&xN.pWl. n8i3)W=/x|3[y' );
define( 'NONCE_SALT',       'UF]qYKZ9FkjiH;l,h<*cF&F<%7{3IRo(w)!t~CT3RM<ijjuhQP?6T-gGabwF>g*[' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
