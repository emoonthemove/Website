<?php
if(!defined('DISALLOW_FILE_EDIT')){define('DISALLOW_FILE_EDIT', true);}
?><?php
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
define('DB_NAME', 'kaboombg_5or');

/** MySQL database username */
define('DB_USER', 'kaboombg_5or');

/** MySQL database password */
define('DB_PASSWORD', '4.V_HJyes]un');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'P?1Kt;>pLQ[?d`Ur5JF=XDaXJ%D:xX)Iw;ulW5^$g;DLy@1EfO,1WV7|p0VzZO7Q');
define('SECURE_AUTH_KEY',  '<nfsN7843<EX$uW0/f?-XPcS,3j]PZDLNsdgoxz,?S15+A=;)Ha.,6:@wp<>,0#s');
define('LOGGED_IN_KEY',    '!|n-<C>QN`njiL4L[AbuaemRC+qO<tC=q3K/Vj`&KPq6&bYGFP)->PJN fDD%7WP');
define('NONCE_KEY',        'F/;(6fX(W.a2U)b_6=fLlg41,9Hdins%v*lP2j)AM;wV~Wl!tTMa<asIz<.e,#j$');
define('AUTH_SALT',        '.XUAD_bqZHz36)kIj(,_Q(`m)cY.r2c4VDwI@Rr;e*7nuaZ~n:Qv72dAv>OiQ4)X');
define('SECURE_AUTH_SALT', 'vRxIE50OL F/ZE~uvu.)[O z jL4iUm`(f*N|;~J;EYvjXlaOk+KlLWS`B*N#36.');
define('LOGGED_IN_SALT',   'a3Ia]e8rqJUBFAMr/T?f)!*3P-Fg<)ejZLrs*eeT;(]Vol,0T62_JblpK)zGof=Z');
define('NONCE_SALT',       'uG@ex;=i)Iy^`->+o+|;5wc&_fC:j[:g9!aU>K^hF=IS[TDgR`KD%++HFh4$<%^q');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'C8X_';

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