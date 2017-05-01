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
define('DB_NAME', 'gsconstructs');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');


//Git init test
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'ldb<;8h?H*H !P=~B74?ZDmN0=-=j?(,f8yl`ZV%y3~x(sZE4#VMr_yLcrHrxX+m');
define('SECURE_AUTH_KEY',  'G;;t6n]TsKy)uHF! L]zwn_:N0bqxN{Z~?~9l,/=>q#TyT.PU)Kj]dp?P)5{r@/b');
define('LOGGED_IN_KEY',    'Q:R><As_WU2sJl.E;LcpU6ERu0(B:w_^`LspQ2IeC0VmiR2d68s]LLsPZ$NySQNr');
define('NONCE_KEY',        'P)WOaT^D}%C>-[)Yb<`Dof@m>1r$crOc:+%Guq-j,.HJC[]Z@6TgMo#h2=LQiHjy');
define('AUTH_SALT',        ';Mo2[aOVx;$w ^dP_.cOZ*J~5V^j7S7GVk6H2lhJ<W-V[ro`1tER/(v+P,FX1?tM');
define('SECURE_AUTH_SALT', '=[zgx,Gr7*R4:F.t$oiM4I:Mqc=!63Ah{OmZNT|>=+f9=z<m1<p}hW?a;!AT*Jik');
define('LOGGED_IN_SALT',   'xcHa *@pcy#_&q:`^! m~H!wyPXMlvxYlr%jae`v}@q;MakWP~<bT,;2`G@.fc8X');
define('NONCE_SALT',       'Y>@njkgR=9!I#S /%p&)4UHi?K%=k>JrhW[`9<JjtQ4ix%~sVe=-+SYX#<Vnl7as');

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

define(‘WP_MEMORY_LIMIT’, ‘128M’);