<?php
define( 'WP_CACHE', true );
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
define( 'DB_NAME', 'hashmuseum_com_extdev' );

/** MySQL database username */
define( 'DB_USER', 'hashmuseum_com_extdev' );

/** MySQL database password */
define( 'DB_PASSWORD', 'faeviWohca4Feine' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );



/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '^q/y$pH5][w@JtZt$rO ].,TJJ;,*ckQ--t46m-zRua2D}b{[%8L+YEPsmDnRR3l');
define('SECURE_AUTH_KEY',  '~2U4|T`-LOD?K9fM#Bp-:>+^A~ /4y)L|s?GgH2bER.|+7!W-)I-nF2MLnK>wfO@');
define('LOGGED_IN_KEY',    '@6A?XTQ.438([f6K$DC{[;0y/U}f|vm:-u5KIz&U,fp$2|bSB]_hZb%|q=6AZ-h|');
define('NONCE_KEY',        'Fr.S}`}f|{lh,E93T<w:-wW,hSoyUBXT-h=/;OsAH^.(4%e+?cKV~b^+(y}M-)+k');
define('AUTH_SALT',        '-Xf_.2bxmoQX;`pI0Bi@bn*1OojTOMM(DOR%Isq28Q;`8_|LTY,ZPVxkcjatS!`L');
define('SECURE_AUTH_SALT', '+1U05Ngz]cq9U++sXN^oE-{!-2l7`8VBSU^ZS@&-T[@-wJ`THq6F!u().T^Csl m');
define('LOGGED_IN_SALT',   'NS];AMU+SgzBnj/@SH-X+lQpnT]drGY!o|?73]GX:85#:g,j$plb%2kT{VM<Nir$');
define('NONCE_SALT',       'Q&-_KaJp+HD`n+z*]~7Ax*!rJ|KbWZA&4h1d;&01j?R##O%o_-hP-vFR/cA[b(hR');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'hm_';

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
