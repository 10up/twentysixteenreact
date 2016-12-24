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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

define( 'WP_CACHE_KEY_SALT', 'b' );

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'password');

/** MySQL hostname */
define('DB_HOST', 'mysql');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'dA|ObLPmmp;xiAUU-=<B9Q:08Xi+Qvu<$=NTFJQM24K-8GHxdo~{Ow &}0tQtumq');
define('SECURE_AUTH_KEY',  '(.!Nv~TragsUSWGPQDtv%7VzM=`-$;y#vvY^mu9UvW:YRbrhY2yR1gR0X [{cI0<');
define('LOGGED_IN_KEY',    'U$41Q34p8S#Pq;xd$U ?sJ>/{&J_A|A(^l?xr8;/uGH>G_?pV==LAf:tA7,ex>{3');
define('NONCE_KEY',        ',D`}<Cv4x~r4|e)M_iT]:+xwW|wtkZ9N[jx[MNG{*uJ[TZ^14Lg.vFqdg~a]QXMZ');
define('AUTH_SALT',        'j(qB0yC03O|2pUM#(e!m>:gV,cl=b_(jrT^S&yAPYj*,S{)^~h9b)Gq@g@Eo}]8P');
define('SECURE_AUTH_SALT', 'Oo=Dg5k@taM?CH(5}^v3dT<b`rcgF[evD2WpubvGJC4*&Z2f-Wr_M}D M-OI]dU.');
define('LOGGED_IN_SALT',   ',rSdi^EQ,N);8t~*rs2}J;@)Ljknz39S!Hm=S56.$Z8;}?RP:,%.!a;X?#E7JkOQ');
define('NONCE_SALT',       '&9{s(+]~pRS-ayE[:y-7clU8BQKA_O:f57Y]1hRv`N?$JXA$7jmI$$>]{@sEVv<@');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

global $memcached_servers;
$memcached_servers = array('default' => array('memcached:11211'));

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
