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
define('DB_NAME', 'db_spirit');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'gg<)I.~m,^Qi@GV?:uw+kgfwPKq3eKFp,UTFKy,-QLv.X+QP#*P02O5n?4~EFx[X');
define('SECURE_AUTH_KEY',  'G:dF<A|+erJW3x{ gT)x#Xlkq<aPF:+Qh-EJLa7g!_9q7:79U.b<o{*YFB%GFb{a');
define('LOGGED_IN_KEY',    '!ifiD2{LA-gwBfY qhc p8 q$K1yY]$HXdY4B;gUC=GR _3SJ<Vq5#/OKh<!mrsD');
define('NONCE_KEY',        'yP75L!#uC.%5 W|ezA%x$x@O;5N*`Rle5pNYu:Mw2)$}PN*!Bb#eG9F5Iogch3aV');
define('AUTH_SALT',        'a*ZL),Nt(#=P1I4BM;>k]8.*l{GMuU}Z1OB6W7d8:BCZXoi%oVJdDVU>$2Q 8e<c');
define('SECURE_AUTH_SALT', 'BdoB)NG?dmTRkQoyeru B<~8!Hx.:&bBlN~|l9TDD5+b~C^Xd!CEbT;?G1c1/x0/');
define('LOGGED_IN_SALT',   '2izE03B+ODW.8H21:.~e<lm_vut!*WbULqh@b~Ri,|sERzV_|?^A1gnwKeh*ZjM1');
define('NONCE_SALT',       'I)z-!;TO2MR`M?ef.,{x8(.CV^z<V%u_=SR fnnXteQhf/OEZg!&lc-5USWg`s6r');

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
