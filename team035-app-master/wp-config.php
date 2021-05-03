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
define( 'DB_NAME', 'u20s1035_wp_dev' );
/** MySQL database username */
define( 'DB_USER', 'u20s1035_wp_demo_dbuser' );
/** MySQL database password */
define( 'DB_PASSWORD', 'H~*2D;W6#J5q' );
/** MySQL hostname */
define( 'DB_HOST', 'localhost' );
/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );
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
define( 'AUTH_KEY',         'U;*[SB?SNdN! FqeAk+f00~~w>6.5fcrBC<3 %]&H[H!~^Y0lIaEL/Ivp>OW|^Bl' );
define( 'SECURE_AUTH_KEY',  'b~eIlsP}RJQn{O[uU2gfl)jjLIb;|T=/n}&4i-Orf.aR/;18 ]$;2e:5bT?13c(p' );
define( 'LOGGED_IN_KEY',    'qvCPS}X@9Z7_LBI0n1+_:%LjYWfoBPE;g[PfwiNDPyFj$?Y1Pz&Fp18ZM[~Xe43A' );
define( 'NONCE_KEY',        'YS)!tznbjjwcD=96[^8,m0DQa&;J_<^n0V|F`TMH1L&G2D{DFaA88[8]?N4N@N./' );
define( 'AUTH_SALT',        'O]]i/_fl:lA1%iz$3OK8aPb#bW1eot/^9KD}SEs0-eAyP$&|1e1[fXdizOCuSS-?' );
define( 'SECURE_AUTH_SALT', 'fh4$oc# HmZz$!p~YS=&wq3g0C{a&H<@nHr-MebM^,)(!8r#3t>bZpDR2nUP0)Z;' );
define( 'LOGGED_IN_SALT',   '0VHFaD-jDmsF$p*n|DS(Y)Ilu_qv:jAs/0lErSlC8tuGg$h*oyMipLfc^=~.j8d}' );
define( 'NONCE_SALT',       ',<m;qs|45gb%2GCrL^FaGYe}h8yX Sh-m4SzvZFspM<N1WR1S%C:1-/z^VsH{-v~' );
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