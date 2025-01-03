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
define( 'DB_NAME', 'devtc' );

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
define( 'AUTH_KEY',         ',Pv74]EP>s0:#][(QoTfJ}o6HH354xOlC.v}bUTCY>Kj`%%K5q{/N,=LUGFv2]0,' );
define( 'SECURE_AUTH_KEY',  'YR6Chs&/T?YB&3PFc.|FLTri*I9j/e-E6>.a5GtPk=:$GaAx:`]%~Guo,NmPO^F[' );
define( 'LOGGED_IN_KEY',    'B>JI5.N~l:<@AN:NEZ${lP)JEtK]sgEGs|B/,,fsB|7V)2#3:]E*G%)>uON*VX&u' );
define( 'NONCE_KEY',        '2Y00p*k#JQGv(khiNJya/yo7dmGx#;LC5Dese$y+Dnhqj`.Ui1qQI|_$na_$[n7K' );
define( 'AUTH_SALT',        'iMn_%GBRq7?CeWnY~H}XLeY`T3V3*wH?eLxGGu&zNYYMS!EedJ7+VCQkQ^Rfej.C' );
define( 'SECURE_AUTH_SALT', '^}X$TnEj(-WHm)0TMIJL}[/N]1?nD< r;w);v9R&l$i3AdINc:GSLQ}~wYt-j6f_' );
define( 'LOGGED_IN_SALT',   '`%1x~cz)t-nqnNHH0D)7+4E:%Tdye%a1wqmE-W0S9Iq;Wo^+Vw+kBP[3),yGkbfV' );
define( 'NONCE_SALT',       'jN!dqNfm%dtQXf~vFRsY<OB_BFi5^s7}q+!Vk9-70DxzPSHpiYp:K)Be+rjVjO?v' );

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
