<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp_shop' );

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
define( 'AUTH_KEY',         'WIK9v`_XM+dM)4<N0jMD8e~SNY9KiO^H&`/OeoRKGuy,uc._DK-Qc]V41 ; XW|/' );
define( 'SECURE_AUTH_KEY',  '&CH }W*yq}o*1:,A~M}9g.c2/De7DY2;ah%IM~O~h[%~%@y&6>KZ=}#hk,5n?>a#' );
define( 'LOGGED_IN_KEY',    'j[w(g7WH0o/wVb&fOZ*FARO] SC-.m9>-h!BGAsL|bH@!qE}<).6KN7Q@<CniC(&' );
define( 'NONCE_KEY',        '#@O_y;FUsNvy@3~65i9K+=JCSpkjUvyh5F|?Z^T#?1=8)L:}&$i<@4!AM5+QAv*)' );
define( 'AUTH_SALT',        '+fI@JT4PhY9~shcX1|h:9?Jj#+DBdz>TU|=oOgQkQRN9~zG#D?ppy)pn`<*l&YN[' );
define( 'SECURE_AUTH_SALT', '!a]/MR5I~U:}:D[.y=I2 %=7UG44` Z?MqL*Kok#5lfYZ__0U:(Z{EDQk9}3k i]' );
define( 'LOGGED_IN_SALT',   '*!EU%0{,p[KG$39?7{t)tEjrN|ND>0y !d/#;5sb-BGG=_|Dc|c-on3Z4=M&eqJd' );
define( 'NONCE_SALT',       '4wif^.rbUO|h4Q3Blw5!%._@iNbZ~|tUQigd}G~V>*lhmyw|):4X64>|sZFX=eQY' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_shop';

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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
