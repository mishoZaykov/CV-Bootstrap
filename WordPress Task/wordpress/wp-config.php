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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         'ZzGODwoEr=cOxD#JK/mMs!G=A50{t`8 %pj/n%EQ(X4XV-&a;<+4V5JGS=,[KPx^' );
define( 'SECURE_AUTH_KEY',  '3c[vg /~ ~2T]@VM!<+s!fwB, 0%Tz[n.4-+PO#%wh?5>Kh-m4}]Zo;I*J9#cJ,*' );
define( 'LOGGED_IN_KEY',    'xzmE789e9%y&qXs5!I&X<Opig1zM!G~$LsR9Sn5/4IBoW@O]HOL>g+i5+_E1$WE#' );
define( 'NONCE_KEY',        ']b*=-y;D+m1623&ln) @YWHx@$XAB*;PbDJNjUX=+^Pv~_hLQH5MPi6n?uG_@R7E' );
define( 'AUTH_SALT',        '&%c#`#%|I`9o!ks-b$nPH;6A(:4U=2wUJgX5TkYWn[;6`rD[rw2Wk&}OeG*#*Vqs' );
define( 'SECURE_AUTH_SALT', '32PszjLhLZB_Ctq8OT)HrLV@([vzHL8w;JAbg7*O5_q:[$;U1y?_1-Qgav;Q}F0Q' );
define( 'LOGGED_IN_SALT',   't#%Ta&N#7aKr2=e 1n{WtW#8#Xq-~7|JG8L>s6Kk)hy /?.}`@|PVgk>k|X>Am)F' );
define( 'NONCE_SALT',       'PK;/D%=I`+o Lwk{.=^4Vw@bidJf#3v|$*&?bNLSU{]Gw~Id.TXrB#Rb/ dvOET{' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
