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
define('DB_NAME', 'udemy');

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

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '*+Bwg1fS=X&mFLfH+THT;mL8E+]bVGLe}8v88l7.J=4,^-&.d<7CCVkNr<+K(<6<');
define('SECURE_AUTH_KEY',  '6wG#T|rPb:7,W@C.~k|F`.ApeFg9,s5.cYNb?[4/t(:hgbHJDBWYTt=armn71P)t');
define('LOGGED_IN_KEY',    't!+e=>8!oX5`ObGwj_]-FB]j)+z( dOu[TzZm?b_0Lzuf}rc)>X6`fCUki~JRq9E');
define('NONCE_KEY',        '^u^kx4E&;o#NtkS5}s4qW =W##JcqAx5?SlDdz@te$l:u7XW^qVze#-C>0D!l?r)');
define('AUTH_SALT',        '&!++zQ9)LsR!ab_B?xm1mnZ.iA)+5e8%uVhF&@Ey,q?*!e)~KsSgiu)k`^S8!BOO');
define('SECURE_AUTH_SALT', ';WFqA;dl-|e82VW<%InM5kGczR<I>cPLY1l~!DlCdg$`|0Y+!o[7XA@@Q5w$/r=Q');
define('LOGGED_IN_SALT',   '-9->+s@NkFK d*^opGyM#I)LiwT :~&cnp@34.@OtANRfb-j7W27)uJiIE:]*-}i');
define('NONCE_SALT',       'X?SskT,y#u&!_qNGgZ|ZJ?K=dbPr53@oK)a(1pm`F]%(F|N=iEj9XjqP OS4;aLL');

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
